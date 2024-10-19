<?php
/**
 * Customizer settings and other theme related settings (fonts arrays, widget areas)
 *
 * @package Verbosa
 */

/* active_callback for controls that depend on other controls' values */
function verbosa_conditionals( $control ) {

	$conditionals = array(
		array(
			'id'	=> 'verbosa_lpsliderimage',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidertitle',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidertext',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidercta1text',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidercta1link',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidercta2text',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidercta2link',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpslidershortcode',
			'parent'=> 'verbosa_lpslider',
			'value'	=> 2,
		),
		array(
			'id'	=> 'verbosa_lpsliderserious',
			'parent'=> 'verbosa_lpslider',
			'value' => 4,
		),
		array(
			'id'	=> 'verbosa_lpposts',
			'parent'=> 'verbosa_landingpage',
			'value'	=> 1,
		),
		array(
			'id'	=> 'verbosa_lpposts_more',
			'parent'=> 'verbosa_lpposts',
			'value' => 1,
		),
	);

	foreach ($conditionals as $elem) {
		if ( $control->id == sprintf( '%1$s_settings[%2$s]', cryout_sanitize_tn(_CRYOUT_THEME_NAME), $elem['id'] ) && 
			$control->manager->get_setting( sprintf( '%1$s_settings[%2$s]', cryout_sanitize_tn(_CRYOUT_THEME_NAME), $elem['parent'] ) )->value() == $elem['value'] 
		) return true;
	};

	// handle landing page hint
	if ( ( $control->id == sprintf( '%1$s_settings[%2$s_landingpage_notice]', cryout_sanitize_tn(_CRYOUT_THEME_NAME), _CRYOUT_THEME_PREFIX ) ) && 
		('posts' == get_option('show_on_front')) 
	) return true;
	
	// handle landing page slider banner hint
	if ( ( $control->id == sprintf( '%1$s_settings[%2$s_headerorbannerhint]', cryout_sanitize_tn(_CRYOUT_THEME_NAME), _CRYOUT_THEME_PREFIX ) ) && 
			( $control->manager->get_setting( sprintf( '%1$s_settings[%2$s_landingpage]', cryout_sanitize_tn(_CRYOUT_THEME_NAME), _CRYOUT_THEME_PREFIX ) )->value() == 1 ) && 
			( $control->manager->get_setting( sprintf( '%1$s_settings[%2$s_lpslider]', cryout_sanitize_tn(_CRYOUT_THEME_NAME), _CRYOUT_THEME_PREFIX ) )->value() == 1 ) 
	) return true;

    return false;

} // verbosa_conditionals()

