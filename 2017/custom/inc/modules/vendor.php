<?
	class vendors extends BTXCacheableModule {

		var $Table = "bc_vendors";
		var $Module = "27";

    public function __construct($debug = false) {
      global $cms;

      $this->maxCacheAge = 60*60; // one hour
      $this->cache_prefix = "vendors/";

      parent::__construct($debug); 
    }



    // gets only the exhibitors in the table by name
    public function getExhibitorsByAlpha() {
      $q = "SELECT * FROM `bc_exhibitors` WHERE `is_artist_alley` = 0 ORDER BY `name` ASC";

      $result = array();
      $q = sqlquery($q);
      while ($f = sqlfetch($q)) {
        $result[] = $f;
      }

      return $result;
    }

    // gets only the exhibitors in the table by booth number
    public function getExhibitorsByBooth() {
      $q = "SELECT * FROM `bc_exhibitors` WHERE `is_artist_alley` = 0 ORDER BY `booth_number` ASC";

      $result = array();
      $q = sqlquery($q);
      while ($f = sqlfetch($q)) {
        $result[] = $f;
      }

      return $result;
    }

    // gets only the artists in the table by booth number
    public function getArtistAlley() {
      $q = "SELECT * FROM `bc_exhibitors` WHERE `is_artist_alley` = 1 ORDER BY cast(`name` as unsigned) ASC";

      $result = array();
      $q = sqlquery($q);
      while ($f = sqlfetch($q)) {
        $result[] = $f;
      }

      return $result;
    }


    /*
      Function: getVendors
        Let's get some people to sell merch!

      Parameters:
        vendorsBy - One of, `vendors`, `booth`, `category`, defaults to `vendors`

      Returns:
        Array of goodness.
     */

    public function getVendors($vendorsBy = 'vendors') {
      global $cms;

      $cacheFile = $this->cache_base.$cms->urlify($vendorsBy).'.btc';
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        if ($vendorsBy == 'vendors') {
          $result = $this->getVendorsByVendor();
        } elseif ($vendorsBy == 'booth') {
          $result = $this->getVendorsByBooth();
        } elseif ($vendorsBy == 'category'){
          $result = $this->getVendorBoothByCategory();
        } else {
          return false;
        }
        file_put_contents($cacheFile, json_encode($result));
        chmod($cacheFile, 0777);
      } else {
        $result = json_decode(file_get_contents($cacheFile), true);
      }

      return $result;
    }



    /*
      Function: getVendorBoothByCategory
        Gives us each booth number by category it's found in.

      Returns: array
     */
    
    private function getVendorBoothByCategory() {
      global $cms;

      $vendors = $this->getVendors("vendors");
      $result = array();

      foreach ($vendors as $v) {
        $categories = explode(",", $v["items"]);
        foreach ($categories as $c) {
          if ($c == "") {
            break;
          }
          $cat = $cms->urlify($c);
          $result[$cat][] = (int) $v["booth_number"];
        }
      }

      return $result;
    }



    /*
      Function: getVendorsByBooth
        Provides each vendor in an array by booth number.

      Returns: array
     */
    
    private function getVendorsByBooth() {
      $vendors = $this->getVendors("vendors");
      $result = array();

      foreach ($vendors as $v) {
        $booth = $v["booth_number"];
        $result[$booth][] = $v;
      }

      return $result;
    }



    /*
      Function: getVendorsByVendor
        Provides each vendor.

      Returns: array.
     */
    
    private function getVendorsByVendor() {
      $q = "SELECT `ve`.`vendor`, `ve`.`website`, `vbt`.`booth_type`, `ve`.`booth_number`, group_concat(distinct `it`.`items`) items, group_concat(distinct `pt`.`payment`) payments, `ve`.`bronycon_endorsed`

        FROM `bc_vendors` `ve`

        LEFT JOIN `bc_vendors_paytypes` `vept`
        ON `ve`.`id` = `vept`.`vendor_id`
        LEFT JOIN `bc_paytypes` `pt`
        ON `vept`.`paytype_id` = `pt`.`id`

        LEFT JOIN `bc_vendors_items` `veit`
        ON `ve`.`id` = `veit`.`vendor_id`
        LEFT JOIN `bc_vend_items` `it`
        ON `veit`.`vend_item_id` = `it`.`id`,

        `bc_vendor_booth_types` `vbt`

        WHERE `ve`.`booth_type_id` = `vbt`.`id`
        GROUP BY `ve`.`id`
        ORDER BY `ve`.`vendor`";

      $result = array();
      $q = sqlquery($q);
      while ($f = sqlfetch($q)) {
        $result[] = $f;
      }

      return $result;
    }



    /*
      Function: purgeVendorCache
        Purges the vendor JSON cache file.
     */
    
    public function purgeVendorCache($fileName) {
      if ($fileName && $this->purgeCache($fileName)) {
        return true;
      } else {
        return false;
      }
    }


	}
?>
