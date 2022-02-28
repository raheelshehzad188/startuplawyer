
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
  background-color: #eee;.fab, .fas, .far
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
button.btn.btn_hero.wishlist {
    background-color: #fff;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 20%);
    -moz-box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.2);
    box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 20%);
    line-height: 1;
    padding: 10px 15px;
    color: #444 !important;
    font-weight: 500;
    color: #444;
    text-decoration: none !important;
    display: inline-block;
    border: none;
}

button.btn.btn_hero.wishlist i.icon_heart {
    margin-right: 7px;
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
     /*font-size:18px;*/
     /*padding-right:10px;*/
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
    .iframe-img{
        width:auto !important;
    }
}


</style>
<style>
@media(max-width:650px){
.hero_in.detail_page {
    height: 250px;
}
}
@media(min-width:350px) and (max-width:450px){
.hero_in.detail_page {
    height: 210px;
}
}<style>
    @media(max-width:450px){
.hero_in.detail_page {
    height: 250px;
}
}
@media(min-width:350px) and (max-width:450px){
.hero_in.detail_page {f
    height: 210px;
}
}
button#myBtn {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 999;
    border-radius: 100%;
    text-align: center;
    border: 1px solid #fff;
    background: #ddd;
    font-size: 25px;
    opacity: .5;
    width: 50px;
    height: 50px;
    padding-left: 9px;
    padding-top: 4px;
}
</style>
<main>
		<div class="hero_in detail_page background-image">
<img id="prof_img" src="<?= $user->banner; ?>" alt="profile image" width="100%;" >

			<div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				
				<div class="container">
					<div class="main_info">
					    <div class="row">
					        <button href="#0" class="btn btn_hero wishlist" style="position: absolute;right: 22px;top: 90px;"><i class="icon_heart"></i>Wishlist</button>
					    </div>
						<div class="row">
</div>
							<div class="col-xl-4 col-lg-5 col-md-6">
								<div class="head"><div class="score">

								    <span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></div>
								<h1><?= $user->full_name ?></h1>
								
								<?php 
								if($user->type)
								{
								    foreach($user->type as $k=>$v)
								    {
								        $post = $product->getpost($v);
								        if($post)
								        {
								            if($k == 0)
								            {
								                echo $post->post_title;
								            }
								            else
								            {
								                echo ','.$post->post_title;
								            }
								        }
								    }
								}
								?> - <?php
								if($user->district)
								{
								    $post = $product->getpost($user->district);
								    if($post)
								    {
								        echo $post->post_title;
								    }
								}
								?>, <?= $user->whaatsapp ?> - <a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+H%C3%B4pitaux+de+Paris+(AP-HP)+-+Si%C3%A8ge!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="blank">Get directions</a>
							</div>
							<div class="col-xl-8 col-lg-7 col-md-6">
								<div class="buttons clearfix">
									<span class="magnific-gallery">
										<a href="img/detail_2.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
										<a href="img/detail_3.jpg" title="Photo title" data-effect="mfp-zoom-in"></a>
									</span>
								</div>
							</div>
						</div>
						<!-- /row -->
					</div>
					<!-- /main_info -->
				</div>
			</div>
		</div>
		<!--/hero_in-->
		
		<div class="container margin_detail">
		    <div class="row">
		        <div class="col-lg-8">

		            <div class="tabs_detail">
		                <ul class="nav nav-tabs" role="tablist">
		                    <li class="nav-item">
		                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Offering</a>
		                    </li>
		                    <li class="nav-item">
		                        <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">CV</a>
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
		                            <div class="card-body info_content">
		                                <!--Offering data-->
		                                <?php
		                                $type = array_reverse($user->type);
		                                
		                                foreach($type as  $k => $v)
		                                {
		                                    if($k == 0)
		                                    {
		                                        echo $v;
		                                    }
		                                    else
		                                    {
		                                        echo ", ".$v;
		                                    }
		                                    
		                                }
		                                echo "<br>";
		                                $area = array_reverse($user->area);
		                              //  var_dump($area);
		                                foreach($area as  $k => $v)
		                                {
		                                    if($k == 0)
		                                    {
		                                        echo $v;
		                                    }
		                                    else
		                                    {
		                                        echo ", ".$v;
		                                    }
		                                    
		                                }
		                                echo "<br>";
		                                
		                                echo $user->distric;
		                                echo "<br>";
		                                $lang = array_reverse($user->lang);
		                              //  var_dump($area);
		                                foreach($lang as  $k => $v)
		                                {
		                                    if($k == 0)
		                                    {
		                                        echo $v;
		                                    }
		                                    else
		                                    {
		                                        echo ", ".$v;
		                                    }
		                                    
		                                }
		                                echo "<br>";
		                                ?>
		                                <br><br>
		                                Price  range : <?= $min ?> - <?= $max ?>
		                                <br>
		                                <?php
		                                if($user->first_free_cons)
		                                {
		                                    ?>
		                                    First Free Consultation
		                                    <?php
		                                }
		                                ?>
		                                <br>
		                                <?php
		                                if($user->refund)
		                                {
		                                    ?>
		                                    Refund Guarantee
		                                    <?php
		                                }
		                                ?>
		                                <!--Offering data-->
		                                		                                <?php
		                                
		                                $cats = array(5,1,2,4,3);
		                                $modal->table ='products';
		                                $modal->key ='id';
		                                foreach($cats as $k=> $v)
		                                {
		                                    $w = array('uid'=>$user->ID,'catID'=> $v);
		                                    $pros = $modal->get($w);
		                                    $cat = $product->getcat($v);
		                                    if($pros)
		                                    {
		                                    ?>
		                                    <h3><?= ucfirst($cat->name); ?></h3>
		                                    <?php
		                                    }
		                                    foreach($pros as $k1=> $v1)
		                                    {
		                                        ?>
		                                        <div class="menu_item">
		                                    <em>LKR<?= $v1['price'] ?></em>
		                                    <a href="<?= base_url('/index/product/').$v1['slug']; ?>" target="_blank"><h4><?= $v1['name'] ?></h4></a>
		                                    <p><?= $v1['short_disc'] ?></p>
		                                </div>
		                                        <?php
		                                    }
		                                    ?>
		                                <hr>
		                                    <?php
		                                }
		                                ?>
		                            </div>
		                        </div>
		                    </div>
		                    <!-- /tab -->
