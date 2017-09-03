<?

  if ($commands) {
    $currentPage = $page["link"].$commands[0];
  } else {
    $currentPage = $page["link"];
  }

  $topLevel = $cms->getToplevelNavigationId();
  $pageNav = $cms->getNavByParent($topLevel, 2);

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  $customAnalytics = '
    $(function(){
      $(".event-track").click(function(){
        
        var category = $(this).data("event-category");
        var action = $(this).data("event-action");
        var label = $(this).data("event-label");
        var destURL = $(this).attr("href");

        ga("send", "event", category, action, label, {"hitCallback": function() { document.location = destURL; } });

        return false;
      });
    });
  ';
?>


<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

  <div class="wrap content-page press-releases <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <? if ($commands[0] == "staff") {
      require("staff-content.php");
    } elseif ($commands[0] == "gopher") {
      require("gopher-content.php"); 
    } else {
      require("landing.php"); 
    } ?>

    <div class="clearfix"></div>
  </div>

</div>