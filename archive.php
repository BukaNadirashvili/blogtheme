<?php 
get_header();

global $wp_query;

// Pagination
$pagination = paginate_links( array(
    'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var( 'paged' ) ),
    'total' => $wp_query->max_num_pages,
    'prev_text' => '<i class="fa-solid fa-arrow-left me-2 align-self-center"></i>' . __('Previous', 'blog'),
    'next_text' => __("Next", "blog") . '<i class="fa-solid fa-arrow-right ms-2 align-self-center"></i>',
));
?>

<!-- Archive cards -->
<?php  if( have_posts() ) : ?>
  <div class="container-lg">
    <div class="my-5 archive-posts grid">
      <?php while(have_posts()) : ?>
        <?php the_post(); ?>
        <?php get_template_part( 'template-parts/parts/cards/archive-card' ); ?>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>

<!-- Pagination -->
<div>
  <div class="container-lg my-3">
    <div class="d-flex justify-content-center gap-3">
      <?php echo '<div class="d-flex justify-content-center gap-3">' . $pagination . '</div>'; ?>
    </div>
  </div>
</div>


<?php
get_footer();