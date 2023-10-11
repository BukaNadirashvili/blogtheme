<?php
/*
Template Name: Home Page
*/
get_header();

get_template_part( 'template-parts/mosaic' );
get_template_part( 'template-parts/category-slider' );
get_template_part( 'template-parts/posts' );


get_footer();

?>