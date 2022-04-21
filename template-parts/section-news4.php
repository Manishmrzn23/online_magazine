 
<?php
$online_magazine_news_4_super_title = get_theme_mod('online_magazine_news_4_super_title', 'News Fourth Section Super Title');
$online_magazine_news_4_title = get_theme_mod('online_magazine_news_4_title', esc_html__('News Fourth Section Title', 'online-magazine'));
$online_magazine_news_4_subtitle = get_theme_mod('online_magazine_news_4_subtitle', esc_html__('News Fourth Section Sub Title', 'online-magazine'));
$online_magazine_news_4_button_text = get_theme_mod('online_magazine_news_4_button_text', esc_html__('Button Text', 'online-magazine'));
$online_magazine_news_4_cat = get_theme_mod('online_magazine_news_fourth_section_display_categories');
$online_magazine_counter_col = get_theme_mod('online_magazine_counter_col', "5");
?>




<div class="atbs-block atbs-block--fullwidth">
    <div class="container">
        <div class="row">
            <div class="atbs-main-col">
                <!-- listing-grid-a -->
                <div class="atbs-block atbs-block--fullwidth atbs-listing-grid-a">
                    <div class="block-heading block-heading-normal block-heading--has-subtitle">
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_4_super_title) { ?>
                                <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_4_super_title); ?></span>
                            <?php } ?>


                            <?php if ($online_magazine_news_4_title) { ?>
                                <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_4_title); ?></h4>
                            <?php } ?>

                        </div>
                        <div class="block-heading__section">
                            <?php if ($online_magazine_news_4_subtitle) { ?>
                                <div class="block-heading__description block-heading__description--line-before"><?php echo esc_html($online_magazine_news_4_subtitle); ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $online_magazine_counter_col,
                        'orderby' => 'date'
                    );
                    $author_name = get_the_author();
                    $author_id = get_the_author_meta('ID');
                    $author_url = get_author_posts_url($author_id);

                    $query = new WP_Query($args);
                    ?>
                    <?php if (!empty($online_magazine_news_4_cat)) { ?>

                        <div class="atbs-block__inner">
                            <div class="posts-list posts__vertical_style_2 flexbox-wrap flex-space-30">
                                <?php if ($query->have_posts()) : ?>
                                    <?php
                                    $i = 1;
                                    $last_post = $query->found_posts;
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        if ($i == 1) {
                                            ?>
                                            <div class="list-item flexbox-item-100">
                                                <article class="post post--overlay post--overlay-bottom post--overlap post--overlap-fullwidth_style_2 post--overlay-height-520">
                                                    <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                                        <a href="<?php the_permalink() ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Post Image">
                                                        </a>
                                                    </div>
                                                    <div class="post__text">
                                                        <div class="post__text-wrap">
                                                            <div class="post__text-inner bg-white">
                                                                <?php
                                                                $category_detail = get_the_category($post->ID);
                                                                foreach ($category_detail as $cat_name) {
                                                                    ?>
                                                                    <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php the_permalink() ?>"><?php echo esc_attr($cat_name->name) ?></a>
                                                                    <?php
                                                                }
                                                                ?> 
                                                                <h3 class="post__title typescale-3 custom-typescale-3 margin-bottom-15">
                                                                    <a class="line-limit line-limit-3" href="single-1.html"><?php echo get_the_title() ?></a>
                                                                </h3>
                                                                <div class="post__excerpt post__excerpt--lg"><?php echo get_the_excerpt() ?></div>
                                                                <div class="post__readmore text-right">
                                                                    <a class="button__readmore" href="<?php the_permalink() ?>">
                                                                        <span class="readmore__text"><?php echo esc_html($online_magazine_news_4_button_text); ?></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a class="link-overlay" href="<?php the_permalink() ?>"></a>
                                                </article>
                                            </div>
                                        <?php } ?>

                                        <?php if ($i != 1) { ?>
                                            <div class="list-item flexbox-item-50">
                                                <article class="post post--vertical post--vertical-medium post__thumb-420">
                                                    <div class="post__thumb atbs-thumb-object-fit">
                                                        <a href="<?php the_permalink() ?>">
                                                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="file not found">
                                                        </a>
                                                    </div>
                                                    <div class="post__text ">
                                                        <div class="post__meta">
                                                            <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                                                <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                                    <img alt="designuptodate" src="<?php echo get_avatar_url($author_id) ?>">
                                                                </a>
                                                                <div class="author__text">
                                                                    <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name); ?></a>
                                                                    <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time('G:i'); ?>"><?php echo get_the_date(); ?></time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $category_detail = get_the_category($post->ID);
                                                        foreach ($category_detail as $cat_name) {
                                                            ?>
                                                            <a class="post__cat post__cat--bg cat-theme-bg overlay-item--top-left" href="<?php the_permalink() ?>"><?php echo esc_attr($cat_name->name) ?></a>
                                                            <?php
                                                        }
                                                        ?> 
                                                        <h3 class="post__title typescale-2 custom-typescale-2">
                                                            <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title() ?></a>
                                                        </h3>
                                                        <div class="post__readmore">
                                                            <a href="<?php the_permalink() ?><?php the_permalink() ?>" class="button__readmore">
                                                                <span class="readmore__text"><?php echo esc_html($online_magazine_news_4_button_text); ?></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        $i++;
                                    endwhile;
                                    ?>
                                    <?php
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>


                        </div>
                    <?php } ?>
                </div>
                <!-- listing-grid-a -->
            </div>

            <div class="atbs-sub-col js-sticky-sidebar">
                <!-- widget-about -->
                <div class="widget atbs-widget atbs-widget--about">
                    <div class="widget__title text-center">
                        <h4 class="widget__title-text">About me</h4>
                    </div>
                    <div class="atbs-widget__inner">
                        <div class="widget__content text-center">
                            <div class="author__avatar">
                                <img src="http://placehold.it/220x200" alt="file not found">
                            </div>
                            <div class="author__name">
                                <a href="author.html">Ava Isabella</a>
                            </div>
                            <div class="author__text">
                                <span class="line-limit line-limit-4">Do not mind anything that anyone tells you about anyone else. Judge everyone and everything for yourself.</span>
                            </div>
                            <div class="author__social">
                                <ul class="social-list social-list--sm list-horizontal">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="mdicon mdicon-public"></i>
                                            <span class="sr-only">Website</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="mdicon mdicon-twitter"></i>
                                            <span class="sr-only">Twitter</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="mdicon mdicon-facebook"></i>
                                            <span class="sr-only">Facebook</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <span class="sr-only">Youtube</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Module-->
                </div>
                <!-- widget-about -->

                <!-- subscribe -->
                <div class="widget atbs-widget atbs-widget--subscribe">
                    <div class="widget__title widget__title--line-below text-center">
                        <h4 class="widget__title-text">Subscribe</h4>
                    </div>
                    <div class="atbs-widget__inner text-center">
                        <form class="subscribe-form subscribe-form--center" method="post">
                            <p class="subscribe-form__info">Class aptent taciti sociosqud lito. Subscribe and join our club.</p>
                            <div class="subscribe-form__fields">
                                <input type="email" name="email" placeholder="Your email address" required>
                                <input type="submit" value="Subscribe" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <!-- End Widget Module-->
                </div>
                <!-- subscribe -->

                <!-- twitter -->
                <div class="widget atbs-widget atbs-widget--twitter">
                    <div class="widget__title text-center">
                        <h4 class="widget__title-text">Latest Tweets</h4>
                    </div>
                    <div class="atbs-widget__inner">
                        <div class="widget__content text-center">
                            <div class="twitter-list js-atbs-carousel-1i-twitter owl-carousel owl-loaded owl-drag">
                                <div class="twitter-item slide-content">
                                    <i class="mdicon mdicon-twitter"></i>
                                    <div class="twitter-message">
                                        <p>With people staying indoors right now, Melody Nieves&nbsp;makes the case for why artists should be live streaming and sh… <a href="#" class="twitter-link">https://t.co/hWDOgIFkTh</a></p>
                                        <em class="twitter-timestamp">Mar 14, 2020</em>
                                    </div>
                                </div>
                                <div class="twitter-item slide-content">
                                    <i class="mdicon mdicon-twitter"></i>
                                    <div class="twitter-message">
                                        <p>Found yourself with little extra time on your hands thanks to a cancelled commute? Perhaps it's time to pick up a n… <a href="#" class="twitter-link">https://t.co/3zgqu1jzFK</a></p>
                                        <em class="twitter-timestamp">Mar 14, 2020</em>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Module-->
                </div>
                <!-- twitter -->

                <!-- social -->
                <div class="widget atbs-widget atbs-widget--social-counter">
                    <div class="atbs-widget__inner">
                        <ul class="list-unstyled list-space-xs">
                            <li>
                                <a href="#" class="social-tile social-facebook facebook-theme-bg">
                                    <div class="social-tile__inner flexbox">
                                        <div class="social-tile__left flexbox__item">
                                            <h5 class="social-tile__title meta-font">Facebook</h5><span class="social-tile__count">221.10K+ likes</span></div>
                                        <div class="social-tile__right"><i class="mdicon mdicon-facebook"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-tile social-twitter twitter-theme-bg">
                                    <div class="social-tile__inner flexbox">
                                        <div class="social-tile__left flexbox__item">
                                            <h5 class="social-tile__title meta-font">Twitter</h5><span class="social-tile__count">67.5K+ followers</span></div>
                                        <div class="social-tile__right"><i class="mdicon mdicon-twitter"></i></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="social-tile social-youtube youtube-theme-bg">
                                    <div class="social-tile__inner flexbox">
                                        <div class="social-tile__left flexbox__item">
                                            <h5 class="social-tile__title meta-font">Youtube</h5><span class="social-tile__count">339 subscribers</span></div>
                                        <div class="social-tile__right"><i class="mdicon mdicon-youtube"></i></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Widget Module-->
                </div>
                <!-- social -->
            </div>
        </div>
    </div>
</div>


