<?php

/**
 * Members Shortcode
 * @return string
 */
function bcw_members_shortcode()
{

    $show_permalink = false;

    $bcw_members_posts = get_posts(array(
        'post_type' => 'bcw_members',
        'posts_per_page' => 5,
    ));

    $output = '<h1 class="bcw-members-title">Our Team</h1>';
    $output .= '<ul class="bcw-members-list">';

    if ($bcw_members_posts) {

        foreach ($bcw_members_posts as $post):

            setup_postdata($post);
            $bcw_member_meta = get_post_meta($post->ID, '', true);
            $bcw_member_title = $bcw_member_meta["_bcw_members_title"][0];
            $bcw_member_permalink = get_the_permalink($post->ID);
            $bcw_member_img = get_the_post_thumbnail_url($post->ID);
            $bcw_member_description = $bcw_member_meta["_bcw_members_description"][0];

            $output .= '<li class="bcw-members-list__item">';
            $output .= '<div class="bcw-members-list__item-text-wrapper">';
            $output .= '<h2 class="bcw-members-list__item-title">';
            if ($show_permalink) {
                $output .= '<a href="' . $bcw_member_permalink . '">' . $post->post_title . '</a>';
            } else {
                $output .= $post->post_title;
            }

            $output .= '</h2>';
            $output .= '<h3 class="bcw-members-list__item-sub-title">' . $bcw_member_title . '</h3>';
            $output .= '<p class="bcw-members-list__item-description">' . $bcw_member_description . '</p>';
            $output .= '</div>';
            $output .= '<img class="bcw-members-list__item-avatar" src="' . $bcw_member_img . '"/>';
            $output .= '</li>';

        endforeach;

        $output .= '</ul>';

        wp_reset_postdata();

    } else {
        $output .= '<li>No Members Found</li></ul>';
    }

    return $output;
}
