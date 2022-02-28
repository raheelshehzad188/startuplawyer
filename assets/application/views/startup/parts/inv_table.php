<?php
$order_id = $pid;
global $wpdb;
            $result = $wpdb->get_results("select *  FROM 
            ".$wpdb->prefix."woocommerce_order_items 
            where `order_id`='".$pid."'");

$transection = 10;


?>
<table>
						<?php
						$tot = 0;
						foreach($result as $k=> $v)
						{
						    $item_id = $v->order_item_id;
						    $pid = wc_get_order_item_meta( $item_id, '_product_id', true );
						    $loc = '';
						    $var = '';
						         $post = get_post( $pid );
if(isset($post->post_author))
{
$recent_author = get_user_by( 'ID',$post->post_author);
}
$dloc = get_post_meta($pid,'dead_line',true);
$dline = get_post_meta($pid,'dead_line',true);
$lang = get_the_title(get_post_meta($pid,'lanaguage',true));
                            if($pid)
						    {
						        $tot = $tot +wc_get_order_item_meta( $item_id, '_line_total', true );
						    ?>
						    <tr <?= ($k > 0)?'class=" class="order_table""':""; ?>>
							<td colspan=\\\\\\\"6\\\\\\\">
								
								<span><?= $v->order_item_name ?>- <?= $lang ?>- <?= $loc ?> - <?= $var ?> - <?= wc_get_order_item_meta( $item_id, '_qty', true ) ?> - <?= isset
								($recent_author->user_login)?$recent_author->user_login:" "; ?>  - <?= $dline ?>Days<br>
								Brief description of requirement:<?= wc_get_order_item_meta( $item_id, 'Comment', true ) ?>
								</span>

							</td>
							<td>
								<?= wc_get_order_item_meta( $item_id, '_line_total', true ) ?> LKR

							</td>

						</tr>
						    <?php
						    }
						}
						?>
						<tr class="order_table">
							<td colspan=\\\\\\\"6\\\\\\\">
								
								<SPAN>
									Order Value
								</SPAN>

							</td>
							<td>
								<?= $tot; ?> LKR
							</td>

						</tr>
						<tr  class="order_table">
							<td colspan=\\\\\\\"6\\\\\\\">
								
								<SPAN>
									VAT
								</SPAN>

							</td>
							<td>
								00.00 LKR
							</td>

						</tr>
						<tr  class="order_table">
							<td colspan=\\\\\\\"6\\\\\\\">
								
								<SPAN>
									Transaction fee
								</SPAN>

							</td>
							<td>
								<?= $transection ?>.00 LKR
							</td>

						</tr>
						<tr  class="order_table">
							<td colspan=\\\\\\\"6\\\\\\\">
								
								<SPAN>
									TOTAL: 
								</SPAN>

							</td>
							<td>
								<?= get_post_meta($order_id,'_order_total',true); ?> LKR
							</td>

						</tr>
					</table>
					