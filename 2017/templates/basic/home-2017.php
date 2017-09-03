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

      <section class="header-band home">
        <div class="tab-wrapper">
            <h3><span>August 11–13, 2017</span><span>Baltimore, Maryland</span></h3>
        </div>
      </section>

      <!--<section class="announcement-strip holiday-message tall jumbo-headline" style="background-image: url(/images/tmp/holiday-message-bg.jpg);">
          <div class="wrap">
              <div class="fg-wrap">
                <img src="/images/tmp/chairs-chear.png" class="foreground" />
              </div>
            <div class="announcement-copy">
              <a href="/holiday" target="_blank" style="color:white;"><h2>Holiday Cheer From Our Chairs</h2></a>
              <a href="/holiday" class="btn btn-fill-white btn-lg btn-txt-color-magenta" title="1 unread message.">Read the Message</a>
            </div>
          </div>
      </section>-->

      <?
      // Artist Alley Links
      // you-we-would-leave-that-in-here?
      // https://goo.gl/forms/q3r4A0OAoIHa7LXi1
      ?>

      <!-- <section class="announcement-strip vendor-app tall" style="background-image: url(/images/marketplace2017.jpg);">
          <div class="wrap">
            <div class="announcement-copy">
              <h2>
                  <a href="https://goo.gl/forms/q3r4A0OAoIHa7LXi1" id="marketplace-link" target="_blank" title="Please take your time!">Apply for our<br/> Artist Alley!</a>
              </h2>
            </div>
          </div>
          <style>
              @media only screen and (min-width: 850px) {
                  .announcement-strip.vendor-app h2 {
                      font-size: 80px;
                  }
              }
              .announcement-strip.vendor-app a#marketplace-link {
                  color: white;
                  transition: .2s all;
              }
              .announcement-strip.vendor-app a#marketplace-link:hover {
                  color: #FFEB5F;
              }
          </style>
      </section> -->

      <section class="announcement-strip vip-brian-drummond tall fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-brian_drummond-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-txt-color-cerulean">Drum(mond) roll please!</a>
            </div>
          </div>
          <style>
            .vip-brian-drummond {
                min-height: 400px;
            }
            .vip-brian-drummond .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-blair-peters fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-peters_blair-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-txt-color-cerulean" title="It's art.">Blair Peters Gets It.</a>
            </div>
          </div>
          <style>
            .vip-blair-peters {
                min-height: 400px;
            }
            .vip-blair-peters .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-kyle-rideout tall fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-kyle-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-txt-color-azure">Super Robot KYLE RIDEOUT action!</a>
            </div>
          </div>
          <style>
            .vip-kyle-rideout {
                min-height: 400px;
            }
            .vip-kyle-rideout .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

    <section class="announcement-strip cosplay-2017 tall fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/cosplay-2017-bg.png);">
        <div class="wrap">
            <div class="cosplay-stage">
                <div id="cosplayDrop"
                    title="Drag another outfit over Mane Event!"
                    class="cosplay-mane-event"
                    ondragenter="dragEnter(event)"
                    ondrop="dragDrop(event)"
                    ondragover="dragOver(event)"></div>
            </div>
            <div class="cosplay-closet">
                <div class="cosplay-wardrobe">
                    <div class="info">
                        <h3>Dress as your favorite Pony!</h3>
                        <a href="/events/cosplay" class="btn btn-fill-purple">Cosplay Events at BronyCon</a>
                    </div>
                    <div class="outfit agent-carter"
                        title="Drag this outfit over to Mane Event!"
                        data-sprite="mane-agent-carter"
                        draggable="true"
                        ondragstart="dragStart(event)"
                        onmouseup="updateManesOutfit('mane-agent-carter')"></div>

                    <div class="outfit gala-gown"
                        title="Drag this outfit over to Mane Event!"
                        data-sprite="mane-gala-gown"
                        draggable="true"
                        ondragstart="dragStart(event)"
                        onmouseup="updateManesOutfit('mane-gala-gown')"></div>

                    <div class="outfit pretty-dress"
                        title="Drag this outfit over to Mane Event!"
                        data-sprite="mane-pretty-dress"
                        draggable="true"
                        ondragstart="dragStart(event)"
                        onmouseup="updateManesOutfit('mane-pretty-dress')"></div>

                    <div class="outfit kitty"
                        title="Drag this outfit over to Mane Event!"
                        data-sprite="mane-kitty"
                        draggable="true"
                        ondragstart="dragStart(event)"
                        onmouseup="updateManesOutfit('mane-kitty')"></div>

                    <div class="outfit school-girl"
                        title="Drag this outfit over to Mane Event!"
                        data-sprite="mane-school-girl"
                        draggable="true"
                        ondragstart="dragStart(event)"
                        onmouseup="updateManesOutfit('mane-school-girl')"></div>

                </div>
            </div>
        </div>
          <script>
              function updateManesOutfit(outfit) {
                  document.getElementById('cosplayDrop').className = outfit;
              }
              function dragStart(ev) {
                 ev.dataTransfer.setData("sprite", ev.target.getAttribute('data-sprite'));
              }
              function dragEnter(ev) {
                 ev.preventDefault();
              }
              function dragOver(ev) {
                 ev.preventDefault();
              }
              function dragDrop(ev) {
                 var data = ev.dataTransfer.getData("sprite");
                 ev.stopPropagation();
                 document.getElementById('cosplayDrop').className = data;
              }
          </script>
          <style>
            .cosplay-2017 {
                min-height: 400px;
            }
            .cosplay-2017 h3 {
                color: #5A3791;
                margin-top: 0;
                margin-bottom: 10px;
            }
            .cosplay-2017 .info {
                margin-bottom: 15px;
            }
            .cosplay-2017 .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
              max-width: 100%;
              width: 100%;
            }
            .cosplay-2017 .cosplay-stage {
                align-items: center;
                background: url('/images/tmp/cosplay-2017-stage.png') no-repeat transparent 50% 100%;
                background-size: cover;
                display: flex;
                justify-content: center;
                height: 100%;
                flex: 3;
            }
            .cosplay-2017 #cosplayDrop {
                background: no-repeat transparent;
                background-size: cover;
                height: 300px;
                margin-top: 40px;
                width: 300px;
            }
            .cosplay-2017 #cosplayDrop.cosplay-mane-event {
                background-image: url('/images/tmp/cosplay/mane-nakid.png');
            }
            .cosplay-2017 #cosplayDrop.mane-agent-carter {
                background-image: url('/images/tmp/cosplay/mane-agent-carter.png');
            }
            .cosplay-2017 #cosplayDrop.mane-gala-gown {
                background-image: url('/images/tmp/cosplay/mane-gala-gown.png');
            }
            .cosplay-2017 #cosplayDrop.mane-pretty-dress {
                background-image: url('/images/tmp/cosplay/mane-pretty-dress.png');
            }
            .cosplay-2017 #cosplayDrop.mane-kitty {
                background-image: url('/images/tmp/cosplay/mane-kitty.png');
            }
            .cosplay-2017 #cosplayDrop.mane-school-girl {
                background-image: url('/images/tmp/cosplay/mane-school-girl.png');
            }
            .cosplay-2017 .cosplay-closet {
                align-items: center;
                display: flex;
                justify-content: center;
                height: 100%;
                padding: 20px;
                flex: 2;
            }
            .cosplay-2017 .cosplay-wardrobe {
                background: #FFFCEE;
                padding: 15px;
            }
            .cosplay-2017 .outfit {
                background: transparent no-repeat 50% 50%;
                background-size: cover;
                display: inline-block;
                height: 90px;
                width: 90px;
                cursor: move;
                cursor: grab;
                cursor: -moz-grab;
                cursor: -webkit-grab;
            }
            .cosplay-2017 .outfit.agent-carter {
                background-image: url('/images/tmp/cosplay/outfit-agent-carter.png');
            }
            .cosplay-2017 .outfit.gala-gown {
                background-image: url('/images/tmp/cosplay/outfit-gala-gown.png');
            }
            .cosplay-2017 .outfit.kitty {
                background-image: url('/images/tmp/cosplay/outfit-kitty.png');
            }
            .cosplay-2017 .outfit.pretty-dress {
                background-image: url('/images/tmp/cosplay/outfit-pretty-dress.png');
            }
            .cosplay-2017 .outfit.school-girl {
                background-image: url('/images/tmp/cosplay/outfit-school-girl.png');
            }

          </style>
      </section>

      <section class="announcement-strip vip-ian-corlett fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-corlett-ian-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-retro-toon" title="YAY!">Ian Corlett Brings BronyCon to Life</a>
            </div>
          </div>
          <style>
            .vip-ian-corlett {
                min-height: 400px;
            }
            .vip-ian-corlett .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
            .vip-ian-corlett .btn-retro-toon {
                background: #6C6C6C;
                color: white !important;
                border: none !important;
            }
            .vip-ian-corlett .btn-retro-toon:hover {
                background: #303030;
            }
          </style>
      </section>

      <section class="announcement-strip vip-claire-corlett fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-claire-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white" title="YAY!">CMC complete! Claire!</a>
            </div>
          </div>
          <style>
            .vip-claire-corlett {
                min-height: 400px;
            }
            .vip-claire-corlett .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
            .vip-claire-corlett .btn {
                -webkit-box-shadow: -4px 1px 9px 0px rgba(0,0,0,0.4);
                -moz-box-shadow: -4px 1px 9px 0px rgba(0,0,0,0.4);
                box-shadow: -4px 1px 9px 0px rgba(0,0,0,0.4);
            }
          </style>
      </section>

      <section class="announcement-strip vip-brynna-drummond fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-brynna-full.png);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-pop-brynna">It’s Brynna, darling!</a>
            </div>
          </div>
          <style>
            .vip-brynna-drummond {
              min-height: 400px;
              /*background-position: 25% 50%; for tall */
              background-position: 25% 70%;
            }
            .vip-brynna-drummond .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }

            .vip-brynna-drummond .btn-pop-brynna {
                background: #FFFF00;
                color: black !important;
                border: 6px solid black !important;
            }
            .vip-brynna-drummond .btn-pop-brynna:hover {
                background: #F7425F;
            }
          </style>
      </section>


      <section class="announcement-strip art-show fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/art-show-full2.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/marketplace" class="btn btn-lg btn-fill-white btn-lg btn-txt-color-violet">Join the Art Show</a>
            </div>
          </div>
          <style>
            .art-show {
              min-height: 400px;
              background-position: 25% 50%;
            }
            .art-show .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-michelle-creber fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-creber-brown-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-lg btn-txt-color-violet">Paint the weekend with Michelle and Gabriel!</a>
            </div>
          </div>
          <style>
            .vip-michelle-creber {
              min-height: 400px;
              background-position: 25% 50%;
            }
            .vip-michelle-creber .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-maddy-peters fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-peters_maddy-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-lg btn-txt-color-violet" title="↑↑↓↓←→←→BA">Maddy joins the con!</a>
            </div>
          </div>
          <style>
            .vip-maddy-peters {
              min-height: 400px;
            }
            .vip-maddy-peters .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-cathy-weseluck fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-weseluck-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-lg btn-txt-color-violet">With Cathy we will survive!</a>
            </div>
          </div>
          <style>
            .vip-cathy-weseluck {
              min-height: 400px;
            }
            .vip-cathy-weseluck .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-vincent-tong fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-tong-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-lg btn-txt-color-violet">Vincent will steal your waifu's <span class="heart-emoji"><span class="emoji-text">heart</span></span></a>
            </div>
          </div>
          <style>
            .vip-vincent-tong {
              min-height: 400px;
            }
            .vip-vincent-tong .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
            .vip-vincent-tong .heart-emoji {
                background: url('https://community.bronycon.org/images/emoji/google/heart.png?v=2') transparent no-repeat center center;
                background-size: 20px 20px;
                height: 20px;
                width: 20px;
                display: inline-block;
                vertical-align: middle;
                margin-bottom: 2px;
            }
            .vip-vincent-tong .heart-emoji .emoji-text {
                display: none;
            }
          </style>
      </section>

      <section class="announcement-strip vip-kelly-sheridan fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-sheridan-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-fill-white btn-lg btn-txt-color-magenta">Sweet, Kelly!</a>
            </div>
          </div>
          <style>
            .vip-kelly-sheridan {
              min-height: 400px;
            }
            .vip-kelly-sheridan .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-daniel-ingram fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-ingram-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-lg btn-retro-ingram" title="Now you're cookin' with helium!">Swing a wing with Ingram!</a>
            </div>
          </div>
          <style>
            .vip-daniel-ingram {
              min-height: 400px;
            }
            .vip-daniel-ingram .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
            .vip-daniel-ingram .btn-retro-ingram {
                background: black;
                color: white !important;
                border: none !important;
            }
            .vip-daniel-ingram .btn-retro-ingram:hover {
                background: #303030;
            }
          </style>
      </section>

      <section class="announcement-strip vip-andy-price fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-price-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">Andy Price Saves the Day!</a>
            </div>
          </div>
          <style>
            .vip-andy-price {
              min-height: 400px;
            }
            .vip-andy-price .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-tony-fleecs fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/vip-tony-full.jpg);">
          <div class="wrap">
            <!-- <div class="fg-wrap">
              <img src="/images/tmp/vip-tony-fg.png" class="foreground" />
            </div> -->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">Welcome back Tony Fleecs!</a>
            </div>
          </div>
          <style>
            .vip-tony-fleecs {
              min-height: 400px;
            }
            .vip-tony-fleecs .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <!--<section class="announcement-strip panel-app" style="background-image: url(/images/tmp/Announcement-PanelApplicationsBackground.jpg); background-color: #b4afe8">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/panel-app-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Run an Event!</h2>
              <a href="/events/run-a-panel" class="btn btn-fill-white btn-lg btn-txt-color-purple">Submit Your Panel Ideas</a>
            </div>
          </div>
          <style>
            .panel-app .announcement-copy h2 {
                color: #5A3791;
            }

          </style>
      </section>-->

      <section class="announcement-strip" style="background-color: #5A3791">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/sponsor_reg-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Registration, Room Blocks, and Sponsorships Open!</h2>
              <p>Book now and secure some summer fun!</p>
              <a href="/registration" class="btn btn-fill-white btn-lg btn-txt-color-magenta">Register Now</a>
              <a href="/baltimore/hotels" class="btn btn-fill-white btn-lg btn-txt-color-magenta">Book Your Hotel</a>
            </div>
          </div>
      </section>

      <section class="announcement-strip jumbo-headline fg-align-bottom" style="background-color: #3C87C8">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/volunteer-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Join the Staff</h2>
              <p>Help make the convention tick <br/>and get some nifty perks, too!</p>
              <a href="/about/volunteer/staff" class="btn btn-fill-white btn-lg btn-txt-color-azure">Lend a Hoof</a>
            </div>
          </div>
      </section>

        <section class="dateline blue-band">
          <div class="wrap">
            <p><?=$elevator?></p>
          </div>
        </section>


      <div class="content">

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
