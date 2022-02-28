This is a notice that an invoice has been generated on <span><?= date('d/m/Y'); ?>.</span> <br>
Your payment method is: Bank Deposit/Transfer<br><br>

Your order is placed on hold for 48 hours until you make the payment and email the Payment slip to banktranfers@startuplawyer.lk with this invoice number as the subject. 
Please be informed that the order will be automatically cancelled if the transfer slip isnt emailed to usq1 within this timeline.  <br><br>

Invoice <span>#<?= $order_id; ?></span><br>
Amount Due:<span> <?= get_post_meta($order_id,'_order_total',true) ?> </span>LKR<br>
Due Date: <span><?= $new_time = date("d/m/Y", strtotime('+5 hours')) ?></span><br>
<br>
Invoice Items<br>
<?php
global $wpdb;
            $result = $wpdb->get_results('select t1.order_item_id, t2.* FROM 
            wp_woocommerce_order_items as t1 JOIN wp_woocommerce_order_itemmeta as t2 ON t1.order_item_id = t2.order_item_id
            where t1.order_id='.$order_id);
            foreach($result as $k=> $v)
            {
                if($v->meta_key == '_product_id')
                {
                    $item_id = $v->order_item_id;
                ?>
                <span><?= get_the_title($v->meta_value); ?>- 
                <?php
                echo $post_author =  get_the_author_meta('display_name',get_post_field ('post_author', $v->meta_value));
                ?> <?= wc_get_order_item_meta( $item_id, '_qty', true ); ?> <?= wc_get_order_item_meta( $item_id, '_line_subtotal', true ); ?> </span>LKR<br>
                <?php
                }
            }
?>

------------------------------------------------------<br>
Total: <span><?= get_post_meta($order_id,'_order_total',true) ?></span> LKR<br>