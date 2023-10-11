<?php

// Api class for live search
class LiveSarch {
  
  function __construct() {

    add_action('wp_ajax_live_search_load_more', [$this, 'live_search_load_more'], 100000);
    add_action('wp_ajax_nopriv_live_search_load_more', [$this, 'live_search_load_more'], 100000);

  }

  function live_search_load_more() {
  
    $posts = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => 5,
      'post_status' => 'publish',
      's' => $_GET['search_string'],
    ]);
  
  
    if ($posts->have_posts()) {
      ob_start();
      while ($posts->have_posts()) : 
          $posts->the_post();
          $response .= get_template_part( 'template-parts/parts/cards/live-search-card' );
      endwhile;
      $output = ob_get_contents();
      ob_end_clean();
    } else {
      $response = '';
    }
  
    echo json_encode($output);
    exit;
  }

}

new LiveSarch;