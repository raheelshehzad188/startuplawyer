<?php
$pro = $product->getproduct($product_id);
$category = $product->getcat($pro->catID);
?>
<div id="product-<?php $pro->id; ?>">	

	<main>
		<div class="container margin_detail" style="margin-top: 86px;">

		    <div class="row">

		        <div class="col-lg-5">

		            <div class="detail_page_head clearfix">

		                <div class="breadcrumbs d-none">

		                    <ul>

		                        <li><a href="#">Home</a></li>

		                        <li><a href="#">Category</a></li>

		                        <li>Page active</li>

		                    </ul>

		                </div>

		                <div class="title">

		                    <h1><?= $pro->name; ?></h1> 

		                </div>

		            </div>

		            <!-- /detail_page_head -->

		            



		          
		                <!---->

		                <?php

$imgs[] = $pro->img;

foreach($imgs as $sing)

{

    ?>

    <div class="item">
					<div class="strip_info str-info">

						<small>
                        <?php
     $post = $pro;
$recent_author = $product->getuser($post->uid);
$dead_line = $pro->  dead_line;

                                        echo $category->name.'<br>';
                        ?>
						</small>

						<?php
                                        if($category->id != 3)
                                        {
                                            ?>
                                            
							                <a  class="pname" style="float:right;background: #000;color: #fff;" href="<?= base_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>">
							                <?= $recent_author->display_name; ?>
							                </a>
							            
							            <?php
                                        }
							            ?>


					</div>
		                    <a href="img/location_1.jpg" title="Photo title" data-effect="mfp-zoom-in"><img class="p-image" src="<?= $pro->img; ?>" data-src="<?= $pro->img; ?>" class="owl-lazy" alt=""></a>

		                </div>
					
    <?php

}

?>


		            <!-- /carousel -->



		            <div class="tabs_detail">

		                <ul class="nav nav-tabs" role="tablist">

		                    <li class="nav-item">

		                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Information</a>

		                    </li>

		                    <li class="nav-item d-none">

		                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>

		                    </li>

		                </ul>



		                <div class="tab-content" role="tablist">

		                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">

		                        <div class="card-header" role="tab" id="heading-A">

		                            <h5>

		                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true" aria-controls="collapse-A">

		                                    Information

		                                </a>

		                            </h5>

		                        </div>

		                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">

		                            <div class="card-body info_content" style="padding-top:20px;">

		                                <p><?= $pro->post_content; ?></p>

		                                

		                            </div>

		                        </div>

		                    </div>

		                    <!-- /tab -->

		                </div>

		                <!-- /tab-content -->

		            </div>

		            <!-- /tabs_detail -->

		        </div>

		        <!-- /col -->

				<div class="col-lg-3 s-des" >
					
					<?= $pro->short_disc; ?>
				</div>

		        <div class="col-lg-4" id="sidebar_fixed">

		            

		            <div class="box_booking">

		                <div class="head d-none">

		                    <h3>Book your table</h3>

		                    <div class="offer">Up to -40% off</div>

		                </div>

		                <!-- /head -->

		                <div class="main">

		                    <input type="text" id="datepicker_field" style="display:none;">

		                    <div class="dropdown time" style="display:none;">

		                        <a href="#" data-toggle="dropdown">Hour <span id="selected_time"></span></a>

		                        <div class="dropdown-menu">

		                            <div class="dropdown-menu-content">

		                                <h4>Lunch</h4>

		                                <div class="radio_select add_bottom_15">

		                                    <ul>

		                                        <li>

		                                            <input type="radio" id="time_1" name="time" value="12.00am">

		                                            <label for="time_1">12.00<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="time_2" name="time" value="08.30pm">

		                                            <label for="time_2">12.30<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="time_3" name="time" value="09.00pm">

		                                            <label for="time_3">1.00<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="time_4" name="time" value="09.30pm">

		                                            <label for="time_4">1.30<em>-40%</em></label>

		                                        </li>

		                                    </ul>

		                                </div>

		                                <!-- /time_select -->

		                                <h4>Dinner</h4>

		                                <div class="radio_select">

		                                    <ul>

		                                        <li>

		                                            <input type="radio" id="time_5" name="time" value="08.00pm">

		                                            <label for="time_1">20.00<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="time_6" name="time" value="08.30pm">

		                                            <label for="time_2">20.30<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="time_7" name="time" value="09.00pm">

		                                            <label for="time_3">21.00<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="time_8" name="time" value="09.30pm">

		                                            <label for="time_4">21.30<em>-40%</em></label>

		                                        </li>

		                                    </ul>

		                                </div>

		                                <!-- /time_select -->

		                                

		                            </div>

		                            

		                        </div>

		                        

		                    </div>
                            <?php
                            $dead_line =   $pro->dead_line;
                            ?>
                            <?php
                            if($category->id != 3)
                            {
                            ?>
		                    <div class="d-time">Delivery Time:<strong><?= $dead_line ?> days</strong></div>

		                    <?php
                            }
		            		?>
		            		<form id="custom_cart" action="<?= base_url('wp-ajax'); ?>?action=add_cart" method="post" >
		            		    <input type="hidden" name="product_id" value="<?= $pro->id ?>" />
		            		<?php
		            		 $product->output_add_to_cart_custom_fields($pro->id);
		            		?>
		            		<input type="number" value="1" name="qty" />
		            		<button type="button" onclick="submit_form('custom_cart');" class="btn_1 full-width mb_5">Add to Cart</button>
		            		</form>
		            <div class="sku_no" >SKU : <?= $pro->sku; ?></div>

		            <!-- /box_booking -->

		            <ul class="share-buttons">

		                <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>

		                

		                <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
		                <li><a class="twitter-share" href="#0"><i class="social_linkedin"></i> Share</a></li>
		                <li><a class="twitter-share" href="#0"><i class="fa fa-whatsapp"></i> Share</a></li>
		                <li><a class="twitter-share" href="#0"><i class="fa fa-envelope"></i> Share</a></li>

		            </ul>

		        </div>



		    </div>

		    <!-- /row -->

		</div>

		<!-- /container -->

		

	</main>

	<!-- /main -->

</div>