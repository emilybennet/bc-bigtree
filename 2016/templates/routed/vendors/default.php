<?
  $vendorsMod = new vendors(true);
  // $vendorList = $vendorsMod->getVendors("vendors");
  // $vendorsByBoothList = $vendorsMod->getVendors("booth");
  // $bigtree["layout"] = "blank";
  // $vData = json_encode($vendorsByBoothList);

  $ehAlpha = $vendorsMod->getExhibitorsByAlpha();
  $ehBooth = $vendorsMod->getExhibitorsByBooth();
  $aa = $vendorsMod->getArtistAlley();

  $vendorData = array_merge($ehBooth, $aa);
  $vData = array();
  foreach ($vendorData as $v) {
    $ve['vendor'] = $v['name'];
    $ve['website'] = $v['url'];
    $ve['items'] = $v['offering'];
    $ve['payments'] = $v['accepts'];
    $ve['booth_number'] = $v['booth_number'];

    $booth = $v["booth_number"];
    $vData[$booth][] = $ve;
  }
  $vData = json_encode($vData);
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

      <div class="section-exhibitor-hall">
        <fieldset>
            <legend>Exhbitor Hall</legend>
        </fieldset>

        <? foreach ($ehAlpha as $vendor): ?>

          <div class="vendor-card">
            <header><h6><?=$vendor["name"]?> <small>Booth: <?=$vendor["booth_number"]?></small></h6></header>
            <div class="details">
              <? if ($vendor["url"]): ?>
              <p><a href="<?=$vendor["url"]?>" target="_blank">Website</a></p>
              <? endif; ?>
              <? if ($vendor["offering"]): ?>
                <p>Offering: <?=$vendor["offering"]?></p>
              <? endif; ?>
              <? if ($vendor["accepts"]): ?>
                <p>Accepts: <?=$vendor["accepts"]?></p>
              <? endif; ?>
            </div>
          </div>

        <? endforeach; ?>
      </div>

      <div class="section-artist-alley">
        <fieldset>
            <legend>Artist Alley</legend>
        </fieldset>

        <? foreach ($aa as $vendor): ?>

          <div class="vendor-card">
            <header><h6><?=$vendor["name"]?> <small>Pod: <?=$vendor["booth_number"]?></small></h6></header>
            <div class="details">
              <? if ($vendor["url"]): ?>
              <p><a href="<?=$vendor["url"]?>" target="_blank">Website</a></p>
              <? endif; ?>
              <? if ($vendor["offering"]): ?>
                <p>Offering: <?=$vendor["offering"]?></p>
              <? endif; ?>
              <? if ($vendor["accepts"]): ?>
                <p>Accepts: <?=$vendor["accepts"]?></p>
              <? endif; ?>
            </div>
          </div>

        <? endforeach; ?>
      </div>

    </section>
    <div class="clearfix"></div>
  </div>

</div>


<script>var vendorStore = <?=$vData?>;</script>

<style>
  .header-band {
    background-color: #3C87C8;
  }
  fieldset {
    margin: 40px 0 30px;
  }
  fieldset legend {
    font-size: 30px;
  }
  .vendor-card {
    text-align: left;
    width: 95%;
  }
  .section-exhibitor-hall .vendor-card header {
    background-color: #3C87C8;
  }
  .section-exhibitor-hall legend {
    color: #3C87C8;
  }
  .section-exhibitor-hall fieldset {
    border-top-color: #3C87C8;
  }
  .section-exhibitor-hall a {
    display: inline-block;
    color: #3C87C8 !important;
    border-bottom: 1px dotted #3C87C8;
  }
  .section-exhibitor-hall a:hover {
    border-bottom-color: transparent;
  }
  .section-artist-alley {
    margin-top: 50px;
  }
  .section-artist-alley .vendor-card header {
    background-color: #F0641E;
  }
  .section-artist-alley legend {
    color: #F0641E;
  }
  .section-artist-alley fieldset {
    border-top-color: #F0641E;
  }
  .section-artist-alley a {
    display: inline-block;
    color: #F0641E !important;
    border-bottom: 1px dotted #F0641E;
  }
  .section-artist-alley a:hover {
    border-bottom-color: transparent;
  }
  @media only screen and (min-width: 850px) {
    .section-exhibitor-hall,
    .section-artist-alley {
      text-align: center;
    }
    .vendor-card {
      width: 46%;
    }
  }
  @media only screen and (min-width: 850px) {
    .vendor-hall-map-wrap #vendor-hall-map {
      margin-top: 100px;
      margin-bottom: 50px;
    }
  }
</style>
