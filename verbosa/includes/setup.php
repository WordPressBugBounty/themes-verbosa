<?php
/*
 * Theme setup functions. Theme initialization, add_theme_support(), widgets, navigation
 *
 * @package Verbosa
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
add_action( 'after_setup_theme', 'verbosa_content_width' ); // mostly for dashboard
add_action( 'template_redirect', 'verbosa_content_width' );

/** Tell WordPress to run verbosa_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'verbosa_setup' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function verbosa_setup() {

	$options = cryout_get_option();

	// This theme styles the visual editor with editor-style.css to match the theme style.
	if ($options['verbosa_editorstyles']) add_editor_style( 'resources/styles/editor-style.css' );

	// Support title tag since WP 4.1
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Add HTML5 support
	add_theme_support( 'html5', array( 'script', 'style', 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Add post formats
	add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'audio', 'video' ) );

	// Make theme available for translation
	load_theme_textdomain( 'verbosa', get_template_directory() . '/cryout/languages' );
	load_theme_textdomain( 'verbosa', get_template_directory() . '/languages' );
	load_textdomain( 'cryout', '' );

	// This theme allows users to set a custom backgrounds
	add_theme_support( 'custom-background' );

	// This theme supports WordPress 4.5 logos
	add_theme_support( 'custom-logo', array( 'height' => apply_filters( 'verbosa_logo_height', 240 ), 'width' => apply_filters( 'verbosa_logo_width', 240 ), 'flex-height' => true, 'flex-width'  => true ) );
	add_filter( 'get_custom_logo', 'cryout_filter_wp_logo_img' );

	// This theme uses wp_nav_menu() in 1 location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'verbosa' ),
		'socials' => __( 'Social Icons', 'verbosa' ),
	) );

	$falign = (bool)$options['verbosa_falign'];
	if (false===$falign) {
		$fheight = 0;
	} else {
		$falign = explode( ' ', $options['verbosa_falign'] );
		if (!is_array($falign) ) $falign = array( 'center', 'center' ); //failsafe
	}

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(
		// default Post Thumbnail dimensions
		apply_filters( 'verbosa_thumbnail_image_width', 1440 ),
		apply_filters( 'verbosa_thumbnail_image_height', 1440 ),
		false
	);
	// Custom image size for use with post thumbnails
	add_image_size( 'verbosa-featured',
		apply_filters( 'verbosa_featured_image_width', 1440 ),
		apply_filters( 'verbosa_featured_image_height', 1440 ),
		$falign
	);

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the same size as the header.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	$verbosa_headerwidth = apply_filters( 'verbosa_header_image_width',	(int) $options['verbosa_sidebar'] );
	$verbosa_headerheight = apply_filters( 'verbosa_header_image_height',	(int) $options['verbosa_headerheight'] );
	add_image_size( 'verbosa-header', $verbosa_headerwidth, $verbosa_headerheight, apply_filters( 'verbosa_header_crop', true ) );

	// Add support for flexible headers
	add_theme_support( 'custom-header', array(
		'flex-height' 		=> true,
		'flex-width' 		=> true,
		'height'		=> $verbosa_headerheight,
		'width'			=> $verbosa_headerwidth,
		'default-image'	=> get_template_directory_uri() . '/resources/images/headers/typewriter.jpg'
	));

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'typewriter' => array(
			'url' => '%s/resources/images/headers/typewriter.jpg',
			'thumbnail_url' => '%s/resources/images/headers/typewriter.jpg',
			'description' => __( 'Typewriter', 'verbosa' )
		),

		'breakfast' => array(
			'url' => '%s/resources/images/headers/breakfast.jpg',
			'thumbnail_url' => '%s/resources/images/headers/breakfast.jpg',
			'description' => __( 'Breakfast', 'verbosa' )
		),

		'homeoffice' => array(
			'url' => '%s/resources/images/headers/homeoffice.jpg',
			'thumbnail_url' => '%s/resources/images/headers/homeoffice.jpg',
			'description' => __( 'Home Office', 'verbosa' )
		),

	) );

	// Gutenberg
	// add_theme_support( 'wp-block-styles' ); // apply default block styles
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'Accent #1', 'verbosa' ),
			'slug' => 'accent-1',
			'color' => $options['verbosa_accent1'],
		),
		array(
			'name' => __( 'Accent #2', 'verbosa' ),
			'slug' => 'accent-2',
			'color' => $options['verbosa_accent2'],
		),
 		array(
			'name' => __( 'Site Text', 'verbosa' ),
			'slug' => 'sitetext',
			'color' => $options['verbosa_sitetext'],
		),
		array(
			'name' => __( 'Content Background', 'verbosa' ),
			'slug' => 'sitebg',
			'color' => $options['verbosa_contentbackground'],
		),
 	) );
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => __( 'small', 'verbosa' ),
			'shortName' => __( 'S', 'verbosa' ),
			'size' => intval( intval( $options['verbosa_fgeneralsize'] ) / 1.6 ),
			'slug' => 'small'
		),
		array(
			'name' => __( 'normal', 'verbosa' ),
			'shortName' => __( 'M', 'verbosa' ),
			'size' => intval( intval( $options['verbosa_fgeneralsize'] ) * 1.0 ),
			'slug' => 'normal'
		),
		array(
			'name' => __( 'large', 'verbosa' ),
			'shortName' => __( 'L', 'verbosa' ),
			'size' => intval( intval( $options['verbosa_fgeneralsize'] ) * 1.6 ),
			'slug' => 'large'
		),
		array(
			'name' => __( 'larger', 'verbosa' ),
			'shortName' => __( 'XL', 'verbosa' ),
			'size' => intval( intval( $options['verbosa_fgeneralsize'] ) * 2.56 ),
			'slug' => 'larger'
		)
	) );

	// WooCommerce compatibility
	// add_theme_support( 'woocommerce' );
	// add_theme_support( 'wc-product-gallery-zoom' );
	// add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );

} // verbosa_setup()

function verbosa_gutenberg_editor_styles() {
	$editorstyles = cryout_get_option('verbosa_editorstyles');
	if ( ! $editorstyles ) return;
	wp_enqueue_style( 'verbosa-gutenberg-editor-styles', get_theme_file_uri( '/resources/styles/gutenberg-editor.css' ), false, _CRYOUT_THEME_VERSION, 'all' );
	wp_add_inline_style( 'verbosa-gutenberg-editor-styles', preg_replace( "/[\n\r\t\s]+/", " ", verbosa_editor_styles() ) );
}
add_action( 'enqueue_block_editor_assets', 'verbosa_gutenberg_editor_styles' );

/*
 * Have two textdomains work with translation systems.
 * https://gist.github.com/justintadlock/7a605c29ae26c80878d0
 */
