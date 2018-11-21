<section class="header-band <?=($pageHeader['legacy_header'])?'legacy-height':'';?>" style="background-image: url('http://bd4579002468ef404afa-8099c7257fe87d50d338ebe5e9167369.r97.cf2.rackcdn.com/2015-about.jpg');"></section>


<div class="content header-band-bump">

    <div class="wrap content-page">

        <section class="the-meat">
            <header class="page-header">
                <h2>Redeem Registration</h2>
            </header>

            <p>Unlock your discounted 3-Day badge to BronyCon by entering your code below. After submitting your code you'll be taken to Eventbrite, our online registration system, to complete the checkout process.</p>

            <form method="GET" action="https://bronycon2018.eventbrite.com#tickets" class="code-redeem">

                <ul class="unstyled">
                    <li class="form-element">
                      <input type="text" name="discount" id="discount" placeholder="super-secret-code-here" required/>
                    </li>
                </ul>
                <div class="form-action-buttons form-element">
                  <input type="submit" value="Redeem Code" class="btn btn-fill-green btn-submit" />
                </div>
            </form>

        </section>
        <div class="clearfix"></div>
    </div>

</div>

<style>
    form.code-redeem {
        padding-top: 20px;
        text-align: center;
    }
    form.code-redeem input[type=text] {
        font-size: 25px;
        text-align: center;
        width: 300px;
    }
</style>
