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

  $eventGroups = [];
  foreach ($page['resources']['activities'] as $ev) {
      $group = $ev['event_group'];

      $eventGroups[$group][sizeof($eventGroups[$group])] = $ev;
  }
?>

<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content header-band-bump">

  <div class="wrap content-page <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <section class="the-meat volunteer-staff">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
      <?=$page_content?>


      <? if ($eventGroups): ?>
      <? foreach ($eventGroups as $group => $events): ?>

      <fieldset id="<?=$cms->urlify($group)?>">
        <legend><?=$group?></legend>
        <? foreach ($events as $ev): ?>
          <div class="role">
            <div>
              <h6><?=$ev['event_name']?></h6>
              <? if ($ev['event_reg_url']): ?>
                  <a href="<?=$ev['event_reg_url']?>" class="btn btn-sm btn-fill-orange event-track event-reg-btn" target="_blank"><?=$ev['event_reg_btn_txt']?></a>
              <? elseif ($ev['event_reg_btn_txt']): ?>
                  <span class="btn btn-sm btn-grey btn-disabled event-track"><?=$ev['event_reg_btn_txt']?></span>
              <? endif; ?>
            </div>

            <div class="role-description">
              <?=$ev['event_desc']?>
            </div>
          </div>
        <? endforeach; ?>
      </fieldset>

      <? endforeach; ?>
      <? endif; ?>

    </section>
    <div class="clearfix"></div>
  </div>

<style>

@media only screen and (max-width: 600px) {
  .volunteer-staff .role .btn-sm {
    display: inline-block;
    position: relative;
  }
}

</style>

</div>
