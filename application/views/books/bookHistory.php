<div class="container">
		<div class="mygroup myBooks">
			<div class="row">
			    <div class="col-sm-8 col-md-10">
			        <h2><?= $title ?></h2>
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
		                    <?php if ($type=='borrow'): ?>
		                    <th>Owner</th>	
		                    <th>Owner Email</th>	
		                    <?php endif ?>
		                    <?php if ($type=='lent'): ?>
		                    <th>Lent to</th>	
		                    <th>Lent Email</th>	
		                    <?php endif ?>
		                    <th>date</th>
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
		                        <?php if ($type=='borrow'): ?>
		                        <td><?= $value['first_name'].' '.$value['last_name'] ?></td>	
		                        <td><?= $value['email'] ?></td>	
		                        <?php endif ?>	
		                        <?php if ($type=='lent'): ?>
		                        <td><?= $value['first_name'].' '.$value['last_name'] ?></td>	
		                        <td><?= $value['email'] ?></td>	
		                        <?php endif ?>	
		                        <td><?= date("m-d-Y", strtotime($value['date'])); ?></td>
		                        <td><a  href="<?= base_url().'books/chat/'.$value['barrowID'].'/'.$value['bookID'] ?>" class="btn btn-default">Message</a>
		                        	<?php if ($type=='lent'): ?>
		                        	<a  href="<?= base_url().'books/bookReturn/'.$value['barrowID'] ?>" class="btn btn-default">Book Received</a>	
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