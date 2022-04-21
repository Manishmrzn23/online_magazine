<?php



$wp_customize->add_section('online_magazine_style_section', array(
  			'title'=> 'Style Section',
 ));


$wp_customize->add_setting('online_magazine_style_section_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_style_section_heading', array(
    'section' => 'online_magazine_style_section',
    'label' => esc_html__('Style Section', 'online-magazine'),
)));

$wp_customize->add_setting('theme_toggle', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off',
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'theme_toggle', array(
    'section' => 'online_magazine_style_section',
    'label' => esc_html__('Dark Theme', 'online-magazine'),
    'description' => esc_html__('Use dark instead of light base', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    )
)));

?>