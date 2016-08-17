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

      <section class="announcement-strip register-2017 jumbo-headline tall" style="background-image: url(/images/bc-patterns-violet.png);">
          <div class="wrap">
            <!--<div class="fg-wrap">
              <img src="/images/tmp/2016/vip-tony_fleece-fg.png" class="foreground" />
            </div>-->
            <div class="announcement-copy">
                <h2>See you in Baltimore next year!</h2>
                <a href="https://bronycon2017.eventbrite.com" class="btn btn-fill-white btn-lg">Register for 2017 Now</a>
                <a href="http://eepurl.com/b9hyrP" class="btn btn-white btn-lg" target="_blank">Be a Sponsor</a>
            </div>
          </div>
          <style>
            .register-2017 {
              min-height: 500px;
              min-height: 80vh;
              background-repeat: repeat;
              background-size: auto;
            }
            .register-2017.announcement-strip .announcement-copy h2 {
              margin-bottom: 50px;
            }
            .register-2017 .btn {
              font-size: 20px;
            }
            .register-2017 .btn:first-of-type {
              margin-right: 20px;
            }
          </style>
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
