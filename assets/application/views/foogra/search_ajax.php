
<?php
function product_sort($arr) {
    return $arr;
    $CI =& get_instance();
    $CI->load->model('Product_model');
    $product = $CI->Product_model;
    $size = count($arr)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            $kpid = $arr[$k]->id;
            $jpid = $arr[$j]->id;
            $kproduct = $product->getproduct( $kpid );
            $jproduct = $product->getproduct( $jpid );

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
$sort_key = 'id';
    $sort_order = 'desc';
$parent_search = array();
if($_REQUEST['sort'])
{
    $exp = explode('-',$_REQUEST['sort']);
    // var_dump($exp);
    if(isset($exp[0]))
    {
        $sort_key = $exp[0];
    }
    if(isset($exp[1]))
    {
        $sort_order = $exp[1];
    }
}
if($_REQUEST['parent_search'])
{
$parent_search = $_REQUEST['parent_search'];
$parent_search = explode(',',$parent_search);
//var_dump($parent_search);
// var_dump(in_array(153,$parent_search));
//echo "<br>";
foreach($parent_search as $k=> $v)
{
    if(empty($v))
    {
        unset($parent_search[$k]);
    }
}
}

$products = array();

$cat = array();

if(in_array(152,$parent_search))

{
	$cat[] = 3;
}
if(in_array(154,$parent_search))
{

	$cat[] = 4;


}
if(in_array(150,$parent_search))
{

	$cat[]= 1;

}

if(in_array(151,$parent_search))

{

	$cat[]= 5;

}

if(in_array(153,$parent_search))
{

	$cat[] = 2;
}
$users = array();
if(in_array(7633,$parent_search))
{	
	$providers = array();
	$modal->table = 'wp_users';
	$modal->key = 'ID';
	$users = $modal->get(array());
	foreach($users as $k=> $v)
	{
	    $sing = $product->getuser($v['ID']);
	    if(isset($sing->roles) && (in_array('service_provider',$sing->roles) || in_array('draft_provider',$sing->roles)))
	    {
	        $sing->catID = 7633;
	        $providers[] = $sing;
	    }
	}
$users = $providers;


}
if(isset($_REQUEST['pcat']) && !empty($_REQUEST['pcat']))
{
    $cid = $_REQUEST['pcat'];
    $cat[] = $cid;
}
// var_dump($cat);
// $products = $product->getProductsByCat($cat);
$CI =& get_instance();
    $CI->load->model('Common_model');
    $modal= $CI->Common_model;
    
if($cat)
{
$where = array(
    'catID' => $cat
    );
    // echo "152";
    $CI =& get_instance();
    $CI->load->model('Common_model');
    $modal= $CI->Common_model;
    $CI->db->where_in('catID',$cat);
    $modal->table = 'products';
    // var_dump($modal->get(array()));
    // echo "155";
$products = $modal->get_sort(array(), $sort_key,$sort_order);
// print_r($products);
// echo "jnfghh";
}
else
{
    $where = array();
        $modal->table = 'products';
$products = $modal->get_sort($where,$sort_key,$sort_order);
}
// var_dump($cat);

$CI =& get_instance(); 
//  var_dump($CI->db->last_query());
// die();/
if(count($parent_search) == 1 && $parent_search[0] == 7633)
{
    $products = $users;
}
else if($users && $products)
{
      $products = array_merge($users, $products);
}
// var_dump($products);
//      echo "<br>";
//      die();
$arr = array();
foreach($products as $k=> $v)
{
    $arr[] = (object) $v;
}

$products = $arr;
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
if($users)
{
    foreach ($users as $key => $value) {

$authorID = $value->ID;
$lang = $product->getmeta('user',$authorID,'lang',true);
                    $lang = explode(',',$lang);

	if($lang & array_intersect($slang,$lang)) 
	{
		$narr[] = $value;
	}

	}
	$users = $narr;
}
else
{
foreach ($products as $key => $value) {

$thePostID = $value->id;

$modal->table= 'product_to_languages';
$lngs = $modal->get(array('pid'=>$thePostID));

$lang = array();
foreach($lngs as $k=> $v)
{
    $lang[] = $v['tid'];
}


	if($lang & array_intersect($slang,$lang)) 
	{
		$narr[] = $value;
	}

}
}

$products = $narr;
}

if (isset($_REQUEST['from']) && !empty($_REQUEST['from'])) {

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
);              
$CI =& get_instance();
    $CI->load->model('Common_model');
    $modal = $CI->Common_model;
$modal->table = 'wp_posts';
$modal->key = 'ID';
$posts = $modal->get( $args );
// print_r($posts);

