<?php

function bcw_members_style() {
	$plugin_url = plugin_dir_url( __FILE__ ) . "../";

	wp_enqueue_style( 'bcw_members_style',  $plugin_url . "build/css/style.min.css");
}
