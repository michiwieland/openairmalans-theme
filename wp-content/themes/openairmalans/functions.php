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