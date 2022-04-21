<?php

if (!class_exists('Online_Magazine_Register_Customizer_Controls')) {

    class Online_Magazine_Register_Customizer_Controls {

        protected $version;

        function __construct() {
            if (defined('ONLINE_MAGAZINE_VERSION')) {
                $this->version = ONLINE_MAGAZINE_VERSION;
            } else {
                $this->version = '1.0.0';
            }

            add_action('customize_register', array($this, 'register_customizer_settings'));
            add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_customizer_script'));
            add_action('customize_preview_init', array($this, 'enqueue_customize_preview_js'));
        }

        public function register_customizer_settings($wp_customize) {
            /** Theme Options */
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/general-settings.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/typography-settings.php';
            // require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/color-settings.php';
            // require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/header-settings.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/home-sections.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/footer-settings.php';
            require ONLINE_MAGAZINE_CUSTOMIZER_PATH . 'customizer-panel/style-settings.php';

            /** For Additional Hooks */
            do_action('online_magazine_new_options', $wp_customize);
        }

        public function enqueue_customizer_script() {
            wp_enqueue_script('online-magazine-customizer', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.js', array('jquery'), $this->get_version(), true);
            wp_enqueue_style('online-magazine-customizer', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/customizer.css', array(), $this->get_version());
        }

        public function enqueue_customize_preview_js() {
            wp_enqueue_script('webfont', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'custom-controls/typography/js/webfont.js', array('jquery'), $this->get_version(), false);
            wp_enqueue_script('online-magazine-customizer-preview', ONLINE_MAGAZINE_CUSTOMIZER_URL . 'customizer-panel/assets/customizer-preview.js', array('customize-preview'), $this->get_version(), true);
        }

        public function get_version() {
            return $this->version;
        }

    }

    new Online_Magazine_Register_Customizer_Controls();
}
