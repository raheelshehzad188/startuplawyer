
<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash');?>
                        <table class="table data-list-view">
                            <thead style="border: 1px solid #0000000d;">
                                <tr class="earning-tab" style="background: white;">
                                    <th><input type="checkbox" class="vs-checkbox--input" value=""></th>
                                    <th>Order ID</th>
                                    <th>User</th>
                                    <th>Date & Time</th>
                                    <th>Review</th>
                                    <th style="background: #70bbda1f;">Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                    $order = get_post( $value);
                                    $author = $order->post_author;
                                    $recent_author = get_user_by( 'ID', $author );
// Get user display name
$author_display_name = $recent_author->display_name;

                                    ?>
                                <tr role="row" class="odd" style="background: white;">
                                    <td class=""><input type="checkbox" class="vs-checkbox--input" value=""></td>
                                    <td style="color: #0000004f;"><a href=""><strong><?= get_post_meta($value,'order',true) ?></strong></a></td>
                                    <td><?= $author_display_name; ?></td>
                                    <td>
                                        <?php
                                        echo date("d/m/Y H:i A", strtotime($order->post_date));  
                                        ?></td>
                                    </td>
                                    <td><?= get_post_meta($value,'msg',true) ?></td>
                                    <td style="background-color: #70bbda1f;"><?= get_post_meta($value,'rate',true) ?></td>
                                    
                                    }
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