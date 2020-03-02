<?php
add_role(
    'law_firm_admin',
    __('Law Firm Admin'),
    array(
        'read'         => false,
        'edit_posts'   => false,
    )
);

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
