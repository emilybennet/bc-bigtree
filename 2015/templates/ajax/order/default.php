<?
  if ($_GET['vip']) {
    $horse = $_GET['vip'] . ' wont';
  } else {
    $horse = 'no horses will';
  }

?>

<section class="april-fools">
  <h1>Happy April 1st!</h1>

  <p>Well, we may have fibbed a bit. Sadly <?=$horse?> be joining us this year, but we have a <a href="/guests?psych">fantastic line up of human guests</a> you can come meet this summer. </p>

  <p>Thanks for playing along though. For being such a good sport, use promo code <strong>HORSINAROUND</strong> for $5 off our regular 3-Day and 3-Day PLUS badge cost, today only!</p>

  <div class="action-buttons">
    <a href="https://bronycon2015.eventbrite.com/?discount=HORSINAROUND" class="btn btn-order-now">Register Now</a>
  </div>
</section>