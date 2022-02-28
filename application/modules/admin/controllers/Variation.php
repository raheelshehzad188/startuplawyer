<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Variation extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
		    print_r($_SESSION);
		    die();
			redirect(base_url());
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'variations';
		$this->modal = $this->Common_model;
		$this->url = base_url('/admin/variation');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Variation';
    private $multi= 'Variations';
    private $add= 'addvar';
    private $all= 'allvar';
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
public function se19519561_set_attributes($post_id, $aname ,  $attributes) {

    //Type attribute
    $values = array('val1','val2');
    $vstr = implode('|',$values);
    $slug = sanitize_title($aname).$post_id;
    $slug = $aname;
    foreach($values as $k=> $v)
    {
        wp_set_object_terms( $post_id, $v, $slug, true );

    }
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
$old[$slug] = $product_attributes;
if(empty($old))
{
    $arr = array();
    $arr[$slug] = $product_attributes;
    $old = $arr;
}
update_post_meta($post_id, '_product_attributes', $old);
return $old;

}
function create_product_variation( $product_id, $variation_data ){
    // Get the Variable product object (parent)
    $product = wc_get_product($product_id);

    $variation_post = array(
        'post_title'  => $product->get_name(),
        'post_name'   => 'product-'.$product_id.'-variation',
        'post_status' => 'publish',
        'post_parent' => $product_id,
        'post_type'   => 'product_variation',
        'guid'        => $product->get_permalink()
    );

    // Creating the product variation
    $variation_id = wp_insert_post( $variation_post );

    // Get an instance of the WC_Product_Variation object
    $variation = new WC_Product_Variation( $variation_id );

    // Iterating through the variations attributes
    foreach ($variation_data['attributes'] as $attribute => $term_name )
    {
        $taxonomy = $attribute; // The attribute taxonomy

        // If taxonomy doesn't exists we create it (Thanks to Carl F. Corneil)
        if( ! taxonomy_exists( $taxonomy ) ){
            register_taxonomy(
                $taxonomy,
               'product_variation',
                array(
                    'hierarchical' => false,
                    'label' => ucfirst( $attribute ),
                    'query_var' => true,
                    'rewrite' => array( 'slug' => sanitize_title($attribute) ), // The base slug
                )
            );
        }
        // print_r($variation_data['attributes']);

        // Check if the Term name exist and if not we create it.
        if( ! term_exists( $term_name, $taxonomy ) )
            wp_insert_term( $term_name, $taxonomy ); // Create the term

        $term_slug = get_term_by('name', $term_name, $taxonomy )->slug; // Get the term slug
        //raheel updation
        $term_slug = trim($term_name);

        // Get the post Terms names from the parent variable product.
        $post_term_names =  wp_get_post_terms( $product_id, $taxonomy, array('fields' => 'names') );

        // Check if the post term exist and if not we set it in the parent variable product.
        if( ! in_array( $term_name, $post_term_names ) )
            wp_set_post_terms( $product_id, $term_name, $taxonomy, true );

        // Set/save the attribute data in the product variation
        update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug );
    }

    ## Set/save all other data

    // SKU
    if( ! empty( $variation_data['sku'] ) )
    {
        $variation->set_sku( $variation_data['sku'] );
    }
        else
        {
            $u_sku = time().'-sku';
            $variation->set_sku( $u_sku);
        }

    // Prices
    if( empty( $variation_data['price'] ) ){
        $variation->set_price( $variation_data['price'] );
    } else {
        update_post_meta($variation_id,'_price',$variation_data['price']);
        update_post_meta($variation_id,'_sale_price',$variation_data['price']);
        update_post_meta($variation_id,'_regular_price',$variation_data['price']+5);
        $variation->set_price( $variation_data['price'] );
        $variation->set_sale_price( $variation_data['price'] );
    }

    // Stock
    $variation->set_manage_stock(false);
    
    $variation->set_weight(''); // weight (reseting)

    $variation->save(); // Save the data
    return $variation_id;
}
	public function save($id = 0,$attr = '')
	{
        $this->form_validation->set_rules('price', $this->single.' Price', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            //variations
            $exist = 0;
            $edit = 0;
            //add variatin 
            $in = array(
                'sku'=> $_REQUEST['sku'],
                'price'=> $_REQUEST['price'],
                'pid'=> $id,
                );
                $vid = 0;
                if($attr)
                {
                    $edit = 1;
                    $this->db->where('id',$attr)->update('variations', $in);
                    $vid  = $attr;
                }
                else
                {
                    $this->db->insert('variations', $in);
                    $vid  = $this->db->insert_id();
                }
                
            $in = array();
            if(!$exist)
            {
                // $ret = $this->create_product_attribute('New test');
                $attr = $_REQUEST['attributes'];
                if($attr)
                {
                    $this->db->where('pid',$vid)->delete('product_to_variations');
                    foreach($attr as $n=> $v)
                    {
                        
                        
                        if(!empty($v))
                        {
                            $name = $n;
                            $in = array(
                                'pid' => $vid,
                                'name' => $name,
                                'value' => $v
                                );
                                $r= $this->db->insert('product_to_variations', $in);
                        }
                    }
                    if($edit)
                    {
                        $this->session->set_flashdata('success', 'variation update successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('success', 'variation add successfully');
                    }
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'variation already exist');
            }
        }
        redirect($this->url.'/all/'.$id);
	}

	public function delete($id = 0,$var)
	{
		if($id)
		{
		    $ret = $this->modal->delete($var);
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
		$breed['Home'] = Base_url('/admin/admin');
		$breed['Products'] = Base_url('/admin/products/all');
		$breed['Variations'] = $this->url.'/all/'.$id;
		$breed[$page] = '';
		$data['pid'] = $id;

		$data['page']=  $page;
		$data['breed']= $breed;
		if(!empty($attr))
		{
		    $edit = $this->db->where('id',$attr)->get('variations')->row();
		    $data['vaiation'] = $attr;
		    $data['edit'] = $edit;
		    
		}
		$this->template->admin($this->add,$data);
	}

	public function all($id)
	{
	    if($id)
	    {
	        $this->modal->table = 'variations';
	        $this->modal->key = 'id';
	   $all = $this->modal->get(array('status'=>'0','pid'=>$id));
		$data= array();
		$data['url']= $this->url; 
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
		$breed['Variations'] = '';
		//$data['album'] = 1;
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
		$data['data']= $all;
		$this->template->admin($this->all,$data);
		
	    }
	    else
	    {
	        die("Invalid request");
	    }
	}



}

