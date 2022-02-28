	<footer>

		<div class="container">

			<div class="row">

				<div class="col-lg-3 col-md-6">

					<h3 data-target="#collapse_1">Quick Links</h3>

					<div class="collapse dont-collapse-sm links" id="collapse_1">

						<ul>

							<li><a href="http://startuplawyer.strokedev.ml/terms-conditions/">Terms & Conditions</a></li>

							<li><a href="http://startuplawyer.strokedev.ml/privacy-security/">Privacy & Security</a></li>

							<li><a href="http://startuplawyer.strokedev.ml/refund-policy/">Refund Policy</a></li>

							<li><a href="http://startuplawyer.strokedev.ml/who-we-are/">Who we are</a></li>

							<li><a href="http://startuplawyer.strokedev.ml/my-account-2/">My Account</a></li>

						</ul>

						<ul>

						    <?php

						    foreach($ql as $s)

						    {

						        ?>

						        <li><a href="<?= $s->url ?>"><?= $s->title ?></a></li>

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

							<li><a href="http://startuplawyer.strokedev.ml/launch-chat-bot/">Launch Chat bot</a></li>

							<li><a href="http://startuplawyer.strokedev.ml/watch-how-to-videos/">Watch “How to” videos</a></li>

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

							<li><i class="icon_house_alt"></i><?php ot_get_option( 'contact_address', '97845 Baker st. 567' ); ?></li>

							<li><i class="icon_mobile"></i><a href="tel:+94 423-23-221"><?php ot_get_option( 'contact_phone', '+94 423-23-221' ); ?></a></li>

							<li><i class="icon_mail_alt"></i><a href="mailto:info@domain.com"><?php ot_get_option( 'contact_mail', 'info@domain.com' ); ?></a></li>

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

						<li><span><p><b>Copyright © 2021 Startup Lawyer (Pvt) Ltd</b></span></li>

					</ul>

				</div>

			</div>

		</div>

	</footer>
	<!--/footer-->

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
	
	<!-- COMMON SCRIPTS -->
    <script js="<?= $url; ?>js/common_scripts.min.js"></script>
    <script js="<?= $url; ?>js/common_func.js"></script>
    <script src="assets/validate.js"></script>
</body>
</html>