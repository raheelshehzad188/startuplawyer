<?php
$url = base_url('assets/design/');
?>
	
	
	<main>
		<div class="hero_single version_2" style="background-image: url('<?= get_option( 'banner_image', 'https://startuplawyer.lk/main/assets/front/img/front1.jpg' ) ?>');">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>Startup &amp; Lawyer</h1>
							<p>Find a Lawyer & Book Online Instantly</p>
							<form method="ger" id="mainsearch" action="<?= base_url('index/search'); ?>" >

								<div class="row no-gutters custom-search-input">

									<div class="col-lg-3">

										<select class=" form-control" name="parent_search" id="parent_search">

											<option value="">What would you like to do?</option>

											<?php
											    $array = array(7633,150,151,152,153,154,155);
                                                $modal->table = 'wp_posts';
                                                $modal->key = 'ID';
                                                $recent_posts = $modal->get(array("post_type"=>'search'));
                                                $recent_posts = array_reverse($recent_posts);
												/*$recent_posts = wp_get_recent_posts(array(

        "numberposts" => -1, // Number of recent posts thumbnails to display

        "post_status" => 'publish', // Show only the published posts

		'orderby' => 'id',	

		 'order' => 'ASC',

		"post_type"=>'search',

    ));*/

    foreach($array as $k=> $v) : 
    $post = $product->getpost($v);
    ?>
    <?php
    
    ?>

											<option value="<?php echo $post->ID ?>"><?php echo $post->post_title ?></option>

											<?php endforeach;  ?>

										</select>



									</div>

									<div class="col-lg-3">
                                    
										<select class="form-control" name="language" id="language">

											<option value="">All Languages</option>

											<?php
                                                        $modal->table = 'wp_posts';
                                                $modal->key = 'ID';
                                                $recent_posts = $modal->get(array("post_type"=>'search_language'));
                                                        $recent_posts = array_reverse($recent_posts);

											foreach($recent_posts as $post) : ?>

											<option value="<?php echo $post['ID'] ?>"><?php echo $post['post_title'] ?></option>

											<?php endforeach;  ?>

										</select>

									</div>

									<div class="col-lg-3">

										<select class="form-control service_provider" id="from" name="from">

											<option value="">All Service Providers</option>

											<?php
											                $modal->table = 'wp_posts';
                                                $modal->key = 'ID';
                                                $recent_posts = $modal->get(array("post_type"=>'search_from'));
                                                $recent_posts = array_reverse($recent_posts);

											foreach($recent_posts as $post) : ?>

												<?php
                                                    $parent = array();
												?>

											<option class="

											<?php foreach ($parent as $key => $value): ?>

											par_<?= $value; ?>	

											<?php endforeach ?>

											 from_option" value="<?php echo $post['ID'] ?>"><?php echo $post['post_title'] ?></option>

											<?php endforeach;  ?>

										</select>

									</div>

									<div class="col-lg-3">

										<input type="submit" value="Search">

									</div>

								</div>

								<!-- /row -->

							</form>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->
		
		<div class="bg_gray">
			<div class="container margin_60_40">
				<div class="main_title center">
					<span><em></em></span>
					<h2>How It Works</h2>
					<!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>-->
				</div>
				<div class="owl-carousel owl-theme categories_carousel">
				    <?php
				    $wp = wp_data();
				    $videos= $wp['videos'];

						foreach($videos as $k=>$post) {
					?>
					<div class="item">
						<a href="#videoStory<?= $k ?>" id="videoLink<?= $k ?>">
							<!--<span>98</span>-->
							<img src="<?= $post['img'] ?>">
							<!--<div id="video"><i class="icon-food_icon_pizza"></i></div>-->
							<div id="videoStory<?= $k ?>" class="mfp-hide" style="max-width: 75%; margin: 0 auto;">
 <?= $post['html']; ?>
</div>
							<div class="thumCapiton">
							    <h3><?php echo $post['title'] ?></h3>
							</div>
						</a>
					</div>
					<?php
						}
					?>
				</div>
			</div>
