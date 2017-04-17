<?php
/**
 * The template for displaying search results pages
 *
 */

get_header(); ?>

<section id="news">
  <div class="inner">

		<?php get_search_form(); ?>

    <?php
		global $query_string;
		$search_query;
		if ( $query_string ) {

			// execute query
			$query_args = explode("&", $query_string);
			$search_query = array();

			if( strlen($query_string) > 0 ) {
				foreach($query_args as $key => $string) {
					$query_split = explode("=", $string);
					$search_query[$query_split[0]] = urldecode($query_split[1]);
				}
			}

			$search_query = new WP_Query($search_query);
		} else {

			// load all news
			$args = array(
		    'posts_per_page'   => -1,
		    'post_type'        => 'post',
			);
			$search_query = new WP_Query( $args );
		}

		if ( $search_query->have_posts() ) :
    	while ( $search_query->have_posts() ) : $search_query->the_post();

				get_template_part( 'template-parts/page/content', 'news' );

			endwhile; ?>

		<?php else : ?>

			<p><?php _e( 'Aktuell sind keine News vorhanden.', 'neocode' ); ?></p>

		<?php endif; ?>
	</div>
</section>

<?php get_footer();
