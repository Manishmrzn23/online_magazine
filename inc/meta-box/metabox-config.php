<?php

if (!class_exists( 'Online_Magazine_Meta_Box_Config' )) {

    /**
     * Meta Box Config
     *
     * @package All Types Meta Box
     * @since 1.0
     *
     * @todo Nothing.
     */
    class Online_Magazine_Meta_Box_Config {

        public $sidebars = array();

        /**
         * Constructor
         *
         * @access public
         *
         * @param array $meta_box 
         */
        public function __construct() {

            // If we are not in admin area exit.
            if (!is_admin())
                return;
            add_action( 'do_meta_boxes', array($this, 'remove_theme_metaboxes' ));
            $this->add_page_metabox();
            $this->add_post_metabox();
            $this->add_product_metabox();
        }

        public function remove_theme_metaboxes() {
            remove_meta_box( 'online_magazine_sidebar_layout', array( 'post', 'page' ), 'side' );
        }

        public function add_page_metabox() {

            $config = array(
                'id' => 'online_magazine_page_settings',
                'title' => esc_html__( 'Page Setting', 'online-magazine' ),
                'pages' => array( 'page' ),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(),
                'use_with_theme' => plugin_dir_url( __FILE__ )
            );


            /*
             * Initiate your meta box
             */
            $metas = new Online_Magazine_Meta_Box($config);

            /*
             * Add fields
             */
            $metas->openTab( 'online_magazine_general_setting', array( 'name' => esc_html__( 'General Settings', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addCheckbox( 'online_magazine_hide_header', array( 'name' => esc_html__( 'Hide Header', 'online-magazine' ), 'group' => 'start' ));
            $metas->addCheckbox( 'online_magazine_hide_footer', array( 'name' => esc_html__( 'Hide Footer', 'online-magazine' ), 'group' => 'end' ));
            $metas->addBackground( 'online_magazine_page_background', array( 'name' => esc_html__( 'Page Background', 'online-magazine' )));
            $metas->addColor( 'online_magazine_page_heading_color', array( 'name' => esc_html__( 'Page Heading Color', 'online-magazine' )));
            $metas->addColor( 'online_magazine_page_text_color', array( 'name' => esc_html__( 'Page Text Color', 'online-magazine' )));
            $metas->addColor( 'online_magazine_page_link_color', array( 'name' => esc_html__( 'Page Link Color', 'online-magazine' ), 'group' => 'start' ));
            $metas->addColor( 'online_magazine_page_link_hov_color', array( 'name' => esc_html__( 'Page Link Color(Hover)', 'online-magazine' ), 'group' => 'end' ));
            $metas->closeTab();

            $metas->openTab( 'online_magazine_page_banner_setting', array( 'name' => esc_html__( 'Header Banner Settings', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addCheckbox( 'online_magazine_hide_titlebar', array( 'name' => esc_html__( 'Hide Header Banner', 'online-magazine' )));

            $Conditinal_fields[] = $metas->addSelect( 'online_magazine_banner_style', array(
                'default' => esc_html__( 'Default', 'online-magazine' ),
                'banner-style1' => esc_html__( 'Style 1', 'online-magazine' ),
                'banner-style2' => esc_html__( 'Style 2', 'online-magazine' )
                    ), array( 'name' => esc_html__( 'Page Banner Style', 'online-magazine' ), 'std' => array( 'style1' ), 'class' => 'no-fancy' ), true);
            $Conditinal_fields[] = $metas->addBackground( 'online_magazine_page_banner', array( 'name' => esc_html__( 'Page Banner', 'online-magazine' )), true);
            $Conditinal_fields[] = $metas->addColor( 'online_magazine_page_title_color', array( 'name' => esc_html__( 'Page Title/Breadcrumb Color', 'online-magazine' )), true);
            $Conditinal_fields[] = $metas->addDimension( 'online_magazine_page_title_spacing', array( 'name' => esc_html__( 'Top & Bottom Spacing(px)', 'online-magazine' ), 'position' => array( 'top', 'bottom' )), true);
            $metas->addCondition( 'online_magazine_overwrite_pagebanner', array(
                'name' => __( 'Overwrite Page Banner', 'mmb' ),
                'desc' => __( 'Turn ON if you want to overwrite the settings', 'mmb' ),
                'fields' => $Conditinal_fields,
                'std' => false,
                'inline' => false,
            ));


            $Conditinal_fields1[] = $metas->addText( 'online_magazine_page_banner_shortcode', array( 'name' => esc_html__( 'Add ShortCode', 'online-magazine' )), true);
            $Conditinal_fields1[] = $metas->addRadio( 'online_magazine_page_banner_shortcode_width', array(
                'full-width' => esc_html__( 'Full Width', 'online-magazine' ),
                'container' => esc_html__( 'Container', 'online-magazine' ),
                    ), array( 'name' => esc_html__( 'Page Banner Width', 'online-magazine' ), 'std' => array( 'full-width' ), 'class' => 'no-fancy', 'group' => 'start' ), true);
            $Conditinal_fields1[] = $metas->addDimension( 'online_magazine_page_banner_shortcode_spacing', array( 'name' => esc_html__( 'Spacing(px)', 'online-magazine' ), 'position' => array( 'top', 'bottom', 'left', 'right' )), true);
            $metas->addCondition( 'online_magazine_custom_pagebanner', array(
                'name' => __( 'Enable Page Banner Shortcode', 'mmb' ),
                'desc' => __( 'Replace Page Banner with Custom Content (Slider, Form or any thing that supports shortcode)', 'mmb' ),
                'fields' => $Conditinal_fields1,
                'std' => false,
                'inline' => false,
            ));
            $metas->closeTab();

            $metas->openTab( 'online_magazine_sidebar_setting', array( 'name' => esc_html__( 'Sidebar Settings', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addImageRadio( 'online_magazine_sidebar_layout', array(
                'default' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/default-sidebar.jpg',
                'right-sidebar' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/right-sidebar.jpg',
                'left-sidebar' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/left-sidebar.jpg',
                'no-sidebar' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/no-sidebar.jpg',
                'no-sidebar-narrow' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/no-sidebar-narrow.jpg',
                    ), array( 'name' => esc_html__( 'Sidebar Layouts', 'online-magazine' ), 'std' => array( 'default' )
            ));
            $metas->addWidgetList( 'online_magazine_page_sidebar_id', array( 'name' => esc_html__( 'Select Sidebar', 'online-magazine' ), 'desc' => esc_html__( 'Replaces Default Sidebar', 'online-magazine' )));
            $metas->closeTab();

            /*
             * Don't Forget to Close up the meta box Declaration 
             */
            //Finish Meta Box Declaration 
            $metas->Finish();
        }

        public function add_post_metabox() {

            $config = array(
                'id' => 'online_magazine_post_settings',
                'title' => esc_html__( 'Post Setting', 'online-magazine' ),
                'pages' => array( 'post' ),
                'context' => 'normal',
                'priority' => 'high',
                'fields' => array(),
                'use_with_theme' => plugin_dir_url( __FILE__ )
            );


            /*
             * Initiate your meta box
             */
            $metas = new Online_Magazine_Meta_Box($config);

            /*
             * Add fields
             */
            $metas->openTab( 'online_magazine_general_setting', array( 'name' => esc_html__( 'General Settings', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addCheckbox( 'online_magazine_hide_header', array( 'name' => esc_html__( 'Hide Header', 'online-magazine' ), 'group' => 'start' ));
            $metas->addCheckbox( 'online_magazine_hide_footer', array( 'name' => esc_html__( 'Hide Footer', 'online-magazine' ), 'group' => 'end' ));
            $metas->addBackground( 'online_magazine_page_background', array( 'name' => esc_html__( 'Page Background', 'online-magazine' )));
            $metas->addColor( 'online_magazine_page_heading_color', array( 'name' => esc_html__( 'Page Heading Color', 'online-magazine' )));
            $metas->addColor( 'online_magazine_page_text_color', array( 'name' => esc_html__( 'Page Text Color', 'online-magazine' )));
            $metas->addColor( 'online_magazine_page_link_color', array( 'name' => esc_html__( 'Page Link Color', 'online-magazine' ), 'group' => 'start' ));
            $metas->addColor( 'online_magazine_page_link_hov_color', array( 'name' => esc_html__( 'Page Link Color(Hover)', 'online-magazine' ), 'group' => 'end' ));
            $metas->closeTab();

            $metas->openTab( 'online_magazine_post_setting', array( 'name' => esc_html__( 'Post Settings', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addImageRadio( 'online_magazine_post_layout', array(
                'default' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/default-sidebar.jpg',
                'single-layout1' => get_template_directory_uri() . '/inc/theme-options/images/single-layouts/single-layout1.png',
                'single-layout2' => get_template_directory_uri() . '/inc/theme-options/images/single-layouts/single-layout2.png',
                    ), array( 'name' => esc_html__( 'Post Layouts', 'online-magazine' ), 'std' => array( 'default' ), 'class' => 'ht-big-thumb'
            ));
            $metas->closeTab();

            $metas->openTab( 'online_magazine_sidebar_setting', array( 'name' => esc_html__( 'Sidebar Settings', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addImageRadio( 'online_magazine_sidebar_layout', array(
                'default' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/default-sidebar.jpg',
                'right-sidebar' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/right-sidebar.jpg',
                'left-sidebar' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/left-sidebar.jpg',
                'no-sidebar' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/no-sidebar.jpg',
                'no-sidebar-narrow' => get_template_directory_uri() . '/inc/theme-options/images/sidebar-layouts/no-sidebar-narrow.jpg',
                    ), array( 'name' => esc_html__( 'Sidebar Layouts', 'online-magazine' ), 'std' => array( 'default' )
            ));
            $metas->addWidgetList( 'online_magazine_page_sidebar_id', array( 'name' => esc_html__( 'Select Sidebar', 'online-magazine' ), 'desc' => esc_html__( 'Replaces Default Sidebar', 'online-magazine' )));
            $metas->closeTab();

            /*
             * Don't Forget to Close up the meta box Declaration 
             */
            //Finish Meta Box Declaration 
            $metas->Finish();
        }

        public function add_product_metabox() {

            $config = array(
                'id' => 'online_magazine_page_settings',
                'title' => esc_html__( 'Page Setting', 'online-magazine' ),
                'pages' => array( 'product' ),
                'context' => 'normal',
                'priority' => 'low',
                'fields' => array(),
                'use_with_theme' => plugin_dir_url( __FILE__ )
            );


            /*
             * Initiate your meta box
             */
            $metas = new Online_Magazine_Meta_Box($config);

            /*
             * Add fields
             */
            $metas->openTab( 'online_magazine_product_video', array( 'name' => esc_html__( 'Product video', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addText( 'online_magazine_product_video_popup_url', array( 'name' => esc_html__( 'Enter URL of Youtube or Vimeo or specific filetypes', 'online-magazine' )));
            $metas->addImage( 'online_magazine_product_video_thumbnail', array( 'name' => esc_html__( 'Add Video Thumbnail', 'online-magazine' )));
            $metas->closeTab();

            $metas->openTab( 'online_magazine_360_view', array( 'name' => esc_html__( 'Product 360 View', 'online-magazine' ), 'icon' => 'dashicons-admin-generic dashicons' ));
            $metas->addGallery( 'online_magazine_360_view_gallery_images', array( 'name' => esc_html__( 'Product Gallery Images', 'online-magazine' ), 'desc' => esc_html__( 'Drag to Reorder the position', 'online-magazine' )));
            $metas->closeTab();

            /*
             * Don't Forget to Close up the meta box Declaration 
             */
            //Finish Meta Box Declaration 
            $metas->Finish();
        }

    }

}

new Online_Magazine_Meta_Box_Config();
