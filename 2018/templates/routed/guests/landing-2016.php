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

        <section class="pane tara-strong tier-3">
          <div class="photo" style="background-image: url('/images/guests/headshot/strong.jpg');">
          </div>
          <a href="/guests/tara-strong" class="mask">
            <aside class="mask-content">
                <img src="/images/guests/bronicon/strong.png" class="pony-avatar" />
                <h3>Tara Strong</h3>
              <span class="btn btn-sm btn-white">View Profile</span>
            </aside>
          </a>
        </section>

        <section class="pane ashleigh-ball tier-3">
          <div class="photo" style="background-image: url('/images/guests/headshot/ball.jpg');">
          </div>
          <a href="/guests/ashleigh-ball" class="mask">
            <aside class="mask-content">
                <img src="/images/guests/bronicon/ball.jpg" class="pony-avatar" />
                <h3>Ashleigh Ball</h3>
              <span class="btn btn-sm btn-white">View Profile</span>
            </aside>
          </a>
        </section>

      </div>
    </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane tabitha-st-germain tier-1">
            <div class="photo" style="background-image: url('/images/guests/headshot/st-germain.jpg');">
            </div>
            <div class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/st-germain.jpg" class="pony-avatar" />
                  <h3>Tabitha St. Germain</h3>
                <a href="/guests/tabitha-st-germain" class="btn btn-sm btn-white">View Profile</a>
              </aside>
            </div>
          </section>

          <section class="pane andrea-libman tier-1">
            <div class="photo" style="background-image: url('/images/guests/headshot/libman.jpg');">
            </div>
            <a href="/guests/andrea-libman" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/libman.png" class="pony-avatar" />
                  <h3>Andrea Libman</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

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

          <section class="pane ingrid-nilson tier-2">
            <div class="photo" style="background-image: url('/images/guests/headshot/nilson-lowres.jpg');">
            </div>
            <a href="/guests/ingrid-nilson" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/nilson-temp.png" class="pony-avatar" />
                  <h3>Ingrid Nilson</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane chiara-zanni tier-1">
            <div class="photo" style="background-image: url('/images/guests/headshot/zanni.jpg');">
            </div>
            <a href="/guests/chiara-zanni" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/zanni.jpg" class="pony-avatar" />
                  <h3>Chiara Zanni</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

            <section class="pane ma-larson tier-1">
              <div class="photo" style="background-image: url('/images/guests/headshot/larson.jpg');">
              </div>
              <a href="/guests/ma-larson" class="mask">
                <aside class="mask-content">
                    <img src="/images/guests/bronicon/larson.png" class="pony-avatar" />
                    <h3>M.A. Larson</h3>
                  <span class="btn btn-sm btn-white">View Profile</span>
                </aside>
              </a>
            </section>

          <section class="pane jeremy-whitley">
            <div class="photo" style="background-image: url('/images/guests/headshot/whitley.jpg');">
            </div>
            <a href="/guests/jeremy-whitley" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/whitley.jpg" class="pony-avatar" />
                  <h3>Jeremy Whitley</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane tony-fleecs tier-1">
            <div class="photo" style="background-image: url('/images/guests/headshot/fleecs.jpg');">
            </div>
            <a href="/guests/tony-fleecs" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/fleecs.png" class="pony-avatar" />
                  <h3>Tony Fleecs</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane sara-richard tier-1">
            <div class="photo" style="background-image: url('/images/guests/headshot/richard.jpg');">
            </div>
            <a href="/guests/sara-richard" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/richard-temp.jpg" class="pony-avatar" />
                  <h3>Sara Richard</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane andy-price">
            <div class="photo" style="background-image: url('/images/guests/headshot/price-lowres.jpg');">
            </div>
            <a href="/guests/andy-price" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/price.png" class="pony-avatar" />
                  <h3>Andy Price</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane jenn-blake tier-1">
            <div class="photo" style="background-image: url('/images/guests/headshot/blake-lowres.jpg');">
            </div>
            <a href="/guests/jenn-blake" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/blake.jpg" class="pony-avatar" />
                  <h3>Jenn Blake</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

            <!--<section class="pane jayson-thiessen tier-2">
              <div class="photo" style="background-image: url('/images/guests/headshot/thiessen.jpg');">
              </div>
              <a href="/guests/jayson-thiessen" class="mask">
                <aside class="mask-content">
                    <img src="/images/guests/bronicon/thiessen.png" class="pony-avatar" />
                    <h3>Jayson Thiessen</h3>
                  <span class="btn btn-sm btn-white">View Profile</span>
                </aside>
              </a>
          </section>-->

          <section class="pane dave-polsky">
            <div class="photo" style="background-image: url('/images/guests/headshot/polsky-lowres.jpg');">
            </div>
            <a href="/guests/dave-polsky" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/polsky.jpg" class="pony-avatar" />
                  <h3>Dave Polsky</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>
          
            <section class="pane gm-berrow tier-1">
              <div class="photo" style="background-image: url('/images/guests/headshot/berrow-lowres.jpg');">
              </div>
              <a href="/guests/gm-berrow" class="mask">
                <aside class="mask-content">
                    <img src="/images/guests/bronicon/berrow.png" class="pony-avatar" />
                    <h3>G.M. Berrow</h3>
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
