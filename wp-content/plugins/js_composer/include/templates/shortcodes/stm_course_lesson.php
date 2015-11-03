<?php
extract( shortcode_atts( array(
	'title' => '',
	'icon' => '',
	'badge' => '',
	'meta' => '',
	'meta_icon' => '',
	'css'   => ''
), $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ) );
$stm_tab_id = 'tab'.rand(0,9999);
$tapableTab = '';
if(!empty($content)){
	$tapableTab = 'tapable';
}
?>

<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="heading_<?php echo esc_attr($stm_tab_id); ?>">
		<div class="course_meta_data">
			<div class="panel-title">
				<a class="collapsed <?php echo esc_attr($tapableTab); ?>" role="button" data-toggle="collapse"  href="#<?php echo esc_attr($stm_tab_id); ?>" aria-expanded="false" aria-controls="collapseOne">
				<table class="course_table">
					<tr>
						<td class="number"></td>
						
						<td class="icon">
							<?php if(!empty($icon)): ?>
								<i class="fa <?php echo esc_attr($icon); ?>"></i>
							<?php endif; ?>
						</td>
						
						<?php if(!empty($title)): ?>
							<td class="title">
								<strong><?php echo esc_attr($title); ?></strong>
								<?php if(!empty($content)): ?><i class="fa fa-sort-down"></i><?php endif; ?>
							</td>
						<?php endif; ?>
						
						<td class="stm_badge">
							<?php if(!empty($badge) and $badge != 'no_badge'): ?>
								<div class="badge_unit heading_font <?php echo esc_attr($badge); ?>">
									<?php echo esc_attr($badge); ?>
								</div>
							<?php endif; ?>
						</td>
						
						<td class="meta">
							<?php if(!empty($meta)): ?>
								<?php if(!empty($meta_icon)): ?>
									<i class="fa <?php echo esc_attr($meta_icon); ?>"></i>
								<?php endif; ?>
								<?php echo esc_attr($meta); ?>
							<?php endif; ?>
						</td>
					</tr>
				</table>
				</a>
			</div>
		</div>
	</div>
	<?php if(!empty($content)): ?>
		<div id="<?php echo esc_attr($stm_tab_id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo esc_attr($stm_tab_id); ?>">
			<div class="panel-body">
				<?php echo $content; ?>
			</div>
		</div>
	<?php endif; ?>
</div>