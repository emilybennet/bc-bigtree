<?
  $vendorsMod = new vendors(true);
  $vendorList = $vendorsMod->getVendors("vendors");
  $vendorsByBoothList = $vendorsMod->getVendors("booth");
  // $bigtree["layout"] = "blank";

  $vData = json_encode($vendorsByBoothList);
?>

<section class="header-band vendor-hall-map-wrap">
  <div id="vendor-hall-map"></div>
</section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

  <div class="wrap content-page wide-load">

    <section class="the-meat">
      <header class="page-header">
        <h2>Blank Canvas's Marketplace</h2>
      </header>

        <? if ($vendor_hall_schedule): ?>
        <div class="vendor-card marketplace-info">
          <div class="details">
            <h6>Blank Canvas's Marketplace Hours</h6>
            <ul class="hours-list">
              <? foreach ($vendor_hall_schedule as $h): ?>
              <li><span class="day"><?=$h["day"]?></span> <?=$h["hours"]?></li>
              <? endforeach; ?>
            </ul>
          </div>
        </div>
        <? endif; ?>

      <? foreach ($vendorList as $vendor): ?>

        <div class="vendor-card">
          <header><h6><?=$vendor["vendor"]?> <small>Booth: <?=$vendor["booth_number"]?></small></h6></header>
          <div class="details">
            <? if ($vendor["website"]): ?>
            <p><a href="<?=$vendor["website"]?>">Website</a></p>
            <? endif; ?>
            <p>Selling: <?=str_replace(",", ", ", $vendor["items"])?></p>
            <p>Accepts: <?=str_replace(",", ", ", $vendor["payments"])?></p>
          </div>
        </div>

      <? endforeach; ?>

    </section>
    <div class="clearfix"></div>
  </div>

</div>


<script>var vendorStore = <?=$vData?>;</script>