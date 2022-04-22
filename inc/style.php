<?php  

function online_magazine_dynamic_styles() {
    $custom_css = $tablet_css = $mobile_css = "";
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
        $custom_css .= online_magazine_typography_css('online_magazine_h1', ' .vm-site-title', array(
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
return wp_strip_all_tags(online_magazine_css_strip_whitespace($custom_css));
}