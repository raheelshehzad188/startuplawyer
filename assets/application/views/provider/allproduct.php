
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Total Sale</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        $pimg = ot_get_option( 'product_default_image', '' );
                                        if($nurl = get_the_post_thumbnail_url($value['ID']))
                                        {
                                            $pimg = $nurl;
                                        }
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $i++;?></td>
                                    
                                    <td class="product-name"><img width="50" src="<?= $pimg; ?>"><?= $value['name']?></td>
                                    <td class="product-name"><?= $value['post_title'] ?></td>
                                    <td class="product-name"><?= get_post_meta($value['ID'], '_regular_price',true);?></td>
                                    <td class="product-name"><?php $terms = get_the_terms( $value['ID'], 'product_cat' );
                                    foreach($terms as $sing)
                                    {
                                        echo $sing->name.'<br>';
                                    }
?></td>
<td class="product-name"><?= $value['sale'];?></td>
                                    <td class="product-name"><?php
                                        if($value['post_status'] == 'draft')
                                        {
                                            ?>
                                            <span class="badge badge-info">Pending Approval</span>
                                            <?php
                                        }
                                        elseif($value['post_status'] == 'publish')
                                        {
                                            ?><span class="badge badge-success">Publish</span><?php
                                        }
                                        elseif($value['post_status'] == 'trash')
                                        {
                                            ?><span class="badge badge-danger">Delete</span><?php
                                        }
                                    ?></span></td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/create/'.$value['ID'];?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= $url.'/delete/'.$value['ID'];?>">
                                            <span class="action-delete"><i class="feather icon-trash"></i></span>
                                        </a>
                                        <a href="<?= get_post_permalink($value['ID']);?>">
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