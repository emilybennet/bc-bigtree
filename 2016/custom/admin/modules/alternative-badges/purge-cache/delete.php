<?
  $registrationBadgesMod = new registrationBadges();
  $theRedirect = $www_root.$bigtree['path'][0].'/'.$bigtree['path'][1];
  
  if ($registrationBadgesMod->purgeBadgeCache('altbadges.btc')) {
    $admin->growl('Success!', "Alt. Badges cache cleared!");
  } else {
    $admin->growl('Cache not cleared.', "Cache file doesn't exist.", "error"); 
  }

  BigTree::redirect($theRedirect);