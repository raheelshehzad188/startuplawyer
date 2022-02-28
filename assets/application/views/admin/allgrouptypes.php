<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>ALL Groups Types</h2>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Find All Groups Types </h5>
			</div>
			<div class="ibox-content" style="display: block;">
				<?php $this->load->view('flash') ?>

				<table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
					<thead>
					<tr>

						<th data-toggle="true" class="footable-visible footable-first-column footable-sortable">Name<span class="footable-sort-indicator"></span></th>
						
						<th class="footable-visible footable-sortable">Action<span class="footable-sort-indicator"></span></th>
					</tr>
					</thead>
					<tbody>
						<?php
					foreach ($data as $key => $value) {
						?>


					<tr class="footable-even" style="display: table-row;">
						<td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $value['name']; ?></td>
						<td class="footable-visible">
							<p><a  href="<?php echo base_url('admin/grouptypes/delete/').$value['tagID']; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" style="width:100%" type="submit"><strong>Delete</strong></a </p>
						</td>
					</tr>
					<?php
				}
					?>

                    
					</tbody>
					<tfoot>
					<tr>
						<td colspan="5" class="footable-visible">
							<ul class="pagination pull-right"><li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a></li><li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li><li class="footable-page active"><a data-page="0" href="#">1</a></li><li class="footable-page"><a data-page="1" href="#">2</a></li><li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li><li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li></ul>
						</td>
					</tr>
					</tfoot>
				</table>

			</div>
		</div>
	</div>
