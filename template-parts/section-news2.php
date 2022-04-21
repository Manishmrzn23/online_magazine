
<?php 
$online_magazine_news_2_super_title = get_theme_mod('online_magazine_news_2_super_title', 'News Second Section Super Title');
$online_magazine_news_2_title = get_theme_mod('online_magazine_news_2_title', esc_html__('News Second Section Title', 'online-magazine'));
$online_magazine_news_2_subtitle = get_theme_mod('online_magazine_news_2_subtitle', esc_html__('News Second Section Sub Title', 'online-magazine'));
$online_magazine_news_2_button_text = get_theme_mod('online_magazine_news_2_button_text', esc_html__('Button Text', 'online-magazine'));
$online_magazine_news_2_cat = get_theme_mod('online_magazine_news_two_section_display_categories');
?>


<?php 
if (get_theme_mod('online_magazine_second_news_section_disable') != 'on') {

    ?>
    <!-- post-grid-a -->
    <div class="atbs-block atbs-block--fullwidth atbs-post-grid-a">
        <div class="container">
            <div class="block-heading block-heading-normal block-heading--has-subtitle">
                <div class="block-heading__section">
                   <?php if ($online_magazine_news_2_super_title) { ?>
                    <span class="block-heading__subtitle"><?php echo esc_html($online_magazine_news_2_super_title); ?></span>
                <?php } ?>
                <?php if ($online_magazine_news_2_title) { ?>
                    <h4 class="block-heading__title"><?php echo esc_html($online_magazine_news_2_title); ?></h4>
                <?php } ?>
            </div>
            <div class="block-heading__section">
                <?php if ($online_magazine_news_2_subtitle) { ?>
                    <div class="block-heading__description block-heading__description--line-before"> <?php echo wp_kses_post(wpautop($online_magazine_news_2_subtitle)); ?></div>
                <?php } ?>
            </div>
        </div>


        <?php
        if($online_magazine_news_2_cat!=0){
            $args = array(
                'cat' => $online_magazine_news_2_cat,
                'posts_per_page' => '3'
            );
            $author_name=get_the_author();
            $author_id=get_the_author_meta('ID');
            $author_url=get_author_posts_url($author_id);

            $query = new WP_Query($args);

            ?>
            <div class="atbs-block__inner flexbox-wrap flex-space-30">
               <?php if( $query->have_posts() ) : ?>
                <?php 
                $i = 1;
                $last_post = $query->found_posts;
                while( $query->have_posts() ) : 
                    $query->the_post(); 
                    if($i == 1){
                        ?>
                        <div class="left-col">
                            <article class="post post--overlay post--overlap post--overlap-medium post--overlay-height-730">
                                <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                                    <a href="<?php the_permalink()?>">
                                        <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                    </a>
                                </div>
                                <div class="post__text inverse-text">
                                    <div class="post__text-wrap flexbox-wrap">
                                        <div class="post__text-inner">
                                          <?php 
                                          $category_detail=get_the_category( $post->ID );
                                          foreach ($category_detail as $cat_name ) {
                                            ?>
                                            <a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php the_permalink() ?>"><?php echo esc_attr($cat_name->name)?></a>
                                            <?php
                                        }
                                        ?>

                                        <h3 class="post__title typescale-2_5">
                                            <a class="line-limit line-limit-3" href="<?php the_permalink()?>"><?php echo get_the_title()?></a>
                                        </h3>
                                        <div class="post__readmore ">
                                            <a class="button__readmore" href="<?php the_permalink()?>">
                                                <span class="readmore__text"><?php echo esc_html($online_magazine_news_2_button_text); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php }

                if($i == 2){ ?>
                    <div class="right-col">
                        <div class="posts-list posts__vertical_style_1 flexbox-wrap flexbox-wrap-2i flex-space-30">

                            <div class="list-item">
                                <article class="post post--vertical post--vertical-medium post__thumb-420">
                                    <div class="post__thumb atbs-thumb-object-fit">
                                        <a href="<?php the_permalink()?>">
                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                        </a>
                                    </div>
                                    <div class="post__text ">
                                        <div class="post__meta">
                                            <div class="entry-author post-author entry-author__avatar-40 entry-author-round">
                                                <a class="author__avatar" href="<?php echo esc_url($author_url); ?>">
                                                    <img alt="designuptodate" src="<?php echo get_avatar_url($author_id)?>" >
                                                </a>
                                                <div class="author__text">
                                                    <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name);?></a>
                                                    <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        $category_detail=get_the_category( $post->ID );
                                        foreach ($category_detail as $cat_name ) {
                                            ?>
                                            <a class="post__cat post__cat--bg cat-theme-bg overlay-item--top-left" href="<?php the_permalink() ?>"><?php echo esc_attr($cat_name->name)?></a>
                                            <?php
                                        }
                                        ?> 
                                        <h3 class="post__title typescale-2 custom-typescale-2">
                                            <a class="line-limit line-limit-3" href="<?php the_permalink()?>"><?php echo get_the_title()?></a>
                                        </h3>
                                        <div class="post__readmore">
                                            <a href="<?php the_permalink()?>" class="button__readmore">
                                                <span class="readmore__text"><?php echo esc_html($online_magazine_news_2_button_text); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php } 

                        if($i == 3){?>

                            <div class="list-item">
                                <article class="post post--vertical post--vertical-reverse post--vertical-reverse-medium post__thumb-420">
                                    <div class="post__thumb atbs-thumb-object-fit">
                                        <a href="<?php the_permalink()?>">
                                            <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                                        </a>
                                    </div>
                                    <div class="post__text text-center">
                                       <?php 
                                       $category_detail=get_the_category( $post->ID );
                                       foreach ($category_detail as $cat_name ) {
                                        ?>
                                        <a class="post__cat post__cat-style-2" href="<?php the_permalink() ?>"><?php echo esc_attr($cat_name->name);?></a>
                                        <?php
                                    }
                                    ?> 
                                    <h3 class="post__title typescale-2 custom-typescale-2">
                                        <a class="line-limit line-limit-3" href="<?php the_permalink()?>"><?php echo get_the_title()?></a>
                                    </h3>
                                    <div class="post__meta">
                                        <div class="entry-author post-author entry-author-no-avatar">By 
                                            <a class="author__name" href="<?php echo esc_url($author_url); ?>"><?php echo esc_attr($author_name);?></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                    <?php if($i == 3 || $i == $last_post){ ?>        
                    </div>
                </div>
            <?php } 
            $i++;
        endwhile; ?>
    <?php endif; 
    wp_reset_postdata();
    ?>
</div>
<?php }?>
</div>
</div>
<?php }?>
<!-- post-grid-a -->
