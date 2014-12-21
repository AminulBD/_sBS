<?php
/**
 * TutorialFor.Me Theme Customizer
 *
 * @package _sBS
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _sbs_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '_sbs_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _sbs_customize_preview_js() {
	wp_enqueue_script( '_sbs_customizer', _SBS_ASSETS . '/js/customizer.js', array( 'customize-preview' ), _SBS_VERSION, true );
}
add_action( 'customize_preview_init', '_sbs_customize_preview_js' );
