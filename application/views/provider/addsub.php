<div class="col-md-6 col-12" style="margin: 0 auto;">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?php echo $url.'/save';?>/<?= (isset($edit)?$edit->id:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Title</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="Title" value="<?= (isset($edit)?$edit->name:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Price</label>
                                                            <fieldset class="form-group position-relative">
                                                                <input  name="price" type="text" class="form-control" id="iconLeft2" placeholder="Price" value="<?= (isset($edit)?$edit->price:'') ?>">
                                                                <div class="form-control-position">
                                                                    $
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Discription</label>
                                                            <textarea name="discription" class="form-control" id="basicTextarea" rows="3" placeholder="Discription"><?= (isset($edit)?$edit->discription:'') ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Days</label>
                                                            <fieldset class="form-group position-relative">
                                                                <input type="text" id="email-id-vertical" class="form-control" name="days" placeholder="Days" value="<?= (isset($edit)?$edit->days:'') ?>">
                                                            </fieldset>
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