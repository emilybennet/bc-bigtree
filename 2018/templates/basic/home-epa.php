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

      <section class="header-band home plain">
        <div class="tab-wrapper">
            <h3><span>Aug. 7–9, 2015</span><span>Baltimore, Maryland</span></h3>
        </div>
      </section>

      <section class="important-announcement" style="background-color: #fafafa; border-top: 1px solid #3C89C8">
        <div class="wrap">
          <?=$open_letter;?>
        </div>
      </section>


      <div class="content">


      </div>