<?php
$url = base_url('assets/design/orignal/');
?>
<footer>



		<div class="container">



			<div class="row">



				<div class="col-lg-3 col-md-6" style="">



					<h3 data-target="#collapse_1">Quick Links Here</h3>



					<div class="collapse dont-collapse-sm links" id="collapse_1">



						


<?php
				    $wp = wp_data();
				    echo $wp['footer_menu'];
				    ?>



					</div>



				</div>



				<div class="col-lg-3 col-md-6">



					<h3 data-target="#collapse_2">Ask Any Question </h3>



					<div class="collapse dont-collapse-sm links" id="collapse_2">



						<ul>



							<li><a href="<?= site_url(); ?>/launch-chat-bot/">Launch Chat bot</a></li>



							<li><a href="https://startuplawyer.lk/main/blog/videos/">Watch “How to” videos</a></li>



						</ul>


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



							<li><i class="icon_house_alt"></i><?= $RET =  get_option( 'contact_address', '97845 Baker st. 567' ); ?></li>



							<li><i class="icon_mobile"></i><a href="tel:+94722782500 "><?= get_option( 'contact_phone', '+94722782500 ' ); ?></a></li>



							<li><i class="icon_mail_alt"></i><a href="mailto:info@domain.com"><?= get_option( 'contact_mail', 'info@domain.com' ); ?></a></li>



						</ul>



					</div>



				</div>



				<div class="col-lg-3 col-md-6">



						<h3 data-target="#collapse_4">WE SUPPORT STARTUPS DURING COVID</h3>



						<p>Claim free webinars, services & Consultations from Lawyers, Company Secretaries, Business Consultants and Mediators on first come first serve basis. 
Please register to be informed every time free resources are posted.</p>



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



					<!--	<li><img style="    width: auto;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/cards_all_01.png" alt="" width="198" height="30" class="lazy"></li>-->


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
	<!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->
	
	<div class="layer"></div><!-- Opacity Mask Menu Mobile -->
	
	<!-- Sign In Modal -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide"> 
		<div class="modal_header">
			<h3>Sign In</h3>
		</div>
		<form method="post" action="<?= base_url(); ?>api/front_login" id="login_form" >
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook" onclick="tlogin();">Login with Facebook</a>
				<a href="#0" class="social_bt google"  id="googleSignIn">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="uname" id="email" style="width:100%;">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="upass" id="password" value="" style="width:100%;">
					<i class="icon_lock_alt"></i>
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
					<button  type="button" onclick="submit_form('login_form');" id="sbtn" class="btn_1 full-width mb_5">Log In</button>
					Don’t have an account? <a href="<?= base_url('auth/register'); ?>">Sign up</a>
				</div>
			</div>	
		</form>
		<form method="post" action="<?= base_url(); ?>api/reset_password" id="forget_form" class="d-none">
			<div id="forget_div">
				<div class="form-group">
					<label>Please confirm login email below</label>
					<input type="email" class="form-control" name="email_forgot" id="email_forgot">
					<i class="icon_mail_alt"></i>
				</div>
				<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
				<div class="text-center"><input type="button" onclick="forget_submit('forget_form');" value="Reset Password" class="btn_1"></div>
				<div class="text-center" style="margin-top: 8px;"><input type="button" value="Back To Login" class="btn_1" id="login_btn"></div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Modal -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	    <script type="text/javascript">