function verbosa_override_load_textdomain( $override, $domain ) {
	// Check if the domain is our framework domain.
	if ( 'cryout' === $domain ) {
		global $l10n;
		// If the theme's textdomain is loaded, assign the theme's translations
		// to the framework's textdomain.
		if ( isset( $l10n[ 'verbosa' ] ) )
			$l10n[ $domain ] = $l10n[ 'verbosa' ];
		// Always override.  We only want the theme to handle translations.
		$override = true;
	}
	return $override;
}
add_filter( 'override_load_textdomain', 'verbosa_override_load_textdomain', 10, 2 );


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function verbosa_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'verbosa_page_menu_args' );

/** Main menu */
function verbosa_main_menu() { ?>
	<?php
	wp_nav_menu( array(
		'container'		=> '',
		'menu_id'		=> 'prime_nav',
		'menu_class'	=> '',
		'theme_location'=> 'primary',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'items_wrap'	=> '<div><ul id="%s" class="%s">%s</ul></div>'

	) );
} // verbosa_main_menu()
add_action( 'cryout_access_hook', 'verbosa_main_menu' );

/** Mobile menu */
function verbosa_mobile_menu() {
	wp_nav_menu( array(
		'container'		=> '',
		'menu_id'		=> 'mobile-nav',
		'menu_class'	=> '',
		'theme_location'=> 'primary',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>',
		'items_wrap'	=> '<div><ul id="%s" class="%s">%s</ul></div>'
	) );
} // verbosa_mobile_menu()
add_action( 'cryout_mobilemenu_hook', 'verbosa_mobile_menu' );

