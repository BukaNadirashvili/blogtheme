<?php

$mosaic_posts = get_field('post_mosaic');
$latest_post = get_latest_posts('post', 1)->posts;

if($mosaic_posts['is_latest_post']) {
  $largest_post = $latest_post[0];
} else {
  $largest_post = $mosaic_posts['largest_post'];
}
?>

<section class="mt-3">
  <div class="container-lg">
    <div class="grid gap-2">

      <!-- The largest post -->
      <div class="g-col-12 g-col-lg-8">
        <a href="<?php echo get_permalink($largest_post->ID); ?>">
          <article class="position-relative">
            <?php if($mosaic_posts['is_latest_post']) : ?>

              <div class="bg-primary d-flex justify-content-center align-items-center px-2 px-md-3 py-2 py-md-4 position-absolute latest-post-badge z-1">
                <p class="text-white m-0 fw-bold">
                  <?php esc_html_e('Latest article', 'blog'); ?>
                </p>
              </div>
            <?php endif; ?>

              <div class="gradient-image h-100">
                <img class="w-100 h-100" src="<?php echo get_image($largest_post->ID, get_the_post_thumbnail_url($largest_post->ID))['url']; ?>" />
                <div class="gradient-overlay"></div>
              </div>

              <a class="position-absolute mosaic-cards-most-recent-post-title" href="<?php echo get_permalink($largest_post->ID); ?>">
                <h3 class="text-white ellipsis-2 fw-bold">
                  <?php echo $largest_post->post_title; ?>
                </h3>
              </a>
            
          </article>
        </a>
      </div>

      <!-- Other posts -->
      <?php if($mosaic_posts['posts']) : ?>
        <div class="g-col-12 g-col-lg-4 grid gap-2">
          <?php foreach($mosaic_posts['posts'] as $mosaic_post) : ?>
            <div class="g-col-12 g-col-md-6 g-col-lg-12">
              <a href="<?php echo get_permalink($mosaic_post->ID); ?>">
                 <article class="position-relative">
                    <div class="gradient-image">
                      <img class="w-100" src="<?php echo get_image($mosaic_post->ID, get_the_post_thumbnail_url($mosaic_post->ID))['url']; ?>" 
                      alt="<?php echo get_image($mosaic_post->ID, get_the_post_thumbnail_url($mosaic_post->ID))['alt']; ?>">
                      <div class="gradient-overlay"></div>
                    </div>
                    <a class="position-absolute mosaic-cards-other-posts-title" href="<?php echo get_permalink($mosaic_post->ID); ?>">
                      <h5 class="text-white ellipsis-2 fw-bold">
                        <?php echo $mosaic_post->post_title; ?>
                      </h5>
                    </a>
                 </article>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>