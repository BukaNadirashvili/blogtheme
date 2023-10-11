<section class="mt-5 p-4 home-socials">
  <div class="container-lg">
    <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap">
      <?php if(get_field('facebook_link', 'option')) : ?>
        <a href="<?php echo get_field('facebook_link', 'option') ?>">
          <i class="fa-brands fa-facebook social-icon"></i>
        </a>
      <?php endif; ?>
      <?php if(get_field('linkedin_link', 'option')) : ?>
        <a href="<?php echo get_field('linkedin_link', 'option'); ?>">
          <i class="fa-brands fa-linkedin social-icon"></i>
        </a>
      <?php endif; ?>
      <?php if(get_field('instagram_link', 'option')) : ?>
        <a href="<?php echo get_field('instagram_link', 'option'); ?>">
          <i class="fa-brands fa-instagram social-icon"></i>
        </a>
      <?php endif; ?>
      <?php if(get_field('spotify_link', 'option')) : ?>
        <a href="<?php echo get_field('spotify_link', 'option'); ?>">
          <i class="fa-brands fa-spotify social-icon"></i>
        </a>
      <?php endif; ?>
      <?php if(get_field('soundcloud_link', 'option')) : ?>
        <a href="<?php echo get_field('soundcloud_link', 'option'); ?>">
          <i class="fa-brands fa-soundcloud social-icon"></i>
        </a>
      <?php endif; ?>
      <?php if(get_field('twitter_link', 'option')) : ?>
        <a href="<?php echo get_field('twitter_link', 'option'); ?>">
          <i class="fa-brands fa-twitter social-icon"></i>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>