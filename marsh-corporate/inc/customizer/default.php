<?php
/**
 * Default theme options.
 *
 * @package Marsh Corporate
 */

if ( ! function_exists( 'marsh_corporate_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function marsh_corporate_get_default_theme_options() {

	$marsh_corporate_defaults = array();

	// Contact Details
	$marsh_corporate_defaults['marsh_corporate_show_contact_details'] 		= true;
	$marsh_corporate_defaults['marsh_corporate_address_one']				= esc_html__('214 West Arnold St','marsh-corporate');
	$marsh_corporate_defaults['marsh_corporate_address_two']				= esc_html__('New York, NY 10002','marsh-corporate');
	$marsh_corporate_defaults['marsh_corporate_phone_number']				= esc_html__('(007) 123 456 7890','marsh-corporate');
	$marsh_corporate_defaults['marsh_corporate_opening_time']				= esc_html__('Mon-Fri 10:00am-7:30pm','marsh-corporate');
	$marsh_corporate_defaults['marsh_corporate_email_id']					= esc_html__('info@example.com','marsh-corporate');
	$marsh_corporate_defaults['marsh_corporate_support_text']				= esc_html__('24 X 7 online support','marsh-corporate');

	// Menu
	$marsh_corporate_defaults['marsh_corporate_show_menu_button'] 			= true;
	$marsh_corporate_defaults['marsh_corporate_menu_button_text']			= esc_html__('Get Started','marsh-corporate');
	$marsh_corporate_defaults['marsh_corporate_menu_button_url']			= esc_url('#','marsh-corporate');

	//General Section
	$marsh_corporate_defaults['readmore_text']					= esc_html__('Read More','marsh-corporate');
	$marsh_corporate_defaults['your_latest_posts_title']			= esc_html__('Blog','marsh-corporate');
	$marsh_corporate_defaults['excerpt_length']					= 10;
	$marsh_corporate_defaults['layout_options_blog']				= 'no-sidebar';
	$marsh_corporate_defaults['layout_options_archive']			= 'no-sidebar';
	$marsh_corporate_defaults['layout_options_page']				= 'no-sidebar';	
	$marsh_corporate_defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$marsh_corporate_defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'marsh-corporate' );

	// Pass through filter.
	$marsh_corporate_defaults = apply_filters( 'marsh_corporate_filter_default_theme_options', $marsh_corporate_defaults );
	return $marsh_corporate_defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'marsh_corporate_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function marsh_corporate_get_option( $key ) {

		$marsh_corporate_default_options = marsh_corporate_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$marsh_corporate_theme_options = (array)get_theme_mod( 'theme_options' );
		$marsh_corporate_theme_options = wp_parse_args( $marsh_corporate_theme_options, $marsh_corporate_default_options );

		$value = null;

		if ( isset( $marsh_corporate_theme_options[ $key ] ) ) {
			$value = $marsh_corporate_theme_options[ $key ];
		}

		return $value;

	}

endif;