


	<!--/footer-->



	<div id="toTop"></div><!-- Back to top button -->



	



	<div class="layer"></div><!-- Opacity Mask Menu Mobile -->



	



	<!-- Sign In Modal -->

<?php
$url = get_assets_url().'/';



$args = array(



    'menu_id'           => 28,



);



$ql = array();
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



							<li><a href="<?= base_url(); ?>/launch-chat-bot/">Launch Chat bot</a></li>



							<li><a href="<?= base_url(); ?>/watch-how-to-videos/">Watch “How to” videos</a></li>



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



							<li><i class="icon_house_alt"></i>322<?= $RET =  get_option( 'contact_address', '97845 Baker st. 567' ); ?></li>



							<li><i class="icon_mobile"></i><a href="tel:+94 423-23-221"><?= get_option( 'contact_phone', '+94 423-23-221' ); ?></a></li>



							<li><i class="icon_mail_alt"></i><a href="mailto:info@domain.com"><?= get_option( 'contact_mail', 'info@domain.com' ); ?></a></li>



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



						<li><span><p><b>copyright as (c) Startup Lawyer 2021</b></p></span></li>



					</ul>



				</div>



			</div>



		</div>



	</footer>



	<!--/footer-->


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



<?php

 $url = base_url('/assets/front1/');

?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 

	<!-- COMMON SCRIPTS -->

    <!-- select2 scriopt -->

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

    $(".card").css("margin","0px 55px");
    $(".card-body").css("text-align","center");

    $(".chosen-single").css("height","40px");

    $(".chosen-single").css("padding","2px");

    $(".chosen-single").css("background","white");
    
    $(".chosen-single").css("margin-left","0");

    $(".chosen-single").css("border-radius","5px");

    $(".chosen-container-single").css("width","220px");

    $(".hero_single").css("color","black");

    $("a.chosen-single div b").css("position","absolute");

    $("a.chosen-single div b").css("top","13px");

    $("a.chosen-single div b").css("left","-6px");

    $(".chosen-container-single .chosen-single span").css("margin-top","5px");

});

    </script>

    <!-- <script src="<?= $url?>js/common_scripts.min.js"></script> -->

    <!-- <script src="<?= $url?>js/common_func.js"></script> -->

    <script>

        // jQuery(".chosen").chosen();

    </script>

    <!-- <script src="assets/validate.js"></script> -->



    <!-- Select2 src -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!-- select2 scriopt -->

    <script type="text/javascript">

    	$(document).ready(function() {

    $('.js-example-basic-single').select2();

    $(".select2").css("width","200px");

    $(".select2-selection__rendered").css("line-height","40px");

    $(".select2-selection__arrow").css("top","10px");

    $(".itema").css("background-color","#f4f4f4");

    $(".itema").css("padding","0");

    $(".itema").css("margin","0");
    $(".itema").css("color","black");

    $(".card").css("background-color","#f4f4f4");

    $(".card").css("border","0");

    $(".card").css("margin","0 55px");

});

    </script>

<script>
$(document).ready(function(){
  $("#mobile_menu").click(function(){
      $(".main-menu").addClass("cc");
  });
  $("#mobile_menu2").click(function(){
      $(".main-menu").removeClass("cc");
  });
	
});
function show_loader(){
            var html = '<img src="<?= site_url(); ?>/wp-content/themes/srtartuplawyer/assets//img/load.gif" style="width: 48px;margin: 0 auto;" />';
                $('.modal-body').html(html);
        }
        function validate_form(form_id)
        {
            var mid = '#'+form_id;
            var error = 1;
            // jQuery(mid+'.required').hide();
            jQuery(mid+'> .required').each(function(i, obj) {
                jQuery(this).removeClass('input_error');
                if(jQuery(this).val() == '')
                {
                    error = 0;
                    jQuery(this).addClass('input_error');
                }
            });
            // alert(error);
            return error;
        }
function submit_form(form_id)
{
        var vali =  validate_form(form_id);
        if(vali > 0)
        {
            var mid = '#'+form_id;
            var before_text = jQuery(mid+'> button').text();
            ;
            
            if(form_id != ' ')
            {
                
                  $.ajax({
                    url: jQuery(mid).attr('action'),
                    method: jQuery(mid).attr('method'),
                    data: jQuery(mid).serialize(),
                    beforeSend: function() {
                        jQuery(mid+'> button').text('Loading ...');
                    },
                    success: function(data) {
                        jQuery(mid+'> button').text(before_text);
                      setTimeout(function(){ 
                        form_response(data,form_id);    
                          
                      }, 3000);
                    },
                    error: function() {
                        
                    }
                });
            }
        }
}
function ajax_url(url, type)
{
        $('#exampleModalCenter .modal-dialog').removeClass('modal-lg');
        // alert(url);
        if(url != ' ')
        {
            $('#exampleModalCenter').modal('show');
              $.ajax({
                url: url,
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    if(type == 'email_print')
                    {
                        $('#exampleModalCenter .modal-dialog').addClass('modal-lg');
                    }
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
}
        function form_response(data,form_id)
        {
            var obj = JSON.parse(data);
            var mid = '#'+form_id;
            if(obj['msg'])
            {
                $(mid).prepend(obj['msg']);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
        function modal_response(data)
        {
            var obj = JSON.parse(data);
            if(obj['html'])
            {
                $('.modal-body').html(obj['html']);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
        

</script>

</body>

</html>