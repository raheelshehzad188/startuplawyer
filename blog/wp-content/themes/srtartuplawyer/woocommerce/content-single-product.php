<?php
$product = wc_get_product( $pid );
/**

 * The template for displaying product content in the single-product.php template

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.

 *

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see     https://docs.woocommerce.com/document/template-structure/

 * @package WooCommerce/Templates

 * @version 3.6.0



defined( 'ABSPATH' ) || exit;



global $product;



/**

 * Hook: woocommerce_before_single_product.

 *

 * @hooked woocommerce_output_all_notices - 10

 */

add_action( 'woocommerce_before_single_product',   'Cusotm_wc_print_notices', 10 );

function Cusotm_wc_print_notices()

{

   $notices = WC()->session->get('wc_notices');

   var_dump($notices);

}



$url = get_assets_url();

if ( post_password_required() ) {

	echo get_the_password_form(); // WPCS: XSS ok.

	return;

}

?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>	

	<main>

		<?php



		?>

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

		                    <h1><?= get_the_title(); ?></h1>

		                    <ul class="tags d-none">

		                        <li><a href="#0">Pizza</a></li>

		                        <li><a href="#0">Italian Food</a></li>

		                        <li><a href="#0">Best Price</a></li>

		                    </ul>

		                </div>

		                <div class="rating d-none">

		                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>

		                </div>

		            </div>

		            <!-- /detail_page_head -->

		            



		          
		                <!---->

		                <?php

		                global $product;

$imgs = array();

$imgs[] = $post_thumbnail_id = $product->get_image_id();

foreach($imgs as $sing)

{

    ?>

    <div class="item">
					<div class="strip_info str-info">

						<small>
                        <?php
                        $terms = get_the_terms( $pid, 'product_cat' );
// $product = wc_get_product( $pid );
     $post = get_post( $pid );
$recent_author = get_user_by( 'ID',$post->post_author);
$dead_line = get_post_meta($pid,'dead_line',true);
$all_cat = $product->get_category_ids();
    	$terms = get_the_terms( $pid, 'product_cat' );

                                        echo $terms[0]->name.'<br>';
                        ?>
						</small>

						<?php
                                        if($terms[0]->term_id != 17)
                                        {
                                            ?>
                                            
							                <a  class="pname" style="float:right;background: #000;color: #fff;" href="<?= panel_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>">
							                <?= $recent_author->display_name; ?>
							                </a>
							            
							            <?php
                                        }
							            ?>


					</div>
		                    <a href="img/location_1.jpg" title="Photo title" data-effect="mfp-zoom-in"><img class="p-image" src="<?= wp_get_attachment_image_src($sing)[0] ?>" data-src="<?= wp_get_attachment_image_src($sing)[0] ?>" class="owl-lazy" alt=""></a>

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

		                                <p><?= get_the_content(); ?></p>

		                                

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
					
					<?= the_excerpt(); ?>
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

		                    <!-- /dropdown -->
                            <?php
                            $dead_line = get_post_meta(get_the_ID(),'dead_line',true);
                            ?>
                            <?php
                            if(!in_array(17,$all_cat))
                            {
                            ?>
		                    <div class="d-time">Delivery Time:<strong><?= $dead_line ?> days</strong></div>

		                    <?php
                            }

		                  
		            		do_action( 'woocommerce_single_product_summary' );


                    $product = wc_get_product( get_the_ID() );

		            ?>
		            <div class="sku_no" >SKU : <?= $product->get_sku(); ?></div>

		                    <div class="dropdown people" style="display:none;">

		                        <a href="#" data-toggle="dropdown">People <span id="selected_people"></span></a>

		                        <div class="dropdown-menu">

		                            <div class="dropdown-menu-content">

		                                <h4>How many people?</h4>

		                                <div class="radio_select">

		                                    <ul>

		                                        <li>

		                                            <input type="radio" id="people_1" name="people" value="1">

		                                            <label for="people_1">1<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="people_2" name="people" value="2">

		                                            <label for="people_2">2<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="people_3" name="people" value="3">

		                                            <label for="people_3">3<em>-40%</em></label>

		                                        </li>

		                                        <li>

		                                            <input type="radio" id="people_4" name="people" value="4">

		                                            <label for="people_4">4<em>-40%</em></label>

		                                        </li>

		                                    </ul>

		                                </div>

		                                <!-- /people_select -->

		                            </div>

		                        </div>

		                    </div>

		                    <!-- /dropdown -->

		                    <a href="#0" class="btn_1 full-width mb_5 d-none">Reserve Now</a>

		                    <a href="wishlist.html" class="btn_1 full-width outline wishlist d-none"><i class="icon_heart"></i> Add to wishlist</a>

		                </div>

		            </div>

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



<?php do_action( 'woocommerce_after_single_product' ); ?>

