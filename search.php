<?php 
  get_header();
?>

<div class="container-lg my-5">
  <div class="row g-2 justify-content-center">
    <div class="col-12 col-lg-7">
      <div>
        <!-- Search form -->
        <form method="get">
          <div class="position-relative d-flex">
            <input class="form-control pe-5" name="s" value="<?php echo $_GET['s']; ?>" type="search" placeholder="search">
            <button class="position-absolute align-self-center search-page-btn">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </div>
        </form>

        <!-- Search result -->
        <h4 class="fw-bold text-center mb-8">
          <?php esc_html_e("Search Result For: {$_GET['s']}", 'blog') ?>
        </h4>
      </div>

      <?php if($wp_query->have_posts()) : ?>
        <hr>
      <?php else: ?>
        <!-- Result not found -->
        <h2 class="fw-bold text-center text-danger">
          <?php esc_html_e('No articles found', 'blog'); ?>
        </h2>
      <?php endif; ?>

      <!-- Loop for results -->
      <div class="search-page-posts">
        <?php while(have_posts()) : ?>
          <?php the_post(); ?>
          <?php get_template_part( 'template-parts/parts/cards/home-page-card' ); ?>
        <?php endwhile; ?>
      </div>

      <?php if($wp_query->max_num_pages > 1) : ?>
        <div class="d-flex justify-content-center mt-5">
          <button class="btn btn-primary text-white" id="search-load-more">
            <span class="d-none spinner-border spinner-border-sm load-more-spinner" role="status" aria-hidden="true"></span>
            <?php esc_html_e('Load More', 'blog'); ?>
          </button>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php 
  get_footer(); 
?>