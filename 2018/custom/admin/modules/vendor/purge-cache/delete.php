<?
  $vendorsMod = new vendors();
  $theRedirect = $www_root.$bigtree['path'][0].'/'.$bigtree['path'][1];
  
  if ($vendorsMod->purgeVendorCache('booth.btc') && $vendorsMod->purgeVendorCache('vendors.btc')) {
    $admin->growl('Success!', "Venue cache cleared!");
  } else {
    $admin->growl('Cache not cleared.', "Cache file doesn't exist.", "error"); 
  }

  BigTree::redirect($theRedirect);