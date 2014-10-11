<?

  $emailLogo = $www_root."/images/bc_logo-default-email-sm.png";

  if (!empty($_POST["name"])) {
    $name = trim($_POST["name"]);
  }

  if (!empty($_POST["role"])) {
    $role = "&nbsp;/&nbsp;".trim($_POST["role"]);
  }

  if (!empty($_POST["tel"])) {
    $tel = trim($_POST["tel"]);
    $tel = '<a href="tel:'.$tel.'" style="color: #3C87C8; text-decoration: none;">'.$tel.'</a>';
  }

  if (!empty($_POST["tel"]) && !empty($_POST["email"])) {
    $line2Space .= "&nbsp;/&nbsp;";
  }

  if (!empty($_POST["email"])) {
    $email = trim($_POST["email"]);
    $email = '<a href="mailto:'.$email.'" style="color: #3C87C8; text-decoration: none;">'.$email.'</a>';
  }

?>


<br />
<br />

<span style="font-family:'Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif; font-size: 11px;">
  <img src="<?=$emailLogo?>" alt="BronyCon" style="width:100px;height:26px;"><br />

<br />

  <span style="color: #5A3791;">
    <b><?=$_POST["name"]?></b><?=$role?><br /></span>
  <span style="color: #3C87C8;">
    <?=$tel.$line2Space.$email?>
  </span>

</span>