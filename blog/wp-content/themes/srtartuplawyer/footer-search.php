<?php 



$url = get_assets_url();



$args = array(



    'menu_id'           => 28,



);



$ql = wp_get_nav_menu_items(68);



?>



	<footer>



		<div class="container">



			<div class="row">



				<div class="col-lg-3 col-md-6">



					<h3 data-target="#collapse_1">Quick Links</h3>



					<div class="collapse dont-collapse-sm links" id="collapse_1">



						<ul>
						    <?php
						    foreach($ql as $k=> $v)
						    {
						        ?>
						        <li><a href="<?= $v->url; ?>"><?= $v->title; ?></a></li>
						        <?php
						    }
						    ?>



						</ul>



					</div>



				</div>



				<div class="col-lg-3 col-md-6">



					<h3 data-target="#collapse_2">Ask Any Question </h3>



					<div class="collapse dont-collapse-sm links" id="collapse_2">



						<ul>



							<li><a href="<?= site_url(); ?>/launch-chat-bot/">Launch Chat bot</a></li>



							<li><a href="<?= site_url(); ?>/watch-how-to-videos/">Watch “How to” videos</a></li>



						</ul>



						<!-- <ul>



							<li><a href="listing-grid-1-full.html">Top Categories</a></li>



							<li><a href="listing-grid-2-full.html">Best Rated</a></li>



							<li><a href="listing-grid-1-full.html">Best Price</a></li>



							<li><a href="listing-grid-3.html">Latest Submissions</a></li>



						</ul> -->



					</div>



				</div>



				<div class="col-lg-3 col-md-6">


						<h3 data-target="#collapse_3">Contacts</h3>



					<div class="collapse dont-collapse-sm contacts" id="collapse_3">



						<ul>



							<li><i class="icon_house_alt"></i><?= $RET =  ot_get_option( 'contact_address', '97845 Baker st. 567' ); ?></li>



							<li><i class="icon_mobile"></i><a href="tel:+94 423-23-221"><?= ot_get_option( 'contact_phone', '+94 423-23-221' ); ?></a></li>



							<li><i class="icon_mail_alt"></i><a href="mailto:info@domain.com"><?= ot_get_option( 'contact_mail', 'info@domain.com' ); ?></a></li>



						</ul>



					</div>



				</div>



				<div class="col-lg-3 col-md-6">



						<h3 data-target="#collapse_4">Register for free stuff</h3>



						<p>Grab your free stuff</p>



					<div class="collapse dont-collapse-sm" id="collapse_4">



						<div id="newsletter">



							<div id="message-newsletter"></div>



							<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">



								<div class="form-group">



									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">



									<button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>



								</div>



							</form>



						</div>



						<div class="follow_us">



							<h5>Follow Us</h5>



							<ul>

								<li><a href="#0"><i style="    font-size: 21px;

    color: white;

    background: #142954;

    padding: 8px 13px;" class="fa fa-facebook"></i></a></li>

    <li><a href="#0"><i style="    font-size: 21px;

    color: white;

    background: #142954;

    padding: 8px 13px;" class="fa fa-youtube"></i></a></li>

								<li><a href="#0"><i style="    font-size: 21px;

    color: white;

    background: #142954;

    padding: 8px 13px;" class="fa fa-linkedin"></i></a></li>



								<!-- <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/twitter_icon.svg" alt="" class="lazy"></a></li> -->



								<!-- <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/facebook_icon.svg" alt="" class="lazy"></a></li>



								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/instagram_icon.svg" alt="" class="lazy"></a></li>



								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/youtube_icon.svg" alt="" class="lazy"></a></li> -->



							</ul>



						</div>



					</div>



				</div>



			</div>



			<!-- /row-->



			<hr>



			<div class="row add_bottom_25">



				<div class="col-lg-6">



					<ul class="footer-selector clearfix">



						<li>



							<div class="styled-select lang-selector">



								<select>



									<option value="English" selected>English</option>



									<option value="French">French</option>



									<option value="Spanish">Spanish</option>



									<option value="Russian">Russian</option>



								</select>



							</div>



						</li>



						<li>



							<div class="styled-select currency-selector">



								<select>



									<option value="US Dollars" selected> LKR</option>



									<!-- <option value="Euro">Euro</option> -->



								</select>



							</div>



						</li>



						<li><img style="    width: auto;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/cards_all_01.png" alt="" width="198" height="30" class="lazy"></li>



					</ul>



				</div>



				<div class="col-lg-6">



					<ul class="additional_links">



						<!-- <li><a href="#0">Terms and conditions</a></li>



						<li><a href="#0">Privacy</a></li> -->



						<li><span><p><b>Copyright © 2021 Startup Lawyer (Pvt) Ltd</b></p></span></li>



					</ul>



				</div>



			</div>



		</div>



	</footer>


	<div id="toTop"></div><!-- Back to top button -->

	

	<div class="layer"></div><!-- Opacity Mask Menu Mobile -->

	

	<!-- Sign In Modal -->

	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

		<div class="modal_header">

			<h3>Sign In</h3>

		</div>

		<form>

			<div class="sign-in-wrapper">

				<a href="#0" class="social_bt facebook">Login with Facebook</a>

				<a href="#0" class="social_bt google">Login with Google</a>

				<div class="divider"><span>Or</span></div>

				<div class="form-group">

					<label>Email</label>

					<input type="email" class="form-control" name="email" id="email">

					<i class="ti-email"></i>

				</div>

				<div class="form-group">

					<label>Password</label>

					<input type="password" class="form-control" name="password" id="password" value="">

					<i class="ti-lock"></i>

				</div>

				<div class="clearfix add_bottom_15">

					<div class="checkboxes float-left">

						<label class="container_check">Remember me

						  <input type="checkbox">

						  <span class="checkmark"></span>

						</label>

					</div>

					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>

				</div>

				<div class="text-center">

					<input type="submit" value="Log In" class="btn_1 full-width mb_5">

					Don’t have an account? <a href="account.html">Sign up</a>

				</div>

				<div id="forgot_pw">

					<div class="form-group">

						<label>Please confirm login email below</label>

						<input type="email" class="form-control" name="email_forgot" id="email_forgot">

						<i class="icon_mail_alt"></i>

					</div>

					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>

					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>

				</div>

			</div>

		</form>

		<!--form -->

	</div>

	<!-- /Sign In Modal -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



	<!-- COMMON SCRIPTS -->





    <script src="<?= $url; ?>js/common_scripts.min.js"></script>

    <script src="<?= $url; ?>js/common_func.js"></script>

    <script src="<?= $url; ?>js/common_func1.js"></script>

    <script src="<?= $url; ?>js/validate.js"></script>

	

    <!-- Select2 src -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

    <!-- select2 scriopt -->

