<?php

$url = get_assets_url();

?>

<!DOCTYPE html>

<html lang="en" style="margin-top:0 !important;">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">

    <meta name="author" content="Ansonika">

    <title>Startuplawyer</title>



    <!-- Favicons-->

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">



    <!-- GOOGLE WEB FONT -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- BASE CSS -->

    <link href="<?= $url ?>css/bootstrap_customized.min.css" rel="stylesheet">

    <link href="<?= $url ?>css/style.css" rel="stylesheet">



    <!-- SPECIFIC CSS -->

    <link href="<?= $url ?>css/detail-page.css" rel="stylesheet">

    <!--woocommerce-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <link href="<?= $url; ?>css/detail-page.css" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

	<?php wp_head(); ?>

	<style>

        .cart_img {

            width: 23px;

            margin-top: 8px;

        }

	    .cart .quantity {

            width: 100%;

        }

	    .woocommerce .quantity .qty {

            width: 100% !important;

            text-align: center;

            margin-bottom: 10px;

        }

        .cart button.single_add_to_cart_button.button.alt {

            border-radius: 0;

            width: 100%;

        }

        h1.product_title.entry-title{

            display:none;

        }

        .detail_page_head .title h1 {

            margin-bottom: 10px;

        }

        ul#top_menu li a i.fa.fa-shopping-cart {

            font-size: 22px;

            margin-top: 5px;

            color: #72a40d;

        }

        .product_meta {

            display: none;

        }
        header.header.clearfix {
		    height: 90px;
		    background: white;
		}
		ul#menu-main-menu li a {
		    color: black !important;
		    font-weight: 500;
		}
		#top_menu .cart_img{
			background: #182e49 !important;
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
        ul#top_menu li a {
            color: black;
        }
        .icon_menu {
            color: black !important;
        }
        @media (max-width: 991px){
            ul#top_menu {
                right: 28px !important;
            }
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
            header.header.clearfix.element_to_stick.sticky img.logo_sticky {
                margin: -62px auto !important;
                position: relative;
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

</head>



<body id="page<?= get_the_ID(); ?>">

				

	
	<header class="header clearfix element_to_stick">

        <div class="container_">
            <div class="top-header " style="background: transparent;">

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
<?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
