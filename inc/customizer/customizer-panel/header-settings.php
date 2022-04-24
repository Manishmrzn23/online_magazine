<?php

/**
 * Viral Mag Theme Customizer
 *
 * @package Viral Mag
 */
$wp_customize->remove_control('header_text');
/* HEADER PANEL */
$wp_customize->add_panel('online_magazine_header_settings_panel', array(
    'title' => esc_html__('Header Settings', 'online-magazine'),
    'priority' => 15
));


$wp_customize->get_section('title_tagline')->panel = 'online_magazine_header_settings_panel';
$wp_customize->get_section('title_tagline')->title = esc_html__('Logo & Favicon', 'online-magazine');

$wp_customize->add_setting('online_magazine_hide_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control('online_magazine_hide_title', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_hide_tagline', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control('online_magazine_hide_tagline', array(
    'type' => 'checkbox',
    'section' => 'title_tagline',
    'label' => esc_html__('Hide Site Tagline', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_tagline_position', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'om-tagline-inline-logo',
    'transport' => 'postMessage'
));

$wp_customize->add_control('online_magazine_tagline_position', array(
    'section' => 'title_tagline',
    'type' => 'select',
    'label' => esc_html__('Title/Tagline Position', 'online-magazine'),
    'choices' => array(
        'om-tagline-inline-logo' => esc_html__('Inline With Logo', 'online-magazine'),
        'om-tagline-below-logo' => esc_html__('Below Logo', 'online-magazine')
    )
));

$wp_customize->add_setting('online_magazine_title_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_title_color', array(
    'section' => 'title_tagline',
    'label' => esc_html__('Title/Tagline Color', 'online-magazine')
)));

$wp_customize->selective_refresh->add_partial('online_magazine_hide_title', array(
    'selector' => ' #vm-site-branding',
    'render_callback' => 'online_magazine_header_logo'
));

$wp_customize->selective_refresh->add_partial('online_magazine_hide_tagline', array(
    'selector' => ' #vm-site-branding',
    'render_callback' => 'online_magazine_header_logo'
));

//TOP HEADER SETTINGS
$wp_customize->add_section('online_magazine_top_header_section', array(
    'title' => esc_html__('Top Header', 'online-magazine'),
    'panel' => 'online_magazine_header_settings_panel',
    'priority' => 20
));

$wp_customize->add_setting('online_magazine_top_header_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new online_magazine_Tab_Control($wp_customize, 'online_magazine_top_header_nav', array(
    'section' => 'online_magazine_top_header_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'online-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_top_header',
                'online_magazine_th_disable_mobile',
                'online_magazine_top_header_options_heading',
                'online_magazine_th_left_display',
                'online_magazine_th_right_display',
                'online_magazine_top_header_seperator',
                'online_magazine_social_link',
                'online_magazine_th_menu',
                'online_magazine_th_widget',
                'online_magazine_th_text'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'online-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_th_height',
                'online_magazine_th_bottom_border_color',
                'online_magazine_th_bg_color',
                'online_magazine_th_text_color',
                'online_magazine_th_anchor_color'
            ),
        )
    )
)));


$wp_customize->add_setting('online_magazine_top_header', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'on'
));

$wp_customize->add_control(new online_magazine_Switch_Control($wp_customize, 'online_magazine_top_header', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Enable Top Header', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    )
)));

$wp_customize->add_setting('online_magazine_th_disable_mobile', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => false,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_th_disable_mobile', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Disable in Mobile', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_top_header_options_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Heading_Control($wp_customize, 'online_magazine_top_header_options_heading', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Top Header Content', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_th_left_display', array(
    'default' => 'date',
    'sanitize_callback' => 'online_magazine_sanitize_choices',
));

$wp_customize->add_control('online_magazine_th_left_display', array(
    'section' => 'online_magazine_top_header_section',
    'type' => 'select',
    'label' => esc_html__('Display in Left Header', 'online-magazine'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'online-magazine'),
        'menu' => esc_html__('Menu', 'online-magazine'),
        'widget' => esc_html__('Widget', 'online-magazine'),
        'text' => esc_html__('HTML Text', 'online-magazine'),
        'date' => esc_html__('Date & Time', 'online-magazine'),
        'none' => esc_html__('None', 'online-magazine')
    )
));

$wp_customize->add_setting('online_magazine_th_right_display', array(
    'default' => 'social',
    'sanitize_callback' => 'online_magazine_sanitize_choices',
));

