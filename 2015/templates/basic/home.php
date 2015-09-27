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
            <h3><span>Aug. 7–9, 2015</span><span>Baltimore, Maryland</span></h3>
        </div>
      </section>


      <section class="announcement-strip vip-weseluck tall jumbo-headline fg-align-bottom-padded tier-2-fg" style="background-image: url('/images/tmp/vip-weseluck-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-weseluck-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Style,<br/> Flair, and Dragons!</h2>
              <a href="/guests/cathy-weseluck" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">It's Cathy!</a>
            </div>
          </div>
          <style>
            .vip-weseluck .announcement-copy h2 {
              text-shadow: #55A6C6 0 0 25px;
            }
          </style>
      </section>

      <section class="announcement-strip vip-delancie jumbo-headline" style="background-image: url('/images/tmp/vip-delancie-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-delancie-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Something has gone askew&hellip;</h2>
              <a href="/guests/john-de-lancie" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="{{Q Flash}}">Guess who, it's Q!</a>
            </div>
          </div>
          <style>
            .vip-delancie .announcement-copy {
              -webkit-transform: rotate(180deg);
              -moz-transform: rotate(180deg);
              transform: rotate(180deg);
            }
          </style>
      </section>

      <section class="announcement-strip vip-larson tier-2-fg jumbo-headline" style="background-image: url('/images/tmp/vip-larson-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-larson-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>M.A. Larson.</h2>
              <a href="/guests/ma-larson" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">{Maniacal Laughter}</a>
            </div>
          </div>
          <style>
            .vip-larson .announcement-copy h2 {
              text-shadow: #015BE3 0 0 50px;
            }
          </style>
      </section>

      <section class="announcement-strip vip-sheridan tier-2-fg fg-align-bottom-padded jumbo-headline" style="background-image: url('/images/tmp/vip-sheridan-bg.jpg')">
          <img src="/images/tmp/vip-sheridan-fg-rock-left.png" class="rock-formation left" />
          <img src="/images/tmp/vip-sheridan-fg-rock-right.png" class="rock-formation right" />
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-sheridan-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Kelly Sheridan<small>She'll steal your heart.</small></h2>
              <a href="/guests/kelly-sheridan" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="No... that's Andrea.">But will she eat the muffins?</a>
            </div>
          </div>
          <style>
            .vip-sheridan {
              background-size: auto;
              background-position: 0 0;
            }
            .vip-sheridan .announcement-copy h2 {
              -moz-text-shadow: #2B6268 0 0 15px;
              -webkit-text-shadow: #2B6268 0 0 15px;
              text-shadow: #2B6268 0 0 15px;
            }
            .vip-sheridan .rock-formation {
              display: none;
            }
            @media only screen and (min-width: 768px) {
              .vip-sheridan {
                background-size: cover;
                background-position: center center;
              }
            }
            @media only screen and (min-width: 900px) {
              .vip-sheridan .rock-formation {
                display: block;
                position: absolute;
              }
              .vip-sheridan .rock-formation.left {
                height: 80%;
                left: 0;
                top: 10%;
              }
              .vip-sheridan .rock-formation.right {
                height: 40%;
                right: 0;
                top: 20%;
              }
            }
          </style>
      </section>

      <section class="announcement-strip vip-price tier-2-fg image-title" style="background-image: url('/images/tmp/vip-price-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-price-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <img src="/images/tmp/vip-price-title.png" class="title" title="The Return of the Dynamic Doodler: ANDY PRICE!" />
              <a href="/guests/andy-price" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">Holy Alter Ego!</a>
            </div>
          </div>
          <style>
            .vip-price .btn {
              margin-top: -25px;
            }
            @media only screen and (min-width: 1200px) {
              .announcement-strip.image-title.vip-price .announcement-copy img.title {
                max-width: 120%;
              }
            } 
          </style>
      </section>

      <section class="announcement-strip vip-fullerton tier-2-fg image-title" style="background-image: url('/images/tmp/vip-fullerton-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-fullerton-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <img src="/images/tmp/vip-fullerton-title-2.png" class="title" title="Charlotte Fullerton is... The SWIFT QUILL of JUSTICE!" />
              <a href="/guests/charlotte-fullerton" class="btn btn-fill-white btn-lg btn-txt-color-azure">POW! BZAP!</a>
            </div>
          </div>
          <style>
            .vip-fullerton .btn {
              margin-top: -50px;
            }
          </style>
      </section>

      <section class="announcement-strip vip-berrow fg-align-top tier-2-fg image-title" style="background-image: url('/images/tmp/vip-berrow-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-berrow-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <img src="/images/tmp/vip-berrow-title.png" class="title" title="G.M. Berrow in The Monumental City!" />
              <a href="/guests/gm-berrow" class="btn btn-fill-white btn-lg btn-txt-color-magenta">Another Adventure Awaits!</a>
            </div>
          </div>
      </section>

      <section class="announcement-strip vip-dobson jumbo-headline highlight-box tier-2-fg" style="background-image: url('/images/tmp/vip-dobson-bg.png')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-dobson-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Michael Dobson<small>Is Coming To BronyCon!</small></h2>
              <a href="/guests/michael-dobson" class="btn btn-fill-white btn-lg btn-txt-color-magenta">YEAAAAHHH!!!!</a>
            </div>
          </div>
          <style>
            .vip-akr .announcement-copy {
              color: #37559B;
            }
          </style>
      </section>

      <section class="announcement-strip vip-akr jumbo-headline" style="background-image: url('/images/tmp/vip-akr-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-akr-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Amy Keating Rogers<small>Returns to Baltimare!</small></h2>
              <a href="/guests/amy-keating-rogers" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="Ayy-my lmao!">Meet Our 7th Guest</a>
            </div>
          </div>
          <style>
            .vip-akr .announcement-copy {
              color: #37559B;
            }
          </style>
      </section>

      <section class="announcement-strip vip-kazumi jumbo-headline" style="background-image: url('/images/tmp/vip-kazumi-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-kazumi-fg-2015.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2><small>As Octavia Storms The East,</small> Kazumi Evans <small>Returns This Summer!</small></h2>
              <a href="/guests/kazumi-evans" class="btn btn-fill-white btn-lg btn-txt-color-magenta">A Kazumi Advisory Has Been Issued</a>
            </div>
          </div>
      </section>

      <section class="announcement-strip vip-nuhfer jumbo-headline fg-align-bottom-padded" style="background-image: url('/images/tmp/vip-nuhfer-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-nuhfer-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2><small>Nuhfer BronyCon,</small>It's Heather!</h2>
              <a href="/guests/heather-nuhfer" class="btn btn-fill-white btn-lg" title="She's the eater of pie!">Heather Nuhfer Joins Us</a>
            </div>
          </div>
      </section>

      <section class="announcement-strip vip-libman jumbo-headline fg-align-top tier-2-fg" style="background-image: url('/images/tmp/vip-libman-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-libman-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Andrea Libman<small> Brings The Party!</small></h2>
              <a href="/guests/andrea-libman" class="btn btn-fill-white btn-lg btn-txt-color-cerulean">yay.</a>
            </div>
          </div>
          <style>
            .vip-libman .announcement-copy h2 {
              text-shadow: #A5BDDF 0 0 8px;
            }
            .vip-libman .announcement-copy .btn {
              text-transform: lowercase;
            }
            .announcement-strip.vip-libman .wrap {
              padding-top: 0px;
            }
          </style>
      </section>

      <section class="announcement-strip vip-garbowska jumbo-headline fg-align-bottom-padded" style="background-image: url('/images/tmp/vip-garbowska-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-garbowska-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Agnes Garbowska <small>Charms Charm City!</small></h2>
              <a href="/guests/agnes-garbowska" class="btn btn-fill-white btn-lg btn-txt-color-purple">Meet Our Fourth Guest</a>
            </div>
          </div>
          <style>
            .vip-garbowska .announcement-copy h2 {
              text-shadow: #40887A 0 0 8px;
            }
            .vip-garbowska .foreground {
              width: 100%;
            }
          </style>
      </section>

      <section class="announcement-strip vip-oliver jumbo-headline fg-align-top tier-2-fg" style="background-image: url('/images/tmp/vip-oliver-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-oliver-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Nicole Oliver <small>Bringing royalty to Baltimare!</small></h2>
              <a href="/guests/nicole-oliver" title="Senpai has noticed you..." class="btn btn-fill-white btn-lg btn-txt-color-purple">Say Hello To The Princess</a>
            </div>
          </div>
          <style>
            .vip-oliver .announcement-copy h2 {
              text-shadow: #7C8E50 0 0 8px;
            }
            .announcement-strip.vip-oliver .wrap {
              padding-top: 0px;
            }
          </style>
      </section>

      <section class="announcement-strip vip-fleecs jumbo-headline" style="background-image: url('/images/tmp/vip-fleecs-bg.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/vip-fleecs-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Tony Fleecs <small>Mom says he&rsquo;s handsome!</small></h2>
              <a href="/guests/tony-fleecs" title="Choosy moms choose Fleecs!" class="btn btn-fill-white btn-lg btn-txt-color-azure">Meet Our Second Guest</a>
            </div>
          </div>
          <style>
            .vip-fleecs .announcement-copy h2 {
              text-shadow: #19A3D4 0 0 8px;
            }
          </style>
      </section>

      <section class="announcement-strip highlight-box" style="background-image: url('/images/tmp/sponsor_reg-bg.jpg')">
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

      <section class="announcement-strip fg-align-bottom" style="background-image: url('/images/tmp/Announcement-VolunteerBackground.png')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/volunteer-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>Apply for BronyCon Staff</h2>
              <p>Help make the convention tick and get some nifty perks, too!</p>
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