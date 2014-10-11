<?
	class bcVenues extends CityGuide {

		var $Table = "bc_venue";
		var $Module = "9";

    public function __construct($debug = false) {
      global $cms;
      
      $this->maxCacheAge = 60 * 60; // one hour
      $this->cache_prefix = "venues_";

      $this->markerColor = '#57338D';
      $this->featuredMarkerColor = '#F68B22';
      $this->expiredMarkerColor = '#A5A5A5';

      $this->featuredMarkerSize = 'large';

      $this->hotelCacheFile = 'hotels.geojson';
      
      parent::__construct($debug);
    }



    /*
      Function venueToGEOJSON
        Formats a messy array from the db into something nice for MapBox.

      Parameters
        venue - a single array of a venue from the db.

      Returns
        An array that will nicely play with MapBox.
     */

    public function venueToGEOJSON($venue) {
      $return = array();

      $return['type'] = 'Feature';
      $return['geometry']['type'] = "Point";
      $return['geometry']['coordinates'] = array($venue['longitude'],$venue['latitude']);

      $return['properties']['id'] = $venue['id'];
      $return['properties']['title'] = $venue['name'];
      $return['properties']['category'] = $venue['category_name'];

      $return['properties']['contact']['website'] = $venue['contact_website'];
      $return['properties']['contact']['tel'] = $venue['contact_tel'];
      $return['properties']['contact']['fax'] = $venue['fax'];

      $return['properties']['location']['address'] = $venue['location_address'];
      $return['properties']['location']['postal_code'] = $venue['location_postal_code'];
      $return['properties']['location']['city'] = $venue['city_name'];
      $return['properties']['location']['state'] = $venue['state_name'];
      $return['properties']['location']['country'] = $venue['country_name'];
      $return['properties']['location']['celestial_object'] = $venue['celestial_object'];

      $return['properties']['price']['type'] = $venue['price_type'];
      $return['properties']['price']['value'] = $venue['price_value'];
      $return['properties']['price']['promo_code'] = $venue['promo_code'];
      $return['properties']['price']['promo_website'] = $venue['promo_website'];
      $return['properties']['price']['promo_comment'] = $venue['promo_comment'];
      $return['properties']['price']['promo_expired'] = $venue['promo_expired'];

      $return['properties']['rating'] = $venue['rating'];
      $return['properties']['distance'] = $venue['distance_from_center'];

      $return['properties']['meta']['approved'] = $venue['approved'];
      $return['properties']['meta']['featured'] = $venue['featured'];
      $return['properties']['meta']['created'] = $venue['created_at'];
      $return['properties']['meta']['modified'] = $venue['modified_at'];

      if ($venue['featured']) {
        $return['properties']['marker-color'] = $this->featuredMarkerColor;
        $return['properties']['marker-size'] = $this->featuredMarkerSize;
      } else {
        $return['properties']['marker-color'] = $this->markerColor;
      }

      if ($venue['promo_expired']) {
        $return['properties']['marker-color'] = $this->expiredMarkerColor;
      }

      $return['properties']['marker-symbol'] = $venue['category_icon'];

      return $return;
    }



    /*
      Function: getVenues
        The work horse to get venues from the db.

      Parameters:
        sortby - how the data should be sorted.
        limit - how many should we get?
        where - how should we restrict the query?

      Returns:
        An array of locations ready to be converted to JSON for MapBox.
     */

    public function getVenues($sortby = false,$limit = false,$where = false){
      $query = "SELECT `ve`.`id`, `ve`.`name`, `cat`.`category_name`, `cat`.`category_icon`, `ve`.`location_address`, `ve`.`location_postal_code`, `city`.`city_name`, `st`.`state_name`, `co`.`country_name`, `ce`.`celestial_object`, `ve`.`latitude`, `ve`.`longitude`, `ve`.`distance_from_center`, `ve`.`contact_website`, `ve`.`contact_tel`, `ve`.`contact_fax`, `pt`.`price_type`, `ve`.`price_value`, `ve`.`promo_code`, `ve`.`promo_website`, `ve`.`promo_comment`, `ve`.`promo_expired`, `ve`.`rating`, `ve`.`featured`, `ve`.`approved`, `ve`.`created_at`, `ve`.`modified_at`
        FROM `bc_venue` `ve`, `bc_venue_category` `cat`, `bc_venue_city` `city`, `bc_venue_location_state` `st`, `bc_venue_location_country` `co`, `bc_venue_location_celestial_object` `ce`, `bc_venue_price_type` `pt`
        WHERE `ve`.`category_id` = `cat`.`id`
          AND `ve`.`location_city_id` = `city`.`id`
          AND `ve`.`location_state_id` = `st`.`id`
          AND `ve`.`location_country_id` = `co`.`id`
          AND `ve`.`location_celestial_object_id` = `ce`.`id`
          AND `ve`.`price_type_id` = `pt`.`id`";

      if ($where) {
        $query .= " AND $where";
      }
      
      if ($sortby) {
        $query .= " ORDER BY $sortby";
      }
      
      if ($limit) {
        $query .= " LIMIT $limit";
      }

      $items['type'] = 'FeatureCollection';
      $q = sqlquery($query);
      while ($f = sqlfetch($q)) {
        $items['features'][] = $this->venueToGEOJSON($this->get($f));
      }

      return $items;
    }



    /*
      Function: getHotels
        Returns an array of only hotel-type venues
     */
    
    public function getHotels() {
      global $cms;

      $cacheFile = $this->cache_base.$this->hotelCacheFile;
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        $result = $this->getVenues('ve.featured DESC, ve.promo_expired ASC, ve.distance_from_center ASC', false, "approved = 'on' AND ve.category_id = '1'");
        $result = json_encode($result);
        file_put_contents($cacheFile, $result);
        chmod($cacheFile, 0777);
      } else {
        $result = file_get_contents($cacheFile);
      }

      return $result;
    }

    /*
      Function: purgeHotelCache
        Purges the hotel JSON cache file.
     */
    
    public function purgeHotelCache() {
      if ($this->purgeCache($this->hotelCacheFile)) {
        return true;
      } else {
        return false;
      }
    }

	}
?>
