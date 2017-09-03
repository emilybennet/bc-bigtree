<?
  $currentPage = $page['link'];
  $topLevel = $cms->getToplevelNavigationId();
  $pageNav = $cms->getNavByParent($topLevel, 2);

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);
?>

<section class="header-band" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content">

  <div class="wrap content-page <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <section class="the-meat">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>

      <? if ($_GET['success']): ?>
      <div class="alert success">Thank you for your request, we'll be in touch shortly. If you have any questions please contact <strong>press@bronycon.org</strong></div>
      <? endif; ?>

      <? if ($_GET['error'] == 'files'): ?>
      <div class="alert danger">There was a problem with files you updated for press validation. Please try again or contact <strong>press@bronycon.org</strong></div>
      <? elseif ($_GET['error'] == 'nothuman'): ?>
      <div class="alert danger">Looks like you failed the human check. Please try again or contact <strong>press@bronycon.org</strong></div>
      <? elseif ($_GET['error'] == 'true'): ?>
      <div class="alert danger">We were unable to process your request. Please contact <strong>press@bronycon.org</strong></div>
      <? endif; ?>

      <?=$page_content?>

      <form method="post" action="<?=$page['link']?>" enctype="multipart/form-data" class="press-request" role="form">

        <fieldset>
          <legend>Media Outlet</legend>
          <ul class="unstyled">
            <li class="form-element">
              <label for="outlet_name">Outlet Name</label>
              <input type="text" name="outlet-name" id="outlet_name" placeholder="Ex. Ponyfree Productions" data-validation="required" data-validation-error-msg="Whom do you represent?" />
            </li>
            <li class="form-element">
              <label for="outlet_type">Outlet Type</label>
              <select class="chosen-select" data-placeholder="Outlet Type" id="outlet_type" placeholder="Outlet Type" name="outlet-type[]" multiple data-validation="required" data-validation-error-msg="You need to select at least one option">
                <option value="Podcast">Podcast</option>
                <option value="Print Publication">Print Publication</option>
                <option value="Radio">Radio</option>
                <option value="Television">Television</option>
                <option value="Web Publication">Web Publication</option>
                <option value="Other">Other</option>
              </select>
            </li>
            <li class="form-element">
              <label for="request_contact_name">Request Contact Name</label>
              <input type="text" name="request-contact-name" id="request_contact_name" placeholder="Ex. Midli Medely" data-validation="required" data-validation-error-msg="And you are…?" />
            </li>
            <li class="form-element">
              <label for="request_contact_email">Request Contact Email</label>
              <input type="text" name="request-contact-email" id="request_contact_email" placeholder="mmedely@ponyfree.pro" data-validation="email" />
            </li>
          </ul>
        </fieldset>

        <fieldset>
          <legend>Press Badges</legend>
          <ul class="unstyled">
            <li class="help-text form-element">
              You may request up to three (3) Press badges.
            </li>
            <li class="form-element">
              <input type="text" name="press-badge-one" placeholder="Legal name for attendee Press Badge #1" data-validation="required" data-validation-error-msg="You most likely want at least one BronyCon badge, right?"  />
            </li>
            <li class="form-element">
              <input type="text" name="press-badge-two" placeholder="Legal name for attendee Press Badge #2" />
            </li>
            <li class="form-element">
              <input type="text" name="press-badge-three" placeholder="Legal name for attendee Press Badge #3" />
            </li>
          </ul>
        </fieldset>

        <fieldset>
          <legend>Press Validation</legend>
          <ul class="unstyled">
            <li class="help-text form-element">
              Upload a minimum of two recent coverage examples with byline (preferably of similar events) OR a letter from a publication editor, submitted on company letterhead with verifiable outlet information.
            </li>
            <li class="form-element">
              <input type="file" name="press-proof[]" multiple  data-validation="required" data-validation-error-msg="Press vadlidation is required" />
            </li>
          </ul>
        </fieldset>
        <fieldset>
          <legend>Human Check</legend>
          <ul class="unstyled">
            <li class="help-text form-element">
              We really hate to do this but robots are not allowed Press Badges.
            </li>
          <li class="form-element">
              <label for="human_check">In US English, what month comes before September?</label>
              <input type="hidden" name="human-check-key" class="validation-acceptable-response" value="aug|aug.|august|8" />
              <input type="text" name="human-check" id="human_check" data-validation="required human_check" />
            </li>
          </ul>
        </fieldset>
        <div class="form-action-buttons form-element">
          <input type="hidden" name="destination" value="press@bronycon.org" />
          <input type="submit" value="Apply for Access" class="btn btn-fill-green btn-submit" />
        </div>
      </form>


    </section>
    <div class="clearfix"></div>
  </div>

</div>