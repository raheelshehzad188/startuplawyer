<?php
//die("ok");
$m = 0;
if(isset($_REQUEST['month']))
$m = $_REQUEST['month'];
$y = 0;
if(isset($_REQUEST['year']))
$y = $_REQUEST['year'];
$sp = 0;
if(isset($_REQUEST['sp']))
$sp = $_REQUEST['sp'];
?>
<form action ="<?= $surl?>" method="get">
    <input type="hidden" name="page" value="startuplawyer" />
    <input type="hidden" name="temp" value="paym" />
    <input type="hidden" name="inner" value="pstate" />
    <!--<p class="search-box" style="position: relative;top: 34px;">
	<input type="search" id="user-search-input" name="s" value="">-->
</p>
<div class="tablenav top">
	<div class="alignleft actions bulkactions">
		<select name="sp" id="bulk-action-selector-top">
			<option value="-1">Select Service Provider</option>
			<?php

$args = array(
    'role'    => 'service_provider',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );
// var_dump($users);

// echo '<ul>';
foreach ( $users as $user ) {
    ?>
                      <option value="<?= $user->data->ID; ?>" <?= (isset($sp) && $sp == $user->data->ID)?"selected":""; ?> <?= (isset($edit['user_id']) && $edit['user_id'] == $user->data->ID)?"selected":'' ?>><?= esc_html( $user->display_name ) ?></option>
                      <?php
}
    ?>
		</select>
	</div>
	<div class="alignleft actions bulkactions">
		<select name="month" id="bulk-action-selector-top">
			<option value="">Select Month</option>
			<?php
			for($i=1;$i <= 12; $i++)
			{
			    $dateObj   = DateTime::createFromFormat('!m', $i);
$monthName = $dateObj->format('F'); // March

			    ?>
			    <option value="<?= $i; ?>" <?= ($i == $m)?"selected":""; ?>><?= $monthName; ?></option>
			    <?php
			}
			?>
		</select>
	</div>
	<div class="alignleft actions bulkactions">
		<select name="year" id="bulk-action-selector-top">
			<option value="0">Select year</option>
			<?php
			$cy = date('Y');
			for($i=$cy-10;$i <= $cy; $i++)
			{

			    ?>
			    <option value="<?= $i; ?>"  <?= ($i == $y)?"selected":""; ?>><?= $i; ?></option>
			    <?php
			}
			?>
		</select>
	</div>
	<input type="submit" id="doaction" class="button action btn btn-primary" value="Apply">
</div>
</form>

<div class="table-responsive">
    <?php $this->load->view('flash');?>
    <table class="table data-list-view">
		<tr>
			<td id="cb" class="manage-column column-cb check-column">
			<!--	<label class="screen-reader-text" for="cb-select-all-1">Select All</label>-->
				<input id="cb-select-all-1" type="checkbox">
			</td>
			<th scope="col" id="name" class="manage-column column-name">Date</th>
			<th scope="col" id="username" class="manage-column column-username column-primary sortable desc"><a href=""><span>Reference No.</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="name" class="manage-column column-name">Order Value</th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Deductions</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Earned</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Taken forward</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Paid</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable desc"><a href=""><span>Order No</span><span class="sorting-indicator"></span></a></th>
			<th scope="col" id="email" class="manage-column column-email sortable Narration"><a href=""><span>Narration</span><span class="sorting-indicator"></span></a></th>
		</tr>
	</thead>
	<tbody id="the-list" data-wp-lists="list:user">
		<?php
$args = array(
    'numberposts' => -1,
    'orderby'    => 'menu_order',
    'sort_order' => 'asc',
  'post_type'   => 'transection'
);
$users = get_posts( $args );

// echo '<ul>';
$naration = array();
$naration['cpurchase'] = 'Client Purchase';
$naration['refund'] = 'Refund';
$naration['disbursement'] = 'Disbursement';
$naration['subscription'] = 'Subscription';
$naration['paid'] = 'Paid';
$ov = 0;
$td = 0;
$te = 0;
$tf = 0;
foreach ( $users as $user ) {
    $py = date("Y", strtotime($user->post_date));
    $pm = date("m", strtotime($user->post_date));
    if($sp == get_post_meta($user->ID,'user',true) && $pm == $m  && $py == $y)
    {
	$udata = get_userdata( $user->ID );
    $registered = $udata->user_registered;
    $varified = get_user_meta($user->ID, 'varified',true);
    $ov = $ov + get_post_meta($user->ID,'order_value',true);
    $td = $td + get_post_meta($user->ID,'deduction',true);
    $te = $te + get_post_meta($user->ID,'earned',true);
    $tf = $tf + get_post_meta($user->ID,'taken_forward',true);
    ?>
		<tr id="user-1">
			<th scope="row" class="check-column">
				<input type="checkbox" name="users[]" id="user_1" class="administrator" value="1">
			</th>
			<td><?= date("d-m-Y", strtotime($user->post_date)); ?></td>
			<td class="username column-username has-row-actions column-primary" data-colname="Username"><strong><?= esc_html( $user->post_title ) ?></strong>
			</td>
			<td class="name column-name" data-colname="Name"><?= get_post_meta($user->ID,'order_value',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'deduction',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'earned',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'taken_forward',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'paid',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'order_no',true); ?></td>
			<td class="email column-email" data-colname="Email"><?= $naration[get_post_meta($user->ID,'narration',true)]; ?></td>
		</tr>
		    <?php
}
    
    }
// echo '</ul>';

?>

	</tbody>
	<tfoot >
		<tr id="user-1">
			<th scope="row" class="check-column">
			<!--	<label class="screen-reader-text" for="user_1">Select admin</label>-->
				<input type="checkbox" name="users[]" id="user_1" class="administrator" value="1">
			</th>
			<th><?= date("d-m-Y"); ?></td>
			<th class="username column-username has-row-actions column-primary" data-colname="Username"><strong><?= $sp.'-'.date('d-m-Y'); ?></strong>
			</th>
			<th class="name column-name" data-colname="Name"><?= $ov; ?></td>
			<th class="email column-email" data-colname="Email"><?= $td; ?></th>
			<th class="email column-email" data-colname="Email"><?= $te; ?></th>
			<th class="email column-email" data-colname="Email"><?= $tf; ?></th>
			<th class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'paid',true); ?></th>
			<th class="email column-email" data-colname="Email"><?= get_post_meta($user->ID,'order_no',true); ?></th>
			<th class="email column-email" data-colname="Email">Earning Payable</th>
		</tr>
	</tfoot>
</table>
<style>
    .tablenav{
        display:flex;
        margin-bottom: 12px;

    }
    .alignleft{
        margin-right:20px;
        }
        #bulk-action-selector-top{
            padding: 9px;
            border-radius: 5px;
        }
  
</style>