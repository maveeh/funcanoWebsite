<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							Faq Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">
										<tr>
											<td class="detailshead">Title:</td>
											<td class="detailsval"><?php if($data->title) echo $data->title;?></td>
										</tr>
										<tr>
											<td class="detailshead">Description:</td>
											<td class="detailsval"><?php if($data->description) echo $data->description;?></td>
										</tr>
							</table>
						</div>
					</div>
				<?php $this->load->viewD("inc/footer"); ?>
			</body>
			</html>
			