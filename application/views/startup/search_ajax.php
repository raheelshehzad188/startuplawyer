<?php
function product_sort($arr) {
    $CI =& get_instance();
    $CI->load->model('Product_model');
    $product = $CI->Product_model;
    $size = count($arr)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            $kpid = $arr[$k]->id;
            $jpid = $arr[$j]->id;
            $kproduct = $product->getProduct( $kpid );
            $jproduct = $product->getProduct( $jpid );

            if ($kproduct->price < $jproduct->price) {
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
$parent_search = 0;
die("OK");
if($_REQUEST['parent_search'])

{

$parent_search = $_REQUEST['parent_search'];
$parent_search = explode(',',$parent_search);
var_dump($parent_search);



}

$products = array();

$cat = 0;

if($parent_search == 152)

{

	$cat = 3;

}

elseif($parent_search == 154)
{

	$cat = 4;

}

elseif($parent_search == 150)

{

	$cat = 1;

}

elseif($parent_search == 151)

{

	$cat = 5;

}

elseif($parent_search == 153)

{

	$cat = 2;

}
elseif($parent_search == 7633)

{
	
	$providers = array();
	$modal->table = 'wp_users';
	$modal->key = 'ID';
	$dusers = $modal->get(array());
	foreach($dusers as $k=> $v)
	{
	    $sing = $product->getuser($v['ID']);
	    if(in_array('service_provider',$sing->roles))
	    {
	        $providers[] = $sing;
	    }
	}
$users = $providers;


}
$args = array();
$args['catID'] = $cat;

if(!isset($_REQUEST['pcat']) &&  !empty($_REQUEST['pcat']))
{
    $ncat = $product->getcat($_REQUEST['pcat']);
    if(!empty($ncat))
    {
    $_REQUEST['pcat'] = $_REQUEST['pcat'];
    }
    
}
if(isset($_REQUEST['pcat']) && !empty($_REQUEST['pcat']))
{
    $cid = $_REQUEST['pcat'];
    $cat = $cid;
    $args = array();
$args['scatID'] = $cat;
}
die("OK");
if(empty($parent_search))
{
$modal->table = 'products';
	$modal->key = 'id';
	$products = $modal->get(array('scatID'=>$_REQUEST['pcat']));
	
$arr = array();
foreach($products as $k=> $v)
{
    $arr[] = $product->getProduct( $v['id'] );
}
$products = $arr;
}
else
{
    $modal->table = 'products';
	$modal->key = 'id';
	$products = $modal->get($args);
    $arr = array();
    foreach($products as $k=> $v)
    {
        $arr[] = $product->getProduct( $v['id'] );
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

$thePostID = $value->ID;

$lang = $product->getmeta('post',$thePostID,'locations',true);

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

$thePostID = $value->id;

$authorID = $value->uid;

$lang = $product->getmeta('user',$authorID,'lang',true);
if($parent_search == 154 && $product->getmeta('post',$thePostID,'lanaguage',true))
{
	$lang = $product->getmeta('post',$thePostID,'lanaguage',true);

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

$thePostID = $value->id;

$authorID = $value->uid;

$lang = $product->getmeta('user',$authorID,'type',true);

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

$thePostID = $value->id;

$authorID = $value->uid;

$lang = $product->getmeta('user',$authorID,'area',true);

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
    $ptags = $product->getmeta('post',$pid,'product_tags',true);
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

$thePostID = $value->id;

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

$thePostID = $value->id;

$authorID = $value->uid;

$lang = $product->getmeta('user',$authorID,'district',true);

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

$thePostID = $value->id;

$price =(float) $value->price;

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

$thePostID = $value->id;

$price = (int)$value->price;

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

$thePostID = $value->id;

$authorID = $value->uid;
/*if($authorID == 20)
{
    print_r($slang);
    die();
}*/
$re = 0;
if($product->getmeta('user',$authorID,'refund',true))
$re = 1;
$chk = 0;
if($product->getmeta('user',$authorID,'refund',true) && in_array(1,$slang))
{
    $chk = 1;
}
elseif(!$product->getmeta('user',$authorID,'refund',true) && in_array(0,$slang))
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

$thePostID = $value->id;

$authorID = $value->uid;
/*if($authorID == 20)
{
    print_r($slang);
    die();
}*/
$re = 0;
if($product->getmeta('user',$authorID,'first_free_cons',true))
$re = 1;
$chk = 0;
if($product->getmeta('user',$authorID,'first_free_cons',true) && in_array(1,$slang))
{
    $chk = 1;
}
elseif(!$product->getmeta('user',$authorID,'first_free_cons',true) && in_array(0,$slang))
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

				if(isset($_REQUEST['pcat']) && !empty($_REQUEST['pcat']))
				{
				    $cid = $_REQUEST['pcat'];
                    $cat = $product->getcat($cid);
				    ?>
						<h2>
							<?= $cat->name; ?>
						</h2>
						<h4>
							<?= count($products); ?> packages to chose from 
						</h4>
						<p>
							<?= ' '; ?>
						</p>
				    <?php
				    foreach ( $products as $user ) {

                        $pid = $user->id;
                       $this->load->view('startup/parts/package.php',array('pid'=>$pid));
				    }
				    exit();
				    
				}
				?>
<?php
$products = product_sort($products);

if($parent_search == 150)
{
foreach ( $products as $user ) {
    $pid = $user->id;
    $locations= $product->getmeta('post',$pid,'locations',true);
    //author
    $pro = $product->getProduct( $pid );
 $recent_author = $product->getuser($pro->uid);
 $author_id = $pro->uid ;
$display_name = $recent_author->display_name; 
$user = $recent_author;
$sum = 0;
$areas = $product->getmeta('user',$user->ID,'area',true);
$areas = explode(',',$areas);
$udis = $product->getmeta('user',$user->ID,'district',true);
$mean = $recent_author->rate;
$msg = $recent_author->rate_msg;


$prie = $pro->price;
$img = $pro->img;

    ?>

						<div class="row ">

							<div class="col-sm-6 col-md-6 ">

								<div class="lawyer_block">

									<a href="" target="_blank"><span class="avatar" style="border-radius: 70px;"><img class="card-img-top" src="<?= $img; ?>" alt="Card image cap"></span></a>

									<div class="name name-lawfirm">

					                    <a href="" target="_blank"><strong><?=$pro->name; ?></strong></a>

					                </div>
					                <div class="name name-lawfirm" style ="font-size:15px;">

					                   Price Of Consultation : <?= $prie; ?> LKR 
                                           
					                </div>

					                <div class="lawfirm"  style ="font-size:22px;padding-top:6px;">

			                           <strong> <a href="<?= base_url('/index/profile'); ?>/<?= $user->user_login; ?>" target="_blank"><?= $display_name; ?></a>
                                        </strong>
			                        </div>

			                        <div class="rating">                        

										<span class="">
                                                <?php
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

									    </span>(<?= $recent_author->rate_count; ?>) 

									    <div class="review"><?= $msg; ?></div>

									</div>

									<div class="top-practice-areas">
                                        <?php
                                        if($areas)
                                        {
                                            
                                        foreach($areas as $k=> $v)
                                        {
                                            $post = $product->getpost( $v );
                                            ?>
                                            <a class="badge"><?= $post->post_title; ?></a>
                                            <?php
                                        }
                                        }
                                        ?>

									</div>

									<div class="badges">
                                        <?php
                                        $first_free_cons = $product->getmeta('user',$author_id,'first_free_cons',true);
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
                                        $first_free_cons = $product->getmeta('user',$author_id,'refund',true);
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
                                            $post = $product->getpost( $v );
                                            ?>
                                            <a class="badge" href="#"><?= $post->post_title; ?></a>
                                            <?php
                                        }
                                    }
                                	?>

                                	<div class="price">

		                                <?php


		                                echo 'LKR '.$pro->price;
		                                ?>

		                            </div>

		                            <div class="address">

                                        <div class="location">

                                			<span class="glyphicon glyphicon-map-marker"></span>

                                		<?php
                                		if($udis)
                                		{
                                		    $post = $product->getpost( $udis );
                                		    echo $post->post_title;
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

								        $slots = $product->get_slots($pid, $v['date'])

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
											  <?= $pro->url; ?>?bslotn=<?= $vv['id']; ?>
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
            $recent_author = $product->getuser($v->ID);
            print_r($recent_author);
            echo "I m here";
            $this->load->view('startup/parts/user.php',array('pid'=>$v->ID));
        }
        exit();
    }

	?>

<div class="row">

						<?php
						foreach ($products as $key => $sing) {

							$pid = $sing->id;
							
                            // 	$terms = get_the_terms( $pid, 'product_cat' );
							?>

						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">

							<?php
							if($parent_search == 154)
							{
			                   $this->load->view('startup/parts/webinar.php',array('pid'=>$pid));
							}
							elseif($parent_search == 151)
							{
							    echo "service";
							   echo $r = $this->load->view('startup/parts/course.php',array('pid'=>$pid),true);
							}
							else
							{
							    
							echo $r = $this->load->view('startup/parts/course.php',array('pid'=>$pid),true);
							
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
exit();

?>