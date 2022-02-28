
<h4>Payment Transaction</h4>

<?php
$smsg = '';
if(isset($_REQUEST['ptran']))
{
    $tran = add_payment_transection($_REQUEST['order_value'], $_REQUEST['narration'], $_REQUEST['user'], $_REQUEST['deduction'], $_REQUEST['earned'], $_REQUEST['taken_forward'], $_REQUEST['paid'], $_REQUEST['order_no']);
	$smsg = 'Transection#'.$tran.' create successfully!';
}
?>
<form method="post" action="<?= $surl; ?>&temp=paym&inner=paytrans&ptran=1" style="
    padding: 30px 20px;
">
    <?php
    if(!empty($smsg))
    {
        ?>
        <div class="notice is-dismissible notice-success"><p><?= $smsg; ?></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>
        <?php
    }
    ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th>Service Provider</th>
                <td><select name="user" style="
    padding: 8px;
    width: 300px;
    margin: 10px 0px 7px;
    border-radius: 5px;
    border:1px solid grey;
" >
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
                      <option value="<?= $user->data->ID; ?>" <?= (isset($_GET['user_id']) && $_GET['user_id'] == $user->data->ID)?"selected":""; ?> <?= (isset($edit['user_id']) && $edit['user_id'] == $user->data->ID)?"selected":'' ?>><?= esc_html( $user->display_name ) ?></option>
                      <?php
}
    ?>
                    </select></td>
            </tr>
            <tr>
                <th>Narration</th>
                <td><select name="narration" id="booking_type" style="
    padding: 8px;
    width: 300px;
    margin: 10px 0px 7px;
    border-radius: 5px;
    border:1px solid grey;
">
                      <option value="cpurchase">Client Purchase</option>
                      <option value="refund">Refund </option>
                      <option value="disbursement">Disbursement</option>
                      <option value="subscription">Subscription</option>
                      <option value="paid">Paid</option>
                    </select></td>
            </tr>
            <tr>
                <th>Order Value</th>
                <td><input name="order_value" type="text" />
                    </td>
            </tr>
            <tr>
                <th>Deductions</th>
                <td><input type="text" name="deduction"/></td>
            </tr>
            <tr>
                <th>Earned</th>
                <td><input type="text" name="earned"/></td>
            </tr>
            
            <tr>
                <th>Taken forward</th>
                <td><input type="text" name="taken_forward"/></td>
            </tr>
            
            <tr>
                <th>Paid</th>
                <td><input type="text" name="paid"/></td>
            </tr>
            
            <tr>
                <th>Order No</th>
                <td><input type="text" name="order_no"/></td>
            </tr>
            <tr>
                <td><button type="submit" class="button btn btn-primary button-large">Submit</button></td>
            </tr>
        </tbody></table>
</form>
<style>
.form-table{
    border:none!important;
}
     .form-table, input[type=text] {
    padding: 8px;
    width: 300px;
    margin: 10px 0px 7px;
    border-radius: 5px;
    border:1px solid grey;
  }
  .button{
      float:right;
  }
</style>