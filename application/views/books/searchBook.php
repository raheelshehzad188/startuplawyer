<style>
.current_page{
	background-color: #e51261 !important;
    color: white !important;
}	
</style>
<div class="container">
	<div class="searchResult">
		<div class="smalltext">
			<h3>Searching for: "<?= trim($key) ?>"</h3>
		</div>
		<div class="products">
			<div class="row">
				<?php if (isset($books) && count($books)>0): ?>
					<?php foreach ($books as $key => $book): ?>
						<?php if ($key % 4==0): ?>
				<div class="clearfix" >
				</div>	
				 		<?php endif ?>
                    <?php
					$CI =& get_instance();
					$CI->template->box('box',$book);	
					?>
					<?php endforeach ?>
				<?php else: ?>
				<div class="col-md-12 col-sm-12">
					<div class="productbox">	
					<h4>Sorry Book not found !.</h4>
					</div>
				</div>	
				<?php endif ?>
			</div>
			<div class="row" style=" margin-left: 40%;">
				<?php echo $links ?>
			</div>
		</div>
	</div>
</div>