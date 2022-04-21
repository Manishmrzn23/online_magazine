<?php

$wp_customize->get_section('colors')->title = esc_html__('Color Settings', 'online-magazine');
$wp_customize->get_section('colors')->priority = 30;

//COLOR SETTINGS
$wp_customize->add_setting('online_magazine_template_color', array(
    'default' => '#FFC107',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_template_color', array(
    'section' => 'colors',
    'label' => esc_html__('Theme Primary Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_color_section_seperator1', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Separator_Control($wp_customize, 'online_magazine_color_section_seperator1', array(
    'section' => 'colors'
)));

$wp_customize->add_setting('online_magazine_color_content_info', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Text_Info_Control($wp_customize, 'online_magazine_color_content_info', array(
    'section' => 'colors',
    'label' => esc_html__('Content Colors', 'online-magazine'),
    'description' => esc_html__('This settings apply only in the single posts (ie page and post detail pages only)', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_content_header_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_content_header_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Header Color(H1, H2, H3, H4, H5, H6)', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_content_text_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_content_text_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Text Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_content_link_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_content_link_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_content_link_hov_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_content_link_hov_color', array(
    'section' => 'colors',
    'label' => esc_html__('Content Link Hover Color', 'online-magazine'),
)));

$wp_customize->add_setting('online_magazine_color_upgrade_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Upgrade_Info_Control($wp_customize, 'online_magazine_color_upgrade_text', array(
    'section' => 'colors',
    'label' => esc_html__('For more color options,', 'online-magazine'),
    'priority' => 100
)));
