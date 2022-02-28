<?php
$pstatuses = array();
                                $pstatuses['client_paid'] = 'Client Paid';
                                $pstatuses['client_failed'] = 'Client Failed';
                                $pstatuses['fully_paid'] = 'Fully Paid';
                                $pstatuses['advance_paid'] = 'Fully Paid';
                                $pstatuses['disbursement_requested'] = 'Disbursement Requested';
                                $pstatuses['disbursement_paid'] = 'Disbursement Paid';
                                $pstatuses['paid'] = 'Paid';
				$pstatuses['refund_approved'] = 'Refund Approved';
function order_action($order)
{
    $options = array();
    $options['client_view'] = 'View';
    $options['client_request_mediation'] = 'REQUEST Mediation';
    $options['client_approve_extension'] = 'Approve Extension';
    // var_dump($order->ID);
    if($order->status)
    {
        
    }
    return $options;
}
function order_colum()
{
    $arr = array();
    $arr['order-number'] = 'Order ID';
    $arr['order-date'] = 'Date Ordered';
    $arr['intial_deadline'] = 'Intial Deadline';
    $arr['updated_deadline'] = 'Updated Deadline';
     $arr['sp_name'] = 'SP name';
    $arr['pro_type'] = 'Product Type';
    $arr['pay_mode'] = 'Payment Mode';
    $arr['pay_status'] = 'Payment Status';
    $arr['order_status'] = 'Order  Status';
   
    
    $arr['tracking_id'] = ' Tracking ID';
    $arr['order-actions'] = 'Action';
    return $arr;
}
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */
$arr = array();
global $wpdb;

