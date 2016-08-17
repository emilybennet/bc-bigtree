<?
  $article = $pressReleasesMod->getByRoute($commands[0]);

  if ($article['media_contact']) {
    $mediaContact = $mediaContactsMod->get($article['media_contact']);
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
  
  <? if ($article['boilerplate']): ?>
    <div class="press-release-auxillary boilerplate">
      <h6>About BronyCon</h6>
      <?=$article['boilerplate']?>
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