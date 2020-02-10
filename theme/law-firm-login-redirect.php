<?php
// Login failed redirect
add_action('wp_login_failed', 'my_front_end_login_fail');  // hook failed login

function my_front_end_login_fail($username)
{
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
        // let's append some information (login=failed) to the URL for the theme to use
        if (strstr($referrer, '?login=failed')) {
            wp_redirect($referrer);
        } else {
            wp_redirect($referrer . '?login=failed');
        }
        exit;
    }
}
