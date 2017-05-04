<?php
/**
 * The template for displaying all single posts
 *
 */

get_header(); ?>

	<div class="inner">

		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="fa fa-chevron-left"></span>' . __( 'Vorheriger Post', 'neocode' ),
					'next_text' => __( 'Nächster Post', 'neocode' ) . '<span class="fa fa-chevron-right"></span>'
				) );

			endwhile; // End of the loop.
		?>

	</div>

<?php get_footer();
