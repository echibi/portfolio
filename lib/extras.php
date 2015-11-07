<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	// Add class if sidebar is active
	if ( Config\display_sidebar() ) {
		$classes[] = 'sidebar-primary';
	}

	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'sage' ) . '</a>';
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );

function infinite_paginate() {
	//$loopFile       = $_POST['loop_file'];
	$paged = $_POST['page_no'];
	$selected_category = $_POST['selected_category'];

	# Load the posts
	set_query_var('page_no', $paged);
	set_query_var('selected_category', $selected_category);
	//query_posts( array( 'paged' => $paged ) );
	get_template_part( 'templates/page', 'posts' );

	exit;
}

add_action( 'wp_ajax_infinite_scroll', __NAMESPACE__ . '\\infinite_paginate' ); // for logged in user
add_action( 'wp_ajax_nopriv_infinite_scroll', __NAMESPACE__ . '\\infinite_paginate' );
