<?php
/**
 * The Header
 *
 * Displays all of the <head> section and everything up till <main>
 *
 * @package Verbosa
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php cryout_meta_hook(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php
	cryout_header_hook();
	wp_head();
?>
</head>

<body <?php body_class(); cryout_schema_microdata('body');?>>
	<?php do_action( 'wp_body_open' ); ?>
	<?php cryout_body_hook(); ?>
	<div id="site-wrapper">

		<div id="content" class="cryout">
			<?php cryout_main_hook(); ?>
