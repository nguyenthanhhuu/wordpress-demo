<?php
/**
 * Post header
 *
 * @package Omega
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.7.3
 */
?>
<header class="post-head">
    <?php if( is_sticky() ) : ?>
        <span class="post-sticky">
            <i class="fa fa-star"></i>
        </span>
    <?php endif; ?>
    <?php if( !is_single() ) : ?>
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'omega-td' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php else : ?>
        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>
    <?php endif; ?>

    <small>
        <?php _e( 'by', 'omega-td' );  ?>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?php the_author(); ?>
        </a>
        <?php _e( 'on', 'omega-td' ); ?>
        <?php the_time(get_option('date_format')); ?>
        <?php if (oxy_get_option('blog_comment_count') == 'on') {
            echo ', ';
            comments_popup_link( _x( 'No comments', 'comments number', 'omega-td' ), _x( '1 comment', 'comments number', 'omega-td' ), _x( '% comments', 'comments number', 'omega-td' ) );
        } ?>
    </small>

    <?php if( oxy_get_option( 'blog_post_icons' ) == 'on') : ?>
        <span class="post-icon">
            <?php oxy_post_icon( $post->ID, true ); ?>
        </span>
    <?php endif; ?>
</header>