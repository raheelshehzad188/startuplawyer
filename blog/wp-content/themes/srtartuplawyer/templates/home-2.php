<?php 
   /* Template Name: home-2*/ 
   
   $url = get_template_directory_uri('/assets1').'/assets1/';
   $surl = get_template_directory_uri('/assets1').'/slider/';
   
   
   
   get_header('home');
   
   $url = get_assets_url(); 
   
   ?>

<main>
   <div class="hero_single version_2" style="background-image: url('<?= ot_get_option( 'banner_image', $url.'img/lowyer1.jpg' ) ?>');">
      <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
         <div class="container">
            <div class="row uper justify-content-center">
               <div class="col-xl-9 col-lg-10 col-md-8">
                  <p>Faster, Safer, Smarter way to get Legal Services</p>
                  <form method="ger" id="mainsearch" action=" " onsubmit="return mainsearch()" >
                     <div class="row no-gutters custom-search-input">
                        <div class="col-lg-3">
                           <select class="chosen form-control" name="parent_search" id="parent_search">
                              <option value="">What would you like to do?</option>
                              <?php
                                 $recent_posts = wp_get_recent_posts(array(
                                 
                                 
                                 
                                 "numberposts" => -1, // Number of recent posts thumbnails to display
                                 
                                 
                                 
                                 "post_status" => 'publish', // Show only the published posts
                                 
                                 
                                 
                                 'orderby' => 'id',	
                                 
                                 
                                 
                                 'order' => 'ASC',
                                 
                                 
                                 
                                 "post_type"=>'search',
                                 
                                 
                                 
                                 ));
                                 
                                 
                                 
                                 foreach($recent_posts as $post) : ?>
                              <option value="<?php echo $post['ID'] ?>"><?php echo $post['post_title'] ?></option>
                              <?php endforeach; wp_reset_query(); ?>
                           </select>
                        </div>
                        <div class="col-lg-3">
                           <select class="chosen" name="language">
                              <option value="">Language</option>
                              <?php
                                 $recent_posts = wp_get_recent_posts(array(
                                 
                                 
                                 
                                 "numberposts" => -1, // Number of recent posts thumbnails to display
                                 
                                 'orderby' => 'id',	
                                 
                                 
                                 
                                                                  'order' => 'ASC',
                                 
                                 
                                 
                                 "post_status" => 'publish', // Show only the published posts
                                 
                                 
                                 
                                 "post_type"=>'search_language'
                                 
                                 
                                 
                                 ));
                                 
                                 
                                 
                                 foreach($recent_posts as $post) : ?>
                              <option value="<?php echo $post['ID'] ?>"><?php echo $post['post_title'] ?></option>
                              <?php endforeach; wp_reset_query(); ?>
                           </select>
                        </div>
                        <div class="col-lg-3">
                           <select class="chosen service_provider" id="service_provider" name="from">
                              <option value="">Service Provider</option>
                              <?php
                                 $recent_posts = wp_get_recent_posts(array(
                                 
                                 
                                 
                                 "numberposts" => -1, // Number of recent posts thumbnails to display
                                 
                                 
                                 
                                 "post_status" => 'publish', //Show only the published posts
                                 
                                 'orderby' => 'id',	
                                 
                                 
                                 
                                                                  'order' => 'DESC',
                                 
                                 
                                 
                                 "post_type"=>'search_from'
                                 
                                 
                                 
                                 ));
                                 
                                 
                                 
                                 foreach($recent_posts as $post) : ?>
                              <?php
                                 $parent = get_post_meta($post['ID'],'parent_search',true);
                                 
                                 
                                 
                                 ?>
                              <option class="
                                 <?php foreach ($parent as $key => $value): ?>
                                 par_<?= $value; ?>	
                                 <?php endforeach ?>
                                 from_option" value="<?php echo $post['ID'] ?>"><?php echo $post['post_title'] ?></option>
                              <?php endforeach; wp_reset_query(); ?>
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
   <section class="sptb bg-white">
      <div class="container">
         <div class="section-title center-block text-center">
            <h1>Best Doctors</h1>
            <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p>
         </div>
         <div id="small-categories" class="">
            <div class="">
               <div class="slider1">
                    <div class="" >
		 
					  <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="img">
					 
                    </div>
					<div class="" >
		 
					 <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="img"> 
					 
                    </div>
					<div class="" >
		 
					 <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="img"> 
					 
                    </div>
					<div class="" >
		 
					  <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="img">
					 
                    </div>
					<div class="" >
		 
					 <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="img"> 
					 
                    </div>
					<div class="" >
		 
					 <img src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__340.jpg" alt="img"> 
					 
                    </div>
                
               </div>
            </div>
         </div>
      </div>
   </section>
   <div class="bg_gray">
      <div class="container margin_60_40">
         <div class="main_title center">
            <span><em></em></span>
            <h2>How It Works</h2>
            <!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>-->
         </div>
         <div class="owl-carousel owl-theme categories_carousel">
            <?php
               $recent_posts = wp_get_recent_posts(array(
               
               
               
                   "numberposts" => -1, // Number of recent posts thumbnails to display
               
               
               
                   "post_status" => 'publish', // Show only the published posts
               
               
               
               "post_type"=>'videos'
               
               
               
               ));
               
               
               
               foreach($recent_posts as $post) : ?>
            <div class="item">
               <div class="card" style="width: 18rem;">
                  <a class="itema" href=""><img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($post['ID']) ?>" alt="Card image cap"></a>
                  <div class="card-body" style="border: 0px">
                     <a class="itema" href="">
                        <p class="card-text"><?php echo $post['post_title'] ?></p>
                     </a>
                  </div>
               </div>
            </div>
            <?php endforeach; wp_reset_query(); ?>
         </div>
         <!--<p class="text-center d-block d-md-block d-lg-none"><a href="grid-listing-filterscol.html" class="btn_1">View All</a></p>-->
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
   <?php
      $products = wc_get_products(array(
      
      
      
          'category' => array('package'),
      
      
      
      ));
      
      
      
      			?>
   <div class="container margin_60_40">
      <div class="main_title">
         <span><em></em></span>
         <h2>Popular Packages</h2>
         <!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>-->
         <!--<a href="<?= site_url(); ?>/search?parent_search=152">View All</a>-->
      </div>
      <div class="owl-home">
         <?php
            foreach($products as $k=> $sing)
            
            
            
            {
            
            
            
                if(TRUE)
            
            
            
                {
            
            
            
                $pid = $sing->get_id();
            
            
            
             ?>
         <div class="item">
            <?php
               get_product_part('parts/course.php',$pid);
               
               ?>
         </div>
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
   <p class="text-center d-block d-md-block d-lg-none"><a href="<?= site_url(); ?>/search?parent_search=152" class="btn_1">View All</a></p>
   <!-- /button visibile on tablet/mobile only -->
   </div>
   <!-- /container -->
   <div class="container margin_60_40">
      <?php
         $products = wc_get_products(array(
         
         
         
             'category' => array('corses'),
         
         
         
         ));
         
         
         
         			?>
      <div class="main_title">
         <span><em></em></span>
         <h2>Best Selling courses</h2>
         <!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>-->
         <!--<a href="<?= site_url(); ?>/search?parent_search=153">View All</a>-->
      </div>
      <div class="owl-home">
         <?php
            foreach($products as $k=> $sing)
            
            
            
            {
            
            
            
                if(true)
            
            
            
                {
            
            
            
                $pid = $sing->get_id();
            
            
            
             ?>
         <div class="item">
            <?php
               get_product_part('parts/course.php',$pid);
               
               ?>
         </div>
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
      <p class="text-center d-block d-md-block d-lg-none"><a href="<?= site_url(); ?>/search?parent_search=153" class="btn_1">View All</a></p>
      <!-- /button visibile on tablet/mobile only -->
   </div>
   <!-- /bg_gray -->
   <div class="bg_gray">
      <div class="container margin_60_40">
         <div class="main_title center">
            <span><em></em></span>
            <h2>Webinar</h2>
            <!--<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>-->
         </div>
         <?php
            $products = wc_get_products(array(
            
            
            
                'category' => array('webinar'),
            
            
            
            ));
            
            
            
            			?>
         <div class="owl-carousel owl-theme categories_carousel">
            <?php
               foreach($products as $k=> $sing)
               
               
               
               {
               
               
               
                   if(TRUE)
               
               
               
                   {
               
               
               
                   $pid = $sing->get_id();
               
               
               
                ?>
            <div class="item">
               <div class="card" style="width: 18rem;">
                  <a class="itema" href="<?= get_permalink($pid); ?>"><img class="card-img-top" src="<?= get_the_post_thumbnail_url($pid); ?>" alt="Card image cap"></a>
                  <div class="card-body" style="text-align: center;">
                     <button class="btn_sale">Register</button>
                  </div>
               </div>
            </div>
            <?php   
               }
               
               
               
               }
               
               
               
               ?>
         </div>
         <p class="text-center d-block d-md-block d-lg-none"><a href="<?= site_url(); ?>/search?parent_search=154" class="btn_1">View All</a></p>
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
   <div class="call_section lazy" data-bg="url('<?= ot_get_option( 'banner_image_2', $url.'img/lowyer.jpg' ) ?>')">
      <div class="container clearfix">
         <div class="col-lg-5 col-md-6 float-right wow">
            <div class="box_1">
               <h3>E-Meditation</h3>
               <p>Don't let court closures
                  and delays hinder your business.
                  Settle your dispute and move on
                  with your business.
               </p>
               <a href="submit-restaurant.html" class="btn_1">Read more</a>
            </div>
         </div>
      </div>
   </div>
   <!-- /carousel -->
   </div>
   <!-- /container -->
   </div>
   <!-- /bg_gray -->
   <!-- call_section lazy2 -->
   <div class="call_section lazy" id="are_youlawyer" data-bg="url('<?= ot_get_option( 'banner_image_3', $url.'img/lowyer2.jpg' ) ?>">
      <div class="container clearfix">
         <div class="col-lg-5 col-md-6 float-right wow">
            <div class="box_1">
               <h3>Are you a Lawyer, Corporate
                  Secretary, Business Consultant or Mediator?
               </h3>
               <p> Join us to increase your
                  online visibility.
               </p>
               <a href="submit-restaurant.html" class="btn_1">Read more</a>
            </div>
         </div>
      </div>
   </div>
   <!--/call_section-->
</main>


    
<?php
   get_footer('home1');
   
   ?>