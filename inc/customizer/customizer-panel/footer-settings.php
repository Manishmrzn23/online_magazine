<?php

$wp_customize->add_section('online_magazine_footer_settings', array(
    'title' => esc_html__('Footer Settings', 'online-magazine'),
    'priority' => 60
));
$wp_customize->add_setting('online_magazine_footer_section_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_footer_section_heading', array(
    'section' => 'online_magazine_footer_settings',
    'label' => esc_html__('Footer Section', 'online-magazine'),
)));


$wp_customize->add_setting( 'online_magazine_footer_logo', array(
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'online_magazine_footer_logo',
    array(
        'label'    => esc_html__('Footer Logo', 'online-magazine'),
        'section'  => 'online_magazine_footer_settings',
        'settings' => 'online_magazine_footer_logo',
    )
));
$wp_customize->add_setting('online_magazine_footer_menu_info', array(
    'sanitize_callback' => 'square_plus_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Text_Info_Control($wp_customize, 'online_magazine_footer_menu_info', array(
    'label' => esc_html__('For Footer Menu*', 'online-magazine'),
    'section' => 'online_magazine_footer_settings',
    'description' =>  esc_html__('You have to go to the Menu Section and add the items into footer menu.', 'online-magazine')
)));



$wp_customize->add_setting('online_magazine_social_icons', array(
    'sanitize_callback' => 'online_magazine_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'icon' => 'icofont-facebook',
            'text' => '',
            'enable' => 'on'
        )
    ))
));

$wp_customize->add_control(new Online_Magazine_Repeater_Control($wp_customize, 'online_magazine_social_icons', array(
    'label' => esc_html__('Add Social Link', 'online-magazine'),
    'section' => 'online_magazine_footer_settings',
    'box_label' => esc_html__('Social Links', 'online-magazine'),
    'add_label' => esc_html__('Add New', 'online-magazine'),
), array(
    'icon' => array(
        'type' => 'icon',
        'label' => esc_html__('Select Icon', 'online-magazine'),
        'default' => 'icofont-facebook'
    ),
    'link' => array(
        'type' => 'text',
        'label' => esc_html__('Add Link', 'online-magazine'),
        'default' => ''
    ),
    'enable' => array(
        'type' => 'toggle',
        'label' => esc_html__('Enable', 'online-magazine'),
        'toggle' => array(
            'on' => 'Yes',
            'off' => 'No'
        ),
        'default' => 'on'
    )
)));

$wp_customize->add_setting('online_magazine_footer_copyright', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('logen all rights reserved', 'online-magazine'),

));

$wp_customize->add_control('online_magazine_footer_copyright', array(
    'section' => 'online_magazine_footer_settings',
    'type' => 'textarea',
    'label' => esc_html__('Copyright Text', 'online-magazine')
));
