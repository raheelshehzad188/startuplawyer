<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <a href="<?= $url; ?>/create" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Add User</a>
                        <?php $this->load->view('flash');?>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        $uid = $value->ID;
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $value->ID;?></td>
                                    <td class=""><?= $value->full_name;?></td>
                                    <td class=""><?= $value->user_email?></td>
                                    
                                    </td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/create/'.$uid;?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= $url.'/delete/'.$uid;?>">
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