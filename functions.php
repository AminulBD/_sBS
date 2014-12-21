<?php
/**
 * This is theme function files
 *
 * @package _sBS
 * @since 1.0.0
 */

/**
 * Define theme primary settings.
 */

define("_SBS_NAME", '_sBS'); // Project Name
define("_SBS_VERSION", '1.0.1'); // Project Version
define("_SBS_BS_VERSION", '3.3.1'); // Bootstrap Version
define("_SBS_FA_VERSION", '4.2.0'); // FontAwesome Version
define("_SBS_SM_VERSION", '0.9.7'); // SmartMenu Version
define("_SBS_TEXT_DOMAIN", '_sbs'); // Project Text Domain
define("_SBS_ASSETS", get_template_directory_uri() . '/assets'); // Project Assets Directory
define("_SBS_INC", get_template_directory() . '/inc'); // Project Included Directory

/**
 * Load theme function files and library
 */

//Theme initial settings and functions
require _SBS_INC . '/theme_setup.php';

// Stylesheets and JavaScripts library for wp_enqueue_scripts.
require _SBS_INC . '/scripts.php';

// Implement the Custom Header feature.
//require _SBS_INC . '/custom-header.php';

// Custom template tags for this theme.
require _SBS_INC . '/template-tags.php';

// Bootstrap navigation walker.
require _SBS_INC . '/wp_bootstrap_navwalker.php';

// Custom functions that act independently of the theme templates.
require _SBS_INC . '/extras.php';

// Customizer additions.
require _SBS_INC . '/customizer.php';

// Load Jetpack compatibility file.
require _SBS_INC . '/jetpack.php';
