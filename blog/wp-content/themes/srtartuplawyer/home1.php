<?php /* Template Name: Home1 page */ 


$url = get_assets_url();

?>

<?php get_header('home'); ?>



	<main>
		<div class="hero_single inner_pages background-image" data-background="url(<?= $url ?>img/hero_general.jpg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-8 col-lg-10 col-md-8">
							<h1>Help and support</h1>
							<p>Search questions or useful articles</p>
							<form>
							<div class="search_bar">
								<input type="text" class="form-control" placeholder="What are you looking for?">
								<input type="submit" value="Search">
							</div>
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
				    <h2>Select a topic</h2>
				    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<span><i class="icon_wallet"></i></span>
							<h3>Payments</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_cloud-upload_alt"></i>
							<h3>Submission</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_lifesaver"></i>
							<h3>General help</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_globe-2"></i>
							<h3>International</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_document_alt"></i>
							<h3>Cancellation</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_comment_alt"></i>
							<h3>Reviews</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
		<div class="container margin_60_40">
				<div class="main_title version_2">
					<span><em></em></span>
					<h2>Popular articles</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="list_articles add_bottom_25 clearfix">
					<ul>
						<li><a href="#0"><i class="icon_documents_alt"></i>Et dicit vidisse epicurei pri</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Ad sit virtute rationibus efficiantur</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Partem vocibus omittam pri ne</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Case debet appareat duo cu</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Impedit torquatos quo in</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Nec omnis alienum no</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Quo eu soleat facilisi menandri</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Et dicit vidisse epicurei pri</a></li>
					</ul>
				</div>
				<!-- /list_articles -->
			</div>
			<!-- /container -->
	</main>
	<!-- /main -->



<?php get_footer('home'); ?> 