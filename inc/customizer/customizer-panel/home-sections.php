<?php
// add_action('customize_register', 'Home_image');



// function Home_image($wp_customize){
$wp_customize->add_panel('online_magazine_home_sections_panel', array(
    'title' => esc_html__('Home Sections', 'online-magazine'),
    'priority' => 10
));

$wp_customize->add_section('online_magazine_featured_section', array(
  			'title'=> 'Featured Section',
  			'panel' => 'online_magazine_home_sections_panel'
 ));
$wp_customize->add_setting('online_magazine_featured_section_disable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_featured_section_disable', array(
    'section' => 'online_magazine_featured_section',
    'label' => esc_html__('Disable Section', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));


$wp_customize->add_setting('online_magazine_featured_section_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_featured_section_heading', array(
    'section' => 'online_magazine_featured_section',
    'label' => esc_html__('Featured Section', 'online-magazine'),
)));


$wp_customize->add_setting( 'online_magazine_featured_section_display_post', array(
   
));
$wp_customize->add_control( 'online_magazine_featured_section_display_post', array(
    'label'    => esc_html__( 'Display Post', 'online-magazine' ),
    'type'     => 'select',
    'section'  => 'online_magazine_featured_section',
    'choices'  => online_magazine_featured_section_display_post()
));

$wp_customize->add_section('online_magazine_news_1_section', array(
            'title'=> 'News One Section',
            'panel' => 'online_magazine_home_sections_panel'
 ));

