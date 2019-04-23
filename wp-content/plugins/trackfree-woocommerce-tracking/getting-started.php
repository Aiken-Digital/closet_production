<div class="wrap bootstrap-wrapper">
    <style>
    .trackfree_promotions_container {
        margin: 20px;
    }
    .trackfree_promotions_container .box__footer {
        color: #6C7378;
        font-size: 10px;
        line-height: 1.38461538;
        margin: 50px 0 10px 0;
        padding: 0 10px;
        text-align: center;
    }
    .trackfree_promotions_container__box {
        background-color: #ffffff;
        border: solid 1px #e4e7ee;
        margin-bottom: 20px;
    }
    .trackfree_promotions_container__header-text {
        margin: 0 auto 30px;
        max-width: 750px;
        text-align: center;
    }
    .trackfree_promotions_container__content {
        color: #6C7378;
        font-size: 15px;
        height: 81px;
        line-height: 1.8;
        margin: 0 auto;
        max-width: 650px;
        text-align: center;
    }
    .trackfree_promotions_container__action-btn {
        margin: 40px auto;
        width: 305px;
    }
    .trackfree_promotions_container__row {
        display: flex;
        min-height: 200px;
    }
    .trackfree_promotions_container__row .row__item {
        flex: 1;
    }
    .trackfree_promotions_container__row .item__image {
        height: 120px;
        margin: 0 auto;
        width: 117px;
    }
    .trackfree_promotions_container__row .item__text {
        margin: 20px 30px;
        text-align: center;
    }
    .trackfree_promotions__faq {
        color: #6c7378;
        font-size: 0.9375rem;
        margin-top: 30px;
        padding: 10px 30px;
    }
    .trackfree_promotions_container__row .item__image-first div {
        position: absolute;
        top: 11px;
        right: 30px;
        font-size: 16px;
        color: white;
    }
    .trackfree_promotions__faq .faq__header {
        color: #0070BA;
        font-size: 16px;
        line-height: 1.79;
    }
    .trackfree_promotions__faq .faq__list-number {
        list-style-type: decimal;
    }
    .trackfree_promotions__maccordion_wrapper {
        width: calc(100% - 72px);
    }

    /* Style the maccordion mpanel. Note: hidden by default */
    div.mpanel {
        padding: 15px 30px 15px 55px;
        background-color: #fff;
        border: solid 1px #e4e7ee;
        display: none;
        color: #6c7378;
        width: calc(100% - 15px);
    }
    div.mpanel ul {
        list-style-type: disc;
    }
    div.mpanel ol {
        list-style-type: decimal;
        margin-bottom: 0.8rem;
    }
    div.mpanel ul, div.mpanel ol {
        margin-left: 25px;
    }
    div.mpanel ul li, div.mpanel ol li {
        line-height: 1.6;
    }
    div.mpanel a, div.mpanel a:visited {
        color: #0070BA;
        text-decoration: none;
        font-weight: 500;
        font-family: 'PayPal-Sans', sans-serif;
    }
    .trackfree_promotions_container__header-banner {
        background: url( "<?php echo plugins_url( 'assets/images/banner-image.png', __FILE__ ) ?>" ) no-repeat;
        height: 200px;
        margin: 0 auto;
        max-width: 750px;
    }
    .trackfree_promotions_container__row .item__image-first {
        background: url( "<?php echo plugins_url( 'assets/images/time-and-date.png', __FILE__ ) ?>" ) no-repeat;
        position: relative;
    }
    .trackfree_promotions_container__row .item__image-second {
        background: url( "<?php echo plugins_url( 'assets/images/ui.png', __FILE__ ) ?>" ) no-repeat;
    }
    .trackfree_promotions_container__row .item__image-third {
        background: url( "<?php echo plugins_url( 'assets/images/like.png', __FILE__ ) ?>" ) no-repeat;
    }
    div.maccordion {
        border: solid 1px #e4e7ee;
        cursor: pointer;
        padding: 13px 18px 12px 52px;
        width: 100%;
        text-align: left;
        outline: none;
        transition: 0.4s;
        line-height: 1.79;
        color: #227bc0;
        vertical-align: middle;
        font-family: 'PayPal-Sans', sans-serif;
        display: inline-block;
        background: url(" <?php echo plugins_url( 'assets/images/arrow.png', __FILE__ ) ?>" ) no-repeat;
        background-position-x: 30px;
        background-position-y: center;
        background-color: #fff;
        background-size: 8px;
        font-size: 16px;
    }
    div.maccordion.active {
        background: url(" <?php echo plugins_url( 'assets/images/arrow-down.png', __FILE__ ) ?>" ) no-repeat;
        background-position-x: 27px;
        background-position-y: center;
        background-color: #fff;
        background-size: 13px;
    }
