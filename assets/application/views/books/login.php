<div class="container">
		<div class="register">
			<div class="">
				<div class="formarea">
					<h2>Login AT SHARE YOUR BOOK</h2>
					<form method="post" class="form-inline" action="<?= base_url('auth/post') ?>">
						<?= $this->load->view('flash') ?>
						
					    <div class="form-group">
					      	<input type="email" class="form-control" id="" placeholder="Email*" name="uname">
					    </div>
					    <div class="form-group">
					      	<input type="password" class="form-control" id="" placeholder="Password*" name="upass">
					    </div>
					    <div class="checkbox">
                            <label>
                          		<input type="checkbox" name="remember">Remember me</label>
                        </div>
                        <a class="btn btn-link" href="<?php echo base_url('/auth/register'); ?>">Create an account </a>
                         <a class="btn btn-link" href="<?php echo base_url('/auth/reset'); ?>">Forgot my password </a>
					    <input type="submit" class="btn btn-default" value="Sign In">
					    
					</form>
				</div>
			</div>
		</div>	
		
	</div>