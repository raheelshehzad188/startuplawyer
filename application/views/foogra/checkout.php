<style>

   a {

   color: #4f4d4d;

   text-decoration: none;

   }

   a:hover, a:focus {

   color: #000;

   }

   *, *:after, *:before { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }

   a, button {

   outline: none;

   }

   .clearfix:before,

   .clearfix:after {

   content: " ";

   display: table;

   }

   .clearfix:after {

   clear: both;

   }

   /* To Navigation Style */

   .cctop {

   background:#08cbd2;	

   width: 100%;

   text-transform: uppercase;

   font-weight: 700;

   font-size: 0.75em;

   line-height: 3.2;

   }

   .cctop a {

   display: inline-block;

   padding: 0 1.5em;

   text-decoration: none;

   letter-spacing: 1px;

   }

   .cctop span.right {

   float: right;

   }

   .cctop span.right a {

   display: block;

   float: left;

   }

   /* Header Style */

   .ccheader {

   margin: 0 auto;

   padding: 2em;

   text-align: center;

   }

   .ccheader h1 {

   font-size: 2.625em;

   font-weight: 300;

   line-height: 1.3;

   margin: 0;

   }

   .ccheader h1 span {

   display: block;

   padding: 0 0 0.6em 0.1em;

   font-size: 60%;

   opacity: 0.7;

   }

   /* Demo Buttons Style */

   .codeconvey-demo {

   padding-top: 1em;

   font-size: 0.8em;

   }

   .codeconvey-demo a {

   display: inline-block;

   margin: 0.5em;

   padding: 0.7em 1.1em;

   outline: none;

   border: 2px solid #fff;

   color: #fff;

   text-decoration: none;

   text-transform: uppercase;

   letter-spacing: 1px;

   font-weight: 700;

   }

   .codeconvey-demo a:hover,

   .codeconvey-demo a.current-demo,

   .codeconvey-demo a.current-demo:hover {

   border-color: #333;

   color: #333;

   }

   /* Wrapper Style */

   .wrapper{

   }

   section{ float:left; width:100%;}

   .opt{ 

   background: url(../images/bg.jpg) repeat-x;

   padding:3%;

   }

   @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

   @font-face {

   font-family: 'FontAwesome';

   src: url('../fonts/fontawesome-webfont.eot?v=4.0.3');

   src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');

   font-weight: normal;

   font-style: normal;

   }

   .cctabs {

   width: 100%;

   margin: 70px auto;

   padding:0 200px;

   }

   .cctabs ul{

       display:flex;

       list-style-type: none;

   }

    .cctabs ul li{

        padding:0 25px;

    }

    .cctabs ul li a:focus,  .cctabs ul li a:active{

        color:green;

    }

   #customRadio3, #customRadio2{

   opacity: 1;

   }

   .cctabs .fa{

   margin-right:10px;	

   }

   .cctabs label {

   color: #000;

   cursor: pointer;

   float: left;

   margin-right: 2px;

   padding: 0.5% 2%;

   font-size:16px;

   }

   .cctabs input:checked + label {

   background: #fff;

   color: #7521ff;

   }

   .cctabs input:nth-of-type(1):checked ~ .panels .panel:first-child, .cctabs input:nth-of-type(2):checked ~ .panels .panel:nth-child(2), .cctabs input:nth-of-type(3):checked ~ .panels .panel:nth-child(3),.cctabs input:nth-of-type(4):checked ~ .panels .panel:nth-child(4), .cctabs input:nth-of-type(5):checked ~ .panels .panel:last-child {

   opacity: 1;

   -webkit-transition: .3s;

   /*position:relative;*/

   z-index:999;

   }

   .cctabs .panels {

   float: left;

   clear: both;

   position: relative;

   width: 100%;

   background: #fff;

   }

   .cctabs .panel {

   width: 100%;

   opacity: 0;

   position: absolute;

   background: #fff;

   padding: 4%;

   box-sizing: border-box;

   }

   .cctabs .panel h2 {

   margin: 0;

   font-family: Arial;

   }

   .cctabs .panel i{

   color:#7521ff;

   cursor:pointer;	

   }

   .cctabs .panel i:hover{

   color:#f4cc42;

   }

   .cctabs .headline h1 {

   font-size: 30px;

   font-weight: bold;

   letter-spacing: 0.6px;

   padding-bottom: 0;

   text-align: center;

   text-rendering: optimizespeed;

   margin: 10px 0;

   }

   .cctabs .headline hr {

   background: none repeat scroll 0 0 #7521ff;

   border: 2px solid;

   color: #7521ff;

   margin-bottom: 0;

   margin-top: 0;

   width: 30px;

   }

   .cctabs .headline .lead {

   font-family: "Lato",sans-serif;

   font-weight: 300;

   line-height: 1.9;

   margin: 5px 0;

   text-align: center;

   }

   #map-canvas {

   height: 366px;

   width: 462px;

   }

   #cc-contact input[type="text"], 

   #cc-contact input[type="email"],

   #cc-contact input[type="tel"],

   #cc-contact input[type="password"],

   #cc-contact textarea{

   width:100%;

   border:1px solid #ebb704;

   margin:0 0 5px;

   padding:10px;

   font-family: "Lato",sans-serif;

   font-size:14px;

   }

   #cc-contact textarea {

   height:147px;

   max-width:100%;

   }

   #cc-contact button[type="submit"] {

   cursor:pointer;

   width:100%;

   border:none;

   background:#ebb704;

   color:#FFF;

   margin:0 0 5px;

   padding:10px;

   font-size:15px;

   }

   #cc-contact button[type="submit"]:hover {

   background:#f4cc42;

   -webkit-transition:background 0.3s ease-in-out;

   -moz-transition:background 0.3s ease-in-out;

   transition:background-color 0.3s ease-in-out;

   }

   /* GRID*/

   .grid {

   display: block;

   margin-left: -10px;

   }

   .cc-text-center{

   text-align:center;

   }

   .cc-mt-20{

   margin-top:50px;	

   }

   .unit-2,

   .unit-3,

   .unit-4 {

   float: left;

   border-left: 10px solid transparent;

   box-sizing: border-box;

   background-clip: padding-box;

   }

   .unit-1{

   width:100%;

   float:left;	

   }

   .unit-2 {

   width: 50%;

   }

   .unit-3 {

   width: 33.3%;

   }

   .unit-4 {

   width: 25%;

   }

   /*------here-----*/

   .card{

   box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

   padding: 25px;
   margin-top: 10px;

   }

   .btn-darks{

   color: white;

   background-color: black;

   border-radius: 40px;

   padding: 15px 40px;

   }

   .nxt{

   color: white;

   background-color: #7521FF;

   border-radius: 40px;

   padding: 10px 45px;   

   }

   .tst{

   background-color: green;

   color: white;

   border-radius: 100%;

   text-align: center;

   padding: 15px 12px;

   }

   .card-header {

       background-color:white!important;

   }

   .box{

   border:1px solid #d2d8dd;

   }

   .dsn{

   padding: 0 250px;

   } 

   .dsn img{

   height:55px;

   width:85px;

   }

   .lower h5{

   text-align: center;

   text-transform: uppercase;

   padding: 65px;

   }
 .lower img{
   padding-right:20px;
}
   .reciept lable{

   text-transform: uppercase;

   color: #adadad;

   }

   .reciept input[type="text"],.reciept input[type="tel"], .reciept input[type="email"],.reciept input[type="number"],.reciept input[type="date"],.reciept input[type="time"]{

   border:none;

   width: 100%;

   background:none;

   }

   .reciept input:focus{

   outline:none;

   }

   .reciept .col-6{

   margin: 10px 0 10px 0;

   }

   .pay, .pay2, .pay3, .pay4{

   display:flex;

   width: 650px;

   }

   .pay2 img, .pay3 img, .pay4 img{

       width: 30px;

    height: 30px;

    border-radius: 25px;

    margin-right: 10px;

   }

   .pay2, .pay3, .pay4{

   padding: 10px 2px 0 0;

   width: 100%;

   }

   #one, #two, #three, #four, #five{

   padding:9px;

   }

   #info{

   width: 100%;

   height: auto;

   }
   .action{
       display:flex;
       height: 16px;
    float: right;
        margin-right: -44px;
   }
    .chk{
        margin-right:15px;
    }
    .lower>.row{
        padding:0 100px;
    }
     .lower>.other{
        padding:0 300px;
    }
     .lower>.other img{
       width:60px;
        height:40px;
    }
    .lower h4{
    border-radius: 25px;
    background-color: chartreuse;
    padding: 4px 11px;
    width: 35px;
    height: 35px;
    }
   @media only screen and (max-width: 600px) {/*---------for mob-------*/
    .lower>.row{
        padding:0 10px;
    }
   .cctabs, .dsn{

   padding:0;

   }

   .cctabs{

           margin-left: -17px;

   }

   .cctabs ul li{

       padding:0 5px;

       font-size: 10px;

   }

   .dsn img{

   height:auto;

   width:100%;

   }

   .lower, .lower h4{

   text-align: center;

   }

   .pay, .pay2, .pay3, .pay4{

   display:flex;

   width: 300px;
   font-size:10px;

   }
    .pay2 img, .pay3 img, .pay4 img{

       width: 20px;

    height: 20px;
        
    }
    .pay2, .pay3, .pay4{

   padding:10px 0 0 0;

   }
   .chk{
           margin: 6px 150px;
   }
   .action {
    display: flex;
    height: 15px;
    float: right;
    margin-top: -19px;
    
}

   }

