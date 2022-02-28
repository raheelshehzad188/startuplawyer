 <?php
$url = base_url('assets/design/orignal/');
$pro = $product->getProduct($product_id);
$category = $product->getcat($pro->catID);
//get tags 
$modal->table = 'product_to_tags';
$tags = $modal->get(array('pid'=>$product_id));
//pakage products
$modal->table = 'product_to_packages';
$pack_pros = $modal->get(array('pid'=>$product_id));
?>
<style>
.panel-body{
    text-align: justify;
}
        .imgs_detail img {
            width:100% !important;
        }
        panel-default>.panel-heading {
  color: #333;
  background-color: #fff;
  border-color: #e4e5e7;
  padding: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
/*#collapse-A{*/
/*    display:block !important;*/
/*}*/

.panel-default>.panel-heading a {
  display: block;
  padding: 10px 15px;
}
.hide{
    display:none;
}
.show{
    display:block;
}

.panel-default>.panel-heading a:after {
  content: "";
  position: relative;
  top: 1px;
  display: inline-block;
  font-family: 'Glyphicons Halflings';
  font-style: normal;
  font-weight: 400;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  float: right;
  transition: transform .25s linear;
  -webkit-transition: -webkit-transform .25s linear;
}

.panel-default>.panel-heading a[aria-expanded="true"] {
  background-color: #eee;
}

.panel-default>.panel-heading a:after {
  content: "\2212";
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}

.panel-default>.panel-heading a[aria-expanded="false"]:after {
  content: "\002b";
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}
a.btn_1.outline, .btn_1.outline{
    border:2px solid #172F61 !important;
}
a.btn_1.outline:hover{
    color:#172F61 !important;
}
.number{
    width:100%;
    height: 40px;
    margin:10px 0;
    text-align: center;
}
#pane-A, #pane-B{
    Margin:0px!important;
        background-color: transparent !important;

}
.fab, .fas, .far{
     font-size:18px;
     padding-right:10px;
}
.sec{
    background-color:#f2f1f0;
    margin:2px;
    padding:20px;
}
.btn-outline-danger{

    border:1px solid red;
    color:red;
}
.here{
    display:none;
}
@media only screen and (max-width: 600px){
    .mob{
        padding-top:20px;
    }
    .here{
        display:block;
    }
}


