<?php
/**
 * The template for displaying comments
 *
 * @package Tiny
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() || comments_open() ): ?>
    <div id="comments" class="comments-area">

        <?php if ( have_comments() ) : ?>
            <h2 class="comments-title"><?php _e('Comments','tiny'); ?></h2>

            <ol class="comment-list">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ol',
                        'avatar_size' => 0 // disable gravatars
                    ) );
                ?>
            </ol>

            <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
                $prev_comments_link = get_previous_comments_link( __( 'Older Comments', 'tiny' ) );
                $next_comments_link = next_comments_link( __( 'Newer Comments', 'tiny' ) );
            ?>
            <nav class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'tiny' ); ?></h1>
                <div>
                    <?php echo $prev_comments_link ? '<span class="nav-previous">' . $prev_comments_link . '</span>' : ''; ?>
                    <?php echo $next_comments_link ? '<span class="nav-next">' . $next_comments_link . '</span>' : ''; ?>
                </div>
            </nav><!-- .comment-navigation -->
            <?php endif; // Check for comment navigation ?>

            <?php if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="no-comments"><?php _e( 'Comments are closed.' , 'tiny' ); ?></p>
            <?php endif; ?>

        <?php endif; // have_comments() ?>

        <?php comment_form(); ?>

    </div><!-- #comments -->
<?php
endif;
?>