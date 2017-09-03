<?
  if ($_GET['horse'] == 'mayfrill') {
    $code = strtoupper("IChooseMayfrill");
    $ana = "Mayfrill";
} else if ($_GET['horse'] == 'pleinair') {
    $code = strtoupper("IChoosePleinair");
    $ana = "Pleinair";
} else if ($_GET['horse'] == 'seebiets') {
    $code = strtoupper("IChooseSeebiets");
    $ana = "Seebiets";
}

?>

<section class="april-fools">
  <h1>Happy April 1st!</h1>

  <p>Well, we may have fibbed a bit. It's not like we could of actually made battle simulator with cute virtual monsters… or did we?</p>
  <? if ($_GET['horse']): ?>
  <p>Thanks for playing along though. For being such a good sport, use promo code <strong><?=$code?></strong> for $5 off our regular 3-Day and 3-Day PLUS badge cost, today only!</p>
  <? endif; ?>

  <div class="action-buttons">
    <a href="https://bronycon2015.eventbrite.com/?discount=HORSINAROUND" class="btn btn-order-now">Register Now</a>
  </div>
  <script>
      ga('send', 'event', 'Ponimon', 'choose', '<?=$ana?>');
  </script>
</section>
