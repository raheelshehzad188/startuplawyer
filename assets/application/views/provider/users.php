
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>ALL Users</h2>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Find Out All Users</h5>
			</div>
			<div class="ibox-content" style="display: block;">
				<?php $this->load->view('flash'); ?>
				<table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
					<thead>
					<tr>

						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Api Key<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">User Name<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">First Name<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Last Name<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Email Id<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Sandbox Amount<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Live Amount<span class="footable-sort-indicator"></span></th>
						
						<th class="footable-visible footable-sortable">Action<span class="footable-sort-indicator"></span></th>
					</tr>
					</thead>
					<tbody>
						
						<?php
						$CI=&get_instance();
						foreach ($users as $key => $value) {
							            $sand = $CI->db->where('uid',$value['UserID'])->where('is_sandbox',1)->select('SUM(amount) as sandbox_price')->get('links')->row();
		            		$live = $CI->db->where('uid',$value['UserID'])->where('is_sandbox',2)->select('SUM(amount) as sandbox_price')->get('links')->row();

							?>
					<tr class="footable-even" style="display: table-row;">
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['token'] ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['uname'] ?></td>
					
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['first_name'] ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['last_name'] ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['email'] ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= ($sand->sandbox_price > 0)?$sand->sandbox_price:0; ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= ($live->sandbox_price > 0)?$live->sandbox_price:0; ?></td>
						<td class="footable-visible">
							<p><?php
							if($value['status'] == 1)
							{
								?>
								<a href="<?php echo base_url('admin/userStatus/'); ?><?= $value['UserID'] ?>/0" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%; margin-bottom: 10px;" type="submit"><strong>
								Deactive User
								<?php
							}
							else
							{
								{
								?>
								<a href="<?php echo base_url('admin/userStatus/'); ?><?= $value['UserID'] ?>/1" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%; margin-bottom: 10px;" type="submit"><strong>
								Active User
								<?php
							}

							}
							?></strong></a>
							<?php
							if($value['api_status'] == 1)
							{
								?>
								<a href="<?php echo base_url('admin/apiStatus/'); ?><?= $value['UserID'] ?>/2" class="btn btn-sm btn-success pull-right m-t-n-xs" style="width:100%; margin-bottom: 10px;" type="submit"><strong>
								Go  Live
								<?php
							}
							else
							{
								{
								?>
								<a href="<?php echo base_url('admin/apiStatus/'); ?><?= $value['UserID'] ?>/1" class="btn btn-sm btn-warning pull-right m-t-n-xs" style="width:100%; margin-bottom: 10px;" type="submit"><strong>
								Go sandbox
								<?php
							}
							
							}
							?></strong></a>
						</p>
						<p>
							<a href="<?php echo base_url('admin/genres/create'); ?>/<?= $value['UserID'] ?>" class="btn btn-sm btn-warning pull-right m-t-n-xs" style="width:100%; margin-bottom: 10px;" type="submit"><strong>
								Edit user
								</strong></a>
						</p>
								
					</td>
					</tr>
					<?php
						}
						?>
					

					
					<tfoot>
					<tr>
						<td colspan="5" class="footable-visible">
							<ul class="pagination pull-right">
								<li class="footable-page-arrow"><a data-page="first" href="<?=base_url('admin/users')?>?page=<?= 1 ?>">«</a></li>
								<?php
								if(($page['cur']-1) !=  0)
								{
									?>
								<li class="footable-page-arrow"><a data-page="prev" href="<?=base_url('admin/users')?>?page=<?= $page['cur'] -1 ?>">‹</a></li>
								<?php
								} 
								?>
								<?php
								for ($i=0; $i < $page['tpage'] ; $i++) { 
									?>
									<li class="footable-page <?=(($page['cur'] == ($i+1))?'active':'');?>"><a data-page="0" href="<?=base_url('admin/users')?>?page=<?= $i +1 ?>" ><?= $i +1 ?></a></li>
									<?php
								}
								?>
								<?php
								if(!(($page['cur']+1) > $page['tpage']))
								{
									?>
								<li class="footable-page-arrow"><a data-page="next" href="<?=base_url('admin/users')?>?page=<?= $page['cur']+1 ?>">›</a></li>
								<?php
								}
								?>
								<li class="footable-page-arrow"><a data-page="last" href="<?=base_url('admin/users')?>?page=<?= $page['tpage'] ?>">»</a></li>
							</ul>
						</td>
					</tr>
					</tfoot>
					
				</table>

			</div>
		</div>
	</div>