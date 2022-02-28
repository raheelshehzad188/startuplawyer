<?php
class Product_model extends CI_Model {

        public function searchAuthor($txt)
        {
                $this->db->like('name', $txt);
                $this->db->where('status', 0);
                return $this->db->get('author')->result_array();
        }
        public function bulk_insert($arrayData)
        {
            return $this->db->insert_batch($this->table, $arrayData); 
        }
        public function gen_new($mediaID)
    {
         $row= $this->db->where('mediaID', $mediaID)->get('media')->row();
        if($row && empty($row->resizer_path))
        {
                $content = file_get_contents('https://api.imageresizer.io/v1/images?key=79c401225a58a69ea28d96f5bdd512e98016ccb9&url='.$row->url);
            $ar = json_decode($content, true);
            $thumb =  $url;
            if($ar['success'])
            {
                $resizer = 'https://im.ages.io/'.$ar['response']['id'];
                $rest  = \Cloudinary\Uploader::upload($resizer, array());
                $nrl = $rest['url'];
                $up = array(
                    "public_id"=> $rest['public_id'],
                    "url"=> $rest['url'],
                    "resizer_path"=>$resizer
                    );
                    if($this->db->where('mediaID', $mediaID)->update('media',$up))
                    {
                        return true;
                    }
            }
                
        }
            
    }
    public function get_option($key , $def = '')
    {
        $row = $this->db->where('option_name', $key)->get('wp_options')->row();
        if($row)
        {
            return $row->option_value;
        }
        else
        {
            $in = array(
                'option_name'=> $key,
                'option_value'=> $def,
                );
                $this->db->insert('wp_options',$in);
                return $def;
        }
        
    }
        public function output_add_to_cart_custom_fields($pid) {
    $product_id = $pid;
    $product = $this->getproduct($pid);
    $cats = $product->catID;

    $bcat = get_option( 'booking_ca_id','1' );

    $wcat = get_option( 'webinaar_cat_id','4' );

    $terms = array();
    $terms[] = $cats;
    // var_dump($terms);
    if($product->type == 1)
    {
        $attr = $this->db->where('pid',$product_id)->get('product_to_attributes')->result();
        ?>
        <form id="variation_data">
        <input type="hidden" value="<?= $product->dead_line; ?>" id="dead_line"/>
        <input type="hidden" value="0" name="variation_id" id="variation_id"/>
        <?php
        foreach($attr as $k=> $v)
        {
            $attr_v = $this->db->where('aid',$v->id)->get('attribute_to_value')->result();
            //get values
            
            ?>
            <div class="attr_group">
                <label><?= $v->name ?>:</label>
                <select  onchange="variation_chng('<?= $product_id; ?>')" class="attributes" name="<?= $v->name ?>" class="form-control" style="width: 100%;height: 40px !important;margin-bottom:5px;">
                    <option value="">Select <?= $v->name ?></option>
                    <?php
                    
                                        foreach($attr_v as $k1 => $v1)
                                        {
                                        ?>
                                        <option value="<?= $v1->id; ?>"><?= $v1->name; ?></option>
                                        <?php
                                        }
                                        ?>
                </select>
            </form>
            <?php
        }
        ?>
        </div>
        <?php
    }
    
    

    // if(in_array($bcat, $terms))
    if(in_array($bcat, $terms))
    {
        
        
        $slot = isset($_REQUEST['bslotn'])?$_REQUEST['bslotn']:0;
        if($slot)
        {
            $row = $this->db->where('id',$slot)->get('bslots')->result();
            if($row)
            {
                $slot = $row = $row[0];
                $sdate = $row->date;
            }
        }
        else
        {
            $sdate = date('Y-m-d');
        }
        

        ?>

            <input type="hidden" id="datepicker_field_new" value="<?= (isset($sdate)?$sdate:'') ?>">
            <input type="hidden" id="datepicker_field" value="10/10/2021">

            <div id="DatePicker"></div>

            <input type="hidden" name="bslot" value="<?= (isset($slot->id)?$slot->id:0) ?>">

            <input type="hidden" name="product_id" value="<?= $product_id; ?>">
            <select class="location" name="location" style="width:100%; height: 40px !important;">
                <option value="0">Select Location</option>
                <?php
                
                $locations = $this->db->where('pid',$product_id)->get('product_to_locations')->result();
                foreach($locations as $k=> $v)
                {
                    $post = $post = $this->getpost($v->tid);
                    ?>
                    <option value="<?= $v->tid; ?>"><?= ($post->post_title)?$post->post_title:"Deleted item"; ?></option>
                    <?php
                }
                ?>
                
            </select>

            <div class="dropdown time" style="display:block;">

            <a href="#" data-toggle="dropdown">Slot <span id="selected_time1"><?= ($slot)?$slot->name:""; ?></span></a>

            <div class="dropdown-menu" id="drop_show">

            <div class="dropdown-menu-content" >





            <div class="radio_select add_bottom_15">

            <ul>

            <?php

            // $slots = get_slots($product_id, $sdate);
            $slots = array();

            foreach ($slots as $key => $value) {

             ?>

            <li onclick="select_slot('<?= $value['id']; ?>');">

            <input type="radio" slot="<?= $value['id']; ?>" id="time_<?= $value['id']; ?>" class="bslot_cls"  name="btime" value="<?= $value['value']; ?>" <?= ($value['id'] == $slot)?"checked":"No"; ?>>

            <label for="time_<?= $value['id']; ?>"><?= $value['value']; ?></label>

            </li>

             <?php   

            }

            ?>

            

            </ul>

            </div>

            <!-- /time_select -->

            <!-- <h4>Dinner</h4>

            <div class="radio_select">

            <ul>

            <li>

            <input type="radio" id="time_5" name="time" value="08.00pm">

            <label for="time_1">20.00<em>-40%</em></label>

            </li>

            <li>

            <input type="radio" id="time_6" name="time" value="08.30pm">

            <label for="time_2">20.30<em>-40%</em></label>

            </li>

            <li>

            <input type="radio" id="time_7" name="time" value="09.00pm">

            <label for="time_3">21.00<em>-40%</em></label>

            </li>

            <li>

            <input type="radio" id="time_8" name="time" value="09.30pm">

            <label for="time_4">21.30<em>-40%</em></label>

            </li>

            </ul>

            </div> -->

            <!-- /time_select -->



            </div>



            </div>



            </div>

        <?php

    }
    elseif(in_array($wcat, $terms))
    {



        $posts_array = $this->db->where('pid',$product_id)->get('wslots')->result();

        ?>
        <label >Date and time:</label>
        <select name="wslot" style="width:100%; height: 40px !important;">

            <?php

            foreach($posts_array as $post)

            {

                ?>

                <option value="<?= $post->id?>"><?= $post->name;?></option>

                <?php

            }

            //post_title

            ?>

        </select>

        <?php

    }
    elseif(in_array(3, $terms))
    {
        // echo "I m here";
        $pros = $this->db->where('pid',$product_id)->get('product_to_packages')->result_array();
        // var_dump($pros);
        // $pros = $this->getmeta('post',$product_id,'products',true);
        //  $pros = unserialize($pros);
        ?>
        <div class="pack_products">
            <ul>
                <?php
                foreach($pros as $k=>$v)
                { 
                    if($v)
                    {
                        $this->load->view('startup/parts/pack_li.php',array('pid'=>$v['tid'],'product'=>$this));
                    }
                }
                ?>
            </ul>
        </div>
        <?php
    }

    else

    {

    }
    if(!in_array($bcat, $terms) && !in_array($wcat, $terms))
    {
    ?>
    <div class="sp_instr">
    <label>Special Instructions:</label>
    <textarea name="cmt" class="form-control"></textarea>
    </div>
    <?php
    }
    if(true)
    {
        $locations = $this->db->where('pid',$product_id)->get('product_to_locations')->result();
        if($locations)
        {
            
            ?>
                             <label style="margin-top:7px;">Select Location:</label>

            <select class="location" name="location" style="width:100%; height: 40px !important;">
                    <?php
                    
                    $locations = $this->db->where('pid',$product_id)->get('product_to_locations')->result();
                    
                    foreach($locations as $k=> $v)
                    {
                        $post = $post = $this->getpost($v->tid);
                        ?>
                        <option value="<?= $v->tid; ?>"><?= ($post->post_title)?$post->post_title:"Deleted item"; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
            <?php
        }
    }
    if(true)
    {
        $lang = $this->db->where('pid',$product_id)->get('product_to_languages')->result(); 
        if($lang)
        {
            ?>
               <label style="margin-top:7px;">Select Language:</label>
            <select class="location" name="location" style="width:100%; height: 40px !important;">
                    <?php
                    
                    $locations = $this->db->where('pid',$product_id)->get('product_to_languages')->result();
                    foreach($locations as $k=> $v)
                    {
                        $post = $post = $this->getpost($v->tid);
                        ?>
                        <option value="<?= $v->tid; ?>"><?= ($post->post_title)?$post->post_title:"Deleted item"; ?></option>
                        <?php
                    }
                    ?>
                    
                </select>
            <?php
        }
    }
    

}


        public function getimg($id)
        {
            $row = $this->db->where('mediaID',$id)->get('media')->row();
            if($row)
            {
                $url = base_url('/uploads/').$row->localPath;
                return $url;
            }
            return base_url('/default .jpg');
        }
        public static function is_serial($string) {
    return (@unserialize($string) !== false);
}

        public function gettermbyname($n)
        {
            $row = $this->db->where('name',$n)->get('wp_terms')->row();
            if($row)
            {
                return $row->term_id;
            }
            return 0;
        }
        public function get_term($id)
{ 
    $pID =new stdClass;
$table = 'wp_terms';
$sql = "
    SELECT * 
    FROM  $table
        WHERE `term_id` = '".$id."'
";
$result = $this->db->query($sql)->result();
if(isset($result[0]))
{
    $pID = $result[0];
}
if(isset($pID) && isset($pID->term_id))
{
    $table = 'wp_term_taxonomy';
$sql = "
    SELECT * 
    FROM  $table
        WHERE `term_id` = '".$pID->term_id."'
";
$result = $this->db->query($sql)->result();
 if(isset($result[0]->parent))
{
    $pID->parent = $result[0]->parent;
    $pID->taxonomy = $result[0]->taxonomy;
    $pID->description = $result[0]->description;
}
}
//image logic wp_user_avatar
                    $imgID = $this->getmeta('term',$id,'thumbnail_id',true);
                    $pID->img = $img = $this->getimg($imgID);
return $pID;
}
//for login redirection
public function get_user_rate($user_id)
{
    return array();
}
//Productt rate
function get_product_rate($pro_id)
{
    global $wpdb;
    $result = $wpdb->get_results ( "
    SELECT * 
    FROM  `wp_woocommerce_order_items`" );
	$payments = array();
		foreach ($result as $key => $value) {
		    $value = (array)$value;
			$order_item_id = $value['order_item_id'];
    		$pid = wc_get_order_item_meta( $order_item_id, '_product_id', true );
    		if($pro_id == $pid)
    		{
    			$payments[] = array(
    				'order_id'=> $value['order_id'],
    				'pid'=> $pid
    			);
    		}
		}
// 		print_r($payments);
$rate = array();
		foreach($payments as $V)
		{
		    $order_id = $V['order_id'];
		    $args = array(
              'numberposts' => -1,
              'post_type'   => 'rating'
            );
             
            $latest_books = get_posts( $args );
            // print_r($payments);
            foreach($latest_books as $rv)
            {
                $rid = $rv->ID;
                if(get_post_meta($rid,'order',true) == $order_id)
                {
                    $rate[] = $rid;
                }
                
            }
		}
            return $rate;
}
public function get_slots($pid, $vdate)

{

    $slots = array();

     



 $posts = $this->db->where('pid',$pid)->where('date', $vdate)->get('bslots')->result();



if (is_array($posts) && count($posts) > 0) {

    // Delete all the Children of the Parent Page

    foreach($posts as $post){

        if($vdate == $post->date)

        {

            $slots[] = array(

                "id" => $post->id,

                "value" => $post->name,

                "date" => $post->date,
                "block" => $post->status

                );

        }



    }



}

    

    return $this->bubble_sort($slots);

}

public function bubble_sort($arr) {

    $size = count($arr)-1;

    for ($i=0; $i<$size; $i++) {

        for ($j=0; $j<$size-$i; $j++) {

            $k = $j+1;

            if ($arr[$k]['id'] < $arr[$j]['id']) {

                // Swap elements at indices: $j, $k

                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);

            }

        }

    }

    return $arr;

}



        public function getuser($mediaID)
        {
            
            $row= $this->db->where('ID', $mediaID)->get('wp_users')->row();
            if($row)
            {
                $permission = $this->getmeta('user',$mediaID,'permission',true);
                if($permission)
                {
                    $permission = unserialize($permission);
                    $row->permission = $permission;
                }
                $role = $this->getmeta('user',$mediaID,'wp_capabilities',true);
                if($role)
                {
                    $role = unserialize($role);
                    $r = array();
                    foreach($role as $k=> $v)
                    {
                       $r[] = $k;
                    }
                    $row->roles = $r;
                }
                //image logic wp_user_avatar
                    $imgID = $this->getmeta('user',$mediaID,'wp_user_avatar',true);
                    $banner = $this->getmeta('user',$mediaID,'banner',true);
                    $district = $this->getmeta('user',$mediaID,'district',true);
                    $post = $this->getpost($district);
                    if($post)
                    {
                        $row->distric = $post->post_title;
                    }
                    //languages
                    $lang = $this->getmeta('user',$mediaID,'lang',true);
                    $ln = array();
                    $lang = explode(',',$lang);
                    foreach($lang as $k=> $v)
                    {
                    $post = $this->getpost($v);
                    if($post)
                    {
                        $ln[] = $post->post_title;
                    }
                    }
                    $row->lang = $ln;
                    //type
                    $type = $this->getmeta('user',$mediaID,'type',true);
                    $row->first_free_cons = $this->getmeta('user',$mediaID,'first_free_cons',true);
                    $row->refund = $this->getmeta('user',$mediaID,'refund',true);
                    $ty = array();
                    $type = explode(',',$type);
                    foreach($type as $k=> $v)
                    {
                    $post = $this->getpost($v);
                    if($post)
                    {
                        $ty[] = $post->post_title;
                    }
                    }
                    $row->type = $ty;
                    //area
                    $area = $this->getmeta('user',$mediaID,'area',true);
                    $ar = array();
                    $area = explode(',',$area);
                    foreach($area as $k=> $v)
                    {
                    $post = $this->getpost($v);
                    if($post)
                    {
                        $ar[] = $post->post_title;
                    }
                    }
                    $row->area = $ar;
                    $row->full_name = $this->getmeta('user',$mediaID,'first_name',true).' '.$this->getmeta('user',$mediaID,'last_name',true);
                    $row->bio = $this->getmeta('user',$mediaID,'description',true);
                    $row->intro_video = $this->getmeta('user',$mediaID,'intro_video',true);
                    $row->whaatsapp = $this->getmeta('user',$mediaID,'whaatsapp',true);
                    $row->billing_phone = $this->getmeta('user',$mediaID,'billing_phone',true);
                    $row->billing_email = $this->getmeta('user',$mediaID,'billing_email',true);
                    $row->district = $this->getmeta('user',$mediaID,'district',true);
                    
                    $row->img = $img = $this->getimg($imgID);
                    $row->banner = $img = $this->getimg($banner);
                    $row->rate = 5;
                    $row->rate_msg = 'Last rate message';
                    $row->rate_count = 1;
    
                    return $row;
            }   
            return false;
        }
        public function addterm($data,$tax = 'product_cat')
        {
            $cid = 0;
            if(isset($data['name']))
            {
                $up = array('name'=> $data['name']);
                $this->db->insert('wp_terms',$up);
                $cid =  $this->db->insert_id();
            }
            if(isset($data['parent']) && $cid)
            {
                $up = array('parent'=> $data['parent'],'term_id'=>$cid,'taxonomy'=>$tax);
                $this->db->insert('wp_term_taxonomy',$up);
            }
            return $cid;
        }
        public function updateterm($term,$data)
        {
            if(isset($data['name']))
            {
                $up = array('name'=> $data['name']);
                $this->db->where('term_id',$term)->update('wp_terms',$up);
            }
            if(isset($data['parent']))
            {
                $up = array('parent'=> $data['parent']);
                $this->db->where('term_id',$term)->update('wp_term_taxonomy',$up);
            }
        }
        public function setProductterms($pid,$tex ,$type)
        {
            $pterms = $this->getProductCats($pid);
            foreach($pterms as $k=> $v)
            {
                if($v->taxonomy == $tex)
                {
                    $r = $this->db->where('object_id',$pid)->where('term_taxonomy_id',$v->term_id)->delete('wp_term_relationships');
                }
            }
            if(!is_array($type))
            {
                $type = array($type);
            }
            foreach($type as $k=> $v)
            {
                $in = array(
                    'object_id'=>$pid,
                    'term_taxonomy_id'=>$v
                    );
                    $this->db->insert('wp_term_relationships',$in);
            }
        }
        public function dashboard_url($uid)
{
    $url = '';
    if($uid)
    {
        $user = $this->getuser($uid );
    
                if(in_array('service_provider',$user->roles)|| in_array('draft_provider',$user->roles))
                	    {
                	        
                	    $url = base_url('provider/admin');
                	    
                	    }
                	    elseif(in_array('customer',$user->roles))
                	    {
                	        
                	    $url = base_url('my-account');
                	    
                	    }
                	    else
                	    {
                	    $url = base_url('admin/admin');
                	    }
    }
    else
    {
        $url = base_url('login');
    }
    return $url;
}

        public function setextra($pid,$table,$data)
        {
            $this->db->where('pid',$pid)->delete($table);
            foreach($data as $k=> $v)
            {
                $sing = array(
                    'pid'=> $pid,
                    'tid'=> $v,
                    );
                $r = $this->db->insert($table, $sing);
            }
        }
        public function getcat($mediaID)
        {
            
            $row= $this->db->where('id', $mediaID)->get('category')->row();
            if($row)
            {
                
                $imgID = $row->img;
                $row->img = $img = $this->getimg($imgID);
    
                    return $row;
            }   
            return false;
        }
        public function getproduct($mediaID)
        {
            
            $row= $this->db->where('id', $mediaID)->get('products')->row();
            if($row)
            {
                
                $imgID = $row->img;
                $row->img = $img = $this->getimg($imgID);
                $row->url = base_url('index/product/').$row->slug;
                $row->rate = 3;
                $row->rate_count = 10;
    
                    return $row;
            }   
            return false;
        }

        public function getpost($mediaID)
        {
            
            $row= $this->db->where('ID', $mediaID)->get('wp_posts')->row();
            if($row)
            {
                
                $category = $this->getProductCats($mediaID);
                $imgID = $this->getmeta('post',$mediaID,'_thumbnail_id',true);
                $row->price = $this->getmeta('post',$mediaID,'_price',true);
                $row->img = $img = $this->getimg($imgID);
                $type = '';
                $type_id = '';
                $cats = array();
                foreach($category as $k=> $v)
                {
                    if($v->taxonomy == 'product_type')
                    {
                       $type = $v->name; 
                       $type_id = $v->term_id; 
                    }
                    elseif($v->taxonomy == 'product_cat')
                    {
                       $cats[] = $v; 
                    }
                }
                $row->url = base_url('index/product/').$row->post_name;
                $row->type = $type;
                $row->type_id = $type_id;
                $row->category = $cats;
    
                    return $row;
            }   
            return false;
        }
        public function getmeta($type,$id,$key,$single)
        {
            $table = 'wp_'.$type.'meta';
            if($type == 'woocommerce_order_item')
            {
                $type = 'order_item';
            }
            $col = $type.'_id';
            
            
            if($single)
        {
         $row= $this->db->where($col, $id)->where('meta_key',$key)->get($table)->row();
        if($row)
        {
                      
                return $row->meta_value;
        }
        return 0;
        }   
        }
        public function termbytex($tex)
        {
            $all = $this->db->where('taxonomy',$tex)->get('wp_term_taxonomy')->result_array();
            $terms = array();
            foreach($all as $k=> $v)
            {
                $terms[] = $this->get_term($v['term_id']);
            }
            return $terms;
        }
        public function updatemeta($type,$id,$key,$value)
        {
            $table = 'wp_'.$type.'meta';
            if($type == 'woocommerce_order_item')
            {
                $type = 'order_item';
            }
            if(is_array($value))
            $value = serialize($value);
            $col = $type.'_id';
            $up = array(
                'meta_value' => $value,
                'meta_key' => $key
                );
            
            $row= $this->db->where($col, $id)->where('meta_key',$key)->get($table)->row();
        if($row)
        {
            //update
            return $this->db->where($col, $id)->where('meta_key',$key)->update($table,$up);
            
        
        }
        else
        {
            $up[$col] = $id;
            $this->db->insert($table,$up);
            return $this->db->insert_id();
        }
        
        }
        public function getProductsByCat($cid)
        {
         $row= $this->db->where('catID', $cid)->get('products')->result_array();
        if($row)
        {
            $pro = array();
            foreach($row as $k=> $v)
            {
                $sing = $this->getproduct($v['id']);
                if($sing)
                {
                   $pro[] =  $sing;
                }
            }
                
                return $pro;
        }  
        return array();
        }
        public function getProductCats($cid)
        {
         $row= $this->db->where('object_id', $cid)->get('wp_term_relationships')->result_array();
        if($row)
        {
            $pro = array();
            foreach($row as $k=> $v)
            {
                $sing = $this->get_term($v['term_taxonomy_id']);
                if($sing)
                {
                   $pro[] =  $sing;
                }
            }
                
                return $pro;
        }  
        return array();
        }
        public function getcheckBookIsBorrow($bookID)
        {
           return $this->db->where('bookID',$bookID)->where('status','accept')->get('book_barrow')->row();   
        }
        public function getcheckBookIsRequested($bookID,$userid=0)
        {
           if($userid==0)
           return false; 
           return $this->db->where('bookID',$bookID)->where('to',$userid)->where('status','onrequest')->get('book_barrow')->row();   
        }
        
        public function delGenreByBookID($bookID)
        {
            return $this->db->where('book_id',$bookID)->delete('book_to_genre');
        }
        public function delLangByBookID($bookID)
        {
            return $this->db->where('book_id',$bookID)->delete('book_to_lang');
        }
        public function delTagByBookID($bookID)
        {
            return $this->db->where('book_id',$bookID)->delete('book_to_tag');
        }
        public function getTagsByBookID($bookID)
        {
         $row= $this->db->select('tags.tagID,tags.name as name')->where('book_id', $bookID)->join('tags','book_to_tag.tag_id = tags.tagID')->get('book_to_tag')->result_array();
        if($row)
        {

                return $row;
        }   
        }   
        public function getLangByBookID($bookID)
        {
         $row= $this->db->select('list.id,list.value as name')->where('book_id', $bookID)->join('list','book_to_lang.list_id = list.id')->get('book_to_lang')->result_array();
        if($row)
        {

                return $row;
        }   
        }
        public function getAuthorID($data)
        {
                $row= $this->db->where('name', $data['name'])->get('author')->row();
                if($row)
                {

                        return $row->authorID;
                }
                else
                {

                        if($this->db->insert('author', $data))
                        {
                                // die("add".$this->db->insert_id());
                         return $this->db->insert_id();       
                        }
                        else
                        {
                            DIE("hERE");
                                return 0;
                        }
                        
                }
        }
        public function getGenricID($data)
        {
                $row= $this->db->where('name', $data['name'])->where('userID',$data['userID'])->get('genres')->row();
                if($row)
                {

                        return $row->genreID;
                }
                else
                {

                        if($this->db->insert('genres', $data))
                        {
                                // die("add".$this->db->insert_id());
                         return $this->db->insert_id();       
                        }
                        else
                        {
                            DIE("hERE");
                                return 0;
                        }
                        
                }
        }
        public function getTagID($data)
        {
                $row= $this->db->where('name', $data['name'])->get('tags')->row();
                if($row)
                {

                        return $row->authorID;
                }
                else
                {

                        if($this->db->insert('tags', $data))
                        {
                                // die("add".$this->db->insert_id());
                         return $this->db->insert_id();       
                        }
                        else
                        {
                                $error = $this->db->last_query();
                                print_r($error);
                                die();
                        }
                        
                }
        }
        public function getHomeProducts($limit,$startindex)
        {
            
            if($startindex > 1){
            $startindex = ($startindex-1) * $limit;
            }
                
                $this->db->select('books.*');
                $this->db->from('books');
                $this->db->limit($limit, $startindex);
                $this->db->order_by('bookID', 'desc');
                $this->db->where('status', 0);


            return $this->db->get()->result_array();
        }
        public function get_available_book_total($limit_per_page= 0,$startindex=0, $key=null)
        {
             if($startindex > 1){
            $startindex = ($startindex-1) * $limit_per_page;
            }
            $notAvailabllebooks=$this->db->where('status','accept')->get('book_barrow')->result_array();
            $bookes=[];
            if(count($notAvailabllebooks)>0){
                foreach ($notAvailabllebooks as $value) {
                    $bookes[]=$value['bookID'];
                }
            }
            $author=$this->db->like('name',$key)->where('status',0)->get('author')->result_array();
            $authors=[];
            if(!empty($author))
            {
                foreach ($author as  $value) {
                    $authors[]=$value['authorID'];
                }
            }
            $this->db->select('books.*');
            $this->db->from('books');
            $this->db->where('books.status',0);
            if(!empty($bookes) && count($bookes)>0)
            {    
            $this->db->where_not_in('books.bookID',$bookes);
            }
            if(!empty($authors) && count($authors)>0)
            {    
            $this->db->where_in('books.authorID',$authors);
            }
            else
            {
                   
                    $this->db->like('books.title',$key);
                    $this->db->or_where('books.isbnNO',$key);
                
            }
            if($limit_per_page!=0)
            $this->db->limit($limit_per_page,$start_index);
            $this->db->order_by('books.bookID', 'desc');
            return $this->db->get()->result_array();    
        }
        public function get_total()
        {
             return count($this->db->where('status', 0)->get('books')->result_array());
        }
        public function get($data)
        {
                if(!$data)
                {
                        return $this->db->get('books')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('books')->result_array();
                }
        }
        public function getGenere($data = array())
        {
                if(!$data)
                {
                        return $this->db->get('genres')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('genres')->result_array();
                }
        }

        public function addMedia($ar)
        {
            
            $this->db->insert('media', $ar);
            return $this->db->insert_id();

        }
        public function addBookGenre($book_id, $genre_id)
        {
            $ar = array(
                "id"=> '',
                "book_id"=> $book_id,
                "genre_id"=> $genre_id
            );
            $this->db->insert('book_to_genre', $ar);

            return $this->db->insert_id();

        }
        public function addBookLang($book_id, $list_id)
        {
            $ar = array(
                "id"=> '',
                "book_id"=> $book_id,
                "list_id"=> $list_id
            );
            $this->db->insert('book_to_lang', $ar);
            return $this->db->insert_id();

        }
        public function addBookTag($book_id, $tag_id)
        {
            $ar = array(
                "id"=> '',
                "book_id"=> $book_id,
                "tag_id"=> $tag_id
            );
            $this->db->insert('book_to_tag', $ar);
            return $this->db->insert_id();

        }
        public function getTag($data = array())
        {
                if(!$data)
                {
                        return $this->db->get('tags')->result_array();
                }
                else
                {
                        return $this->db->where($data)->get('tags')->result_array();
                }
        }
        public function getList($data = array())
        {
            if(!$data)
            {
                    return $this->db->get('list')->result_array();
            }
            else
            {
                    return $this->db->where($data)->get('list')->result_array();
            }
        }
        public function update($bookID, $data)
        {
                return $this->db->where('bookID', $bookID)->update($this->table, $data);
        }
        public function delete($tagID)
        {
                return $this->db->where('tagID', $tagID)->delete();
        }
        public function add($data)
        {
                if($this->db->insert($this->table,$data))
                {
                    return $this->db->insert_id();
                }

        }
         public function getBookByGroupCount($groupid)
        {
            return count($this->db->where('status',1)->where('groupID',$groupid)->get('books')->result_array());
        }
        public function login($uname, $upass)
        {
                $upass = md5($upass);
                $sql = "select * from `users` WHERE email = '$uname'  OR `uname` = '$uname' AND `upass` = '$upass'";
 
                $query = $this->db->query($sql);
                return $query->row();
        }
        public function updateuserbyid($userID, $data)
        {
                return $this->db->where('UserID',$userID)->update('users',$data);

        }
        public function getrolebyid($roleID)
        {
                $this->db->where('roleID',$roleID);
 
                $query = $this->db->get('roles');
                return $query->row();
        }

        public function insert_entry()
        {
                $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->insert('entries', $this);
        }
        public function fine_search_book($key,$limit_per_page=0, $start_index=0)
        {
            if($startindex > 1){
            $startindex = ($startindex-1) * $limit_per_page;
            }
            $author=$this->db->like('name',$key)->where('status',0)->get('author')->result_array();
            $authors=[];
            if(!empty($author))
            {
                foreach ($author as $value) {
                    $authors[]=$value['authorID'];
                }
            }
            $this->db->select('books.*');
            $this->db->from('books');
            $this->db->join('author','author.authorID = books.authorID');
            $this->db->join('media','media.mediaID = books.coverImg');
            $this->db->where('books.status',0);
            if(!empty($authors) && count($authors)>0)
            {    
            $this->db->where_in('books.authorID',$authors);
            }
            else
            {
            $this->db->like('books.title',$key);
            $this->db->or_where('books.isbnNO',$key);
            }
            if($limit_per_page!=0)
            $this->db->limit($limit_per_page,$start_index);
            $this->db->order_by('bookID', 'desc');
            return $this->db->get()->result_array();    
        }
        public function bookinfo($bookid)
        {
            $this->db->select('books.*,author.name AS name,media.url AS url,users.first_name AS first_name,users.last_name AS last_name,users.email AS email');
            $this->db->from('books');
            $this->db->where('books.bookID',$bookid);
            $this->db->where('books.status',0);
            $this->db->join('author','author.authorID = books.authorID');
            $this->db->join('media','media.mediaID = books.coverImg');
            $this->db->join('users','users.UserID = books.uid');
            return $this->db->get()->row();

        }
        public function bookingForBarrow($data)
        {
           $this->db->insert('book_barrow', $data);
           return $this->db->insert_id();
        }
        public function getBorrow($userid)
        {
            $this->db->select('books.*,book_barrow.barrowID , book_barrow.created_at AS date,book_barrow.from,users.first_name AS first_name,users.last_name AS last_name,users.email AS email');
            $this->db->from('book_barrow');
            $this->db->join('books','books.bookID=book_barrow.bookID');
            $this->db->join('users','users.UserID=book_barrow.from');
            $this->db->where('book_barrow.to',$userid);
            $this->db->where('books.status',0); 
            $this->db->where('book_barrow.status','accept');
           return $this->db->get()->result_array();
        }
        public function getBorrowDetail($barrowID)
        {
            $this->db->select('books.*,book_barrow.barrowID , book_barrow.created_at AS date,book_barrow.from,users.first_name AS first_name,users.last_name AS last_name,users.email AS email,author.name AS name');
            $this->db->from('book_barrow');
            $this->db->join('books','books.bookID=book_barrow.bookID');
            $this->db->join('author','author.authorID=books.authorID');
            $this->db->join('users','users.UserID=book_barrow.from');
            $this->db->where('book_barrow.barrowID',$barrowID);
            $this->db->where('books.status',0); 
           
            return $this->db->get()->row();
        }
        public function getLent($userid)
        {
            $this->db->select('books.*,book_barrow.barrowID , book_barrow.created_at AS date,book_barrow.to ,users.first_name AS first_name,users.last_name AS last_name,users.email AS email');
            $this->db->from('book_barrow');
            $this->db->join('books','books.bookID=book_barrow.bookID');
            $this->db->join('users','users.UserID=book_barrow.to');
            $this->db->where('book_barrow.from',$userid);
            $this->db->where('books.status',0); 
            $this->db->where('book_barrow.status','accept'); 
           return $this->db->get()->result_array();
        }
        public function bookingBarrowStatus($id,$data)
        {
           return $this->db->where('barrowID',$id)->update('book_barrow', $data);
        }
        public function notifiStore($data)
        {
           $this->db->insert('notifcation', $data);
           return $this->db->insert_id();
        }
        public function mailByUserId($userid,$all='')
        {
            $result=$this->db->where('UserID',$userid)->get('users')->row();
            if($all=='')
            return $result->email;
            return $result;
        }
        public function getBorrowBookInfo($barrowID)
        {
            return $this->db->where('barrowID',$barrowID)->get('book_barrow')->row();
        }
        public function getPreviousChat($barrowID)
        {
            $this->db->select('chat.*,message.messageID AS messageID,message.message AS message,message.sender_id AS sender_id,message.status AS mstatus ,message.created_at AS mcreated_at,users.first_name AS first_name,users.last_name AS last_name,users.email AS email');
            $this->db->from('chat');
            $this->db->join('message', 'message.chat_id = chat.chatID', 'left');
            $this->db->join('users', 'users.UserID = message.sender_id', 'left');
            $this->db->where('chat.barrowID',$barrowID);
            return $this->db->get()->result_array();
        }
        public function chatStore($chatdata)
        {
            $this->db->insert('chat', $chatdata);
            return $this->db->insert_id();
        }
        public function addMessage($messagedata)
        {
            $this->db->insert('message', $messagedata);
            $id=$this->db->insert_id();
            return $this->db->where('messageID',$id)->get('message')->row();
        }
        

}