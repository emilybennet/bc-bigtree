<?
  $venuesMod = new bcVenues();
  $cacheAge = $venuesMod->maxCacheAge / 3600 .' hours';
?>

<div class="container">
  <section>
    <p>All venue data is cached in a JSON file which is updated <?=$cacheAge?>, although sometimes you need it just immediately.</p>
    <a href="delete" class="button red purge-btn">Purge Cached Venue File</a>
  </section>
</div>