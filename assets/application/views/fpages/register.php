<!DOCTYPE html>
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
    <link rel="apple-touch-icon" href="<?= $assets?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url();?>/wp-content/uploads/2020/11/cebab310d0de566d1a073d52099b683f-png-512x512-1.png">
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
         input[type=email]{
             width: 160px;
    margin: 2px 0px;
    height: 40px;
    border-radius:5px;
         }
            .content-body{
           margin:-70px 0px;
            }
            html body{
                height:90%;
            }
           .content.app-content {
   
    overflow: hidden !important;
               
           }
    </style>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body id="login_bg" class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background-image: url('<?= ot_get_option( 'panel_background_image', site_url().'/panel/assets//app-assets/images/pages/faq.jpg' ) ?>');">
    <div class="login_logo">
            <a href="<?= site_url();?>">
                <img src="<?= ot_get_option( 'sticky_logo', $url.'img/logo.png' ) ?>" width="233" height="102" alt="" class="logo_normal" style="background: white;">
            </a>
        </div>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0" id="top_login" style="width: 866px;">
                            <div class="row m-0">
                                <div class="col-lg-6 ">
                                    <div class="inner_login_box py-2">
                                        <h3 style="font-size: 34px;">Are you a Lawyer, Corporate secretary, Business Consultant or Mediator ?</h3>
                                        <p style="margin-top: 27px;font-size: 29px;line-height: 29px;font-weight: 600;">Join us to enhance your online presence & practice safely during Corona  Times</p>
                                        <p style="font-size: 22px;margin-top: 34px;line-height: 26px;color: red;">Need ready to join yet? <a href="<?= site_url('/login'); ?>">Click here to find out more</a></p>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2" style="height: 445px;">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Register as Service Provider</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Fill the below form to create a new account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="post"  action="<?= base_url('auth/create'); ?>">
                                                    <?php $this->load->view('flash') ?>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-label-group">
                                                                <input type="text" id="inputName" class="form-control" placeholder="User Name" name="uname" required="">
                                                                <label for="inputName">User Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-label-group">
                                                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required="">
                                                                <label for="inputEmail">Email</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-label-group">
                                                                <input type="password" id="inputPassword" name="upass" class="form-control" placeholder="Password" required="">
                                                                <label for="inputPassword">Password</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-label-group">
                                                                <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" name="cpass" required="">
                                                                <label for="inputConfPassword">Confirm Password</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked="">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                          <a href="<?= site_url('terms-conditions-for-service-providers');?>">   I accept the terms &amp; conditions .</a>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <a href="<?= base_url().'login' ?>" class="btn btn-outline-primary float-right btn-inline mb-50 waves-effect waves-light">Login</a>

                                                    <buton class="btn btn-outline-primary float-left btn-inline" type="submit" class="registerbtn">Register</button></form></div>
                                        </div>
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
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>