<div class="container">
		<div class="mygroup myBooks">
			<div class="row">
			    <div class="col-sm-8 col-md-10">
			        <h2>My Library (<?= count($data) ?>)</h2>
			    </div>
			    <div class="col-sm-4 col-md-2">
			        <a href="<?= base_url('books/addbook') ?>" class="btn btn-lg btn-block btn-primary btn-h2-spacing">Add Book</a>
			    </div>
			</div>
			<div class="row col-md-12">
			    <hr>
			</div>
			<div class="col-md-12">
				<div class="table-responsive">
			        <table class="table table-condensed table-hover">
	                
	                    <thead>
		                    <tr><th>#</th>
		                    <th></th>
		                    <th>Title</th>
		                    <th>Author</th>
		                    <th>Genre</th>
		                    <th>Created</th>
		                    <th></th>
		                    </tr>
		                </thead>
	                    <tbody>
	                    	<?php
	                    	foreach ($data as $key => $value) {
	                    		$CI = get_instance();
							$coverImg = $CI->Book_model->getMediaByID($value['coverImg']);
							$authorID = $CI->Book_model->getAuthorByID($value['authorID']);
							$genres = $CI->Book_model->getGenreByBookID($value['bookID']);
							$lang = $CI->Book_model->getLangByBookID($value['bookID']);
	                    		?>
		                    <tr>
		                        <th>
		                            <?= $key+1; ?>
		                        </th>
		                        <td>
		                        	<a href="#"><img alt="Poetry" src="<?= $coverImg->url ?>" class="center-block" width="100" height="150"></a>
								</td>
		                        <td><?= $value['title'] ?> 
		                        </td>
		                        <td><?= $authorID->name ?></td>
		                        <td>
		                        	<?php
							foreach ($genres as $key => $lng) {
								?>
								<label class="label label-info">
									<?=$lng['name']?></label>
									<?php
							}
							?>
		                        </td>
		                        <td><?= date("m-d-Y", strtotime($value['create_at'])); ?></td>
		                        <td>
			                        <a href="<?= base_url('books/single/'); ?><?= $value['bookID'] ?>" class="btn btn-default btn-sm">View</a>
			                        <a href="<?= base_url('books/addbook'); ?>/<?= $value['bookID'] ?>" class="btn btn-default btn-sm">Edit</a>
			                        <?php if ($value['status']==0): ?>
			                        <a href="<?= base_url('books/hide'); ?>/<?= $value['bookID'] ?>" class="btn btn-default btn-sm">Disable</a>
			                    	<?php endif ?>
			                        <?php if($value['status']==1): ?>
			                        <a href="<?= base_url('books/show'); ?>/<?= $value['bookID'] ?>" class="btn btn-default btn-sm">Enable</a>
			                        <?php endif ?>
		                        </td>          
		                    </tr> 
		                    <?php
	                    	}
	                    	?>            
	                    </tbody>
	                </table>
	                <div class="text-center"></div>
	            </div>
            </div>
        </div>
	</div>