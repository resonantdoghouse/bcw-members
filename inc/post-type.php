<?php

function bcw_members_post_type()
{
    $txt_dom = BCW_MEMBERS_POST_TYPE;
    $bcw_members_name = BCW_MEMBERS_POST_TYPE;
    $bcw_members_name_single = 'Member';
    $bcw_members_name_plural = 'Members';

    $bcw_members_archive = 'bcw-members';
//    $bcw_members_slug    = 'bcw-members';

    $bcw_members_ico = BCW_MEMBERS_DASHICON;
    $bcw_members_capability = 'post';
    $bcw_members_menu_position = 5;

    $bcw_members_rest = 'members';

    $bcw_members_supports = array(
        'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'revisions',
        'comments',
    );

    $labels = array(
        'name' => __($bcw_members_name, $txt_dom),
        'singular_name' => __($bcw_members_name_single, $txt_dom),
        'add_new' => __('Add New', $txt_dom),
        'add_new_item' => __('Add New ' . $bcw_members_name_single, $txt_dom),
        'edit_item' => __('Edit ' . $bcw_members_name_single, $txt_dom),
        'new_item' => __('New ' . $bcw_members_name_single, $txt_dom),
        'all_items' => __('All ' . $bcw_members_name_plural, $txt_dom),
        'view_item' => __('View ' . $bcw_members_name_single, $txt_dom),
        'search_items' => __('Search ' . $bcw_members_name_plural, $txt_dom),
        'not_found' => __('No ' . $bcw_members_name_plural . ' found', $txt_dom),
        'not_found_in_trash' => __('No ' . $bcw_members_name_plural . ' found in Trash', $txt_dom),
        'menu_name' => __($bcw_members_name_plural, $txt_dom),
        'featured_image' => __('Profile Photo'),
        'set_featured_image' => __('Set Profile Photo'),
        'remove_featured_image' => __('Remove Profile Photo'),
        'use_featured_image' => __('Use as Profile Photo'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => $bcw_members_capability,
        'has_archive' => $bcw_members_archive,
        'menu_icon' => $bcw_members_ico,
        'hierarchical' => false,
        'menu_position' => $bcw_members_menu_position,
        'show_in_rest' => true,
        'rest_base' => $bcw_members_rest,
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'supports' => $bcw_members_supports,

    );

    register_post_type(BCW_MEMBERS_POST_TYPE, $args);

}
