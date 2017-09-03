<?
  $staffMod = new volunteerStaffOpenings();
  $openings = $staffMod->getOpenings();
?>

<section class="the-meat volunteer-staff">
  <header class="page-header">
    <h2><?=$staff_opening_header?></h2>
  </header>

  <?=$staff_description?>

  <h3>Perks</h3>

  <?=$staff_perks?>

  <h3>Open Positions</h3>

  <? foreach ($openings as $d => $items): ?>
    <fieldset id="<?=$cms->urlify($d)?>">
      <legend><?=$d?></legend>
      <? foreach ($items as $i): ?>
        <div class="role">
          <h6><?=$i["role_title"]?>
            <?=($i["application_link"])?'<a href="'.$i["application_link"].'" class="btn btn-sm btn-fill-orange event-track" target="_blank" data-event-category="Staff Application" data-event-action="click" data-event-label="'.$d.' - '.$i["role_title"].'">Apply for this Role</a>':''?>
          </h6>
          <div class="role-description">
            <?=$i["description"]?>
          </div>
        </div>
      <? endforeach; ?>
    </fieldset>
  <? endforeach; ?>

  <? if (!$openings): ?>
  <p><em>Volunteer opportunities coming soon!</em></p>
  <? endif; ?>

</section>
