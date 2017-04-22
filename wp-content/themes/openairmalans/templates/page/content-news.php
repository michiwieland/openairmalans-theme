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
    <?php the_content(); ?>
  </div>
</article>
