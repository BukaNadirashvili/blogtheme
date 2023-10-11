import bootstrap from 'bootstrap/dist/js/bootstrap.bundle';
import '@fortawesome/fontawesome-free/js/all.js';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// live search

jQuery("#live-search").keyup(function () {
  const search_string = jQuery(this).val();

  jQuery('#live-search-view-more').attr('href', '/?s=' + search_string);

  if (search_string.length === 0) {
    jQuery('#live-search-posts').html('');
    return;
  }

  jQuery(document).ready(function () {
    jQuery.ajax({
      type: 'get',
      url: app_args.ajax_url,
      dataType: 'json',
      data: {
        action: 'live_search_load_more',
        search_string: search_string,
      },
      success: function (res) {

        jQuery('#live-search-posts').html(res);
      }
    });
  });


})

// Category slider
const category_slider = new Swiper(".category-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  autoHeight: true,
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 30
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 30
    },


  },
});

// Load more posts
jQuery(document).ready(function () {
  var paged = 1;
  jQuery('#load-more').on('click', function () {
    paged++;

    jQuery.ajax({
      type: 'POST',
      url: app_args.ajax_url,
      dataType: 'json',
      data: {
        action: 'blog_load_more',
        paged: paged,
      },
      beforeSend: function () {
        jQuery('.load-more-spinner').removeClass('d-none');
      },
      success: function (res) {
        jQuery('.load-more-spinner').addClass('d-none');
        if (paged >= res.max) {
          jQuery('#load-more').hide();
        }
        jQuery('.home-page-posts').append(res.html);
      }
    });
  });

  var paged = 1;
  jQuery('#search-load-more').on('click', function () {
    paged++;

    const urlParams = new URLSearchParams(window.location.search);
    const s = urlParams.get('s');

    jQuery.ajax({
      type: 'GET',
      url: app_args.ajax_url,
      dataType: 'json',
      data: {
        action: 'blog_search_load_more',
        paged: paged,
        s: s
      },
      beforeSend: function () {
        jQuery('.load-more-spinner').removeClass('d-none');
      },
      success: function (res) {
        jQuery('.load-more-spinner').addClass('d-none');
        if (paged >= res.max) {
          jQuery('#search-load-more').hide();
        }

        console.log(paged)
        jQuery('.search-page-posts').append(res.html);
      }
    });
  });


  jQuery('.prev-icon, .next-icon').hover(function(){
    jQuery(this).parent().siblings('a').css('color', '#00539CFF');
  }, function() {
    jQuery(this).parent().siblings('a').css('color', '#000');
  });
  
  jQuery('.prev-icon, .next-icon').click(function () {
    location.href = jQuery(this).parent().siblings('a').attr('href');
  });
  
  jQuery('.category-slide img').click(function(){
    location.href = jQuery(this).next('a').attr('href');
  });

});


