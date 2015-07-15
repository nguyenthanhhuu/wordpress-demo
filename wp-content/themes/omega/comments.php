<?php
/**
 * Main functions file
 *
 * @package Omega
 * @subpackage Frontend
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.7.3
 */

if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) :
$extra_post_class  = oxy_get_option('blog_post_icons') == 'on'? 'post-showinfo':''; ?>
<div class="comments padded <?php echo $extra_post_class; ?>" id="comments">
    <div class="comments-head">
        <h3>
            <?php
                printf( _n( '1 comment', '%s comments', get_comments_number(), 'omega-td' ), number_format_i18n( get_comments_number() ) );
            ?>
        </h3>
        <small>
            <?php _e( 'Join the conversation', 'omega-td' ); ?>
        </small>
        <?php if(oxy_get_option('blog_post_icons') == 'on'){ ?>
            <div class="post-icon">
                <i class="fa fa-comments"></i>
            </div>
        <?php } ?>
    </div>
    <ul class="comments-list comments-body media-list">
        <?php wp_list_comments( array( 'walker' => new OxyCommentWalker, ) ); ?>
    </ul>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-below" class="navigation" role="navigation">
        <ul class="pager">
        <li class="previous"><?php previous_comments_link( __( '&larr; Older', 'omega-td' ) ); ?></li>
        <li class="next"><?php next_comments_link( __( 'Newer &rarr;', 'omega-td' ) ); ?></li>
        </ul>
    </nav>
    <?php endif; // check for comment navigation ?>

    <?php
    /* If there are no comments and comments are closed, let's leave a note.
     * But we only want the note on posts and pages that had comments in the first place.
     */
    if ( ! comments_open() && get_comments_number() ) : ?>
    <br>
    <h3 class="nocomments text-center"><?php _e( 'Comments are closed.', 'omega-td' ); ?></h3>
    <?php endif; ?>

</div>
<?php endif; ?>

<?php oxy_comment_form(); ?>
