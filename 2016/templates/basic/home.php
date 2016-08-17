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
            <h3><span>July 8–10, 2016</span><span>Baltimore, Maryland</span></h3>
        </div>
      </section>

      <section class="announcement-strip vip-chiara-zanni fg-align-bottom jumbo-headline tall" style="background-image: url(/images/tmp/2016/vip-chiara_zanni-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-rust">Aloha Chiara Zanni &amp; Jenn Blake!</a>
            </div>
          </div>
          <style>
            .vip-chiara-zanni {
              min-height: 600px;
            }
            .vip-chiara-zanni .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-jeremy-whitley fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-jeremy_whitley-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-rust">Rise Up with Jeremy Whitley</a>
            </div>
          </div>
          <style>
            .vip-jeremy-whitley {
              min-height: 400px;
            }
            .vip-jeremy-whitley .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-dave-polsky fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-dave_polsky-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-purple">Dave Polsky Drops In</a>
            </div>
          </div>
          <style>
            .vip-dave-polsky {
              min-height: 400px;
            }
            .vip-dave-polsky .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-ashleigh-ball fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-ashleigh_ball-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-purple" title="Achievement Get: Mane 6 Unlocked!">Ashleigh Ball is coming to BronyCon</a>
            </div>
          </div>
          <style>
            .vip-ashleigh-ball {
              min-height: 400px;
              background-position: 25% 50%;
            }
            .vip-ashleigh-ball .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
            @media only screen and (min-width: 600px) {
                .vip-ashleigh-ball {
                  /*min-height: 700px;*/
                  background-position: 0% 50%;
                }
            }
          </style>
      </section>

      <section class="announcement-strip vip-ma-larson fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-ma_larson-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-purple" title="Yes, he will sign anything!">M.A. Larson Signs In</a>
            </div>
          </div>
          <style>
            .vip-ma-larson {
              min-height: 400px;
            }
            .vip-ma-larson .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip art-show fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/art-show.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/marketplace" class="btn btn-fill-white btn-lg btn-txt-color-purple" title="Instrumental cover of 'Please, Please, Please Let Me Get What I Want' here.">Introducing Art Show</a>
            </div>
          </div>
          <style>
            .art-show {
              min-height: 400px;
            }
            .art-show .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip cosplay fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/cosplay.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/events/cosplay" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="">It's time to Cosplay</a>
            </div>
          </div>
          <style>
            .cosplay {
              min-height: 400px;
            }
            .cosplay .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-ingrid-nilson fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-ingrid_nilson-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-z" title="Happy Birthday Ingrid!">Take to the skies with Ingrid Nilson</a>
            </div>
          </div>
          <style>
            .vip-ingrid-nilson {
              min-height: 400px;
            }
            .vip-ingrid-nilson .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip bronypalooza fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/bronypalooza-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/events/bronypalooza" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="♫ ~ Walk like an Equestrian ~ ♫">Get Down at BronyPalooza 2016</a>
            </div>
          </div>
          <style>
            .bronypalooza {
              min-height: 400px;
            }
            .bronypalooza .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-tabitha-st-germain fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-tabitha_st_germain-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-orange" title="♪ Istanbull was Constantelopel / Now it's Istanbull, not Constantelopel ♪">Tabitha St. Germain joins the flight!</a>
            </div>
          </div>
          <style>
            .vip-tabitha-st-germain {
              min-height: 400px;
            }
            .vip-tabitha-st-germain .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-andy-price fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-andy_price-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-orange" title="Hungary for Apples?">Now arriving: Andy Price</a>
            </div>
          </div>
          <style>
            .vip-andy-price {
              min-height: 400px;
              background-position: 100% 50%;
            }
            .vip-andy-price .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-tara-strong fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-tara_strong-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-purple" title="Veni, vidi, vici!">Tara Strong conquers Baltimare!</a>
            </div>
          </div>
          <style>
            .vip-tara-strong {
              min-height: 400px;
            }
            .vip-tara-strong .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
            /*@media only screen and (min-width: 850px) {
                .vip-tara-strong .btn {
                  font-size: 160%;
                  bottom: 40px;
                }
                .vip-tara-strong .btn:active {
                  top: auto;
                }
            }*/
          </style>
      </section>

        <!--<section class="announcement-strip vip-jayson-thiessen fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-jayson_thiessen-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <!--<div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-purple">Lights, Camera, Jayson Thiessen!</a>
            </div>
          </div>
          <style>
            .vip-jayson-thiessen {
              min-height: 400px;
              background-position: left center;
            }
            .vip-jayson-thiessen .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>-->

      <section class="announcement-strip vip-gm-berrow fg-align-bottom jumbo-headline " style="background-image: url(/images/tmp/2016/vip-gm_berrow-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-rust">G.M. Berrow, Booked!</a>
            </div>
          </div>
          <style>
            .vip-gm-berrow {
              min-height: 400px;
            }
            .vip-gm-berrow .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-sara-richard fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-sara_richard-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">Paint the Night with Comic Artist Sara Richard!</a>
            </div>
          </div>
          <style>
            .vip-sara-richard {
              min-height: 400px;
            }
            .vip-sara-richard .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip tier-2-fg vip-andrea-libman fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-andrea_libman-bg.jpg);">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2016/vip-andrea_libman-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg" title="Waffles! Belgium or potato waffles?">Welkom, Bienvenue Andrea!!!</a>
            </div>
          </div>
          <style>
            .vip-andrea-libman .wrap {
              min-height: 400px;
              position: relative;
            }
            .vip-andrea-libman .fg-wrap {
              bottom: 10px;
              left: 0px;
              position: absolute;
              width: 95%;
            }
            .vip-andrea-libman .announcement-copy {
              bottom: 50px;
              left: 0px;
              position: absolute;
              width: 100%;
            }
          </style>
      </section>

      <section class="announcement-strip vip-creber-brown fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-creber_brown-full.jpg);">
          <div class="wrap">
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">Welcome Aboard Michelle &amp; Gabriel!</a>
            </div>
          </div>
          <style>
            .vip-creber-brown {
              min-height: 400px;
            }
            .vip-creber-brown .wrap {
              -webkit-align-items: flex-end;
              -ms-flex-align: end;
              align-items: flex-end;
            }
          </style>
      </section>

      <section class="announcement-strip vip-tony-fleecs fg-align-bottom jumbo-headline" style="background-image: url(/images/tmp/2016/vip-tony_fleecs-full.jpg);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">Tony Fleecs Joins the Adventure!</a>
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

      <!--<section class="announcement-strip holiday-message jumbo-headline" style="background-image: url(/images/tmp/holiday-message-bg.jpg);">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/holiday-message-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Holiday Cheer From Our Chairmen</h2>
              <a href="/holiday" class="btn btn-fill-white btn-lg btn-txt-color-magenta">Read It</a>
            </div>
          </div>
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

      <section class="announcement-strip jumbo-headline" style="background-color: #FFC30F">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vendor-application-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Run an Event!</h2>
              <p>The stage is set and your audience is waiting.</p>
              <a href="/events" class="btn btn-fill-white btn-lg btn-txt-color-azure">What Are You Gonna Share?</a>
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
