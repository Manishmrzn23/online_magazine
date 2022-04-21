<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Online_Magazine
 */
get_header();
?>

<!-- Site header -->
<div class="site-content">
    <div class="atbs-block atbs-block--fullwidth module-404">
        <div class="container">
            <div class="text-error">
                <p>404</p>
                <h2 class="error">Something went wrong!</h2>
                <h3>We couldn't find the page you're looking for. Try searching or go back to the <a href="<?php echo esc_url(home_url('/')); ?>">Homepage</a></h3>
            </div>
        </div>
    </div>
</div><!-- .site-content -->

<?php
get_footer();
