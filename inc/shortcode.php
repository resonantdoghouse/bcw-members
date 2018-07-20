<?php

/**
 * Members Shortcode
 * @return string
 */
function bcw_members_shortcode() {

	$bcw_members_posts = get_posts( array(
		'post_type'      => 'bcw_members',
		'posts_per_page' => 5,
	) );

	$output = '<ul class="bcw-members-list">';

	if ( $bcw_members_posts ) {

		foreach ( $bcw_members_posts as $post ) :
			setup_postdata( $post );
			$bcw_member_meta        = get_post_meta( $post->ID, '', true );
			$bcw_member_title       = $bcw_member_meta["_bcw_members_title"][0];
			$bcw_member_img         = $bcw_member_meta["_bcw_members_img"][0];
			$bcw_member_description = $bcw_member_meta["_bcw_members_description"][0];

			$output .= '<li class="bcw-members-list__item">';
			$output .= '<h2>' . $post->post_title . '</h2>'; // name
			$output .= '<h3>' . $bcw_member_title . '</h3>'; // title
			$output .= '<img src="' . $bcw_member_img . '"/>';
			$output .= $bcw_member_description;
			$output .= '</li>';

		endforeach;

		$output .= '</ul>';

		wp_reset_postdata();

	} else {
		$output .= '<li>No Members Found</li></ul>';
	}


	return $output;
}