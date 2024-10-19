<?php
/**
 * Core theme functions
 *
 * @package Verbosa
 */
 /**
  * Calculates the correct content_width value depending on site with and configured layout
  */
if ( ! function_exists( 'verbosa_content_width' ) ) :
function verbosa_content_width() {
	global $content_width;
	$deviation = 0.80;

	$options = cryout_get_option( array(
		'verbosa_sitelayout', 'verbosa_landingpage', 'verbosa_magazinelayout', 'verbosa_sitewidth', 'verbosa_sidebar', 'verbosa_elementpadding',
	) );

	$content_width = 0.97 * (int)$options['verbosa_sitewidth'];

	switch( $options['verbosa_sitelayout'] ) {
		case '2cSl': case '2cSr': $content_width -= (int)$options['verbosa_sidebar']; // sidebar
	}	

	if ( is_front_page() && $options['verbosa_landingpage'] ) {
		// landing page could be a special case;
	}

	$deviation = round( (100-intval($options['verbosa_elementpadding'])*2)/100, 2);
	
	if ( ! is_singular() ) {
		switch ( $options['verbosa_magazinelayout'] ):
			case 2: $content_width = floor($content_width*0.98/2); break; // magazine-two
			case 3: $content_width = floor($content_width*0.96/3); break; // magazine-three
		endswitch;
	};

	$content_width = floor($content_width*$deviation);
} // verbosa_content_width()
endif;

/**
 * Header image handler
 * Div with background image
 */
add_action( 'cryout_headerimage_hook', 'verbosa_header_image', 99 );
if ( ! function_exists( 'verbosa_header_image' ) ) :
function verbosa_header_image() {
	if (get_header_image() != '') {
		$header_image = get_header_image();
	}

	if ( !empty($header_image) ) {?>
		<?php cryout_header_widget_hook(); ?>
		<img class="header-image" alt="<?php if ( is_single() ) the_title_attribute(); elseif ( is_archive() ) echo esc_attr( get_the_archive_title() ); else echo esc_attr( get_bloginfo( 'name' ) ) ?>" src="<?php echo esc_url( $header_image ) ?>" />
	<?php };
} // verbosa_header_image()
endif;

/**
 * Adds title and description to header
 * Used in header.php
*/
if ( ! function_exists( 'verbosa_title_and_description' ) ) :
function verbosa_title_and_description() {

	$options = cryout_get_option( array('verbosa_logoupload','verbosa_siteheader') );

	if ( in_array($options['verbosa_siteheader'], array( 'logo', 'both' ) ) ) {
		verbosa_logo_helper($options['verbosa_logoupload']);
	}
	if ( in_array($options['verbosa_siteheader'], array( 'title', 'both' ) ) ) {
		$heading_tag = ( is_front_page() || is_home() ) ? 'h1' : 'div';
		echo '<' . $heading_tag . cryout_schema_microdata( 'site-title', 0 ) . ' id="site-title">';
		echo '<span> <a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> </span>';
		echo '</' . $heading_tag . '>';
		echo '<span id="site-description" ' . cryout_schema_microdata( 'site-description', 0) . ' >' . esc_attr( get_bloginfo( 'description' ) ) . '</span>';
	}
} // verbosa_title_and_description()
endif;
add_action ( 'cryout_branding_hook', 'verbosa_title_and_description' );

