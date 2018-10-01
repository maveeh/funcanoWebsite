<?php $this->load->viewD("inc/iframe_header"); ?>
				<!-- Main section-->
			<section>
					<!-- Page content-->
				<div class="content-wrapper">
					<h3>Update Funcies
					   <small>Fill all information to edit Funcies.</small>
					</h3>
					<!-- START row-->
					<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<form method="POST" id="frm_fc_funcies" name="frm_fc_funcies" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
									 <!-- START panel-->
									<div class="panel panel-default">
										<div class="panel-heading">
										</div>
									<div class="panel-body">
									
												<div class="form-group">
														  <label class="control-label">Funcies Name:*</label>
													<input type="text" value="<?php echo $data->funciesName; ?>" class="form-control" id="txt_funciesName" name="txt_funciesName" required />
												</div>
									</div>
										<div class="panel-footer">
											<div class="clearfix">
												<div class="text-center">
													<span class="help-block m-b-none">* Indicates Required Fields</span>
													 <button type="submit" name="btnFunciesUpdate" class="btn btn-primary">Update</button>
													
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
	  