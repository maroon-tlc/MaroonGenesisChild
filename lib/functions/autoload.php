<?php
/**
 *   Autoloader for files
 *
 * @package  MaroonTechnology\MaroonGenesisChild\Functions
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
 * Loads non WP Admin files
 *
 * @since 1.0.0
 *
 * @return void
 *
 */
function load_site_files () {
	$filenames = array(
		'setup.php',
		'components/customizer/css-handler.php',
		'components/customizer/helpers.php',

		'functions/autoload.php',
		'functions/formatting.php',
		'functions/load-assets.php',
		'functions/markup.php',

		'structure/comments.php',
		'structure/footer.php',
		'structure/header.php',
		'structure/menu.php',
		'structure/post.php',

		'components/customizer/customizer.php',
	);

	foreach ( $filenames as $filename ) {

		include_once( CHILD_THEME_DIR . '/lib/' . $filename );

	}
}

load_site_files();