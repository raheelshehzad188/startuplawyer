<?php
function get_orders($status,$cat = 0, $rate=0)
{
    $CI =& get_instance();
    $CI->load->model('Common_model');
		$modal = $CI->Common_model;
		$modal->table = 'wp_woocommerce_order_items';
		$modal->key = 'order_item_id';
		$user_id = $_SESSION['knet_login']->data->ID;
		$all  = $modal->get(array());
		// print_r($all);	
			$payments = array();
		$user_id = $_SESSION['knet_login']->data->ID;
		foreach ($all as $key => $value) {
			$order_item_id = $value['order_item_id'];
			$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
			$modal->table = 'wp_posts';
		$modal->key = 'ID';
		$post  = $modal->getbyid($pid);
		$post_author = $post->post_author;
		if($user_id == $post_author)
		{
			$payments[] = array(
				'order_id'=> $value['order_id'],
				'order'=> $modal->getbyid($value['order_id']),
				'pid'=> $pid
			);
		}
		}
		if($rate)
		{
		    $rate = array();
		foreach($payments as $V)
		{
		    $order_id = $V['order_id'];
		    $args = array(
              'numberposts' => -1,
              'post_type'   => 'rating'
            );
             
            $latest_books = get_posts( $args );
            foreach($latest_books as $rv)
            {
                $rid = $rv->ID;
                if(get_post_meta($rid,'order',true) == $order_id)
                {
                    $rate[] = $rid;
                }
                
            }
            return count($rate);
		}
		}
		$c = 0;
		if($cat)
		{
		    $arr = array();
		    foreach($payments as $v)
    		{
    		    if($v['order']->post_status == $status)
    		    {
    		        $pid = $v['pid'];
    		        $term_list = wp_get_post_terms($pid,'product_cat',array('fields'=>'ids'));
                    if(in_array($cat,$term_list))
                    {
                        $arr[] = $v;
                    }
    		    }
    		}
    		$payments = $arr;
		}
		foreach($payments as $v)
		{
		    if($v['order']->post_status == $status)
		    {
		        $c++;
		    }
		}
		return $c;
}
?>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="card-title">Revenue</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <div id="line-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card" style="
    visibility: hidden;
">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">Goal Overview</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-overview-chart" class="mt-75"></div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Completed</p>
                                                <p class="font-large-1 text-bold-700">786,617</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">In Progress</p>
                                                <p class="font-large-1 text-bold-700">13,561</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= base_url('admin/products/all'); ?>?sort=sale">
                                <div class="card" style="background: #e64e3d;height: 160px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;">Top Sold</h2>
                                    <p class="mb-0" style="color: white;">Click To view top sold</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= base_url('admin/admin/myorder'); ?>?status=wc-recived">
                            <div class="card" style="background: #26b062;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-recived'); ?></h2>
                                    <p class="mb-0" style="color: white;">New Orders</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= base_url('admin/admin/myorder'); ?>?status=wc-recived&cat=16">
                            <div class="card" style="background: #3698db;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-recived' ,16); ?></h2>
                                    <p class="mb-0" style="color: white;">New Booking</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card" style="background: #354b61;height: 160px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>
                                    <p class="mb-0" style="color: white;">Request for Refunding</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= base_url('admin/products/all'); ?>?sort=post_modified">
                            <div class="card" style="background: #e64e3d;height: 160px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>
                                    <p class="mb-0" style="color: white;">Recent Offerings</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= base_url('admin/admin/myorder'); ?>?status=wc-processing">
                            <div class="card" style="background: #26b062;position: relative;top: -73px;"">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-open'); ?></h2>
                                    <p class="mb-0" style="color: white;">Active Offers</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?= base_url('admin/admin/myorder'); ?>?status=wc-processing">
                            <div class="card" style="background: #26b062;position: relative;top: -73px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-open',16); ?></h2>
                                    <p class="mb-0" style="color: white;">Active Bookings</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?= base_url('admin/admin/rating'); ?>">
                            <div class="card" style="background: #354b61;height: 160px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-completed',0, 1) ?></h2>
                                    <p class="mb-0" style="color: white;">Recent Rating & Testmonial</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                    </div>
                    
                    <div class="row" style="height:0;">
                        <div class="col-lg-3 col-sm-6 col-12">
                            
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                        <a href="<?= base_url('admin/admin/myorder'); ?>?status=wc-completed">
                           <div class="card" style="background: #26b062;position: relative;top: -143px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-completed'); ?></h2>
                                    <p class="mb-0" style="color: white;">Recent Closed Offers</p>
                                </div>
                            </div> 
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <a href="<?= base_url('admin/admin/myorder'); ?>?status=wc-completed&cat=16">
                            <div class="card" style="background: #26b062;position: relative;top: -143px;">
                                <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">
                                    <h2 class="text-bold-900 mt-1" style="color: white;"><?= get_orders('wc-completed',16); ?></h2>
                                    <p class="mb-0" style="color: white;">Recent Closed Bookings</p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            
                        </div>
                        
                    </div>
                    
                    
                    <!--<div class="grid-container">-->
                      
                    <!--    <div class="card" style="background: #e64e3d;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">Top Sold</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #26b062;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">New Orders</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #3698db;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">New Booking</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #354b61;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">Request for Refunding</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #e64e3d;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">Recenat Offerings</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #26b062;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">Active Offers</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #3698db;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">Active Bookings</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="card" style="background: #354b61;">-->
                    <!--        <div class="card-header d-flex flex-column align-items-start" style="padding-bottom: 1.5rem;">-->
                    <!--            <h2 class="text-bold-900 mt-1" style="color: white;">155</h2>-->
                    <!--            <p class="mb-0" style="color: white;">Recent Rating & Testmonial</p>-->
                    <!--        </div>-->
                    <!--    </div>-->
                        
                    <!--</div>-->
                    
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        