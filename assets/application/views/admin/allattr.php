<style>
    .action-btns .btn{
        display:none;
    }
</style>
<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <?php $this->load->view('flash');?>
                        <h1>Add Attribute</h1>
                        <a href="<?= base_url('admin/attribute'); ?>/create/<?= $pid?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Add Attribute</a>
                        <a href="<?= base_url('admin/variation/'); ?>/all/<?= $pid?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Go to Variations</a>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>No</th>
                                    <th>Label</th>
                                    <th>Value</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        
                                        $exp = explode('|',$value['value']);
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $i++;?></td>
                                    
                                    <td class="product-name"><?= $value['name']?></td>
                                    <td class="product-name">
                                        <?php
                                        foreach($exp as $k => $v)
                                        {
                                        ?>
                                        <span><?= $v; ?></span>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="product-action">
                                        <a href="<?= base_url('admin/attribute').'/create/'.$pid.'/'.$value['id'];?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= base_url('admin/attribute').'/delete/'.$pid.'/'.$value['id'];?>">
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