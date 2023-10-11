<?php
/*
Template Name: Contact Page
*/

get_header();
?>

<?php echo do_shortcode( get_field('shortcode') ); ?>

<?php
get_footer();
?>