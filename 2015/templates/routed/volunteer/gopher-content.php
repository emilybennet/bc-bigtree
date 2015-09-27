<section class="the-meat volunteer">
  <header class="page-header">
    <h2><?=$gopher_opening_header?></h2>
  </header>

  <?=$gopher_description?>

  <h3>Perks</h3>

  <?=$gopher_perks?>

  <? if ($gopher_application_link): ?>
  <div class="volunteer-action">
    <a href="<?=$gopher_application_link?>" class="btn btn-fill-purple btn-lg event-track" target="_blank" data-event-category="Gopher Application" data-event-action="click" data-event-label="Gopher">Apply as a Gopher</a>
  </div>
  <? else: ?>
    <p>Gopher applications will open closer to the convention. Keep an eye here and our Social Media for updates.</p>
  <? endif; ?>

</section>