$ids = array();
foreach($posts as $k=> $v)
{
    // if($v->ID == 7824)
    // {
    //     var_dump(strpos(strtolower($v->post_title), $str));
    //     die("I m here");
    // }
    if (strpos(strtolower($v['post_title']), $str) > -1) {
        $ids[] = $v['ID'];
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
    $tags = get_tsgs($str); 
    $find = false;
    $CI =& get_instance();
    $CI->load->model('Product_model');
    $product = $CI->Product_model;
    $ptags = $product->getmeta('post',$pid,'product_tags',true);
    if($ptags && is_array($ptags) && array_intersect($tags,$ptags))
    {
        $find = 1;
    }
    // sp name search
    $product = $product->getproduct( $pid );
    $product1 = $CI->Product_model;
$recent_author = $product1->getuser($product->uid);
if (strpos(strtolower($recent_author->full_name), $str) > -1 && !$find) {
        $find = true;
    }
                $sql = "
    SELECT * 
    FROM  products
        WHERE `id` = '".$pid."' AND `name` LIKE '%".$str."%'
";
    $query = $CI->db->query($sql);


$result = $query->result_array();
if($result  && !$find)
{
    $find = true;
}           $sql = "
    SELECT * 
    FROM  products
        WHERE `id` = '".$pid."' AND `long_disc` LIKE '%".$str."%'
";

    $query = $CI->db->query($sql);


$result = $query->result_array();

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
if($users)
{
    foreach ($users as $key => $value) {

    $authorID = $value->ID;

    $lang = $product->getmeta('user',$authorID,'district',true);

	if(in_array($lang,$slang))

	{

		$narr[] = $value;

	}

	}
	$users = $narr;
}
else
{

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->id;

$authorID = $value->uid;

$lang = $product->getmeta('user',$authorID,'district',true);

	if(in_array($lang,$slang))	{


		$narr[] = $value;

	}

	}
}
$products = $narr;



}

// adil work

if ($_REQUEST['cate']) {
	$slang = $_REQUEST['cate'];

	$slang = explode(',', $slang);
	

	foreach ($slang as $key => $value) {

		if(empty($value))

			unset($slang[$key]);

	    }

	$narr = array();
if($users)
{
    foreach ($users as $key => $value) {

    $authorID = $value->ID;

    $lang = $product->getmeta('post',$authorID,'stag',true);

	if(array_intersect($lang,$slang))

	{

		$narr[] = $value;

	}

	}
	$users = $narr;
}
else
{

foreach ($products as $key => $value) {

	global $wp_query;

$thePostID = $value->id;

$authorID = $value->uid;

$modal->table= 'product_to_tags';
$lngs = $modal->get(array('pid'=>$thePostID));

$lang = array();
foreach($lngs as $k=> $v)
{
    $lang[] = $v['tid'];
}
	if(array_intersect($lang,$slang))	{


		$narr[] = $value;

	}

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
if(count($parent_search) == 1 && $parent_search[0] == 150)
{
    $ids = array();
    foreach($products as $k=> $v)
    {
        $ids[]  = $v->id;
    }
    echo json_encode($ids);
    die();
}
?>
<?php

				if(isset($_REQUEST['pcat']))
				{
				    $cid = $_REQUEST['pcat'];
                    $cat = $product->get_term($cid);
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

                        $pid = $user->ID;
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

    $pid = $user->ID;
    $locations= $product->getmeta('post',$pid,'locations',true);
    //author
    $pro = $product->getProductByID( $pid );
 $recent_author = $product->getuser($pro->post_author);
 $author_id = $pro->post_author ;
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

					                    <a href="" target="_blank"><strong><?=$pro->post_title; ?></strong></a>

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
                                            $post = $product->getProductByID( $v );
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
                                            $post = $product->getProductByID( $v );
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
                                		    $post = $product->getProductByID( $udis );
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

	?>

<div class="row">

						<?php
						foreach ($products as $key => $sing) {

                            if(isset($sing->id))
                            {
							$pid = $sing->id;
                            }
                            elseif(isset($sing->ID))
                            {
							$pid = $sing->ID;
                            }
							
                            // 	$terms = get_the_terms( $pid, 'product_cat' );
							?>
						    <?php
						    if($v->catID == 7633)
						    {
						        $CI =& get_instance();
                                $CI->load->model('Product_model');
                                $product = $CI->Product_model;
						        $sing = $product->getuser($sing->ID);
                                // var_dump($v);
                                if($v->display_name)
                                {
                                    echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">';
                                    $CI->load->view('startup/parts/user.php', array('pid'=>$pid));
                                    echo "</div>";
                                    
                                }
						    }
						    elseif($sing->catID == 4)
							{
							    echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">';
			                   $this->load->view('startup/parts/webinar.php',array('pid'=>$pid));
			                   echo "</div>";
							}
							elseif($sing->catID == 5)
							{
							   echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">';
							   echo $r = $this->load->view('startup/parts/service.php',array('pid'=>$pid),true);
							   echo "</div>";
							}
							elseif($sing->catID == 3)
							{
							   echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">';
							   echo $r = $this->load->view('startup/parts/package.php',array('pid'=>$pid),true);
							   echo "</div>";
							}
							elseif($sing->catID == 2)
							{
							    echo '<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">';
							echo $r = $this->load->view('startup/parts/course.php',array('pid'=>$pid),true);
							echo "</div>";
							
							}
						    ?>

						<?php

						}

						?>

						<!-- /strip grid -->

					</div>

	<?phP

}
exit();

?>