$verbosa_big = array(

/************* general info ***************/

'info_sections' => array(
	'cryoutspecial-about-theme' => array(
		'title' => sprintf( __( 'About %s', 'cryout' ), cryout_sanitize_tnl(_CRYOUT_THEME_NAME) ),
		'desc' => '<img src=" ' . get_template_directory_uri() . '/admin/images/logo-about-header.png" >',
		'button' => TRUE,
		'button_label' => __( 'Need Help?', 'cryout' ),
	),
), // info_sections

'info_settings' => array(
	'support_link_faqs' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://www.cryoutcreations.eu/wordpress-themes/' . cryout_sanitize_tn( _CRYOUT_THEME_NAME ) . '" target="_blank">%s</a>', __( 'Read the Docs', 'cryout' ) ),
		'desc' =>  '',
		'section' => 'cryoutspecial-about-theme',
	),
	'support_link_forum' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://www.cryoutcreations.eu/forums/f/wordpress/' . cryout_sanitize_tn( _CRYOUT_THEME_NAME ) . '" target="_blank">%s</a>', __( 'Browse the Forum', 'cryout' ) ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
	'premium_support_link' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://www.cryoutcreations.eu/priority-support" target="_blank">%s</a>', __( 'Priority Support', 'cryout' ) ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
	'rating_url' => array(
		'label' => '',
		'default' => sprintf( '<a href="https://wordpress.org/support/view/theme-reviews/'. cryout_sanitize_tn( _CRYOUT_THEME_NAME ) . '#postform" target="_blank">%s</a>', sprintf( __( 'Rate %s on WordPress.org', 'cryout' ) , cryout_sanitize_tnl(_CRYOUT_THEME_NAME) ) ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	),
	/* 'management' => array(
		'label' => '',
		'default' => sprintf( '<a href="themes.php?page=about-' . cryout_sanitize_tn( _CRYOUT_THEME_NAME ) . '-theme">%s</a>', __('Manage Theme Settings', 'cryout') ),
		'desc' => '',
		'section' => 'cryoutspecial-about-theme',
	), */
), // info_settings

'panel_overrides' => array(
	'background' => array(
        'title' => __( 'Background', 'cryout' ),
		'desc' => '',
		'priority' => 50,
		'section' => 'cryoutoverride-verbosa_siteidentity',
		'replaces' => 'background_image',
		'type' => 'section',
	),
	'verbosa_header_section' => array(
		'title' => __( 'Header Image', 'cryout' ),
		'desc' => '',
		'priority' => 50,
		'section' => 'cryoutoverride-verbosa_siteidentity',
		'replaces' => 'header_image',
		'type' => 'section',
	),
	'identity' => array(
		'title' => __( 'Site Identity', 'cryout' ),
		'desc' => '',
		'priority' => 50,
		'section' => 'cryoutoverride-verbosa_siteidentity',
		'replaces' => 'title_tagline',
		'type' => 'section',
	),
	'colors' => array(
		'section' => 'section',
		'replaces' => 'colors',
		'type' => 'remove',
	),

), // panel_overrides

/************* panels *************/

'panels' => array(

	array('id'=>'verbosa_siteidentity', 'title'=>__('Site Identity','verbosa'), 'callback'=>'', 'identifier'=>'cryoutoverride-' ),
	array('id'=>'verbosa_landingpage', 'title'=>__('Landing Page','verbosa'), 'callback'=>''),
	array('id'=>'verbosa_general_section', 'title'=>__('General','verbosa') , 'callback'=>''),
	array('id'=>'verbosa_colors_section', 'title'=>__('Colors','verbosa'), 'callback'=>'' ),
	array('id'=>'verbosa_post_section', 'title'=>__('Post Information','verbosa') , 'callback'=>''),
	array('id'=>'verbosa_text_section', 'title'=>__('Typography','verbosa'), 'callback'=>''),

), // panels

/************* sections *************/

'sections' => array(

	// layout
	array('id'=>'verbosa_layout', 'title'=>__('Layout', 'verbosa'), 'callback'=>'', 'sid'=>'', 'priority'=>51),
	// header
	array('id'=>'verbosa_siteheader', 'title'=>__('Header','verbosa'), 'callback'=>'', 'sid'=> '', 'priority'=>52 ),
	// landing page
	array('id'=>'verbosa_lpgeneral', 'title'=>__('Settings','verbosa'), 'callback'=>'', 'sid'=>'verbosa_landingpage', ),
	array('id'=>'verbosa_lpslider', 'title'=>__('Slider','verbosa'), 'callback'=>'', 'sid'=>'verbosa_landingpage', ),
	array('id'=>'verbosa_lptexts', 'title'=>__('Text Areas','verbosa'), 'callback'=>'', 'sid'=>'verbosa_landingpage', ),
	// text
	array('id'=>'verbosa_fontfamily', 'title'=>__('General Font','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_text_section'),
	array('id'=>'verbosa_fontheader', 'title'=>__('Header Fonts','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_text_section'),
	array('id'=>'verbosa_fontwidget', 'title'=>__('Widget Fonts','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_text_section'),
	array('id'=>'verbosa_fontcontent', 'title'=>__('Content Fonts','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_text_section'),
	array('id'=>'verbosa_textformatting', 'title'=>__('Formatting','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_text_section'),
	// general
	array('id'=>'verbosa_contentstructure', 'title'=>__('Structure','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_general_section'),
	array('id'=>'verbosa_contentgraphics', 'title'=>__('Decorations','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_general_section'),
	array('id'=>'verbosa_postimage', 'title'=>__('Post Images','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_general_section'),
	array('id'=>'verbosa_socials', 'title'=>__('Social Icons','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_general_section'),
	// colors
	array('id'=>'verbosa_colors', 'title'=>__('Content','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_colors_section'),
	array('id'=>'verbosa_colors_footer', 'title'=>__('Footer','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_colors_section'),
	// post info
	array('id'=>'verbosa_featured', 'title'=>__('Featured Image', 'verbosa'), 'callback'=>'', 'sid'=>'verbosa_post_section'),
	array('id'=>'verbosa_metas', 'title'=>__('Meta Information','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_post_section'),
	array('id'=>'verbosa_excerpts', 'title'=>__('Excerpts','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_post_section'),
	array('id'=>'verbosa_comments', 'title'=>__('Comments','verbosa'), 'callback'=>'', 'sid'=> 'verbosa_post_section'),
	// misc
	array('id'=>'verbosa_misc', 'title'=>__('Miscellaneous','verbosa'), 'callback'=>'', 'sid'=> '', 'priority'=>82),

	/*** developer options ***/
	//array('id'=>'verbosa_developer', 'title'=>__('[ Developer Options ]','verbosa'), 'callback'=>'', 'sid'=>'', 'priority'=>101),

), // sections

/************* settings *************/

'options' => array (
	//////////////////////////////////////////////////// Layout ////////////////////////////////////////////////////
	array(
	// this option needs to always be first; its index is used in the page/post meta option !!!
	'id' => 'verbosa_sitelayout',
		'type' => 'radioimage',
		'label' => __('Main Layout','verbosa'),
		'choices' => array(
			'1c' => array(
				'label' => __("One column (no sidebars)","verbosa"),
				'url'   => '%s/admin/images/1c.png'
			),
			'2cSl' => array(
				'label' => __("Two columns, sidebar on the left","verbosa"),
				'url'   => '%s/admin/images/2cSl.png'
			),
			'2cSr' => array(
				'label' => __("Two columns, sidebar on the right","verbosa"),
				'url'   => '%s/admin/images/2cSr.png'
			),
		),
		'desc' => "",
	'section' => 'verbosa_layout' ),
	array(
	'id' => 'verbosa_sitewidth',
		'type' => 'numberslider',
		'label' => 'Site Width',
		'min' => 960, 'max' => 1920, 'step' => 10, 'um' => 'px',
		'desc' => "",
	'section' => 'verbosa_layout' ),

	array(
	'id' => 'verbosa_sidebar',
		'type' => 'numberslider',
		'label' => 'Sidebar Width',
		'min' => 300, 'max' => 700, 'step' => 10, 'um' => 'px',
		'desc' => "",
	'section' => 'verbosa_layout' ),

	array(
	'id' => 'verbosa_sidebarback',
		'type' => 'toggle',
		'label' => __('Extend sidebar to screen edge','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => "",
	'section' => 'verbosa_layout' ),

	array(
	'id' => 'verbosa_magazinelayout',
		'type' => 'radioimage',
		'label' => __('Posts Layout','verbosa'),
		'choices' => array(
			'1' => array(
				'label' => __("One column","verbosa"),
				'url'   => '%s/admin/images/magazine-1col.png'
			),
			'2' => array(
				'label' => __("Two columns","verbosa"),
				'url'   => '%s/admin/images/magazine-2col.png'
			),
			'3' => array(
				'label' => __("Three columns","verbosa"),
				'url'   => '%s/admin/images/magazine-3col.png'
			),
		),
		'desc' => '',
	'section' => 'verbosa_layout' ),
	array(
	'id' => 'verbosa_contentmargintop',
		'type' => 'numberslider',
		'label' => __('Margin top','verbosa'),
		'min' => 0,
		'max' => 150,
		'step' => 1,
		'um' => 'px',
		'desc' => '',
	'section' => 'verbosa_layout' ),
	array(
	'id' => 'verbosa_elementpadding',
		'type' => 'numberslider',
		'label' => __('Post/page left/right padding','verbosa'),
		'min' => 0,
		'max' => 500,
		'step' => 1,
		'um' => 'px',
		'desc' => '',
	'section' => 'verbosa_layout' ),

	array(
	'id' => 'verbosa_footercols',
		'type' => 'select',
		'label' => __("Footer Widgets Columns","verbosa"),
		'values' => array(0, 1, 2, 3, 4),
		'labels' => array(
			__('All in a row','verbosa'),
			__('1 Column','verbosa'),
			__('2 Columns','verbosa'),
			__('3 Columns','verbosa'),
			__('4 Columns','verbosa')
		),
		'desc' => '',
	'section' => 'verbosa_layout' ),
	array(
	'id' => 'verbosa_footeralign',
		'type' => 'select',
		'values' => array( 0 , 1 ),
		'labels' => array( __("Default","verbosa"), __("Center","verbosa") ),
		'label' => __('Footer Widgets Alignment','verbosa'),
		'desc' => '',
	'section' => 'verbosa_layout' ),

	// Header-related hint to WP's Site Identity
	array(
	'id' => 'verbosa_headerhints',
		'type' => 'notice',
		'label' => '',
		'desc' => sprintf( __( 'Fine tune the visibility of these elements from the theme\'s %s','verbosa' ), '<a data-type="section" data-id="cryout-verbosa_siteheader" class="cryout-customizer-focus"><strong>' . __('Header options', 'verbosa') . ' &raquo;</strong></a>' ),
		'input_attrs' => array( 'class' => '' ),
		'priority' => 55,
		'addon' => TRUE, // this option gets added to built-in WordPress section
	'section' => 'title_tagline' ),
	array(
	'id' => 'verbosa_headerorbannerhint',
		'type' => 'notice',
		'label' => '',
		'desc' => sprintf( __( 'Configure the image currently visible on the homepage from the theme\'s options under %s','verbosa' ), '<a data-type="section" data-id="cryout-verbosa_lpslider" class="cryout-customizer-focus"><strong>' . __('Landing Page > Slider > Banner Image', 'verbosa') . ' &raquo;</strong></a>' ),
		'input_attrs' => array( 'class' => '' ),
		'priority' => 9,
		'active_callback' => 'verbosa_conditionals',
		'addon' => TRUE, // this option gets added to built-in WordPress section
	'section' => 'header_image' ),

	// Header
	array(
	'id' => 'verbosa_headerheight',
		'type' => 'numberslider',
		'min' => 0,
		'max' => 800,
		'step' => 1,
		'um' => 'px',
		'label' => __('Header Image Height','verbosa'),
		'desc' => '',
	'section' => 'verbosa_siteheader' ),
	array(
	'id' => 'verbosa_siteheader',
		'type' => 'select',
		'label' => __('Site Header Content','verbosa'),
		'values' => array( 'title', 'logo' , 'both' , 'empty' ),
		'labels' => array( __("Site Title","verbosa"), __("Logo","verbosa"), __("Logo & Site Title","verbosa"), __("Empty","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_siteheader' ),
	array(
	'id' => 'verbosa_logoupload',
		'type' => 'media-image',
		'label' => __('Logo Image','verbosa'),
		'desc' => '',
		'disable_if' => 'the_custom_logo',
	'section' => 'verbosa_siteheader' ),
	array(
	'id' => 'verbosa_identityhints',
		'type' => 'notice',
		'input_attrs' => array( 'class' => '' ),
		'label' => '',
		'desc' => sprintf( __( 'Edit the site\'s title, tagline and logo from the %s panel','verbosa' ), '<a data-type="section" data-id="title_tagline" class="cryout-customizer-focus"><strong>' . __('Site Identity', 'verbosa') . ' </strong></a>' ),
	'section' => 'verbosa_siteheader' ),
	array(
	'id' => 'verbosa_menutitle',
		'type' => 'toggle',
		'label' => __( 'Use Assigned Menu Title', 'verbosa' ),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_siteheader' ),
	array(
	'id' => 'verbosa_menubullets',
		'type' => 'toggle',
		'label' => __('Menu Bullets','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_siteheader' ),

	//////////////////////////////////////////////////// Landing Page ////////////////////////////////////////////////////
	array(
	'id' => 'verbosa_landingpage',
		'type' => 'select',
		'label' => __('Landing Page','verbosa'),
		'values' => array( 1, 0 ),
		'labels' => array( __("Enabled","verbosa"), __("Disabled (use WordPress homepage)","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_lpgeneral' ),
	array(
	'id' => 'verbosa_landingpage_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => sprintf( __( "To activate the Landing Page, make sure to set the WordPress <strong>Front Page displays</strong> option to %s","verbosa" ), "<a data-type='section' data-id='static_front_page' class='cryout-customizer-focus'><strong>" . __("use a static page", "verbosa") . " &raquo;</strong></a>" ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpgeneral' ),
	array(
	'id' => 'verbosa_lpposts',
		'type' => 'select',
		'label' => __('Featured Content','verbosa'),
		'values' => array( 2, 1, 0 ),
		'labels' => array( __("Static Page", "verbosa"), __("Posts", "verbosa"), __("Disabled", "verbosa") ),
		'desc' => '',
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpgeneral' ),
	array(
	'id' => 'verbosa_lpposts_more',
		'type' => 'text',
		'label' => __( 'More Posts Label', 'verbosa' ),
		'desc' => '',
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpgeneral' ),

	// slider
	array(
	'id' => 'verbosa_lpslider',
		'type' => 'select',
		'label' => __('Slider','verbosa'),
		'values' => array( 4, 2, 1, 3, 0 ),
		'labels' => array(
			__("Serious Slider", "verbosa"),
			__("Use Shortcode","verbosa"),
			__("Banner Image","verbosa"),
			__("Header Image","verbosa"),
			__("Disabled","verbosa")
		),
		'desc' => sprintf( __("To create an advanced slider, use our <a href='%s' target='_blank'>Serious Slider</a> plugin or any other slider plugin.","verbosa"), 'https://wordpress.org/plugins/cryout-serious-slider/' ),
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpsliderimage',
		'type' => 'media-image',
		'label' => __('Banner Image','verbosa'),
		'desc' => __('The default image can be replaced by setting a new banner image.', 'verbosa'),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpsliderlink',
		'type' => 'url',
		'label' => __('Slider Link','verbosa'),
		'desc' => '',
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpslidershortcode',
		'type' => 'text',
		'label' => __('Shortcode','verbosa'),
		'desc' => __('Enter shortcode provided by slider plugin. The plugin will be responsible for the slider\'s appearance.','verbosa'),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpsliderserious',
		'type' => 'select',
		'label' => __('Serious Slider','verbosa'),
		'values' => cryout_serious_slides_for_customizer(1, 0),
		'labels' => cryout_serious_slides_for_customizer(2, __(' - Please install, activate or update Serious Slider plugin - ', 'verbosa'), __(' - No sliders defined - ', 'verbosa') ),
		'desc' => __('Select the desired slider from the list. Sliders can be administered in the dashboard.','verbosa'),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpslidertitle',
		'type' => 'text',
		'label' => __('Caption','verbosa'),
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Title', 'verbosa') ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpslidertext',
		'type' => 'textarea',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Text', 'verbosa') ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),

	array(
	'id' => 'verbosa_lpslidercta1text',
		'type' => 'text',
		'label' => __('CTA Button','verbosa') . ' #1',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Text', 'verbosa') ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpslidercta1link',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Link', 'verbosa') ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpslidercta2text',
		'type' => 'text',
		'label' => __('CTA Button','verbosa') . ' #2',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Text', 'verbosa') ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),
	array(
	'id' => 'verbosa_lpslidercta2link',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Link', 'verbosa') ),
		'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_lpslider' ),

	// texts
	array(
	'id' => 'verbosa_lptextone',
		'type' => 'select',
		'label' => sprintf( __('Text Area %d','verbosa'), 1),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'verbosa') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'verbosa') ),
		'desc' => '',
	'section' => 'verbosa_lptexts' ),
	array(
	'id' => 'verbosa_lptexttwo',
		'type' => 'select',
		'label' => sprintf( __('Text Area %d','verbosa'), 2),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'verbosa') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'verbosa') ),
		'desc' => '',
	'section' => 'verbosa_lptexts' ),
	array(
	'id' => 'verbosa_lptextthree',
		'type' => 'select',
		'label' => sprintf( __('Text Area %d','verbosa'), 3),
		'values' => cryout_pages_for_customizer(1, __('Disabled', 'verbosa') ),
		'labels' => cryout_pages_for_customizer(2, __('Disabled', 'verbosa') ),
		'desc' => '',
	'section' => 'verbosa_lptexts' ),

	//////////////////////////////////////////////////// Colors ////////////////////////////////////////////////////

	array(
	'id' => 'verbosa_sitebackground',
		'type' => 'color',
		'label' => __('Site Background','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_sitetext',
		'type' => 'color',
		'label' => __('Site Text','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_contentbackground',
		'type' => 'color',
		'label' => __('Content Background','verbosa'),
		'desc' => __('Main content, breadcrumbs, pagination and content widgets background.','verbosa'),
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_sidebarbackground',
		'type' => 'color',
		'label' => __('Sidebar Background','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_menutext',
		'type' => 'color',
		'label' => __('Menu Text','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_menutexthover',
		'type' => 'color',
		'label' => __('Menu Text on Hover','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_footerbackground',
		'type' => 'color',
		'label' => __('Footer Widgets Background','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors_footer' ),
	array(
	'id' => 'verbosa_titletext',
		'type' => 'color',
		'label' => __('Post/Page Titles','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_metatext',
		'type' => 'color',
		'label' => __('Post Metas','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_accent1',
		'type' => 'color',
		'label' => __('Primary Accent','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),
	array(
	'id' => 'verbosa_accent2',
		'type' => 'color',
		'label' => __('Secondary Accent','verbosa'),
		'desc' => '',
	'section' => 'verbosa_colors' ),

	//////////////////////////////////////////////////// Fonts ////////////////////////////////////////////////////
	// general font
	array(
	'id' => 'verbosa_fgeneralsize',
		'type' => 'select',
		'label' => __('General Font','verbosa'),
		'values' => cryout_gen_values( 10, 26, 1, array('um'=>'px') ),
		'desc' => '',
	'section' => 'verbosa_fontfamily' ),
	array(
	'id' => 'verbosa_fgeneralweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontfamily' ),
	array(
	'id' => 'verbosa_fgeneral',
		'type' => 'font',
		'label' => '',
		'desc' => '',
		'no_inherit' => TRUE,
	'section' => 'verbosa_fontfamily' ),
	array(
	'id' => 'verbosa_fgeneralgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => __("The fonts under the <em>Preferred Theme Fonts</em> list are recommended because they have all the font weights used throughout the theme.","verbosa"),
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontfamily' ),

	// header fonts
	array( // site title
	'id' => 'verbosa_fsitetitlesize',
		'type' => 'select',
		'label' => __('Site Title','verbosa'),
		'values' => cryout_gen_values( 90, 250, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fsitetitleweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fsitetitle',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fsitetitlegoogle',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontheader' ),

	array( // site description font
	'id' => 'verbosa_fsitedescsize',
		'type' => 'select',
		'label' => __('Site Description','verbosa'),
		'values' => cryout_gen_values( 60, 120, 5, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fsitedescweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fsitedesc',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fsitedescgoogle',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontheader' ),

	array( // menu
	'id' => 'verbosa_fmenusize',
		'type' => 'select',
		'label' => __('Main Menu','verbosa'),
		'values' => cryout_gen_values( 70, 150, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fmenuweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fmenu',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontheader' ),
	array(
	'id' => 'verbosa_fmenugoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontheader' ),

	// widget fonts
	array( // widget title
	'id' => 'verbosa_fwtitlesize',
		'type' => 'select',
		'label' => __('Widget Title','verbosa'),
		'values' => cryout_gen_values( 80, 120, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontwidget' ),
	array(
	'id' => 'verbosa_fwtitleweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontwidget' ),
	array(
	'id' => 'verbosa_fwtitle',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontwidget' ),
	array(
	'id' => 'verbosa_fwtitlegoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontwidget' ),

	array(
	'id' => 'verbosa_fwcontentsize',
		'type' => 'select',
		'label' => __('Widget Content','verbosa'),
		'values' => cryout_gen_values( 80, 120, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontwidget' ),
	array(
	'id' => 'verbosa_fwcontentweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontwidget' ),
	array(
	'id' => 'verbosa_fwcontent',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontwidget' ),
	array(
	'id' => 'verbosa_fwcontentgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontwidget' ),

	// content fonts
	array( // post/page
	'id' => 'verbosa_ftitlessize',
		'type' => 'select',
		'label' => __('Post/Page Titles','verbosa'),
		'values' => cryout_gen_values( 90, 260, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_ftitlesweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_ftitles',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_ftitlesgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontcontent' ),

	array( // post meta fonts
	'id' => 'verbosa_fmetassize',
		'type' => 'select',
		'label' => __('Post metas','verbosa'),
		'values' => cryout_gen_values( 60, 120, 5, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_fmetasweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_fmetas',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_fmetasgoogle',
		'type' => 'googlefont',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontcontent' ),

	array(
	'id' => 'verbosa_fheadingssize',
		'type' => 'select',
		'label' => __('Headings','verbosa'),
		'values' => cryout_gen_values( 100, 150, 10, array('um'=>'%') ),
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_fheadingsweight',
		'type' => 'select',
		'label' => '',
		'values' => array('100', '200', '300', '400', '500', '600', '700', '800', '900'),
		'labels' => array( __('100 thin','verbosa'), __('200 extra-light','verbosa'), __('300 ligher','verbosa'), __('400 regular','verbosa'), __('500 medium','verbosa'), __('600 semi-bold','verbosa'), __('700 bold','verbosa'), __('800 extra-bold','verbosa'), __('900 black','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_fheadings',
		'type' => 'font',
		'label' => '',
		'desc' => '',
	'section' => 'verbosa_fontcontent' ),
	array(
	'id' => 'verbosa_fheadingsgoogle',
		'type' => 'text',
		'label' => '',
		'desc' => '',
		'input_attrs' => array( 'placeholder' => __('Google/custom font override','verbosa') ),
	'section' => 'verbosa_fontcontent' ),

	// formatting
	array(
	'id' => 'verbosa_lineheight',
		'type' => 'numberslider',
		'label' => __('Line Height','verbosa'),
		'min' => 1.0, 'max' => 2.4, 'step' => 0.2, 'um' => 'em',
		'desc' => '',
	'section' => 'verbosa_textformatting' ),
	array(
	'id' => 'verbosa_textalign',
		'type' => 'select',
		'label' => __('Text Alignment','verbosa'),
		'values' => array( "inherit" , "left" , "right" , "justify" , "center" ),
		'labels' => array( __("Default","verbosa"), __("Left","verbosa"), __("Right","verbosa"), __("Justify","verbosa"), __("Center","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_textformatting' ),
	array(
	'id' => 'verbosa_paragraphspace',
		'type' => 'numberslider',
		'label' => __('Paragraph Spacing','verbosa'),
		'min' => 0, 'max' => 2, 'step' => 0.1, 'um' => 'em',
		'desc' => '',
	'section' => 'verbosa_textformatting' ),
	array(
	'id' => 'verbosa_parindent',
		'type' => 'numberslider',
		'label' => __('Paragraph Indentation','verbosa'),
		'min' => 0, 'max' => 2, 'step' => 0.1, 'um' => 'em',
		'desc' => '',
	'section' => 'verbosa_textformatting' ),

	//////////////////////////////////////////////////// Structure ////////////////////////////////////////////////////

	array(
	'id' => 'verbosa_breadcrumbs',
		'type' => 'toggle',
		'label' => __('Breadcrumbs','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_contentstructure' ),
	array(
	'id' => 'verbosa_pagination',
		'type' => 'toggle',
		'label' => __('Numbered Pagination','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_contentstructure' ),
	array(
	'id' => 'verbosa_contenttitles',
		'type' => 'select',
		'label' => __('Page/Category Titles','verbosa'),
		'values' => array( 1, 2, 3, 0 ),
		'labels' => array( __('Always Visible','verbosa'), __('Hide on Pages','verbosa'), __('Hide on Categories','verbosa'), __('Always Hidden','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_contentstructure' ),
	array(
		'id' => 'verbosa_copyright',
		'type' => 'textarea',
		'label' => __( 'Custom Footer Text', 'verbosa' ),
		'desc' => __( 'Supports basic HTML.', 'verbosa' ),
		'section' => 'verbosa_contentstructure' ),

	//////////////////////////////////////////////////// Graphics ////////////////////////////////////////////////////

	array(
	'id' => 'verbosa_elementborder',
		'type' => 'checkbox',
		'label' => __('Border','verbosa'),
		'desc' => '',
	'section' => 'verbosa_contentgraphics' ),
	array(
	'id' => 'verbosa_elementshadow',
		'type' => 'checkbox',
		'label' => __('Shadow','verbosa'),
		'desc' => '',
	'section' => 'verbosa_contentgraphics' ),
	array(
	'id' => 'verbosa_elementborderradius',
		'type' => 'checkbox',
		'label' => __('Rounded Corners','verbosa'),
		'desc' => '',
	'section' => 'verbosa_contentgraphics' ),

	//////////////////////////////////////////////////// Search Box ////////////////////////////////////////////////////

	//////////////////////////////////////////////////// Post Image ////////////////////////////////////////////////////

	array(
	'id' => 'verbosa_image_style',
		'type' => 'radioimage',
		'label' => __('Post Images','verbosa'),
		'choices' => array(
			'verbosa-image-none' => array(
				'label' => __("No Styling","verbosa"),
				'url'   => '%s/admin/images/image-style-0.png'
			),
			'verbosa-image-one' => array(
				'label' => sprintf( __("Style %d","verbosa"), 1),
				'url'   => '%s/admin/images/image-style-1.png'
			),
			'verbosa-image-two' => array(
				'label' => sprintf( __("Style %d","verbosa"), 2),
				'url'   => '%s/admin/images/image-style-2.png'
			),
			'verbosa-image-three' => array(
				'label' => sprintf( __("Style %d","verbosa"), 3),
				'url'   => '%s/admin/images/image-style-3.png'
			),
			'verbosa-image-four' => array(
				'label' => sprintf( __("Style %d","verbosa"), 4),
				'url'   => '%s/admin/images/image-style-4.png'
			),
			'verbosa-image-five' => array(
				'label' => sprintf( __("Style %d","verbosa"), 5),
				'url'   => '%s/admin/images/image-style-5.png'
			),
		),
		'desc' => '',
	'section' => 'verbosa_postimage' ),
	array(
	'id' => 'verbosa_caption_style',
		'type' => 'select',
		'label' => __('Post Captions','verbosa'),
		'values' => array( 'verbosa-caption-zero', 'verbosa-caption-one', 'verbosa-caption-two' ),
		'labels' => array( __('Plain','verbosa'), __('With Border','verbosa'), __('With Background','verbosa') ),
		'desc' => '',
	'section' => 'verbosa_postimage' ),


	//////////////////////////////////////////////////// Post Information ////////////////////////////////////////////////////

	array( // meta
	'id' => 'verbosa_meta_author',
		'type' => 'checkbox',
		'label' => __("Display Author","verbosa"),
		'desc' => '',
	'section' => 'verbosa_metas' ),
	array(
	'id' => 'verbosa_meta_date',
		'type' => 'checkbox',
		'label' => __("Display Date","verbosa"),
		'desc' => '',
	'section' => 'verbosa_metas' ),
	array(
	'id' => 'verbosa_meta_time',
		'type' => 'checkbox',
		'label' => __("Display Time","verbosa"),
		'desc' => '',
	'section' => 'verbosa_metas' ),
	array(
	'id' => 'verbosa_meta_category',
		'type' => 'checkbox',
		'label' => __("Display Category","verbosa"),
		'desc' => '',
	'section' => 'verbosa_metas' ),
	array(
	'id' => 'verbosa_meta_tag',
		'type' => 'checkbox',
		'label' => __("Display Tags","verbosa"),
		'desc' => '',
	'section' => 'verbosa_metas' ),
	array(
	'id' => 'verbosa_meta_comment',
		'type' => 'checkbox',
		'label' => __("Display Comments","verbosa"),
		'desc' => '',
	'section' => 'verbosa_metas' ),

	// excerpts
	array(
	'id' => 'verbosa_excerpthome',
		'type' => 'select',
		'label' => __( 'Standard Posts On Homepage', 'verbosa' ),
		'values' => array( 'excerpt', 'full' ),
		'labels' => array( __("Excerpt","verbosa"), __("Full Post","verbosa") ),
		'desc' => __("Post formats always display full posts.","verbosa"),
	'section' => 'verbosa_excerpts' ),
	array(
	'id' => 'verbosa_excerptsticky',
		'type' => 'select',
		'label' => __( 'Sticky Posts on Homepage', 'verbosa' ),
		'values' => array( 'excerpt', 'full' ),
		'labels' => array( __("Inherit","verbosa"), __("Full Post","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_excerpts' ),
	array(
	'id' => 'verbosa_excerptarchive',
		'type' => 'select',
		'label' => __( 'Standard Posts in Categories/Archives', 'verbosa' ),
		'values' => array( 'excerpt', 'full' ),
		'labels' => array( __("Excerpt","verbosa"), __("Full Post","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_excerpts' ),
	array(
	'id' => 'verbosa_excerptlength',
		'type' => 'numberslider',
		'min' => 0,
		'max' => 100,
		'step' => 1,
		'label' => __( 'Excerpt Length (words)' , 'verbosa' ),
		'desc' => '',
	'section' => 'verbosa_excerpts' ),
	array(
	'id' => 'verbosa_excerptdots',
		'type' => 'text',
		'label' => __( 'Excerpt Suffix', 'verbosa' ),
		'desc' => '',
	'section' => 'verbosa_excerpts' ),
	array(
	'id' => 'verbosa_excerptcont',
		'type' => 'text',
		'label' => __( 'Continue Reading Label', 'verbosa' ),
		'desc' => '',
	'section' => 'verbosa_excerpts' ),

	// comments
	array(
	'id' => 'verbosa_comclosed',
		'type' => 'select',
		'label' => __("'Comments Are Closed' Text",'verbosa'),
		'values' => array( 1, 2, 3, 0 ), // "Show" , "Hide in posts", "Hide in pages", "Hide everywhere"
		'labels' => array( __("Show","verbosa"), __("Hide in posts","verbosa"), __("Hide in pages","verbosa"), __("Hide everywhere","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_comments' ),
	array(
	'id' => 'verbosa_comdate',
		'type' => 'select',
		'label' => __('Comment Date Format','verbosa'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Specific","verbosa"), __("Relative","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_comments' ),
	array(
	'id' => 'verbosa_comlabels',
		'type' => 'select',
		'label' => __('Comment Field Label','verbosa'),
		'values' => array( 1, 2 ),
		'labels' => array( __("Placeholders","verbosa"), __("Labels","verbosa") ),
		'desc' => __("Change to labels for better compatibility with comment-related plugins.","verbosa"),
	'section' => 'verbosa_comments' ),
	array(
	'id' => 'verbosa_comformwidth',
		'type' => 'numberslider',
		'min' => 0,
		'max' => 1000,
		'step' => 10,
		'um' => 'px',
		'label' => __('Comment Form Width','verbosa'),
		'desc' => '',
	'section' => 'verbosa_comments' ),

	//////////////////////////////////////////////////// Featured Images ////////////////////////////////////////////////////
	array(
	'id' => 'verbosa_fpost',
		'type' => 'toggle',
		'label' => __( 'Featured Images', 'verbosa' ),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_fspost',
		'type' => 'toggle',
		'label' => __( 'Featured Images on Singles', 'verbosa' ),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_fauto',
		'type' => 'toggle',
		'label' => __( 'Auto Select Image From Content', 'verbosa' ),
		'values' => array( 1, 0 ),
		'desc' => '',
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_fheight',
		'type' => 'numberslider',
		'min' => 0,
		'max' => 800,
		'step' => 10,
		'um' => 'px',
		'label' => __( 'Featured Image Height', 'verbosa' ),
		'desc' => __( 'Set to 0 to disable image processing', 'verbosa' ),
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_fheight_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => __( 'Changing this value may require to recreate your thumbnails.', 'verbosa' ),
		//'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_fresponsive',
		'type' => 'select',
		'values' => array( 0, 1 ),
		'labels' => array( __("Cropped","verbosa"), __("Contained","verbosa") ),
		'label' => __( 'Featured Image Behaviour', 'verbosa' ),
		'desc' => __( '<strong>Contained</strong> will scale depending on the viewed resolution<br><strong>Cropped</strong> will try to keep the configured height.', 'verbosa' ),
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_falign',
		'type' => 'select',
		'label' => __( 'Featured Image Crop Position', 'verbosa' ),
		'values' => array( false, "left top" , "left center", "left bottom", "right top", "right center", "right bottom", "center top", "center center", "center bottom" ),
		'labels' => array( __("No Crop","verbosa"), __("Left Top","verbosa"), __("Left Center","verbosa"), __("Left Bottom","verbosa"), __("Right Top","verbosa"), __("Right Center","verbosa"), __("Right Bottom","verbosa"), __("Center Top","verbosa"), __("Center Center","verbosa"), __("Center Bottom","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_featured' ),
	array(
	'id' => 'verbosa_falign_notice',
		'type' => 'notice',
		'label' => '',
		'input_attrs' => array( 'class' => 'warning' ),
		'desc' => __( 'Changing this value may require to recreate your thumbnails.', 'verbosa' ),
		//'active_callback' => 'verbosa_conditionals',
	'section' => 'verbosa_featured' ),

	array(
	'id' => 'verbosa_fbar',
		'type' => 'numberslider',
		'min' => 0, 'max' => '20', 'step' => 1, 'um' => 'px',
		'label' => __( 'Featured Image Bar Height' , 'verbosa' ),
		'desc' => '',
	'section' => 'verbosa_featured' ),

	//////////////////////////////////////////////////// Social Positions ////////////////////////////////////////////////////

	array(
	'id' => 'verbosa_socials_header_above',
		'type' => 'checkbox',
		'label' => __( 'Display above Site Title', 'verbosa' ),
		'desc' => '',
	'section' => 'verbosa_socials' ),
	array(
	'id' => 'verbosa_socials_header_below',
		'type' => 'checkbox',
		'label' => __( 'Display below Site Title', 'verbosa' ),
		'desc' => '',
	'section' => 'verbosa_socials' ),
	array(
	'id' => 'verbosa_socials_sidebar',
		'type' => 'checkbox',
		'label' => __( 'Display at the bottom of the sidebar', 'verbosa' ),
		'desc' => sprintf( __( 'Select where social icons should be visible in.<br><br><strong>Social Icons are defined using the <a href="%1$s" target="_blank">social icons menu</a></strong>. Read the <a href="%2$s" target="_blank">theme documentation</a> on how to create a social menu.', 'verbosa' ), 'nav-menus.php?action=locations', 'http://www.cryoutcreations.eu/wordpress-tutorials/use-new-social-menu' ),
	'section' => 'verbosa_socials' ),

	//////////////////////////////////////////////////// Miscellaneous ////////////////////////////////////////////////////

	array(
	'id' => 'verbosa_pagesmenu',
		'type' => 'toggle',
		'label' => __( 'Default Pages Menu', 'verbosa' ),
		'values' => array( 1, 0 ),
		'desc' => '',
		'priority' => 3,
	'section' => 'verbosa_misc' ),
	array(
	'id' => 'verbosa_masonry',
		'type' => 'toggle',
		'label' => __('Masonry','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => '',
		'priority' => 3,
	'section' => 'verbosa_misc' ),
	array(
	'id' => 'verbosa_defer',
		'type' => 'toggle',
		'label' => __('JS Defer loading','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => '',
		'priority' => 3,
	'section' => 'verbosa_misc' ),

	array(
	'id' => 'verbosa_mobileonios',
		'type' => 'toggle',
		'label' => __( 'Force mobile menu on iOS mobile devices', 'verbosa' ),
		'values' => array( 1, 0 ),
		'desc' => '',
		'priority' => 4,
	'section' => 'verbosa_misc' ),
	array(
	'id' => 'verbosa_editorstyles',
		'type' => 'toggle',
		'label' => __('Editor Styles','verbosa'),
		'values' => array( 1, 0 ),
		'desc' => '',
		'priority' => 4,
	'section' => 'verbosa_misc' ),
	array(
	'id' => 'verbosa_fitvids',
		'type' => 'select',
		'label' => __('FitVids','verbosa'),
		'values' => array( 1, 2, 0 ),
		'labels' => array( __("Enable","verbosa"), __("Enable on mobiles","verbosa"), __("Disable","verbosa") ),
		'desc' => '',
	'section' => 'verbosa_misc' ),
	array(
	'id' => 'verbosa_misc_hint',
		'type' => 'hint',
		'label' => '',
		'priority' => 90,
		'desc' => __("Only use these options to troubleshoot issues.","verbosa"),
	'section' => 'verbosa_misc' ),

), // options

/* option=array(
	type: checkbox, select, textarea, input, function
	id: field_name or custom_function_name
	values: value_0, value_1, value_2 | true/false | number
	labels: __('Label 0','context'), ... | __('Enabled','context')/... |  number/__('Once','context')/...
	desc: html to be displayed at the question mark
	section: section_id

	array(
	'id' => '',
		'type' => '',
		'label' => '',
		'values' => array(  ),
		'labels' => array(  ),
		'desc' => '',
		'input_attrs' => array(  ),
		// conditionals
		'disable_if' => 'function_name',
		'require_fn' => 'function_name',
		// extra
		'addon' => TRUE, // option gets added to core sections
	'section' => '' ),

*/

/*** fonts ***/

'fonts' => array(

	'Inherit' => array( // capitalization matters
		'Inherit General Font', // 'inherit' is searched for by cryout_font_select() in framework prototypes.php
	),
	'Preferred Theme Fonts'=> array(
					"Merriweather/gfont",
					"Noto Serif/gfont",
					"Noto Sans/gfont",
					"PT Serif/gfont",
					"PT Sans/gfont",
					"Droid Serif/gfont",
					"Droid Sans/gfont",
					"Old Standard TT/gfont",
					"Lato/gfont",
					"Josefin Sans/gfont",
					"Open Sans/gfont",
					"Open Sans Condensed/gfont",
					"Source Sans Pro/gfont"
					),
	'Sans-Serif' => array(
					"Segoe UI, Arial, sans-serif",
					"Verdana, Geneva, sans-serif" ,
					"Geneva, sans-serif",
					"Helvetica Neue, Arial, Helvetica, sans-serif",
					"Helvetica, sans-serif" ,
					"Century Gothic, AppleGothic, sans-serif",
				    	"Futura, Century Gothic, AppleGothic, sans-serif",
					"Calibri, Arian, sans-serif",
				    	"Myriad Pro, Myriad,Arial, sans-serif",
					"Trebuchet MS, Arial, Helvetica, sans-serif" ,
					"Gill Sans, Calibri, Trebuchet MS, sans-serif",
					"Impact, Haettenschweiler, Arial Narrow Bold, sans-serif",
					"Tahoma, Geneva, sans-serif" ,
					"Arial, Helvetica, sans-serif" ,
					"Arial Black, Gadget, sans-serif",
					"Lucida Sans Unicode, Lucida Grande, sans-serif"
					),
	'Serif' => array(
					"Georgia, Times New Roman, Times, serif",
					"Times New Roman, Times, serif",
					"Cambria, Georgia, Times, Times New Roman, serif",
					"Palatino Linotype, Book Antiqua, Palatino, serif",
					"Book Antiqua, Palatino, serif",
					"Palatino, serif",
				    	"Baskerville, Times New Roman, Times, serif",
 					"Bodoni MT, serif",
					"Copperplate Light, Copperplate Gothic Light, serif",
					"Garamond, Times New Roman, Times, serif"
					),
	'MonoSpace' => array(
					"Courier New, Courier, monospace" ,
					"Lucida Console, Monaco, monospace",
					"Consolas, Lucida Console, Monaco, monospace",
					"Monaco, monospace"
					),
	'Cursive' => array(
					"Lucida Casual, Comic Sans MS , cursive ",
				    	"Brush Script MT,Phyllis,Lucida Handwriting,cursive",
					"Phyllis,Lucida Handwriting,cursive",
					"Lucida Handwriting,cursive",
					"Comic Sans MS, cursive"
					),
	'Advanced' => array(
					"* Local Font *", // this is preg_matched in styles.php, keep in sync !
					),
	), // fonts

/*** google font option fields ***/
'google-font-enabled-fields' => array(
	'verbosa_fgeneral',
	'verbosa_fsitetitle',
	'verbosa_fsitedesc',
	'verbosa_fmenu',
	'verbosa_fwtitle',
	'verbosa_fwcontent',
	'verbosa_ftitles',
	'verbosa_fmetas',
	'verbosa_fheadings',
	),

/*** ajax load more identifiers ***/
'theme_identifiers' => array(
	'load_more_optid' 			=> 'verbosa_lpposts_more',
	'content_css_selector' 		=> '#lp-posts .lp-posts-inside',
	'pagination_css_selector' 	=> '#lp-posts .navigation.pagination',
),

/************* widget areas *************/

'widget-areas' => array(
	'sidebar-2' => array(
		'name' => __( 'Sidebar - Before Menu', 'verbosa' ),
		'description' => __( 'Located before the main navigation, visible on all devices', 'verbosa' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	),
	'sidebar-1' => array(
		'name' => __( 'Sidebar - After Menu #1', 'verbosa' ),
		'description' => __( 'Located after the main navigation, visible on all devices', 'verbosa' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	),
	'sidebar-3' => array(
		'name' => __( 'Sidebar - After Menu #2', 'verbosa' ),
		'description' => __( 'Located after the main navigation, hidden on smaller mobile devices', 'verbosa' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3>',
	),
	'footer-widget-area' => array(
		'name' => __( 'Footer', 'verbosa' ),
		'description' 	=> __('You can configure how many columns the footer displays from the theme options.', 'verbosa'),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s"><div class="footer-widget-inside">',
		'after_widget' => '</div></section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'content-widget-area-before' => array(
		'name' => __( 'Content Before', 'verbosa' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),
	'content-widget-area-after' => array(
		'name' => __( 'Content After', 'verbosa' ),
		'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title"><span>',
		'after_title' => '</span></h2>',
	),

), // widget-areas

'migration' => array( 
	// no options migrations needed for now 
	// '0.01' => array(
		// 'verbosa_old_key' => 'verbosa_new_key',
	// ),
), // migration


); // $verbosa_big

// FIN
