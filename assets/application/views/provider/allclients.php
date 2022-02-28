<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash');?>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>No</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>MY coupon</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    $user = $this->session->userdata('knet_login');
                                    foreach ($data as $key => $value) {
                                        $modal->table = 'coupon_item';
                                        $tot = $modal->get(array('user'=> $value['id']));
                                        $my = $modal->get(array('user'=> $value['id'],'assign_by'=>$user->UserID));
                                        
                                        $all = $ci->db->distinct('assign_by')->select('assign_by')->where('user',$value['id'])->get('coupon_item')->result_array();
                                        
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $i++;?></td>
                                    <td class="" id="phone<?= $value['id'] ?>"><?= $value['phone'];?></td>
                                    <td><?= count($tot); ?></td>
                                    <td>
                                        <?php
                                        foreach ($all as $v)
                                        {
                                            $modal->table = 'users';
                                            $modal->key = 'UserID';
                                            $uid = $v['assign_by'];
                                        $user =  $modal->getbyid($uid);
                                        $modal->table = 'coupon_item';
                                            $modal->key = 'id';
                                        $my = $modal->get(array('user'=> $value['id'],'assign_by'=>$uid));
                                        echo $name =$user->first_name.' '.$user->last_name.':'.count($my).'<br>';
                                            
                                        }
                                        ?>
                                    </td>
                                    <td class="product-action">
                                        <input type="hidden"  value="<?= base_url('index/coupon').'/'.$value['UserID'];?>" id="client<?= $value['id'] ?>" />
                                        <a onclick="copyToClipboard('<?= $value['id'] ?>')" link="<?= $url.'/create/'.$value['UserID'];?>">
                                            <span class="action-edit"><i class="feather icon-clipboard"></i></span>
                                        </a>
                                        <a onclick="send_link('email','<?= $value['id'] ?>')" href="#">
                                            <span class="action-edit"><i class="feather icon-mail"></i></span>
                                        </a>
                                        <?php
                                        if(!$resaler)
                                        {
                                        ?>
                                        <a href="#" onclick="send_link('sms','<?= $value['id'] ?>')">
                                            <span class="action-edit"><i class="feather icon-message-circle"></i></span>
                                        </a>
                                        <?php
                                        }
                                        ?>
                                        
                                    </td>
                                </tr>
                                <?php
                                        }
                                     ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->