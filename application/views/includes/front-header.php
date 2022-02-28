
<?php  
$url = get_assets_url().'/';

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

    <title><?= $title; ?></title>
    <meta name="google-signin-client_id" content="922526942247-gqdlgpei6f9fpa61qab8o28ao9l0dbci.apps.googleusercontent.com"> 

    <!-- Favicons-->

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ;?>/wp-content/uploads/2020/11/cebab310d0de566d1a073d52099b683f-png-512x512-1.png">

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

    <style>
/*

Theme Name: StartupLaywers

Theme URI: https://github.com/tidythemes/blankslate

Author: Raheel Shehzad

Author URI: http://tidythemes.com/

Description: Please read: tidythemes.com/concept. BlankSlate is the definitive WordPress HTML5 boilerplate starter theme. We've carefully constructed the most clean and minimalist theme possible for designers and developers to use as a base to build websites for clients or to build completely custom themes from scratch. Clean, simple, unstyled, semi-minified, unformatted, and valid code, SEO-friendly, jQuery-enabled, no programmer comments, standardized and as white label as possible, and most importantly, the CSS is reset for cross-browser-compatability and no intrusive visual CSS styles have been added whatsoever. A perfect skeleton theme. For support and suggestions, go to: https://github.com/tidythemes/blankslate/issues. Thank you.

Version: 2019.1

License: GNU General Public License

License URI: https://www.gnu.org/licenses/gpl.html

Tags: one-column, two-columns, custom-menu, featured-images, microformats, sticky-post, threaded-comments, translation-ready

body .woocommerce .product-name a

BlankSlate WordPress Theme © 2011-2019 TidyThemes

BlankSlate is distributed under the terms of the GNU GPL

*/

.avatar img {

  width: auto;

}

p.return-to-shop a.button.wc-backward {

    background: #589442;

    border-radius: 0 !important;

    color: white;

    padding: 20px 20px;

    height: 56px;

    position: relative;

    left: 4%;

}

html{

    margin:0!important;

}

.page_header{

    display:none !important;

}

body

{

text-align: left;

}

#sidebar_right

{

border-left: 1px solid black;

}

.header-logo {

    text-align: center;

}

.header-logo img {

    height: 45px;

}

.jumbotron h1, .jumbotron .h1 {

    font-size: 35px;

    color: #aaa;

    text-align: center;

}



.title

{

font-size: 11pt;

font-family: verdana;

font-weight: bold;

}

#main {

    margin-bottom: 50px;

}

a {

    color: #34393e;

    text-decoration: none;

}

.woocommerce ul.products li.product .price {

    color: #77a464;

    display: block;

    font-weight: 400;

    margin-bottom: .5em;

    font-size: 1.2em;

}

.woocommerce ul.products li.product .woocommerce-loop-product__title{

    font-size:1.5em;

    }

.woocommerce nav.woocommerce-pagination ul{

    border:none;

    }

    .woocommerce .woocommerce-pagination ul.page-numbers li, .woocommerce-page .woocommerce-pagination ul.page-numbers li {

    display: inline-block;

    margin: 5px;

}

.woocommerce nav.woocommerce-pagination ul li span.current {

    background: #337ab7;

    color: #fff;

    padding: 12px;

}

.woocommerce-pagination ul.page-numbers a.page-numbers {

    color: #444;

    padding: 12px;

    margin: 0px;

    background: #ddd;

}

#footer {

    width: 100%;

    border-top: 1px #a2a2a2 solid;

    text-align: center;

    padding: 40px;

    background: #eee;

}

#footer h1 {

    color: #aaa;

    font-size: 30px;

    font-weight: 500;

}



.woocommerce-message { display: none;  }

.woocommerce-cart.full-width-content .content,

.woocommerce-checkout.full-width-content .content { max-width: 100%; }



.woocommerce-cart .woocommerce table.shop_table td.actions {

  border-top: 1px solid #e6e6e6;

  background: #f7f7f7;

  border-bottom: 0px solid #e6e6e6;

}

.woocommerce-cart .entry-content form { width: 60%; float: left;  }

.woocommerce-cart .woocommerce .cart-collaterals {

    width: 33%;

  float: right;

}

