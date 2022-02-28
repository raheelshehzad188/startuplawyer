
<section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
<div class="table-responsive">
    <?php $this->load->view('flash');?>
    <table class="table data-list-view">
        <thead>
		<tr>
			<td id="cb" class="manage-column column-cb check-column">
			<!--	<label class="screen-reader-text" for="cb-select-all-1">Select All</label>-->
				<input id="cb-select-all-1" type="checkbox">
			</td>
			<th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a href=""><span>Order ID</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="name" class="manage-column column-name">Date Ordered</th>
			<th scope="col" id="name" class="manage-column column-name">Initial Deadline</th>
			<th scope="col" id="name" class="manage-column column-name">Updated Deadline</th>
			<th scope="col" id="name" class="manage-column column-name">Service Provider ID</th>
			<th scope="col" id="name" class="manage-column column-name">Service Provider</th>
			<th scope="col" id="name" class="manage-column column-name">Client Name</th>
			<th scope="col" id="name" class="manage-column column-name">Product Type</th>
			<th scope="col" id="name" class="manage-column column-name">Payment Mode</th>
			<th scope="col" id="name" class="manage-column column-name">Payment Status</th>
			<th scope="col" id="name" class="manage-column column-name" width="100">Order Status</th>
			<th scope="col" id="name" class="manage-column column-name">Tracking ID</th>
			<th scope="col" id="name" class="manage-column column-name">Action</th>
		</tr>
	</thead>
	<tbody id="the-list" data-wp-lists="list:user">
		<?php
		$options = array();
		$pstatuses = payment_statuses();
foreach ($data as $key => $value) {
    $pid = $value['ID'];
    $value = new WC_Order( $value['ID'] );
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
		$post_author_id = get_post_field( 'post_author', $product_id );
		$recent_author = get_user_by( 'ID', $post_author_id );
		$author_display_name = (isset($recent_author->display_name)?$recent_author->display_name:'Guest');
		$customerName = get_post_meta($pid,'_billing_salutation',true).' '.get_post_meta($pid,'_billing_name',true);
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
    	$options = array();
		if($order->get_status() == 'on-hold')
		{
		    $options['process_order'] = 'Process Order';
		    $options['cancel'] = 'Cancel Order';
		}
		$st = get_post_meta($pid, 'payment_status',true);
		if($st == 'refund_approved')
		{
		    $options['refund_paid'] = 'Refund paid';
		}

			if($product_id && $order->get_status() != 'trash')
			{
		    	?>
				<tr id="user-1">
					<th scope="row" class="check-column">
						<label class="screen-reader-text" for="user_1"></label>
						<input type="checkbox" name="users[]" id="user_1" class="administrator" value="1">
					</th>
					<td class="name column-name" data-colname="Name">Order #<?= $pid; ?></td>
					<td class="name column-name" data-colname="Name"><?=$odate; ?></td>
					<td class="name column-name" data-colname="Name"><?php
					$date = $odate; 
                                        echo date('Y-m-d', strtotime($date. ' + '.$ddays.' days'));
					?></td>
					<td class="name column-name" data-colname="Name"><?php
					$date = $odate; 
                                        echo date('Y-m-d', strtotime($date. ' + '.$ddays.' days'));
					?></td>
					<td class="name column-name" data-colname="Name"><?php
					if($post_author_id)
					echo $post_author_id;
					?></td>
					<td class="name column-name" data-colname="Name"><?= $author_display_name; ?></td>
					<td class="name column-name" data-colname="Name"><?= $customerName; ?></td>
					<td class="name column-name" data-colname="Name"><?= $cat; ?></td>
					<td class="name column-name" data-colname="Name"><?= $value->get_payment_method_title(); ?></td>
					<td class="name column-name" data-colname="Name"><?php
                                        echo (isset($pstatuses[$st])?$pstatuses[$st]:'Pending');
                                        ?></td>
					<td class="name column-name" data-colname="Name">
					    <span class="status status-<?= $order->get_status(); ?>"><?= ucfirst (wc_get_order_status_name($order->get_status())); ?></span>
					</td>
					<td class="name column-name" data-colname="Name"><?=$pid?></td>
					    	<td class="role column-role" data-colname="action">
				<select class="form-control" id="order_<?= $pid; ?>" onchange="order_modal('<?= $pid; ?>')">
                    <option>Select</option>
                    <?php
						      
						      foreach($options as $k=>$v)
						      {
						          ?>
						          <option value="<?= $k; ?>"><?= $v; ?></option>
						          <?php
						      }
						      ?>
                </select>
						<!--<div class="dropdown">
						  <button class="dropbtn">.....</button>
						  <div class="dropdown-content">
						      
						  </div>
						</div>-->
					</td>
					<!-- <td class="role column-role" data-colname="Roles">Action</td> -->
				</tr>
				<?php
			}
}
		?>
	</tbody>
<!--	<tfoot>
		<tr>
			<td class="manage-column column-cb check-column">
				<label class="screen-reader-text" for="cb-select-all-2">Select All</label>
				<input id="cb-select-all-2" type="checkbox">
			</td>
			<th scope="col" class="manage-column column-username column-primary sortable desc"><a href="http://startuplawyer.strokedev.ml/wp-admin/users.php?orderby=login&amp;order=asc"><span>Username</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" class="manage-column column-name">Name</th>
			<th scope="col" class="manage-column column-email sortable desc"><a href="http://startuplawyer.strokedev.ml/wp-admin/users.php?orderby=email&amp;order=asc"><span>Email</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" class="manage-column column-role">Roles</th>
		</tr>
	</tfoot>-->
</table>
</div>
</section>
<button type="button" id="modalBtn" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#inlineForm" style="visibility: hidden;">
                            Launch Modal
                        </button>
                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Please Wait </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <label>Email: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Email Address" class="form-control">
                                            </div>

                                            <label>Password: </label>
                                            <div class="form-group">
                                                <input type="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                </div>
                            </div>