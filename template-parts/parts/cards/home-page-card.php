<?php 

$image = get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'));
$categories = get_the_category();

?>

<article <?php post_class('mt-3'); ?>>
  <div class="row">
    <div class="col-12 col-sm-5 col-lg-5">
      <img class="w-100 h-auto border-image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo $image['alt']; ?>">
    </div>
    <div class="col-12 col-sm-7 col-lg-7 d-flex flex-column gap-2">
      <?php if($categories) : ?>
        <div class="d-flex gap-2">
          <?php foreach($categories as $index => $category) : ?>
            <a class="text-black fw-bold" href="<?php echo get_category_link($category); ?>">
              <?php add_comma($index, $categories, $category->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php the_title( sprintf('<h4 class="fw-bold "><a class="ellipsis-2" href="%s">', esc_url( get_permalink() )), '</a></h4>'); ?>
      <p class="ellipsis-2">
        <?php echo get_the_excerpt(); ?>
      </p>
    </div>
  </div>
</article>