
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class="panel panel-info">
                     <div class="panel-heading">
                        <h4><i class="icon-reorder"></i>Add <?php echo ucfirst($tablename); ?></h4>
                     </div>
                     <div class="panel-body form">
                        <!-- BEGIN FORM-->
                        <form id="frm_bt_state" name="frm_bt_state" method="post" onsubmit="javascript:return val_bt_area();" class="form-horizontal" >
							<div id="msg_container">
								<div class="alert alert-error display_none" >
								</div>
							</div>
							<input type="hidden" name="txt_parentid" value="<?php echo $parentid; ?>">
							<div class="control-group">
								<label class="control-label">Name<span class="mandatory">*</span></label>
								<div class="controls">
									<input type="text" value="" class="span6" id="txt_area_name" name="txt_area_name"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Status<span class="mandatory">*</span></label>
								<div class="controls">
									<select class="chosen-with-diselect span6" tabindex="-1" id="dd_area_status" name="dd_area_status">
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success">Submit</button>
								<button type="reset" class="btn">Cancel</button>
							</div>
                        </form>
                        <!-- END FORM-->           
                     </div>
                  </div>
                  <!-- END SAMPLE FORM widget-->
               