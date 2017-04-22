<?php
/**
 * The header
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 *
 */
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <!-- START HEAD -->
  <?php wp_head(); ?>
  <!-- END HEAD -->
</head>
<body <?php body_class(); ?>>

  <!-- HEADER -->
  <header>

    <!-- NAVIGATION -->
    <nav id="navigation">

      <div class="inner">
        <!-- LOGO -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
  				<img id="logo"
            src="<?= THEME_DIR_URI . '/dist/images/logo.png';?>"
            alt="Logo <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </a>

        <!-- MOBILE HAMBURGER -->
        <i id="hamburger" class="fa fa-bars" aria-hidden="true"></i>

        <!-- MENU -->
        <?php wp_nav_menu( array(
          'theme_location' => 'top',
          'menu_id'        => 'top-menu',
        ));?>
      </div>

    </nav>

  </header>

  <main>
