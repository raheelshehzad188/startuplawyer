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
    <link href="<?= $url ?>css/blog.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="<?= $url ?>css/custom.css" rel="stylesheet">
    <link href="<?= $url ?>css/style.css" rel="stylesheet">
<script src="https://use.fontawesome.com/37fb02a405.js"></script>
<?php wp_head(); ?>
<style>
    .main-menu ul li a{
        color: #000 !important;
    }
    .sticky 
    {
        position:fixed !important;
    }
</style>


</head>

<body>
				
	<header class="header_in clearfix element_to_stick">
		<div class="container">
		<div id="logo">
			<a href="<?= get_option('siteurl'); ?>">

				<img src="https://startuplawyer.lk/main/blog/wp-content/themes/srtartuplawyer/assets/img/logo2.png" width="110" height="48" alt="" class="logo_normal">

			</a>
		</div>
		<?php
		include "nav.php";
		?>
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