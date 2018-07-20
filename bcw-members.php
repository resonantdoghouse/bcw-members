<?php

/**
 * Plugin Name: BCW Members
 * Description: Members post-type with CMB2 custom fields
 * Text Domain: bcw-members
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

define( 'BCW_MEMBERS_POST_TYPE', 'bcw-members' );
define( 'BCW_MEMBERS_DASHICON', 'dashicons-groups' );

/**
 * Includes
 */
require plugin_dir_path( __FILE__ ) . '/inc/post-type.php';
require plugin_dir_path( __FILE__ ) . '/inc/post-fields.php';
require plugin_dir_path( __FILE__ ) . '/inc/admin.php';

/**
 * Hooks: Actions & Filters
 */
add_action( 'init', 'bcw_members_post_type' );
add_action( 'cmb2_admin_init', 'bcw_members_post_fields' );
add_filter( 'single_template', 'bcw_members_single' );
add_filter( 'archive_template', 'bcw_members_archive' );

/**
 * CMB2 Get the bootstrap
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require __DIR__ . '/vendor/autoload.php';
}



function bcw_members_single( $single_template ) {
	global $post;

	if ( $post->post_type == BCW_MEMBERS_POST_TYPE ) {
		$single_template = dirname( __FILE__ ) . '/page-templates/single.php';
	}

	return $single_template;
}

function bcw_members_archive( $archive_template ) {
	global $post;

	if ( $post->post_type == BCW_MEMBERS_POST_TYPE ) {
		$archive_template = dirname( __FILE__ ) . '/page-templates/archive-bcw-members.php';
	}

	return $archive_template;
}
