
<?php

function product_sort($arr) {
    $size = count($arr)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            $kpid = $arr[$k]->get_id();
            $jpid = $arr[$j]->get_id();
            $kproduct = wc_get_product( $kpid );
            $jproduct = wc_get_product( $jpid );

            if ($kproduct->get_price() < $jproduct->get_price()) {
                // Swap elements at indices: $j, $k
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
    }
    return $arr;
}

$week = array();

for($i=1; $i <=7;$i++)

{

    $date = date('Y-m-d', strtotime(date('Y-m-d'). ' + '.$i.' day'));

    $dname = date("D", strtotime($date));

    $week[] = array(

        'date'=> $date,

        'dname'=> $dname,

        'str'=> date("d  / m", strtotime($date))

        );





}
$parent_search = array();

if($_REQUEST['parent_search'])

{

$parent_search = $_REQUEST['parent_search'];



}

$products = array();

$cat = array();

if($parent_search == 152)

{

	$cat = array('package');

}

elseif($parent_search == 154)
{

	$cat = array('webinar');

}

elseif($parent_search == 150)

{

	$cat = array('booking');

}

elseif($parent_search == 151)

{

	$cat = array('service');

}

elseif($parent_search == 153)

{

	$cat = array('course');

}
elseif($parent_search == 7633)

{
	
$args = array(
    'role'    => 'service_provider',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );


}
if(!isset($_REQUEST['pcat']))
{
    $ncat = get_post_meta($parent_search,'category',true);
    if(!empty($ncat))
    {
    $_REQUEST['pcat'] = $ncat;
    }
    
}
if(isset($_REQUEST['pcat']) && !empty($_REQUEST['pcat']))
{
    $cid = $_REQUEST['pcat'];
    $cat = get_term($cid);
    $cat = array($cat->slug);
}
$products = wc_get_products(array(

    'category' => $cat,

));

if(empty($parent_search))
{
$args     = array( 'post_type' => 'product', 'posts_per_page' => -1 );
$products = get_posts( $args ); 
$arr = array();
foreach($products as $k=> $v)
{
    $arr[] = wc_get_product( $v->ID );
}
$products = $arr;

}
if ($_REQUEST['location']) {
// die("OK");
	$slang = $_REQUEST['location'];

	$slang = explode(',', $slang);
	foreach ($slang as $key => $value) {

		if(empty($value))

			unset($slang[$key]);

	}

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$lang = get_post_meta($thePostID,'locations',true);

	if(array_intersect($lang,$slang))
{
		$narr[] = $value;

}
}
$products = $narr;
}
if ($_REQUEST['language'] && !empty($_REQUEST['language'])) {

	$slang = $_REQUEST['language'];
	$slang = explode(',', $slang);

	foreach ($slang as $key => $value) {

		if(empty($value))

			unset($slang[$key]);

	}

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$postdata = get_postdata($thePostID);

$authorID = $postdata['Author_ID'];

$lang = get_user_meta($authorID,'lang',true);
if($parent_search == 154 && get_post_meta($thePostID,'lanaguage',true))
{
	$lang = get_post_meta($thePostID,'lanaguage',true);

}
                        $lang = explode(',',$lang);

	if(array_intersect($lang,$slang))

		$narr[] = $value;

}

$products = $narr;
}
if ($_REQUEST['from']) {

	$slang = $_REQUEST['from'];

	$slang = explode(',', $slang);

	foreach ($slang as $key => $value) {

		if(empty($value))

			unset($slang[$key]);

	}

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();;

$postdata = get_postdata($thePostID);

$authorID = $postdata['Author_ID'];

$lang = get_user_meta($authorID,'type',true);

                        $lang = explode(',',$lang);

	if(array_intersect($lang,$slang))

		$narr[] = $value;

}

$products = $narr;



}
if ($_REQUEST['parea']) {

	$slang = $_REQUEST['parea'];

	$slang = explode(',', $slang);

	foreach ($slang as $key => $value) {

		if(empty($value))

			unset($slang[$key]);

	}

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$postdata = get_postdata($thePostID);

$authorID = $postdata['Author_ID'];

$lang = get_user_meta($authorID,'area',true);

                        $lang = explode(',',$lang);

	if(array_intersect($lang,$slang))

	{

		$narr[] = $value;

	}

	}

