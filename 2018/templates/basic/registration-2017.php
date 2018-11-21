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
        <h2>2017 Registration</h2>
      </header>


      <div class="at-con-badge-options">
        <div class="weekend flex-item">
          <fieldset>
            <legend>The Whole Weekend</legend>
          </fieldset>
          <ul class="at-door-badge-types">
            <li>
              <span class="badge-name">3-Day</span>
              <span class="price">$60</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Youth (13-and-under)</span>
              <span class="price">$40</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Youth (5-and-under)</span>
              <span class="price">Free!</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Service Member</span>
              <span class="price">$50</span>
            </li>

            <li>
              <span class="badge-name">3-Day • Senior Discount</span>
              <span class="price">$40</span>
            </li>
          </ul>
        </div>
        <div class="one-day flex-item">
          <fieldset>
            <legend>Just a Day</legend>
          </fieldset>
          <ul class="at-door-badge-types">
            <li>
              <span class="badge-name">Friday Only</span>
              <span class="price">$40</span>
            </li>

            <li>
              <span class="badge-name">Saturday Only</span>
              <span class="price">$40</span>
            </li>

            <li>
              <span class="badge-name">Sunday Only</span>
              <span class="price">$30</span>
            </li>
          </ul>
        </div>
      </div>


      <div style="text-align:center;margin-bottom:70px;">
          <a href="http://bronycon2017.eventbrite.com" class="btn btn-fill-orange btn-lg" style="font-size: 30px;">Register on Eventbrite</a>
      </div>



      <div style="text-align:center;margin-bottom:50px;">
          <fieldset>
            <legend>Looking for Sponsor badges?</legend>
          </fieldset>
          <p>Those will go live sometime this fall. <a href="http://eepurl.com/b9hyrP" target="blank" style="color:#87c88c">Sign up for our mailing list</a> and be the first to know they're available.</p>
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
