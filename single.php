<?php 
get_header();

// Related posts
$related_posts = get_related_posts(get_the_ID());

// Previous and next posts
$prev_post = get_adjacent_post(false, '', true);
$next_post = get_adjacent_post(false, '', false);
?>

<div class="container-lg mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <!-- Post categories -->
      <?php if( get_the_category() ) : ?>
        <?php foreach(get_the_category() as $category) : ?>
          <a href="<?php echo esc_url(get_category_link($category)); ?>" class="fw-bold text-black ms-2">
            <?php echo $category->name; ?>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
      <!-- Post title -->
      <h1 class="fw-bold">
        <?php the_title(); ?>
      </h1>
      <hr>
      <!-- Post content -->
      <div class="container-fluid">
        <div class="row justify-content-end">
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <!-- Facebook share -->
      <div class="container-fluid">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>">
          <button class="btn btn-sm text-white d-flex facebook-share-btn" style="">
            <i class="fa-brands fa-facebook me-2 align-self-center"></i>
            <?php esc_html_e( 'Share', 'blog' ); ?>
          </button>
        </a>
      </div>

      <!-- Previous and next posts -->
      <div class="container-lg my-5">
        <div class="row justify-content-between flex-column flex-md-row">

        <div class="justify-content-center justify-content-md-start col-12 col-md-3 prev-link d-flex gap-2 my-2 my-md-0 align-self-center <?php echo empty($prev_post) ? 'invisible' : ''; ?>">
          <div class="align-self-center">
            <i class="fa-solid fa-arrow-left prev-icon"></i>
          </div>
          <a class="prev-link ellipsis-2 fw-bold" href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>">
            <?php echo $prev_post->post_title; ?>
          </a>
        </div>

          <div class="justify-content-center justify-content-md-end col-12 col-md-3 next-link d-flex gap-2 my-2 my-md-0 justify-content-end align-self-center <?php echo empty($next_post) ? 'invisible' : ''; ?>">
            <a class="ellipsis-2 text-truncate fw-bold" href="<?php echo esc_url( get_permalink($next_post->ID) ); ?>">
              <?php echo $next_post->post_title; ?> 
            </a>
            <div class="align-self-center">
              <i class="fa-solid fa-arrow-right next-icon"></i>
            </div>
          </div>

        </div>
      </div>

      <!-- Related posts -->
      <?php if($related_posts->found_posts > 0) : ?>
        <h4 class="fw-bold text-center my-4">
          <?php esc_html_e( 'Related Articles', 'blog' ); ?>
        </h4>
        <hr>
        <?php if($related_posts->have_posts()) : ?>
          <div class="row">
            <?php while($related_posts->have_posts()) : ?>
              <?php $related_posts->the_post(); ?>
              <div class="col-sm-6">
                <?php get_template_part( 'template-parts/parts/cards/related-posts-card' ); ?>
              </div>
            <?php endwhile; ?> 
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php 
get_footer(); 
?>