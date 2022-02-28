
<?php  

$url = get_assets_url();

?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="922526942247-gqdlgpei6f9fpa61qab8o28ao9l0dbci.apps.googleusercontent.com"> 

    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">

    <meta name="author" content="Ansonika">

    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <meta name="google-signin-client_id" content="922526942247-gqdlgpei6f9fpa61qab8o28ao9l0dbci.apps.googleusercontent.com"> 



    <!-- Favicons-->

    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ;?>/wp-content/uploads/2020/11/cebab310d0de566d1a073d52099b683f-png-512x512-1.png">

    <link rel="apple-touch-icon" type="image/x-icon" href="<?= $url; ?>img/apple-touch-icon-57x57-precomposed.png">

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="<?= $url; ?>css/booking-sign_up.css" rel="stylesheet">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= $url; ?>img/apple-touch-icon-72x72-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= $url; ?>img/apple-touch-icon-114x114-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= $url; ?>img/apple-touch-icon-144x144-precomposed.png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">



    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/a667651c05.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php
        wp_head();
    ?>

    <style>

        .container{max-width:1170px; margin:auto;}

    img{ max-width:100%;}

    .inbox_people {

      background: #f8f8f8 none repeat scroll 0 0;

      float: left;

      overflow: hidden;

      width: 40%; border-right:1px solid #c4c4c4;

    }

    .wpr-account-2 a {

        text-decoration: none;

        font-size: 13px !important;

        margin: 0 !important;

    }

    a#wpr_account_id0 {

        height: 52px !important;

    }
		.col-md-12.wpr_field_wrapper {
    text-align: left;
}

    .col-md-10.col-md-offset-1 .form-group {

        margin-bottom: 15px;

        width: 121%;

    }

    .col-md-10.col-md-offset-1 {

        margin: 0;

    }

    .wpr-field-model {

        width: 100% !important;

        background: transparent;

        border: 0 !important;

        box-shadow: unset !important;

        margin:0 !important;

    }
    .banner_image {
        height: 150px;
        text-align: center;
        color: white;
        padding: 45px;
    }

    .modal-body{

        padding:0 !important;

    }

    h1.entry-title {

        display: none;

    }

    .wpr_sub_form {

        float: right;

        margin-left: 15px;

        margin-top: 20px;

    }

    input.btn.btn-info {

        width: 158%;

        font-size: 19px;

        background: #152b58;

    }

    h2.wpr-form-title {

        display: none !important;

    }

    .inbox_msg {

      border: 1px solid #c4c4c4;

      clear: both;

      overflow: hidden;

    }

    .top_spac{ margin: 20px 0 0;}

    

    

    .recent_heading {float: left; width:40%;}

    .srch_bar {

      display: inline-block;

      text-align: right;

      width: 60%; padding:

    }

    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    

    .recent_heading h4 {

      color: #05728f;

      font-size: 21px;

      margin: auto;

    }

    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}

    .srch_bar .input-group-addon button {

      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;

      border: medium none;

      padding: 0;

      color: #707070;

      font-size: 18px;

    }

    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}

    .chat_ib h5 span{ font-size:13px; float:right;}

    .chat_ib p{ font-size:14px; color:#989898; margin:auto}

    .chat_img {

      float: left;

      width: 11%;

    }

    .chat_ib {

      float: left;

      padding: 0 0 0 15px;

      width: 88%;

    }

    

    .chat_people{ overflow:hidden; clear:both;}

    .chat_list {

      border-bottom: 1px solid #c4c4c4;

      margin: 0;

      padding: 18px 16px 10px;

    }

    .inbox_chat { height: 550px; overflow-y: scroll;}

    

    .active_chat{ background:#ebebeb;}

    

    .incoming_msg_img {

      display: inline-block;

      width: 6%;

    }

    .received_msg {

      display: inline-block;

      padding: 0 0 0 10px;

      vertical-align: top;

      width: 92%;

     }

     .received_withd_msg p {

      background: #ebebeb none repeat scroll 0 0;

      border-radius: 3px;

      color: #646464;

      font-size: 14px;

      margin: 0;

      padding: 5px 10px 5px 12px;

      width: 100%;

    }

    .time_date {

      color: #747474;

      display: block;

      font-size: 12px;

      margin: 8px 0 0;

    }

    .received_withd_msg { width: 57%;}

    .mesgs {

        float: right;

        padding: 40px 4px 1px 6px;

        width: 60%;

    }

    .stylish-input-group .input-group-addon {

        border: none;

        background: transparent;

        padding: 22px 13px 0;

    }

    .stylish-input-group input.search-bar {

        border: 1px solid #cdcdcd;

        border-width: 0 0 1px 0;

        width: 80%;

        padding: 0 !important;

        background: none;

        float: left;

    }

     .sent_msg p {

      background: #05728f none repeat scroll 0 0;

      border-radius: 3px;

      font-size: 14px;

      margin: 0; color:#fff;

      padding: 5px 10px 5px 12px;

      width:100%;

    }

    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}

    .sent_msg {

      float: right;

      width: 46%;

    }

    .input_msg_write input {

      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;

      border: medium none;

      color: #4c4c4c;

      font-size: 15px;

      min-height: 48px;

      width: 100%;

    }

    

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}

    .msg_send_btn {

      background: #05728f none repeat scroll 0 0;

      border: medium none;

      border-radius: 50%;

      color: #fff;

      cursor: pointer;

      font-size: 17px;

      height: 33px;

      position: absolute;

      right: 0;

      top: 11px;

      width: 33px;

    }

    .messaging { padding: 0 0 50px 0;}

    .msg_history {

      height: 516px;

      overflow-y: auto;

    }

    </style>



    <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">



    <!-- BASE CSS -->

    <link href="<?= $url; ?>css/bootstrap_customized.min.css" rel="stylesheet">

    <link href="<?= $url; ?>css/style.css" rel="stylesheet">
    <link href="<?= $url; ?>css/profile.css" rel="stylesheet">

	<link href="<?= $url; ?>css/listing.css" rel="stylesheet">

	<link href="<?= $url; ?>css/custom.css" rel="stylesheet">



    <!-- SPECIFIC CSS -->

    <link href="<?= $url; ?>css/blog.css" rel="stylesheet">

		<link rel="stylesheet" href="<?= $url; ?>css/chosen.min.css"/>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



    <!-- YOUR CUSTOM CSS -->

    <link href="<?= $url; ?>css/custom.css" rel="stylesheet">

	<link href="<?= $url; ?>css/css.css" rel="stylesheet">

	<!--woocommerce-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <link href="<?= $url; ?>css/detail-page.css" rel="stylesheet">

  <style>

        .cart_img {

            width: 23px;

            margin-top: 8px;

        }

        header.header.clearfix {
		    height: 90px;
		    background: white;
		}
		  @media print{
                 header.header.clearfix  {
                 visibility: hidden !imporant;
                 display:none !imporant;
            }
        }

        ul#menu-main-menu li a {
            color: black !important;
            font-weight: 500;
        }
        #top_menu .cart_img{
          background: #182e49 !important;
        }
        ul#top_menu {
            float: right;
            margin: 0 0 0 10px;
            padding: 0;
            list-style: none;
            font-size: 13px;
            position: relative;
            font-size: 0.8125rem;
            top: 17px;
        }
        header a.open_close{
        	font-size: 32px !important;
        }
        ul#top_menu li a.login:before, ul#top_menu li a.wishlist_bt_top:before {
            font-family: 'Glyphter';
            font-size: 21px !important;
            font-size: 1.3125rem;
            text-indent: 0;
            position: absolute;
            left: 0;
            top: 0;
            font-weight: normal;
            line-height: 1;
        }
        
        
        .main-menu ul a, .main-menu ul li a {
            position: relative;
            margin: 0;
            padding: 0;
            display: block;
            padding: 10px;
            color: black;
            font-weight: 500;
        }
        
        .sticky ul li a .cdiv {
            color: white;
        }
        
        .cdiv {
            /*background: red;*/
            border: 1px solid;
            border-radius: 50px;
            width: 21px;
            padding: 3px;
            text-align: center;
            position: relative;
            top: -40px;
            left: 10px;
        }


        .icon_menu {
            color: black !important;
        }
        @media (max-width: 991px){
            #logo {
                float: none;
                width: 31%;
                text-align: center;
                margin: -24px auto;
                position: relative;
            }
        }
        @media (max-width: 767px){
            #logo img.logo_sticky, #logo img.logo_normal {
                margin: -48px auto;
            }
            #logo img.logo_sticky {
                display: block;
            }
			header.header.clearfix{
				height: 60px;
			}

            header.header.clearfix.element_to_stick.sticky img.logo_sticky {
                margin: -62px auto !important;
                position: relative;
            }
            .col-md-10.col-md-offset-1 .form-group {

		        margin-bottom: 15px;

		        width: 100%;

		    }
        }
        @media only screen and (max-width: 991px){
        	#header_menu {
			    display: block !important;
			    background-color: #182e49;
			    height: 90px !important;
			}
			#header_menu a.open_close {
                top: 32px;
                right: 37px !important;
            }
        }
      
    </style>

	<?php wp_head(); ?>

	



