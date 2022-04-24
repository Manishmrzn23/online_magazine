<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Online_Magazine
 */

get_header();
?>

<?php while (have_posts()) : the_post();

	$author_id=get_the_author_meta('ID');
	$author_url=get_author_posts_url($author_id);
	$author_name=get_the_author();

	$category_detail=get_the_category( $post->ID );
	$tag_detail=get_the_tags( $post->ID );
	customSetPostViews(get_the_ID());
	?>
	<div class="site-content single-entry atbs-single-style-2">
		<div class="atbs-block atbs-block--fullwidth single-entry-wrap">
			<div class="container">
				<div class="row">
					<div class="atbs-main-col" role="main">
								<!-- Post Single -->
								<article class="atbs-block post post--single has-post-thumbnail">
									<div class="single-content">
										<header class="single-header">
											<?php
											foreach ($category_detail as $cat ) {
												?>
												<a class="entry-cat post__cat--bg cat-theme-bg" href="<?php echo get_category_link($cat->cat_ID) ?>"><?php echo $cat->name; ?></a>
												<?php
											}
											?>
											<h1 class="entry-title typescale-3_2"><?php echo get_the_title()?></h1>
											<!-- Entry meta -->
											<div class="entry-meta">
												<span class="entry-author">
													<a href="<?php echo esc_url($author_url); ?>"><img class="entry-author__avatar" src="<?php echo get_avatar_url($author_id)?>" alt="file not found">
														<?php echo esc_attr($author_name);?></a>
													</span>
													<span class="entry-time"><i class="mdicon mdicon-schedule"></i><time class="time" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time></span>
													<span>
														<i class="mdicon mdicon-visibility"></i><?php
														$post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true );

														if ( ! empty( $post_views_count ) ) {
															echo $post_views_count;
														}
														?>
													</span>
											</div>
										</header>
											<div class="entry-thumb single-entry-thumb">
												<img src="<?php echo get_the_post_thumbnail_url()?>" alt="file not found">
											</div>
											<div class="single-body entry-content typography-copy">
												<?php the_content()?>
											</div>
											<div class="entry-tags">
												<ul class="post__tags">
													
													<?php
													if ($tag_detail) {?>
														<li class="entry-tags__icon"><i class="mdicon mdicon-local_offer"></i></li>

														<?php
														foreach ($tag_detail as $tag ) {
															?>
															<li><a class="post-tag" rel="tag" href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name; ?></a></li>
															<?php
														}
													}
													?>
												</ul>
											</div>
											<?php
											if ($tag_detail) {
												$s = '';
												$tag_url='';
												foreach ($tag_detail as $tag) {

													$tags=$tag->name;
													$tag_url.=$s . $tags;
													$s = ',';
												}
											}	
											?>
											<footer class="single-footer entry-footer ">
												<div class="entry-info flexbox flexbox--middle">
													<div class="single-social-share">
														<div class="social-share">
															<ul class="social-list social-list--md list-horizontal">
																<li>
																	<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>">
																		<div class="share-item__icon">
																			<i class="mdicon mdicon-facebook " title="Facebook"></i>
																		</div>
																	</a>
																</li>
																<li>
																	<a href="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title(); ?>&via=<?php echo esc_attr($author_name);?>&hashtags=<?php echo $tag_url; ?>">
																		<div class="share-item__icon">
																			<i class="mdicon mdicon-twitter " title="Twitter"></i>
																		</div>
																	</a>
		                                                        </li>
			                                                    <li>
			                                                    	<a href="https://plus.google.com/share?url=<?php the_permalink();?>">
			                                                    		<div class="share-item__icon">
			                                                    			<i class="mdicon mdicon-google-plus " title="Google Plus"></i>
			                                                    		</div>
			                                                    	</a>
			                                                    </li>
			                                                    <li>
			                                                    	<a href="https://pinterest.com/pin/create/bookmarklet/?media=<?php echo get_the_post_thumbnail_url()?>&url=<?php the_permalink();?>&is_video=[is_video]&description=<?php the_title(); ?>">
			                                                    		<div class="share-item__icon">
			                                                    			<i class="mdicon mdicon-pinterest-p " title="Pinterest"></i>
			                                                    		</div>
			                                                    	</a>
			                                                    </li>
			                                                    <li>
			                                                    	<a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink();?>&title=<?php the_title(); ?>">
			                                                    		<div class="share-item__icon">
			                                                    			<i class="mdicon mdicon-linkedin " title="Linkedin"></i>
			                                                    		</div>
			                                                    	</a>
			                                                    </li>
		                                                    </ul>
		                                                </div>
		                                            </div>
			                                        <div class="entry-meta">
			                                        	<time class="time" datetime="<?php echo get_the_date(); ?>" title="<?php echo get_the_date(); ?> at <?php echo get_the_time( 'G:i' ); ?>"><?php echo get_the_date(); ?></time>
			                                        </div>
		                                        </div>
		                                    </footer>
		                            </div>   
		                        </article>
		                          <!-- .single-content -->

		                        <!-- Author Box -->
		                        <div class="author-box single-entry-section">
		                        	<div class="author-box__image">
		                        		<div class="author__avatar">
		                        			<img class="avatar avatar-180 photo avatar photo" alt="<?php echo esc_attr($author_name);?>" src="<?php echo get_avatar_url($author_id)?>">
		                        		</div>
		                        	</div>
		                        	<div class="author-box__text">
		                        		<div class="author-name meta-font"><a href="<?php echo esc_url($author_url); ?>" title="Posts by <?php echo esc_attr($author_name);?>" rel="author"><?php echo esc_attr($author_name);?></a></div>
		                        		<div class="author-bio"><?php the_author_meta('description')?></div>
		                        		<div class="author-info">
		                        			<div class="row row--flex row--vertical-center grid-gutter-20">
		                        				<div class="author-socials col-xs-12">
		                        					<ul class="list-unstyled list-horizontal list-space-sm">
		                        						<li><a href="https://www.facebook.com/sharer.php?u=<?php echo get_avatar_url($author_id);?>&t=<?php echo esc_attr($author_name);?>"><i class="mdicon mdicon-public"></i><span class="sr-only">Website</span></a></li>
		                        						<li><a href="#"><i class="mdicon mdicon-twitter"></i><span class="sr-only">Twitter</span></a></li>
		                        						<li><a href="#"><i class="mdicon mdicon-facebook"></i><span class="sr-only">Facebook</span></a></li>
		                        						<li><a href="#"><span class="sr-only">Youtube</span></a></li>
		                        					</ul>
		                        				</div>
		                        			</div>
		                        		</div>
		                        	</div>
		                        </div>
		                        <!-- Posts Navigation -->
		                        <?php 
		                        $prevPost = get_previous_post();
		                        $nextPost = get_next_post();
		                        $post_id = get_the_ID();
		                        ?>

		                        <div class="posts-navigation single-entry-section clearfix">
		                        	<div class="posts-navigation__prev">
		                        		<article class="post post--horizontal post--horizontal-mini">
		                        			<div class="post__thumb post__thumb--circle">
		                        				<a href="<?php echo get_permalink( $prevPost->ID ); ?>">
		                        					<img src="<?php echo get_the_post_thumbnail_url($prevPost->ID)?>" alt="Post Image">
		                        				</a>
		                        			</div>
		                        			<div class="post__text">
		                        				<a class="posts-navigation__label" href="<?php echo get_permalink( $prevPost->ID ); ?>">
		                        					<img src="https://allthebestsofts.com/logen/wp-content/themes/logen/images/arrows/dark-prev-arrow.png" alt="file not found">
		                        					<span>Previous Article</span>
		                        				</a>
		                        				<h3 class="post__title typescale-1">
		                        					<?php previous_post_link($format = '%link'); ?>
		                        				</h3>
		                        			</div>
		                        		</article>
		                        	</div>
		                        	<div class="posts-navigation__next text-right">
		                        		<article class="post post--horizontal post--horizontal-mini post--horizontal-reverse">
		                        			<div class="post__thumb post__thumb--circle">
		                        				<a href="<?php echo get_permalink( $nextPost->ID ); ?>">
		                        					<img src="<?php echo get_the_post_thumbnail_url($nextPost->ID)?>" alt="Post Image">
		                        				</a>
		                        			</div>
		                        			<div class="post__text">
		                        				<a class="posts-navigation__label" href="<?php echo get_permalink( $nextPost->ID ); ?>">
		                        					<span>Next Article</span>
		                        					<img src="https://allthebestsofts.com/logen/wp-content/themes/logen/images/arrows/dark-next-arrow.png" alt="file not found">
		                        				</a>
		                        				<h3 class="post__title typescale-1">
		                        					<?php next_post_link($format = '%link'); ?>
		                        				</h3>
		                        			</div>
		                        		</article>
		                        	</div>
		                        </div>
									<?php endwhile;?>
		                    <!-- Related Posts -->
		                    <?php
		                    $related = get_posts( 
		                    	array( 
		                    		'category__in' => wp_get_post_categories( $post->ID ), 
		                    		'numberposts'  => 2, 
		                    		'post__not_in' => array( $post->ID ) 
		                    	) 
		                    );

		                    ?>

		                    <div class="related-posts single-entry-section">
		                    	<div class="block-heading">
		                    		<h4 class="block-heading__title">You may also like</h4>
		                    	</div>
		                    	<div class="posts-list posts__vertical_style_4 flexbox-wrap flexbox-wrap-2i flex-space-30">
		                    		<?php
		                    		if( $related ) { 
		                    			foreach( $related as $post ) {
		                    				setup_postdata($post);
		                    				/*whatever you want to output*/
		                    				?>
		                    				<div class="list-item">
		                    					<article class="post post--vertical post--vertical-medium post--vertical-medium_style_2 post__thumb-460">
		                    						<div class="post__thumb atbs-thumb-object-fit">
		                    							<a href="single-1.html">
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
		                    							<h3 class="post__title typescale-2 custom-typescale-2">
		                    								<a class="line-limit line-limit-3" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
		                    							</h3>
		                    							<div class="post__readmore">
		                    								<a href="<?php the_permalink() ?>" class="button__readmore">
		                    									<span class="readmore__text">View More</span>
		                    								</a>
		                    							</div>
		                    						</div>
		                    					</article>
		                    				</div>
		                    				<?php
		                    			}
		                    			wp_reset_postdata();
		                    		}?>
		                    	</div>
		                    </div>
		                    <!-- Comments Section -->
	                    <div class="comments-section single-entry-section">
	                    	<div id="comments" class="comments-area">
		                    		<?php 
		                    		if (comments_open() || get_comments_number()) :
		                    			comments_template();
		                    		endif; ?>
		                    	<!-- .comment-list -->
	                   		</div>	
	                    </div>
                    </div>
		            <!-- .atbs-main-col -->
		            	<?php get_sidebar()?>
		            <!-- .atbs-sub-col -->
               </div>
            </div>
        </div>
    </div>
<?php
get_footer();
