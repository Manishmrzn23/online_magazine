<?php  

function online_magazine_dynamic_styles() {
    $custom_css = $tablet_css = $mobile_css = "";
    $color = get_theme_mod('online_magazine_template_color', '#cf0701');
 $website_layout = get_theme_mod('online_magazine_website_layout', 'wide');
    if ($website_layout == 'wide') {
        $container_width = get_theme_mod('online_magazine_wide_container_width', 1170);
    } elseif ($website_layout == 'fluid') {
        $container_width = get_theme_mod('online_magazine_fluid_container_width', 80);
    } elseif ($website_layout == 'boxed') {
        $container_width = get_theme_mod('online_magazine_wide_container_width', 1170);
        $container_padding = get_theme_mod('online_magazine_container_padding', 80);
        $boxed_container_width = $container_width + $container_padding + $container_padding;
    }

    /* =============== Full & Boxed width =============== */
    if ($website_layout == "wide") {
        $custom_css .= "
    .container{
            max-width:{$container_width}px; 
    }";
    } else if ($website_layout == "boxed") {
        $custom_css .= "
        .container{
            max-width:{$container_width}px; 
        }
        body.om-boxed  #om-page{
            max-width:{$boxed_container_width}px;
    }";
    } else if ($website_layout == "fluid") {
        $custom_css .= "
        .container{
                max-width:{$container_width}%; 
        }";
    }

      $custom_css .= online_magazine_typography_css('online_magazine_body', 'html, body, button, input, select, textarea', array(
        'family' => 'Poppins',
        'style' => '400',
        'text_transform' => 'none',
        'text_decoration' => 'none',
        'size' => '16',
        'line_height' => '1.6',
        'letter_spacing' => '0',
        'color' => '#444444'
    ));

       /* ========== Header Typography ========== */
    $common_header_typography = get_theme_mod('online_magazine_common_header_typography', true);

    if ($common_header_typography) {
        $custom_css .= online_magazine_typography_css('online_magazine_h', 'h1, h2, h3, h4, h5, h6, .vm-site-title, .vm-slide-cap-title, .vm-counter-count', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'line_height' => '1.3',
            'letter_spacing' => '0'
        ));

        $hh1_size = get_theme_mod('online_magazine_hh1_size', 38);
        $hh2_size = get_theme_mod('online_magazine_hh2_size', 34);
        $hh3_size = get_theme_mod('online_magazine_hh3_size', 30);
        $hh4_size = get_theme_mod('online_magazine_hh4_size', 26);
        $hh5_size = get_theme_mod('online_magazine_hh5_size', 22);
        $hh6_size = get_theme_mod('online_magazine_hh6_size', 18);

        $custom_css .= "h1{font-size: {$hh1_size}px}";
        $custom_css .= "h2{font-size: {$hh2_size}px}";
        $custom_css .= "h3{font-size: {$hh3_size}px}";
        $custom_css .= "h4{font-size: {$hh4_size}px}";
        $custom_css .= "h5{font-size: {$hh5_size}px}";
        $custom_css .= "h6{font-size: {$hh6_size}px}";
    } else {
        $custom_css .= online_magazine_typography_css('online_magazine_h1', ' .om-site-title', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'size' => '38',
            'line_height' => '1.3',
            'letter_spacing' => '0',
        ));

        $custom_css .= online_magazine_typography_css('online_magazine_h2', 'h2', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'size' => '34',
            'line_height' => '1.3',
            'letter_spacing' => '0',
        ));

        $custom_css .= online_magazine_typography_css('online_magazine_h3', 'h3', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'size' => '30',
            'line_height' => '1.3',
            'letter_spacing' => '0',
        ));
        $custom_css .= online_magazine_typography_css('online_magazine_h4', 'h4', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'size' => '26',
            'line_height' => '1.3',
            'letter_spacing' => '0',
        ));
        $custom_css .= online_magazine_typography_css('online_magazine_h5', 'h5', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'size' => '22',
            'line_height' => '1.3',
            'letter_spacing' => '0',
        ));
        $custom_css .= online_magazine_typography_css('online_magazine_h6', 'h6', array(
            'family' => 'Poppins',
            'style' => '400',
            'text_transform' => 'none',
            'text_decoration' => 'none',
            'size' => '18',
            'line_height' => '1.3',
            'letter_spacing' => '0',
        ));
    }

    $online_magazine_content_header_color = get_theme_mod('online_magazine_content_header_color', '#000000');
    $online_magazine_content_text_color = get_theme_mod('online_magazine_content_text_color', '#333333');
    $online_magazine_content_link_color = get_theme_mod('online_magazine_content_link_color', '#000000');
    $online_magazine_content_link_hov_color = get_theme_mod('online_magazine_content_link_hov_color', '#cf0701');
    $online_magazine_content_widget_title_color = get_theme_mod('online_magazine_content_widget_title_color', '#000000');
    $online_magazine_content_light_color = online_magazine_hex2rgba($online_magazine_content_text_color, 0.1);
    $online_magazine_content_lighter_color = online_magazine_hex2rgba($online_magazine_content_text_color, 0.05);
    $custom_css .= ".site-content h1, .site-content h2, .site-content h3, .site-content h4, .site-content h5, .site-content h6 {color:$online_magazine_content_header_color}";
    $custom_css .= ".site-content{color:$online_magazine_content_text_color}";
    $custom_css .= "a{color:$online_magazine_content_link_color}";
    $custom_css .= "a:hover, .woocommerce .woocommerce-breadcrumb a:hover, .breadcrumb-trail a:hover{color:$online_magazine_content_link_hov_color}";
    $custom_css .= ".vm-sidebar-style1 .vm-site-wrapper .widget-area ul ul, .vm-sidebar-style1 .vm-site-wrapper .widget-area li{border-color:$online_magazine_content_lighter_color}";
    $custom_css .= ".vm-sidebar-style2 .vm-site-wrapper .widget, .vm-sidebar-style2 .vm-site-wrapper .widget-title, .vm-sidebar-style3 .vm-site-wrapper .widget, .vm-sidebar-style5 .vm-site-wrapper .widget, .vm-sidebar-style7 .vm-site-wrapper .widget, .vm-sidebar-style7 .vm-site-wrapper .widget-title, .comment-list .sp-comment-content, .post-navigation, .post-navigation .nav-next, .vm-social-share{border-color:$online_magazine_content_light_color}";
    $custom_css .= ".vm-sidebar-style5 .vm-site-wrapper .widget-title:before, .vm-sidebar-style5 .vm-site-wrapper .widget-title:after{background-color:$online_magazine_content_light_color}";
    $custom_css .= ".single-entry-tags a, .widget-area .tagcloud a{border-color:$online_magazine_content_text_color}";
    $custom_css .= ".vm-sidebar-style3 .vm-site-wrapper .widget{background:$online_magazine_content_lighter_color}";
    $custom_css .= ".site-content .widget-title{color:$online_magazine_content_widget_title_color}";
    $custom_css .= ".vm-sidebar-style1 .vm-site-wrapper .widget-title:after, .vm-sidebar-style3 .vm-site-wrapper .widget-title:after, .vm-sidebar-style6 .vm-site-wrapper .widget-title:after, .vm-sidebar-style7 .vm-site-wrapper .widget:before {background-color:$online_magazine_content_widget_title_color}";


       /*=== Front Page Post Title ===*/
    $custom_css .= online_magazine_typography_css('online_magazine_frontpage_title', 'h4.om-post-title, h3.he-post-title', array(
        'family' => 'Poppins',
        'style' => '500',
        'text_transform' => 'capitalize',
        'text_decoration' => 'none',
        'size' => '16',
        'line_height' => '1.3',
        'letter_spacing' => '0'
    ));

    /*=== Front Page Block Title ===*/
    $custom_css .= online_magazine_typography_css('online_magazine_frontpage_block_title', '.om-block-title span.om-title, .he-block-title', array(
        'family' => 'Poppins',
        'style' => '500',
        'text_transform' => 'uppercase',
        'text_decoration' => 'none',
        'size' => '20',
        'line_height' => '1.1',
        'letter_spacing' => '0'
    ));


    /* =============== Sidebar Title =============== */
    $custom_css .= online_magazine_typography_css('online_magazine_sidebar_title', '.widget__title-text', array(
        'family' => 'Poppins',
        'style' => '500',
        'text_transform' => 'uppercase',
        'text_decoration' => 'none',
        'size' => '18',
        'line_height' => '1.3',
        'letter_spacing' => '0'
    ));

     /* =============== Background Color =============== */
    $custom_css .= "
        button,
        input[type='button'],
        input[type='reset'],
        input[type='submit'],
        .vm-button,
        .comment-navigation .nav-previous a,
        .comment-navigation .nav-next a,
        .pagination .page-numbers,
        .vm-progress-bar-length,
        .vm-main-content .entry-readmore a,
        .blog-layout2 .entry-date,
        .blog-layout4 .vm-post-date,
        .woocommerce #respond input#submit,
        .woocommerce a.button,
        .woocommerce button.button,
        .woocommerce input.button,
        .woocommerce ul.products li.product:hover .viral-mag-product-title-wrap .button,
        .woocommerce #respond input#submit.alt,
        .woocommerce a.button.alt,
        .woocommerce button.button.alt,
        .woocommerce input.button.alt,
        .woocommerce nav.woocommerce-pagination ul li a,
        .woocommerce nav.woocommerce-pagination ul li span,
        .woocommerce span.onsale,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
        .woocommerce #respond input#submit.disabled,
        .woocommerce #respond input#submit:disabled,
        .woocommerce #respond input#submit:disabled[disabled],
        .woocommerce a.button.disabled, .woocommerce a.button:disabled,
        .woocommerce a.button:disabled[disabled],
        .woocommerce button.button.disabled,
        .woocommerce button.button:disabled,
        .woocommerce button.button:disabled[disabled],
        .woocommerce input.button.disabled,
        .woocommerce input.button:disabled,
        .woocommerce input.button:disabled[disabled],
        .woocommerce #respond input#submit.alt.disabled,
        .woocommerce #respond input#submit.alt.disabled:hover,
        .woocommerce #respond input#submit.alt:disabled,
        .woocommerce #respond input#submit.alt:disabled:hover,
        .woocommerce #respond input#submit.alt:disabled[disabled],
        .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
        .woocommerce a.button.alt.disabled,
        .woocommerce a.button.alt.disabled:hover,
        .woocommerce a.button.alt:disabled,
        .woocommerce a.button.alt:disabled:hover,
        .woocommerce a.button.alt:disabled[disabled],
        .woocommerce a.button.alt:disabled[disabled]:hover,
        .woocommerce button.button.alt.disabled,
        .woocommerce button.button.alt.disabled:hover,
        .woocommerce button.button.alt:disabled,
        .woocommerce button.button.alt:disabled:hover,
        .woocommerce button.button.alt:disabled[disabled],
        .woocommerce button.button.alt:disabled[disabled]:hover,
        .woocommerce input.button.alt.disabled,
        .woocommerce input.button.alt.disabled:hover,
        .woocommerce input.button.alt:disabled,
        .woocommerce input.button.alt:disabled:hover,
        .woocommerce input.button.alt:disabled[disabled],
        .woocommerce input.button.alt:disabled[disabled]:hover,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce-MyAccount-navigation-link a,
        .vm-style2-accordion .vm-accordion-header,
        #back-to-top,
        .vm-pt-header .vm-pt-tab.vm-pt-active,
        .vm-post-listing .vm-pl-count,
       .vm-post-categories li a.vm-category,
       .vm-slider-block .owl-carousel .owl-nav .owl-prev:hover, 
       .vm-slider-block .owl-carousel .owl-nav .owl-next:hover,
       .vm-fwcarousel-block .owl-carousel .owl-nav .owl-prev, 
       .vm-fwcarousel-block .owl-carousel .owl-nav .owl-next,
       .vm-primary-cat-block.vm-primary-cat,
       .vm-carousel-block .owl-carousel .owl-nav .owl-prev, 
       .vm-carousel-block .owl-carousel .owl-nav .owl-next,
        .video-controls,
       .vm-ticker.style1.vm-ticker-title,
       .vm-ticker.style1 .owl-carousel .owl-nav button.owl-prev, 
       .vm-ticker.style1 .owl-carousel .owl-nav button.owl-next,
       .vm-ticker.style2.vm-ticker-title,
       .vm-ticker.style3.vm-ticker-title,
       .vm-ticker.style4.vm-ticker-title,
        .single-entry-gallery .owl-carousel .owl-nav .owl-prev, 
        .single-entry-gallery .owl-carousel .owl-nav .owl-next,
        .viral-mag-related-post.style3 .owl-carousel .owl-nav .owl-prev, 
        .viral-mag-related-post.style3 .owl-carousel .owl-nav .owl-next,
        .vm-instagram-widget-footer a,
        .blog-layout7 .vm-post-date,
        .he-post-thumb .post-categories li a:hover
        {
            background:{$color};
        }";

return wp_strip_all_tags(online_magazine_css_strip_whitespace($custom_css));
}