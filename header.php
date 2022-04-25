<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online_Magazine
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <?php wp_body_open(); ?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'online-magazine'); ?></a>

            <div class="site-wrapper">
                <!-- Site header -->
                <header id="om-masthead" class="site-header">
                    <!-- Mobile header -->
                    <div id="atbs-mobile-header" class="mobile-header visible-xs visible-sm ">
                        <div class="mobile-header__inner mobile-header__inner--flex">
                            <!-- mobile logo open -->
                            <div class="header-branding header-branding--mobile mobile-header__section text-left">
                                <div class="header-logo header-logo--mobile flexbox__item text-left">
                                     <?php online_magazine_header_logo()?>
                                </div>
                            </div>
                            <!-- logo close -->
                            <div class="mobile-header__section text-right">
                                <div class="flexbox has-bookmark-list">
                                    <?php 
                                    $online_magazine_enable_search = get_theme_mod('online_magazine_mh_show_search', true);
                                     $online_magazine_enable_offcanvas = get_theme_mod('online_magazine_mh_show_offcanvas', true);
                                    if ($online_magazine_enable_search) {
                                        ?>
                                        <button type="submit" class="mobile-header-btn js-search-dropdown-toggle">
                                            <i class="mdicon mdicon-search mdicon--last hidden-xs"></i><i class="mdicon mdicon-search visible-xs-inline-block"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>

                                    <?php 
                                    if ($online_magazine_enable_offcanvas){
                                        ?>
                                        <a href="#atbs-offcanvas-primary" class="offcanvas-menu-toggle mobile-header-btn js-atbs-offcanvas-toggle">
                                            <i class="mdicon mdicon-menu mdicon--last hidden-xs"></i><i class="mdicon mdicon-menu visible-xs-inline-block"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation bar -->
                    <nav class="navigation-bar hidden-xs hidden-sm js-sticky-header-holder">
                        <div class="container">
                            <div class="navigation-bar__inner">
                                <div class="navigation-bar__section">
                                    <div class="header-logo">
                                      <?php online_magazine_header_logo()?>
                                    </div>
                                    
                                </div>
                                <div class="navigation-wrapper navigation-bar__section js-priority-nav">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'container' => 'false',
                                        'menu_class' => 'navigation navigation--main navigation--inline flexbox-wrap flexbox-right-x',
                                        'menu_id' => 'menu-main-menu',
                                    ));
                                    ?>
                                </div>

                                <div class="navigation-bar__section">
                                    <?php 
                                    $online_magazine_enable_search = get_theme_mod('online_magazine_mh_show_search', true);
                                    if ($online_magazine_enable_search) {
                                        ?>
                                        <button type="submit" class="mobile-header-btn js-search-dropdown-toggle">
                                            <i class="mdicon mdicon-search"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>
                                </div><!-- .navigation-bar__section -->
                            </div><!-- .navigation-bar__inner -->
                            <?php do_action('online_magazine_header_search_form'); ?>
                        </div><!-- .container -->
                    </nav><!-- Navigation-bar -->
                </header>
        </div>
    