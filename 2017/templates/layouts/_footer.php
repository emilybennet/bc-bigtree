<?

  $navSocial = $cms->getSetting('footer_social_nav');
  $footerLegal = $cms->getSetting('footer_legal');

  $topLevel = $cms->getToplevelNavigationId();
  $navFooter = $cms->getNavByParent(0, 1);

  $footerImageMod = new footerImages();

  if (isset($_GET['useFooter'])) {
    $footerId = $_GET['useFooter'] * 1;
    $footerImage = $footerImageMod->get($footerId);
    $useFooter = $footerImage['image_retina'];
  } elseif ($footerCollectionIdOverride) {
    $footerImage = $footerImageMod->selectFooterImage($footerCollectionIdOverride);
    $useFooter = $footerImage['image_retina'];
  } elseif (!isset($_SESSION['bronycon_footer'])) {
    $footerImage = $footerImageMod->selectFooterImage();
    $_SESSION['bronycon_footer'] = $footerImage['image_retina'];
    $useFooter = $footerImage['image_retina'];
  } else {
    $useFooter = $_SESSION['bronycon_footer'];
  }

?>

      <section class="partners">
        <div class="wrap">
          <ul class="partner-list unstyled">
            <!--partners-->
          </ul>
          <div class="clearfix"></div>
        </div>
      </section>

      <footer class="primary">

        <div class="wrap">
          <img src="<?=$useFooter?>" class="awesome-mascot" />

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

      </footer>

    </section>
  </div>

  <section class="old-ie-modal">
    <header>
      <small>There's no easy way to say this, but here we go &hellip;</small>
      <h4>Your Browser is holding you back. <em>You've gotta move on!</em></h4>
    </header>
    <ul class="new-browsers unstyled">
      <li>
        <a href="https://www.google.com/chrome" target="_blank">
          <span class="browser-icon chrome"></span>
          <span class="label">Google Chrome</span>
        </a>
      </li>
      <li>
        <a href="https://www.mozilla.org/en-US/firefox/" target="_blank">
          <span class="browser-icon firefox"></span>
          <span class="label">Firefox</span>
        </a>
      </li>
      <li>
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank">
          <span class="browser-icon ie"></span>
          <span class="label">Internet Explorer</span>
        </a>
      </li>
      <li>
        <a href="http://www.opera.com/" target="_blank">
          <span class="browser-icon opera"></span>
          <span class="label">Opera</span>
        </a>
      </li>
    </ul>
    <footer>
      <span>No thanks. I understand this site may not display properly.</span>
      <a href="#" class="btn btn-pink btn-close">Close Window</a>
      <div class="clearfix"></div>
    </footer>
  </section>
<?
// Okay, let's get those js files
$cachebusterFile = $server_root."site/cachebuster.php";

if (file_exists($cachebusterFile)) {
  $assetFiles = include $cachebusterFile;
  foreach ($assetFiles['md5'] as $file => $fileHash) {
    $f = pathinfo($file);
    $asset = $www_root.$file;
    if ($_SERVER['BIGTREE_ENV'] == 'prod') {
      $asset .= '?v='.$fileHash;
    }
    if ($f['extension'] == 'js') {
      echo '  <script src="'.$asset.'"></script>'.PHP_EOL;
    }
  }
}
?>

<!-- Twitter universal website tag code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','nx7lx');
twq('track','PageView');
</script>
<!-- End Twitter universal website tag code -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-32160925-1', 'bronycon.org');
  ga('send', 'pageview');
</script>
<? if ($customAnalytics): ?>
  <script><?=$customAnalytics;?></script>
<? endif; ?>
</body>

</html>
