<?php
$url = get_template_directory_uri('/assets1').'/assets1/';
$surl = get_template_directory_uri('/assets1').'/slider/';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Ansonika">
    <title>Foogra - Discover & Book the best restaurants at the best price</title>

	<!-- Select2 CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

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
    <link href="<?= $url; ?>css/dropdown.css" rel="stylesheet">
    <link href="<?= $url; ?>css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="<?= $url; ?>css/home.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= $url; ?>css/custom.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous"></script>

    <link href="<?= $surl ?>css/dashboard.css" rel="stylesheet" />
      <link href="<?= $surl ?>css/owl.carousel.css" rel="stylesheet" />


</head>

<body>
				
	<header class="header clearfix element_to_stick">
		<div class="container">
		<div id="logo">
			<a href="index.html">
				<img src="<?= ot_get_option( 'site_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal">
				<img src="<?= ot_get_option( 'sticky_logo', $url.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
			<li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
			<li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
		</ul>
		<!-- /top_menu -->
		<a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a>
		<nav class="main-menu">
			<div id="header_menu">
				<a href="#0" class="open_close">
					<i class="icon_close"></i><span>Menu</span>
				</a>
				<a href="index.html"><img src="img/logo2" width="140" height="35" alt=""></a>

			</div>
			<ul>
				<li class="submenu">
					<a href="#0" class="show-submenu">Home</a>
					<ul>
						<li><a href="index.html">Default</a></li>
						<li><a href="index-2.html">Video Background</a></li>
						<li><a href="index-3.html">Slider</a></li>
						<li><a href="index-4.html">GDPR Cookie Bar EU Law</a></li>
					</ul>
				</li>
				<li><a href="listing.html">Listing</a></li>
				<li><a href="#">How it works</a></li>
				<li><a href="#">Plans & Pricing </a></li>
				<li><a href="#">Blog </a></li>
				<li><a href="#">Help </a></li>
			</ul>
		</nav>
	</div>
	</header>
	<!-- /header -->