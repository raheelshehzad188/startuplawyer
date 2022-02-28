
    <h4 style=" padding-top:20px;">Record Payment</h4>
 <!-- Default dropup button -->

   <div class="search-container">
    <form action ="<?= $surl?>" method="get">
    <input type="hidden" name="page" value="startuplawyer" />
</p>
<div class="tablenav top">
	<div class="alignleft actions bulkactions">
	    <label>From:</label>
		<input type="date" name="from" />
	</div>
	<div class="alignleft actions bulkactions">
	    <label>To:</label>
		<input type="date" name="to" />
	</div>
	<input type="submit" id="doaction" class="button action btn btn-primary" value="Apply">
</div>
</form>
  </div>
  <div style="overflow-x:auto;">
   <table class="table table-striped table-hover">
  <thead>
		<tr>
			<td id="cb" class="manage-column column-cb check-column">
			<!--	<label class="screen-reader-text" for="cb-select-all-1">Select All</label>-->
				<input id="cb-select-all-1" type="checkbox">
			</td>
			<th scope="col" id="name" class="manage-column column-name">Record Identifier</th>
			<th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a href=""><span>Value Date</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="name" class="manage-column column-name">Payment Method Name</th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Debit Account No.</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Payable Currency</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Payment Amount</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Beneficiary Name</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Beneficiary Account No</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Beneficiary Bank Code</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Beneficiary Bank Branch Code</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Corporate Ref No</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Payment Instructions 1</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Remarks</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Remittance Code</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Beneficiary Advise Dispatch Mode</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Phone/ Mobile No</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Email</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Status</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>User</span><span class="sorting-indicator"></span></a></th>
		</tr>
	</thead>
		<tbody id="the-list" data-wp-lists="list:user">
		<?php

$args = array(
    'role'    => 'service_provider',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );

$from = '';
if(isset($_REQUEST['from']))
$from = $_REQUEST['from'];
$to = '';
if(isset($_REQUEST['to']))
$to = $_REQUEST['to'];
foreach ( $users as $user ) {
	$udata = get_userdata( $user->ID );
    $registered = $udata->user_registered;
    $varified = get_user_meta($user->ID, 'varified',true);
    $uid = $user->ID;
    $pm = 'SLIPS';
    if(get_user_meta($user->ID,'bank_code',true) == ot_get_option( 'beneficiary_bank_code', '' ))
    {
        $pm = "IFT";
    }
    ?>
	
		    <?php
}
// echo '</ul>';

?>
	</tbody>
  <tbody>
    
  </tbody>
</table>   
</div> 
  </div>
  <style>
    .tablenav{
        display:flex;
        margin-bottom: 12px;

    }
    .alignleft{
        margin-right:20px;
        }
        #bulk-action-selector-top ,input[type="date"]{
            padding: 9px;
            border-radius: 5px;
            border:1px solid grey;
        }
  
</style>
