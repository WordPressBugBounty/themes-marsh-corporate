<?php

$marsh_corporate_default = marsh_corporate_get_default_theme_options();
/**
* Header Top Panel
*/
$wp_customize->add_panel( 'marsh_corporate_header_top_panel', array(
    'title'          => __( 'Top Header', 'marsh-corporate' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

// Contact Details Section
$wp_customize->add_section(
    'marsh_corporate_contact_details_section',
    array(
        'title'    => __( 'Contact Details', 'marsh-corporate' ),
        'panel'    => 'marsh_corporate_header_top_panel',
    )
);

// Show Contact Details
$wp_customize->add_setting( 
    'theme_options[marsh_corporate_show_contact_details]', 
    array(
        'default'           => $marsh_corporate_default['marsh_corporate_show_contact_details'],
        'sanitize_callback' => 'marsh_corporate_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[marsh_corporate_show_contact_details]',
    array(
        'label'       => __( 'Show Contact Details', 'marsh-corporate' ),
        'section'     => 'marsh_corporate_contact_details_section',
        'type'        => 'checkbox',
    )
);

// Address 1
$wp_customize->add_setting( 'theme_options[marsh_corporate_address_one]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_address_one'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_address_one]',
    array(
    'label'    => __( 'Address 1', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_contact_details_section',
    'type'     => 'text',
    )
);

// Address 2
$wp_customize->add_setting( 'theme_options[marsh_corporate_address_two]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_address_two'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_address_two]',
    array(
    'label'    => __( 'Address 2', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_contact_details_section',
    'type'     => 'text',
    )
);

// Phone Number
$wp_customize->add_setting( 'theme_options[marsh_corporate_phone_number]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_phone_number]',
    array(
    'label'    => __( 'Phone Number', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_contact_details_section',
    'type'     => 'text',
    )
);

// Opening Time
$wp_customize->add_setting( 'theme_options[marsh_corporate_opening_time]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_opening_time'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_opening_time]',
    array(
    'label'    => __( 'Opening Time', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_contact_details_section',
    'type'     => 'text',
    )
);

// Email ID
$wp_customize->add_setting( 'theme_options[marsh_corporate_email_id]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_email_id'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_email_id]',
    array(
    'label'    => __( 'Email ID', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_contact_details_section',
    'type'     => 'text',
    )
);

// Support Text
$wp_customize->add_setting( 'theme_options[marsh_corporate_support_text]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_support_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_support_text]',
    array(
    'label'    => __( 'Support Text', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_contact_details_section',
    'type'     => 'text',
    )
);

// Menu Button Section
$wp_customize->add_section(
    'marsh_corporate_menu_button_section',
    array(
        'title'    => __( 'Get Started', 'marsh-corporate' ),
        'panel'    => 'marsh_corporate_header_top_panel',
    )
);

// Show Menu Button
$wp_customize->add_setting( 
    'theme_options[marsh_corporate_show_menu_button]', 
    array(
        'default'           => $marsh_corporate_default['marsh_corporate_show_menu_button'],
        'sanitize_callback' => 'marsh_corporate_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[marsh_corporate_show_menu_button]',
    array(
        'label'       => __( 'Show Menu Button', 'marsh-corporate' ),
        'section'     => 'marsh_corporate_menu_button_section',
        'type'        => 'checkbox',
    )
);

// Button Text
$wp_customize->add_setting( 'theme_options[marsh_corporate_menu_button_text]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_menu_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_menu_button_text]',
    array(
    'label'    => __( 'Button Text', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_menu_button_section',
    'type'     => 'text',
    )
);

// Button Url
$wp_customize->add_setting( 'theme_options[marsh_corporate_menu_button_url]',
    array(
    'default'           => $marsh_corporate_default['marsh_corporate_menu_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    'transport'         => 'refresh',
    )
);

$wp_customize->add_control( 'theme_options[marsh_corporate_menu_button_url]',
    array(
    'label'    => __( 'Button Url', 'marsh-corporate' ),
    'section'  => 'marsh_corporate_menu_button_section',
    'type'     => 'url',
    )
);