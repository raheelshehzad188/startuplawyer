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
							<div class="strip">

							    <figure>

							        <img src="<?= $img; ?>" data-src="<?= $img; ?>" class="img-fluid lazy" alt="">

							        <div class="strip_info">

							            <small>

							            	<?php

							            	$terms = get_the_terms( $pid, 'product_cat' );

                                    foreach($terms as $sing)

                                    {

                                        echo $sing->name.'<br>';

                                    }

                                    ?>

							            </small>
                                            
							                <a  class="pname" style="float:right;background: #000;color: #fff;" href="<?= panel_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>">
							                <?= $recent_author->display_name; ?>
							                </a>
							            <a  href="<?= get_permalink($pid); ?>" >

							            <div class="item_title">

							                <h3><?= get_the_title($pid); ?></h3>
							                    <div class="rating">                        

										<span class="pro_rating">
                                                 <?php
                                                 $rate_posts = get_product_rate($pid);
                                                 $sum = 0;
                                                 foreach($rate_posts as $v)
                                                {
                                                $sum = $sum + get_post_meta($v,'rate',true);
                                            }
                                            $mean = $sum/ count($rate_posts);
                                                $mean = round($mean);
                                                for($i = 1; $i <=5; $i++)
                                                {
                                                    if($i <=$mean)
                                                    {
                                                        ?>
                                                    <i class="fa fa-star active"></i>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                    <i class="fa fa-star gray"></i>
                                                    <?php
                                                        
                                                    }
                                                }
                                                ?>   
									    </span>(<?= count($rate_posts); ?>) 

									    <div class="review"></div>

									</div>

							            </div>
							            </a>
							            </div>

							        

							    </figure>

							    <ul>

							         <li><span><?= $product->get_price_html(); ?></span></li>

							        <li>
                                        <?php
                                        if($terms[0]->term_id != 17)
                                        {
                                            ?>
                                            <div class="score"><span>Delivery <em> Time</em></span><strong><?= $dead_line ?> days</strong></div>
                                            <?php
                                        }
                                        ?>

							        </li>

							    </ul>

							</div>