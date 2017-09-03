<?
  if ($forceNoNav != true) {
    $currentPage = $page['link'];
    $topLevel = $cms->getToplevelNavigationId();
    $pageNav = $cms->getNavByParent($topLevel, 2);
  }

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $scheduleMod = new scheduledEvents();
  $events = $scheduleMod->getSchedule();

  if ($pageHeader['social_media_image']) {
    $customOpenGraphImage = $pageHeader['social_media_image'];
  }

  $Parsedown = new Parsedown();
?>

<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content header-band-bump">

  <div id="events-schedule" class="wrap content-page events-schedule <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>

      <section class="convention-hours" style="margin-bottom:40px;">
        <div class="reg-hours">
          <div>
            <h3>Registration</br> &amp; Badge Pickup</h3>
            <ul>
              <li><span class="day-block" style="width:160px;">Thursday, Aug 10</span> 3&ndash;10pm <small>(pre-reg only)</small></li>
              <li><span class="day-block" style="width:160px;">Friday, Aug 11</span> 8am&ndash;10pm</li>
              <li><span class="day-block" style="width:160px;">Saturday, Aug 12</span> 9am&ndash;8pm</li>
              <li><span class="day-block" style="width:160px;">Sunday, Aug 13</span> 9am&ndash;1pm</li>
            </ul>
          </div>
        </div>
        <div class="marketplace-hours">
          <div>
            <h3>Blank Canvas's<br/> Marketplace</h3>
            <ul>
              <li>&nbsp;</li>
              <li><span class="day-block" style="width:160px;">Friday, Aug 11</span> 10am&ndash;6pm</li>
              <li><span class="day-block" style="width:160px;">Saturday, Aug 12</span> 10am&ndash;6pm</li>
              <li><span class="day-block" style="width:160px;">Sunday, Aug 13</span> 10am&ndash;4pm</li>
            </ul>
          </div>
        </div>
      </section>

      <? if ($schedule_notice): ?>
      <div class="alert info"><?=$schedule_notice?></div>
      <? endif; ?>

      <? foreach ($events as $day => $e): ?>

      <? if ($day == "friday") {
        $dTitle = "Friday, August 11";
      } elseif ($day == "saturday") {
        $dTitle = "Saturday, August 12";
      } else {
        $dTitle = "Sunday, August 13";
      }

      ?>

      <fieldset>
        <legend><?=$dTitle?></legend>

        <?
          $cTime = "";
          foreach ($e as $event):
            $eStartTime = date("g:i a", strtotime($event["start_time"]));
        ?>

        <? if ($cTime != $eStartTime): ?>
          <? if ($cTime != ""): ?>
            </ul>
            </section>
          <? endif; ?>

          <section class="time-block">
          <h4><?=$eStartTime?></h4>
          <ul class="events unstyled">
          <? $cTime = $eStartTime; ?>
        <? endif; ?>
        <?
        $desc = $event['description'];

        if ($event['fee']) {
            $desc .= ' $'.$event['fee'].' entry fee.';
        }
        if ($event['space_limited']) {
            $desc .= ' Space limited.';
        }

        if ($event['mature'] == 1) {
            $desc .= "\n\n &Up (21+) only. ID required.";
        }
        if ($event['location_name'] == "Crusaders' Clubhouse") {
            $desc .= "\n\n Kids & famlies only!";
        }
        ?>
            <li style="border-color: <?=$event['color_code']?>;"
                data-event-name="<?=$event['event_name']?>"
                data-start-time="<?=date("n/j/Y g:i a",strtotime($event['start_time']))?>"
                data-end-time="<?=date("n/j/Y g:i a",strtotime($event['end_time']))?>"
                data-location="<?=$event['location_name']?>"
                data-description="<?=htmlspecialchars($Parsedown->text($desc))?>">
                  <span class="location" style="background-color: <?=$event['color_code']?>"><?=$event["short_code"]?></span>
                  <span class="event-name"><?=$event["event_name"]?></span>
            </li>
        <? endforeach; ?>
      </fieldset>

      <? endforeach; ?>

    </section>
    <div class="clearfix"></div>
  </div>
  <style>
    .bronycon-tooltip a {
        color: white;
        border-bottom: 1px dotted white;
    }
  </style>
</div>