<style>
    .mfp-content iframe {
    width: 95%;
    height: 480px;
}
</style>
				<!-- /main_title -->
				<!--<div class="owl-carousel owl-theme categories_carousel">
					
					<div class="item">
						<a href="#0">
							<span>98</span>
							<i class="icon-food_icon_pizza"></i>
							<h3>Pizza - Italian</h3>
							<small>Avg price $40</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>87</span>
							<i class="icon-food_icon_sushi"></i>
							<h3>Japanese - Sushi</h3>
							<small>Avg price $50</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>96</span>
							<i class="icon-food_icon_burgher"></i>
							<h3>Burghers</h3>
							<small>Avg price $55</small>
						</a>
					</div>
					
					<div class="item">
						<a href="#0">
							<span>78</span>
							<i class="icon-food_icon_vegetarian"></i>
							<h3>Vegetarian</h3>
							<small>Avg price $40</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>65</span>
							<i class="icon-food_icon_cake_2"></i>
							<h3>Bakery</h3>
							<small>Avg price $60</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>65</span>
							<i class="icon-food_icon_chinese"></i>
							<h3>Chinese</h3>
							<small>Avg price $40</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>65</span>
							<i class="icon-food_icon_burrito"></i>
							<h3>Mexican</h3>
							<small>Avg price $35</small>
						</a>
					</div>-->
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
		  <?php
$modal->table = 'category';
$modal->key = 'id';
    $myrows = $modal->get(array('parent'=>3,'status'=>0));

			?>
		<div class="container margin_60_40">
			<div class="main_title">
				<span><em></em></span>
				<h2>Popular Packages</h2>
				<!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>-->
				<a href="#0">View All</a>
			</div>

			<div class="owl-carousel owl-theme carousel_4">
			    <?php

			    foreach($myrows as $k=> $sing)

			    {

			        if(TRUE)

			        {

			        $pid = $sing['id'];

			     ?>

			        <?php
			        $this->load->view('foogra/parts/pcat.php',array('pid'=>$pid));
			        ?>

			     <?php   

			        }

			    }

			    ?>
			    </div>
			<!-- /carousel -->

			<!--<div class="banner lazy" data-bg="url(img/banner_bg_desktop.jpg)">
				<div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
					<div>
						<small>foogra</small>
						<h3>More than 3000 Restaurants</h3>
						<p>Book a table easly at the best price</p>
						<a href="grid-listing-filterscol.html" class="btn_1">View All</a>
					</div>
				</div>
				<!-- /wrapper -->
			</div>
			<!-- /banner -->

			<!--<div class="row">
				<div class="col-12">
					<div class="main_title version_2">
						<span><em></em></span>
						<h2>Our Very Best Deals</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
						<a href="#0">View All</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="list_home">
						<ul>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_1.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>9.5</strong></div>
									<em>Italian</em>
									<h3>La Monnalisa</h3>
									<small>8 Patriot Square E2 9NF</small>
									<ul>
										<li><span class="ribbon off">-30%</span></li>
										<li>Average price $35</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_2.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>8.0</strong></div>
									<em>Mexican</em>
									<h3>Alliance</h3>
									<small>27 Old Gloucester St, 4563</small>
									<ul>
										<li><span class="ribbon off">-40%</span></li>
										<li>Average price $30</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_3.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>9.0</strong></div>
									<em>Sushi - Japanese</em>
									<h3>Sushi Gold</h3>
									<small>Old Shire Ln EN9 3RX</small>
									<ul>
										<li><span class="ribbon off">-25%</span></li>
										<li>Average price $20</li>
									</ul>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="list_home">
						<ul>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_4.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>9.5</strong></div>
									<em>Vegetarian</em>
									<h3>Mr. Pepper</h3>
									<small>27 Old Gloucester St, 4563</small>
									<ul>
										<li><span class="ribbon off">-30%</span></li>
										<li>Average price $20</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_5.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>8.0</strong></div>
									<em>Chinese</em>
									<h3>Dragon Tower</h3>
									<small>22 Hertsmere Rd E14 4ED</small>
									<ul>
										<li><span class="ribbon off">-50%</span></li>
										<li>Average price $35</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_6.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>8.5</strong></div>
									<em>Pizza - Italian</em>
									<h3>Bella Napoli</h3>
									<small>135 Newtownards Road BT4</small>
									<ul>
										<li><span class="ribbon off">-45%</span></li>
										<li>Average price $25</li>
									</ul>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
			<p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html" class="btn_1">View All</a></p>
			<!-- /button visibile on tablet/mobile only -->
		</div>
		<!-- /container -->
		<div class="container margin_60_40">
		    <?php
