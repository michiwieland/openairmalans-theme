<?php
namespace Neocode\Theme;

/**
 *  Constants
 */

// Path
define( 'THEME_DIR',            __DIR__ );
define( 'THEME_TEMPLATES_DIR',  THEME_DIR . '/templates/' );
define( 'THEME_FUNCTIONS_DIR',  THEME_DIR . '/functions/' );
define( 'THEME_LIB_DIR',        THEME_DIR . '/lib/' );
define( 'THEME_DIR_URI',        get_template_directory_uri() );

// Include files
require_once ( THEME_FUNCTIONS_DIR . '/admin.php' );
require_once ( THEME_FUNCTIONS_DIR . '/post-type.php' );
require_once ( THEME_FUNCTIONS_DIR . '/setup.php' );
require_once ( THEME_FUNCTIONS_DIR . '/template.php' );
require_once ( THEME_FUNCTIONS_DIR . '/twig-extend.php' );
require_once ( THEME_FUNCTIONS_DIR . '/helpers.php' );
require_once ( THEME_FUNCTIONS_DIR . '/plugin-dependencies.php' );
require_once ( THEME_FUNCTIONS_DIR . '/custom-fields.php' );

// Init class
new Admin();
new CPT();
new Setup();
new Template();
new PluginDependencies();
new CustomFields();

// Some migration script - only temporary
update_option('stylesheet', get_option('template') );


/**
 *  Borrowed from Sage-Theme and customized
 */

/*
// Fix get_stylesheet_directory() function
add_filter('stylesheet', function ($stylesheet) {
    return dirname($stylesheet);
});

// Load WP default templates from /templates folder
add_action('after_switch_theme', function () {
    $stylesheet = get_option('stylesheet');
    if (basename($stylesheet) !== 'templates') {
        update_option('stylesheet', $stylesheet . '/templates');
    }
});
*/