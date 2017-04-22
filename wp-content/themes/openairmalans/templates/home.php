<?php
namespace Neocode\Theme;
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 */
get_header(); ?>

<?php
// Page Query
$args = array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
);
$page_query = new \WP_Query( $args );
?>

<?php
// Loop all pages
if($page_query->have_posts()): ?>

	<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>

		<?php // Load template file
		get_template_part( 'template-' . Helpers::get_template_name() ); ?>

	<?php endwhile; ?>

<?php else: ?>

	<p>Keine Seiten sind vorhanden</p>

<?php endif; ?>

<?php get_footer(); ?>
