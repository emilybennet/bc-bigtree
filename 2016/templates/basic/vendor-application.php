<?
  if ($forceNoNav != true) {
    $currentPage = $page['link'];
    $topLevel = $cms->getToplevelNavigationId();
    $pageNav = $cms->getNavByParent($topLevel, 2);
  }

  $pageHeadersMod = new pageHeaders();
  $pageHeader = $pageHeadersMod->get($page_header);

  if ($pageHeader['social_media_image']) {
    $customOpenGraphImage = $pageHeader['social_media_image'];
  }

?>

<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('<?=$pageHeader['image']?>');"></section>

<? if ($pageHeader['custom_css']): ?>
<style><?=$pageHeader['custom_css']?></style>
<? endif; ?>

<div class="content header-band-bump">

  <div class="content-page wide-load">

    <div class="wrap wide-load" style="text-align:left;">
    <section class="the-meat registration">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
      <?=$page_content?>
    </section>
    </div>

    <section class="merchant-types">

      <section>
        <header>
          <h3>Exhibitor Hall</h3>
          <span class="btn btn-white btn-disabled btn-md">Application Closed</span>
          <a href="/about/policies/exhibitor-policies/" class="policy-link">Exhibitor Hall Policies</a>
        </header>
        <div class="merchant-specs">
          <p>Traditional convention booths for commercial merchants, larger artists, and craftspeople.</p>
          <p><a href="#exibitor-booth-types">Various booth configurations available.</a></p>
        </div>
      </section>

      <section>
        <header>
          <h3>Artist Alley</h3>
          <span class="btn btn-white btn-disabled btn-md">Application Closed</span>
          <a href="/about/policies/artist-policies/" class="policy-link">Artist Alley Policies</a>
        </header>
        <div class="merchant-specs">
          <p>First-come, first-serve slots available for artists to create and sell their own works of art. </p>
          <p>Single slots: $100 &bull; Double slots: $175.</p>
        </div>
      </section>

      <section>
        <header>
          <h3>Art Show</h3>
          <a href="http://goo.gl/forms/53cml8Uw6b" class="btn btn-white btn-md">Artist Application</a>
          <div>
          <a href="http://goo.gl/forms/IVNXc2cybU" class="policy-link" style="display:inline-block">Agent Application</a> •
          <a href="/about/policies/art-show-policies/" class="policy-link" style="display:inline-block">Art Show Policies</a>
          </div>
        </header>
        <div class="merchant-specs">
          <p>Submit one-of-a-kind artwork for attendees to bid on in a BronyCon-operated art gallery.</p>
          <p>$5 per piece to enter.</p>
        </div>
      </section>
    </section>

    <div class="wrap wide-load">
    <header class="section-heading" id="exibitor-booth-types">
      <h3>Exhibitor Booths Types</h3>
    </header>

      <section class="badge-type-list visible-xs">

        <section class="badge-card">
          <header>
            <span class="label">Single</span>
            <span class="price">$300</span>
            <span class="register">
              <? if ($regURL): ?>
             <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 10' wide × 10' deep</li>
            <li>One 8' table</li>
            <li>Chairs: 2</li>
            <li>Exhibitor Badges: 2</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>3' sidewall, 8' backwall pipe and drape</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Corner</span>
            <span class="price">$375</span>
            <span class="register">
              <? if ($regURL): ?>
              <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 10' wide × 10' deep</li>
            <li>One 8' table + one 6' table</li>
            <li>Chairs: 2</li>
            <li>Exhibitor Badges: 2</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>3' sidewall, 8' backwall pipe and drape</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Inline Double</span>
            <span class="price">$600</span>
            <span class="register">
              <? if ($regURL): ?>
              <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 20' wide × 10' deep</li>
            <li>Two 8' tables</li>
            <li>Chairs: 4</li>
            <li>Exhibitor Badges: 4</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>3' sidewall, 8' backwall pipe and drape</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Endcap Double</span>
            <span class="price">$750</span>
            <span class="register">
              <? if ($regURL): ?>
              <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 20' wide × 10' deep</li>
            <li>Two 8' tables + two 6' tables</li>
            <li>Chairs: 4</li>
            <li>Exhibitor Badges: 4</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>8' backwall pipe and drape (sidewalls available upon request)</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Island Quad</span>
            <span class="price">$2,100</span>
            <span class="register">
              <? if ($regURL): ?>
              <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 20' wide × 20' deep</li>
            <li>Four 8' tables</li>
            <li>Chairs: 8</li>
            <li>Exhibitor Badges: 8</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>Sidewall and Backwall pipe and drape available upon request</li>
          </ul>
        </section>

      </section>

      <section class="badge-types-table hidden-xs">
        <header>
          <section class="key"><span>&nbsp;</span></section>

          <section class="badge basic-booth" data-badge-type="basic-booth">
            <span class="label-wrap highlight">
              <span class="label">Single</span>
              <span class="price">$300</span>
              <span class="register">
                <? if ($regURL): ?>
                <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge corner-booth" data-badge-type="corner-booth">
            <span class="label-wrap highlight">
              <span class="label">Corner</span>
              <span class="price">$375</span>
              <span class="register">
                <? if ($regURL): ?>
                <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge double-basic-booth" data-badge-type="double-basic-booth">
            <span class="label-wrap highlight">
              <span class="label">Inline Double</span>
              <span class="price">$600</span>
              <span class="register">
                <? if ($regURL): ?>
                <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge endcap-double-booth" data-badge-type="endcap-double-booth">
            <span class="label-wrap highlight">
              <span class="label">Endcap Double</span>
              <span class="price">$750</span>
              <span class="register">
                <? if ($regURL): ?>
                <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge industry-island" data-badge-type="industry-island">
            <span class="label-wrap highlight">
              <span class="label">Island Quad</span>
              <span class="price">$2,100</span>
              <span class="register">
                <? if ($regURL): ?>
                <!--  <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a> -->
                <? endif; ?>
              </span>
            </span>
          </section>



          <div class="clearfix"></div>
        </header>

        <ul class="perks unstyled">

          <li>
            <section class="key">
              <span class="name">Booth Dimensions</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="basic-booth">
              <span class="highlight">
                <span class="check desc-text">10' wide <br/> 10' deep</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="corner-booth">
              <span class="highlight">
                <span class="check desc-text">10' wide <br/> 10' deep</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="double-basic-booth">
              <span class="highlight">
                <span class="check desc-text">20' wide <br/> 10' deep</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="endcap-double-booth">
              <span class="highlight">
                <span class="check desc-text">20' wide <br/> 10' deep</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="industry-island">
              <span class="highlight">
                <span class="check desc-text">20' wide <br/> 20' deep</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

          <li>
            <section class="key">
              <span class="name">Draped Table(s)</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="basic-booth">
              <span class="highlight">
                <span class="check desc-text">One 8' table</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="corner-booth">
              <span class="highlight">
                <span class="check desc-text">One 8' table <br/> one 6' table</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="double-basic-booth">
              <span class="highlight">
                <span class="check desc-text">Two 8' tables</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="endcap-double-booth">
              <span class="highlight">
                <span class="check desc-text">Two 8' tables <br/> Two 6' tables</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="industry-island">
              <span class="highlight">
                <span class="check desc-text">Four 8' tables</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

          <li>
            <section class="key">
              <span class="name">Provided Chairs</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="basic-booth">
              <span class="highlight">
                <span class="check desc-text">2</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="corner-booth">
              <span class="highlight">
                <span class="check desc-text">2</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="double-basic-booth">
              <span class="highlight">
                <span class="check desc-text">4</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="endcap-double-booth">
              <span class="highlight">
                <span class="check desc-text">4</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="industry-island">
              <span class="highlight">
                <span class="check desc-text">8</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

          <li>
            <section class="key">
              <span class="name">Exhibitor Badges</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="basic-booth">
              <span class="highlight">
                <span class="check desc-text">2</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="corner-booth">
              <span class="highlight">
                <span class="check desc-text">2</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="double-basic-booth">
              <span class="highlight">
                <span class="check desc-text">4</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="endcap-double-booth">
              <span class="highlight">
                <span class="check desc-text">4</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="industry-island">
              <span class="highlight">
                <span class="check desc-text">8</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

          <li>
            <section class="key">
              <span class="name">Union Fees Covered</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="basic-booth">
              <span class="highlight">
                <span class="check desc-text">Basic</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="corner-booth">
              <span class="highlight">
                <span class="check desc-text">Basic</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="double-basic-booth">
              <span class="highlight">
                <span class="check desc-text">Basic</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="endcap-double-booth">
              <span class="highlight">
                <span class="check desc-text">Basic</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="industry-island">
              <span class="highlight">
                <span class="check desc-text">Basic</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

          <li>
            <section class="key">
              <span class="name">Pipe &amp; Drape</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="basic-booth">
              <span class="highlight">
                <span class="check desc-text">3' sidewall <br/> 8' backwall</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="corner-booth">
              <span class="highlight">
                <span class="check desc-text">3' sidewall <br/> 8' backwall</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="double-basic-booth">
              <span class="highlight">
                <span class="check desc-text">3' sidewall <br/> 8' backwall</span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="endcap-double-booth">
              <span class="highlight">
                <span class="check desc-text">8' backwall <br/> <small style="line-height: 9px; display: inline-block;">sidewalls available<br/> on request</small></span>
              </span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="industry-island">
              <span class="highlight">
                <span class="check desc-text">Available on request</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

        </ul>

        <style>
          .badge-types-table header section.key, .badge-types-table li section.key {
            width: 24%;
          }
          .badge-types-table header section.badge, .badge-types-table li section.badge {
            width: 15%;
          }
        </style>

      </section>

      <footer class="disclaimer-text">
        <p class="disclaimer">Additional assistant Exhibitor badges available for $65 each.</p>
      </footer>


    <div class="clearfix"></div>
    </div>
  </div>

</div>
