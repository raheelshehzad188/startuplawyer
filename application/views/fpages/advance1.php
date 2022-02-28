<!DOCTYPE html>
<?php
$week = array();
for($i=1; $i <=6;$i++)
{
    $date = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$i.' day'));
    $dname = date("D", strtotime($date));
    $week[] = array(
        'date'=> $date,
        'dname'=> $dname,
        'str'=> date("d  / m", strtotime($date))
        );


}
$assets = base_url('assets/design/orignal/');
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Foogra - Discover & Book the best restaurants at the best price">
	<meta name="author" content="Ansonika">
	<title><?= $title ?></title>
	<!-- Favicons-->
	<link rel="shortcut icon" href="<?= $assets; ?>/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?= $assets; ?>/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= $assets; ?>/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= $assets; ?>/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= $assets; ?>/img/apple-touch-icon-144x144-precomposed.png">
	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
	<!-- BASE CSS -->
	<link href="<?= $assets; ?>/css/bootstrap_customized.min.css" rel="stylesheet">
	<link href="<?= $assets; ?>/css/style.css" rel="stylesheet">
	<!-- SPECIFIC CSS -->
	<link href="<?= $assets; ?>/css/listing.css" rel="stylesheet">
	<link href="<?= $assets; ?>/css/listing-filter.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- YOUR CUSTOM CSS -->
	<link href="<?= $assets; ?>/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	<style>
	    .providers .row{
	        margin-top:20px;
	    }
	</style>
