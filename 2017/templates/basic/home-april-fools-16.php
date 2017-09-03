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

        <section class="announcement-strip ponimon" style="background-image: url('/images/tmp/2016/ponimon/bg.jpg')">
            <img class="ponimon-header" src="/images/tmp/2016/ponimon/header.png" alt="Ponímon Logo">
            <h1 class="sr-only">Introducing Ponímon!</h1>
            <h2 class="sr-only">Which will you take on your journey?</h2>
            <ul>
                <li>
                    <a href="/ajax/order?horse=mayfrill" rel="modal:open">
                        <img src="/images/tmp/2016/ponimon/001A-Mayfrill.gif" alt="Mayfrill">
                        <h2>Mayfrill</h2>
                        <img src="/images/tmp/2016/ponimon/icons-mayfrill.png" alt="Grass / Fairy" title="Grass / Fairy" class="icons">
                    </a>
                </li>
                <li>
                    <a href="/ajax/order?horse=pleinair" rel="modal:open">
                        <img src="/images/tmp/2016/ponimon/002A-Pleinair.gif" alt="Mayfrill">
                        <h2>Pleinair</h2>
                        <img src="/images/tmp/2016/ponimon/icons-pleinair.png" alt="Fire / Flying" title="Fire / Flying" class="icons">
                    </a>
                </li>
                <li>
                    <a href="/ajax/order?horse=seebiets" rel="modal:open">
                        <img src="/images/tmp/2016/ponimon/003A-Seebiets.gif" alt="Mayfrill">
                        <h2>Seebiets</h2>
                        <img src="/images/tmp/2016/ponimon/icons-seebiets.png" alt="Water / Ground" title="Water / Ground" class="icons">
                    </a>
                </li>
            </ul>
        </section>

        <style>
            .ponimon {
                align-items: center;
                background-position: center top;
                background-size: cover cover;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                height: auto;
                min-height: 800px;
                padding: 100px 0;
                text-align: center;
            }
            .ponimon h2 {
                font-family: 'proxima-nova',helvetica,sans-serif;
                font-weight: bold;
                margin: 10px 0;
            }
            .ponimon .icons {
                max-width: 100px;
            }
            .ponimon .ponimon-header {
                width: 50%;
                min-width: 300px;
                max-width: 750px;
                margin-bottom: 50px;
            }
            .ponimon ul {
                align-items: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                width: 100%;
            }
            .ponimon ul li {
                flex: 1;
                max-width: 250px;
                margin-bottom: 20px;
            }
            @media only screen and (min-width: 960px) {
                .ponimon ul {
                    flex-direction: row;
                    justify-content: space-around;
                }
                .ponimon ul li {
                    flex: 1;
                    max-width: 250px;
                    margin-bottom: 0;
                }
            }
            .ponimon ul li::before {
                display: none;
            }
            .ponimon ul li a {
                background: rgba(255,255,255, .4);
                border: 5px solid #9A4A95;
                border-radius: 10px;
                box-shadow: -10px 10px 0px #5B378F;
                box-sizing: border-box;
                color: #35559A;
                display: block;
                padding: 30px;
                text-align: center;
                transition: all .2s;
            }
            .ponimon ul li a:hover {
                background: rgba(255,255,255, .8);
            }
            .ponimon ul li img {
                max-width: 200px;
            }
            .ponimon .sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0,0,0,0);
                border: 0;
            }
        </style>


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
