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
				<h2>Reset password</h2>
				<form class="form-inline" action="<?= base_url('Auth/setPassword'); ?>" method="post">
					<input type="hidden" name="email" value="<?= $user['email'] ?>">
					<div class="form-group">
						<label for="password">New Password</label>
						<input type="password" class="form-control" id="password" placeholder="Enter new password*" name="upassword" required>
				    </div>
				    <div class="form-group">
						<label for="conpassword">Confirm Password</label>
						<input type="password" class="form-control" id="conpassword" placeholder="Enter cofirm password" name="conpassword" required>
				    </div>
				    <input type="submit" class="btn btn-default" value="Reset Password">
				    
				</form>
			</div>
		</div>
	</div>	
</div>