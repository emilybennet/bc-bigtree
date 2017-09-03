<?

    // DEAR FUTURE EMILY
    // XML being imported into InDesign needs to use decimal entities, not html entitles.
    // Also take care of yourself and remember to sleep.


  $filename = "conbook-schedule-".date('Ymd-His').".xml";
  // header('Content-Type: text/plain');
  header('Content-Type: application/xml');
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $Parsedown = new Parsedown();
  include 'convert-entities.php';

  $scheduleMod = new scheduledEvents(true);
  $events = $scheduleMod->getScheduleForConBook();

  $holdingArray = array();
  $currentEventTitle = "";

  function ampRemoval($text){
    return str_replace('&','&38;',$text);
  }

  function tweakLocName($text) {
      return str_replace(
          [
              'Harmony Plaza: Stomp Space',
              'Harmony Plaza: Neighborhood Stage'
          ],
          'Harmony Plaza',
          $text);
  }

  echo '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
  echo '<events>';


  foreach ($events as $e) {
    if ($holdingArray["event_name"] == $e['event_name']) {
      // then add schedule info to holding array
      $sched = array();
      $sched['start_time'] = $e['start_time'];
      $sched['end_time'] = $e['end_time'];
      $sched['location_name'] = $e['location_name'];
      array_push($holdingArray['schedule'], $sched);

      continue;
    } else {
      // if holding array is not empty
      // write out event in holding array
      if (!empty($holdingArray)) {
        echo '<event>';
        echo '<title>'.html_convert_entities( htmlentities($holdingArray['event_name']) ).'</title>'.PHP_EOL;

        echo '<schedule>';
        $lastItem = end($holdingArray['schedule']);
        foreach ($holdingArray['schedule'] as $s) {
          echo '<day>'.date('D', strtotime($s['start_time'])).'</day>, ';
          echo '<time>';
          echo '<start>'.date('g:ia', strtotime($s['start_time'])).'</start>&#x2013;';
          echo '<end>'.date('g:ia', strtotime($s['end_time'])).'</end> ';
          echo '</time>';
          echo '<location>'.html_convert_entities( htmlentities( tweakLocName($s['location_name']) )).'</location>';
          if ($lastItem == $s) {
            echo '</schedule>';
          }
          echo PHP_EOL;
        }

        // if ($holdingArray['track_name'] != "Activity") {
        //   echo '<track track_code="'.$holdingArray['track_code'].'">'.ampRemoval($holdingArray['track_name']).'</track>'.PHP_EOL;
        // }

        // echo '<desc>'.ampRemoval( $Parsedown->line($holdingArray['description']) ).'</desc>';
        echo '<desc>'. html_convert_entities( $Parsedown->line($holdingArray['description']) ).'</desc>';
        echo '</event>'.PHP_EOL;
      }

      // clear out holding array
      // inject current event's things in there
      $holdingArray = array();
      $holdingArray['event_name'] = $e['event_name'];
      $holdingArray['schedule'] = array();
      $holdingArray['track_name'] = $e['track_name'];
      $holdingArray['track_code'] = $e['track_code'];
      $holdingArray['description'] = $e['description'];

      $sched = array();
      $sched['start_time'] = $e['start_time'];
      $sched['end_time'] = $e['end_time'];
      $sched['location_name'] = $e['location_name'];
      array_push($holdingArray['schedule'], $sched);
    }


  }

  echo '</events>';