$products = $narr;



}
//search Logic
function get_tsgs($str)
{
    
    $args = array(
    'post_type'=> 'tag',
    'posts_per_page' => -1,
);              

$the_query = new WP_Query( $args );
$posts = $the_query->posts;
// print_r($posts);

$ids = array();
foreach($posts as $k=> $v)
{
    // if($v->ID == 7824)
    // {
    //     var_dump(strpos(strtolower($v->post_title), $str));
    //     die("I m here");
    // }
    if (strpos(strtolower($v->post_title), $str) > -1) {
        $ids[] = $v->ID;
    }
}
return $ids;
}
function clean($string){
     $string = str_replace( '-','&#8211;', $string);
    return strtolower(trim($string));
}
function search_pro($pid, $str)
{
    
    
    // $str = clean($str); 
                global $wpdb;

    
        //  if($pid == 8575)
        // {


            
        //     //  var_dump(clean(html_entity_decode(get_the_title($pid))));
        //      var_dump(htmlentities(get_the_title($pid))); 
        //     echo "<br>";
        //     var_dump($str);
        //     echo "<br>";
        //     var_dump(strpos(clean(get_the_title($pid)), $str));
            
        //     die();
        // }
    $tags = get_tsgs($str);
     
    $find = false;
    $ptags = get_post_meta($pid,'product_tags',true);
    if(array_intersect($tags,$ptags))
    {
        $find = 1;
    }
    // sp name search
    $product = wc_get_product( $pid );
     $post = get_post( $pid );
$recent_author = get_user_by( 'ID',$post->post_author);
if (strpos(strtolower($recent_author->display_name), $str) > -1 && !$find) {
        $find = true;
    }
                $sql = "
    SELECT * 
    FROM  $wpdb->posts
        WHERE `ID` = '".$pid."' AND `post_title` LIKE '%".$str."%'
";

$result = $wpdb->get_results ( $sql );

if($result  && !$find)
{
    $find = true;
}           $sql = "
    SELECT * 
    FROM  $wpdb->posts
        WHERE `ID` = '".$pid."' AND `post_content` LIKE '%".$str."%'
";

$result = $wpdb->get_results ( $sql );

if($result  && !$find)
{
    $find = true;
}
return $find;
}

if (isset($_REQUEST['srch']) && !empty($_REQUEST['srch'])) {
	$str = $_REQUEST['srch'];

	$narr = array();

foreach ($products as $key => $value) {

$thePostID = $value->get_id();

	if(search_pro($thePostID, $str))

	{

		$narr[] = $value;

	}

	}

$products = $narr;



}

if ($_REQUEST['dist']) {

	$slang = $_REQUEST['dist'];

	$slang = explode(',', $slang);

	foreach ($slang as $key => $value) {

		if(empty($value))

			unset($slang[$key]);

	}

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$postdata = get_postdata($thePostID);

$authorID = $postdata['Author_ID'];

$lang = get_user_meta($authorID,'district',true);

	if(in_array($lang,$slang))

	{

		$narr[] = $value;

	}

	}

$products = $narr;



}

if ($_REQUEST['min_price']) {

	$min_price = $_REQUEST['min_price'];

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$price =(float) $value->get_price();

	if($price >= $min_price)

	{

		$narr[] = $value;

	}

	}

$products = $narr;



}
if ($_REQUEST['max_price']) {

	$max_price = $_REQUEST['max_price'];

	$narr = array();

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$price = $value->get_price();

	if($price <= $max_price)

	{
        // if($thePostID == 2028)
        // {
        //     var_dump($price);
        //     var_dump($max_price);
        //     die("OP");
        // }
		$narr[] = $value;

	}

	}

