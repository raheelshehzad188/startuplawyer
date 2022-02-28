<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Products extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!get_current_user_id())
		{
			redirect(base_url());
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'products';
		$this->Common_model->key = 'id';
		$this->modal = $this->Common_model;
		$this->url = base_url().'/admin/products';
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Product';
    private $multi= 'Products';
    private $add= 'addproduct';
    private $all= 'allproduct';//'table';
    private $url= '';
    private $modal= '';
	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */
	 function wslots($product_id)

{

    $this->db->where('pid',$product_id)->where('status',0)->delete('wslots');
$this->load->model('Product_model');
                $product = $this->Product_model;
                $pro = $product->getproduct($product_id);

    $json = $pro->booking_data;

    $edit= json_decode($json,true );

    $slot_sd = $edit['slot_sd'];

    $slot_st = $edit['slot_st'];

    $slot_ed = $edit['slot_ed'];

    $slot_et = $edit['slot_et'];

    foreach($edit['slot_st'] as $k=>$st)

    {

        if(!empty($slot_st[$k]) && !empty($slot_sd[$k]))

        {
            $in = array();

            $time = date("h:i A", strtotime($slot_st[$k]));

            $in['name'] = $title = $slot_sd[$k].' '. $time;
            $in['pid'] = $product_id;

            if(isset($slot_sd[$k]) && $product_id)
            {
                $in['from_date'] = $slot_sd[$k];
            }

            if(isset($slot_st[$k]) && $product_id)

                $in['from_time'] = $slot_st[$k];

            if(isset($slot_ed[$k]) && $product_id)

                $in['to_date'] = $slot_ed[$k];

            if(isset($slot_et[$k]) && $product_id)

                $in['to_time'] = $slot_et[$k];

            $this->modal->table = 'wslots';
            $this->modal->add($in);

        }

    }

}

function get_cat_by_id($id)
{
    $pID =new stdClass;
    global $wpdb;
$table = $wpdb->prefix.'terms';
$result = $wpdb->get_results ( "
    SELECT * 
    FROM  $table
        WHERE `term_id` = '".$id."'
" );
if(isset($result[0]))
{
    $pID = $result[0];
}
if(isset($pID) && isset($pID->term_id))
{
    $table = $wpdb->prefix.'term_taxonomy';
$result = $wpdb->get_results ( "
    SELECT * 
    FROM  $table
        WHERE `term_id` = '".$pID->term_id."'
" );
 if(isset($result[0]->parent))
{
    $pID->parent = $result[0]->parent;
}
}
return $pID;
}
function update_product_attribute($pid, $option,$type,$extra = array())
{
    
    $key = $this->load->config->item('con_key');
$sct = $this->load->config->item('sec_key');
$url = site_url()."/wp-json/wc/v3/products/".$pid."?consumer_key=".$key."&consumer_secret=".$sct;
    if($type== 'attr')
{
    $attr = array();
    foreach($option as $k=> $v)
    {
        $vls = array();
        foreach($v['values'] as $kk=> $vv)
        {
            if(isset($vv['name']))
            {
                $vls[] = $vv['name'];
            }
        }
        $attr[] = array(
            'name'=> $v['name'],
            'position'=> $k,
            'visible'=> true,
            'variation'=> true,
            'options'=> $vls,
            );
    }
}
$cats = array();
    if($type== 'cat')
    {
        
        foreach($option as $k=> $v)
        {
            $term = $this->get_cat_by_id($v);
            // print_r($term);
            $cats[] = array(
                'id'=>$v,
                'name'=>$term->name,
                'slug'=>$term->slug,
                );
        }
    }
$imgs = array();
    if($type== 'img')
    {
        
        foreach($option as $k=> $v)
        {
            $imgs[] = array(
                'src'=>$v,
                );
        }
    }
$cat_data = array();

    if($type== 'creat_cat' || $type== 'update_cat')
    {
        $url = site_url()."/wp-json/wc/v3/products/categories?consumer_key=".$key."&consumer_secret=".$sct;
        $cat_data = array(
            'name'=> $option,
            'parent'=> $pid
            
            );
            if($type== 'update_cat')
            {
                $url = site_url()."/wp-json/wc/v3/products/categories/".$pid."?consumer_key=".$key."&consumer_secret=".$sct;
              $cat_data = array(
            'parent'=> $option,
            'id'=> $pid
            
            );  
            if(isset($extra['name']))
            {
                $cat_data['name'] = $extra['name'];
            }  
            if(isset($extra['image']))
            {
                $cat_data['image'] = array('src'=>$extra['image']);
            }
            }
        
    }
    
$curl = curl_init();
$param = array();
if($type== 'attr')
{
$param['attributes'] = $attr;
}
if($type== 'img')
{
$param['images'] = $imgs;
}
if($type== 'cat')
{
    
$param['categories'] = $cats;
}
if($type== 'creat_cat' || $type== 'update_cat')
{
  $param =   $cat_data;
}

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($param),
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: f8d5c30c-047e-2149-682f-3d94b5e4b419"
  ),
));

$response = curl_exec($curl);
if($type== 'cat')
{
}
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    return $response = json_decode($response);
}
}


    function process_cat($pid){
    $parent = get_post_meta($pid,'product_cat_path',true);
    // $parent = 'New test8';
    $cid = $this->get_cat_by_name($parent);
    
    if(!$cid)
    {
        $ret = $this->update_product_attribute('0', $parent,'creat_cat');
    }
    $cid = $this->get_cat_by_name($parent);
    $cats = array();
    $cats[] = $cid;
    
    $this->update_product_attribute($pid, $cats,'cat');
    return $cid;
    
    
if(true)
{
    $parent = get_post_meta($pid,'product_cat_path',true);
    $parent = str_replace("'"," ",$parent);
    $parent = explode('/',$parent);
    $parent_id=0;
    $pID = 0;
    foreach($parent as $k=> $v)
    {
        //check if already exist
        $old_id = $parent_id;
        $cats = array();
        $cid = $this->get_cat_by_name($v);
        if(!$cid)
        {
            
            $ret = $this->update_product_attribute($parent_id, $v,'creat_cat');
$parent_id = $this->get_cat_by_name($v);


        }
        else
        {
            $parent_id = $cid;
        }
        if($parent_id == $pID)
        {
            $term = $this->get_cat_by_id( $pID );
            if(!isset($term->parent) || empty($term->parent))
            {
                $update = wp_update_term($pID , 'product_cat', array(
    'parent' => $old_id, // optional
) );
            }    
        }
        if($parent_id && !in_array($parent_id, $cats))
    {
        $cats[] = $parent_id;
    }
        $r = wp_set_object_terms( $pid, $v, 'product_cat' );
        
        
        // var_dump($r);
    }
    $this->update_product_attribute($pid, $cats,'cat');
    $this->update_product_attribute($pcat, $parent_id,'update_cat');



    // wp_set_object_terms( $pid, $pcat, 'product_cat' );

}
}

	
	public function slots()
	{
	    if(isset($_REQUEST['product_id']))
	    {
	        $data = array();
	        
	        $pid = $_REQUEST['product_id'];
	        $data['pid'] = $pid;
	        $this->modal->table = 'bslots';
	        $breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = $this->url.'/all';
		$data['url'] = $this->url;
		$data['assets'] = $assets= base_url('/assets').'/';
		$page = 'Manage Slots';
		$breed[$page] = '#';
		$data['breed'] = $breed;
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $page;
		if($_REQUEST['fdate'] || $_REQUEST['tdate'])
		{
		    if($_REQUEST['fdate'])
		 $this->db->where('date >=',$_REQUEST['fdate']);
		    if($_REQUEST['tdate'])
		 $this->db->where('date <=',$_REQUEST['tdate']);   
		 $data['data'] = $all = $this->modal->get(array('pid'=>$pid));
		}
		else
		{
	        $data['data'] = $all = $this->modal->get(array('pid'=>$pid));
		}
		if($_REQUEST['products'] && !empty($_REQUEST['products']))
		{
		    $products = $_REQUEST['products'];
		    $up = array(
		        'status' => 2
		        );
		      //  echo $this->db->last_query();
		      //  var_dump($all);
		      //  die();
		    if($products == 'all')
		    {
		        foreach($all as $k=> $v)
		        {
		            $this->modal->update($v['id'],$up);
		        }
		    }
		    else
		    {
		        $products = explode(',',$products);
		        foreach($all as $k=> $v)
		        {
		            if(in_array($v['id'],$products))
		            {
		            $this->modal->update($v['id'],$up);
		            }
		        }
		    }
		    $this->session->set_flashdata('success', 'Slots Block successfully!');
		    //die();
		}
	       
	       
	        
	        
	        $this->template->admin('allslots',$data);
	    }
	}
	public function add_webinar()
	{
	    if(isset($_POST['save_booking']))

{

    $user_id = 0;

    if(isset($_REQUEST['user_id']))

        $user_id = $_REQUEST['user_id'];

    $postid = 0;

    if(isset($_REQUEST['edit_id']))
    {

        $postid = $_REQUEST['edit_id'];

        $up = array(
            'booking_data'=> json_encode($_REQUEST),
            );
            $this->modal->update($postid,$up);
            $this->wslots($postid);
            $this->session->set_flashdata('success', 'Booking slots add successfully!');
                redirect($this->url.'/all');

        

    }

}
	    $data= array();
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$id =0;
		if(isset($_REQUEST['product_id']))
		$page = 'Add  Webinar Slot';
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = $this->url.'/all';
		$id = $_REQUEST['product_id'];
		if($id)
		{
			$data['edit']= $pro= $this->modal->getbyid($id);
			if($pro->name)
			$breed[$pro->name] = base_url('/index/product/').$pro->slug;
		}
		
		
		
		$breed[$page] = '';
		//get trainer
		//get artist
// 		print_r($data['locations']);
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $this->single;
		$data['breed']= $breed;
		
		$this->template->admin('add_webinar',$data);
	}
	function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('uploads/'.$filename, 'w');
    // loop over the input array
    $file = new SplFileObject('uploads/'.$filename, 'a');

    
    foreach ($array as $kl => $line) {
        
        $file->fputcsv($line);

    }
    

}
	public function products_import()
	{
	    $data = array();
	    $file='';
	    if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name']))
        {
            
        	$imgData = $this->template->upload('file');
        	if($imgData['localPath'])
        	{
        	    $imgData['localPath']= ABSPATH.'/wp-content/uploads/'.$imgData['localPath'];
        	    $c = 0;
        	   // var_dump();
        	   $handle = fopen($imgData['localPath'], "r");
if ($handle) {
    $i = 0;
    
    while (($line = fgets($handle)) !== false) {
        $i ++;
        
        if($i > 1)
        {
            if($line)
            {  
                
            $pid = $this->run_csv($line);
             
            if($pid)
            {
                $c++;
            }
            }
            
        }
        // process the line read.
    }

    fclose($handle);
} else {
    // error opening the file.
}
        	    $file='accepted';
        	    $data['txt'] = "<b>".$c."</b> Products Process successfuly!";
        	}
        }
        else
        {
            $data['txt'] = "There is something wrong";
            $file="error";
        }
        $html = $this->load->view('modal/'.$file,$data,true);
	    $arr['html'] = $html;
	    $arr['red'] = base_url('admin/products/all');
	    echo json_encode($arr);
	}
	function get_day_id($dname)

