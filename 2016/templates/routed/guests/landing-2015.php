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

          <section class="pane john-de-lancie tier-2">
            <div class="photo" style="background-image: url('/images/guests/headshot/delancie.jpg');">
            </div>
            <span class="note">Fri &amp; Sat Only</span>
            <a href="/guests/john-de-lancie" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/delancie.png" class="pony-avatar" />
                  <h3>John de Lancie</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane cathy-weseluck">
            <div class="photo" style="background-image: url('/images/guests/headshot/weseluck.jpg');">
            </div>
            <a href="/guests/cathy-weseluck" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/weseluck-2015.jpg" class="pony-avatar" />
                  <h3>Cathy Weseluck</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane nicole-oliver">
            <div class="photo" style="background-image: url('/images/guests/headshot/oliver-lowres.jpg');">
            </div>
            <a href="/guests/nicole-oliver" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/oliver.png" class="pony-avatar" />
                  <h3>Nicole Oliver</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane andrea-libman">
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

          <section class="pane kelly-sheridan">
            <div class="photo" style="background-image: url('/images/guests/headshot/sheridan.jpg');">
            </div>
            <a href="/guests/kelly-sheridan" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/sheridan.png" class="pony-avatar" />
                  <h3>Kelly Sheridan</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

           <section class="pane kazumi-evans tier-2">
            <div class="photo" style="background-image: url('/images/guests/headshot/kazumi-lowres.jpg');">
            </div>
            <a href="/guests/kazumi-evans" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/kazumi-2015.png" class="pony-avatar" />
                  <h3>Kazumi Evans</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane michael-dobson">
            <div class="photo" style="background-image: url('/images/guests/headshot/dobson-lowres.jpg');">
            </div>
            <a href="/guests/michael-dobson" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/dobson.png" class="pony-avatar" />
                  <h3>Michael Dobson</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane ma-larson">
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

          <section class="pane charlotte-fullerton">
            <div class="photo" style="background-image: url('/images/guests/headshot/fullerton-square.jpg');">
            </div>
            <a href="/guests/charlotte-fullerton" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/fullerton.png" class="pony-avatar" />
                  <h3>Charlotte Fullerton</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane amy-keating-rogers">
            <div class="photo" style="background-image: url('/images/guests/headshot/akr.jpg');">
            </div>
            <a href="/guests/amy-keating-rogers" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/akr.jpg" class="pony-avatar" />
                  <h3>Amy Keating Rogers</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

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

          <section class="pane tony-fleecs tier-2">
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


        </div>
      </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane agnes-garbowska tier-2">
            <div class="photo" style="background-image: url('/images/guests/headshot/garbowska.jpg');">
            </div>
            <a href="/guests/agnes-garbowska" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/garbowska.png" class="pony-avatar" />
                  <h3>Agnes Garbowska</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane heather-nuhfer">
            <div class="photo" style="background-image: url('/images/guests/headshot/nuhfer-lowres.jpg');">
            </div>
            <a href="/guests/heather-nuhfer" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/nuhfer.png" class="pony-avatar" />
                  <h3>Heather <br/>Nuhfer</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane gm-berrow">
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

        </div>
      </div>

    </section>

<? else: ?>
  <div class="wrap"><p> Looks like no-pony has been announced yet, check back soon!</p></div>
<? endif; ?>

  <div class="clearfix"></div>
</div>