$wp_customize->add_control('online_magazine_th_right_display', array(
    'section' => 'online_magazine_top_header_section',
    'type' => 'select',
    'label' => esc_html__('Display in Right Header', 'online-magazine'),
    'choices' => array(
        'social' => esc_html__('Social Icons', 'online-magazine'),
        'menu' => esc_html__('Menu', 'online-magazine'),
        'widget' => esc_html__('Widget', 'online-magazine'),
        'text' => esc_html__('HTML Text', 'online-magazine'),
        'date' => esc_html__('Date & Time', 'online-magazine'),
        'none' => esc_html__('None', 'online-magazine')
    )
));

$wp_customize->add_setting('online_magazine_top_header_seperator', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_top_header_seperator', array(
    'section' => 'online_magazine_top_header_section'
)));

$wp_customize->add_setting('online_magazine_social_link', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Text_Info_Control($wp_customize, 'online_magazine_social_link', array(
    'label' => esc_html__('Social Icons', 'online-magazine'),
    'section' => 'online_magazine_top_header_section',
    'description' => sprintf(esc_html__('Add your %s here', 'online-magazine'), '<a href="#" target="_blank">Social Icons</a>')
)));

$wp_customize->add_setting('online_magazine_th_menu', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control('online_magazine_th_menu', array(
    'section' => 'online_magazine_top_header_section',
    'type' => 'select',
    'label' => esc_html__('Select Menu', 'online-magazine'),
    'choices' => online_magazine_menu_choice()
));

$wp_customize->add_setting('online_magazine_th_widget', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control('online_magazine_th_widget', array(
    'section' => 'online_magazine_top_header_section',
    'type' => 'select',
    'label' => esc_html__('Select Widget', 'online-magazine'),
    'choices' => online_magazine_widget_list()
));

$wp_customize->add_setting('online_magazine_th_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'California, TX 70240 | (1800) 456 7890',
));

$wp_customize->add_control(new online_magazine_Editor_Control($wp_customize, 'online_magazine_th_text', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Html Text', 'online-magazine'),
    'include_admin_print_footer' => true
)));

$wp_customize->add_setting('online_magazine_th_height', array(
    'sanitize_callback' => 'absint',
    'default' => 45,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_th_height', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Top Header Height', 'online-magazine'),
    'input_attrs' => array(
        'min' => 5,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_th_bottom_border_color', array(
    'default' => '',
    'sanitize_callback' => 'online_magazine_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Alpha_Color_Control($wp_customize, 'online_magazine_th_bottom_border_color', array(
    'label' => esc_html__('Top Header Bottom Border Color', 'online-magazine'),
    'description' => esc_html__('Leave Empty to Hide Border', 'online-magazine'),
    'section' => 'online_magazine_top_header_section'
)));

$wp_customize->add_setting('online_magazine_th_bg_color', array(
    'default' => '#cf0701',
    'sanitize_callback' => 'online_magazine_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Alpha_Color_Control($wp_customize, 'online_magazine_th_bg_color', array(
    'label' => esc_html__('Top Header Background', 'online-magazine'),
    'section' => 'online_magazine_top_header_section',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('online_magazine_th_text_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_th_text_color', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Text Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_th_anchor_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_th_anchor_color', array(
    'section' => 'online_magazine_top_header_section',
    'label' => esc_html__('Anchor(Link) Color', 'online-magazine')
)));

//MAIN HEADER SETTINGS
$wp_customize->add_section('online_magazine_main_header_section', array(
    'title' => esc_html__('Main Header', 'online-magazine'),
    'panel' => 'online_magazine_header_settings_panel',
    'priority' => 20
));

$wp_customize->add_setting('online_magazine_main_header_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new online_magazine_Tab_Control($wp_customize, 'online_magazine_main_header_nav', array(
    'section' => 'online_magazine_main_header_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'online-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_sticky_header',
                'online_magazine_mh_layout',
                'online_magazine_mh_show_search',
                'online_magazine_mh_show_cart',
                'online_magazine_mh_show_social',
                'online_magazine_mh_show_offcanvas',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'online-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_logo_height',
                'online_magazine_logo_padding',
                'online_magazine_mh_header_bg',
                'online_magazine_mh_height',                
                'online_magazine_mh_button_color',
                'online_magazine_mh_bg_color',
                'online_magazine_mh_bg_color_mobile',
                'online_magazine_mh_border_sep_start',
                'online_magazine_mh_border',
                'online_magazine_mh_border_color',
            ),
        ),
    )
)));