<!--tab cv -->
<div id="pane-C" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-C">
		                        <div class="card-header" role="tab" id="heading-A">
		                            <h5>
		                                <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="true" aria-controls="collapse-C">
		                                    CV
		                                </a>
		                            </h5>
		                        </div>
		                        <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-A">
		                            <div class="card-body info_content">
		                                <iframe width="650" height="300" class="iframe-img"
                                            src="https://www.youtube.com/embed/<?= $user->intro_video; ?>">
                                        </iframe>
		                            	<p><?= $user->bio; ?></p>
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
		                                                <figure><img src="img/avatar4.jpg" alt=""></figure>
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
		                                                <figure><img src="img/avatar6.jpg" alt=""></figure>
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
		                                                <figure><img src="img/avatar1.jpg" alt=""></figure>
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
		                                                <figure><img src="img/avatar.jpg" alt=""></figure>
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
		            <div class="sec" style="display:block"> 
		    <h5 style="text-align:center;padding:10px 0;">How to get Services From <?=  $user->full_name; ?></h5>
		    <div class="row">
		         <div class="col-lg-4 col-md-4 col-sm-12">
		                    <p  onclick="myFunction()"><b>Address</b></p>
		                    <div id="myDIV">
		                    <p>322 StarttupLawyer Pvt Ltd 
		                    69/B, 1st Lane, Media Welikada Road</p>
		                    </div>
		                    <p><b>Contact</b></p>
		                    <p><i class="fab fa-whatsapp" style="color:green;"></i><?= $user->whaatsapp; ?></p>
		                    <p><i class="fas fa-phone" style="color:blue;"></i><?= $user->billing_phone; ?></p>
		                    <p><i class="far fa-envelope-open"  style="color:red;"></i><?= $user->billing_email; ?></p>
		                    
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
		        <!-- /col -->
		        
                <div class="col-lg-4" id="sidebar_fixed">
		            <div class="box_booking">
		                
		                <!-- /head -->
		                <div class="main">
		                        <form>
		                <h6>Request Quote or Make a Inquiry</h6>
		              <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="email" class="form-control" id="email" value="<?= (isset($_SESSION['knet_login']->full_name)?$_SESSION['knet_login']->full_name:"") ?>">
                      </div>
                      <div class="form-group">
                        <label for="email">Subject:</label>
                        <input type="email" class="form-control" id="email" value="">
                      </div>
		              <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?= (isset($_SESSION['knet_login']->user_email)?$_SESSION['knet_login']->user_email:"") ?>">
                      </div>
		              <div class="form-group">
                        <label for="msg">Message:</label>
                        <textarea class="form-control" ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="pwd">File:</label>
                        <input type="file" class="form-control" id="files" multiple >
                      </div>

		            <button href="#" class="btn_1 full-width mb_5" style="color:#fff">Submit</button>
		            </form>
		                </div>
		            </div>
		            <!-- /box_booking -->
		            <ul class="share-buttons">
		                <li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
		                <li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
		                <li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
		                <br><br>
		                <?php
		                if($book_pro)
		                {
		                    ?>
		                    <a href="<?= base_url('/index/product/').$book_pro->slug; ?>" target="_blabnk" class="btn_1 full-width mb_5" style="color:#fff">Book Consultation</a>
		                    <?php
		                }
		                ?>

		            </ul>
		        </div>
		        
		    <!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->
	<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = '<i class="fas fa-pause"></i>';
  } else {
    video.pause();
    btn.innerHTML = '<i class="fas fa-play"></i>';
  }
}
</script>
