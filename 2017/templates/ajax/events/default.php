<?

header('Content-type: application/json');

$scheduleMod = new scheduledEvents(true);
$events = $scheduleMod->getScheduleForGuidebook2016();
$ev = array();

foreach ($events as $e) {

    // keywords
    if ($e['gb_tracks']) {
        $keywords = explode('; ', $e['gb_tracks']);
    } else {
        $keywords = array();
    }

    if ($e['mature'] == 1) {
        array_push($keywords, '&Up (21+)');
    }
    if ($e['location_name'] == "Crusaders' Clubhouse") {
        array_push($keywords, 'Kids Only!');
    }

    sort($keywords);

    $item['event_name'] = $e['event_name'];
    $item['description'] = $e['description'];
    $item['start_time'] = $e['start_time'];
    $item['end_time'] = $e['end_time'];
    $item['location'] = $e['location_name'];
    $item['mature'] = ($e['mature']) ? true : false;
    $item['space_limited'] = ($e['space_limited']) ? true : false;
    $item['fee'] = ($e['fee']) ? $e['fee'] : false;
    $item['keywords'] = $keywords;

    array_push($ev, $item);
}

echo json_encode($ev);
