<?
  if ($_GET['e'] == 'notauth') {
    $errorMsg = "Nope. You sure you&acute;re supposed to be here?";
  }
?>

<!DOCTYPE html>
<html>
  
<head>
  <title>Go away, please?</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <link rel="stylesheet" type="text/css" href="<?=$www_root?>css/bootstrap.min.css" />
</head>

<body>

  <header class="navbar navbar-inverse navbar-static-top" roll="banner">
    <div class="container">
      <a href="/" class="navbar-brand">Shhhh&hellip; Super Sekret! Also, &hearts; you Feulner!</a>
    </div>
  </header>

  <section class="container">

    <div class="row">
      <div class="login col-md-4 col-md-offset-4">

        <? if (isset($errorMsg)): ?>
          <div class="alert alert-danger"><?=$errorMsg?></div>
        <? endif; ?>

        <section class="panel panel-default">
          <div class="panel-body">
          <form class="form" method="POST" action="<?=$www_root?>ajax/login">
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="loginUsername" placeholder="Username" />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="login-passcode" name="loginPasscode" placeholder="Password" />
            </div>
            <input type="hidden" class="form-control" id="redirect" name="redirect" value="<?=$_GET['redirect']?>" />
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          </div>
        </section>

      </div>
    </div>

  </section>

</body>

</html>