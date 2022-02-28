<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Grouptypes  extends CI_Controller {

		 function __construct() {
        parent::__construct();
        if(!isset($_SESSION['admininstrator_login']))
		{
			redirect('/login');
		}
        $data= array();
		$this->load->library('template');
		$this->load->model('Grouptypes_model');
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

	public function signup()

	{

header('Access-Control-Allow-Origin: *');

		if($_POST)

		{

			$indata= array(

				"email" =>$_POST['email'],

				"upass" =>base64_encode($_POST['pass']),

				"name" =>$_POST['name'],

			);

			$rdata = array();

				if($this->db->insert('clients',$indata))

				{

					

					$rdata = array(

						"status" => 1

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

	public function tib()

	{

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = "tib";

		$data['user'] = $this->db->get('patient')->result_array();

		

		$this->load->view('main', $data);

	}

	public function applogin()

	{

	header('Access-Control-Allow-Origin: *');

		if($_POST)

		{

			$email = $_POST['email'];

			$pass = $_POST['pass'];

			$pass = base64_encode($pass);

			$res = $this->db->where('email',$email)->where('upass',$pass)->get('clients')->result_array();

			$rdata = array();

				if(count($res) > 0 )

				{

					

					$rdata = array(

						"status" => 1,

						"data" => $res[0],

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

	public function logout()

	{

		session_destroy();

		redirect('/');

		exit();

	}

	public function page($page)

	{

		$assets = base_url('assets/admin');

		$data['page'] = $page;

		$th = array(

			"Name",

			"Email",

			"Password",

			"Action",

		);

		$data['th'] = $th;

		$data['script'] = '<script>

                $(document).ready(function() {

                    $("#grid").kendoGrid({

                        height: 550,

                        sortable: true

                    });

                });

            </script>';

		$this->load->view('main1', $data);

	}

	public function save()
	{
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
        	$user = $this->session->userdata('admininstrator_login');
        	$arr = array(
        		"name" => $this->input->post('name'),
        		"userID" => $user->UserID
        	);

        	if($this->Grouptypes_model->add($arr))
        	{
                $this->session->set_flashdata('success', 'Group Type add successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
        }
        redirect($_SERVER['HTTP_REFERER']);
	}
	public function create()
	{
		$data= array();
		$data['assets']= base_url('assets/admin/');
		$this->template->admin('addgrouptype',$data);
	}
	public function all()
	{
		$data= array();
		$data['assets']= base_url('assets/admin/');
		$data['data']= $this->Grouptypes_model->get(array('status'=> 0));
		$this->template->admin('allgrouptypes',$data);
	}
	public function delete($id = 0)
	{
		if($id)
		{
			if($this->Grouptypes_model->update($id, array('status'=> 1)))
        	{
                $this->session->set_flashdata('success', 'Group Type delete successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function index()

	{

		$data= array();
		$data['assets']= base_url('assets/admin/');
		$this->template->admin('index',$data);
		

		/*if(!isset($_SESSION['alogin']))

		{

			// redirect('admin/login');



		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'home';

		$data['post']= $this->db->where('ptype',10)->get('posts')->result_array();

		$this->load->view('main1', $data);*/

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

	public function route()

	{

		header('Access-Control-Allow-Origin: *');

		$re = array();

		$re[] = array(

		'id '=>1,

		"name"=>'KHB to LHR',

		

		);

		$re[]= array(

		'id '=>2,

		"name"=>'KHB to LHR',

		

		);

		$ret = array("status"=>1,"data"=>$re);

		echo json_encode($ret);

	}

	public function chpass()

	{

		if(!isset($_SESSION['alogin']))

		{

			redirect('admin/login');



		}

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'cur_pass','current password', 'required');



                $this->form_validation->set_rules('new_pass','New password', 'required');

                $this->form_validation->set_rules('con_pass','Confirm password', 'required');



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = "All fields required";      

                }

                else

                {

                	$cur_pass = $this->input->post('cur_pass');

                	$new_pass = $this->input->post('new_pass');

                	$con_pass = $this->input->post('con_pass');

                	if($new_pass == $con_pass)

                	{

                		$id = $_SESSION['alogin']['id'];

                		$ret = $this->db->where('id',$id)->get('Users')->result_array();

                		

                		if(count($ret) > 0)

		                   {

		                   	$ret = $ret[0];



		                   	$upass= $ret['upass'];



		                   	if($upass == base64_encode($cur_pass))

		                   	{

		                   		//die("OI");

		                   		$udata = array(

		                   			"upass"=> base64_decode($cur_pass)

		                   		); 

		                   		$ret = $this->db->where('id',$id)->update('Users',$udata);

		                   		

		                   		if($ret)

		                   		{

		                   			$data['success'] = "Password changed successfully";



		                   		}

		                   		else

		                   		{

		                   			$data['error'] = "Server error!";

		                   		}



		                   	}

		                   	else

		                   	{

		                   		$data['error'] = "Password incorrect sorry!";

		                   	}

		                   	

		                   }

		                   else

		                   {

		                   	redirect('admin/login');

		                   }

                	}

                	else

                	{

                		$data['error'] = "password not matched!";     

                	}

                   

                }

			

		}

		$assets = base_url('assets/admin');

		$data['assets'] = $assets;

		$data['page'] = 'chpass';

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

		if(isset($_SESSION['alogin']))

		{

			redirect('admin');



		}

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'uname','username', 'required');



                $this->form_validation->set_rules('upass','password', 'required');



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = "All fields required";      

                }

                else

                {

                	$uname = $this->input->post('uname');

                	$upass = $this->input->post('upass');



                	$upass = base64_encode($upass);

                   $ret =$this->db->where('email',$uname)->where('upass',$upass)->get('users')->result_array();

                   if(count($ret) > 0)

                   {

                   	if($ret[0]['status'] == '0')

                   	{

                   	$_SESSION['alogin']= $ret[0];

                   	redirect('admin');

                   	

                   }

                   else

                   {

                   	$data['error'] = "Account Blocked";     

                   }

                   }

                   else

                   {

                   	$data['error'] = "username or password invalid!";     

                   }

                   

                }

			

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$this->load->view('login1', $data);

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



	public function update_meta($uid,$ptype,$key, $val)

	{



		$ret= $this->db->where('ptype',$ptype)->where('pid',$uid)->where('meta_key',$key)->get('meta_values')->result_array();

		

                   	if(count($ret) > 0)

                   	{

                   		$id = $ret[0]['id'];

                   		$indata = array(

                		

                		'ptype' => $ptype,

                		'pid' => $uid,

                		'meta_key' => $key,

                		'meta_value' => $val

                	);



                   $ret =$this->db->where('id',$id)->update('meta_values',$indata);

                   if($ret)

                   {

                 	return true;

                   }

                   else

                   {

                   	return false;

                   }

                   	}

                   	else

                   	{

                   		$indata = array(

                		'id' => '',

                		'ptype' => $ptype,

                		'pid' => $uid,

                		'meta_key' => $key,

                		'meta_value' => $val

                	);

                   $ret =$this->db->insert('meta_values',$indata);

                   if($ret)

                   {

                 	return true;

                   }

                   else

                   {

                   	return false;

                   }



                   	}

	}

	//genaric add

	

	public function add($id = 0)

	{

		

		$data = array();

		$data['pd'] = $this->db->where('id',$_GET['pid'])->get('post_type')->row();

		if($_POST)

		{
			$hasreq= 0;


			 	

                		 	$fields =get_fields($_GET['pid']);

	foreach ($fields as $key => $value) 

	{

		if($value['required'])

		{
			$hasreq= 1;


			$this->form_validation->set_rules( $value['name'],$value['label'], 'required');

		

		}

		if($value['type'] == 'file')

		{

			$up_path = 'uploads/';

			$config = array();

			$config['upload_path']          = './'.$up_path;

                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';

                $config['max_size']             = 5000;

                $config['max_width']            = 1024;

                $config['max_height']           = 768;

			$ret = $this->upload_file($value['name'],$config);

			if($ret['status'] == 'success')

			{

				$path = $up_path.$ret['data'];

			}

		}

	}



                if ($this->form_validation->run() == FALSE && $hasreq == 1)

                {

                   $data['error'] = validation_errors();

                }

                else

                {

                	//$name = $this->input->post('uname');

                	$type = $_GET['pid'];

                	if($id)

                	{

                		$indata = array(

                		'id' => '',

                		'ptype' => $type,

                		'create_at' => date('Y-m-d H:i:s'),

                	);

                		unset($indata['id']);

                   $ret =$this->db->where('id', $id)->update('posts',$indata);

                		//update

                	}

                	else

                	{

                	$indata = array(

                		'id' => '',

                		'ptype' => $type,

                		'create_at' => date('Y-m-d H:i:s'),

                	);

                   $ret =$this->db->insert('posts',$indata);

                   }

                   if($ret)

                   {

                   	$uid = $this->db->insert_id();

                   	$ptype = $_GET['pid'];

                   	$key= "added_by";

                   	$val=1;

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

                   		if($ret)

                   		{

                   			foreach ($fields as $key => $value) 

							{

								if($value['type'] == 'file')

								{

									$up_path = 'uploads/';

									$config = array();

									$config['upload_path']          = './'.$up_path;

						                $config['allowed_types']        = 'gif|jpg|png|pdf|doc';

						                $config['max_size']             = 5000;

						                $config['max_width']            = 1024;

						                $config['max_height']           = 768;

						                $ret = array();

				                if(isset($_FILES[$value['name']]))

				               {

									$ret = $this->upload_file($value['name'],$config);

									if($ret['status'] == 'success')

									{



										$path = $up_path.$ret['data'];

										$ret= $this->update_meta($id,$ptype,$value['name'], $path);

									}

								}

								else

								{

								}

								}

								$name= $value['name'];

								if(isset($_POST[$name]) && !empty($_POST[$name]))

								{

									if($id)

				                	{

				                		$uid = $id;

				                	}

									$ptype = $_GET['pid'];

				                   	$key= $name;

				                   	$val= $_POST[$name];

                   					$ret= $this->update_meta($uid,$ptype,$key, $val);

								}

							}

								if($id)

			                	{

			                		$data['success'] = "Post Edit successfully!";                        	

			                	}

			                	else

			                	{

			                		$data['success'] = "Post Add successfully!";                        	

			                	}

							

                	

						}

						else

						{

							$data['error'] = "meta error!";     

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$assets = base_url('assets/admin');

		if($id)

		{

			$data['post']= $this->db->where('id',$id)->get('posts')->result_array()[0];

			$data['post_id'] = $id;

		}

		$data['assets'] = $assets;

		$data['page'] = 'add';

		

		$this->load->view('main1', $data);

	}

	public function addNewUser($id = 0)

	{

		

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'uname','Username', 'required');

			 	$this->form_validation->set_rules( 'email','Email', 'required');



                $this->form_validation->set_rules('upass','Password', 'required');

                		 	$fields =get_fields(3);

	foreach ($fields as $key => $value) 

	{

		if($value['required'])

		{

			$this->form_validation->set_rules( $value['name'],$value['label'], 'required');

		

		}

	}



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('uname');

                	$email = $this->input->post('email');

                	$upass = $this->input->post('upass');

                	$type = 1;

                	if($id)

                	{

                		$indata = array(

                		'id' => '',

                		'name' => $name,

                		'email' => $email,

                		'upass' => base64_encode($upass),

                		'type' => $type

                	);

                		unset($indata['id']);

                   $ret =$this->db->where('id', $id)->update('users',$indata);

                		//update

                	}

                	else

                	{

                	$indata = array(

                		'id' => '',

                		'name' => $name,

                		'email' => $email,

                		'upass' => base64_encode($upass),

                		'type' => $type

                	);

                   $ret =$this->db->insert('users',$indata);

                   }

                   if($ret)

                   {

                   	$uid = $this->db->insert_id();

                   	$ptype = 1;

                   	$key= "added_by";

                   	$val=$_SESSION['alogin']['id'];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

                   		if($ret)

                   		{

                   			foreach ($fields as $key => $value) 

							{

								$name= $value['name'];

								if(isset($_POST[$name]) && !empty($_POST[$name]))

								{

									if($id)

				                	{

				                		$uid = $id;

				                	}

									$ptype = 1;

				                   	$key= $name;

				                   	$val= $_POST[$name];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

								}

							}

								if($id)

			                	{

			                		$data['success'] = "User Edit successfully!";                        	

			                	}

			                	else

			                	{

			                		$data['success'] = "User Add successfully!";                        	

			                	}

							

                	

						}

						else

						{

							$data['error'] = "meta error!";     

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$assets = base_url('assets/admin');

		if($id)

		{

			$data['user']= $this->db->where('id',$id)->get('users')->result_array()[0];

		}

		$data['assets'] = $assets;

		$data['page'] = 'addnewuser';

		

		$this->load->view('main', $data);

	}

	public function manage($id=0, $status= 1)

	{

		if($id)

		{

			$udata= array(

				'status'=>$status

			);

			$ret= $this->db->where('id', $id)->update('Users',$udata);

			if ($ret) {

				$data['success'] = "User Block Successfully";

			}

			//die("delete");

		}

		$data['fieldsData'] = get_fields($_GET['pid']);

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['users'] = $this->db->where('ptype ',$_GET['pid'])->get('posts')->result_array();

		$data['assets'] = $assets;

		$data['page'] = 'manage';

		$this->load->view('main', $data);

	}

	public function manage1($id=0, $status= 1)

	{

		if($id)

		{

			$udata= array(

				'status'=>$status

			);

			$ret= $this->db->where('id', $id)->update('Users',$udata);

			if ($ret) {

				$data['success'] = "User Block Successfully";

			}

			//die("delete");

		}

		$data['fieldsData'] = get_fields($_GET['pid']);

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['posts'] = $this->db->where('ptype ',$_GET['pid'])->get('posts')->result_array();

        $data['th'] = array();

        $fields = get_fields($_GET['pid']);

        $data['keys'] = $fields;

        $data['pid'] = $_GET['pid'];

        foreach ($fields as $key => $value) {

        	$data['th'][] = $value['label'];

        }

		$data['assets'] = $assets;

		$data['page'] = 'manage';

		$this->load->view('main1', $data);

	}



	public function manageuser($id=0, $status= 1)

	{

		if($id)

		{

			$udata= array(

				'status'=>$status

			);

			$ret= $this->db->where('id', $id)->update('Users',$udata);

			if ($ret) {

				$data['success'] = "User Block Successfully";

			}

			//die("delete");

		}

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['users'] = $this->db->where('id !=',$id)->where('type ',1)->get('users')->result_array();

		$data['assets'] = $assets;

		$data['page'] = 'manageuser';

		$this->load->view('main', $data);

	}



	public function manageproduct($id=0, $status= 1)

	{

		if($id)

		{

			

			$ret= $this->db->where('id', $id)->delete('products',$udata);

			if ($ret) {

				$data['success'] = "product Delete Successfully";

			}

			//die("delete");

		}

		$assets = base_url('assets/admin');

		$id = $_SESSION['alogin']['id'];

        $data['users'] = $this->db->get('products')->result_array();

		$data['assets'] = $assets;

		$data['page'] = 'manageproduct';

		$this->load->view('main', $data);

	}

	public function meta($id=0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');

			 	$this->form_validation->set_rules( 'is_show','Is show', 'required');

			 	$this->form_validation->set_rules( 'sort','Sort', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                	print_r($_POST);

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$is_show = $this->input->post('is_show');

                	$sort = $this->input->post('sort');

                	$indata = array(

                		'id' => '',

                		'p_type' => $_GET['pid'],

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required,

                		'sort' => $sort,

                		'is_show' => $is_show

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'meta';

		$data['fieldsData'] = $this->db->where('p_type',$_GET['pid'])->get('fields_meta')->result_array();

		$this->load->view('main', $data);

	}

	public function meta1($id=0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');

			 	$this->form_validation->set_rules( 'is_show','Is show', 'required');

			 	$this->form_validation->set_rules( 'sort','Sort', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                	print_r($_POST);

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$is_show = $this->input->post('is_show');

                	$sort = $this->input->post('sort');

                	$indata = array(

                		'id' => '',

                		'p_type' => $_GET['pid'],

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required,

                		'sort' => $sort,

                		'is_show' => $is_show

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'meta';

		$data['fieldsData'] = $this->db->where('p_type',$_GET['pid'])->get('fields_meta')->result_array();

		$th = array(

			"#NO",

			"Name",

			"Label",

			"Type",

			"Required",

			"Is Show",

			"Action",

		);

		$data['th'] = $th;

		$this->load->view('main1', $data);

	}



	public function usermeta($id=0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$indata = array(

                		'id' => '',

                		'p_type' => '3',

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'usermeta';

		$data['fieldsData'] = $this->db->where('p_type',3)->get('fields_meta')->result_array();

		$this->load->view('main', $data);

	}

	public function upload_file($name,$config)

        {

                

                $this->load->library('upload', $config);

                $ret = array();

                if ( ! $this->upload->do_upload($name))

                {

                        $error = array('error' => $this->upload->display_errors());

                        $ret = array(

                        	"status"=>"error",

                        	"msg"=>$error

                        );

                        //$this->load->view('upload_form', $error);

                }

                else

                {

                        if($this->upload->data())

                        {

                        $ret = array(

                        	"status"=>"success",

                        	"data"=> $this->upload->data()['file_name']

                        );

                    	}

                    	else

                    	{

                    		$ret = array(

                        	"status"=>"error",

                        	"msg"=>'db error'

                        );

                    	}





                }

                return $ret;

        }

	 public function do_upload1($name)

        {

                $config['upload_path']          = 'uploads/';

                $config['allowed_types']        = 'gif|jpg|png';

                $config['max_size']             = 100;

                $config['max_width']            = 1024;

                $config['max_height']           = 768;



                $this->load->library('upload', $config);

$ret = array();

                if ( ! $this->upload->do_upload($name))

                {

                        $error = array('error' => $this->upload->display_errors());

                        $ret = array(

                        	"status"=>"error",

                        	"msg"=>$error

                        );

                        //$this->load->view('upload_form', $error);

                }

                else

                {

                        $data = $this->upload->data();

                        $data['id'] = '';

                        

                        $res= $this->db->insert('files',$data);

                        if($res)

                        {

                        $ret = array(

                        	"status"=>"success",

                        	"data"=>$this->db->insert_id()

                        );

                    	}

                    	else

                    	{

                    		$ret = array(

                        	"status"=>"error",

                        	"msg"=>'db error'

                        );

                    	}





                }

                return $ret;

        }



	public function addNewProduct($id = 0)

	{

		$data = array();

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Name', 'required');

			 	$this->form_validation->set_rules( 'price','Price', 'required');



                $this->form_validation->set_rules('discrip','Description', 'required');

                		 	$fields =get_fields(2);

	foreach ($fields as $key => $value) 

	{

		if($value['required'])

		{

			$this->form_validation->set_rules( $value['name'],$value['label'], 'required');

		

		}

	}



                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$price = $this->input->post('price');

                	$discrip = $this->input->post('discrip');

                	$type = 1;

                	$indata = array(

                		'id' => '',

                		'name' => $name,

                		'price' => $price,

                		'discription' => $discrip

                	);

                	if($id)

                	{

                		unset($indata['id']);

                   	$ret =$this->db->where('id', $id)->update('products',$indata);

                		//update

                	}

                	else

                	{

                   		$ret =$this->db->insert('products',$indata);

                   	}

                   if($ret)

                   {

                   	$uid = $this->db->insert_id();

                   	$ptype = 2;

                   	$key= "added_by";

                   	$val=$_SESSION['alogin']['id'];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

                   		if($ret)

                   		{

                   			foreach ($fields as $key => $value) 

							{

								$name= $value['name'];

								if(isset($_POST[$name]) && !empty($_POST[$name]))

								{

									if($id)

				                	{

				                		$uid = $id;

				                	}

									$ptype = 2;

				                   	$key= $name;

				                   	$val= $_POST[$name];

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

								}

							}

								if($id)

			                	{

			                		$data['success'] = "product Edit successfully!";                        	

			                	}

			                	else

			                	{

			                		$data['success'] = "product Add successfully!";                        	

			                	}

							

                	

						}

						else

						{

							$data['error'] = "meta error!";     

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$data['categories'] =array(); //$this->db->get('product_cat')->result_array();

		if($id)

		{

			$data['product']= $this->db->where('id',$id)->get('products')->result_array()[0];

		}



		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'addNewProduct';

		$this->load->view('main', $data);

	}



	public function productmeta($id =0)

	{

		$data = array();

		

		if($_POST)

		{

			 	

			 	$this->form_validation->set_rules( 'name','Username', 'required');

			 	$this->form_validation->set_rules( 'label','label', 'required');

			 	$this->form_validation->set_rules( 'type','type', 'required');

			 	//$this->form_validation->set_rules( 'cat','Category', 'required');





                if ($this->form_validation->run() == FALSE)

                {

                   $data['error'] = validation_errors();      

                }

                else

                {

                	$name = $this->input->post('name');

                	$label = $this->input->post('label');

                	$type = $this->input->post('type');

                	$required = $this->input->post('required');

                	$cat = $this->input->post('cat');

                	$indata = array(

                		'id' => '',

                		'p_type' => '2',

                		'name' => $name,

                		'label' => $label,

                		'type' => $type,

                		'required' => $required

                	);

                	if($id != 0)

					{

						unset($indata['id']);

                   	$ret =$this->db->where('id',$id)->update('fields_meta',$indata);

                   }

                   else

                   {

                   	$ret =$this->db->insert('fields_meta',$indata);

                   }

                   if($ret)

                   {

                   		if($id != 0)

						{

							//$cat

							$uid = $id;

                   	$ptype = 22;

                   	$key= "product_cat";

                   	$val= $cat;

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

							$data['success'] = "Field Edit successfully!";

						}

						else

						{

							$uid = $this->db->insert_id();

                   	$ptype = 22;

                   	$key= "product_cat";

                   	$val= $cat;

                   	$ret= $this->update_meta($uid,$ptype,$key, $val);

							$data['success'] = "Field Add successfully!";

						}

                   }

                   else

                   {

                   	$data['error'] = "server error!";     

                   }

                   

                }

			

		}

		$data['categories'] = array();//$this->db->get('product_cat')->result_array();

		if($id != 0)

		{

			$this->db->where('id',$id);

			$res = $this->db->get('fields_meta')->result_array();

			if(count($res)>0)

			{



				$data['singleData'] = $res[0];  

			}

			else

			{

				redirect('admin/usermeta/');

			}

		}

		$assets = base_url('assets/admin');

		

		$data['assets'] = $assets;

		$data['page'] = 'productmeta';

		$data['fieldsData'] = $this->db->where('p_type',2)->get('fields_meta')->result_array();

		$this->load->view('main', $data);

	}
	public function contact(){

		$data['page'] = 'add_page';
		$pid = $_GET['pid'];
		$data['post_id'] = $pid;
		if($_POST)
		{
			foreach ($_POST as $key => $value) {
				$ret= $this->update_meta($pid,$pid,$key,$_POST[$key] );
			}
		}

		

		$this->load->view('main1', $data);
	}





}