{

    $days = array();

    $days[] = array(

        "name" => "Mon"

    );

    $days[] = array(

        "name" => "Tue"

    );

    $days[] = array(

        "name" => "Wed"

    );

    $days[] = array(

        "name" => "Thu"

    );

    $days[] = array(

        "name" => "Fri"

    );

    $days[] = array(

        "name" => "Sat"

    );

    $days[] = array(

        "name" => "Sun"

    );

    foreach($days as $k=> $n)

    {

        if($n['name'] == $dname)

        {

            return $k+1;

        }

    }

    return 0;

}

	public function export()
	{
	    $products = $this->modal->get(array('status'=>'0'));
	    $h = array(
	        'SKU',
	        'Author',
	        'Name',
	        'Type',
	        'Price',
	        'Category',
	        'Sub Category',
	        'Short Discription',
	        'Long Discription',
	        'Dead Line',
	        'Image',
	        'Tags',
	        'Package Products',
	        'Slug',
	        'Product Status',
	        'Product Language',
	        'Product Locations',
	        'Download Link',
	        );
	        $csv = array();
	        $csv[] = $h;
	        $this->load->model('Product_model');
        $product = $this->Product_model;
        $types = array(
            1=> 'simple',
            2=> 'variable',
        );
	        foreach($products as $k => $v)
	        {
	            $tags = array();
	            $this->modal->key = 'id';
	            //tags logic
	            $this->modal->table = 'product_to_tags';
	            $db = $this->modal->get(array('status'=>'0','pid'=>$v['id']));
	            foreach($db as $kk=> $vv)
	            {
	                $post = $product->getpost($vv['tid']);
	                $tags[] = $post->post_title;
	            }
	            $lngs = array();
	            $this->modal->key = 'id';
	            //tags logic
	            $this->modal->table = 'product_to_languages';
	            $db = $this->modal->get(array('status'=>'0','pid'=>$v['id']));
	            foreach($db as $kk=> $vv)
	            {
	                $post = $product->getpost($vv['tid']);
	                $lngs[] = $post->post_title;
	            }
	            $locs = array();
	            $this->modal->key = 'id';
	            //tags logic
	            $this->modal->table = 'product_to_locations';
	            $db = $this->modal->get(array('status'=>'0','pid'=>$v['id']));
	            foreach($db as $kk=> $vv)
	            {
	                $post = $product->getpost($vv['tid']);
	                $locs[] = $post->post_title;
	            }
	            $pps = array();
	            $this->modal->key = 'id';
	            //tags logic
	            $this->modal->table = 'product_to_packages';
	            $db = $this->modal->get(array('status'=>'0','pid'=>$v['id']));
	            foreach($db as $kk=> $vv)
	            {
	                $post = $product->getproduct($vv['tid']);
	                $pps[] = $post->sku;
	            }
	            $cat = $v['catID'];
                $cat = $product->getcat($cat);
                $scat = $v['scatID'];
                                $scat = $product->getcat($scat);
	            $user = $product->getuser($v['uid']);
	            
	            
	            $csv[] = $sing = array(
	                $v['sku'],
	                (isset($user->user_email)?$user->user_email:" "),
	                $v['name'],
	                $types[$v['type']],
	                $v['price'],
	                ($cat->name)?$cat->name:"",
	                ($scat->name)?$scat->name:"",
	                $v['short_disc'],
	                $v['long_disc'],
	                $v['dead_line'],
	                ($v['img'])?$product->getimg($v['img']):"",
	                implode('@',$tags),
	                implode('@',$pps),
	                $v['slug'],
	                ($v['publish'] == 0)?"publish":"draft",
	                implode('@',$lngs),
	                implode('@',$locs),
	                $v['dlink'],
	                );
	        }
	        $file = 'products_'.time().'.csv';
	        $this->array_to_csv_download($csv,$file);
	        $file =base_url('/uploads/').$file;
	        $html = 'File Generate Successfully to download <a href="'.$file.'" >Click Here</a>';
	       // die($file);
	        $this->session->set_flashdata('success', $html);
	        redirect_to(base_url('admin/products/all'));
	    
	    ?>
	    <html>
   <head>
      <script type = "text/javascript">
         <!--
            function Redirect() {
               window.location = "<?= base_url('admin/products/all'); ?>";
            }
            Redirect();
         //-->
      </script>
   </head>
   
   <body>
      <p>Export succcessdfully redirecting</p>
      
   </body>
</html>
	    <?php
	    exit();
	}
	function bslots($product_id)

