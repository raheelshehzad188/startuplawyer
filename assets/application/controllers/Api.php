<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http:n//example.com/
	 *a
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 /*-------------Product import start----------------*/
	 
	 public function check_variation()
	 {
	     $ret = array(
	         'status'=> 0,
	         'dat'=> $_REQUEST,
	         'msg'=> 'invalid request!',
	         );
	         if(isset($_REQUEST['pid']) && isset($_REQUEST['attributes']))
	         {
	             $variations = $this->db->where('pid',$_REQUEST['pid'])->get('variations')->result();
	             foreach($variations as $k => $v)
	             {
	                 $find = 1;
	                 //map attributes
	                 foreach($_REQUEST['attributes'] as $ak=>$av)
	                 {
	                     $wh = array(
	                         'pid' => $v->id,
	                         'name' => $ak,
	                         'value' => $av,
	                         );
	                     $ch = $this->db->where($wh)->get('product_to_variations')->row();
	                     if(!$ch)
	                     {
	                         $find = 0;
	                     }
	                 }
	                 if($find)
	                 {
	                     $ret = array(
	         'status'=> 1,
	         'data'=> $v,
	         );
	         echo json_encode($ret);
	         exit();
	                 }
	                 //map attributes
	             }
	         }
	         echo json_encode($ret);
	         exit();
	 }
	 public function parent_search_child($p)
	 {
	    $this->load->model('Common_model');
	    $this->load->model('Product_model');
	    $product = $this->Product_model;
	    $modal = $this->Common_model;
	    $modal->table = 'wp_posts';
	    $posts = array_reverse($modal->get(array('post_type'=>'search_from')));
	    ?>
	            <option value="" >All Service Providers</option>
	            <?php
	    foreach($posts as $k=> $v)
	    {
	        $parent = unserialize($product->getmeta('post',$v['ID'],'parent_search',true));
	        if(in_array($p,$parent))
	        {
	            ?>
	            <option value="<?= $v['ID'] ?>" ><?= $v['post_title'] ?></option>
	            <?php
	        }
	    }
	 }
	 public function wishlist()
	 {
	     $ret = array(
	         'status'=> 0,
	         'msg' => 'Invalid request!'
	         );
	     $pid = 0;
	     if(isset($_REQUEST['pid']))
	     {
	         $pid = $_REQUEST['pid'];
	     }
	     else
	     {
	      echo json_encode($ret);   
	      exit();
	     }
	     $list = array();
	     if(isset($_SESSION['knet_login']) )
	     {
	         $uid = $_SESSION['knet_login']->ID;
	         $this->load->model('Common_model');
	         $modal = $this->Common_model;
	         $modal->table = 'user_to_wishlist';
	         $arr = array(
	             'pid' =>$pid,
	             'uid' =>$uid,
	             );
	             //already exist
	             $al = $modal->get($arr);
	             if($al)
	             {
	                 $ret = array(
	         'status'=> 0,
	         'msg' => 'Product is Already in your wishlist!'
	         );
	         echo json_encode($ret);
	         exit();
	             }
	             else
	             {
	                //insert
	                $id = $modal->add($arr);
	                if($id)
	                {
	                         $ret = array(
	         'status'=> 1,
	         'msg' => 'Product Added in your wishlist!'
	         );
	         echo json_encode($ret);
	         exit();   
	                }
	             }
	     }
	     else
	     {
	         //session storage
	         if(isset($_SESSION['wishlist']) )
	         {
	             $list = $_SESSION['wishlist'];
	         }
	         if(in_array($pid, $list))
	         {
	                     $ret = array(
	         'status'=> 0,
	         'msg' => 'Product is Already in your wishlist!'
	         );
	         echo json_encode($ret);
	         exit();
	         }
	         else
	         {
	         $list[] = $pid;
	                         $ret = array(
	         'status'=> 1,
	         'msg' => 'Product Added in your wishlist!'
	         );
	         echo json_encode($ret);
	         exit();
	         }
	         
	     }
	 }
	 
	 public function addcart()
	 { 
	     $ret = array(
	         'status'=> 0,
	         'msg' => 'Invalid request!'
	     );
	     
	     $pid = $_REQUEST['product_id'];
	     
	     $list = array();
	     
	     if(isset($_REQUEST['action']))
	     {
	        
            $list =  array(
            	             'pid' =>$_REQUEST['product_id'],
            	             'cmt' =>$_REQUEST['cmt'],
            	             'qty' =>$_REQUEST['qty'],
            	         );
	        
	     }else{
	      echo json_encode($ret);   
	      exit();
	     }
	     
	     
        
         
         if(in_array($pid, $_SESSION['addcart']))
         {
             $_SESSION['addcart']['qty'] = $_SESSION['addcart']['qty']+1;
             
             $ret = array(
	         'status'=> 1,
	         'msg' => 'Product update in your Cart!'
	         );
            	     
	         echo json_encode($ret);
	         exit();
	         
         }
         else
         { 	   
            $_SESSION['addcart'] = $list;
             
	        $ret = array(
	         'status'=> 1,
	         'msg' => 'Product Added in your Cart!'
	         );
	        echo json_encode($ret);
	        exit();
    	       
         }
	      
	 }
	 
	 
	 
	 public function test() 
	 {
	      $str = 'RAHS007,raheelshehzad118@gmail.com,TEST SERVICE SIMPLE,,1000,Service,,<p>Lorem ipsum dolor sit amet[comma] consectetur adipiscing elit. Pellentesque in sem maximus[comma] elementum orci ut[comma] vulputate neque. Nunc ex elit[comma] rutrum euismod aliquam quis[comma] aliquam vitae massa. Quisque sagittis dolor id mi elementum[comma] non gravida est facilisis. Curabitur a erat dictum[comma] eleifend augue nec[comma] venenatis augue. Nam ac pulvinar risus. Nunc in leo et massa suscipit feugiat sed non lectus. Mauris volutpat tincidunt nulla[comma] sed sodales felis consectetur id. Donec tempor efficitur eros ut elementum. Morbi elementum purus sit amet luctus ultrices. Nam et turpis eu sapien sodales congue quis sit amet magna.</p>,<p>Nulla malesuada tincidunt rhoncus. Vestibulum elementum sodales condimentum. Morbi ut pellentesque orci[comma] ut facilisis nulla. Pellentesque at odio mattis[comma] malesuada turpis sit amet[comma] feugiat magna. Etiam quis elit egestas[comma] imperdiet sapien non[comma] laoreet sem. Praesent imperdiet nisi vitae sapien pellentesque elementum. Proin bibendum nec justo congue auctor. Morbi neque neque[comma] facilisis iaculis velit non[comma] aliquam faucibus neque. In placerat[comma] nunc sed pharetra lacinia[comma] enim turpis tempor tellus[comma] at posuere nibh massa vehicula ligula. Morbi lobortis lobortis dolor a posuere. Aenean eget est eleifend[comma] sodales velit vitae[comma] sodales nisi. Vivamus iaculis hendrerit risus a fringilla.</p><p>Vestibulum accumsan leo sed libero hendrerit venenatis. Praesent blandit nisi nec ante bibendum sollicitudin. Nam gravida tellus in imperdiet ullamcorper. Quisque auctor pellentesque tellus vel vulputate. Nulla facilisi. Vestibulum egestas consequat neque[comma] ac maximus est porttitor fringilla. Duis vulputate velit nisl[comma] sodales molestie metus ultricies accumsan. Suspendisse potenti. Donec non suscipit augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra[comma] per inceptos himenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra[comma] per inceptos himenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra[comma] per inceptos himenaeos. Integer vitae urna ac augue vulputate porttitor id ut quam. Vestibulum ut venenatis dolor.</p><p>Fusce egestas molestie lacus[comma] nec molestie dolor pulvinar non. Vestibulum condimentum accumsan odio sed iaculis. Aliquam ornare velit nisl[comma] in aliquet lacus dignissim at. Sed vitae est sed sapien rutrum pretium quis accumsan arcu. Aenean malesuada libero sit amet vestibulum porttitor. Suspendisse vulputate mi ut neque pharetra[comma] non maximus nisl congue. Sed efficitur fringilla magna. Etiam eget porta libero. Curabitur auctor efficitur enim eu tristique.</p>,1 DAY,https://startuplawyer.lk/main/uploads/1642216162.jpg,Immigration@Joint Ventures[comma] BOTs,,test-service-simple,publish,English@Sinhala,Online via Zoom@Online and Offline (Hybrid)';
	    $r = $this->run_csv($str);
	    var_dump($r);
	    die();
	 }
	 public function load_slots()
	 {
	     
	     if(isset($_REQUEST['date']) && isset($_REQUEST['pid']))

	{
        $this->load->model('Product_model');
        $product = $this->Product_model;
		$date = date("Y-m-d", strtotime($_REQUEST['date']));

		$pid = $_REQUEST['pid'];

		$slots = $product->get_slots($pid, $date);

		?>

		<div class="dropdown-menu-content" >

			<?php

			if(count($slots))

			{

				?>

	            <div class="radio_select add_bottom_15">

	            <ul>

			<?php



	            foreach ($slots as $key => $value) {

	             ?>

	            <li onclick="select_slot('<?= $value['id']; ?>');">

	            <input type="radio" slot="<?= $value['id']; ?>" id="time_<?= $value['id']; ?>" class="bslot_cls"  name="time" value="<?= $value['value']; ?>">

	            <label for="time_<?= $value['id']; ?>"><?= $value['value']; ?></label>

	            </li>

	             <?php   

	            }

	            ?></ul></div><?php

	        }

	        else

	        {

	        ?><h3>No slot avalible</h3><?php

	        }

            ?>

        </div>



            <?php

	}

	exit();
	 }
	 
	 public function import_db($file)
	 {
	     $sess = time();
	     $this->load->model('Common_model');
	    $modal = $this->Common_model;
	    $modal->table = 'imports';
	    $in = array(
	        'session_id' => $sess,
	        'file' => $file,
	        );
	        $imp_id = $modal->add($in);
	        $modal->table = 'import_row';
	     	          	   $handle = fopen($file, "r");
if ($handle) {
    $i = 0;
    
    while (($line = fgets($handle)) !== false) {
            $i++;
            
            if($i > 1)
            {
                
                if($line)
                {  
                    $in = array(
                        'imp_id' =>$imp_id,
                        'raw' => $line,
                        'validate' => $this->validate_str($line),
                        );
                        $modal->add($in);
                }
            }
    }
}
	    return $imp_id;
	 }
	 public function sing_import($id)
	 { 
	     $this->load->model('Common_model');
	           $modal = $this->Common_model;
	           $modal->table = 'import_row';
	           $modal->key = 'id';
	           $row = $modal->getbyid($id);
	           if($row)
	           {
	               
	               
	               $all = $modal->get(array('imp_id'=>$row->imp_id));
	               //get next
	               $n= $this->db->where('id >',$id)->get('import_row')->row();
	               $i = $this->run_csv($row->raw);
	               $modal->table = 'import_row';
	           $modal->key = 'id';
	               if($i)
	               {
	                   
	                   $modal->update($id,array('status'=>1));
	               }
	               
	               $apro = $modal->get(array('imp_id'=>$row->imp_id,'status'=>1));
	               $all_t = count($all);
	               $t = count($apro);
	               $percent = ($t/$all_t)*100;
	               //die("OK");
	               if($percent  != 100)
	               {
	                   
	               $data = array(
        	          'tot'=> count($all),
        	          'next'=> $n->id,
        	          'pro'=> $i,
        	          'per'=> intval($percent),
        	          'done'=> $t,   
        	          );
        	          echo json_encode($data);
        	          exit();
	               }
	               else
	               {
	                   $data = array(
        	          'tot'=> count($all),
        	          'next'=> 0,
        	          'pro'=> $i,
        	          'per'=> intval($percent),
        	          'done'=> $t,   
        	          );
        	               $r = $this->load->view('modal/import_comp.php', $data,true);
        	      $data['html'] = $r;
        	          echo json_encode($data);
        	          exit();
	               }
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
        	    $imgData['localPath']= 'uploads/'.$imgData['localPath'];
        	    $session = $this->import_db($imgData['localPath']);
        	    $this->load->model('Common_model');
	           $modal = $this->Common_model;
	           $modal->table = 'import_row';
	           $all = $modal->get(array('imp_id'=>$session,'validate'=>'1'));
	           $er = $modal->get(array('imp_id'=>$session,'validate'=>'0'));
	           $next= $all[count($all)-1];
        	      $data = array(
        	          'imp_id'=> $session,
        	          'tot'=> count($all),
        	          'error'=> count($er),
        	          'next'=> $next,
        	          
        	          );
        	      $r = $this->load->view('modal/import_upload.php', $data,true);
        	      $arr['html'] = $r;
        	   // $arr['red'] = base_url('admin/products/all');
        	    echo json_encode($arr);
        	    exit();
                  }
                else
                {
                    $data['txt'] = "There is something wrong";
                    $file="error";
                }
        }
        else
        {
            $data['txt'] = "There is something wrong Please try again";
            $file="error";
        }
        
        $html = $this->load->view('modal/'.$file,$data,true);
	    $arr['html'] = $html;
	    $arr['red'] = base_url('admin/products/all');
	    echo json_encode($arr);
	}
	public function create_slug($name, $i= 0)
	{
	    $this->load->model('Common_model');
	    $modal = $this->Common_model;
	    $slug = sanitize_title($name);
	    if($i)
	    {
	        $slug = $slug.$i;
	    }
	    $modal->table = 'products';
                $modal->key = 'id';
	    $r = $modal->get(array('slug'=> $slug));
	    if($r)
	    {
	        return $this->create_slug($name, $i++);
	    }
	    else
	    {
	        return $slug;
	    }
	    
	    
	    
	}
	
	public function validate_str($str)
	{
	    $str = str_replace('"','',$str);
	    $str = explode(',',$str);
	    $main = array();
	    $meta = array();
	    $pid = 0;
	    $ptype = '';
	    $cat = '';
	    $scat = '';
	    $lang = '';
	    $img = '';
	    $tags = '';
	    $pack_pro = '';
	    $this->load->model('Product_model');
        $product = $this->Product_model;
	    if(empty($str[0]) || empty($str[2]) || count($str) != 18)
	    {
	        return 0;
	    }
	    return 1;
	}
	public function run_csv($str)
	{
	    $this->load->model('Common_model');
	    if($str)
	    {
	        
	        $v = $this->validate_str($str);
	    $str = str_replace('"','',$str);
	    $str = explode(',',$str);
	    $main = array();
	    $meta = array();
	    $pid = 0;
	    $ptype = '';
	    $cat = '';
	    $scat = '';
	    $lang = '';
	    $img = '';
	    $tags = '';
	    $pack_pro = '';
	    $this->load->model('Product_model');
        $product = $this->Product_model;
	    if($v)
	    {
	        
	        
	        
	        
	        foreach($str as $k=> $v)
	        {
	            $str[$k] = str_replace("[comma]",",",$str[$k]);	        
	            
	        }
	        
	        if(isset($_SESSION['knet_login']))
	        $user = $_SESSION['knet_login'];
	        $uid = 0;
	        if((!empty($str[1])))
	        {
	            $this->Common_model->table = 'wp_users';
                $this->Common_model->key = 'ID';
                $db = $this->Common_model->get(array('user_email'=>$str[1]));
	            if(isset($db[0]))
	            {
	                $uid = $db[0]['ID'];
	            }
	        }
	        
	        
	        $main['uid'] = $uid;
	        $main['name'] = (!empty($str[2]))?$str[2]:'';
	        $main['short_disc'] = (!empty($str[7]))?$str[7]:'';
	        $main['long_disc'] = (!empty($str[8]))?$str[8]:'';
	        $main['dlink'] = (!empty($str[17]))?$str[17]:'';
	        $main['sku'] = (!empty($str[0]))?$str[0]:'';
	        
	        $main['price'] = (!empty($str[4]))?$str[4]:'0';
	        $main['last_mod'] = get_current_user_id();
	        $main['dead_line'] = (!empty($str[9]))?$str[9]:'0';
	        $main['slug'] = (!empty($str[13]))?$str[13]:time();
	        $satuts = (!empty($str[14]))?$str[14]:'1';
	        $img = (!empty($str[10]))?$str[10]:'';
	        
	        $mediaID = 0;
	        if($img)
	        {
	        	$imgData = $this->template->download_img($img);
	        	if($imgData['localPath'])
	        	{
	        		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$modal = $this->Common_model;
	        		$mediaID = $modal->addMedia($imgData);
	        	}
	        }
	        
	        $main['img'] = $mediaID;
	        $ptype = 'simple';
	        $tags = (!empty($str[11]))?$str[11]:'';
	        $pack_pro = (!empty($str[12]))?$str[12]:'';
	        $lang = (!empty($str[15]))?$str[15]:'';
	        $locations = (!empty($str[16]))?$str[16]:'';
	        $cat = (!empty($str[5]))?$str[5]:'';
	        $pasent = 0;
	        if($cat)
	        {
	          $pasent = $main['catID'] = $this->get_cat_by_name($cat,0,1);  
	        }
	        $scat = (!empty($str[6]))?$str[6]:'';
	        
	        if($scat)
	        {
	          $main['scatID'] = $this->get_cat_by_name($scat,$pasent,0);  
	        }
	        $sts = array('publish','draft');
	        $main['publish'] = 1;
	        if(empty($satuts) || $satuts == 'publish')
	        {
	        $main['publish'] = 0;
	        }
	        
	        if(!empty($str[0]))
	        {
	            
	            $sku = $str[0];
	           
	        
	        $this->Common_model->table = 'products';
                $this->Common_model->key = 'id';
                $res = $this->Common_model->get(array('sku'=>$sku));
                
                if($res)
                {
                    //updaTE
                    
                    $res= $res[0];
                    $this->load->model('Product_model');
        $product = $this->Product_model;
                    if (isset($res['id']) && $product->getproduct($res['id']))
                    {
                        
                        $pid = $res['id'];
                        
                        $this->Common_model->update($pid,$main);
                    }
                    else
                    {
                        if(isset($main['name']))
                        {
                        $main['slug'] = $this->create_slug($main['name']);
                        }
                        $this->Common_model->add($main);
                    }
                    
                }
                else
                {
                    
                    if(isset($main['name']))
                    { 
                    $main['slug'] = md5(uniqid(rand(), true));
                    }
                    $pid = $this->Common_model->add($main);
                }
	        }
	    
	    if($pid)
	    {
	        $this->db->where('pid',$pid)->delete('product_to_packages');
	    if($pack_pro)
	    {
	        $exp = explode('@',$pack_pro);
	        $tgs = array();
	        foreach($exp as $k=> $v)
	        {
	            $tgs[] = $this->sku_to_id($v);
	        }
	       $product->setextra($pid,'product_to_packages',$tgs);
	    }
	    $this->db->where('pid',$pid)->delete('product_to_locations');
	    if($locations)
	    {
	        
	        $exp = explode('@',$locations);
	        
	        $tgs = array();
	        foreach($exp as $k=> $v)
	        {
	            $tgs[] = $this->location_to_id($v);
	        }
	        $product->setextra($pid,'product_to_locations',$tgs);
	    }
	    $this->db->where('pid',$pid)->delete('product_to_languages');
	    if($lang)
	    {
	        
	        $exp = explode('@',$lang);
	        
	        $tgs = array();
	        foreach($exp as $k=> $v)
	        {
	            $tgs[] = $this->lang_to_id($v);
	        }
	        $product->setextra($pid,'product_to_languages',$tgs);
	    }
	    $this->db->where('pid',$pid)->delete('product_to_tags');
	    if($tags)
	    {
	        
	        $exp = explode('@',$tags);
	        $tgs = array();
	        foreach($exp as $k=> $v)
	        {
	            $tgs[] = $this->tag_to_id($v);
	        }
	        $product->setextra($pid,'product_to_tags',$tgs);
	    }
	    
	    return $pid;
	    }
	    return 0;
	    }
	    else
	    {
	        return 0;
	    }
	    }
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
	public function location_to_id($txt)
	{
	    $txt = trim($txt);
	    $this->load->model('Common_model');
	    $this->Common_model->table = 'wp_posts';
                $this->Common_model->key = 'ID';
                $posts = $this->Common_model->get(array('post_title'=> $txt,'post_status'=>'publish'));
                if($posts)
                {
                    return $posts[0]['ID'];
                }
                else
                {
                    $id = $this->Common_model->add(array(
  'post_title'=>$txt, 
  'post_type'=>'locations', 
  'post_status'=>'publish',
  'post_content'=>'import tag'
));
return $id;
                }
	}
	public function lang_to_id($txt)
	{
	    $txt = trim($txt);
	    $this->load->model('Common_model');
	    $this->Common_model->table = 'wp_posts';
                $this->Common_model->key = 'ID';
                $posts = $this->Common_model->get(array('post_title'=> $txt,'post_status'=>'publish'));
                if($posts)
                {
                    return $posts[0]['ID'];
                }
                else
                {
                    $id = $this->Common_model->add(array(
  'post_title'=>$txt, 
  'post_type'=>'search_language', 
  'post_status'=>'publish',
  'post_content'=>'import tag'
));
return $id;
                }
	}
	public function tag_to_id($txt)
	{
	    $this->load->model('Common_model');
	    $this->Common_model->table = 'wp_posts';
                $this->Common_model->key = 'ID';
                $posts = $this->Common_model->get(array('post_title'=> $txt,'post_type'=>'tag',));
                if($posts)
                {
                    return $posts[0]['ID'];
                }
                else
                {
                    $id = $this->Common_model->add(array(
  'post_title'=>$txt, 
  'post_type'=>'tag', 
  'post_content'=>'import tag',
  'post_status'=>'publish',
));
return $id;
                }
	}
	public function sku_to_id($sku)
	{
	    $this->load->model('Common_model');
                $this->Common_model->table = 'products';
                $this->Common_model->key = 'id';
                $res = $this->Common_model->get(array('sku'=>$sku));
                if($res)
                {
                    //updaTE
                
                $res= $res[0];
                $this->load->model('Product_model');
                $product = $this->Product_model;
                
                if (isset($res['id']) && $product->getpost($res['id']))
                {
                    return $res['id'];
                }
                }
                return 0;
	}
		 function get_cat_by_name($cat,$parent = 0,$ret = 0)
{
    $this->load->model('Common_model');
                $this->Common_model->table = 'category';
                $this->Common_model->key = 'id';
                $result = $this->Common_model->get(array('name'=>$cat));
                $pID = 0;
if(isset($result[0]))
{
    $pID = $result[0]['id'];
}
else
{
    if($ret)
    {
        return $pID;
    }
    $in = array(
        'name' => $cat,
        'parent' => $parent,
        );
        $pID = $result = $this->Common_model->add($in);
}
return $pID;
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
function update_product_attribute($pid, $option,$type)
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
              $cat_data = array(
            'parent'=> $option,
            'id'=> $pid
            
            );  
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
	 /*-------------Product import end----------------*/
	public function ajax_request()
	{
	    if(isset($_REQUEST['print_email']))
	    {
	        $tid = $_REQUEST['print_email'];
            $narration = get_post_meta($tid,'narration',true);
            
            $oder = get_post_meta($tid,'order_no',true);
            if($narration == 'pinvoice')
            {
                $d = array(
                    'down'=> 1
                    );
                $html = send_email($oder,2,' ','',$d);
                $arr = array();
        	        
        	    $arr['html'] = $html;
        	    echo json_encode($arr);
        	    exit();
        	    
        	}
        	elseif($narration == 'cancel_invoice')
            {
                $d = array(
                    'down'=> 1
                    );
                $html = send_email($oder,get_post_meta($oder,'cancel_email',true),' ','',$d);
                $arr = array();
        	        
        	    $arr['html'] = $html;
        	    echo json_encode($arr);
        	    exit();
        	    
        	}
	    }
	    elseif(isset($_REQUEST['email_resend']))
	    {
	        $tid = $_REQUEST['email_resend'];
            $narration = get_post_meta($tid,'narration',true);
            
            $oder = get_post_meta($tid,'order_no',true);
            if($narration == 'pinvoice')
            {
                $d = array(
                    // 'down'=> 1
                    );
                $html = send_email($oder,2,' ','',$d);
                $arr = array();
                $data = array();
                $data['txt'] = "Email sent successfully!";
    	    $_REQUEST['action'] = 'accepted';
                
                $html = $this->load->view('modal/'.$_REQUEST['action'],$data,true);
        	        
        	    $arr['html'] = $html;
        	    echo json_encode($arr);
        	    exit();
        	    
        	}
        	else if($narration == 'cancel_invoice')
            {
                $d = array(
                    // 'down'=> 1
                    );
                $html = send_email($oder,get_post_meta($order,'cancel_email',true),' ','',$d);
                $arr = array();
                $data = array();
                $data['txt'] = "Email sent successfully!";
    	    $_REQUEST['action'] = 'accepted';
                
                $html = $this->load->view('modal/'.$_REQUEST['action'],$data,true);
        	        
        	    $arr['html'] = $html;
        	    echo json_encode($arr);
        	    exit();
        	    
        	}
	    }
	}
	public function vcheckout()
	{
	    if(!empty($_REQUEST['billing_email']))
	    {
	        $em = $_REQUEST['billing_email'];
	        $user = get_user_by( 'email', $em );
	        if($user)
	        {
	           // var_dump($user);
	            echo "0";
	        }
	        else
	        {
	            echo "1";
	        }
	    }
	    else
	    {
	        echo "1";
	    }
	    exit();
	}
	public function register()
	{
	    global $wpdb;
$username = (isset($_REQUEST['user_name'])?$_REQUEST['user_name']:'');
$email = (isset($_REQUEST['email'])?$_REQUEST['email']:'');
$password = (isset($_REQUEST['pass'])?$_REQUEST['pass']:'');
if ($username == "" || $email == '' || $password == "") {
    $responseData['msg'] = 'All fields are required.';
    $responseData['status'] = "0";
    echo json_encode($responseData);
    exit();
} else {
                //db insertion
                $username = $sid;
                if (!$this->checkEmail($email)) 
                {
                    $responseData['message'] = "Email is not Valid.";
                    $responseData['error'] = "1";
                    echo json_encode($responseData);
                    exit();
                }
                $w = array(
                'user_login' => $username
                );
                $user_id = $this->db->where($w)->get('wp_users')->row();
                $w = array(
                'user_email' => $email
                );
                $email_check = $this->db->where($w)->get('wp_users')->row();
                if ($user_id || $email_check)
                {
                    if ($user_id)
                    {
                        $responseData['message'] = "Username already exists.";
                        $responseData['error'] = "1";
                    }
                    if ($email_check)
                    {
                        $responseData['message'] = "Email already exists.";
                        $responseData['error'] = "1";
                    }
                    echo json_encode($responseData);
                    exit();
                }
                else
                {
                    $password = md5(time());
                    $user_data = array(
                        'user_login' => $username,
                        'user_email' => $email,
                        'user_pass' => $password,
                    );
                    $this->db->insert('wp_users', $user_data );           
                        $user_id = $this->db->insert_id();
                    if ($user_id)
                    {
                        $uid = $user_id;
                        
                        if($type == 'front')
                        {
                                    $role = array(
	    'customer' => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                        }
                        else
                        {
                                                        $role = array(
	    'draft_provider' => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                        }
    $token = md5($user_id);
                $product->updatemeta('user',$user_id, 'plain_pass',$password);
                $product->updatemeta('user',$user_id, 'varified',1);

                        $responseData['message'] = "Successfully Registered!";
                        $responseData['error'] = "0";
                        $responseData['user'] = $user;
                    }
                }
            }
	}
	public function all_order_process()
	{
	    ob_start();
	    readfile("cron.txt");
	    $old = ob_get_contents();
ob_end_clean();
	    $myfile = fopen("cron.txt", "w") or die("Unable to open file!");
$txt = $old.PHP_EOL.date('Y-m-d H:i:s').PHP_EOL;
fwrite($myfile, $txt);
fclose($myfile);
	    global $wpdb;
	    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  $wpdb->posts
        WHERE post_type = 'shop_order'
" );
foreach ( $result as $page )
{
    if(!get_post_meta($page->ID,'_customer_user',true))
    {
        
        order_to_customer($page->ID);
        
    }
    if($page->post_status == 'wc-processing')
    {
        // echo $page->ID;
        $ret = $this->order_process($page->ID);
        
        wp_trash_post($page->ID);
    }
    elseif($page->post_status == 'wc-on-hold')
    {
        $t2 = strtotime($page->post_date);
$t1 = strtotime(date('Y-m-d H:i:s'));
$diff = $t1 - $t2;
$hours = $diff / ( 60 * 60 );
if($hours > 96)
{
        $order = new WC_Order($page->ID);
            if (!empty($order)) {
                $order_id = $page->ID;
                update_post_meta($order_id,'cancel_email','4');
                $tid = add_payment_transection(get_post_meta($order_id,'_order_total',true),'cancel_invoice', get_post_meta($order_id,'_customer_user',true),0,   get_post_meta($order_id,'_order_total',true), 0,0, $order_id);
$sub = 'Startup Lawyer Order Payment Due: Invoice #'.$order_id;
$email_data = array(
    'invoice_number' => $tid
    );
    send_email($order_id, '4','','order cancel email',$email_data);
                  $order->update_status( 'cancelled' );
                  //here send cancel email
            }
}
        
    }
}
    // die("compelete");

	}
	public function order_process($order_id)
	{
	    if($order_id)
	    {
	       // $this->complete_process($order_id);
            $this->load->model('Common_model');
    	$this->Common_model->table = 'wp_woocommerce_order_items';
    	$this->Common_model->key = 'order_item_id';
    	$modal = $this->Common_model;
    	$items = $modal->get(array('order_id'=>$order_id));
    	
        $titems =     count($items) -1;
            if($items > 1)
            {
                foreach($items as $item)
                {
                    $cats = array();
                    $product = wc_get_order_item_meta( $item['order_item_id'], '_product_id', true );
                    if($product > 0)
                    {
                        
                    $product_c = wc_get_product( $product );
                    $cats = $product_c->get_category_ids();
                    if(!in_array(17,$cats))
                    {
                    $norder = $this->create_custom_order($order_id, $item['order_item_id']);
                    $sing = $this->db->where('order_id',$norder)->get('wp_woocommerce_order_items')->row();
                    
                    // var_dump($sing);
                    $in = array(
                        'meta_id'=>'',
                        'order_item_id'=>$sing->order_item_id,
                        'meta_key'=>'_product_id',
                        'meta_value'=>$product,
                        );
                        $this->db->insert('wp_woocommerce_order_itemmeta',$in);
                        $this->complete_process($norder);
                    }
                    else
                    {
                        //get package products
                        $pproducts = get_post_meta($product,'products',true);
                        foreach($pproducts as $k=> $v)
                        {
                         echo $norder = $this->create_custom_order_package($order_id, $v);   
                         $sing = $this->db->where('order_id',$norder)->get('wp_woocommerce_order_items')->row();
                    
                    // var_dump($sing);
                    $in = array(
                        'meta_id'=>'',
                        'order_item_id'=>$sing->order_item_id,
                        'meta_key'=>'_product_id',
                        'meta_value'=>$v,
                        );
                        $this->db->insert('wp_woocommerce_order_itemmeta',$in);
                        $this->complete_process($norder);
                        }
                        
                    }
                    }
                    
                }
                //trash order
                //$order_id
                $this->Common_model->table = 'wp_posts';
    	$this->Common_model->key = 'ID';
    	$modal = $this->Common_model;
    	
    	$modal->update($order_id,array('post_status'=>'trash'));
            }
            else
            {
                $this->complete_process($order_id);
            }
}
    return true;
	}
	function complete_process($order_id)
	{
	    
	    $order = new WC_Order( $order_id );
/*
$this->Common_model->table = 'wp_woocommerce_order_items';
    	$this->Common_model->key = 'order_item_id';
    	$modal = $this->Common_model;
    	$items = $modal->get(array('order_id'=> $order_id));
*/
$items = $order->get_items();
foreach ( $items as $item ) 
{

    $product_name = $item['name'];

    $product_id = $item['product_id'];

    $term_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
    //check course
    
    
    if(in_array(17, $term_list))
    {
        $allpros = get_post_meta($product_id,'products',true);
        // var_dump($allpros);
        foreach($allpros as $item)
                {
                    $product = $item;
                    $product_c = wc_get_product( $product );
                    $cats = $product_c->get_category_ids();
                    if(!in_array(17,$cats))
                    {
                    $norder = $this->create_custom_order_package($order_id, $product);
                    $sing = $this->db->where('order_id',$norder)->get('wp_woocommerce_order_items')->row();
                    // var_dump($sing);
                    $in = array(
                        'meta_id'=>'',
                        'order_item_id'=>$sing->order_item_id,
                        'meta_key'=>'_product_id',
                        'meta_value'=>$product,
                        );
                        $this->db->insert('wp_woocommerce_order_itemmeta',$in);
                        $this->complete_process($norder);
                    }
                    
                }
    }
    else if(in_array(18, $term_list))
    {

    	
$product = wc_get_product( $product_id );

$price = $product->get_price();


$post_author_id = get_post_field( 'post_author', $product_id );
$user_info = get_user_by('id', $post_author_id);
$order->update_status( 'completed' );
$email_data = array();
send_email($order_id, '9','','Order complete Email to client',$email_data);
update_post_meta($order_id, 'payment_status','fully_paid');
$tid = add_payment_transection($price,'paid', $post_author_id,0,  $price, 0,0, $order_id);
    }
    else
    {
        	$file = 'mail/order_reciept.php';

	ob_start();

include $file;

$msg = ob_get_contents();

ob_end_clean();

$product = wc_get_product( $product_id );

$price = $product->get_price();


$post_author_id = get_post_field( 'post_author', $product_id );
$user_info = get_user_by('id', $post_author_id);
if($user_info)
{
    send_email($order_id, '18','','Email to client on compelete order',$email_data);
}
$headers = array('Content-Type: text/html; charset=UTF-8');


$order->update_status( 'completed' );
update_post_meta($order_id, 'payment_status','fully_paid');
//first there was advance payment
// $tid = add_payment_transection($price,'cpurchase', $post_author_id,0,  $price, 0,0, $order_id);

        $order->update_status( 'recived' );
        $email_data = array(
            'provider'=> $post_author_id
            );
        send_email($order_id, '2','','Email to client',$email_data);
        $user_info = get_userdata($post_author_id);
  $mailadresje = $user_info->user_email;
        send_email($order_id, '3',$mailadresje,'email to service provider',$email_data);
        update_post_meta($order_id, 'payment_status','client_paid');
    }
    $product_variation_id = $item['variation_id'];
}//foreach items
	}
	public function create_custom_order($original_order_id,$item)
	{
	    $product = wc_get_order_item_meta( $item, '_product_id', true );
	    $this->load->model('Common_model');
    	$this->Common_model->table = 'wp_posts';
    	$this->Common_model->key = 'ID';
    	$modal = $this->Common_model;
    	$post =  $modal->getbyid($original_order_id);
	    unset($post->ID);
	    $post->post_status = 'wc-processing';
	    $post->post_parent = $original_order_id;
	    $product = wc_get_product( $product );
	    if(!$product)
	    {
	        return 0;
	    }
	    $total = $product->get_price();


	    $this->db->insert('wp_posts',$post);
	       $order_id = $this->db->insert_id(); 
	       update_post_meta( $order_id, '_order_shipping',         get_post_meta($original_order_id, '_order_shipping', true) );
        // update_post_meta( $order_id, '_order_discount',         get_post_meta($original_order_id, '_order_discount', true) );
        // update_post_meta( $order_id, '_cart_discount',          get_post_meta($original_order_id, '_cart_discount', true) );
        update_post_meta( $order_id, '_order_tax',              get_post_meta($original_order_id, '_order_tax', true) );
        // update_post_meta( $order_id, '_order_shipping_tax',     get_post_meta($original_order_id, '_order_shipping_tax', true) );
        update_post_meta( $order_id, '_order_total',$total );

        update_post_meta( $order_id, '_order_key',              'wc_' . apply_filters('woocommerce_generate_order_key', uniqid('order_') ) );
        update_post_meta( $order_id, '_customer_user',          get_post_meta($original_order_id, '_customer_user', true) );
        update_post_meta( $order_id, '_order_currency',         get_post_meta($original_order_id, '_order_currency', true) );
        update_post_meta( $order_id, '_prices_include_tax',     get_post_meta($original_order_id, '_prices_include_tax', true) );
        update_post_meta( $order_id, '_customer_ip_address',    get_post_meta($original_order_id, '_customer_ip_address', true) );
        update_post_meta( $order_id, '_customer_user_agent',    get_post_meta($original_order_id, '_customer_user_agent', true) );

        // writeToLog("Updated order header");

        //3 Add Billing Fields

        update_post_meta( $order_id, '_billing_business_name',           get_post_meta($original_order_id, '_billing_business_name', true));
        update_post_meta( $order_id, '_billing_salutation',           get_post_meta($original_order_id, '_billing_salutation', true));
        update_post_meta( $order_id, '_billing_name',           get_post_meta($original_order_id, '_billing_name', true));
        update_post_meta( $order_id, '_billing_address',           get_post_meta($original_order_id, '_billing_address', true));
        update_post_meta( $order_id, '_billing_phone',           get_post_meta($original_order_id, '_billing_phone', true));
        update_post_meta( $order_id, '_billing_city',           get_post_meta($original_order_id, '_billing_city', true));
        update_post_meta( $order_id, '_billing_state',          get_post_meta($original_order_id, '_billing_state', true));
        update_post_meta( $order_id, '_billing_postcode',       get_post_meta($original_order_id, '_billing_postcode', true));
        update_post_meta( $order_id, '_billing_email',          get_post_meta($original_order_id, '_billing_email', true));
        update_post_meta( $order_id, '_billing_phone',          get_post_meta($original_order_id, '_billing_phone', true));
        update_post_meta( $order_id, '_billing_address_1',      get_post_meta($original_order_id, '_billing_address_1', true));
        update_post_meta( $order_id, '_billing_address_2',      get_post_meta($original_order_id, '_billing_address_2', true));
        update_post_meta( $order_id, '_billing_country',        get_post_meta($original_order_id, '_billing_country', true));
        update_post_meta( $order_id, '_billing_first_name',     get_post_meta($original_order_id, '_billing_first_name', true));
        update_post_meta( $order_id, '_billing_last_name',      get_post_meta($original_order_id, '_billing_last_name', true));
        update_post_meta( $order_id, '_billing_company',        get_post_meta($original_order_id, '_billing_company', true));

        // writeToLog("Updated billing fields");

        //4 Add Shipping Fields

        update_post_meta( $order_id, '_shipping_country',       get_post_meta($original_order_id, '_shipping_country', true));
        update_post_meta( $order_id, '_shipping_first_name',    get_post_meta($original_order_id, '_shipping_first_name', true));
        update_post_meta( $order_id, '_shipping_last_name',     get_post_meta($original_order_id, '_shipping_last_name', true));
        update_post_meta( $order_id, '_shipping_company',       get_post_meta($original_order_id, '_shipping_company', true));
        update_post_meta( $order_id, '_shipping_address_1',     get_post_meta($original_order_id, '_shipping_address_1', true));
        update_post_meta( $order_id, '_shipping_address_2',     get_post_meta($original_order_id, '_shipping_address_2', true));
        update_post_meta( $order_id, '_shipping_city',          get_post_meta($original_order_id, '_shipping_city', true));
        update_post_meta( $order_id, '_shipping_state',         get_post_meta($original_order_id, '_shipping_state', true));
        update_post_meta( $order_id, '_shipping_postcode',      get_post_meta($original_order_id, '_shipping_postcode', true));




        //Payment Info
        update_post_meta( $order_id, '_payment_method',         get_post_meta($original_order_id, '_payment_method', true) );
        update_post_meta( $order_id, '_payment_method_title',   get_post_meta($original_order_id, '_payment_method_title', true) );
        if($order_id)
        {
        update_post_meta( $order_id, 'Transaction ID',         get_post_meta($original_order_id, 'Transaction ID', true) );
        }
       //add items = 
       $this->Common_model->table = 'wp_woocommerce_order_items';
    	$this->Common_model->key = 'order_item_id';
    	$modal = $this->Common_model;
    	$item_id = $item;
    	$item = $modal->getbyid($item); 
    	$item->order_id = $order_id;
    	unset($item->order_item_id);
    	$nitem = $modal->add($item);
    	//get meta
        $modal->table = 'wp_woocommerce_order_itemmeta';
        $modal->key = 'meta_id';
        $metas = $modal->get(array('order_item_id'=>$item_id));
        foreach($metas as $v)
        {
            
            unset($v['meta_id']);
            $v['order_item_id'] = $nitem;
            
            $nitem1 = $modal->add($v);
            // if($v['meta_key'] == '_line_total')
            // {
                
            // }
        }
        return $order_id;

	}
	public function create_custom_order_package($original_order_id,$item)
	{
	    $product = $item;
	    $this->load->model('Common_model');
    	$this->Common_model->table = 'wp_posts';
    	$this->Common_model->key = 'ID';
    	$modal = $this->Common_model;
    	$post =  $modal->getbyid($original_order_id);
	    unset($post->ID);
	    $post->post_status = 'wc-processing';
	    $post->post_parent = $original_order_id;
	    $product = wc_get_product( $product );
	    if(!$product)
	    {
	        return 0;
	    }
	    $total = $product->get_price();


	    $this->db->insert('wp_posts',$post);
	       $order_id = $this->db->insert_id();
	       update_post_meta( $order_id, '_order_shipping',         get_post_meta($original_order_id, '_order_shipping', true) );
        // update_post_meta( $order_id, '_order_discount',         get_post_meta($original_order_id, '_order_discount', true) );
        // update_post_meta( $order_id, '_cart_discount',          get_post_meta($original_order_id, '_cart_discount', true) );
        update_post_meta( $order_id, '_order_tax',              get_post_meta($original_order_id, '_order_tax', true) );
        // update_post_meta( $order_id, '_order_shipping_tax',     get_post_meta($original_order_id, '_order_shipping_tax', true) );
        update_post_meta( $order_id, '_order_total',$total );

        update_post_meta( $order_id, '_order_key',              'wc_' . apply_filters('woocommerce_generate_order_key', uniqid('order_') ) );
        update_post_meta( $order_id, '_customer_user',          get_post_meta($original_order_id, '_customer_user', true) );
        update_post_meta( $order_id, '_order_currency',         get_post_meta($original_order_id, '_order_currency', true) );
        update_post_meta( $order_id, '_prices_include_tax',     get_post_meta($original_order_id, '_prices_include_tax', true) );
        update_post_meta( $order_id, '_customer_ip_address',    get_post_meta($original_order_id, '_customer_ip_address', true) );
        update_post_meta( $order_id, '_customer_user_agent',    get_post_meta($original_order_id, '_customer_user_agent', true) );

        // writeToLog("Updated order header");

        //3 Add Billing Fields

        update_post_meta( $order_id, '_billing_business_name',           get_post_meta($original_order_id, '_billing_business_name', true));
        update_post_meta( $order_id, '_billing_salutation',           get_post_meta($original_order_id, '_billing_salutation', true));
        update_post_meta( $order_id, '_billing_name',           get_post_meta($original_order_id, '_billing_name', true));
        update_post_meta( $order_id, '_billing_address',           get_post_meta($original_order_id, '_billing_address', true));
        update_post_meta( $order_id, '_billing_phone',           get_post_meta($original_order_id, '_billing_phone', true));
        update_post_meta( $order_id, '_billing_city',           get_post_meta($original_order_id, '_billing_city', true));
        update_post_meta( $order_id, '_billing_state',          get_post_meta($original_order_id, '_billing_state', true));
        update_post_meta( $order_id, '_billing_postcode',       get_post_meta($original_order_id, '_billing_postcode', true));
        update_post_meta( $order_id, '_billing_email',          get_post_meta($original_order_id, '_billing_email', true));
        update_post_meta( $order_id, '_billing_phone',          get_post_meta($original_order_id, '_billing_phone', true));
        update_post_meta( $order_id, '_billing_address_1',      get_post_meta($original_order_id, '_billing_address_1', true));
        update_post_meta( $order_id, '_billing_address_2',      get_post_meta($original_order_id, '_billing_address_2', true));
        update_post_meta( $order_id, '_billing_country',        get_post_meta($original_order_id, '_billing_country', true));
        update_post_meta( $order_id, '_billing_first_name',     get_post_meta($original_order_id, '_billing_first_name', true));
        update_post_meta( $order_id, '_billing_last_name',      get_post_meta($original_order_id, '_billing_last_name', true));
        update_post_meta( $order_id, '_billing_company',        get_post_meta($original_order_id, '_billing_company', true));

        // writeToLog("Updated billing fields");

        //4 Add Shipping Fields

        update_post_meta( $order_id, '_shipping_country',       get_post_meta($original_order_id, '_shipping_country', true));
        update_post_meta( $order_id, '_shipping_first_name',    get_post_meta($original_order_id, '_shipping_first_name', true));
        update_post_meta( $order_id, '_shipping_last_name',     get_post_meta($original_order_id, '_shipping_last_name', true));
        update_post_meta( $order_id, '_shipping_company',       get_post_meta($original_order_id, '_shipping_company', true));
        update_post_meta( $order_id, '_shipping_address_1',     get_post_meta($original_order_id, '_shipping_address_1', true));
        update_post_meta( $order_id, '_shipping_address_2',     get_post_meta($original_order_id, '_shipping_address_2', true));
        update_post_meta( $order_id, '_shipping_city',          get_post_meta($original_order_id, '_shipping_city', true));
        update_post_meta( $order_id, '_shipping_state',         get_post_meta($original_order_id, '_shipping_state', true));
        update_post_meta( $order_id, '_shipping_postcode',      get_post_meta($original_order_id, '_shipping_postcode', true));




        //Payment Info
        update_post_meta( $order_id, '_payment_method',         get_post_meta($original_order_id, '_payment_method', true) );
        update_post_meta( $order_id, '_payment_method_title',   get_post_meta($original_order_id, '_payment_method_title', true) );
        if($order_id)
        {
        update_post_meta( $order_id, 'Transaction ID',         get_post_meta($original_order_id, 'Transaction ID', true) );
        }
       //add items = 
       $this->Common_model->table = 'wp_woocommerce_order_items';
    	$this->Common_model->key = 'order_item_id';
    	$modal = $this->Common_model;
    	$item_id = $item;
    	$item = $modal->getbyid($item); 
    	$item->order_id = $order_id;
    	unset($item->order_item_id);
    	$nitem = $modal->add($item);
    	//get meta
        $modal->table = 'wp_woocommerce_order_itemmeta';
        $modal->key = 'meta_id';
        $metas = $modal->get(array('order_item_id'=>$item_id));
        foreach($metas as $v)
        {
            
            unset($v['meta_id']);
            $v['order_item_id'] = $nitem;
            
            $nitem1 = $modal->add($v);
            // if($v['meta_key'] == '_line_total')
            // {
                
            // }
        }
        return $order_id;

	}
	public function paid_tot($order_id)
	{
	    
	    $tot =0;
    if($order_id)
    {
        $args = array(
    'numberposts' => -1,
    'orderby'    => 'menu_order',
    'sort_order' => 'desc',
  'post_type'   => 'transection'
);
$users = get_posts( $args );

foreach ( $users as $user ) {
    $pdate = strtotime($user->post_date);

    if(get_post_meta($user->ID,'order_no',true) == $order_id && get_post_meta($user->ID,'earned',true) > 0)
    {
        $tot = $tot + (int)get_post_meta($user->ID,'earned',true); 
    }
    
}
    return $tot;
}
	}
	public function complete()
	{
	    $order_id = (isset($_REQUEST['order_id']))?$_REQUEST['order_id']:0;
	    $file = (isset($_REQUEST['file']))?$_REQUEST['file']:'';
	    $reason = (isset($_REQUEST['reason']))?$_REQUEST['reason']:'';
	   $data['title'] = $subject =  'Order #'.$order_id.' Completed';
        $provider = $_SESSION['knet_login']->ID;
        $user_displayname = get_user_by( 'id', $provider )->display_name ;
        $data['txt'] =  $user_displayname.' complete your order successfully For download work <a href="'.$file.'" > Click Here.</a> <br>"'.$reason.'" ';
	    $msg = $this->load->view('mail/disbur_req',$data,true);
	    $headers = array('Content-Type: text/html; charset=UTF-8');
	   // $mail = 'wahajhotel188@gmail.com';
	    $order = new WC_Order($order_id);
	    $mail =  $order->get_billing_email();
        if (!empty($order)) {
            $order = new WC_Order( $order_id );
                               $items = $order->get_items();
                    $total = 0;
                    $ded = 0;

foreach ( $items as $item ) 
{

    $product_name = $item['name'];

    $product_id = $item['product_id'];
    $product = wc_get_product( $product_id );
    $total = $product->get_price();
    //calculate commission
    $com = 0;
    $sp_commision = get_post_meta($product_id, 'sp_commision',true);
    $com = $total *($sp_commision/100);
    //plateform fee
    $platform_fee = get_post_meta($product_id, 'platform_fee',true);
    $ded =  $com + $platform_fee;
}
$tearn = $total - $ded;
$totpay = $this->paid_tot($order_id);
$re = $tearn - $totpay;
$arr['transection'] = add_payment_transection(0,'completion', $_SESSION['knet_login']->ID,0,  $re, 0,0, $order_id);
            $order->update_status( 'completed' );
            $re = update_post_meta($oid, 'payment_status','completion');
        }
                if($mail)
                {
                    
                    $ret = wp_mail($mail,$subject,$msg,$headers);
                }
                $data['txt'] = "Order Complete successfully!";
                
	    $html = $this->load->view('modal/accepted',$data,true);
	    $arr = array();
	    $arr['html'] = $html;
	    $arr['red'] = base_url('admin/admin/myorder');
	    echo json_encode($arr);
	    exit();
	}
	public function disbur_req()
	{
	    $data = array();
	    $data['txt'] = "Disbursment request submit successfully!";
	    $html = $this->load->view('modal/accepted',$data,true);
	    $mail = 'wahajhotel188@gmail.com';
	   // $mail = 'madilimtiaz786@gmail.com';
	   $mail = get_option( 'admin_email' );//'dinukshi.bandaranayake@gmail.com';
	    //extension
	    $order_id = (isset($_REQUEST['order_id']))?$_REQUEST['order_id']:0;
        $provider = $_SESSION['knet_login']->ID;
        $user_displayname = get_user_by( 'id', $provider )->display_name ;

        $data['title'] = $subject =  'Order #'.$order_id.' Disbursment Request';
        $data['txt'] =  $user_displayname.' wants  amount '.$_REQUEST['amount'].' days due to "'.$_REQUEST['reason'].'"';
	    $msg = $this->load->view('mail/disbur_req',$data,true);
	    $headers = array('Content-Type: text/html; charset=UTF-8');
                if($mail)
                {
                    
                    $ret = wp_mail($mail,$subject,$msg,$headers);
                }
	    $arr = array();
	    $arr['html'] = $html;
	    echo json_encode($arr);
	    exit();
	   // print_r($_REQUEST);
	   // die("OK");
	}
	public function update_deadline()
	{
	    $data = array();
	    $data['txt'] = "Extension request submit successfully!";
	    $html = $this->load->view('modal/accepted',$data,true);
	   // $mail = 'wahajhotel188@gmail.com';
	   // $mail = 'dinukshi.bandaranayake@gmail.com';
	    //extension
	    
	    $order_id = (isset($_REQUEST['order_id']))?$_REQUEST['order_id']:0;
	    //
	    $order = new WC_Order($order_id);
        if (!empty($order)) {
            $order = new WC_Order( $order_id );
            $order->update_status( 'extension-reques' );
        }
	    $args = array(
      'post_type' => 'extension',
      'post_content' => json_encode($_REQUEST),
      'post_title' => $order_id,
      'post_parent' => $order_id,
    );
    $post_id = $this->Common_model->add($args);
    $hash = md5($post_id);
        if($post_id && isset($_REQUEST['order_id']))
        {
            update_post_meta($post_id,'order_id',$_REQUEST['order_id']);
            update_post_meta($post_id,'hash',$hash);
            $order = new WC_Order($order_id);
             $mail =  $order->get_billing_email();
        }
        $mail = 'wahajhotel188@gmail.com';
        if($post_id && isset($_REQUEST['days']))
        {
            update_post_meta($post_id,'days',$_REQUEST['days']);
        }
        if($post_id && isset($_REQUEST['reason']))
        {
            update_post_meta($post_id,'reason',$_REQUEST['reason']);
        }
        $provider = $_SESSION['knet_login']->UserID;
        
        $user_displayname = get_user_by( 'id', $provider )->display_name ;

        $data['url'] = base_url('index/deadline').'?hash='.$hash.'&type=';
        $data['title'] = $subject =  'Order #'.$order_id.' Extension Request';
        $data['txt'] =  $user_displayname.' wants  to update order deadline till '.$_REQUEST['days'].' due to "'.$_REQUEST['reason'].'"';
	    $msg = $this->load->view('mail/update_dedline',$data,true);
	    $headers = array('Content-Type: text/html; charset=UTF-8');
                if($mail)
                {
                    $ret = wp_mail($mail,$subject,$msg,$headers);
                }
	    $arr = array();
	    $arr['html'] = $html;
	    $arr['red'] = base_url('admin/admin/myorder');
	    echo json_encode($arr);
	    exit();
	   // print_r($_REQUEST);
	   // die("OK");
	}
	public function product_option()
	{
	    $data['order_id'] = $_REQUEST['order_id'];
	    $arr = array();
	    if($_REQUEST['action'] == 'webinar')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/products/add_webinar/').'?product_id='.$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'booking')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/products/add_booking/').'?product_id='.$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'slots')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/products/slots/').'?product_id='.$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'edit')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/products/create/').$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'publish')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $up = array('publish'=>'0');
            $this->db->where('id',$oid)->update('products',$up);
            $arr['red'] = base_url('admin/products/all');
            $data = array();
            $data['txt'] = "Product Publish successfully!";
            $html = $html = $this->load->view('modal/accepted',$data,true);
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'duplicate')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
	        $row = $this->db->where('id',$oid)->get('products')->row(); 
	        $row->id = '';
	        $row->name = $row->name.' dupicate';
	        $row->sku = $row->sku.'-dupicate';
	        $row->slug = $this->create_slug($row->name.' dupicate');
	        if($this->db->insert('products', $row))
	        {
	               $arr['red'] = base_url('admin/products/all');
            $data = array();
            $data['txt'] = "Product Duplicate successfully!";
            $html = $html = $this->load->view('modal/accepted',$data,true);
    	    $arr['html'] = $html;

	            
	        }
	        else
	        {
	                   //$arr['red'] = base_url('admin/products/all');
            $data = array();
            $data['txt'] = "Server error!";
            $html = $html = $this->load->view('modal/rejected',$data,true);
    	    $arr['html'] = $html;
	        }
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'draft')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            // $url = get_permalink($oid);
            $up = array('publish'=>'1');
            $this->db->where('id',$oid)->update('products',$up);
            $arr['red'] = base_url('admin/products/all');
            $data = array();
            $data['txt'] = "Product Un - Publish successfully!";
            $html = $html = $this->load->view('modal/accepted',$data,true);
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'view')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
	        $row = $this->db->where('id',$oid)->get('products')->row(); 
            $url = base_url('index/product/').$row->slug;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    if($_REQUEST['action'] == 'attribute')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/attribute/all/').$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    else if($_REQUEST['action'] == 'variation')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/variation/all/').$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    else if($_REQUEST['action'] == 'login')
	    {
	        $oid = $_REQUEST['order_id'];
	        $user = get_user_by( 'id', $oid );
	        
            $_SESSION['knet_login'] = $user->data = $user;
	    $data['txt'] = "Account Login successfully!";
	    $_REQUEST['action'] = 'accepted';
	    wp_set_current_user($oid);
	    $arr['red'] = base_url('provider/admin');
	    }
	    elseif($_REQUEST['action'] == 'client_request_mediation')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $_REQUEST['action'] = 'client_request_mediation';
                //  $order->update_status( 'rejected' );
                 
            }
	    }
	    elseif($_REQUEST['action'] == 'client_approve_extension')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $_REQUEST['action'] = 'client_request_mediation';
                //  $order->update_status( 'rejected' );
                 
            }
	    }
	    
	    elseif($_REQUEST['action'] == 'rejected')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                  $order->update_status( 'rejected' );
                 
            }
	    $data['txt'] = "Order Rejected successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('admin/admin/myorder');
	    }
	    elseif($_REQUEST['action'] == 'inprog')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                 $order->update_status( 'in-progress' );
                 
            }
	    $data['txt'] = "Order set to in Process successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = '/';
	    }
	    $html = $this->load->view('modal/'.$_REQUEST['action'],$data,true);
	    $arr['html'] = $html;
	}
	public function service_provider()
	{
	    $data['order_id'] = $_REQUEST['order_id'];
	    $arr = array();
	    $this->load->model('Product_model');
        $product = $this->Product_model;
	    if($_REQUEST['action'] == 'edit')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = base_url('admin/admin/profile/').$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    elseif($_REQUEST['action'] == 'delete')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
	        if($this->db->where('ID',$oid)->delete('wp_users'))
        	{
            $url = base_url('admin/provider/delete/').$oid;
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
    	    
        	}
            
	    echo json_encode($arr);
	    exit();
	    }
	    else if($_REQUEST['action'] == 'login')
	    {
	        $oid = $_REQUEST['order_id'];
	        $user = $product->getuser($oid );
	        
            $_SESSION['knet_login'] = $user;
	    $data['txt'] = "Account Login successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('provider/admin');
	    }
	    elseif($_REQUEST['action'] == 'client_request_mediation')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $_REQUEST['action'] = 'client_request_mediation';
                //  $order->update_status( 'rejected' );
                 
            }
	    }
	    elseif($_REQUEST['action'] == 'client_approve_extension')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $_REQUEST['action'] = 'client_request_mediation';
                //  $order->update_status( 'rejected' );
                 
            }
	    }
	    
	    elseif($_REQUEST['action'] == 'rejected')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                  $order->update_status( 'rejected' );
                 
            }
	    $data['txt'] = "Order Rejected successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('admin/admin/myorder');
	    }
	    elseif($_REQUEST['action'] == 'inprog')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                 $order->update_status( 'in-progress' );
                 
            }
	    $data['txt'] = "Order set to in Process successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('admin/admin/myorder');
	    }
	    $html = $this->load->view('modal/'.$_REQUEST['action'],$data,true);
	    $arr['html'] = $html;
	    echo json_encode($arr);
	}
	public function import_form()
	{
	    
	    $html = $this->load->view('modal/import_form',array(),true);
	    $arr['html'] = $html;
	    echo json_encode($arr);
	}
	public function order_modal()
	{
	    $data['order_id'] = $_REQUEST['order_id'];
	    $arr = array();
	    if($_REQUEST['action'] == 'client_view')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $url = $order->get_view_order_url();
	    $arr['red'] = $url;
	    $html = 'Redirecting -----';
	    $arr['html'] = $html;
            }
	    echo json_encode($arr);
	    exit();
	    }
	    else if($_REQUEST['action'] == 'view')
	    {
	        $arr = array();
	        $oid = $_REQUEST['order_id'];
            $url = get_permalink($oid);
            $arr['red'] = $url;
    	    $html = 'Redirecting -----';
    	    $arr['html'] = $html;
            
	    echo json_encode($arr);
	    exit();
	    }
	    else if($_REQUEST['action'] == 'accepted')
	    {
	        $order_id = $_REQUEST['order_id'];
	        $provider = order_to_provider($order_id);
		            $order = new WC_Order($order_id);
            if (!empty($order)) {
                update_post_meta($order_id, 'payment_status','client_paid');
                $email_data = array();
                send_email($order_id, '5','','Order accepted Email to client',$email_data);
                $user_info = get_userdata($provider);
                if($user_info)
                {
                  $mailadresje = $user_info->user_email;
                  send_email($order_id, '5b',$mailadresje,'email to service provider order accepted',$email_data);
                }
                        $order = new WC_Order($order_id);
                        $order->update_status( 'accepted' );
            }    
    	    $data['txt'] = "Order Accepted successfully!";
    	    $_REQUEST['action'] = 'accepted';
    	    $arr['red'] = base_url('admin/admin/myorder');
    	    if(isset($_REQUEST['email']))
    	    {
    	        $arr['red'] = site_url();
    	    }
    	    
	    }
	    elseif($_REQUEST['action'] == 'client_request_mediation')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $_REQUEST['action'] = 'client_request_mediation';
                //  $order->update_status( 'rejected' );
                 
            }
	    }
	    elseif($_REQUEST['action'] == 'client_approve_extension')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                $_REQUEST['action'] = 'client_request_mediation';
                //  $order->update_status( 'rejected' );
                 
            }
	    }
	    
	    elseif($_REQUEST['action'] == 'refund_paid')
	    {
	        $order_id = $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
	    $data['txt'] = "Order Refunded successfully!";
	    update_post_meta($order_id, 'payment_status','fully_paid');
	    send_email($order_id, '8','','order refund email',$email_data);
	    $tid = add_payment_transection(get_post_meta($order_id,'_order_total',true),'refund', order_to_provider($order_id),0,   get_post_meta($order_id,'_order_total',true), 0,0, $order_id);
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('admin/admin/page/order');
	    }
	    
	    elseif($_REQUEST['action'] == 'process_order')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                  $order->update_status( 'processing' );
                 
            }
            $this->all_order_process();
	    $data['txt'] = "Order Process successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('admin/admin/page/order');
	    }
	    
	    elseif($_REQUEST['action'] == 'client_canel')
	    {
	        $oid = $_REQUEST['order_id'];
	        update_post_meta($oid,'cancel_email','4b');
            $order = new WC_Order($oid);
            if (!empty($order)) {
                            $order_id = $oid;
                $tid = add_payment_transection(get_post_meta($order_id,'_order_total',true),'cancel_invoice', get_post_meta($order_id,'_customer_user',true),0,   get_post_meta($order_id,'_order_total',true), 0,0, $order_id);
// $sub = 'Startup Lawyer Order Payment Due: Invoice #'.$order_id;
$email_data = array(
    'invoice_number' => $tid
    );
    send_email($order_id, '4b','','order cancel email',$email_data);
                  $order->update_status( 'cancelled' );
                 
            }
            $this->all_order_process();
	    $data['txt'] = "Order ancel successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = site_url('my-account/orders');
	    }
	    elseif($_REQUEST['action'] == 'cancel')
	    {
	        $oid = $_REQUEST['order_id'];
	        update_post_meta($oid,'cancel_email','4a');
            $order = new WC_Order($oid);
            if (!empty($order)) {
                            $order_id = $oid;
                $tid = add_payment_transection(get_post_meta($order_id,'_order_total',true),'cancel_invoice', get_post_meta($order_id,'_customer_user',true),0,   get_post_meta($order_id,'_order_total',true), 0,0, $order_id);
$sub = 'Startup Lawyer Order Payment Due: Invoice #'.$order_id;
$email_data = array(
    'invoice_number' => $tid
    );
    send_email($order_id, '4a','','order cancel email',$email_data);
                  $order->update_status( 'cancelled' );
                 
            }
            $this->all_order_process();
	    $data['txt'] = "Order ancel successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = base_url('/admin/page/order');
	    }
	    
	    elseif($_REQUEST['action'] == 'rejected')
	    {
	        
	    }
	    elseif($_REQUEST['action'] == 'reject_form')
	    {
	        
	        $order_id = $_REQUEST['order_id'];
	        if(isset($_REQUEST['reason']))
	        {
	            update_post_meta($order_id,'reject_reason',$_REQUEST['reason']);
	        }
                       $provider = order_to_provider($order_id);
		            $order = new WC_Order($order_id);
        if (!empty($order)) {
            update_post_meta($order_id, 'payment_status','refund_approved');
            $email_data = array();
            send_email($order_id, '6','','Order rejected Email to client',$email_data);
                      $user_info = get_userdata($provider);
                      if($user_info)
                      {
  $mailadresje = $user_info->user_email;
        send_email($order_id, '7',$mailadresje,'email to service provider order declined',$email_data);
                      }
            $order->update_status( 'rejected' );
        }
	    $data['txt'] = "Order Declined successfully!";
	    $_REQUEST['action'] = 'accepted';
	    }
	    elseif($_REQUEST['action'] == 'inprog')
	    {
	        $oid = $_REQUEST['order_id'];
            $order = new WC_Order($oid);
            if (!empty($order)) {
                 $order->update_status( 'in-progress' );
                 $email_data = array();
	        $provider = order_to_provider($oid);
	        send_email($oid, '9','','Order in progress Email to client',$email_data);
	                      $user_info = get_userdata($provider);
                      if($user_info)
                      {
  $mailadresje = $user_info->user_email;
        send_email($oid, '10',$mailadresje,'email to service provider order in progress',$email_data);
                 
            }
            $order = new WC_Order($oid);
            if (!empty($order)) {
                    $order = new WC_Order( $oid );
                    $items = $order->get_items();
                    $total = 0;
                    $ded = 0;

foreach ( $items as $item ) 
{

    $product_name = $item['name'];

    $product_id = $item['product_id'];
    $product = wc_get_product( $product_id );
    $total = $product->get_price();
    //calculate commission
    $com = 0;
    $sp_commision = get_post_meta($product_id, 'sp_commision',true);
    $com = $total *($sp_commision/100);
    //plateform fee
    $platform_fee = get_post_meta($product_id, 'platform_fee',true);
    $ded =  $com + $platform_fee;
}
$tearn = $total - $ded;
$earn = $tearn/2;
update_post_meta($oid, 'remaining',$earn);
$arr['transection'] = add_payment_transection($total,'cpurchase', $_SESSION['knet_login']->ID,$ded,  $earn, $earn,0, $oid);
update_post_meta($oid, 'payment_status','advance_earn');
	    $data['txt'] = "Order set to In-Process successfully!";
	    $_REQUEST['action'] = 'accepted';
	    $arr['red'] = $_SERVER['HTTP_REFERER'];
	    }
	    }
	    }
	    $html = $this->load->view('modal/'.$_REQUEST['action'],$data,true);
	    $arr['html'] = $html;
	    echo json_encode($arr);
	    exit();
	}
	public function checkEmail($email) {
   $find1 = strpos($email, '@');
   $find2 = strpos($email, '.');
   return ($find1 !== false && $find2 !== false && $find2 > $find1);
}
	public function glogin()
	{
$ret = array();
$ret['status'] = 0;
$ret['msg'] = 'invalid request';
if (isset($_REQUEST['type']) && isset($_REQUEST['sid']))
{
    $tpe = 'google';
    $sid = $_REQUEST['sid'];
    $type = $_REQUEST['type'];
    $uid = 0;
    $key = ($tpe == 'google') ? "google_id" : "fb_id";
    $key_cf = ($tpe == 'google') ? "field_5fd28cd61bd53" : "field_5fd28cc31bd52";
    $w = array(
        'meta_key' => $key,
        'meta_value' => $sid
    );
    $this->load->model('Product_model');
        $product = $this->Product_model;
    $user = $this->db->where($w)->get('wp_usermeta')->row();
    if(isset($user->user_id))
    {
        $user = $product->getuser($user->user_id);
    
    }
    if (!$user)
    {
        //register
        if (!isset($_REQUEST['email']))
        {
            $_REQUEST['email'] = $sid.'@startuplawyer.com';
        }
        if (isset($_REQUEST['email']))
        {
            $email = $_REQUEST['email'];
            $w = array(
                'user_email' => $email
                );
            $user = $this->db->where($w)->get('wp_users')->row();
            if ($user)
            {
                $uid = $user->ID;
            }
            else
            {
                //db insertion
                $username = $sid;
                /*if (!$this->checkEmail($email)) 
                {
                    // die($email);
                    $responseData['message'] = "Email is not Valid.";
                    $responseData['error'] = "1";
                    echo json_encode($responseData);
                    exit();
                }*/
                $w = array(
                'user_login' => $username
                );
                $user_id = $this->db->where($w)->get('wp_users')->row();
                $w = array(
                'user_email' => $email
                );
                $email_check = $this->db->where($w)->get('wp_users')->row();
                if ($user_id || $email_check)
                {
                    if ($user_id)
                    {
                        $responseData['message'] = "Username already exists.";
                        $responseData['error'] = "1";
                    }
                    if ($email_check)
                    {
                        $responseData['message'] = "Email already exists.";
                        $responseData['error'] = "1";
                    }
                    echo json_encode($responseData);
                    exit();
                }
                else
                {
                    $password = md5(time());
                    $user_data = array(
                        'user_login' => $username,
                        'user_email' => $email,
                        'user_pass' => $password,
                    );
                    $this->db->insert('wp_users', $user_data );           
                        $user_id = $this->db->insert_id();
                    if ($user_id)
                    {
                        $uid = $user_id;
                        
                        if($type == 'front')
                        {
                                    $role = array(
	    'customer' => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                        }
                        else
                        {
                                                        $role = array(
	    'draft_provider' => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                        }
    $token = md5($user_id);
                $product->updatemeta('user',$user_id, 'plain_pass',$password);
                $product->updatemeta('user',$user_id, 'varified',1);

                        $responseData['message'] = "Successfully Registered!";
                        $responseData['error'] = "0";
                        $responseData['user'] = $user;
                    }
                }
            }
        }
    }
    else
    {
        $uid = $user->ID;
    }
    
    $user_id = $uid;
    $ret = $product->updatemeta('user',$user_id, $key, $sid);
    $resp = array();
    $resp['status'] = 1;
$resp['msg'] = 'Opreation successfully!';
$rurl = '';
if($user_id)
{

        if(isset($_REQUEST['name']) && !empty($_REQUEST['name']) && empty($product->getmeta('user',$user_id,'first_name',true)))
	{
		$ret = $product->updatemeta('user',$user_id,'first_name',$_REQUEST['name']);
	}
    $user = $product->getuser($user_id);
            $_SESSION['knet_login'] = $user;
    $rurl = $product->dashboard_url($user_id);
}

$resp['data'] = $user_id;
$resp['rurl'] = $rurl;

} //main end
echo json_encode($resp);
exit();

	}
	function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
	public function front_login()
	{
	    $ret = array();
	    if(isset($_REQUEST['uname']) && isset($_REQUEST['upass']))
		{
		    $uname = $_REQUEST['uname'];
		    $upass = $_REQUEST['upass'];
		    if(true){
    $userOK = 0;
    $user = $this->db->where('user_email',$uname)->where('user_pass' , md5($upass))->get('wp_users')->row();
    if(!$user) {
        $ret = array(
		        'status' => 0,		        
		        'msg' => 'Invalid user name or password',
		        );
    } else {
        $this->load->model('Product_model');
        $product = $this->Product_model;
        $suser = $product->getuser($user->ID);
        $_SESSION['knet_login'] = $suser; 
        if($user){
            
            if($user) {
                $url = '';
                if(in_array('service_provider',$suser->roles)|| in_array('draft_provider',$suser->roles))
                	    {
                	        
                	    $url = base_url('provider/admin');
                	    
                	    }
                	    elseif(in_array('customer',$suser->roles))
                	    {
                	        
                	    $url = base_url('my-account');
                	    
                	    }
                	    elseif(in_array('administrator',$suser->roles))
                	    {
                	        
                	    $url = base_url('admin/admin');
                	    
                	    }
                	    
                	    
                $ret = array(
		        'status' => 1,
		        'msg' => 'Login successfully redireting ...',
		        'red' => $url,
		        );
            }
        }
    }
}
		}
		else
		{
		    $ret = array(
		        'status' => 0,
		        'msg' => 'All fields required!',
		        );
		}
		echo json_encode($ret);
		exit();
	}
	public function social_login()
	{
	    
		if(isset($_REQUEST['access_token']))
		{
		    $resp = array();
            $resp['status'] = 0;
            $resp['msg'] = 'invalid request';
		    $token = $_REQUEST['access_token'];
		    $type = $_REQUEST['type'];
		    $url = 'https://graph.facebook.com/me?access_token='.$token.'&fields=email,name';
		    $json = $this->url_get_contents($url);
		    $arr = json_decode($json, true);
		    $ret = array();
$ret['status'] = 0;
$ret['msg'] = 'invalid request';
if (isset($arr['id']) && isset($arr['email']))
{
    $tpe = 'facebook';
    $sid = $arr['id'];
    $type = $_REQUEST['type'];
    $uid = 0;
    $key = ($type == 'google') ? "google_id" : "fb_id";
    $key_cf = ($type == 'google') ? "field_5fd28cd61bd53" : "field_5fd28cc31bd52";
    $sid = $_REQUEST['sid'];
    $uid = 0;
    $w = array(
        'meta_key' => $key,
        'meta_value' => $sid
    );
    $this->load->model('Product_model');
        $product = $this->Product_model;
    $user = $this->db->where($w)->get('wp_usermeta')->row();
    if(isset($user->user_id))
    {
        $user = $product->getuser($user->user_id);
    
    }
    if (!$user)
    {
        //register
        if (!isset($_REQUEST['email']))
        {
            $_REQUEST['email'] = $sid.'@startuplawyer.com';
        }
        if (isset($_REQUEST['email']))
        {
            $email = $_REQUEST['email'];
            $w = array(
                'user_email' => $email
                );
            $user = $this->db->where($w)->get('wp_users')->row();
            if ($user)
            {
                $uid = $user->ID;
            }
            else
            {
                //db insertion
                $username = $sid;
                if (!$this->checkEmail($email)) 
                {
                    $responseData['message'] = "Email is not Valid.";
                    $responseData['error'] = "1";
                    echo json_encode($responseData);
                    exit();
                }
                $w = array(
                'user_login' => $username
                );
                $user_id = $this->db->where($w)->get('wp_users')->row();
                $w = array(
                'user_email' => $email
                );
                $email_check = $this->db->where($w)->get('wp_users')->row();
                if ($user_id || $email_check)
                {
                    if ($user_id)
                    {
                        $responseData['message'] = "Username already exists.";
                        $responseData['error'] = "1";
                    }
                    if ($email_check)
                    {
                        $responseData['message'] = "Email already exists.";
                        $responseData['error'] = "1";
                    }
                    echo json_encode($responseData);
                    exit();
                }
                else
                {
                    $password = md5(time());
                    $user_data = array(
                        'user_login' => $username,
                        'user_email' => $email,
                        'user_pass' => $password,
                    );
                    $this->db->insert('wp_users', $user_data );           
                        $user_id = $this->db->insert_id();
                    if ($user_id)
                    {
                        $uid = $user_id;
                        
                        if($type == 'front')
                        {
                                    $role = array(
	    'customer' => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                        }
                        else
                        {
                                                        $role = array(
	    'draft_provider' => 1
	    );
	    $role = serialize($role);
	    $role = $product->updatemeta('user',$user_id,'wp_capabilities',$role);
                        }
    $token = md5($user_id);
                $product->updatemeta('user',$user_id, 'plain_pass',$password);
                $product->updatemeta('user',$user_id, 'varified',1);

                        $responseData['message'] = "Successfully Registered!";
                        $responseData['error'] = "0";
                        $responseData['user'] = $user;
                    }
                }
            }
        }
    }
    else
    {
        $uid = $user->ID;
    }
    $user_id = $uid;
    $ret = $product->updatemeta('user',$user_id, $key, $sid);
    $resp = array();
    $resp['status'] = 1;
$resp['msg'] = 'Opreation successfully!';
$rurl = '';
if($user_id)
{

        if(isset($_REQUEST['name']) && !empty($_REQUEST['name']) && empty($product->getmeta('user',$user_id,'first_name',true)))
	{
		$ret = $product->updatemeta('user',$user_id,'first_name',$_REQUEST['name']);
	}
    $user = $product->getuser($user_id);
            $_SESSION['knet_login'] = $user;
    $rurl = $product->dashboard_url($user_id);
}
    $resp = array();
    $resp['status'] = 1;
$resp['msg'] = 'Opreation successfully!';
$rurl = '';
if($user_id)
{
    $user = $product->getuser($user_id );
    $rurl = $product->dashboard_url($user_id);
}
$resp['data'] = $user_id;
$resp['rurl'] = $rurl;
} //main end
echo json_encode($resp);
die();
		     
		     
		    if($_POST['type'] == 'sms')
		    {
		        $num = '965'.$_POST['number'];
		        $uid = $_POST['coupon'];
		        $liunk = base_url('index/coupon').'/'.$uid;
				$msg = 'Hello, your coupon link is '.$liunk.'. Thanks';
		        $mres = $this->send_sms($num, $msg);
			   $resp = json_decode($mres, true);
			   
					
			   if($resp['Result'] != "false")
			   {
					$ar = array(
						'status'=> 1,
						'msg'=> "Coupon send successfully!"
					);
					echo json_encode($ar);
					die();
				}
				else
				{
					// var_dump($resp);
			  //  die();
					$ar = array(
						'status'=> 0,
						'msg'=> $resp['Message']
					);
					echo json_encode($ar);
					die();
				}
		    }
		    elseif($_POST['type'] == 'email')
		    {
		        $mail = $_POST['number'];
		        $uid = $_POST['coupon'];
		        $liunk = base_url('index/coupon').'/'.$uid;
				$msg = 'Hello, your coupon link is '.$liunk.'. Thanks';
		        $mres = $this->send_mail($mail, $msg, 'Futer Kid Coupons');
		        $ar = array(
						'status'=> 1,
						'msg'=> "Coupon send successfully!"
					);
					echo json_encode($ar);
					die();
		        
		      //  die("send mail");
		    }
		    elseif($_POST['type'] == 'use')
		    {
		        $cid = $_POST['coupon'];
		        $this->load->model('Common_model');
		        $modal = $this->Common_model;
		        $modal->table = 'coupon_item';
			        $ret = $modal->update($cid, array('is_used'=>$_SESSION['knet_login']->ID));
		        if($ret)
		        $ar = array(
						'status'=> 1,
						'msg'=> "Coupon used successfully!"
					);
					echo json_encode($ar);
					die();
		        
		      //  die("send mail");
		    }
			$this->load->model('Common_model');
			$cid = $_POST['coupon'];
			$num = $_POST['number'];
			$client_id = 0;
			//get client 
			$this->Common_model->table = 'clients';
			$modal = $this->Common_model;
			$user = $modal->get(array('phone'=>$num));
			if($user[0] && $user[0]['id'])
			{
			    $client_id = $user[0]['id'];
			    
			}
			else
			{
			    $user_id = $_SESSION['knet_login']->UserID;
			    $ar = array(
			        "phone"=>$num,
			        "userID"=>$user_id
			        );
			        $client_id = $modal->add($ar);
			}
			$this->Common_model->table = 'coupon_item';
			$modal = $this->Common_model;
			$user_id = $_SESSION['knet_login']->UserID;
			//insert new logic
			$modal->table = 'clients_to_user';
			$exist= $modal->get(array('userID'=>$user_id,'cID'=>$client_id));
			if(!$exist)
			{
			    $in = array('userID'=>$user_id,'cID'=>$client_id);
			    $modal->add($in);
			}
			//insert new logic
			
			
			$exp = explode(',', $cid);
			if($exp)
			{
			    $modal->table = 'coupon_item';
			    foreach($exp as $k => $v)
			    {
			        $modal->update($v, array('user'=>$client_id,'assign_by'=>$_SESSION['knet_login']->UserID));
			        
			    }
				$modal->table = 'clink';
				$code = time();
				$in = array(
					'code' => $code
				);
				// if($linkID = $modal->add($in))
				// {
				// 	$modal->table = 'link_to_coupon';
				// 	foreach ($exp as $key => $value) {
				// 		if($value)
				// 		{
				// 			$in = array(
				// 				'linkID'=> $linkID,
				// 				'cID'=> $value,
				// 			);
				// 			$modal->add($in);

				// 		}
				// 	}
				// 	$liunk = base_url('index/coupon').'/'.$code;
				// 	$msg = 'Hello, your coupon link is '.$liunk.'. Thanks';
				// }
			}
			$ar = array(
						'status'=> 1,
						'msg'=> "Coupon assigned successfully!"
					);
					echo json_encode($ar);
					die();
			
			$mres = $this->send_sms($num, $msg);
			   $resp = json_decode($mres, true);
			   
					
			   if($resp['Result'] != "false")
			   {
					$ar = array(
						'status'=> 1,
						'msg'=> "Coupon send successfully!"
					);
					echo json_encode($ar);
					die();
				}
				else
				{
					// var_dump($resp);
			  //  die();
					$ar = array(
						'status'=> 0,
						'msg'=> $resp['Message']
					);
					echo json_encode($ar);
					die();
				}
		}
	}
	 public function send_sms($num, $msg) {
	 	$code = mb_substr($num, 0, 3);
	 	$parms = [
   "username" => "future", 
   "password" => "Nazmul@123", 
   "customerId" => "316", 
   "senderText" => "Future Kid", 
   "recipientNumbers" => "", 
   "defdate" => "", 
   "isBlink" => "false", 
   "isFlash" => "false" 
];
    if( $code == "965"|| $code == '+96')
    {
// 		echo "Custom";
    }
    else{
        die("Twilio");
	}
	$num  = trim(str_replace("+"," ",$num));
    $parms['messageBody'] = $msg;
    $parms['recipientNumbers'] = $num;

$curl = curl_init();
$url = "http://sms.channelsmedia.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS?".http_build_query($parms);
// die();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
// return $response;
$fileContents = str_replace(array("\n", "\r", "\t"), '', $response);
$fileContents = trim(str_replace('"', "'", $fileContents));
$oldXml = $fileContents;
$simpleXml = simplexml_load_string($fileContents);
$json = json_encode($simpleXml);
return $json;
	 }
	 public function send_mail($to, $html, $sub) {

        $data = array (

              'personalizations' =>
              array (

                0 => 

                array (

                  'to' => 

                  array (

                    0 => 

                    array (

                      'email' => $to,

                    ),

                  ),

                  'subject' => $sub,

                ),

              ),

              'from' => 

              array (

                'email' => 'info@channelsmedia.com' ,
                'name' => 'channelsmedia',

              ),

              'content' => 

              array (

                0 => 

                array (

                  'type' => 'text/html',

                  'value' => $html,

                ),

              ),

            );

            

            $curl = curl_init();

            

              curl_setopt_array($curl, array(

              CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",

              CURLOPT_RETURNTRANSFER => true,

              CURLOPT_ENCODING => "",

              CURLOPT_MAXREDIRS => 10,

              CURLOPT_TIMEOUT => 30,

              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

              CURLOPT_CUSTOMREQUEST => "POST",

              CURLOPT_POSTFIELDS => json_encode($data),

              CURLOPT_HTTPHEADER => array(

                "authorization: Bearer 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",

                "cache-control: no-cache",

                "content-type: application/json",

                "postman-token: 500e002d-9ecb-48a8-eb26-9e81cba79900"

              ),

            ));

            

            $response = curl_exec($curl);

            $err = curl_error($curl);

            

            curl_close($curl);
            if ($err) {

              echo $err;


            } else {

              $arr = json_decode($response);
              

            }

    }
	 public function rpass2()
	{
	header('Access-Control-Allow-Origin: *');
		if($_REQUEST && isset($_REQUEST['user_id']) && isset($_REQUEST['pass']) && $_REQUEST['pass'] && $_REQUEST['user_id'])
		{
			$id = $_REQUEST['user_id'];
			$pass = base64_encode($_REQUEST['pass']);
			$up = array('upass'=> $pass);
			$user = $this->db->where('id',$id)->get('clients')->row();
			
			$rdata = array();
				if($user)
				{
				    unset($user->upass);
				    unset($user->token);
					unset($user->app_type);
				    $res = $this->db->where('id',$id)->update('clients', $up);
				    $html = 'your password updated';
				   $this->send_mail($user->email, $html, 'Password Update'); 
					$rdata = array(
						"status" => 1,
						"msg" => 'update successfully',
						"data" => $user,
					);
				}
				else
				{
					$rdata = array(
						"status" => 0,
						"text" => "No Users Found"
					);
				}
				echo json_encode($rdata);
		}
		else{
			die("invalid request");
		}
	}
	 public function rpass1()
	{
	header('Access-Control-Allow-Origin: *');
		if($_REQUEST && isset($_REQUEST['email']) && $_REQUEST['email'])
		{
			$email = $_REQUEST['email'];
			$digits = 4;
			$code = rand(pow(10, $digits-1), pow(10, $digits)-1);
			$up = array('rcode', $code);
			$res = $this->db->where('email',$email)->get('clients')->row();
			$rdata = array();
				if($res)
				{
				    $html = 'your code is '.$code;
				   $this->send_mail($email, $html, 'Rest Password code'); 
					$res->code = $code;
					$rdata = array(
						"status" => 1,
						"data" => $res,
					);
				}
				else
				{
					$rdata = array(
						"status" => 0,
						"text" => "No Users Found"
					);
				}
				echo json_encode($rdata);
		}
		else{
			die("invalid request");
		}
	}
	public function updateProfile()
	{
		$rdata = array();
		if($_REQUEST && isset($_REQUEST['user_id']))
		{
			$id = $_REQUEST['user_id'];
			$user = $this->db->where('id',$id)->get('clients')->row();
			if($user)
			{
			$this->load->model('Common_model');
					$this->Common_model->table = 'clients';
					$modal = $this->Common_model;

			$id = $_REQUEST['user_id'];
			if(isset($_REQUEST['fname']) && !empty($_REQUEST['fname']))
			{
					$ret = $modal->update($id, array('fname'=>$_REQUEST['fname']));
			}
			if(isset($_REQUEST['lname']) && !empty($_REQUEST['lname']))
			{
					$modal->update($id, array('lname'=>$_REQUEST['lname']));
			}
			if(isset($_REQUEST['gender']) && !empty($_REQUEST['gender']))
			{
					$modal->update($id, array('gender'=>$_REQUEST['gender']));
			}
			if(isset($_REQUEST['age']) && !empty($_REQUEST['age']))
			{
					$modal->update($id, array('age'=>$_REQUEST['age']));
			}
			if(isset($_REQUEST['height']) && !empty($_REQUEST['height']))
			{
					$modal->update($id, array('height'=>$_REQUEST['height']));
			}
			if(isset($_REQUEST['weight']) && !empty($_REQUEST['weight']))
			{
					$modal->update($id, array('weight'=>$_REQUEST['weight']));
			}
					$this->load->model('Common_model');
					$this->Common_model->table = 'clients';
					$modal = $this->Common_model;
				    $media = $modal->getMediaByID($user->mediaID);
		        if($media)
		        {
		        	$user->img = base_url().$media->localPath;
		        }
		        else
		        {
		        	$user->img = $this->dummyimage();
		        }
					unset($user->upass);
					unset($user->token);
					unset($user->app_type);
			$rdata['status'] = 1;
			$rdata['msg'] = 'Profile update successfully!';
		}
		else
		{
			$rdata['status'] = 0;
			$rdata['msg'] = 'User does not exist!';
		}
		}
		else{
			$rdata['status'] = 0;
			$rdata['msg'] = 'invalid request!';

		}	
		echo json_encode($rdata)	;
	}
	public function signup()
	{
header('Access-Control-Allow-Origin: *');
		if($_REQUEST)
		{

			$indata= array(
				"email" =>$_REQUEST['email'],
				"upass" =>base64_encode($_REQUEST['pass']),
				"fname" =>$_REQUEST['fname'],
				"lname" =>$_REQUEST['lname'],
			);
			$res = $this->db->where('email',$_REQUEST['email'])->get('clients')->row();
			if($res)
			{
			    $rdata = array(
						"status" => 0,
						"text" => "Users Already exist."
					);
					echo json_encode($rdata);
					exit();
			}
			$rdata = array();
				if($id = $this->db->insert('clients',$indata))
				{
					$user = $this->db->where('id',$id)->get('clients')->row();
					$this->load->model('Common_model');
					$this->Common_model->table = 'clients';
					$modal = $this->Common_model;
				    $media = $modal->getMediaByID($user->mediaID);
		        if($media)
		        {
		        	$user->img = base_url().$media->localPath;
		        }
		        else
		        {
		        	$user->img = $this->dummyimage();
		        }
					unset($user->upass);
					unset($user->token);
					unset($user->app_type);
					
					$rdata = array(
						"status" => 1,
						"data" => $user,
						"text" => "Account creat successfully!"
					);
				}
				else
				{
					$rdata = array(
						"status" => 0,
						"text" => "server error"
					);
				}
				echo json_encode($rdata);
		}
		else{
			die("invalid request");
		}
	}
	public function updateProfileImg()
	{
		header('Access-Control-Allow-Origin: *');
		if(isset($_FILES['img']) && isset($_REQUEST['user_id']))
		{
			$this->load->library('template');
			$mediaID = 0;
        	if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name']))
	        {
	        	
	        	$imgData = $this->template->upload('img');
	        	if($imgData['localPath'])
	        	{
	        		$this->load->model('Common_model');
				$this->Common_model->table = 'clients';
				$modal = $this->Common_model;

	        		$mediaID = $modal->addMedia($imgData);

	        	}
	        }
	        if($mediaID)
	        {
	        	$rdata = array();
	        	$up = array(
	        		'mediaID'=> $mediaID
	        	);
				if($res = $this->db->where('id',$_REQUEST['user_id'])->update('clients', $up))
				{
					
					$rdata = array(
						"status" => 1,
						"text" => "Account update successfully!"
					);
				}
				else
				{
					$rdata = array(
						"status" => 0,
						"text" => "server error"
					);
				}
				echo json_encode($rdata);
	        }
		}
		else{
			die("invalid request");
		}
	}
	public function applogin()
	{
	header('Access-Control-Allow-Origin: *');
		if($_REQUEST)
		{
			$email = $_REQUEST['email'];
			$pass = $_REQUEST['pass'];
			$pass = base64_encode($pass);
			$user = $this->db->where('email',$email)->where('upass',$pass)->get('clients')->row();
			$rdata = array();
				if($user)
				{
				    if(isset($_REQUEST['token']) && isset($_REQUEST['app_type']))
				    {
    				    $token = $_REQUEST['token'];
    			        $app_type = $_REQUEST['app_type'];
    			        $up = array(
    			            "app_type" => $app_type,
    			            "token" => $token,
    			            );
    			            $res = $this->db->where('id',$user->id)->update('clients', $up);
				    }
				    $this->load->model('Common_model');
					$this->Common_model->table = 'clients';
					$modal = $this->Common_model;
				    $media = $modal->getMediaByID($user->mediaID);
		        if($media)
		        {
		        	$user->img = base_url().$media->localPath;
		        }
		        else
		        {
		        	$user->img = $this->dummyimage();
		        }
					unset($user->upass);
					unset($user->token);
					unset($user->app_type);
					$rdata = array(
						"status" => 1,
						"data" => $user,
						"text" => "Login successfully!"
					);
				}
				else
				{
					$rdata = array(
						"status" => 0,
						"text" => "Invalid credentials"
					);
				}
				echo json_encode($rdata);
		}
		else{
			die("invalid request");
		}
	}
	
	public function artist()
	{
	header('Access-Control-Allow-Origin: *');
	
	    $this->load->model('Common_model');
		$this->Common_model->table = 'artist';
		$modal = $this->Common_model;
		$Where = $_GET;
		$Where['status'] = 0;
		$data= $modal->get($Where);
// 		die('OK');
		$rdata = array();
		
		if($data)
		   { 
		       
		    $ret =  array();
		    foreach($data as $key=>$val)
		    {
		        $sing = array();
		        $sing['id'] = $val['id'];
		        $sing['name'] = $val['name'];
		        $media = $modal->getMediaByID($val['mediaID']);
		        if($media)
		        $sing['img'] = base_url().$media->localPath;
		        $video = $modal->getMediaByID($val['videoID']);
		        if($video)
		        $sing['video'] = base_url().$video->localPath;
		        
		        $ret[] = $sing;
		    }
		    $rdata = array(
						"status" => 1,
						"data" => $ret
					);
					echo json_encode($rdata);
					return 0;
		    }
		    else
			{
				$rdata = array(
					"status" => 0,
					"text" => "No record found!"
				);
				echo json_encode($rdata);
					return 0;
			}
			
			
	
	}
	public function music()
	{
	header('Access-Control-Allow-Origin: *');
	
	    $this->load->model('Common_model');
		$this->Common_model->table = 'music';
		$modal = $this->Common_model;
		$Where = $_GET;
		$Where['status'] = 0;
		$data= $modal->get($Where);
// 		die('OK');
		$rdata = array();
		
		if($data)
		   { 
		       
		    $ret =  array();
		    foreach($data as $key=>$val)
		    {
		        $sing = array();
		        $sing['id'] = $val['id'];
		        $sing['title'] = $val['title'];
		        $media = $modal->getMediaByID($val['mediaID']);
		        if($media)
		        $sing['img'] = base_url().$media->localPath;
		        $video = $modal->getMediaByID($val['audioID']);
		        if($video)
		        $sing['audio'] = base_url().$video->localPath;
		        
		        $cat = array();
		        if($val['artistID'])
		        {
		        $modal->table = 'artist';
                                        $cat =  $modal->getbyid($val['artistID']);
                                        $sing ['artist'] = $cat;
		        }
		        if($val['albumID'])
		        {
		        $modal->table = 'albums';
                                        $cat =  $modal->getbyid($val['albumID']);
                                        $sing ['album'] = $cat;
		        }
		        
		        $ret[] = $sing;
		    }
		    $rdata = array(
						"status" => 1,
						"data" => $ret
					);
					echo json_encode($rdata);
					return 0;
		    }
		    else
			{
				$rdata = array(
					"status" => 0,
					"text" => "No record found!"
				);
				echo json_encode($rdata);
					return 0;
			}
			
			
	
	}
	public function workouts()
	{
		// die("OK");
	header('Access-Control-Allow-Origin: *');
	
	    $this->load->model('Common_model');
		$this->Common_model->table = 'videos';
		$modal = $this->Common_model;
		$Where = $_GET;
		$Where['status'] = 0;
		if(isset($_GET['trainerID']))
		{$sql = 'SELECT * FROM `videos` WHERE FIND_IN_SET('.$_GET['trainerID'].', trainerID) ';
		    $data= $this->db->query($sql)->result_array();
		}
		else
		{
		 $data= $modal->get($Where);   
		}
		$rdata = array();
		
		if(count($data) > 0)
	   { 
		       
		    $ret =  array();
		    foreach($data as $key=>$val)
		    {
		        $sing = array();
		        $sing['id'] = $val['id'];
		        $sing['name'] = $val['title'];
		        $sing['discription'] = $val['discription'];
		        $sing['calories'] = $val['calories'];
		        $sing['equipment'] = $val['equipment'];
		        $media = $modal->getMediaByID($val['mediaID']);
		        if($media)
		        {
		        	$sing['img'] = base_url().$media->localPath;
		        }
		        else
		        {
		        	$sing['img'] = $this->dummyimage();
		        }
		        // $video = $modal->getMediaByID($val['videoID']);
		        if($val['videoID'])
		        {
		        	$url = 'https://player.vimeo.com/video/'.$val['videoID'].'/config';
		        	$content = file_get_contents($url);
		        	$ar = json_decode($content, true);
		        	$vid = '';
		        	if(isset($ar['request']['files']['progressive']))
		        	$video_ar = $ar['request']['files']['progressive'];
		        	foreach ($video_ar as $key => $value) {
		        		if($value['quality'] == '540p')
		        			$vid = $value['url'];
		        	}
		        	$sing['video'] = $vid;
		        }
		        else
		        {
		        	$sing['video'] = '';
		        }
		        //trainers
		        // $trauiners = array();
		        // if($val['trainerID'])
		        // {
			       //  $modal->table = 'trainer';
	         //        $arr = explode(',', $val['trainerID']);
	         //        foreach ($arr as $key => $sing1) 
	         //        {
	         //            $trauiners[] =  $modal->getbyid($sing1);
	         //        }
          //       	$sing['trainers'] = $trauiners;
		        // }
		         $trauiners = array();

	        if($val['trainerID'])
	        {
		        $modal->table = 'trainer';
	            $arr = explode(',', $val['trainerID']);
	            
	            foreach ($arr as $key => $sing1) 
	            {
	                $arradata = $modal->getbyid($sing1);
	                $trauiners[] =  $arradata->name;
	            }
	            
        	}

        	$sing['trainers'] = implode(' , ', $trauiners);
		        $cat = array();
		        if($val['catID'])
		        {
		        	$modal->table = 'genres';
                    $cat =  $modal->getbyid($val['catID']);
                    $sing ['cat'] = $cat;
		        }
		        
		        $ret[] = $sing;
		    }
		    $rdata = array(
				"status" => 1,
				"data" => $ret
			);
			echo json_encode($rdata);
			return 0;
	    }
	    else
		{
			$rdata = array(
				"status" => 0,
				"text" => "No record found!"
			);
			echo json_encode($rdata);
			return 0;
		}
	}
	public function albums()
	{
	header('Access-Control-Allow-Origin: *');
	
	    $this->load->model('Common_model');
		$this->Common_model->table = 'albums';
		$modal = $this->Common_model;
		
		$data= $modal->get(array('status'=> 0));
// 		die('OK');
		$rdata = array();
		
		if($data)
		   { 
		       
		    $ret =  array();
		    foreach($data as $key=>$val)
		    {
		        $sing = array();
		        $sing['id'] = $val['id'];
		        $sing['name'] = $val['name'];
		        $media = $modal->getMediaByID($val['mediaID']);
		        if($media)
		        $sing['img'] = base_url().$media->localPath;
		        $ret[] = $sing;
		    }
		    $rdata = array(
						"status" => 1,
						"data" => $ret
					);
					echo json_encode($rdata);
					return 0;
		    }
		    else
			{
				$rdata = array(
					"status" => 0,
					"text" => "No record found!"
				);
				echo json_encode($rdata);
					return 0;
			}
			
			
	
	}
	public function trainers()
	{
	header('Access-Control-Allow-Origin: *');
	
	    $this->load->model('Common_model');
		$this->Common_model->table = 'trainer';
		$modal = $this->Common_model;
		
		$data= $modal->get(array('status'=> 0));
// 		die('OK');
		$rdata = array();
		
		if($data)
		   { 
		       
		    $ret =  array();
		    foreach($data as $key=>$val)
		    {
		        $sing = array();
		        $sing['id'] = $val['id'];
		        $sing['name'] = $val['name'];
		        $media = $modal->getMediaByID($val['mediaID']);
		        $media = $modal->getMediaByID($val['mediaID']);
		        if($media)
		        {
		        	$sing['img'] = base_url().$media->localPath;
		        }
		        else
		        {
		        	$sing['img'] = $this->dummyimage();
		        }
		        $ret[] = $sing;
		    }
		    $rdata = array(
						"status" => 1,
						"data" => $ret
					);
					echo json_encode($rdata);
					return 0;
		    }
		    else
			{
				$rdata = array(
					"status" => 0,
					"text" => "No record found!"
				);
				echo json_encode($rdata);
					return 0;
			}
			
			
	
	}
	public function workout_categories()
	{
	header('Access-Control-Allow-Origin: *');
	
	    $this->load->model('Common_model');
		$this->Common_model->table = 'genres';
		$modal = $this->Common_model;
		
		$data= $modal->get(array('status'=> 0));
// 		die('OK');
		$rdata = array();
		
		if($data)
		   { 
		       
		    $ret =  array();
		    foreach($data as $key=>$val)
		    {
		        $sing = array();
		        $sing['id'] = $val['id'];
		        $sing['name'] = $val['name'];
		        $media = $modal->getMediaByID($val['mediaID']);
		        if($media)
		        {
		        	$sing['img'] = base_url().$media->localPath;
		        }
		        else
		        {
		        	$sing['img'] = $this->dummyimage();
		        }
		        $ret[] = $sing;
		    }
		    $rdata = array(
						"status" => 1,
						"data" => $ret
					);
					echo json_encode($rdata);
					return 0;
		    }
		    else
			{
				$rdata = array(
					"status" => 0,
					"text" => "No record found!"
				);
				echo json_encode($rdata);
					return 0;
			}
			
			
	
	}

	public function homepage()
	{
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Common_model');
		$this->Common_model->table = 'genres';
		$modal = $this->Common_model;
		$data_cate = $modal->get(array('status'=> 0),6);

		$total_cate = array();
		foreach($data_cate as $key=>$val)
	    {
	        $sing = array();
	        $sing['id'] = $val['id'];
	        $sing['name'] = $val['name'];
	        $media = $modal->getMediaByID($val['mediaID']);
	        if($media)
	        {
	        	$sing['img'] = base_url().$media->localPath;		
	        }
	        else
	        {
	        	$sing['img'] = $this->dummyimage();
	        }
	        $total_cate[] = $sing;
	    }


		$this->Common_model->table = 'trainer';
		$modal = $this->Common_model;
		$data_trrainer = $modal->get(array('status'=> 0));

		$total_trainer = array();
		foreach($data_trrainer as $key=>$val)
	    {
	        $sing = array();
	        $sing['id'] = $val['id'];
	        $sing['name'] = $val['name'];
	        $media = $modal->getMediaByID($val['mediaID']);
	        if($media)
	        {
	        	$sing['img'] = base_url().$media->localPath;		
	        }
	        else
	        {
	        	$sing['img'] = $this->dummyimage();
	        }
	        $total_trainer[] = $sing;
	    }

		$this->Common_model->table = 'videos';
		$modal = $this->Common_model;
		$data_videos = $modal->get(array('status'=> 0),4);
		$total_workout = array();
		foreach($data_videos as $key=>$val)
	    {
	        $sing = array();
	        $sing['id'] = $val['id'];
	        $sing['name'] = $val['title'];
	        $sing['disc'] = $val['discription'];
	        $sing['calories'] = $val['calories'];
	        $sing['equipment'] = $val['equipment'];
	        $media = $modal->getMediaByID($val['mediaID']);

	        if($media)
	        {
	        	$sing['img'] = base_url().$media->localPath;		
	        }
	        else
	        {
	        	$sing['img'] = $this->dummyimage();
	        }

	        $trauiners = array();

	        if($val['trainerID'])
	        {
		        $modal->table = 'trainer';
	            $arr = explode(',', $val['trainerID']);
	            
	            foreach ($arr as $key => $sing1) 
	            {
	                $arradata = $modal->getbyid($sing1);
	                $trauiners[] =  $arradata->name;
	            }
	            
        	}

        	$sing['trainers'] = implode(' , ', $trauiners);

	       if($val['videoID'])
		        {
		        	$url = 'https://player.vimeo.com/video/'.$val['videoID'].'/config';
		        	$content = file_get_contents($url);
		        	$ar = json_decode($content, true);
		        	$vid = '';
		        	if(isset($ar['request']['files']['progressive']))
		        	$video_ar = $ar['request']['files']['progressive'];
		        	foreach ($video_ar as $key => $value) {
		        		if($value['quality'] == '540p')
		        			$vid = $value['url'];
		        	}
		        	$sing['video'] = $vid;
		        }

	        $total_workout[] = $sing;
	    }

	    $return = array(
	    	'category'=>$total_cate,
	    	'trainer'=>$total_trainer,
	    	'workout'=>$total_workout
	    );
	    $rdata = array(
			"status" => 1,
			"data" => $return
		);
		echo json_encode($rdata);
		return 0;
	}

	public function dummyimage()
	{
		return 'https://dummyimage.com/600x400/000/fff';
	}

	public function index()
	{
		$assets = base_url('assets/admin');
		
		$data['assets'] = $assets;
		$this->load->view('main', $data);
	}
	public function addroute()
	{
		$assets = base_url('assets/admin');
		
		$data['assets'] = $assets;
		$data['page'] = "addroute";
		
		$this->load->view('main', $data);
	}
	public function addcity()
	{
		if($_POST)
		{
			$this->db->insert('cities',$_POST);
		}
		$assets = base_url('assets/admin');
		
		$data['assets'] = $assets;
		$data['page'] = "addcity";
		
		$this->load->view('main', $data);
	}
	public function dashboard()
	{
		$assets = base_url('assets/admin');
		$clients= $this->db->get('clients')->result_array();
		
		$data['clients'] = count($clients);
		$data['assets'] = $assets;
		$data['page'] = "dashboard";
		
		$this->load->view('main', $data);
	}
	public function login()
	{
		$assets = base_url('assets/admin');
		
		$data['assets'] = $assets;
		$this->load->view('login', $data);
	}

	public function single()
	{
		header('Access-Control-Allow-Origin: *');
		$return  =  array(
			'img'=>'https://i.stack.imgur.com/ddX9U.png"/',
			'rname'=>'Lahore to Khushab',
			'disc'=>'The most popular industrial group ever, and largely
      responsible for bringing the music to a mass audience.',
			'driver'=>'azeem ali',
			'distance'=>'102KM',
			'time'=>'11am - 3am'
		);
		$new = array(
			'data'=>$return,
			'status' => 1
		);
		echo json_encode($new);
	}
}
