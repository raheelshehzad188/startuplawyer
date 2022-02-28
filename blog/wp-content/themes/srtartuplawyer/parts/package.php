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
						<div class="col-md-4">	
							<div class="strip new-strip">
									<div class="img-cvr">
							        <a href="<?= get_permalink($pid); ?>" class="strip_info">
										<img src="<?= $img; ?>" data-src="<?= $img; ?>" class="" alt="">
									</a>
									</div>
									<div class="bot-cvr">
											

											<div class="item_title">

										<a href="<?= get_permalink($pid); ?>" class="strip_info">
												<h3><?= get_the_title($pid); ?></h3>
										</a>
											   <p style="max-height:60%; min-height: 60%;">
											<?= get_the_excerpt($pid); ?>
											   </p>

											</div>


							    
										<ul>

											 <li><span><?= $product->get_price_html(); ?></span></li>
                                                    <br>
											<li>
												<?php
												if(true)
												{
													?>
													<a href="<?= site_url(); ?>/?add-to-cart=<?= $pid ?>&quantity=1">
													<div class="score1"><strong>Add to Cart</strong></div>
													</a>
													<?php
												}
												?>

											</li>

										</ul>

									</div>
							</div>
						</div>