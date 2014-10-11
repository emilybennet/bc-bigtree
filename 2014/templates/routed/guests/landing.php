<?
  $guests = $guestsMod->getGuests();

  $guestsThird = array();
  $guestsSecond = array();
  $guestsOne = array();
  $i = 1;

  foreach ($guests as $guest) {
    if (empty($guest['bronycon_pony_avatar'])) {
      $guest['bronycon_pony_avatar'] = $anonPony;
    }
    if ($i == 3) {
      array_push($guestsThird, $guest);
    } elseif ($i == 2) {
      array_push($guestsSecond, $guest);
    } else {
      array_push($guestsOne, $guest);
    }
    if ($i == 3) {
      $i = 1;
    } else {
      $i++;
    }
  }
?>

<header class="page-header">
  <h2><?=$page_headline?></h2>
</header>

<? if (!empty($guests)): ?>

<section class="bronycon-guests guest-filmstrips">
  <div class="filmstrip left">
  <? foreach ($guestsOne as $guest): ?>
    <div class="guest-card">
      <a href="<?=$page['link'].$guest['route']?>">
        <div class="image-group">
          <img class="front" src="<?=$guest['press_photo']?>" />
          <img class="back" src="<?=$guest['bronycon_pony_avatar']?>" />
        </div>
        <div class="heading-group">
          <h3>
            <?=$guest['name']?>
            <small><?=$guest['role'].' • '.$guest['category']?></small>
          </h3>
        </div>
      </a>
    </div>
  <? endforeach; ?>
  </div>
  <div class="filmstrip center">
  <? foreach ($guestsSecond as $guest): ?>
    <div class="guest-card">
      <a href="<?=$page['link'].$guest['route']?>">
        <div class="image-group">
          <img class="front" src="<?=$guest['press_photo']?>" />
          <img class="back" src="<?=$guest['bronycon_pony_avatar']?>" />
        </div>
        <div class="heading-group">
          <h3>
            <?=$guest['name']?>
            <small><?=$guest['role'].' • '.$guest['category']?></small>
          </h3>
        </div>
      </a>
    </div>
  <? endforeach; ?>
  </div>
  <div class="filmstrip right">
  <? foreach ($guestsThird as $guest): ?>
    <div class="guest-card">
      <a href="<?=$page['link'].$guest['route']?>">
        <div class="image-group">
          <img class="front" src="<?=$guest['press_photo']?>" />
          <img class="back" src="<?=$guest['bronycon_pony_avatar']?>" />
        </div>
        <div class="heading-group">
          <h3>
            <?=$guest['name']?>
            <small><?=$guest['role'].' • '.$guest['category']?></small>
          </h3>
        </div>
      </a>
    </div>
  <? endforeach; ?>
  </div>
    <div class="clearfix"></div>
</section>


<? else: ?>
<p> Looks like no-pony has been announced yet, check back soon!</p>
<? endif; ?>