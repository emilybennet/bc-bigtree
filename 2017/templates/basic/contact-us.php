<?
  $currentPage = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $topLevel = $cms->getToplevelNavigationId();
  $pageNav = $cms->getNavByParent($topLevel, 2);

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  if ($pageHeader['social_media_image']) {
    $customOpenGraphImage = $pageHeader['social_media_image'];
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

    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
      <?=$page_content?>

      <? if ($contact_methods): ?>
      <section class="contact-methods">
        <? foreach ($contact_methods as $card): ?>
        <section class="quad-card contact-cards" data-address="<?=$card['address']?>">
          <div class="card-liner">
            <div class="card-content">
              <? if ($card['title']): ?>
              <h5><?=$card['title']?></h5>
              <? endif; ?>
              <? if ($card['address']): ?>
              <p><?=$card['address']?></p>
              <? endif; ?>
            </div>
          </div>
        </section>
        <? endforeach; ?>
      </section>
    <? endif; ?>

    </section>


    <div class="clearfix"></div>
  </div>

</div>

<script>
  head.ready(function() {
    $('.contact-cards').click(function(){
      location.href = 'mailto:'+$(this).data('address');
    });
  });
</script>