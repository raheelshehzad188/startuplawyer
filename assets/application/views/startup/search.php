<link href="http://www.ansonika.com/foogra/css/listing.css"/>
<?php
/* Template Name: Booking Page */ 
header('Access-Control-Allow-Origin: *');
$week = array();
for($i=1; $i <=7;$i++)
{
    $date = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$i.' day'));
    $dname = date("D", strtotime($date));
    $week[] = array(
        'date'=> $date,
        'dname'=> $dname,
        'str'=> date("d  / m", strtotime($date))
        );


}
$url = get_assets_url();

if(isset($_GET['test']))
{
    
    $ret = get_slots('360', '2020-08-09'); 
    print_r($ret);
    die();
}

if(isset($_REQUEST['search_ajax']))
{
    
}
?>
		<!-- /page_header -->
		<form id="filter_form" action="<?= base_url('index/page'); ?>/search_ajax">
			<input type="hidden" name="search_ajax" value="1">
			<input type="hidden" name="srch" value="<?= (isset($_REQUEST["srch"])?$_REQUEST["srch"]:""); ?>">
			<input type="hidden" name="pcat" value="<?= (isset($_REQUEST["pcat"])?$_REQUEST["pcat"]:"0"); ?>">
			<input type="hidden" name="from" value="<?= isset($_REQUEST["from"])?$_REQUEST["from"]:""; ?>"/>
			<input type="hidden" name="fc_check" value="<?= isset($_REQUEST["fc_check"])?$_REQUEST["fc_check"]:""; ?>"/>
			<input type="hidden" name="dist" value="<?= isset($_REQUEST["dist"])?$_REQUEST["dist"]:""; ?>"/>
			<input type="hidden" name="free" value="<?= isset($_REQUEST["free"])?$_REQUEST["free"]:""; ?>"/>
			<input type="hidden" name="refund" value="<?= isset($_REQUEST["refund"])?$_REQUEST["refund"]:""; ?>"/>
			<input type="hidden" name="parent_search" value="<?= isset($_REQUEST["parent_search"])?$_REQUEST["parent_search"]:""; ?>"/>
			<input type="hidden" name="language" value="<?= (isset($_REQUEST["language"])?$_REQUEST["language"]:"0"); ?>">
			<input type="hidden" name="min_price" value="<?= (isset($_REQUEST["min_price"])?$_REQUEST["min_price"]:"1"); ?>">
			<input type="hidden" name="max_price" value="<?= (isset($_REQUEST["max_price"])?$_REQUEST["max_price"]:"50000"); ?>">
			<input type="hidden" name="parea" value="<?= (isset($_REQUEST["parea"])?$_REQUEST["parea"]:""); ?>">
			<input type="hidden" name="location" value="<?= (isset($_REQUEST["location"])?$_REQUEST["location"]:""); ?>">
		</form>
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- /Map -->

		<div class="container margin_30_40">			
			<div class="row">
				<?php $this->load->view('includes/sidebar-filter.php') ?>
				

				<div class="col-lg-9 full_lowyer_days ">
					<div class="col-sm-12 head" id="sticky_head">
						<div class="row">
							<div class="col col-md-6">
								<div class="filters_header"><h1>Book a Service Provider</h1></div>
							</div>
							<div class="col col-md-6 small-hide" style="padding: 0;">
								<div class="owl-carousel md_slider slider_days owl-theme days_carousel1">
								    <?php
								    foreach($week as $k=>$v)
								    {
								        ?>
								        <div class="item">
										<div class="item_days text-center">
				                            <div class="flex-item"><span><?= $v['dname'] ?> <br> <?= $v['str'] ?></span></div>
				                        </div>
									</div>
								        <?php
								    }
								    ?>
									
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 search-results-lawyer content_day loader_div" style="height: 500px;">
					<img src="<?= $url ?>/img/load.gif">
				</div>
					<div class="col-sm-12 search-results-lawyer content_day result_div">
					</div>
				</div>
				<!-- mobile lowyer days selecting -->
				<div class="col-lg-9 sm_lowyer_days ">
					<div class="search_filters_lower">
						<div class="col col-sm-12">
							<div class="filters_header"><h1>Find a Lawyers</h1></div>
						</div>
					</div>
					<div class="search-results-lawyer">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="lawyer_block">
										<a href="" target="_blank"><span class="avatar" style="background-image: url(https://cdn.lawtap.com/thumbs/profile_image_small/lawyers/5774b8c440303.jpg);"></span></a>
										<div class="name name-lawfirm">
						                    <a href="" target="_blank"><strong>Jacob Carswell-Doherty</strong></a>
						                </div>
						                <div class="lawfirm">
				                            <a href="" target="_blank">Foulsham &amp; Geddes</a>
				                        </div>
				                        <div class="rating">
                        					<span class="">
										            <i class="fa fa-star"></i>
										                <i class="fa fa-star"></i>
										                <i class="fa fa-star"></i>
										                <i class="fa fa-star"></i>
										                <i class="fa fa-star"></i>
										    </span>(2) 
										    <div class="review">Very much appreciated – Jacob provided efficient and excellent work...</div>      
										</div>
										<div class="top-practice-areas">
											<a class="badge" href="">Employment Law</a>
											<a class="badge" href="">Business Law</a>
											<a class="badge" href="">Litigation & Dispute Resolution</a>
										</div>
										<div class="badges">
		                					<div class="badge free-consultation">
					                      		<span class="fa fa-check"></span>Free First Consultation
						                    </div>
		                                    <div class="badge fixed-price">
						                      <span class="fa fa-check"></span>Fixed Cost Services
						                    </div>
		                                </div>
		                                <div class="price">
			                                $400.00 – $450.00
			                            </div>
			                            <div class="address">
                                            <div class="location">
			                                	<span class="glyphicon glyphicon-map-marker"></span>
			                                	Sydney

			                                	0.2 km
			                            	</div>
			                            </div>
									</div>
								</div>	
								<div class="col-12">
									<div class="owl-carousel mobile_crosel slider_days owl-theme categories_carousel">
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Mon <br> 29/6</span></div>
					                        </div>
										</div>
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Tue <br> 29/6</span></div>
					                        </div>
										</div>
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Wed <br> 29/6</span></div>
					                        </div>
										</div>
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Thu <br> 29/6</span></div>
					                        </div>
										</div>
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Fri <br> 29/6</span></div>
					                        </div>
										</div>
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Sat <br> 29/6</span></div>
					                        </div>
										</div>
										<div class="item">
											<div class="item_days text-center">
					                            <div class="flex-item"><span>Sun <br> 29/6</span></div>
					                        </div>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-xs-4 flex-container">
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
										</div>
										<div class="col-xs-4 flex-container">
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
										</div>
										<div class="col-xs-4 flex-container">
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
											<div class="slid_time">
												<a class="flex-item event-slot" href="" style="">
				                                    <span>
				                                        4:45 am
				                                    </span>
		                            			</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /col -->
			</div>		
		</div>
		<!-- /container -->
		
	</main>