<?php $this->load->viewD("inc/header"); ?>

				<!-- Main section-->
				<section>
					<!-- Page content-->
					<div class="content-wrapper">
						<h3>Add User
						   <small>Fill all information to add User.</small>
						</h3>
					<!-- START row-->
					<div class="row">
						  <div class="col-lg-2"></div>
					   <div class="col-lg-8">
						  <form method="POST" id="frm_fc_user" name="frm_fc_user" onsubmit="return postcodeValidate();" enctype="multipart/form-data">

						  	<!--  data-parsley-validate="" novalidate="" -->
							 
							 <!-- START panel-->
							 <div class="panel panel-default">
								<div class="panel-heading">
								</div>
                        <div class="panel-body">
					
								<div class="form-group">
									<div class="col-md-6">
										  <label class="control-label">First Name:*</label>
									<input type="text" value="" class="form-control" id="txt_ffirstname" name="txt_firstname" required />
								    </div>
								    <div class="col-md-6">
										  <label class="control-label">Last Name:*</label>
									<input type="text" value="" class="form-control" id="txt_flastname" name="txt_lastname" required />
								    </div>

								    <div class="col-md-6">
                                        <label class="control-label">Email:*</label>
									<input type="text" value="" class="form-control" id="txt_emailId" name="txt_emailId" required />
								    </div>
								
									<div class="col-md-6">
										  <label class="control-label">Contact Number:*</label>
									<input type="text" value="" class="form-control" id="txt_contactNumber" name="txt_contactNumber" required />
								    </div>

								    <div class="col-md-6">
                                     <label class="control-label">Alt Contact:*</label>
									<input type="text" value="" class="form-control" id="txt_altContactNumber" name="txt_altContactNumber" />
								    </div>
								
									 
                                      

								      <div class="col-md-6">
                                         <label class="control-label">City:*</label>
									<input type="text" value="" class="form-control" id="txt_city" name="txt_city" required />
								      </div>

								       <div class="col-md-6">
                                           
									<label class="control-label">Postcode:*</label>
									<input type="text" value="" class="form-control" id="postcode" name="txt_zipcode" required />
									 <span id="mydiv"></span>
								    </div>    
								
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
										  <label class="control-label">Address:*</label>
									<textarea cols="5" rows="3" name="txtarea_address" id="txtarea_address" class="form-control" required ></textarea>
								</div>
								</div>
				</div>
					<div class="panel-footer">
						<div class="clearfix">
							<div class="text-center">
								<span class="help-block m-b-none">* Indicates Required Fields</span>
								 <button type="submit" name="btnAdd" onclick="postcodeValidate();" class="btn btn-primary">Add User</button>
								
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

<script type="text/javascript">
    function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        /*if (password != confirmPassword) {*/
        if (/^\d{6,10}$/.test(postcode)) {
           /* document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';*/
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast six digit</p>'; }
        return false;
    }
</script>