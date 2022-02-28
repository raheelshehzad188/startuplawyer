<?php
//order hash
$hash = md5(time());
if(get_post_meta($pid, 'hash',true))
{
    $hash = get_post_meta($pid, 'hash',true); 
}
update_post_meta($pid, 'hash',$hash);
$accept = panel_url('/index/deadline').'?hash='.$hash.'&type=accepted'; 
$dec =  panel_url('/index/deadline').'?hash='.$hash.'&type=rejected';
?>
<div class="mail_btns">
					<ul>
					<li><a href="<?= $accept;?>"><button style="background:green;" class="green_btns" >Accept</button></a></li>
					<li><a href="<?= $dec;?>"><button style="background:tomato;"  class="red_btns"  href="<?= $dec;?>">Decline</button></a></li> 
					</ul>
					</div>