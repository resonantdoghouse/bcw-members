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