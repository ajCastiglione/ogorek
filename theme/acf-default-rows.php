<?php

// Add field name of the repeater
add_filter('acf/load_value/name=trusts',  'afc_load_my_repeater_value', 10, 3);
function afc_load_my_repeater_value($value, $post_id, $field)
{
    // Add field key for the field you would to put a default value (text field in this case)
    if ($value === false) {
        $value[] = array(
            'field_5e1b42cb9796d' => 'Example Trust',
            'field_5e3b6e5dbf55d' => array(
                array(
                    'field_5e3b6e64bf55e' => "Trust Information",
                    'field_5e3b6e6abf55f' => 'https://ogorekwealthmanagement.formstack.com/forms/?3671291-amPPowv0Wc',
                ),
                array(
                    'field_5e3b6e64bf55e' => "Account Distributions",
                    'field_5e3b6e6abf55f' => 'https://ogorekwealthmanagement.formstack.com/forms/account_distributions_form',
                ),
                array(
                    'field_5e3b6e64bf55e' => "File Uploads",
                    'field_5e3b6e6abf55f' => 'https://ogorekwealthmanagement.formstack.com/forms/file_upload_form',
                ),
            )
        );
    }


    return $value;
}

// Start index at 0 for ACF repeater
add_filter('acf/settings/row_index_offset', '__return_zero');
