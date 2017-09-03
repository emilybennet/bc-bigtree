<div class="bp-background"></div>

<div class="content bronypalooza">

  <div class="wrap content-page">

    <section class="the-meat">
      <header class="bp-logo">
        <h2>BronyPalooza</h2>
      </header>

      <h3 class="tagline"><img src="/images/bronypalooza-logo-2017.png" alt="<?=$tagline?>" title="<?=$tagline?>" style="width:300px;margin-top:20px;"></h3>
      <section class="intro" style="padding: 0 15px;margin-bottom: 40px;">
          <?=$content?>
      </section>

      <section class="cta-bp" style="text-align:center;margin-bottom: 40px;">
          <? if ($cta_btn_text && $cta_btn_url): ?>
          <a href="<?=$cta_btn_url?>" class="btn btn-lg btn-white" target="_blank"><?=$cta_btn_text?></a>
          <? endif; ?>
      </section>

      <section class="timelines">

        <div class="timeline-group">
          <h3 style="color: #FFEB5F;padding-left:20px;">Friday <small>August 11</small></h3>
          <ul class="unstyled timeline line-left">
              <? foreach ($friday_acts as $act): ?>
              <li>
                  <div>
                      <h4><?=$act['performer']?> <small><?=$act['set_time']?></small></h4>
                  </div>
              </li>
              <? endforeach; ?>
          </ul>
        </div>

        <div class="timeline-group">
          <h3 style="color: #FFEB5F;padding-left:20px;">Saturday <small>August 12</small></h3>
          <ul class="unstyled timeline line-left saturday">
              <? foreach ($saturday_acts as $act): ?>
              <li>
                  <div>
                      <h4><?=$act['performer']?> <small><?=$act['set_time']?></small></h4>
                  </div>
              </li>
              <? endforeach; ?>
          </ul>
        </div>
        <div class="info"><span>Due to the nature of live performances, set times are subject to change.</span></div>
      </section>

    </section>
    <div class="clearfix"></div>
  </div>

</div>

<style>
  .bp-background {
      background-color: #87C88C;
      background-image: url('/images/bronypalooza-texture-2017.png');
      background-position: center center;
  }
  .content.bronypalooza {
      background-position: center center;
      padding-bottom: 100px;
  }
  .bronypalooza .tagline {
      margin-top: 0;
  }
  .bronypalooza .the-meat {
      background-color: rgba(51,51,51,.5);
      border-radius: 3px;
      padding-top: 20px !important;
      padding-bottom: 20px !important;
  }
  .bronypalooza .timeline-group {
      margin-bottom: 0px !important;
      vertical-align: top;
  }
  .partners {
      display: none !important;
  }
  .bronypalooza .info {
      text-align: center;
      margin: 20px 0;
  }
  .bronypalooza .info span {
      display: inline-block;
      color: #white;
      text-align: center;
      background-color: #F68B28;
      padding: 5px 7px;
  }
  .content.bronypalooza .timeline-group {
      margin: 0;
  }
  .content.bronypalooza .timeline-group h3 {
      margin-top: 0;
  }
  .bronypalooza .intro p:last-child {
      margin-bottom: 0;
  }
</style>
