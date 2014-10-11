<?
  $guest = $guestsMod->getByRoute($commands[0]);

  if (empty($guest['bronycon_pony_avatar'])) {
    $ponyAvatar = $anonPony;
  } else {
    $ponyAvatar = $guest['bronycon_pony_avatar'];
  }
?>

<? if ($guest == false):?>
  <? $cms->handle404(str_ireplace(WWW_ROOT,"",BigTree::currentURL())); ?>
  <section class="the-meat">
    <header class="page-header">
      <h2>404 Page Not Found</h2>
    </header>
    Welp, this is awkward.
  </section>
<? else: ?>



<header class="page-header">
  <h2><?=$guest['name']?></h2>
  <a href="<?=$page['link']?>" class="breadcrumb">&larr; More BronyCon 2014 Guests</a>
</header>

<section id="<?=$guest['route']?>" class="guests single-guest bronycon-guests">
  <div class="image-group">
    <img class="front" src="<?=$guest['press_photo']?>" />
    <img class="back" src="<?=$ponyAvatar?>" />
  </div>

  <div class="guest-bio">
    <?=$guest['short_bio']?>
  </div>

  <div class="clearfix"></div>
</section>

<? endif; ?>