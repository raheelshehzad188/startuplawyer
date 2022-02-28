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
	<title>Foogra - Discover & Book the best restaurants at the best price</title>
	<!-- Favicons-->
	<link rel="shortcut icon" href="<?= $assets; ?>/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?= $assets; ?>/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?= $assets; ?>/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?= $assets; ?>/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?= $assets; ?>/img/apple-touch-icon-144x144-precomposed.png">
	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
	<!-- BASE CSS -->
	<style>
	    .advance aside{
	        max-width:20% !important;
	    }
	</style>
	<link href="<?= $assets; ?>/css/bootstrap_customized.min.css" rel="stylesheet">
	<link href="<?= $assets; ?>/css/style.css" rel="stylesheet">
	<!-- SPECIFIC CSS -->
	<link href="<?= $assets; ?>/css/listing.css" rel="stylesheet">
	<link href="<?= $assets; ?>/css/listing-filter.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- YOUR CUSTOM CSS -->
	<link href="<?= $assets; ?>/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
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
		<div class="page_header element_to_stick d-none">
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
						<h1>145 restaurants in Convent Street 2983</h1>
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
		<div class="container margin_30_40">
			<div class="row advance">
			    
				<?php $this->load->view('../includes/sidebar-filter.php') ?>
				<div class="col-lg-9">
				    <?php
				    foreach($products as $k=> $v)
				    {
				        $pro = $product->getproduct( $v['id'] );
				        $user = $product->getuser( $v['uid'] );
				        $modal->table = 'product_to_tags';
				        $modal->key = 'id';
				        $tags = $modal->get(array('pid'=> $v['id']));
				        $modal->table = 'product_to_locations';
				        $modal->key = 'id';
				        $loc = $modal->get(array('pid'=> $v['id']));
				        
				        
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



				<div class="col-lg-3 col-md-6" style="">



					<h3 data-target="#collapse_1">Quick Links</h3>



					<div class="collapse dont-collapse-sm links" id="collapse_1">



						


<?php
				    $wp = wp_data();
				    echo $wp['footer_menu'];
				    ?>



					</div>



				</div>



				<div class="col-lg-3 col-md-6">



					<h3 data-target="#collapse_2">Ask Any Question </h3>



					<div class="collapse dont-collapse-sm links" id="collapse_2">



						<ul>



							<li><a href="<?= site_url(); ?>/launch-chat-bot/">Launch Chat bot</a></li>



							<li><a href="https://startuplawyer.lk/main/blog/videos/">Watch “How to” videos</a></li>



						</ul>


	<div class="follow_us">



							<h5>Follow Us</h5>



							<ul>

								<li><a href="#0"><i style="    font-size: 21px;

    color: white;

    background: #142954;

    padding: 8px 13px;" class="fa fa-facebook"></i></a></li>

    <li><a href="#0"><i style="    font-size: 21px;

    color: white;

    background: #142954;

    padding: 8px 13px;" class="fa fa-youtube"></i></a></li>

								<li><a href="#0"><i style="    font-size: 21px;

    color: white;

    background: #142954;

    padding: 8px 13px;" class="fa fa-linkedin"></i></a></li>



								<!-- <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/twitter_icon.svg" alt="" class="lazy"></a></li> -->



								<!-- <li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/facebook_icon.svg" alt="" class="lazy"></a></li>



								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/instagram_icon.svg" alt="" class="lazy"></a></li>



								<li><a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/youtube_icon.svg" alt="" class="lazy"></a></li> -->



							</ul>



						</div>
						<!-- <ul>



							<li><a href="listing-grid-1-full.html">Top Categories</a></li>



							<li><a href="listing-grid-2-full.html">Best Rated</a></li>



							<li><a href="listing-grid-1-full.html">Best Price</a></li>



							<li><a href="listing-grid-3.html">Latest Submissions</a></li>



						</ul> -->



					</div>



				</div>



				<div class="col-lg-3 col-md-6">


						<h3 data-target="#collapse_3">Contacts</h3>



					<div class="collapse dont-collapse-sm contacts" id="collapse_3">



						<ul>



							<li><i class="icon_house_alt"></i><?= $RET =  get_option( 'contact_address', '97845 Baker st. 567' ); ?></li>



							<li><i class="icon_mobile"></i><a href="tel:+94722782500 "><?= get_option( 'contact_phone', '+94722782500 ' ); ?></a></li>



							<li><i class="icon_mail_alt"></i><a href="mailto:<?= get_option( 'contact_mail', 'info@domain.com' ); ?>"><?= get_option( 'contact_mail', 'info@domain.com' ); ?></a></li>



						</ul>



					</div>



				</div>



				<div class="col-lg-3 col-md-6">



						<h3 data-target="#collapse_4">WE SUPPORT STARTUPS DURING COVID</h3>



						<p>Claim free webinars, services & Consultations from Lawyers, Company Secretaries, Business Consultants and Mediators on first come first serve basis. 
Please register to be informed every time free resources are posted.</p>



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



									<option value="US Dollars" selected> LKR</option>



									<!-- <option value="Euro">Euro</option> -->



								</select>



							</div>



						</li>



					<!--	<li><img style="    width: auto;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="<?= $url; ?>img/cards_all_01.png" alt="" width="198" height="30" class="lazy"></li>-->


					</ul>



				</div>



				<div class="col-lg-6">



					<ul class="additional_links">



						<!-- <li><a href="#0">Terms and conditions</a></li>



						<li><a href="#0">Privacy</a></li> -->



						<li><span><p><b>Copyright © 2021 Startup Lawyer (Pvt) Ltd</b></p></span></li>



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
	<!-- Sign In Modal -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide"> 
		<div class="modal_header">
			<h3>Sign In</h3>
		</div>
		<form method="post" action="<?= base_url(); ?>api/front_login" id="login_form" >
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook" onclick="tlogin();">Login with Facebook</a>
				<a href="#0" class="social_bt google"  id="googleSignIn">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="uname" id="email" style="width:100%;">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="upass" id="password" value="" style="width:100%;">
					<i class="icon_lock_alt"></i>
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
					<button  type="button" onclick="submit_form('login_form');" id="sbtn" class="btn_1 full-width mb_5">Log In</button>
					Don’t have an account? <a href="<?= base_url('auth/register'); ?>">Sign up</a>
				</div>
				
				</form>
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
	<script src="assets/validate.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<!-- SPECIFIC SCRIPTS -->
	<script src="<?= $assets; ?>/js/sticky_sidebar.min.js"></script>
	<script src="<?= $assets; ?>/js/specific_listing.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
var slug = " ";
function show_loader(){
            var html = '<img src="<?= base_url(); ?>/wp-content/themes/srtartuplawyer/assets//img/load.gif" style="width: 48px;margin: 0 auto;" />';
                $('.modal-body').html(html);
        }
        function validate_form(form_id)
        {
            var mid = '#'+form_id;
            var error = 1;
            // $(mid+'.required').hide();
            $(mid+'> .required').each(function(i, obj) {
                $(this).removeClass('input_error');
                if($(this).val() == '')
                {
                    error = 0;
                    $(this).addClass('input_error');
                }
            });
            // alert(error);
            return error;
        }
function submit_form(form_id)
{
        var vali =  validate_form(form_id);
        if(vali > 0)
        {
            var mid = '#'+form_id;
            var before_text = ''
            if(form_id == 'login_form')
            {
                before_text = $(mid+' #sbtn').text();
            }
            else
            {
                before_text = $(mid+' button').text();
            }
            
            if(form_id != ' ')
            {
                
                  $.ajax({
                    url: $(mid).attr('action'),
                    method: $(mid).attr('method'),
                    data: $(mid).serialize(),
                    beforeSend: function() {
                        if(form_id == 'login_form')
            {
                $(mid+' #sbtn').text('Loading ...')
            }
            else
            {
                $(mid+' button').text('Loading ...')
            }
                    },
                    success: function(data) {
            
                      setTimeout(function(){ 
                                      if(form_id == 'login_form')
            {
                $(mid+' #sbtn').text(before_text);
            }
            else
            {
                $(mid+' button').text(before_text);
            }
                        form_response(data,form_id);    
                          
                      }, 3000);
                    },
                    error: function() {
                        
                    }
                });
            }
        }
}
function ajax_url(url, type)
{
        // $('#exampleModalCenter .modal-dialog').removeClass('modal-lg');
        // alert(url);
        if(url != ' ')
        {
            $('#exampleModalCenter').modal('show');
              $.ajax({
                url: url,
                beforeSend: function() {
                    show_loader();
                },
                success: function(data) {
                    alert(type);
                    if(type == 'email_print')
                    {
                        // $('#exampleModalCenter .modal-dialog').addClass('modal-lg');
                    }
                    else if(type == 'wishlist')
                    {
                        if(data.status)
                        {
                            alert('success');
                        }
                        else
                        {
                            alert('error');
                        }
                    }
                  setTimeout(function(){ 
                    modal_response(data);    
                      
                  }, 3000);
                },
                error: function() {
                    
                }
            });
        }
}
        function form_response(data,form_id)
        {
            var obj = JSON.parse(data);
            var mid = '#'+form_id;
            if(obj['msg'])
            {
                $('.ajax_alert').remove();
                var alert_msg= '<div class="ajax_alert">'+obj['msg']+'</div>';
                $(mid).prepend(alert_msg);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
        function modal_response(data)
        {
            var obj = JSON.parse(data);
            if(obj['html'])
            {
                $('.modal-body').html(obj['html']);
            }
            console.log(obj);
            if(obj['red'])
            {
                setTimeout(function(){ 
                    window.location.href = obj['red'];
                      
                  }, 3000);
                
            }
        }
        
	    <?php
	    if(isset($_REQUEST['rate']))
	    {
	        ?>
	        var $rateYo = $("#rateYo").rateYo();

	        function view_rate(rate,msg)
	        {
	           // rate = 4;
	            $('#rating').modal('show');
                $rateYo.rateYo("rating", rate);
                $rateYo.attr("data-rateyo-read-only", true);
                $rateYo.rateYo("option", "readOnly",true);
                $('#rform textarea').val(msg);
                $('#rform button').hide();
	        }
	        function order_rate(oid)
{
    $('#rform button').show();
    $('#rform textarea').val(' ');
    $rateYo.rateYo("rating", 0);
    $rateYo.attr("data-rateyo-read-only", false);
                $rateYo.rateYo("option", "readOnly",false);
	
	$('#oid').val(oid);
	$('#rating').modal('show');

}
	        $('#rform').submit(function(e){
	            $('#rform button').attr('disabled','disabled');
	            $('#rform button').text('Loading ...');
	            $rateYo.val($('#rateYo').attr('rate'));
	           // alert($('#rateYo').attr('rate'));
	            $('#rate').val($('#rateYo').attr('rate'));
	           // alert($('#rate').val());
	            var foirm = $("#rform").serialize();
	            $.ajax({
    type: "POST",
    url: "",
    data: foirm,
    success: function(data) {
        var obj = $.parseJSON(data);
        $('#rform button').removeAttr('disabled');
        $('#rform button').text('Submit');
        console.log(obj);
        console.log(data);
        if(obj["status"])
        {
            $('#rating').modal('hide');
swal({title: "Good job", text: obj['msg'], type: 
"success"}).then(function(){ 
   location.reload();
   }
);

        }
    },
    error: function() {
        alert('error handling here');
    }
});
	           e.preventDefault();

	        });
	        function goRate(oid){
	           // alert(oid);
	            $('#oid').val(oid);
	            $('#rating').modal('show');

	        }
	        $('.woocommerce-MyAccount-navigation ul li').each(function(i, obj) {
    $(this).removeClass('is-active');
});
$('.woocommerce-MyAccount-navigation-link--rate').addClass('is-active');
	        <?php
	    }
	    elseif(isset($_REQUEST['chat']))
	    {
	        ?>
	        $('.woocommerce-MyAccount-navigation ul li').each(function(i, obj) {
    $(this).removeClass('is-active');
});
$('.woocommerce-MyAccount-navigation-link--chat').addClass('is-active');
	        <?php
	    }
	    elseif(isset($_REQUEST['bill']))
	    {
	        ?>
	        $('.woocommerce-MyAccount-navigation ul li').each(function(i, obj) {
    $(this).removeClass('is-active');
});
$('.woocommerce-MyAccount-navigation-link--bill').addClass('is-active');
	        <?php
	    }
	    ?>
	</script>
	<script>
	window.fbAsyncInit = function() {
    FB.init({
      appId      : '189871496142902', // App ID
      status     : false, 
      version:  'v9.0',
      cookie     : true, 
      xfbml      : false  // parse XFBML
    });
};
  function tlogin() {
    FB.login(function(response) {
        alert();
        console.log(response);
        if (response.authResponse) {
            // connected
            console.log(response.authResponse.accessToken);
            var url = "<?= base_url(); ?>";
            var url = url+"api/social_login?type=panel&access_token="+response.authResponse.accessToken+"&sid="+response.authResponse.userID;
            console.log("Api response");
            console.log(response);
            $.ajax({
      type: "POST",
      url: url,
      success: function (result) {
         console.log(result);
         var obj = JSON.parse(result);
         if(obj['rurl'])
         {
         window.location.replace(obj['rurl']);
         }
      }
 });
        } else {
            alert("cancelled");
            // cancelled
        }
    }, { scope: 'email' });
    }

function testAPI() {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?scope=email',function(response) {
        var email = '';       
        alert();
        console.log(response);
        if(response.email)
        email = response.email;
    var url = "<?= base_url(); ?>login";
    url = url+"?social_type=facebook"+"&id="+response.id+"&email="+email+"&email="+email;
        console.log('Good to see you, ' + response.name + '.' + ' Email: ' + response.email + ' Facebook ID: ' + response.id);
    });
}

</script>
<!-- COMMON SCRIPTS -->
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
         		boxSlider.bxSlider({

         			slideMargin: 5,
         			pager: false,
         			controls: true,
         			touchEnabled:false,
         			minSlides: 4,
         			moveSlides: 1, 
         			auto: false,
         			autoHover: true,
         			nextText: '<img src="<?= $assets; ?>/img/right.png" height="25" width="25"/>',
         			prevText: '<img src="<?= $assets; ?>/img/left.png" height="25" width="25"/>'
         		});


         	}


         });
     </script>
     <script src="<?= $url ?>/js/filter.js"></script>
 </body>
 </html>