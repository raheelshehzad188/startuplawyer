<div class="col-md-6 col-12" style="margin: 0 auto;">
                            <div class="card" style="height: auto;">
                                <div class="card-header">
                                    <h4 class="card-title"><?= $page; ?> </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit)?$edit->id:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Label</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="label" placeholder="Label" value="<?= (isset($edit)?$edit->label:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Category</label>
                                                            <select class="form-control" name="catID" id="basicSelect">
                                                                <?php
                                                                $modal->table = 'genres';
                                                                $genres = $modal->get(array('status'=> 0));
                                                                foreach ($genres as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (isset($edit) && ($edit->catID == $value['id'])?'selected="true"':'')?>><?= $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Resller</label>
                                                            <select class="form-control" name="rID" id="basicSelect">
                                                                <?php
                                                                $modal->table = 'users';
                                                                $modal->key = 'UserID';
                                                                $user = $this->session->userdata('knet_login');
                                                                $genres = $modal->get(array('roleID'=> 4,'status'=>0,'created_by'=>$user->UserID));
                                                                foreach ($genres as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['UserID'];?>" <?= (isset($edit) && ($edit->rID == $value['UserID'])?'selected="true"':'')?>><?= $value['first_name'].' '.$value['last_name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Quantity</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="qty" placeholder="Quantity" value="<?= (isset($edit)?$edit->qty:'') ?>">
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