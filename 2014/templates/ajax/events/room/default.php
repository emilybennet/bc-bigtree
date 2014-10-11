<?

  $scheduleMod = new scheduledEvents();
  $locations = $scheduleMod->getLocations();
  $eCount = 0;

  foreach ($locations as $l) {

    echo "<h1 style='border-top:1px solid #cdcdcd;padding-top:30px;margin-top:30px;'>".$l["location_name"]."</h1>";
    $events = $scheduleMod->getScheduleByLocation($l["id"]);
    $currentDay = "";
    foreach ($events as $e) {
      $eventDay = date("l, M. j", strtotime($e["start_time"]));
      $eventTime = date("g:ia", strtotime($e["start_time"]));

      if ($currentDay != $eventDay) {
        echo "<h2>".$eventDay."</h2>";
        $currentDay = $eventDay;
      }

      echo "<li style=\"list-style:none\">".$eventTime." &bull; ".$e["event_name"]."</li>";
      $eCount++;
    }


  }

  echo "<footer style='display:block;padding:3px;margin-top:20px;border:1px solid black;border-radius:3px;'>Total Events: $eCount</footer>";