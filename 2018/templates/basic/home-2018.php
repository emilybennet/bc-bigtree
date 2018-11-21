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
            <h3><span>July 27–29, 2018</span><span>Baltimore, Maryland</span></h3>
        </div>
      </section>

      <!--<section class="announcement-strip holiday-message tall jumbo-headline" style="background-image: url(/images/tmp/holiday-message-bg-green.jpg);">
          <div class="wrap">
            <div class="announcement-copy">
              <a href="/holiday" target="_blank" style="color:white;"><h2>Holiday Cheer From Our Chairs</h2></a>
              <a href="/holiday" class="btn btn-fill-white btn-lg btn-txt-color-green" title="1 unread message.">Read the Message</a>
            </div>
          </div>
          <style>
          .holiday-message .btn-txt-color-green {
            color: #87c88c !important;
          }
          </style>
      </section>-->

      <section class="announcement-strip newton-vip jumbo-headline tall" style="background-image: url(/images/tmp/2018/newton-bg.jpg); background-color: #e68794">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/newton-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Bill Newton Joins The Trip!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Bill</a>
            </div>
            <style>
            .announcement-strip.newton-vip .btn-fill-white {
              color: #8c6c7a !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip hall-vip jumbo-headline" style="background-image: url(/images/tmp/2018/hall-bg.jpg); background-color: #58052c">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/hall-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Lena Hall, Live in Baltimare!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Lena</a>
            </div>
            <style>
            .announcement-strip.hall-vip .btn-fill-white {
              color: #240322 !important;
            }
            </style>
          </div>
      </section>


      <section class="announcement-strip bronypalooza tall fg-align-bottom" style="background-image: url(/images/tmp/2018/bronypalooza-bg.jpg); background-color: #192954">
          <div class="wrap">
            <div class="announcement-copy">
              <div><img src="/images/bronypalooza-logo-2018.png" title="BronyPalooza 2018" class="bp-logo" /></div>
              <a href="/bp" class="btn btn-fill-white btn-lg btn-txt-color-green">See The Lineup</a>
            </div>
            <style>
            .announcement-strip.bronypalooza .btn-fill-white {
              color: #ffc30f !important;
              background-color: transparent !important;
              border: 2px solid #f68b28;
              border-radius: 15px;
              margin-top: 25px;
            }
            .announcement-strip.bronypalooza .btn-fill-white:hover {
              background-color: transparent;
              border-color: #ffc30f;
            }
            .announcement-strip.bronypalooza .bp-logo{
              height: 300px;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip larson-vip jumbo-headline fg-align-bottom" style="background-image: url(/images/tmp/2018/larson-bg.jpg); background-color: #93d6f5">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/larson-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>He'll sign everything, M.A. Larson returns!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Larson</a>
            </div>
            <style>
            .announcement-strip.larson-vip .btn-fill-white {
              color: #454f64 !important;
            }
            .announcement-strip.larson-vip h2 {
              text-shadow: rgba(0,0,0,.4) 0 3px 10px;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip akr-vip" style="background-image: url(/images/tmp/2018/akr-bg.jpg); background-color: #40688a">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/akr-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Amy Keating Rogers will make waves in Baltimare!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Amy</a>
            </div>
            <style>
            .announcement-strip.akr-vip .btn-fill-white {
              color: #385578 !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip cosplay-events fg-align-bottom tall" style="background-image: url(/images/tmp/2018/cosplay-bg.jpg); background-color: #7a254f">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/cosplay-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Register Now For the Hall Cosplay Contest and Cosplay Fashion Show!</h2>
              <p>Plus bonus Gala info!</p>
              <a href="/events/cosplay-contest/" class="btn btn-fill-white btn-lg btn-txt-color-green">Cosplay Events</a>
              <a href="/events/grand-galloping-gala/" class="btn btn-fill-white btn-lg btn-txt-color-green">Gala Details</a>
            </div>
            <style>
            .announcement-strip.cosplay-events .btn-fill-white {
              color: #780437 !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip ingrid-nilson-vip jumbo-headline" style="background-image: url(/images/tmp/2018/nilson-bg.png); background-color: #2a695a">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/nilson-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Get Your Yoga Mats Ready, Ingrid is Back!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Ingrid</a>
            </div>
            <style>
            .announcement-strip.ingrid-nilson-vip .btn-fill-white {
              color: #004f27 !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip peter-new-vip jumbo-headline" style="background-image: url(/images/tmp/2018/new-bg.jpg); background-color: #295b5c">
          <!-- small the text for non tall -->
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/new-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Peter New is back at BronyCon!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Peter</a>
            </div>
            <style>
            .announcement-strip.peter-new-vip .btn-fill-white {
              color: #224b4d !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip nick-confalone-vip" style="background-image: url(/images/tmp/2018/confalone-bg.jpg); background-color: #d89854">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/confalone-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>It's Nick Confalone's First BronyCon!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Nick</a>
            </div>
            <style>
            .announcement-strip.nick-confalone-vip .btn-fill-white {
              color: #c08242 !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip michelle-creber-vip" style="background-image: url(/images/tmp/2018/creber-bg.png); background-color: #0d072a">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/creber-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Michelle Creber & Black Gryph0n in Baltimare!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Michelle & Gabriel</a>
            </div>
            <style>
            .announcement-strip.michelle-creber-vip .btn-fill-white {
              color: #0d072a !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip sara-richard-vip" style="background-image: url(/images/tmp/2018/richard-bg.jpg); background-color: #beb18c">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/richard-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Paint the Night with Comic Artist Sara Richard!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Sara</a>
            </div>
            <style>
            .announcement-strip.sara-richard-vip .btn-fill-white {
              color: #cb6723 !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip tabitha-st-germain-vip" style="background-image: url(/images/tmp/2018/stgermain-bg.jpg); background-color: #192855">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/stgermain-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Tabitha St. Germain is en route to Baltimare!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Tabitha</a>
            </div>
            <style>
            .announcement-strip.tabitha-st-germain-vip .btn-fill-white {
              color: #192855 !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip tony-fleecs-vip jumbo-headline" style="background-image: url(/images/tmp/2018/fleecs-bg.png); background-color: #559ea2">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/fleecs-fg2.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Tony Fleecs is on the Road!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green" title="His mother says he is handsome.">Meet Tony</a>
            </div>
            <style>
            .announcement-strip.tony-fleecs-vip .btn-fill-white {
              color: #2a4b57 !important;
            }
            .announcement-strip.tony-fleecs-vip h2 {
              text-shadow: #2a4b57 0 3px 10px
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip art-show jumbo-headline" style="background-image: url(/images/tmp/2018/art-show-bg.jpg); background-color: #32236d">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/art-show-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Art Show is Back!</h2>
              <a href="/marketplace" class="btn btn-fill-white btn-lg btn-txt-color-green">Sell Your Masterpiece</a>
            </div>
            <style>
            .announcement-strip.art-show .btn-fill-white {
              color: #32236d !important;
            }
            </style>
          </div>
      </section>

      <section class="announcement-strip jay-fosgitt-vip jumbo-headline" style="background-image: url(/images/tmp/2018/fosgitt-bg.jpg); background-color: #ec9d3f">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/2018/fosgitt-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Jay Fosgitt comes to Baltimare!</h2>
              <a href="/guests" class="btn btn-fill-white btn-lg btn-txt-color-green">Meet Jay</a>
            </div>
            <style>
            .announcement-strip.jay-fosgitt-vip .btn-fill-white {
              color: #9a3c00 !important;
            }
            </style>
          </div>
      </section>

      <!--<section class="announcement-strip vendor-hall-application panel-app jumbo-headline tall" style="background-image: url(/images/texture-strips/gold.jpg); background-color: #FFC30F">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/mane-event-wwiaftp.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Sell Your Wares!</h2>
              <a href="/marketplace" class="btn btn-fill-white btn-lg btn-txt-color-green">Apply to Artist Alley</a>
            </div>
            <style>
            .announcement-strip.vendor-hall-application .btn-fill-white {
              color: #F68B28 !important;
            }
            </style>
          </div>
      </section>-->

      <section class="announcement-strip tall" style="background-image: url(/images/texture-strips/violet.jpg); background-color: #5A3791">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/blank-presents.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Registration, Room Blocks, and Sponsorships Open!</h2>
              <p>Book now and secure some summer fun!</p>
              <a href="/registration" class="btn btn-fill-white btn-lg btn-txt-color-magenta">Register Now</a>
              <a href="/baltimore/hotels" class="btn btn-fill-white btn-lg btn-txt-color-magenta">Book Your Hotel</a>
            </div>
          </div>
      </section>

     <!-- <section class="announcement-strip event-submissions panel-app jumbo-headline" style="background-image: url(/images/texture-strips/gold.jpg); background-color: #FFC30F">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/panel-app-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Run an Event!</h2>
              <a href="/events/run-an-event" class="btn btn-fill-white btn-lg btn-txt-color-orange">Submit Your Panel Ideas</a>
            </div>
            <style>
            .announcement-strip.event-submissions .btn-fill-white {
              color: #F68B28 !important;
            }
            </style>
          </div>
      </section> -->

      <section class="announcement-strip join-staff jumbo-headline fg-align-bottom" style="background-image: url(/images/texture-strips/azure.jpg); background-color: #3C87C8">
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
