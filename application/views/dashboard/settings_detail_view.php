<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							Settings Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">
										<tr>
											<td class="detailshead">Suggestion Type:</td>
											<td class="detailsval"><?php if($data->suggestionType) echo $data->suggestionType;?></td>
										</tr>
										<tr>
											<td class="detailshead">Link:</td>
											<td class="detailsval"><?php if($data->suggestionLink) echo $data->suggestionLink;?></td>
										</tr>
							</table>
						</div>
					</div>
				<?php $this->load->viewD("inc/footer"); ?>
			</body>
			</html>
			