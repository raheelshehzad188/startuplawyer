<?php
$pro = $product->getproduct( $pid );
$terms = array();
$terms[] = $product->getcat( $pro->catID);
 $recent_author = $product->getuser($pro->uid);
$dead_line = $pro->dead_line;
//get anguage
$modal->table= 'product_to_languages';
$lngs = $modal->get(array('pid'=>$pid));
//get anguage

$img = $pro->img;




?>

<style>
span.pro_rating i.fa.fa-star.active {
    color: gold;
    margin-top: 4px;
}
</style>
							
							<div class="strip">
							    <figure>
							             
							                
							        <?php
                                        if($pro->catID != 3)
                                        {
                                            ?>
                                            <span class="ribbon off"><?= $dead_line ?></span>
                                            <?php
                                        }
                                    ?>
							    	
							        <img src="<?= $img; ?>" data-src="<?= $img; ?>" class="img-fluid lazy loaded" alt="" data-was-processed="true">
							        <a href="<?= $pro->url; ?>" class="strip_info">
							            <small>
							                <?php
	            if($lngs)
	            {
    	        foreach($lngs as $k=> $v)
    	        {
    	            $post = $product->getpost($v['tid']);
    	            if($k == 0)
    	            {
    	                
    	                
    	                echo $post->post_title;
    	            }
    	            else
    	            {
    	                echo ','.$post->post_title;
    	            }
    	        }
	            }
    	        ?>
							            </small>
							            <div class="item_title">
							                <?php
							                if($pro)
							                {
							                  ?>
							                  <h3><?= $pro->name ?></h3>
							                  <?php  
							                }
							                ?>
							                <small class="auth_name"><?= $recent_author->full_name; ?></small></br>
							                <small class="auth_name"><?php

                                    foreach($terms as $sing)

                                    {

                                        if(isset($sing->name))
                                        echo $sing->name.'<br>';

                                    }

                                    ?> </small>
							                
							            </div>
							        </a>
							    </figure>
							    <ul>

							         <li><span>Price <?= $pro->price; ?>LKR</span></li>

							        <li>
                                        
                                        
                                            <div class="score"><small style="float:left;"><span class="pro_rating">
                                                <?php
                                                    $rate_posts = array();
                                                    $sum = 0;
                                                    $mean = 0;
                                                    if(count($rate_posts))
                                                    {
                                                    $mean = $sum/ count($rate_posts);
                                                    }
                                                    $mean = $pro->rate;
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
									    </span></small><strong><?= $pro->rate_count; ?></strong></div>
                                           
                                        
                                        

							        </li>

							    </ul>
							</div>