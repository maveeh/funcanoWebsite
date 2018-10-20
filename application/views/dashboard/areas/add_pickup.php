	<!-- BEGIN CONTAINER -->
   <div class="row-fluid pop-up-form">
      <!-- BEGIN PAGE -->  
      <div id="">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Add Pickups / Drops for <?php echo $city; ?></h4>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form id="frm_pickups_drops" name="frm_pickups_drops" method="post" onsubmit="javascript:return val_pickups_drops();" class="form-horizontal" >
							<div id="msg_container">
								<div class="alert alert-error display_none" >
								</div>
								<?php if($this->session->userdata(BT_SESS_ADMIN."succ_msg") !="") { ?>
								<div class="alert alert-success" >
									<?php
										echo $this->session->userdata(BT_SESS_ADMIN."succ_msg");
										$this->session->unset_userdata(BT_SESS_ADMIN."succ_msg")
									?>
								</div>
								<?php } ?>
							</div>
				
							<div class="control-group">
								<label class="control-label">Name<span class="mandatory">*</span></label>
								<div class="controls">
									<input type="text" value="" class="span6" id="txt_pickup_name" name="txt_pickup_name"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Status<span class="mandatory">*</span></label>
								<div class="controls">
									<select class="chosen-with-diselect span6" tabindex="-1" id="dd_pickup_status" name="dd_pickup_status">
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
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->