<div class="row">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>Add Group</h3>
                            <?php
                            $CI = get_instance();
                            ?>
                        
                        </div>
                        <div class="ibox-content">
                            
                             <?php
                             if(isset($edit))
                             {
                              ?>
                              <form action="<?=base_url('admin/group/saveedit');?>" method="post"  enctype="multipart/form-data" class="form-horizontal">
                                <input type="hidden" name="groupID" value="<?= $edit['groupID'] ?>">
                              <?php
                             }
                             else
                             {
                              {
                              ?>
                              <form action="<?=base_url('admin/group/save');?>" method="post"  enctype="multipart/form-data" class="form-horizontal">
                              <?php
                             }
                             }

                             ?>
    
    <?php $this->load->view('flash') ?>
                                <div class="form-group"><label class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10"><input name="name" type="text" class="form-control"
                                      value="<?=(isset($edit))?$edit['name']:''?>" 
                                      ></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Group Image</label>

                                    <div class="col-sm-10">
                                        
                                     <input type="file" id="book_image" name="groupImage" accept="image/png, image/jpeg, image/jpg" class="form-control">
                                     <?php
                                     if(isset($edit))
                                     {
                                      $coverImg = $CI->Group_model->getMediaByID($edit['groupImage']);
                                      ?>
                                      <img src="<?= $coverImg->url ?>" width="50px">
                                      <?php
                                     }

                                     ?>

                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Group Description</label>

                                    <div class="col-sm-10">
                                        <textarea id="description" name="description" title="Let people know what the book is about" placeholder="Long enough to provide value to others" rows="5" class="form-control" data-parsley-maxlength="5000" value="">
                                          <?=(isset($edit))?$edit['description']:''?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Group Type</label>

                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="grouptypeID">
                                          <?php
                                          foreach ($types as $key => $value) {

                                           ?>
                                           <?php
                                           if(isset($edit)&& $edit['grouptypeID'] == $value['gtID'])
                                           {
                                            ?>
                                            <option value="<?= $value['gtID'] ?>" selected="true" ><?= $value['name'] ?></option>
                                            <?php
                                           }
                                           else
                                           {
                                            ?>
                                            <option value="<?= $value['gtID'] ?>"><?= $value['name'] ?></option>
                                            <?php
                                           }
                                           ?>
                                           
                                           <?php
                                          }                                          ?>
                                        
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Group Language</label>

                                    <div class="col-sm-10">
                                    <select class="form-control m-b" name="langID">
                                  <?php
                                          foreach ($list as $key => $value) {
                                           ?>
                                           <?php
                                           if(isset($edit) && $edit['langID'] == $value['id'])
                                           {
                                            ?>
                                            <option value="<?= $value['id'] ?>" selected="true" ><?= $value['value'] ?></option>
                                            <?php
                                           }
                                           else
                                           {
                                            ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                                            <?php
                                           }
                                           ?>
                                           <?php
                                          }                                          ?>
                                    </select>
                                    </div>
                                </div>
                               
                               
                              



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add Group</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
