<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Products extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect('panel/login');
		}
        $data= array();
		$this->load->library('template');
		$this->template->folder = 'provider';
		$this->load->model('Common_model');
		$this->load->model('Product_model');
		$this->Common_model->table = 'products';
		$this->Common_model->key = 'id';
		$this->modal = $this->Common_model;
		$this->pmodal = $this->Product_model;
		$this->url = base_url().'/provider/products';
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Product';
    private $multi= 'Products';
    private $add= 'addproduct';
    private $all= 'allproduct';
    private $url= '';
    private $modal= '';
    private $pmodal= '';
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
                'uid' => $user->ID,
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
				$user = $_SESSION['knet_login'];
	        
	        if(!$id)
	        {
	        	    

	        	    $cslug = $this->create_slug($_REQUEST['title']);
	        	    $arr['slug'] = $cslug;
	        	    $id = $this->modal->add($arr);
	        	    if($_REQUEST['products'] && $id)
	        	    {
	        	    $product->setextra($id,'product_to_packages',$_REQUEST['products']);
	        	    }
					if($id)
					{
	        	    $product->setextra($id,'product_to_tags',$_REQUEST['tags']);
	        	    $product->setextra($id,'product_to_locations',$_REQUEST['locations']);
	        	    $product->setextra($id,'product_to_languages',$_REQUEST['lanaguage']);
					}

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

	public function create($id= 0)
	{
		$data= array();
		$data['url']= $this->url; 
		$user = $_SESSION['knet_login'];
		$scats = $this->pmodal->getmeta('user',$user->ID,'scats',true);
		$data['pcats'] = $scats = array_unique(explode(',',$scats));
		
		$data['assets']= $assets = base_url('assets/admin/');
		$breed = array();
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
	public function all()
	{
		$data= array();
		$data['url']= $this->url; 
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


		$data['page']= $page;
		$data['css']= $css;
		$data['js']= $js;
		$data['breed']= $breed;
		$user = $_SESSION['knet_login'];
		$products = $this->modal->get(array('uid'=>$user->ID));
		foreach ($products as $key => $value) {
			$products[$key]['sale'] = 0;
		}
		if(isset($_REQUEST['sort']))
		{
			$products = $this->bubble_sort($products, $_REQUEST['sort']);
		}
		if(isset($_REQUEST['cat']))
		{
			$cat = $_REQUEST['cat'];
			$narr = array();
			foreach ($products as $key => $value) {
				$terms = get_the_terms( $value['ID'], 'product_cat' );
				$exist = 0;
				foreach ($terms as $key => $t) {
					if($t->term_id == $cat)
					{
						$narr[] = $value;
					}
				}
			}
			$products = $narr;
		}

		$data['data']= $products;
		$this->template->admin($this->all,$data);
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

