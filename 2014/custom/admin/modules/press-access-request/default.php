<?
  $entryId = $commands[1];
  $pressAccessRequestMod = new pressAccessRequest();
  $entry = $pressAccessRequestMod->get($entryId);

  $labels = array(
    "id" => "Entry Id",
    "outlet_name" => "Outlet Name",
    "outlet_type" => "Outlet Type",
    "request_contact_name" => "Request Contact Name",
    "request_contact_email" => "Request Contact Email",
    "legal_name_of_press_badge_1" => "Legal Name of Press Badge Attendee #1",
    "legal_name_of_press_badge_2" => "Legal Name of Press Badge Attendee #2",
    "legal_name_of_press_badge_3" => "Legal Name of Press Badge Attendee #3",
    "press_validation" => "Press Validation Files",
    "created" => "Applied on"
    );

?>

<div class="container">
  <section class="press-access-request-viewer">
    <? foreach ($entry as $field => $value): ?>
      <div class="item">
        <span class="label"><?=$labels[$field]?></span>
        <? if ($field == "press_validation"): ?>
          <ul>
            <? 
              foreach ($value as $vLink):
                $filename = explode('/', $vLink);
                $filename = end($filename);
            ?>
              <li>
                <span class="response">
                  <a href="<?=$vLink?>" target="_blank">
                    <?=$filename?>
                  </a>
                </span>
              </li>
            <? endforeach; ?>
          </ul> 
        <? elseif ($field == "outlet_type"): ?>
          <span class="response"><?=implode(', ', $value)?></span>
        <? else: ?>
          <span class="response"><?=$value?></span>
        <? endif; ?>
      </div>
    <? endforeach; ?>
  </section>
</div>


<style>
  .press-access-request-viewer .item {
    margin-bottom: 20px;
  }

  .press-access-request-viewer .label {
    display: block;
    color: #999;
    font-size: 13px;
    margin-bottom: 10px;
  }

  .press-access-request-viewer .response {
    display: block;
    color: #333;
    font-size: 13px;
  }
</style>