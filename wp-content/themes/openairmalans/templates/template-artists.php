<?php
/**
 * Template Name: Künstler
 */
?>

<?php
// Page Query
$args = array(
	'post_type' => 'artists',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
);
$page_query = new \WP_Query( $args );
?>

<section id="artists">
  <div class="inner">
    <h1><span>Künstler</span></h1>
      <div class="row-layout">
        <?php
        if ( have_posts() ) :

          while ($page_query->have_posts()) : $page_query->the_post(); ?>

            <div class="artist">

              <?php the_post_thumbnail('full', [
                'class' => 'image',
                'alt' => carbon_get_post_meta( get_the_ID(), 'artist-name' ); ]); ?>

              <a href="<?php carbon_get_post_meta( get_the_ID(), 'artist-url' ); ?>"
                 class="overlay"
                 data-lity data-title="<?php carbon_get_post_meta( get_the_ID(), 'artist-name' ); ?>"
                 data-desc="<?php carbon_get_post_meta( get_the_ID(), 'artist-description' ); ?>">
                <p><?php carbon_get_post_meta( get_the_ID(), 'artist-name' ); ?></p>
              </a>

            </div>

          <?php endwhile; ?>

        <?php else : ?>

          <p><?php _e( 'Die Künstler werden bald veröffentlicht.', 'neocode' ); ?></p>

        <?php endif; ?>
      </div>
  </div>
</section>
