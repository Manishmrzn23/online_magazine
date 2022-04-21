<?php

/* HEADER PANEL */
$wp_customize->get_setting('blogname')->transport = 'postMessage';
$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
$wp_customize->get_setting('custom_logo')->transport = 'refresh';

$wp_customize->add_panel('online_magazine_header_settings_panel', array(
    'title' => esc_html__('Header Settings', 'online-magazine'),
    'priority' => 40
));

$wp_customize->get_section('title_tagline')->panel = 'online_magazine_header_settings_panel';
$wp_customize->get_section('title_tagline')->title = esc_html__('Title & Logo', 'online-magazine');
$wp_customize->remove_control('header_text');

$wp_customize->add_setting('online_magazine_titletagline_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Online_Magazine_Tab_Control($wp_customize, 'online_magazine_titletagline_nav', array(
    'section' => 'title_tagline',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'online-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'custom_logo',
                'blogname',
                'blogdescription',
                'online_magazine_hide_title',
                'online_magazine_hide_tagline',
                'online_magazine_title_tagline_position',
                'site_icon'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'online-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_logo_width',
                'online_magazine_tl_color_heading',
                'online_magazine_title_color',
                'online_magazine_tagline_color',
            ),
        )
    ),
)));

$wp_customize->add_setting('online_magazine_hide_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true,
));

$wp_customize->add_control('online_magazine_hide_title', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_hide_tagline', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true,
));

$wp_customize->add_control('online_magazine_hide_tagline', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Tagline', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_logo_width', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_setting('online_magazine_logo_width_tablet', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_setting('online_magazine_logo_width_mobile', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_control(new Online_Magazine_Responsive_Range_Slider_Control($wp_customize, 'online_magazine_logo_width', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Logo Width(px)', 'online-magazine'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 1000,
        'step' => 1,
    ),
    'settings' => array(
        'desktop' => 'online_magazine_logo_width',
        'tablet' => 'online_magazine_logo_width_tablet',
        'mobile' => 'online_magazine_logo_width_mobile',
    ),
)));

$wp_customize->add_setting('online_magazine_tl_color_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_tl_color_heading', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Colors', 'online-magazine'),
)));


$wp_customize->add_setting('online_magazine_title_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_title_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Title Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_tagline_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_tagline_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Site Tagline Color', 'online-magazine')
)));

/** Main Header Options */
$wp_customize->add_section('online_magazine_main_header_section', array(
    'title' => esc_html__('Main Header', 'online-magazine'),
    'panel' => 'online_magazine_header_settings_panel',
    'priority' => 30
));

$wp_customize->add_setting('online_magazine_main_header_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Online_Magazine_Tab_Control($wp_customize, 'online_magazine_main_header_nav', array(
    'section' => 'online_magazine_main_header_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'online-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_sticky_header_enable',
                'online_magazine_enable_header_border'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'online-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_mh_color_heading',
                'online_magazine_mh_bg_color',
                'online_magazine_mh_spacing_heading',
                'online_magazine_mh_spacing',
            ),
        )
    )
)));

$wp_customize->add_setting('online_magazine_sticky_header_enable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_sticky_header_enable', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Sticky Header', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
))));

$wp_customize->add_setting('online_magazine_enable_header_border', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Online_Magazine_Toggle_Control($wp_customize, 'online_magazine_enable_header_border', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Enable Header Top Border', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_color_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_mh_color_heading', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Colors', 'online-magazine'),
    'priority' => 5
)));

$wp_customize->add_setting('online_magazine_mh_bg_color', array(
    'sanitize_callback' => 'online_magazine_sanitize_color_alpha'
));

$wp_customize->add_control(new Online_Magazine_Alpha_Color_Control($wp_customize, 'online_magazine_mh_bg_color', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Header Background Color', 'online-magazine'),
    'priority' => 5
)));

$wp_customize->add_setting('online_magazine_mh_spacing_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_mh_spacing_heading', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Spacing', 'online-magazine'),
)));

$wp_customize->add_setting('online_magazine_mh_spacing_left_desktop', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_setting('online_magazine_mh_spacing_top_desktop', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_setting('online_magazine_mh_spacing_bottom_desktop', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_setting('online_magazine_mh_spacing_right_desktop', array(
    'sanitize_callback' => 'online_magazine_sanitize_number_blank',
));

$wp_customize->add_control(new Online_Magazine_Dimensions_Control($wp_customize, 'online_magazine_mh_spacing', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Header Spacing(px)', 'online-magazine'),
    'settings' => array(
        'desktop_left' => 'online_magazine_mh_spacing_left_desktop',
        'desktop_top' => 'online_magazine_mh_spacing_top_desktop',
        'desktop_bottom' => 'online_magazine_mh_spacing_bottom_desktop',
        'desktop_right' => 'online_magazine_mh_spacing_right_desktop'
    ),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1,
    ),
    'responsive' => false
)));

$wp_customize->add_setting('online_magazine_header_upgrade_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Upgrade_Info_Control($wp_customize, 'online_magazine_header_upgrade_text', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('For more header layouts and settings,', 'online-magazine'),
    'choices' => array(
        esc_html__('6 header styles', 'online-magazine'),
        esc_html__('Option to enable/disable top header', 'online-magazine'),
        esc_html__('Search and social button option on header', 'online-magazine'),
        esc_html__('7 menu hover styles', 'online-magazine'),
        esc_html__('Mega menu', 'online-magazine'),
        esc_html__('Advanced header color options', 'online-magazine'),
        esc_html__('Option for different header banner on each post/page', 'online-magazine'),
    ),
    'priority' => 100
)));

