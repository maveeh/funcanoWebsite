<?php $this->load->viewD("inc/header"); ?>

				<!-- Main section-->
				<section>
					<!-- Page content-->
					<div class="content-wrapper">
						<h3>Add FAQ
						   <small>Fill all information to add FAQ.</small>
						</h3>
					<!-- START row-->
					<div class="row">
						  <div class="col-lg-2"></div>
					   <div class="col-lg-8">
						  <form method="POST" id="frm_fc_questions" name="frm_fc_questions" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
							 <!-- START panel-->
							 <div class="panel panel-default">
								<div class="panel-heading">
								</div>
                        <div class="panel-body">
					
								<!-- <div class="form-group">
										  <label class="control-label">User Name:*</label>
									<select id="dd_userId" name="dd_userId" class="form-control" required>
									<?php foreach ($userData as $userData) {
										 ?>
										<option value="<?php echo $userData->userId?>"><?php echo $userData->firstName." ".$userData->lastName ?></option>
									<?php } ?>	
									</select>
								</div> -->
								<div class="form-group">
										  <label class="control-label">Questions:*</label>
									<input type="text" value="" class="form-control" id="txt_question" name="txt_question" required />
								</div>
								<div class="form-group">
										  <label class="control-label">Answers:</label>
									<textarea cols="5" rows="3" name="txtarea_answer" id="txtarea_answer" class="form-control"  ></textarea>
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
	  