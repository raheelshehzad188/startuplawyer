<?php
$CI =& get_instance();
    $CI->load->model('Product_model');
    $product = $CI->Product_model;
$recent_author = $product->getuser($pid);




?>
<style>
    .strip figure .item_title small {
        background: none;
        position: initial;
        padding:0;
    }
    span.pro_rating i.fa.fa-star.active {
        color: gold;
        margin-top: 4px;
    }
</style>

	<div class="strip">
	    <figure>
	    	<span class="ribbon off"><?=$recent_author->distric; ?></span>
	        <img src="<?= $recent_author->img; ?>" data-src="<?= $recent_author->img; ?>" class="img-fluid lazy loaded" alt="" data-was-processed="true">
	        <a href="<?= base_url('/index/profile'); ?>/<?= $recent_author->user_login; ?>" class="strip_info">
	            
	            <?php
	            if($recent_author->lang)
	            {
	                echo "<small>";
    	        foreach($recent_author->lang as $k=> $v)
    	        {
    	            if($k == 0)
    	            {
    	                
    	                
    	                echo $v;
    	            }
    	            else
    	            {
    	                echo ','.$v;
    	            }
    	        }
    	        echo "</small>";
	            }
    	        ?>
    	        </small>
	            <div class="item_title">
	                <h3><?= $recent_author->display_name; ?></h3>
	                <small>
	                    <?php
	                    foreach($recent_author->type as $k => $v)
	                    {
	                        if($k == 0)
	                        {
	                            echo $v;
	                        }
	                        else
	                        {
	                            echo ', '.$v;
	                        }
	                    }
	                    ?>
	                </small><br>
	                <!--<small><?=$recent_author->distric; ?></small>-->
	            </div>
	        </a>
	    </figure>
	    <ul>

         <li><span><!--Price 1200LKR--></span></li>

        <li>
            
            
                <div class="score">
                    <small style="float:left;">
                        <span class="pro_rating">
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star gray"></i>
                            
		                </span>
		            </small>
		            <strong>10</strong>
		       </div>
               
            
            

        </li>

    </ul>
	</div>