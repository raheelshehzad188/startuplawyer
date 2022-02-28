<div class="container">

		<div class="register">
			<div class="">
				<div class="formarea">
					<h2>Contact  SHAREBOOKS</h2>
					<div class="row">
						<?php if ($this->session->flashdata('success')): ?>
						<div class="row col-md-12">	
							<div class="alert alert-success alert-dismissible">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
							</div>
						</div>	
						<?php endif ?>
						<?php if ($this->session->flashdata('warning')): ?>
						<div class="row col-md-12">	
							<div class="alert alert-warning alert-dismissible">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  <strong>Warning!</strong> <?= $this->session->flashdata('warning'); ?>
							</div>
						</div>	
						<?php endif ?>
					</div>
					<form class="form-inline" action="<?= base_url() ?>index/saveContact" method="POST">
						<p>Got questions? We would love to hear from you. Use the contact form below</p>
						<div class="form-group">
					      	<input type="text" class="form-control" id="uname" placeholder="Name*" name="uname" required>
					    </div>
					    <div class="form-group">
					      	<input type="email" class="form-control" id="uemail" placeholder="Email*" name="uemail" required>
					    </div>
					    <div class="form-group">
					      	<input type="text" class="form-control" id="usubject" placeholder="Subject*" name="usubject" required>
					    </div>
					    <div class="form-group">
					      	<textarea id="message" name="message" class="form-control" data-parsley-required="" required="" data-parsley-maxlength="500" placeholder="Type your message here ..." require></textarea>
					    </div>
					    
					    <input type="submit" class="btn btn-default" value="Send message">
					</form>
				</div>
			</div>
		</div>	
		
	</div>