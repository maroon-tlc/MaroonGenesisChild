<?php
/**
 *   Setup
 *
 * @package  MaroonTechnology\MaroonGenesisChild
 *
 * @since    1.0.0
 *
 * @author   Terry Collins
 *
 * @link     https://maroon.technology
 *
 * @license  GNU-2.0+
 *
 **/
namespace MaroonTechnology\MaroonGenesisChild;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );

/**
 * Setup Child Theme
 * @since 1.0.0
 * @return void
 *
 */
function setup_child_theme() {

	//* Set Localization (do not remove)
	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

	unregister_genesis_callbacks();

	adds_theme_supports();

	adds_new_image_sizes();

}

/**
 * Unregister Genesis callbacks.  We do this here because the child theme loads before Genesis.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_genesis_callbacks() {
	unregister_menu_callbacks();
}

/**
 * Adds theme supports to Child Theme
 * @since 1.0.0
 * @return void
 *
 */
function adds_theme_supports() {

	$config = array(
		//* Add HTML5 markup structure
		'html5'                           => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		),
		//* Add Accessibility support
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),
		//* Add viewport meta tag for mobile browsers
		'genesis-responsive-viewport'     => '',
		//* Add support for custom header
		'custom-header'                   => array(
			'width'           => 600,
			'height'          => 160,
			'header-selector' => '.site-title a',
			'header-text'     => false,
			'flex-height'     => true,
		),
		//* Add support for custom background
		'custom-background'               => null,
		//* Add support for after entry widget
		'genesis-after-entry-widget-area' => null,
		//* Add support for 3-column footer widgets
		'genesis-footer-widgets'          => 3,
		//* Rename primary and secondary navigation menus
		'genesis-menus'                   => array(
			'primary'   => __( 'After Header Menu', CHILD_TEXT_DOMAIN ),
			'secondary' => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
		),
	);

	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Adds new image sizes
 * @since 1.0.0
 * @return void
 *
 */
function adds_new_image_sizes() {

	$config = array(
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
	);

	foreach ( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;
		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
//add_filter( 'genesis_theme_settings_defaults', 'set_theme_settings_defaults' );

/**
 * Set theme settings defaults
 *
 * @since 1.0.0
 *
 * @param $defaults
 *
 * @return mixed
 */
function set_theme_settings_defaults( $defaults) {

	$config = get_theme_settings_defaults();
	//merge the arrays
	wp_parse_args ($config, $defaults);
	return $defaults;

}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
//add_action( 'after_switch_theme', 'update_theme_settings_defaults' );
/**
 * Updates the theme settings defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function update_theme_settings_defaults () {

	$config = get_theme_settings_defaults();

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( $config );

		update_option( 'posts_per_page', $config['blog_cat_num'] );

	}

}

/**
 * Get the theme settings defaults
 *
 * @since 1.0.0
 *
 * @return array
 */
function get_theme_settings_defaults () {

	return array(
		'blog_cat_num'              => 6,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	);

}