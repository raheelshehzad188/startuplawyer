<?php
$terms = $product->getProductCats( $pid);
$pro = $product->getProductByID( $pid );
 $recent_author = $product->getuser($pro->post_author);
$dead_line = $product->getmeta('post',$pid,'dead_line',true);

$img = $pro->img;



?>
						<div class="col-md-4">	
							<div class="strip new-strip">
									<div class="img-cvr">
							        <a href="<?= $pro->url; ?>" class="strip_info">
										<img src="<?= $img; ?>" data-src="<?= $img; ?>" class="" alt="">
									</a>
									</div>
									<div class="bot-cvr">
											

											<div class="item_title">

										<a href="<?= $pro->url; ?>" class="strip_info">
												<h3><?= $pro->post_title; ?></h3>
										</a>
											   <p style="max-height:60%; min-height: 60%;">
											<?= $pro->post_excerpt; ?>
											   </p>

											</div>


							    
										<ul>

											 <li><span><?= $pro->price; ?></span></li>
                                                    <br>
											<li>
												<?php
												if(true)
												{
													?>
													<a href="<?= base_url(); ?>/?add-to-cart=<?= $pid ?>&quantity=1">
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