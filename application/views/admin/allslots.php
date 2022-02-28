<style>
    .action-btns{
        display:none !important;
    }
</style>
<div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <form id="bulk_action">
                        <input type="hidden" name="product_id" value="<?=$pid?>" />
                        <input type="hidden" id="bulk_products" name="products" />
                        <div class="bgrp">
                            <label>From date</label>
                            <input type="date" name="fdate" value="<?= (isset($_REQUEST['fdate']))?$_REQUEST['fdate']:""; ?>" />
                            
                        </div>
                        <div class="bgrp">
                            <label>To date</label>
                            <input type="date" name="tdate" value="<?= (isset($_REQUEST['tdate']))?$_REQUEST['tdate']:""; ?>" />
                        </div>
                        <div class="bgrp">
                            <button name="action" value="get">Submit</button>
                        </div>
                        <div class="bgrp">
                            <button onclick="bulk_action()">Block</button>
                        </div>
                    </form>
                    

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        
                        <?php $this->load->view('flash');
                                            // var_dump($edit);
                                            ?>
                                            
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="all_check" value="all" /></th>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                ?>     
                                <tr role="row" class="odd">
                                    <td><input type="checkbox" class="pro_check" value="<?= $value['id'] ?>" /></td>
                                    <td class=""><?= $i++;?></td>
                                    
                                    
                                    <td class="product-name"><?= $value['date']?></td>
                                    <td class="product-name"><?= $value['stime']?>-<?= $value['etime']?></td>
                                    <td class="product-name"><?php
                                        if($value['status'] == 0)
                                        {
                                            ?>
                                            <span class="badge badge-success badge-pill"> Active </span>
                                            <?php
                                        }
                                        else if($value['status'] == 1)
                                        {
                                            ?>
                                            <span class="badge badge-primary badge-pill"> Booked </span>
                                            <?php
                                        }
                                        else if($value['status'] == 2)
                                        {
                                            ?>
                                            <span class="badge badge-danger badge-pill"> Cancel </span>
                                            <?php
                                        }
                                    ?></td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/create/'.$value['id'];?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= $url.'/delete/'.$value['id'];?>">
                                            <span class="action-delete"><i class="feather icon-trash"></i></span>
                                        </a>
                                        <?php
                                        if(isset($album))
                                        {
                                            ?>
                                        <a href="<?= $url.'/feature/'.$value['id'];?>">
                                            <span class="action-delete"><i class="feather icon-plus"></i></span>
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
                                        <?php
                                        if($tag)
                                        ?>
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
    if(true)
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