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

  }
?>
