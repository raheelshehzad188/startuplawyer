<style>
    .action-btns .btn{
        display:none;
    }
</style>
<!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <h1>Add Variation</h1>
                        <?php $this->load->view('flash');?>
                        <a href="<?= base_url('admin/variation'); ?>/create/<?= $pid?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Add Variation</a>
                        <a href="<?= base_url('admin/attribute/'); ?>/all/<?= $pid?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light">Go to Attributes</a>
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>sku</th>
                                    <th>Price</th>
                                    <th>Attributes</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=1;
                                    foreach ($data as $key => $value) {
                                        $modal->table = 'product_to_variations';
                                        $attr = $modal->get(array('pid'=>$value['id']));
                                        $CI = get_instance();
                                        $CI->load->model('Genres_model');
                                ?>     
                                <tr role="row" class="odd">
                                    <td class=""><?= $i++;?></td>
                                    
                                    <td class="product-name"><?= $value['id'];?></td>
                                    <td class="product-name"><?= $value['sku'];?></td>
                                    <td class="product-name"><?= $value['price'];?></td>
                                    <td class="product-name"><?php
                                    $modal->table = 'attribute_to_value';
                                     foreach ($attr as $key => $v) {
                                         $attri = $modal->getbyid($v['value']);
                                        if($attri)     
                                        echo $v['name'].":".$attri->name.'<br>';
                                    }
                                    ?></td>
                                    <td class="product-action">
                                        <a href="<?= $url.'/create/'.$pid.'/'.$value['id'];?>">
                                            <span class="action-edit"><i class="feather icon-edit"></i></span>
                                        </a>
                                        <a href="<?= $url.'/delete/'.$pid.'/'.$value['id'];?>">
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