<?
  header('Content-type: text/plain');

  $navSocial = $cms->getSetting('footer_social_nav');
  $footerLegal = $cms->getSetting('footer_legal');

  $topLevel = $cms->getToplevelNavigationId();
  $navFooter = $cms->getNavByParent(0, 1);

  if ($_GET['includeImage'] == "true") {
    $footerImageMod = new footerImages();
    if (isset($_GET['useFooter'])) {
      $footerId = $_GET['useFooter'] * 1;
      $footerImage = $footerImageMod->get($footerId);
      $useFooter = $footerImage['image_retina'];
    } else {
      $footerImage = $footerImageMod->selectFooterImage();
      $useFooter = $footerImage['image_retina'];
    }
  }
?>

<div class="wrap">
<? if ($_GET['includeImage'] == "true"): ?>
  <img src="<?=$useFooter?>" class="awesome-mascot" />
<? else: ?>
  {{footer_image}}
<? endif; ?>

  <div class="footer-liner<?=(strpos($useFooter, 'upsidefun'))?' upsidefun':''?>">

    <nav class="site">
      <ul>
        <? foreach ($navFooter as $navItem): ?>
        <li><a href="<?=$navItem['link']?>" class="accent"><?=$navItem['title']?></a></li>
        <? endforeach; ?>
      </ul>
    </nav>

    <nav class="social">
      <ul>
        <? 
          foreach($navSocial as $socialItem):
            if (!empty($socialItem['class'])) {
              $socialClass = $socialItem['class'];
            } else {
              $socialClass = $cms->urlify($socialItem['title']);
            }
        ?>
        <li>
          <a href="<?=$socialItem['link']?>" class="ss-<?=$socialClass?>" target="_blank">
            <span><?=$socialItem['title']?></span>
          </a>
        </li>
        <? endforeach; ?>
      </ul>
    </nav>

    <section class="baltimore-rocks">
      <a href="http://madewithloveinbaltimore.org">Made with <em class="accent">&hearts;</em> in Baltimare</a>
    </section>

    <section class="lawyer-speak">
      <?=str_replace("{CURRENT_YEAR}", date("Y"), $footerLegal)?>
    </section>

  </div>
  <div class="clearfix"></div>
</div>