/** SOCIALS MENU **/
function verbosa_socials_menu( $location ) {
	if ( has_nav_menu( 'socials' ) )
		echo strip_tags(
			wp_nav_menu( array(
				'container' => 'nav',
				'container_class' => 'socials',
				'container_id' => $location,
				'theme_location' => 'socials',
				'link_before' => '<span>',
				'link_after' => '</span>',
				'depth' => 0,
				'items_wrap' => '%3$s',
				'walker' => new Cryout_Social_Menu_Walker(),
				'echo' => false,
			) ),
		'<a><div><span><nav>'
		);
} //verbosa_socials_menu()
function verbosa_socials_menu_header_above() { verbosa_socials_menu('sheader_above'); }
function verbosa_socials_menu_header_below() { verbosa_socials_menu('sheader_below'); }
function verbosa_socials_menu_footer()   { verbosa_socials_menu('sfooter');   }

/* Socials hooks moved to master hook in core.php */

/**
 * Register widgetized areas defined by theme options.
 */
function cryout_widgets_init() {
	$areas = cryout_get_theme_structure( 'widget-areas' );
	if ( ! empty( $areas ) ):
		foreach ( $areas as $aid => $area ):
			register_sidebar( array(
				'name' 			=> $area['name'],
				'id' 			=> $aid,
				'description' 	=> ( isset( $area['description'] ) ? $area['description'] : '' ),
				'before_widget' => $area['before_widget'],
				'after_widget' 	=> $area['after_widget'],
				'before_title' 	=> $area['before_title'],
				'after_title' 	=> $area['after_title'],
			) );
		endforeach;
	endif;
} // cryout_widgets_init()
add_action( 'widgets_init', 'cryout_widgets_init' );

/**
 * Creates different class names for footer widgets depending on their number.
 * This way they can fit the footer area.
 */
function verbosa_footer_colophon_class() {
	$opts = cryout_get_option( array( 'verbosa_footercols', 'verbosa_footeralign' ) );
	$class = '';
	switch ( $opts['verbosa_footercols'] ) {
		case '0': 	$class = 'all';		break;
		case '1':	$class = 'one';		break;
		case '2':	$class = 'two';		break;
		case '3':	$class = 'three';	break;
		case '4':	$class = 'four';	break;
	}
	if ( !empty($class) ) echo 'class="footer-' . esc_attr( $class ) . ' ' . ( $opts['verbosa_footeralign'] ? 'footer-center' : '' ) . ' cryout"';
} // verbosa_footer_colophon_class()

/**
 * Set up widget areas
 */

function verbosa_widget_before() {
	if ( is_active_sidebar( 'content-widget-area-before' ) ) { ?>
		<aside class="content-widget content-widget-before" <?php cryout_schema_microdata( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'content-widget-area-before' ); ?>
		</aside><!--content-widget--><?php
	}
} // verbosa_widget_before()

function verbosa_widget_after() {
	if ( is_active_sidebar( 'content-widget-area-after' ) ) { ?>
		<aside class="content-widget content-widget-after" <?php cryout_schema_microdata( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'content-widget-area-after' ); ?>
		</aside><!--content-widget--><?php
	}
} // verbosa_widget_after()

add_action ('cryout_before_content_hook', 'verbosa_widget_before');
add_action ('cryout_after_content_hook', 'verbosa_widget_after');


/* FIN */
