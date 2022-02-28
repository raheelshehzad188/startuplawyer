
		<div class="register">
	<div class="container">
			<div class="">
				<div class="formarea">
					<h2>Reset password</h2>
					<form class="form-inline" action="<?= base_url('auth/sendRestMail'); ?>" method="post">
						<?= $this->load->view('flash') ?>
						
					    <div class="form-group">
					      	<input type="email" class="form-control" id="" placeholder="Email*" name="email">
					    </div>
					    
					    <input type="submit" class="btn btn-default" value="Reset Password">
					    
					</form>
				</div>
			</div>
		</div>	
		
	</div>