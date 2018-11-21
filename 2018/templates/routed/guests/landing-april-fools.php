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

<? if (isset($_GET['psych']) && $_GET['psych'] == ''): ?>

    <section class="guest-strips">

      <div class="strip">
        <div class="wrap">

          <section class="pane andy-price tier-2">
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

          <section class="pane amy-keating-rogers tier-2">
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

          <section class="pane kazumi-evans">
            <div class="photo" style="background-image: url('/images/guests/headshot/kazumi-lowres.jpg');">
            </div>
            <a href="/guests/kazumi-evans" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/kazumi.png" class="pony-avatar" />
                  <h3>Kazumi Evans</h3>
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

          <section class="pane daniel-ingram tier-2">
            <div class="photo" style="background-image: url('/images/guests/headshot/ingram.jpg');">
            </div>
            <a href="/guests/daniel-ingram" class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/ingram.png" class="pony-avatar" />
                  <h3>Daniel Ingram</h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane tony-fleecs">
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

          <section class="pane agnes-garbowska">
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

          <section class="pane anon">
            <div class="photo" style="background-image: url('/images/guests/bronicon/anon.png');">
            </div>
            <div class="mask">
              <aside class="mask-content">
                  <h3>More Soon</h3>
              </aside>
            </div>
          </section>

        </div>
      </div>
    </section>

<? else: ?>
  <section class="guest-strips">
    
    <div class="strip">
        <div class="wrap">

          <section class="pane vip-gideon">
            <div class="photo" style="background-image: url('/images/guests/horseshot/gideon.jpg');">
            </div>
            <a href="/ajax/order?vip=Gideon" class="mask"  rel="modal:open">
              <aside class="mask-content">
                  <h3>Gideon <small>Li'l Sebastian from <em>Parks and Recreation</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane vip-dobber">
            <div class="photo" style="background-image: url('/images/guests/horseshot/finders-key.jpg');">
            </div>
            <a href="/ajax/order?vip=Finder%27s%20Key" class="mask"  rel="modal:open">
              <aside class="mask-content">
                  <h3>Finder's Key <small>Joey from <em>War Horse</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>        

        </div>
      </div>

    <div class="strip">
        <div class="wrap">

          <section class="pane vip-sammy">
            <div class="photo" style="background-image: url('/images/guests/horseshot/sammy.jpg');">
            </div>
            <a href="/ajax/order?vip=Sammy" class="mask"  rel="modal:open">
              <aside class="mask-content">
                  <h3>Sammy <small>Stripes from <em>Racing Stripes</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane vip-dobber tier-2">
            <div class="photo" style="background-image: url('/images/guests/horseshot/dobber.jpg');">
            </div>
            <a href="/ajax/order?vip=Dobber" class="mask"  rel="modal:open">
              <aside class="mask-content">
                  <h3>Dobber <small>Bad Horse from <em>Dr. Horrible's Sing-Along Blog</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane vip-tilly">
            <div class="photo" style="background-image: url('/images/guests/horseshot/tilly.jpg');">
            </div>
            <a href="/ajax/order?vip=Tilly" class="mask" rel="modal:open">
              <aside class="mask-content">
                  <h3>Tilly <small>Argo from <em>Xena</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>          

        </div>
      </div>

      <div class="strip">
        <div class="wrap">

          <section class="pane vip-rj">
            <div class="photo" style="background-image: url('/images/guests/horseshot/rj.jpg');">
            </div>
            <a href="/ajax/order?vip=RJ" class="mask"  rel="modal:open">
              <aside class="mask-content">
                  <h3>RJ <small>Hidalgo from <em>Hidalgo</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane vip-percy">
            <div class="photo" style="background-image: url('/images/guests/horseshot/percy.jpg');">
            </div>
            <a href="/ajax/order?vip=Percy" class="mask" rel="modal:open">
              <aside class="mask-content">
                  <h3>Percy <small>Arod from <em>Lord of the Rings</em></small></h3>
                <span class="btn btn-sm btn-white">View Profile</span>
              </aside>
            </a>
          </section>

          <section class="pane anon">
            <div class="photo" style="background-image: url('/images/guests/bronicon/anon.png');">
            </div>
            <div class="mask">
              <aside class="mask-content">
                  <h3>More Soon</h3>
              </aside>
            </div>
          </section>

        </div>
      </div>
    </section>
<? endif; ?>

  <div class="clearfix"></div>
</div>