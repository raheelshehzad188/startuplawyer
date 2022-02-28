<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Provider extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['knet_login']))
		{
			redirect(base_url());
		}
		if(!check_permission('service_provider'))
		{
		    redirect(base_url('index/page/not_auth'));
		}
		
        $data= array();
		$this->load->library('template');
		$this->load->model('Common_model');
		$this->Common_model->table = 'wp_users';
		$this->Common_model->key = 'ID';
		$this->modal = $this->Common_model;
		$this->url = base_url('/admin/provider');
		$this->load->model('auth_model');
    }
    //variables
    private $single= 'Service Provider';
    private $multi= 'Service Providers';
    private $add= 'addprovider';
    private $all= 'allprovider';
    private $url= '';
    private $modal= '';
    private $roleID= 'service_provider';
    	function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('uploads/'.$filename, 'w');
    // loop over the input array
    $file = new SplFileObject('uploads/'.$filename, 'a');

    
    foreach ($array as $kl => $line) {
        
        $file->fputcsv($line);

    }
    

}
    public function export()
	{
	    $products = $this->modal->get(array());
	    $h = array(
	        'ID',
	        'User Name',
	        'Email',
	        'Name',
	        'Whatsapp',
	        'Phone',
	        );
	        $csv = array();
	        $csv[] = $h;
        $this->load->model('Product_model');
                $product = $this->Product_model;
	        foreach($products as $k => $v)
	        {
	            
	            $uid = $v['ID'];
	            $value = $product->getuser($v['ID']);
                // var_dump($value->roles);
                // die();
                $roles = $value->roles;
                if(in_array('service_provider',$roles) ||in_array('draft_provider',$roles))
                {
	            $csv[] = $sing = array(
	                $value->ID,
	                $value->user_login,
	                $value->user_email,
	                $value->full_name,
	                $value->whaatsapp,
	                $value->phone,
	                );
                }//if sservice provider
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
               window.location = "<?= base_url('admin/provider/all'); ?>";
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

	
	public function save($id = 0)
	{
        $this->form_validation->set_rules('fname', $this->single.' First Name', 'required');
        $this->form_validation->set_rules('lname', $this->single.' Last Name', 'required');
        $this->form_validation->set_rules('email', $this->single.' Email', 'required');
        if(!$id)
        $this->form_validation->set_rules('pass', $this->single.' Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            if($id == 0)
            {

        	 $user = $this->session->userdata('knet_login');
        	 //email exist or not
        	 $em = $this->modal->get(array('user_email'=>$this->input->post('email')));
        	 $email_check = 0;
        	if(isset($em[0]))
        	{
        	    $email_check = $em[0]['ID'];
        	}
        	 //email exist or not
        	 //username exist or not
        	 $em = $this->modal->get(array('user_login'=>$this->input->post('email')));
        	 $user_id = 0;
        	if(isset($em[0]))
        	{
        	    $user_id = $em[0]['ID'];
        	}
        	 //username exist or not
        // 	 $user_id = username_exists($this->input->post('email'));
    // $email_check = email_exists($this->input->post('email'));
    if ($user_id || $email_check) {
        if ($user_id) {
            $this->session->set_flashdata('error', $this->single." Username already exists.");
            $responseData['error'] = "1";
            redirect_to($_SERVER['HTTP_REFERER']);
        }
        if ($email_check == true) {
            $this->session->set_flashdata('error', $this->single." Email already exists.");
            $responseData['error'] = "1";
            redirect_to($_SERVER['HTTP_REFERER']);
        }
    } else {
        //$password = wp_generate_password(8, false );
        $user_data = array(
            'user_login' => strstr($this->input->post('email'), '@', true),
            'user_email' => $this->input->post('email'),
            'user_pass' => $this->input->post('pass'),
        );
        $user_id = $this->modal->add($user_data);
        
    }
    
            
            }
            else
            {
                $user_id= $id;
                if($this->input->post('pass'))
                {
                    wp_set_password( $this->input->post('pass'), $user_id );
                }
            }
            $this->load->model('Product_model');
                $product = $this->Product_model;
        if ($user_id) {
            if(isset($_REQUEST['fname']) && !empty($_REQUEST['fname']))
	{
		$ret = $product->updatemeta('user',$user_id,'first_name',$_REQUEST['fname']);
	}
            if(isset($_REQUEST['lname']) && !empty($_REQUEST['lname']))
	{
		$ret = $product->updatemeta('user',$user_id,'last_name',$_REQUEST['lname']);
	}
            if(isset($_REQUEST['permission']) && !empty($_REQUEST['permission']))
	{
		$ret = $product->updatemeta('user',$user_id,'permission',$_REQUEST['permission']);
	}
	//update role
	$role = array();
	$role[$this->roleID] = 1;
	        if(isset($role) && !empty($role))
	{
		$ret = $product->updatemeta('user',$user_id,'wp_capabilities',serialize($role));
	}
            if($id)
            {
                $this->session->set_flashdata('success', $this->single." update Successfully!");
            }
            else
            {
$this->session->set_flashdata('success', $this->single." Add Successfully!");
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
			if($this->db->where('ID',$id)->delete('wp_users'))
        	{
                $this->session->set_flashdata('success', $this->single.' delete successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
		}
		redirect($this->url.'/all');
	}

	public function create($id= 0)
	{
		$data= array();
		$data['url']= $this->url; 
		$data['assets']= base_url('assets/admin/');
		$breed = array();
		$page = 'Add  '.$this->single;
		$breed['Home'] = Base_url('/admin/admin');
		$breed[$page] = ' ';
		 $data['album'] = 1;

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
		$page = 'Manage '.$this->single;
		$breed[$page] = '';
		$data['cash'] = 1;
		$data['footer'] = 'cfooter';
		$data['album'] = 1;
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';


		$data['page']= $page;
		$css = array();
		$css[] = $assets.'/app-assets/css/core/menu/menu-types/vertical-menu.css';
		$css[] = $assets.'/app-assets/css/core/colors/palette-gradient.css';
		$css[] = $assets.'/app-assets/css/plugins/file-uploaders/dropzone.css';
		$css[] = $assets.'/app-assets/css/pages/data-list-view.css';
		$js = array();
		$js[] = $assets.'/app-assets/js/scripts/ui/data-list-view.js';
		$data['css']= $css;
		$data['js']= $js;
		$data['js']= $js;
		$data['breed']= $breed;
		$modal  = $this->modal;
		$providers = array();
	$modal->table = 'wp_users';
	$modal->key = 'ID';
	$dusers = $modal->get(array());
	$this->load->model('Product_model');
    $product = $this->Product_model;
	foreach($dusers as $k=> $v)
	{
	    $sing = $product->getuser($v['ID']);
	    if(isset($sing->roles))
	    
	    {
	    if(!empty($sing->roles) && in_array('service_provider',$sing->roles)|| in_array('draft_provider',$sing->roles))
	    {
	        $providers[] = $sing;
	    }
	    }
	}
		
		$data['data']= $providers;
		$this->template->admin($this->all,$data);
	}



}

