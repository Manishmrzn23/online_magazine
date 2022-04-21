<?php

if (!class_exists('Online_Magazine_Customizer_Custom_Controls')) {

    class Online_Magazine_Customizer_Custom_Controls {

        protected $version;

        function __construct() {
            if (defined('ONLINE_MAGAZINE_VERSION')) {
                $this->version = ONLINE_MAGAZINE_VERSION;
            } else {
                $this->version = '1.0.0';
            }

            add_action('customize_register', array($this, 'register_controls'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
        }

        public function register_controls($wp_customize) {
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/alpha-color-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/background-image-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/color-tab-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/date-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/editor-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/dimensions-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/gallery-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/graident-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/heading-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/icon-selector-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/image-selector-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/multiple-checkbox-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/multiple-select-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/multiple-selectize-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/range-slider-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/repeater-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/responsive-range-slider-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/chosen-select-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/selector-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/separator-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/sortable-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/switch-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/tab-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/text-info-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/text-selector-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/toggle-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/typography/typography-control-class.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/column-control/column-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/preloader-control.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/upgrade-section.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/upgrade-info.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'custom-controls/toggle-section.php';

            /** Register Control Type */
            $wp_customize->register_control_type('Online_Magazine_Color_Tab_Control');
            $wp_customize->register_control_type('Online_Magazine_Background_Image_Control');
            $wp_customize->register_control_type('Online_Magazine_Tab_Control');
            $wp_customize->register_control_type('Online_Magazine_Dimensions_Control');
            $wp_customize->register_control_type('Online_Magazine_Responsive_Range_Slider_Control');
            $wp_customize->register_control_type('Online_Magazine_Sortable_Control');
            $wp_customize->register_control_type('Online_Magazine_Typography_Control');
            $wp_customize->register_control_type('Online_Magazine_Icon_Selector_Control');

            // Register custom section types.
            $wp_customize->register_section_type('Online_Magazine_Upgrade_Section');
            $wp_customize->register_section_type('Online_Magazine_Toggle_Section');
        }

        public function enqueue_customizer_script() {
            wp_enqueue_script('selectize', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/js/selectize.js', array('jquery'), $this->get_version(), true);
            wp_enqueue_script('chosen-jquery', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/js/chosen.jquery.js', array('jquery'), $this->get_version(), true);
            wp_enqueue_script('wp-color-picker-alpha', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/js/wp-color-picker-alpha.js', array('jquery', 'wp-color-picker'), $this->get_version(), true);
            wp_enqueue_script('online-magazine-customizer-control', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/js/customizer-controls.js', array('jquery', 'jquery-ui-datepicker'), $this->get_version(), true);

            wp_enqueue_style('selectize', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/css/selectize.css', array(), $this->get_version());
            wp_enqueue_style('chosen', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/css/chosen.css', array(), $this->get_version());
            wp_enqueue_style('online-magazine-customizer-control', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/assets/css/customizer-controls.css', array('wp-color-picker'), $this->get_version());

            wp_enqueue_style('fontawesome-5.2.0', get_template_directory_uri() . '/assets/css/all.css', array(), $this->get_version());
            wp_enqueue_style('essential-icon', get_template_directory_uri() . '/assets/css/essential-icon.css', array(), $this->get_version());
            wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/assets/css/materialdesignicons.css', array(), $this->get_version());
            wp_enqueue_style('icofont', get_template_directory_uri() . '/assets/css/icofont.css', array(), $this->get_version());
            wp_enqueue_style('eleganticons', get_template_directory_uri() . '/assets/css/eleganticons.css', array(), $this->get_version());
                }

        public function get_version() {
            return $this->version;
        }

    }

    new Online_Magazine_Customizer_Custom_Controls();
}
