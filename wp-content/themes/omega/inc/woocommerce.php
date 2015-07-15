<?php
/**
 * All Woocommerce stuff
 *
 * @package Omega
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.7.3
 */

add_theme_support( 'woocommerce' );

if( oxy_is_woocommerce_active() ) {
     // Dequeue WooCommerce stylesheet(s)
    if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
        // WooCommerce 2.1 or above is active
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    } else {
        // WooCommerce is less than 2.1
        define( 'WOOCOMMERCE_USE_CSS', false );
    }
    /**
     * All hooks for the shop page and category list page go here
     *
     * @return void
     **/
    function oxy_shop_and_category_hooks() {
        if( is_shop() || is_product_category() ) {
            function oxy_remove_title() {
                return false;
            }
            add_filter( 'woocommerce_show_page_title', 'oxy_remove_title');

            function oxy_shop_layout_start() {
                switch (oxy_get_option('shop_layout')) {
                    case 'sidebar-left':?>
                        <div class="row"><div class="col-md-3"> <?php get_sidebar(); ?></div><div class="col-md-9"><?php
                        break;
                    case 'sidebar-right': ?>
                        <div class="row"><div class="col-md-9"><?php
                        break;
                }
            }
            // remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
            add_action('woocommerce_before_main_content', 'oxy_shop_layout_start', 18);
            add_action( 'woocommerce_before_main_content', 'wc_print_notices', 18 );

            function oxy_shop_layout_end(){
                switch (oxy_get_option('shop_layout')) {
                    case 'sidebar-left': ?>
                        </div></div><?php
                        break;
                    case 'sidebar-right': ?>
                        </div><div class="col-md-3"><?php get_sidebar(); ?></div></div><?php
                        break;
                }
            }
            add_action('woocommerce_after_main_content', 'oxy_shop_layout_end', 9);


            function oxy_before_breadcrumbs() {
                echo '<div class="row"><div class="col-md-6">';
            }
            // remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
            add_action('woocommerce_before_main_content', 'oxy_before_breadcrumbs', 19);

            function oxy_after_breadcrumbs() {
                echo '</div><div class="col-md-6 text-right">';
            }
            add_action('woocommerce_before_main_content', 'oxy_after_breadcrumbs', 20);

            function oxy_after_orderby() {
              echo '</div></div>';
            }
            add_action('woocommerce_before_shop_loop', 'oxy_after_orderby', 30);

        }
    }

    function oxy_single_product_hooks() {
        if( is_product() ) {
            // we need to reposition the messages before the breadcrumbs
            remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10);
            add_action( 'woocommerce_before_main_content', 'wc_print_notices', 15 );
        }
    }

    add_action( 'wp', 'oxy_shop_and_category_hooks' );
    add_action( 'wp', 'oxy_single_product_hooks');

    // GLOBAL HOOKS - EFFECT ALL PAGES

    // first unhook the global WooCommerce wrappers. They were adding another <div id=content> around.
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    function oxy_before_main_content_10() {
        $woocommerce_shop_section_classes = apply_filters( 'oxy_woocommerce_shop_classes', 10 );
        echo '<section class="section section-commerce ' . $woocommerce_shop_section_classes . '">';
        echo '<div class="container element-normal-top element-normal-bottom">';
    }
    add_action('woocommerce_before_main_content', 'oxy_before_main_content_10', 10);

    function oxy_after_main_content_10() {
      echo '</div></section>';
    }
    add_action('woocommerce_after_main_content', 'oxy_after_main_content_10', 10);

    function custom_override_breadcrumb_fields($fields) {
        $fields['wrap_before']='<ol class="breadcrumb">';
        $fields['wrap_after']='</ol>';
        $fields['before']='<li>';
        $fields['after']='</li>';
        $fields['delimiter']=' ';
        return $fields;
    }
    add_filter('woocommerce_breadcrumb_defaults','custom_override_breadcrumb_fields');

    // removing default woocommerce image display. Also affects shortcodes.
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

    function oxy_woocommerce_template_loop_product_thumbnail(){
        global $product;
        $image_ids = $product->get_gallery_attachment_ids();
        $back_image = array_shift( $image_ids );
        echo '<div class="product-image">';
        echo '<div class="product-image-front">' .woocommerce_get_product_thumbnail() . '</div>';
        if( null != $back_image ){
            $back_image = wp_get_attachment_image_src( $back_image, 'shop_catalog' );
            echo '<div class="product-image-back"><img src="' . $back_image[0] . '" alt=""/></div>';
        }
        echo '</div>';
    }
    add_action( 'woocommerce_before_shop_loop_item_title', 'oxy_woocommerce_template_loop_product_thumbnail', 10 );

    function oxy_woo_shop_header() {
        global $post;
        if( is_shop() ) {

            oxy_page_header( woocommerce_get_page_id( 'shop' ), array( 'heading_type' => 'page' ) );
        }
        else if( is_product_category() ) {
            $category = get_queried_object();
            if( isset($category->term_id) ) {
                oxy_create_taxonomy_header( $category );
            }
        }
        else if( is_product_tag() ) {
            $tag = get_queried_object();
            if( isset($tag->term_id) ) {
                oxy_create_taxonomy_header( $tag );
            }
        }
        else if ( is_page( get_option( 'woocommerce_myaccount_page_id' ) ) ) {
            oxy_page_header( get_option( 'woocommerce_myaccount_page_id' ), array( 'heading_type' => 'page' ) );
        }
        else {
            oxy_page_header( $post->ID, array( 'heading_type' => 'page' ) );
        }
    }

    function oxy_create_taxonomy_header( $queried_object ) {
        if( get_option( THEME_SHORT . '-tax-mtb-show_header'. $queried_object->term_id, 'show' ) === 'show' ) {
            $meta_title = get_option( THEME_SHORT . '-tax-mtb-content'. $queried_object->term_id, '' );
            $title = empty( $meta_title ) ? $queried_object->name : $meta_title;
            $heading = oxy_call_shortcode_with_tax_meta( 'oxy_section_heading', array(
                'sub_header',
                'header_type',
                'heading_type',
                'sub_header_size',
                'header_size',
                'header_weight',
                'header_align',
                'header_condensed',
                'header_underline',
                'header_underline_size',
                'extra_classes',
                'margin_top',
                'margin_bottom',
                'scroll_animation',
                'scroll_animation_delay'
            ), $title, $queried_object->term_id, array( 'heading_type' => 'page' ) );

            echo oxy_call_shortcode_with_tax_meta( 'oxy_shortcode_section', array(
                'swatch',
                'text_shadow',
                'inner_shadow',
                'width',
                'class',
                'id',
                'overlay_colour',
                'overlay_opacity',
                'overlay_grid',
                'background_video_mp4',
                'background_video_webm',
                'background_image',
                'background_image_size',
                'background_image_repeat',
                'background_image_attachment',
                'background_position_vertical',
                'height',
                'transparency'
            ), $heading, $queried_object->term_id );
        }
    }

    // Change number or products per row to based on options
    add_filter( 'loop_shop_columns', 'oxy_woocom_loop_columns' );
    if( !function_exists( 'oxy_woocom_loop_columns' ) ) {
        function oxy_woocom_loop_columns() {
            if( is_shop() || is_product()) {
                return oxy_get_option( 'woocommerce_shop_page_columns', 3);
            }
            else if( is_product_category() ) {
                $category = get_queried_object();
                if( isset($category->term_id) ) {
                    return get_option( THEME_SHORT . '-tax-mtb-product_columns'. $category->term_id, 3 );
                }
            }
            else if( is_product_tag() ) {
                $tag = get_queried_object();
                if( isset($tag->term_id) ) {
                    return get_option( THEME_SHORT . '-tax-mtb-product_columns'. $tag->term_id, 3 );
                }
            }
            else {
                return 3;
            }
        }
    }

    // Change number or products per row to based on options
    add_filter( 'oxy_woocommerce_shop_classes', 'oxy_woocommerce_shop_classes' );
    if( !function_exists( 'oxy_woocommerce_shop_classes' ) ) {
        function oxy_woocommerce_shop_classes() {
           return oxy_get_option( 'woocom_general_swatch' );
        }
    }


    // Change number or products shown in cross sells
    add_filter( 'woocommerce_cross_sells_columns', 'oxy_woocommerce_cross_sells_columns' );
    if( !function_exists( 'oxy_woocommerce_cross_sells_columns' ) ) {
        function oxy_woocommerce_cross_sells_columns( $columns ) {
            return 4;
        }
    }

}

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );
