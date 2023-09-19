<?php
/*
* Plugin Name:       FWD REST API Plugin
* Plugin URI:        https://wp.bcitwebdeveloper.ca/
* Description:       A plugin to add REST fields.
* Version:           1.0.0
* Requires at least: 5.7
* Requires PHP:      7.0
* Author:            Jonathon Leathers
* Author URI:        https://wp.bcitwebdeveloper.ca/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Register new REST API fields
 * @link https://developer.wordpress.org/reference/functions/register_rest_field/
 */
add_action( 'rest_api_init', 'fwd_rest_api_fields' );

function fwd_rest_api_fields() {

	// Register a 'previous-post' REST API field for the 'post' object.
	register_rest_field( 
		'post',          // REST object name
		'previous_post', // REST field name
		array(
			'get_callback'    => 'fwd_prev_post',
			'update_callback' => null,
			'schema'          => null,
		)
	);

	// Add more REST API fields here...
	register_rest_field( 
		'post',          // REST object name
		'next_post', // REST field name
		array(
			'get_callback'    => 'fwd_next_post',
			'update_callback' => null,
			'schema'          => null,
		)
	);

}

function fwd_prev_post() {
	$prev_post = get_previous_post();
	if ( ! empty( $prev_post ) ) {
		$link = array(
			'title' => $prev_post->post_title,
			'slug'  => $prev_post->post_name,
			'id'    => $prev_post->ID,
		);
		return $link;
	} else {
		return '';
	}
}

// Add more callback functions here...

function fwd_next_post() {
	$next_post = get_next_post();
	if ( ! empty( $next_post ) ) {
		$link = array(
			'title' => $next_post->post_title,
			'slug'  => $next_post->post_name,
			'id'    => $next_post->ID,
		);
		return $link;
	} else {
		return '';
	}
}
