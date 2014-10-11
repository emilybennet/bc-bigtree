<?
	class scheduledEvents extends BTXCacheableModule {

		var $Table = "bc_events";
		var $Module = "30";

    public function __construct($debug = false) {
      global $cms;

      $this->maxCacheAge = 60*60; // one hour
      $this->cache_prefix = "";

      $this->friday = strtotime("2014-08-01 00:00:00");
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


    public function getSchedule() {
      global $cms;

      $cacheFile = $this->cache_base.'event-schedule.btc';
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        $result = $this->scheduleQuery();
        file_put_contents($cacheFile, json_encode($result));
        chmod($cacheFile, 0777);
      } else {
        $result = json_decode(file_get_contents($cacheFile), true);
      }

      return $result;
    }



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



    public function scheduleQuery() {
      $q = sqlquery("SELECT `ev`.`event_name`, `ev`.`description`, `ev`.`start_time`, `ev`.`end_time`, `el`.`location_name`, `el`.`short_code`, `el`.`color_code`, `et`.`track_name`
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
	}
?>
