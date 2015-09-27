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
            <li><span class="day-block">Thursday, August 6th</span> 2&ndash;10pm <small>(pre-reg only)</small></li>
            <li><span class="day-block">Friday, August 7th</span> 8am&ndash;10pm</li>
            <li><span class="day-block">Saturday, August 8th</span> 9am&ndash;10pm</li>
            <li><span class="day-block">Sunday, August 9th</span> 9am&ndash;1pm</li>
          </ul>          
        </div>
      </div>
      <div class="marketplace-hours">
        <div>
          <h3>Blank Canvas's Marketplace</h3>
          <ul>
            <li>&nbsp;</li>
            <li><span class="day-block">Friday, August 7th</span> 10am&ndash;6pm</li>
            <li><span class="day-block">Saturday, August 8th</span> 10am&ndash;6pm</li>
            <li><span class="day-block">Sunday, August 9th</span> 10am&ndash;4pm</li>
          </ul>          
        </div>
      </div>
    </section>

    <section class="schedule-mode-toggle">
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
          <section class="column room">
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
          <section class="column room">
            <ul class="time-slots">
              <? for ($i = 0; $i < $conday['totalHours']*2; $i++): ?>
              <li class="time-slot"></li>
              <? endfor; ?>
            </ul>

          <? foreach ($loc['events'] as $eId => $ev): ?>
            <div class="event event-tooltip" style="
                                top:<?=$ev['percentFromTop']?>%;
                                height:<?=$ev['eventBlockHeight']?>%;
                                width:<?= floor( (1 / $ev['numColumns']) * 100 ) ?>%;
                                left:<?= ($ev['leftIndex'] * (1 / $ev['numColumns']) * 100) ?>%;"
                        data-event-name="<?=$ev['event_name']?>"
                        data-start-time="<?=date("n/j/Y g:i a",strtotime($ev['start_time']))?>" 
                        data-end-time="<?=date("n/j/Y g:i a",strtotime($ev['end_time']))?>" 
                        data-location="<?=$ev['location_name']?>" 
                        data-track="<?=$ev['track_name']?>" 
                        data-description="<?="<p>".htmlspecialchars($ev['description'])."</p>"?>">
              <span class="event-name"><?=$ev['event_name']?></span>
              <span class="event-track" style="background:<?=$ev['track_color']?>;" title="<?=$ev['track_name']?>"></span>
            </div>
          <? endforeach; ?>
          </section>
        <? endforeach; ?>

        </div>

      <? endforeach; ?>
      </section>
      



</div>