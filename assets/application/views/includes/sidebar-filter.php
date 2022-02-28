<aside class="col-lg-3" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

					

				<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="clearfix">

					</div>
					<!--<div class="rch_filter"  >-->
					<!--    <input/ type="text" id="srch" style="padding-left:18px;" placeholder="Search by Key words" >-->
					<!--    <div onclick="load_filter()" ><i class="fa fa-search" aria-hidden="true"></i></div>-->
					<!--</div>-->
					
						<?php
						if(isset($list))
						{
						    ?>
					<div class="sort_select">

							<select name="sort" id="parent_search">

                                <option value="0">What would you like to do</option>
                                	<?php
                                // 	$parent_search = explode(',',$_REQUEST['parent_search'])''
									$modal->table = 'wp_posts';
                                    $modal->key = 'ID';
                                    $recent_posts = $modal->get(array("post_type"=>'search'));
									foreach($recent_posts as $post) : ?>
									<option value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['parent_search']) && $_REQUEST['parent_search']== $post['ID'])?"selected":""; ?> ><?php echo $post['post_title'] ?></option>
									<?php endforeach;  ?>

							</select>

					</div>
					<?php
						}
					?>
					<div class="clearfix">
						<div class="sort_select">
							<select id="sort">
								<!--<option value="name-asc">Sort by Popularity</option>-->
								<option value="name-asc" selected="selected">Sort in Alphabetical Order</option>
								<option value="rate-asc">Sort by Average Rating</option>
								<option value="create_at-asc">Sort by newness</option>
								<option value="price-asc">Sort by Price: low to high</option>
								<option value="price-desc">Sort by Price: high to low</option>
							</select>
						</div>
						<a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i><span>Filters</span></a>
					</div>
					<div class="filter_col">
					    
						<?php
						if(!isset($list))
						{
						    ?>
					    <div class="filter_type">
							<h4><a href="#filter_15" data-toggle="collapse" class="closed collapsed" aria-expanded="false">What would you like to do</a></h4>
							<div class="collapse" id="filter_15" style="">
								<ul>
								<?php
								    $modal->table = 'wp_posts';
                                    $modal->key = 'ID';
                                    $recent_posts = $modal->get(array("post_type"=>'search'));
									foreach($recent_posts as $post) : ?>
						            <li>
										<label class="container_check"><?php echo $post['post_title'] ?><small></small>
											<input class="parent_check" type="checkbox" value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['parent_search']) && $_REQUEST['parent_search']== $post['ID'])?"checked":""; ?> >
											<span class="checkmark"></span>
										</label>
									</li>
							    <?php endforeach;  ?>
								</ul>
							</div>
							</div>
							<?php
						}
							?>
						<div class="inner_bt"><a href="#" class="open_filters"><i class="icon_close"></i></a></div>
						<div class="filter_type">
							<h4><a href="#filter_1" data-toggle="collapse" class="closed collapsed" aria-expanded="false">Categories</a></h4>
							<div class="collapse" id="filter_1" style="">
								<ul>
								    <?php
								        $cate = array();
								    if(isset($_REQUEST['cate']))
								    {
								        $cate = explode(',',$_REQUEST['cate']);
								    }//dist
										$modal->table = 'wp_posts';
                                        $modal->key = 'ID';
                                        $recent_posts = $modal->get_sort(array("post_type"=>'tag'),'post_title','asc');
										foreach($recent_posts as $post) : ?>
									<li>
										<label class="container_check"><?php echo $post['post_title'] ?><small></small>
											<input class="cate_check" type="checkbox" value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['cate']) && in_array($post['ID'],$cate))?"checked":""; ?> >
											<span class="checkmark"></span>
										</label>
									</li>
									<?php endforeach;  ?>
								</ul>
							</div>
							<!-- /filter_type -->
						</div>
						<!-- /filter_type -->
						<div class="filter_type">
							<h4><a href="#filter_2" data-toggle="collapse" class="closed collapsed" aria-expanded="false">Language</a></h4>
							<div class="collapse" id="filter_2" style="">
								<ul>
								<?php
								    $langs = array();
								    if(isset($_REQUEST['language']))
								    {
								        $langs = explode(',',$_REQUEST['language']);
								    }
								    $modal->table = 'wp_posts';
                                    $modal->key = 'ID';
                                    $recent_posts = $modal->get_sort(array("post_type"=>'search_language'),'post_title','asc');
									foreach($recent_posts as $post) : ?>
						            <li>
										<label class="container_check"><?php echo $post['post_title'] ?><small></small>
											<input class="lang_check" type="checkbox" value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['language']) && in_array($post['ID'],$langs))?"checked":""; ?> >
											<span class="checkmark"></span>
										</label>
									</li>
							    <?php endforeach;  ?>
								</ul>
							</div>
							</div>
						<!-- /filter_type -->
						<div class="filter_type">
							<h4><a href="#filter_3" data-toggle="collapse" class="closed collapsed" aria-expanded="false">District</a></h4>
							<div class="collapse" id="filter_3" style="">
								<ul>
									<?php
									$dist = array();
								    if(isset($_REQUEST['dist']))
								    {
								        $dist = explode(',',$_REQUEST['dist']);
								    }
										$modal->table = 'wp_posts';
                                        $modal->key = 'ID';
                                        $recent_posts = $modal->get_sort(array("post_type"=>'distric'),'post_title','asc');
										foreach($recent_posts as $post) : ?>
								    <li>
								        <label class="container_check"><?php echo $post['post_title'] ?><small></small>
								           <input class="dist_check" value="<?php echo $post['ID'] ?>" type="checkbox" <?= (isset($_REQUEST['language']) && in_array($post['ID'],$dist))?"checked":""; ?>>
								            <span class="checkmark"></span>
								        </label>
								    </li>
								    <?php endforeach;  ?>
								</ul>
							</div>
						</div>
						<!-- /filter_type -->
						<div class="filter_type">
							<h4><a href="#filter_4" data-toggle="collapse" class="closed">Service providers</a></h4>
							<div class="collapse" id="filter_4" style="">
        							<ul>
        								<?php
        								$from = array();
								    if(isset($_REQUEST['from']))
								    {
								        $from = explode(',',$_REQUEST['from']);
								    }
										$modal->table = 'wp_posts';
                                        $modal->key = 'ID';
                                        $recent_posts = $modal->get_sort(array("post_type"=>'search_from'),'post_title','asc');
										foreach($recent_posts as $post) : ?>
										
										<li>
								        <label class="container_check"><?php echo $post['post_title'] ?><small></small>
								           <input class="from_check" value="<?php echo $post['ID'] ?>" type="checkbox" <?= (isset($_REQUEST['from']) && in_array($post['ID'],$from))?"checked":""; ?>>
								            <span class="checkmark"></span>
								        </label>
								    </li>
										
										<?php endforeach; ?>
									</ul>
        						</div>
							</div>
							<div class="clearfix" ></div>
						<!-- /filter_type -->
						<div class="sort_select" style="max-width: 100%;">
							<select id="price">
								<option value="0" selected="selected">Price Filter</option>
								<option value="0-2500">0 - 2,500 LKR</option>
								<option value="2500-10000">2,500 - 10,000 LKR</option>
								<option value="10000-30000">10,000 - 30,000 LKR</option>
								<option value="300000-50000000">Over 30,000 LKR</option>
							</select>
						</div>
						<div class="clearfix" ></div>
						<?php
						if(isset($list))
						{
						    ?>
						    <div class="buttons">
							<a href="javascript:void(0)" onclick="load_filter();" class="btn_1 full-width">Filter</a>
						</div>
						    <?php
						}
						else
						{
						    ?>
						    <div class="buttons">
							<a href="javascript:void(0)" onclick="load_filter();" class="btn_1 full-width">Filter</a>
						</div>
						    <?php
						}
						?>
						
					</div>
					
					<div class="sort_select d-none">

							<select name="sort" id="language">

                                <option value="0" >All Languages</option>
                                	<?php
										                $modal->table = 'wp_posts';
                                                $modal->key = 'ID';
                                                $recent_posts = $modal->get(array("post_type"=>'search_language'));
											foreach($recent_posts as $post) : ?>
											<option value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['language']) && $_REQUEST['language']== $post['ID'])?"selected":""; ?> ><?php echo $post['post_title'] ?>
								</option>
									<?php endforeach;  ?>

							</select>

						</div>
					
					<div class="sort_select hide d-none">

							<select name="sort" id="from">

                                <option value="0">All Service providers</option>
                                	<?php
														    	$modal->table = 'wp_posts';
                                                $modal->key = 'ID';
                                                $recent_posts = $modal->get(array("post_type"=>'search_from'));
											foreach($recent_posts as $post) : ?>
											<option value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['from']) && $_REQUEST['from']== $post['ID'])?"selected":""; ?> ><?php echo $post['post_title'] ?></option>
											<?php endforeach; ?>

							</select>

						</div>

					<div class="resize-sensor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 330px; height: 1090px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></aside>