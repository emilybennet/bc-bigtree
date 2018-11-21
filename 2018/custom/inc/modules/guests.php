<?
  class bcGuests extends BigTreeModule {

    var $Table = "bc_guests";
    var $Module = "19";

    public function getGuests() {
      $q = sqlquery("SELECT `gu`.`name`, `gu`.`short_bio`, `gu`.`press_photo`, 
        `gu`.`bronycon_pony_avatar`, `gu`.`role`, `gc`.`category`, `gu`.`route`
        FROM `bc_guests` `gu`, `bc_guest_categories` `gc`
        WHERE `gu`.`approved` = 'on'
          AND `gu`.`category_id` = `gc`.`id`
        ORDER BY `gu`.`position` DESC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      return $items;
    }

    /*
      Function: getAutographTimes
        Returns all the autograph times for a given VIP.

      Parameters:
        - $guestId - the ID of any given guest.

      Returns:
        Array of schedule times!
     */
    public function getAutographTimes($guestId) {
      $q = sqlquery("SELECT `ga`.`start_time`, `ga`.`end_time`
        FROM `bc_guest_autographs` `ga`
        WHERE `ga`.`guest_id` = '".sqlescape($guestId)."'
        ORDER BY `ga`.`start_time`");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      return $items;
    }


    /*
      Function: getGuestEvents
        Returns all scheduled events for a given VIP.

      Parameters:
        - $guestId - the ID of any given guest.

      Returns:
        Array of schedule times and locations!
     */
    public function getGuestEvents($guestId) {
      $q = sqlquery("SELECT `ev`.`id`, `ev`.`event_name`, `ev`.`start_time`, `ev`.`end_time`, `lo`.`location_name`
      FROM `bc_events` `ev`, `bc_guests` `gu`, `bc_guests_events` `evgu`, `bc_events_locations` `lo`
      WHERE `gu`.`id` = `evgu`.`guest_id`
      AND `evgu`.`event_id` = `ev`.`id`
      AND `ev`.`location_id` = `lo`.`id`
      AND `gu`.`id` = '".sqlescape($guestId)."'
      ORDER BY `ev`.`start_time` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $items[] = $this->get($f);
      }
      return $items;
    }



  }
?>
