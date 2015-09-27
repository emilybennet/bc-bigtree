<?
	class registrationBadges extends BTXCacheableModule {

		var $Table = "bc_badges";
		var $Module = "7";

    public function __construct($debug = false) {
      global $cms;
      
      $this->maxCacheAge = 60 * 60; // one hour
      $this->cache_prefix = "registration/";
      
      parent::__construct($debug);
    }



    /*
      Function: getRegistration
        Retrieves a cached copy of registration details. If it doesn't exist, we make it.

      Parameters:
        badgeType - one of "badges", "perks", "altbadges".

      Returns:
        JSON encoded array of either: badges and their perks, perks and the badges that
        have them, or a list of headlines, descriptions and action buttons (alt badges).
     */

    public function getRegistration($badgeType) {
      global $cms;

      $cacheFile = $this->cache_base.$cms->urlify($badgeType). '.btc';
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        if ($badgeType == 'badges') {
          $result = json_encode($this->getBadgesQuery());
        } elseif ($badgeType == 'perks') {
          $result = json_encode($this->getPerksQuery());
        } elseif ($badgeType == 'altbadges'){
          $result = json_encode($this->getAltBadgesQuery());
        } else {
          return false;
        }
        file_put_contents($cacheFile, $result);
        chmod($cacheFile, 0777);
      } else {
        $result = file_get_contents($cacheFile);
      }
      return $result;
    }




    /*
      Function getBadgesQuery
        All our badges and the perks which they have.

      Returns:
        Returns an array of all badges.
     */
    
    private function getBadgesQuery() {
      $q = sqlquery("SELECT `ba`.`id`, `ba`.`badge_name`, `ba`.`badge_price`, 
        `ba`.`registration_url`, `ba`.`gift_card_value`, `ba`.`anypony_voucher_qty`, `ba`.`tshirt_included`, `ba`.`sale_mode`, `ba`.`sold_out`, 
        group_concat(DISTINCT `pr`.`name`  ORDER BY `pr`.`position` DESC SEPARATOR '|/|') `perks`
        FROM `bc_badges` `ba`

        LEFT JOIN `bc_badges_perks` `bapr`
        ON `ba`.`id` = `bapr`.`badge_id`
        LEFT JOIN `bc_perks` `pr`
        ON `bapr`.`perk_id` = `pr`.`id`

        WHERE `ba`.`approved` = 'on'
          AND `pr`.`approved` = 'on'
        GROUP BY `ba`.`id`
        ORDER BY `ba`.`position` DESC");

      $items = array();
      $i = 0;
      while ($f = sqlfetch($q)) {

        $items[$i]['id'] = $f['id'];
        $items[$i]['badge_name'] = $f['badge_name'];
        $items[$i]['badge_price'] = $f['badge_price'];
        $items[$i]['registration_url'] = $f['registration_url'];
        $items[$i]['gift_card_value'] = $f['gift_card_value'];
        $items[$i]['anypony_voucher_qty'] = $f['anypony_voucher_qty'];
        $items[$i]['tshirt_included'] = $f['tshirt_included'];
        $items[$i]['sale_mode'] = $f['sale_mode'];
        $items[$i]['sold_out'] = $f['sold_out'];
        $items[$i]['perks'] = explode('|/|', $f['perks']);
        $i++;
      }
      return $items;
    }




    /*
      Function getPerksQuery
        All our perks and the badges which have them.

      Returns:
        Returns an array of all perks.
     */
    
    private function getPerksQuery() {
      $q = sqlquery("SELECT `pr`.`id`, `pr`.`name`, `pr`.`longer_description` `description`, group_concat(DISTINCT `ba`.`badge_name` ORDER BY `ba`.`position` DESC SEPARATOR '|/|') `badges`
        FROM `bc_perks` `pr`

        LEFT JOIN `bc_badges_perks` `bapr`
        ON `pr`.`id` = `bapr`.`perk_id`
        LEFT JOIN `bc_badges` `ba`
        ON `bapr`.`badge_id` = `ba`.`id`

        WHERE `pr`.`approved` = 'on'
          AND `ba`.`approved` = 'on'
        GROUP BY `pr`.`id`
        ORDER BY `pr`.`position` DESC");

      $items = array();
      $i = 0;
      while ($f = sqlfetch($q)) {
        $currentPerk = $this->get($f);
        $items[$i]['id'] = $currentPerk['id'];
        $items[$i]['perk_name'] = $currentPerk['name'];
        $items[$i]['description'] = $currentPerk['description'];
        $items[$i]['badges'] = explode('|/|', $currentPerk['badges']);
        $i++;
      }
      return $items;
    }



    /*
      Function getAltBadgesQuery
        The badge blocks that are not in the grid or primary.

      Returns:
        Returns an array of the alternative badges.
     */

    public function getAltBadgesQuery() {
      $q = sqlquery("SELECT `balt`.`id`, `balt`.`headline`, `balt`.`description`, `balt`.`action_buttons`
        FROM `bc_badges_alt` `balt`
        WHERE `balt`.`approved` = 'on'
        ORDER BY `balt`.`position` DESC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      return $items;
    }



    /*
      Function: getSponsorThankYous
        Fetches all list of sponsors to thank.

      Returns:
        Returns an array of all the sponsors.
     */
    public function getSponsorThankYous() {
      global $cms;

      $cacheFile = $this->cache_base.'sponsor-thank-yous.btc';
      $cacheAge = $this->cacheAge($cacheFile);

      if ($cacheAge === false || $cacheAge < (time() - $this->maxCacheAge) || $this->debug) {
        
        $q = sqlquery("SELECT `sponsor_thanks`
          FROM `bc_sponsor_thanks` 
          ORDER BY `sponsor_thanks` ASC");

        $result = array();
        while ($f = sqlfetch($q)) {
          $result[] = $f['sponsor_thanks'];
        }

        $result = json_encode($result);
        file_put_contents($cacheFile, $result);
        chmod($cacheFile, 0777);
      } else {
        $result = file_get_contents($cacheFile);
      }
      return $result;



    }



    /*
      Function: purgeBadgeCache
        Purges the hotel JSON cache file.

      Parameter:
        filename - the name of the file to purge.
     */
    
    public function purgeBadgeCache($fileName) {
      if ($fileName && $this->purgeCache($fileName)) {
        return true;
      } else {
        return false;
      }
    }
	}
?>
