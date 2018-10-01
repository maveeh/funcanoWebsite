<?php $this->load->viewD("inc/header"); ?>
				<!-- Main section-->
			<section>
					<!-- Page content-->
				<div class="content-wrapper">
					<h3>Update Faq
					   <small>Fill all information to edit Faq.</small>
					</h3>
					<!-- START row-->
					<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<form method="POST" id="frm_fc_faq" name="frm_fc_faq" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
									 <!-- START panel-->
									<div class="panel panel-default">
										<div class="panel-heading">
										</div>
									<div class="panel-body">
									
												<div class="form-group">
														  <label class="control-label">Title:*</label>
													<input type="text" value="<?php echo $data->title; ?>" class="form-control" id="txt_title" name="txt_title" required />
												</div>
												<div class="form-group">
														  <label class="control-label">Description:*</label>
													<textarea cols="5" rows="3" name="txtarea_description" id="txtarea_description" class="form-control" required ><?php echo $data->description; ?></textarea>
												</div>
									</div>
										<div class="panel-footer">
											<div class="clearfix">
												<div class="text-center">
													<span class="help-block m-b-none">* Indicates Required Fields</span>
													 <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
													
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