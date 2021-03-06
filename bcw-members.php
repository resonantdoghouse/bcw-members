<?php

/**
 * Plugin Name: BCW Members
 * Description: Members post-type with CMB2 custom fields
 * Text Domain: bcw-members
 */

if (!function_exists('add_action')) {
    echo 'Not allowed!';
    exit();
}

/**
 * Define Constants for post-type & dashicon
 */
define('BCW_MEMBERS_POST_TYPE', 'bcw_members');
define('BCW_MEMBERS_DASHICON', 'dashicons-groups');

/**
 * Includes: post-type, CMB2 fields, admin remove default editor
 */
require plugin_dir_path(__FILE__) . '/inc/post-type.php';
require plugin_dir_path(__FILE__) . '/inc/post-fields.php';
require plugin_dir_path(__FILE__) . '/inc/shortcode.php';
require plugin_dir_path(__FILE__) . '/inc/style.php';
require plugin_dir_path(__FILE__) . '/inc/admin.php';

/**
 * Hooks: Actions, Filters
 */
add_action('init', 'bcw_members_post_type');
add_action('cmb2_admin_init', 'bcw_members_post_fields');
add_action('wp_enqueue_scripts', 'bcw_members_style');
add_action('current_screen', 'bcw_members_hide_editor');
add_filter('single_template', 'bcw_members_single');
add_filter('archive_template', 'bcw_members_archive');
add_filter('enter_title_here', 'bcw_members_title_placeholder');

/**
 * Shortcode
 */
add_shortcode('bcw_members', 'bcw_members_shortcode');

/**
 * CMB2 Get the bootstrap
 */
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

function bcw_members_single($single_template)
{
    global $post;

    if ($post->post_type == BCW_MEMBERS_POST_TYPE) {
        $single_template = dirname(__FILE__) . '/page-templates/single.php';
    }

    return $single_template;
}

function bcw_members_archive($archive_template)
{
    global $post;

    if ($post->post_type == BCW_MEMBERS_POST_TYPE) {
        $archive_template = dirname(__FILE__) . '/page-templates/archive-bcw-members.php';
    }

    return $archive_template;
}
