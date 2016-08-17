<?
  if ($forceNoNav != true) {
    $currentPage = $page['link'];
    $topLevel = $cms->getToplevelNavigationId();
    $pageNav = $cms->getNavByParent($topLevel, 2);
  }

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  if ($pageHeader['social_media_image']) {
    $customOpenGraphImage = $pageHeader['social_media_image'];
  }

?>

<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content header-band-bump">

  <div class="content-page wide-load">

    <div class="wrap wide-load" style="text-align:left;">
    <section class="the-meat registration">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
      <?=$page_content?>
    </section>
    </div>

    <section class="merchant-types">

      <section>
        <header>
          <h3>Hall Cosplay Contest</h3>
          <a href="https://docs.google.com/a/emilybennet.com/forms/d/1zHZ1Sf6h-u0dmYktJfZkCjWjYCIil4jLwlHKLflvZig/viewform" class="btn btn-white btn-md">Hall Cosplay Contest Pre-Registration</a>
          <a href="/events/cosplay/hall-cosplay-contest-rules/" class="policy-link">Hall Cosplay Contest Rules</a>
        </header>
        <div class="merchant-specs">
          <p>The premier MLP cosplay competition all about craftsmanship &amp; ability to recreate a character.</p>
        </div>
      </section>

      <section>
        <header>
          <h3>Cosplay Fashion Show</h3>
          <a href="https://docs.google.com/a/emilybennet.com/forms/d/1ZgqKWdFGyMPjd9O6gDKaOXXPvZgOPphTYzhV-4muyRU/viewform" class="btn btn-white btn-md">Fashion Show Pre-Registration</a>
          <a href="/events/cosplay/cosplay-fashion-show-rules/" class="policy-link">Cosplay Fashion Show Rules</a>
        </header>
        <div class="merchant-specs">
          <p>Strut your stuff and show off your cosplay in front of an audience at this non-competitive event.</p>
        </div>
      </section>
    </section>

    <div class="wrap wide-load">
    <header class="section-heading" id="exibitor-booth-types">
      <h3>Cosplay Events FAQ</h3>
    </header>

    <section style="text-align:left;padding-bottom:30px;">

        <h5>Q: Why are you doing the contest this way?</h5>
        <p>A: We are looking for new ways to improve cosplay events at BronyCon. Over the last few years, with the large growth in attendance and interest in our cosplay-related events, we felt it was time to break it down into two separate events: One for competition and one for fun. </p>

        <h5>Q: I pre-registered, but I picked the wrong division. What do I do?</h5>
        <p>A: Please email <a href="mailto:cosplay@bronycon.org">cosplay@bronycon.org</a>, and we will switch you to the correct division.</p>

        <h5>Q: Can I enter with a group?</h5>
        <p>A: Yes. but group entries will be limited to 6 entrants. We are on a scheduled time block and must stay on schedule.</p>

        <h5>Q: Why can&CloseCurlyQuote;t I enter my Solid Snake cosplay?! It&CloseCurlyQuote;s really unfair that I can&CloseCurlyQuote;t!</h5>
        <p>A: BronyCon is a MLP-centered event. We feel that it is only fair that we keep all cosplays in our contest to MLP-related ones.</p>

        <h5>Q: My costume was commissioned but I can&CloseCurlyQuote;t enter the contest? That&CloseCurlyQuote;s not right!</h5>
        <p>A: Unless the person who made your costume will be present to discuss its construction, you cannot enter. This competition is about craftsmanship and the ability to construct a garment in the best possible manner. If you have a costume you wish to show off, we invite you to join our Fashion Show.</p>

        <h5>Q: I want to enter on Saturday but I have horrible stage fright. Do I HAVE to do the Fashion Show?</h5>
        <p>A: All Saturday participants are required to participate in our Fashion Show on Saturday afternoon to show off their handiwork. If you wish to opt out, please email our events staff at <a href="mailto:cosplay@bronycon.org">cosplay@bronycon.org</a>. Although you will be asked to sit in the audience and watch.</p>

        <h5>Q: I have about a bazillion other questions. Who can I talk to?</h5>
        <p>A: Please email us at <a href="mailto:cosplay@bronycon.org">cosplay@bronycon.org</a> with any and all concerns about the contest. We will gladly assist you in whatever way we can. </p>

    </section>

    <div class="clearfix"></div>
    </div>
  </div>

</div>
