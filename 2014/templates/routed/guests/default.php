<?
  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $guestsMod = new bcGuests();

  $anonPony = $cms->getSetting('anonymous-avatar');

?>


<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

  <div class="wrap content-page">
    <section class="the-meat">

    <? if ($commands && $commands[0] != 'page'){
      require('guest.php');
    } else {
      require('landing.php'); 
    } ?>

    </section>

    <div class="clearfix"></div>
  </div>

</div>