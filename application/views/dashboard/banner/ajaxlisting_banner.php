<form name="imagelist" id="imagelist" method="POST" class="form-horizontal"> 	
<div class="panel panel-default">
	<div class="panel-heading">
	</div>
		<div class="panel-body">
			<div id="entries_listing" class="listing">
		
			<div class="row">
				<div class="col-md-3">
		
					<!--<label class="control-label" style="width: 70px;">Select All</label>
					<input type="checkbox" name="select_all" id="select_all"  class="align_middle" onclick="CheckAll()" />-->
				
					<div class="checkbox c-checkbox">
						<label>
						   <input type="checkbox"  name= "select_all" id="select_all">
						   <span class="fa fa-check"></span> Check all
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="">
						<select class="chosen-with-diselect span6 form-control" tabindex="-1" id="sel_action" name="sel_action">
							<option value="0" selected="selected">Select Action</option>
							<option value="3">Delete</option>
							<option value="2">Invisible</option>
							<option value="1">Visible</option>
						</select>
					</div>
				</div>
			</div>
			
			<div id="sortable"> 
			<?php if(valResultSet($bannerlist)) { ?>
			<?php 
			$cnt=1;
			foreach($bannerlist as $banner){  ?>
				<div class="col-md-4">
					<div id="div_<?php echo $banner->banner_id; ?>" class="grid_box ui-state-default">
						<p>
							<?php if($cnt==1) { ?> <input type="hidden" name="chkid[]" value="0"/> <?php } ?>
						
							<div class="checkbox c-checkbox">
								<label>
								   <input type="checkbox" class="chk_banner" id="chk_banner" name="chkid[]" value="<?php echo $banner->banner_id; ?>" >
								   <span class="fa fa-check"></span> 
								</label>
							</div>
						</p>
					
						<?php 
						if($banner->visibility == 1){
							$btn_color 			= "btn-success";
							$status 			= "Hide Banner";
							$btn_icon 			= "fa fa-eye";
							$opacity_class		= "";
						}else{
							$btn_color 			= "btn-warning";
							$status 			= "Show Banner";
							$btn_icon 			= "fa fa-eye-slash";
							$opacity_class		= "opacityness";
						} ?>
						
						<?php
						if($banner->banner_filename != "" && is_file(ABSPATH.'/banner/'.$banner->banner_filename) && is_file(ABSPATH.'/banner/thumbs/'.$banner->banner_filename)){ ?>
							<p class="nomarpad height190"><a href="<?php echo UPLOADPATH."/banner/".$banner->banner_filename; ?>" rel="prettyPhoto[gallery2]"  class="lightbox"><img src="<?php echo UPLOADPATH."/banner/thumbs/".$banner->banner_filename; ?>" alt="<?php echo $banner->banner_filename; ?>" id="img_banner_<?php echo $banner->banner_id; ?>" class="<?php echo $opacity_class; ?>"/></a></p>
						<?php } else { ?>
							<p class="nomarpad height190"><img src="<?php echo STATICIMG.'/default.png'; ?>" alt="Thumbnail" id="img_banner_<?php echo $banner->banner_id; ?>"  class="<?php echo $opacity_class; ?>"/></p>
						<?php } ?>
						
							<p class="centerall tinyness_ten"><?php echo $banner->banner_filename; ?></p>
						
							<p class="centerall">
								<div class="margin-left90 banner_status_<?php echo $banner->banner_id; ?> btn <?php echo $btn_color;?>" onclick="javascript: banner_changestatus(<?php echo $banner->banner_id; ?>);" title="<?php echo $status;?>"><i class="btn_ <?php echo $btn_icon; ?> icon-white"></i></div>
								
								<div class="btn btn-danger" onclick="javascript: delete_banner(<?php echo $banner->banner_id; ?>,'banner');"><i class="fa fa-trash icon-white"></i></div>

								<input type="hidden" name="hiddenstatus_<?php echo $banner->banner_id; ?>" id="hiddenstatus_<?php echo $banner->banner_id; ?>" value="<?php echo ($banner->visibility)?0:1;?>"> 
							</p>
							<input type="hidden" name="arr[]" size="4" value="<?php echo $banner->banner_id; ?>">
					</div>
				</div><!--grid_box-->
			<?php $cnt++;
					} ?>
		<?php 	}  else echo '</br><div class="grid_box ui-state-default"></br><h4 class="text-center">No banners are added</h4></br></div>'; 
				?>
			</div>
			</div>
		</div>
			<div class="panel-footer text-center">
				<input class="btn btn-success" type="submit" name="submit" value="Submit Changes"/>
			</div>
	
	
</div>
</form>