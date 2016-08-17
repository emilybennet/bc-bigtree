<?
  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $registrationBadgesMod = new registrationBadges(true);
  $perksByBadges = json_decode($registrationBadgesMod->getRegistration('badges'), true);
  $badgesByPerks = json_decode($registrationBadgesMod->getRegistration('perks'), true);
  $altBadges = json_decode($registrationBadgesMod->getRegistration('altbadges'), true);

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
      <section class="sale-banner muffin-sale" style="color:#5A3791;">
        <?=$sale_notice?>
      </section>
      <? endif; ?>

      <section class="badge-type-list visible-xs">
        <? foreach ($perksByBadges as $badge): ?>


        <section class="badge-card">
          <header>
            <span class="label"><?=$badge['badge_name']?></span>
            <span class="price"><?=$badge['badge_price']?></span>
            <? if ($badge['registration_url'] && $badge['sold_out'] == false): ?>
            <? 
              $regURL = $badge['registration_url'];
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
                <? if ($perk == "2015 limited edition t-shirt"): ?>
                  <? if ($badge["tshirt_included"] == "on"): ?>
                  : Included!
                  <? else: ?>
                  : Available as Add-on.
                  <? endif; ?>
                <? elseif ($perk == "Anypony autograph voucher"): ?>
                  <?=': '.$badge["anypony_voucher_qty"].' voucher(s)';?>
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
              <?
                $regURL = $badge['registration_url'];
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


      <section class="other-badges">
        <header class="section-heading">
          <h3><?=$page_alt_headline?></h3>
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
              <?
                $btnLink = $btn['link'];
              ?>
              <a href="<?=$btnLink?>" class="btn"><?=$btn['title']?></a>
              <? endforeach; endif; ?>
            </div>
          </div>
        </section>
        <? endforeach; ?>

      </section>
    </section>
    <div class="clearfix"></div>
  </div>

</div>
