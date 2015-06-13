<?php

namespace Roots\Sage\Utils;

/**
 * Tell WordPress to use searchform.php from the templates/ directory
 */
function get_search_form() {
	$form = '';
	locate_template( '/templates/searchform.php', true, false );

	return $form;
}

add_filter( 'get_search_form', __NAMESPACE__ . '\\get_search_form' );

/**
 * Gets the featured image from a post
 *
 * @param int $post_id
 *
 * @return string
 */
function get_featured_image( $post_id = 0 ) {

	if ( 0 === $post_id ) {
		$post_id = get_the_ID();
	}

	$thumb_id       = get_post_thumbnail_id( $post_id );
	$featured_image = wp_get_attachment_image( $thumb_id, 'large', false, array( 'class' => 'featured-image' ) );

	return $featured_image;
}

/**
 * Gets the featured image from a post
 *
 * @param int $post_id
 *
 * @return string
 */
function get_featured_image_src( $post_id = 0 ) {

	if ( 0 === $post_id ) {
		$post_id = get_the_ID();
	}

	$thumb_id       = get_post_thumbnail_id( $post_id );
	$featured_image = wp_get_attachment_image_src( $thumb_id, 'large', false, array( 'class' => 'featured-image' ) );

	return $featured_image;
}
