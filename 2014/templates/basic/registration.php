<?
  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $registrationBadgesMod = new registrationBadges();
  $perksByBadges = json_decode($registrationBadgesMod->getRegistration('badges'), true);
  $badgesByPerks = json_decode($registrationBadgesMod->getRegistration('perks'), true);
  $altBadges = json_decode($registrationBadgesMod->getRegistration('altbadges'), true);
?>

<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>
      
<div class="content">
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
            <li><?=$perk?></li>
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
                <?=(in_array($badgeType, $perk['badges']))?'<span class="check">&#xe207;</span>':'&nbsp;'?>
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
    </section>
    <div class="clearfix"></div>
  </div>

</div>
