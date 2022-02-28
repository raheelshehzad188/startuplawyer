<?php 

$url = get_assets_url();

?>

	<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">

    <meta name="author" content="Ansonika">

    <title><?php echo get_bloginfo( 'name' ); ?></title>



	<!-- Select2 CDN link -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicons-->

    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url() ;?>/wp-content/uploads/2020/11/cebab310d0de566d1a073d52099b683f-png-512x512-1.png">

    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">

    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">



    <!-- GOOGLE WEB FONT -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">



    <!-- BASE CSS -->

    <link href="<?= $url; ?>css/bootstrap_customized.min.css" rel="stylesheet">

    <link href="<?= $url; ?>css/style.css" rel="stylesheet">

    <link href="<?= $url; ?>css/help.css" rel="stylesheet">



    <!-- SPECIFIC CSS -->

    <link href="<?= $url; ?>css/home.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">



    <!-- YOUR CUSTOM CSS -->

    <link href="<?= $url; ?>css/custom.css" rel="stylesheet">

    <style>

        .cart_img {

            width: 23px;

            margin-top: 8px;

        }

        .top-header ul {

            list-style: none;

            margin: 0;

            padding-left: 355px;

        }

       .top-header ul li {

    display: block;

    color: #000 !important;

    font-weight: bold;

}

        .top-header ul li a, .top-header ul li {

    color: black;

}

        .top-header ul li a:hover ,.sticky .container .top-header ul li a:hover{

            color:#589442;

        }

        .sticky .container .top-header ul li{

            color:black;

        }

        #logo img.logo_sticky, #logo img.logo_normal {

    position: relative;

    top: -33px;

}

    </style>



</head>



<body>

			

	<header class="header clearfix element_to_stick">

		<div class="container">

		<?php

		    include "top-header.php";

    	?>

		<div id="logo">

			<a href="<?= get_option('siteurl'); ?>">

				<img src="<?= ot_get_option( 'site_logo', $url.'img/logo1.png' ) ?>" width="110" height="48" alt="" class="logo_normal">

				<img src="<?= ot_get_option( 'sticky_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">

			</a>

		</div>

		<?php

		    include "nav.php";

		?>

		</div>

	</header>

	<!-- /header -->

	