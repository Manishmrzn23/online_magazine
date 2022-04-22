<?php
/**
 * Online Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Online_Magazine
 */

if ( ! defined( 'ONLINE_MAGAZINE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ONLINE_MAGAZINE_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function online_magazine_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Online Magazine, use a find and replace
		* to change 'online-magazine' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'online-magazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'online-magazine' ),
				'footer'=> esc_html__( 'footer', 'online-magazine' )
			)
		);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

	// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'online_magazine_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

	// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'online_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */


if (!function_exists('online_magazine_fonts_url')) :

    /**
     * Register Google fonts for Viral Mag.
     *
     * @since Online Magazine 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function online_magazine_fonts_url() {
        $fonts_url = '';
        $subsets = 'latin,latin-ext';
        $fonts = $standard_font_family = $default_font_list = $font_family_array = $variants_array = $font_array = $google_fonts = array();

        $custom_fonts = array(
            'online_magazine_body_family' => 'Poppins',
            'online_magazine_menu_family' => 'Poppins',
            'online_magazine_h_family' => 'Poppins',
            'online_magazine_page_title_family' => 'Default',
            'online_magazine_frontpage_title_family' => 'Default',
            'online_magazine_frontpage_block_title_family' => 'Default',
            'online_magazine_sidebar_title_family' => 'Default'
        );

        $common_header_typography = get_theme_mod('online_magazine_common_header_typography', true);
        if ($common_header_typography) {
            $custom_fonts['online_magazine_h_family'] = 'Oswald';
        } else {
            $custom_fonts['online_magazine_h1_family'] = 'Oswald';
            $custom_fonts['online_magazine_h2_family'] = 'Oswald';
            $custom_fonts['online_magazine_h3_family'] = 'Oswald';
            $custom_fonts['online_magazine_h4_family'] = 'Oswald';
            $custom_fonts['online_magazine_h5_family'] = 'Oswald';
            $custom_fonts['online_magazine_h6_family'] = 'Oswald';
        }

        $customizer_fonts = apply_filters('online_magazine_customizer_fonts', $custom_fonts);
        
        $standard_font = online_magazine_standard_font_array();
        $google_font_list = online_magazine_google_font_array();
        $default_font_list = online_magazine_default_font_array();

        foreach ($standard_font as $key => $value) {
            $standard_font_family[] = $value['family'];
        }

        foreach ($default_font_list as $key => $value) {
            $default_font_family[] = $value['family'];
        }

        foreach ($customizer_fonts as $key => $value) {
            $font_family_array[] = get_theme_mod($key, $value);
            
        }
        var_dump($font_family_array);
        $font_family_array = array_unique($font_family_array);
        $font_family_array = array_diff($font_family_array, array_merge($standard_font_family, $default_font_family));

        foreach ($font_family_array as $font_family) {
            $font_array = online_magazine_search_key($google_font_list, 'family', $font_family);
            $variants_array = $font_array['0']['variants'];
            $variants_keys = array_keys($variants_array);
            $variants = implode(',', $variants_keys);

            $fonts[] = $font_family . ':' . str_replace('italic', 'i', $variants);
        }
        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'viral-mag');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                'display' => 'swap',
                    ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;


function online_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'online_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'online_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function online_magazine_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'online-magazine' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'online-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	 register_sidebar(array(
        'name' => esc_html__('Right Sidebar', 'online-magazine'),
        'id' => 'online-magazine-sidebar',
        'description' => '',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}
add_action( 'widgets_init', 'online_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function online_magazine_scripts() {
	wp_enqueue_style( 'online-magazine-style', get_stylesheet_uri(), array(), ONLINE_MAGAZINE_VERSION );
	wp_style_add_data( 'online-magazine-style', 'rtl', 'replace' );

	wp_enqueue_style( 'favicon', get_template_directory_uri().'/assets/img/favicon.png', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'vendor', get_template_directory_uri().'/assets/css/vendors.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'style', get_template_directory_uri().'/assets/css/style.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'all-style', get_template_directory_uri().'/assets/css/all-style.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'font', get_template_directory_uri().'/assets/css/font.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'color', get_template_directory_uri().'/assets/css/color.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'fomt-awes', get_template_directory_uri().'/assets/css/font-awesome-4.7.0.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'icofont', get_template_directory_uri().'/assets/css/icofont.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'eleganticons', get_template_directory_uri().'/assets/css/eleganticons.css', array(),  ONLINE_MAGAZINE_VERSION );
	wp_enqueue_style( 'essential-icon', get_template_directory_uri().'/assets/css/essential-icon.css', array(),  ONLINE_MAGAZINE_VERSION );

	wp_add_inline_style('online-magazine-style', online_magazine_dynamic_styles());
	


	wp_enqueue_script( 'online-magazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), ONLINE_MAGAZINE_VERSION, true );
	// wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), ONLINE_MAGAZINE_VERSION, true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), ONLINE_MAGAZINE_VERSION, true );
	wp_enqueue_script( 'vendors', get_template_directory_uri() . '/assets/js/vendors.js', array('jquery'), ONLINE_MAGAZINE_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


add_action( 'wp_enqueue_scripts', 'online_magazine_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function viral_news_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('online-magazine-admin-scripts', get_template_directory_uri() . '/inc/js/admin-scripts.js', array('jquery'), ONLINE_MAGAZINE_VERSION, true);
  
}

add_action('admin_enqueue_scripts', 'viral_news_admin_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Metabox class File
 */
