<?php
   $image = get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'));
?>

<article <?php post_class(); ?>>
  <img class="w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
  <a href="<?php echo get_permalink(); ?>">
     <h4 class="fw-bold my-2 text-truncate ellipsis-2 related-posts-title">
      <?php the_title(); ?>
     </h4>
  </a>
  <p class="ellipsis-2 text-truncate">
    <?php echo get_the_excerpt(); ?>
  </p>
</article>