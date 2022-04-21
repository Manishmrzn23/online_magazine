<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Online_Magazine
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>



    <?php // You can start editing here -- including this comment!  ?>
    <div class="comments-title">
	    <?php if (have_comments()) : ?>
	    	<div class="comment-count__inner comment-form-block-heading block-heading">
		        <h4 class="block-heading__title title-style-2">
		            <?php
		            printf(// WPCS: XSS OK.
		                    esc_html(_nx('%d Comment', '%d Comments', get_comments_number(), 'comments title', 'online-magazine')), number_format_i18n(get_comments_number())
		            );
		            ?>
		        </h4>
		    </div>
		    </div>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'callback'=>'online_magazine_comment',
                'style'=>'ol'
            ));
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments().  ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open()) :
        ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'online-magazine'); ?></p>
        <?php
    endif;

    $comment_args=array(
    	'title_reply' => 'Leave A Reply', 
    );
    comment_form($comment_args);
    ?>

