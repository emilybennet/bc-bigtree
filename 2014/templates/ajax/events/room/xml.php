<?
  header('Content-type: text/xml');

  $scheduleMod = new scheduledEvents();
  $locations = $scheduleMod->getLocations();
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>".PHP_EOL;
  echo "<convention>".PHP_EOL;
  foreach ($locations as $l) {
    $cleanLocName = str_replace(array("&amp;", "&"), array("&", "&amp;"), $l["location_name"]);
    echo "  <location>".PHP_EOL;
    echo "    <name>".$cleanLocName."</name>".PHP_EOL;
    $events = $scheduleMod->getScheduleByLocation($l["id"]);
    $currentDay = "";
    echo "      <schedule>".PHP_EOL;
    foreach ($events as $e) {

      $eventDay = date("l, M. j", strtotime($e["start_time"]));
      $eventTime = date("g:ia", strtotime($e["start_time"]));

      if ($currentDay != $eventDay) {
        if ($currentDay != "") {
          echo "          </events>".PHP_EOL;
          echo "        </day>".PHP_EOL;
        }
        echo "        <day>".PHP_EOL;
        echo "          <dayname>".$eventDay."</dayname>".PHP_EOL;
        echo "          <events>".PHP_EOL;
        $currentDay = $eventDay;
      }

      $cleanEventName = str_replace(array("&amp;", "&"), array("&", "&amp;"), $e["event_name"]);
      echo "            <event>".$eventTime." &#8226; ".$cleanEventName."</event>".PHP_EOL;

    }

    if ($events){
      echo "          </events>".PHP_EOL;
      echo "        </day>".PHP_EOL;
    }
    echo "      </schedule>".PHP_EOL;
    echo "  </location>".PHP_EOL;

  }

  echo "</convention>";