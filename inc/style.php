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

return wp_strip_all_tags(online_magazine_css_strip_whitespace($custom_css));
}