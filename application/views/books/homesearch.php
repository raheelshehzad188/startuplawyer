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
	<div class="smalltext">
	    	<div class="search search-box" style="position: relative;float: none;margin: auto;width: 50%; ">
			<form class="form-inline" action="<?= base_url('index/books') ?>" method="post">
				<div class="form-group">
			      	<input type="text" class="form-control search-input"  placeholder="Search...Title / Author / ISBN number" name="key" style="position: relative;float: left;" value="<?= $key ?>">
			    </div>
			    <input type="submit" name="submit" class="btn btn-default" value="Submit">
			</form>
		</div>
	<!--	<img src="<?php //echo $assets; ?>images/pro7.png">-->
	<br/><br/>
		<h3>Find Your Book</h3>
		<p>Read and help people to read</p>
	</div>
	
	  
	<div class="products">
		<div class="row">
			<?php
			$CI =& get_instance();
			if(count($books)>0){
			foreach ($books as $key => $value) {
				$CI->template->box('box',$value);
				?>
				<?php
			}
			}else{
			?>
				<div class="col-md-12 col-sm-12">
					<div class="productbox">	
					<h4>Sorry Book not found !.</h4>
					</div>
				</div>	
				<?php } ?>
		</div>
		<div class="row" style=" margin-left: 40%;">
			<?php echo $links ?>
		</div>
	</div>
</div>