$wp_customize->add_setting('online_magazine_sticky_header', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new online_magazine_Switch_Control($wp_customize, 'online_magazine_sticky_header', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Enable Sticky Header', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    )
)));

$wp_customize->add_setting('online_magazine_mh_layout', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'header-style2'
));

$wp_customize->add_control(new online_magazine_Selector_Control($wp_customize, 'online_magazine_mh_layout', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Header Layout', 'online-magazine'),
    'class' => 'online-magazine-full-width',
    'options' => array(
        'header-style2' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/headers/header-2.png',
        'header-style3' => ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/images/headers/header-3.png'
    )
)));

$wp_customize->add_setting('online_magazine_mh_show_search', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_mh_show_search', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Show Search Button', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_show_cart', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => false
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_mh_show_cart', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Show Cart Button', 'online-magazine'),
    'active_callback' => 'online_magazine_is_woocommerce_activated'
)));

$wp_customize->add_setting('online_magazine_mh_show_social', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => false,
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_mh_show_social', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Show Social Icons', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_show_offcanvas', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_mh_show_offcanvas', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Show Offcanvas Menu', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_logo_height', array(
    'sanitize_callback' => 'absint',
    'default' => 60,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_logo_height', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Logo Height(px)', 'online-magazine'),
    'description' => esc_html__('The logo height will not increase beyond the header height. Increase the header height first. Logo will appear blur if the image size is small.', 'online-magazine'),
    'input_attrs' => array(
        'min' => 40,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_logo_padding', array(
    'sanitize_callback' => 'absint',
    'default' => 15,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_logo_padding', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Logo Top & Bottom Spacing(px)', 'online-magazine'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_mh_header_bg_url', array(
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('online_magazine_mh_header_bg_id', array(
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('online_magazine_mh_header_bg_repeat', array(
    'default' => 'no-repeat',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('online_magazine_mh_header_bg_size', array(
    'default' => 'cover',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('online_magazine_mh_header_bg_position', array(
    'default' => 'center-center',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

$wp_customize->add_setting('online_magazine_mh_header_bg_attach', array(
    'default' => 'scroll',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage'
));

// Registers example_background control
$wp_customize->add_control(new online_magazine_Background_Image_Control($wp_customize, 'online_magazine_mh_header_bg', array(
    'label' => esc_html__('Header Background', 'online-magazine'),
    'section' => 'online_magazine_main_header_section',
    'settings' => array(
        'image_url' => 'online_magazine_mh_header_bg_url',
        'image_id' => 'online_magazine_mh_header_bg_id',
        'repeat' => 'online_magazine_mh_header_bg_repeat', // Use false to hide the field
        'size' => 'online_magazine_mh_header_bg_size',
        'position' => 'online_magazine_mh_header_bg_position',
        'attach' => 'online_magazine_mh_header_bg_attach'
    )
)));

$wp_customize->add_setting('online_magazine_mh_height', array(
    'sanitize_callback' => 'absint',
    'default' => 65,
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_mh_height', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Header Height', 'online-magazine'),
    'input_attrs' => array(
        'min' => 50,
        'max' => 200,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_mh_button_color', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_button_color', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Buttons Color(Search, Social Icons, Offcanvas Menu)', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_bg_color', array(
    'default' => '#cf0701',
    'sanitize_callback' => 'online_magazine_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Alpha_Color_Control($wp_customize, 'online_magazine_mh_bg_color', array(
    'label' => esc_html__('Header Background Color', 'online-magazine'),
    'section' => 'online_magazine_main_header_section',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('online_magazine_mh_bg_color_mobile', array(
    'default' => '#cf0701',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_bg_color_mobile', array(
    'section' => 'online_magazine_main_header_section',
    'label' => esc_html__('Header Bar Background Color(Mobile)', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_border_sep_start', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_mh_border_sep_start', array(
    'section' => 'online_magazine_main_header_section'
)));

$wp_customize->add_setting('online_magazine_mh_border', array(
    'default' => 'vm-no-border',
    'sanitize_callback' => 'online_magazine_sanitize_choices',
    'transport' => 'postMessage'
));

$wp_customize->add_control('online_magazine_mh_border', array(
    'section' => 'online_magazine_main_header_section',
    'type' => 'select',
    'label' => esc_html__('Top and Bottom Border Settings', 'online-magazine'),
    'choices' => array(
        'vm-no-border' => esc_html__('Disable', 'online-magazine'),
        'vm-top-border' => esc_html__('Enable Top Border', 'online-magazine'),
        'vm-bottom-border' => esc_html__('Enable Bottom Border', 'online-magazine'),
        'vm-top-bottom-border' => esc_html__('Enable Top & Bottom Border', 'online-magazine')
    )
));

$wp_customize->add_setting('online_magazine_mh_border_color', array(
    'default' => '#EEEEEE',
    'sanitize_callback' => 'online_magazine_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Alpha_Color_Control($wp_customize, 'online_magazine_mh_border_color', array(
    'label' => esc_html__('Border Color', 'online-magazine'),
    'section' => 'online_magazine_main_header_section'
)));



//MENU SETTINGS
$wp_customize->add_section('online_magazine_menu_settings_section', array(
    'title' => esc_html__('Menu Settings', 'online-magazine'),
    'panel' => 'online_magazine_header_settings_panel',
    'priority' => 20
));

$wp_customize->add_setting('online_magazine_pm_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new online_magazine_Tab_Control($wp_customize, 'online_magazine_pm_nav', array(
    'section' => 'online_magazine_menu_settings_section',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'online-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_add_menu',
                'online_magazine_menu_seperator',
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Style', 'online-magazine'),
            'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'online_magazine_mh_menu_color',
                'online_magazine_mh_menu_hover_color',
                'online_magazine_mh_menu_hover_bg_color',
                'online_magazine_submenu_seperator',
                'online_magazine_mh_submenu_bg_color',
                'online_magazine_mh_submenu_color',
                'online_magazine_mh_submenu_hover_color',
                'online_magazine_toggle_button_color',
                'online_magazine_menu_dropdown_padding',
                'online_magazine_responsive_width'
            ),
        ),
        array(
            'name' => esc_html__('Typography', 'online-magazine'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'online_magazine_menu_typography',
            ),
        ),
    )
)));

$wp_customize->add_setting('online_magazine_add_menu', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Text_Info_Control($wp_customize, 'online_magazine_add_menu', array(
    'section' => 'online_magazine_menu_settings_section',
    'description' => sprintf(esc_html__('Add %1$s and configure the below Settings.', 'online-magazine'), '<a href="' . admin_url() . '/nav-menus.php" target="_blank">Menu</a>')
)));

$wp_customize->add_setting('online_magazine_menu_seperator', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_menu_seperator', array(
    'section' => 'online_magazine_menu_settings_section'
)));

$wp_customize->add_setting('online_magazine_mh_menu_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_menu_color', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('Menu Link Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_menu_hover_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_menu_hover_color', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('Menu Link Color - Hover', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_menu_hover_bg_color', array(
    'default' => '#cf0701',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_menu_hover_bg_color', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('Menu Link Background Color - Hover', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_submenu_seperator', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new online_magazine_Separator_Control($wp_customize, 'online_magazine_submenu_seperator', array(
    'section' => 'online_magazine_menu_settings_section'
)));

$wp_customize->add_setting('online_magazine_mh_submenu_bg_color', array(
    'default' => '#F2F2F2',
    'sanitize_callback' => 'online_magazine_sanitize_color_alpha',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Alpha_Color_Control($wp_customize, 'online_magazine_mh_submenu_bg_color', array(
    'label' => esc_html__('SubMenu Background Color', 'online-magazine'),
    'section' => 'online_magazine_menu_settings_section',
    'palette' => array(
        '#FFFFFF',
        '#000000',
        '#f5245f',
        '#1267b3',
        '#feb600',
        '#00C569',
        'rgba( 255, 255, 255, 0.2 )',
        'rgba( 0, 0, 0, 0.2 )'
    )
)));

$wp_customize->add_setting('online_magazine_mh_submenu_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_submenu_color', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('SubMenu Text/Link Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_mh_submenu_hover_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_mh_submenu_hover_color', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('SubMenu Link Color - Hover', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_toggle_button_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'online_magazine_toggle_button_color', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('Mobile Menu Button Color', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_menu_dropdown_padding', array(
    'default' => 0,
    'sanitize_callback' => 'absint',
    'transport' => 'postMessage'
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_menu_dropdown_padding', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('Menu item Top/Bottom Padding', 'online-magazine'),
    'description' => esc_html__('(in px) Select appropriate number so that the submenu on hover appears just below the header bar.', 'online-magazine'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_responsive_width', array(
    'sanitize_callback' => 'absint',
    'default' => 780
));

$wp_customize->add_control(new online_magazine_Range_Slider_Control($wp_customize, 'online_magazine_responsive_width', array(
    'section' => 'online_magazine_menu_settings_section',
    'label' => esc_html__('Enable Responsive Menu After(px)', 'online-magazine'),
    'description' => esc_html__('Set the value of the screen immediately after the menu item breaks into multiple line.', 'online-magazine'),
    'input_attrs' => array(
        'min' => 480,
        'max' => 1200,
        'step' => 10
    )
)));

$wp_customize->add_setting('online_magazine_menu_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_menu_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_menu_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_menu_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_menu_size', array(
    'default' => '14',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_menu_line_height', array(
    'default' => '3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_menu_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new online_magazine_Typography_Control($wp_customize, 'online_magazine_menu_typography', array(
    'label' => esc_html__('Menu Typography', 'online-magazine'),
    'description' => __('Select how you want your menu to appear.', 'online-magazine'),
    'section' => 'online_magazine_menu_settings_section',
    'settings' => array(
        'family' => 'online_magazine_menu_family',
        'style' => 'online_magazine_menu_style',
        'text_decoration' => 'online_magazine_menu_text_decoration',
        'text_transform' => 'online_magazine_menu_text_transform',
        'size' => 'online_magazine_menu_size',
        'line_height' => 'online_magazine_menu_line_height',
        'letter_spacing' => 'online_magazine_menu_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));


//PAGE TITLE
$wp_customize->add_section('online_magazine_page_title_options', array(
    'title' => esc_html__('Page Title', 'online-magazine'),
    'panel' => 'online_magazine_header_settings_panel',
));

$wp_customize->add_setting('online_magazine_page_title_nav', array(
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new online_magazine_Tab_Control($wp_customize, 'online_magazine_page_title_nav', array(
    'section' => 'online_magazine_page_title_options',
    'priority' => 1,
    'buttons' => array(
        array(
            'name' => esc_html__('Content', 'online-magazine'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
                'online_magazine_page_title_heading',
                'online_magazine_show_title',
                'online_magazine_breacrumb_heading',
                'online_magazine_breadcrumb'
            ),
            'active' => true,
        ),
        array(
            'name' => esc_html__('Typography', 'online-magazine'),
            'icon' => 'dashicons dashicons-edit',
            'fields' => array(
                'online_magazine_page_title_typography',
            ),
        ),
    )
)));

$wp_customize->add_setting('online_magazine_page_title_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new online_magazine_Heading_Control($wp_customize, 'online_magazine_page_title_heading', array(
    'section' => 'online_magazine_page_title_options',
    'label' => esc_html__('Page Title', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_show_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_show_title', array(
    'section' => 'online_magazine_page_title_options',
    'label' => esc_html__('Page Title', 'online-magazine'),
    'description' => esc_html__('It is the title of the page that appears below the menu', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_breacrumb_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'transport' => 'refresh'
));

$wp_customize->add_control(new online_magazine_Heading_Control($wp_customize, 'online_magazine_breacrumb_heading', array(
    'section' => 'online_magazine_page_title_options',
    'label' => esc_html__('Breadcrumb', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_breadcrumb', array(
    'sanitize_callback' => 'online_magazine_sanitize_checkbox',
    'default' => true
));

$wp_customize->add_control(new online_magazine_Toggle_Control($wp_customize, 'online_magazine_breadcrumb', array(
    'section' => 'online_magazine_page_title_options',
    'label' => esc_html__('BreadCrumb', 'online-magazine'),
    'description' => esc_html__('Breadcrumbs are a great way of letting your visitors find out where they are on your site.', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_page_title_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_page_title_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_page_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_page_title_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_page_title_size', array(
    'default' => '40',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_page_title_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_page_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_page_title_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(new online_magazine_Typography_Control($wp_customize, 'online_magazine_page_title_typography', array(
    'label' => esc_html__('Page Title Typography', 'online-magazine'),
    'description' => __('Page/Post/Archive Titles', 'online-magazine'),
    'section' => 'online_magazine_page_title_options',
    'settings' => array(
        'family' => 'online_magazine_page_title_family',
        'style' => 'online_magazine_page_title_style',
        'text_decoration' => 'online_magazine_page_title_text_decoration',
        'text_transform' => 'online_magazine_page_title_text_transform',
        'size' => 'online_magazine_page_title_size',
        'line_height' => 'online_magazine_page_title_line_height',
        'letter_spacing' => 'online_magazine_page_title_letter_spacing',
        'typocolor' => 'online_magazine_page_title_color'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));