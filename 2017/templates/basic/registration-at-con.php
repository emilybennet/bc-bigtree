<?
  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  if ($pageHeader['social_media_image']) {
    $customOpenGraphImage = $pageHeader['social_media_image'];
  }

?>

<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content header-band-bump">
  <div class="wrap content-page wide-load">

    <section class="the-meat registration">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>

      <p class="alert info" style="margin-bottom:50px;">Pre-registration has ended on August 1. 3-Day and single-day badges may still be purchased at-the door.</p>


      <div class="at-con-badge-options">
        <div class="weekend flex-item">
          <fieldset>
            <legend>The Whole Weekend</legend>
          </fieldset>
          <ul class="at-door-badge-types">
            <li>
              <span class="badge-name">3-Day</span>
              <span class="price">$80</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Youth (13-and-under)</span>
              <span class="price">$45</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Youth (5-and-under)</span>
              <span class="price">Free!</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Service Member</span>
              <span class="price">$50</span>
            </li>

            <!--<li>
              <span class="badge-name">3-Day • Senior Discount</span>
              <span class="price">$40</span>
            </li>-->
          </ul>
        </div>
        <div class="one-day flex-item">
          <fieldset>
            <legend>Just a Day</legend>
          </fieldset>
          <ul class="at-door-badge-types">
            <li>
              <span class="badge-name">Friday Only</span>
              <span class="price">$50</span>
            </li>

            <li>
              <span class="badge-name">Saturday Only</span>
              <span class="price">$50</span>
            </li>

            <li>
              <span class="badge-name">Sunday Only</span>
              <span class="price">$35</span>
            </li>
          </ul>
        </div>
      </div>

      <section class="badge-pickup-hours sale-banner">
        <h3>Registration &amp; Badge Pickup Hours</h3>
        <ul>
          <li><span class="day-block" style="width:180px;">Thursday, August 10</span> 3&ndash;10pm <small>(pre-registered only)</small></li>
          <li><span class="day-block" style="width:180px;">Friday, August 11</span> 8am&ndash;10pm</li>
          <li><span class="day-block" style="width:180px;">Saturday, August 12</span> 9am&ndash;8pm</li>
          <li><span class="day-block" style="width:180px;">Sunday, August 13</span> 9am&ndash;1pm</li>
        </ul>
      </section>


      <div>
          <p style="text-align:center;font-size:80%">
              <a href="pre" style="display:block;">Still need to reference pre-registration information?</a>
          </p>
      </div>

<style>
  .badge-pickup-hours {
    background: transparent;
    border: 1px solid #3C87C8;
  }
  .badge-pickup-hours h3 {
    margin-bottom: 20px;
  }
  .badge-pickup-hours ul {
    padding: 0 45px;
  }
  .badge-pickup-hours h3, .badge-pickup-hours ul {
    color: #3C87C8;
  }
  .at-con-badge-options {
    margin-bottom: 60px;
  }
  .at-con-badge-options ul {
    padding: 0 40px;
    margin-bottom: 30px;
  }
  .at-con-badge-options li:before {
    display: none;
  }
  .at-con-badge-options .badge-name {
    font-weight: bold;
  }
  .at-con-badge-options fieldset {
    padding-bottom: 0;
    border-top-color: #5A3791;
  }
  .at-con-badge-options fieldset legend {
    text-align: left;
    left: 7px;
    padding: 0 15px 0 7px;
    color: #5A3791;
  }
  @media only screen and (min-width: 850px) {
    .at-con-badge-options {
      display: flex;
      margin-bottom: 60px;
    }
    .at-con-badge-options .flex-item {
      flex: 1;
      padding: 0 30px;
    }
  }
</style>

    </section>
    <div class="clearfix"></div>
  </div>

</div>
