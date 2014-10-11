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
?>

<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

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
      
      <? if ($schedule_notice): ?>
      <div class="alert info"><?=$schedule_notice?></div>
      <? endif; ?>

      <? foreach ($events as $day => $e): ?>

      <? if ($day == "friday") {
        $dTitle = "Friday, August 1st";
      } elseif ($day == "saturday") {
        $dTitle = "Saturday, August 2nd";
      } else {
        $dTitle = "Sunday, August 3rd";
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
        <? endif ?>
          <li style="border-color: <?=$event['color_code']?>;" data-event-name="<?=$event['event_name']?>" data-start-time="<?=date("n/j/Y g:i a",strtotime($event['start_time']))?>" data-end-time="<?=date("n/j/Y g:i a",strtotime($event['end_time']))?>" data-location="<?=$event['location_name']?>" data-track="<?=$event['track_name']?>" data-description="<?=htmlentities($event['description'])?>">
            <span class="location" style="background-color: <?=$event['color_code']?>"><?=$event["short_code"]?></span>
            <span class="event-name"><?=$event["event_name"]?></span>
          </li>
        <? endforeach; ?>
      </fieldset>

      <? endforeach; ?>

    </section>
    <div class="clearfix"></div>
  </div>

</div>