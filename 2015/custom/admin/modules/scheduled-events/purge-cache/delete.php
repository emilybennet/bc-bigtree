<?
  $eventsMod = new scheduledEvents();
  $theRedirect = $www_root.$bigtree['path'][0].'/'.$bigtree['path'][1];
  
  if ($eventsMod->purgeEventsCache('event-schedule.btc')) {
    $admin->growl('Success!', "Venue cache cleared!");
  } else {
    $admin->growl('Cache not cleared.', "Cache file doesn't exist.", "error"); 
  }

  BigTree::redirect($theRedirect);