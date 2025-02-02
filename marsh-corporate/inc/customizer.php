<?php
/**
 * Marsh Corporate Theme Customizer
 *
 * @package Marsh Corporate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function marsh_corporate_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Register custom section types.
	$wp_customize->register_section_type( 'marsh_corporate_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new marsh_corporate_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Marsh Corporate Pro', 'marsh-corporate' ),
				'pro_text' => esc_html__( 'Buy Pro', 'marsh-corporate' ),
				'pro_url'  => 'http://www.creativthemes.com/downloads/marsh-corporate-pro/',
				'priority'  => 10,
			)
		)
	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load topbar.
	include get_template_directory() . '/inc/customizer/topbar.php';

	// Load theme sections.
	include get_template_directory() . '/inc/customizer/theme-section.php';
	
}
add_action( 'customize_register', 'marsh_corporate_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function marsh_corporate_customize_preview_js() {
	wp_enqueue_script( 'marsh_corporate_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'marsh_corporate_customize_preview_js' );
/**
 *
 */
function marsh_corporate_customize_backend_scripts() {

	wp_enqueue_style( 'marsh-corporate-fontawesome-all', get_template_directory_uri() . '/assets/css/all.css' );
	wp_enqueue_style( 'marsh-corporate-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'marsh-corporate-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'marsh_corporate_customize_backend_scripts', 10 );
