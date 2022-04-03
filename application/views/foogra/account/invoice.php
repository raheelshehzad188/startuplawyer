<?php
$uid = 0;
$orders = array();
if(isset($_SESSION['knet_login']))
{
    $uid = $_SESSION['knet_login']->ID;
    $modal->table ='orders';
    $orders = $modal->get(array('uid'=>$uid));
}
?>
<div class="panel">
   <!---order_detail-->
   <div class="order-detail">
       <p>Order # <mark>6543</mark> was placed on <mark>March 5,2022</mark> and is currently <mark>Processing.</mark></p>
       <h5>Order details</h5>
       <div class="row">
           <div class="col-6"><p><b>PRODUCT</b></p></div>
           <div class="col-6"><p><b>TOTAL</b></p></div>
       </div>
       <div class="row">
           <div class="col-6"><p><a href="#"> Herschel Leather Duffle Bag in Brown Color</a> X 1</p></div>
           <div class="col-6"><p><b>$89.88</b></p></div>
       </div>
       <div class="row">
           <div class="col-6"><p><b>Name of Service Provider:</b></p></div>
           <div class="col-6"><p>Asha De Vos</p></div>
       </div>
       <div class="row">
           <div class="col-6"><p><b>Product Type:</b></p></div>
           <div class="col-6"><p>Service/Booking/Course/Webinar/Solution</p></div>
       </div> 
       <div class="row">
           <div class="col-6"><p><b>Payment Status:</b></p></div>
           <div class="col-6"><p></p></div>
       </div> 
       <div class="row">
           <div class="col-6"><p><b>Order Status:</b></p></div>
           <div class="col-6"><p></p></div>
       </div> 
       <div class="row">
           <div class="col-6"><p><b>Discount:</b></p></div>
           <div class="col-6"><p>$9.99</p></div>
       </div>   
       <div class="row">
           <div class="col-6"><p><b>Total:</b></p></div>
           <div class="col-6"><p>$80.9</p></div>
       </div>   
       <div style="color:grey; display:flex;">
           <div class="order-history">
               <p>Order History</p>
               <p>Initial Deadline:08/07/2022</p>
               <p>Revised Deadline:10/11/2022, 1/12/2022</p>
               <p>Revised</p>
               <p>Accepted</p>
               <p>Rejected</p>
               <p>In Progress</p>
               <p>Extension Request</p>
               <p>Extension Approved</p>
               <p>Completed</p>
               <p>In Mediation</p>
               <p>Refund Requested</p>
               <p>Refund Assessment</p>
               <p>Refund Approval</p>
               <p>Refund Paid</p>
           </div>
           <div class="payment-history">
               <p>Payment History</p>
               <p>Payment Mode: Card/Bank Transfer</p>
               <p>Client Paid</p>
               <p>Client Failed</p>
               <p>Advance Paid</p>
               <p>Disbursement Requested</p>
               <p>Disbursement Paid</p>
               <p>Fully Paid</p>
               <p>Mediated Dsicount</p>
               <p>Refund Paid</p>
               <p>Messaging History</p>
               <p>10/12/2921 12:00</p>
               <p>10/12/2921 12:00</p>
               <p>10/12/2921 12:00</p>
               
           </div>
       </div>
   </div>
   <!---order_detail-->
</div>
<style>
    .order-detail{
        padding-top:20px;
    }
    mark{
        background-color:yellow;
    }
</style>



