</style>
<div class="trackfree_promotions_container">
    <div class="trackfree_promotions_container__box">
        <div class="trackfree_promotions_container__header-banner"></div>
        <div class="trackfree_promotions_container__header-text">
            <h2 class="trackfree_big_header">
                Hassle-Free tracking solution for online business
            </h2>
        </div>
        <div class="trackfree_promotions_container__content">
            <span>
                TrackFree – a solution that enables businesses to better engage with customers and inspire long-term customer loyalty by delivering prime post-purchase experience.
            </span>
        </div>
        <div class="trackfree_promotions_container__action-btn">
            <?php if (!$appVerifyContent) { ?>
                <form method="post" action="<?php echo admin_url('admin.php?page=trackfree-getting-started');?>" style="margin:0px">
                    <?php settings_fields('trackfree_options_group'); ?>
                    <input type="hidden" name="trackfree" value="true" />
                    <input type="hidden" value="<?php echo $nonce; ?>" name="_wpnonce" />
                    <p class="item__text"><b>Email:</b>&nbsp;<input type="text" name="trackfree_account_email" value="<?php echo get_option('admin_email'); ?>" class="regular-text" style="width:80%; height:3em;" /></p>
                    <div id='muse-activate-managesettings-button'>
                        <button type="submit" class="paypal-px-btn" data-radium="true">Get Started</button>
                    </div>
                </form>
            <?php } else { ?>
                <div class="modal">
                    <?php echo $appVerifyContent; ?>
                </div>
            <?php } ?>
        </div>

        <div class="trackfree_promotions_container__row">
            <div class="row__item">
                <div class="item__image item__image-first">
                    <div>&nbsp;</div>
                </div>
                <div class="item__text">
                    <b>60%</b> of shoppers say they’re more likely to choose a retailer like you that can tell them <b>the exact date that a package will arrive</b></div>
                </div>
                <div class="row__item">
                    <div class="item__image item__image-second"></div>
                    <div class="item__text">
                        Drive traffic back to your website for <b>more conversions</b> with a self-contained order tracking page.
                    </div>
                </div>
                <div class="row__item">
                    <div class="item__image item__image-third"></div>
                    <div class="item__text">
                        The <b>most valuable</b> thing you can gain from your customers is their <b>feedback on the experiences</b> you’re providing.
                    </div>
                </div>
            </div>
            <div class="box__footer">
                <!-- trackfree footer content -->
            </div>
        </div>

        <div class="trackfree_promotions__maccordion_wrapper">
            <div class="maccordion">Who can help if I have questions?</div>
            <div class="mpanel">
                <div class="faq__info">
                    Please contact TrackFree by following this <a href="<?php echo trackfree_url();?>">link</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var acc = document.getElementsByClassName( "maccordion" );
    var i;
    for ( i = 0; i < acc.length; i++ ) {
        acc[i].onclick = function() {
            this.classList.toggle( "active" );
            var panel = this.nextElementSibling;
            if ( panel.style.display === "block" ) {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }
</script>
