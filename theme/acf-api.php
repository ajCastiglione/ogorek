<?php

/**
 * Google Maps API Key
 */
function my_acf_google_map_api($api)
{
    $api['key'] = 'AIzaSyALhMImdVe8nFR2QjF104brkVvhDfWIZH0';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
