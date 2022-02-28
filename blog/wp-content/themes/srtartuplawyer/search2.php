<?php /* Template Name: filterscol Page */
header('Access-Control-Allow-Origin: *');
$url = get_assets_url();

$parent_search = 0;
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
elseif($parent_search == 151)
{
	$cat = array('services');
}
elseif($parent_search == 153)
{
	$cat = array('corses');
}
$products = wc_get_products(array(
    'category' => $cat,
));
//filter
if ($_REQUEST['language']) {
	$slang = $_REQUEST['language'];
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
$lang = get_user_meta($authorID,'lang',true);
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
if ($_REQUEST['area']) {
	$slang = $_REQUEST['area'];
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
$lang = get_user_meta($authorID,'area',true);
                        $lang = explode(',',$lang);
	if(array_intersect($lang,$slang))
		$narr[] = $value;
}
$products = $narr;

}
if(isset($_REQUEST['search_ajax']))
{
    include "search_ajax.php";
    exit();
}
if(isset($_REQUEST['ajax']))
{
	?>
<div class="row">
						<?php
						foreach ($products as $key => $sing) {
							$pid = $sing->get_id();
							?>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="<?= get_the_post_thumbnail_url($pid); ?>" data-src="<?= get_the_post_thumbnail_url($pid); ?>" class="img-fluid lazy" alt="">
							        <a href="<?= get_permalink($pid); ?>" class="strip_info">
							            <small>
							            	<?php
							            	$terms = get_the_terms( $pid, 'product_cat' );
                                    // print_r($terms);
                                    foreach($terms as $sing)
                                    {
                                        echo $sing->name.'<br>';
                                    }
                                    ?>
							            </small>
							            <div class="item_title">
							                <h3><?= get_the_title($pid); ?></h3>
							                <small>27 Old Gloucester St</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							         <li><span>Avg. Price 29$</span></li>
							        <li>
							        	<div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<?php
						}
						?>
						<!-- /strip grid -->
					</div>
	<?php
	exit();
}

?>
<?php get_header(); ?>
		<!-- /page_header -->
		<form id="filter_form" action="<?= get_option('siteurl'); ?>/search-service-provider">
			<input type="hidden" name="search_ajax" value="1">
			<input type="hidden" name="srch" value="<?= (isset($_REQUEST["srch"])?$_REQUEST["srch"]:""); ?>">
			<input type="hidden" name="from" value="<?= isset($_REQUEST["from"])?$_REQUEST["from"]:""; ?>"/>
			<input type="hidden" name="fc_check" value="<?= isset($_REQUEST["fc_check"])?$_REQUEST["fc_check"]:""; ?>"/>
			<input type="hidden" name="dist" value="<?= isset($_REQUEST["dist"])?$_REQUEST["dist"]:""; ?>"/>
			<input type="hidden" name="refund" value="<?= isset($_REQUEST["refund"])?$_REQUEST["refund"]:""; ?>"/>
			<input type="hidden" name="parent_search" value="<?= isset($_REQUEST["parent_search"])?$_REQUEST["parent_search"]:""; ?>"/>
			<input type="hidden" name="language" value="<?= (isset($_REQUEST["language"])?$_REQUEST["language"]:"0"); ?>">
			<input type="hidden" name="min_price" value="<?= (isset($_REQUEST["min_price"])?$_REQUEST["min_price"]:"1"); ?>">
			<input type="hidden" name="max_price" value="<?= (isset($_REQUEST["max_price"])?$_REQUEST["max_price"]:"50000"); ?>">
			<input type="hidden" name="parea" value="<?= (isset($_REQUEST["parea"])?$_REQUEST["parea"]:""); ?>">
			<?php
				if(isset($_REQUEST['pcat']))
				{
				    ?>
				    <input type="hidden" name="pcat" value="<?= $_REQUEST['pcat']; ?>" />
				    <?php
				}
				?>
		</form>
		<div class="container margin_30_40">			
			<div class="row">
				<?php get_sidebar('filter'); ?>

				<div class="col-lg-9 loader_div ">
					<img src="<?= $url ?>/img/load.gif">
				</div>
				
				<div class="col-lg-9 result_div ">
					<div class="row d-none">
						<?php
						foreach ($products as $key => $sing) {
							$pid = $sing->get_id();
							?>
						<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
							<div class="strip">
							    <figure>
							        <img src="<?= get_the_post_thumbnail_url($pid); ?>" data-src="<?= get_the_post_thumbnail_url($pid); ?>" class="img-fluid lazy" alt="">
							        <a href="<?= get_permalink($pid); ?>" class="strip_info">
							            <small>
							            	<?php
							            	$terms = get_the_terms( $pid, 'product_cat' );
                                    // print_r($terms);
                                    foreach($terms as $sing)
                                    {
                                        echo $sing->name.'<br>';
                                    }
                                    ?>
							            </small>
							            <div class="item_title">
							                <h3><?= get_the_title($pid); ?></h3>
							                <small>27 Old Gloucester St</small>
							            </div>
							        </a>
							    </figure>
							    <ul>
							         <li><span>Avg. Price 29$</span></li>
							        <li>
							        	<div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
							        </li>
							    </ul>
							</div>
						</div>
						<?php
						}
						?>
						<!-- /strip grid -->
					</div>
					<!-- /row -->
					<div class="pagination_fg d-none">
					  <a href="#">&laquo;</a>
					  <a href="#" class="active">1</a>
					  <a href="#">2</a>
					  <a href="#">3</a>
					  <a href="#">4</a>
					  <a href="#">5</a>
					  <a href="#">&raquo;</a>
					</div>
				</div>
				<!-- /col -->
			</div>		
		</div>
		<!-- /container -->
		
	</main>
<?php get_footer(); ?>