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
                                    <th>Label</th>
                                    <th>Type</th>
                                    <th>Quantity</th>
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
                                    
                                    <td class="product-name"><?= $value['label']?></td>
                                    <td class="product-name"><?php
                                    $modal->table = 'genres';
                                    $gen = $modal->getbyid($value['catID']);
                                     echo $gen->name;?></td>
                                    <td class="product-name"><?= $value['qty']?></td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/all/'.$value['id'];?>">
                                            <span class="action-delete"><i class="feather icon-eye"></i></span>
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