<header class="header d-flex flex-column">
  <!-- Site header with tags -->
  <div class="bg-primary py-2 order-3 order-lg-1">
    <div class="container-lg">
      <div class="d-flex justify-content-between">

        <div class="align-self-center">
          <a href="/">
            <h3 class="text-white fw-bold d-none d-lg-block">
              <?php echo get_bloginfo( 'name' ); ?>
            </h3>
          </a>
        </div>

        <ul class="list-unstyled m-0 d-flex flex-wrap d-lg-block justify-content-evenly">

          <li class="d-inline-flex flex-column ps-2 header-tag">
            <a class="align-self-center py-2" href="#">
              <i class="fa-solid fa-heart header-tag-icon"></i>
            </a>
            <a class="text-white fw-bold" href="/tag/popular/">
              <?php esc_html_e('#Popular', 'blog'); ?>
            </a>
          </li>

          <li class="d-inline-flex flex-column ps-2 header-tag">
            <a class="align-self-center py-2" href="/tag/chosen/">
              <i class="fa-regular fa-eye header-tag-icon"></i>
            </a>
            <a class="text-white fw-bold" href="#">
              <?php esc_html_e('#Chosen', 'blog'); ?>
            </a>
          </li>

          <li class="d-inline-flex flex-column ps-2 header-tag">
            <a class="align-self-center py-2" href="/tag/trendy">
              <i class="fa-solid fa-bolt header-tag-icon"></i>
            </a>
            <a class="text-white fw-bold" href="#">
              <?php esc_html_e('#Trendy', 'blog'); ?>
            </a>
          </li>

        </ul>

      </div>
    </div>
  </div>

  <!-- Header navigation menu -->
  <div class="container-fluid order-3 order-lg-2 header-navigation-container">
    <div class="container-lg">
      <nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#blog-navbar" aria-controls="blog-navbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="blog-navbar" aria-labelledby="blog-navbar">

          <div class="offcanvas-header">
            <a href="/">
              <h5 class="offcanvas-title text-white" id="blog-navbar">
                <?php echo get_bloginfo( 'name' ); ?>
              </h5>
            </a>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
          </div>

          <div class="offcanvas-body">
            <?php if ( has_nav_menu( 'primary-menu' ) ) :
              $menu_items = wp_get_menu_array('Primary Navigation');
            ?>

              <ul class="navbar-nav flex-grow-1 pe-3">
                <?php foreach($menu_items as $menu_item) : 
                  if ($menu_item['children']) : ?>
                    <li class="nav-item dropdown">
                      <a class="nav-link fw-bold header-nav-link dropdown-toggle" href="<?php echo $menu_item['url']; ?>" target="<?php echo $menu_item['target']; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $menu_item['title']; ?>
                      </a>
                      <ul class="dropdown-menu">
                        <?php foreach($menu_item['children'] as $sub_menu) : ?>
                          <li>
                            <a class="fw-bold dropdown-item" href="<?php echo $sub_menu['url']; ?>" target="<?php echo $sub_menu['target']; ?>">
                            <?php echo $sub_menu['title']; ?>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </li>
                        
                  <?php else: ?>
                    <li class="nav-item">
                      <a class="nav-link fw-bold header-nav-link" aria-current="page" href="<?php echo $menu_item['url']; ?>" target="<?php echo $menu_item['target'] ?>">
                        <?php echo $menu_item['title']; ?>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <?php if ( has_nav_menu( 'top-header-menu' ) ) :
              $menu_items = wp_get_menu_array('Top Header Navigation');
            ?>
              <ul class="d-block d-lg-none list-unstyled mt-5">
                <?php foreach($menu_items as $menu_item) : ?>
                  <li class="mt-2">
                    <a class="text-white" href="<?php $menu_item['url']; ?>" target="<?php echo $menu_item['target']; ?>" >
                      <?php echo $menu_item['title']; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <!-- Social icons -->
            <ul class="d-flex gap-3 d-lg-none list-unstyled">
              <?php if (get_field('facebook_link', 'option')) : ?>
                <li>
                  <a href="<?php echo get_field('facebook_link', 'option'); ?>">
                    <i class="fa-brands fa-facebook offcanvas-social-icons"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (get_field('linkedin_link', 'option')) : ?>
                <li>
                  <a href="<?php echo get_field('linkedin_link', 'option'); ?>">
                    <i class="fa-brands fa-linkedin offcanvas-social-icons"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (get_field('instagram_link', 'option')) : ?>
                <li>
                  <a href="<?php echo get_field('instagram_link', 'option'); ?>">
                    <i class="fa-brands fa-instagram offcanvas-social-icons"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (get_field('spotify_link', 'option')) : ?>
                <li>
                  <a href="<?php echo get_field('spotify_link', 'option'); ?>">
                    <i class="fa-brands fa-spotify offcanvas-social-icons"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (get_field('soundcloud_link', 'option')) : ?>
                <li>
                  <a href="<?php echo get_field('soundcloud_link', 'option'); ?>">
                    <i class="fa-brands fa-soundcloud offcanvas-social-icons"></i>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (get_field('twitter_link', 'option')) : ?>
                <li>
                  <a href="<?php echo get_field('twitter_link', 'option'); ?>">
                    <i class="fa-brands fa-twitter offcanvas-social-icons"></i>
                  </a>
                </li>
              <?php endif; ?>
            </ul>

            <ul class="d-block d-lg-none list-unstyled my-5">
              <li class="mt-1 offcanvas-tag-list-item">
                <span class="me-2">
                  <i class="fa-solid fa-clock"></i>
                </span>
                <a href="#">
                  <?php esc_html_e('Latest', 'blog'); ?>
                </a>
              </li>

              <li class="mt-1 offcanvas-tag-list-item">
                <span class="me-2">
                  <i class="fa-solid fa-heart"></i>
                </span>
                <a href="/tag/popular">
                  <?php esc_html_e('#Popular', 'blog'); ?>
                </a>
              </li>

              <li class="mt-1 offcanvas-tag-list-item">
                <span class="me-2">
                  <i class="fa-regular fa-eye"></i>
                </span>
                <a href="tag/chosen">
                  <?php esc_html_e('#Chosen', 'blog'); ?>
                </a>
              </li>

              <li class="mt-1 offcanvas-tag-list-item">
                <span class="me-2">
                  <i class="fa-solid fa-bolt"></i>
                </span>
                <a href="/tag/trendy">
                  <?php esc_html_e('#Trendy', 'blog'); ?>
                </a>
              </li>

            </ul>

            <form class="d-block d-lg-none" method="get">
              <div class="d-flex">
                <input type="search" name="s" class="form-control form-control-sm pe-5">
                <button class="offcanvas-search-btn position-relative align-self-center">
                  <i class="fa-solid fa-magnifying-glass offcanvas-search-icon"></i>
                </button>
              </div>
            </form>

            <?php if (get_field('menu_button', 'option')) : ?>
              <div class="d-flex justify-content-center">
                <a class="d-block d-lg-none" target="<?php echo get_field('menu_button', 'option')['target']; ?>" href="<?php echo get_field('menu_button', 'option')['url']; ?>">
                  <button class="btn btn-secondary">
                    <?php echo get_field('menu_button', 'option')['title']; ?>
                  </button>
                </a>
              </div>
            <?php endif; ?>

          </div>
        </div>

        <button class="search-modal-btn" type="button" data-bs-toggle="modal" data-bs-target="#blog-search-modal">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <?php if (get_field('menu_button', 'option')) : ?>
          <a class="ms-3 d-none d-lg-block" target="<?php echo get_field('menu_button', 'option')['target']; ?>" href="<?php echo get_field('menu_button', 'option')['url']; ?>">
            <button class="btn btn-dark">
              <?php echo get_field('menu_button', 'option')['title']; ?>
            </button>
          </a>
        <?php endif; ?>

      </nav>
    </div>
  </div>

  <div class="container-lg mt-1 order-1 order-lg-3">
    <div class="d-flex justify-content-center justify-content-lg-between">
      <?php if ( has_nav_menu( 'top-header-menu' ) ) :
        $menu_items = wp_get_menu_array('Top Header Navigation');
      ?>
        <nav class="d-none d-lg-block">
          <ul class="list-unstyled d-flex gap-2">
            <?php foreach($menu_items as $menu_item) : ?>
              <li class="d-inline-block">
                <a class="fw-light text-secondary" target="<?php echo $menu_item['target']; ?>" href="<?php $menu_item['url']; ?>">
                  <?php echo $menu_item['title']; ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </nav>
        
      <?php endif; ?>

      <!-- Blog title -->
      <div class="d-block d-lg-none fw-bold">
        <a href="/">
          <h1 class="text-primary">
            <?php echo get_bloginfo( 'name' ) ?>
          </h1>
        </a>
      </div>

      <!-- Social icons -->
      <ul class="list-unstyled d-none d-lg-block">
        <?php if (get_field('facebook_link', 'option')) : ?>
          <li class="d-inline-block ms-2">
            <a href="<?php echo get_field('facebook_link', 'option'); ?>">
              <i class="fa-brands fa-facebook header-icon"></i>
            </a>
          </li>
        <?php endif; ?>
        <?php if (get_field('linkedin_link', 'option')) : ?>
          <li class="d-inline-block ms-2">
            <a href="<?php echo get_field('linkedin_link', 'option'); ?>">
              <i class="fa-brands fa-linkedin header-icon"></i>
            </a>
          </li>
        <?php endif; ?>
        <?php if (get_field('instagram_link', 'option')) : ?>
          <li class="d-inline-block ms-2">
            <a href="<?php echo get_field('instagram_link', 'option'); ?>">
              <i class="fa-brands fa-instagram header-icon"></i>
            </a>
          </li>
        <?php endif; ?>
        <?php if (get_field('spotify_link', 'option')) : ?>
          <li class="d-inline-block ms-2">
            <a href="<?php echo get_field('spotify_link', 'option'); ?>">
              <i class="fa-brands fa-spotify header-icon"></i>
            </a>
          </li>
        <?php endif; ?>
        <?php if (get_field('soundcloud_link', 'option')) : ?>
          <li class="d-inline-block ms-2">
            <a href="<?php echo get_field('soundcould_link', 'option'); ?>">
              <i class="fa-brands fa-soundcloud header-icon"></i>
            </a>
          </li>
        <?php endif; ?>
        <?php if (get_field('twitter_link', 'option')) : ?>
          <li class="d-inline-block ms-2">
            <a href="<?php echo get_field('twitter_link', 'option'); ?>">
              <i class="fa-brands fa-twitter header-icon"></i>
            </a>
          </li>
        <?php endif; ?>
      </ul>

    </div>
  </div>

  <!-- Search modal -->
  <div class="modal fade" id="blog-search-modal" tabindex="-1" aria-labelledby="blog-search-modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="blog-search-modal-label">
            <?php esc_html_e('Search for the article you want', 'blog'); ?>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php get_search_form(); ?>
          <div id="live-search-posts">
          </div>
        </div>
        <div class="modal-footer">
          <a class="m-auto text-white" id="live-search-view-more">
            <?php esc_html_e('Load More', 'blog'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>

</header>