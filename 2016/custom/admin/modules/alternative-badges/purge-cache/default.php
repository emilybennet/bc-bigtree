<?
  $registrationBadgesMod = new registrationBadges();
  $cacheAge = $registrationBadgesMod->maxCacheAge / 3600 .' hours';
?>

<div class="container">
  <section>
    <p>Alternative Badge cards are stored in a cached file which is updated every <?=$cacheAge?>, although sometimes you need it just immediately.</p>
    <a href="delete" class="button red purge-btn">Purge Cached Alt. Badge File</a>
  </section>
</div>