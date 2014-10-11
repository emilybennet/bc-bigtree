<?
  $billboardMod = new homePageBillboard();
  $billboards = $billboardMod->getApproved('position DESC');

  $anonPony = $cms->getSetting('anonymous-avatar');

  $guestsMod = new bcGuests();
  $guests = $guestsMod->getMatching(
    array('approved','featured'),
    array('on','on'),
    'position DESC');
?>      
      <section class="billboard">
        <section class="billboard reveal" style="color:white;">
          <div class="slides">
            <?
              $slideNo = 1;
              foreach ($billboards as $slide):
                $slideName = $cms->urlify($slide['admin_name']);
            ?>

            <?
              $slideAttr = "";

              if ($slide['background_image']) {
                $slideAttr .= 'data-background="'.$slide['background_image'].'"';
              }

              if ($slide['background_color']) {
                $slideAttr .= ' data-background-color="'.$slide['background_color'].'"';
              }

              if ($slide['content_color']) {
                $slideAttr .= ' data-content-color="'.$slide['content_color'].'"';
              } else {
                $slideAttr .= ' data-content-color="white"';
              }

              if ($slide['mobile_bg_pos_x']) {
                $slideAttr .= ' data-mobile-bg-position-x="'.$slide['mobile_bg_pos_x'].'"';
              } else {
                $slideAttr .= ' data-mobile-bg-position-x="50%"';
              }

              if ($slide['style_background_cover'] == "on") {
                $slideAttr .= ' data-background-size="cover"';
              }

              if ($slide['style_background_position']) {
                $slideAttr .= ' data-background-position="'.$slide['style_background_position'].'"';
              }
            ?>

            <section class="slide <?=$slideName?>" <?=$slideAttr?>>

              <? if (!empty($slide['foreground_image'])): ?>
                <img src="<?=$slide['foreground_image']?>" class="foreground" />
              <? endif; ?>

              <div class="slide-liner">
                <div class="slide-content <?=$slide['content_position']?>">

                <? if (!empty($slide['headline'])): ?>
                  <h1><span><?=$slide['headline']?></span></h1>
                <? endif; ?>
                
                <? if (!empty($slide['sub_heading'])): ?>
                  <p><?=$slide['sub_heading']?></p>
                <? endif; ?>

                <? 
                  if (!empty($slide['action_buttons'])):
                    if (!empty($slide['btn_color'])) { 
                      $btnColor = $slide['btn_color'];
                    } else { 
                      $btnColor = 'btn-white';
                    }
                    foreach($slide['action_buttons'] as $btn): 
                ?>
                  <a href="<?=$btn['link']?>" class="btn <?=$btnColor?> btn-<?=$slideName?>"><?=$btn['title']?></a>
                <? endforeach; endif; ?>

                <style>
                  <? if ($slide['mobile_bg_pos_x']): ?>
                    .reveal .backgrounds .slide-background:nth-child(<?=$slideNo?>) {
                      background-position: <?=$slide['mobile_bg_pos_x']?> 100% !important;
                    }
                    @media only screen and (min-width: 960px) {
                      .reveal .backgrounds .slide-background:nth-child(<?=$slideNo?>) {
                        background-position: 50% 100% !important;
                      }
                    }  
                  <? endif; ?>

                  @media only screen and (min-width: 960px) {
                    .slide.<?=$slideName?> .slide-content {
                      color:<?=($slide['content_color'])?$slide['content_color']:'white'?>;
                    }
                  }    
                </style>

                <? if (!empty($slide['custom_css'])): ?>
                  <style><?=str_replace("{{billboard_class}}", $slideName, $slide['custom_css'])?></style>
                <? endif; ?>
                </div>
              </div>
            </section>

            <? $slideNo++; endforeach; ?>

          </div>
          <? if (count($billboards) > 1): ?>
          <div class="paginate left">
            <span class="glyphicon-font">&#xe225;</span>
          </div>
          <div class="paginate right">
            <span class="glyphicon-font">&#xe224;</span>
          </div>
          <? endif; ?>
        </section>
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