$result = $wpdb->get_results ( "
    SELECT * 
    FROM  $wpdb->posts
        WHERE post_type = 'shop_order'
" );
echo $uid = get_current_user_id();
// echo "8<br>";
foreach($result as $k=> $v)
{
    $tid = $v->ID;
if ( get_post_status ( $tid ) ) 
    {
    $order = wc_get_order( $tid );
    // var_dump($order);
$customer_id = get_post_meta($tid,'_customer_user',true); // Or $order->get_user_id();
if($customer_id == $uid)
{
    //echo $customer_id.' == '.$uid.'<br>';
    $arr[] = $tid;
}
}

}
defined( 'ABSPATH' ) || exit;

 ?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        ...
      </div>
      
    </div>
  </div>
</div>
<?php if ( $arr ) : ?>

	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( order_colum() as $column_id => $column_name ) : ?>
					<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php
			foreach ( $arr as $customer_order ) {
				$order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
				$order = wc_get_order( $order->get_order_number());
                $items = $order->get_items();

				$pid = 0;
            	foreach ( $items as $item ) {
                    $pid = $item->get_product_id();
                    $product_variation_id = $item->get_variation_id();
                }
				?>
				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
					<?php foreach ( order_colum() as $column_id => $column_name ) : ?>
					    
					        <?php
					        $pid = $order->get_order_number();
    $value = new WC_Order( $order->get_order_number() );
    	$order = new WC_Order( $pid );
    	$ddays = 0;
    	$odate = date("Y-m-d", strtotime($order->get_date_created()));
    	$method = get_post_meta( $pid, '_payment_method', true );
    	$items = $value->get_items();
    	$product_id = 0;
    	$i= 0;
    	foreach ( $items as $k=> $item ) {
    		if($i == 0)
    		{
			    $product_name = $item->get_name();
			    $product_id = $item->get_product_id();
			    $product_variation_id = $item->get_variation_id();
			}
			if($product_id)
			{
				$i++;
			}
		}
		$ddays = get_post_meta($product_id, 'dead_line',true);
		$post_author_id = order_to_provider($order->get_order_number());
		$recent_author = get_user_by( 'ID', $post_author_id );
		$author_display_name = (isset($recent_author->display_name)?$recent_author->display_name:'Guest');
		$customerName = $value->get_billing_first_name().' '.$value->get_billing_last_name();
		$cat = '';
		if($product_id)
		{
			$term_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
			$cat = $cat_id = (int)$term_list[0];
			if( $term = get_term_by( 'id', $cat, 'product_cat' ) ){
			    $cat =  $term->name;
			}

		}
		$options = array();
		$options['refund_assessment'] =  'Refund Assessment';
    	$options['refund approved'] ='Refund Approval';
    	$options['refund_paid'] = 'Refund Paid';
    	$options['mediation'] = ' In Mediation';
		if($order->get_status() == 'on-hold')
		{
		    $options['process_order'] = 'Process Order';
		}
					        $odate = date("Y-m-d", strtotime($order->get_date_created()));
					    if($column_id == 'order-number')
					    {
					        ?><td><?php
					        echo $order->get_order_number();
					        ?></td><?php
					    }
					    if($column_id == 'order-date')
					    {
					        ?><td><?php
					        echo $odate;
					        ?></td><?php
					    }
					    if($column_id == 'intial_deadline')
					    {
					        ?><td><?php
					$date = $odate; 
                                        echo date('Y-m-d', strtotime($date. ' + '.$ddays.' days'));
					?></td><?php
					    }if($column_id == 'updated_deadline')
					    {
					        ?><td><?php
					$date = $odate; 
                                        echo date('Y-m-d', strtotime($date. ' + '.$ddays.' days'));
					?></td><?php
					    }
					    if($column_id == 'sp_name')
					    {
					        ?><td><?php
					echo $author_display_name;
					?></td><?php
					    }
					    if($column_id == 'pro_type')
					    {
					        ?><td><?php
					echo $cat;
					?></td><?php
					    }if($column_id == 'pay_mode')
					    {
					        ?><td><?php
					echo $value->get_payment_method_title()
					?></td><?php
					    }if($column_id == 'pay_status')
					    {
					        ?><td><span class="status status-<?= $order->get_status(); ?>"><?= ucfirst (wc_get_order_status_name($order->get_status())); ?></span></td><?php
					    }if($column_id == 'order_status')
					    {
					        ?><td><?php
                                        $st = get_post_meta($pid, 'payment_status',true);
                                        echo (isset($pstatuses[$st])?$pstatuses[$st]:'Pending Payment');
                                        ?></td><?php
					    }
					    if($column_id == 'tracking_id')
					    {
					        ?><td><?php
                                        echo $pid;
                                        ?></td><?php
					    }
					    if($column_id == 'order-actions')
					    {
					        $options = array();
		$options['client_view'] =  'View';
		if($order->get_status() == 'on-hold')
		{
		    $options['client_canel'] = 'cancel';
		}
		elseif($order->get_status() == 'recived')
		{
		    $options['refund_request'] = 'Refund Request';
		}
					        ?><td>
					        <select class="form-control" id="order_<?= $pid; ?>" onchange="update_order('<?= $pid; ?>')">
                    <option value="">Select</option>
                    <?php
						      
						      foreach($options as $k=>$v)
						      {
						          ?>
						          <option value="<?= $k; ?>"><?= $v; ?></option>
						          <?php
						      }
						      ?>
                </select></td><?php
					    }
					    ?>
					<?php endforeach; ?>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Browse products', 'woocommerce' ); ?>
		</a>
		<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
<!-- Button trigger modal -->



<script>
$(document).ready(function () {
	$( "#order_<?= $order->get_order_number(); ?>" ).change(function() {
	  $('#exampleModalCenter').modal('show')
	});
});
function show_loader(){
            var html = '<img src="<?= site_url(); ?>/wp-content/themes/srtartuplawyer/assets//img/load.gif" style="width: 48px;margin-left: 204px;" />';
                $('.modal-body').html(html);
        }
function update_order(oid)
{
    var mid = '#order_'+oid;
        if($(mid).val() != ' ')
        {
            $('#exampleModalCenter').modal('show');
            var url = '<?= panel_url(); ?>'+'/api/order_modal';
              $.ajax({
                url: url,
                data: {
                order_id: oid,
                action: $(mid).val()
              },
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    $(mid).val('');
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
}

        function modal_response(data)
        {
            var obj = JSON.parse(data);
            if(obj['html'])
            {
                $('.modal-body').html(obj['html']);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
</script>