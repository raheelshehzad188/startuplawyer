<?php

if($this->session->flashdata('error'))
{
	?>
	<div class="alert alert-danger">
  <?= $this->session->flashdata('error') ?>
</div>
	<?php
}

if(isset($error))
{
	?>
	<div class="alert alert-danger">
  <?= $error; ?>
</div>
	<?php
}
?>
<?php
if($this->session->flashdata('success'))
{
	?>
	<div class="alert alert-success">
  <?= $this->session->flashdata('success') ?>
</div>
	<?php
}
?>
<?php
if(isset($success))
{
	?>
	<div class="alert alert-success">
  <?= $success; ?>
</div>
	<?php
}
?>
