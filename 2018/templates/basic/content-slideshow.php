<div class="<?=($slides)?'hidden-md hidden-lg':''?>">
<? require('content.php'); ?>
</div>

<? if ($slides): ?>
<section class="billboard hidden-xs hidden-sm">
  <section class="billboard reveal" style="color:white;">
    <div class="slides">

      <? foreach($slides as $slide): ?>
      <section class="slide" data-background="<?=$slide['image']?>" data-background-color="#202020" data-background-size="cover" data-background-position="50% 50%">
      </section>
      <? endforeach; ?>

    </div>

    <? if (count($slides) > 1): ?>
    <div class="paginate left">
      <span class="glyphicon-font">&#xe225;</span>
    </div>
    <div class="paginate right">
      <span class="glyphicon-font">&#xe224;</span>
    </div>
    <? endif; ?>


    <div class="content over-billboard">
      <div class="wrap <?=(count($pageNav)>1)?'has-nav':'';?>">

        <? if (count($pageNav)>1): ?>
        <nav class="section-nav">
          <? recurseNav($pageNav, $currentPage, false, 'unstyled'); ?>
        </nav>
        <? endif; ?>

        <article>
          <header class="page-header">
            <h2><?=$page_headline?></h2>
          </header>
          <div class="hidable">
            <?=$page_content?>
          </div>
        </article>
        <div class="clearfix"></div>
      </div>
    </div>

  </section>
</section>
<? endif; ?>