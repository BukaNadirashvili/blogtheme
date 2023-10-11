<?php 

$image = get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'));

?>

<article <?php post_class('bg-light text-black d-flex mt-3'); ?>>
  <div class="container-fluid px-0">
    <div class="row">
      <div class="col-4">
        <img class="w-100 h-100" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo $image['alt']; ?>">
      </div>
      <div class="col-7 align-self-center">
        <?php the_title( sprintf('<h6><a class="text-truncate ellipsis-2" href="%s">', esc_url( get_permalink() )), '</a></h6>' ); ?>
      </div>
    </div>
  </div>
</article>