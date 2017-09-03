<?
  $guest = $guestsMod->getByRoute($commands[0]);
  $autographTimes = $guestsMod->getAutographTimes($guest['id']);
  $scheduledEvents = $guestsMod->getGuestEvents($guest['id']);
  $guestNameChunks = explode(' ', $guest['name']);
  $customPageDesc = substr(strip_tags($guest['short_bio']), 0, 135);

  $secondsPerDay = 86400;
  $currentDay = '';


  if (strlen($guest['short_bio']) > 135) {
    $customPageDesc .= "…";
  }

  if (empty($guest['bronycon_pony_avatar'])) {
    $ponyAvatar = $anonPony;
  } else {
    $ponyAvatar = $guest['bronycon_pony_avatar'];
  }
?>

<? if ($guest == false):?>
  <? $cms->handle404(str_ireplace(WWW_ROOT,"",BigTree::currentURL())); ?>
  <section class="the-meat">
    <header class="page-header">
      <h2>404 Page Not Found</h2>
    </header>
    Welp, this is awkward.
  </section>
<? else: ?>

<div class="wrap content-page">
  <section class="the-meat">

    <header class="page-header">
      <h2><?=$guest['name']?></h2>
      <a href="<?=$page['link']?>" class="breadcrumb">&larr; More BronyCon 2017 Guests</a>
    </header>

    <section id="<?=$guest['route']?>" class="guests single-guest bronycon-guests">
      <div class="image-group">
        <img class="front" src="<?=$guest['press_photo']?>" />
        <img class="back" src="<?=$ponyAvatar?>" />
      </div>

      <div class="guest-bio">
        <?=$guest['short_bio']?>
      </div>

      <div class="clearfix"></div>
    </section>

  </section>

  <div class="clearfix"></div>
</div>

<? endif; ?>
