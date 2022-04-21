<?php

// Add the typography panel.
$wp_customize->add_panel('online_magazine_typography_settings_panel', array(
    'priority' => 5,
    'title' => esc_html__('Typography Settings', 'online-magazine')
));

// Add the body typography section.
$wp_customize->add_section('online_magazine_body_typography', array(
    'panel' => 'online_magazine_typography_settings_panel',
    'title' => esc_html__('Body', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_body_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_body_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_body_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_body_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_body_size', array(
    'default' => '15',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_body_line_height', array(
    'default' => '1.6',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_body_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_body_color', array(
    'default' => '#333333',
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_body_typography', array(
    'label' => esc_html__('Body Typography', 'online-magazine'),
    'description' => __('Select how you want your body to appear.', 'online-magazine'),
    'section' => 'online_magazine_body_typography',
    'settings' => array(
        'family' => 'online_magazine_body_family',
        'style' => 'online_magazine_body_style',
        'text_decoration' => 'online_magazine_body_text_decoration',
        'text_transform' => 'online_magazine_body_text_transform',
        'size' => 'online_magazine_body_size',
        'line_height' => 'online_magazine_body_line_height',
        'letter_spacing' => 'online_magazine_body_letter_spacing',
        'typocolor' => 'online_magazine_body_color'
    ),
    'input_attrs' => array(
        'min' => 10,
        'max' => 40,
        'step' => 1
    )
)));

// Add H1 typography section.
$wp_customize->add_section('online_magazine_header_typography', array(
    'panel' => 'online_magazine_typography_settings_panel',
    'title' => esc_html__('Headers(H1, H2, H3, H4, H5, H6)', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_common_header_typography', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => true
));

$wp_customize->add_control(new Online_Magazine_Toggle_Control($wp_customize, 'online_magazine_common_header_typography', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('Use Common Typography for all Headers', 'online-magazine')
)));

