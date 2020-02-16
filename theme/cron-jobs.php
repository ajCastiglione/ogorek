<?php

// Scheduled Action Hook


function w3_flush_cache()
{
    global $w3_plugin_totalcache;
    $w3_plugin_totalcache->flush_all();
}

// Schedule Cron Job Event

function w3tc_cache_flush()
{
    if (!wp_next_scheduled('w3_flush_cache')) {
        wp_schedule_event(current_time('timestamp'), 'Twice Daily', 'w3_flush_cache');
    }
}

add_action('wp', 'w3tc_cache_flush');