{
    

$this->db->where('pid',$product_id)->where('status',0)->delete('bslots');
$this->load->model('Product_model');
                $product = $this->Product_model;
                $pro = $product->getproduct($product_id);

    $json = $pro->booking_data;

    $edit= json_decode($json,true );
    $slot_day = $edit['slot_day'];
    
    $slot_ed =$edit['slot_ed'];
    foreach($edit['slot_sd'] as $sd_k => $sd_v)
    {
      $ndate = $start_date = $sd_v;

    $end_date = $slot_ed[$sd_k];
    

    while ($ndate <= $end_date) {

        $day = $nameOfDay = date('D', strtotime($ndate));

        $did = $this->get_day_id($day);

        //  echo $day.'<br>';



        //create db slot logic



        if(isset($slot_day[$sd_k])&& $slot_day[$sd_k] == $did)

        {

            $this->create_slot($edit, $did,$product_id,$ndate);

        }

        //create db slot logic

        $ndate = date('Y-m-d', strtotime($ndate. ' + 1 day'));

    }//while   
    }//foreach

    $slot_st = $edit['slot_st'];

    $slot_ed = $edit['slot_ed'];

    $slot_et = $edit['slot_et'];

    foreach($edit['slot_st'] as $k=>$st)

    {

        if(!empty($slot_st[$k]) && !empty($slot_sd[$k]))

        {

            $time = date("h:i A", strtotime($slot_st[$k]));

            $title = $slot_sd[$k].' '. $time;

            $my_post = array(

                'post_title'    => $title,

                'post_content'  => json_encode($edit),

                'post_status'   => 'publish',

                'post_parent'   => $product_id,

                'post_type'   => 'wslot'

            );

            $postid = wp_insert_post( $my_post );

            if(isset($slot_sd[$k]) && $postid)

                update_post_meta( $postid, 'from_date', $slot_sd[$k]);

            if(isset($slot_st[$k]) && $postid)

                update_post_meta( $postid, 'from_time', $slot_st[$k]);

            if(isset($slot_ed[$k]) && $postid)

                update_post_meta( $postid, 'to_date', $slot_ed[$k]);

            if(isset($slot_et[$k]) && $postid)

                update_post_meta( $postid, 'to_time', $slot_et[$k]);

            update_post_meta( $postid, 'status', 0);

        }

    }

}

