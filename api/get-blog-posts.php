<?php

// Api class to retrieve blog posts
class GetBlogPosts {

  function __construct() {

    add_action('wp_ajax_blog_load_more', [$this, 'blog_load_more']);
    add_action('wp_ajax_nopriv_blog_load_more', [$this, 'blog_load_more']);

  }

  function blog_load_more() {

    // arguments
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'paged' => $_POST['paged'],
    ];

    $posts = new WP_Query($args);
    $response = '';
    $max_pages = $posts->max_num_pages;

    if ($posts->have_posts()) {
      ob_start();
      while ($posts->have_posts()) : 
        $posts->the_post();
        if (get_field('is_full_image', get_the_ID())) {
            $response .= get_template_part( 'template-parts/parts/cards/home-page-card-full' );
        } else {
          $response .= get_template_part( 'template-parts/parts/cards/home-page-card' );
        }
      endwhile;
      $output = ob_get_contents();
      ob_end_clean();
    } else {
      $response = '';
    }

    $result = [
      'max' => $max_pages,
      'html' => $output,
    ];

    echo json_encode($result);
    exit;
  }

}

new GetBlogPosts;