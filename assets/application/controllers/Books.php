<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	function __construct() {
        parent::__construct();


        if(!isset($_SESSION['user_login']))
		{
             //die('Hrere');
			header('Location: ' . base_url());
            
		}

		$this->load->library('template');
		$this->load->model('Book_model');
		$this->load->model('Group_model');
        $this->load->model('Tags_model');
    }
	
    public function saveTags()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        {
            $user = $this->session->userdata('user_login');
            $arr = array(
                "name" => $this->input->post('name'),
                "type" => $this->input->post('type'),
                "userID" => $user->UserID
            );

            if($this->Tags_model->add($arr))
            {
                $this->session->set_flashdata('success', 'Tag add successfully!');
            }
            else
            {
                $this->session->set_flashdata('error', 'server error');
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deleteTags($id = 0)
    {
        if($id)
        {
            if($this->Tags_model->update($id, array('status'=> 1)))
            {
                $this->session->set_flashdata('success', 'Tag delete successfully!');
            }
            else
            {
                $this->session->set_flashdata('error', 'server error');
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
	
    public function tags()
	{
        
		$data= array();
        $user = $this->session->userdata('user_login');
        $data['data']= $this->Tags_model->get(array('userID'=>$user->UserID,'status'=>0));
		$data['assets']= base_url('assets/books/');		
		$this->template->front('tags',$data);

		
	}
    public function index()
    {
    die("OKK");
        $data= array();
        $data['assets']= base_url('assets/books/');
        $this->load->library('pagination');
        // load URL helper
        $this->load->helper('url');
        $this->load->model('Book_model');
        $limit_per_page = 12;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Book_model->get_total();
 
        if ($total_records > 0) 
        {
            // get current page records
            $data["books"] =  $this->Book_model->getHomeProducts($limit_per_page, $start_index);
            $config['base_url'] = base_url() . 'books/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            // custom paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
             
            $config['full_tag_open'] = '<nav aria-label="Page navigation example">
                    <ul class="pagination">';
            $config['full_tag_close'] = '</ul>
                </nav>';
             
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
 
            $config['prev_link'] = 'Prev';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="page-item "><a class="current_page">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            // build paging links
            $data["links"] = $this->pagination->create_links();
        }
        
        
        $this->template->front('home',$data);

        
    }
    public function single($id = 0)
    {
        if($id)
        {
            $data= array();
            $data['assets']= base_url('assets/books/');
            $data['user'] = $user=$_SESSION['user_login']; 

            $book= $this->Book_model->get(array('bookID'=>$id,'status'=>0));
            if($book[0])
            {
                $book = $book[0];
            }
            else
            {
                redirect('/');
            }

            $data['book'] = $book;
            $coverImg = $this->Book_model->getMediaByID($book['coverImg']);
            $data['book']['img'] = $coverImg->public_id;
            if(isset($book['authorID']))
            {

                $authorID = $this->Book_model->getAuthorByID($book['authorID']);
                
                $data['book']['author'] = $authorID->name;
            }
            $data['book']['lang'] = $lang = $this->Book_model->getLangByBookID($book['bookID']);
            $data['book']['genres'] = $genres = $this->Book_model->getGenreByBookID($book['bookID']);
            $data['book']['tags'] = $tags = $this->Book_model->getTagsByBookID($book['bookID']);
            $data['book']['isborrow'] = $borrow=$this->Book_model->getcheckBookIsBorrow($book['bookID']);
            $data['book']['isRequested']=$this->Book_model->getcheckBookIsRequested($book['bookID'],$user->UserID);
            $data['css'] = array('https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css');
            $data['scripts'] = array('https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js',
                base_url('assets/books/js/detail.js')
        );

           
            $this->template->front('detail',$data);
        }
        
    }
    public function myBooks()
    {
        $data = array();
        $user = $_SESSION['user_login'];
        // die($user->UserID);
        $data['data']= $this->Book_model->get(array("uid" => $user->UserID));
        $data['assets']= base_url('assets/books/');
        $this->template->front('myBooks',$data);
    }
    public function barrowRequest()
    {
        $user = $this->session->userdata('user_login');
        $this->form_validation->set_rules('message', 'message', 'required');

        if($this->input->post('book')>0)
        {
        $bookid=$this->input->post('book');    
        $data['bookID']=$this->input->post('book');
        $data['from']=$this->input->post('user');
        $data['to']=$user->UserID;
        $data['message']=$this->input->post('message');
        $id=$this->Book_model->bookingForBarrow($data);
        if($id>0)
        {
            $notiData['sender_id']=$user->UserID;
            $notiData['reciver_id']=$this->input->post('user');
            $notiData['mail']=$this->Book_model->mailByUserId($this->input->post('user'));
            $notiData['message_id']=$id;
            $notiData['type']='barrowbook';
            if($this->Book_model->notifiStore($notiData))
            {
                $bookInfo= $this->Book_model->bookinfo($this->input->post('book'));

                $em = array(
                    "bookName"=> $bookInfo->title,
                    "bookAthor"=> $bookInfo->name,
                    "bookOwner"=>$bookInfo->first_name.' '.$bookInfo->last_name,
                    "username"=>$user->first_name.' '.$user->last_name,
                    "usermail"=>$user->email,
                    "message"=>$this->input->post('message'),
                );
                $msg=$this->load->view('mail/barrowBookMail', $em, true);
                $email = $bookInfo->email;
              echo $this->template->mail($email,$msg, "Borrow Book");  
              $this->session->set_flashdata('success', 'You have  successfully sent a request to borrow a book!'); 
              redirect(base_url().'books/single/'.$bookid);  
            }
            else
            {

               $this->session->set_flashdata('warning', 'mail don,t send yet!'); 
            }    
        }
        else
        {

           $this->session->set_flashdata('warning', 'something went wrong!'); 
        }    
        }  
        redirect($_SERVER['HTTP_REFERER']);  
    }
    private function upload_csv($name)
    {
        if(isset($_FILES[$name]))
            {
                
                 $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES[$name]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(true) {
    $uploadOk = 1;
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
die("PK");

            }
    }
    public function savecsv()
    {
        $user = $this->session->userdata('user_login');
        if(!$_FILES['csv_file']['name'])
        {
            $this->form_validation->set_rules('csv_file', 'CSV File', 'required');
        }


        if (FALSE)
        {

                $this->session->set_flashdata('error', "Please select csv file");
        }
        else
        {
            if($_FILES['csv_file']['name'])
            {
                $name = $this->upload_csv('csv_file');
                $ext  = pathinfo($name, PATHINFO_EXTENSION);
                if($ext != "csv")
                {
                    $this->session->set_flashdata('error', "Only CSV Allowed");
                    redirect($_SERVER['HTTP_REFERER']);
                    exit();
                }
                $cdata = array();
                $file = fopen($name, 'r');
                while (($line = fgetcsv($file)) !== FALSE) {
                  //$line is an aray of the csv elements
                    $cdata[] = $line;
                }
                fclose($file);
                foreach ($cdata as $key => $value) {
                    //$ret = \Cloudinary\Uploader::upload($uploadPath, array());
 
                    if($key != 0)
                    {
                        $auther= $value[1];
                        $author_id=$this->Book_model->getAuthorID(['name'=>$auther]);
                        $genric=$value[5];
                        $genric=explode(',', $genric);
                        $insert= array(
                            "title" => $value[0],
                            "typeID" => $value[3],
                            "isbnNO" => $value[2],
                            "discription" => $value[0],
                            "authorID" => $author_id,
                            "coverImg" => isset($mediaID)?$mediaID:'1',
                            'location'=>$value[6],
                            "uid" => (isset($user->UserID))?$user->UserID:'1'
                        );
                        $bookid=$this->Book_model->add($insert);
                        if(!empty($genric))
                        {
                            foreach ($genric as $value) 
                            {
                                $genric_id=$this->Book_model->getGenricID(['name'=>$value,'userID'=>(isset($user->UserID))?$user->UserID:'1']);
                                $this->Book_model->addBookGenre($bookid,$genric_id);
                            }
                        } 
                    }
                }
                
            }
            if($bookid>0)
            {
                $this->session->set_flashdata('success', 'CSV import successfully!');
            }
            else
            {
                $this->session->set_flashdata('error', 'server error');
            }

        }
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function save()
	{
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('typeID', 'Book type', 'required');
        $this->form_validation->set_rules('genres_id', 'Genres', 'required');
        $this->form_validation->set_rules('tags_id', 'Tags', 'required');
        $this->form_validation->set_rules('list_id', 'Language', 'required');
        $this->form_validation->set_rules('discription', 'Discription', 'required');
        // if(!isset($_FILES['book_image']))
        // {
        // 	$this->form_validation->set_rules('book_image', 'Cover Photo', 'required');
        // }

        if ($this->form_validation->run() == FALSE)
        {
                $this->session->set_flashdata('error', validation_errors());
        }
        else
        { 
        	$user = $this->session->userdata('user_login');
        	$author_id = 0;
        	$mediaID = 0;
        	
        	if(isset($_FILES['book_image']))
	        {
	        	$imgData = $this->template->upload('book_image');

	        	$mediaID = $this->Book_model->addMedia($imgData);	

	        }

        	if($this->input->post('author_id'))
        	{
        		$author_id = $this->input->post('author_id');

        	}
        	else
        	{
        		
        		if($this->input->post('author'))
        		{

        			// die($this->input->post('author'));
	        		$ar = array(
	        			"authorID"=>'',
	        			"name"=>$this->input->post('author'),
	        			"userID" => $user->UserID
	        		);
	        		$author_id = $this->Book_model->getAuthorID($ar);
	        		

	        	}
	        	else
	        	{
	        		$this->session->set_flashdata('error', "Please Fill author!");
	        		redirect($_SERVER['HTTP_REFERER']);
	        	}
        	}
        	
        	if($this->input->post('group_id'))
            $arr['groupID']= $this->input->post('group_id');
            if($this->input->post('discription'))
            $arr['discription']= $this->input->post('discription');
            if($this->input->post('typeID'))
            $arr['typeID']= $this->input->post('typeID');
            if($this->input->post('isbnNO'))
            $arr['isbnNO']= $this->input->post('isbnNO');   
            if($author_id)
            $arr['authorID']= $author_id;
            if($mediaID)
            $arr['coverImg']= $mediaID;
            if($this->input->post('title'))
            $arr['title']=$this->input->post('title');
            if($user->UserID)
            $arr['uid']=$user->UserID;
            if($this->input->post('location'))
            $arr['location']=$this->input->post('location');   
        	if($bookID = $this->Book_model->add($arr))
        	{
        		// $genres_id = $this->input->post('genres_id');
        		// $genres_id = explode(',', $genres_id);
        		// foreach ($genres_id as $key => $value) {
        		// 	$this->Book_model->addBookGenre($bookID,$value);
        		// }
        		$tags_id = $this->input->post('tags_id');
        		$tags_id = explode(',', $tags_id);
        		foreach ($tags_id as $key => $value) {
        		  $this->Book_model->addBookTag($bookID,$value);
        		 }
        		// $list_id = $this->input->post('list_id');
        		// $list_id = explode(',', $list_id);
        		// foreach ($list_id as $key => $value) {
        		// 	$this->Book_model->addBookLang($bookID,$value);
        		// }
                $genres_id = $this->input->post('genres_id');
                $this->Book_model->addBookGenre($bookID,$genres_id);
                // $tags_id = $this->input->post('tags_id');
                // $this->Book_model->addBookTag($bookID,$tags_id);
                $list_id = $this->input->post('list_id');
                $this->Book_model->addBookLang($bookID,$list_id);
                $this->session->set_flashdata('success', 'Book add successfully!');
        	}
        	else
        	{
        		$this->session->set_flashdata('error', 'server error');
        	}
        }
            header("Location: ".$_SERVER['HTTP_REFERER']);
            
        exit();
       // redirect($_SERVER['HTTP_REFERER']);
	}
	public function addbook($id = 0)
	{
        $user = $this->session->userdata('user_login');
		$data= array();
        $this->load->model('Book_model');
        $this->load->model('Group_model');
        if($id > 0)
        {
             $data['edit']= $this->Book_model->get(array('bookID'=>$id));
            if(isset($data['edit'][0]))
                $data['edit']  = $data['edit'][0];
        }
		
		$data['generes']= $this->Book_model->getGenere(array('status'=>0));

		$data['tags']= $this->Book_model->getTag(array('status'=>0));
		$data['list']= $this->Book_model->getList(array());
		$data['group']=$this->Group_model->get_user_group($user->UserID);
        $data['scripts']= array(
			'https://code.jquery.com/jquery-1.12.4.js',
			'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
			'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
			'https://rawgit.com/select2/select2/master/dist/js/select2.js',
            base_url('assets/admin/pages/').'book.js',
		);
		$data['css']= array(
			'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
		);
		$data['assets']= base_url('assets/books/');
		$this->template->front('addbook',$data);

		
	}
    public function chat($borrow_id,$bookID)
    {
        $user = $this->session->userdata('user_login');
        $data= array();
        $this->load->model('Book_model');
        $this->load->model('Group_model');
        
        
        $data['borrow_info']=$this->Book_model->getBorrowBookInfo($borrow_id);
        $data['chat']=$this->Book_model->getPreviousChat($borrow_id);
        $data['user']= $user ;
        $data['scripts']= array(
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
            'https://rawgit.com/select2/select2/master/dist/js/select2.js','chat',
        );

        $data['css']= array(
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
        );
        $data['assets']= base_url('assets/books/');
        $this->template->front('chat',$data);
    }
    public function chat_store()
    {
        $chat_id=0;
        if($this->input->post('chat_id'))
        $chat_id=$this->input->post('chat_id');
        if($this->input->post('message'))
        $message= $this->input->post('message');   
        if($this->input->post('borrow'))
        $borrowId= $this->input->post('borrow');
        $user = $this->session->userdata('user_login');
        $this->load->model('Book_model');
        $this->load->model('Group_model');
        $borrow=$this->Book_model->getBorrowBookInfo($borrowId);
        if($borrow->from==$user->UserID)
        $other_user=$borrow->to;
        else
        $other_user=$borrow->from;
        //add new chat 
        if($chat_id==0)
        {
            $data=['from'=>$user->UserID,'to'=>$other_user,'barrowID'=>$borrowId];  
            $chat_id=$this->Book_model->chatStore($data);  
        }
        //add message
        $messageData=[
            'chat_id'=>$chat_id,
            'message'=>$message,
            'sender_id'=>$user->UserID,
        ];
        $data['message']=$messagdata=$this->Book_model->addMessage($messageData);
        $data['user']=$user;
        if($data['message'])
        {
            $other_user_mail=$this->Book_model->mailByUserId($other_user);
            $response['message']="success";
            $response['chat_id']=$chat_id;
            $dataNoti=['sender_id'=>$user->UserID,'reciver_id'=>$other_user,'mail'=>$other_user_mail,'message_id'=>$borrowId,'type'=>'chatnotification'];

            $this->Group_model->addNotification($dataNoti);
            $bookInfo=$this->Book_model->getBorrowDetail($borrowId);
            $received_user=$this->Book_model->mailByUserId($other_user,'all');
            $email=$received_user->email;    
            $em = array(
                "message"=>$message,
                "bookName"=> $bookInfo->title,
                "bookAthor"=> $bookInfo->name,
                "bookOwner"=>$bookInfo->first_name.' '.$bookInfo->last_name,
                "username"=>$user->first_name.' '.$user->last_name,
                "usermail"=>$user->email,
            );
            $msg=$this->load->view('mail/chatMail', $em, true);
            $this->template->mail($email,$msg, "You Have New Message");
            $response['html']=$this->load->view('books/ajax_chat_box',$data,true);
        }    
        echo json_encode($response);
        exit();
    }


    public function saveedit()
    {

        $this->form_validation->set_rules('bookID', 'Invalid Page', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('typeID', 'Book type', 'required');
        $this->form_validation->set_rules('genres_id', 'Genres', 'required');
        $this->form_validation->set_rules('tags_id', 'Tags', 'required');
        $this->form_validation->set_rules('list_id', 'Language', 'required');
        // $this->form_validation->set_rules('isbnNO', 'ISBN No', 'required');
        $this->form_validation->set_rules('discription', 'Discription', 'required');

        if ($this->form_validation->run() == FALSE)
        {

                $this->session->set_flashdata('error', validation_errors());

                redirect($_SERVER['HTTP_REFERER']);
        }
        else
        { 
            $bookID = $this->input->post('bookID');
            $user = $this->session->userdata('user_login');
            $author_id = 0;
            $mediaID = 0;
            if(isset($_FILES['book_image']) && !empty($_FILES['book_image']['name']))
            {
                
                $imgData = $this->template->upload('book_image');
                $mediaID = $this->Book_model->addMedia($imgData);   
                $this->Book_model->update($bookID , array("coverImg"=>$mediaID));
                
            }
            if(FALSE)
            {
                $author_id = $this->input->post('author_id');
                

            }
            else
            {

                
                if($this->input->post('author'))
                {
                    $ar = array(
                        "authorID"=>'',
                        "name"=>$this->input->post('author'),
                        "userID" => $user->UserID
                    );
                    $author_id = $this->Book_model->getAuthorID($ar);

                }
                else
                {
                    $this->session->set_flashdata('error', "Please Fill author!");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            
            if($this->input->post('group_id'))
            $arr['groupID']= $this->input->post('group_id');
            if($this->input->post('discription'))
            $arr['discription']= $this->input->post('discription');
            if($this->input->post('typeID'))
            $arr['typeID']= $this->input->post('typeID');
            if($this->input->post('isbnNO'))
            $arr['isbnNO']= $this->input->post('isbnNO');   
            if($author_id)
            $arr['authorID']= $author_id;
            if($mediaID)
            $arr['coverImg']= $mediaID;
            if($this->input->post('title'))
            $arr['title']=$this->input->post('title');
            if($user->UserID)
            $arr['uid']=$user->UserID;
            if($this->input->post('location'))
            $arr['location']=$this->input->post('location'); 
            if($this->Book_model->update($bookID , $arr))
            {
                if($this->Book_model->delGenreByBookID($bookID))
                {
                    $genres_id = $this->input->post('genres_id');
                    $genres_id = explode(',', $genres_id);
                    foreach ($genres_id as $key => $value) {
                        $this->Book_model->addBookGenre($bookID,$value);


                    }
                }
                if($this->Book_model->delTagByBookID($bookID))
                {
                    $tags_id = $this->input->post('tags_id');
                    $tags_id = explode(',', $tags_id);
                    foreach ($tags_id as $key => $value) {
                    $this->Book_model->addBookTag($bookID,$value);
                    }
                }
                if($this->Book_model->delLangByBookID($bookID))
                {
                $list_id = $this->input->post('list_id');
                $list_id = explode(',', $list_id);
                foreach ($list_id as $key => $value) {
                    $this->Book_model->addBookLang($bookID,$value);
                }
    }
                $this->session->set_flashdata('success', 'Book update successfully!');
                redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                $this->session->set_flashdata('error', 'server error');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
    
    public function bookReturn($borrowId)
    {
        $data=[
            'status'=>'return',
        ];
        if($this->Book_model->bookingBarrowStatus($borrowId,$data))
        $this->session->set_flashdata('success', 'book received successfully!');
        else
        $this->session->set_flashdata('warning', 'something went wrong !');
        redirect($_SERVER['HTTP_REFERER']);    

    }
    public function hide($bookid)
    {
        $data=[
            'status'=>1,
        ];
        if($this->Book_model->update($bookid,$data))
        $this->session->set_flashdata('success', 'book disable successfully!');
        else
        $this->session->set_flashdata('warning', 'something went wrong !');
        redirect($_SERVER['HTTP_REFERER']);    

    }
    public function show($bookid)
    {
        $data=[
            'status'=>0,
        ];
        if($this->Book_model->update($bookid,$data))
        $this->session->set_flashdata('success', 'book enable successfully!');
        else
        $this->session->set_flashdata('warning', 'something went wrong !');
        redirect($_SERVER['HTTP_REFERER']); 
    }
    
    public function acceptBarrow($id)
    {
        $user = $this->session->userdata('user_login');
        $notification=$this->Group_model->getNotificationInfo($id);
        $data=[
            'status'=>'accept',
        ];
        $borrowinfo=$this->Book_model->getBorrowBookInfo($notification->message_id); 
        $bookid=$borrowinfo->bookID;
        if($this->Book_model->getcheckBookIsBorrow($bookid))
        {
            $data=[
                'status'=>'decline',
            ];
            if($notification->type='barrowbook'){
                if($this->Book_model->bookingBarrowStatus($notification->message_id,$data))
                {
                $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;
                $this->session->set_flashdata('warning', 'your book is not available!');
                }
            }    
            else
            {
            $this->session->set_flashdata('warning', 'something went wrong !');
            }    
            redirect($_SERVER['HTTP_REFERER']);
        }   
        if($notification->type='barrowbook'){

            if($this->Book_model->bookingBarrowStatus($notification->message_id,$data))
            {
            $received_user=$this->Book_model->mailByUserId($notification->sender_id,'all');
            $email=$received_user->email;    
            $bookInfo= $this->Book_model->bookinfo($bookid);
            $notiData['sender_id']=$user->UserID;
            $notiData['reciver_id']=$notification->sender_id;
            $notiData['mail']=$email;
            $notiData['message_id']=$notification->message_id;
            $notiData['type']='confirmborrow';
            $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;
            if($this->Book_model->notifiStore($notiData))
            {
                $em = array(
                    "bookName"=> $bookInfo->title,
                    "bookAthor"=> $bookInfo->name,
                    "bookOwner"=>$bookInfo->first_name.' '.$bookInfo->last_name,
                    "username"=>$user->first_name.' '.$user->last_name,
                    "usermail"=>$user->email,
                    "message"=>'Hi '.$received_user->first_name.'.<br> Your borrow book request is accepted for the book of '.$bookInfo->title.' <br> Thanks <br> '.$user->first_name.' '.$user->last_name,
                );
                $msg=$this->load->view('mail/barrowBookMail', $em, true);
                
              echo $this->template->mail($email,$msg, "Borrow Book Accepted");  ;
              $this->session->set_flashdata('success', 'you have accepted borrow request successfully!');
            }
           } 
        }
        else
        {
        $this->session->set_flashdata('warning', 'something went wrong !');

        }    

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function notifiRemove($id)
    {
        $user = $this->session->userdata('user_login');
        $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;   
        $this->session->set_flashdata('success', 'notification remove successfully!');
     redirect($_SERVER['HTTP_REFERER']);
    }
    public function declineBarrow($id)
    {
        $user = $this->session->userdata('user_login');
        $notification=$this->Group_model->getNotificationInfo($id); 
        $borrowinfo=$this->Book_model->getBorrowBookInfo($notification->message_id); 
        $bookid=$borrowinfo->bookID;
        $data=[
            'status'=>'decline',
         ];
        if($notification->type='barrowbook'){
            if($this->Book_model->bookingBarrowStatus($notification->message_id,$data))
            {
            $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;
            $received_user=$this->Book_model->mailByUserId($notification->sender_id,'all');
            $email=$received_user->email;    
            $bookInfo= $this->Book_model->bookinfo($bookid);
            $notiData['sender_id']=$user->UserID;
            $notiData['reciver_id']=$notification->sender_id;
            $notiData['mail']=$email;
            $notiData['message_id']=$notification->message_id;
            $notiData['type']='declineBorrow';
            $this->Group_model->groupNotificationStatus($id,['status'=>'completed']) ;
            if($this->Book_model->notifiStore($notiData))
            {
                $em = array(
                    "bookName"=> $bookInfo->title,
                    "bookAthor"=> $bookInfo->name,
                    "bookOwner"=>$bookInfo->first_name.' '.$bookInfo->last_name,
                    "username"=>$user->first_name.' '.$user->last_name,
                    "usermail"=>$user->email,
                    "message"=>'Hi '.$received_user->first_name.'.<br> Your borrow book request is decline for the book of '.$bookInfo->title.' <br> Thanks <br> '.$user->first_name.' '.$user->last_name,
                );
                $msg=$this->load->view('mail/barrowBookMail', $em, true);
                
              echo $this->template->mail($email,$msg, "Borrow Book Decline");
            }
            $this->session->set_flashdata('success', 'decline request successfully!');
            }
        }    
        else
        {
        $this->session->set_flashdata('warning', 'something went wrong !');

        }    

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function borrowHistory()
    {
        $data = array();
        $user = $_SESSION['user_login'];
        // die($user->UserID);
        $data['title']='My Borrow Book History';
        $data['data']= $this->Book_model->getBorrow( $user->UserID);
        $data['type']='borrow';
        $data['assets']= base_url('assets/books/');
        $this->template->front('bookHistory',$data);
    }
    public function lentHistory()
    {
        $data = array();
        $user = $_SESSION['user_login'];
        // die($user->UserID);
        $data['title']='My Lent Book History';
        $data['data']= $this->Book_model->getLent( $user->UserID);
        $data['type']='lent';
        $data['assets']= base_url('assets/books/');
        $this->template->front('bookHistory',$data);
    }

   public function userProfile()
   {
        $user = $this->session->userdata('user_login');
        $data= array();
        $this->load->model('Book_model');
        $data['user']=$user;
        $data['scripts']= array(
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
            'https://rawgit.com/select2/select2/master/dist/js/select2.js',
           
        );
        $data['assets']= base_url('assets/books/');
        $this->template->front('userSetting',$data);
    }
	
}
?>