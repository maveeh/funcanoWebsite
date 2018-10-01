<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							FAQ Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">
										<tr>
											<td class="detailshead">User Name:</td>
											<td class="detailsval"><?php if($data->userId) echo $data->userId;?></td>
										</tr>
										<tr>
											<td class="detailshead">Questions:</td>
											<td class="detailsval"><?php if($data->question) echo $data->question;?></td>
										</tr>
										<tr>
											<td class="detailshead">Answers:</td>
											<td class="detailsval"><?php if($data->answer) echo $data->answer;?></td>
										</tr>
							</table>
						</div>
					</div>
				<?php $this->load->viewD("inc/footer"); ?>
			</body>
			</html>
			