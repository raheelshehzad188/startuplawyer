<section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="post" action="<?= $url.'/save';?>/<?= (isset($edit)?$edit->id:'') ?>" enctype="multipart/form-data">
                                            <?php $this->load->view('flash');?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Title</label>
                                                            <input type="text" id="email-id-vertical" class="form-control" name="title" placeholder="Title" value="<?= (isset($edit)?$edit->title:'') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">

                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Image</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </fieldset>
                                                        <?php
                                                            if(isset($edit) && $edit->mediaID)
                                                            {
                                                        $CI = get_instance();

                                                        $CI->load->model('Genres_model');
                                                        $media = $CI->Genres_model->getMediaByID($edit->mediaID);
                                                        ?>
                                                        <img src="<?= base_url().$media->localPath;?>" width="40" height="40" />
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Vimeo Video Id</label>
                                                            <div class="custom-file">
                                                                <input type="text" id="email-id-vertical" class="form-control" name="videoID" placeholder="Video ID" value="<?= (isset($edit)?$edit->videoID:'') ?>">
                                                            </div>
                                                        </fieldset>
                                                        
                                                        <!--
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Video</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="video" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </fieldset>
                                                        <?php
                                                            if(isset($edit) && $edit->mediaID)
                                                            {
                                                        $CI = get_instance();

                                                        $CI->load->model('Genres_model');
                                                        $media = $CI->Genres_model->getMediaByID($edit->mediaID);
                                                        ?>
                                                        <img src="<?= base_url().$media->localPath;?>" width="40" height="40" />
                                                        <?php
                                                        }
                                                        ?>-->
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Add Discription</label>
                                                                <textarea name="discription" class="form-control" id="basicTextarea" rows="3" placeholder="Discription"></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Trainers</label> 
                                                            <select class="select2 form-control" name="trainerID[]"    multiple="multiple">
                                                                <?php
                                                                if(isset($edit))
                                                                {
                                                                    $arr = explode(',', $edit->trainerID);
                                                                    foreach ($trainers as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (in_array($value['id'], $arr)?'selected="true"':'')?>><?= $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                }
                                                                else
                                                                {
                                                                 foreach ($trainers as $key => $value) {
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
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Related Artist</label> 
                                                            <select class="select2 form-control" name="artistID[]" id="basicSelect"  multiple="multiple">
                                                                <?php
                                                                if(isset($edit))
                                                                {
                                                                    $arr = explode(',', $edit->artistID);
                                                                    foreach ($artist as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (in_array($value['id'], $arr)?'selected="true"':'')?>><?= $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                }
                                                                else
                                                                {
                                                                 foreach ($artist as $key => $value) {
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
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Catagaries</label>
                                                            <select name="catID" class="form-control" id="basicSelect">
                                                                <?php
                                                                foreach ($genres as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>"><?= $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                        </fieldset>
                                                    </div
                                                    <div class="col-12">
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Calories</label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="calories" placeholder="Calories" value="<?= (isset($edit)?$edit->calories:'') ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Equipment</label> 
                                                            <input type="text" id="email-id-vertical" class="form-control" name="equipment" placeholder="Equipment" value="<?= (isset($edit)?$edit->equipment:'') ?>">
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
                    </div>
                </section>