<?
  
  $user = $_POST['loginUsername'];
  $pass = md5(trim($_POST['loginPasscode']));

  $redirect = $_POST['redirect'];

  function login($user, $pass) {
    $q = sqlquery("SELECT `id` FROM `bc_temp_users` WHERE `username` = '".sqlescape($user)."' AND `password` = '".sqlescape($pass)."'");
    return sqlrows($q);
  }

  if (login($user, $pass)) {
    $_SESSION["bcCoreLock"]["user"] = $user;
    if ($redirect) {
      header('Location: '.$www_root.$redirect);
    } else {
      header('Location: '.$www_root);
    }
  } else {
    if ($redirect) {
      header('Location: '.$www_root.'ajax/login/?e=notauth&redirect='.urlencode($redirect));
    } else {
      header('Location: '.$www_root.'ajax/login/?e=notauth');
    }
  }

