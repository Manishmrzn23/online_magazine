<?php 
if (!function_exists('online_magazine_header_wrapper')) {

    function online_magazine_header_wrapper(){
        $placeholder_text = esc_attr__('Search', 'online-magazine');
        $form = '<div id="header-search-dropdown" class="header-search-dropdown is-in-navbar">';
        $form .= '<div class="container">';
        $form .= '<form class="search-form search-form--horizontal" method="get" action="' . esc_url(home_url('/')) . '">';
        $form .= '<div class="search-form__input-wrap">';
        $form .= ' <input type="text" class="search-form__input"  placeholder="' . $placeholder_text . '" value="' . get_search_query() . '" name="s" />';
        $form .= '</div>'; 
        $form .= '<button type="submit" class="btn search-form__btn"><i class="mdicon mdicon-search"></i></button>';
        $form .= '</form>';
        $form .= '</div>';
        $form .= '</div>';

        $result = apply_filters('get_search_form', $form);
        echo $result;
    }
}

add_action('online_magazine_header_search_form', 'online_magazine_header_wrapper');

?>

  