<style>
    .action-btns{
    display:none !important;    
    }
</style>
<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <a href="<?= $url; ?>/create" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Add Service Provider</a>
                        <a href="<?= $url; ?>/export" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Export</a>
                        <?php $this->load->view('flash');?>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
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
                                        // var_dump($value->roles);
                                        // die();
                                        $roles = $value->roles;
                                        if(in_array('service_provider',$roles) ||in_array('draft_provider',$roles))
                                        {
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $value->ID;?></td>
                                    <td class=""><?= $product->getmeta('user',$uid,'first_name',true).' '.$product->getmeta('user',$uid,'last_name',true);?></td>
                                    <td class=""><?= $value->user_email?></td>
                                    
                                    </td>
                                    <td class="product-action">
                                        <select class="form-control" id="provirder_<?= $uid; ?>" onchange="service_provider('<?= $uid; ?>')">
                    <option>Select Action</option>
                    <option value="edit">Edit</option>
                    <option value="delete">Delete</option>
                    <option value="login">Login as Service Provider</option>
                </select>
                                    </td>
                                </tr>
                                <?php
                                        }//check role
                                        }
                                     ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->
                </section>
                <!-- Data list view end -->
                <button type="button" id="modalBtn" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#inlineForm" style="visibility: hidden;">
                            Launch Modal
                        </button>
                        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Please Wait </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                        <div class="modal-body">
                                            <label>Email: </label>
                                            <div class="form-group">
                                                <input type="text" placeholder="Email Address" class="form-control">
                                            </div>

                                            <label>Password: </label>
                                            <div class="form-group">
                                                <input type="password" placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                </div>
                            </div>