<script type="text/javascript">

      jQuery(".chosen").chosen();

</script>

    

    <!-- SPECIFIC SCRIPTS -->

    <script src="<?= $url ?>/js/sticky_sidebar.min.js"></script>

    <script src="<?= $url ?>/js/specific_detail.js"></script>

	<script src="<?= $url ?>/js/datepicker.min.js"></script>

	<?php $post_slug = get_post_field( 'post_name', get_post() ); ?>

	<script type="text/javascript">

		var slug = "<?= $post_slug ?>";

	</script>

<script src="<?= $url ?>/js/filter.js"></script>

<?php wp_footer(); ?>

 <script type="text/javascript">

   	$(document).ready(function() {

	    $(".owl-item.active").css("width","147px");

	    $(".owl-item.active").css("margin-right","0");

	    $(".owl-item.active").css("padding","0 8px");

	    $(".mobile_crosel .owl-stage .owl-item.active ").css("width","167px");

	    $(".mobile_crosel .owl-dots").css("display","none");

	    $(".mobile_crosel .owl-nav").css("display","block");

	    $(".md_slider .owl-dots").css("display","none");

	    $(".md_slider .owl-nav").css("display","block");



	});

	

    window.addEventListener("scroll", function(){

        var header = document.querySelector("#Listener");

        //header.classListener.toggle("sticky",window.scrolly > 350px);

    });





    </script>


    <script type="text/javascript">
	
jQuery(window).on('scroll', function() 
  { var scrollTop = jQuery(window).scrollTop(); 
    console.log(scrollTop);
    if(scrollTop > 100) { 
        console.log("100-Here");
    jQuery('#sticky_head').css('position', 'relative'); 
    jQuery('#sticky_head').css('z-index', '999999');
     jQuery('.arrow_carrot-right').css('top', '0px'); 
     jQuery('.arrow_carrot-left').css('top', '0px'); 
     jQuery('#sticky_head').css('top', '0'); 
     jQuery('#sticky_head').css('right', '48px');
     jQuery('#sticky_head').css('width', '69%');

     jQuery('#sticky_head').css('background', '#fff'); 
     jQuery('#sticky_head').css('border-bottom', '1px solid #ccc'); 
     jQuery('#sticky_head').css('border-left', '1px solid #ccc'); 
     jQuery('#sticky_head').css('border-right', '1px solid #ccc'); 
   } 
     else { 
         jQuery('.arrow_carrot-left').css('top', '140px');
         jQuery('.arrow_carrot-right').css('top', '140px');
      jQuery('#sticky_head').css('position', 'static'); 
     jQuery('#sticky_head').css('border', 'none'); 
      jQuery('#sticky_head').css('width', 'auto');
  	} 
    })
</script>

</body>

</html>