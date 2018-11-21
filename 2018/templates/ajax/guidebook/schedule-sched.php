<?
  // header('Content-type: application/json');
  header('Content-Type: application/excel');
  $filename = "schedule_guidebook_formatted-".date('Ymd-His').".csv";
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $scheduleMod = new scheduledEvents(true);
  $events = $scheduleMod->getScheduleForGuidebook2016();
  $Parsedown = new Parsedown();

  $gbDefaultHeaders = "id,Session Title,Published,Time Start,Time End,Type/Track,Sub-type,Capacity,Description (Optional),Guests,Moderators,Artists,Sponsors,Exhibitors,Venue,Physical Address";


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

    $keywords = implode(", ", $keywords);


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

    // determine physical address value
    if ($e['location_name'] == "Hall of Chaos") {
      $physicalAddress = "401 West Pratt Street, Baltimore, MD, 21201";
    } else {
      $physicalAddress = "1 W Pratt St, Baltimore, MD 21201";
    }

    array_push($line, $e['id']); // id
    array_push($line, $e['event_name']); // session title
    array_push($line, "Y"); // published?
    array_push($line, date('n/j/y g:i A', strtotime($e['start_time']))); // time start
    array_push($line, date('n/j/y g:i A', strtotime($e['end_time']))); // time end
    array_push($line, $keywords); // Type/Track
    array_push($line, ""); // Sub-type
    array_push($line, ""); // Capacity
    array_push($line, $Parsedown->text($description)); // description

    array_push($line, ""); // Guests
    array_push($line, ""); // Moderators
    array_push($line, ""); // Artists
    array_push($line, ""); // Sponsors
    array_push($line, ""); // Exhibitors

    array_push($line, $loc); // Venue
    array_push($line, $physicalAddress); // Physical Address



    fputcsv($fp, $line);
  }

  fclose($fp);
