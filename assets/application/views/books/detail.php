<div class="container">
		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
			</div>
		<?php endif ?>
		<?php if ($this->session->flashdata('warning')): ?>
			<div class="alert alert-warning alert-dismissible">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <strong>Warning!</strong> <?= $this->session->flashdata('warning'); ?>
			</div>
		<?php endif ?>
		<div class="singleBook">
			<div class="smalltext">
				<h3><?= $book['title'] ?></h3>
			</div>
			<div class="col-md-9 col-sm-9">
		        	
		        <div class="row">
		            <div class="my-top-spacing col-md-4">
		                <img  src="<?php echo cloudinary_url($book['img'], array('width' => 160, 'height' => 250, 'crop' => 'fill'));; ?>" >
		              
		             </div>
				     <div class="my-top-spacing col-md-8">
		                <div class="my-top-spacing">Description:</div>
			           	<span class="my-top-spacing textbox"><?= nl2br($book['discription']); ?></span>        
		            </div> 
		            </div>
		              
		        </div>
		    <!--</div>-->
		    <div class="col-md-3 col-sm-3">
		    	<div class="well">
            		<dl class="dl-vertical">
            		    
            		    <p><strong>Language: </strong>
		                <label style="margin-right: 3px;">
                        <strong title="English" class="rightbox-lable">
                		<?php
							foreach ($book['lang'] as $key => $lng) {
								if($key == 0)
								{
									echo $lng['name'];
								}
								else
								{
									echo ','.$lng['name'];
								}
							}
							?>
                    	</strong>
                    	
                    	</label>
                        </p>
                        
                        <p><strong>Author: </strong>
		                <label style="margin-right: 3px;">
		                	<strong class="rightbox-lable"><?= $book['author'] ?></strong>
		                </label>
                        </p>
                        
                        <p><strong>Tags: </strong>
		                <label style="margin-right: 3px;">
                         <?php
							foreach ($book['tags'] as $key => $lng) {
								?>
								<strong class="label label-warning"><?= $lng['name'] ?></strong>

								<?php
							}
							?>
							
							</label>
                        </p>
                        
                        
        			</dl>
		            <dl class="dl-vertical">
		                <strong>Genre: </strong>
		                <?php
							foreach ($book['genres'] as $key => $lng) {
							?><label style="margin-right: 3px;">
		                	<strong class="label label-warning"><?php echo $lng['name']; ?></strong>
		                </label><?php
																}
							?>
                    </dl>
                    <?php if (isset($book['location']) && trim($book['location'])!=''): ?>
                    <dl class="dl-vertical">
		                <strong>Location : </strong>
		               <label style="margin-right: 3px;" class="rightbox-lable">
		                	<?php echo trim($book['location']); ?>
		                </label>
                    </dl>
                    <?php endif ?>
                </div>
                <?php if ($book['uid']!=$user->UserID && !isset($book['isborrow']) && empty($book['isRequested'])): ?>
                <a href="<?= base_url()."index/borrow/".$book['bookID'] ?>" class="borrowBook">Borrow Book</a>
                <?php endif ?>
                <?php if ((isset($book['isRequested']) && !empty($book['isRequested'])) && !isset($book['isborrow'])): ?>
                <a  class="borrowBook">Requested</a>
                <?php endif ?>
                <?php if ($book['isborrow']): ?>
                	 <a class="borrowBook">Borrowed</a>
                <?php endif ?>
                
		    </div>
		</div>
	</div>
<div class="container" style="margin-bottom:30px;"><div id="disqus_thread"></div></div>
	<script>
    
	/**
	*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
	/*
	var disqus_config = function () {
	this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
	this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
	};
	*/
	(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://shareyourbook.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
	})();
	
	
	</script>
	
	                            