<?php $this->load->viewD("inc/header"); ?>

				<!-- Main section-->
				<section>
					<!-- Page content-->
					<div class="content-wrapper">
						<h3>Add Organizer
						   <small>Fill all information to add Organizer.</small>
						</h3>
					<!-- START row-->
					<div class="row">
						  <div class="col-lg-2"></div>
					   <div class="col-lg-8">
						  <form method="POST" id="frm_fc_organizer" name="frm_fc_organizer" enctype="multipart/form-data">

						  	<!-- data-parsley-validate="" novalidate=""  -->
							 <!-- START panel-->
							 <div class="panel panel-default">
								<div class="panel-heading">
								</div>
                        <div class="panel-body">
					
								<div class="form-group">
									<div class="col-md-6">
										  <label class="control-label">First Name:*</label>
									<input type="text" value="" class="form-control" id="txt_orgFirstName" name="txt_orgFirstName" required />
								</div>
								<div class="col-md-6">
										  <label class="control-label">Last Name:*</label>
									<input type="text" value="" class="form-control" id="txt_orgLastName" name="txt_orgLastName" required />
								</div>


								<div class="col-md-6">
									 <label class="control-label"> Email:*</label>
									<input type="text" value="" class="form-control" id="txt_orgEmail" name="txt_orgEmail" required />

								</div>
								</div>
								
								<div class="form-group">

									<div class="col-md-6">
										  <label class="control-label"> Contact:*</label>
									<input type="text" value="" class="form-control" id="txt_orgContact" name="txt_orgContact" required />

								</div>
								<div class="col-md-6">
									<label class="control-label"> Alt Contact:*</label>
									<input type="text" value="" class="form-control" id="txt_orgAltContact" name="txt_orgAltContact"  />


								</div>
								</div>
								
								<div class="form-group">
								<div class="col-md-6">
                                          <label class="control-label">City:*</label>
									<input type="text" value="" class="form-control" id="txt_city" name="txt_city" required />
								</div>
									<div class="col-md-6">
                                       <label class="control-label">Zipcode:*</label>
									<input type="text" value="" class="form-control" id="txt_orgZip" name="txt_orgZip" required />
								</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-6">
										<label class=" control-label">Status*</label><br>
                           <div class="">
                              <label class="radio-inline c-radio">
                                 <input id="inlineradio1" type="radio" name="txt_status" value="1" checked>
                                 <span class="fa fa-circle"></span>Active</label>
                              <label class="radio-inline c-radio">
                                 <input id="inlineradio2" type="radio" name="txt_status" value="0">
                                 <span class="fa fa-circle"></span>Inactive</label>
                             
                           </div>
										 <!-- <label class="control-label">Status:*</label>
									<input type="text" value="" class="form-control" id="txt_status" name="txt_status" required />-->
								    </div>
								<div class="col-md-12">

									 <label class="control-label"> Address:*</label>
									<textarea cols="5" rows="3" name="txtarea_orgAddress" id="txtarea_orgAddress" class="form-control" required ></textarea>

                                   </div>
								</div>
								
								
				</div>
					<div class="panel-footer">
						<div class="clearfix">
							<div class="text-center">
								<span class="help-block m-b-none">* Indicates Required Fields</span>
								 <button type="submit" name="btnAdd" class="btn btn-primary">Add Organizer</button>
								
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
               <div class="col-lg-2"></div>
           
            </div>
            </div>
            <!-- END row-->
             
       
      </section>
<?php $this->load->viewD("inc/footer"); ?>
			<?php $this->load->viewD("inc/listing_footer"); ?>	  