</style>
<main>
		
		<div class="container margin_detail">
		    <div class="row">
		        <div class="col-lg-8">
		            <div class="detail_page_head clearfix">
		                <div class="breadcrumbs">
		                    <ul>
		                        <?php
		                        if(isset($breed))
		                        {
		                            foreach($breed as $name => $url)
		                            {
		                                if($url)
		                                {
		                                ?>
		                                <li><a href="<?= $url; ?>"><?= $name; ?></a></li>
		                                <?php
		                                }
		                                else
		                                {
		                                    ?>
		                                    <li><?= $name; ?></li>
		                                    <?php
		                                }
		                            }
		                        }
		                        ?>
		                    </ul>
		                </div>
		                <div class="title">
		                    <h1><?= $pro->name ?></h1>
		                    
		                    
		                    <?php
		                    $recent_author = $product->getuser($pro->uid);
		                    ?>
		                    <?php
		                    foreach($pack_pros as $k=> $v)
		                    {
		                        $pro1 = $product->getproduct( $v['tid'] );
$terms = array();
 $recent_author1 = $product->getuser($pro1->uid);
		                        ?>
		                        <?=  $recent_author->distric; ?> <a href="<?= base_url('/index/profile'); ?>/<?= $recent_author1->user_login; ?>" target="blank"><?=  $recent_author1->full_name; ?></a>,
		                        <?php    
		                    }
		                    ?>
		                     <?=  $recent_author->distric; ?> <a href="<?= base_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>" target="blank">Contact</a>
		                    <ul class="tags">
		                        <?php
		                        foreach($tags as $k=> $v)
		                        {
		                            $post = $product->getpost($v['tid']);
		                            ?>
		                            <li><a href="#0"><?= $post->post_title; ?></a></li>
		                            <?php
		                        }
		                        ?>
		                    </ul>
		                </div>
		                <div class="rating">
		                    <div class="score"><span>Superb<em><?= $pro->rate_count; ?> Reviews</em></span><strong><?= $pro->rate; ?></strong></div>
		                </div>
		            </div> 
		            <!-- /detail_page_head -->

		            <div class="imgs_detail col-md-12 col-sm-12">
		                <div class="item" style="background:url('<?= $pro->img ?>'); height:500px; width:100%;background-size:cover;">
		                    <a href="<?= $pro->img ?>" title="Photo title" data-effect="mfp-zoom-in"></a>
		                </div>
		            </div>
		            <!-- /carousel -->

		            <div class="tabs_detail">
		                <ul class="nav nav-tabs" role="tablist">
		                    <li class="nav-item">
		                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Information</a>
		                    </li>
		                    <li class="nav-item">
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
		                            <div class="card-body info_content"
		                            <p><?= $pro->short_disc ?></p>
		                              <h3> 
          Details
      </h3>
      <p>
          <?= $pro->long_disc; ?>
      </p>
		                            </div>
		                        </div>
		                    </div>
		                    <!-- /tab -->

		                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
		                        <div class="card-header" role="tab" id="heading-B">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
		                                    Reviews
		                                </a>
		                            </h5>
		                        </div>
		                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
		                            <div class="card-body reviews">
		                                <div class="row add_bottom_45 d-flex align-items-center">
		                                    <div class="col-md-3">
		                                        <div id="review_summary">
		                                            <strong>8.5</strong>
		                                            <em>Superb</em>
		                                            <small>Based on 4 reviews</small>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-9 reviews_sum_details">
		                                        <div class="row">
		                                            <div class="col-md-6">
		                                                <h6>Food Quality</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong>9.0</strong></div>
		                                                </div>
		                                                <!-- /row -->
		                                                <h6>Service</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong>9.5</strong></div>
		                                                </div>
		                                                <!-- /row -->
		                                            </div>
		                                            <div class="col-md-6">
		                                                <h6>Location</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
		                                                </div>
		                                                <!-- /row -->
		                                                <h6>Price</h6>
		                                                <div class="row">
		                                                    <div class="col-xl-10 col-lg-9 col-9">
		                                                        <div class="progress">
		                                                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
		                                                        </div>
		                                                    </div>
		                                                    <div class="col-xl-2 col-lg-3 col-3"><strong>6.0</strong></div>
		                                                </div>
		                                                <!-- /row -->
		                                            </div>
		                                        </div>
		                                        <!-- /row -->
		                                    </div>
		                                </div>

		                                <div id="reviews">
		                                    <div class="review_card">
		                                        <div class="row">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="<?= $url ?>img/avatar4.jpg" alt=""></figure>
		                                                <h5>Lukas</h5>
		                                            </div>
		                                            <div class="col-md-10 review_content">
		                                                <div class="clearfix add_bottom_15">
		                                                    <span class="rating">8.5<small>/10</small> <strong>Rating average</strong></span>
		                                                    <em>Published 54 minutes ago</em>
		                                                </div>
		                                                <h4>"Great Location!!"</h4>
		                                                <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.</p>
		                                                <ul>
		                                                    <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
		                                                    <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
		                                                    <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                        <!-- /row -->
		                                    </div>
		                                    <!-- /review_card -->
		                                    <div class="review_card">
		                                        <div class="row">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="<?= $url ?>img/avatar6.jpg" alt=""></figure>
		                                                <h5>Lukas</h5>
		                                            </div>
		                                            <div class="col-md-10 review_content">
		                                                <div class="clearfix add_bottom_15">
		                                                    <span class="rating">8.5<small>/10</small> <strong>Rating average</strong></span>
		                                                    <em>Published 10 Oct. 2019</em>
		                                                </div>
		                                                <h4>"Awesome Experience"</h4>
		                                                <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.</p>
		                                                <ul>
		                                                    <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
		                                                    <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
		                                                    <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                        <!-- /row -->
		                                    </div>
		                                    <!-- /review_card -->
		                                    <div class="review_card">
		                                        <div class="row">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="<?= $url ?>img/avatar1.jpg" alt=""></figure>
		                                                <h5>Marika</h5>
		                                            </div>
		                                            <div class="col-md-10 review_content">
		                                                <div class="clearfix add_bottom_15">
		                                                    <span class="rating">9.0<small>/10</small> <strong>Rating average</strong></span>
		                                                    <em>Published 11 Oct. 2019</em>
		                                                </div>
		                                                <h4>"Really great dinner!!"</h4>
		                                                <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.</p>
		                                                <ul>
		                                                    <li><a href="#0"><i class="icon_like"></i><span>Useful</span></a></li>
		                                                    <li><a href="#0"><i class="icon_dislike"></i><span>Not useful</span></a></li>
		                                                    <li><a href="#0"><i class="arrow_back"></i> <span>Reply</span></a></li>
		                                                </ul>
		                                            </div>
		                                        </div>
		                                        <!-- /row -->
		                                        <div class="row reply">
		                                            <div class="col-md-2 user_info">
		                                                <figure><img src="<?= $url ?>img/avatar.jpg" alt=""></figure>
		                                            </div>
		                                            <div class="col-md-10">
		                                                <div class="review_content">
		                                                    <strong>Reply from Foogra</strong>
		                                                    <em>Published 3 minutes ago</em>
		                                                    <p><br>Hi Monika,<br><br>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his. Tollit molestie suscipiantur his et.<br><br>Thanks</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <!-- /reply -->
		                                    </div>
		                                    <!-- /review_card -->
		                                </div>
		                                <!-- /reviews -->
		                                <div class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <!-- /tab-content -->
		            </div>
		            <!-- /tabs_detail -->
		        </div>
		        <!-- /col -->
                <?php //print_r($_SESSION['addcart']); ?>
		        <div class="col-lg-4" id="sidebar_fixed">
		            <div class="box_booking">
		                <div class="head">
		                    <h3 id="sprice">LKR <?= $pro->price ?></h3>
		                    <?php
		                    if($pro->dead_line)
		                    {
		                        ?>
		                    <div class="offer" >Duration <?= $pro->dead_line ?></div>
		                    <?php
		                    }
		                    ?>
		                    <div class="offer" style="font-size: 13px;">Product ID:<?= $pro->sku ?></div>
		                </div>
		                <!-- /head -->
		                <div class="main">
		                    <form id="custom_cart" action="<?= base_url('/api/addcart'); ?>?action=addcart" method="post" >
		            		    <input type="hidden" name="product_id" value="<?= $pro->id ?>" />
		            		<?php
		            		 $product->output_add_to_cart_custom_fields($pro->id);
		            		 if($pro->catID != 5)
		            		 {
    		            		 if($pro->catID == 4)
    		            		 {
    		            		     ?>
    		            		     <label>Tickets:</label>
    		            		     <?php
    		            		 }
    		            		 else
    		            		 {
    		            		     ?>
    		            		     <label>Number of Enrollments:</label>
    		            		     
    		            		     <?php
    		            		 }
		            		 }
		            		 if($pro->catID != 5)
		            		 {
		            		?>
		            		<input type="number" price="<?= $pro->price ?>" name="qty" id="qty" onchange="updateQty()" value="1" style="width: 100%;height: 40px !important;margin-bottom:5px;" />
		            		<?php
		            		 }
		            		?>
		            		<label>Discount code:</label>
		            		<input type="text" name="dcode" style="width: 100%;height: 40px !important;margin-bottom:5px;" />
		            		
		            		<button type="button" onclick="submit_form('custom_cart');" class="btn_1 full-width mb_5">Add to Cart</button>
		            		<a onclick="ajax_url('<?= base_url('/api/wishlist'); ?>?pid=<?= $pro->id ?>','wishlist')" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i> Add to wishlist</a>
		            		</form>
		                </div>
		            </div>
		            <!-- /box_booking -->
		            <ul class="share-buttons">
		                <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
		                <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
		                <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
		            </ul>
		        </div>

		    </div>
		    <!-- /row -->
		    <div class="sec" style="display:<?= (isset($sp_detail) && $sp_detail)?"block":"none"; ?>"> 
		    <h5 style="text-align:center;padding:10px 0;">How to get Services From <?=  $recent_author->full_name; ?></h5>
		    <div class="row">
		         <div class="col-lg-4 col-md-4 col-sm-12">
		                    <p  onclick="myFunction()"><b>Address</b></p>
		                    <div id="myDIV">
		                    <p>322 StarttupLawyer Pvt Ltd 
		                    69/B, 1st Lane, Media Welikada Road</p>
		                    </div>
		                    <p><b>Contact</b></p>
		                    <p><i class="fab fa-whatsapp" style="color:green;"></i><?= $recent_author->whaatsapp; ?></p>
		                    <p><i class="fas fa-phone" style="color:blue;"></i><?= $recent_author->billing_phone; ?></p>
		                    <p><i class="far fa-envelope-open"  style="color:red;"></i><?= $recent_author->billing_email; ?></p>
		                    
		                </div> 
		                <div class="col-lg-4 col-md-4 col-sm-12">
		                    <p><b>Working Hours</b></p>
		                    <p>Mon-Fri. 11:00am - 3:00pm </p>
		                    <p>Fri-Sun. 4:00pm - 8:00pm </p>
		                    <button type="button" class="btn btn-outline-danger">Sunday Closed</button>

		                </div>
		                <div class="col-lg-4 col-md-4 col-sm-12">
		                    <p class="mob"><b>Service Policy</b></b></p>
		                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
		                </div> 
		    </div>
		    </div>
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript">
	    function detail_collapse(id){
	        var mid = '#'+id;
	        var aid = '#'+id+'_a';
	        if($(mid).hasClass('hide'))
	        {
	            $(aid).attr('aria-expanded', false);
	           $(mid).addClass('show'); 
	           $(mid).removeClass('hide'); 
	        }
	        else
	        {
	            $(aid).attr('aria-expanded', true);
	            $(mid).addClass('hide'); 
	           $(mid).removeClass('show'); 
	        }
	    }
	</script>
	<script>
	    function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function updateQty()
{
    var p = $("#qty").val()*$("#qty").attr('price')
    $('#sprice').html('LKR '+p);
}
$("#qty").on("keyup change", function(e) {
    updateQty();
})
	</script>