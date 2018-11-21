<?
  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $registrationBadgesMod = new registrationBadges(true);
  $perksByBadges = json_decode($registrationBadgesMod->getRegistration('badges'), true);
  $badgesByPerks = json_decode($registrationBadgesMod->getRegistration('perks'), true);
  $altBadges = json_decode($registrationBadgesMod->getRegistration('altbadges'), true);
  $sponsorThankYous = json_decode($registrationBadgesMod->getSponsorThankYous(), true);

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

      <? if ($sale_notice): ?>
      <section class="sale-banner pony-pattern-azure">
        <?=$sale_notice?>
      </section>
      <? endif; ?>

      <section class="badge-pickup-hours sale-banner pony-pattern-azure">
        <h3>At-Con Registration &amp; Badge Pickup</h3>
        <ul>
          <li><span class="day-block" style="width:200px;">Thursday, July 26</span> 3&ndash;10pm <small>(pre-registered only)</small></li>
          <li><span class="day-block" style="width:200px;">Friday, July 27</span> 8am&ndash;8pm</li>
          <li><span class="day-block" style="width:200px;">Saturday, July 28</span> 8am&ndash;8pm</li>
          <li><span class="day-block" style="width:200px;">Sunday, July 29</span> 9am&ndash;1pm</li>
        </ul>
    </section>

      <section class="badge-type-list visible-xs">
        <? foreach ($perksByBadges as $badge): ?>


        <section class="badge-card">
          <header>
            <span class="label"><?=$badge['badge_name']?></span>
            <span class="price"><?=$badge['badge_price']?></span>
            <? if ($badge['registration_url'] && $badge['sold_out'] == false): ?>
            <? if (isset($_COOKIE["affiliate"])) {
              $regURL = $badge['registration_url']."?aff=".$_COOKIE["affiliate"];
            } else {
              $regURL = $badge['registration_url'];
            }
            ?>
            <span class="register">
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Register</a>
            </span>
            <? elseif ($badge['registration_url'] && $badge['sold_out'] == true): ?>
            <span class="register">
              <span class="btn btn-white btn-disabled btn-sm">Sold Out</span>
            </span>
            <? else: ?>
            <span class="register">
              <span class="at-the-door">Available at the Door</span>
            </span>
            <? endif; ?>
          </header>
          <ul class="perks">
            <? foreach ($badge['perks'] as $perk): ?>
            <li>
              <?=$perk?>
                <? if ($perk == "2018 Limited T-Shirt"): ?>
                  <? if ($badge["tshirt_included"] == "on"): ?>
                   (included!)
                  <? else: ?>
                   (available as add-on)
                  <? endif; ?>
                <? elseif ($perk == "Autograph Line Hop Ticket"): ?>
                  <?='&times; '.$badge["anypony_voucher_qty"];?>
                <? elseif ($perk == "Photobooth Credit"): ?>
                  <?='• '.strip_tags($badge["photo_text"]);?>
                <? elseif ($perk == "BronyCon Swag Shop Credit"): ?>
                  <?='('.$badge["gift_card_value"].')';?>
                <? endif; ?>
            </li>
            <? endforeach; ?>
          </ul>
        </section>
        <? endforeach; ?>
      </section>


      <section class="badge-types-table hidden-xs">
        <header>
          <section class="key"><span>&nbsp;</span></section>
          <?
            foreach ($perksByBadges as $badge):
              $badgeType = $badge['badge_name'];
              $safeBadgeType = $cms->urlify($badgeType);
          ?>
          <section class="badge <?=$safeBadgeType?>" data-badge-type="<?=$safeBadgeType?>">
            <span class="label-wrap highlight">
              <span class="label"><?=$badge['badge_name']?></span>
              <span class="price"><?=$badge['badge_price']?></span>
              <? if ($badge['registration_url'] && $badge['sold_out'] == false): ?>
              <? if (isset($_COOKIE["affiliate"])) {
                $regURL = $badge['registration_url']."?aff=".$_COOKIE["affiliate"];
              } else {
                $regURL = $badge['registration_url'];
              }
              ?>
              <span class="register">
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Register</a>
              </span>
              <? elseif ($badge['registration_url'] && $badge['sold_out'] == true): ?>
              <span class="register">
                <span class="btn btn-grey btn-disabled btn-sm">Sold Out</span>
              </span>
              <? else: ?>
              <span class="register">
                <span class="at-the-door">Available at the Door</span>
              </span>
              <? endif; ?>
            </span>
          </section>
          <? endforeach; ?>
          <div class="clearfix"></div>
        </header>

        <ul class="perks unstyled">
          <? foreach($badgesByPerks as $perk): ?>
          <li>
            <section class="key">
              <span class="name"><?=$perk['perk_name']?></span>
            </section>
            <?
              foreach ($perksByBadges as $badge):
                $badgeType = $badge['badge_name'];
                $safeBadgeType = $cms->urlify($badgeType);
            ?>
            <section class="badge glyphicon-font" data-badge-type="<?=$safeBadgeType?>">
              <span class="highlight">
                <? if ($perk["id"] == "26"): ?>
                  <? if ($badge["tshirt_included"] == "on"): ?>
                    <?=(in_array($badgeType, $perk['badges']))?'<span class="check">&#xe207;</span>':'&nbsp;'?>
                  <? else: ?>
                    <?=(in_array($badgeType, $perk['badges']))?'<span class="check desc-text">Add-on Available</span>':'&nbsp;'?>
                  <? endif; ?>
                <? elseif ($perk["id"] == "35"): ?>
                  <?=(in_array($badgeType, $perk['badges']))?'<span class="check desc-text">'.$badge["anypony_voucher_qty"].'</span>':'&nbsp;'?>
                <? elseif ($perk["id"] == "40"): ?>
                  <?=(in_array($badgeType, $perk['badges']))?'<span class="check desc-text">'.$badge["photo_text"].'</span>':'&nbsp;'?>
                <? elseif ($perk["id"] == "38"): ?>
                  <?=(in_array($badgeType, $perk['badges']))?'<span class="check desc-text">'.$badge["gift_card_value"].'</span>':'&nbsp;'?>
                <? else: ?>
                  <?=(in_array($badgeType, $perk['badges']))?'<span class="check">&#xe207;</span>':'&nbsp;'?>
                <? endif; ?>
              </span>
            </section>
            <? endforeach; ?>
            <div class="clearfix"></div>
          </li>
          <? endforeach; ?>
        </ul>
      </section>

      <footer style="text-align:right;margin-top:20px;color:#A5A5A5;">
        <p><small><em>Details subject to change.</em></small></p>
      </footer>


      <section class="other-badges">
        <header class="section-heading">
          <h3>Other Badge Types</h3>
        </header>

        <? foreach ($altBadges as $card): ?>
        <section class="alt-badge-card">
          <div class="card-liner">
            <div class="card-content">
              <? if ($card['headline']): ?>
              <h4><?=$card['headline']?></h4>
              <? endif; ?>
              <? if ($card['description']): ?>
              <p><?=$card['description']?></p>
              <? endif; ?>
              <? if ($card['action_buttons']): foreach ($card['action_buttons'] as $btn): ?>
              <? if (isset($_COOKIE["affiliate"])) {
                $btnLink = $btn['link']."?aff=".$_COOKIE["affiliate"];
              } else {
                $btnLink = $btn['link'];
              }
              ?>
              <a href="<?=$btnLink?>" class="btn"><?=$btn['title']?></a>
              <? endforeach; endif; ?>
            </div>
          </div>
        </section>
        <? endforeach; ?>
      </section>


      <section class="sponsor-thank-you">
        <header class="section-heading">
          <h3><?=$sponsor_thank_you_headline?></h3>
        </header>
        <ul>
          <? foreach($sponsorThankYous as $ty): ?>
          <li><?=$ty?></li>
          <? endforeach; ?>
        </ul>
      </section>


    </section>
    <div class="clearfix"></div>
  </div>
  <style>

  @media only screen and (max-width: 600px) {
    .registration .badge-pickup-hours .day-block {
      display: block;
    }
  }

  </style>

</div>