$wp_customize->add_setting('online_magazine_first_news_section_disable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_first_news_section_disable', array(
    'section' => 'online_magazine_news_1_section',
    'label' => esc_html__('Disable Section', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));
$wp_customize->add_setting('online_magazine_custom_news_1_title_subtitle_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_custom_news_1_title_subtitle_heading', array(
    'section' => 'online_magazine_news_1_section',
    'label' => esc_html__('Section Title & Sub Title', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_news_1_super_title', array(
	'default' => esc_html__('News One Section Super Title', 'online-magazine'),
    'sanitize_callback' => 'online_magazine_sanitize_text',
    
));

$wp_customize->add_control('online_magazine_news_1_super_title', array(
    'section' => 'online_magazine_news_1_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_news_1_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News One Section Title', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_1_title', array(
    'section' => 'online_magazine_news_1_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'online-magazine')
));



$wp_customize->add_setting('online_magazine_news_1_subtitle', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News One Section SubTitle', 'online-magazine'),
   
));

$wp_customize->add_control('online_magazine_news_1_subtitle', array(
    'section' => 'online_magazine_news_1_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'online-magazine')
));


$wp_customize->add_setting( 'online_magazine_news_one_section_display_categories', array(
   
));
$wp_customize->add_control( 'online_magazine_news_one_section_display_categories', array(
    'label'    => esc_html__( 'Display Categories', 'online-magazine' ),
    'type'     => 'select',
    'section'  => 'online_magazine_news_1_section',
    'choices'  => online_magazine_news_one_section_display_cat()
));

$wp_customize->add_section('online_magazine_news_2_section', array(
            'title'=> 'News Two Section',
            'panel' => 'online_magazine_home_sections_panel'
 ));

$wp_customize->add_setting('online_magazine_second_news_section_disable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_second_news_section_disable', array(
    'section' => 'online_magazine_news_2_section',
    'label' => esc_html__('Disable Section', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));
$wp_customize->add_setting('online_magazine_custom_news_2_title_subtitle_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_custom_news_2_title_subtitle_heading', array(
    'section' => 'online_magazine_news_2_section',
    'label' => esc_html__('Section Title & Sub Title', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_news_2_super_title', array(
	'default' => esc_html__('News Two Section Super Title', 'online-magazine'),
    'sanitize_callback' => 'online_magazine_sanitize_text',
    
));

$wp_customize->add_control('online_magazine_news_2_super_title', array(
    'section' => 'online_magazine_news_2_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_news_2_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Two Section Title', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_2_title', array(
    'section' => 'online_magazine_news_2_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'online-magazine')
));



$wp_customize->add_setting('online_magazine_news_2_subtitle', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Two Section SubTitle', 'online-magazine'),
   
));

$wp_customize->add_control('online_magazine_news_2_subtitle', array(
    'section' => 'online_magazine_news_2_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'online-magazine')
));

$wp_customize->add_setting( 'online_magazine_news_two_section_display_categories', array(
    'default'=>'select'
   
));
$wp_customize->add_control( 'online_magazine_news_two_section_display_categories', array(
    'label'    => esc_html__( 'Display Categories', 'online-magazine' ),
    'type'     => 'select',
    'section'  => 'online_magazine_news_2_section',
    'choices'  => online_magazine_news_one_section_display_cat()
));


$wp_customize->add_setting('online_magazine_news_2_button_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('Button Text', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_2_button_text', array(
    'section' => 'online_magazine_news_2_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'online-magazine')
));


$wp_customize->add_section('online_magazine_news_3_section', array(
            'title'=> 'News Third Section',
            'panel' => 'online_magazine_home_sections_panel'
 ));

$wp_customize->add_setting('online_magazine_third_news_section_disable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_third_news_section_disable', array(
    'section' => 'online_magazine_news_3_section',
    'label' => esc_html__('Disable Section', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));
$wp_customize->add_setting('online_magazine_custom_news_3_title_subtitle_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_custom_news_3_title_subtitle_heading', array(
    'section' => 'online_magazine_news_3_section',
    'label' => esc_html__('Section Title & Sub Title', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_news_3_super_title', array(
    'default' => esc_html__('News Third Section Super Title', 'online-magazine'),
    'sanitize_callback' => 'online_magazine_sanitize_text',
    
));

$wp_customize->add_control('online_magazine_news_3_super_title', array(
    'section' => 'online_magazine_news_3_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_news_3_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Third Section Title', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_3_title', array(
    'section' => 'online_magazine_news_3_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'online-magazine')
));



$wp_customize->add_setting('online_magazine_news_3_subtitle', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Third Section SubTitle', 'online-magazine'),
   
));

$wp_customize->add_control('online_magazine_news_3_subtitle', array(
    'section' => 'online_magazine_news_3_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'online-magazine')
));

$wp_customize->add_setting( 'online_magazine_news_third_section_display_categories', array(
   
));
$wp_customize->add_control( 'online_magazine_news_third_section_display_categories', array(
    'label'    => esc_html__( 'Display Categories', 'online-magazine' ),
    'type'     => 'select',
    'section'  => 'online_magazine_news_3_section',
    'choices'  => online_magazine_news_one_section_display_cat()
));

$wp_customize->add_setting('online_magazine_news_3_button_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('Button Text', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_3_button_text', array(
    'section' => 'online_magazine_news_3_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'online-magazine')
));

$wp_customize->add_section('online_magazine_news_4_section', array(
            'title'=> 'News Fourth Section',
            'panel' => 'online_magazine_home_sections_panel'
 ));



$wp_customize->add_setting('online_magazine_custom_news_4_title_subtitle_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_setting('online_magazine_fourth_news_section_disable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_fourth_news_section_disable', array(
    'section' => 'online_magazine_news_4_section',
    'label' => esc_html__('Disable Section', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));



$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_custom_news_4_title_subtitle_heading', array(
    'section' => 'online_magazine_news_4_section',
    'label' => esc_html__('Section Title & Sub Title', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_news_4_super_title', array(
    'default' => esc_html__('News Fourth Section Super Title', 'online-magazine'),
    'sanitize_callback' => 'online_magazine_sanitize_text',
    
));

$wp_customize->add_control('online_magazine_news_4_super_title', array(
    'section' => 'online_magazine_news_4_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_news_4_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Fourth Section Title', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_4_title', array(
    'section' => 'online_magazine_news_4_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'online-magazine')
));



$wp_customize->add_setting('online_magazine_news_4_subtitle', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Fourth Section SubTitle', 'online-magazine'),
   
));

$wp_customize->add_control('online_magazine_news_4_subtitle', array(
    'section' => 'online_magazine_news_4_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_counter_col', array(
    'sanitize_callback' => 'absint',
    'default' => 5,

));

$wp_customize->add_control(new Online_Magazine_Range_Slider_Control($wp_customize, 'online_magazine_counter_col', array(
    'section' => 'online_magazine_news_4_section',
    'label' => esc_html__('No of posts', 'online-magazine'),
    'input_attrs' => array(
        'min' => 1,
        'max' => 20,
        'step' => 1,
    )
)));



$wp_customize->add_setting('online_magazine_news_4_button_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('Button Text', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_4_button_text', array(
    'section' => 'online_magazine_news_4_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'online-magazine')
));

$wp_customize->add_section('online_magazine_news_5_section', array(
            'title'=> 'News Fifth Section',
            'panel' => 'online_magazine_home_sections_panel'
 ));

$wp_customize->add_setting('online_magazine_fifth_news_section_disable', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => 'off'
));

$wp_customize->add_control(new Online_Magazine_Switch_Control($wp_customize, 'online_magazine_fifth_news_section_disable', array(
    'section' => 'online_magazine_news_5_section',
    'label' => esc_html__('Disable Section', 'online-magazine'),
    'on_off_label' => array(
        'on' => esc_html__('Yes', 'online-magazine'),
        'off' => esc_html__('No', 'online-magazine')
    ),
    'class' => 'switch-section',
    'priority' => -1,
)));

$wp_customize->add_setting('online_magazine_custom_news_5_title_subtitle_heading', array(
    'sanitize_callback' => 'online_magazine_sanitize_text'
));

$wp_customize->add_control(new Online_Magazine_Heading_Control($wp_customize, 'online_magazine_custom_news_5_title_subtitle_heading', array(
    'section' => 'online_magazine_news_5_section',
    'label' => esc_html__('Section Title & Sub Title', 'online-magazine')
)));

$wp_customize->add_setting('online_magazine_news_5_super_title', array(
    'default' => esc_html__('News Fifth Section Super Title', 'online-magazine'),
    'sanitize_callback' => 'online_magazine_sanitize_text',
    
));

$wp_customize->add_control('online_magazine_news_5_super_title', array(
    'section' => 'online_magazine_news_5_section',
    'type' => 'text',
    'label' => esc_html__('Super Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_news_5_title', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Fifth Section Title', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_5_title', array(
    'section' => 'online_magazine_news_5_section',
    'type' => 'text',
    'label' => esc_html__('Title', 'online-magazine')
));

$wp_customize->add_setting('online_magazine_news_5_subtitle', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('News Fifth Section SubTitle', 'online-magazine'),
   
));

$wp_customize->add_control('online_magazine_news_5_subtitle', array(
    'section' => 'online_magazine_news_5_section',
    'type' => 'textarea',
    'label' => esc_html__('Sub Title', 'online-magazine')
));

$wp_customize->add_setting( 'online_magazine_news_fifth_section_display_categories', array(
    'default'=> 0
    
   
));
$wp_customize->add_control( 'online_magazine_news_fifth_section_display_categories', array(
    'label'    => esc_html__( 'Display Categories', 'online-magazine' ),
    'type'     => 'select',
    'section'  => 'online_magazine_news_5_section',
    'choices'  => online_magazine_news_one_section_display_cat()
));

$wp_customize->add_setting('online_magazine_news_5_button_text', array(
    'sanitize_callback' => 'online_magazine_sanitize_text',
    'default' => esc_html__('Button Text', 'online-magazine'),
    
));

$wp_customize->add_control('online_magazine_news_5_button_text', array(
    'section' => 'online_magazine_news_5_section',
    'type' => 'text',
    'label' => esc_html__('Button Text', 'online-magazine')
));
