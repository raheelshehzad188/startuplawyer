<div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3>Add Book</h3>
                            <!--<div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>-->
                        </div>
                        <div class="ibox-content">

                                <?php
                                if(isset($edit))
                                {
                                    ?>
                                    <form id="book_form" action="<?=base_url('admin/book/saveedit');?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                        <input type="hidden" name="bookID" value="<?=$edit['bookID']?>" >
                                    <?php

                                }
                                else
                                {
                                    ?>
                                    <form id="book_form" action="<?=base_url('admin/book/save');?>" enctype="multipart/form-data" method="post" class="form-horizontal">
                                    <?php

                                }
                                ?>
        <?php 
        $CI = get_instance();
        $this->load->view('flash'); ?>
                                <div class="form-group"><label class="col-sm-2 control-label">Title</label>

                                    <div class="col-sm-10"><input type="text" name="title" class="form-control"
                                        value="<?= (isset($edit['title']))?$edit['title']:''; ?>" 
                                        ></div>
                                </div>
                                
                                <div class="form-group">
                                     <div class="ui-widget">
                                      <label for="birds" class="col-sm-2 control-label">Author: </label>
                                     
                                     <div class="col-sm-10"> <input class="form-control" id="author" name="author"
                                      value="
                                    <?php
                                    if(isset($edit['authorID']))
                                    {
                                    echo $authorID = $CI->Book_model->getAuthorByID($edit['authorID'])->name;
                                    }
                                    
                                    ?>">
                                      <input id="author_id" type="hidden" name="author_id" 
                                    value=" " 
                                      ></div>
                                    </div> 
                                </div>
                              
 
<div>
  <div id="log" ></div>
</div>


                                <div class="form-group"><label class="col-sm-2 control-label">Book type</label>

                                    <div class="col-sm-10">
                                        <label> <input type="radio"  value="0" <?= (isset($edit) && $edit['typeID'] == 0)?'checked=""':''; ?> id="optionsRadios1" name="typeID"> Fiction</label>
                                        <label> <input type="radio" value="1" id="typeID2" name="typeID"
                                            <?= (isset($edit) && $edit['typeID'] == 1)?'checked=""':''; ?>
                                            > Non Fiction</label>
                                    </div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">Genres</label>
                                    <?php
                                    if(isset($edit))
                                    {
                                        $selGen = array();
                                        $genre = $CI->Book_model->getGenreByBookID($edit['bookID']);
                                        // print_r($genre);
                                        foreach ($genre as $key => $value) {
                                            $selGen[] = $value['genre_id'];
                                        }
                                    }

                                    ?>

                                    <div class="col-sm-10"><select name="genres" id="genres" multiple="multiple" class="form-control">
    <?php
    foreach ($generes as $key => $value) {
        ?>
        <?php
        if(in_array($value['genreID'], $selGen))
        {
            ?>
            <option value="<?= $value['genreID']; ?>" selected="true"><?= $value['name']; ?></option>
            <?php
        }
        else{
            ?>
            <option value="<?= $value['genreID']; ?>"><?= $value['name']; ?></option>
            <?php
        }

        ?>
        
        <?php
    }
    ?>
    
    
</select>
<input type="hidden" name="genres_id" id="genres_id">
</div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tags</label>
                                    <?php
                                    if(isset($edit))
                                    {
                                        $selTag = array();
                                        $genre = $CI->Book_model->getTagsByBookID($edit['bookID']);
                                        foreach ($genre as $key => $value) {
                                            $selTag[] = $value['tag_id'];
                                        }
                                    }

                                    ?>

                                    <div class="col-sm-10"><select name="tags" id="tags" multiple="multiple" class="form-control">
    <?php
    foreach ($tags as $key => $value) {
        ?>
        <?php
        if(in_array($value['tagID'], $selTag))
        {
            ?>
            <option value="<?= $value['tagID']; ?>" selected="true"><?= $value['name']; ?></option>
            <?php
        }
        else{
            ?>
            <option value="<?= $value['tagID']; ?>"><?= $value['name']; ?></option>
            <?php
        }

        ?>
        <?php
    }
    ?>
    
    
</select>
<input type="hidden" name="tags_id" id="tags_id">
</div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">ISBN number:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" 
                                        name="isbnNO"
                                        value="<?= (isset($edit['isbnNO']))?$edit['isbnNO']:''; ?>" 
                                        ></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Book language:</label>
                                    <?php
                                    if(isset($edit))
                                    {
                                        $selLng = array();
                                        $langs = $CI->Book_model->getLangByBookID($edit['bookID']);
                                        foreach ($langs as $key => $value) {
                                            $selLng[] = $value['id'];
                                        }
                                    }

                                    ?>

                                    <div class="col-sm-10"><select name="list" id="list" multiple="multiple" class="form-control">
    <?php
    foreach ($list as $key => $value) {
        ?>
        <?php
        if(in_array($value['id'], $selLng))
        {
            ?>
            <option value="<?= $value['id']; ?>" selected="true"><?= $value['value']; ?></option>
            <?php
        }
        else{
            ?>
            <option value="<?= $value['id']; ?>"><?= $value['value']; ?></option>
            <?php
        }

        ?>
        <?php
    }
    ?>
    
    
</select>
<input type="hidden" name="list_id" id="list_id"></div>
								</div>
                                <div class="form-group"><label class="col-sm-2 control-label">Group:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
								</div>

                                <div class="form-group"><label class="col-sm-2 control-label">Book description:</label>

                                    <div class="col-sm-10">
										<textarea id="description" name="discription" title="Let people know what the book is about" placeholder="Long enough to provide value to others" rows="5" class="form-control" data-parsley-maxlength="5000" 
                                        >
                                            <?= (isset($edit['discription']))?$edit['discription']:''; ?>
                                        </textarea>
									</div>
								</div>
								<!-- summernote  -->

									<div class="form-group"><label class="col-sm-2 control-label">Cover Image:</label>

										<div class="col-sm-10">
											<input type="file" id="book_image" name="book_image" accept="image/png, image/jpeg, image/jpg" class="form-control">
                                            <?php
                                            if(isset($edit))
                                            {
                                                $coverImg = $CI->Book_model->getMediaByID($edit['coverImg']);
                                                ?>
                                                <img src="<?= $coverImg->url ?>" width="50px" height="auto">
                                                <?php
                                            }
                                            ?>
										</div>
									</div>
								</div>


                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <?php
                                if(isset($edit))
                                {
                                    ?>
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Update Book</button>
                                    <?php

                                }
                                else
                                {
                                    ?>
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add Book</button>
                                    <?php

                                }
                                ?>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
