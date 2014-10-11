<?
  $currentPage = $page['link'];
  $topLevel = $cms->getToplevelNavigationId();
  $pageNav = $cms->getNavByParent($topLevel, 2);

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $pressReleasesMod = new pressReleases();
  $mediaContactsMod = new mediaContacts();

?>

<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

  <div class="wrap content-page press-releases <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <? if ($commands && $commands[0] != 'page'){
      require('article.php');
    } else {
      require('landing.php'); 
    } ?>

    <div class="clearfix"></div>
  </div>

</div>