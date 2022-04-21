<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Online_Magazine
 */

//if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	//return;
//}
//

// <aside id="secondary" class="widget-area">
	// <?php dynamic_sidebar( 'sidebar-1' ); 
// </aside><!-- #secondary -->


if (is_active_sidebar('online-magazine-sidebar')) {
    ?>
    <div class="atbs-sub-col js-sticky-sidebar">
        <?php dynamic_sidebar('online-magazine-sidebar'); ?>
    </div><!-- #secondary -->
    <?php
}?>