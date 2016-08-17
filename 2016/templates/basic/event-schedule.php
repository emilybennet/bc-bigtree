<?
  if ($forceNoNav != true) {
    $currentPage = $page['link'];
    $topLevel = $cms->getToplevelNavigationId();
    $pageNav = $cms->getNavByParent($topLevel, 2);
  }

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  if ($pageHeader['social_media_image']) {
    $customOpenGraphImage = $pageHeader['social_media_image'];
  }

  $scheduleMod = new scheduledEvents();
  $events = $scheduleMod->getEventsCalendar();

  $Parsedown = new Parsedown();
?>

<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content header-band-bump">

  <div class="wrap content-page wide-load schedule-calendar-page">

    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>

    <section class="convention-hours">
      <div class="reg-hours">
        <div>
          <h3>Registration &amp; Badge Pickup</h3>
          <ul>
            <li><span class="day-block" style="width:160px;">Thursday, July 7th</span> 2&ndash;10pm <small>(pre-reg only)</small></li>
            <li><span class="day-block" style="width:160px;">Friday, July 8th</span> 8am&ndash;10pm</li>
            <li><span class="day-block" style="width:160px;">Saturday, July 9th</span> 9am&ndash;10pm</li>
            <li><span class="day-block" style="width:160px;">Sunday, July 10th</span> 9am&ndash;1pm</li>
          </ul>
        </div>
      </div>
      <div class="marketplace-hours">
        <div>
          <h3>Blank Canvas's Marketplace</h3>
          <ul>
            <li>&nbsp;</li>
            <li><span class="day-block" style="width:160px;">Friday, July 8th</span> 10am&ndash;6pm</li>
            <li><span class="day-block" style="width:160px;">Saturday, July 9th</span> 10am&ndash;6pm</li>
            <li><span class="day-block" style="width:160px;">Sunday, July 10th</span> 10am&ndash;4pm</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="schedule-mode-toggle">
      <p>Use your trackpad or arrow keys to navigate!</p>
      <a href="/events/schedule-agenda/" class="btn btn-lg btn-fill-azure">Looking For The Agenda View?</a>
    </section>

    </section>
    <div class="clearfix"></div>

  </div>



      <section id="events-schedule" class="mega-schedule">
      <? foreach ($events as $conday): ?>
        <header class="schedule-day">
          <h2><?=date("l, F j, Y",strtotime($conday['day_begins']))?></h2>
        </header>

        <header class="schedule-structure">
          <section class="column time-scale"></section>

        <? foreach ($conday["locations"] as $loc): ?>
          <? if ($loc['location_name'] == "Harmony Plaza - Stabletop Games"): ?>
          <section class="column room" style="min-width:350px;">
          <? else: ?>
          <section class="column room">
          <? endif; ?>
            <?=$loc['location_name']?>
            <small><?=$loc['bcc_room_number']?></small>
          </section>
        <? endforeach; ?>

        </header>

        <div class="schedule-structure event-things">
          <section class="column time-scale">
            <ul class="time-slots">
              <? for ($i = 0; $i < $conday['totalHours']; $i++): ?>
              <li class="time-slot"><?=date('ga',strtotime($conday['day_begins'])+3600*$i)?></li>
              <li class="time-slot"></li>
              <? endfor; ?>
            </ul>
          </section>

        <? foreach ($conday["locations"] as $loc): ?>
          <? if ($loc['location_name'] == "Harmony Plaza - Stabletop Games"): ?>
          <section class="column room" style="min-width:350px;">
          <? else: ?>
          <section class="column room">
          <? endif; ?>
            <ul class="time-slots">
              <? for ($i = 0; $i < $conday['totalHours']*2; $i++): ?>
              <li class="time-slot"></li>
              <? endfor; ?>
            </ul>

          <? foreach ($loc['events'] as $eId => $ev): ?>

            <?
            $desc = $ev['description'];

            if ($ev['fee']) {
              $desc .= ' $'.$ev['fee'].' entry fee.';
            }
            if ($ev['space_limited']) {
              $desc .= ' Space limited.';
            }

            if ($ev['mature'] == 1) {
              $desc .= "\n\n &Up (21+) only. ID required.";
            }
            if ($ev['location_name'] == "Crusaders' Clubhouse") {
              $desc .= "\n\n Kids & famlies only!";
            }
            ?>

            <div class="event event-tooltip" style="
                                top:<?=$ev['percentFromTop']?>%;
                                height:<?=$ev['eventBlockHeight']?>%;
                                width:<?= floor( (1 / $ev['numColumns']) * 100 ) ?>%;
                                left:<?= ($ev['leftIndex'] * (1 / $ev['numColumns']) * 100) ?>%;
                                background-color:#C3DAE5;"
                        data-event-name="<?=$ev['event_name']?>"
                        data-start-time="<?=date("n/j/Y g:i a",strtotime($ev['start_time']))?>"
                        data-end-time="<?=date("n/j/Y g:i a",strtotime($ev['end_time']))?>"
                        data-location="<?=$ev['location_name']?>"
                        data-description="<?=htmlspecialchars($Parsedown->text($desc))?>">
              <span class="event-name"><?=$ev['event_name']?></span>
            </div>
          <? endforeach; ?>
          </section>
        <? endforeach; ?>

        </div>

      <? endforeach; ?>
      </section>


<style>
  .bronycon-tooltip a {
      color: white;
      border-bottom: 1px dotted white;
  }
</style>

</div>
