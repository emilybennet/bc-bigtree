<?
    class scheduledEvents extends BTXCacheableModule {

        var $Table = "bc_events";
        var $Module = "30";

    public function __construct($debug = false) {
      global $cms;

      $this->maxCacheAge = 60*60; // one hour
      $this->cache_prefix = "";

      $this->friday = strtotime("2018-07-27 00:00:00");
      $this->saturday = $this->friday+86400;
      $this->sunday = $this->saturday+86400;

      parent::__construct($debug);
    }



    public function getLocations() {
      $q = sqlquery("SELECT * FROM `bc_events_locations`");
      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }
      return $items;
    }


    /*
      Function: getSchedule
        Used to get the schedule for the agenda view.
    */
    public function getSchedule() {
      global $cms;

      $cacheFile = $this->cache_base.'event-schedule.btc';
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        $events = $this->scheduleQuery();
        $autographs = $this->autographsQuery();

        if ($autographs) {
            $result = $this->mergeAgendaSchedules($events, $autographs);
        } else {
            $result = $events;
        }

        file_put_contents($cacheFile, json_encode($result));
        chmod($cacheFile, 0777);
      } else {
        $result = json_decode(file_get_contents($cacheFile), true);
      }

      return $result;
    }


    /*
      Function getScheduleByLocation
        Used to return events per room, ultimately used to build XML for room signs.
     */

    public function getScheduleByLocation($locationId) {
      $q = sqlquery("SELECT `ev`.`event_name`, `ev`.`description`, `ev`.`start_time`, `ev`.`end_time`, `et`.`track_name`
        FROM `bc_events` `ev`, `bc_events_tracks` `et`
        WHERE `ev`.`track_id` = `et`.`id`
        AND `ev`.`location_id` = '".sqlescape($locationId)."'
        ORDER BY `ev`.`start_time` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }

      return $items;
    }



    /*
      Function: purgeEventsCache
        Purges the vendor JSON cache file.
     */

    public function purgeEventsCache($fileName) {
      if ($fileName && $this->purgeCache($fileName)) {
        return true;
      } else {
        return false;
      }
    }


    /*
      Function: scheduleQuery
        Queries DB for events, structured for Agenda view.
     */

    private function scheduleQuery() {
      $q = sqlquery("SELECT `ev`.`event_name`, `ev`.`description`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `el`.`short_code`, `el`.`color_code`, `et`.`track_name`, `ev`.`gb_tracks`, `ev`.`fee`, `ev`.`mature`, `ev`.`space_limited`
        FROM `bc_events` `ev`, `bc_events_locations` `el`, `bc_events_tracks` `et`
        WHERE `ev`.`location_id` = `el`.`id`
        AND `ev`.`track_id` = `et`.`id`
        ORDER BY `ev`.`start_time` ASC");

      $items = array();

      while ($f = sqlfetch($q)) {
        if (strtotime($f["start_time"]) >= $this->sunday) {
          $items["sunday"][] = $f;
        } elseif (strtotime($f["start_time"]) >= $this->saturday) {
          $items["saturday"][] = $f;
        } else {
          $items["friday"][] = $f;
        }
      }
      return $items;
    }


    /*
      Function: autographsQuery
        Queries DB for autographs, structured for Agenda view.
     */
    private function autographsQuery() {
      $q = sqlquery("SELECT `ga`.`start_time`, `ga`.`end_time`, GROUP_CONCAT(`gu`.`name_short` ORDER BY `gu`.`name_short` ASC SEPARATOR ', ') as `event_name`, `lo`.`location_name`, `lo`.`short_code`, `lo`.`color_code`, 'Autographs' as `track_name`
        FROM `bc_guest_autographs` `ga`, `bc_guests` `gu`, `bc_events_locations` `lo`
        WHERE `ga`.`guest_id` = `gu`.`id`
        AND `ga`.`location_id` = `lo`.`id`
        GROUP BY `ga`.`con_day_id`, `ga`.`start_time`, `ga`.`end_time`
        ORDER BY `ga`.`start_time` ASC, `ga`.`end_time` ASC");

      $items = array();
      $initId = time();
      while ($f = sqlfetch($q)) {
        $f['id'] = $initId;
        $f['description'] = '';

        if (strtotime($f["start_time"]) >= $this->sunday) {
          $items["sunday"][] = $f;
        } elseif (strtotime($f["start_time"]) >= $this->saturday) {
          $items["saturday"][] = $f;
        } else {
          $items["friday"][] = $f;
        }

        $initId++;
      }

      return $items;
    }


    /*
      Function: mergeAgendaSchedules
        Takes the agenda and autographs agenda-formatted query results, combines them!
      Parameters:
        $events - array of convention days with events
        $autographs - array of convention days with grouped autograph times.
      Returns: Array
     */
    private function mergeAgendaSchedules($events, $autographs) {
      $result = array(
          'friday' => array(),
          'saturday' => array(),
          'sunday' => array(),
        );

      function combineAndSort($dayEvents) {
        $order = array();
        foreach ($dayEvents as $key => $value) {
          $order[$key] = strtotime($value['start_time']);
        }
        array_multisort($order, SORT_ASC, $dayEvents);
        return $dayEvents;
      }

      // do Friday
      $result['friday'] = array_merge($events['friday'], $autographs['friday']);
      $result['friday'] = combineAndSort($result['friday']);

      // do Saturday
      $result['saturday'] = array_merge($events['saturday'], $autographs['saturday']);
      $result['saturday'] = combineAndSort($result['saturday']);

      // do Sunday
      $result['sunday'] = array_merge($events['sunday'], $autographs['sunday']);
      $result['sunday'] = combineAndSort($result['sunday']);

      return $result;
    }


    /*
      Function: getConDays
        Used by getCalendarSchedule() to assemble mega object for calendar.
     */
    private function getConDays() {
      $q = sqlquery("SELECT * FROM `bc_event_days` WHERE `day` is not null ORDER BY `day` asc;");

      $items = array();
      while ($f = sqlfetch($q)) {
        $day = $f['id'];
        $items[$day] = $f;
      }

      return $items;
    }


    /*
      Function: getEventLocations
        Used by getCalendarSchedule() to assemble mega object for calendar.
     */
    private function getEventLocations() {
      $q = sqlquery("SELECT *
        FROM `bc_events_locations`
        WHERE `hidden` = 0
        ORDER BY `position` asc;");

      $items = array();
      while ($f = sqlfetch($q)) {
        $f['events'] = array();
        $loc = $f['id'];
        $items['locid'.$loc] = $f;
      }

      return $items;
    }



    /*
      Function: getEventsForCalendar
        Used by getCalendarSchedule() to assemble mega object for calendar.
     */
    private function getEventsForCalendar() {
      $q = sqlquery("SELECT `ev`.`id`, `ev`.`event_name`, `ev`.`description`, `ev`.`con_day`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `el`.`id` as `location_id`, `et`.`track_name`, `et`.`track_color`, `ev`.`gb_tracks`, `ev`.`fee`, `ev`.`mature`, `ev`.`space_limited`
        FROM `bc_events` `ev`, `bc_events_locations` `el`, `bc_events_tracks` `et`
        WHERE `ev`.`location_id` = `el`.`id`
        AND `ev`.`track_id` = `et`.`id`
        AND `ev`.`con_day` != 4
        ORDER BY `ev`.`start_time` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $f['leftIndex'] = -1;
        $f['numColumns'] = '';
        $eId = $f['id'];
        $items['eid'.$eId] = $f;
      }

      return $items;
    }


    /*
      Function: getAutographsForCalendar
        Used by getCalendarSchedule() to assemble the mega object for calendar view.
     */
    private function getAutographsForCalendar() {
      $q = sqlquery("SELECT `ga`.`con_day_id` as `con_day`, `ga`.`start_time`, `ga`.`end_time`, GROUP_CONCAT(`gu`.`name_short` ORDER BY `gu`.`name_short` ASC SEPARATOR ', ') as `event_name`, `lo`.`location_name`, `ga`.`location_id`, 'Autographs' as `track_name`
        FROM `bc_guest_autographs` `ga`, `bc_guests` `gu`, `bc_events_locations` `lo`
        WHERE `ga`.`guest_id` = `gu`.`id`
        AND `ga`.`location_id` = `lo`.`id`
        GROUP BY `ga`.`con_day_id`, `ga`.`start_time`, `ga`.`end_time`
        ORDER BY `ga`.`start_time` ASC, `ga`.`end_time` ASC");

      $items = array();
      $initId = time();
      while ($f = sqlfetch($q)) {
        $f['id'] = $initId;
        $f['description'] = '';
        $f['leftIndex'] = -1;
        $f['numColumns'] = '';
        $eId = $f['id'];
        $items['eid'.$eId] = $f;

        $initId++;
      }

      return $items;
    }


    /*
      Function: getEventsCalendar
        Gets the cached calendar object data
     */

    public function getEventsCalendar() {
      global $cms;

      $cacheFile = $this->cache_base.'event-schedule-calendar.btc';
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        $result = $this->getCalendarSchedule();
        file_put_contents($cacheFile, json_encode($result));
        chmod($cacheFile, 0777);
      } else {
        $result = json_decode(file_get_contents($cacheFile), true);
      }

      return $result;
    }



    /*
      Function: getCalendarSchedule()
        Actually goes and constructs the data model for the calendar schedule.
     */

    private function getCalendarSchedule() {
      // TODO: What do we do about event collision detection??

      $conDays = $this->getConDays();
      $eventLocs = $this->getEventLocations();
      $events = $this->getEventsForCalendar();
      $autographs = $this->getAutographsForCalendar();
      $uberObject = array();

      foreach ($conDays as $i => $d) {

        // figure out time scale
        // time scale represents % of 1 hour of programing
        $dayBegins = strtotime($d['day_begins']);
        $dayEnds = strtotime($d['day_ends']);
        $d['totalHours'] = ($dayEnds-$dayBegins)/3600;
        $d['timeScale'] = 100/$d['totalHours'];

        $d['locations'] = $eventLocs;
        $id = $d['id'];
        $uberObject['cdid'.$id] = $d;
      }

      foreach ($events as $eId => $e) {
        $condayId = $e['con_day'];
        $conDayObject = $uberObject['cdid'.$condayId];

        $dayBegins = strtotime($conDayObject['day_begins']);
        $dayEnds = strtotime($conDayObject['day_ends']);

        $eventStart = strtotime($e['start_time']);
        $eventEnd = strtotime($e['end_time']);
        $eventLength = ($eventEnd-$eventStart)/3600;

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

        $e['percentFromTop'] = (($eventStart-$dayBegins)/3600)*$conDayObject['timeScale'];
        $e['eventBlockHeight'] = $eventLength*$conDayObject['timeScale'];

        $condayId = $e['con_day'];
        $locId = $e['location_id'];
        // $ez = array($eId => $e);
        // array_push($uberObject['cdid'.$condayId]['locations']['locid'.$locId]['events'], $e);
        $uberObject['cdid'.$condayId]['locations']['locid'.$locId]['events']['edid'.$e['id']] = $e;
      }

      foreach ($autographs as $eId => $e) {
        $condayId = $e['con_day'];
        $conDayObject = $uberObject['cdid'.$condayId];

        $dayBegins = strtotime($conDayObject['day_begins']);
        $dayEnds = strtotime($conDayObject['day_ends']);

        $eventStart = strtotime($e['start_time']);
        $eventEnd = strtotime($e['end_time']);
        $eventLength = ($eventEnd-$eventStart)/3600;

        $e['percentFromTop'] = (($eventStart-$dayBegins)/3600)*$conDayObject['timeScale'];
        $e['eventBlockHeight'] = $eventLength*$conDayObject['timeScale'];

        $condayId = $e['con_day'];
        $locId = $e['location_id'];
        $uberObject['cdid'.$condayId]['locations']['locid'.$locId]['events']['edid'.$e['id']] = $e;

      }



      $uberObject = $this->eventCollisionDetection($uberObject);
      // echo '<textarea>'.json_encode($uberObject).'</textarea>'; exit;

      return $uberObject;

    }

    /*
      Function: calendarIsFreeSpace
        Used by eventCollisionDetection() to quickly riffle through events for leftIndex.

     */

    private function calendarIsFreeSpace($allEventRef, $ts, $leftIndex, $eventId) {
      foreach ($ts as $eId) {
        $currentEvent = $allEventRef[$eId];
        if ($currentEvent['leftIndex'] == $leftIndex) {
          if ($currentEvent['id'] != $eventId) {
            return false; // leftIndex taken
          } else {
            return true; // / this event is in this place
          }
        }
      }
      return true;
    }


    /*
      Function: eventCollisionDetection
        Used by getCalendarSchedule() to assemble mega object for calendar.
        Checks each event, determines if it overlaps with another in the same day=>room.
        If it does, set some properties for width and sorting.
     */

    private function eventCollisionDetection($uberObject) {
      $uberObjectReturn = $uberObject;

      foreach ($uberObject as $conDay) {
        foreach ($conDay['locations'] as $loc) {
          $currentConDay = $conDay['id'];
          $currentLoc = $loc['id'];
          $conDayStart = strtotime($conDay['day_begins']);
          $conDayEnd = strtotime($conDay['day_ends']);

          // setup ts
          $ts = array();

          // inject minute slots
          for ($i=0; $i < $conDay['totalHours']*60; $i++) {
            array_push($ts, array());
          }

          // now go through the events in the room
          // shove them into the ts array
          foreach ($loc['events'] as $eId => $e) {

            $eventStart = strtotime($e['start_time']);
            $eventEnd = strtotime($e['end_time']);

            $evStartMin = ($eventStart - $conDayStart)/60;
            $evEndMin = (($eventEnd - $eventStart)/60) + $evStartMin;

            for ($m=$evStartMin; $m < $evEndMin; $m++) {
              array_push($ts[$m], $eId);
            }
          }

          // check each timeslot
          // ... and each event in a timeslot
          // set numColumns and leftIndex

          foreach ($ts as $slot) {
            $eventsInSlot = count($slot);
            foreach ($slot as $e) {
              $currentEvent = $uberObjectReturn['cdid'.$currentConDay]['locations']['locid'.$currentLoc]['events'][$e];

              if ($currentEvent['numColumns'] > $eventsInSlot) {
                $uberObjectReturn['cdid'.$currentConDay]['locations']['locid'.$currentLoc]['events'][$e]['numColumns'] = $currentEvent['numColumns'];
              } else {
                $uberObjectReturn['cdid'.$currentConDay]['locations']['locid'.$currentLoc]['events'][$e]['numColumns'] = $eventsInSlot;
              }

              if ($currentEvent['leftIndex'] == "-1") {
                $leftIndex = 0;
                $allEventRef = $uberObjectReturn['cdid'.$currentConDay]['locations']['locid'.$currentLoc]['events'];
                while (!$this->calendarIsFreeSpace($allEventRef, $slot, $leftIndex, $e)) {
                  $leftIndex++;
                }
                $uberObjectReturn['cdid'.$currentConDay]['locations']['locid'.$currentLoc]['events'][$e]['leftIndex'] = $leftIndex;
              }
            }
          }
        }
      }
      return $uberObjectReturn;
    }


    /*
      Function: getScheduleForConBook
        Gets a nice array we can use to output xml for the conbook.
     */

    public function getScheduleForConBook() {
      $q = sqlquery("SELECT `ev`.`event_name`, `ev`.`description`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `et`.`track_name`, `et`.`track_code`
        FROM `bc_events` `ev`, `bc_events_locations` `el`, `bc_events_tracks` `et`
        WHERE `ev`.`location_id` = `el`.`id`
        AND `ev`.`track_id` = `et`.`id`
        ORDER BY `ev`.`event_name` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }

      return $items;
    }

    /*
      Function: getScheduleForConBook2016
        Gets a nice array we can use to output xml for the conbook.
     */

    public function getScheduleForConBook2016() {
      $q = sqlquery("SELECT `ev`.`id`,  `ev`.`event_name`, `ev`.`description`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `ev`.`mature`, `ev`.`fee`, `ev`.`space_limited`, `ev`.`gb_tracks`
        FROM `bc_events` `ev`, `bc_events_locations` `el`
        WHERE `ev`.`location_id` = `el`.`id`
        AND `ev`.`location_id` != 5
        ORDER BY TRIM(BOTH '\"' FROM `ev`.`event_name`) ASC, `ev`.`start_time` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }

      return $items;
    }


    /*
      Function: getScheduleForConBook2016
        Gets a nice array we can use to output xml for the conbook.
     */

    public function getScheduleForGuidebook2016() {
      $q = sqlquery("SELECT `ev`.`id`, `ev`.`event_name`, `ev`.`description`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `ev`.`mature`, `ev`.`fee`, `ev`.`space_limited`, `ev`.`gb_tracks`
        FROM `bc_events` `ev`, `bc_events_locations` `el`
        WHERE `ev`.`location_id` = `el`.`id`
        ORDER BY TRIM(BOTH '\"' FROM `ev`.`event_name`) ASC, `ev`.`start_time` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }

      return $items;
    }


        /*
            Function: getFridaySchedule
                A demo written for an info display.
        */
        public function getFridaySchedule() {
            $q = sqlquery("SELECT `ev`.`event_name`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `et`.`track_name`, `et`.`track_color`
        FROM `bc_events` `ev`, `bc_events_locations` `el`, `bc_events_tracks` `et`
        WHERE `ev`.`location_id` = `el`.`id`
        AND `ev`.`track_id` = `et`.`id`
        ORDER BY `ev`.`start_time` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $f;
      }

      return $items;
        }


    }
?>
