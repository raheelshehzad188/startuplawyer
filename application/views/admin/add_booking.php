<style>
    select ,input {
        PADDING: 6PX 76px 6px 9px;
        word-wrap: normal;
        border-radius: 4px;
        border: 1px solid #0075ff;
    }
    table select ,input {
        PADDING: 6PX 0px 6px 9px;
        word-wrap: normal;
        width:100%;
        border-radius: 4px;
        border: 1px solid #0075ff;
    }
    #avalibilty_table td{
        max-width:120px;
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
    .remove_btn{
         border: 1px solid red  !important;
         color:red !important;
    }
</style>
<?php
if(isset($_GET['product_id']))
{
    $pid = $_GET['product_id'];
    $pro = $product->getproduct($pid);
    $json = $pro->booking_data;
    $edit= json_decode($json,true );
    // var_dump($edit);
    // die();
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
    <input type="hidden" name="type" value="add" />
    <?php
    if(isset($_REQUEST['product_id']))
    {
        ?>
        <input type="hidden" name="edit_id" value="<?= $_REQUEST['product_id']; ?>" />
        <?php
    }
    ?>
    <h1>Add Booking Slots</h1>
    <table class="form-table">
        <tbody>
            <tr style="display: none;">
                <th>Title</th>
                <td><input name="title" value="<?= (isset($edit['title'])?$edit['title']:'') ?>" type="text" />
                    </td>
            </tr>
            <tr style="display: none;">
                <th>Product Price</th>
                <td><input name="price" value="<?= (isset($edit['price'])?$edit['price']:'') ?>" type="text" />
                    </td>
            </tr>
            <tr>
                <th>Booking Type</th>
                <td><select name="booking_type" id="booking_type">
                      <option>Booking Type</option>
                      <?php
    $modal->table = 'wp_posts';
                                                $modal->key = 'ID';
                                                $recent_posts = $modal->get(array("post_type"=>'booking_types'));
    foreach($recent_posts as $post) : ?>
                      <option value="<?php echo $post['ID']; ?>" <?= (isset($edit['booking_type']) && $edit['booking_type'] == $post['ID'])?"selected":'' ?>><?php echo $post['post_title'] ?></option>
                      <?php endforeach;  ?>
                    </select></td>
            </tr>
            </tbody></table>
            <h1>Availability</h1>
            <table class="form-table">
        <tbody>
            
            <tr>
                <td><table id="avalibilty_table">
			        <thead>
			            <th>From Date</th>
			            <th>TO Date</th>
			            <th>From</th>
			            <th>TO</th>
			            <th>Day</th>
			            <th>Duration</th>
			            <th>Rest</th>
			            <th>Action</th>
			        </thead>
			        <tbody>
                     <?php
                     $count = 0;
                        if($edit)
                        {
                     $slot_day = $edit['slot_day'];
                            $slot_sd = $edit['slot_sd'];
                            $slot_ed = $edit['slot_ed'];
                            $slot_et = $edit['slot_et'];
                            $slot_du = $edit['slot_du'];
                            $slot_re = $edit['slot_re'];
                            
                             foreach($edit['slot_st'] as $k=>$st)
                        {
                            
                            if(!empty($st) && !empty($slot_du[$k]))
                            {
                                $count++;
                            }
                        }
                        }
                        if(!isset($edit) || $count == 0) 
                        {
                            ?>
                            
                        <tr>
                        <td><input type="date" name="slot_sd[]"/></td>
                        <td><input type="date" name="slot_ed[]"/></td>
                        <td><select name="slot_st[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="slot_et[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="slot_day[]" >
                            <?php
                            foreach($days as $k => $v)
                            {
                                ?>
                                <option value="<?= $k+1 ?>" ><?= $v['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        <td><input type="text"  name="slot_du[]" value="60" placeholder="Duration" /></td>
                        <td><input type="text"  name="slot_re[]"  value="15" placeholder="Rest" /></td>
                        <td></td>
                        </tr>
                            <?php
                        }
                        else
                        {
                        ?>
                        <tr>
                            <?php
                            
                             foreach($edit['slot_st'] as $k=>$st)
                        {
                            
                            if(!empty($st) && !empty($slot_du[$k]))
                            {
                            if($k== 0)
                            {
                              ?>
                              <tr id="avalibilty_tr_1">
                        <td><input type="date" name="slot_sd[]" value="<?= isset($slot_sd[$k])?$slot_sd[$k]:""; ?>" /></td>
                        <td><input type="date" name="slot_ed[]" value="<?= isset($slot_ed[$k])?$slot_ed[$k]:""; ?>" /></td>
                        <td><select name="slot_st[]" ><?php echo get_times($st); ?></select></td>
                        <td><select  name="slot_et[]" ><?php echo get_times($slot_et[$k]); ?></select></td>
                        <td><select  name="slot_day[]" >
                            <?php
                            foreach($days as $kk => $vv)
                            {
                                $dv = $kk+1;
                                ?>
                                <option value="<?= $kk+1 ?>" <?= (isset($slot_day[$k]) && $slot_day[$k] == $dv )?"selected":"" ?> ><?= $vv['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        <td><input type="text"  name="slot_du[]" value="<?= (isset($slot_du[$k]))?$slot_du[$k]:""; ?>" placeholder="Duration" /></td>
                        <td><input type="text"  name="slot_re[]"  value="<?= $slot_re[$k] ?>" placeholder="Rest" /></td>
                        <td></td>
                        </tr>
                              <?php  
                            }
                            else
                            {
                                ?>
                                <tr id="avalibilty_tr_<?= $k ?>">
                                    <td><input type="date" name="slot_sd[]" value="<?= isset($slot_sd[$k])?$slot_sd[$k]:""; ?>" /></td>
                        <td><input type="date" name="slot_ed[]" value="<?= isset($slot_ed[$k])?$slot_ed[$k]:""; ?>" /></td>
                        <td><select name="slot_st[]" ><?php echo get_times($st); ?></select></td>
                        <td><select  name="slot_et[]" ><?php echo get_times($slot_et[$k]); ?></select></td>
                        <td><select  name="slot_day[]" >
                            <?php
                            foreach($days as $kk => $vv)
                            {
                                $dv = $kk+1;
                                ?>
                                <option value="<?= $kk+1 ?>" <?= (isset($slot_day[$k]) && $slot_day[$k] == $dv )?"selected":"" ?> ><?= $vv['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        <td><input type="text"  name="slot_du[]" value="<?= $slot_du[$k] ?>" placeholder="Duration" /></td>
                        <td><input type="text"  name="slot_re[]"  value="<?= $slot_re[$k] ?>" placeholder="Rest" /></td>
                        <td>
                        <button type="button" class="button button-primary button-large remove_btn" row="avalibilty_tr_<?= $k ?>">-</button></td>
                        </tr>
                                <?php
                            }
                        }//if end
                        }//foreach end
                            ?>
                        <td></td>
                        </tr>
                        <tr id = 'address_copy' style="display: none;" class="form-field form-required">
                        <td style="padding: 15px 0px;"><input type="text" name="address[]" /></td>
                        <td><button  type="button"  class="button button-primary button-large remove_btn">-</button></td>
                        </tr>
                        
                        <?php
                        }
                        ?>
			            <tr  id = 'avalibilty_copy' style="display: none;" class="form-field form-required">
			                <td><input type="date" name="slot_sd[]" /></td>
                        <td><input type="date" name="slot_ed[]" /></td>
			            <td><select name="slot_st[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="slot_et[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="slot_day[]" >
                            <?php
                            foreach($days as $k => $v)
                            {
                                ?>
                                <option value="<?= $k+1 ?>" ><?= $v['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        <td><input type="text"  name="slot_du[]" value="" placeholder="Duration" /></td>
                        <td><input type="text"  name="slot_re[]"  value="" placeholder="Rest" /></td>
			            <td><button  type="button"  class="button button-primary button-large remove_btn">-</button></td>
			            </tr>
			        </tbody>
			    </table>
			    <button type="button" class="button button-sucess button-large" onclick="repeater('avalibilty')">Add</button>
			    </td>
            </tr>
            <tr>
                <td><button class="button button-primary button-large">Save</button></td>
            </tr>
        </tbody>
    </table>
            <h1>Holidays</h1>
            <table class="form-table">
        <tbody>
            
            <tr>
                <td><table id="avalibilty1_table">
			        <thead>
			            <th>From Date</th>
			            <th>TO Date</th>
			            <th>From</th>
			            <th>TO</th>
			            <th>DAY</th>
			            <th>Action</th>
			        </thead>
			        <tbody>
                     <?php
                     $count = 0;
                        if($edit)
                        {
                            // var_dump($edit);
                            // die();
                            
                     $slot_day = $edit['hol_day'];
                            $slot_sd = $edit['hol_sd'];
                            $slot_ed = $edit['hol_ed'];
                            $slot_et = $edit['hol_et'];
                            $slot_re = $edit['hol_re'];
                            
                             foreach($edit['hol_st'] as $k=>$st)
                        {
                            
                            if(!empty($st) && !empty($slot_et[$k]))
                            {
                                $count++;
                            }
                        }
                        }
                        // var_dump($count);
                        if(!isset($edit) || $count == 0) 
                        {
                            ?>
                            
                        <tr>
                        <td><input type="date" name="hol_sd[]"/></td>
                        <td><input type="date" name="hol_ed[]"/></td>
                        <td><select name="hol_st[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="hol_et[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="hol_day[]" >
                            <?php
                            foreach($days as $k => $v)
                            {
                                ?>
                                <option value="<?= $k+1 ?>" ><?= $v['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        </tr>
                            <?php
                        }
                        else
                        {
                        ?>
                        <tr>
                            <?php
                            
                             foreach($edit['slot_st'] as $k=>$st)
                        {
                            
                            if(!empty($st) && !empty($slot_du[$k]))
                            {
                            if($k== 0)
                            {
                              ?>
                              <tr id="avalibilty_tr_1">
                        <td><input type="date" name="hol_sd[]" value="<?= isset($slot_sd[$k])?$slot_sd[$k]:""; ?>" /></td>
                        <td><input type="date" name="hol_ed[]" value="<?= isset($slot_ed[$k])?$slot_ed[$k]:""; ?>" /></td>
                        <td><select name="hol_st[]" ><?php echo get_times($st); ?></select></td>
                        <td><select  name="hol_et[]" ><?php echo get_times($slot_et[$k]); ?></select></td>
                        <td><select  name="hol_day[]" >
                            <?php
                            foreach($days as $k => $v)
                            {
                                ?>
                                <option value="<?= $k+1 ?>" ><?= $v['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        <td></td>
                        </tr>
                              <?php  
                            }
                            else
                            {
                                ?>
                                <tr id="avalibilty_tr_<?= $k ?>">
                                    <td><input type="date" name="slot_sd[]" value="<?= isset($slot_sd[$k])?$slot_sd[$k]:""; ?>" /></td>
                        <td><input type="date" name="slot_ed[]" value="<?= isset($slot_ed[$k])?$slot_ed[$k]:""; ?>" /></td>
                        <td><select name="slot_st[]" ><?php echo get_times($st); ?></select></td>
                        <td><select  name="slot_et[]" ><?php echo get_times($slot_et[$k]); ?></select></td
                        
                        <td><select  name="hol_day[]" >
                            <?php
                            foreach($days as $kk => $vv)
                            {
                                $dv = $kk+1;
                                ?>
                                <option value="<?= $kk+1 ?>" <?= (isset($slot_day[$k]) && $slot_day[$k] == $dv )?"selected":"" ?> ><?= $vv['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
                        <td><input type="text"  name="slot_du[]" value="<?= $slot_du[$k] ?>" placeholder="Duration" /></td>
                        <td><input type="text"  name="slot_re[]"  value="<?= $slot_re[$k] ?>" placeholder="Rest" /></td>
                        <td>
                        <button type="button" class="button button-primary button-large remove_btn" row="avalibilty1_tr_<?= $k ?>">-</button></td>
                        </tr>
                                <?php
                            }
                        }//if end
                        }//foreach end
                            ?>
                        <td></td>
                        </tr>
                        
                        <?php
                        }
                        ?>
			            <tr  id = 'avalibilty1_copy' style="display: none;" class="form-field form-required">
			                <td><input type="date" name="hol_sd[]" /></td>
                        <td><input type="date" name="hol_ed[]" /></td>
			            <td><select name="hol_st[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="hol_et[]" ><?php echo get_times(); ?></select></td>
                        <td><select  name="hol_day[]" >
                            <?php
                            foreach($days as $k => $v)
                            {
                                ?>
                                <option value="<?= $k+1 ?>" ><?= $v['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select></td>
			            <td><button  type="button"  class="button button-primary button-large remove_btn">-</button></td>
			            </tr>
			        </tbody>
			    </table>
			    <button type="button" class="button button-sucess button-large" onclick="repeater('avalibilty1')">Add</button>
			    </td>
            </tr>
            <tr>
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