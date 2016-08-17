<?
  header('Content-type: application/json');

  $venuesMod = new bcVenues();
  $venues = $venuesMod->getHotels();
  echo $venues;