
<?php
$msg = '';
if(isset($_REQUEST['print']))
{
    $tid = $_REQUEST['print'];
    $narration = get_post_meta($tid,'narration',true);
    $narration = get_post_meta($tid,'narration',true);
    
    $oder = get_post_meta($tid,'order_no',true);
    if($narration == 'pinvoice')
    {
        $order_id = '13504';
        $d = array(
            'down'=> 1
            );
    echo send_email($oder,2,' ','',$d);
    die();
    exit();
    }
    
}
else if(isset($_REQUEST['resend']))
{
    $tid = $_REQUEST['resend'];
    $narration = get_post_meta($tid,'narration',true);
    $narration = get_post_meta($tid,'narration',true);
    
    $oder = get_post_meta($tid,'order_no',true);
    if($narration == 'pinvoice')
    {
        $$order_id = '13504';
        $d = array(
            // 'down'=> 1
            );
            $msg = 'Email resend successfully!';
    send_email($oder,2,' ','',$d);
    }
    
}
else
{
$arr = array();
$args = array(
    'post_type'=> 'transection',
);              
$uid = get_current_user_id();
$the_query = new WP_Query( $args );
// echo "8<br>";
// var_dump($the_query->posts);
foreach($the_query->posts as $k=> $v)
{
    $tid = $v->ID;
    $oder = get_post_meta($tid,'order_no',true);
    $narration = get_post_meta($tid,'narration',true);
if ( get_post_status ( $oder ) ) 
    {
    $order = wc_get_order( $oder );
    // var_dump($order);
$customer_id = $order->get_user()->ID; // Or $order->get_user_id();
if($customer_id == $uid && ($narration == 'pinvoice' || $narration == 'cancel_invoice' || $narration == 'cpurchase'|| $narration == 'refunded'))
{
    //echo $customer_id.' == '.$uid.'<br>';
    $arr[] = $tid;
}
}

}
if($msg)
{
    ?>
    <div class="alert alert-success">><?= $msg; ?></div>
    <?php
}
?>

<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
   <thead>
      <tr>
         <!--<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Order</span></th>-->
         <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Date </span></th>
         <th class="woocommerce-orders-table__header woocommerce-orders-table__header-pro_name"><span class="nobr">item</span></th>
         <!--<th class="woocommerce-orders-table__header woocommerce-orders-table__header-sp_name"><span class="nobr">Order Status</span></th>-->
         <th class="woocommerce-orders-table__header woocommerce-orders-table__header-deadline"><span class="nobr"> Total</span></th>
         <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">View/Resend</span></th>

      </tr>
   </thead>
   <tbody>
       <?php
       foreach($arr as $k=> $v)
       {
           $order = wc_get_order( get_post_meta($v,'order_no',true) );

           ?>
           <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-completed order">
         <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date ">
            <time datetime="2021-02-04T19:51:53+00:00"><?= get_the_time('F d,Y', $v) ?></time>
         </td>
         <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-pro_name" data-title="Product ">
            <?php 
            if(get_post_meta($v,'narration',true) == 'pinvoice')
            {
                echo "Invoice#".get_post_meta($v,'order_no',true);
            }
            elseif(get_post_meta($v,'narration',true) == 'cancel_invoice')
            {
                echo "Invoice Cancellation#".get_post_meta($v,'order_no',true);
            }
            elseif(get_post_meta($v,'narration',true) == 'cpurchase')
            {
                echo "Payment slip#".get_post_meta($v,'order_no',true);
            }
            elseif(get_post_meta($v,'narration',true) == 'refunded')
            {
                echo "Refund slip#".get_post_meta($v,'order_no',true);
            }
            ?>
         </td>
         <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-deadline" data-title=" Deadline">
            <strong> <?= get_post_meta($v,'price',true) ?></strong>
         </td>
         <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
          <!--  Completed-->
          <a onclick="ajax_url('<?= panel_url('/api/ajax_request?print_email='.$v); ?>','email_print');"><i class="fa fa-eye" aria-hidden="true"></i></a>
          
          <a onclick="ajax_url('<?= panel_url('/api/ajax_request?email_resend='.$v); ?>','email_resend');"><i class="fa fa-repeat" aria-hidden="true"></i></a>

         </td>
      </tr>
           <?php
       }
       ?>
   </tbody>
</table>
<?php
}
?>