</head>



<body style="padding-top: 0;margin-top: 80px;">

				

	<header class="header clearfix element_to_stick">

		<div class="container_">
			<div class="top-header" style="background: transparent;">

			    <div class="row" style="background: transparent;">

			        <div class="col-md-6" style="background: transparent;"></div>

			        <div class="col-md-6" style="background: transparent;">

		<?php

		    //include "top-header.php";

    	?>
    				</div>

			    </div>

			</div>

		<div id="logo">

			<a href="<?= get_option('siteurl'); ?>">

				<img src="<?= ot_get_option( 'site_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal">

				<img src="<?= ot_get_option( 'sticky_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">

			</a>

		</div>

		<?php

		    include "nav.php";

		?>

		</div>

	</header>

	<!-- /header -->

	<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>

	<main style="">

		<div class="page_header element_to_stick">

		    <div class="container">

		    	<div class="row">

		    		<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">

		    			<div class="breadcrumbs blog">

				            <ul>

				                <li><a href="#">Home</a></li>

				                <li><a href="#">Category</a></li>

				                <li>Page active</li>

				            </ul>

		       	 		</div>

		    		</div>

		    		<div class="col-xl-4 col-lg-5 col-md-5">

		    			<div class="search_bar_list">

							<input type="text" class="form-control" placeholder="Search in blog...">

							<input type="submit" value="Search">

						</div>

		    		</div>

		    	</div>

		    	<!-- /row -->		       

		    </div>

		</div>
		<div class=”breadcrumbs” typeof=”BreadcrumbList” vocab=”http://schema.org/”>

</div>

		<!-- /page_header -->