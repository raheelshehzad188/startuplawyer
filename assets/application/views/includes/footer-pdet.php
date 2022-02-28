<?php 
$url = get_assets_url().'/';
?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
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
					<h3 data-target="#collapse_2">Categories</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="listing-grid-1-full.html">Top Categories</a></li>
							<li><a href="listing-grid-2-full.html">Best Rated</a></li>
							<li><a href="listing-grid-1-full.html">Best Price</a></li>
							<li><a href="listing-grid-3.html">Latest Submissions</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="icon_house_alt"></i><?php get_option( 'contact_address', '97845 Baker st. 567' ); ?></li>
							<li><i class="icon_mobile"></i><?php get_option( 'contact_phone', '+94 423-23-221' ); ?></li>
							<li><i class="icon_mail_alt"></i><a href="#0"><?php get_option( 'contact_mail', 'info@domain.com' ); ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
						<h3 data-target="#collapse_4">Keep in touch</h3>
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
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/youtube_icon.svg" alt="" class="lazy"></a></li>
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
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2019 Foogra</span></li>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- COMMON SCRIPTS -->


    <script src="<?= $url; ?>js/common_scripts.min.js"></script>
    <script src="<?= $url; ?>js/common_func.js"></script>
    <script src="<?= $url; ?>js/validate.js"></script>
	
    <!-- Select2 src -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
    <!-- select2 scriopt -->
<script type="text/javascript">
      jQuery(".chosen").chosen();
</script>
    <script type="text/javascript">
		jQuery('#service_provider_chosen').click(function(){
		    var par = jQuery('#parent_search').val();
		    jQuery('.from_option').hide();
		    jQuery('.from_option').hide();
		    jQuery('.par_'+par).show();
		  //  alert(par);
		});
		var url = '<?= get_option('siteurl'); ?>';
		function mainsearch(){
			var parent_search = jQuery('#parent_search').val();
			if(parent_search == 150)
			{
				url = url+'/search-service-provider';
			}
			else
			{
				url = url+'/search';
			}
			jQuery('#mainsearch').attr('action',url);
			return true;
		}
		/*jQuery('#parent_search').change(function(){
			var par = jQuery('#parent_search').val();
		    jQuery('.from_option').hide();
		    jQuery('.from_option').hide();
		    jQuery('.par_'+par).show();
		    alert(par);
		);*/
		function signup(){
		    alert();
		    return 0;
		}
		jQuery('#signup').submit(function(e){
		    $('#result').show();
		    $('#signup_submit').hide();
		    var datastring = $("#signup").serialize();
		    $('#result').attr('class','alert alert-primary');
		    $('#result').text('Please wait---');
		    if($('#cpass').val() == $('#pass').val())
		    {
            $.ajax({
    type: $("#signup").attr('method'),
    url: $("#signup").attr('action'),
    data: datastring,
    success: function(data) {
        setTimeout(function(){
            $('#result').hide();
        }, 5000);

        var obj = JSON.parse(data);
    if(!obj.error == 0)
    {
        $('#result').attr('class','alert alert-success');
		    $('#result').text(obj.message);
		    if(obj.redirect)
		    window.location = obj.redirect;

    }
    else
    {
        // setTimeout(function(){
        //     $('#result').show();
        // }, 5000);
        $('#result').attr('class','alert alert-danger');
		    $('#result').text(obj.message);
            $('#signup_submit').show();
    }
    },
    error: function() {
        setTimeout(function(){
            $('#result').hide();
        }, 5000);
        $('#result').attr('class','alert alert-danger');
		    $('#result').text('Something working wrong!');
            $('#signup_submit').show();
    }
});		        
		    }
		    else
		    {
		        setTimeout(function(){
            $('#result').hide();
        }, 5000);
		        $('#result').attr('class','alert alert-danger');
		    $('#result').text("Password not match!");
            $('#signup_submit').show();
		    }

		    e.preventDefault();

		});
    	jQuery(document).ready(function() {
			//parent_search
//     jQuery('.js-example-basic-single').select2();
    jQuery(".select2").css("width","200px");
    $(".select2-selection__rendered").css("line-height","40px");
    $(".select2-selection__arrow").css("top","10px");
    $(".itema").css("background-color","#f4f4f4");
    $(".itema").css("padding","0");
    $(".itema").css("margin","0");
    $(".card").css("background-color","#f4f4f4");
    $(".card").css("border","0");
    $(".card").css("margin","0 55px");
    $(".chosen-single").css("height","50px");
    $(".chosen-single").css("padding","8px");
    $(".chosen-single").css("border-radius","5px");
    $(".chosen-container-single").css("width","220px");
    $(".hero_single").css("color","black");
    $("a.chosen-single div b").css("position","absolute");
    $("a.chosen-single div b").css("top","13px");
    $("a.chosen-single div b").css("left","-6px");
    $(".chosen-container-single .chosen-single span").css("margin-top","5px");
});
    </script>
	<script type="text/javascript">
   	$(document).ready(function() {
	    $(".owl-item.active").css("width","33%");
	    $(".owl-item.active").css("margin-right","0");
	    $(".owl-item.active").css("padding","0 8px");
	    $(".mobile_crosel .owl-stage .owl-item.active ").css("width","167px");
	    $(".mobile_crosel .owl-dots").css("display","none");
	    $(".mobile_crosel .owl-nav").css("display","block");
	    $(".md_slider .owl-dots").css("display","none");
	    $(".md_slider .owl-nav").css("display","block");
	    $(".owl-stage").css("width","auto");
	    

	});
	var AJAX_URL = "<?= base_url('index/page/ajax'); ?>";
	var ASSET_URL= "<?= $url; ?>";
	
    </script>
    <!-- SPECIFIC SCRIPTS -->
    <script src="<?= $url ?>/js/sticky_sidebar.min.js"></script>
    <!--<script src="<?= $url ?>/js/specific_detail.js"></script>-->
	<script src="<?= $url ?>/js/datepicker.min.js"></script>
	<script src="<?= $url ?>/js/datepicker_func_1.js"></script>
	<script>
	    jQuery('.owl-home').owlCarousel({
    loop:true,
    margin:20,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
})
	</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

<script>
   $(document).ready(function(){
     $('.slider1').bxSlider({ 
		 maxSlides:4
	 });
   });
(function ( $ ) { 

    // put all that "wl_alert" code here   

}( jQuery ));
</script>
</body>
</html>