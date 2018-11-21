<?

    $filename = "signs-schedule-".date('Ymd-His').".xml";
  // header('Content-Type: text/plain');
  header('Content-Type: application/xml');
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $scheduleMod = new scheduledEvents();
  $locations = $scheduleMod->getLocations();
  
  echo '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
  echo "<convention>";
  foreach ($locations as $l) {
    $cleanLocName = str_replace(array("&amp;", "&"), array("&", "&amp;"), $l["location_name"]);
    echo "<location>";
    echo "<name>".$cleanLocName."</name>".PHP_EOL;
    $events = $scheduleMod->getScheduleByLocation($l["id"]);
    $currentDay = "";
    echo "<schedule>";
    foreach ($events as $e) {

      $eventDay = date("l, M. j", strtotime($e["start_time"]));
      $eventTime = date("g:ia", strtotime($e["start_time"]));
      $eventStartHour = date("H", strtotime($e["start_time"]));

      if ($eventStartHour > 3 && $currentDay != $eventDay) {
        if ($currentDay != "") {
          echo "</events>";
          echo "</day>";
        }
        echo "<day>";
        echo "<dayname>".$eventDay."</dayname>".PHP_EOL;
        echo "<events>";
        $currentDay = $eventDay;
      }

      $cleanEventName = str_replace(array("&amp;", "&"), array("&", "&amp;"), $e["event_name"]);
      echo "<event>".$eventTime." \t".$cleanEventName."</event>".PHP_EOL;
      // echo "            <event>";
      // echo "              <time>".$eventTime."</time>";
      // echo "              <name>".$cleanEventName."</name>";
      // echo "            </event>";      

    }

    if ($events){
      echo "</events>";
      echo "</day>";
    }
    echo "</schedule>";
    echo "</location>";

  }

  echo "</convention>";