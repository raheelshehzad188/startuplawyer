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
                                                            <label for="email-id-vertical">Email Subject</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="Subject" value="<?= (isset($edit)?$edit->post_title:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Email Key</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="email_key" placeholder="Key" value="<?= (isset($edit)?get_post_meta($edit->ID,'email_key',true):'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Main content</label>
                                                                <textarea name="discription" class="form-control" id="basicTextarea" rows="3" placeholder="Main content"><?= (isset($edit))?$edit->post_content:"";?></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Extra Css</label>
                                                                <textarea name="extra_css" class="form-control" id="basicTextarea" rows="3" placeholder="Extras css"><?php
                                                                    if($edit)
                                                                    {
                                                                        echo get_post_meta($edit->ID,'extra_css',true);
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