<?php 
  $image = get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID(), 'medium'));
?>

<div class="g-col-12 g-col-sm-6 g-col-lg-4">
  <article <?php post_class('d-flex flex-column h-100 bg-white'); ?>>
    <div class="position-relative">
      <img class="w-100 card-image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo $image['alt']; ?>">
      <?php if(is_tax() || is_category()) : ?>
        <a href="<?php echo get_term_link(get_queried_object_ID()); ?>" class="position-absolute text-black bottom-0 p-2 fw-bold bg-white d-block archive-card-term">
          <?php echo get_queried_object()->name; ?>
        </a>
      <?php endif; ?>
    </div>
    <?php the_title( sprintf( '<h4 class="mt-3"><a class="archive-card-title text-truncate ellipsis-3 fw-bold" href="%s">', esc_url( get_permalink() )), '</a></h4>'); ?>
  </article>
</div>