$modal->table = 'products';
$modal->key = 'id';
$products = $modal->get(array('catID'=>2,'publish'=>0));

			?>
			<div class="main_title">
				<span><em></em></span>
				<h2>Best Selling courses</h2>
				<!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>-->
				<a href="#0">View All</a>
			</div>

			<div class="owl-carousel owl-theme carousel_4">
			    <?php

			    foreach($products as $k=> $sing)

			    {
			        $sing = $product->getproduct($sing['id']);
			    	$pid = $sing->id;

			        if(true)

			        {

			     ?>
			         <?php
			        $this->load->view('foogra/parts/course.php',array('pid'=>$pid));
			        ?>

			     <?php  

			        }

			    }

			    ?>
			    
			</div>
			<!-- /carousel -->

			<!--<div class="banner lazy" data-bg="url(img/banner_bg_desktop.jpg)">
				<div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)">
					<div>
						<small>foogra</small>
						<h3>More than 3000 Restaurants</h3>
						<p>Book a table easly at the best price</p>
						<a href="grid-listing-filterscol.html" class="btn_1">View All</a>
					</div>
				</div>-->
				<!-- /wrapper -->
			<!--</div>-->
			<!-- /banner -->

			<!--<div class="row">
				<div class="col-12">
					<div class="main_title version_2">
						<span><em></em></span>
						<h2>Our Very Best Deals</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
						<a href="#0">View All</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="list_home">
						<ul>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_1.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>9.5</strong></div>
									<em>Italian</em>
									<h3>La Monnalisa</h3>
									<small>8 Patriot Square E2 9NF</small>
									<ul>
										<li><span class="ribbon off">-30%</span></li>
										<li>Average price $35</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_2.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>8.0</strong></div>
									<em>Mexican</em>
									<h3>Alliance</h3>
									<small>27 Old Gloucester St, 4563</small>
									<ul>
										<li><span class="ribbon off">-40%</span></li>
										<li>Average price $30</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_3.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>9.0</strong></div>
									<em>Sushi - Japanese</em>
									<h3>Sushi Gold</h3>
									<small>Old Shire Ln EN9 3RX</small>
									<ul>
										<li><span class="ribbon off">-25%</span></li>
										<li>Average price $20</li>
									</ul>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="list_home">
						<ul>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_4.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>9.5</strong></div>
									<em>Vegetarian</em>
									<h3>Mr. Pepper</h3>
									<small>27 Old Gloucester St, 4563</small>
									<ul>
										<li><span class="ribbon off">-30%</span></li>
										<li>Average price $20</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_5.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>8.0</strong></div>
									<em>Chinese</em>
									<h3>Dragon Tower</h3>
									<small>22 Hertsmere Rd E14 4ED</small>
									<ul>
										<li><span class="ribbon off">-50%</span></li>
										<li>Average price $35</li>
									</ul>
								</a>
							</li>
							<li>
								<a href="detail-restaurant.html">
									<figure>
										<img src="<?= $url; ?>img/location_list_placeholder.png" data-src="<?= $url; ?>img/location_list_6.jpg" alt="" class="lazy">
									</figure>
									<div class="score"><strong>8.5</strong></div>
									<em>Pizza - Italian</em>
									<h3>Bella Napoli</h3>
									<small>135 Newtownards Road BT4</small>
									<ul>
										<li><span class="ribbon off">-45%</span></li>
										<li>Average price $25</li>
									</ul>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			< !-- /row -->
			<p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html" class="btn_1">View All</a></p>
			<!-- /button visibile on tablet/mobile only -->
		</div>
    	<div class="banner lazy" data-bg="url(<?= get_option( 'banner_emediation', 'https://startuplawyer.lk/main/assets/design/orignal/img/banner_bg_desktop.jpg' ) ?>)" data-was-processed="true" style="background-image: url(<?= get_option( 'banner_emediation', 'https://startuplawyer.lk/main/assets/design/orignal/img/banner_bg_desktop.jpg' ) ?>);">
				<div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.2)" style="background-color: rgba(0, 0, 0, 0.2);">
					<div>						<h3>E-Meditation</h3>
						<p>Dont't let court clousers and delays hinder your business. Settle your dispute and move on with your business. </p>
					</div>
				</div>
				<!-- /wrapper -->
			</div>

		<!-- /bg_gray -->
		
		<div class="bg_gray">
		    <?php

