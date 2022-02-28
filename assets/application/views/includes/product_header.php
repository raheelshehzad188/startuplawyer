<?php
$url = base_url('assets/design/orignal/');
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

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?= $url ?>css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="<?= $url ?>css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="<?= $url ?>css/detail-page.css" rel="stylesheet">
    <style>
        .main-menu ul li a
        {
            color:#000 !important;
        }
    </style>
    <script type="text/jasvascript">
	    
	    function open_collepse(no)
	    {
	        var mid = '#coolp'+no;
	        alert(mid);
	        $(mid).toggle();
	    }
	    
	</script>

</head>

<body>
				
	<header class="header_in clearfix">
		<div class="container">
		<div id="logo">
			<a href="index.html">
				<img src="<?= $url ?>img/logo_sticky.svg" width="140" height="35" alt="">
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
				<a href="index.html"><img src="<?= $url ?>img/logo.svg" width="140" height="35" alt=""></a>
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
				<li class="submenu">
					<a href="#0" class="show-submenu">Listing</a>
					<ul>
						<li class="third-level"><a href="#0">List pages</a>
							<ul>
								<li><a href="grid-listing-filterscol.html">List default</a></li>
								<li><a href="grid-listing-filterscol-map.html">List with map</a></li>
								<li><a href="grid-listing-filterscol-full-width.html">List full width</a></li>
								<li><a href="grid-listing-filterscol-full-masonry.html">List Masonry Filter</a></li>
							</ul>
						</li>
						<li><a href="detail-restaurant.html">Detail page 1</a></li>
						<li><a href="detail-restaurant-2.html">Detail page 2</a></li>
						<li><a href="submit-restaurant.html">Submit Restaurant</a></li>
						<li><a href="wishlist.html">Wishlist</a></li>
						<li><a href="admin_section/index.html" target="_blank">Admin Section</a></li>
						
					</ul>
				</li>
				<li class="submenu">
					<a href="#0" class="show-submenu">Other Pages</a>
					<ul>
						<li><a href="404.html">404 Error</a></li>
						<li><a href="confirm.html">Confirm Booking</a></li>
						<li><a href="help.html">Help and Faq</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="booking.html">Booking</a></li>
						<li><a href="leave-review.html">Leave a review</a></li>
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="coming_soon/index.html">Coming Soon</a></li>
						<li><a href="account.html">Sign Up</a></li>
						<li><a href="icon-pack-1.html">Icon Pack 1</a></li>
						<li><a href="icon-pack-2.html">Icon Pack 2</a></li>
					</ul>
				</li>
				<li><a href="submit-restaurant.html">Submit</a></li>
				<li><a href="#0">Buy this template</a></li>
			</ul>
		</nav>
	</div>
	</header>
	<!-- /header -->