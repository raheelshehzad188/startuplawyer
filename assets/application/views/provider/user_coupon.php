<!-- Data list view starts -->

                <section id="data-list-view" class="data-list-view-header">
                    <?php
                                        if(isset($is_send))
                                        {

                                            ?>
                                            <button onclick="send_group()" >Send</button>
                                            <?php
                                        }
                                        ?>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash');?>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        // $CI = get_instance();
                                        /*$ci->load->model('Genres_model');
                                        if(isset($value['mediaID']))
                                        $media = $CI->Genres_model->getMediaByID($value['mediaID']);
                                        if(isset($value['videoID']))
                                        $videoID = $CI->Genres_model->getMediaByID($value['videoID']);*/
                                ?>     
                                <tr role="row" class="odd">
                                    <?php
                                    if(!$value['user'])
                                    {
                                        ?>
                                        <td class="td-check"><div class="vs-component con-vs-checkbox vs-checkbox-primary vs-checkbox-small"><input type="checkbox" class="coupon_check vs-checkbox--input" value="<?= $value['id'] ?>"></div><!----></td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?><td></td><?php
                                    }
                                    ?>
                                    
                                    <td class="product-name"><?= $value['code']?></td>
                                    <td class="product-name"><?= $value['value']?></td>
                                    <?php
                                    if($value['is_used'])
                                    {
                                        ?>
                                        <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Used</td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td><i class="fa fa-circle font-small-3  mr-50"></i>Not Used</td>
                                        <?php
                                    }
                                    ?>
                                    
                                    <td class="product-action">
                                        <?php
                                        if(!$value['is_used'])
                                        {
                                        ?>
                                        <a onclick="use_coupon(<?= $value['id'] ?>)">
                                            <span class="action-delete"><i class="feather icon-send"></i></span>
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