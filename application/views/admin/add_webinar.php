<style>
    select ,input {
        PADDING: 6PX 76px 6px 9px;
        word-wrap: normal;
        
        border-radius: 4px;
        border: 1px solid #0075ff;
    }
    table:last-child{
        width:100%;
    }
    table{
        width:50%;
    }
    li{
        list-style:none;
       
    }
    label{
        font-size:15px;
        padding:10PX;
    }
    li label {
        font-size:15px;
    }
    li label input{
        margin-right:10px;
    }
    #avalibilty_table{
        width:100%;
    }
    .button{
         border: 1px solid #0075ff;
         color:#0075ff;
         border-radius: 4px;
         padding:5px 15px;
         background:#fff;
    }
</style>
<?php
if(isset($_GET['product_id']))
{
    $pid = $_GET['product_id'];
    $pro = $product->getproduct($pid);
    $json = $pro->booking_data;
    $edit= json_decode($json,true );
}

function get_times( $default = '19:00', $interval = '+30 minutes' ) {

    $output = '';

    $current = strtotime( '00:00' );
    $end = strtotime( '24:00' );

    while( $current <= $end ) {
        $time = date( 'H:i', $current );
        $sel = ( $time == $default ) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
        $current = strtotime( $interval, $current );
    }

    return $output;
}
?>
<?php
$days = array();
$days[] = array(
    "name" => "Monday"
    );
$days[] = array(
    "name" => "Tuesday"
    );
    $days[] = array(
    "name" => "Wednesday"
    );
    $days[] = array(
    "name" => "Thursday"
    );
    $days[] = array(
    "name" => "Firday"
    );
    $days[] = array(
    "name" => "Saturday"
    );
    $days[] = array(
    "name" => "Sunday"
    );
    
?>