.woocommerce-cart .woocommerce .cart-collaterals h2 { display: none;  }

.woocommerce-cart .woocommerce .cart-collaterals .cart_totals { width: 100%; }





#add_payment_method .cart-collaterals .cart_totals tr th,

.woocommerce-cart .cart-collaterals .cart_totals tr th, 

.woocommerce-checkout .cart-collaterals .cart_totals tr th,

#add_payment_method table.cart th, 

.woocommerce-cart table.cart th, 

.woocommerce-checkout table.cart th,

.woocommerce-checkout table.shop_table th { color: #034997; font-size: 14px; font-size: 1.4rem; }



#add_payment_method .cart-collaterals .cart_totals tr td, 

.woocommerce-cart .cart-collaterals .cart_totals tr td, 

.woocommerce-checkout .cart-collaterals .cart_totals tr td, 

#add_payment_method table.cart td,

.woocommerce-cart table.cart td,

.woocommerce-checkout table.cart td,

.woocommerce-checkout table.shop_table td { color: #555; font-size: 16px; font-size: 1.6rem; }



.woocommerce-cart .woocommerce table.shop_table th {   border-bottom: 2px solid #034997; }



.woocommerce-cart .woocommerce table.shop_table,

.woocommerce-checkout .woocommerce table.shop_table {

  border: 1px solid #e6e6e6;

  margin: 0;

  text-align: left;

  width: 100%;

  border-collapse: separate;

  border-radius: 0;

  border-bottom: none;

    border-right: none;

     margin-bottom: 35px;

      border-bottom: 1px solid #e6e6e6;

}



body #add_payment_method #payment ul.payment_methods li input, 

body.woocommerce-cart #payment ul.payment_methods li input, 

body.woocommerce-checkout #payment ul.payment_methods li input { width: auto;   margin: -2px .5em 0 0; }



body .woocommerce form .form-row .input-checkbox { width: auto;  margin: -2px 5px 0 0; }



#add_payment_method .cart-collaterals .cart_totals tr td, 

#add_payment_method .cart-collaterals .cart_totals tr th, 

body.woocommerce-cart .cart-collaterals .cart_totals tr td, 

body.woocommerce-cart .cart-collaterals .cart_totals tr th, 

body.woocommerce-checkout .cart-collaterals .cart_totals tr td, 

body.woocommerce-checkout .cart-collaterals .cart_totals tr th,

body .woocommerce table.shop_table th { 

	border-top: none; 

	border-bottom: 1px solid #e6e6e6;

	border-right: 1px solid #e6e6e6;

	text-align: right;

	padding: 10px 20px;

}



body #add_payment_method table.cart td, 

body #add_payment_method table.cart th, 

body.woocommerce-cart table.cart td, 

body.woocommerce-cart table.cart th, 

body.woocommerce-checkout table.cart td, 

body.woocommerce-checkout table.cart th { border-right: 1px solid #e6e6e6; }



#add_payment_method .cart-collaterals .cart_totals tr th, 

body.woocommerce-cart .cart-collaterals .cart_totals tr th, 

body.woocommerce-checkout .cart-collaterals .cart_totals tr th { }



.woocommerce-cart .cart-collaterals .cart_totals table th { border-bottom: 1px solid #e6e6e6;  }



body .woocommer ce #respond input#submit.alt, 

body .woocommerce a.button.alt, 

body .woocommerce button.button.alt, 

body .woocommerce input.button.alt {

	font-weight: 500;

}



body .woocommerce #respond input#submit.alt:hover, 

body .woocommerce a.button.alt:hover, 

body .woocommerce button.button.alt:hover, 

body .woocommerce input.button.alt:hover {

}



body .woocommerce .cart .button, 

body .woocommerce .cart input.button,

body .woocommerce #respond input#submit, 

body .woocommerce a.button, 

body .woocommerce button.button, 

body .woocommerce input.button { color: #fff; font-weight: 500;   border-radius: 40px; }



body .woocommerce #payment #place_order, .woocommerce-page #payment #place_order {

  float: right;

  width: 100%;

  display: block;

  text-align: center;

  margin-bottom: 0;

  font-size: 1.25em;

  padding: 1em;

  border-radius: 40px;

  margin-top: .5em;

}



body .woocommerce form .form-row-first, 

body .woocommerce form .form-row-last, 

body .woocommerce-page form .form-row-first, 

body .woocommerce-page form .form-row-last { width: 49%; }



body .woocommerce #respond input#submit.disabled, 

body .woocommerce #respond input#submit:disabled, 

body .woocommerce #respond input#submit:disabled[disabled], 

body .woocommerce a.button.disabled, 

body .woocommerce a.button:disabled, 

body .woocommerce a.button:disabled[disabled], 

body .woocommerce button.button.disabled, 

body .woocommerce button.button:disabled, 

body .woocommerce button.button:disabled[disabled], 

body .woocommerce input.button.disabled, 

body .woocommerce input.button:disabled, 

body .woocommerce input.button:disabled[disabled] { background: #ccc; }





body .woocommerce a.checkout-button.button.alt { border-radius: 40px; }



body .woocommerce #content table.cart td.actions .coupon, 

body .woocommerce table.cart td.actions .coupon { width: 68%; }



body #add_payment_method table.cart td.actions .coupon .input-text, 

body.woocommerce-cart table.cart td.actions .coupon .input-text, 

body.woocommerce-checkout table.cart td.actions .coupon .input-text {

	padding: 8px 6px 7px;

 	width: 65%;

}



body .woocommerce table.shop_table td { padding: 15px; }



body .woocommerce-checkout table.shop_table td { text-align: right;

  border-right: 1px solid #e6e6e6;   border-top: 0; }



.woocommerce a.remove { margin: 0 auto;  }

.woocommerce-cart .woocommerce table.shop_table th.product-remove,

.woocommerce-cart .woocommerce table.shop_table th.product-name { text-align: center; }

.woocommerce-cart .woocommerce table.shop_table th.product-price,

.woocommerce-cart .woocommerce table.shop_table th.product-quantity,

.woocommerce-cart .woocommerce table.shop_table th.product-subtotal { text-align: right; }



.woocommerce-cart .woocommerce table.shop_table .cart_item td.product-price,

.woocommerce-cart .woocommerce table.shop_table .cart_item td.product-quantity,

.woocommerce-cart .woocommerce table.shop_table .cart_item td.product-subtotal { text-align: right; }



.woocommerce-checkout #add_payment_method #payment ul.payment_methods li, 

.woocommerce-checkout #payment ul.payment_methods li { list-style: none; }



.woocommerce-checkout .woocommerce .col2-set { width: 47.8260869565%; float: left; margin-right: 4.347826087%; }

.woocommerce-checkout .woocommerce .col2-set .col-1,

.woocommerce-checkout .woocommerce .col2-set .col-2 { margin-bottom: 2em; width: 100%; float: none; }

.woocommerce-checkout #order_review_heading,

.woocommerce-checkout #order_review { background: #fff; width: 47.8260869565%; float: right; margin-right: 0; }

.woocommerce-checkout #ship-to-different-address-checkbox { width: auto; float: right; margin-left: 15px; margin-top: 10px; opacity: 1; position: static; }

.woocommerce-checkout #ship-to-different-address label { font-size: 24px;   font-weight: 700; line-height: 1; margin: 0; margin-bottom: 1em; padding: 0; text-transform: uppercase; color: #000; }

.woocommerce-checkout .woocommerce form .form-row.create-account label { padding-top: 2px; font-weight: bold; }



.woocommerce-checkout .payment-fixed { position: fixed; z-index: 9; box-shadow: rgba(0, 0, 0, 0.2) 0px 6px 2em; left: 52%; margin-left: 0; padding: 20px; top: 0; width: 45.5% !important; -webkit-transition: padding .1s ease-in; -moz-transition: padding .1s ease-in; -o-transition: padding .1s ease-in; -ms-transition: padding .1s ease-in; transition: padding .1s ease-in; }



.product-shipping-message { font-size: 16px; text-align: center; text-transform: uppercase; padding: 10px 0px; border-top: 1px solid #139248; border-bottom: 1px solid #139248; }



body .woocommerce table.shop_table tbody th, 

body .woocommerce table.shop_table tfoot td, 

body .woocommerce table.shop_table tfoot th { border-bottom: none; }



body .woocommerce form .form-row input.input-text, 

body .woocommerce form .form-row textarea { 
  max-width: 100%;
  max-width: 100%;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 400;
}



body .woocommerce .product-name a { color: #000; cursor: default; }



@media only screen and (max-width: 1139px) {

	.woocommerce-cart .entry-content form { width: 64%; }

}



@media only screen and (max-width: 980px) {



	.woocommerce-cart .entry-content form {

	  width: 80%;

	  float: none;

	  margin: 0 auto;

	}

	.woocommerce-cart .woocommerce .cart-collaterals {

	  width: 80%;

	  float: None;

	  margin: auto;

	}

	body .woocommerce #content table.cart td.actions .coupon, body .woocommerce table.cart td.actions .coupon { width: 100%; }

	body #add_payment_method table.cart td.actions .coupon .input-text, body.woocommerce-cart table.cart td.actions .coupon .input-text, body.woocommerce-checkout table.cart td.actions .coupon .input-text { width: 48%; }

}



@media only screen and (max-width: 650px) {

  

  .woocommerce-cart .entry-content form {

	  width: 100%;



	}

	.woocommerce-cart .woocommerce .cart-collaterals {

	  width: 100%;



	}



	.woocommerce-checkout .woocommerce .col2-set { width: 100%; float: none; margin-right: 0; }

	.woocommerce-checkout #order_review_heading, 

  .woocommerce-checkout #order_review { width: 100%; float: none; }

	

}

/* Add Icons to Headers & Notifications */

.woocommerce-billing-fields h3:before, h3#order_review_heading:before, h3#phoen_order_review_heading:before {

 font-family: "Material Icons";

 font-size: 27px;

 content: '\E88F'; /* sets default icon to a circled "i" */

 color: #7ed026;

 padding-right: 10px;

 vertical-align: bottom;



}



h3#order_review_heading:before { content: '\E8CC'; } /* changes the icon set above to a shopping cart for the order */



/* MailPoet Subscribe Fixes */

 .mailpoet-subscription-section {xzz

  padding-top: 50px;

 }

 .mailpoet-subscription-section h3:before { content: '\E0E1'; }



/* Fancy Subscribe Now Btn */

#place_order {

  background-image: linear-gradient(25deg,#00aeef 0%,#7ed026 100%)!important;

  border: transparent;

  color: #fff;

  box-shadow: rgba(0, 0, 0, 0.28) 0px 2px 8px 0px;

}



#place_order:hover { background-image: linear-gradient(25deg,#7ed026 0%,#00aeef 100%)!important; }



/* 2 column layout */

@media (min-width: 981px) {

  .woocommerce-checkout .woocommerce { overflow: hidden;}

  .woocommerce-checkout .woocommerce:after { clear: both; }

  .woocommerce-checkout .woocommerce .col2-set .col-1, .woocommerce-checkout .col2-set .col-1 { width: 100%; }

  .woocommerce-checkout .woocommerce .col2-set .col-2, .woocommerce-checkout 

 .woocommerce-page .col2-set .col-2 { display: none; }

 .woocommerce-checkout .woocommerce .col2-set, .woocommerce-checkout .woocommerce-page .col2-set { float:left; width: 48%; }

  .woocommerce-checkout #order_review_heading, .woocommerce-checkout .woocommerce #order_review, .woocommerce-checkout .woocommerce-page #order_review { 

    float: left; 

    width:48%; 

    margin-left: 4%; 

  }

}



/* Rounded corners on the WooCommerce "alert" messages */

.woocommerce-error, .woocommerce-info, .woocommerce-message { border-radius: 3px; }



/* Style form fields to look like Divi */

input.text, input.title, input[type=email], input[type=password], input[type=tel], input[type=text], select, textarea {

  border: none;

  background-color: #eee;

}

.select2-container .select2-selection--single { height: 49px; }

.select2-container--default .select2-selection--single .select2-selection__rendered { 

  line-height: 49px;

  color: #4e4e4e;

  font-weight: bold;

}

.select2-container--default .select2-selection--single .select2-selection__arrow b { margin-top: 8px; }

.select2-container--default .select2-selection--single { 

  background-color: #eee; 

  border: none; 

}



/* some tweaks to simplify the payment method area */

.woocommerce-checkout #payment { background: none!important; }

.woocommerce-checkout #payment ul.payment_methods { border: none; 

}

.woocommerce-billing-fields{

       

 width: 500px ;

}



@media (min-width: 981px) {

  .woocommerce { overflow: hidden;}

  .woocommerce:after { clear: both; }

  .woocommerce .col2-set .col-1, .woocommerce-page .col2-set .col-1 { width: 100%; }

  .woocommerce .col2-set .col-2, .woocommerce-page .col2-set .col-2 { display: none; }

  .woocommerce .col2-set, .woocommerce-page .col2-set { float:left; width: 48%; }

  #order_review_heading, .woocommerce #order_review, .woocommerce-page #order_review {

    float: left;

    width:48%;

    margin-left: 2%;

  }

}

 

/* Rounded corners on the WooCommerce "alert" messages */

.woocommerce-error, .woocommerce-info, .woocommerce-message { border-radius: 5px; }

 

/* Section Titles */

 

h3 {

    font-size: 1.75rem;

    color: #d63663;

}

 

/* FORM STYLING */



.select2-container .select2-selection--single { height: 40px; }

.select2-container--default .select2-selection--single .select2-selection__rendered {

  line-height: 40px;

  color: #4e4e4e;

  font-weight: bold;

}

.select2-container--default .select2-selection--single .select2-selection__arrow b { margin-top: 8px; }

.select2-container--default .select2-selection--single {

  background-color: rgba(0, 1, 0, 0.01);

  border: none;

}

 

.elementor-widget-text-editor {

    color: #492f70;

    font-family: "Roboto", Sans-serif;

    font-weight: 400;

}

 

/* YOUR ORDER FIELD TITLES */



table th {

    font-weight: bold;

    color: #492f70;

}



/* PAYMENT METHOD AREA*/



.woocommerce-checkout #payment { background: rgba(0, 1, 0, 0.01)!important; }

.woocommerce-checkout #payment ul.payment_methods { border: none; }



/* PLACE ORDER BUTTON CUSTOMIZATION */

 

#place_order {

  background-image: linear-gradient(90deg,#d63663 0%,#492f70 100%)!important;

  border: transparent;

  color: #fff;

  box-shadow: rgba(0, 0, 0, 0.30) 0px 2px 8px 0px;

  padding: 10px;

}

 

#place_order:hover { background-image: linear-gradient(90deg,#492f70 0%,#d63663 100%)!important; }



input.text, input.title, input[type="email"], input[type="password"], input[type="tel"], input[type="text"], select, textarea {

    border: none;

    color: #010101;

    height: 50px;

    width: 100%;

}



.woocommerce form .form-row textarea, .woocommerce input[type="email"], .woocommerce input[type="number"], .woocommerce input[type="password"], .woocommerce input[type="reset"], .woocommerce input[type="search"], .woocommerce input[type="tel"], .woocommerce input[type="text"], .woocommerce input[type="url"], .woocommerce textarea, .woocommerce-page form .form-row textarea, .woocommerce-page input[type="email"], .woocommerce-page input[type="number"], .woocommerce-page input[type="password"], .woocommerce-page input[type="reset"], .woocommerce-page input[type="search"], .woocommerce-page input[type="tel"], .woocommerce-page input[type="text"], .woocommerce-page input[type="url"], .woocommerce-page textarea {

    border-color: #ddd;

    background: #f0f0f0;

    box-shadow: none;

    border-radius: 0;

}

.woocommerce-billing-fields .form-row, .woocommerce-shipping-fields .form-row {

	display: block;

}

.cart select{

	    width: 100% !important;

    text-align: center;

    margin-bottom: 10px;

	    padding: 0px 10px;



}

.slot_carousel1 .owl-nav

{

    visibility: hidden;

}

/*=--Accont page design---*/

.woocommerce-MyAccount-navigation-link a {

color: #1c8fc9;

border: 2px solid #1c8fc9;

background-color: #ffffff;

text-shadow: none;

box-shadow: none;

border-radius: 0.54em;

position: relative;

padding-top: 0.75em;

padding-right: 0.76em;

padding-bottom: 0.75em;

padding-left: 0.76em;

cursor: pointer;

font-size: 0.75em;

line-height: 1.2;

text-align: center;

text-transform: uppercase;

vertical-align: middle;

font-family: “Raleway”,sans-serif;

font-weight: 600;

letter-spacing: 0.25em;

}



.woocommerce-MyAccount-navigation-link a:before {

border:none;

}



.woocommerce-MyAccount-navigation-link a:hover {

color: #ffff;

border: 2px solid #1c8fc9;

background-color: #1c8fc9;

text-shadow: none;

box-shadow: none;

border-radius: 0.54em;

}



.woocommerce nav.woocommerce-MyAccount-navigation {

    float: left;

    width: 30%;

    padding: 35px 60px;

	border-right: 1px solid #ededed;

}



.woocommerce .woocommerce-MyAccount-content {

    float: right;

    width: 70%;

    padding: 30px;
    
    overflow-x: scroll;


}



nav.woocommerce-MyAccount-navigation ul {

    list-style: none;

}

nav.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link {

    height: 57px;

    text-align: center;

    border-bottom: 1px solid #ededed;

}

nav.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link a{

	color: black;

    border: none;

    border-radius: 0 !important;

    font-size: 12px;

    text-align: center;

    padding: 21px;

    text-decoration: none;

    width: 100%;

    display: block;

}

nav.woocommerce-MyAccount-navigation ul li.is-active a , nav.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link a:hover{

	background: #589442;

    color: white;

}

.woocommerce-Message.woocommerce-Message--info.woocommerce-info a.woocommerce-Button.button ,.woocommerce-Message.woocommerce-Message--info.woocommerce-info a.woocommerce-Button.button:hover{

	background: #589442;

	cursor:pointer;

    text-align: center;

    padding: 13px;

    border-radius: 0;

}

.woocommerce-MyAccount-content p{

	font-size: 22px;

    font-weight: 500;

}

form.woocommerce-EditAccountForm.edit-account input{

	padding: 5px 14px;

}

form.woocommerce-EditAccountForm.edit-account label{

	font-size: 17px;
  font-weight: 400;
  font-family: sans-serif;

}

p.woocommerce-form-row span.password-input {



}

.woocommerce-MyAccount-content button.woocommerce-Button.button,button.woocommerce-Button.button:hover {

    background: #142954 !important;

    font-size: 18px !important;
    color: white


}
em {
    font-size: 14px;
    font-weight: 500;
    font-style: normal;
}
a.woocommerce-button.button.view:hover {
    color: white;
}
a.woocommerce-button.button.view {

    background: #589442;

    padding: 15px;

}

table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details tr th {

    text-align: left;

}

li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link--edit-address {

    display: none;

}

#rating{

	opacity:1 !important;	

}

#rating .modal-content{

	top:125px !important;

}

#rating .modal-content .modal-body p{

  margin-bottom:0px;

  text-align:center;

  padding: 15px 0px 0px;

  color:#333;

}

#rating .modal-content .modal-body #text{

  display:none;

}

#rating .jq-ry-container {

    margin: 10px auto;margin: 10px auto 20px;

}

#rating .modal-content textarea{

       width: 100%;

    height: 92px;

    border-radius: 5px;

    padding: 10px;

}

#rating .modal-content{

  width:80% !important;

  margin:0px auto !important;

}

.col-lg-9.result_div img {

 /* width: 100%;
    position: relative;
    top: 15%;
    left: 50%;
    transform: translate(-50%, -16%);*/

}

.loader_div img {

    width: 64px;

    position: relative;

    top: 50%;

    left: 50%;

    transform: translate(-50%, -50%);

}

.flex-container{

  max-width: 150px !important;

}
.quantity{
  margin-top:20% !important;
}
.input_error{
    border:1px solid red !important;
}

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

    <link href="<?= base_url('assets/front1/'); ?>css/style.css" rel="stylesheet">
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

				<img src="<?= get_option( 'site_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal">

				<img src="<?= get_option( 'sticky_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">

			</a>

		</div>

		<?php

		    include "nav.php";

		?>

		</div>

	</header>

	<!-- /header -->

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