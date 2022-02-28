<aside class="col-lg-3" id="sidebar_fixed" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

					

				<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="clearfix">
						<a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i><span>Filters</span></a>

					</div>
					<div class="rch_filter"  >
					    <input/ type="text" id="srch" style="padding-left:18px;" placeholder="Search by Key words" >
					    <div onclick="load_filter()" ><i class="fa fa-search" aria-hidden="true"></i>
</div>
					 </div>
					<div class="sort_select">

							<select name="sort" id="language">

                                <option value="0" >All Languages</option>
                                	<?php
												$recent_posts = wp_get_recent_posts(array(
												"numberposts" => -1, // Number of recent posts thumbnails to display
												"post_status" => 'publish', // Show only the published posts
												'orderby' => 'ID',
                                                'order' => 'ASC',
												"post_type"=>'search_language'
											));
											foreach($recent_posts as $post) : ?>
											<option value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['language']) && $_REQUEST['language']== $post['ID'])?"selected":""; ?> ><?php echo $post['post_title'] ?></option>
											<?php endforeach; wp_reset_query(); ?>

							</select>

						</div>
					<div class="sort_select">

							<select name="sort" id="parent_search">

                                <option value="0">What would you like to do</option>
                                	<?php
									$recent_posts =wp_get_recent_posts(array(
														        "numberposts" => -1, // Number of recent posts thumbnails to display
														        "post_status" => 'publish', // Show only the published posts
																'orderby' => 'id',	
																 'order' => 'ASC',
																"post_type"=>'search',
														    ));
											foreach($recent_posts as $post) : ?>
											<option value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['parent_search']) && $_REQUEST['parent_search']== $post['ID'])?"selected":""; ?> ><?php echo $post['post_title'] ?></option>
											<?php endforeach; wp_reset_query(); ?>

							</select>

						</div>
						<div class="filter_type">

							<h4><a href="#" onclick="openfilter('filter_2');" class="opened filter_2_btn">Types of service provider</a></h4>

							<div style="display: none;" class="" id="filter_2">

								<ul>

									<?php
									function bubble_sort_type($arr) {
    $size = count($arr)-1;
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($arr[$k]['sort'] < $arr[$j]['sort']) {
                // Swap elements at indices: $j, $k
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
    }
    return $arr;
}

												$recent_posts = wp_get_recent_posts(array(

												"numberposts" => -1, // Number of recent posts thumbnails to display

												"post_status" => 'publish', // Show only the published posts

												"post_type"=>'search_from'

											));
											//sorting logic 
											//$arr = array();
											foreach($recent_posts as $k=>$v)
											{
												$recent_posts[$k]['sort'] = get_post_meta($v['ID'],'sort',true);
											}
											$recent_posts = bubble_sort_type($recent_posts);
											

											foreach($recent_posts as $post) : ?>

								    <li>

								        <label class="container_check"><?= $post['post_title'] ?><small></small>

								            <input class="from_check" value="<?php echo $post['ID'] ?>" type="checkbox" <?= (empty($_REQUEST['from']) || $_REQUEST['from'] == $post['ID'])?"checked":""; ?>>

								            <span class="checkmark"></span>

								        </label>

								    </li>

								    <?php endforeach; wp_reset_query(); ?>

								</ul>

							</div>

							<!-- /filter_type -->

						</div>
						
					<div class="sort_select hide">

							<select name="sort" id="from">

                                <option value="0">All Service providers</option>
                                	<?php
									$recent_posts =wp_get_recent_posts(array(
														        "numberposts" => -1, // Number of recent posts thumbnails to display
														        "post_status" => 'publish', // Show only the published posts
											'orderby' => 'ID',
                                                'order' => 'ASC',
																"post_type"=>'search_from',
														    ));
											foreach($recent_posts as $post) : ?>
											<option value="<?php echo $post['ID'] ?>" <?= (isset($_REQUEST['from']) && $_REQUEST['from']== $post['ID'])?"selected":""; ?> ><?php echo $post['post_title'] ?></option>
											<?php endforeach; wp_reset_query(); ?>

							</select>

						</div>

					<div class="filter_col">



						<div class="filter_type">

							<h4><a href="#" onclick="openfilter('filter_9');" class="opened filter_1_btn"> Price</a></h4>

							<div style="display: none; overflow: hidden;" class="" id="filter_9">

								<div class="col-md-12">

									<div class="col-md-6" >

										<label>Min</label>

										<input type="text" class="form-control" id="min_price" value="1">

									</div>

									<div class="col-md-6" >

										<label>Max</label>

										<input type="text"  class="form-control"  id="max_price" value="50000">

									</div>

									

								</div>

							</div>

							<!-- /filter_type -->

						</div>

						<div class="filter_type">

							<h4><a href="#" onclick="openfilter('filter_4');" class="opened filter_1_btn"> First free consultation</a></h4>

							<div style="display: none;" class="" id="filter_4">

								<ul>

								    <li>

								               <input type="checkbox" id="yes" name="yes" class="free_check" value="1">
                                          <label>Yes</label>
                                          <input type="checkbox" id="no" name="no" class="free_check" value="0">
                                          <label>No</label><br>

								    </li>

								</ul>

							</div>

							<!-- /filter_type -->

						</div>

						<div class="filter_type">

							<h4><a href="#" onclick="openfilter('filter_6');" class="opened filter_1_btn">Refund Guarantee</a></h4>

							<div style="display: none;" class="" id="filter_6">

								<ul>

								    <li>

								        
								         <input type="checkbox" id="yes" class="refundg" value="1">
                                          <label>Yes</label>
                                          <input  class="refundg" type="checkbox" id="no" value="0">
                                          <label>No</label><br>

								    </li>

								</ul>

							</div>

							<!-- /filter_type -->

						</div>

						<div class="filter_type" id="location_filter">

							<h4><a href="#" onclick="openfilter('filter_1');" class="opened filter_1_btn">Location</a></h4>

							<div style="display: none;" class="" id="filter_1">

								<ul>

									<?php

												$recent_posts = wp_get_recent_posts(array(

												"numberposts" => -1, // Number of recent posts thumbnails to display

												"post_status" => 'publish', // Show only the published posts

												"post_type"=>'locations' 

											));

											foreach($recent_posts as $post) : ?>

								    <li>

								        <label class="container_check"><?php echo $post['post_title'] ?><small></small>

								            <input class="loc_check" value="<?php echo $post['ID'] ?>" type="checkbox" <?= (isset($_REQUEST['language']) && $_REQUEST['language'] == $post['ID'])?"checked":""; ?>>

								            <span class="checkmark"></span>

								        </label>

								    </li>

								    <?php endforeach; wp_reset_query(); ?>

								</ul>

							</div>

							<!-- /filter_type -->

						</div>

						<div class="filter_type">

							<h4><a href="#" onclick="openfilter('filter_5');" class="opened filter_1_btn">District</a></h4>

							<div style="display: none;" class="" id="filter_5">

								<ul>

									<?php

												$recent_posts = wp_get_recent_posts(array(

												"numberposts" => -1, // Number of recent posts thumbnails to display
												'orderby' => 'post_title',
                                                'order' => 'ASC',

												"post_status" => 'publish', // Show only the published posts

												"post_type"=>'distric'

											));

											foreach($recent_posts as $post) : ?>

								    <li>

								        <label class="container_check"><?php echo $post['post_title'] ?><small></small>

								            <input class="dist_check" value="<?php echo $post['ID'] ?>" type="checkbox" <?= (isset($_REQUEST['language']) && $_REQUEST['language'] == $post['ID'])?"checked":""; ?>>

								            <span class="checkmark"></span>

								        </label>

								    </li>

								    <?php endforeach; wp_reset_query(); ?>

								</ul>

							</div>

							<!-- /filter_type -->

						</div>

						<div class="filter_type">

							<h4><a href="#" onclick="openfilter('filter_3');" class="opened filter_1_btn">Pactice Area</a></h4>

							<div style="display: none;" class="" id="filter_3">

								<ul>

									<?php

												$recent_posts = wp_get_recent_posts(array(

												"numberposts" => -1, // Number of recent posts thumbnails to display
												'orderby' => 'post_title',
                                                'order' => 'ASC',

												"post_status" => 'publish', // Show only the published posts

												"post_type"=>'area'

											));

											foreach($recent_posts as $post) : ?>

								    <li>

								        <label class="container_check"><?php echo $post['post_title'] ?><small></small>

								            <input class="parea_check" value="<?php echo $post['ID'] ?>" type="checkbox" <?= (isset($_REQUEST['language']) && $_REQUEST['language'] == $post['ID'])?"checked":""; ?>>

								            <span class="checkmark"></span>

								        </label>

								    </li>

								    <?php endforeach; wp_reset_query(); ?>

								</ul>

							</div>

							<!-- /filter_type -->

						</div>

						

						<div class="buttons">

							<a href="#0" onclick="load_filter();" class="btn_1 full-width">Filter</a>

						</div>
						<div class="buttons" style="margin-top:10px;" >

							<a href="#0" onclick="reset_filter();" class="btn_1 full-width">Reset Filter</a>

						</div>

					</div>

					<div class="resize-sensor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 330px; height: 1090px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></aside>