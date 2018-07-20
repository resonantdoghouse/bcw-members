<?php

get_header();

while ( have_posts() ) : the_post();

	$member_title       = get_post_meta( get_the_ID(), '_' . BCW_MEMBERS_POST_TYPE . '_title', true );
	$member_img         = get_post_meta( get_the_ID(), '_' . BCW_MEMBERS_POST_TYPE . '_img', true );
	$member_description = get_post_meta( get_the_ID(), '_' . BCW_MEMBERS_POST_TYPE . '_description', true );

	the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	echo '<h3>' . esc_html( $member_title ) . '</h3>';
	echo "<img alt='" . $member_title . "' src='" . esc_url_raw( $member_img ) . "'/>";
	echo esc_html( $member_description );

endwhile;

get_footer();
