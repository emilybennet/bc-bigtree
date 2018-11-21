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

  $gbDefaultHeaders = 'Name,"Email Address",Password,Booth,Description,"Website URL"';


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

      array_push($line, $v["name"]); // vendor name
      array_push($line, ""); // email
      array_push($line, ""); // password
      array_push($line, $v["booth_number"]); // booth
      array_push($line, $boothDesc); // description
      array_push($line, $v["url"]); // location

      fputcsv($fp, $line);
    }

  } else {

    foreach ($artistAlleyList as $v) {
      $line = array();

      $boothDesc = "";

      // if ($v["offering"]) {
      //   $boothDesc .= "Selling: " . $v["offering"] . "\n\n";
      // }
      //
      // if ($v["accepts"]) {
      //   $boothDesc .= "Accepts: " . $v["accepts"];
      // }

      if ($v["offering"]) {
        $boothDesc .= "<p><strong>Selling:</strong> " . $v["offering"] . "<br/><br/></p>";;
      }

      if ($v["accepts"]) {
        $boothDesc .= "<p><strong>Accepts:</strong> " . $v["accepts"] . "<br/><br/></p>";;
      }

      array_push($line, $v["name"]); // vendor name
      array_push($line, ""); // email
      array_push($line, ""); // password
      array_push($line, $v["booth_number"]); // booth
      array_push($line, $boothDesc); // description
      array_push($line, $v["url"]); // location

      fputcsv($fp, $line);
    }
  }

  fclose($fp);
