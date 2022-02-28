<div class="col-md-3 col-sm-3">
	<div class="productbox">
		<div class="productig">
			<a href="<?= base_url('index/single/'); ?><?= $bookID ?>"><img src="<?php echo cloudinary_url($img, array('width' => 160, 'height' => 250, 'crop' => 'fill'));; ?>"></a>
		</div>
		<div class="productDet">
			<a href="<?= base_url('index/single/'); ?><?= $bookID ?>">
				<strong><?= $title ?></strong>
				<h3><?= $author ?></h3>
			</a></strong>
		</div>
	</div>
</div>
