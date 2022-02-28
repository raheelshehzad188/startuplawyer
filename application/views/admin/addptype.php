
<div class="col-md-6 col-12" style="margin: 0 auto;">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?> </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit)?$edit->ID:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical"><?php
                                                                if(isset($reason))
                                                                echo "Reason";
                                                                else
                                                                echo "Name"; 
                                                            ?></label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="name" placeholder="<?php
                                                                if(isset($reason))
                                                                echo "Reason";
                                                                else
                                                                echo "Name";
                                                            ?>" value="<?= (isset($edit)?$edit->post_title:'') ?>">
                                                            <ul class="list-unstyled mb-0 mt-1">
                                                                <?php
                                        if($tag)
                                        {
                                            // var_dump($product->getmeta('post', $pid,'adv_filter', true));
                                          ?>
                                            <li class="d-inline-block mr-2">
                                                                    <fieldset>
                                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                                            <input type="checkbox" name="category" value="1" <?= (isset($edit) && $product->getmeta('post', $edit->ID,'adv_filter', true))?"checked":""; ?>>
                                                                            <span class="vs-checkbox">
                                                                                <span class="vs-checkbox--check">
                                                                                    <i class="vs-icon feather icon-check"></i>
                                                                                </span>
                                                                            </span>
                                                                            <span class="">Advance Filter Category</span>
                                                                        </div>
                                                                    </fieldset>
                                                                </li>
                                          <?php  
                                        }
                                        ?>
                                                                
                                                            </ul>
                                                        </div>
                                                        <?php
                                                        if(isset($city))
                                                        { 
                                                            $states = $modal->get(array('post_type'=>'state','post_status'=>'publish'));
                                                            // var_dump($states); 
                                                            ?>
                                                            <div class="form-group">
                                                            <label for="email-id-vertical"><?php
                                                                echo "State";
                                                            ?></label>
                                                            <select class="form-control" name="state" >
                                                                <option value="">Select State</option>
                                                                <?php
                                                                foreach($states as$k=>$v)
                                                                {
                                                                    ?>
                                                                    <option value="<?= $v['ID'] ?>" <?= ($v['ID'] == get_post_meta($edit->ID,'state',true)?"selected":"") ?>><?= $v['post_title'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                            <?php
                                                        }
                                                        ?>
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