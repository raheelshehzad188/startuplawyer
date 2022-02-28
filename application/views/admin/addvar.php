<?php
$sel_attr = array();
if($edit)
{
    $modal->table = 'product_to_variations';
    $attr = $modal->get(array('pid'=>$edit->id));
    foreach($attr as $k => $v)
    {
        $sel_attr [] = $v['value'];
    }
}
?>
<div class="col-md-6 col-12" style="margin: 0 auto;">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?> </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($pid)?$pid:''); ?>/<?= (isset($edit)?$edit->id:'')?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <?php
                                                    //$pid
                                                    $pattr = array();
                                                    $modal->table = 'product_to_attributes';
                                                    $modal->key = 'id';
                                                    $att = $modal->get(array('pid'=>$pid,'status'=>0));
                                                    foreach($att as $k=> $v)
                                                    {
                                                        if(!empty($v['name']))
                                                        {
                                                            $modal->table = 'attribute_to_value';
                                                    $modal->key = 'id';
                                                    $val = $modal->get(array('aid'=>$v['id'],'status'=>0));
                                                            //attribute_to_value
                                                            
                                                        ?>
                                                        <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical"><?=$v['name']?></label>
                                                            <select id="email-id-vertical" name="attributes[<?=sanitize_title($v['name']);?>]" class="form-control" name="name">
                                                                <option value=""  > Select <?=$v['name'];?></option>
                                                                <?php
                                                                foreach($val as $kk => $vv)
                                                                {
                                                                    ?>
                                                                    <option value="<?= $vv['id'] ?>" <?= (isset($sel_attr) && in_array($vv['id'], $sel_attr))?"selected":""; ?> ><?= $vv['name'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">SKU</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="sku" placeholder="SKU" value="<?= (isset($edit)?$edit->sku:time()) ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Price</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="price" placeholder="Value" value="<?= (isset($edit)?$edit->price:'') ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>