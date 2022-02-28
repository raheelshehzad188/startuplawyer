<?php

$terms = get_the_terms( $pid, 'product_cat' );
$product = wc_get_product( $pid );
     $post = get_post( $pid );
$recent_author = get_user_by( 'ID',$post->post_author);
$dead_line = get_post_meta($pid,'dead_line',true);
$img = get_the_post_thumbnail_url($pid);
if(!$img)
{
    $img = ot_get_option( 'product_default_image', '' );
}
 


?>
<li>
    <a href="<?= get_permalink($pid); ?>">
    <img src="<?= $img ?>" />
    <div class="info" ><?= get_the_title($pid); ?>
    </a>
    <div class="author"><a  class="pname" href="<?= panel_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>">
							                <?= $recent_author->display_name; ?>
							                </a>
							            
							                </div>
							                    <div class="sing_price" ><?= $product->get_price_html(); ?></div>
    </div>
</li>