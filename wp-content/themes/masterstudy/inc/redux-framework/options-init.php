<?php

/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 *
 * For a more extensive sample-config file, you may look at:
 * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
 *
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "stm_option";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	'opt_name'              => 'stm_option',
	'display_name'          => 'MasterStudy',
	'display_version'       => 'v.1.0.0',
	'page_title'            => __( 'Theme Options', STM_DOMAIN ),
	'menu_title'            => __( 'Theme Options', STM_DOMAIN ),
	'update_notice'         => false,
	'admin_bar'             => true,
	'dev_mode'              => false,
	'menu_icon'             => 'dashicons-hammer',
	'menu_type'             => 'menu',
	'allow_sub_menu'        => true,
	'page_parent_post_type' => '',
	'default_mark'          => '',
	'hints'                 => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
	'output'                => true,
	'output_tag'            => true,
	'compiler'              => true,
	'page_permissions'      => 'manage_options',
	'save_defaults'         => true,
	'database'              => 'options',
	'transient_time'        => '3600',
	'show_import_export'    => false,
	'network_sites'         => true
);

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */


/*
 *
 * ---> START SECTIONS
 *
 */

Redux::setSection( $opt_name, array(
	'title'   => __( 'General', STM_DOMAIN ),
	'desc'    => '',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'       => 'logo',
			'url'      => false,
			'type'     => 'media',
			'title'    => __( 'Site Logo', STM_DOMAIN ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/img/tmp/logo-colored.png' ),
			'subtitle' => __( 'Upload your logo file here.', STM_DOMAIN ),
		),
		array(
			'id'       => 'logo_transparent',
			'url'      => false,
			'type'     => 'media',
			'title'    => __( 'White-text Logo', STM_DOMAIN ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/img/tmp/logo_transparent.png' ),
			'subtitle' => __( 'For our dark header options, we need your logo to be in white to stand out. Upload it here if you choose our dark or transparent header options', STM_DOMAIN ),
		),
		array(
			'id'             => 'logo_text_font',
			'type'           => 'typography',
			'title'          => __( 'Logo Typography', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => true,
			'font-backup'    => false,
			'font-weight'    => false,
			'all_styles'     => true,
			'font-style'     => false,
			'subsets'        => true,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => true,
			'preview'        => true,
			'output'         => array( '.logo-unit .logo' ),
			'units'          => 'px',
			'subtitle'       => __( 'Select custom font for your logo (choose these parametrs if you want to display Blogname instead of logo image).', STM_DOMAIN ),
			'default'        => array(
				'color'       => "#fff",
				'font-family' => 'Montserrat',
				'font-size'   => '23px',
			)
		),
		array(
			'id'      => 'logo_width',
			'type'    => 'text',
			'title'   => __( 'Logo Width (px)', STM_DOMAIN ),
			'default' => '253'
		),
		array(
			'id'       => 'favicon',
			'url'      => false,
			'type'     => 'media',
			'title'    => __( 'Site Favicon', STM_DOMAIN ),
			'default'  => '',
			'subtitle' => __( 'Upload a 16px x 16px .png or .gif image here', STM_DOMAIN ),
		)
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Header', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-file',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'       => 'header_style',
			'type'     => 'button_set',
			'title'    => __( 'Header Style Options', STM_DOMAIN ),
			'subtitle' => __( 'Select your header style option', STM_DOMAIN ),
			'options'  => array(
				'header_default'     => __( 'Default', STM_DOMAIN ),
			),
			'default'  => 'header_default'
		),
		array(
			'id'      => 'sticky_header',
			'type'    => 'switch',
			'title'   => __( 'Enable fixed header on scroll.', STM_DOMAIN ),
			'default' => false
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Top Bar', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el el-website',
	'submenu' => true,
	'fields'  => array(
		array(
			'title'   => __( 'Enable Top Bar', STM_DOMAIN ),
			'id'      => 'top_bar',
			'type'    => 'switch',
			'default' => true
		),
		array(
			'id'      => 'top_bar_login',
			'type'    => 'switch',
			'title'   => __( 'Show login url', STM_DOMAIN ),
			'required' => array( 'top_bar', '=', true, ),
			'default' => true
		),
		array(
			'id'      => 'top_bar_social',
			'type'    => 'switch',
			'title'   => __( 'Enable Top Bar Social Media icons', STM_DOMAIN ),
			'default' => true
		),
		array(
			'id'      => 'top_bar_wpml',
			'type'    => 'switch',
			'title'   => __( 'Enable Top Bar WPML switcher(if WPML Plugin installed)', STM_DOMAIN ),
			'default' => true
		),
		array(
			'id'             => 'font_top_bar',
			'type'           => 'typography',
			'title'          => __( 'Top Bar', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => true,
			'font-backup'    => false,
			'font-weight'    => true,
			'all_styles'     => true,
			'font-style'     => true,
			'subsets'        => true,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => true,
			'preview'        => true,
			'output'         => array( '.header_top_bar, .header_top_bar a' ),
			'units'          => 'px',
			'subtitle'       => __( 'Select custom font for your top bar text.', STM_DOMAIN ),
			'default'        => array(
				'color'       => "#aaaaaa",
				'font-family' => 'Montserrat',
				'font-size'   => '12px',
			)
		),
		array(
			'id'       => 'top_bar_use_social',
			'type'     => 'sortable',
			'mode'     => 'checkbox',
			'title'    => __( 'Select Social Media Icons to display', STM_DOMAIN ),
			'subtitle' => __( 'The urls for your social media icons will be taken from Social Media settings tab.', STM_DOMAIN ),
			'required' => array(
				array( 'top_bar_social', '=', true, )
			),
			'options'  => array(
				'facebook'   => 'Facebook',
				'twitter'    => 'Twitter',
				'instagram'  => 'Instagram',
				'behance'    => 'Behance',
				'dribbble'   => 'Dribbble',
				'flickr'     => 'Flickr',
				'git'        => 'Git',
				'linkedin'   => 'Linkedin',
				'pinterest'  => 'Pinterest',
				'yahoo'      => 'Yahoo',
				'delicious'  => 'Delicious',
				'dropbox'    => 'Dropbox',
				'reddit'     => 'Reddit',
				'soundcloud' => 'Soundcloud',
				'google'     => 'Google',
				'google-plus'     => 'Google +',
				'skype'      => 'Skype',
				'youtube'    => 'Youtube',
				'youtube-play' => 'Youtube Play',
				'tumblr'     => 'Tumblr',
				'whatsapp'   => 'Whatsapp',
			),
			'default'  => array(
				'facebook'   => '0',
				'twitter'    => '0',
				'instagram'  => '0',
				'behance'    => '0',
				'dribbble'   => '0',
				'flickr'     => '0',
				'git'        => '0',
				'linkedin'   => '0',
				'pinterest'  => '0',
				'yahoo'      => '0',
				'delicious'  => '0',
				'dropbox'    => '0',
				'reddit'     => '0',
				'soundcloud' => '0',
				'google'     => '0',
				'google-plus'     => '0',
				'skype'      => '0',
				'youtube'    => '0',
				'youtube-play' => '0',
				'tumblr'     => '0',
				'whatsapp'   => '0',
			),
		),
		array(
			'id'      => 'top_bar_address',
			'type'    => 'text',
			'title'   => __( 'Address', STM_DOMAIN ),
			'required' => array( 'top_bar', '=', true, ),
			'default' => __( '1010 Moon ave, New York, NY US', STM_DOMAIN ),
		),
		array(
			'id'      => 'top_bar_address_mobile',
			'type'    => 'switch',
			'title'   => __( 'Show address on mobile', STM_DOMAIN ),
			'required' => array( 'top_bar', '=', true, ),
		),
		array(
			'id'      => 'top_bar_working_hours',
			'type'    => 'text',
			'title'   => __( 'Working Hours', STM_DOMAIN ),
			'default' => __( 'Mon - Sat 8.00 - 18.00', STM_DOMAIN ),
		),
		array(
			'id'      => 'top_bar_working_hours_mobile',
			'type'    => 'switch',
			'title'   => __( 'Show Working hours on mobile', STM_DOMAIN ),
			'required' => array( 'top_bar', '=', true, ),
		),
		array(
			'id'      => 'top_bar_phone',
			'type'    => 'text',
			'title'   => __( 'Phone number', STM_DOMAIN ),
			'default' => __( '+1 212-226-3126', STM_DOMAIN ),
		),
		array(
			'id'      => 'top_bar_phone_mobile',
			'type'    => 'switch',
			'title'   => __( 'Show Phone on mobile', STM_DOMAIN ),
			'required' => array( 'top_bar', '=', true, ),
		),
	)
));

Redux::setSection( $opt_name, array(
	'title'   => __( 'Styling', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-tint',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'      => 'color_skin',
			'type'    => 'button_set',
			'title'   => __( 'Color Skin', STM_DOMAIN ),
			'options' => array(
				''                  => __( 'Default', STM_DOMAIN ),
				'skin_red_green'          => __( 'Red - Green', STM_DOMAIN ),
				'skin_blue_green'       => __( 'Blue - Green', STM_DOMAIN ),
				'skin_red_brown'       => __( 'Solid Red', STM_DOMAIN ),
				'skin_custom_color' => __( 'Custom color', STM_DOMAIN ),
			),
			'default' => ''
		),
		/*
array(
			'id'       => 'primary_color',
			'type'     => 'color',
			'compiler' => true,
			'title'    => __( 'Primary Color', STM_DOMAIN ),
			'default'  => '#eab830',
			'required' => array( 'color_skin', '=', 'skin_custom_color' ),
			'output' => array(
				
			)
		),
		array(
			'id'       => 'secondary_color',
			'type'     => 'color',
			'compiler' => true,
			'title'    => __( 'Secondary Color', STM_DOMAIN ),
			'default'  => '#dac725',
			'required' => array( 'color_skin', '=', 'skin_custom_color' ),
		),
*/
	)
));

Redux::setSection( $opt_name, array(
	'title'   => __( 'Sidebars', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-website',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'      => 'blog_layout',
			'type'    => 'button_set',
			'options' => array(
				'grid' => __( 'Grid view', STM_DOMAIN ),
				'list' => __( 'List view', STM_DOMAIN )
			),
			'default' => 'grid',
			'title'   => __( 'Blog Layout', STM_DOMAIN )
		),
		array(
			'id'    => 'blog_sidebar',
			'type'  => 'select',
			'data'  => 'posts',
			'args'  => array( 'post_type' => array( 'sidebar' ), 'posts_per_page' => - 1 ),
			'title' => __( 'Blog Sidebar', STM_DOMAIN ),
			'default' => '655'
		),
		array(
			'id'      => 'blog_sidebar_position',
			'type'    => 'button_set',
			'title'   => __( 'Blog Sidebar - Position', STM_DOMAIN ),
			'options' => array(
				'left'  => __( 'Left', STM_DOMAIN ),
				'none'  => __( 'No Sidebar', STM_DOMAIN ),
				'right' => __( 'Right', STM_DOMAIN )
			),
			'default' => 'right'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Teachers', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-user',
	'subsection' => true,
	'fields'  => array(
		array(
			'id'    => 'teachers_sidebar',
			'type'  => 'select',
			'data'  => 'posts',
			'args'  => array( 'post_type' => array( 'sidebar' ), 'posts_per_page' => - 1 ),
			'title' => __( 'Teachers Sidebar', STM_DOMAIN ),
		),
		array(
			'id'      => 'teachers_sidebar_position',
			'type'    => 'button_set',
			'title'   => __( 'Teachers Sidebar - Position', STM_DOMAIN ),
			'options' => array(
				'left'  => __( 'Left', STM_DOMAIN ),
				'none'  => __( 'No Sidebar', STM_DOMAIN ),
				'right' => __( 'Right', STM_DOMAIN )
			),
			'default' => 'none'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Events', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-calendar',
	'subsection' => true,
	'fields'  => array(
		array(
			'id'    => 'events_sidebar',
			'type'  => 'select',
			'data'  => 'posts',
			'args'  => array( 'post_type' => array( 'sidebar' ), 'posts_per_page' => - 1 ),
			'title' => __( 'Events Sidebar', STM_DOMAIN ),
		),
		array(
			'id'      => 'events_sidebar_position',
			'type'    => 'button_set',
			'title'   => __( 'Events Sidebar - Position', STM_DOMAIN ),
			'options' => array(
				'left'  => __( 'Left', STM_DOMAIN ),
				'none'  => __( 'No Sidebar', STM_DOMAIN ),
				'right' => __( 'Right', STM_DOMAIN )
			),
			'default' => 'none'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Gallery', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-picture',
	'subsection' => true,
	'fields'  => array(
		array(
			'id'    => 'gallery_sidebar',
			'type'  => 'select',
			'data'  => 'posts',
			'args'  => array( 'post_type' => array( 'sidebar' ), 'posts_per_page' => - 1 ),
			'title' => __( 'Gallery Sidebar', STM_DOMAIN ),
		),
		array(
			'id'      => 'gallery_sidebar_position',
			'type'    => 'button_set',
			'title'   => __( 'Gallery Sidebar - Position', STM_DOMAIN ),
			'options' => array(
				'left'  => __( 'Left', STM_DOMAIN ),
				'none'  => __( 'No Sidebar', STM_DOMAIN ),
				'right' => __( 'Right', STM_DOMAIN )
			),
			'default' => 'none'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Shop', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el el-shopping-cart',
	'subsection' => true,
	'fields'  => array(
		array(
			'id'    => 'shop_sidebar',
			'type'  => 'select',
			'data'  => 'posts',
			'args'  => array( 'post_type' => array( 'sidebar' ), 'posts_per_page' => - 1 ),
			'title' => __( 'Sidebar', STM_DOMAIN ),
			'default' => '740'
		),
		array(
			'id'      => 'shop_sidebar_position',
			'type'    => 'button_set',
			'title'   => __( 'Sidebar - Position', STM_DOMAIN ),
			'options' => array(
				'left'  => __( 'Left', STM_DOMAIN ),
				'none'  => __( 'No Sidebar', STM_DOMAIN ),
				'right' => __( 'Right', STM_DOMAIN )
			),
			'default' => 'right'
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Events', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el el-calendar',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'      => 'paypal_email',
			'type'    => 'text',
			'title'   => __( 'Paypal Email', STM_DOMAIN ),
		),
		array(
			'id'      => 'currency',
			'type'    => 'text',
			'title'   => __( 'Currency', STM_DOMAIN ),
			'default' => __('USD', STM_DOMAIN),
			'description' => __('Ex. USD', STM_DOMAIN),
		),
		array(
			'id'      => 'paypal_mode',
			'type'    => 'select',
			'title'   => __( 'Paypal Mode', STM_DOMAIN ),
			'options'  => array(
		        'sand' => 'SandBox',
		        'live' => 'Live',
		    ),
			'default' => 'sand',
		),
		array(
			'id'      => 'admin_subject',
			'type'    => 'text',
			'title'   => __( 'Admin Subject', STM_DOMAIN ),
			'default' => __('New Participant for [event]', STM_DOMAIN),
		),
		array(
			'id'      => 'admin_message',
			'type'    => 'textarea',
			'title'   => __( 'Admin Message', STM_DOMAIN ),
			'default' => __('A new member wants to join your [event]<br>Participant Info:<br>Name: [name]<br>Email: [email]<br>Phone: [phone]<br>Message: [message]', STM_DOMAIN),
			'description' => __('Shortcodes Available - [name], [email], [phone], [message].', STM_DOMAIN)
		),
		array(
			'id'      => 'user_subject',
			'type'    => 'text',
			'title'   => __( 'User Subject', STM_DOMAIN ),
			'default' => __('Confirmation of your pariticipation in the [event]', STM_DOMAIN),
		),
		array(
			'id'      => 'user_message',
			'type'    => 'textarea',
			'title'   => __( 'User Message', STM_DOMAIN ),
			'default' => __('Dear [name].<br/> This email is sent to you to confirm your participation in the event.<br/>We will contact you soon with further details.<br>With any question, feel free to phone +999999999999 or write to <a href="mailto:timur@stylemix.net">timur@stylemix.net</a>.<br>Regards,<br>MasterStudy Team.'),
			'description' => __('Shortcodes Available - [name], [email], [phone], [message].', STM_DOMAIN)
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Typography', STM_DOMAIN ),
	'icon'    => 'el-icon-font',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'             => 'font_body',
			'type'           => 'typography',
			'title'          => __( 'Body', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => true,
			'font-backup'    => false,
			'font-weight'    => false,
			'all_styles'     => true,
			'font-style'     => false,
			'subsets'        => true,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => true,
			'preview'        => true,
			'output'         => array( 'body, .normal_font' ),
			'units'          => 'px',
			'subtitle'       => __( 'Select custom font for your main body text.', STM_DOMAIN ),
			'default'        => array(
				'color'       => "#555555",
				'font-family' => 'Open Sans',
				'font-size'   => '14px',
			)
		),
		array(
			'id'             => 'menu_heading',
			'type'           => 'typography',
			'title'          => __( 'Menu', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => true,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-style'     => false,
			'subsets'        => true,
			'font-size'      => false,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => true,
			'preview'        => true,
			'output'         => array( '.header-menu' ),
			'units'          => 'px',
			'subtitle'       => __( 'Select custom font for menu', STM_DOMAIN ),
			'default'        => array(
				'color'       => "#fff",
				'font-family' => 'Montserrat',
				'font-weight' => '900',
			)
		),
		array(
			'id'             => 'font_heading',
			'type'           => 'typography',
			'title'          => __( 'Heading', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => true,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => false,
			'font-style'     => false,
			'subsets'        => true,
			'font-size'      => false,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => true,
			'preview'        => true,
			'output'         => array( 'h1,.h1,h2,.h2,h3,.h3,h4,.h4,h5,.h5,h6,.h6,.heading_font,.widget_categories ul li a,.sidebar-area .widget ul li a,.select2-selection__rendered,blockquote,.select2-chosen,.vc_tta-tabs.vc_tta-tabs-position-top .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a,.vc_tta-tabs.vc_tta-tabs-position-left .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a' ),
			'units'          => 'px',
			'subtitle'       => __( 'Select custom font for headings', STM_DOMAIN ),
			'default'        => array(
				'color'       => "#333333",
				'font-family' => 'Montserrat',
			)
		),
		array(
			'id'             => 'h1_params',
			'type'           => 'typography',
			'title'          => __( 'H1', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => false,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'subsets'        => false,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => false,
			'preview'        => true,
			'output'         => array( 'h1,.h1' ),
			'units'          => 'px',
			'default'        => array(
				'font-size' => '50px',
				'font-weight' => '700'
			)
		),
		array(
			'id'             => 'h2_params',
			'type'           => 'typography',
			'title'          => __( 'H2', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => false,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'subsets'        => false,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => false,
			'preview'        => true,
			'output'         => array( 'h2,.h2' ),
			'units'          => 'px',
			'default'        => array(
				'font-size' => '32px',
				'font-weight' => '700'
			)
		),
		array(
			'id'             => 'h3_params',
			'type'           => 'typography',
			'title'          => __( 'H3', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => false,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'subsets'        => false,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => false,
			'preview'        => true,
			'output'         => array( 'h3,.h3' ),
			'units'          => 'px',
			'default'        => array(
				'font-size' => '18px',
				'font-weight' => '700'
			)
		),
		array(
			'id'             => 'h4_params',
			'type'           => 'typography',
			'title'          => __( 'H4', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => false,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'subsets'        => false,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => false,
			'preview'        => true,
			'output'         => array( 'h4,.h4,blockquote' ),
			'units'          => 'px',
			'default'        => array(
				'font-size' => '16px',
				'font-weight' => '400'
			)
		),
		array(
			'id'             => 'h5_params',
			'type'           => 'typography',
			'title'          => __( 'H5', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => false,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'subsets'        => false,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => false,
			'preview'        => true,
			'output'         => array( 'h5,.h5,.select2-selection__rendered' ),
			'units'          => 'px',
			'default'        => array(
				'font-size' => '14px',
				'font-weight' => '700'
			)
		),
		array(
			'id'             => 'h6_params',
			'type'           => 'typography',
			'title'          => __( 'H6', STM_DOMAIN ),
			'compiler'       => true,
			'google'         => false,
			'font-backup'    => false,
			'all_styles'     => true,
			'font-weight'    => true,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'subsets'        => false,
			'font-size'      => true,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'color'          => false,
			'preview'        => true,
			'output'         => array( 'h6,.h6,.widget_pages ul li a, .widget_nav_menu ul li a, .footer_menu li a,.widget_categories ul li a,.sidebar-area .widget ul li a' ),
			'units'          => 'px',
			'default'        => array(
				'font-size' => '12px',
				'font-weight' => '400'
			)
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Footer', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-photo',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'      => 'footer_top',
			'type'    => 'switch',
			'title'   => __( 'Enable footer widgets area.', STM_DOMAIN ),
			'default' => true,
		),
		array(
			'id'      => 'footer_top_color',
			'type'    => 'color',
			'title'   => __( 'Footer Background Color', STM_DOMAIN ),
			'output'    => array('background-color' => '#footer_top'),
			'default'   => '#414b4f',
		),
		array(
			'id'       => 'footer_first_columns',
			'type'     => 'button_set',
			'title'    => __( 'Footer Columns', STM_DOMAIN ),
			'desc'     => __( 'Select the number of columns to display in the footer.', STM_DOMAIN ),
			'type'     => 'button_set',
			'default'  => '4',
			'required' => array( 'footer_top', '=', true, ),
			'options'  => array(
				'1' => __( '1 Column', STM_DOMAIN ),
				'2' => __( '2 Columns', STM_DOMAIN ),
				'3' => __( '3 Columns', STM_DOMAIN ),
				'4' => __( '4 Columns', STM_DOMAIN ),
			),
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Footer Bottom', STM_DOMAIN ),
	'desc'    => '',
	'icon'    => 'el-icon-photo',
	'subsection' => true,
	'fields'  => array(
		array(
			'id'      => 'footer_bottom',
			'type'    => 'switch',
			'title'   => __( 'Enable footer bottom widgets area.', STM_DOMAIN ),
			'default' => false,
		),
		array(
			'id'      => 'footer_bottom_color',
			'type'    => 'color',
			'title'   => __( 'Footer Bottom Background Color', STM_DOMAIN ),
			'output'    => array('background-color' => '#footer_bottom'),
			'default'   => '#414b4f',
		),
		array(
			'id'       => 'footer_bottom_columns',
			'type'     => 'button_set',
			'title'    => __( 'Footer Bottom Columns', STM_DOMAIN ),
			'desc'     => __( 'Select the number of columns to display in the footer bottom.', STM_DOMAIN ),
			'type'     => 'button_set',
			'default'  => '4',
			'required' => array( 'footer_bottom', '=', true, ),
			'options'  => array(
				'1' => __( '1 Column', STM_DOMAIN ),
				'2' => __( '2 Columns', STM_DOMAIN ),
				'3' => __( '3 Columns', STM_DOMAIN ),
				'4' => __( '4 Columns', STM_DOMAIN ),
			),
		),
	)
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Copyright', STM_DOMAIN ),
    'desc'       => __( 'Copyright block at the bottom of footer<br><img src="http://www.ten28.com/qa.jpg">', STM_DOMAIN),
    'id'         => 'footer_copyright',
    'subsection' => true,
    'fields'     => array(
	    array(
			'id'      => 'footer_copyright',
			'type'    => 'switch',
			'title'   => __( 'Enable footer copyright section.', STM_DOMAIN ),
			'default' => true,
		),
		array(
			'id'      => 'footer_logo_enabled',
			'type'    => 'switch',
			'required' => array(
				array( 'footer_copyright', '=', true, ),
			),
			'title'   => __( 'Enable footer logo.', STM_DOMAIN ),
			'default' => true,
		),
		array(
			'id'       => 'footer_logo',
			'url'      => false,
			'type'     => 'media',
			'title'    => __( 'Footer Logo', STM_DOMAIN ),
			'required' => array(
				array( 'footer_copyright', '=', true, ),
				array( 'footer_logo_enabled', '=', true, ),
			),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/img/tmp/footer-logo2x.png' ),
			'subtitle' => __( 'Upload your logo file here. Size - 50*56 (Retina 2x). Note, bigger images will be cropped to default size', STM_DOMAIN ),
		),
		array(
			'id'      => 'footer_copyright_color',
			'type'    => 'color',
			'title'   => __( 'Footer Bottom Background Color', STM_DOMAIN ),
			'required' => array(
				array( 'footer_copyright', '=', true, ),
			),
			'output'    => array('background-color' => '#footer_copyright'),
			'default'   => '#414b4f',
		),
        array(
            'id'       => 'footer_copyright_text',
            'type'     => 'textarea',
            'title'    => __( 'Footer Copyright', STM_DOMAIN ),
			'subtitle' => __( 'Enter the copyright text.', STM_DOMAIN ),
			'required' => array(
				array( 'footer_copyright', '=', true, ),
			),
			'default'  => __( 'Copyright &copy; 2015 MasterStudy Theme by <a target="_blank" href="http://www.stylemixthemes.com/">Stylemix Themes</a>', STM_DOMAIN ),
        ),
        array(
			'id'       => 'copyright_use_social',
			'type'     => 'sortable',
			'mode'     => 'checkbox',
			'title'    => __( 'Select Social Media Icons to display in copyright section', STM_DOMAIN ),
			'subtitle' => __( 'The urls for your social media icons will be taken from Social Media settings tab.', STM_DOMAIN ),
			'options'  => array(
				'facebook'   => 'Facebook',
				'twitter'    => 'Twitter',
				'instagram'  => 'Instagram',
				'behance'    => 'Behance',
				'dribbble'   => 'Dribbble',
				'flickr'     => 'Flickr',
				'git'        => 'Git',
				'linkedin'   => 'Linkedin',
				'pinterest'  => 'Pinterest',
				'yahoo'      => 'Yahoo',
				'delicious'  => 'Delicious',
				'dropbox'    => 'Dropbox',
				'reddit'     => 'Reddit',
				'soundcloud' => 'Soundcloud',
				'google'     => 'Google',
				'google-plus'     => 'Google +',
				'skype'      => 'Skype',
				'youtube'    => 'Youtube',
				'youtube-play' => 'Youtube Play',
				'tumblr'     => 'Tumblr',
				'whatsapp'   => 'Whatsapp',
			),
			'default'  => array(
				'facebook'   => '0',
				'twitter'    => '0',
				'instagram'  => '0',
				'behance'    => '0',
				'dribbble'   => '0',
				'flickr'     => '0',
				'git'        => '0',
				'linkedin'   => '0',
				'pinterest'  => '0',
				'yahoo'      => '0',
				'delicious'  => '0',
				'dropbox'    => '0',
				'reddit'     => '0',
				'soundcloud' => '0',
				'google'     => '0',
				'google-plus'     => '0',
				'skype'      => '0',
				'youtube'    => '0',
				'youtube-play' => '0',
				'tumblr'     => '0',
				'whatsapp'   => '0',
			),
		),
    )
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'Social Media', STM_DOMAIN ),
	'icon'    => 'el-icon-address-book',
	'desc'    => __( 'Enter social media urls here and then you can enable them for footer or header. Please add full URLs including "http://".', STM_DOMAIN ),
	'submenu' => true,
	'fields'  => array(
		array(
			'id'       => 'facebook',
			'type'     => 'text',
			'title'    => __( 'Facebook', STM_DOMAIN ),
			'subtitle' => '',
			'default' => 'https://www.facebook.com/',
			'desc'     => __( 'Enter your Facebook URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'twitter',
			'type'     => 'text',
			'title'    => __( 'Twitter', STM_DOMAIN ),
			'subtitle' => '',
			'default' => 'https://www.twitter.com/',
			'desc'     => __( 'Enter your Twitter URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'instagram',
			'type'     => 'text',
			'title'    => __( 'Instagram', STM_DOMAIN ),
			'subtitle' => '',
			'default' => 'https://www.instagram.com/',
			'desc'     => __( 'Enter your Instagram URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'behance',
			'type'     => 'text',
			'title'    => __( 'Behance', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Behance URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'dribbble',
			'type'     => 'text',
			'title'    => __( 'Dribbble', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Dribbble URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'flickr',
			'type'     => 'text',
			'title'    => __( 'Flickr', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Flickr URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'git',
			'type'     => 'text',
			'title'    => __( 'Git', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Git URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'linkedin',
			'type'     => 'text',
			'title'    => __( 'Linkedin', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Linkedin URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'pinterest',
			'type'     => 'text',
			'title'    => __( 'Pinterest', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Pinterest URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'yahoo',
			'type'     => 'text',
			'title'    => __( 'Yahoo', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Yahoo URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'delicious',
			'type'     => 'text',
			'title'    => __( 'Delicious', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Delicious URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'dropbox',
			'type'     => 'text',
			'title'    => __( 'Dropbox', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Dropbox URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'reddit',
			'type'     => 'text',
			'title'    => __( 'Reddit', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Reddit URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'soundcloud',
			'type'     => 'text',
			'title'    => __( 'Soundcloud', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Soundcloud URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'google',
			'type'     => 'text',
			'title'    => __( 'Google', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Google URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'google-plus',
			'type'     => 'text',
			'title'    => __( 'Google +', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Google + URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'skype',
			'type'     => 'text',
			'title'    => __( 'Skype', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Skype URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'youtube',
			'type'     => 'text',
			'title'    => __( 'Youtube', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Youtube URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'youtube-play',
			'type'     => 'text',
			'title'    => __( 'Youtube Play', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Youtube Play(only icon differ) URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'tumblr',
			'type'     => 'text',
			'title'    => __( 'Tumblr', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Tumblr URL.', STM_DOMAIN ),
		),
		array(
			'id'       => 'whatsapp',
			'type'     => 'text',
			'title'    => __( 'Whatsapp', STM_DOMAIN ),
			'subtitle' => '',
			'desc'     => __( 'Enter your Whatsapp URL.', STM_DOMAIN ),
		),
	)
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Social Widget', STM_DOMAIN ),
    'desc'       => __( 'Choose socials for widget, and their order - W  P  L  O  C  K  E  R  .C  O  M ', STM_DOMAIN),
    'id'         => 'social_widget_opt',
    'subsection' => true,
    'fields'     => array(
       array(
			'id'       => 'stm_social_widget_sort',
			'type'     => 'sortable',
			'mode'     => 'checkbox',
			'title'    => __( 'Select Social Widget Icons to display', STM_DOMAIN ),
			'subtitle' => __( 'The urls for your social media icons will be taken from Social Media settings tab.', STM_DOMAIN ),
			'options'  => array(
				'facebook'   => 'Facebook',
				'twitter'    => 'Twitter',
				'instagram'  => 'Instagram',
				'behance'    => 'Behance',
				'dribbble'   => 'Dribbble',
				'flickr'     => 'Flickr',
				'git'        => 'Git',
				'linkedin'   => 'Linkedin',
				'pinterest'  => 'Pinterest',
				'yahoo'      => 'Yahoo',
				'delicious'  => 'Delicious',
				'dropbox'    => 'Dropbox',
				'reddit'     => 'Reddit',
				'soundcloud' => 'Soundcloud',
				'google'     => 'Google',
				'google-plus'     => 'Google +',
				'skype'      => 'Skype',
				'youtube'    => 'Youtube',
				'youtube-play' => 'Youtube Play',
				'tumblr'     => 'Tumblr',
				'whatsapp'   => 'Whatsapp',
			),
		),
    )
) );

Redux::setSection( $opt_name, array(
	'title'   => __( 'MailChimp', STM_DOMAIN ),
	'icon'    => 'el-icon-paper-clip',
	'submenu' => true,
	'fields'  => array(
		array(
			'id'       => 'mailchimp_api_key',
			'type'     => 'text',
			'title'    => __( 'Mailchimp API key', STM_DOMAIN ),
			'subtitle' => __( 'Paste your MailChimp API key', STM_DOMAIN ),
			'default'  => ""
		),
		array(
			'id'       => 'mailchimp_list_id',
			'type'     => 'text',
			'title'    => __( 'Mailchimp list id', STM_DOMAIN ),
			'subtitle' => __( 'Paste your MailChimp List id', STM_DOMAIN ),
			'default'  => ""
		)
	)
));

Redux::setSection( $opt_name, array(
	'icon'       => 'el-refresh',
	'icon_class' => 'el-icon-large',
	'title'      => __( 'One Click Update', STM_DOMAIN ),
	'desc'       => __( 'You already receive notifications from Themeforest about our Theme Updates! Here we added an option of Updating your theme with just one button click and forget about complications! But Should you have any issues while using this option update (it might be connected with permissions issues) then you still can use the regular manual update option.', STM_DOMAIN ),
	'submenu'    => true,
	'fields'     => array(
		array(
			'id'       =>'envato_username',
			'type'     => 'text',
			'title'    => __('ThemeForest Username', STM_DOMAIN),
			'subtitle' => '',
			'desc'     => __('Enter here your ThemeForest (or Envato) username here (i.e. Stylemixthemes).', STM_DOMAIN),
		),
		array(
			'id'       =>'envato_api',
			'type'     => 'text',
			'title'    => __('ThemeForest Secret API Key', STM_DOMAIN),
			'subtitle' => '',
			'desc'     => __('Enter the secret API key you have on ThemeForest here. You can create a new one under the Settings > API Keys section of your profile.', STM_DOMAIN),
		),
	)
));

/*
 * <--- END SECTIONS
 */

if ( ! function_exists( 'stm_option' ) ) {
	function stm_option( $id, $fallback = false, $key = false ) {
		global $stm_option;
		if ( $fallback == false ) {
			$fallback = '';
		}
		$output = ( isset( $stm_option[ $id ] ) && $stm_option[ $id ] !== '' ) ? $stm_option[ $id ] : $fallback;
		if ( ! empty( $stm_option[ $id ] ) && $key ) {
			$output = $stm_option[ $id ][ $key ];
		}

		return $output;
	}
}