</style>

<body>

   <?php

      $tab = 'checkout';

      if(isset($_REQUEST['tab']))

      {

      	$tab = $_REQUEST['tab'];

      }

      $tabs = array();

      $tabs['checkout']= array(

      'text' => 'Checkout',

      'file' => 'checkout',

      );

      $tabs['login']= array(

      'text' => 'Login or Guest',

      'file' => 'login',

      );

      $tabs['instruction']= array(

      'text' => ' Update Instructions',

      'file' => 'instruction',

      );

      $tabs['payment']= array(

      'text' => ' Payment',

      'file' => 'payment',

      );

      $tabs['reciept']= array(

      'text' => '  Receipt',

      'file' => 'reciept',

      );

      ?>

   <div class="container">

      <div class="wrapper">

         <div class="cctabs">

            <ul>

               <?php

                  foreach($tabs as $k=> $v)

                  {

                  	?>

               <li <?= ($k == $tab)?"active":""; ?>><a href="?tab=<?= $k ?>"><?= $v['text'] ?></a></li>

               <?php

                  }

                  ?>

            </ul>

         </div>

         <div class="panels">

            <div class="panel">

               <?php

                  if(isset($tabs[$tab]))
                  {

                   $sing = $tabs[$tab];

                   if($sing['file'])

                   {

                  	$v = 'foogra/checkout/'.$sing['file'];

                  	$this->load->view($v);

                   }

                  }
                  elseif($tab == 'invoice')
                  {
                      $v = 'foogra/checkout/invoice';

                  	$this->load->view($v);
                  }

                  ?>

            </div>

         </div>

      </div>

   </div>
   <button type="submit" style="visibility:hidden" id="payhere-payment" >PayHere Pay</button>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
