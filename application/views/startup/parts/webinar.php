<?php
$modal->table = 'wslots';
$modal->key = 'id';
$slts = $modal->get(array('pid'=>$pid,'status'=>0));
$pro = $product->getproduct( $pid );
$terms = array();
$terms[] = $product->getcat( $pro->catID);
 $recent_author = $product->getuser($pro->uid);
$dead_line = $pro->dead_line;

$modal->table= 'product_to_languages';
$lngs = $modal->get(array('pid'=>$pid));


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
							    	<?= (isset($recent_author->display_name) && !empty($recent_author->display_name))?'<span class="ribbon off">'.$recent_author->display_name.'</span>' : '' ; ?>
							        <img src="<?= $img; ?>" data-src="<?= $img; ?>" class="img-fluid lazy loaded" alt="" data-was-processed="true">
							        <a href="<?= $pro->url; ?>" class="strip_info">
							            <small><?php
							                foreach($lngs as $k=> $v)
                                            {
                                                $post = $product->getpost($v['tid']);
                                                if($post)
                                                {
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
							                ?></small>
							            <div class="item_title">
							                <h3><?= $pro->name; ?></h3>
							                <?php

                                    foreach($terms as $sing)

                                    {

                                        if(isset($sing->name))
                                        echo '<small>'.$sing->name.'</small>';

                                    }

                                    ?>
							                
							            </div>
							        </a>
							    </figure>
							    <ul>

							         <li><span>Price <?= $pro->price; ?></span></li>

							        <li>
                                        <?php
									    foreach($slts as $k=> $v)
									    {
									        echo $v['name']."<br>";
									    }
									    ?>   
                                        
                                       

							        </li>

							    </ul>
							</div>