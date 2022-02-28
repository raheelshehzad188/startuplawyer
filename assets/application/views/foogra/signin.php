<?php /* Template Name: SignIn page */ 
$url = get_assets_url();
if(get_current_user_id())
{
    ?>
    <html>
   <head>
       <title>Redirecting ... </title>
      <script type = "text/javascript">
         <!--
            function Redirect() {
               window.location = "<?= dashboard_url(get_current_user_id()); ?>";
            }
            Redirect();
         //-->
      </script>
   </head>
    <body>
      <p>Redirecting pleas wait ... </p>
      
   </body>
</html>
    <?php
    exit();
}
?>
<div id="fb-root"></div>
<main class="bg_gray pattern">
		
		<div class="container margin_60_40">
		    <div class="head">
		                    <div class="title">
		                    <h3>Sign In</h3>
		                </div>
		                </div>
		    <div class="row justify-content-center">
		        <div class="col-lg-4">
		        	<div class="sign_up">
		                
		                <!-- /head -->
		                <div class="main">
                            <form method="post" action="<?= base_url(); ?>api/front_login" id="login_form" >
                            <label for="fname">Email/Username:</label><br>
                            <input type="text" id="fname" name="uname" class="required"><br><br>
                            <label for="lname">Password:</label><br>
                            <input type="text" id="lname" name="upass" class="required"><br><br>
                            <p class="forgot-pass"><a href="#">Forgot Password?</a></p>
                            <button class="btn" type="button" onclick="submit_form('login_form');" >Submit</button>
                       
                            <div class="resp" style="width:63px; margin:10px auto; display: inline-flex;padding-left: 130px; padding-top: 25px;">
                                 <div style="color:#3b5998;" class="facebook" onclick="tlogin();"><i class="fa fa-facebook-square"></i></div>
                                 <div style="color:#ea4335; margin-left:10px;" class="google" id="googleSignIn" ><i class="fa fa-google"></i></div>
                            </div>
                            </form> 
                            <div class="text-center1">
                            <div >Don't have an account?</div>
                            <div><a href="<?= base_url('register-2'); ?>">Sign Up</a></div>
                            </div>
		                    <!--
		                	<a href="#0" class="social_bt facebook">Sign up with Facebook</a>
							<a href="#0" class="social_bt google">Sign up with Google</a>
							
							<div class="divider"><span>Or</span></div>-->
		                	
		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>
		        <!-- /col -->

		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<style>
	   .head .title h3{
	            color: #182E49;
	    }
	    .forgot-pass{
	        float:right !important;
	        
	    }
	       .forgot-pass a{ 
	        text-decoration:none !important;
	    }
	    .btn{   
            border-radius: 25px;
            width: 100%;
             color:white;
	        background-color:#182E49;
	        margin-top:20px;
	    }
	    .btn:hover{
	        color:white;
	    }
        .btn:focus{
            background-color:#182E49;
            color:white;
            border:none;
        }
	    .text-center{
	            padding-top:20px;
	        }
	        .text-center1{
	        padding-top:20px;
	        display:flex;
	            padding-left:60px;
	    }
      .fa{
          font-size:40px!important;
      }
	@media only screen and (max-width: 768px){
	        .resp{
	        padding-left:300px;
	        }
	    }
	</style>