<?
  $anonPony = $cms->getSetting('anonymous-avatar');

  $guestsMod = new bcGuests();
  $guests = $guestsMod->getMatching(
    array('approved','featured'),
    array('on','on'),
    'position DESC');
?>      
      <section class="home-theater">
        <? if ($video_disabled):?>
          <div class="video-offline">
            <? if ($video_disabled_text): ?>
              <h3><?=$video_disabled_text?></h3>
            <? endif; ?>
          </div>
        <? else: ?>
        <iframe class="video-viewer" src="<?=$video_url?>" frameborder="0" allowfullscreen></iframe>
        <? endif; ?>

        <? if ($bottom_cards): ?>
        <? if (count($bottom_cards) % 3 == 0) {
          $theaterCardLayout = "layout-thirds";
        } else {
          $theaterCardLayout = "layout-halfs";
        }
        ?>
        <section class="theater-cards <?=$theaterCardLayout?>">
          <? foreach ($bottom_cards as $card): ?>
          <div class="card">
            <div class="image-tease" <?=($card["image_url"])?'style="background-image: url('.$card["image_url"].')"':''?>>
            </div>
            <h5><?=$card["title"]?></h5>
            <div class="action-buttons">
              <? if ($card["link_text"] && $card["link_url"]): ?>
                <a href="<?=$card["link_url"]?>" <?=($card["link_new_window"])?'target="blank"':''?> class="btn btn-fill-white btn-lg"><?=$card["link_text"]?></a>
              <? endif; ?>
            </div>
          </div>
          <? endforeach; ?>
          <div class="clearfix"></div>
        </section>
        <? endif; ?>

      </section>

      <div class="content">

        <section class="dateline blue-band">
          <div class="wrap">
            <h2><?=$dateline?></h2>
            <p><?=$elevator?></p>
            <? if ($register_url): ?>
            <div class="button-box">
              <a href="<?=$register_url?>" class="btn btn-white btn-lg register-btn">Register Now</a>
            </div>
            <? endif; ?>
          </div>
        </section>


        <? if (!empty($guests)): ?>
        <section class="guests">
          <header class="section-heading">
            <h3>Featuring Special Guests</h3>
          </header>
          <ul class="guests unstyled">
            <? foreach ($guests as $guest): ?>
            <?
              if (empty($guest['bronycon_pony_avatar'])) {
                $ponyAvatar = $anonPony;
              } else {
                $ponyAvatar = $guest['bronycon_pony_avatar'];
              }
            ?>
            <li>
              <div class="image-group">
                <a href="/guests">
                  <img class="front" src="<?=$guest['press_photo']?>" />
                  <img class="back" src="<?=$ponyAvatar?>" />
                </a>
              </div>
              <h3>
                <a href="/guests">
                  <?=$guest['name']?>
                </a>
              </h3>
            </li>
            <? endforeach; ?>
          </ul>
        </section>
        <? endif; ?>

      </div>