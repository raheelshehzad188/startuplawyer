<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
    public $header= 'includes/header';
    public $footer= 'includes/footer';
    public $folder= 'admin';
    public function mail($to, $html, $sub) {
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
                'email' => 'info@channelsmedia.com',
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
              return "cURL Error #:" . $err;
            } else {
              return $response;
            }
    }
        public function download_img($img)
        {
                $currentDir = getcwd();
    $uploadDirectory = "uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = '';
    $fileExtension = $extension = pathinfo($img, PATHINFO_EXTENSION);
        $fileName = time().'.'.'jpg';

    

    $uploadPath = $uploadDirectory . basename($fileName); 
    $ch = curl_init($img);
$fp = fopen($uploadPath, 'wb');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);
                    if(true)
                    {
                        return $arr = array(
                                "public_id"=>'',
                                "url"=>'',
                                "cloudinary"=>1,
                                "localPath"=>$fileName
                        );
                    }

        }
        public function upload($name)
        {
                $currentDir = getcwd();
    $uploadDirectory = "uploads/";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES[$name]['name'];
    
    $fileSize = $_FILES[$name]['size'];
    $fileTmpName  = $_FILES[$name]['tmp_name'];
    $fileType = $_FILES[$name]['type'];
    $fileExtension = $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = time().'.'.$fileExtension;

    

    $uploadPath = $uploadDirectory . basename($fileName); 
    $simplePath = ' '; 
    if (isset($_FILES[$name])) {
        if (true) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
              $simplePath = basename($fileName);
                
            } else {
                
            }
        } else {
            foreach ($errors as $error) {
                
            }
        }
    }
                    if(true)
                    {
                        return $arr = array(
                                "public_id"=>'',
                                "url"=>'',
                                "cloudinary"=>1,
                                "localPath"=>$fileName
                        );
                    }

        }
        public function full($view , $data)
        {
        	$CI =& get_instance();

                // die("OK");
                if(!isset($data['title']))
                {
                        $data['title'] = 'StartupLawyer';
                }
                $CI->load->model('Product_model');
                $CI->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $data['ci'] = $CI;
                $data['modal'] = $CI->Common_model;
                $data['product'] = $CI->Product_model;

        	// die("OK");
        	if(!isset($data['title']))
        	{
        		$data['title'] = 'startuplawyer';
        	}
          $data['assets'] = base_url('/assets/').'/';
        	$CI->load->view('fpages/'.$view,$data);
        }
        public function box($view , $data)
        {
            $CI =& get_instance();
            $CI->load->model('Book_model');
            $coverImg = $CI->Book_model->getMediaByID($data['coverImg']);
            $data['img'] = $coverImg->public_id;
            $authorID = $CI->Book_model->getAuthorByID($data['authorID']);
            $data['author'] = $authorID->name;
            $text=$data['title'];
            $data['title']=$this->limit_text($text,5);
            $CI->load->view('books/'.$view,$data);
        }
        public function limit_text($text, $limit) {
          if (str_word_count($text, 0) > $limit) {
              $words = str_word_count($text, 2);
              $pos = array_keys($words);
              $text = substr($text, 0, $pos[$limit]) . '...';
          }
          return $text;
        }
        public function admin($view , $data)
        {
            
                $CI =& get_instance();

                // die("OK");
                if(!isset($data['title']))
                {
                        $data['title'] = 'startuplawyer';
                }
                $CI->load->model('Product_model');
                $CI->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $data['ci'] = $CI;
                $data['modal'] = $CI->Common_model;
                $data['product'] = $CI->Product_model;
                $data['assets'] = base_url('/assets').'/';
                if(isset($data['header']))
                {
                        $CI->load->view('includes/'.$data['header'],$data);
                }
                else{
                  echo $ret = $CI->load->view($this->header,$data,TRUE);
                }
                echo $CI->load->view($this->folder.'/'.$view,$data, TRUE);
                // die("POK");
                if(isset($data['footer']))
                {
                        $CI->load->view('includes/'.$data['footer'],$data);
                }
                else{
                  echo $ret = $CI->load->view($this->footer,$data,TRUE);
                }
                
        }
        public function foogra($view , $data)
        {
                $CI =& get_instance();

                // die("OK");
                if(!isset($data['title']))
                {
                        $data['title'] = 'StartupLawyer';
                }
                $CI->load->model('Product_model');
                $CI->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $data['ci'] = $CI;
                $data['modal'] = $CI->Common_model; 
                $data['product'] = $CI->Product_model;
                if(isset($data['header']))
                {
                        echo $r =  $CI->load->view('includes/'.$data['header'],$data,true);
                        
                }
                else{
                  echo $ret = $CI->load->view('includes/foogra-header',$data,TRUE);
                }
                echo $CI->load->view('foogra/'.$view,$data,true);
                if(isset($data['footer']))
                {
                    
                        echo $r =  $CI->load->view('includes/'.$data['footer'],$data,true);
                        
                }
                else{
                    
                  echo $ret = $CI->load->view('includes/new_footer',$data,TRUE);
                }
        }
        public function front($view , $data)
        {
                $CI =& get_instance();

                // die("OK");
                if(!isset($data['title']))
                {
                        $data['title'] = 'StartupLawyer';
                }
                $CI->load->model('Product_model');
                $CI->load->model('Common_model');
            // $this->Common_model->table = 'music';
                $data['ci'] = $CI;
                $data['modal'] = $CI->Common_model;
                $data['product'] = $CI->Product_model;
                echo $r = $CI->load->view('includes/foogra-header',$data,true);
                echo $CI->load->view('foogra/'.$view,$data,true);
                if(isset($data['footer']))
                {
                        echo $r =  $CI->load->view('includes/'.$data['footer'],$data,true);
                        
                }
                else{
                  echo $ret = $CI->load->view('includes/new_footer.php',$data,TRUE);
                }
        }
}