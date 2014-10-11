<?
  $articles = $pressReleasesMod->getReleaseList();
?>

<section class="the-meat release-list">
  <header class="page-header">
    <h2><?=$page_headline?></h2>
  </header>
  
  <? foreach ($articles as $article): ?>
    <article>
      <a href="<?=$article['route']?>">
        <h4><?=$article['headline']?></h4>
      </a>
        <div class="dateline">
          <span class="glyphicon-font">&#xe055;</span>
          <span class="time"><?=date('M. j, Y', strtotime($article['publish_at']))?></span>
        </div>
        <? if ($article['abstract']): ?>
          <p><?=strip_tags($article['abstract'])?></p>
        <? else: ?>
          <p><?=truncateString(strip_tags($article['release']), 200)?></p>
        <? endif; ?>
    </article>
  <? endforeach;?>

</section>