function verbosa_logo_helper( $verbosa_logo ) {
	if ( function_exists( 'the_custom_logo' ) ) {
		// WP 4.5+
		$wp_logo = str_replace( 'class="custom-logo-link"', 'id="logo" class="custom-logo-link" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '"', get_custom_logo() );
		if ( ! empty( $wp_logo ) ) echo '<div class="identity">' . $wp_logo . '</div>';
	} else {
		// older WP
		if ( ! empty( $verbosa_logo ) ) :
			$img = wp_get_attachment_image_src( $verbosa_logo, 'full' );
			echo '<div class="identity"><a id="logo" href="' . esc_url( home_url( '/' ) ) . '" >
					<img title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" src="' . esc_url( $img[0] ) . '" />
				</a></div>';
		endif;
	}
	echo '';
} // verbosa_logo_helper()

// cryout_schema_publisher() located in cryout/prototypes.php
add_action( 'cryout_after_inner_hook', 'cryout_schema_publisher' );
add_action( 'cryout_singular_after_inner_hook', 'cryout_schema_publisher' );

// cryout_schema_main() located in cryout/prototypes.php
add_action( 'cryout_after_inner_hook', 'cryout_schema_main' );
add_action( 'cryout_singular_after_inner_hook', 'cryout_schema_main' );

// cryout_skiplink() located in cryout/prototypes.php
add_action( 'wp_body_open', 'cryout_skiplink', 2 );

/**
 * Back to top button
*/
if ( ! function_exists( 'verbosa_back_top' ) ) :
function verbosa_back_top() {
	echo '<a id="toTop"><span class="screen-reader-text">' . __('Back to Top', 'verbosa') . '</span><i class="icon-back2top"></i> </a>';
} // verbosa_back_top()
endif;
add_action( 'cryout_after_footer_hook', 'verbosa_back_top' );


/**
 * Creates pagination for blog pages.
 */
if ( ! function_exists( 'verbosa_pagination' ) ) :
function verbosa_pagination( $pages = '', $range = 2, $prefix ='' ) {
	$pagination = cryout_get_option( 'verbosa_pagination' );
	if ( $pagination && function_exists( 'the_posts_pagination' ) ):
		the_posts_pagination( array(
			'prev_text' => '<i class="icon-arrow-left2"></i>',
			'next_text' => '<i class="icon-arrow-right2"></i>',
			'mid_size' => $range
		) );
	else:
		//posts_nav_link();
		verbosa_content_nav( 'nav-old-below' );
	endif;

} // verbosa_pagination()
endif;

/**
 * Prev/Next page links
 */
if ( ! function_exists( 'verbosa_nextpage_links' ) ) :
function verbosa_nextpage_links( $defaults ) {
	$args = array(
		'link_before'      => '<em>',
		'link_after'       => '</em>',
	);
	$r = wp_parse_args( $args, $defaults );
	return $r;
} // verbosa_nextpage_links()
endif;
add_filter( 'wp_link_pages_args', 'verbosa_nextpage_links' );


/**
 * Footer Hook
 */
add_action( 'cryout_master_footer_hook', 'verbosa_master_footer' );
function verbosa_master_footer() {
	$the_theme = wp_get_theme();
	do_action( 'cryout_footer_hook' );
	do_action( 'cryout_copyright_hook' );
	echo '<div style="display:block;float:none;clear:both;font-size: .9em;">' . __( "Powered by", "verbosa" ) .
		'<a target="_blank" href="' . esc_html( $the_theme->get( 'ThemeURI' ) ) . '" title="';
	echo 'Verbosa WordPress Theme by ' . 'Cryout Creations"> ' . 'Verbosa' .'</a> &amp; <a target="_blank" href="' . "http://wordpress.org/";
	echo '" title="' . esc_attr__( "Semantic Personal Publishing Platform", "verbosa" ) . '"> ' . sprintf( " %s", "WordPress" ) . '</a>.</div>';
}

add_action( 'cryout_copyright_hook', 'verbosa_copyright' );
function verbosa_copyright() {
	echo '<div id="site-copyright">' . do_shortcode( cryout_get_option( 'verbosa_copyright' ) ) . '</div>';
}


if ( ! function_exists( 'verbosa_header_section' ) ) :
function verbosa_header_section() { ?>
	<div id="sidebar">

		<header id="header" <?php cryout_schema_microdata('header') ?>>
			<nav id="mobile-menu">
				<?php cryout_mobilemenu_hook(); ?>
				<button type="button" id="nav-cancel"><i class="icon-cross"></i></button>
			</nav>
			<div id="branding" role="banner">
				<?php if ( has_nav_menu( 'primary' ) || ( true == cryout_get_option('verbosa_pagesmenu') ) ) { ?>
					<button type="button" id="nav-toggle"><span>&nbsp;</span></button>
				<?php } ?>
				<?php cryout_branding_hook();?>
				<?php cryout_headerimage_hook(); ?>
				<div class="branding-spacer"></div>
				<?php get_sidebar('before-menu'); ?>
				<?php if ( has_nav_menu( 'primary' ) || ( true == cryout_get_option('verbosa_pagesmenu') ) ) { ?>
					<nav id="access" role="navigation"  aria-label="Primary Menu" <?php cryout_schema_microdata('menu'); ?>>
						<h3 class="widget-title menu-title"><span><?php 
							if ( true == cryout_get_option('verbosa_menutitle') ) {
								echo esc_html( wp_get_nav_menu_name( 'primary' ) );
							} else {
								_e("Menu", "verbosa");
							} ?></span></h3>
						<?php cryout_access_hook();?>
					</nav><!-- #access -->
				<?php } ?>

			</div><!-- #branding -->
		</header><!-- #header -->

		<?php get_sidebar('after-menu'); ?>
		<?php get_sidebar('conditional'); ?>
		<?php cryout_master_footer_hook(); ?>

		</div><!--sidebar-->
		<div id="sidebar-back"></div>
<?php }// verbosa_header_section
endif;

/*
 * General layout class
 */
if ( ! function_exists( 'verbosa_get_layout_class' ) ) :
function verbosa_get_layout_class( $echo = true ) {

	$layout = cryout_get_layout();
	// failsafe if meta layout is not supported by theme
	if ( !in_array( $layout, array( '1c', '2cSl', '2cSr' ) ) ) $layout = cryout_get_option( 'verbosa_sitelayout' );

	/*  If not, return the general layout */
	switch( $layout ) {
		case '2cSl': $class = "two-columns-left"; break;
		case '2cSr': $class = "two-columns-right"; break;
		case '1c':
		default: $class = "one-column"; break;
	}
	
	/*  if page template, override with the page template's layout - backwards compatibility */
	$layouts = array( 
		'one-column' => '1c', 
		'two-columns-left' => '2cSl',
		'two-columns-right' => '2cSr',
	);
	global $verbosa_template_layout;
	if ( ! empty( $verbosa_template_layout ) && in_array( $verbosa_template_layout, array_keys( $verbosa_layouts) ) ) {
		$layout = $layouts[$verbosa_template_layout];
		$class = $verbosa_template_layout;
	}

	// allow the generated layout class to be filtered
	$output = esc_attr( apply_filters( 'verbosa_general_layout_class', $class, $layout ) );

	if ( $echo ) {
		echo $output;
	} else {
		return $output;
	}
} // verbosa_get_layout_class()
endif;


/**
* Checks the browser agent string for mobile ids and adds "mobile" class to body if true
*/
add_filter( 'body_class', 'cryout_mobile_body_class');


/**
* Creates breadcrumbs with page sublevels and category sublevels.
* Hooked in master hook
*/
if ( ! function_exists( 'verbosa_breadcrumbs' ) ) :
function verbosa_breadcrumbs() {
	cryout_breadcrumbs(
		'<i class="icon-ctrl-right"></i>',						// $separator
		'<a href="'. esc_url( home_url() ).'" title="'.__('Home','verbosa').'"><i class="icon-home"></i></a>',	// $home
		1,														// $showCurrent
		'<span class="current">', 								// $before
		'</span>', 												// $after
		'<div id="breadcrumbs-container" class="cryout %1$s"><div id="breadcrumbs-container-inside"><div id="breadcrumbs"> <nav id="breadcrumbs-nav" %2$s>', // $wrapper_pre
		'</nav></div></div></div><!-- breadcrumbs -->', 		// $wrapper_post
		verbosa_get_layout_class(false),						// $layout_class
		__( 'Home', 'verbosa' ),								// $text_home
		__( 'Archive for category "%s"', 'verbosa' ),			// $text_archive
		__( 'Search results for "%s"', 'verbosa' ), 			// $text_search
		__( 'Posts tagged', 'verbosa' ), 						// $text_tag
		__( 'Articles posted by', 'verbosa' ), 					// $text_author
		__( 'Not Found', 'verbosa' ),							// $text_404
		__( 'Post format', 'verbosa' ),							// $text_format
		__( 'Page', 'verbosa' )									// $text_page
	);
} // verbosa_breadcrumbs()
endif;

/**
* Master hook to bypass customizer options
*/
if ( ! function_exists( 'verbosa_master_hook' ) ) :
function verbosa_master_hook(){
	$verbosa_interim_options = cryout_get_option( array(
		'verbosa_breadcrumbs',
		'verbosa_searchboxmain',
		'verbosa_searchboxfooter',
		'verbosa_comlabels',
		'verbosa_socials_header_above',
		'verbosa_socials_header_below',
		'verbosa_socials_sidebar',
		)
	);
	if ( $verbosa_interim_options['verbosa_breadcrumbs'] ) {
		if (is_singular()) {
			add_action('cryout_before_content_hook', 'verbosa_breadcrumbs' );
		} else {
			add_action('cryout_breadcrumbs_hook', 'verbosa_breadcrumbs' );
		}
	};

	if ( $verbosa_interim_options['verbosa_comlabels'] == 1) {
		add_filter('comment_form_default_fields', 'verbosa_comments_form');
		add_filter('comment_form_field_comment', 'verbosa_comments_form_textarea');
	}

	if ( $verbosa_interim_options['verbosa_socials_header_above'] ) add_action('cryout_branding_hook', 'verbosa_socials_menu_header_above', 5);
	if ( $verbosa_interim_options['verbosa_socials_header_below'] ) add_action('cryout_branding_hook', 'verbosa_socials_menu_header_below', 30);
	if ( $verbosa_interim_options['verbosa_socials_sidebar'] ) add_action('cryout_footer_hook', 'verbosa_socials_menu_footer', 17);

}; // verbosa_master_hook()
endif;
add_action('wp', 'verbosa_master_hook');

// FIN
