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

	<div class="borrowbook">

		<div class="borrowbookhead">Borrow Book</div>
        <form action="<?= base_url().'books/barrowRequest'; ?>" method="POST" accept-charset="utf-8">
		<input type="hidden" name="book" value="<?= $data->bookID ?>">
		<input type="hidden" name="user" value="<?= $data->uid ?>">
        <div class="borrowRow">

			<strong>Title</strong>

			<p><?= $data->title ?></p>

		</div>

		<div class="borrowRow">

			<strong>Author</strong>

			<p><?= $data->name ?></p>

		</div>

		<div class="borrowRow">

			<strong>Owner</strong>

			<p><?=  $data->first_name.' '.$data->last_name ?></p>

		</div>

		<div class="borrowRow">

			<strong>Message</strong>

			<div class="message">
				<?php 
                 $message="Hi  ".$data->first_name." ".$data->last_name."\n";
                 $message.="Can you Please lend me a book ".$data->title."\n";
                 $message.="Thanks \n ".$user->first_name.' '.$user->last_name."";
				 ?>
				<textarea name="message" class="form-control" style="height: 113px;"><?= $message ?></textarea> 

				<!-- <p>Hi <?=  $data->first_name.' '.$data->last_name ?> </p>

				<p>Can you Please lend me a book "<?= $data->title ?>".</p>

				<p>Thanks <br><?= $user->first_name.' '.$user->last_name ?></p> -->

			</div>

		</div>

		<input type="submit" class="btn btn-success btn-larg" value="Send Message" >
        </form>

	</div>

</div>