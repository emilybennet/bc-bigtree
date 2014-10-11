<?
  $eventsMod = new scheduledEvents();
  $cacheAge = $eventsMod->maxCacheAge / 3600 .' hours';
?>

<div class="container">
  <section>
    <p>All Scheduled Events data is cached in a JSON file which is updated <?=$cacheAge?>, although sometimes you need it just immediately.</p>
    <a href="delete" class="button red purge-btn">Purge Cached Scheduled Events Files</a>
  </section>
</div>