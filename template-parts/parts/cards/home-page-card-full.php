<?php 

// Full image card

$image = get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID()));
$category = get_the_category()[0];

?>

<article <?php post_class('mt-3'); ?>>
  <div class="position-relative">
    <img class="w-100" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo $image['alt']; ?>">
    <div class="position-absolute home-page-card-full-title">
      <?php if($category) : ?>
        <div class="bg-primary text-white px-2 p-1 d-inline-block ms-2">
          <a class="text-white fw-bold home-page-card-full-category" href="<?php echo esc_url( get_category_link($category) ); ?>">
            <?php echo $category->name; ?>
          </a>
        </div>
      <?php endif; ?>
      <?php the_title( sprintf('<h3 class=" p-2"><a href="%s" class="fw-bold text-white ellipsis-2">', esc_url( get_permalink() )), '</a></h3>' ); ?>
    </div>
  </div>
</article>