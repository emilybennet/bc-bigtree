<?
  // header('Content-type: application/json');
  header('Content-Type: application/excel');
  
  if ($commands[0] == "aa" || $commands[0] == "artists" || $commands[0] == "artistalley" || $commands[0] == "artist-alley") {
    $outputArtistAlley = true;
  }

  $fileContent = ($outputArtistAlley) ? 'artist_alley' : 'vendor_hall';

  $filename = $fileContent."_guidebook_formatted-".date('Ymd-Gis').".csv";
  header('Content-Disposition: attachment; filename="'.$filename.'"');

  $vendorsMod = new vendors(true);
  $vendorList = $vendorsMod->getExhibitorsByAlpha();
  $artistAlleyList = $vendorsMod->getArtistAlley();

  $gbDefaultHeaders = 'Name,"Sub-Title (i.e. Location, Table/Booth, or Title/Sponsorship Level)",Description (Optional),Location/Room,Image (Optional)';
  

  $fp = fopen('php://output', 'w');

  fputcsv($fp, str_getcsv($gbDefaultHeaders));

  if (!$outputArtistAlley) {

    // vendors
    foreach ($vendorList as $v) {
      $line = array();

      $boothDesc = "";

      if ($v["offering"]) {
        $boothDesc .= "<p><strong>Selling:</strong> " . $v["offering"] . "<br/><br/></p>";;
      }

      if ($v["accepts"]) {
        $boothDesc .= "<p><strong>Accepts:</strong> " . $v["accepts"] . "<br/><br/></p>";;
      }

      if ($v["url"]) {
        $boothDesc .= "<p><strong>Website:</strong> <a href='". $v["url"] . "'>" . $v["url"] . "</a></p>";
      }

      array_push($line, $v["name"]); // vendor name
      array_push($line, "Booth " . $v["booth_number"]); // sub-title
      array_push($line, $boothDesc); // description
      array_push($line, "Vendor Booth " . $v["booth_number"]); // location

      fputcsv($fp, $line);
    }

  } else {

    foreach ($artistAlleyList as $v) {
      $line = array();

      $boothDesc = "";

      if ($v["offering"]) {
        $boothDesc .= "<p><strong>Selling:</strong> " . $v["offering"] . "<br/><br/></p>";;
      }

      if ($v["accepts"]) {
        $boothDesc .= "<p><strong>Accepts:</strong> " . $v["accepts"] . "<br/><br/></p>";;
      }

      if ($v["url"]) {
        $boothDesc .= "<p><strong>Website:</strong> <a href=\"" . $v["url"] . "\">" . $v["url"] . "</a></p>";
      }

      array_push($line, $v["name"]); // vendor name
      array_push($line, "Artist Alley Table " . $v["booth_number"]); // sub-title
      array_push($line, $boothDesc); // description
      array_push($line, "Artist Alley Table " . $v["booth_number"]); // location

      fputcsv($fp, $line);
    }
  }

  fclose($fp);