$products = $narr;



}
if ($_REQUEST['refund']) {

	$narr = array();
	$slang = $_REQUEST['refund'];

	$slang = explode(',', $slang);
	

foreach ($slang as $k => $v) {
if($v == '')
{
    unset($slang[$k]);
}
    
}
foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$postdata = get_postdata($thePostID);

$authorID = $postdata['Author_ID'];
/*if($authorID == 20)
{
    print_r($slang);
    die();
}*/
$re = 0;
if(get_user_meta($authorID,'refund',true))
$re = 1;
$chk = 0;
if(get_user_meta($authorID,'refund',true) && in_array(1,$slang))
{
    $chk = 1;
}
elseif(!get_user_meta($authorID,'refund',true) && in_array(0,$slang))
{
    $chk = 1;
}
else
{
    $chk = 0;
}
	if($chk)
	{

		$narr[] = $value;

	}

	}

$products = $narr;



}

if ($_REQUEST['free']) {

	$narr = array();
	$slang = $_REQUEST['free'];

	$slang = explode(',', $slang);
	

foreach ($slang as $k => $v) {
if($v == '')
{
    unset($slang[$k]);
}
    
}
foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->get_id();

$postdata = get_postdata($thePostID);

$authorID = $postdata['Author_ID'];
/*if($authorID == 20)
{
    print_r($slang);
    die();
}*/
$re = 0;
if(get_user_meta($authorID,'first_free_cons',true))
$re = 1;
$chk = 0;
if(get_user_meta($authorID,'first_free_cons',true) && in_array(1,$slang))
{
    $chk = 1;
}
elseif(!get_user_meta($authorID,'first_free_cons',true) && in_array(0,$slang))
{
    $chk = 1;
}
else
{
    $chk = 0;
}
	if($chk)
	{

		$narr[] = $value;

	}

	}

$products = $narr;



}
?>
<?php
				if(isset($_REQUEST['pcat']))
				{
				    $cid = $_REQUEST['pcat'];
                    $cat = get_term($cid);
				    ?>
						<h2>
							<?= $cat->name; ?>
						</h2>
						<h4>
							<?= count($products); ?> packages to chose from 
						</h4>
						<p>
							<?= $cat->description; ?>
						</p>
				    <?php
				    foreach ( $products as $user ) {

                        $pid = $user->get_id();
                        get_product_part('parts/package.php',$pid);
				    }
				    exit();
				    
				}
				?>
<?php

