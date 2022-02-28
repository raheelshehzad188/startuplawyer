<?php /* Template Name: Benefit page */ 


$url = get_assets_url();
$pid = get_the_ID();
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($pid) );

?>

<?php get_header('home'); ?>

<link href="<?= $url; ?>css/submit-rider.css" rel="stylesheet">



	<main>
		<div class="hero_single inner_pages background-image" data-background="url(<?= $feat_image ?>)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>Become a Foogra Rider</h1>
							<p>Flexible work, competitive fees</p>
							<a href="#apply" class="btn_1 gray btn_scroll">Apply Now</a>
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
				<h2>Why Submit to Foogra</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>

			<div class="row justify-content-center add_bottom_45">
				<div class="col-lg-4 col-md-6">
					<div class="box_topic">
						<figure><img src="<?= $url ?>img/icon_submit_1.svg" alt="" width="110" height="100"></figure>
						<h3>Your compensation</h3>
						<p>What you earn per order depends on your experience and ratings.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box_topic">
						<figure><img src="<?= $url ?>img/icon_submit_2.svg" alt="" width="110" height="100"></figure>
						<h3>Choose when to work</h3>
						<p>You’ll be self-employed and free to work to your own availability.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="box_topic">
						<figure><img src="<?= $url ?>img/icon_submit_3.svg" alt="" width="110" height="100"></figure>
						<h3>You will only need</h3>
						<p>Your vehicle (motorcycle, bike or car), an iPhone or Android device.</p>
					</div>
				</div>
			</div>
			<!-- /row -->

			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
					<div class="main_title center">
						<h3 style="margin-bottom: 0;">Frequent questions</h3>
						<p>Here you'll be able find answers your questions</p>
					</div>

					<div role="tablist" class="add_bottom_15 accordion_2" id="accordion_group">
						<div class="card">
							<div class="card-header" role="tab">
								<h5>
									<a data-toggle="collapse" href="#collapseOne" aria-expanded="true"><i class="indicator icon_minus-06"></i>Introdocution</a>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" role="tabpanel" data-parent="#accordion_group">
								<div class="card-body">
									<p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5>
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">
										<i class="indicator icon_plus"></i>Generative Modeling Review
									</a>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" role="tabpanel" data-parent="#accordion_group">
								<div class="card-body">
									<p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5>
									<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
										<i class="indicator icon_plus"></i>Variational Autoencoders
									</a>
								</h5>
							</div>
							<div id="collapseThree" class="collapse" role="tabpanel" data-parent="#accordion_group">
								<div class="card-body">
									<p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
					</div>
					<!-- /accordion group -->
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
		
	</main>
	<!-- /main -->


<?php get_footer('home'); ?> 