<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 */

get_header(); ?>

	<div class="inner">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

			endwhile; // End of the loop.
			?>

	</div>

<?php get_footer();
