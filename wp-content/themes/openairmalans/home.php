<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 */
get_header(); ?>
  <section id="front">
    <div class="inner">
      <a href="#">
        <img id="logo"
          src="<?php echo get_template_directory_uri() . '/dist/images/front.png';?>"
          alt="Front <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
      </a>
      <a id="scroll-down" class="move-to-trigger" href="#artists">
        <span></span>
      </a>
    </div>
  </section>
  <section id="news">

  </section>
  <section id="artists">

  </section>
  <section id="timetable">

  </section>
  <section id="tickets">

  </section>
  <section id="info">

  </section>
  <section id="impressions">

  </section>
  <section id="contact">

  </section>

<?php get_footer(); ?>
