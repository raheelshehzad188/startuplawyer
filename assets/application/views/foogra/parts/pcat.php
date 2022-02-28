<?php
$cat = $product->getcat($pid);
$img = '';
if(isset($cat->img))
{
    $img = $cat->img;
}
$products = $product->getProductsByCat($pid);


?>
<div class="strip">

							    <figure>

							        <img src="<?= $img; ?>" class="img-fluid lazy loaded" alt="" data-was-processed="true">

							        <a href="<?= site_url("index/search"); ?>?pcat=<?= $pid; ?>" class="strip_info">

							            <small>

							            	<?= count($products); ?> Packages to chose from 
							            </small>
							            
							            <div class="item_title">

							                <h3><?= isset($cat->name)?$cat->name:""; ?></h3>

							                <small class="d-none">27 Old Gloucester St</small>

							            </div>

							        </a>

							    </figure>

							    <ul>

							         <li style="display:none;"><span><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">LKR</span>101.00</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">LKR</span>100.00</span></ins></span></li>

							        <li>
                                                                                    <div class="score"  style="display:none;"><span>Dilivery<em> Time</em></span><strong>10 days</strong></div>
                                            
							        </li>

							    </ul>

							</div>