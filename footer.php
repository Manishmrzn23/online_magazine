<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online_Magazine
 */


$online_magazine_footer_logo=get_theme_mod('online_magazine_footer_logo');
$online_magazine_social_icons=get_theme_mod('online_magazine_social_icons');
$social_icons = json_decode($online_magazine_social_icons);
$online_magazine_footer_copyright=get_theme_mod('online_magazine_footer_copyright');



?>

<!-- site-footer -->
<footer class="site-footer site-footer--white site-footer site-footer__section--flex  site-footer--inverse inverse-text">
    <div class="container">
        <div class="site-footer__section-inner inverse-text">
            <div class="section-row">
                <div class="section-column section-column-left text-left">
                    <div class="site-logo">
                        <a href="home-1.html">
                            <img src="<?php echo $online_magazine_footer_logo;?>" alt="logo" width="108">
                        </a>
                    </div>
                </div>
                <div class="section-column section-column-center text-center">
                    <nav class="footer-menu text-center">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'container' => 'false',
                            'menu_class' => 'navigation navigation--footer navigation--inline',
                            'menu_id' => 'menu-footer-menu',

                        ) );
                        ?>
                    </nav>
                </div>
                <div class="section-column section-column-right text-right section-socials">
                    <ul class="social-list social-list--md list-horizontal">
                        <?php 
                        if (!empty($social_icons)) {
                            foreach ($social_icons as $social_icon) {
                                if ($social_icon->enable === 'yes' && !empty($social_icon->link)) {
                                    echo '<li><a href="' . esc_attr($social_icon->link) . '" target="_blank"><i class="' . esc_attr($social_icon->icon) . '"></i></a></li>';
                                }
                            }
                        }?>

                    </ul>
                </div>
            </div>
            <?php if (!empty($online_magazine_footer_copyright)) { ?>
                <div class="section-row section-last-child">
                    <div class="copy-right text-center">
                        <span> <?php echo do_shortcode($online_magazine_footer_copyright); ?></span> <a href="https://themeforest.net/user/designuptodate/portfolio"></a>
                    </div>
                </div>
            <?php }?>    
        </div>
    </div>
</footer>   
<!-- site-footer -->


<!-- Sticky header -->
<div id="atbs-sticky-header" class="sticky-header js-sticky-header">
    <!-- Navigation bar -->
    <nav class="navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm ">
        <div class="navigation-bar__inner">
            <div class="navigation-bar__section">
                    <?php 
                    $online_magazine_enable_offcanvas = get_theme_mod('online_magazine_mh_show_offcanvas', true);
                    if ($online_magazine_enable_offcanvas){
                        ?>
                        <a href="#atbs-offcanvas-primary"
                        class="offcanvas-menu-toggle navigation-bar-btn js-atbs-offcanvas-toggle">
                            <i class="mdicon mdicon-menu icon--2x"></i>
                        </a>
                    <?php
                    }
                    ?>
                <div class="site-logo header-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php if ( has_custom_logo() ) : ?>
                           <?php the_custom_logo(); ?>
                       <?php endif; ?>
                   </a>
                </div>
            </div>

   <div class="navigation-wrapper navigation-bar__section js-priority-nav">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => 'false',
        'menu_class' => 'navigation navigation--main navigation--inline flexbox-wrap',
        'menu_id' => 'menu-main-menu-1',

    ) );
    ?>

</div>

    <div class="navigation-bar__section lwa lwa-template-modal has-bookmark-list flexbox-wrap flexbox-center-y">
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
    </div>
</div><!-- .navigation-bar__inner -->
</nav>
</div><!-- Sticky header -->

