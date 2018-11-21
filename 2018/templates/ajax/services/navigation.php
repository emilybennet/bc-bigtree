<?
  if ($_GET['fullNav'] == "true") {
    $nav = $cms->getNavByParent(0, 3);
    $navTrayHome = array(
      'id' => '0',
      'parent' => '-1',
      'title' => 'Home',
      'route' => '/',
      'link' => $www_root,
      'new_window' => false,
      'children' => array()
    );
    array_unshift($nav, $navTrayHome);
  } else {
    $nav = $cms->getNavByParent(0, 2);
  }

  if ($_GET['format'] == "json") {
    header('Content-type: application/json');
    echo json_encode($nav);
  } else {
    header('Content-type: text/plain');
    recurseNav($nav, 0, true);
  }