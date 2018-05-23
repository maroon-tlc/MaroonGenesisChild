<?php
/**
 *   Comments structure handling
 *
 * @package  MaroonTechnology\MaroonGenesisChild\Structure
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

add_filter( 'genesis_comment_list_args', __NAMESPACE__ . '\setup_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return mixed
 */
function setup_comments_gravatar( array $args ) {

	$args['avatar_size'] = 60;

	return $args;

}
