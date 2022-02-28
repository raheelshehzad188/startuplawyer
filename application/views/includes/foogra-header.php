<?php
$url = base_url('assets/design/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">
    <meta name="author" content="Ansonika">
    <title><?= $title; ?></title>

	<!-- Select2 CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link href="<?= $url ?>css/dropdown.css" rel="stylesheet">
    <link href="<?= $url ?>css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <?php
    if(isset($css))
    {
        foreach ($css as $key => $value) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?= $value?>">
            <?php
        }
    }
    ?>
    <link href="<?= $url ?>css/home.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= $url ?>css/custom.css" rel="stylesheet">
    <link href="<?= $url ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<script src="https://use.fontawesome.com/37fb02a405.js"></script>
<style>
    header.header.sticky{
        position: fixed !important;
    }
    .header_in .main-menu ul li a{
        color: #000 !important;
    }
</style>

</head>

<body>
				
	<header class="header clearfix element_to_stick <?= (isset($hclass)?$hclass:""); ?>">
		<div class="container">
		<div id="logo">
			<a href="<?= get_option('siteurl'); ?>">
			    

				<img src="<?= get_option( 'site_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal">

				<img src="<?= get_option( 'sticky_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">

			</a>
		</div>
		<ul id="top_menu">
		    <?php
		    if(get_current_user_id())
		    {
		        ?>
		     <li><a href="<?= $product->dashboard_url(get_current_user_id()); ?>"><img id="dashboardImg" style="margin-left: -10px; margin-top:5px;" src="<?= get_option( 'dashboard', get_assets_url().'/'.'img/dashboard2.png' ) ?>"  width="35" height="35" ></a></li>
		        <?php
		    }
		    else
		    {
		        ?>
		        <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
		        <?php
		    }
		    ?>
			<li>
			    	<div id="cart" class="hidden-xs" >
			<a href="<?= base_url('index/page/checkout'); ?>">
                <?php
			    $cimg = (isset($hclass)?get_assets_url().'/'.'img/cart.png':get_assets_url().'/'.'img/cart2.png');
			    $himg = (isset($hclass)?get_assets_url().'/'.'img/hblack.png':get_assets_url().'/'.'img/wheart.png');
			    ?>
				<img id="cartImg" class="cartImg" src="<?= $cimg ?>" width="25" height="25" style="margin-top: 9px;">

			

			</a>
		</div>
			</li>
			<li>
			    	<div id="heart"  class="hidden-xs">
			<a href="<?= base_url('index/wishlist'); ?>">

				<img id="heartImg" class="heartImg" src="<?= $himg ?>" width="25" height="25" style="margin-top: 9px;">

			

			</a>
		</div>
			</li>
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
				<a href="index.html"><img src="<?= get_option( 'site_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal" style="background-color:white;"></a>

			</div>
			<?php
				    $wp = wp_data();
				    echo $wp['menu'];
				    ?>
		</nav>
		<style>
		    ul#menu-short > li > a {
    color: #fff;
    padding: 0 8px 10px 8px; 
    font-weight: 500;
}
header.header.sticky ul#menu-short > li > a {
    color: #589442;
}
		</style>
	</div>
	</header>
	<!-- /header -->