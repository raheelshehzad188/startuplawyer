<div class="container">
		<div class="register">
			<div class="">
				<div class="formarea">
					<h2>Create Group</h2>
					
					<form action="<?=base_url('groups/save');?>" method="post"  enctype="multipart/form-data" class="form-horizontal">
						<?php $this->load->view('flash') ?>
                            <div class="form-group">
                                <label name="name">Group Name:</label>
                                <input id="name" name="name" class="form-control" data-parsley-required="" maxlength="255">
                            </div>
                            
                            <div class="form-group ">
                                <label class="my-top-spacing" title="Recommended size 800x400, 2:1 ratio. Max file size is 5 MB">Group Profile Image</label>
                                <input type="file" name="groupImage ">                           
                            </div>
                        
                            <div class="form-group">
                                <label name="description">Group Description:</label>
                                <textarea id="description" name="description" rows="10" placeholder="Write a few words about this group" class="form-control" data-parsley-required="" data-parsley-maxlength="255"></textarea>
                            </div>            
                            <div class="form-group">
                                <label name="type_id">Group Type:</label>
                                <select class="form-control m-b" name="grouptypeID">
                                          <?php
                                          foreach ($types as $key => $value) {

                                           ?>
                                           <option value="<?= $value['gtID'] ?>"><?= $value['name'] ?></option>
                                           
                                           <?php
                                          }                                          ?>
                                        
                                    </select>
                            </div>
                            
	                        <div class="form-group">
	                          <label for="language_id">Group Language:</label>
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
	                            
                            
                            <input type="submit" class="btn btn-default" value="Create Group">
                        </form>
				</div>
			</div>
		</div>	
		
	</div>	