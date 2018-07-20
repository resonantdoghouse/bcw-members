<?php

function bcw_members_title_placeholder( $title ){
	$screen = get_current_screen();
	if ( BCW_MEMBERS_POST_TYPE == $screen->post_type ){
		$title = 'Member Name';
	}
	return $title;
}

add_filter( 'enter_title_here', 'bcw_members_title_placeholder' );

add_action( 'current_screen', 'bcw_members_hide_editor' );

/**
 * Remove default editor
 */
function bcw_members_hide_editor() {
	$current_screen = get_current_screen();
	if( $current_screen ->id === BCW_MEMBERS_POST_TYPE ) {
		remove_post_type_support(BCW_MEMBERS_POST_TYPE, 'editor');
	}
}