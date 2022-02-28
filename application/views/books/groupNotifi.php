<div class="container">
		<div class="mygroup myBooks">
			<div class="row">
			    <div class="col-sm-8 col-md-10">
			        <h2>My Notification (<?= count($notification) ?>)</h2>
			    </div>
			    <div class="col-sm-4 col-md-2">
			        
			    </div>
			</div>
			<div class="row col-md-12">
			    <hr>
			</div>

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

			<?php if (count($notification)>0): ?>
			<?php foreach ($notification as $key => $value): ?>
			<?php if ($value['type']=='invitegroup'): ?>
						
			<div class="col-md-12">
				<div class="alert alert-success fade in">
			     
			      <h4>Join Group Request from <strong><?= $value['first_name'].' '.$value['last_name']?></strong> for <strong><?= $value['groups_name'] ?></strong></h4>
			      <p>
			        <a  href="<?= base_url().'groups/join/'.$value['notifi_id'] ?>" class="btn btn-danger">Accept Request</a>
			        <a  href="<?= base_url().'groups/decline/'.$value['notifi_id'] ?>" class="btn btn-default">Decline Request</a>
			      </p>
			    </div>
            </div>
            <?php elseif($value['type']=='barrowbook'): ?>
            <div class="col-md-12">
				<div class="alert alert-warning fade in">
			     
			      <h4>Request For Borrow Book From <strong><?= $value['barrow_first_name'].' '.$value['barrow_name']?></strong> for  book <strong><?= $value['title'] ?></h4>
			       <p> please contact with <?= $value['barrow_first_name'].' '.$value['barrow_name']?> email <strong><?= $value['barrow_email']; ?></strong>
			        <a  href="<?= base_url().'books/acceptBarrow/'.$value['notifi_id'] ?>" class="btn btn-success">Accept Request</a>
			        <a  href="<?= base_url().'books/declineBarrow/'.$value['notifi_id'] ?>" class="btn btn-warning">Decline Request</a>
			        <a  href="<?= base_url().'books/chat/'.$value['barrowID'].'/'.$value['bookID'] ?>" class="btn btn-default">Message</a>
                   </p>
			    </div>
            </div>
            <?php elseif($value['type']=='chatnotification'): ?>
            <div class="col-md-12">
				<div class="alert alert-info fade in">
			     
			      <h4>You have a new message  for  book <strong><?= $value['title'] ?></strong> </h4>
			        <a  href="<?= base_url().'books/notifiRemove/'.$value['notifi_id'] ?>" class="btn btn-success">Remove</a>
			         <a  href="<?= base_url().'books/chat/'.$value['barrowID'].'/'.$value['bookID'] ?>" class="btn btn-default">Message</a>
			        

			      
			    </div>
            </div>		
			<?php elseif($value['type']=='confirmborrow'): ?>
            <div class="col-md-12">
				<div class="alert alert-info fade in">
			     
			      <h4>Your borrow book request is accepted for the book of <strong><?= $value['title'] ?></strong> </h4>
			        <a  href="<?= base_url().'books/notifiRemove/'.$value['notifi_id'] ?>" class="btn btn-success">Remove</a>
			         <a  href="<?= base_url().'books/chat/'.$value['barrowID'].'/'.$value['bookID'] ?>" class="btn btn-default">Message</a>
			     </div>
            </div>	
            <?php elseif($value['type']=='declineBorrow'): ?>
            <div class="col-md-12">
				<div class="alert alert-info fade in">
			     
			      <h4>Your borrow book request is decline for the book of <strong><?= $value['title'] ?></strong> </h4>
			        <a  href="<?= base_url().'books/notifiRemove/'.$value['notifi_id'] ?>" class="btn btn-success">Remove</a>
			         <a  href="<?= base_url().'books/chat/'.$value['barrowID'].'/'.$value['bookID'] ?>" class="btn btn-default">Message</a>
			     </div>
            </div>	
			<?php endif ?>		
			<?php endforeach ?>	
			<?php endif ?>
        </div>
	</div>