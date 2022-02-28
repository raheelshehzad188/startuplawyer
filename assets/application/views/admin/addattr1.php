<div class="col-md-6 col-12" style="margin: 0 auto;">
    <?php
     $modal->table = 'category';
 $modal->key = 'id';
 $cats = $modal->get(array('status'=>'0'));
    ?>
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?> </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save_cat';?>/<?= (isset($edit)?$edit->id:''); ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </fieldset>
                                                        <?php
                                                            if(isset($edit->img) && $edit->img)
                                                            {
                                                                $pimg = $product->getimg($edit->img);
                                                        ?>
                                                        <img src="<?= $pimg;?>" width="40" height="40" />
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Name</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="name" placeholder="Name" value="<?= (isset($edit)?$edit->name:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Parent Catagary</label>
                                                            <select name="catID" class="form-control" id="catID">
                                                                <option value="0" >Parent Category</option>
                                                                <?php
                                                                foreach ($cats as $key => $value) {
                                                                    
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?=(isset($edit->parent) && ($value['id'] == $edit->parent))?'selected':''; ?> >
                                                                        <?php   echo $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                        </fieldset>
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