<style>
.form-horizontal .form-group {
margin-left: 0px !important;

}
</style>
<div class="container">
	<div class="addbooks">
		<div class="row">
			<?php $this->load->view('flash'); ?>
		</div>
		<div class="row">
			<div class="col-md-4 my-top-spacing">
				<div class="panel panel-default">
					<div class="panel-heading">Import Books From CSV File</div>
					<div class="panel-body">
						<form id="book_form" action="<?=base_url('books/savecsv');?>" enctype="multipart/form-data" method="post" class="form-horizontal">
							
							<div class="form-group">
								<label for="csv_file" class="col-md-4 control-label">Select file</label>
								<div class="col-md-8">
									<input id="csv_file" type="file" class="form-control" name="csv_file" required="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox text-danger">
										<label>
											<input type="checkbox" name="header" checked=""> File must have headers
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
									Load file
									</button>
								</div>
							</div>
							<div><strong>Headers</strong>: title,author,isbn,book_type,language,genre,<br/>location</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8 my-top-spacing">
				<div class="panel panel-default">
					<div class="panel-heading"><h3><?= isset($edit)?"Edit":"Add" ?> New Book </h3></div>
					<div class="panel-body">
						<?php
						$CI = get_instance();
						if(isset($edit))
							{
								// print_r($edit);.
						?>
						<form id="book_form" onsubmit="return front_form();" action="<?=base_url('books/saveedit');?>" enctype="multipart/form-data" method="post" class="form-horizontal">
							<input type="hidden" name="bookID" value="<?=$edit['bookID']?>" >
							<?php
							}
							else
							{
							?>
							<form id="book_form" onsubmit="return front_form();" action="<?=base_url('books/save');?>" enctype="multipart/form-data" method="post" class="form-horizontal">
								<?php
								}
								?>
								
								
								<div class="form-group">
									<label name="title">Title:</label>
									<input id="title" name="title" class="form-control" value="<?= (isset($edit['title']))?$edit['title']:''; ?>" data-parsley-required="" data-parsley-maxlength="255">
								</div>
								<div class="form-group">
									<div class="ui-widget">
										<label for="birds">Author: </label>
										<input id="author" class="form-control" name="author"
										value="<?php
										if(isset($edit['authorID']))
										{
										echo $authorID = $CI->Book_model->getAuthorByID($edit['authorID'])->name;
										}
										?>">
										<input id="author_id" type="hidden" name="author_id"
										value="<?= (isset($edit['authorID']))?$edit['authorID']:''; ?>"
										>
									</div>
								</div>
								
								<div class="form-group">
									<label name="book_type_id">Book type:</label>
									<label class="radio-inline"><input type="radio" id="genre_type_id" name="typeID" <?= (isset($edit) && $edit['typeID'] == 0)?'checked=""':''; ?> value="0" checked="" data-parsley-multiple="typeID">fiction</label>
									
									<label class="radio-inline"><input type="radio" id="genre_type_id" name="typeID" <?= (isset($edit) && $edit['typeID'] == 1)?'checked=""':''; ?> value="1" data-parsley-multiple="typeID">nonfiction</label>
								</div>
								<div class="form-group">
									<label name="genres">Genres:</label>
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
									<select class="form-control" name="genres" id="genres">
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
								<div class="form-group">
									<label name="tags">Tags:</label><?php
									if(isset($edit))
									{
									$selTag = array();
									$genre = $CI->Book_model->getTagsByBookID($edit['bookID']);
									foreach ($genre as $key => $value) {
									$selTag[] = $value['tagID'];
									}
									// print_r($selTag);
									}
									?>
									<select class="form-control" name="tags" id="tags"  multiple="true">
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
								
								<div class="form-group">
									<label name="title">ISBN number:</label>
									<input id="" name="isbnNO" class="form-control" value="<?= (isset($edit['isbnNO']))?$edit['isbnNO']:''; ?>" data-parsley-required="" data-parsley-maxlength="255">
								</div>
								<div class="form-group">
									<label name="location">Location :</label>
									<input id="" name="location" class="form-control" value="<?= (isset($edit['location']))?$edit['location']:''; ?>">
								</div>
								<div class="form-group">
									<label name="language_id">Book language:</label>
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
									
									<select class="form-control" name="list" id="list" >
										<?php
										foreach ($list as $key => $value) {
										?>
										<?php
										if(in_array($value['id'], $selLng))
										{
										?>
										<option value="<?= $value['id']; ?>" ><?= $value['value']; ?></option>
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
									<input type="hidden" name="list_id" id="list_id">
								</div>
								<div class="form-group">
									<label for="group_id">Group:</label>
									<?php if (count($group)>0): ?>
									<select name="group_id" id="group_id" class="form-control">
										
										<!--if its a library group and the owner is logged in or if it's not a library group add the group to the dropdown list -->
										<!--This is to prevent users from adding books to libraries where they are only members and not owners-->
										<?php foreach ($group as $key => $value): ?>
										<option value="<?= $value['groupID'] ?>" ><?= $value['name'] ?> </option>
										<?php endforeach ?>	
									</select>
									<?php else: ?>
										<a href="<?= base_url().'books/addGroup'; ?>" class="btn btn-success">Create New Group</a>
									<?php endif ?>
								</div>
								<div class="form-group">
									<label name="description">Book description:</label>
									<textarea id="description" onkeyup="setTextArea(this)" name="discription" title="Let people know what the book is about" placeholder="Long enough to provide value to others" rows="5" class="form-control" data-parsley-maxlength="5000" value="" ><?= (isset($edit['discription']))?$edit['discription']:''; ?></textarea>
								</div>
								<div class="form-group">
									<label name="book_image">Image:</label>
									<input type="file" id="book_image" name="book_image" accept="image/png, image/jpeg, image/jpg" class="form-control" <?= isset($edit)?'':'required' ?>>
									<p>Image size should be 350px by 600px</p>
									<?php
									if(isset($edit))
									{
									$coverImg = $CI->Book_model->getMediaByID($edit['coverImg']);
									?>
									<img style="height:50px;width:50px" src="<?= $coverImg->url ?>" width="50px" height="50">
									<?php
									}
									?>
								</div>
								
								
								<input type="submit" value="<?= isset($edit)?"Edit":"Add" ?> Book" class="btn btn-success btn-lg btn-block">
								
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	