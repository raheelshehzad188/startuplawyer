<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Attribute extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect(base_url());
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		
		$this->modal = $this->Common_model;
		$this->modal->table = 'product_to_attributes';
                    $this->modal->key = 'id';
		$this->url = base_url('/admin/attribute');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Attribute';
    private $multi= 'Workout Trainers';
    private $add= 'addattr';
    private $all= 'allattr';
    private $modal= '';
    private $url= '';
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

	public function create_product_attribute( $label_name ){
    global $wpdb;

    $slug = sanitize_title( $label_name );

    if ( strlen( $slug ) >= 28 ) {
        return new WP_Error( 'invalid_product_attribute_slug_too_long', sprintf( __( 'Name "%s" is too long (28 characters max). Shorten it, please.', 'woocommerce' ), $slug ), array( 'status' => 400 ) );
    } elseif ( wc_check_if_attribute_name_is_reserved( $slug ) ) {
        return new WP_Error( 'invalid_product_attribute_slug_reserved_name', sprintf( __( 'Name "%s" is not allowed because it is a reserved term. Change it, please.', 'woocommerce' ), $slug ), array( 'status' => 400 ) );
    } elseif ( taxonomy_exists( wc_attribute_taxonomy_name( $label_name ) ) ) {
        return new WP_Error( 'invalid_product_attribute_slug_already_exists', sprintf( __( 'Name "%s" is already in use. Change it, please.', 'woocommerce' ), $label_name ), array( 'status' => 400 ) );
    }

    $data = array(
        'attribute_label'   => $label_name,
        'attribute_name'    => $slug,
        'attribute_type'    => 'select',
        'attribute_orderby' => 'menu_order',
        'attribute_public'  => 0, // Enable archives ==> true (or 1)
    );

    $results = $wpdb->insert( "{$wpdb->prefix}woocommerce_attribute_taxonomies", $data );

    if ( is_wp_error( $results ) ) {
        return new WP_Error( 'cannot_create_attribute', $results->get_error_message(), array( 'status' => 400 ) );
    }

    $id = $wpdb->insert_id;

    do_action('woocommerce_attribute_added', $id, $data);

    wp_schedule_single_event( time(), 'woocommerce_flush_rewrite_rules' );

    delete_transient('wc_attribute_taxonomies');
    return $slug;
}
public function update_attributes($post_id,$old_aatr, $aname ,  $attributes) {

   $slug =  $aname;
    $product_attributes = array(
        'name' => $slug,
        'value' => $attributes,
        'position' => 1,
        'is_visible' => 1,
        'is_variation' => 1,
        'is_taxonomy' => 0
    );
    update_option($slug,$aname);
 $old = get_post_meta($post_id, '_product_attributes', true);
if(is_array($old) && !empty($old))
{
    unset($old[$old_aatr]);
$old[$slug] = $product_attributes;
}
update_post_meta($post_id, '_product_attributes', $old);
return $old;

}
public function set_attributes($id) {
    $this->db->where('aid',$id)->delete('attribute_to_value');
$this->modal->table = 'product_to_attributes';
                    $this->modal->key = 'id';
                    $row = $this->modal->getbyid($id);
                    $arr = explode('|',$row->value);
                    $this->modal->table = 'attribute_to_value';
                    foreach($arr as $k=> $v)
                    {
                        $in = array(
                            'aid'=> $id,
                            'name'=> $v,
                            );
                            $this->modal->add($in);
                    }
    

}
	public function save($id = 0,$attr = '')
	{
        $this->form_validation->set_rules('name', $this->single.' Name', 'required');
        $this->form_validation->set_rules('value', $this->single.' Value', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            // $ret = $this->create_product_attribute('New test');
            if($attr)
            {
                $in = array(
                    "name"=>$this->input->post('name'),
                    "value"=>$this->input->post('value'),
                    "pid"=>$id,
                    );
                    $this->modal->table = 'product_to_attributes';
                    $this->modal->key = 'id';
             $ret = $this->modal->update($attr,$in);   
             $this->set_attributes($attr);
            }
            else
            {
                $in = array(
                    "name"=>$this->input->post('name'),
                    "value"=>$this->input->post('value'),
                    "pid"=>$id,
                    );
                    $this->modal->table = 'product_to_attributes';
                    $this->modal->key = 'id';
             $ret = $this->modal->add($in); 
             $this->set_attributes($ret);
            }
            
        	$user = $this->session->userdata('knet_login');
        	if($id)
        	{
        		if($ret)
	        	{
	        	    if($attr)
	        	    {
	        	        $this->session->set_flashdata('success', $this->single.' update successfully!');
	        	    }
	        	    else
	        	    {
	        	     $this->session->set_flashdata('success', $this->single.' create successfully!');   
	        	    }
	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', 'server error');
	        	}
        	}
        }
        redirect($this->url.'/all/'.$id);
	}

	public function delete($id = 0,$attr)
	{
	    
		if($id)
		{
		    $ret = $this->modal->delete($attr);
			if($ret)
        	{
                $this->session->set_flashdata('success', $this->single.' delete successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
		}
		redirect($this->url.'/all/'.$id);
	}

	public function create($id= 0,$attr = '')
	{
		$data= array();
		$data['url']= $this->url; 
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add '.$this->single;
		$breed['Home'] = base_url('/admin/admin');
		$breed['Products'] = base_url('/admin/products/all');
		$breed['Attributes'] = $this->url.'/all/'.$id;
		$breed[$page] = '';
		$data['pid'] = $id;

		$data['page']=  $page;
		$data['breed']= $breed;
		if(!empty($attr))
		{
		    $data['edit']= $this->modal->getbyid($attr);
		    
		}
		$this->template->admin($this->add,$data);
	}

	public function all($id)
	{
	    if($id)
	    {
	        $att = $this->db->where('pid',$id)->get('product_to_attributes')->result_array();
	        $this->load->model('Product_model');
                $product = $this->Product_model;
                $pro = $product->getproduct($id);
		$data= array();
		$data['url']= $this->url.'/create/'.$id; 
		$data['assets'] = $assets= base_url('/assets').'/';
		$breed = array();
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = Base_url('/admin/products/all');
		$this->load->model('Product_model');
                $product = $this->Product_model;
                $pro = $product->getproduct($id);
                ;
		$page = 'Products';
		$breed[$page] = base_url('admin/products/all');
		$breed[$pro->name] = base_url('/index/product/').$pro->slug;
		$breed['Attributes'] = '';
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
		$data['pid']= $id;
		$data['data']= $att;
		$this->template->admin($this->all,$data);
		
	    }
	    else
	    {
	        die("Invalid request");
	    }
	}



}

