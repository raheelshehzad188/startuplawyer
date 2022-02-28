<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>ALL Payment Links</h2>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Find All Payment Links </h5>
			</div>
			<div class="ibox-content" style="display: block;">
				<?php $this->load->view('flash') ?>
				<table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
					<thead>
					<tr>

						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">User<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Customer Name<span class="footable-sort-indicator"></span></th>
						<th class="footable-visible footable-sortable">Amount<span class="footable-sort-indicator"></span></th>
						<th class="footable-visible footable-sortable">Envoirnment<span class="footable-sort-indicator"></span></th>
						<th data-hide="all" class="footable-sortable">Payment ID<span class="footable-sort-indicator"></span></th>
						<th data-hide="all" class="footable-sortable">Paid status<span class="footable-sort-indicator"></span></th>
						<th data-hide="all" class="footable-sortable" >Actions<span class="footable-sort-indicator"></span></th>
						<th data-hide="all" class="footable-sortable" style="display: none;">Date<span class="footable-sort-indicator"></span></th>
					</tr>
					</thead>
					<tbody>
						<?php

						foreach ($data as $key => $value) {
							$CI = get_instance();
							$request_data = unserialize($value['request_data']);
							$uid = $value['uid'];
							$user=$CI->Book_model->getuserbyid($uid);
						?>


					<tr class="footable-even" style="display: table-row;">
						<td class="footable-visible footable-first-column"><?= $user->first_name ?></td>
						<td class="footable-visible"><?= $request_data['CustomerName'] ?></td>
						<td class="footable-visible"><?= $value['amount'] ?></td>
						<td class="footable-visible"><?php
						if($value['is_sandbox'] == 1)
						{
							?>
							<small class="label label-success">sandbox</small>
							<?php
						}
						elseif($value['is_sandbox'] == 2)
						{
							?>
							<small class="label label-primery">Live</small>
							<?php
						}

						?></td>
						<td class="footable-visible">
							<?= $value['paymentId'] ?>
						</td>
						<td class="footable-visible">
							<?php
						if($value['is_paid'] == 1)
						{
							?>
							<small class="label label-success">Paid</small>
							<?php
						}
						else
						{
							?>
							<small class="label label-primery">In complete</small>
							<?php
						}

						?>
						</td>
						<td class="footable-visible">
							<p><a  href="<?php echo base_url('admin/book/delete/').$value['linkID']; ?>" class="btn btn-sm btn-danger pull-right m-t-n-xs" style="width:100%" type="submit"><strong>Delete</strong></a </p>
						</td>
					</tr>
					<?php
						}
						?>




					</tbody>
					<tfoot>
					<tr>
						<td colspan="5" class="footable-visible">
							<ul class="pagination pull-right">
								<li class="footable-page-arrow"><a data-page="first" href="<?=base_url('admin/book/all')?>?page=<?= 1 ?>">«</a></li>
								<?php
								if(($page['cur']-1) !=  0)
								{
									?>
								<li class="footable-page-arrow"><a data-page="prev" href="<?=base_url('admin/book/all')?>?page=<?= $page['cur'] -1 ?>">‹</a></li>
								<?php
								} 
								?>
								<?php
								for ($i=0; $i < $page['tpage'] ; $i++) { 
									?>
									<li class="footable-page <?=(($page['cur'] == ($i+1))?'active':'');?>"><a data-page="0" href="<?=base_url('admin/book/all')?>?page=<?= $i +1 ?>" ><?= $i +1 ?></a></li>
									<?php
								}
								?>
								<?php
								if(!(($page['cur']+1) > $page['tpage']))
								{
									?>
								<li class="footable-page-arrow"><a data-page="next" href="<?=base_url('admin/book/all')?>?page=<?= $page['cur']+1 ?>">›</a></li>
								<?php
								}
								?>
								<li class="footable-page-arrow"><a data-page="last" href="<?=base_url('admin/book/all')?>?page=<?= $page['tpage'] ?>">»</a></li>
							</ul>
						</td>
					</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
