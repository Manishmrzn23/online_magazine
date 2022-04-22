<?php 

if (!function_exists('online_magazine_typography_css')) {

    function online_magazine_typography_css($key, $selector, $default = array()) {
        if (!$key || !$selector) {
            return;
        }
        $css = array();
        $default = wp_parse_args($default, array(
            'family' => 'Default',
            'style' => '400',
            'text_decoration' => 'none',
            'text_transform' => 'none',
            'size' => '',
            'line_height' => '1',
            'letter_spacing' => '0',
            'color' => ''
        ));
  

        $family = get_theme_mod($key . '_family', $default['family']);
        $style = get_theme_mod($key . '_style', $default['style']);
        $text_decoration = get_theme_mod($key . '_text_decoration', $default['text_decoration']);
        $text_transform = get_theme_mod($key . '_text_transform', $default['text_transform']);
        $size = get_theme_mod($key . '_size', $default['size']);
        $line_height = get_theme_mod($key . '_line_height', $default['line_height']);
        $letter_spacing = get_theme_mod($key . '_letter_spacing', $default['letter_spacing']);
        $color = get_theme_mod($key . '_color', $default['color']);

        if (strpos($style, 'italic')) {
            $italic = 'italic';
        }

        $weight = absint($style);

        $css[] = (!empty($family) && $family != 'Default') ? "font-family: '{$family}', serif" : NULL;
        $css[] = !empty($weight) ? "font-weight: {$weight}" : NULL;
        $css[] = !empty($italic) ? "font-style: {$italic}" : NULL;
        $css[] = !empty($text_transform) ? "text-transform: {$text_transform}" : NULL;
        $css[] = !empty($text_decoration) ? "text-decoration: {$text_decoration}" : NULL;
        $css[] = !empty($size) ? "font-size: {$size}px" : NULL;
        $css[] = !empty($line_height) ? "line-height: {$line_height}" : NULL;
        $css[] = !empty($letter_spacing) ? "letter-spacing: {$letter_spacing}px" : NULL;
        $css[] = !empty($color) ? "color: {$color}" : NULL;

        $css = array_filter($css);
        var_dump($css);

        return $selector . '{' . implode(';', $css) . '}';
    }

}