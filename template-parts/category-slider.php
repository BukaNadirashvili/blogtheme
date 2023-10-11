<?php
  // Get categories
  $categories = get_field('categories_categories');

?>

<?php  if($categories) : ?>
  <section>
    <div class="container-lg mt-5">
      <div class="swiper category-slider">
        <div class="swiper-wrapper">
          <?php foreach($categories as $category) : ?>
            <div class="swiper-slide position-relative category-slide">
              <img class="w-100 border-image" src="<?php echo get_field('image', $category->taxonomy . '_' . $category->term_id)['sizes']['thumbnail']; ?>" alt="<?php echo get_field('image', $category->taxonomy . '_' . $category->term_id)['alt']; ?>">
               <a class="position-absolute d-block top-50 start-50 translate-middle fw-bold" href="<?php echo get_category_link($category); ?>">
                <?php echo $category->name; ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>