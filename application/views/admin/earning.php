
<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash'); ?>
                        <table class="table data-list-view">
                            <thead style="border: 1px solid #0000000d;">
                                <tr class="earning-tab" style="background: white;">
                                    <th><input type="checkbox" class="vs-checkbox--input" value=""></th>
                                    <th>Order ID</th>
                                    <th>Date Ordered</th>
                                    <th>Intial Deadline</th>
                                    <th>updated Deadline</th>
                                    <th>Client Name</th>
                                    <th>Product Type</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Status</th>
                                    <th colspan="3">Order Status</th>
                                    <th style="background: #70bbda1f;">Tracking ID</th>
                                    <th style="background-color: #ffff0036;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                foreach ($data as $key => $value) {
                                    $options = array();
                                    
                                $order = new WC_Order( $value['order_id'] );
                                // die("Here");
                                if($order)
                                {
                                $status = $order->get_status();
                                
                                
                                if($status == 'recived')
                                {
                                    $options['accepted'] = 'Accepted';
                                    $options['rejected'] = 'Rejected';
                                }
                                elseif($status == 'accepted')
                                {
                                    $options['inprog'] = ' In Progress';
                                }
                                elseif($status == 'in-progress')
                                {
                                    $options['update_dedline'] = 'Update Dedline';
                                    $options['disbur_req'] = 'Disbursement Requested';
                                    $options['completed'] = 'Completed';
                                }
                                    $order = wc_get_order( $value['order_id']);
                                    $pid = $value['pid'];
                                    $price = get_post_meta($pid, '_price',true);
                                    $ddays = get_post_meta($pid, 'dead_line',true);
                                    $odate = date("Y-m-d", strtotime($order->get_date_created()));
                                    $date = $odate;
                                        $dline =  date('Y-m-d', strtotime($date. ' + '.$ddays.' days'));
                                    $up = $dline;
                                    if(get_post_meta($value['order_id'],'deadline',true))
                                    {
                                        $up = get_post_meta($value['order_id'],'deadline',true);
                                    }
                                    $cname = $order->get_billing_first_name().' '.$order->get_billing_last_name();

                                    $com = get_post_meta($pid, 'sp_commision',true);

                                    ?>
                                <tr role="row" class="odd" style="background: white;">
                                    <td class=""><input type="checkbox" class="vs-checkbox--input" value=""></td>
                                    <td style="color: #0000004f;"><a href=""><strong><?= $value['order_id'] ?></strong></a></td>
                                    <td>
                                        <?php
                                        echo $odate;  
                                        ?></td>
                                    <td>
                                        <?php
                                        echo $dline;
                                        ?></td>
                                    <td>
                                        <?php
                                        
                                        echo $up
                                        ?></td>
                                    <td>
                                        <?php
                                        echo $cname;
                                        ?></td>
                                    <td>
                                        <?php
                                        $term_list = wp_get_post_terms($pid,'product_cat',array('fields'=>'ids'));
                                        $cat_id = (int)$term_list[0];
                                            $term = get_term_by( 'id', $cat_id, 'product_cat' );

    echo $term->name;
                                        ?></td>
                                        
                                    <td>
                                        <?php
                                        $order = new WC_Order( $value['order_id'] );
                                        echo $payment_title = $order->get_payment_method_title();
                                        ?></td>
                                    <td>
                                        <?php
                                        $st = get_post_meta($value['order_id'], 'payment_status',true);
                                        echo $pstatuses[$st];
                                        ?></td>
                                    <td colspan="3"><span class="status status-<?= $order->get_status(); ?>"><?= ucfirst (wc_get_order_status_name($order->get_status())); ?></span></td>
                                    
                                    <td style="background-color: #70bbda1f;"><?= $value['order_id']; ?></td>
                                    <td style="background-color: #70bbda1f;">
                                    	<select onchange="order_modal('<?= $value['order_id'] ?>')" class="form-control order_modal" id="order_<?= $value['order_id'] ?>" data-toggle="modal" data-target="inlineForm">
                                            <option value=" " >Action</option>
                                            <?php
                                            foreach($options as $k => $v)
                                            {
                                                ?>
                                                <option value="<?= $k ?>" ><?= $v ?></option>
                                                <?php
                                            
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                                }//if not order
                                }
                                
                                ?>
                                <!-- <div class="link-panal">
                                    <ul>
                                        <li><a href="">Invoice</a></li>
                                        <li><a href="">Archive</a></li>
                                    </ul>
                                </div> -->
                            </tbody>
                        </table>
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
                        </div>
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->