require get_template_directory() . '/inc/meta-box/meta-box-class.php';
require get_template_directory() . '/inc/meta-box/metabox-config.php';

/**
 * Helper function File
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Extra function File
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Widgets File
 */
require get_template_directory() . '/inc/widgets/widget-personal-info.php';
require get_template_directory() . '/inc/widgets/widget-fields.php';

/**
 * Menu Icons
 */
if (!class_exists('Menu_Icons')) {
    require get_template_directory() . '/inc/assets/menu-icons/menu-icons.php';
}

/**
 * Custom Style File
 */
require get_template_directory() . '/inc/style.php';


/**
 * Theme Functions File
 */
require get_template_directory() . '/inc/theme-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter('paginate_links_output', 'online_magazine_change_pagination_html');

function online_magazine_change_pagination_html($output){
	$output = str_replace(array('page-numbers', 'current', 'next', 'prev', 'nav-links'), array('atbs-pagination__item', 'atbs-pagination__item-current', 'atbs-pagination__item-next', 'atbs-pagination__item-prev', 'ds'), $output);
	return $output;
}

add_filter('navigation_markup_template', 'online_magazine_change_div_html');

function online_magazine_change_div_html($out){
	$out=str_replace("nav-links","atbs-pagination__links text-center",$out);
	return $out;

}
add_action( 'template_redirect', 'redreict_to_custom_404_page' );
function redreict_to_custom_404_page(){
    // check if is a 404 error
    if( is_404()  ){
        wp_redirect( home_url( '/404page/' ) );
        exit();
    }
}




if (!function_exists('online_magazine_comment')) {

	function online_magazine_comment($comment, $args, $depth) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? 'parent' : '', $comment); ?>>

		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
						<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?> 
						<b><?php echo sprintf('<span class="comment-author-name">%s</span>', get_comment_author_link($comment)); ?></b>
				</div><!-- .comment-author -->
				<div class="comment-metadata">
						<a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>" class="comment-timestamp"><?php
						/* translators: 1: comment date, 2: comment time */
						printf(esc_html__('%1$s at %2$s', 'online-magazine'), get_comment_date('', $comment), get_comment_time());
					?></a>
					<span class="edit-link">
					</span>
				</div>

				<?php if ('0' == $comment->comment_approved) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'online-magazine'); ?></p>
				<?php endif; ?>
				<?php edit_comment_link(esc_html__('Edit', 'online-magazine'), '<span class="edit-link">', '</span>'); ?>
		    </footer><!-- .comment-meta -->


		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
			<?php
			comment_reply_link(array_merge($args, array(
				'depth' => $depth,
				'max_depth' => $args['max_depth'],
				'before' => '<div class="reply">',
				'after' => '</div>'
			)));
			?>

	</div><!-- .comment-body -->





	<?php
}

}