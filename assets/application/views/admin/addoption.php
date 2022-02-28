<div class="col-md-6 col-12" style="margin: 0 auto;">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?> </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit->option_id)?$edit->option_id:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Param Key</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="option_name" placeholder="Param Key" value="<?= (isset($edit)?$edit->option_name:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile"> Value</label>
                                                                <textarea name="option_value" class="form-control" id="basicTextarea" rows="3" placeholder="Default Value"><?php
                                                                    if(isset($edit))
                                                                    {
                                                                        echo $edit->option_value;
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