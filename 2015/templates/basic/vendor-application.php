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

  <div class="wrap content-page wide-load <?=(count($pageNav)>1)?'has-nav':'';?>">

    <? if (count($pageNav)>1): ?>
    <nav class="section-nav visible-md visible-lg">
      <? recurseNav($pageNav, $currentPage); ?>
    </nav>
    <? endif; ?>

    <section class="the-meat registration">
      <header class="page-header">
        <h2><?=$page_headline?></h2>
      </header>
      <?=$page_content?>
    </section>

    <header class="section-heading">
      <h3>Booth Types</h3>
    </header>

      <section class="badge-type-list visible-xs">

        <section class="badge-card">
          <header>
            <span class="label">Artist Alley Booth</span>
            <span class="price">$170</span>
            <span class="register">
              <? if ($regURL): ?>
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a>
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 10' wide × 8' deep</li>
            <li>One 6' table</li>
            <li>Chairs: 2</li>
            <li>Vendor Badges: 2</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Basic Booth</span>
            <span class="price">$290</span>
            <span class="register">
              <? if ($regURL): ?>
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a>
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 10' wide × 10' deep</li>
            <li>One 8' table</li>
            <li>Chairs: 2</li>
            <li>Vendor Badges: 2</li>
            <li>Basic electricity Included</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>3' sidewall, 8' backwall pipe and drape</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Corner Booth</span>
            <span class="price">$325</span>
            <span class="register">
              <? if ($regURL): ?>
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a>
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 10' wide × 10' deep</li>
            <li>One 8' table + one 6' table</li>
            <li>Chairs: 2</li>
            <li>Vendor Badges: 2</li>
            <li>Basic electricity Included</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>3' sidewall, 8' backwall pipe and drape</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Double Basic Booth</span>
            <span class="price">$580</span>
            <span class="register">
              <? if ($regURL): ?>
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a>
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 20' wide × 10' deep</li>
            <li>Two 8' tables</li>
            <li>Chairs: 4</li>
            <li>Vendor Badges: 4</li>
            <li>Basic electricity Included</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>3' sidewall, 8' backwall pipe and drape</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Endcap Double Booth</span>
            <span class="price">$650</span>
            <span class="register">
              <? if ($regURL): ?>
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a>
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 20' wide × 10' deep</li>
            <li>Two 8' tables + two 6' tables</li>
            <li>Chairs: 4</li>
            <li>Vendor Badges: 4</li>
            <li>Basic electricity Included</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>8' backwall pipe and drape (sidewalls available upon request)</li>
          </ul>
        </section>

        <section class="badge-card">
          <header>
            <span class="label">Industry Island</span>
            <span class="price">$2,000</span>
            <span class="register">
              <? if ($regURL): ?>
              <a href="<?=$regURL?>" class="btn btn-white btn-sm">Apply</a>
              <? endif; ?>
            </span>
          </header>
          <ul class="perks">
            <li>Booth Dimensions: 20' wide × 20' deep</li>
            <li>Four 8' tables</li>
            <li>Chairs: 8</li>
            <li>Vendor Badges: 8</li>
            <li>Basic/moderate electricity Included</li>
            <li>Basic Union Fees Covered (Freight Not Included)</li>
            <li>Sidewall and Backwall pipe and drape available upon request</li>
          </ul>
        </section>

      </section>

      <section class="badge-types-table hidden-xs">
        <header>
          <section class="key"><span>&nbsp;</span></section>

          <section class="badge artist-alley-booth" data-badge-type="artist-alley-booth">
            <span class="label-wrap highlight">
              <span class="label">Artist Alley</span>
              <span class="price">$170</span>
              <span class="register">
                <? if ($regURL): ?>
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Apply</a>
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge basic-booth" data-badge-type="basic-booth">
            <span class="label-wrap highlight">
              <span class="label">Basic</span>
              <span class="price">$290</span>
              <span class="register">
                <? if ($regURL): ?>
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Apply</a>
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge corner-booth" data-badge-type="corner-booth">
            <span class="label-wrap highlight">
              <span class="label">Corner</span>
              <span class="price">$325</span>
              <span class="register">
                <? if ($regURL): ?>
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Apply</a>
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge double-basic-booth" data-badge-type="double-basic-booth">
            <span class="label-wrap highlight">
              <span class="label">Double Basic</span>
              <span class="price">$580</span>
              <span class="register">
                <? if ($regURL): ?>
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Apply</a>
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge endcap-double-booth" data-badge-type="endcap-double-booth">
            <span class="label-wrap highlight">
              <span class="label">Endcap Double</span>
              <span class="price">$650</span>
              <span class="register">
                <? if ($regURL): ?>
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Apply</a>
                <? endif; ?>
              </span>
            </span>
          </section>

          <section class="badge industry-island" data-badge-type="industry-island">
            <span class="label-wrap highlight">
              <span class="label">Industry Island</span>
              <span class="price">$2,000</span>
              <span class="register">
                <? if ($regURL): ?>
                <a href="<?=$regURL?>" class="btn btn-purple btn-sm">Apply</a>
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

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                <span class="check desc-text">10' wide <br/> 8' deep</span>
              </span>
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

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                <span class="check desc-text">One 6' table</span>
              </span>
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

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                <span class="check desc-text">2</span>
              </span>
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
              <span class="name">Vendor Badges</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                <span class="check desc-text">2</span>
              </span>
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
              <span class="name">Included Electricity</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                
              </span>
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
                <span class="check desc-text">Basic / Moderate</span>
              </span>
            </section>

            <div class="clearfix"></div>
          </li>

          <li>
            <section class="key">
              <span class="name">Union Fees Covered (Freight Not Included)</span>
            </section>

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                
              </span>
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

            <section class="badge glyphicon-font" data-badge-type="artist-alley-booth">
              <span class="highlight">
                
              </span>
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
                <span class="check desc-text">8' backwall <br/> (sidewalls available on request)</span>
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

      </section>

      <footer class="disclaimer-text">
        <p class="disclaimer"><strong>Custom layout options can be arranged!</strong> Please contact <a href="mailto:vendors@bronycon.org">vendors@bronycon.org</a> with your request.</p>
      </footer>


    <div class="clearfix"></div>
  </div>

</div>