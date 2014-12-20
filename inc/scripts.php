<?php

if ( ! function_exists( '_sbs_fonts_url' ) ) :
/**
 * Register Google fonts for _sBS
 *
 * @since 1.0.1
 *
 * @return string Google fonts URL for the theme.
 */
function _sbs_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', PROJECT_TEXT_DOMAIN ) ) {
		$fonts[] = 'Raleway:500,600,700,400,300';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', PROJECT_TEXT_DOMAIN ) ) {
		$fonts[] = 'Roboto:400,300,300italic,400italic,500,500italic,700,700italic';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', PROJECT_TEXT_DOMAIN );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;



/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function _sbs_scripts() {
	// Add google fonts, used in the main stylesheet.
	wp_enqueue_style( '_sbs-google-fonts', _sbs_fonts_url(), array(), null );
	// Bootstrap style
	wp_enqueue_style( '_sbs-bootstrap', PROJECT_ASSETS . '/css/bootstrap.min.css', array(), PROJECT_BS_VERSION, 'all');
	// Font Awesome style
	wp_enqueue_style( '_sbs-fontawesome', PROJECT_ASSETS . '/css/font-awesome.min.css', array(), PROJECT_FA_VERSION, 'all');
	// SmartMenu Boostrrap style
	wp_enqueue_style( '_sbs-jquery.smartmenu.bootstrap', PROJECT_ASSETS . '/css/jquery.smartmenus.bootstrap.css', array(), PROJECT_SM_VERSION, 'all');
	// Project main stylesheet
	wp_enqueue_style( '_sbs-main-style', PROJECT_ASSETS . '/css/main.css', array(), PROJECT_VERSION, 'all');
	// Default Stylesheet
	wp_enqueue_style( '_sbs-style', get_stylesheet_uri(), array(), PROJECT_VERSION, 'all' );

	// jQuery Self-Hosted
	wp_enqueue_script( 'jquery' );
	// Bootstrap plugin
	wp_enqueue_script( '_sbs-bootstrap-js', PROJECT_ASSETS . '/js/bootstrap.min.js', array('jquery'), PROJECT_BS_VERSION, true );
	// SmartMenu jQuery plugin
	wp_enqueue_script( '_sbs-jquery.smartmenu', PROJECT_ASSETS . '/js/jquery.smartmenus.min.js', array('jquery'), PROJECT_SM_VERSION, true );
	// SmartMenu bootstrap addon
	wp_enqueue_script( '_sbs-jquery.smartmenu.boostrap', PROJECT_ASSETS . '/js/jquery.smartmenus.bootstrap.min.js', array('_sbs-jquery.smartmenu'), PROJECT_SM_VERSION, true );
	// Project scripts
	wp_enqueue_script( '_sbs-custom-js', PROJECT_ASSETS . '/js/custom.js', array(), PROJECT_VERSION, true );
	// Comment reply link fix
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_sbs_scripts' );