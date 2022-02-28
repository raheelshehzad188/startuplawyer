<?php
function get_order_rate($oid)
{
    $args = array(
    'meta_key' => 'order',
    'meta_value' => $oid,
    'post_type' => 'rating',
    'post_status' => 'any',
    'posts_per_page' => -1
);
$posts = get_posts($args);
if(isset($posts[0]))
return $posts[0]->ID;
else
return 0;
}
	 $customer = wp_get_current_user();
// Get all customer orders
    $customer_orders = get_posts(array(
        'numberposts' => -1,
        'meta_key' => '_customer_user',
        'orderby' => 'date',
        'order' => 'DESC',
        'meta_value' => get_current_user_id(),
        'post_type' => wc_get_order_types(),
        'post_status' => array_keys(wc_get_order_statuses()), 'post_status' => array('wc-completed'),
    ));

    $Order_Array = []; //
    $items = []; //
    foreach ($customer_orders as $customer_order) {
        $orderq = wc_get_order($customer_order);
        foreach ($orderq->get_items() as $item_key => $item )
        {
        	$post_author_id = get_post_field( 'post_author', $item->get_product_id() );

        	$items[] = array(
        		'pid'=>$item->get_product_id(),
        		'order'=>$orderq->get_id(),
        		'author'=>$post_author_id,
        	);
        }

    }
    
?>
<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Order</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Product</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Service provider</span></th>
									<th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">Rate</span></th>
							</tr>
		</thead>

		<tbody>
			<?php
			foreach ($items as $key => $value) {
			    $rate = get_order_rate($value['order']);
				?>
<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
															<a href="http://localhost/wordpress/my-account/view-order/1200/">
									#<?= $value['order'] ?>								</a>

													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
															<time datetime="2020-08-13T18:19:20+00:00">
																<?= get_the_title($value['pid']); ?>
															</time>

													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">
															<?php
															 $user = get_user_by( 'id', $value['author'] );
															 echo $user->display_name;
															  ?>
													</td>
											<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
											    <?php
											    if($rate)
											    {
											        ?>
											        		<a class="woocommerce-button button view" onclick="view_rate('<?= get_post_meta($rate,'rate',true) ?>','<?= get_post_meta($rate,'msg',true) ?>')">View Feed Back</a>
											        <?php
											    }
											    else
											    {
											        ?>
											        		<a class="woocommerce-button button view" onclick="order_rate('<?= $value['order'] ?>')">Rate</a>
											        <?php
											    }
											    ?>
																										</td>
									</tr>
								
				<?php
			}
			
			?>
						</tbody>
	</table>