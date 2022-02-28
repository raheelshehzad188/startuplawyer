<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash');?>
                        <a href="<?= $url.'/create/'?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Add New <?= $sing; ?></a>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>No</th>
                                    <th>index</th>
                                    <th>Key</th>
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
                                    
                                    <td class="product-name"><?= $value['post_title']?></td>
                                    <td class="product-name"><?= get_post_meta($value['ID'],'param_key',true); ?></td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/create/'.$value['ID'];?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= $url.'/delete/'.$value['ID'];?>">
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