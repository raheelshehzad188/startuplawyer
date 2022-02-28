<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>ALL Group Requests</h2>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Find All Group Requests To Accept / Reject </h5>
			</div>
			<div class="ibox-content" style="display: block;">
				<?php $this->load->view('flash') ?>
				<table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
					<thead>
					<tr>

						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Name<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Image<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Type<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Language<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Owner Name<span class="footable-sort-indicator"></span></th>
						
						<th class="footable-visible footable-sortable">Action<span class="footable-sort-indicator"></span></th>
					</tr>
					</thead>
					<tbody>
						
						<?php
						foreach ($data as $key => $value) {
							$CI = get_instance();
							$coverImg = $CI->Group_model->getMediaByID($value['groupImage']);
							$groupType  = $CI->Group_model->getGroupTypeByID($value['grouptypeID']);
							$lang  = $CI->Group_model->getLangByID($value['langID']);
							$user = $CI->Auth_model->get(array('UserID'=>$value['userID']));
							$name = '';
							if(isset($user[0]))
							{
								$name = $user[0]['first_name'].' '.$user[0]['last_name'];
							}

							?>
					<tr class="footable-even" style="display: table-row;">
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['name'] ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
							<img src="<?= $coverImg->url ?>" width="80px" height="auto"></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $groupType->name ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $lang->value ?></td>
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $name ?></td>
						<td class="footable-visible">
							<p><a href="<?php echo base_url('admin/group/acceptStatus/').$value['groupID']; ?>/1" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%; margin-bottom: 10px;" type="submit"><strong>Accept</strong></a>
								<a href="<?php echo base_url('admin/group/acceptStatus/').$value['groupID']; ?>/2" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%" type="submit"><strong>Reject</strong></a>
						</p></td>
					</tr>
					<?php
						}
						?>
					

					
					</tfoot>
				</table>

			</div>
		</div>
	</div>