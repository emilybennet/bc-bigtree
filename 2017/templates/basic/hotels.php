<?
  $venuesMod = new bcVenues(true);
  $venues = json_decode($venuesMod->getHotels(), true);
?>

<? if ($venues['features']): ?>
<section id="hotel-map" class="billboard"></section>

<div class="content">

  <div class="wrap content-page">

    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>

      <? if ($disclaimer): ?>
      <div class="alert info">
        <?=html_entity_decode($disclaimer)?>
      </div>
      <? endif; ?>

      <ul class="unstyled hotel-list">

        <? foreach ($venues['features'] as $venue): ?>
        <?
          $hotelListClass = "";
          if ($venue['properties']['price']['promo_expired']) {
            $hotelListClass = "sold-out";
          } elseif ($venue['properties']['meta']['featured']) {
            $hotelListClass = "official-hotel";
          }
        ?>
        <li id="<?=$cms->urlify(htmlspecialchars($venue['properties']['title']))?>" class="hotel <?=$hotelListClass?>">
          <h5><?=$venue['properties']['title']?>
            <small><?=round($venue['properties']['distance'], 2)?> miles away</small>
          </h5>
          <div class="card-liner">

            <section class="details">
              <section class="contact-info">
                <address><?=$venue['properties']['location']['address']?>, <?=$venue['properties']['location']['city']?>, <?=$venue['properties']['location']['state']?> <?=$venue['properties']['location']['postal_code']?></address>
                <? if ($venue['properties']['contact']['tel']): ?>
                T: <?=$venue['properties']['contact']['tel']?>
                <? endif; ?>
                <? if ($venue['properties']['contact']['fax']): ?>
                 // F: <?=$venue['properties']['contact']['fax']?>
                <? endif; ?>
              </section>

              <!--<section class="features">
                <ul class="unstyled hotel-features">
                  <li>
                    <span class="glyphicon-font">&#xe049;</span> Official BronyCon Hotel!
                  </li>
                </ul>
              </section> -->
            </section>

            <section class="book-it">
              <span class="price-tag">

                <?
                  $vWebsite = $venue['properties']['contact']['website'];
                  $vPromoWebsite = $venue['properties']['price']['promo_website'];
                  $vPromoComment = $venue['properties']['price']['promo_comment'];
                  $vFeatured = $venue['properties']['meta']['featured'];
                  $vPromoExpire = $venue['properties']['price']['promo_expired'];
                  $btnClass = "btn ";

                  if ($vPromoWebsite && !$vPromoExpire) {
                    $websiteLink = $vPromoWebsite;
                  } else {
                    $websiteLink = $vWebsite;
                  }

                  if ($vPromoExpire || empty($vWebsite)) {
                    $btnClass .= "btn-grey btn-disabled";
                  } elseif ($vFeatured) {
                    $btnClass .= "btn-orange";
                  } else {
                    $btnClass .= "btn-purple";
                  }

                  if ($vPromoExpire) {
                    $btnLabel = "Promo Rate Sold Out";
                  } elseif (empty($vWebsite)) {
                    $btnLabel = "Call to Book";
                  } else {
                    $btnLabel = "Book Room";
                  }
                ?>

                <? if (!$vPromoExpire): ?>
                  <span class="price"><?=$venue['properties']['price']['value']?></span>
                  <span class="per">/ night</span>
                <? endif;?>
                <? if ($venue['properties']['price']['promo_code'] && $vPromoExpire == false): ?>
                <span class="discount-code">Use Code: <?=$venue['properties']['price']['promo_code']?></span>
                <? endif; ?>
              </span>

                <? if ($websiteLink): ?>
                  <a href="<?=$websiteLink?>" class="<?=$btnClass?>" target="_blank"><?=$btnLabel?></a>
                <? else: ?>
                  <span class="<?=$btnClass?>"><?=$btnLabel?></span>
                <? endif; ?>

              <? if ($vPromoExpire): ?>
                <span class="promo-expired-msg">Standard rate rooms maybe available, <a href="<?=$vWebsite?>" target="_blank">book now</a></span>
              <? elseif ($vPromoComment): ?>
                <span class="promo-expired-msg"><?=$vPromoComment?></span>
              <? endif; ?>
            </section>
            <div class="clearfix"></div>
          </div>
        </li>
        <? endforeach; ?>

      </ul>

    </section>
    <div class="clearfix"></div>
  </div>

</div>

<link href='//api.tiles.mapbox.com/mapbox.js/v1.4.0/mapbox.css' rel='stylesheet' />

<? else: ?>

<section class="header-band" style="background-image: url('http://bd4579002468ef404afa-8099c7257fe87d50d338ebe5e9167369.r97.cf2.rackcdn.com/community-header.jpg');"></section>

<div class="content">

  <div class="wrap content-page">

    <section class="the-meat">
      <header class="page-header">
        <h2>Hotels</h2>
      </header>
      <?=$no_results?>
    </section>
    <div class="clearfix"></div>
  </div>

</div>

<? endif; ?>
