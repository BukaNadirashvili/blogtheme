<?php

$latest_posts = get_latest_posts('post', 9);

?>

<?php if($latest_posts->have_posts()) : ?>

  <section class="mt-5">
    <div class="container-lg">
      <div class="row g-2">
        <div class="col-12 col-lg-7">
          <h4 class="text-center fw-bold">
            <?php esc_html_e('All articles', 'blog'); ?>
          </h4>
          <hr>
          <div class="home-page-posts">
            <?php 
              while($latest_posts->have_posts()) : 
                  $latest_posts->the_post();
                if (get_field('is_full_image', get_the_ID())) {
                  get_template_part( 'template-parts/parts/cards/home-page-card-full' );
                } else {
                  get_template_part( 'template-parts/parts/cards/home-page-card' );
                }
              endwhile;
              wp_reset_postdata();
            ?>
          </div>
          <?php if ($latest_posts->max_num_pages > 1) : ?>
            <div class="d-flex justify-content-center mt-5">
              <button class="btn btn-primary text-white" id="load-more">
                <span class="d-none spinner-border spinner-border-sm load-more-spinner" role="status" aria-hidden="true"></span>
                <?php esc_html_e('Load More', 'blog'); ?>
              </button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>