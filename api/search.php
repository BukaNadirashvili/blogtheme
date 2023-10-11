<?php

// Api class for Search
class Search {

  function __construct() {

    add_action('wp_ajax_blog_search_load_more', [$this, 'blog_search_load_more'], 100000);
    add_action('wp_ajax_nopriv_blog_search_load_more', [$this, 'blog_search_load_more'], 100000);

  }

  function blog_search_load_more() {

    $posts = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => 9,
      'post_status' => 'publish',
      's' => $_GET['s'],
      'paged' => $_GET['paged'],
    ]);


    if ($posts->have_posts()) {
      ob_start();
      while ($posts->have_posts()) : 
          $posts->the_post();
          $response .= get_template_part( 'template-parts/parts/cards/home-page-card' );
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

new Search;