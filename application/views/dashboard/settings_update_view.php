<?php $this->load->viewD("inc/iframe_header"); ?>
				<!-- Main section-->
			<section>
					<!-- Page content-->
				<div class="content-wrapper">
					<h3>Update Settings
					   <small>Fill all information to edit Settings.</small>
					</h3>
					<!-- START row-->
					<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<form method="POST" id="frm_bb_suggestion" name="frm_bb_suggestion" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
									 <!-- START panel-->
									<div class="panel panel-default">
										<div class="panel-heading">
										</div>
									<div class="panel-body">
									
												<div class="form-group">
														  <label class="control-label">Suggestion Type:*</label>
													<input type="text" value="<?php echo $data->suggestionType; ?>" class="form-control" id="txt_suggestionType" name="txt_suggestionType" required />
												</div>
												<div class="form-group">
														  <label class="control-label">Link:*</label>
													<textarea cols="5" rows="3" name="txtarea_suggestionLink" id="txtarea_suggestionLink" class="form-control" required ><?php echo $data->suggestionLink; ?></textarea>
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
	  