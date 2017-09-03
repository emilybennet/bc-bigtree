<?
  $article = $pressReleasesMod->getByRoute($commands[0]);

  if ($article['media_contact']) {
    $mediaContact = $mediaContactsMod->get($article['media_contact']);
  }

  $defaultRegInfo = $cms->getSetting('default_press_release_reg_info');
  $defaultBoilerplate = $cms->getSetting('default_press_release_boilerplate');

  if ($article['reg-info']) {
      $reginfo = $article['reg-info'];
  } elseif ($defaultRegInfo) {
      $reginfo = $defaultRegInfo;
  } else {
      $reginfo = false;
  }

  if ($article['boilerplate']) {
      $boilerplate = $article['boilerplate'];
  } elseif ($defaultBoilerplate) {
      $boilerplate = $defaultBoilerplate;
  } else {
      $boilerplate = false;
  }
?>

<? if ($article == false):?>
  <? $cms->handle404(str_ireplace(WWW_ROOT,"",BigTree::currentURL())); ?>
  <section class="the-meat">
    <header class="page-header">
      <h2>404 Page Not Found</h2>
    </header>
    Welp, this is awkward.
  </section>
<? else: ?>

<article class="the-meat">
  <header class="page-header">
    <h2><?=$article['headline']?></h2>
  </header>
  <div class="dateline">
    <span class="glyphicon-font">&#xe055;</span>
    <span class="time"><?=date('M. j, Y', strtotime($article['publish_at']))?></span>
  </div>

  <?=$article['release']?>

  <? if ($reginfo): ?>
    <div class="press-release-auxillary boilerplate">
      <h6>To register for this event</h6>
      <?=$reginfo?>
    </div>
  <? endif; ?>

  <? if ($boilerplate): ?>
    <div class="press-release-auxillary boilerplate">
      <h6>About BronyCon</h6>
      <?=$boilerplate?>
    </div>
  <? endif; ?>

  <? if ($article['media_contact']): ?>
    <div class="press-release-auxillary media-contact">
      <h6>Media Contact</h6>
      <?=$mediaContact['name']?> <?=($mediaContact['aka'])?'("'.$mediaContact['aka'].'")':''?><br />
      <?=($mediaContact['email'])?$mediaContact['email'].'<br />':''?>
      <?=($mediaContact['tel'])?$mediaContact['tel'].'<br />':''?>
    </div>
  <? endif; ?>

</article>

<? endif; ?>
