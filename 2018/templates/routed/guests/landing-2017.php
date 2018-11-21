<?
  $guests = $guestsMod->getGuests();

  $guestsThird = array();
  $guestsSecond = array();
  $guestsOne = array();
  $i = 1;

  foreach ($guests as $guest) {
    if (empty($guest['bronycon_pony_avatar'])) {
      $guest['bronycon_pony_avatar'] = $anonPony;
    }
    if ($i == 3) {
      array_push($guestsThird, $guest);
    } elseif ($i == 2) {
      array_push($guestsSecond, $guest);
    } else {
      array_push($guestsOne, $guest);
    }
    if ($i == 3) {
      $i = 1;
    } else {
      $i++;
    }
  }
?>

  <div class="content-page">
    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
    </section>

<? if (!empty($guests)): ?>

    <section class="guest-strips">

        <div class="strip">
            <div class="wrap">

                <section class="pane michelle-creber tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/creber-lowres.jpg');">
                  </div>
                  <div class="mask">
                    <aside class="mask-content">
                        <img src="/images/guests/bronicon/creber.png" class="pony-avatar" />
                        <h3>Michelle Creber</h3>
                      <a href="/guests/michelle-creber" class="btn btn-sm btn-white">View Profile</a>
                    </aside>
                  </div>
                </section>

                <section class="pane claire-corlett tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/claire-badquality.jpg');background-position: 50% 0%;"></div>
                    <a href="/guests/claire-corlett" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/corlett-claire-2017.jpg" class="pony-avatar" />
                            <h3>Claire Corlett</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane brynna-drummond tier-2">
                    <div class="photo" style="background-image: url('/images/guests/headshot/brynna.jpg');"></div>
                    <a href="/guests/brynna-drummond" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/drummond-brynna.jpg" class="pony-avatar" />
                            <h3>Brynna Drummond</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

            </div>
        </div>

        <div class="strip">
            <div class="wrap">

                <section class="pane maddy-peters tier-2">
                    <div class="photo" style="background-image: url('/images/guests/headshot/peters-maddy-2017.jpg');"></div>
                    <a href="/guests/maddy-peters" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/peters-maddy.jpg" class="pony-avatar" />
                            <h3>Maddy Peters</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane cathy-weseluck tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/weseluck.jpg');"></div>
                    <a href="/guests/cathy-weseluck" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/weseluck-2017.jpg" class="pony-avatar" />
                            <h3>Cathy Weseluck</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane kelly-sheridan tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/sheridan.jpg');"></div>
                    <a href="/guests/kelly-sheridan" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/sheridan-2017.jpg" class="pony-avatar" />
                            <h3>Kelly Sheridan</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

            </div>
        </div>

        <div class="strip">
            <div class="wrap">

                <section class="pane brian-drummond tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/drummond-brian-2017.jpg');"></div>
                    <a href="/guests/brian-drummond" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/drummond-brian-2017.jpg" class="pony-avatar" />
                            <h3>Brian Drummond</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane kyle-rideout tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/rideout-2017.jpg');"></div>
                    <a href="/guests/kyle-rideout" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/rideout-2017.jpg" class="pony-avatar" />
                            <h3>Kyle Rideout</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane ian-corlett tier-2">
                    <div class="photo" style="background-image: url('/images/guests/headshot/corlett-ian-long.jpg');"></div>
                    <a href="/guests/ian-corlett" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/corlett-ian.jpg" class="pony-avatar" />
                            <h3>Ian Corlett</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

            </div>
        </div>

        <div class="strip">
            <div class="wrap">

                <section class="pane tony-fleecs tier-2">
                    <div class="photo" style="background-image: url('/images/guests/headshot/fleecs-2017.jpg');"></div>
                    <a href="/guests/tony-fleecs" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/fleecs-2017.jpg" class="pony-avatar" />
                            <h3>Tony Fleecs</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane vincent-tong tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/tong-lowres.jpg');"></div>
                    <a href="/guests/vincent-tong" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/tong.jpg" class="pony-avatar" />
                            <h3>Vincent Tong</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane andy-price tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/price-2017-lowres.jpg');"></div>
                    <a href="/guests/andy-price" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/price-2017.jpg" class="pony-avatar" />
                            <h3>Andy Price</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

            </div>
        </div>

        <div class="strip">
            <div class="wrap">

                <section class="pane blair-peters tier-1">
                    <div class="photo" style="background-image: url('/images/guests/headshot/peters-blair-2017-lowres.jpg');"></div>
                    <a href="/guests/blair-peters" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/peters-blair-2017.jpg" class="pony-avatar" />
                            <h3>Blair Peters</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <section class="pane gabriel-brown tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/brown-lowres.jpg');">
                  </div>
                  <div class="mask">
                    <aside class="mask-content">
                        <img src="/images/guests/bronicon/brown.png" class="pony-avatar" />
                        <h3>Gabriel Brown</h3>
                      <a href="/guests/gabriel-brown" class="btn btn-sm btn-white">View Profile</a>
                    </aside>
                  </div>
                </section>

                <section class="pane daniel-ingram tier-2">
                    <div class="photo" style="background-image: url('/images/guests/headshot/ingram-2017.jpg');"></div>
                    <a href="/guests/daniel-ingram" class="mask">
                        <aside class="mask-content">
                            <img src="/images/guests/bronicon/ingram-2017.jpg" class="pony-avatar" />
                            <h3>Daniel Ingram</h3>
                            <span class="btn btn-sm btn-white">View Profile</span>
                        </aside>
                    </a>
                </section>

                <!--<section class="pane more-soon tier-1">
                    <div class="photo" style="background-image: url('/images/guests/bronicon/anon.png');"></div>
                    <a href="#" class="mask">
                        <aside class="mask-content">
                            <h3>More Soon!</h3>
                        </aside>
                    </a>
                </section>-->

            </div>
        </div>


    </section>

<style>
  .michelle-creber .photo,
  .gabriel-brown .photo {
    background-position: top center !important;
  }
</style>

<? else: ?>
  <div class="wrap"><p> Looks like no-pony has been announced yet, check back soon!</p></div>
<? endif; ?>

  <div class="clearfix"></div>
</div>
