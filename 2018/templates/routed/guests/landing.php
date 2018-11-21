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
    <div class="wrap">

      <div class="content-page wide-load">
        <section class="the-meat wide-load" style="text-align:left;">
          <header class="page-header">
            <h2><?=$page_headline?></h2>
          </header>
          <fieldset id="vip">
            <legend>VIPs</legend>
          </fieldset>
        </section>
      </div>

    </div>

<? if (!empty($guests)): ?>

    <section class="guest-strips">

      <div class="strip">
          <div class="wrap">

            <section class="pane lena-hall tier-1">
              <div class="photo" style="background-image: url('/images/guests/headshot/hall-2018.jpg');">
              </div>
              <span class="note">Sat &amp; Sun Only</span>
              <div class="mask">
                <aside class="mask-content">
                    <h3>Lena Hall</h3>
                  <a href="/guests/lena-hall" class="btn btn-sm btn-white">View Profile</a>
                </aside>
              </div>
            </section>

            <section class="pane tabitha-st-germain tier-1">
              <div class="photo" style="background-image: url('/images/guests/headshot/st-germain.jpg');">
              </div>
              <div class="mask">
                <aside class="mask-content">
                    <h3>Tabitha St. Germain</h3>
                  <a href="/guests/tabitha-st-germain" class="btn btn-sm btn-white">View Profile</a>
                </aside>
              </div>
            </section>

          </div>
      </div>

        <div class="strip">
            <div class="wrap">

              <section class="pane ingrid-nilson tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/nilson-2018.jpg');"></div>
                  <div class="mask">
                      <aside class="mask-content">
                          <h3>Ingrid Nilson</h3>
                          <a href="/guests/ingrid-nilson" class="btn btn-sm btn-white">View Profile</a>
                      </aside>
                  </div>
              </section>

              <section class="pane peter-new tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/new-2018.jpg');"></div>
                  <div class="mask">
                      <aside class="mask-content">
                          <h3>Peter New</h3>
                          <a href="/guests/peter-new" class="btn btn-sm btn-white">View Profile</a>
                      </aside>
                  </div>
              </section>

              <section class="pane michelle-creber tier-1">
                <div class="photo" style="background-image: url('/images/guests/headshot/creber-2018.jpg');">
                </div>
                <div class="mask">
                  <aside class="mask-content">
                      <h3>Michelle Creber</h3>
                    <a href="/guests/michelle-creber" class="btn btn-sm btn-white">View Profile</a>
                  </aside>
                </div>
              </section>

              <section class="pane gabriel-brown tier-1">
                <div class="photo" style="background-image: url('/images/guests/headshot/brown-2018.jpg');">
                </div>
                <div class="mask">
                  <aside class="mask-content">
                      <h3>Gabriel Brown</h3>
                    <a href="/guests/gabriel-brown" class="btn btn-sm btn-white">View Profile</a>
                  </aside>
                </div>
              </section>

            </div>
        </div>


        <div class="strip">
            <div class="wrap">

              <section class="pane tony-fleecs tier-2">
                  <div class="photo" style="background-image: url('/images/guests/headshot/fleecs-2017.jpg');"></div>
                  <div class="mask">
                      <aside class="mask-content">
                          <h3>Tony Fleecs</h3>
                          <a href="/guests/tony-fleecs" class="btn btn-sm btn-white">View Profile</a>
                      </aside>
                  </div>
              </section>

              <section class="pane sara-richard tier-1">
                <div class="photo" style="background-image: url('/images/guests/headshot/richard.jpg');">
                </div>
                <div class="mask">
                  <aside class="mask-content">
                      <h3>Sara Richard</h3>
                    <a href="/guests/sara-richard" class="btn btn-sm btn-white">View Profile</a>
                  </aside>
                </div>
              </section>

              <section class="pane jay-fosgitt tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/fosgitt-2018.jpg');"></div>
                  <div class="mask">
                      <aside class="mask-content">
                          <h3>Jay Fosgitt</h3>
                          <a href="/guests/jay-fosgitt" class="btn btn-sm btn-white">View Profile</a>
                      </aside>
                  </div>
              </section>

            </div>
        </div>

        <div class="strip">
            <div class="wrap">

              <section class="pane ma-larson tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/larson.jpg');"></div>
                  <div class="mask">
                      <aside class="mask-content">
                          <h3>M.A. Larson</h3>
                          <a href="/guests/ma-larson" class="btn btn-sm btn-white">View Profile</a>
                      </aside>
                  </div>
              </section>

              <section class="pane ingrid-nilson tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/akr-2018.jpg');"></div>
                  <div class="mask">
                      <aside class="mask-content">
                          <h3>Amy Keating Rogers</h3>
                          <a href="/guests/amy-keating-rogers" class="btn btn-sm btn-white">View Profile</a>
                      </aside>
                  </div>
              </section>

              <section class="pane nick-confalone tier-1">
                <div class="photo" style="background-image: url('/images/guests/headshot/confalone.jpg');">
                </div>
                <div class="mask">
                  <aside class="mask-content">
                      <h3>Nick Confalone</h3>
                    <a href="/guests/nick-confalone" class="btn btn-sm btn-white">View Profile</a>
                  </aside>
                </div>
              </section>

                <section class="pane bill-newton tier-1">
                  <div class="photo" style="background-image: url('/images/guests/headshot/newton.jpg');">
                  </div>
                  <div class="mask">
                    <aside class="mask-content">
                        <h3>Bill Newton</h3>
                      <a href="/guests/bill-newton" class="btn btn-sm btn-white">View Profile</a>
                    </aside>
                  </div>
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
  .guest-strips .strip {
    background-color: #fafafa !important;
  }
  .jay-fosgitt .photo {
    background-position: top center !important;
  }
  @media only screen and (max-width: 500px) {
    .guest-strips .strip {
      height: initial;
    }
    .guest-strips .strip .wrap {
      display: block;
    }
  }
