<?
  $footerImageMod = new footerImages();
  if (isset($_GET['useFooter'])) {
    $footerId = $_GET['useFooter'] * 1;
    $footerImage = $footerImageMod->get($footerId);
  } else {
    $footerImage = $footerImageMod->selectFooterImage();
  }
  
  header('Content-type: application/json');
  echo json_encode($footerImage);