// Add H typography section.
$wp_customize->add_setting('online_magazine_h_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h_typography', array(
    'label' => esc_html__('Header Typography', 'online-magazine'),
    'description' => __('Select how you want your Header to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h_family',
        'style' => 'online_magazine_h_style',
        'text_decoration' => 'online_magazine_h_text_decoration',
        'text_transform' => 'online_magazine_h_text_transform',
        'line_height' => 'online_magazine_h_line_height',
        'letter_spacing' => 'online_magazine_h_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_h_typography_seperator', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Separator_Control($wp_customize, 'online_magazine_h_typography_seperator', array(
    'section' => 'online_magazine_header_typography'
)));

$wp_customize->add_setting('online_magazine_hh1_size', array(
    'sanitize_callback' => 'absint',
    'default' => 38
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_hh1_size', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('H1 Font Size', 'online-magazine'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_hh2_size', array(
    'sanitize_callback' => 'absint',
    'default' => 34
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_hh2_size', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('H2 Font Size', 'online-magazine'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_hh3_size', array(
    'sanitize_callback' => 'absint',
    'default' => 30
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_hh3_size', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('H3 Font Size', 'online-magazine'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_hh4_size', array(
    'sanitize_callback' => 'absint',
    'default' => 26
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_hh4_size', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('H4 Font Size', 'online-magazine'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_hh5_size', array(
    'sanitize_callback' => 'absint',
    'default' => 22
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_hh5_size', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('H5 Font Size', 'online-magazine'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_hh6_size', array(
    'sanitize_callback' => 'absint',
    'default' => 18
));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_hh6_size', array(
    'section' => 'online_magazine_header_typography',
    'label' => esc_html__('H6 Font Size', 'online-magazine'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 100,
        'step' => 1
    )
)));

$wp_customize->add_setting('online_magazine_header_typography_nav', array(
    'transport' => 'postMessage',
    'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control(new Online_Magazine_Tab_Control($wp_customize, 'online_magazine_header_typography_nav', array(
    'section' => 'online_magazine_header_typography',
    'buttons' => array(
        array(
            'name' => esc_html__('H1', 'online-magazine'),
            'fields' => array(
                'online_magazine_h1_typography_heading',
                'online_magazine_h1_typography',
            ),
            'active' => true
        ),
        array(
            'name' => esc_html__('H2', 'online-magazine'),
            'fields' => array(
                'online_magazine_h2_typography_heading',
                'online_magazine_h2_typography',
            )
        ),
        array(
            'name' => esc_html__('H3', 'online-magazine'),
            'fields' => array(
                'online_magazine_h3_typography_heading',
                'online_magazine_h3_typography',
            )
        ),
        array(
            'name' => esc_html__('H4', 'online-magazine'),
            'fields' => array(
                'online_magazine_h4_typography_heading',
                'online_magazine_h4_typography',
            )
        ),
        array(
            'name' => esc_html__('H5', 'online-magazine'),
            'fields' => array(
                'online_magazine_h5_typography_heading',
                'online_magazine_h5_typography',
            )
        ),
        array(
            'name' => esc_html__('H6', 'online-magazine'),
            'fields' => array(
                'online_magazine_h6_typography_heading',
                'online_magazine_h6_typography',
            )
        )
    ),
)));

// Add H1 typography section.
$wp_customize->add_setting('online_magazine_h1_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h1_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h1_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h1_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h1_size', array(
    'default' => '38',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_h1_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h1_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h1_typography', array(
    'label' => esc_html__('Header H1 Typography', 'online-magazine'),
    'description' => __('Select how you want your H1 to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h1_family',
        'style' => 'online_magazine_h1_style',
        'text_decoration' => 'online_magazine_h1_text_decoration',
        'text_transform' => 'online_magazine_h1_text_transform',
        'size' => 'online_magazine_h1_size',
        'line_height' => 'online_magazine_h1_line_height',
        'letter_spacing' => 'online_magazine_h1_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add H2 typography section.
$wp_customize->add_setting('online_magazine_h2_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h2_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h2_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h2_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h2_size', array(
    'default' => '34',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_h2_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h2_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h2_typography', array(
    'label' => esc_html__('Header H2 Typography', 'online-magazine'),
    'description' => __('Select how you want your H2 to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h2_family',
        'style' => 'online_magazine_h2_style',
        'text_decoration' => 'online_magazine_h2_text_decoration',
        'text_transform' => 'online_magazine_h2_text_transform',
        'size' => 'online_magazine_h2_size',
        'line_height' => 'online_magazine_h2_line_height',
        'letter_spacing' => 'online_magazine_h2_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add H3 typography section.
$wp_customize->add_setting('online_magazine_h3_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h3_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h3_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h3_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h3_size', array(
    'default' => '30',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_h3_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h3_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h3_typography', array(
    'label' => esc_html__('Header H3 Typography', 'online-magazine'),
    'description' => __('Select how you want your H3 to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h3_family',
        'style' => 'online_magazine_h3_style',
        'text_decoration' => 'online_magazine_h3_text_decoration',
        'text_transform' => 'online_magazine_h3_text_transform',
        'size' => 'online_magazine_h3_size',
        'line_height' => 'online_magazine_h3_line_height',
        'letter_spacing' => 'online_magazine_h3_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add H4 typography section.
$wp_customize->add_setting('online_magazine_h4_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h4_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h4_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h4_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h4_size', array(
    'default' => '26',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_h4_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h4_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h4_typography', array(
    'label' => esc_html__('Header H4 Typography', 'online-magazine'),
    'description' => __('Select how you want your H4 to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h4_family',
        'style' => 'online_magazine_h4_style',
        'text_decoration' => 'online_magazine_h4_text_decoration',
        'text_transform' => 'online_magazine_h4_text_transform',
        'size' => 'online_magazine_h4_size',
        'line_height' => 'online_magazine_h4_line_height',
        'letter_spacing' => 'online_magazine_h4_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add H5 typography section.
$wp_customize->add_setting('online_magazine_h5_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h5_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h5_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h5_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h5_size', array(
    'default' => '22',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_h5_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h5_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h5_typography', array(
    'label' => esc_html__('Header H5 Typography', 'online-magazine'),
    'description' => __('Select how you want your H6 to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h5_family',
        'style' => 'online_magazine_h5_style',
        'text_decoration' => 'online_magazine_h5_text_decoration',
        'text_transform' => 'online_magazine_h5_text_transform',
        'size' => 'online_magazine_h5_size',
        'line_height' => 'online_magazine_h5_line_height',
        'letter_spacing' => 'online_magazine_h5_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add H6 typography section.
$wp_customize->add_setting('online_magazine_h6_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h6_style', array(
    'default' => '400',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h6_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h6_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h6_size', array(
    'default' => '18',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_h6_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_h6_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_h6_typography', array(
    'label' => esc_html__('Header H6 Typography', 'online-magazine'),
    'description' => __('Select how you want your H6 to appear.', 'online-magazine'),
    'section' => 'online_magazine_header_typography',
    'settings' => array(
        'family' => 'online_magazine_h6_family',
        'style' => 'online_magazine_h6_style',
        'text_decoration' => 'online_magazine_h6_text_decoration',
        'text_transform' => 'online_magazine_h6_text_transform',
        'size' => 'online_magazine_h6_size',
        'line_height' => 'online_magazine_h6_line_height',
        'letter_spacing' => 'online_magazine_h6_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 20,
        'max' => 100,
        'step' => 1
    )
)));

// Add the Frontpage Block Title typography section.
$wp_customize->add_section('online_magazine_frontpage_block_title_typography', array(
    'panel' => 'online_magazine_typography_settings_panel',
    'title' => esc_html__('Front Page Block Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_style', array(
    'default' => '500',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_size', array(
    'default' => '20',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_line_height', array(
    'default' => '1.1',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_block_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_frontpage_block_title_typography', array(
    'label' => esc_html__('Front Page Block Title Typography', 'online-magazine'),
    'description' => __('Select how you want your frontpage block title to appear.', 'online-magazine'),
    'section' => 'online_magazine_frontpage_block_title_typography',
    'settings' => array(
        'family' => 'online_magazine_frontpage_block_title_family',
        'style' => 'online_magazine_frontpage_block_title_style',
        'text_decoration' => 'online_magazine_frontpage_block_title_text_decoration',
        'text_transform' => 'online_magazine_frontpage_block_title_text_transform',
        'size' => 'online_magazine_frontpage_block_title_size',
        'line_height' => 'online_magazine_frontpage_block_title_line_height',
        'letter_spacing' => 'online_magazine_frontpage_block_title_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 12,
        'max' => 100,
        'step' => 1
    )
)));


// Add the Frontpage Title typography section.
$wp_customize->add_section('online_magazine_frontpage_title_typography', array(
    'panel' => 'online_magazine_typography_settings_panel',
    'title' => esc_html__('Front Page Post Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_frontpage_title_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_title_style', array(
    'default' => '500',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_title_text_transform', array(
    'default' => 'capitalize',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_title_size', array(
    'default' => '16',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_frontpage_title_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_frontpage_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_frontpage_title_typography', array(
    'label' => esc_html__('Front Page Post Title Typography', 'online-magazine'),
    'description' => __('Select how you want your frontpage post title to appear.', 'online-magazine'),
    'section' => 'online_magazine_frontpage_title_typography',
    'settings' => array(
        'family' => 'online_magazine_frontpage_title_family',
        'style' => 'online_magazine_frontpage_title_style',
        'text_decoration' => 'online_magazine_frontpage_title_text_decoration',
        'text_transform' => 'online_magazine_frontpage_title_text_transform',
        'size' => 'online_magazine_frontpage_title_size',
        'line_height' => 'online_magazine_frontpage_title_line_height',
        'letter_spacing' => 'online_magazine_frontpage_title_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 12,
        'max' => 40,
        'step' => 1
    )
)));

// Add the Widget typography section.
$wp_customize->add_section('online_magazine_sidebar_title_typography', array(
    'panel' => 'online_magazine_typography_settings_panel',
    'title' => esc_html__('Widget Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_sidebar_title_family', array(
    'default' => 'Poppins',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_sidebar_title_style', array(
    'default' => '500',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_sidebar_title_text_decoration', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_sidebar_title_text_transform', array(
    'default' => 'uppercase',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_sidebar_title_size', array(
    'default' => '18',
    'sanitize_callback' => 'absint'
));

$wp_customize->add_setting('online_magazine_sidebar_title_line_height', array(
    'default' => '1.3',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_setting('online_magazine_sidebar_title_letter_spacing', array(
    'default' => '0',
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control(new Online_Magazine_Typography_Control($wp_customize, 'online_magazine_sidebar_title_typography', array(
    'label' => esc_html__('Widget Title Typography', 'online-magazine'),
    'description' => __('Select how you want your widget title to appear. This settings applies for sidebar and footer widget titles', 'online-magazine'),
    'section' => 'online_magazine_sidebar_title_typography',
    'settings' => array(
        'family' => 'online_magazine_sidebar_title_family',
        'style' => 'online_magazine_sidebar_title_style',
        'text_decoration' => 'online_magazine_sidebar_title_text_decoration',
        'text_transform' => 'online_magazine_sidebar_title_text_transform',
        'size' => 'online_magazine_sidebar_title_size',
        'line_height' => 'online_magazine_sidebar_title_line_height',
        'letter_spacing' => 'online_magazine_sidebar_title_letter_spacing'
    ),
    'input_attrs' => array(
        'min' => 12,
        'max' => 40,
        'step' => 1
    )
)));
