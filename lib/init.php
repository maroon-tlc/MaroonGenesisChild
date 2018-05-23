<?php
/**
 *   Theme Initialization
 *
 * @package  MaroonTechnology/MaroonGenesisChild
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

/**
 * Initialize the theme's constants.
 *
 * @since 1.0.0
 * @return void
 */
function initialize_constants () {

	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );

	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

}

initialize_constants();