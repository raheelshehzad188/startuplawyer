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
				<h5>Your All Groups Requests </h5>
			</div>
			<div class="ibox-content" style="display: block;">
				<?php $this->load->view('flash') ?>
				<table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
					<thead>
					<tr>

						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Name<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Image<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Group Type<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Owner Name<span class="footable-sort-indicator"></span></th>
						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Creatd Date<span class="footable-sort-indicator"></span></th>
						<th class="footable-visible footable-sortable">Language<span class="footable-sort-indicator"></span></th>
						<!-- <th class="footable-visible footable-sortable">Group Members<span class="footable-sort-indicator"></span></th> -->
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
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span> <?= $value['name'] ?></td>
						<td class="footable-visible"><img src="<?= $coverImg->url ?>" width="50px" height="auto"> </td>
						<td class="footable-visible"><?= $groupType->name ?></td>
						<td class="footable-visible"><?= $name ?></td>
						<td class="footable-visible"><?= date("Y/m/d", strtotime($value['create_at'])) ?> </td>
						<td class="footable-visible"><?= $lang->value ?></td>
						<!-- <td class="footable-visible">56</td> -->
						<td class="footable-visible">
							<p><a  href="<?php echo base_url('admin/group/edit/').$value['groupID']; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%" type="submit"><strong>Edit</strong></a </p>
						    <p><a  href="<?php echo base_url('admin/group/delete/').$value['groupID']; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%" type="submit"><strong>Delete</strong></a </p>
						</td>
					</tr>
					<?php
				}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
