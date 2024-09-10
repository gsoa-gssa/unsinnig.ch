<?php
global $wpdb;

$supporters = $wpdb->get_results("SELECT * FROM wp_db7_forms WHERE form_post_id IN ('70', '79', '80')");

$numSup = count($supporters);

foreach ($supporters as $supporter) {
    $fields = unserialize($supporter->form_value);
    echo <<<EOD
<b>{$fields['firstname']} {$fields['lastname']}</b>, {$fields["plz"]} {$fields["city"]}
EOD;
$numSup--;
if ($numSup>0) {
    echo "; ";
}
}