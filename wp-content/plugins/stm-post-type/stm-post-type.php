<?php
/*
Plugin Name: STM Post Type
Plugin URI: http://stylemixthemes.com/
Description: STM Post Type
Author: Stylemix Themes
Author URI: http://stylemixthemes.com/
Text Domain: stm_post_type
Version: 1.0
*/

define( 'STM_POST_TYPE', 'stm_post_type' );

$plugin_path = dirname(__FILE__);

require_once $plugin_path . '/post_type.class.php';

STM_PostType::registerPostType( 'project', __( 'Project', STM_POST_TYPE ), array( 'menu_icon' => 'dashicons-building', 'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ) ) );
STM_PostType::addTaxonomy( 'project_category', __( 'Categories', STM_POST_TYPE ), 'project' );
STM_PostType::registerPostType( 'service', __( 'Service', STM_POST_TYPE ), array( 'menu_icon' => 'dashicons-lightbulb', 'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'excerpt' ) ) );
STM_PostType::registerPostType( 'testimonial', __( 'Testimonial', STM_POST_TYPE ), array( 'menu_icon' => 'dashicons-testimonial', 'supports' => array( 'title', 'thumbnail', 'excerpt' ), 'exclude_from_search' => true, 'publicly_queryable' => false ) );
STM_PostType::registerPostType( 'sidebar', __( 'Sidebar', STM_POST_TYPE ), array( 'menu_icon' => 'dashicons-schedule', 'supports' => array( 'title', 'editor' ), 'exclude_from_search' => true, 'publicly_queryable' => false ) );

STM_PostType::addMetaBox( 'page_options', __( 'Page Options', STM_POST_TYPE ), array( 'page', 'post', 'service', 'project', 'product' ), '', '', '', array(
	'fields' => array(
		'separator_page_background' => array(
			'label'   => __( 'Page Background', STM_POST_TYPE ),
			'type'    => 'separator'
		),
		'page_bg_image' => array(
			'label' => __( 'Background Image', STM_POST_TYPE ),
			'type'  => 'image'
		),
		'page_bg_position' => array(
			'label'   => __( 'Background Position', STM_POST_TYPE ),
			'type'    => 'text'
		),
		'page_bg_repeat' => array(
			'label'   => __( 'Background Repeat', STM_POST_TYPE ),
			'type'    => 'select',
			'options' => array(
				'repeat' => __( 'Repeat', STM_POST_TYPE ),
				'no-repeat' => __( 'No Repeat', STM_POST_TYPE ),
				'repeat-x' => __( 'Repeat-X', STM_POST_TYPE ),
				'repeat-y' => __( 'Repeat-Y', STM_POST_TYPE )
			)
		),
		'separator_title_box' => array(
			'label'   => __( 'Title Box', STM_POST_TYPE ),
			'type'    => 'separator'
		),
		'title' => array(
			'label'   => __( 'Title', STM_POST_TYPE ),
			'type'    => 'select',
			'options' => array(
				'show' => __( 'Show', STM_POST_TYPE ),
				'hide' => __( 'Hide', STM_POST_TYPE )
			)
		),
		'sub_title' => array(
			'label'   => __( 'Sub Title', STM_POST_TYPE ),
			'type'    => 'text'
		),
		'title_box_bg_color' => array(
			'label' => __( 'Background Color', STM_POST_TYPE ),
			'type'  => 'color_picker'
		),
		'title_box_font_color' => array(
			'label' => __( 'Font Color', STM_POST_TYPE ),
			'type'  => 'color_picker'
		),
		'title_box_line_color' => array(
			'label' => __( 'Line Color', STM_POST_TYPE ),
			'type'  => 'color_picker'
		),
		'title_box_subtitle_font_color' => array(
			'label' => __( 'Sub Title Font Color', STM_POST_TYPE ),
			'type'  => 'color_picker'
		),
		'title_box_custom_bg_image' => array(
			'label' => __( 'Custom Background Image', STM_POST_TYPE ),
			'type'  => 'image'
		),
		'title_box_bg_position' => array(
			'label'   => __( 'Background Position', STM_POST_TYPE ),
			'type'    => 'text'
		),
		'title_box_bg_repeat' => array(
			'label'   => __( 'Background Repeat', STM_POST_TYPE ),
			'type'    => 'select',
			'options' => array(
				'repeat' => __( 'Repeat', STM_POST_TYPE ),
				'no-repeat' => __( 'No Repeat', STM_POST_TYPE ),
				'repeat-x' => __( 'Repeat-X', STM_POST_TYPE ),
				'repeat-y' => __( 'Repeat-Y', STM_POST_TYPE )
			)
		),
		'title_box_overlay' => array(
			'label'   => __( 'Overlay', STM_POST_TYPE ),
			'type'    => 'checkbox'
		),
		'title_box_small' => array(
			'label'   => __( 'Small', STM_POST_TYPE ),
			'type'    => 'checkbox'
		),
		'separator_breadcrumbs' => array(
			'label'   => __( 'Breadcrumbs', STM_POST_TYPE ),
			'type'    => 'separator'
		),
		'breadcrumbs' => array(
			'label'   => __( 'Breadcrumbs', STM_POST_TYPE ),
			'type'    => 'select',
			'options' => array(
				'show' => __( 'Show', STM_POST_TYPE ),
				'hide' => __( 'Hide', STM_POST_TYPE )
			)
		),
		'breadcrumbs_font_color' => array(
			'label' => __( 'Breadcrumbs Color', STM_POST_TYPE ),
			'type'  => 'color_picker'
		),
		'separator_title_box_button' => array(
			'label'   => __( 'Title Box Button', STM_POST_TYPE ),
			'type'    => 'separator'
		),
		'title_box_button_text' => array(
			'label'   => __( 'Button Text', STM_POST_TYPE ),
			'type'    => 'text'
		),
		'title_box_button_url' => array(
			'label'   => __( 'Button URL', STM_POST_TYPE ),
			'type'    => 'text'
		),
		'title_box_button_border_color' => array(
			'label' => __( 'Border Color', STM_POST_TYPE ),
			'type'  => 'color_picker',
			'default' => '#ffffff'
		),
		'title_box_button_font_color' => array(
			'label' => __( 'Font Color', STM_POST_TYPE ),
			'type'  => 'color_picker',
			'default' => '#333333'
		),
		'title_box_button_font_color_hover' => array(
			'label' => __( 'Font Color (hover)', STM_POST_TYPE ),
			'type'  => 'color_picker',
			'default' => '#333333'
		),
		'title_box_button_font_arrow_color' => array(
			'label' => __( 'Arrow Color', STM_POST_TYPE ),
			'type'  => 'color_picker',
			'default' => '#ffffff'
		),
		'prev_next_buttons_title_box' => array(
			'label'   => __( 'Prev/Next Buttons', STM_POST_TYPE ),
			'type'    => 'separator'
		),
		'prev_next_buttons' => array(
			'label'   => __( 'Enable', STM_POST_TYPE ),
			'type'    => 'checkbox'
		),
		'prev_next_buttons_border_color' => array(
			'label' => __( 'Border Color', STM_POST_TYPE ),
			'type'  => 'color_picker',
			'default' => '#ffffff'
		),
		'prev_next_buttons_arrow_color_hover' => array(
			'label' => __( 'Arrow Color (hover)', STM_POST_TYPE ),
			'type'  => 'color_picker',
			'default' => '#dac725'
		),
	)
) );

STM_PostType::addMetaBox( 'testimonial_info', __( 'Testimonial Info', STM_POST_TYPE ), array( 'testimonial' ), '', '', '', array(
	'fields' => array(
		'testimonial_company'   => array(
			'label' => __( 'Company', STM_POST_TYPE ),
			'type'  => 'text'
		),
		'testimonial_profession'   => array(
			'label' => __( 'Profession', STM_POST_TYPE ),
			'type'  => 'text'
		)
	)
) );

function stm_plugin_styles() {
    $plugin_url =  plugins_url('', __FILE__);

    wp_enqueue_style( 'admin-styles', $plugin_url . '/assets/css/admin.css', null, null, 'all' );

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker');

    wp_enqueue_style( 'stmcss-datetimepicker', $plugin_url . '/assets/css/jquery.stmdatetimepicker.css', null, null, 'all' );
    wp_enqueue_script( 'stmjs-datetimepicker', $plugin_url . '/assets/js/jquery.stmdatetimepicker.js', array( 'jquery' ), null, true );

    wp_enqueue_media();
}

add_action( 'admin_enqueue_scripts', 'stm_plugin_styles' );

add_action('plugins_loaded', 'stm_plugin_setup');

function stm_plugin_setup(){

    $plugin_url =  plugins_url('', __FILE__);

    load_plugin_textdomain( 'stm_post_type', false, $plugin_url . '/languages' );

}