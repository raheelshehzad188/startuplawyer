<?php /* Template Name: Ajax page */ 
$url = get_assets_url();

if(isset($_REQUEST['action']))
{
	$action = trim($_REQUEST['action']);
	if($action == "load_slots" && isset($_REQUEST['date']) && isset($_REQUEST['pid']))
	{
		$date = date("Y-m-d", strtotime($_REQUEST['date']));
		$pid = $_REQUEST['pid'];
		$slots = get_slots($pid, $date);
		?>
		<div class="dropdown-menu-content" >
			<?php
			if(count($slots))
			{
				?>
	            <div class="radio_select add_bottom_15">
	            <ul>
			<?php

	            foreach ($slots as $key => $value) {
	             ?>
	            <li onclick="select_slot('<?= $value['id']; ?>');">
	            <input type="radio" slot="<?= $value['id']; ?>" id="time_<?= $value['id']; ?>" class="bslot_cls"  name="time" value="<?= $value['value']; ?>">
	            <label for="time_<?= $value['id']; ?>"><?= $value['value']; ?></label>
	            </li>
	             <?php   
	            }
	            ?></ul></div><?php
	        }
	        else
	        {
	        ?><h3>No slot avalible</h3><?php
	        }
            ?>
        </div>

            <?php
	}
	exit();

}
die("Forbidden request");

