<?php 
$online_magazine_news_3_super_title = get_theme_mod('online_magazine_news_3_super_title', 'News Third Section Super Title');
$online_magazine_news_3_title = get_theme_mod('online_magazine_news_3_title', esc_html__('News Third Section Title', 'online-magazine'));
$online_magazine_news_3_subtitle = get_theme_mod('online_magazine_news_3_subtitle', esc_html__('News Third Section Sub Title', 'online-magazine'));
$online_magazine_news_3_button_text = get_theme_mod('online_magazine_news_3_button_text', esc_html__('Button Text', 'online-magazine'));
$online_magazine_news_3_cat = get_theme_mod('online_magazine_news_third_section_display_categories');
?>


<?php 
if (get_theme_mod('online_magazine_third_news_section_disable') != 'on') {

    ?>
    <!-- listing-grid-b -->
    <div class="atbs-block atbs-block--fullwidth atbs-listing-grid-b">
        <div class="container">
            <div class="block-heading block-heading-normal block-heading--has-subtitle">
                <div class="block-heading__section">
                    <?php if ($online_magazine_news_3_super_title) { ?>
                        <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_3_super_title); ?></span>
                    <?php } ?>

                    <?php if ($online_magazine_news_3_title) { ?>
                        <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_3_title); ?></h4>
                    <?php } ?>
                </div>
                <div class="block-heading__section">
                    <?php if ($online_magazine_news_3_subtitle) { ?>
                        <div class="block-heading__description block-heading__description--line-before"><?php echo esc_html($online_magazine_news_3_subtitle); ?></div>
                    <?php } ?>
                    
                </div>
            </div>

            <?php if(!empty($online_magazine_news_3_cat)){ ?>
            <?php
            $args = array(
                'cat' => $online_magazine_news_3_cat,
                'posts_per_page' => '6'
            );

            $query = new WP_Query($args);
            $author_id=get_the_author_meta('ID');
            $author_url=get_author_posts_url($author_id);
            $author_name=get_the_author();
            $category_detail=get_the_category( $post->ID );
            
            ?>
            <div class="atbs-block__inner">
                <div class="posts-list posts__vertical_style_3 flexbox-wrap flexbox-wrap-3i    flex-space-30">
                   <?php if( $query->have_posts() ) : ?>
                    <?php while( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="list-item">
                            <article class="post post--vertical post--vertical-medium post__thumb-420">
                                <div class="post__thumb atbs-thumb-object-fit">
                                    <a href="<?php the_permalink() ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                    </a>
                                </div>
                                <div class="post__text ">
                                    <div class="post__meta">
                                        <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                            <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                <img alt="designuptodate" src="<?php echo get_avatar_url($author_id)?>">
                                            </a>
                                            <div class="author__text">
                                                <a class="author__name" href="author.html"><?php echo esc_attr($author_name);?></a>
                                                <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($category_detail as $cat_name ) {
                                        ?>
                                        <a class="post__cat post__cat--bg cat-theme-bg overlay-item--top-left" href="<?php the_permalink() ?>"><?php echo $cat_name->name; ?></a>
                                        <?php
                                    }
                                    ?>
                                    <h3 class="post__title typescale-2 custom-typescale-2">
                                        <a class="line-limit line-limit-4" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h3>
                                    <div class="post__readmore">
                                        <a href="<?php the_permalink() ?>" class="button__readmore">
                                            <span class="readmore__text"><?php echo esc_html($online_magazine_news_3_button_text); ?></span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                   <?php endif; 
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php }?>
        <!-- listing-grid-b -->