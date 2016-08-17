<?
  // header('Content-type: application/json');
  header('Content-Type: application/excel');
  $filename = "schedule_guidebook_formatted-".date('Ymd-Gis').".csv";
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $vendorsMod = new vendors(true);
  $vendorList = $vendorsMod->getVendors("vendors");

  $gbDefaultHeaders = 'Name,"Sub-Title (i.e. Location, Table/Booth, or Title/Sponsorship Level)",Description (Optional),Location/Room,Image (Optional)';
  

  $fp = fopen('php://output', 'w');

  fputcsv($fp, str_getcsv($gbDefaultHeaders));


  foreach ($vendorList as $v) {
    $line = array();

    $boothDesc = "";

    if ($v["website"]) {
      $boothDesc .= "Website: " . $v["items"] . "\n\n";
    }

    if ($v["items"]) {
      $boothDesc .= "Selling: " . $v["items"] . "\n\n";;
    }

    if ($v["payments"]) {
      $boothDesc .= "Accepts: " . $v["payments"] . "\n\n";;
    }
    
    if ($v["bronycon_endorsed"]) {
      $boothDesc .= "BronyCon Staff Artist";
    }

    array_push($line, $v["vendor"]); // vendor name
    array_push($line, "Booth " . $v["booth_number"]); // sub-title
    array_push($line, $boothDesc); // description
    array_push($line, "Blank Canvas's Marketplace"); // location

    fputcsv($fp, $line);
  }

  fclose($fp);