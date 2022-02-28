
<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash');?>
                        <table class="table data-list-view">
                            <thead style="border: 1px solid #0000000d;">
                                <tr style="background: white;">
                                    <tr>
                            			<th scope="col" id="name" class="manage-column column-name">Date</th>
                            			<th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a href=""><span>Reference No.</span><span class="sorting-indicator"></span></a></th>
                            			<th scope="col" id="name" class="manage-column column-name">Order Value</th>
                            			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Deductions</span><span class="sorting-indicator"></span></a></th>
                            			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Earned</span><span class="sorting-indicator"></span></a></th>
                            			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Taken forward</span><span class="sorting-indicator"></span></a></th>
                            			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Paid</span><span class="sorting-indicator"></span></a></th>
                            			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Order No</span><span class="sorting-indicator"></span></a></th>
                            			<th scope="col" id="email" class="manage-column column-email sortable Narration"><a href=""><span>Narration</span><span class="sorting-indicator"></span></a></th>
                            		</tr>
                                </tr>
                            </thead>
                            <tbody>
                                   <?php
                                   $naration = array();
$naration['cpurchase'] = 'Client Purchase';
$naration['refund'] = 'Refund';
$naration['disbursement'] = 'Disbursement';
$naration['subscription'] = 'Subscription';
$naration['completion'] = 'Completion';
$naration['paid'] = 'Paid';
                                //   $data = array_reverse($data);
                                   foreach ($data as $key => $value) {
                                       $user = (object) $value;
                                       ?>
			<td><?= date("d-m-Y", strtotime($user->post_date)); ?></td>
			<td class="username column-username has-row-actions column-primary" data-colname="Username"><strong><?= esc_html( $user->post_title ) ?></strong>
			</td>
			<td class="name column-name" data-colname="Name"><?= get_post_meta($user->ID,'order_value',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'deduction',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'earned',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'taken_forward',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'paid',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'order_no',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= $naration[get_post_meta($user->ID,'narration',true)]; ?></td>
		</tr>
                                <?php
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
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->