<?php

add_action('wp_ajax_online_magazine_order_sections', 'online_magazine_order_sections');

function online_magazine_order_sections() {
    if (isset($_POST['sections'])) {
        set_theme_mod('online_magazine_frontpage_sections', $_POST['sections']);
    }
    wp_die();
}

if (!function_exists('online_magazine_post_count_choice')) {

    function online_magazine_post_count_choice() {
        return array(3 => 3, 6 => 6, 9 => 9);
    }

}

if (!function_exists('online_magazine_percentage')) {

    function online_magazine_percentage() {
        for ($i = 1; $i <= 100; $i++) {
            $online_magazine_percentage[$i] = $i;
        }
        return $online_magazine_percentage;
    }

}

if (!function_exists('online_magazine_widget_list')) {

    function online_magazine_widget_list() {
        global $wp_registered_sidebars;
        $menu_choice = array();
        $widget_list['none'] = esc_html__('-- Choose Widget --', 'online-magazine');
        if ($wp_registered_sidebars) {
            foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
                $widget_list[$wp_registered_sidebar['id']] = $wp_registered_sidebar['name'];
            }
        }
        return $widget_list;
    }

}

if (!function_exists('online_magazine_cat')) {

    function online_magazine_cat() {
        $cat = array();
        $categories = get_categories(array('hide_empty' => 0));
        if ($categories) {
            foreach ($categories as $category) {
                $cat[$category->term_id] = $category->cat_name;
            }
        }
        return $cat;
    }

}

if (!function_exists('online_magazine_page_choice')) {

    function online_magazine_page_choice() {
        $page_choice = array();
        $pages = get_pages(array('hide_empty' => 0));
        if ($pages) {
            foreach ($pages as $pages_single) {
                $page_choice[$pages_single->ID] = $pages_single->post_title;
            }
        }
        return $page_choice;
    }

}

if (!function_exists('online_magazine_menu_choice')) {

    function online_magazine_menu_choice() {
        $menu_choice = array('none' => esc_html('Select Menu', 'online-magazine'));
        $menus = get_terms('nav_menu', array('hide_empty' => false));
        if ($menus) {
            foreach ($menus as $menus_single) {
                $menu_choice[$menus_single->slug] = $menus_single->name;
            }
        }
        return $menu_choice;
    }

}


if (!function_exists('online_magazine_icon_box_selector')) {

    function online_magazine_icon_box_selector() {
        echo '<div id="online-magazine-append-icon-box" class="online-magazine-icon-box" style="display:none">';
        echo '<div class="online-magazine-icon-search">';
        echo '<select>';

        if (apply_filters('online_magazine_show_ico_font', true)) {
            echo '<option value="icofont-list">' . esc_html__('Ico Font', 'online-magazine') . '</option>';
        }

        if (apply_filters('online_magazine_show_font_awesome', true)) {
            echo '<option value="fontawesome-list">' . esc_html__('Font Awesome', 'online-magazine') . '</option>';
        }

        if (apply_filters('online_magazine_show_material_icon', true)) {
            echo '<option value="material-icon-list">' . esc_html__('Material Icon', 'online-magazine') . '</option>';
        }

        if (apply_filters('online_magazine_show_essential_icon', true)) {
            echo '<option value="essential-icon-list">' . esc_html__('Essential Icon', 'online-magazine') . '</option>';
        }

        echo '</select>';
        echo '<input type="text" class="online-magazine-icon-search-input" placeholder="' . esc_html__('Type to filter', 'online-magazine') . '" />';
        echo '</div>';

        $active_class = ' active';

        if (apply_filters('online_magazine_show_ico_font', true)) {
            echo '<ul class="online-magazine-icon-list icofont-list online-magazine-clearfix' . $active_class . '">';
            $online_magazine_icofont_icon_array = online_magazine_icofont_icon_array();
            foreach ($online_magazine_icofont_icon_array as $online_magazine_icofont_icon) {
                echo '<li><i class="' . esc_attr($online_magazine_icofont_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        if (apply_filters('online_magazine_show_font_awesome', true)) {
            echo '<ul class="online-magazine-icon-list fontawesome-list online-magazine-clearfix' . $active_class . '">';
            $online_magazine_plus_font_awesome_icon_array = online_magazine_font_awesome_icon_array();
            foreach ($online_magazine_plus_font_awesome_icon_array as $online_magazine_plus_font_awesome_icon) {
                echo '<li><i class="' . esc_attr($online_magazine_plus_font_awesome_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        if (apply_filters('online_magazine_show_material_icon', true)) {
            echo '<ul class="online-magazine-icon-list material-icon-list online-magazine-clearfix' . $active_class . '">';
            $online_magazine_materialdesignicons_icon_array = online_magazine_materialdesignicons_array();
            foreach ($online_magazine_materialdesignicons_icon_array as $online_magazine_materialdesignicons_icon) {
                echo '<li><i class="' . esc_attr($online_magazine_materialdesignicons_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        if (apply_filters('online_magazine_show_essential_icon', true)) {
            echo '<ul class="online-magazine-icon-list essential-icon-list online-magazine-clearfix' . $active_class . '">';
            $online_magazine_essentialicons_icon_array = online_magazine_essential_icon_array();
            foreach ($online_magazine_essentialicons_icon_array as $online_magazine_essentialicons_icon) {
                echo '<li><i class="' . esc_attr($online_magazine_essentialicons_icon) . '"></i></li>';
            }
            echo '</ul>';
            $active_class = '';
        }

        echo '</div>';
    }

}

add_action('customize_controls_print_footer_scripts', 'online_magazine_icon_box_selector');
