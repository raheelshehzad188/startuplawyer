<style>
.current_page{
	background-color: #e51261 !important;
    color: white !important;
}	
</style>
<div class="container">
		<div class="banner">
			<img src="<?php echo $assets; ?>images/Untitled-7.png">
			<div class="bannertext">
				<h3>Our Motto:</h3>
				<p>Read and Help People read. After All as Napolean Bonaparte said “Show me a family of readers, and I will show you the people who move the world.”</p>
			</div>
		</div>
		<div class="boxes">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="box">
						<img src="<?php echo $assets; ?>images/pro4.png">
						<strong><a href="<?= base_url() ?>index/addbook">New Additions</a></strong>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="box" >
						<img src="<?php echo $assets; ?>images/pro5.png">
						<strong><a href="<?= base_url() ?>index/books">Find Your Book</a></strong>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="box">
						<img src="<?php echo $assets; ?>images/pro6.png">
						<strong><a href="<?= base_url() ?>index/availableBook">Borrow Book</a></strong>
					</div>
				</div>
			</div>
		</div>
		<div class="smalltext">
			<img src="<?php echo $assets; ?>images/pro7.png">
			<h3>Latest Books</h3>
			<p>Read and help people to read</p>
		</div>
		<div class="products">
			<div class="row">
				<?php
				$CI =& get_instance();
				foreach ($books as $key => $value) {
					$CI->template->box('box',$value);
					?>
					<?php
				}
				?>
				
			</div>
			<div class="row" style=" margin-left: 40%;">
				<?php echo $links ?>
			</div>
		</div>
	</div>