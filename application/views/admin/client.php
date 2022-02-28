<?php
$CI=&get_instance();
$user = $CI->session->userdata('knet_login');
$group= $CI->db->where('status',1)->get('groups')->result_array();
$books= $CI->db->where('status',0)->where('uid',$user->UserID)->get('links')->result_array();
$tags= $CI->db->where('status',0)->get('tags')->result_array();
$genres= $CI->db->where('status',0)->get('genres')->result_array();
$users= $CI->db->where('status',1)->get('users')->result_array();
$sand = $CI->db->where('uid',$user->UserID)->where('is_sandbox',1)->select('SUM(amount) as sandbox_price')->get('links')->row();
                            $live = $CI->db->where('uid',$user->UserID)->where('is_sandbox',2)->select('SUM(amount) as sandbox_price')->get('links')->row();

?>

        
            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Total Hits</span>
                                <h5>Api Hits</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= count($books)  ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Total Amount</span>
                                <h5>Live Account</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= ($live->sandbox_price >0)?$live->sandbox_price:0;?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Total Amount</span>
                                <h5>Sandbox Account</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= ($sand->sandbox_price >0)?$sand->sandbox_price:0;?></h1>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        
        
        
        
        
                </div>
        