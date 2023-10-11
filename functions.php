<?php

if ( ! function_exists( 'blog_scripts' ) ) {

  /**
   * Enqueues scripts and styles.
   *
   * @since Blog Theme 1.0
   *
   * @return void
   */
  function blog_scripts() {

    wp_enqueue_script('app', get_template_directory_uri() . '/dist/scripts/app.js', array('jquery'), wp_get_theme()->get( 'Version' ), true);
    wp_enqueue_script('style', get_template_directory_uri() . '/dist/scripts/style.js', array('jquery'), wp_get_theme()->get( 'Version' ));
    wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/style.css', array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'app-style', get_template_directory_uri() . '/dist/app.css', array(), wp_get_theme()->get( 'Version' ) );

    $localize_args = [
      'ajax_url' => admin_url('admin-ajax.php')
    ];

    wp_localize_script( 'app', 'app_args', $localize_args );

  }

}

add_action( 'wp_enqueue_scripts', 'blog_scripts' );

if ( ! function_exists( 'blog_setup' ) ) {

  function blog_setup() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    register_nav_menus(
      array(
        'primary-menu'    => esc_html__( 'Primary Menu', 'blog' ),
        'footer-menu'     => esc_html__( 'Footer Menu', 'blog' ),
        'top-header-menu' => esc_html__( 'Top Header Menu', 'blog' ),
      )
    );

  }

  load_theme_textdomain('blog', get_template_directory() . '/languages');

}

add_action( 'after_setup_theme', 'blog_setup' );

// Acf save and load JSON

add_filter('acf/settings/save_json', 'save_acf_json');
 
function save_acf_json( $path ) {
    
    // update path
    $path = get_template_directory() . '/acf-json';
    
    // return
    return $path;
    
}

add_filter('acf/settings/load_json', 'load_acf_json');

function load_acf_json( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_template_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

// ACF add options page
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
      'page_title'    => 'General Settings',
      'menu_title'    => 'Settings',
      'menu_slug'     => 'general-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
  ));
}

// Get menu array
function wp_get_menu_array($current_menu='Main Menu') {

  $menu_array = wp_get_nav_menu_items($current_menu);

  $menu = array();

  foreach ($menu_array as $m) {
      if (empty($m->menu_item_parent)) {
          $menu[$m->ID] = array();
          $menu[$m->ID]['ID'] = $m->ID;
          $menu[$m->ID]['title'] = $m->title;
          $menu[$m->ID]['url'] = $m->url;
          $menu[$m->ID]['target'] = $m->target;
          $menu[$m->ID]['children'] = populate_children($menu_array, $m);
      }
  }

  return $menu;

}

// Recursive function for populating child items
function populate_children($menu_array, $menu_item)
{
    $children = array();
    if (!empty($menu_array)){
        foreach ($menu_array as $k=>$m) {
            if ($m->menu_item_parent == $menu_item->ID) {
                $children[$m->ID] = array();
                $children[$m->ID]['ID'] = $m->ID;
                $children[$m->ID]['title'] = $m->title;
                $children[$m->ID]['url'] = $m->url;
                $children[$m->ID]['target'] = $m->target;
                unset($menu_array[$k]);
                $children[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }
    };
    return $children;
}

// Search only by title
function blog_search_by_title_only($search, $wp_query) {
    global $wpdb;

    if (empty($search))
      return $search;

    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';

    $search =
    $searchand = '';

    foreach ((array) $q['search_terms'] as $term) {
      $term = esc_sql($wpdb->esc_like($term));

      $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
      $search .= " AND post_type = 'post'";
      $searchand = ' AND ';
    }

    if (!empty($search)) {
      $search = " AND ({$search}) ";
      
      if (!is_user_logged_in())
        $search .= " AND ($wpdb->posts.post_password = '') ";
    }

    return $search;
}

add_filter('posts_search', 'blog_search_by_title_only', 500, 2);

if ( ! function_exists( 'get_image' ) ) {

  // Get image
  function get_image($post_id, $image_url) {  

      $image = [];
      $no_image = get_field('no_image', 'option')['url'] ?? false;

      if ($image_url) {
        $image['url'] = $image_url;
        $image['alt'] = get_post_meta(get_post_thumbnail_id( $post_id ), '_wp_attachment_image_alt', true) ? get_post_meta(get_post_thumbnail_id( $post_id ), '_wp_attachment_image_alt', true) : get_bloginfo('name');
      } elseif ($no_image) {
         $image['url'] = get_field('no_image', 'option')['url'];
         $image['alt'] = get_field('no_image', 'option')['alt'] ?  get_field('no_image', 'option')['alt'] : get_bloginfo('name');
      } else {
        $image['alt'] =  get_bloginfo('name');
      }

      return $image;
    }
}


if ( ! function_exists( 'get_latest_posts' ) ) {

  // Get the latest posts
  function get_latest_posts($post_type = 'post', $posts_per_page = 3, $offset = 0) {

    return new WP_Query( array(
      'post_type' => $post_type,
      'post_status' => 'publish',
      'posts_per_page' => $posts_per_page,
      'offset' => $offset
    ));
  }
}

if( ! function_exists('add_comma') ) {

  function add_comma($index, $array, $string) {
    echo $index === array_key_last($array) ? $string : $string . ',';
  }

}

// Add archive support for post type
function modify_post_type_args($args, $post_type) {

  if ($post_type === 'post') {
      $args['has_archive'] = true;
      $args['rewrite'] = array('slug' => 'blogs');
  }
  return $args;
}
add_filter('register_post_type_args', 'modify_post_type_args', 10, 2);

if( ! function_exists('get_related_posts') ) {

  function get_related_posts($post_id) {

    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'cat' => implode(",", wp_get_post_categories( $post_id )),
      'posts_per_page' => 4,
      'orderby' => 'rand',
      'post__not_in' => [$post_id]
  );

    return new WP_Query($args);

  }
}
// Require api files
require_once get_template_directory() . '/api/get-blog-posts.php';
require_once get_template_directory() . '/api/live-search.php';
require_once get_template_directory() . '/api/search.php';

function blog_widgets_init() {
  register_sidebar( array(
      'name'          => __( 'Footer Left Widget Area', 'blog' ),
      'id'            => 'footer-left-widget-area',
      'description'   => __( 'Footer left widget area.', 'blog' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'blog_widgets_init' );