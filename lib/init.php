<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
	// Make theme available for translation
	// Community translations can be found at https://github.com/roots/sage-translations
	load_theme_textdomain( 'sage', get_template_directory() . '/lang' );

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	add_theme_support( 'title-tag' );

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus( [
		'primary_navigation' => __( 'Primary Navigation', 'sage' )
	] );

	// Add post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support( 'post-thumbnails' );

	// Add post formats
	// http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', [ 'gallery', 'link', 'image', 'quote', 'video' ] );

	// Add HTML5 markup for captions
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list' ] );

	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style( Assets\asset_path( 'styles/editor-style.css' ) );


}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Remove tags support from posts
 */
function unregister_post_tags() {
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}

add_action( 'init', __NAMESPACE__ . '\\unregister_post_tags' );

/**
 * Initialize the posts custom metaboxes.
 */
function post_meta_boxes() {

	$post_metabox        = array(
		'id'       => 'post_settings',
		'title'    => 'Settings',
		'desc'     => '',
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'label' => __( 'Show link', 'sage' ),
				'id'    => 'show_post_link',
				'type'  => 'on-off',
				'desc'  => __( 'Shows a link to the post on hover', 'sage' ),
				'std'   => 'off'
			) )
	);
	$post_images_metabox = array(
		'id'       => 'post_images',
		'title'    => 'Images',
		'desc'     => '',
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'fields'   => array(
			array(
				'id'           => 'images_list',
				'label'        => __( 'Images List', 'sage' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'list-item',
				'section'      => '',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
				'settings'     => array(
					array(
						'id'           => 'image',
						'label'        => __( 'Image', 'sage' ),
						'desc'         => '',
						'std'          => '',
						'type'         => 'upload',
						'rows'         => '',
						'post_type'    => '',
						'taxonomy'     => '',
						'min_max_step' => '',
						'class'        => 'ot-upload-attachment-id',
						'condition'    => '',
						'operator'     => 'and'
					),
					array(
						'id'           => 'text',
						'label'        => __( 'Content', 'sage' ),
						'desc'         => '',
						'std'          => '',
						'type'         => 'textarea-simple',
						'rows'         => '6',
						'post_type'    => '',
						'taxonomy'     => '',
						'min_max_step' => '',
						'class'        => '',
						'condition'    => '',
						'operator'     => 'and'
					)
				)
			)
		)
	);

	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $post_metabox );
		ot_register_meta_box( $post_images_metabox );
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\\post_meta_boxes' );



