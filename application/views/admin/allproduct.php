<style>
    .action-btns .btn{
        display:none;
    }
</style>
<div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="action-btns d-none">
                        <div class="btn-dropdown mr-1 mb-1">
                            <div class="btn-group dropdown actions-dropodown">
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                    <?php $this->load->view('flash');?>
                        <form id="bulk_action" action ="<?= base_url('admin/products'); ?>/bulk_action" style="display: inline-block;">
                            <select class="form-control" name="action" onchange="bulk_action()">
                                    <option value="">Bulk Action</option>
                                    <option value="delete">Delete</option>
                                    <option value="publish">Publish</option>
                                    <option value="unpublish">UnPublish</option>
                                    <option value="export">Export</option>
                                                    </select>
                                                    <input type="hidden" id="bulk_products" name="products" />
                            
                        </form>
                        <a href="<?= base_url('admin/products'); ?>/create" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Add Product</a>
                        <a href="<?= base_url('admin/products'); ?>/all_categories" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Product Categories</a>
                        <a href="<?= base_url('admin/products'); ?>/export" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light">Export</a>
                        <a onclick="custom_modal('import_form')" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Import</a>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="all_check" value="all" /></th>
                                    <th>SKU</th>
                                    <th>Last Modified</th>
                                    <!--<th>Image</th>-->
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Service Provider</th>
                                    <th>Parent Category</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        $url = base_url('index/product/').$value['slug'];
                                        $pimg = $product->getimg($value['img']);
                                ?>     
                                <tr role="row" class="odd">
                                    <td><input type="checkbox" class="pro_check" value="<?= $value['id'] ?>" /></td>
                                    <td class=""><?= $value['sku']; ?></td>
                                    <td class=""><?= $value['last_mod']; ?></td>
                                    
                                    <!--<td class="product-name"><a href="<?= $url ?>" target="_blank"><img width="50" src="<?= $pimg; ?>"></a></td>-->
                                    <td class="product-name"><a href="<?= $url ?>" target="_blank"><?= $value['name'] ?></a></td>
                                    <td class="product-name"><?= $value['price'];?></td>
                                    <td class="product-name"><?php 
                                        $author = $value['uid'];
                                        if($author)
                                        {
                                            $user = $product->getuser($author);
                                            if($user)
                                            
                                        echo $author.'- '.$user->full_name;
                                        }
                                        else
                                        {
                                            echo "---";
                                        }
                                                    ?></td>
                                    <td class="product-name"><?php
                                    $cat = $value['catID'];
                                    $cat = $product->getcat($cat);
                                    if($cat)
                                    {
                                        echo $cat->name;
                                    }
?></td>
                                    <td class="product-name"><?php
                                        if($value['publish'] == '1')
                                        {
                                            ?>
                                            <span class="badge badge-info">UnPublish</span>
                                            <?php
                                        }
                                        elseif($value['publish'] == 0)
                                        {
                                            ?><span class="badge badge-success">Published</span><?php
                                        }
                                        elseif($value['status'] == 1)
                                        {
                                            ?><span class="badge badge-danger">Delete</span><?php
                                        }
                                        else
                                        {
                                            echo 'OK';
                                        }
                                    ?></span></td>
                                    <td class="product-action">
                                        <select class="form-control" id="product_<?= $value['id']; ?>" onchange="product_option('<?= $value['id']; ?>')">
                    <option>Select Action</option>
                    <option value="edit">Edit</option>
                    <?php
                    // echo $pro->type;
                    if($value['publish'] == 0)
                    {
                        ?>
                        <option value="view">View</option>
                        <option value="draft">Un-published</option>
                        <?php
                    }
                    else
                    {
                        ?>
                        <option value="publish">Publish</option>
                        <?php
                    }
                    if($value['type'] == 1)
                    {
                        ?>
                        <option value="attribute">Attribute</option>
                        <option value="variation">Variation</option>
                        <?php
                    }
                    if($value['catID'] == 1)
                    {
                        ?>
                        <option value="booking">Add Booking Slots</option>
                        <option value="slots">Slots Status</option>
                        <?php
                    }
                    if($value['catID'] == 4)
                    {
                        ?>
                        <option value="webinar">Add Webinar Slots</option>
                        <?php
                    }
                    ?>
                    <option value="duplicate">Duplicate</option>
                </select>
                                    </td>
                                </tr>
                                <?php
                                        }
                                     ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">List View Data</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name">
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-category"> Category </label>
                                            <select class="form-control" id="data-category">
                                                <option>Audio</option>
                                                <option>Computers</option>
                                                <option>Fitness</option>
                                                <option>Appliance</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-status">Order Status</label>
                                            <select class="form-control" id="data-status">
                                                <option>Pending</option>
                                                <option>Canceled</option>
                                                <option>Delivered</option>
                                                <option>On Hold</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-price">Price</label>
                                            <input type="text" class="form-control" id="data-price">
                                        </div>
                                        <div class="col-sm-12 data-field-col data-list-upload">
                                            <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                                <div class="dz-message">Upload Image</div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button class="btn btn-primary">Add Data</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
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
                            <script>
                                $('#all_check').change(function() {
    if(this.checked) {
        $('#bulk_products').val('all'); 
        $('.pro_check').each(function(i, obj) {
            console.log($(this).val());
        
    $(this).prop('checked', true);
        });

    }
    else
    {
                $('.pro_check').each(function(i, obj) {
    $(this).prop('checked', false);

});
    }
});$('.pro_check').change(function() {
    if(this.checked) {
        $('#bulk_products').val(' '); 
    }
    else
    {
    }
});
function bulk_action()
{
    if($('#bulk_action select').val() != '')
    {
        var pro = $('#bulk_products').val();
        if(pro != 'all')
        {
            var list = [];
            
$('.pro_check').each(function(i, obj) {
    if(this.checked) {
        list.push($(this).val());
        
    }
});
console.log(list);
$('#bulk_products').val(list.join());
//fruits.join()
        }
                    $('#modalBtn').click();

        show_loader();
        submit_form('bulk_action');
        
    }
}
                            </script>