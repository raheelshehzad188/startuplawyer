<?php 
  $CI =& get_instance();
  $inviteCountNoti=$CI->template->notificationForInvition();
 ?>
<div class="collapse navbar-collapse" id="navbar-menu">
	<ul>
		<li class="active"><a href="<?php echo base_url('/'); ?>index/home">Home</a></li>
		<li><a href="<?php echo base_url('/index/page/aboutus'); ?>">About us</a></li>
		<li><a href="<?php echo base_url('/index/page/faq'); ?>">FAQ</a></li>
		<li><a href="<?php echo base_url('/index/page/blog'); ?>">Blog</a></li>
		<li><a href="<?php echo base_url('/index/page/contact'); ?>">Contact us </a></li>
		<?php
		if($_SESSION['user_login'])
		{
			$name = $_SESSION['user_login']->first_name;
		?>
		<li class="have-child-menu"><a><?= $name ?> Menu <i class="fa fa-caret-down"></i></a>
		<ul class="sub-menu">
			<!-- <li><a href="<?php //echo base_url('/books/addbook'); ?>">Profile</a></li>-->
			<li><a href="<?php echo base_url('/groups/create'); ?>">Create Group</a></li>
			<li><a href="<?php  echo base_url('/groups/myGroups'); ?>">My Groups</a></li>
			<li><a href="<?php echo base_url('/books/addbook'); ?>">Add Book</a></li>
			<li><a href="<?php echo base_url('/books/myBooks'); ?>">My Books</a></li>
			<li><a href="<?php echo base_url('/books/tags'); ?>">Add Tags</a></li>
			<li><a href="<?php echo base_url('/books/lentHistory'); ?>">Lent Book History</a></li>
			<li><a href="<?php echo base_url('/books/borrowHistory'); ?>">Borrow Book History</a></li>
			<!-- 
			<li><a href="<?php// echo base_url('/books/addbook'); ?>">Books Lent</a></li>-->
			<li><a href="<?php echo base_url('/groups/notification'); ?>">Notifications 
		<?php if ($inviteCountNoti>0): ?>
		<span class="badge badge-light" style="background-color: #4017e6"><?= $inviteCountNoti ?></span>	
		<?php endif ?> </a></li>
		<li><a href="<?php echo base_url('/books/userProfile'); ?>">Profile</a></li>

			<li><a href="<?php echo base_url('/auth/logout'); ?>">Logout</a></li>
		</li>
	</ul>
</li>
<?php
}else{?>
<li><a href="<?php echo base_url('/auth/login'); ?>">Login</a></li><?php
}
?>
</ul>
</div>