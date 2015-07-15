<?php

/**
 * Pagination for pages of topics (when viewing a forum)
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>

<div class="bbp-pagination">
	<div class="text-center bbp-pagination-links">

		<?php bbp_forum_pagination_links(); ?>

	</div>

    <div class="text-center bbp-pagination-count">

        <?php bbp_forum_pagination_count(); ?>

    </div>
</div>

<?php do_action( 'bbp_template_after_pagination_loop' ); ?>
