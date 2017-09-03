<?
  $billboardMod = new homePageBillboard();
  $billboards = $billboardMod->getApproved('position DESC');

  $anonPony = $cms->getSetting('anonymous-avatar');

  $guestsMod = new bcGuests();
  $guests = $guestsMod->getMatching(
    array('approved','featured'),
    array('on','on'),
    'position DESC');


  // look up user location

  if (isset($_GET["loc"])) {
    $userIP = $_GET["loc"];
  } else {
    if ($_SERVER["HTTP_X_FORWARDED_FOR"]) {
      $userIP = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    else {
      $userIP = $_SERVER["REMOTE_ADDR"];
    }
  }

  $location = BigTree::cURL("https://freegeoip.net/json/".$userIP);
  $location = json_decode($location, true);

  $noLocation = "subject_home_town";
  
  if ($location["city"] == "Baltimore") {
    if ($location["region_name"] == "Maryland") {
      $useLocation = "Washington, D.C.";
    } elseif ($location["region_name"] != "") {
      $useLocation = $location["region_name"];
    } elseif ($location["country_name"] != "") {
      $useLocation = $location["country_name"];
    } else {
      $useLocation = $noLocation;
    }
  } elseif ($location["city"] != "") {
    $useLocation = $location["city"];
  } elseif ($location["region_name"] != "") {
    $useLocation = $location["region_name"];
  } elseif ($location["country_name"] != "") {
    $useLocation = $location["country_name"];
  } else {
    $useLocation = $noLocation;
  }

  locationLog($useLocation);

?>      
      <section class="billboard">
        <section class="billboard reveal" style="color:white;">
          <div class="slides">

            <section class="slide bronycon-at-home" data-background="http://b96a4c884004e7dab852-e9bf520477454cf2fc78069e06695a63.r7.cf2.rackcdn.com/20140401-bronycon-at-home-bg.png" data-background-color="#31569A" data-content-color="white" data-mobile-bg-position-x="0px" data-background-size="cover">
              <img src="http://b96a4c884004e7dab852-e9bf520477454cf2fc78069e06695a63.r7.cf2.rackcdn.com/20140401-bronycon-at-home-fg.png" alt="BronyCon @ Home" class="fg" />

              <div class="slide-liner">
                <div class="slide-content">
                  <h1>
                    <span>
                      <small>Introducing BronyCon</small>
                      <?=$useLocation?>!
                    </span>
                  </h1>
                  <p>The new BronyCon @ Home Kit is a neatly packaged box with everything you need to throw your own pony convention in the comfort of your home. Just add 10,000 friends!</p>

                  <a href="/ajax/order" class="btn btn-lg btn-white" rel="modal:open">Grab yours today!</a>

                </div>
              </div>
              <style>

                .slide.bronycon-at-home .slide-liner {
                  padding-top: 125px;
                  max-width: 1000px;
                }

                .slide.bronycon-at-home h1 small {
                  display:block;
                  font-size: 25px;
                  line-height: 25px;
                }

                .slide.bronycon-at-home p {
                  font-size: 11px;
                  line-height: 1.23;
                }

                .slide.bronycon-at-home img.fg {
                    position: absolute;
                    left: 50%;
                    margin-top: 60px;
                    -webkit-transform: translateX(-50%);
                    -ms-transform: translateX(-50%);
                    transform: translateX(-50%);
                    width: 80%;
                  }


                @media only screen and (min-width: 960px) {
                  .slide.bronycon-at-home img.fg {
                    position: absolute;
                    bottom: -50px;
                    right: -50px;
                    width: 600px;
                    -webkit-transform: none;
                    -ms-transform: none;
                    transform: none;
                  }

                  .billboard .slide-content {
                    width: 55%;
                  }

                  .slide.bronycon-at-home h1 {
                    font-size: 60px;
                    line-height: 60px;
                    margin-bottom: 40px;
                  }

                  .slide.bronycon-at-home h1 small {
                    display:block;
                    font-size: 25px;
                    line-height: 25px;
                  }

                  .slide.bronycon-at-home p {
                    font-size: 22px;
                    line-height: 1.23;
                    max-width: 500px;
                  }

                  .slide.bronycon-at-home .btn {
                    margin-top: 20px;
                  }
                }

                @media only screen and (min-width: 1280px) {
                  .slide.bronycon-at-home img.fg {
                    bottom: auto;
                    width: auto;
                  }
                }

              </style>
            </section>




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
                      background-position-x: <?=$slide['mobile_bg_pos_x']?> !important;
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
          <? if (count($billboards) > 0): ?>
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