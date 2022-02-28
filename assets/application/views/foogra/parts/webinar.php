<?php
$modal->table = 'wslots';
$modal->key = 'id';
$slts = $modal->get(array('pid'=>$pid,'status'=>0));
$modal->table = 'product_to_languages';
$modal->key = 'id';
$lngs = $modal->get(array('pid'=>$pid,'status'=>0));

$pro = $product->getproduct( $pid );
$terms = array();
$terms[] = $product->getcat( $pro->catID);
 $recent_author = $product->getuser($pro->uid);
$dead_line = $pro->dead_line;


$img = $pro->img;




?>
<li>
								<a href="<?= $pro->url; ?>">
									<figure>
										<img src="<?= $img; ?>" data-src="img/location_list_1.jpg" alt="" class="lazy loaded" data-was-processed="true">
									</figure>
									<div class="score" style="    padding-top: 82px;">
									    <?php
									    foreach($slts as $k=> $v)
									    {
									        echo $v['name']."<br>";
									    }
									    ?>
									</div>
									<em><?= $recent_author->full_name; ?></em>
									<h3 style="    margin-top: 13px;"><?= $pro->name; ?></h3>
									<small>
									    <?php
									    foreach($lngs as $k=> $v)
									    {
									        $post = $product->getpost($v['tid']);
									        if($k == 0)
									        {
									            echo $post->post_title;
									        }
									        else
									        {
									            echo ",".$post->post_title;
									        }
									    }
									    ?>
									</small>
									<ul>
										<li><span class="ribbon off">Register now</span></li>
										<li><?= $pro->price ?>LKR</li>
									</ul>
								</a>
							</li>