<?

// header('Content-type: application/json');
header('Content-Type: text/plain');
header('Access-Control-Allow-Origin: *');

$hoursMod = new bcAutographHours();
$settingsMod = new bcAutographSettings();

$output = [];
$output['guests'] = [];
$output['settings'] = [];

$hours = $hoursMod->getAll('name ASC');
$settings = $settingsMod->getAll('key_id ASC');

// process hours
foreach ($hours as $g) {
    $temp = [];
    $temp['name'] = $g['name'];
    $temp['price']['autograph'] = ($g['price_autograph'] == '') ? null : $g['price_autograph'];
    $temp['price']['photo'] = ($g['price_photo'] == '') ? null : $g['price_photo'];
    $temp['price']['combo'] = ($g['price_combo'] == '') ? null : $g['price_combo'];
    $temp['inSession'] = ($g['in_session'] == '1') ? true : false;
    $temp['coreHours']['friday'] = ($g['hours_friday']) ? $g['hours_friday'] : null;
    $temp['coreHours']['saturday'] = ($g['hours_saturday']) ? $g['hours_saturday'] : null;
    $temp['coreHours']['sunday'] = ($g['hours_sunday']) ? $g['hours_sunday'] : null;
    array_push($output['guests'], $temp);
}

// process settings
foreach ($settings as $s) {
    $output['settings'][$s['key_id']] = ($s['value']) ? $s['value'] : false;
}




// var_dump($settings);
echo json_encode($output);
