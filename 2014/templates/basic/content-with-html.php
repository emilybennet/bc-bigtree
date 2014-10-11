<?
  if ($forceNoNav != true) {
    $currentPage = $page['link'];
    $topLevel = $cms->getToplevelNavigationId();
    $pageNav = $cms->getNavByParent($topLevel, 2);
  }

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);
?>

<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

  <div class="wrap content-page <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
      <?=$page_content?>
      <? if ($custom_html): ?>
      <?=htmlspecialchars_decode($custom_html)?>
      <? endif; ?>
    </section>
    <div class="clearfix"></div>
  </div>

</div>