function create_slot($edit, $day,$product_id, $date)

{
    $slot_et = $edit['slot_et'];

    $slot_du = $edit['slot_du'];

    $slot_re = $edit['slot_re'];

    // print_r($slot_et);

    foreach($edit['slot_st'] as $k=>$st)

    {

        if(!empty($st) && !empty($slot_du[$k]))

        {



            $et = $slot_et[$k];

            $minutes = abs(strtotime($st) -strtotime($et)) / 60;//total avalible time

            $tdur = $slot_du[$k]+$slot_re[$k];//total slot including rest and duration

            $num_slots = $minutes/$tdur;

            $stime =  $st;

            for($i = 1;$i<= $num_slots;$i++)

            {
                $in = array();



                $in['name'] = $title = date("h:i A", strtotime($stime));
                $in['stime'] = $stime;

                

                if(isset($stime) && $product_id)
                {
                    $in['pid'] = $product_id;
                }


//get end time of slot

//to_time



                $time = strtotime($stime);

                $ttime = date("H:i", strtotime('+'.$slot_du[$k].' minutes', $time));

                if(isset($ttime) && $product_id)
                {
                    $in['etime'] = $ttime;
                }

                if(isset($date) && $product_id)
                {
                    $in['date'] = $date;
                    $in['day'] = $day;
                }

                if(isset($slot_re[$k]) && $product_id)
                {
                    $in['rest'] = $slot_re[$k];
                }

                if(isset($slot_du[$k]) && $product_id)
                {
                    $in['duration'] = $slot_du[$k];
                }
                $this->modal->table = 'bslots';
                $r = $this->modal->add($in);
                $stime = date("H:i", strtotime('+'.$tdur.' minutes', $time));
                



            }

        }

    }

}

	public function add_booking()
	{
	    if(isset($_POST['save_booking']))

{

    $postid = 0;

    if(isset($_REQUEST['edit_id']))
    {

        $postid = $_REQUEST['edit_id'];

        $up = array(
            'booking_data'=> json_encode($_REQUEST),
            );
            $this->modal->update($postid,$up);
            $this->bslots($postid);
            $this->session->set_flashdata('success', 'Booking slots add successfully!');
                redirect($this->url.'/all');
            
        

    }

}
	    $data= array();
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		if(isset($_REQUEST['product_id']))
		$page = 'Add  Booking Slot';
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = $this->url.'/all';
		$id = $_REQUEST['product_id'];
		if($id)
		{
			$data['edit']= $pro= $this->modal->getbyid($id);
			if($pro->name)
			{
			$breed[$pro->name] = base_url('/index/product/').$pro->slug;
			}
		}
		
		
		
		$breed[$page] = '';
		//get trainer
		//get artist
// 		print_r($data['locations']);
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $this->single;
		$data['breed']= $breed;
		if($_REQUEST['product_id'])
		{
			$data['edit']= $this->modal->getbyid($_REQUEST['product_id']);
			
		}
		$this->template->admin('add_booking',$data);
	}
	public function create_slug($name, $i= 0)
	{
	    $slug = sanitize_title($name);
	    if($i)
	    {
	        $slug = $slug.$i;
	    }
	    $this->modal->table = 'products';
                $this->modal->key = 'id';
	    $r = $this->modal->get(array('slug'=> $slug));
	    if($r)
	    {
	        return $this->create_slug($name, $i++);
	    }
	    else
	    {
	        return $slug;
	    }
	    
	    
	    
	}
	public function save($id = 0)
	{
        $this->form_validation->set_rules('title', $this->single.' Title', 'required');
        $this->form_validation->set_rules('_sku', $this->single.' SKU', 'required');
        $this->form_validation->set_rules('catID', $this->single.' Category', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            if(isset($_REQUEST['_sku']) )
            {
                $sku = $_REQUEST['_sku'];
                $this->modal->table = 'products';
                $this->modal->key = 'id';
                
                if($id)
                {
                    $res = $this->modal->get(array('sku'=>$sku,'id !='=>$id));
                }
                else
                {
                    $res = $this->modal->get(array('sku'=>$sku));
                }
                
                if($res)
                {
                    $this->session->set_flashdata('error', 'Duplicate SKU');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            $mediaID = 0;
            if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
	        {
	            
	        	$imgData = $this->template->upload('image');
	        	if($imgData['localPath'])
	        	{
	        		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
	        		$mediaID = $modal->addMedia($imgData);
	        	}
	        }
	        else
	        {
	            if($id)
                {
                    $this->modal->table = 'products';
                $this->modal->key = 'id';
                $sing= $this->modal->getbyid($id);
                if(!$mediaID)
                {
                    $mediaID = $sing->img;
                }
                }
	        }
	        $cslug= '';
            $arr = array(
                'name' => $_REQUEST['title'],
                'sku' => $_REQUEST['_sku'],
                'sku' => $_REQUEST['_sku'],
                'uid' => $_REQUEST['post_author'],
                'type' => $_REQUEST['product_type'],
                'price' => $_REQUEST['price'],
                'catID' => $_REQUEST['catID'],
                'publish' => $_REQUEST['publish'],
                'short_disc' => $_REQUEST['short_discription'],
                'long_disc' => $_REQUEST['discription'],
                'dead_line' => $_REQUEST['dead_line'],
                'dlink' => (isset($_REQUEST['dlink'])?$_REQUEST['dlink']:" "),
                'img' => $mediaID,
                );
                $this->load->model('Product_model');
                $product = $this->Product_model;
	        
	        if(!$id)
	        {
	        	    

	        	    $cslug = $this->create_slug($_REQUEST['title']);
	        	    $arr['slug'] = $cslug;
	        	    $id = $this->modal->add($arr);
	        	    if($_REQUEST['products'])
	        	    {
	        	    $product->setextra($id,'product_to_packages',$_REQUEST['products']);
	        	    }
	        	    $product->setextra($id,'product_to_tags',$_REQUEST['tags']);
	        	    $product->setextra($id,'product_to_locations',$_REQUEST['locations']);
	        	    $product->setextra($id,'product_to_languages',$_REQUEST['lanaguage']);
	                $this->session->set_flashdata('success', $this->single.' add successfully!');
	        }
	        else
	        {
	            $this->modal->table = 'products';
	            $this->modal->key = 'id';
	            if($this->modal->update($id,$arr))
	        	{
	        	    if($_REQUEST['products'])
	        	    {
	        	    $product->setextra($id,'product_to_packages',$_REQUEST['products']);
	        	    }
	        	    
	        	    $product->setextra($id,'product_to_tags',$_REQUEST['tags']);
	        	    $product->setextra($id,'product_to_locations',$_REQUEST['locations']);
	        	    $product->setextra($id,'product_to_languages',$_REQUEST['lanaguage']);
	        	    

	        	    //
	                $this->session->set_flashdata('success', $this->single.' update successfully!');
	        	}
	        	else
	        	{
	        	    $str = $this->db->last_query();
echo $str;
die();
	        		$this->session->set_flashdata('error', 'server error');
	        	}
	        }
        	
        }
        // redirect($_SERVER['HTTP_REFERER']);
         redirect($this->url.'/all');
	}
	public function save_cat($id = 0)
	{
        $this->form_validation->set_rules('name', $this->single.' Name', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
            if(isset($_REQUEST['name']) )
            {
                $sku = $_REQUEST['name'];
                $this->modal->table = 'category';
                $this->modal->key = 'id';
                
                if($id)
                {
                    $res = $this->modal->get(array('name'=>$sku,'id !='=>$id));
                }
                else
                {
                    $res = $this->modal->get(array('name'=>$sku));
                }
                
                if($res)
                {
                    $this->session->set_flashdata('error', 'Category Already Exist');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            
            $mediaID = 0;
            if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
	        {
	            
	        	$imgData = $this->template->upload('image');
	        	if($imgData['localPath'])
	        	{
	        		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
	        		$mediaID = $modal->addMedia($imgData);
	        	}
	        }
	        else
	        {
	            if($id)
                {
                    $this->modal->table = 'category';
                $this->modal->key = 'id';
                $sing= $this->modal->getbyid($id);
                if($sing)
                {
                    $mediaID = $sing->img;
                }
                }
	        }
	        
            if($id)
            {
                $this->modal->table = 'category';
                $this->modal->key = 'id';
                $this->modal->update($id,array('name'=>$_REQUEST['name'],'parent'=>$_REQUEST['catID'],'img'=>$mediaID));
                $cid = $id;
            }
            else
            {
                $this->modal->table = 'category';
                $this->modal->key = 'id';
                $cid = $this->modal->add(array('name'=>$_REQUEST['name'],'parent'=>$_REQUEST['catID'],'img'=>$mediaID));
            }
	        
	        
	        if(!$id)
	        {
	        if($cid)
	        	{
	        	    
	                $this->session->set_flashdata('success', 'Category create successfully!');
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', 'server error');
	        	}
	        }
	        else
	        {
	            if($cid)
	        	{
	        	    

	        	    //
	                $this->session->set_flashdata('success', 'Category update successfully!');
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', 'server error');
	        	}
	        }
        	
        }
        redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete($id = 0)
	{
		if($id)
		{
			if($this->modal->update($id, array('post_status'=> 'trash')))
        	{
                $this->session->set_flashdata('success', $this->single.' delete successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_cat($id = 0)
	{
		if($id)
		{
		    $f = $this->db->where('term_id',$id)->delete('wp_terms');
		    $s = $this->db->where('term_id',$id)->delete('wp_term_taxonomy');
			if($f && $s)
        	{
                $this->session->set_flashdata('success', 'Category delete successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function create($id= 0)
	{
		$data= array();
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add '.$this->single;
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';
		//get trainer
		$this->modal->table = 'wp_posts';
		$this->modal->key = 'ID';
		$data['tags']= $this->modal->get(array('post_type'=> 'tag'));
		$data['locations']= $this->modal->get(array('post_type'=> 'locations'));
		$data['lanaguages']= $this->modal->get(array('post_type'=> 'search_language'));
		//get artist
// 		print_r($data['lanaguages']);
// 		die();
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $this->single;
		$data['breed']= $breed;
		if($id)
		{
		    $this->modal->table = 'products';
		    $this->modal->key = 'id';
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin($this->add,$data);
	}
	public function create_cat($id= 0)
	{
		$data= array();
		$this->modal->table = 'category';
        $this->modal->key = 'id';
		$data['url']= $this->url; 

		$data['assets'] = $assets= base_url('/assets').'/';
// 		$data['data']= $this->modal->get_tag(array('status'=> 0));
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add Category';
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = Base_url('/admin/products/all');
		$breed['Products Categories'] = Base_url('/admin/products/all_categories');
		$breed[$page] = '';
		//get artist
// 		print_r($data['locations']);
		$css = array();
		$css[] = $assets.'/app-assets/vendors/css/forms/select/select2.min.css';
		$css[] = $assets.'/app-assets/vendors/css/vendors.min.css';
		$js = array();
		$js[] = $assets.'/app-assets/vendors/js/forms/select/select2.full.min.js';
		$js[] = $assets.'/app-assets/js/scripts/forms/select/form-select2.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= 'Add Category';
		$data['breed']= $breed;
		if($id)
		{
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin('addattr1',$data);
	}

	public function create1($id= 0)
	{
		$data= array();
		$data['url']= $this->url; 
		$user = $_SESSION['knet_login'];
		$scats = get_user_meta($user->ID,'scats',true);
		$data['cats'] = $scats = array_unique(explode(',',$scats));
		
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add '.$this->single;
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = '';

		$data['page']= $page;
		$data['breed']= $breed;
		if($id)
		{
			$data['edit']= $this->modal->getbyid($id);
		}
		$this->template->admin($this->add,$data);
	}
	function product_to_img($url,$post_id)
    {
        require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');
$post_id = $post_id;
$desc    = "";

$image = media_sideload_image( $url, $post_id, $desc,'id' );
var_dump($image);
die();

set_post_thumbnail( $post_id, $image );
return $image;
    }

	public function run_csv($str)
	{
	    if($str)
	    {
	    /*
	    $h = array(
	        'SKU',
	        'Author',
	        'Name',
	        'Type',
	        'Price',
	        'Category',
	        'Short Discription',
	        'Long Discription',
	        'Dead Line',
	        'Image',
	        'Tags',
	        'Package Products',
	        );
	    */
	    $str = str_replace('"','',$str);
	    $str = explode(',',$str);
	    $main = array();
	    $meta = array();
	    $pid = 0;
	    $ptype = '';
	    $cat = '';
	    $scat = '';
	    $img = '';
	    $tags = '';
	    $pack_pro = '';
	    
	    
	    if(!empty($str[0]) && !empty($str[2]) && count($str) == 15)
	    {
	        $user = $_SESSION['knet_login'];
	        $main['post_author'] = (!empty($str[1]))?$str[1]:$user->ID;
	        $main['post_type'] = 'product';
	        $main['post_title'] = (!empty($str[2]))?$str[2]:'';
	        $main['post_title'] = (!empty($str[2]))?$str[2]:'';
	        $main['post_excerpt'] = (!empty($str[7]))?$str[7]:'';
	        $main['post_content'] = (!empty($str[8]))?$str[8]:'';
	        $meta['_sku'] = (!empty($str[0]))?$str[0]:'';
	        
	        $meta['_regular_price'] = (!empty($str[4]))?$str[4]:'0';
	        $meta['dead_line'] = (!empty($str[9]))?$str[9]:'0';
	        $main['post_name'] = (!empty($str[12]))?$str[12]:time();
	        $main['post_status'] = (!empty($str[14]))?$str[14]:'draft';
	        $img = (!empty($str[10]))?$str[10]:'';
	        $ptype = (!empty($str[0]))?$str[0]:'simple';
	        $tags = (!empty($str[11]))?$str[11]:'';
	        $pack_pro = (!empty($str[12]))?$str[12]:'';
	        $cat = (!empty($str[5]))?$str[5]:'';
	        $scat = (!empty($str[6]))?$str[6]:'';
	        $sts = array('publish','draft');
	        if(empty($main['post_status']) || !in_array($main['post_status'], $sts))
	        {
	        $main['post_status'] = 'draft';
	        }
	        if(!empty($str[0]))
	        {
	            $sku = $str[0];
	        
	        $this->modal->table = 'wp_postmeta';
                $this->modal->key = 'meta_id';
                $res = $this->modal->get(array('meta_value'=>$sku,'meta_key'=>'_sku'));
                $this->modal->table = 'wp_posts';
                $this->modal->key = 'ID';
                if($res)
                {
                    //updaTE
                
                $res= $res[0];
                
                if (isset($res['post_id']) && get_post($res['post_id']))
                {
                    $pid = $res['post_id'];
                    $this->modal->update($pid,$main);
                }
                else
                {
                    if(isset($main['post_title']))
                    {
                    $main['post_name'] = sanitize_title($main['post_title']);
                    }
                    $pid = $this->modal->add($main);
                }
                }
                else
                {
                    if(isset($main['post_title']))
                    {
                    $main['post_name'] = sanitize_title($main['post_title']);
                    }
                    $pid = $this->modal->add($main);
                }
	        }
	    }
	    if($pid)
	    {
	        $pcats = array();
	    if($pack_pro)
	    {
	        $exp = explode('@',$tags);
	        $tgs = array();
	        foreach($exp as $k=> $v)
	        {
	            $tgs[] = $this->sku_to_id($v);
	        }
	        update_post_meta($pid,'products',$tgs);
	    }
	    if($tags)
	    {
	        
	        $exp = explode('@',$tags);
	        $tgs = array();
	        foreach($exp as $k=> $v)
	        {
	            $tgs[] = $this->tag_to_id($v);
	        }
	        update_post_meta($pid,'product_tags',$tgs);
	    }
	    if(!empty($img))
	    {
	        $ar = array();
	        $ar[]= $img;
	        $this->update_product_attribute($pid, $ar,'img');
	    }
	    $perent_cat = 0;
	    if($scat)
	    {
	        $parent = $cat;
	        $cid = $this->get_cat_by_name($parent);
    
    if(!$cid)
    {
        $ret = $this->update_product_attribute('0', $parent,'creat_cat');
    }
    $perent_cat = $cid = $this->get_cat_by_name($parent);
    $pcats[] = $cid;
	    }
	    if($scat)
	    {
	        $parent = $scat;
	        $cid = $this->get_cat_by_name($parent);
    
    if(!$cid)
    {
        $ret = $this->update_product_attribute($perent_cat, $parent,'creat_cat');
    }
    $perent_cat = $cid = $this->get_cat_by_name($parent);
    $pcats[] = $cid;
	    }
	    $this->update_product_attribute($pid, $pcats,'cat');
	    if($ptype == 'simple')
	    {
	        wp_remove_object_terms( $pid, 'variable', 'product_type' );
wp_set_object_terms( $pid, 'simple', 'product_type', true );

	    }
	    else
	    {
	        	        wp_remove_object_terms( $pid, 'simple', 'product_type' );
wp_set_object_terms( $pid, 'variable', 'product_type', true );
	    }
	    foreach($meta as $k=> $v)
	    {
	        update_post_meta($pid,$k, $v);
	    }
	    }
	    }
	    return $pid;
	}
	public function cat_to_id($txt)
	{
	    $category = get_term_by('name', $txt, 'product_cat');
	    if($category)
	    {
	        return $category->term_id;
	    }
	    else
	    {
	        return 0;
	    }
	}
	public function tag_to_id($txt)
	{
	    $this->modal->table = 'wp_posts';
                $this->modal->key = 'ID';
                $posts = $this->modal->get(array('post_title'=> $txt));
                if($posts)
                {
                    return $posts[0]['ID'];
                }
                else
                {
                    $id = wp_insert_post(array(
  'post_title'=>$txt, 
  'post_type'=>'tag', 
  'post_content'=>'import tag'
));
return $id;
                }
	}
	public function sku_to_id($sku)
	{
	    $this->modal->table = 'wp_postmeta';
                $this->modal->key = 'meta_id';
                $res = $this->modal->get(array('meta_value'=>$sku,'meta_key'=>'_sku'));
                $this->modal->table = 'wp_posts';
                $this->modal->key = 'ID';
                if($res)
                {
                    //updaTE
                
                $res= $res[0];
                
                if (isset($res['post_id']) && get_post($res['post_id']))
                {
                    return $res['post_id'];
                }
                }
                return 0;
	}
	public function bulk_action()
	{
	    $data =$arr =  array();
	        $data['txt'] = "There is something wrong";
            $file="error";
	    if(isset($_REQUEST['action']) && isset($_REQUEST['products']))
	    {
	        $pids = array();
	        if($_REQUEST['products'] == 'all')
	        {
	            $products = $this->modal->get(array());
        		foreach ($products as $key => $value) {
        			$pids[] = $value['id'];
        		}
	        }
	        else
	        {
	            $pids = explode(',',$_REQUEST['products']);
	        }
	        $h = array(
	        'SKU',
	        'Author',
	        'Name',
	        'Type',
	        'Price',
	        'Category',
	        'Sub Category',
	        'Short Discription',
	        'Long Discription',
	        'Dead Line',
	        'Image',
	        'Tags',
	        'Package Products',
	        'Slug',
	        'Product Status',
	        'Product Language',
	        );
	        if($_REQUEST['action'] == 'export')
	        {
	            foreach($pids as $k => $v)
	        {
	            
	            $product = wc_get_product( $v );
	            $terms = get_the_terms( $v, 'product_cat' );
	            $cat = '';
	            if(isset($terms[0]))
	            {
	                $cat = $terms[0]->name;
	            }
	            $scat = '';
	            if(isset($terms[1]))
	            {
	                $scat = $terms[1]->name;
	            }
	            $nurl = get_the_post_thumbnail_url($v);
	            $t = get_post_meta($v,'product_tags',true);
	            $tgs = array();
	            if(is_array($t))
	            {
    	            foreach($t as $tv)
    	            {
    	                $tgs[]  = get_the_title($tv);
    	                
    	            }
	            }
	            //package products
	            $t = get_post_meta($v,'products',true);
	            $pp = array();
	            if(is_array($t))
	            {
	            foreach($t as $tv)
	            {
	                $pp[]  = get_post_meta($tv,'_sku',true);
	                
	            }
	            
	            }
	            $post = $this->modal->getbyid($v);
	            $user = get_user_by('id', $post->post_author);
	            //languages
	            
	            $t = get_post_meta($v,'lanaguage',true);
	            
	            $lns = array();
	            if(is_array($t))
	            {
    	            foreach($t as $tv)
    	            {
    	                if(get_post($tv) && get_post_type($tv) == 'search_language')
    	                {
    	                $lns[]  = get_the_title($tv);
    	                }
    	                
    	            }
	            }
	            
	            $csv[] = $sing = array(
	                get_post_meta($v,'_sku',true),
	                (isset($user->user_email)?$user->user_email:" "),
	                str_replace(",","[comma]",$v['post_title']),
	                $product->get_type(),
	                get_post_meta($v, '_regular_price',true),
	                $cat,
	                $scat,
	                str_replace(",","[comma]",preg_replace( "/\r|\n/", "[break]", $v['post_excerpt'] )),
	                str_replace(",","[comma]",preg_replace( "/\r|\n/", "[break]", $v['post_content'] )),
	                get_post_meta($v, 'dead_line',true),
	                $nurl,
	                implode('@',$tgs),
	                implode('@',$pp),
	                $v['post_name'],
	                $v['post_status'],
	                implode('@',$lns),
	                );
	        }
	        $file = 'products_'.time().'.csv';
	        $this->array_to_csv_download($csv,$file);
	        $file =base_url('/uploads/').$file;
	        $html = 'File Generate Successfully to download <a href="'.$file.'" >Click Here</a>';
	        $data['txt'] = $html;
	       // die($file);
	        $this->session->set_flashdata('success', $html);
	        }
	        $csv = array();
	        $csv[] = $h;
	        foreach($pids as $k=> $v)
	        {
	            if($_REQUEST['action'] == 'delete')
	            {
	                $this->bulk_delete($v);
	            }
	            elseif($_REQUEST['action'] == 'publish')
	            {
	                $this->bulk_publish($v);
	            }
	            elseif($_REQUEST['action'] == 'unpublish')
	            {
	                $this->bulk_unpublish($v);
	            }
	            elseif($_REQUEST['action'] == 'export')
	            {
	                $this->bulk_export($v);
	            }
	            $file='accepted';
	            if($_REQUEST['action'] != 'export')
        	    $data['txt'] = "Action Process successfuly Please wait ...";
	        }
	    }
	    $html = $this->load->view('modal/'.$file,$data,true);
	    $arr['html'] = $html;
	    $arr['red'] = base_url('admin/products/all');
	    echo json_encode($arr);
	}
	public function bulk_export($id)
	{
	    
	}
	public function bulk_publish($id)
	{
	    $up = array('post_status'=>'publish');
            $this->db->where('ID',$id)->update('wp_posts',$up);
	}
	public function bulk_unpublish($id)
	{
	    $up = array('post_status'=>'draft');
            $this->db->where('ID',$id)->update('wp_posts',$up);
	}
	public function bulk_delete($id)
	{
	    $r = $this->db->where('id',$id)->delete('products');
	    $r = $this->db->where('post_parent',$id)->delete('wp_posts');
	    
	}
	public function all()
	{
	   // run_csv
		$data= array();
// 		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$page = 'Manage '.$this->multi;
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $page;
// 		$data['footer']= 'cfooter';
		$data['breed']= $breed;
		$user = $_SESSION['knet_login'];
		$this->load->model('Product_model');
        $product = $this->Product_model;
		$products = $this->modal->get(array('status'=>'0'));
		
		if(isset($_REQUEST['sort']))
		{
			$products = $this->bubble_sort($products, $_REQUEST['sort']);
		}
		if(isset($_REQUEST['cat']))
		{
			$cat = $_REQUEST['cat'];
			$products = $this->modal->get(array('status'=>'0','catID'=>$cat));
			
		}

		$data['data']= $products;
		$this->template->admin($this->all,$data);
	}
	public function all_categories()
	{
	   // die("all_categories");
		$data= array();
// 		$data['url']= $this->url; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = Base_url('/admin/products/all');
		$page = 'Manage  Product Categories';
		$breed[$page] = ' ';
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';
		$data['css']= $css;
		$data['js']= $js;

		$data['page']= $page;
// 		$data['footer']= 'cfooter';
		$data['breed']= $breed;
		$user = $_SESSION['knet_login'];
		$this->modal->table = 'category';
        $this->modal->key = 'id';

		$data['data']= $this->modal->get(array('status'=>'0'));
// 		$this->template->admin('table',$data);
		$this->template->admin('all_cat',$data);
	}
	public function bubble_sort($arr, $attr) {
    $size = count($arr)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($arr[$k][$attr] > $arr[$j][$attr]) {
                // Swap elements at indices: $j, $k
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
    }
    return $arr;
}



}

