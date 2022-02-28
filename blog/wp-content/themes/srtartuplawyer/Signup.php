<?php /* Template Name: Signup page */ 

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
<?php get_header(); ?>
<div id="fb-root"></div>
<main class="bg_gray pattern">
		
		<div class="container margin_60_40">
		    <div class="head">
		                    <div class="title">
		                    <h3>Sign Up</h3>
		                </div>
		                </div>
		    <div class="row justify-content-center">
		        <div class="col-lg-4">
		        	<div class="sign_up">
		                
		                <!-- /head -->
		                <div class="main">
		                    <form method="post" action="<?= panel_url(); ?>api/register" id="register_form" >
                                            <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                             <label for="inputName">User Name</label>
                                                                <input type="text" id="inputName" class="form-control" placeholder="User Name" name="user_name" required="">
                                                            </div>
                                                        </div>
                                                        </div>
                                                         <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                            <label for="inputEmail">Email</label>
                                                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                               
                                                                <div class="form-label-group">
                                                                    <label for="inputPassword">Password</label>
                                                                <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required="">
                                                             
                                                            </div>
                                                        </div>
                                                            </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-label-group">
                                                                 <label for="inputConfPassword">Confirm Password</label>
                                                                <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" name="cpass" required="">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <button class="btn" type="button" onclick="submit_form('register_form');" >Submit</button>
                                                      <div class="resp" style="width:63px; margin:10px auto; display: inline-flex;padding-left: 130px; padding-top: 25px;">
                                                    <div style="color:#3b5998;" class="facebook" onclick="tlogin();"><i class="fa fa-facebook-square"></i></div>
                                                    <div style="color:#ea4335; margin-left:10px;" class="google" id="googleSignIn" ><i class="fa fa-google"></i></div>
                                                </div>
                                                
                                                <div class="text-center1">
                                               <div> Did you have account?</div>
                                               <div><a href="<?= site_url('login'); ?>">Sign in </a></div>
                                                </div>
</form> 
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
             margin-top:20px;
	        background-color:#182E49;
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

<?php get_footer(); ?> 