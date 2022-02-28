<?php 
   /* Template Name: register*/ 
   
   $url = get_template_directory_uri('/assets1').'/assets1/';
   $surl = get_template_directory_uri('/assets1').'/slider/';
   
   
   
   get_header('home');
   
   $url = get_assets_url(); 
   
   ?>

<main>
   <div class="container margin_60_40 nnn">
		    <div class="row justify-content-center">
		        <div class="modal-dialog wpr-login-wrapper">
		        	<div class="modal-content">
		                <div class="modal-heading">
		                    <div class="text-center">
		                    <h3>Sign Up</h3>
		                </div>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                    <div class="alert alert-success" role="alert" id="result" style="position: fixed;display:none;
    width: 50%;
    margin: 0 auto;
    top: 61px;
    z-index: 999999999999999999999999999;" >
                              This is a success alert—check it out!
                            </div>
		                    
		                    
		                    <!--
		                	<a href="#0" class="social_bt facebook">Sign up with Facebook</a>
							<a href="#0" class="social_bt google">Sign up with Google</a>
							
							<div class="divider"><span>Or</span></div>-->
		                	<div id="wpr-wrapper"><div class="wpr-field-model" style="width:70%; background:#fffff;"><h2 class="wpr-form-title" style="background:#fffff;"></h2><div class="wpr_model_selector"><form id="signup"action="<?= panel_url('/api/register'); ?>" method="POST" class="wpr-forms">

	<div class="row" style="padding: 13px;">
		    <div class="col-md-12 wpr_field_wrapper">
        <label class="wpr-field-title">First Name            <span class="wpr_field_icon" data-desc="" style=""> *
            </span>
            <span class="wpr-field-desc"></span>
        </label>
         <div class="form-group ">
                        <p class="wpr_field_selector" data-key="first_name" data-type="text">
                
                <input type="text" name="first_name" id="first_name" class=" form-control wpr_field_data" placeholder="Enter First Name" data-req="on" data-message="" data-pass="" value="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"> 
            </p>
        </div>
                                <span class="wpr_field_error"></span>
    </div>    
    <div class="col-md-12 wpr_field_wrapper">
        <label class="wpr-field-title">Last Name            <span class="wpr_field_icon" data-desc="" style=""> *
            </span>
            <span class="wpr-field-desc"></span>
        </label>
         <div class="form-group ">
                        <p class="wpr_field_selector" data-key="last_name" data-type="text">
                
                <input type="text" name="last_name" id="last_name" class=" form-control wpr_field_data" placeholder="Enter Last Name" data-req="on" data-message="" data-pass="" value=""> 
            </p>
        </div>
        
                                <span class="wpr_field_error"></span>
    </div>
    <div class="col-md-12 wpr_field_wrapper">
        <label class="wpr-field-title">User Name            <span class="wpr_field_icon" data-desc="" style=""> *
            </span>
            <span class="wpr-field-desc"></span>
        </label>
         <div class="form-group ">
                        <p class="wpr_field_selector" data-key="user_name" data-type="text">
                
                <input type="text" name="user_name" id="user_name" class=" form-control wpr_field_data" placeholder="Enter Last Name" data-req="on" data-message="" data-pass="" value=""> 
            </p>
        </div>
        
                                <span class="wpr_field_error"></span>
    </div>
    <div class="col-md-12 wpr_field_wrapper">
        <label class="wpr-field-title">Email            <span class="wpr_field_icon" data-desc="" style=""> *
            </span>
            <span class="wpr-field-desc"></span>
        </label>
         <div class="form-group ">
                        <p class="wpr_field_selector" data-key="user_email" data-type="text">
                
                <input type="text" name="email" id="user_email" class=" form-control wpr_field_data" placeholder="Enter Email" data-req="on" data-message="" data-pass="" value=""> 
            </p>
        </div>
                                <span class="wpr_field_error"></span>
    </div>    <div class="col-md-12 wpr_field_wrapper">
        <label class="wpr-field-title">Password            <span class="wpr_field_icon" data-desc="" style=""> *
            </span>
            <span class="wpr-field-desc"></span>
        </label>
         <div class="form-group ">
                        <p class="wpr_field_selector" data-key="password" data-type="password">
                
                <div class="hideShowPassword-wrapper" style="position: relative; display: block; vertical-align: baseline; margin: 0px;"><input type="password" name="pass" id="pass" class="form-control wpr_field_data hideShowPassword-field" placeholder="Enter Password" data-req="on" data-message="" data-pass="on" value="" style="margin: 0px; padding-right: 50.9091px; background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;); cursor: auto;"></div> 
            </p>
        </div>                        <label class="wpr-field-title"> Confirm Password</label>
                <div class="form-group ">
                                    <p class="wpr_field_selector" data-key="password" data-type="text">
                    <input type="password" class=" form-control wpr_field_data" name="cpass" id="cpass" data-req="on" data-message="Confirm password must be required" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACIUlEQVQ4EX2TOYhTURSG87IMihDsjGghBhFBmHFDHLWwSqcikk4RRKJgk0KL7C8bMpWpZtIqNkEUl1ZCgs0wOo0SxiLMDApWlgOPrH7/5b2QkYwX7jvn/uc//zl3edZ4PPbNGvF4fC4ajR5VrNvt/mo0Gr1ZPOtfgWw2e9Lv9+chX7cs64CS4Oxg3o9GI7tUKv0Q5o1dAiTfCgQCLwnOkfQOu+oSLyJ2A783HA7vIPLGxX0TgVwud4HKn0nc7Pf7N6vV6oZHkkX8FPG3uMfgXC0Wi2vCg/poUKGGcagQI3k7k8mcp5slcGswGDwpl8tfwGJg3xB6Dvey8vz6oH4C3iXcFYjbwiDeo1KafafkC3NjK7iL5ESFGQEUF7Sg+ifZdDp9GnMF/KGmfBdT2HCwZ7TwtrBPC7rQaav6Iv48rqZwg+F+p8hOMBj0IbxfMdMBrW5pAVGV/ztINByENkU0t5BIJEKRSOQ3Aj+Z57iFs1R5NK3EQS6HQqF1zmQdzpFWq3W42WwOTAf1er1PF2USFlC+qxMvFAr3HcexWX+QX6lUvsKpkTyPSEXJkw6MQ4S38Ljdbi8rmM/nY+CvgNcQqdH6U/xrYK9t244jZv6ByUOSiDdIfgBZ12U6dHEHu9TpdIr8F0OP692CtzaW/a6y3y0Wx5kbFHvGuXzkgf0xhKnPzA4UTyaTB8Ph8AvcHi3fnsrZ7Wore02YViqVOrRXXPhfqP8j6MYlawoAAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">                    </p>
                </div>
                    <span class="wpr_field_error"></span>
    </div><div class="row"><div class="col-md-12"><span class="wpr_sub_form wpr-sign-error"><input type="submit" id="signup_submit" class="btn btn-info" onclick="myFunction()" value="submit" style="color:; background:;font-size:"><span class="error wpr_alert" style="display: none;"></span><span class="wpr-spinner" style="display: none;"></span></span></div></div>	</div>
</form></div></div></div>		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>
		        <!-- /col -->

		    </div>
		    <!-- /row -->
		</div>
</main>


    
<?php
   get_footer('home1');
   
   ?>