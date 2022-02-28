
		<div class="register">
	<div class="container">
			<div class="">
				<div class="formarea">
						<?php
							if( $status == 2)
							{
								?>
								<div class="alert alert-success">
	   Congratulations! Account Activated Successfully!
	</div>
<?php
							}
							elseif ( $status == 1) {
							?>
								<div class="alert alert-danger">
	   invlid link or link expired!
	</div>
<?php	
							}
						?>
				</div>
			</div>
		</div>	
		
	</div>