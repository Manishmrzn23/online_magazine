
<?php
get_header();
?>

<div class="site-content">
    <!-- module-a -->
    <?php get_template_part('template-parts/section', 'featured'); ?>
    <!-- module-a -->

    <!-- module-b -->
    <?php get_template_part('template-parts/section', 'news1'); ?>
    <!-- module-b -->

    <!-- post-grid-a -->
    <?php get_template_part('template-parts/section', 'news2'); ?> 
    <!-- post-grid-a -->

    <!-- listing-grid-b -->
    <?php get_template_part('template-parts/section', 'news3'); ?> 
    <!-- listing-grid-b -->

    <!-- listing-grid-a -->
    <?php get_template_part('template-parts/section', 'news4'); ?>
    <!-- listing-grid-a -->

    <?php get_template_part('template-parts/section', 'sidebar'); ?>

    <!-- post-grid-b -->
    <?php get_template_part('template-parts/section', 'news5'); ?>
    <!-- post-grid-b -->

</div><!-- .site-content -->

<?php
get_footer();
