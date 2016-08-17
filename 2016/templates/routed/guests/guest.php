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
      <a href="<?=$page['link']?>" class="breadcrumb">&larr; More BronyCon 2016 Guests</a>
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

    <section class="guest-schedule">
      <div class="autographs">
        <div>
          <h3>Autographs</h3>
          <?
            foreach ($autographTimes as $at) {
              $atDay = date('l, F j', strtotime($at['start_time']));
              $atStart = date('g:ia', strtotime($at['start_time']));
              $atEnd = date('g:ia', strtotime($at['end_time']));
              if ($atDay != $currentDay) {
                if ($currentDay != '') {
                  echo '</ul>';
                }
                $currentDay = $atDay;
                echo '<h4 class="day-block">'.$currentDay.'</h4>';
                echo '<ul>';
              }
              echo '<li>'.$atStart.'&ndash;'.$atEnd.'</li>';
            }
            if ($autographTimes) {
              echo '</ul>';
            } ?>
            <? if ($guest['vending_vip']): ?>
              <span class="alert info"><?=$guestNameChunks[0]?> doesn't have set autograph hours, but you can find <?=($guestNameChunks[0] == "Sara" || $guestNameChunks[0] == "Jenn") ? 'her' : 'him';?> at the IDW Comic Team booth in the Marketplace!</span>
            <? endif; ?>
        </div>
      </div>
      <div class="events">
        <div>
          <h3>See <?=$guestNameChunks[0];?> At</h3>
          <? if ($scheduledEvents): ?>
          <?
            foreach ($scheduledEvents as $se) {
              $atDay = date('l, F j', strtotime($se['start_time']));
              $atStart = date('g:ia', strtotime($se['start_time']));
              $atEnd = date('g:ia', strtotime($se['end_time']));
              if ($atDay != $currentDay) {
                if ($currentDay != '') {
                  echo '</ul>';
                }
                $currentDay = $atDay;
                echo '<h4 class="day-block">'.$currentDay.'</h4>';
                echo '<ul>';
              }
              echo '<li>'.$se['event_name'].
                '<small>'.$se['location_name'].' • '.$atStart.'&ndash;'.$atEnd.'</small></li>';
            }
            if ($autographTimes) {
              echo '</ul>';
            }
          ?>
          <? else: ?>
            <ul>
                <li>Specific guest schedule coming soon.</li>
            </ul>
          <? endif; ?>
        </div>
      </div>
    </section>

  </section>

  <div class="clearfix"></div>
</div>

<? endif; ?>
