<!DOCTYPE html>
<?php
$url = get_template_directory_uri();
?>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?= $title; ?></title>
    <meta name="google-signin-client_id" content="922526942247-gqdlgpei6f9fpa61qab8o28ao9l0dbci.apps.googleusercontent.com"> 

    <link rel="apple-touch-icon" href="<?= $assets?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ;?>/wp-content/uploads/2020/11/cebab310d0de566d1a073d52099b683f-png-512x512-1.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= $assets?>app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= $assets?>assets/css/style.css">
    <style type="text/css">
        .card-content {
            padding-bottom: 12px;
        }
        @media only screen and (max-width: 991px){
            div#top_login .col-lg-6:nth-child(1) {
                display: none;
            }
            div#top_login {
                margin-top: -20px;
            }
            .login_logo {
                text-align: center;
                margin-top: 20px;
            }
        }
            html body{
                height:90%;
            }
            .content-body{
                margin:-70px 0px;
            }
            .content.app-content{
                overflow:hidden !important;
            }
    </style>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body id="login_bg" class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background-image: url('<?= ot_get_option( 'panel_background_image', site_url().'/panel/assets//app-assets/images/pages/faq.jpg' ) ?>');">
    <!-- BEGIN: Content-->
    

    <div class="login_logo">
            <a href="<?= site_url();?>">
                <img src="<?= ot_get_option( 'sticky_logo', $url.'img/logo.png' ) ?>" width="233" height="102" alt="" class="logo_normal" style="background: white;">
            </a>
        </div>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0 " id="top_login" style="width: 866px;">
                            <div class="row m-0">
                                <div class="col-lg-6 ">
                                    <div class="inner_login_box py-2">
                                        <h3 style="font-size: 22px; padding: 15px 0px;font-family: arial;">Are you a Lawyer, Corporate secretary, Business Consultant or Mediator ?</h3>
                                        <p style="margin-top: 19px;font-size: 22px;line-height: 29px;font-weight: 400;color: black">Join us to enhance your online presence & practice safely during Corona  Times</p>
                                        <p style="    font-size: 20px;margin-top: 34px;    line-height: 26px;">Need ready to join yet? </br><a href="<?= site_url('/login'); ?>">Click here to find out more</a></p>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2" style="height: 445px;">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form class="m-t" method="post" role="form" action="<?=base_url('/login/post')?>"> 
                        <?php $this->load->view('flash') ?>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="uname" id="user-name" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username/Email</label>
                                                    </fieldset>
                                                    <?php
                                                    if(!isset($_REQUEST['social_type']))
                                                    {
                                                     ?>
                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" placeholder="Password" name="upass" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right hidden"><a href="auth-forgot-password.html" class="card-link">Forgot Password?</a></div>
                                                    </div>
                                                    <a href="<?= base_url(); ?>/auth/register" class="btn btn-outline-primary float-left btn-inline">Register</a>
                                                    <?php   
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <input type="text" value="<?= $_REQUEST['social_type']; ?>" name="social_type" />
                                                        <input type="text" value="<?= $_REQUEST['id']; ?>" name="social_id" />
                                                        <?php
                                                    }
                                                    ?>
                                                    <button type="submit" style="    border: 1px solid #7367f0;background-color: transparent;padding: 8px 14px;color: #7367f0;border-radius: 5px;" class=" btn_1 float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                                    if(!isset($_REQUEST['social_type']))
                                                    {
                                                     ?>
                                        <div  class="login-footer">
                                            <div class="divider m-0">
                                                <div class="divider-text ">OR</div>
                                            </div>
                                            <div style="font-size:30px;" class="footer-btn d-flex">
                                                
                                                <div style="width:63px; margin:10px auto; display: inline-flex;">
                                                    <div style="color:#3b5998;" class="facebook" onclick="tlogin();"><i class="fa fa-facebook-square"></i></div>
                                                    <div style="color:#ea4335; margin-left:10px;" class="google" id="googleSignIn" ><i class="fa fa-google"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="login_innner" style="height: 0;">
                                <h5 style="position: relative;top: 20px;left: 21px;color: white;">Not a service provider?<a href="<?= site_url('/login'); ?>">Click here to login as client</a></h5>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= $assets?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= $assets?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= $assets?>app-assets/js/core/app.js"></script>
    <script src="<?= $assets?>app-assets/js/scripts/components.js"></script>
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
        if (response.authResponse) {
            // connected
            console.log(response.authResponse.accessToken);
            var url = "<?= base_url(); ?>";
            var url = url+"api/social_login?type=panel&access_token="+response.authResponse.accessToken;
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
            // cancelled
        }
    }, { scope: 'email' });
    }

function testAPI() {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?scope=email',function(response) {
        var email = '';
        if(response.email)
        email = response.email;
    var url = "<?= base_url(); ?>login";
    url = url+"?social_type=facebook"+"&id="+response.id+"&email="+email+"&email="+email;
        console.log('Good to see you, ' + response.name + '.' + ' Email: ' + response.email + ' Facebook ID: ' + response.id);
    });
}

</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>
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
        console.log(auth2.currentUser.get().getAuthResponse());
          var token = auth2.currentUser.get().getAuthResponse().access_token;
          alert(token);
          var profile = auth2.currentUser.get().getBasicProfile();
          console.log(profile);
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
         alert(result);
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
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>