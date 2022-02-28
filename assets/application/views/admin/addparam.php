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
                                                            <label for="email-id-vertical">param Index</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="param Index" value="<?= (isset($edit)?$edit->post_title:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Param Key</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="param_key" placeholder="Param Key" value="<?= (isset($edit)?get_post_meta($edit->ID,'param_key',true):'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Extra Default Value</label>
                                                                <textarea name="param_value" class="form-control" id="basicTextarea" rows="3" placeholder="Default Value"><?php
                                                                    if($edit)
                                                                    {
                                                                        echo get_post_meta($edit->ID,'param_value',true);
                                                                    }
                                                                    ?></textarea>
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