$products = product_sort($products);
if($parent_search == 150)
{
    
foreach ( $products as $user ) {

    $pid = $user->get_id();
    $locations= get_post_meta($pid,'locations',true);
    //author
    $author_id = get_post_field ('post_author', $pid);
$display_name = get_the_author_meta( 'display_name' , $author_id ); 
$user = get_user_by( 'id', $author_id );
$rate_posts = get_user_rate($author_id);
$sum = 0;
$areas = get_user_meta($user->ID,'area',true);
$areas = explode(',',$areas);
$udis = get_user_meta($user->ID,'district',true);
foreach($rate_posts as $v)
    {
    $sum = $sum + get_post_meta($v,'rate',true);
}
$mean = $sum/ count($rate_posts);
$rid = max($rate_posts);
$msg = get_post_meta($rid,'msg',true);
$product = wc_get_product( $pid );


$prie = $product->get_price();
$img = get_the_post_thumbnail_url($pid);
if(!$img)
{
    $img = ot_get_option( 'product_default_image', '' );
}

    ?>

						<div class="row ">

							<div class="col-sm-6 col-md-6 ">

								<div class="lawyer_block">

									<a href="" target="_blank"><span class="avatar" style="border-radius: 70px;"><img class="card-img-top" src="<?= $img; ?>" alt="Card image cap"></span></a>

									<div class="name name-lawfirm">

					                    <a href="" target="_blank"><strong><?=get_the_title($pid); ?></strong></a>

					                </div>
					                <div class="name name-lawfirm" style ="font-size:15px;">

					                   Price Of Consultation : <?= $prie; ?> LKR 
                                           
					                </div>

					                <div class="lawfirm"  style ="font-size:22px;padding-top:6px;">

			                           <strong> <a href="<?= panel_url('/index/profile'); ?>/<?= $user->user_login; ?>" target="_blank"><?= $display_name; ?></a>
                                        </strong>
			                        </div>

			                        <div class="rating">                        

										<span class="">
                                                <?php
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

									    <div class="review"><?= $msg; ?></div>

									</div>

									<div class="top-practice-areas">
                                        <?php
                                        if($areas)
                                        {
                                        foreach($areas as $k=> $v)
                                        {
                                            ?>
                                            <a class="badge" href="<?= get_permalink($pid); ?>"><?= get_the_title($v); ?></a>
                                            <?php
                                        }
                                        }
                                        ?>

									</div>

									<div class="badges">
                                        <?php
                                        $first_free_cons = get_user_meta($author_id,'first_free_cons',true);
                                        if($first_free_cons)
                                        {
                                        ?>
                                    	<div class="badge free-consultation">

                      						<i class="fa fa-check"></i>Free First Consultation

                    					</div>
                    					<?php
                                        }else{?>
											<div class="badge free-consultation red-free">

												X No Free Consultation

											</div>
										<?php
										}
                    					?>
                    					<?php
                                        $first_free_cons = get_user_meta($author_id,'refund',true);
                                        if($first_free_cons)
                                        {
                                        ?>

                                    	<div class="badge fixed-price">

                      						<span class="fa fa-check"></span>Refund Guarantee

                    					</div>
                    					<?php
                                        }else{
										?>
											
										<div class="badge fixed-price red-free">

                      						X No Refund

                    					</div>
                    					<br>
										<?php }?>
                    					Location:

                                	</div>
                                	<?php
                                	$areas = $locations;
                                	if($areas)
                                    {
                                        foreach($areas as $k=> $v)
                                        {
                                            ?>
                                            <a class="badge" href="#"><?= get_the_title($v); ?></a>
                                            <?php
                                        }
                                    }
                                	?>

                                	<div class="price">

		                                <?php
		                                $product = wc_get_product( $pid );


		                                echo 'LKR '.$product->get_price();
		                                ?>

		                            </div>

		                            <div class="address">

                                        <div class="location">

                                			<span class="glyphicon glyphicon-map-marker"></span>

                                		<?php
                                		if($udis)
                                		{
                                		    echo get_the_title($udis);
                                		}
                                		?>

                            			</div>

                                    </div>

									</div>

							</div>

							<div class="col-sm-6 col-md-6" style="padding: 0;">

							    <div class="owl-carousel md_slider slider_slot owl-theme slot_carousel1">

								    <?php

								    foreach($week as $k=>$v)

								    {

								        $slots = get_slots($pid, $v['date'])

								        ?>

								        <div class="item" data-date="<?=  $v['date']; ?>" data-day="<?= $v['dname'] ?>">

								            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 flex-container">

								                <?php
								                foreach($slots as $kk => $vv)
								                {
								                    // var_dump($vv);

								                    ?>

								            <div class="slid_time">

											<a class="flex-item event-slot <?= ($vv['block'])?"blocked":""; ?>" href="
											<?php
											if($vv['block'])
											{
											    echo "block";
											}
											else
											{
											  ?>
											  <?= get_permalink($pid); ?>?bslotn=<?= $vv['id']; ?>
											  <?php  
											}
											?>" style="">

			                                    <span>

			                                        <?= $vv['value'] ?>

			                                    </span>

	                            			</a>

										</div>

								                    <?php

								                }

								                ?>

										

										

									</div>

									</div>

								        <?php

								    }

								    ?>

									

								</div>

							    </div>

						</div>

						<?php

						

}

}

else

{
    if($parent_search == 7633)
    {
        foreach($users as $k=>$v)
        {
            get_product_part('parts/user.php',$v->ID);
        }
        exit();
    }

	?>

<div class="row">

						<?php
						foreach ($products as $key => $sing) {

							$pid = $sing->get_id();
                            	$terms = get_the_terms( $pid, 'product_cat' );
							?>

						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

							<?php
							if($parent_search == 154)
							{
			                    get_product_part('parts/webinar.php',$pid);
							}
							else
							{
							get_product_part('parts/course.php',$pid);
							}
							?>

						</div>

						<?php

						}

						?>

						<!-- /strip grid -->

					</div>

	<?phP

}

?>