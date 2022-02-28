<?php
$recent_author = get_user_by( 'ID',$pid);




?>
							<div class="col-md-4 strip user ">

							    <div class="wrappp">
							            <a  href="<?= panel_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>" >

							        <img src="<?= get_user_img($pid); ?>" data-src="<?= get_user_img($pid); ?>" class="img-fluid lazy nn-img" alt="">

										<div class="ti-wrap">
							                <h3><?= $recent_author->display_name; ?></h3>
										</div>

							            </a>
							        
							        

							    </div>

							</div>