$modal->table = 'products';
$modal->key = 'id';
$products = $modal->get(array('catID'=>4,'publish'=>0));
$left = array();
$right = array();
if(count($products) >= 5)
{
    foreach($products as $k=> $v)
    {
        if($k>= 0 && $k<= 2)
        {
          $left[] = $v;  
        }
        elseif($k>= 2 && $k<= 5)
        {
          $right[] = $v;  
        }
    }
}
else
{
    $part = ceil(count($products)/2);
    foreach($products as $k=> $v)
    {
        if($k>= 0 && $k<= $part)
        {
          $left[] = $v;  
        }
        elseif($k>= $part && $k<= count($products))
        {
          $right[] = $v;  
        }
    }
}

			?>
			<div class="row" style="margin-right:0px; margin-left:0px;">
				<div class="col-12">
					<div class="main_title version_2">
						<span><em></em></span>
						<h2>Our Very Best Deals</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
						<a href="#0">View All</a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="list_home">
						<ul>
						    <?php
						    foreach($left as $k=> $v)
						    {
						        $pid = $v['id'];
						      $this->load->view('foogra/parts/webinar.php',array('pid'=>$pid));  
						    }
						    ?>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="list_home">
						<ul>
							<?php
						    foreach($right as $k=> $v)
						    {
						        $pid = $v['id'];
						      $this->load->view('foogra/parts/webinar.php',array('pid'=>$pid));  
						    }
						    ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="container margin_60_40 d-nonr hidden" style="display:none;">
				<div class="main_title center">
					<span><em></em></span>
					<h2>Webinar</h2>
					<!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>-->
				</div>
				<div class="owl-carousel owl-theme categories_carousel">
					<?php

			    foreach($products as $k=> $sing)

			    {
			    	$pid = $sing['id'];

			        if(true)

			        {

			     ?>

			     <div class="item">
			         <?php
			        $this->load->view('foogra/parts/webinar.php',array('pid'=>$pid));
			        ?>

			    </div>

			     <?php  

			        }

			    }

			    ?>
					
				</div>
			</div>

				<!-- /main_title -->
				<!--<div class="owl-carousel owl-theme categories_carousel">
					
					<div class="item">
						<a href="#0">
							<span>98</span>
							<i class="icon-food_icon_pizza"></i>
							<h3>Pizza - Italian</h3>
							<small>Avg price $40</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>87</span>
							<i class="icon-food_icon_sushi"></i>
							<h3>Japanese - Sushi</h3>
							<small>Avg price $50</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>96</span>
							<i class="icon-food_icon_burgher"></i>
							<h3>Burghers</h3>
							<small>Avg price $55</small>
						</a>
					</div>
					
					<div class="item">
						<a href="#0">
							<span>78</span>
							<i class="icon-food_icon_vegetarian"></i>
							<h3>Vegetarian</h3>
							<small>Avg price $40</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>65</span>
							<i class="icon-food_icon_cake_2"></i>
							<h3>Bakery</h3>
							<small>Avg price $60</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>65</span>
							<i class="icon-food_icon_chinese"></i>
							<h3>Chinese</h3>
							<small>Avg price $40</small>
						</a>
					</div>
					<div class="item">
						<a href="#0">
							<span>65</span>
							<i class="icon-food_icon_burrito"></i>
							<h3>Mexican</h3>
							<small>Avg price $35</small>
						</a>
					</div>-->
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
		
    	<!-- call_section lazy2 -->
    	<div class="call_section lazy" style="background-image: url('<?= get_option( 'banner_laywer', 'https://startuplawyer.lk/main/assets/design/orignal/img/banner_bg_desktop.jpg' ) ?>');" data-bg="url(<?= get_option( 'banner_laywer', 'https://startuplawyer.lk/main/assets/design/orignal/img/banner_bg_desktop.jpg' ) ?>)">
		    <div class="container clearfix">
		        <div class="col-lg-5 col-md-6 float-right wow">
		            <div class="box_1">
		                <h3>Are you a Lawyer, corporate secretary,  Business Consultant or Madiator?</h3>
		                <p>Join us to increase your online visibility. </p>
		                <a href="submit-restaurant.html" class="btn_1">Read more</a>
		            </div>
		        </div>
    		</div>
    	</div>
   		<!--/call_section-->
    	
		
	</main>
	