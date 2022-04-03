<?php
$user = array();
if(isset($_SESSION['knet_login']))
{
    $uid = $_SESSION['knet_login']->ID;
    // $modal->table ='orders';
    $user = $product->getuser($uid);
}
// var_dump($user);
?>
<div class="panel">
 <div class="dashboard">
     <p>Hello <b><?= (isset($user->full_name)?$user->full_name:"") ?></b> (not <b><?= (isset($user->full_name)?$user->full_name:"") ?></b>)? <a href="<?= base_url('auth/logout'); ?>">Logout</a> </p>
     <p>From your account you can check the status of your <a href="#"> orders</a>, raise<a href="#"> disputes </a>to obtain refunds or request mediation, check all your payment <a href="#">bills</a> and refund slips, submit  <a href="#">reviews</a>, as well as edit your password and  <a href="#">account details</a>.</p>
     <div style="font-size:15px;">
         <div class="a"><i class="fas fa-signal"></i> <a href="#">LKR 25,00,000</a><BR><b>Net purchases this month</b></div>
         <div class="a"><i class="fal fa-cog"></i> <a href="#">Employment issues during COVID and how to handle them</a><BR><b>Orders in progress</b></div>
         <div class="row row1">
         <div class="col-6" style="border-right: 1px solid #ededed;"><i class="far fa-ellipsis-h"></i> <a href="#">0 orders</a><BR><b>Completed</b></div>
         <div class="col-6"><i class="fal fa-minus-circle"></i> <a href="#">0 orders</a><BR><b>Advance payment required</b></div>
         </div>
         <div class="row row1" style="margin-bottom:60px">
         <div class="col-6" style="border-right: 1px solid #ededed;"><i class="fal fa-exclamation-circle"></i> <a href="#">0 products</a><BR><b>Deadline extension requested</b></div>
         <div class="col-6"> <i class="fal fa-times-circle"></i><a href="#">0 products</a><BR><b>Refunded</b></div>
         </div>
         
     </div>
 </div>
</div>
<style>
    .fa-signal{
        font-size:16px;
    }
    .fa-cog{
        font-size:20px;
    }
    .fa-ellipsis-h{
            border: 1px solid green;
    border-radius: 25px;
    padding: 3px 4px;
    color: white;
    font-weight: 700;
    background-color: green;
    }
    .fa-minus-circle{
        color:grey;
        font-weight: 700;
        font-size: 20px;
    }
    .fa-exclamation-circle{
        color:#ffdb58;
        font-weight: 700;
        font-size: 20px;
    }
    .fa-times-circle{
        color:red;
        font-weight: 700;
        font-size: 20px;
    }
    .col-6,.a{
        border-bottom: 1px solid #ededed;
        padding: 20px 0 5px 16px;
    }
    .row1,.a{
        width:60%;
        margin:0;
    }
    
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .row1,.a{
        width:100%;
        margin:0;
    }
}

</style>