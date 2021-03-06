<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

</div><!-- wrapper end -->
<nav class="midd-footer" aria-labelledby="midd-footer-label">
  <h2 id="midd-footer-label" class="sr-only">Additional navigation</h2>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <a href="https://www.middlebury.edu">
            <img src="https://www.middlebury.edu/office/themes/custom/middlebury_theme/images/middlebury-logo-white.svg?fv=r3sx4o" alt="Middlebury logo." width="195px" height="71px" class="footer-logo">
          </a>
      </div>
      <div class="col-md-9">
        <ul class="midd-footer__list">
          <!-- <li class="midd-footer__item">
            <a href="http://www.middlebury.edu/about" class="midd-footer__link">About Middlebury</a>
          </li>
          <li class="midd-footer__item">
            <a href="http://www.middlebury.edu/giving" class="midd-footer__link">Giving</a>
          </li> -->
          <!-- <li class="midd-footer__item">
            <a href="http://www.middlebury.edu/offices/business/hr/jobseeker" class="midd-footer__link">Employment</a>
          </li>
          <li class="midd-footer__item">
            <a href="http://www.middlebury.edu/office/" class="midd-footer__link">Offices and Services</a>
          </li> -->
          <!-- <li class="midd-footer__item">
            <a href="http://www.middlebury.edu/about/copyright" class="midd-footer__link">Copyright</a>
          </li>
          <li class="midd-footer__item">
            <a href="http://www.middlebury.edu/about/privacy" class="midd-footer__link">Privacy</a>
          </li>       -->
        </ul>

      </div>
    </div>
  </div>
</nav>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
		<!-- Begin Mailchimp Signup Form -->
<!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> -->
<style type="text/css">
                #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://middcreate.us5.list-manage.com/subscribe/post?u=0d55835ef38be4e02b8a2e9d2&amp;id=d0ad533d75" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
                <h2 id='modalTitle'>Get email updates!</h2>
                <?php the_field('newsletter_intro', 'option');?>
<!-- <div class="indicates-required"><span class="asterisk">*</span> indicates required</div> -->
<div class="mc-field-group">
                <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
                <label for="mce-FNAME">Name </label>
                <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
</div>
                <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_0d55835ef38be4e02b8a2e9d2_d0ad533d75" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" class="btn btn-ar btn-blue" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
    </div>
  </div>
</div>

</body>

</html>


