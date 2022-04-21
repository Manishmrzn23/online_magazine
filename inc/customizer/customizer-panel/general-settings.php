<?php

/**
 * Viral Mag Theme Customizer
 *
 * @package Viral Mag
 */
/* GENERAL SETTINGS PANEL */
$wp_customize->add_panel('online_magazine_general_settings_panel', array(
    'title' => esc_html__('General Settings', 'online-magazine'),
    'priority' => 4
));

//GENERAL SETTINGS
$wp_customize->add_section('online_magazine_general_options_section', array(
    'title' => esc_html__('General Options', 'online-magazine'),
    'panel' => 'online_magazine_general_settings_panel'
));

//MOVE BACKGROUND AND COLOR SETTING INTO GENERAL SETTING PANEL
$wp_customize->get_control('background_color')->section = 'online_magazine_general_options_section';
$wp_customize->get_control('background_image')->section = 'online_magazine_general_options_section';
$wp_customize->get_control('background_preset')->section = 'online_magazine_general_options_section';
$wp_customize->get_control('background_position')->section = 'online_magazine_general_options_section';
$wp_customize->get_control('background_size')->section = 'online_magazine_general_options_section';
$wp_customize->get_control('background_repeat')->section = 'online_magazine_general_options_section';
$wp_customize->get_control('background_attachment')->section = 'online_magazine_general_options_section';

$wp_customize->get_control('background_color')->priority = 20;
$wp_customize->get_control('background_image')->priority = 20;
$wp_customize->get_control('background_preset')->priority = 20;
$wp_customize->get_control('background_position')->priority = 20;
$wp_customize->get_control('background_size')->priority = 20;
$wp_customize->get_control('background_repeat')->priority = 20;
$wp_customize->get_control('background_attachment')->priority = 20;

$wp_customize->add_setting('online_magazine_website_layout', array(
    'default' => 'wide',
    'sanitize_callback' => 'online_magazine_sanitize_choices',
));

$wp_customize->add_control('online_magazine_website_layout', array(
    'section' => 'online_magazine_general_options_section',
    'type' => 'radio',
    'label' => esc_html__('Website Layout', 'online-magazine'),
    'choices' => array(
        'wide' => esc_html__('Wide', 'online-magazine'),
        'boxed' => esc_html__('Boxed', 'online-magazine'),
        'fluid' => esc_html__('Fluid', 'online-magazine')
    )
));

$wp_customize->add_setting('online_magazine_fluid_container_width', array(
    'sanitize_callback' => 'absint',
    'default' => 80,
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_fluid_container_width', array(
    'section' => 'online_magazine_general_options_section',
    'label' => esc_html__('Website Container Width (%)', 'online-magazine'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_wide_container_width', array(
    'sanitize_callback' => 'absint',
    'default' => 1170,
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_wide_container_width', array(
    'section' => 'online_magazine_general_options_section',
    'label' => esc_html__('Website Container Width (px)', 'online-magazine'),
    'input_attrs' => array(
        'min' => 900,
        'max' => 1800,
        'step' => 10
    )
)));

$wp_customize->add_setting('online_magazine_container_padding', array(
    'sanitize_callback' => 'absint',
    'default' => 80,
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_container_padding', array(
    'section' => 'online_magazine_general_options_section',
    'label' => esc_html__('Website Container Padding (px)', 'online-magazine'),
    'input_attrs' => array(
        'min' => 10,
        'max' => 200,
        'step' => 5
    )
)));

$wp_customize->add_setting('online_magazine_sidebar_width', array(
    'sanitize_callback' => 'absint',
    'default' => 30,
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_sidebar_width', array(
    'section' => 'online_magazine_general_options_section',
    'label' => esc_html__('Sidebar Width (%)', 'online-magazine'),
    'input_attrs' => array(
        'min' => 20,
        'max' => 50,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_background_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_background_heading', array(
    'section' => 'online_magazine_general_options_section',
    'label' => esc_html__('Background', 'online-magazine'),
)));


/* BACK TO TOP SECTION */
$wp_customize->add_section('online_magazine_backtotop_section', array(
    'title' => esc_html__('Scroll Top', 'online-magazine'),
    'panel' => 'online_magazine_general_settings_panel',
));

$wp_customize->add_setting('online_magazine_backtotop', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Online_Magazine_Toggle_Control($wp_customize, 'online_magazine_backtotop', array(
    'section' => 'online_magazine_backtotop_section',
    'label' => esc_html__('Back to Top Button', 'online-magazine'),
    'description' => esc_html__('A button on click scrolls to the top of the page.', 'online-magazine')
)));
