<?php
$cat = $product->getcat($pid);
$img = '';
if(isset($cat->img))
{
    $img = $cat->img;
}
$products = $product->getProductsByCat($pid);


?>
<div class="item">
			        <div class="strip">
			            <figure>
			                <span class="ribbon off">-30%</span>
			                <img src="<?= $url; ?>img/lazy-placeholder.png" data-src="<?= $url; ?>img/location_1.jpg" class="owl-lazy" alt="">
			                <a href="detail-restaurant.html" class="strip_info">
			                    <small>Pizza</small>
			                    <div class="item_title">
			                        <h3>Da Alfredo</h3>
			                        <small>27 Old Gloucester St</small>
			                    </div>
			                </a>
			            </figure>
			            <ul>
			                <li><span class="loc_open">Now Open</span></li>
			                <li>
			                    <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
			                </li>
			            </ul>
			        </div>
			    </div>