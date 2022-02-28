<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv extends CI_Controller {
	function __construct() {
        parent::__construct();

		$this->load->library('template');
		$this->load->model('Book_model');
		$this->load->model('Group_model');
        $this->load->model('Tags_model');
    }
    private function get_earning($uid , $from , $to, $meta)
{
    $tot =0;
    if($uid && $from && $to)
    {
        $args = array(
    'numberposts' => -1,
    'orderby'    => 'menu_order',
    'sort_order' => 'asc',
  'post_type'   => 'transection'
);
$users = get_posts( $args );
$fdate = strtotime($from);
$tdate = strtotime($to);
foreach ( $users as $user ) {
    $pdate = strtotime($user->post_date);


    if($uid == get_post_meta($user->ID,'user',true) && $pdate >= $fdate  && $pdate <= $tdate)
    {
        $tot = $tot + get_post_meta($user->ID,$meta,true);
    }
}
    }
    return $tot;
}
private function array_to_csv_download($array, $filename = "export.csv", $delimiter=";") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://memory', 'w'); 
    // loop over the input array
    foreach ($array as $line) { 
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter); 
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}
    public function index()
    {
        $users = array();
        if(isset($_REQUEST['users']))
        {
            $users =  $_REQUEST['users'];
            $users = explode(',',$users);
        }
        $csv = array();
        $from = '';
        if(isset($_REQUEST['from']))
        $from = $_REQUEST['from'];
        $to = '';
        if(isset($_REQUEST['to']))
        $to = $_REQUEST['to'];
        foreach($users as $k => $v)
        {
            $uid = $v;
            $user = get_user_by('id', $v);
            $pm = 'SLIPS';
    if(get_user_meta($v,'bank_code',true) == ot_get_option( 'beneficiary_bank_code', '' ))
    {
        $pm = "IFT";
    }
            $csv[] = array(
                'D',
                date('d/m/Y'),
                $pm,
                'LKR',
                $this->get_earning($v,$from,$to,'earned'),
                get_user_meta($v,'account_title',true),
                get_user_meta($v,'account_no',true),
                get_user_meta($v,'account_no',true),
                get_user_meta($v,'bank_code',true),
                get_user_meta($v,'branchh_code',true),
                $v.date( "dmY"),
                'Earnings Payable',
                'SP'.$uid,
                $uid,
                'E',
                get_user_meta($uid,'billing_phone',true),
                $user->user_email,
                
                );
        }
        $file = time().'.csv';
        $fp = fopen($file, 'w');

foreach ($csv as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
$url = base_url('/'.$file);
header("Location: ".$url);
exit();
        die($file);

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
    
	
}
?>