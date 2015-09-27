<?
  $venuesMod = new bcVenues();
  $theRedirect = $www_root.$bigtree['path'][0].'/'.$bigtree['path'][1];
  
  if ($venuesMod->purgeHotelCache()) {
    $admin->growl('Success!', "Venue cache cleared!");
  } else {
    $admin->growl('Cache not cleared.', "Cache file doesn't exist.", "error"); 
  }

  BigTree::redirect($theRedirect);