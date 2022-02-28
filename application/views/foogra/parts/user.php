<?php
$recent_author = $product->getuser($pid);
?>
							<div class="col-md-4 strip user ">

							    <div class="wrappp">
							            <a  href="<?= base_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>" >

							        <img src="<?= $recent_author->img; ?>" data-src="<?= $recent_author->img; ?>" class="img-fluid lazy nn-img" alt="">

										<div class="ti-wrap">
							                <h3><?= $recent_author->display_name; ?></h3>
										</div>

							            </a>
							        
							        

							    </div>

							</div>
							
							