<?php

function bcw_members_post_fields() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_' . BCW_MEMBERS_POST_TYPE . '_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'           => 'bcw_members',
		'title'        => __( 'BCW Members', 'cmb2' ),
		'object_types' => array( BCW_MEMBERS_POST_TYPE ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, // Show field names on the left
	) );

	// Member Title
	$cmb->add_field( array(
		'name'       => __( 'Title', 'cmb2' ),
		'desc'       => __( 'Member title', 'cmb2' ),
		'id'         => $prefix . 'title',
		'type'       => 'text',
		'attributes' => array(
			'placeholder' => 'Member Title',
			'required'    => 'required',
		),
	) );

	// Member Image
	// $cmb->add_field( array(
	// 	'name'         => 'Image',
	// 	'desc'         => 'Upload an image or enter an URL.',
	// 	'id'           => $prefix . 'img',
	// 	'type'         => 'file',
	// 	'options'      => array(
	// 		'url' => false, // Hide the text input for the url
	// 	),
	// 	'text'         => array(
	// 		'add_upload_file_text' => 'Choose Image'
	// 	),
	// 	'query_args'   => array(
	// 		'type' => 'application/pdf',
	// 		'type' => array(
	// 			'image/gif',
	// 			'image/jpeg',
	// 			'image/png',
	// 		),
	// 	),
	// 	'preview_size' => array( 100, 100 ),
	// ) );

	// description
	$cmb->add_field( array(
		'name'       => 'Member Description',
		'desc'       => 'Member description',
		'id'         => $prefix . 'description',
		'type'       => 'textarea',
		'attributes' => array(
			'placeholder' => 'Member description',
			'required'    => 'required',
		),
	) );
}