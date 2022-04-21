<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online_Magazine
 */

?>





<div class="posts-list posts__horizontal_style_2 list-space-xxl">
	<div class="list-item">
		<article class="post post--overlay post--overlay-bottom post--overlap post--overlap-fullwidth_style_2 post--overlay-height-520">
			<div class="post__thumb post__thumb--overlay atbs-thumb-object-fit">
				<a href="<?php the_permalink() ?>">
					<img src="<?php echo get_the_post_thumbnail_url()?>" alt="Post Image">
				</a>
			</div>
			<div class="post__text">
				<div class="post__text-wrap">
					<div class="post__text-inner bg-white">
						<?php
						$category_detail=get_the_category( $post->ID );
						foreach ($category_detail as $cat_name ) {
							?>
							<a class="post__cat post__cat--bg cat-theme-bg post__cat-overhang-top" href="<?php the_permalink() ?>>"><?php echo esc_attr($cat_name->name)?></a>
							<?php
						}
						?> 
						<h3 class="post__title typescale-3 custom-typescale-3 margin-bottom-15">
							<a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title();?></a>
						</h3>
						<div class="post__excerpt post__excerpt--lg line-limit line-limit-3"><?php echo get_the_excerpt()?></div>
						<div class="post__readmore text-right">
							<a class="button__readmore" href="<?php the_permalink() ?>">
								<span class="readmore__text">View more</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<a class="link-overlay" href="<?php the_permalink() ?>"></a>
		</article>
	</div>
</div>


