<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 */
get_header(); ?>

  <?php get_template_part( 'template-parts/front' ); ?>
  <?php get_template_part( 'template-parts/news' ); ?>
  <?php get_template_part( 'template-parts/artists' ); ?>
  <?php get_template_part( 'template-parts/timetable' ); ?>
  <?php get_template_part( 'template-parts/tickets' ); ?>
  <?php get_template_part( 'template-parts/info' ); ?>
  <?php get_template_part( 'template-parts/gallery' ); ?>
  <?php get_template_part( 'template-parts/contact' ); ?>

<?php get_footer(); ?>
