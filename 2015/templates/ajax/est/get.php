<? require('_head.php'); ?>

<section class="header-band" style="background-image: url('http://bd4579002468ef404afa-8099c7257fe87d50d338ebe5e9167369.r97.cf2.rackcdn.com/blueprint-header.jpg');"></section>

<div class="content">

  <div class="wrap content-page">

    <section class="the-meat">
      <header class="page-header">
        <h2>Email Signature Tool</h2>
      </header>
      
      <form method="post" role="form">

          <ul class="unstyled">
            <li class="form-element">
              <label for="employee_name">Your name <span class="form-required">*</span></label>
              <input type="text" name="name" id="employee_name" placeholder="Ex. Pidli Medely" data-validation="required" data-validation-error-msg="You are…?" />
            </li>
            <li class="form-element">
              <label for="employee_role">Your role <span class="form-required">*</span></label>
              <input type="text" name="role" id="employee_role" placeholder="Chief Principal Fungineer" data-validation="required" data-validation-error-msg="And what is it you do here…?" />
            </li>
            <li class="form-element">
              <label for="employee_email">Email (include @bronycon.org)</label>
              <input type="text" name="email" id="employee_email" placeholder="pmedely@bronycon.org" />
            </li>
            <li class="form-element">
              <label for="employee_tel">Direct phone contact (ex. 410-555-1515)</label>
              <input type="text" name="tel" id="employee_tel" placeholder="410-555-1515" />
            </li>
            <li class="form-action-buttons form-element">
              <input type="submit" value="Create my Signature" class="btn btn-fill-green btn-submit" />
            </li>
          </ul>

      </form>

    </section>
    <div class="clearfix"></div>
  </div>

</div>

<? require('_foot.php'); ?>