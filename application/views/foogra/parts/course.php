<?php

$pro = $product->getproduct( $pid );
$terms = $product->getcat( $pro->catID);
 $recent_author = $product->getuser($pro->uid);
$dead_line = $product->getmeta('post',$pid,'dead_line',true);

$img = $pro->img;




?>
							<div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off"><?= $pro->price; ?>LKR</span>
			                <img src="<?= $pro->img; ?>" data-src="<?= $pro->img; ?>" class="owl-lazy" alt="">
			                <a href="<?= $pro->url; ?>" class="strip_info">
			                    <small><?= $recent_author->full_name ?></small>
			                    <div class="item_title">
			                        <h3><?= $pro->name?></h3>
			                        <!--<small>27 Old Gloucester St</small>-->
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Enroll Now</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>