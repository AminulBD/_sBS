<?php

/**
 * Enqueue scripts and styles.
 * 
 * @package _sBS
 * @since 1.0.0
 */
function _sbs_scripts() {
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