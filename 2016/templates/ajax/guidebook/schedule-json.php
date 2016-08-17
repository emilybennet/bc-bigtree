<?
  header('Content-type: application/json');

  $scheduleMod = new scheduledEvents(true);
  $events = $scheduleMod->getFridaySchedule();

  $output = array();

  foreach ($events as $e) {

    $eventDay = date('n/j/y', strtotime($e['start_time']));

    if ($eventDay != '8/7/15') {
      continue;
    }

    $line = array();

    $line['name'] =  $e['event_name'];
    $line['date'] = $eventDay;
    $line['date'] = date('n/j/y', strtotime($e['start_time']));
    $line['startTime'] = date('g:i A', strtotime($e['start_time']));
    $line['endTime'] = date('g:i A', strtotime($e['end_time']));
    $line['location'] = $e['location_name'];
    $line['track'] = $e['track_name'];
    $line['trackColor'] = $e['track_color'];

    array_push($output, $line);
  }

  echo json_encode($output);