/* Primary Menu */
$wp_customize->add_section('online_magazine_menu_settings', array(
    'title' => esc_html__('Menu Settings', 'online-magazine'),
    'panel' => 'online_magazine_header_settings_panel',
));

$wp_customize->add_setting('online_magazine_pm_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Online_Magazine_Tab_Control($wp_customize, 'online_magazine_pm_nav', array(
    'section' => 'online_magazine_menu_settings',
    'buttons' => array(
        array(
            'name' => esc_html__('Style', 'online-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_pm_color_heading',
                'online_magazine_pm_separator1',
                'online_magazine_pm_menu_link_color',
                'online_magazine_pm_menu_link_hover_color',
                'online_magazine_pm_menu_hover_bg_color',
                'online_magazine_pm_separator2',
                'online_magazine_pm_submenu_bg_color',
                'online_magazine_pm_submenu_link_color',
                'online_magazine_pm_submenu_link_hover_color',
                'online_magazine_pm_submenu_link_bg_color',
                'online_magazine_pm_spacing_heading',
                'online_magazine_pm_menu_bar_spacing',
                'online_magazine_pm_menu_link_spacing',
                'online_magazine_pm_submenu_link_spacing',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Typography', 'online-magazine'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'online_magazine_menu',
            ),
        ),
    )
)));

/* * **************************************************************** */
$wp_customize->add_setting('online_magazine_pm_color_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_pm_color_heading', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('Colors', 'online-magazine'),
)));

/* * **************************************************************** */

$wp_customize->add_setting('online_magazine_pm_menu_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_menu_link_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('Menu Link Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_pm_menu_link_hover_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_menu_link_hover_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('Menu Link Color - Hover', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_pm_menu_hover_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_menu_hover_bg_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('Menu Link Backgroud Color - Hover', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_pm_separator2', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Separator_Control($wp_customize, 'online_magazine_pm_separator2', array(
    'section' => 'online_magazine_menu_settings',
)));

/* * **************************************************************** */

$wp_customize->add_setting('online_magazine_pm_submenu_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_submenu_bg_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('SubMenu Background Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_pm_submenu_link_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_submenu_link_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('SubMenu Link Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_pm_submenu_link_hover_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_submenu_link_hover_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('SubMenu Link Color - Hover', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_pm_submenu_link_bg_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_pm_submenu_link_bg_color', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('SubMenu Link Backgroud Color - Hover', 'online-magazine')
)));

/* * **************************************************************** */
$wp_customize->add_section('online_magazine_menu_typography', array(
    'panel' => 'online_magazine_typography',
    'title' => esc_html__('Menu', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_menu_family', array(
    'default' => 'Oswald',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('online_magazine_menu_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('online_magazine_menu_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('online_magazine_menu_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('online_magazine_menu_size', array(
    'default' => '14',
    'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('online_magazine_menu_line_height', array(
    'default' => '2.6',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_setting('online_magazine_menu_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_menu', array(
    'label' => esc_html__('Menu Typography', 'online-magazine'),
    'section' => 'online_magazine_menu_settings',
    'settings' => array(
        'family' => 'online_magazine_menu_family',
        'style' => 'online_magazine_menu_style',
        'text_decoration' => 'online_magazine_menu_text_decoration',
        'text_transform' => 'online_magazine_menu_text_transform',
        'size' => 'online_magazine_menu_size',
        'line_height' => 'online_magazine_menu_line_height',
        'letter_spacing' => 'online_magazine_menu_letter_spacing',
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_menu_upgrade_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Upgrade_Info_Control($wp_customize, 'online_magazine_menu_upgrade_text', array(
    'section' => 'online_magazine_menu_settings',
    'label' => esc_html__('For more settings,', 'online-magazine'),
    'choices' => array(
        esc_html__('Option to display search button, social icons & CTA button', 'online-magazine'),
        esc_html__('7 different menu styles', 'online-magazine'),
        esc_html__('Option to diplay different menu in mobile', 'online-magazine'),
        esc_html__('Set spacing of menu and submenu', 'online-magazine'),
        esc_html__('Set mobile menu breakpoint', 'online-magazine'),
    ),
    'priority' => 100
)));

$wp_customize->selective_refresh->add_partial(
        'blogname', array(
    'selector' => '.site-title a',
    'render_callback' => 'online_magazine_customize_partial_blogname',
        )
);
$wp_customize->selective_refresh->add_partial(
        'blogdescription', array(
    'selector' => '.site-description',
    'render_callback' => 'online_magazine_customize_partial_blogdescription',
        )
);
