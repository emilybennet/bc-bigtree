<?
  class volunteerStaffOpenings extends BigTreeModule {

    var $Table = "bc_volunteer_staff_openings";
    var $Module = "23";

    public function getNav($page) {
      global $cms;
      $baseURL = WWW_ROOT.$page["path"];
      $navReturn = array();

      $p = $cms->getPage($page["id"]);

      $navReturn[] = array("title" => $p["resources"]["staff_opening_header"], "link" => $baseURL."/staff");
      $navReturn[] = array("title" => $p["resources"]["gopher_opening_header"], "link" => $baseURL."/gopher");

      return $navReturn;
    }

    public function getSitemap($page) {
      global $cms;
      $baseURL = WWW_ROOT.$page["path"];
      $navReturn = array();

      $p = $cms->getPage($page["id"]);

      $navReturn[] = array("title" => $p["resources"]["staff_opening_header"], "link" => $baseURL."/staff");
      $navReturn[] = array("title" => $p["resources"]["gopher_opening_header"], "link" => $baseURL."/gopher");

      return $navReturn;
    }

    public function getOpenings() {
      $q = sqlquery("SELECT `so`.`id`, `so`.`role_title`, `so`.`application_link`, `so`.`description`, `de`.`department`
      FROM `bc_volunteer_staff_openings` `so`, `bc_volunteer_dept` `de`
      WHERE `so`.`department` = `de`.`id`
        AND `so`.`approved` = 'on'
      ORDER BY `de`.`department` ASC");

      $items = array();
      while ($f = sqlfetch($q)) {
        $i = $this->get($f);
        $dept = $i["department"];
        $items[$dept][] = $i;
      }
      return $items;
    }

  }
?>
