<?php 

$sticky_header = get_theme_mod('online_magazine_sticky_header', 'off');

function online_magazine_body_classes($classes) {
  
    $sticky_header = get_theme_mod('online_magazine_sticky_header', 'off');
    if ($sticky_header == 'on') {
        $classes[] = 'om-sticky-header';
    }
    return $classes;
}

add_filter('body_class', 'online_magazine_body_classes');


