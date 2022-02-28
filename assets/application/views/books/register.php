<div class="container">
		<div class="register">
			<div class="">
				<div class="formarea">
					<h2>REGISTER AT SHARE YOUR BOOK</h2>
					<form method="post" class="form-inline" action="<?= base_url('auth/create') ?>">
						<?= $this->load->view('flash') ?>
						<div class="form-group">
					      	<input type="text" class="form-control" id="" placeholder="Username*" name="uname">
					    </div>
					    <div class="form-group">
					      	<input type="text" class="form-control" id="" placeholder="First Name*" name="first_name">
					    </div>
					    <div class="form-group">
					      	<input type="text" class="form-control" id="" placeholder="Last Name*" name="last_name">
					    </div>
					    <div class="form-group">
					      	<input type="email" class="form-control" id="" placeholder="Email*" name="email">
					    </div>
					    <div class="form-group">
					      	<input type="password" class="form-control" id="" placeholder="Password*" name="upass">
					    </div>
					    <div class="form-group">
					      	<input type="password" class="form-control" id="" placeholder="Confirm Password*" name="cpass">
					    </div>
					    <input type="submit" class="btn btn-default" value="REGISTER">
					</form>
				</div>
			</div>
		</div>	
	</div>