<?php
$product = wc_get_product( $pid );
     $post = get_post( $pid );
$recent_author = get_user_by( 'ID',$post->post_author);
$slug = get_post_field( 'post_name', get_post() );
$img = get_the_post_thumbnail_url($pid);
if(!$img)
{
    $img = ot_get_option( 'product_default_image', '' );
}
?>
<div class="item">
    

						<div class="card" style="width: 350px;">
						    <div class="webinar_name" ><?= get_the_title($pid); ?></div>
						    <a  class="web_pname" style="float:right;background: #000;color: #fff;" href="<?= panel_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>">
							                <?= $recent_author->display_name; ?>
							                </a>
							            <a  href="<?= get_permalink($pid); ?>" >

							<a class="itema" href="<?= get_permalink($pid); ?>"><img class="card-img-top" src="<?= $img; ?>" alt="Card image cap"></a>
							<div class="more_info" >
							    <span class="lang"><?php 
							    if(get_post_meta($pid,'lanaguage',true))
							    {
							        echo get_the_title(get_post_meta($pid,'lanaguage',true));
							    }
							    ?></span>
							    <span class="wdate">
							        <?php
							        $title = '';
							        $args = array(
                                        'post_parent' => $pid,
                                        'post_type' => 'wslot',
                                    );
                                    
                                    $posts_array = new WP_Query($args);
                                    foreach($posts_array->posts as $v)
                                    {
                                        $title = $title.$v->post_title.'<br>';
                                    }
                                    echo $title;
							        ?></span>
							    
							    
							</div>
							<?php
							if($slug != 'search-service-provider')
							{
							    ?>

							<div class="card-body" style="text-align: center;">

							    <button class="btn_sale">Register</button>

							</div>
							<?php
							}
							?>

						</div>

					</div>