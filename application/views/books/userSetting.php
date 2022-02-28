<div class="container">
    <div class="row">
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
    </div>
	<div class="row changepswrd">

		<div class="col-md-8 col-sm-8">

			<div class="borrowbook" style="margin:0px 0px;width:100%;">

				<div class="borrowbookhead">Personal Information</div>

				<div class="borrowRow">

					<strong>Username*</strong>

					<p><?= $user->uname ?></p>

				</div>

				<div class="borrowRow">

					<strong>First Name*</strong>

					<p><?= $user->first_name ?></p>

				</div>

				<div class="borrowRow">

					<strong>Last Name*</strong>

					<p><?= $user->last_name ?></p>

				</div>

				<div class="borrowRow">

					<strong>Email*</strong>

					<p><?= $user->email ?></p>

				</div>

			</div>

		</div>
		<div class="col-md-4 col-sm-4">

			<div class="register ">

				<div class="formarea" style="margin:0px 0px; width:100%;">


						<div class="borrowbookhead" style="border-radius: 4px 4px 0px 0px;">Change Password</div>

						<form class="form-inline" style="margin:0px 0px;" action="<?= base_url().'auth/changePassword'?>" method="POST">

							<div class="form-group">

						      	<input type="password" class="form-control" id="" placeholder="Old Password*" name="old_password">

						    </div>

						    <div class="form-group">

						      	<input type="password" class="form-control" id="" placeholder="New Password*" name="new_password">

						    </div>

						    <div class="form-group">

						      	<input type="password" class="form-control" id="" placeholder="Confirm Password*" name="confirm_password" >

						    </div>

						    <input type="submit" class="btn btn-default" value="Change Password">

						</form>

				</div>

			</div>

		</div>

	</div>

</div>

