<?php

$product = (isset($_REQUEST['product'])?$_REQUEST['product']:0);
$cat = (isset($_REQUEST['cat'])?$_REQUEST['cat']:0);
$modal->table = 'products';
$modal->key = 'id';
$pro = $modal->getbyid($product);
$modal->table = 'category';
$modal->key = 'id';
$cats = $modal->get(array('parent'=>$cat));
 if($cats && $cat)
 {
     
     ?>
     <div class="col-md-6 col-12">
         
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">SubCatagaries</label>
                                                            <select  name="scatID" class="form-control" id="scatID">
                                                                <option value="0" >Select Sub Category</option>
                                                                <?php
                                                                foreach ($cats as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (isset($pro->scatID) && $value['id'] == $pro->scatID)?'selected':''; ?> >
                                                                        <?php   echo $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                        </fieldset>
                                                    </div>
     <?php
 }
 if($cat == 3)
 {
     $modal->table = 'products';
     $products = $modal->get(array());
     ?>
     <div class="col-md-12 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Products</label> 
                                                            <?php
                                                            $edit = $pro;
                                        $ptags = array();
                                                            if(isset($edit))
                                                            {
                                                            $modal->table= 'product_to_packages';
                                                            $modal->key = 'id';
                                                            $db= $modal->get(array('pid'=>$edit->id));
                                                            foreach($db as $k=> $v)
                                                            {
                                                               $ptags[] = $v['tid'];
                                                            }
                                                            }
                                                            ?>
                                                            <select class="select2 form-control" name="products[]"    multiple="multiple">
                                                                <?php
                                                                if(isset($pro))
                                                                {
                                                                    $arr = $ptags;
                                                                    foreach ($products as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (in_array($value['id'], $arr)?'selected="true"':'')?>><?= $value['name'];?></option>
                                                                    <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                 foreach ($products as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>"><?= $value['name'];?></option>
                                                                    <?php
                                                                }   
                                                                }
                                                                
                                                                ?>
                                                                >
                                                            </select>
                                                        </fieldset>
                                                    </div>
     <?php
 }
 elseif($cat == 2)
 {
     ?>
     <fieldset class="form-group">
                                                            <label for="basicInputFile">Downloadable Link:</label>
                                                                 <input type="text" id="email-id-vertical" class="form-control" name="dlink" placeholder="Link" value="<?= (isset($pro)?$pro->dlink:''); ?>">
                                                        </fieldset>
                                                        <?php
                                                        ?>
     <?php
 }
 exit();
?>