function process_pyment()
{
	if($('input[name ="pmthd"]:checked').val() == 'payhere')
	{
		$('#payhere-payment').click();
	}
	else
	{
		ajax_url('<?=base_url("/api/checkout_gateway"); ?>?oid='+"<?= (isset($order_id)?$order_id:0); ?>"+"&gatway=bank",'gateway');
	}
}
</script>
<?php
if(isset($order_id))
{
	$modal->table = 'orders';
	$order = $modal->getbyid($order_id);
	if($order)
	{
		$user = $product->getuser($order->uid);
		?>
<script>
    // Called when user completed the payment. It can be a successful payment or failure
    payhere.onCompleted = function onCompleted(orderId) {
		swal({
  title: "Payment Successful",
  text: "Please wait we are prcessing!",
  icon: "success",
  button: "Aww yiss!",
});
ajax_url('<?=base_url("/api/checkout_gateway"); ?>?oid='+orderId+"&gatway=payhere",'gateway');
        console.log("Payment completed. OrderID:" + orderId);
        //Note: validate the payment and show success or failure page to the customer
    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
        //Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": get_option('payhere_merchant_id','payhere_merchant_id'),    // Replace your Merchant ID
        "return_url": "<?= base_url('index/payhere/resturn'); ?>",     // Important
        "cancel_url": "<?= base_url('index/payhere/cencel'); ?>",     // Important
        "notify_url": "<?= base_url('index/payhere/notify'); ?>",
        "order_id": "<?= $order_id ?>",
        "items": "Door bell wireles",
        "amount": "<?= $order->total ?>",
        "currency": "LKR",
        "first_name": "<?= $user->full_name ?>",
        "last_name": "Perera",
        "email": "<?= $user->user_login; ?>",
        "phone": "<?= $user->billing_phone ?>",
        "address": "No.1, Galle Road",
        "city": "<?= $user->district ?>",
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    };
</script>
<?php
	}
}
?>