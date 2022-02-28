<style>
.form-horizontal .form-group {
margin-left: 0px !important;
}
</style>
<div class="container">
	<div class="addbooks">
		<div class="row">
			<?php $this->load->view('flash'); ?>
		</div>
		<div class="row">
			<div class="col-md-4 my-top-spacing">
			</div>
			<div class="col-md-8 my-top-spacing">
				<div class="panel panel-default">
					<div class="panel-heading "><h3 style="text-align: center;"> Invite a friend</h3></div>
					<div class="panel-body">
						<?php
						$CI = get_instance();
						?>
						<form id="book_form" onsubmit="return front_form();" action="<?=base_url('groups/sendingInvition');?>" enctype="multipart/form-data" method="post" class="form-horizontal">
							
							
							
							<div class="form-group">
								<label name="title">Name:</label>
								<input  type="text" id="title" name="name" class="form-control" required>
							</div>
							<div class="form-group">
								<div class="ui-widget">
									<label for="birds">Email:</label>
									<input type="mail" class="form-control" name="email"
									value="" required>
								</div>
							</div>
							<div class="form-group">
								<label for="group_id">Group:</label>
								<?php if (count($group)>0): ?>
								<select name="group_id" id="group_id" class="form-control">
									<?php foreach ($group as $key => $value): ?>
									<option value="<?= $value['groupID'] ?>" ><?= $value['name'] ?> </option>
									<?php endforeach ?>
								</select>
								<?php else: ?>
								<a href="<?= base_url().'groups/create'; ?>" class="btn btn-success">Create New Group</a>
								<?php endif ?>
							</div>
							<div class="form-group">
								<label name="description">Message:</label>
								<textarea id="description"  name="discription" rows="5" class="form-control" data-parsley-maxlength="5000" value="" >I would like to invite you to shareyourbook to join my group of local book lovers who enjoy reading and sharing books, just like you. 
 The platform is FREE and allows all of us to read more while spending less.</textarea>
							</div>
							<input type="submit" value="Send invitation" class="btn btn-success btn-lg btn-block">
							
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>