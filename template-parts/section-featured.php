<?php
$online_magazine_featured_section_display_post=get_theme_mod('online_magazine_featured_section_display_post');

 
if (get_theme_mod('online_magazine_featured_section_disable') != 'on') {
if(!empty($online_magazine_featured_section_display_post)){ 
    $args = array(
        'p' => $online_magazine_featured_section_display_post);
    $query = new WP_Query($args);
    
    if( $query->have_posts() ) : ?>
       <?php while( $query->have_posts() ) : $query->the_post() ?>
        

        <div class="atbs-block atbs-block--fullwidth atbs-featured-module-a">
            <div class="container">
                <div class="atbs-block__inner">
                    <article class="post post--overlay post--overlap post--overlap-fullwidth post--overlay-height-600 entry-author-horizontal-middle entry-author-horizontal-rotate">
                        <div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
                            <a href="<?php the_permalink() ?>">
                                <img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
                            </a>
                        </div>
                        <div class="post__text">
                            <div class="post__text-wrap flexbox-wrap">
                                <div class="post__text-inner bg-white">
                                    <?php 
                                    $category_detail=get_the_category( $post->ID );
                                    $author_id=get_the_author_meta('ID');
                                    $author_url=get_author_posts_url($author_id);
                                    $author_name=get_the_author();
                                    foreach ($category_detail as $cat_name ) {
                                        ?>
                                        <a href="<?php the_permalink() ?>" class="post__cat"><?php echo $cat_name->name?></a>
                                        <?php
                                    }
                                    ?>
                                    <h3 class="post__title title-line-bottom typescale-3_5 margin-bottom-0">
                                        <a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
                                    </h3>
                                    <div class="post__meta flexbox-wrap flexbox-bottom-y">
                                        <div class="entry-author post-author entry-author__avatar-40 entry-author-round entry-author_style_1">
                                            <a class="author__avatar" title="Posts by <?php echo $author_name;?> " rel="author" href="<?php echo esc_url($author_url); ?>">
                                                <img alt="Cdall" src="<?php echo get_avatar_url($author_id)?>">
                                            </a>
                                            <div class="author__text">
                                                <a class="author__name" title="Posts by <?php echo esc_attr($author_name);?> " rel="author" href="<?php echo esc_url($author_url); ?> "> <?php echo esc_attr($author_name);?></a>
                                                <time class="time published" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink() ?>" class="link-overlay"></a>
                    </article>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; 
wp_reset_postdata();
?>
<?php }?>
<?php }?>