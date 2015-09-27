<?
  $billboardMod = new homePageBillboard();
  $billboards = $billboardMod->getApproved('position DESC');

  $anonPony = $cms->getSetting('anonymous-avatar');

  $guestsMod = new bcGuests();
  $guests = $guestsMod->getMatching(
    array('approved','featured'),
    array('on','on'),
    'position DESC');

  $flipSides = true;
?>      

      <section class="header-band home">
        <div class="tab-wrapper">
            <h3><span>Aug. 7–9, 2015</span><span>Baltimore, Maryland</span></h3>
        </div>
      </section>

    <? if ($flipSides): ?>
    <div class="flip-sides">
    <? endif; ?>

        <section class="announcement-strip vip-gideon jumbo-headline tall" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-08.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-gideon-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <div class="announcement-wrap">
                <h2>Meet Gideon<small>Taking a running leap and flying into Baltimore!</small></h2>
                <a href="/ajax/order?vip=Gideon" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="He's rideable!" rel="modal:open">Meet Pawnee's greatest treasure</a>
              </div>
            </div>
          </div>
          <style>
            .announcement-strip.vip-gideon h2{
              -wiki-text-shadow: 0 2px 10px  #173E6A;
              -moz-text-shadow: 0 2px 10px  #173E6A;
              text-shadow: 0 2px 10px  #173E6A;
            }
          </style>
      </section>

        <section class="announcement-strip vip-sammy jumbo-headline no-wrap" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-04.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-sammy-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <div class="announcement-wrap">
                <h2><small>We're raising the stakes with</small> Sammy the Zebra!</h2>
                <a href="/ajax/order?vip=Sammy" class="btn btn-fill-white btn-lg btn-txt-color-rust" title="He's rideable!" rel="modal:open">On your Mark, Get Set, Go!</a>
              </div>
            </div>
          </div>
          <style>
            .announcement-strip.vip-sammy .announcement-wrap {
              max-width: 70%;
              margin: 0 auto;
            }
            .announcement-strip.vip-sammy h2{
              -wiki-text-shadow: 2px 2px 10px rgba(0,0,0,.3);
              -moz-text-shadow: 2px 2px 10px rgba(0,0,0,.3);
              text-shadow: 2px 2px 10px rgba(0,0,0,.3);
            }
          </style>
      </section>

      <section class="announcement-strip vip-finderskey jumbo-headline" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-05.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-finderskey-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2><small>He's one of a kind, it's</small>Finder's Key!</h2>
              <a href="/ajax/order?vip=Finder%27s%20Key" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="Bad Horse, get it??" rel="modal:open">From such films as War Horse.</a>
            </div>
          </div>
          <style>
            .announcement-strip.vip-finderskey h2{
              -wiki-text-shadow: 2px 2px 10px #609FB8;
              -moz-text-shadow: 2px 2px 10px #609FB8;
              text-shadow: 2px 2px 10px #609FB8;
            }
          </style>
      </section>

      <section class="announcement-strip vip-dobber jumbo-headline" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-02.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-dobber-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2><small>Thoroughbred of sin,</small> Dobber.</h2>
              <a href="/ajax/order?vip=Dobber" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" title="Bad Horse, get it??" rel="modal:open">He's Bad!</a>
            </div>
          </div>
          <style>
            .announcement-strip.vip-dobber h2{
              -wiki-text-shadow: 2px 2px 10px #182954;
              -moz-text-shadow: 2px 2px 10px #182954;
              text-shadow: 2px 2px 10px #182954;
            }
          </style>
      </section>

      <section class="announcement-strip vip-rj no-wrap jumbo-headline fg-align-bottom" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-01.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-rj-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2><small>Hot like the Arabian Desert</small>RJ</h2>
              <a href="/ajax/order?vip=RJ" class="btn btn-fill-white btn-lg" title="She's the eater of pie!" rel="modal:open">Cool down, RJ!</a>
            </div>
          </div>
          <style>
            .announcement-strip.vip-rj h2{
              -wiki-text-shadow: 2px 2px 10px #182954;
              -moz-text-shadow: 2px 2px 10px #182954;
              text-shadow: 2px 2px 10px #182954;
            }
          </style>
      </section>

      <section class="announcement-strip vip-tilly no-wrap jumbo-headline tier-2-fg" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-07.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-tilly-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2><small>Hold onto your chakrams,</small> it's Tilly!</h2>
              <a href="/ajax/order?vip=Tilly" class="btn btn-fill-white btn-lg btn-txt-color-cerulean" rel="modal:open">Whoa there, Tilly!</a>
            </div>
          </div>
      </section>

      <section class="announcement-strip vip-percy jumbo-headline" style="background-image: url('/images/tmp/horse-vip/bg-lisa-frank-06.jpg')">
          <div class="wrap">
            <div class="fg-wrap">
              <img src="/images/tmp/horse-vip/vip-percy-fg.png" class="foreground" />
            </div>
            <div class="announcement-copy">
              <h2>The swift Percy <small>gallops into Baltimore</small></h2>
              <a href="/ajax/order?vip=Percy" class="btn btn-fill-purple btn-lg" rel="modal:open">Giddy Up Percy!</a>
            </div>
          </div>
          <style>.announcement-strip.vip-percy h2 {
              color: #5A3791;
              -webkit-text-shadow: -3px -3px 0 white, 3px -3px 0 white, -3px 3px 0 white, 3px 3px 0 white;
              -moz-text-shadow: -3px -3px 0 white, 3px -3px 0 white, -3px 3px 0 white, 3px 3px 0 white;
              text-shadow: -3px -3px 0 white, 3px -3px 0 white, -3px 3px 0 white, 3px 3px 0 white;
            }
          </style>
      </section>
    <? if ($flipSides): ?>
    </div>
    <? endif; ?>


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