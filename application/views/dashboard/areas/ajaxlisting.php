<?php 
if($tablename == "state"){
	$table_id = "state_list";
}else{
	$table_id = $tablename."_of_parent_".$parentid;
}?>
<div class="show_<?php echo $tablename;?>_table <?php if($tablename != "state") echo "display_none"; ?>">
<table class="table  table_menus table-striped table-bordered" id="<?php echo $table_id; ?>">
	<thead>
		<tr>
		<th class="centerall" width="32px">No</th>
		<th class="centerall" width="640px"><?php echo ucfirst($tablename); ?> Name</th>
		<th class="centerall" width="130px">Status</th>
		<?php if(!($this->user_role == 2 && $tablename == "state")) { ?>
			<th class="centerall" width="130px">Action</th>
		<?php } ?>
	</thead>
	<tbody>
		<?php $no=1;
		if(isset($alldata) && is_array($alldata)){
		foreach($alldata as $ad){?>
			<tr class="odd gradeX">
				<td class="centerall <?php if($tablename == "state") echo "show_city"; elseif($tablename == "city") echo "show_substation";?>" id="<?php echo $tablename; ?>_<?php echo $ad->id; ?>" name="<?php echo $ad->id; ?>">
					<?php echo $no; ?>
				</td>
				<td class=""><?php echo $ad->name; ?></td>
				<td class="centerall"><?php if($ad->status == 1) echo "Active"; else echo "Inactive"; ?></td>
				<?php if(!($this->user_role == 2 && $tablename == "state")){ ?>
					<td class="centerall">
						<?php
							$category = 0;
							if($tablename == "city"){
								$category = 1;
							}elseif($tablename == "substation"){
								$category = 2;
							}
						 if($this->user_role == 1){
							if($category > 0){ ?>
								<a href="<?php echo BASEURL.'/dashboard/pickup/listing/'.$category.'/'.$ad->id;?>" class="edit add_pickups">
									<button class="btn btn-info"><i class="icon-map-marker icon-white"></i></button>
									</a>
							<?php } ?>
						<a href="<?php echo BASEURL.'/dashboard/areas/update/'.$tablename.'/'.$ad->id;?>" class="edit <?php echo $iframe_class; ?>">
						<button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button>
						</a>

						<a href="javascript: delete_area(<?php echo $ad->id; ?>,'<?php echo $tablename; ?>');" class="deleterec">
						<button class="btn btn-danger"><i class="icon-remove icon-white"></i></button>
						</a>
						<?php } if($this->user_role == 2){ 
							if($category > 0){ ?>
								<a href="<?php echo BASEURL.'/dashboard/pickup/listing/'.$category.'/'.$ad->id;?>" class="edit add_pickups">
									<button class="btn btn-info"><i class="icon-map-marker icon-white"></i></button>
									</a>
						<?php }} ?>
					</td>
				<?php } ?>
			</tr>
	<?php $no++; } } ?>
	</tbody>
</table>
</div>