<form method = "post">
    <input type="hidden" name="save_booking" />
    <?php
    if(isset($_REQUEST['product_id']))
    {
        ?>
        <input type="hidden" name="edit_id" value="<?= $_REQUEST['product_id']; ?>" />
        <?php
    }
    ?>
    <!--<h1>Add Webinar Slot</h1>-->
            <tr>
                <td></td>
                <td></td>
            </tr>
            <h1>Add Webinar Slots</h1>
            <table class="form-table">
        <tbody>
            
            <tr>
                <th>Advance</th>
                <td><table id="avalibilty_table">
			        <thead>
			            <th colspan="2">From</th>
			            <th colspan="2">TO</th>
			            <th>Action</th>
			        </thead>
			        <tbody>
                     <?php
                        if(!isset($edit)) 
                        {
                            ?>
                            
                        <tr id="avalibilty_tr_1">
                            <td><input type="date" name="slot_sd[]"></td>
                            <td><select name="slot_st[]" ><?php echo get_times(); ?></select></td>
                            <td><input type="date" name="slot_ed[]"></td>
                            <td><select  name="slot_et[]" ><?php echo get_times(); ?></select></td>
                            <td></td>
                        </tr>
                            <?php
                        }
                        else
                        {
                        ?>
                        <tr>
                            <?php
                            $slot_sd = $edit['slot_sd'];
                            $slot_ed = $edit['slot_ed'];
                            $slot_et = $edit['slot_et'];
                            // print_r($slot_et);
                             foreach($edit['slot_st'] as $k=>$st)
                        {
                            if(!empty($st) && !empty($slot_sd[$k]))
                            {
                            if($k== 0)
                            {
                              ?>
                              <tr id="avalibilty_tr_1">
                        <td><input type="date" name="slot_sd[]" value="<?= $slot_sd[$k] ?>" ></td>
                            <td><select name="slot_st[]" ><?php echo get_times($st); ?></select></td>
                            <td><input type="date" name="slot_ed[]" value="<?=$slot_ed[$k] ?>"></td>
                            <td><select  name="slot_et[]" ><?php echo get_times($slot_et[$k]); ?></select></td>
                            <td></td>
                        </tr>
                              <?php  
                            }
                            else
                            {
                                ?>
                                <tr id="avalibilty_tr_<?= $k ?>">
                            <td><input type="date" name="slot_sd[]" value="<?=$slot_sd[$k] ?>"></td>
                            <td><select name="slot_st[]" ><?php echo get_times($st); ?></select></td>
                            <td><input type="date" name="slot_ed[]" value="<?=$slot_ed[$k] ?>"></td>
                            <td><select  name="slot_et[]" ><?php echo get_times($slot_et[$k]); ?></select></td>
                            <td></td>
                        <td>
                        <button type="button" class="button button-primary button-large remove_btn" row="avalibilty_tr_<?= $k ?>">-</button></td>
                        </tr>
                                <?php
                            }
                        }
                        }
                            ?>
                        <td></td>
                        </tr>
                        
                        <?php
                        }
                        ?>
			            <tr  id = 'avalibilty_copy' style="display: none;" class="form-field form-required">
			            <td><input type="date" name="slot_sd[]"></td>
                            <td><select name="slot_st[]" ><?php echo get_times(); ?></select></td>
                            <td><input type="date" name="slot_ed[]"></td>
                            <td><select  name="slot_et[]" ><?php echo get_times(); ?></select></td>
			            <td><button  type="button"  class="button button-primary button-large remove_btn">-</button></td>
			            </tr>
			        </tbody>
			    </table>
			    <button type="button" class="button button-sucess button-large" onclick="repeater('avalibilty')">Add</button>
			    </td>
            </tr>
            <tr>
                <td></td>
                <td><button class="button button-primary button-large">Save</button></td>
            </tr>
        </tbody>
    </table>
            <h1>Discount Rates</h1>
            <table class="form-table">
        <tbody>
            
            <tr>
                <th>Advance</th>
                <td><table id="avalibilty1_table">
			        <thead>
			            <th>Number of Tickets</th>
			            <th>Discount rate</th>
			            <th>Action</th>
			        </thead>
			        <tbody>
                     <?php
                        if(!isset($edit)) 
                        {
                            ?>
                            
                        <tr id="avalibilty1_tr_1">
                            <td><input type="number" name="slot_t[]"></td>
                            <td><input type="number" name="slot_r[]"></td>
                            <td></td>
                        </tr>
                            <?php
                        }
                        else
                        {
                        ?>
                        <tr>
                            <?php
                            $slot_sd = $edit['slot_t'];
                            // print_r($slot_et);
                             foreach($edit['slot_t'] as $k=>$st)
                        {
                            if(!empty($st) && !empty($slot_sd[$k]))
                            {
                            if($k== 0)
                            {
                              ?>
                              <tr id="avalibilty1_tr_1">
                        <td><input type="number" name="slot_t[]"></td>
                            <td><input type="number" name="slot_r[]"></td>
                            <td></td>
                        </tr>
                              <?php  
                            }
                            else
                            {
                                ?>
                                <tr id="avalibilty1_tr_<?= $k ?>">
                            <td><input type="number" name="slot_t[]"></td>
                            <td><input type="number" name="slot_r[]"></td>
                            <td></td>
                        <td>
                        <button type="button" class="button button-primary button-large remove_btn" row="avalibilty_tr_<?= $k ?>">-</button></td>
                        </tr>
                                <?php
                            }
                        }
                        }
                            ?>
                        <td></td>
                        </tr>
                        
                        <?php
                        }
                        ?>
			            <tr  id = 'avalibilty1_copy' style="display: none;" class="form-field form-required">
			            <td><input type="number" name="slot_t[]"></td>
                            <td><input type="number" name="slot_r[]"></td>
			            <td><button  type="button"  class="button button-primary button-large remove_btn">-</button></td>
			            </tr>
			        </tbody>
			    </table>
			    <button type="button" class="button button-sucess button-large" onclick="repeater('avalibilty1')">Add</button>
			    </td>
            </tr>
            <tr>
                <td></td>
                <td><button class="button button-primary button-large">Save</button></td>
            </tr>
        </tbody>
    </table>
</form>
<script>
    
jQuery( document ).ready(function() {
    // alert('admin');
});
jQuery(document).on('change', "#booking_type", function(el) {
    if(jQuery(el.target).attr('id') == "booking_type")
    {
    // alert(jQuery(el.target).attr('id'));
    var id = jQuery(el.target).val();
    jQuery('.all_location').hide();
    jQuery('.location_'+id).show();
    }
});
jQuery(document).on('click', ".remove_btn", function(el) {
    //  alert("OK");
    var row = jQuery(this).attr('row');
    jQuery('#'+row).remove();
});
function repeater(type)
{
    var next = 0;
    jQuery('#'+type+'_table tbody tr').each(function(i, obj) {
    console.log(jQuery(this).html());
    next++;
});
    // alert(type);
    var row = type+'_tr_'+next;
    var html = jQuery('#'+type+'_copy').html();
    html = '<tr id="'+row+'">'+html+'</tr>'
    jQuery('#'+type+'_table tbody').append(html);
    jQuery('#'+row+' button').attr('row',row);
    
}
function remove(type)
{
    alert(type);
    
}
</script>