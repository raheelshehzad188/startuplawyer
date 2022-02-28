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
				<h2>Enter Reset Password Code</h2>
				<form class="form-inline" action="<?= base_url('Auth/Confirm'); ?>" method="post">
					<div class="form-group">
				      	<input type="password" class="form-control" id="" placeholder="Enter reset code*" name="token" required>
				    </div>
				    <input type="submit" class="btn btn-default" value="Confirm Code">
				    
				</form>
			</div>
		</div>
	</div>	
</div>