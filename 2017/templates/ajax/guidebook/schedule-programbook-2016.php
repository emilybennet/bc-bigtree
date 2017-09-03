<?

  // this 
  // is
  // the
  // proper
  // output!!


  // header('Content-type: application/json');
  header('Content-Type: application/excel');
  // header('Content-Type: text/plain');
  $filename = "schedule_programbook_formatted-".date('Ymd-His').".csv";
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $scheduleMod = new scheduledEvents(true);
  $events = $scheduleMod->getScheduleForConBook2016();


  $fp = fopen('php://output', 'w');

  fputcsv($fp, str_getcsv($gbDefaultHeaders));


  foreach ($events as $e) {
    $line = array();

    // format keywords
    $keywords = array();
    if ($e['mature'] == 1) {
        array_push($keywords, '&Up (21+)');
    }
    if ($e['fee']) {
        array_push($keywords, '$'.$e['fee'].' Entry');
    }
    if ($e['space_limited'] == 1) {
        array_push($keywords, 'Limited Space');
    }
    if ($e['location_name'] == "Crusaders' Clubhouse") {
        array_push($keywords, 'Kids Only!');
    }
    $keywords = implode(", ", $keywords);

    array_push($line, $e['event_name']); // session title
    array_push($line, date('n/j/y', strtotime($e['start_time']))); // date
    array_push($line, date('g:i A', strtotime($e['start_time']))); // time start
    array_push($line, date('g:i A', strtotime($e['end_time']))); // time end
    array_push($line, $e['location_name']); // room/location
    array_push($line, $keywords); // keywords
    array_push($line, $e['description']); // description


    fputcsv($fp, $line);
  }

  fclose($fp);

  //
  // ["event_name"]=>
  //  string(57) ""Phoebe and her Unicorn" Reading with Tabitha St. Germain"
  //  ["description"]=>
  //  string(149) "Twilight Sparkle isn't the only unicorn in town anymore! Come enjoy the story of Phoebe and her Unicorn, read by none other than Tabitha St. Germain."
  //  ["start_time"]=>
  //  string(19) "2016-07-09 15:00:00"
  //  ["end_time"]=>
  //  string(19) "2016-07-09 16:00:00"
  //  ["location_name"]=>
  //  string(20) "Crusaders' Clubhouse"
  //  ["mature"]=>
  //  string(1) "0"
  //  ["fee"]=>
  //  NULL
  //  ["gb_tracks"]=>
  //  string(10) "VIP; Panel"
