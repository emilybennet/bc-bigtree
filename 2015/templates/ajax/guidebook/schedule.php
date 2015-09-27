<?
  // header('Content-type: application/json');
  header('Content-Type: application/excel');
  $filename = "schedule_guidebook_formatted-".date('Ymd-His').".csv";
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $scheduleMod = new scheduledEvents(true);
  $events = $scheduleMod->getScheduleForConBook();

  $gbDefaultHeaders = "Don't change any of these headers! ,Session Title,Date,Time Start,Time End,Room/Location,Schedule Track (Optional),Description (Optional)";
  

  $fp = fopen('php://output', 'w');

  fputcsv($fp, str_getcsv($gbDefaultHeaders));


  foreach ($events as $e) {
    $line = array();

    array_push($line, ""); // instructional column
    array_push($line, $e['event_name']); // session title
    array_push($line, date('n/j/y', strtotime($e['start_time']))); // date
    array_push($line, date('g:i: A', strtotime($e['start_time']))); // time start
    array_push($line, date('g:i: A', strtotime($e['end_time']))); // time end
    array_push($line, $e['location_name']); // room/location
    array_push($line, $e['track_name']); // schedule track
    array_push($line, $e['description']); // description


    fputcsv($fp, $line);
  }

  fclose($fp);