</style>

<? else: ?>
  <div class="wrap"><p> Looks like no-pony has been announced yet, check back soon!</p></div>
<? endif; ?>

  <div class="clearfix"></div>

  <div class="wrap">
    <div class="content-page wide-load">
      <section class="the-meat wide-load" style="text-align:left;">
        <fieldset id="community">
          <legend>Community</legend>
        </fieldset>
      </section>
    </div>
  </div>


  <section class="guest-strips">

    <div class="strip">
      <div class="wrap">

      <section class="pane dustykatt tier-1">
        <div class="photo" style="background-image: url('/images/guests/community/dusty.jpg');"></div>
        <div class="mask">
          <aside class="mask-content">
            <h3>Dustykatt</h3>
            <a href="/guests/dustykatt" class="btn btn-sm btn-white">View Profile</a>
          </aside>
        </div>
      </section>

      <section class="pane trish-forstner tier-1">
        <div class="photo" style="background-image: url('/images/guests/community/trish.jpg');"></div>
        <div class="mask">
          <aside class="mask-content">
            <h3>Trish Forstner</h3>
            <a href="/guests/trish-forstner" class="btn btn-sm btn-white">View Profile</a>
          </aside>
        </div>
      </section>

      <section class="pane silver-quill tier-1">
        <div class="photo" style="background-image: url('/images/guests/community/silverquill.jpg');"></div>
        <div class="mask">
          <aside class="mask-content">
            <h3>Silver Quill</h3>
            <a href="/guests/silver-quill" class="btn btn-sm btn-white">View Profile</a>
          </aside>
        </div>
      </section>


      </div>
    </div>


    <div class="strip">
      <div class="wrap">

        <section class="pane thelostnarrator tier-1">
          <div class="photo" style="background-image: url('/images/guests/community/lostnarrator.jpg');"></div>
          <div class="mask">
            <aside class="mask-content">
              <h3>TheLostNarrator</h3>
              <a href="/guests/thelostnarrator" class="btn btn-sm btn-white">View Profile</a>
            </aside>
          </div>
        </section>

        <section class="pane magpiepony tier-1">
          <div class="photo" style="background-image: url('/images/guests/community/magpiepony.jpg');"></div>
          <div class="mask">
            <aside class="mask-content">
              <h3>Magpiepony</h3>
              <a href="/guests/magpiepony" class="btn btn-sm btn-white">View Profile</a>
            </aside>
          </div>
        </section>

        <section class="pane obabscribbler tier-1">
          <div class="photo" style="background-image: url('/images/guests/community/obabscribbler-lowres.jpg');"></div>
          <div class="mask">
            <aside class="mask-content">
              <h3>ObabScribbler</h3>
              <a href="/guests/obabscribbler" class="btn btn-sm btn-white">View Profile</a>
            </aside>
          </div>
        </section>

      </div>
    </div>

    <div class="strip">
      <div class="wrap">

        <section class="pane jesse-nowack tier-1">
          <div class="photo" style="background-image: url('/images/guests/community/nowacking.jpg');"></div>
          <div class="mask">
            <aside class="mask-content">
              <h3>Jesse Nowack</h3>
              <a href="/guests/jesse-nowack" class="btn btn-sm btn-white">View Profile</a>
            </aside>
          </div>
        </section>

        <section class="pane acracebest tier-1">
          <div class="photo" style="background-image: url('/images/guests/community/acracebest.jpg');"></div>
          <div class="mask">
            <aside class="mask-content">
              <h3>ACRacebest</h3>
              <a href="/guests/acracebest" class="btn btn-sm btn-white">View Profile</a>
            </aside>
          </div>
        </section>

        <section class="pane saberspark tier-1">
          <div class="photo" style="background-image: url('/images/guests/community/saberspark.jpg');"></div>
          <div class="mask">
            <aside class="mask-content">
              <h3>Saberspark</h3>
              <a href="/guests/saberspark" class="btn btn-sm btn-white">View Profile</a>
            </aside>
          </div>
        </section>

      </div>
    </div>




  </section>

  <div class="clearfix"></div>


</div>
