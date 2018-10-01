<?php $this->load->viewD("inc/header"); ?>

				<!-- Main section-->
				<section>
					<!-- Page content-->
					<div class="content-wrapper">
						<h3>Add Flyer
						   <small>Fill all information to add Flyer.</small>
						</h3>
					<!-- START row-->
					<div class="row">
						  <div class="col-lg-2"></div>
					   <div class="col-lg-8">
						  <form method="POST" id="frm_fc_flyers" name="frm_fc_flyers" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
							 <!-- START panel-->
							 <div class="panel panel-default">
								<div class="panel-heading">
								</div>
                        <div class="panel-body">
					
								<div class="form-group">
										  <label class="control-label">Flyer Title:*</label>
									<input type="text" value="" class="form-control" id="txt_title" name="txt_title" required />
								</div>
								<div class="form-group">
										  <label class="control-label">Flyer Description:*</label>
									<input type="text" value="" class="form-control" id="txt_description" name="txt_description" required />
								</div>
								<div class="form-group">
										  <label class="control-label">Flyer Image:*</label>
									<input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle" id="file_image" name="file_image"  required>
								</div>
								<div class="form-group">
										  <label class="control-label">Date:*</label>
										<div id="datetimepicker1" class="input-group date">
											<input type="text" class="form-control"  name="txt_date">
											<span class="input-group-addon">
												<span class="fa fa-calendar"></span>
											</span>
										</div>
								</div>
				</div>
					<div class="panel-footer">
						<div class="clearfix">
							<div class="text-center">
								<span class="help-block m-b-none">* Indicates Required Fields</span>
								 <button type="submit" name="btnAdd" class="btn btn-primary">Add </button>
								
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