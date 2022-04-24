<?php 
function online_magazine_header_logo() {
    $hide_title = get_theme_mod('online_magazine_hide_title');
    $hide_tagline = get_theme_mod('online_magazine_hide_tagline');
    if (function_exists('has_custom_logo') && has_custom_logo()) {
        the_custom_logo();
    }
    if (!$hide_title || !$hide_tagline) {
    ?>
        <div class="om-site-title-tagline">
            <?php
            if (!$hide_title) {
                if (is_front_page()) :
                    ?>
                    <h1 class="om-site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="om-site-description"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;
                }                                               
            if (!$hide_tagline) {
                ?>
                <p class="om-site-description"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('description'); ?></a></p>
                <?php
            }
            ?>
        </div>
        <?php
    }
}