
<?php 
$online_magazine_news_1_super_title = get_theme_mod('online_magazine_news_1_super_title', 'News One Section Super Title');
$online_magazine_news_1_title = get_theme_mod('online_magazine_news_1_title', esc_html__('News One Section Title', 'online-magazine'));
$online_magazine_news_1_subtitle = get_theme_mod('online_magazine_news_1_subtitle', esc_html__('News One Section Sub Title', 'online-magazine'));
$online_magazine_news_1_cat = get_theme_mod('online_magazine_news_one_section_display_categories');
?>


<?php 
if (get_theme_mod('online_magazine_first_news_section_disable') != 'on') {

    ?>

    <div class="atbs-block atbs-block--fullwidth atbs-featured-module-b">
        <div class="container">
            <div class="block-heading block-heading-normal block-heading--has-subtitle">
                <div class="block-heading__section">
                   <?php if ($online_magazine_news_1_super_title) { ?>
                    <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_1_super_title); ?></span>
                <?php } ?>

                <?php if ($online_magazine_news_1_title) { ?>
                    <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_1_title); ?></h4>
                <?php } ?>
            </div>

            <div class="block-heading__section">
                <?php if ($online_magazine_news_1_subtitle) { ?>
                    <div class="block-heading__description block-heading__description--line-before"> <?php echo wp_kses_post(wpautop($online_magazine_news_1_subtitle)); ?></div>
                <?php } ?>
                
            </div>
        </div>
        
        <?php if(!empty($online_magazine_news_1_cat)){ ?>
            <div class="atbs-block__inner">
                <?php
                $args = array(
                    'cat' => $online_magazine_news_1_cat,
                    'posts_per_page' => '1'
                );

                $query = new WP_Query($args);
                
                if( $query->have_posts() ) : ?>
                    <?php while( $query->have_posts() ) : $query->the_post() ?>
                        <div class="main-section">
                            <article class="post post--horizontal post--horizontal-massive">
                                <div class="post__thumb atbs-thumb-object-fit">
                                    <a href="<?php the_permalink() ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="Post Image">
                                    </a>
                                </div>
                                <div class="post__text">
                                    <?php 
                                    $category_detail=get_the_category( $post->ID );
                                    foreach ($category_detail as $cat_name ) {
                                        ?>
                                        <a href="<?php echo get_category_link($cat_name->cat_ID) ?>" class="post__cat post__cat-style-2"><?php echo $cat_name->name?> </a>
                                        <?php
                                    }
                                    ?>
                                    <h3 class="post__title post__title--line-bellow typescale-3_5">
                                        <a class="line-limit line-limit-4" href="<?php the_permalink() ?>"><?php echo get_the_title()?></a>
                                    </h3>
                                    <div class="post__excerpt line-limit line-limit-4"><?php echo get_the_excerpt()?></div>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                <?php endif; 
                wp_reset_postdata();
                ?>


                <?php
                $args = array(
                    'cat' => $online_magazine_news_1_cat,
                    'offset' => '1',
                    'posts_per_page' => '4'
                );

                $query = new WP_Query($args);
                ?>
                
                <div class="sub-section">
                    <div class="posts-list posts__horizontal_style_1 flexbox-wrap flexbox-wrap-2i flex-space-30">
                        <?php if( $query->have_posts() ) : ?>
                            <?php while( $query->have_posts() ) : $query->the_post() ?>
                                <div class="list-item">
                                    <article class="post post--horizontal post--horizontal-tiny post--horizontal-middle">
                                        <div class="post__thumb post__thumb--circle">
                                            <a href="<?php the_permalink() ?>">
                                                <img src="<?php echo get_the_post_thumbnail_url()?>" alt="Post Image">
                                            </a>
                                        </div>
                                        <div class="post__text">
                                            <?php 
                                            $category_detail=get_the_category( $post->ID );
                                            foreach ($category_detail as $cat_name ) {
                                                ?>
                                                <a href="<?php the_permalink() ?>" class="post__cat"><?php echo $cat_name->name?> </a>
                                                <?php
                                            }
                                            ?>
                                            <h3 class="post__title typescale-0">
                                                <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title()?></a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; 
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>                
        <?php } ?>
    </div>
</div>
<?php }?>



<!-- module-b -->
