<table class="table table_menus table-striped table-bordered" id="sample_1">
	<thead>
		<tr>
		<th width="5%" class="centerall">No</th>
		<th class="" width="60%">Name</th>
		<th class="centerall" width="20%">Status</th>
		<th class="centerall" width="15%">Action</th>
	</thead>
	<tbody>
		<?php $no=1;
		if(isset($alldata) && is_array($alldata)){
		foreach($alldata as $ad){?>
			<tr class="odd gradeX">
				<td class="centerall"><?php echo $no; ?></td>
				<td class=""><?php echo $ad->pickup_name; ?></td>
				<td class=""><?php if($ad->pickup_status == 1) echo "Active"; else echo "Inactive"; ?></td>
				<td class="centerall">
					<a href="<?php echo BASEURL.'dashboard/pickup/update/'.$category."/".$parent_id."/".$ad->pickups_drops_id;?>" class="edit">
					<button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button>
					</a>

					<a href="javascript: delete_pickups(<?php echo $ad->pickups_drops_id; ?>,<?php echo $category; ?>,<?php echo $parent_id; ?>);" class="deleterec">
					<button class="btn btn-danger"><i class="icon-remove icon-white"></i></button>
					</a>
				</td>
			</tr>
	<?php $no++; } } ?>
	</tbody>
</table>