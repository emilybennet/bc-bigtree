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

  <div class="content-page">
    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
    </section>
    <section class="guest-strips">

      <div class="strip">
        <div class="wrap">

          <section class="pane daniel-ingram tier-3">
            <div class="photo" style="background-image: url('/images/guests/headshot/ingram.jpg');">
            </div>
            <div class="mask">
              <aside class="mask-content">
                  <img src="/images/guests/bronicon/ingram.png" class="pony-avatar" />
                  <h3>Daniel Ingram</h3>
                <a href="daniel-ingram" class="btn btn-sm btn-white">View Profile</a>
              </aside>
            </div>
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
    <div class="clearfix"></div>
  </div>

</div>