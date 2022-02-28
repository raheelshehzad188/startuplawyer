<?php
$logo = ot_get_option( 'main_logo', $default );
$user = new WP_User( $uid );
?>
<!DOCTYPE html>
<!--<![endif]-->
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Payment Receipt</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <style type="text/css">
      
body,
input,
select,
textarea,
p,
a,
b {
    font-family: 'Poppins', sans-serif;
    color: #252323;
    line-height: 1.4;
    font-size: 14px;
}
.main_box {
    max-width: 702px;
    margin: 0 auto;
}
.head h1 {
    font-size: 35px;
    margin: 18px 0 10px;
    text-align: center;
}
.fl{ float:left}
.fr{ float:right}
.cl{ clear:both; font-size:0; height:0; }
.clearfix:after {
    clear: both;
    content: ' ';
    display: block;
    font-size: 0;
    line-height: 0;
    visibility: hidden;
    width: 0;
    height: 0;
}
.left_box{float: left;width: 64%;}
.left_box h3{margin: 14px 0 7px;}
.left_box p{line-height: 1.5;margin: 0 0 0;}
.left_box ul,#inner-box .right_logo ul {
    padding: 0;
    list-style: none;
    margin: 11px 0 0;
}
.left_box ul li,#inner-box .right_logo  li {
    list-style: none;
    margin: 0 0 6px;
}
.left_box ul li b{

}
.right_logo{float: right;width: 33%;padding: 54px 0 0;}
.right_logo img{
   width: 294px;
}
#inner-box .left_box{

}
#inner-box .right_logo{padding: 0;margin: -8px 0 0;}
.select_customer {
    margin: 10px 0;
    padding: 5px 0 15px;
}
.table-box {
   border-spacing: 0;
    border-collapse: collapse;
    width: 100% !important;
}
.barcode_table tr th, .barcode_table tr td {
    border: 1px solid #dddddd;
    text-align: left;
    font-size: 12px;
    padding: 6px 14px;
}
.barcode_table tr th {
    background: #182e49 !important;
    -webkit-print-color-adjust: exact !important;
    color: #fff !important;
}
.barcode_table tr:nth-child(even){
   background:#e4e0e0; 
   -webkit-print-color-adjust: exact !important;
}
.ordering{text-align: right;}
.ordering ul{
   padding: 0;
   list-style:none;
   margin: 0;
}
.ordering ul li{margin: 0 0 13px;}
.ordering ul li b{width: 83%;float: left;text-align: right;display: inline-block;font-size: 15px;}
.ordering .Total {
    font-size: 25px;
}

   </style>
</head>
<body >

<div class="main_box">
   <div class="head">
      <h1>Payment Receipt</h1>
   </div>
   <?php
   $this->load->view('includes/invoice_header.php');
   ?>

   <div class="clearfix" id="inner-box" style="padding: 15px 0 0;
    border-top: 1px solid #182e4938;
    margin: 16px 0 0;">
      <div class="left_box">
         <h3><?= $user->data->display_name ?>, sp-<?= $user->data->ID;?></h3>
         <p>91-C, Fultono street, Lower Mahattan located in the finacial district.</p>
         
      </div>
      <div class="right_logo">
         <h3>Client Details</h3>
         <p>91-C, Fultono street, Lower Mahattan located in the finacial district.</p>
         <ul>
            <li><b>Vat:</b> 234553333333</li>
            <li><b>Tel:</b> 233222222</li>
            <li><b>Fax:</b> 56523456544</li>
         </ul>
      </div>
   </div>
   <div class="shadow_box_inner select_customer barcode_table">
          <div class=" intrest_base ">
            <table class="table-box">
              <thead>
                <tr>
                  <th>Payment Receipt Date</th>
                  <th>Order Date</th>
                  <th>Order Number</th>
                  <th>Payment Receipt Number</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= date('d-m-Y') ?></td>
                  <td><?= date('d-m-Y') ?></td>
                  <td>#<?= $rno ?></td>
                  <td>MV-<?= $rno ?></td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>

        <div class="shadow_box_inner select_customer barcode_table">
          <div class=" intrest_base ">
            <table class="table-box">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Sku</th>
                  <th>Qty</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  foreach($items as $v)
                  {
                      ?>
                      <tr>
                      <td><?= $v['name']; ?></td>
                      <td><?= $v['price']; ?></td>
                      <td><?= $v['sku']; ?></td>
                      <td><?= $v['qty']; ?></td>
                      <td><?= $v['tot']; ?></td>
                    </tr>
                      <?php
                  }
                  ?>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="ordering">
           <ul>
              <li><b>Order Total:</b> <?= $total ?></li>
              <li><b>Discounteed Price:</b> -<?= $dis ?></li>
              <li><b>Commssion:</b> -$<?= $comm ?></li>
              <li><b>Tax:</b> $<?= $tax ?></li>
              <li><b>PlatForm Fees:</b> $<?= $plat ?></li>
              <li><b>Payment Processing Fees:</b> $<?= $paypro ?></li>
              <li style="font-size: 25px;"><b class="Total">Total:</b> $<?= $total ?></li>
           </ul>
        </div>
</div>



</body>
</html>