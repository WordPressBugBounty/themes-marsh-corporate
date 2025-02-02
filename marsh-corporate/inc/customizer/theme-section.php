<?php
/**
 * Theme Options.
 *
 * @package Marsh Corporate
 */

$marsh_corporate_default = marsh_corporate_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'marsh-corporate' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('Layout Option', 'marsh-corporate'),
'panel'       => 'theme_option_panel'    
));

//Layout Options for Blog
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $marsh_corporate_default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_corporate_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_corporate_Image_Radio_Control($wp_customize, 'theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Blog Layout', 'marsh-corporate'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

//Layout Options for Archive
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $marsh_corporate_default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_corporate_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_corporate_Image_Radio_Control($wp_customize, 'theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Archive Layout', 'marsh-corporate'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);


//Layout Options for Pages
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $marsh_corporate_default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_corporate_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_corporate_Image_Radio_Control($wp_customize, 'theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Page Layout', 'marsh-corporate'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

//Layout Options for Single Post
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $marsh_corporate_default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_corporate_sanitize_select'
	)
);

$wp_customize->add_control(new marsh_corporate_Image_Radio_Control($wp_customize, 'theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Single Post Layout', 'marsh-corporate'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/left-sidebar.png',						
		'right-sidebar' => esc_url(get_template_directory_uri()) . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> esc_url(get_template_directory_uri()) . '/assets/images/no-sidebar.png',
		),	
	))
);

// Blog Post Options
$wp_customize->add_section('section_blog_options', 
	array(    
	'title'       => __('Blog Post Options', 'marsh-corporate'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'theme_options[your_latest_posts_title]',
	array(
	'default'           => $marsh_corporate_default['your_latest_posts_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[your_latest_posts_title]',
	array(
	'label'    => __( 'Blog Page Title', 'marsh-corporate' ),
	'section'  => 'section_blog_options',
	'type'     => 'text',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $marsh_corporate_default['excerpt_length'],
	'sanitize_callback' => 'marsh_corporate_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => __( 'Excerpt Length', 'marsh-corporate' ),
	'description' => __( 'in words', 'marsh-corporate' ),
	'section'     => 'section_blog_options',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 75px;' ),
) );

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $marsh_corporate_default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'marsh_corporate_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Read More Text', 'marsh-corporate' ),
	'section'  => 'section_blog_options',
	'type'     => 'text',
	)
);

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Copyright', 'marsh-corporate'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $marsh_corporate_default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'marsh-corporate' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);