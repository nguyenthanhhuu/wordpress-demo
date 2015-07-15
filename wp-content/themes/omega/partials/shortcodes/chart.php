<?php
/**
 * Creates a chart
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
<div class="<?php echo implode(' ', $classes); ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s">
    <?php echo wp_charts_shortcode( $atts );?>
</div>