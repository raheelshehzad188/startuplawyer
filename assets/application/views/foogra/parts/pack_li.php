<?php

$terms = $product->getProductCats( $pid);
$pro = $product->getProductByID( $pid );
 $recent_author = $product->getuser($pro->post_author);
$dead_line = $product->getmeta('post',$pid,'dead_line',true);

$img = $pro->img;
 


?>
<li>
    <a href="<?= $pro->url; ?>">
    <img src="<?= $img ?>" />
    <div class="info" ><?= $pro->post_title; ?>
    </a>
    <div class="author"><a  class="pname" href="<?= base_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>">
							                <?= $recent_author->display_name; ?>
							                </a>
							            
							                </div>
							                    <div class="sing_price" ><?= $pro->price; ?></div>
    </div>
</li>