<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Online_Magazine
 */

get_header();
?>




<main id="primary" class="site-main">

	
		<div class="atbs-block atbs-block--fullwidth">
			<div class="container">
				<div class="row">
					<div class="atbs-main-col has-right-sidebar">
						<div class="atbs-block atbs-block--fullwidth atbs-listing-list-a">
								<div class="block-heading block-heading-normal block-heading--has-subtitle">
									<div class="block-heading__section">
										<span class="block-heading__subtitle">Search Results for:</span>
										<h4 class="block-heading__title"><?php echo get_search_query()?></h4>
									</div>
								</div>
								<?php if ( have_posts() ) : 
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );


								endwhile;

								$pagination = get_the_posts_pagination( array(

									'prev_text' => '<i class="mdicon mdicon-arrow_back"></i>',
									'next_text' => '<i class="mdicon mdicon-arrow_forward"></i>',
									'class'=> 'atbs-pagination atbs-module-pagination',
								) );
								echo $pagination;?>




								<?php
							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
								?>

						</div>
					</div>
				</div>
			</div>
		</div>

</main><!-- #main -->


<?php

get_footer();