</head>
<body>
	<header class="header clearfix element_to_stick <?= (isset($hclass)?$hclass:""); ?>">
		<div class="container">
		<div id="logo">
			<a href="<?= get_option('siteurl'); ?>">
			    

				<img src="<?= get_option( 'site_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal">

				<img src="<?= get_option( 'sticky_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_sticky">

			</a>
		</div>
		<ul id="top_menu">
		    <?php
		    if(get_current_user_id())
		    {
		        ?>
		     <li><a href="<?= $product->dashboard_url(get_current_user_id()); ?>"><img id="dashboardImg" style="margin-left: -25px;position: absolute;margin-top: -5px;" src="<?= get_option( 'dashboard', get_assets_url().'/'.'img/dashboard2.png' ) ?>"  width="35" height="35" ></a></li>
		        <?php
		    }
		    else
		    {
		        ?>
		        <li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>
		        <?php
		    }
		    ?>
			<li>
			    	<div id="cart" class="hidden-xs" >
			<a href="<?= get_option('siteurl'); ?>">
                <?php
			    $cimg = (isset($hclass)?get_assets_url().'/'.'img/cart.png':get_assets_url().'/'.'img/cart2.png');
			    $himg = (isset($hclass)?get_assets_url().'/'.'img/hblack.png':get_assets_url().'/'.'img/wheart.png');
			    ?>
				<img id="cartImg" class="cartImg" src="<?= $cimg ?>" width="25" height="25" style="margin-top: 9px;">

			

			</a>
		</div>
			</li>
			<li>
			    	<div id="heart"  class="hidden-xs">
			<a href="<?= base_url('index/wishlist'); ?>">

				<img id="heartImg" class="heartImg" src="<?= $himg ?>" width="25" height="25" style="margin-top: 9px;">

			

			</a>
		</div>
			</li>
		</ul>
		<!-- /top_menu -->
		<a href="#0" class="open_close">
			<i class="icon_menu"></i><span>Menu</span>
		</a>
		<nav class="main-menu">
			<div id="header_menu">
				<a href="#0" class="open_close">
					<i class="icon_close"></i><span>Menu</span>
				</a>
				<a href="index.html"><img src="<?= get_option( 'site_logo', get_assets_url().'/'.'img/logo2.png' ) ?>" width="110" height="48" alt="" class="logo_normal" style="background-color:white;"></a>

			</div>
			<?php
				    $wp = wp_data();
				    echo $wp['menu'];
				    ?>
		</nav>
		<style>
		    ul#menu-short > li > a {
    color: #fff;
    padding: 0 8px 10px 8px; 
    font-weight: 500;
}
header.header.sticky ul#menu-short > li > a {
    color: #589442;
}
		</style>
	</div>
	</header>
	<!-- /header -->
	<main>
		<div class="page_header element_to_stick">
			<div class="container">
				<div class="row">
					<div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
						<div class="breadcrumbs">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Category</a></li>
								<li>Page active</li>
							</ul>
						</div>
						<!--<h1>145 restaurants in Convent Street 2983</h1>-->
					</div>
					<div class="col-xl-4 col-lg-5 col-md-5">
						<div class="search_bar_list">
							<input type="text" class="form-control" placeholder="Search again...">
							<input type="submit" value="Search">
						</div>
					</div>
				</div>
				<!-- /row -->		       
			</div>
		</div>
		<!-- /page_header -->
		<form id="filter_form" action="https://startuplawyer.lk/main/index/page/search_ajax">
			<input type="hidden" name="search_ajax" value="1">
			<input type="hidden" name="sort" value="name-asc">
			<input type="hidden" name="srch" value="">
			<input type="hidden" name="from" value="">
			<input type="hidden" name="fc_check" value="no">
			<input type="hidden" name="dist" value="">
			<input type="hidden" name="cate" value="">
			<input type="hidden" name="free" value="">
			<input type="hidden" name="refund" value="">
			<input type="hidden" name="parent_search" value="">
			<input type="hidden" name="language" value="">
			<input type="hidden" name="parea" value="">
			<input type="hidden" name="location" value="">
			<input type="hidden" name="min_price" id="min_price" value="0">
			<input type="hidden" name="max_price" id="max_price" value="">
		</form>
		<div class="container margin_30_40">
			<div class="row">
				<?php $this->load->view('../includes/sidebar-filter.php',array('list'=>1)) ?>
				<div class="col-lg-9 providers">
					<?php
				    foreach($products as $k=> $v)
				    {
				        $pro = $product->getproduct( $v );
				        // var_dump($pro);
				        $user = $product->getuser( $pro->uid );
				        $modal->table = 'product_to_tags';
				        $modal->key = 'id';
				        $tags = $modal->get(array('pid'=> $pro->id));
				        $modal->table = 'product_to_locations';
				        $modal->key = 'id';
				        $loc = $modal->get(array('pid'=> $pro->id));
				        
				        
				        ?>
				        <div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="lawyer_block">
								<div class="lawyer_left">
									<a href="<?= $pro->url; ?>" target="_blank"><span class="avatar" style="background-image: url('<?= $pro->img ?>');"></span></a>
									<div class="lawyer_rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<a href="">(10)</a>
									</div>
									<div class="laywer_price">LKR <?php echo $pro->id ?></div>
									<div class="lawyer_offer">
										First Free Consultation
									</div>
								</div>
								<div class="lawyer_right">
									<div class="name name_lawfirm">
										<a href="<?= $pro->url; ?>" target="_blank"><strong><?= $user->full_name?></strong></a>
									</div>
									<div class="lawyer_category">
										<?php
										foreach($user->type as $k=> $v)
										{
										    if($k == 0)
										    {
										        echo $v.",";
										    }
										    else
										    {
										        echo " ".$v.",";
										    }
										}
										?>
									</div>
									<div class="area_of_practice">
									    <?php
									    foreach($tags as $k=> $v)
                    {
                    $post = $product->getpost($v['tid']);
                    if($post)
                    {
                        ?>
                        <a href=""><span class="badge badge-primary"><?= $post->post_title; ?></span></a>
                        <?php
                    }
                    }
									    ?>
										
									</div>
									<div class="address">
										<div class="location">
											<i class="fa fa-map-marker"></i>
											<?= $user->distric; ?>
										</div>
									</div>
									<div class="mode_of_working">
									    <?php
									    foreach($loc as $k=> $v)
                    {
                    $post = $product->getpost($v['tid']);
                    if($post)
                    {
                        if($k == 0)
                        {
                            echo $post->post_title.' ';
                        }
                        else
                        {
                            echo ' /'.$post->post_title.' ';
                        }
                        
                    }
                    }
									    ?>
									</div>
									<div class="lawfirm">
										<a href="#" target="_blank">Check CV <i class="fa fa-external-link"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6" style="">
							<div class="lawyer-calendar" style="max-width: 100%;">
								<div class="bx-viewportss">
									<ul class="bxslider bxslider-1" data-nav="slider-nav0" data-lawyer="1012" data-appointment-type="" style="width: 10215%; position: relative; transition-duration: 0.5s; transform: translate3d(-3599.8px, 0px, 0px);">
									    <!--week first 3 days-->
										<li style="float: left; list-style: none; position: relative; width: 449.987px;" class="bx-clone" aria-hidden="true">
											<div class="calendar_legend row mobile-only">
											    <?php
											    
											    foreach($week as $k=>$v)
											    {
											    $i = $k +1;    
											    if($i <= 3)
											    {
											        ?>
										            		<div class="col-sm-4 flex-container calendar-slider-day" data-date="<?= $v['date']; ?>">
													<div class=""><span><?= $v['dname'] ?> <br> <?= $v['str'] ?></span></div>
												</div>	        
											        <?php
											    }
											    }
											    ?>
											</div>
											<div class="availability_calendar_block row">
											    <?php
											    
											    foreach($week as $k=>$v)
											    {
											    $i = $k +1;    
											    if($i <= 3)
											    {
											        $slots = $product->get_slots($pro->id, $v['date']);
											        if($slots)
											        {
											            ?>
											            	<div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 flex-container">
											            	    <?php
											            	    foreach($slots as $sk=> $sv)
											            {
											                ?>
											                <a class=" event-slot" data-timestamp="1634508900" data-event="EVT-L1012T3073D202110172215" href="<?= $pro->url ?>?bslot=<?= $sv['id'] ?>" target="_blank" rel="nofollow" style="">
															<?= $sv['value'] ?>
													</a>
											                <?php
											            }
											            ?>
													
												</div>
											            <?php
											        }
											        else
											        {
											            ?>
											            	<div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 disabled">
													<div class=""><span>Unavailable</span></div>
												</div>
											            <?php
											        }
											    }
											    }
											    ?>
											</div>
										</li>
										<!--week first 3 days-->
										<!--week second 3 days-->
										<li style="float: left; list-style: none; position: relative; width: 449.987px;" class="bx-clone" aria-hidden="true">
											<div class="calendar_legend row mobile-only">
											    <?php
											    
											    foreach($week as $k=>$v)
											    {
											    $i = $k +1;    
											    if($i > 3 && $i <= 6)
											    {
											        ?>
										            		<div class="col-sm-4 flex-container calendar-slider-day" data-date="<?= $v['date']; ?>">
													<div class=""><span><?= $v['dname'] ?> <br> <?= $v['str'] ?></span></div>
												</div>	        
											        <?php
											    }
											    }
											    ?>
											</div>
											<div class="availability_calendar_block row">
											    <?php
											    
											    foreach($week as $k=>$v)
											    {
											    $i = $k +1;    
											    if($i > 3 && $i <= 6)
											    {
											        $slots = $product->get_slots($pro->id, $v['date']);
											        if($slots)
											        {
											            ?>
											            	<div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 flex-container">
											            	    <?php
											            	    foreach($slots as $sk=> $sv)
											            {
											                ?>
											                <a class=" event-slot" data-timestamp="1634508900" data-event="EVT-L1012T3073D202110172215" href="<?= $pro->url ?>?bslot=<?= $sv['id'] ?>" target="_blank" rel="nofollow" style="">
															<?= $sv['value'] ?>
													</a>
											                <?php
											            }
											            ?>
													
												</div>
											            <?php
											        }
											        else
											        {
											            ?>
											            	<div class="col-lg-4 col-md-4 col-sm-4 col-sm-4 disabled">
													<div class=""><span>Unavailable</span></div>
												</div>
											            <?php
											        }
											    }
											    }
											    ?>
											</div>
										</li>
										<!--week second 3 days-->
									</ul>
								</div>
								
							</div>
							<div id="slider-nav0" class="mobile-only">
								<div class="slide-back">
									<a class="bx-prev" href=""></a>
									<a class="slider_controls goto_prev" href="#">
										<div class="icon icon-chevron-left"></div>
									</a>
									<a class="bx-prev" href=""></a>
									<a class="slider_controls goto_prev" href="#">
										<div class="icon icon-chevron-left"></div>
									</a>
								</div>
								<div class="slide-forward">
									<a class="bx-next" href=""></a>
									<a class="slider_controls goto_next" href="#">
										<div class="icon icon-chevron-right"></div>
									</a>
									<a class="bx-next" href=""></a>
									<a class="slider_controls goto_next" href="#">
										<div class="icon icon-chevron-right"></div>
									</a>
								</div>
							</div>
						</div>
					</div>
				        <?php
				    }
				    ?>
					<!-- /row -->
					<div class="pagination_fg">
						<?php
						if($cpage)
						{
						    $i = $cpage-1;
						    ?>
						    <a href="<?= base_url('index/search/').$i.'?'.http_build_query($_REQUEST); ?>">&laquo;</a>
						    <?php
						}
						for($i= 0;$i<=$tpage;$i++)
						{
						    $show = $i+1;
						    ?>
						    <a href="<?= base_url('index/search/').$i.'?'.http_build_query($_REQUEST); ?>" class="<?= ($i == $cpage)?"active":""; ?>"><?= $show ?></a>
						    <?php
						}
						if($cpage < $tpage)
						{
						    $i = $cpage+1;
						    ?>
						    <a href="<?= base_url('index/search/').$i.'?'.http_build_query($_REQUEST); ?>">&raquo;</a>
						    <?php
						}
						?>
						
					</div>
				</div>
				<!-- /col -->
			</div>
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_1">
						<ul>
							<li><a href="about.html">About us</a></li>
							<li><a href="help.html">Add your restaurant</a></li>
							<li><a href="help.html">Help</a></li>
							<li><a href="account.html">My account</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_2">Categories</h3>
					<div class="collapse dont-collapse-sm links" id="collapse_2">
						<ul>
							<li><a href="listing-grid-1-full.html">Top Categories</a></li>
							<li><a href="listing-grid-2-full.html">Best Rated</a></li>
							<li><a href="listing-grid-1-full.html">Best Price</a></li>
							<li><a href="listing-grid-3.html">Latest Submissions</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_3">Contacts</h3>
					<div class="collapse dont-collapse-sm contacts" id="collapse_3">
						<ul>
							<li><i class="icon_house_alt"></i>97845 Baker st. 567<br>Los Angeles - US</li>
							<li><i class="icon_mobile"></i>+94 423-23-221</li>
							<li><i class="icon_mail_alt"></i><a href="#0">info@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3 data-target="#collapse_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_4">
						<div id="newsletter">
							<div id="message-newsletter"></div>
							<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
								<div class="form-group">
									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
									<button type="submit" id="submit-newsletter"><i class="arrow_carrot-right"></i></button>
								</div>
							</form>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $assets; ?>/img/twitter_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $assets; ?>/img/facebook_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $assets; ?>/img/instagram_icon.svg" alt="" class="lazy"></a></li>
								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $assets; ?>/img/youtube_icon.svg" alt="" class="lazy"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-lg-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
						<li>
							<div class="styled-select currency-selector">
								<select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
							</div>
						</li>
						<li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $assets; ?>/img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
						<li><span>© 2019 Foogra</span></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->
	<div id="toTop"></div>
	<!-- Back to top button -->
	<div class="layer"></div>
	<!-- Opacity Mask Menu Mobile -->
	<!-- Sign In Modal -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="modal_header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="ti-email"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="ti-lock"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
							<input type="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center">
					<input type="submit" value="Log In" class="btn_1 full-width mb_5">
					Don’t have an account? <a href="account.html">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Modal -->
	<!-- COMMON SCRIPTS -->
	<script src="<?= $assets; ?>/js/common_scripts.min.js"></script>
	<script src="<?= $assets; ?>/js/common_func.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<!-- SPECIFIC SCRIPTS -->
	<script src="<?= $assets; ?>/js/sticky_sidebar.min.js"></script>
	<script src="<?= $assets; ?>/js/specific_listing.js"></script>
      <!-- 	<script>
         $(document).ready(function(){
         	$('.slider').bxSlider();
         });
     </script> -->
     <script>
         //init sliders
         jQuery(function($){


         	for (var i=1; i<4; i++) {

         		var boxSlider = $(".bxslider-"+i);
         		
         		if (window.matchMedia('(max-width: 767px)').matches) {
         			boxSlider.bxSlider({
         				slideMargin: 5,
         				pager: false,
         				controls: true,
         				minSlides: 1,
         				moveSlides: 1,
         				touchEnabled:false,
         				auto: false,
         				autoHover: true,
         				nextText: '<img src="<?= $assets; ?>/img/right.png" height="25" width="25"/>',
         				prevText: '<img src="<?= $assets; ?>/img/left.png" height="25" width="25"/>'
         			});
         		} else {
         			boxSlider.bxSlider({
         				slideMargin: 5,
         				pager: false,
         				controls: true,
         				touchEnabled:false,
         				minSlides: 3,
         				moveSlides: 1,
         				auto: false,
         				autoHover: true,
         				nextText: '<img src="<?= $assets; ?>/img/right.png" height="25" width="25"/>',
         				prevText: '<img src="<?= $assets; ?>/img/left.png" height="25" width="25"/>'
         			});
         		}



         	}


         });
         var BASE_URL = '<?= base_url(); ?>';
     </script>
     <script type="text/javascript" src="<?= base_url(); ?>/assets/front//js/filter1.js"></script>
 </body>
 </html>