<?
  $pressAccessRequestMod = new pressAccessRequest();
  $storage = new BigTreeStorage;


  function failureRedirect($msg) {
    // header('Location: '.$page['link'].'?error='.$msg);
    BigTree::redirect($page['link'].'?error='.$msg);
    // exit;
  }


  function rearrange($arr) {
    foreach ($arr as $key => $all) {
      foreach($all as $i => $val) {
        $new[$i][$key] = $val;    
      }    
    }
    return $new;
  }


  // human check
  $humanCheckKey = explode('|', strtolower($_POST['human-check-key']));
  $humanCheck = strtolower($_POST['human-check']);
  if (!in_array($humanCheck, $humanCheckKey)) {
    failureRedirect('nothuman');
  }


  // handle uploaded proof
  if ($_FILES['press-proof']['name'][0] != '') {
    $files = rearrange($_FILES['press-proof']);
    $uploadedFiles = array();

    foreach ($files as $f) {
      $uploadedFiles[] = $storage->store($f['tmp_name'], time().'_'.$f['name'], 'press-proof');
    }
  } else {
    failureRedirect('files');
  }


  // handle the form data now for saving and sending
  $destEmail = $_POST['destination'];
  $outletName = $_POST['outlet-name'];
  $outletType = json_encode($_POST['outlet-type']);
  $outletTypeStr = implode(', ', $_POST['outlet-type']);
  $requestContactName = $_POST['request-contact-name'];
  $requestContactEmail = $_POST['request-contact-email'];
  $pressBadgeOne = ($_POST['press-badge-one']) ? $_POST['press-badge-one'] : 'n/a';
  $pressBadgeTwo = ($_POST['press-badge-two']) ? $_POST['press-badge-two'] : 'n/a';
  $pressBadgeThree = ($_POST['press-badge-three']) ? $_POST['press-badge-three'] : 'n/a';
  $pressProof = json_encode($uploadedFiles);
  $pressProofEmail = '';
  $timestamp = date("Y-m-d H:i:s");
  $sourcesite = $_SERVER['HTTP_HOST'];


    // format press proof for email
  foreach ($uploadedFiles as $f) {
    $pressProofEmail .= '<li>'.$f.'</li>';
  }


  // save to Press Proof module
  
  $keys = array(
    'outlet_name',
    'outlet_type',
    'request_contact_name',
    'request_contact_email',
    'legal_name_of_press_badge_1',
    'legal_name_of_press_badge_2',
    'legal_name_of_press_badge_3',
    'press_validation'
  );

  $vals = array(
    $outletName,
    $outletType,
    $requestContactName,
    $requestContactEmail,
    $pressBadgeOne,
    $pressBadgeTwo,
    $pressBadgeThree,
    $pressProof
  );


  // stage email to ship

  $to = "BronyCon Press Request <$destEmail>";  
  $from = "$requestContactName <$requestContactEmail>";
  $subject = 'New press badge request from '.$outletName; 
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
  $headers .= 'From: ' . $from . "\r\n";
  $headers .= 'Reply To: ' . $requestContactEmail . "\r\n";  
  $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head></head>
    <body>

    <div style="margin-top:20px;margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Outlet name</span>
      '.$outletName.'
    </div>

    <div style="margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Outlet type</span>
      '.$outletTypeStr.'
    </div>

    <div style="margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Request contact</span>
      '.$requestContactName.', '.$requestContactEmail.'
    </div>

    <div style="margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Legal name for attendee Press Badge #1</span>
      '.$pressBadgeOne.'
    </div>

    <div style="margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Legal name for attendee Press Badge #2</span>
      '.$pressBadgeTwo.'
    </div>

    <div style="margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Legal name for attendee Press Badge #3</span>
      '.$pressBadgeThree.'
    </div>

    <div style="margin-bottom:10px">
      <span style="font-weight:bold;display:block;">Press validation documents</span>
      <ul>'.$pressProofEmail.'</ul>
    </div>


    <div style="margin-bottom:20px">
      Sent from '.$sourcesite.' @ '.$timestamp.'
    </div>

    </body>
    </html>';


  if ($pressAccessRequestMod->add($keys, $vals)) {
    mail($to,$subject,$message,$headers);
    BigTree::redirect($page['link'].'?success=true');
  } else {
    BigTree::redirect($page['link'].'?error=true');
  }




