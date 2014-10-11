<?
  $currentPage = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $topLevel = $cms->getToplevelNavigationId();
  $pageNav = $cms->getNavByParent($topLevel, 2);

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
            <iframe src="http://webchat.irchighway.net/?channels=bronycon" class="irc-chat"></iframe>
          </section>
          <div class="clearfix"></div>
        </div>

      </div>