var slug = " ";
function show_loader(){
            var html = '<img src="<?= base_url(); ?>/wp-content/themes/srtartuplawyer/assets//img/load.gif" style="width: 48px;margin: 0 auto;" />';
                $('.modal-body').html(html);
        }
        function validate_form(form_id)
        {
            var mid = '#'+form_id;
            var error = 1;
            // $(mid+'.required').hide();
            $(mid+'> .required').each(function(i, obj) {
                $(this).removeClass('input_error');
                if($(this).val() == '')
                {
                    error = 0;
                    $(this).addClass('input_error');
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
            var before_text = ''
            if(form_id == 'login_form')
            {
                before_text = $(mid+' #sbtn').text();
            }
            else
            {
                before_text = $(mid+' button').text();
            }
            
            if(form_id != ' ')
            {
                
                  $.ajax({
                    url: $(mid).attr('action'),
                    method: $(mid).attr('method'),
                    data: $(mid).serialize(),
                    beforeSend: function() {
                        if(form_id == 'login_form')
            {
                $(mid+' #sbtn').text('Loading ...')
            }
            else
            {
                $(mid+' button').text('Loading ...')
            }
                    },
                    success: function(data) {
            
                      setTimeout(function(){ 
                                      if(form_id == 'login_form')
            {
                $(mid+' #sbtn').text(before_text);
            }
            else
            {
                $(mid+' button').text(before_text);
            }
                        form_response(data,form_id);    
                          
                      }, 3000);
                    },
                    error: function() {
                        
                    }
                });
            }
        }
}


function forget_submit(form_id)
{
        var vali =  validate_form(form_id);
        if(vali > 0)
        {
            var mid = '#'+form_id;
            var before_text = ''
            if(form_id == 'login_form')
            {
                before_text = $(mid+' #sbtn').text();
            }
            else
            {
                before_text = $(mid+' button').text();
            }
            
            if(form_id != ' ')
            {
                
                  $.ajax({
                    url: $(mid).attr('action'),
                    method: $(mid).attr('method'),
                    data: $(mid).serialize(),
                    beforeSend: function() {
                        if(form_id == 'login_form')
            {
                $(mid+' #sbtn').text('Loading ...')
            }
            else
            {
                $(mid+' button').text('Loading ...')
            }
                    },
                    success: function(data) {
            
                      setTimeout(function(){ 
                                      if(form_id == 'login_form')
            {
                $(mid+' #sbtn').text(before_text);
            }
            else
            {
                $(mid+' button').text(before_text);
            }
                        form_response(data,form_id);    
                          
                      }, 3000);
                    },
                    error: function() {
                        
                    }
                });
            }
        }
}
function ajax_url(url, type,id = 0)
{
        if(url != ' ')
        {
              $.ajax({
                url: url,
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    if(type == 'email_print')
                    {
                    }
                    else if(type == 'rcart')
                    {
                        var obj = JSON.parse(data);
                        if(obj['status'])
                        {
                            swal("Good job!",obj['msg'], "success");
                            location.reload();
                        }
                        else
                        {
                            swal("Sorry!", obj['msg'], "error");
                        }
                    }
                    else if(type == 'wishlist')
                    {
                        var obj = JSON.parse(data);
                        if(obj['status'])
                        {
                            swal("Good job!",obj['msg'], "success");
                        }
                        else
                        {
                            swal("Sorry!", obj['msg'], "error");
                        }
                    }
                    else if(type == 'uqty')
                    {
                        // alert(data);
                        var obj = JSON.parse(data);
                        var row = '#row_'+id;
                        // console.log(obj);
                        // alert(obj['item_tot']);
                        if(obj['item_tot'])
                        $(row+' #price').text('LKR '+obj['item_tot'])
                        if(obj['tot'])
                        $('#ctot').text('LKR '+obj['tot'])
                        var obj = JSON.parse(data);
                        if(obj['status'])
                        {
                            swal("Good job!",obj['msg'], "success");
                        }
                        else
                        {
                            swal("Sorry!", obj['msg'], "error");
                        }
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
                $('.ajax_alert').remove();
                var alert_msg= '<div class="ajax_alert">'+obj['msg']+'</div>';
                $(mid).prepend(alert_msg);
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
        
	    <?php
	    if(isset($_REQUEST['rate']))
	    {
	        ?>
	        var $rateYo = $("#rateYo").rateYo();

	        function view_rate(rate,msg)
	        {
	           // rate = 4;
	            $('#rating').modal('show');
                $rateYo.rateYo("rating", rate);
                $rateYo.attr("data-rateyo-read-only", true);
                $rateYo.rateYo("option", "readOnly",true);
                $('#rform textarea').val(msg);
                $('#rform button').hide();
	        }
	        function order_rate(oid)
{
    $('#rform button').show();
    $('#rform textarea').val(' ');
    $rateYo.rateYo("rating", 0);
    $rateYo.attr("data-rateyo-read-only", false);
                $rateYo.rateYo("option", "readOnly",false);
	
	$('#oid').val(oid);
	$('#rating').modal('show');

}
	        $('#rform').submit(function(e){
	            $('#rform button').attr('disabled','disabled');
	            $('#rform button').text('Loading ...');
	            $rateYo.val($('#rateYo').attr('rate'));
	           // alert($('#rateYo').attr('rate'));
	            $('#rate').val($('#rateYo').attr('rate'));
	           // alert($('#rate').val());
	            var foirm = $("#rform").serialize();
	            $.ajax({
    type: "POST",
    url: "",
    data: foirm,
    success: function(data) {
        var obj = $.parseJSON(data);
        $('#rform button').removeAttr('disabled');
        $('#rform button').text('Submit');
        console.log(obj);
        console.log(data);
        if(obj["status"])
        {
            $('#rating').modal('hide');
swal({title: "Good job", text: obj['msg'], type: 
"success"}).then(function(){ 
   location.reload();
   }
);

        }
    },
    error: function() {
        alert('error handling here');
    }
});
	           e.preventDefault();

	        });
	        function goRate(oid){
	           // alert(oid);
	            $('#oid').val(oid);
	            $('#rating').modal('show');

	        }
	        $('.woocommerce-MyAccount-navigation ul li').each(function(i, obj) {
    $(this).removeClass('is-active');
});
$('.woocommerce-MyAccount-navigation-link--rate').addClass('is-active');
	        <?php
	    }
	    elseif(isset($_REQUEST['chat']))
	    {
	        ?>
	        $('.woocommerce-MyAccount-navigation ul li').each(function(i, obj) {
    $(this).removeClass('is-active');
});
$('.woocommerce-MyAccount-navigation-link--chat').addClass('is-active');
	        <?php
	    }
	    elseif(isset($_REQUEST['bill']))
	    {
	        ?>
	        $('.woocommerce-MyAccount-navigation ul li').each(function(i, obj) {
    $(this).removeClass('is-active');
});
$('.woocommerce-MyAccount-navigation-link--bill').addClass('is-active');
	        <?php
	    }
	    ?>
	</script>
<script>
$(window).scroll(function () { 
    //You've scrolled this much:
    console.log($(window).scrollTop()+'-'+window.innerWidth);
       if($(window).scrollTop() > 45)
       {
        //   alert($(window).scrollTop());
        // $('.cartImg').hide();
           $('.cartImg').attr('src','https://startuplawyer.lk/main/assets/front/img/cart.png');
             $('#dashboardImg').attr('src','https://startuplawyer.lk/main/assets/front/img/dashboard.png');
             $('.heartImg').attr('src','https://startuplawyer.lk/main/assets/front/img/hblack.png');
             $("header").addClass("fix-header");
       }
       else
       {
           $("header").removeClass("fix-header");
        $('.cartImg').attr('src','<?= get_option( 'cart-normal', get_assets_url().'/'.'img/cart2.png' ) ?>');   
        
        $('#dashboardImg').attr('src','<?= get_option( 'dashboard', get_assets_url().'/'.'img/dashboard2.png' ) ?>');
        $('.heartImg').attr('src','<?= get_option( 'heart-black', get_assets_url().'/'.'img/wheart.png' ) ?>');  
       }
});
</script>
<script>
	window.fbAsyncInit = function() {
    FB.init({
      appId      : '189871496142902', // App ID
      status     : false, 
      version:  'v9.0',
      cookie     : true, 
      xfbml      : false  // parse XFBML
    });
};
  function tlogin() {
    FB.login(function(response) {
        console.log(response);
        if (response.authResponse) {
            // connected
            console.log(response.authResponse.accessToken);
            var url = "<?= base_url(); ?>";
            var url = url+"api/social_login?type=panel&access_token="+response.authResponse.accessToken+"&sid="+response.authResponse.userID;
            console.log("Api response");
            console.log(response);
            $.ajax({
      type: "POST",
      url: url,
      success: function (result) {
         console.log(result);
         var obj = JSON.parse(result);
         if(obj['rurl'])
         {
         window.location.replace(obj['rurl']);
         }
      }
 });
        } else {
            alert("cancelled");
            // cancelled
        }
    }, { scope: 'email' });
    }

function testAPI() {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?scope=email',function(response) {
        var email = '';       
        alert();
        console.log(response);
        if(response.email)
        email = response.email;
    var url = "<?= base_url(); ?>login";
    url = url+"?social_type=facebook"+"&id="+response.id+"&email="+email+"&email="+email;
        console.log('Good to see you, ' + response.name + '.' + ' Email: ' + response.email + ' Facebook ID: ' + response.id);
    });
}

</script>
	
	<!-- COMMON SCRIPTS -->
    <script src="<?= $url ?>js/common_scripts.min.js"></script>
    <script src="<?= $url ?>js/common_func.js"></script>
    <script src="<?= $url ?>assets/validate.js"></script>
    <script>
        var AJAX_URL = "<?= base_url('/api/'); ?>"; 
var BASE_URL = "<?= base_url(); ?>"; 
var ASSET_URL = "<?= base_url('/assets/'); ?>"; 
    </script>
    <?php
    if(isset($js))
    {
        foreach ($js as $key => $value) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= $value?>">
            <?php
        }
    }
    ?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script src="https://apis.google.com/js/api.js?onload=onLoadGoogleCallback" async defer></script>
    <script>
        function onLoadGoogleCallback(){
  gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      client_id: '922526942247-gqdlgpei6f9fpa61qab8o28ao9l0dbci.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
      scope: 'profile'
    });

  auth2.attachClickHandler(element, {},
    function(googleUser) {
        console.log('response raheel');
        console.log(googleUser);
        console.log(auth2.currentUser.get().getAuthResponse());
          var token = auth2.currentUser.get().getAuthResponse().access_token;
          var profile = auth2.currentUser.get().getBasicProfile();
  console.log('ID: ' + profile.getId());
  console.log('Full Name: ' + profile.getName());
  console.log('Given Name: ' + profile.getGivenName());
  console.log('Family Name: ' + profile.getFamilyName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
  console.log('token: ' + token);
        var url = "<?= base_url(); ?>api/glogin";
    url = url+"?type=google"+"&sid="+profile.getId()+"&email="+profile.getEmail()+"&name="+profile.getName()+'&token='+token;
    $.ajax({
      type: "POST",
      url: url,
      success: function (result) {
         console.log(result);
         var obj = JSON.parse(result);
         if(obj['rurl'])
         {
         window.location.replace(obj['rurl']);
         }
      }
 });
        console.log('Signed in: ' + googleUser.getBasicProfile().getName());
      }, function(error) {
        console.log('Sign-in error', error);
      }
    );
  });

  element = document.getElementById('googleSignIn');
}
    </script>
    <script>
	    $('#sign-in1').click(function(){
	        $('#sign-in').click();
	    });
	    
	    $('#forgot').click(function(){
	        $('#forget_form').removeClass('d-none');
	        $('#login_form').addClass('d-none');
	        $('#sign-in-dialog h3').text('Forget Password');
	    });
	    
	    $('#login_btn').click(function(){
	        $('#forget_form').addClass('d-none');
	        $('#login_form').removeClass('d-none');
	        $('#sign-in-dialog h3').text('Sign In');
	    });
	</script>
    <script>
$(window).scroll(function () { 
    //You've scrolled this much:
       if($(window).scrollTop() > 45)
       {
        //   alert($(window).scrollTop());
        // $('.cartImg').hide();
           $('.cartImg').attr('src','https://startuplawyer.lk/main/assets/front/img/cart.png');
             $('#dashboardImg').attr('src','https://startuplawyer.lk/main/assets/front/img/dashboard.png');
             $('.heartImg').attr('src','https://startuplawyer.lk/main/assets/front/img/hblack.png');
             $("header").addClass("fix-header");
       }
       else
       {
           $("header").removeClass("fix-header");
        $('.cartImg').attr('src','<?= get_option( 'cart-normal', get_assets_url().'/'.'img/cart2.png' ) ?>');   
        
        $('#dashboardImg').attr('src','<?= get_option( 'dashboard', get_assets_url().'/'.'img/dashboard2.png' ) ?>');
        $('.heartImg').attr('src','<?= get_option( 'heart-black', get_assets_url().'/'.'img/wheart.png' ) ?>');  
       }
});
</script>
<script>
	    $('#sign-in1').click(function(){
	        $('#sign-in').click();
	    });
	</script>
	<script>
	<?php
				    $wp = wp_data();
				    $videos= $wp['videos'];
				        if($videos)
				        {

    						foreach($videos as $k=>$post) {
    						    ?>
    						    	    $('#videoLink<?= $k; ?>')
    .magnificPopup({
    	  type:'inline',
    	  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
      });
    						    <?php
    						}
				        }
						?>


$('#parent_search').change(function(){
    parent_search($('#parent_search').val());
});
function parent_search(id)
		{
		    if(id != '')
		    {
		    var url = BASE_URL+'/api/parent_search_child/'+id;
		    
		  jQuery("#from").load(url);  
		    }
		}
	</script>
	<script type="text/javascript">
	    function variation_chng(pid){
	        var attr = {};
	        $('.attributes').each(function(i, obj) {
    attr[$(this).attr('name')] =  $(this).val();
});
var bhtml = $('.head').html();
var fdata = {
    'pid' : pid,
    'attributes' : attr
};
$('.head').html('Loading ...');
$.ajax({
      type: "POST",
    //   contentType: "application/json; charset=utf-8",
      url: BASE_URL+'/api/check_variation',
      data: fdata,
      success: function (result) {
          result = JSON.parse(result);
           if(result['status'])
           {
               alert($('#dead_line').val());
               var data = result['data'];
               var nhtml = '<h3>LKR '+data['price']+'</h3>';
		                    nhtml += '<div class="offer">Duration '+$('#dead_line').val()+'</div>';
		                    nhtml += '<div class="offer" style="font-size: 13px;">Product ID:'+data['sku']+'</div>';
		                    $('.head').html(nhtml);
		                    $('#variation_id').val(data['id']);
           }
           else
           {
               $('.head').html(bhtml);
           }
      }
 });
	    }
	</script>
	
	<?php
	if(isset($js) && !empty($js))
	{
	   foreach($js as $k => $v) 
	   {
	       ?> 
	       <script type="text/javascript" src="<?= $v ?>" ></script>
	       <?php
	   }
	}
	?>
</body>
</html>