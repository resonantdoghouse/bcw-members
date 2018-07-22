<?php

/**
 * Add featured image size
 */
add_image_size('bcw-members-avatar', 200, 200);

/**
 * Change the Title field placeholder on the edit screen.
 *
 * @param [type] $title
 * @return void
 */
function bcw_members_title_placeholder($title)
{
    $screen = get_current_screen();
    if (BCW_MEMBERS_POST_TYPE == $screen->post_type) {
        $title = 'Member Name';
    }
    return $title;
}

/**
 * Remove default editor
 */
function bcw_members_hide_editor()
{
    $current_screen = get_current_screen();
    if ($current_screen->id === BCW_MEMBERS_POST_TYPE) {
        remove_post_type_support(BCW_MEMBERS_POST_TYPE, 'editor');
    }
}
