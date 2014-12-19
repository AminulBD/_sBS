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

define("PROJECT_NAME", '_sBS'); // Project Name
define("PROJECT_VERSION", '1.0.0'); // Project Version
define("PROJECT_BS_VERSION", '3.3.1'); // Bootstrap Version
define("PROJECT_FA_VERSION", '4.2.0'); // FontAwesome Version
define("PROJECT_SM_VERSION", '0.9.7'); // SmartMenu Version
define("PROJECT_TEXT_DOMAIN", '_sbs'); // Project Text Domain
define("PROJECT_ASSETS", get_template_directory_uri() . '/assets'); // Project Assets Directory
define("PROJECT_INC", get_template_directory() . '/inc'); // Project Included Directory

/**
 * Load theme function files and library
 */

//Theme initial settings and functions
require PROJECT_INC . '/theme_setup.php';

// Stylesheets and JavaScripts library for wp_enqueue_scripts.
require PROJECT_INC . '/scripts.php';

// Implement the Custom Header feature.
//require PROJECT_INC . '/custom-header.php';

// Custom template tags for this theme.
require PROJECT_INC . '/template-tags.php';

// Bootstrap navigation walker.
require PROJECT_INC . '/wp_bootstrap_navwalker.php';

// Custom functions that act independently of the theme templates.
require PROJECT_INC . '/extras.php';

// Customizer additions.
require PROJECT_INC . '/customizer.php';

// Load Jetpack compatibility file.
require PROJECT_INC . '/jetpack.php';