<!-- Login modal -->
<div class="modal fade login-modal" id="login-modal" tabindex="-1" role="dialog"
aria-labelledby="login-modal-label">
<div class="modal-dialog" role="document">
    <div class="modal-content login-signup-form">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&#10005;</span></button>
                <div class="modal-title" id="login-modal-label">
                    <ul class="nav nav-tabs js-login-form-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#login-tab" aria-controls="login-tab"
                            role="tab" data-toggle="tab">Log in</a></li>
                            <li role="presentation"><a href="#signup-tab" aria-controls="signup-tab" role="tab"
                                data-toggle="tab">Sign up</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="login-tab">
                                <div class="login-with-social">
                                    <p>Log in with social account</p>
                                    <ul class="social-list social-list--circle list-center ">
                                        <li><a href="#" class="facebook-theme-bg text-white"><i
                                            class="mdicon mdicon-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class="twitter-theme-bg text-white"><i
                                            class="mdicon mdicon-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="googleplus-theme-bg text-white"><i
                                            class="mdicon mdicon-google-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="block-divider"><span>or</span></div>
                                <form name="loginform" id="loginform" action="#" method="post">
                                    <p class="login-username">
                                        <label for="user_login">Username</label>
                                        <input type="text" name="log" id="user_login" class="input" value="" size="20">
                                    </p>
                                    <p class="login-password">
                                        <label for="user_pass">Password</label>
                                        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20">
                                    </p>
                                    <p class="login-remember"><label><input name="rememberme" type="checkbox"
                                        id="rememberme" value="forever"> Remember
                                    Me</label>
                                </p>
                                <p class="login-submit">
                                    <input type="submit" name="wp-submit" id="wp-submit"
                                    class="btn btn-block btn-primary" value="Log In">
                                    <input type="hidden" name="redirect_to" value="#">
                                </p>
                                <p class="login-lost-password">
                                    <a href="#" class="link link--darken">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="signup-tab">
                            <form name="registerform" id="registerform" action="#" method="post">
                                <p class="register-username">
                                    <label for="user_register">Username</label>
                                    <input type="text" name="log" id="user_register" class="input" value="" size="20">
                                </p>
                                <p class="register-password">
                                    <label for="user_register_pass">Password</label>
                                    <input type="password" name="pwd" id="user_register_pass" class="input" value=""
                                    size="20">
                                </p>
                                <p class="register-submit">
                                    <input type="submit" name="wp-submit" id="wp-submit-register"
                                    class="btn btn-block btn-primary" value="Sign Up">
                                    <input type="hidden" name="redirect_to" value="#">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login modal -->

    <!-- Subscribe modal -->
    <div class="modal fade subscribe-modal" id="subscribe-modal" tabindex="-1" role="dialog"
    aria-labelledby="subscribe-modal-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&#10005;</span></button>
                    <h4 class="modal-title" id="subscribe-modal-label">Subscribe</h4>
                </div>
                <div class="modal-body">
                    <div class="subscribe-form subscribe-form--horizontal text-center max-width-sm">
                        <p class="typescale-1">
                            Join our <b>868,537</b> subscribers and get access to the latest tools, freebies, product
                            announcements and much more!
                        </p>
                        <div class="subscribe-form__fields">
                            <p>
                                <input type="email" name="EMAIL" placeholder="Your email address" required="">
                                <input type="submit" value="Subscribe" class="btn btn-primary">
                            </p>
                        </div>
                        <small>Don't worry, we don't spam</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe modal -->

    <!-- Off-canvas menu -->
    <div id="atbs-offcanvas-primary" class="atbs-offcanvas js-atbs-offcanvas">
        <!-- js-perfect-scrollbar-->
        <div class="atbs-offcanvas--inner js-perfect-scrollbar">
            <div class="atbs-offcanvas__section atbs-offcanvas__title border-bottom">
                <h2 class="site-logo">
                    <a href="home-1.html">
                        <!-- logo open -->
                        <img src="./img/logo.png" alt="logo">
                        <!-- logo close -->
                    </a>
                </h2>
                <ul class="social-list list-horizontal">
                    <li><a href="#" target="_blank"><i class="mdicon mdicon-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="mdicon mdicon-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="mdicon mdicon-google-plus"></i></a></li>
                    <li><a href="#" target="_blank"><i class="mdicon mdicon-instagram"></i></a></li>
                </ul>
                <a href="#atbs-offcanvas-primary" class="close-button atbs-offcanvas-close js-atbs-offcanvas-close"
                aria-label="Close">
                <div class="atbs-offcanvas-close--wrap">
                    <span aria-hidden="true">✕</span>
                </div>
            </a>
        </div>
        <div class="atbs-offcanvas__section atbs-offcanvas__section-navigation border-right">
            <div class="atbs-offcanvas__section-navigation--wrap">
                <div id="offcanvas-menu-desktop" class="menu-main-menu-container">
                    <ul id="menu-main-menu-2" class="navigation navigation--offcanvas">
                        <li class="menu-item-has-children current-menu-item">
                            <a href="home-1.html">Home</a>
                            <ul class="sub-menu">
                                <li><a href="home-1.html">Home 1</a></li>
                                <li><a href="home-2.html">Home 2</a></li>
                                <li><a href="home-3.html">Home 3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="single-1.html">Single Pages</a>
                            <ul class="sub-menu">
                                <li><a href="single-1.html">Single 1</a></li>
                                <li><a href="single-2.html">Single 2</a></li>
                                <li><a href="single-3.html">Single 3</a></li>
                                <li><a href="single-4.html">Single 4</a></li>
                                <li><a href="single-5.html">Single 5</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Archive</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="category-1.html">Category</a>
                                    <ul class="sub-menu">
                                        <li><a href="category-1.html">Category 1</a></li>
                                        <li><a href="category-2.html">Category 2</a></li>
                                        <li><a href="category-3.html">Category 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="tags.html">Archive Tags</a></li>
                                <li>
                                    <a href="author.html">Author</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="page.html">Page</a></li>
                                <li><a href="page-no-sidebar.html">Page No Sidebar</a></li>
                                <li><a href="search.html">Search</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="404.html">404</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-cat-3"><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 $backtotop = get_theme_mod('online_magazine_backtotop', true);
        if ($backtotop) {
            ?>
           <a href="#" class="atbs-go-top btn btn-default hidden-xs js-go-top-el">
                <i class="mdicon mdicon-arrow_upward"></i>
           </a>
            <?php
        }?>

</div><!-- .site-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
