<?
  // header('Content-type: application/json');
  header('Content-Type: application/excel');
  $filename = "schedule_guidebook_formatted-".date('Ymd-His').".csv";
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $scheduleMod = new scheduledEvents(true);
  $events = $scheduleMod->getScheduleForGuidebook2016();
  $Parsedown = new Parsedown();

  $gbDefaultHeaders = "Don't change any of these headers! ,Session Title,Date,Time Start,Time End,Room/Location,Schedule Track (Optional),Description (Optional)";


  $fp = fopen('php://output', 'w');

  fputcsv($fp, str_getcsv($gbDefaultHeaders));


  foreach ($events as $e) {
    $line = array();

    // keyword formatting
    if ($e['gb_tracks']) {
        $keywords = explode('; ', $e['gb_tracks']);
    }  else {
        $keywords = array();
    }

    if ($e['mature'] == 1) {
        array_push($keywords, '&Up (21+)');
    }
    if ($e['location_name'] == "Crusaders' Clubhouse") {
        array_push($keywords, 'Kids Only!');
    }

    $keywords = implode("; ", $keywords);


    // handle description
    $description = $e['description'];
    if ($e['fee']) {
        $description .= ' $'.$e['fee'].' entry fee.';
    }
    if ($e['space_limited'] == 1) {
        $description .= ' Spaced limited.';
    }

    // format harmony plaza names
    if ($e['location_name'] == "Harmony Plaza - Stabletop Games") {
        $loc = "Harmony Plaza: Stabletop Games";
    } elseif ($e['location_name'] == "Harmony Plaza - Stomp Space") {
        $loc = "Harmony Plaza: Stomp Space";
    } elseif ($e['location_name'] == "Harmony Plaza - Neighborhood Stage") {
        $loc = "Harmony Plaza: Neighborhood Stage";
    } else {
        $loc = $e['location_name'];
    }

    array_push($line, ""); // instructional column
    array_push($line, $e['event_name']); // session title
    array_push($line, date('n/j/y', strtotime($e['start_time']))); // date
    array_push($line, date('g:i A', strtotime($e['start_time']))); // time start
    array_push($line, date('g:i A', strtotime($e['end_time']))); // time end
    array_push($line, $loc); // room/location
    array_push($line, $keywords); // schedule track
    array_push($line, $Parsedown->text($description)); // description


    fputcsv($fp, $line);
  }

  fclose($fp);
