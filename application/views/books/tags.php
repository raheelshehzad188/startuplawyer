<div class="container">
		<div class="tags">
			<div class="row">
	            <div class="col-md-8">
	                <div>
	                    <div>
	                        <h2>Tags</h2>
	                    </div>   
	                    <div>
	                        <hr>
	                    </div> 
	                </div>
	                <?php $this->load->view('flash'); 	?>
	                <div class="table-responsive">
		                <table class="table table-condensed">
		                    <thead>
		                    <tr><th>#</th>
		                    <th>Name</th>                                       
		                    <th>Type</th>                                       
		                    <th>Created</th>
		                    <th></th>
		                    </tr></thead>
		                    <tbody> 
		                        
		                        <?php
		                        foreach ($data as $key => $value) {
		                        	?>
		                        	<tr>
			                        <th><?= $key+1 ?></th> 
			                        <td><?= $value['name']?></td>
			                        <td>
			                        	<?php
			                        	if($value['type'] == 0)
			                        	{
			                        		?>
			                        		<label class="label label-success">Public</label>

			                        		<?php
			                        	}
			                        	else
			                        		{
			                        		?>
			                        		<label class="label label-danger">Private</label>

			                        		<?php
			                        	}
			                        	?>
		                                    
		                            </td>
		                            <td>2 Oct 2019, 13:26</td>                                
		                            <td><a href="#" class="btn btn-default btn-sm">Edit</a></td>
		                            <td><a href="<?= base_url('books/deleteTags/') ?><?= $value['tagID'] ?>" class="btn btn-default btn-sm">Delete</a></td>
		                        </tr>

		                        	<?php
		                        }
		                        ?>  
		                    </tbody>
		                </table>
	                </div>
	                <div class="text-center"></div>  
	            </div>
	            <div class="col-md-3">    
		            <div class="well">
		                <div class="panel-heading"><h3>Add New Tag</h3></div>
		                <div class="panel-body">
		                    <form id="book_form" action="<?=base_url('books/saveTags');?>" enctype="multipart/form-data" method="post" class="form-orizontal">
		                    	
		                        <div class="form-group">
		                            <label name="name">Name:</label>
		                            <input id="name" name="name" class="form-control" data-parsley-required="" data-parsley-maxlength="255">
		                        </div>
		                        <div class="checkbox">
		                            <label><input type="radio" name="type" value="1" data-parsley-required="" data-parsley-maxlength="255" selected="" data-parsley-multiple="privacy">Private <input type="radio" name="type" data-parsley-required="" value="0" data-parsley-maxlength="255" data-parsley-multiple="privacy">Public</label>
		                        </div>
		                        <input type="submit" value="Add Tag" class="btn btn-success btn-lg btn-block">
		                    </form>
		                </div>
		            </div>            
		        </div>
	        </div>
        </div>
		
	</div>