<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
	<div class="site-content single-entry atbs-single-style-1">
		<div class="atbs-block atbs-block--fullwidth single-entry-wrap">
			<div class="container">
				<div class="row">
					<div class="atbs-main-col" role="main">
						<div class="block-heading block-heading-normal block-heading--has-subtitle">
                            <h4 class="block-heading__title"><?php echo get_the_title()?></h4>
                        </div>
						<!-- Post Single -->
						<article class="atbs-block post post--single has-post-thumbnail">
							<div class="single-content">
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
                                                    </li><!--
                                                    --><li>
                                                    	<a href="https://plus.google.com/share?url=<?php the_permalink();?>">
                                                    		<div class="share-item__icon">
                                                    			<i class="mdicon mdicon-google-plus " title="Google Plus"></i>
                                                    		</div>
                                                    	</a>
                                                    </li><!--
                                                    --><li>
                                                    	<a href="https://pinterest.com/pin/create/bookmarklet/?media=<?php echo get_the_post_thumbnail_url()?>&url=<?php the_permalink();?>&is_video=[is_video]&description=<?php the_title(); ?>">
                                                    		<div class="share-item__icon">
                                                    			<i class="mdicon mdicon-pinterest-p " title="Pinterest"></i>
                                                    		</div>
                                                    	</a>
                                                    </li><!--
                                                    --><li>
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
                            <!-- .single-content -->
                        </article>
                        <!-- Author Box -->
                        <div class="author-box single-entry-section">
                        	
       
                        </div>
                        <!-- Posts Navigation -->
                    <?php endwhile;?>

                </div>
            </div>
            <!-- .atbs-main-col -->

        </div>
    </div>
</div>
</div>



<?php
get_footer();
