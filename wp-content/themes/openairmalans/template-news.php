<?php
/**
 * Template Name: News
 */

// Timber is doing it's magic - have a look in template/section/...
?>

<section id="news">
  <div class="inner">
    <div class="row-layout">

      <?php
      if ( have_posts() ) :

      	while ( have_posts() ) : the_post(); ?>

          <!-- News article -->
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Post Thumbnail -->
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'neocode-featured-image' ); ?>
                </a>
              </div>
            <?php endif; ?>

            <!-- Meta Information -->
            <header>
              <a href="<?php the_permalink() ?>">
                <h2><?php the_title(); ?></h2>
              </a>
            </header>

            <!-- Post content -->
            <div class="content">
              <?php the_excerpt(); ?>
            </div>
          </article>

        <?php endwhile; ?>

      <?php else : ?>

        <p><?php _e( 'Aktuell sind keine News vorhanden.', 'neocode' ); ?></p>

      <?php endif; ?>
    </div>

    <a class="button" href="/?s"><?php _e( 'Alle News Meldungen', 'neocode' ); ?></a>

  </div>
</section>
