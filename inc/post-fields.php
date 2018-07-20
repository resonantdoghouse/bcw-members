<?php

function bcw_members_post_fields() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_bcw_members_';

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

// Regular text field
	$cmb->add_field( array(
		'name' => __( 'Title', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'text',
		'type' => 'text',
	) );

	// image field
	$cmb->add_field( array(
		'name'         => 'Team Member Image',
		'desc'         => 'Upload an image or enter an URL.',
		'id'           => 'bcw_members_img',
		'type'         => 'file',
		// Optional:
		'options'      => array(
			'url' => false, // Hide the text input for the url
		),
		'text'         => array(
			'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args'   => array(
			'type' => 'application/pdf', // Make library only display PDFs.
			// Or only allow gif, jpg, or png images
			// 'type' => array(
			// 	'image/gif',
			// 	'image/jpeg',
			// 	'image/png',
			// ),
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

	// description
	$cmb->add_field( array(
		'name'    => 'Team Member Description',
//		'desc'    => 'field description (optional)',
//		'default' => 'standard value (optional)',
		'id'      => 'bcw_members_description',
		'type'    => 'textarea'
	) );


}