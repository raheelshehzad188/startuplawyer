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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <?php
                                    if(!$cash)
                                    {
                                    ?>
                                    <th>Coupon Genrate</th>
                                    <th>Used Coupon</th>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <th>Used Coupon</th>
                                        <?php
                                    }
                                    ?>
                                    <th>Creation Date</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        $CI = get_instance();
                                        $CI->load->model('Genres_model');
                                        if(isset($value['mediaID']))
                                        $media = $CI->Genres_model->getMediaByID($value['mediaID']);
                                        if(isset($value['videoID']))
                                        $videoID = $CI->Genres_model->getMediaByID($value['videoID']);
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $i++;?></td>
                                    <td class=""><?= $value['first_name'].' '.$value['last_name'];?></td>
                                    <td class=""><?= $value['email'];?></td>
                                    <?php
                                    if(!$cash)
                                    {
                                    ?>
                                    <td><?php
                                    $modal->table = 'coupon_item';
                                                $copns = $modal->get(array('userID'=> $value['UserID']));
                                                $use = $modal->get(array('userID'=> $value['UserID'],'is_used'=>0));
                                                echo count($copns);
                                    ?></td>
                                    <td><?php echo count($copns) - count($use);?></td>
                                    <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td><?php
                                    $modal->table = 'coupon_item';
                                                $use = $modal->get(array('is_used'=>$value['UserID']));
                                                echo count($use);
                                    ?></td>
                                        <?php
                                    }
                                    ?>
                                    <td class=""><?=  date("d-m-Y", strtotime($value['create_at']));?></td>
                                    
                                    </td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/create/'.$value['UserID'];?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= $url.'/delete/'.$value['UserID'];?>">
                                            <span class="action-delete"><i class="feather icon-trash"></i></span>
                                        </a>
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