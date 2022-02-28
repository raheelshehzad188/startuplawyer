<div class="register">
	<div class="container">
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
		</div>
	<?php endif ?>
	<?php if ($this->session->flashdata('warning')): ?>
		<div class="alert alert-warning alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Warning!</strong> <?= $this->session->flashdata('warning'); ?>
		</div>
	<?php endif ?>	
		<div class="">
			<div class="formarea">
				<h2>Code Verification</h2>
				<form class="form-inline" action="<?= base_url('Auth/verify'); ?>" method="post">
					<input type="hidden" name="email" value="<?= $email ?>">
					<div class="form-group">
						<label for="token">Code</label>
						<input type="text" class="form-control" id="token" placeholder="Enter token here*" name="token" required>
				    </div>
				    <input type="submit" class="btn btn-default" value="Verify">
				    
				</form>
			</div>
		</div>
	</div>	
</div>