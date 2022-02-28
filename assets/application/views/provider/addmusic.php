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
                                                        <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" value="1" class="custom-control-input" <?= (isset($edit) && $edit->album_img == 1)?'checked=""':''; ?> name="album_img" id="album_img">
                                                        <label class="custom-control-label" for="album_img">Use album image </label>
                                                    </div>
                                                        <?php
                                                            if(isset($edit) && $edit->mediaID && isset($edit->mediaID))
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
                                                            <label for="basicInputFile">Audio</label>
                                                            <div class="custom-file">
                                                                <input type="file" name=" audio" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </fieldset>
                                                        <?php
                                                            if(isset($edit) && $edit->audioID && isset($edit->audioID))
                                                            {
                                                        $CI = get_instance();

                                                        $CI->load->model('Genres_model');
                                                        $media = $CI->Genres_model->getMediaByID($edit->audioID);
                                                        ?>
                                                        <a href="<?= base_url().$media->localPath;?>" target="_blank">Open</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Music Album</label>
                                                            <select class="form-control" name="albumID" id="basicSelect">
                                                                <?php
                                                                foreach ($albums as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>" <?= (isset($edit) && ($edit->albumID == $value['id'])?'selected="true"':'')?>><?= $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                >
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Artist</label>
                                                            <select class="form-control" name="artistID" id="basicSelect">
                                                                <?php
                                                                foreach ($artists as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $value['id'];?>"><?= $value['name'];?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                                >
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInputFile">Music Ganarie</label>
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