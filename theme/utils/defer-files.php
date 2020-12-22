<?php

function add_rel_preload($html, $handle, $href, $media)
{

    if (is_admin())
        return $html;

    $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;
}
add_filter('style_loader_tag', 'add_rel_preload', 10, 4);


function defer_parsing_of_js($tag, $handle)
{
    $jquery = strstr($handle, 'jquery');
    if (is_user_logged_in()) return $tag;
    switch ($handle) {
        case !empty($jquery):
            return $tag;
        default:
            return str_replace(' src', ' defer async src', $tag);
    }
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10, 2);
