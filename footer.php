  </main>
<?php
$footer_post_with_image = get_latest_posts('post', 1);
$footer_posts = get_latest_posts('post', 4, 1);
?>

  <footer style="margin-top: auto;">
    <?php get_template_part( 'template-parts/social-icons' ); ?>
      <div class="bg-dark text-white">
        <div class="container-lg">
          <div class="row pt-4 justify-content-between">
            <?php if(get_field('about_us_header', 'option') || get_field('about_us_text', 'option')) : ?>
              <div class="col-lg-4 d-flex flex-column justify-content-center my-4">
                <?php if ( is_active_sidebar( 'footer-left-widget-area' ) ) : ?>
                  <div class="footer-widget-area">
                      <?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
                  </div>
                <?php endif; ?>
              </div>
           <?php endif; ?>
            <div class="col-lg-4">
              <h4 class="text-center mb-4">
                <?php esc_html_e('Latest articles', 'blog'); ?>
              </h4>
              <?php if($footer_post_with_image->have_posts()) : ?>
                <div class="container-fluid">
                  <div class="d-flex gap-3 footer-post-with-image pb-4">
                    <?php while($footer_post_with_image->have_posts()) : $footer_post_with_image->the_post(); ?>
                      <div>
                        <img class="footer-post-image" src="<?php echo esc_url( get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID()))['url'] ); ?>" 
                          alt="<?php echo get_image(get_the_ID(), get_the_post_thumbnail_url(get_the_ID()))['alt']; ?>">
                      </div>
                      <div>
                        <?php the_title( sprintf( '<a class="ellipsis-2 footer-post-title" href="%s">', esc_url( get_permalink() )), '</a>' ); ?>
                      </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($footer_posts->have_posts()) : ?>
                <ul class="mt-4 footer-posts-list">
                  <?php while($footer_posts->have_posts()) : $footer_posts->the_post(); ?>
                    <li>
                      <?php the_title( sprintf('<a class="ellipsis-2 footer-post-title" href="%s">', esc_url( get_permalink() )), '</a>' ); ?>
                    </li>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
          <hr>
          <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between mt-3">
            <div>
              <?php echo get_bloginfo( 'name' ) . ' ' . date("Y"); ?>
            </div>
            <?php if ( has_nav_menu( 'footer-menu' ) ) :
               $menu_items = wp_get_menu_array('Footer Navigation');
            ?>
              <nav class="d-flex gap-3">
                <?php foreach($menu_items as $menu_item) : ?>
                  <a class="footer-nav-link" target="<?php echo $menu_item['target']; ?>" href="<?php echo $menu_item['url']; ?>">
                    <?php echo $menu_item['title']; ?>
                  </a>
                <?php endforeach; ?>
              </nav>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>