<?
  /*
    Class: CityGuide
      Cachable Module for data relating to city guide. 
  */
  
  class CityGuide extends BigTreeModule {
    
    var $version = "0.1";
    var $curl_options = array();



    /*
      Constructor
        Setting $debug to true forces through cache.
    */

    public function __construct($debug = false) {
      $this->debug = $debug;
      $this->cache_root = SERVER_ROOT . "cache/city-guide/";
      $this->cache_base = $this->cache_root . $this->cache_prefix;
      
      $this->earth_radius_meters = 6371000;
      $this->earth_radius_miles = 3961.3;
      $this->center_lat = 39.285789;
      $this->center_lng = -76.618563;
      
      if (!is_dir($this->cache_root)) {
        mkdir($this->cache_root);
        chmod($this->cache_root,0777);
      }
    }


    
    /*
      Function: cacheAge
        Return cache filetime; "0" if file does not exist
    */

    public function cacheAge($file) {
      return file_exists($file) ? filemtime($file) : 0;
    }




    /*
      Function: distanceBetweenPoints
        Using the Haversine formula, how far are these two places?

      Parameters:
        latFrom - location 1, latitude.
        lngFrom - location 1, longitude.
        latTo - location 2, latitude.
        lngTo - location 2, longitude.
        units - one of: "meters" or "miles". defaults miles.

      Returns:
        A float of the Distance between the points.
     */

    function distanceBetweenPoints($latFrom, $lngFrom, $latTo, $lngTo, $units = "miles") {

      // units
      if ($units == 'miles') {
        $earthRadius = $this->earth_radius_miles;
      } elseif ($units == 'meters') {
        $earthRadius = $this->earth_radius_meters;
      } else {
        return false;
      }

      // convert from degrees to radians
      $latFrom = deg2rad($latFrom);
      $lonFrom = deg2rad($lngFrom);
      $latTo = deg2rad($latTo);
      $lonTo = deg2rad($lngTo);

      $latDelta = $latTo - $latFrom;
      $lonDelta = $lonTo - $lonFrom;

      $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
      return $angle * $earthRadius;
    }




    /*
      Function: fetch
        Overwrites BigTreeModule fetch function to ignore soft-deleted things.
     */
    
    protected function fetch($sortby = false,$limit = false,$where = false) {
      $query = "SELECT * FROM `".$this->Table."` WHERE `deleted` != 1";

      if ($where) {
        $query .= " AND $where";
      }
      
      if ($sortby) {
        $query .= " ORDER BY $sortby";
      }
      
      if ($limit) {
        $query .= " LIMIT $limit";
      }
      
      $items = array();
      $q = sqlquery($query);
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      
      return $items;
    }    



    /*
      Function: delete
        Overwrites BigTreeModule delete function for soft-deletion.

      Parameters:
        item - The id of the entry to delete or the entry itself.
     */
    
    public function delete($item) {
      if (is_array($item)) {
        $item = $item["id"];
      }
      $item = sqlescape($item);
      sqlquery("UPDATE `".$this->Table."` SET `delete` = '1' WHERE id = '$item'");
      BigTreeAutoModule::uncacheItem($item,$this->Table);
    }



    /*
      Function: purgeCache
        Deletes the cached file.

      Parameters:
        file - the file name to purge.
     */
    
    protected function purgeCache($file) {
      $theFile = $this->cache_base.$file;

      if (file_exists($theFile)) {
        unlink($theFile);
        return true;
      } else {
        return false;
      }
    }





  }

?>