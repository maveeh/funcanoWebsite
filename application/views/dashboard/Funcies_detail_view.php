<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							Funcies Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">
										<tr>
											<td class="detailshead">Funcies Name:</td>
											<td class="detailsval"><?php if($data->funciesName) echo $data->funciesName;?></td>
										</tr>
							</table>
						</div>
					</div>
				<?php $this->load->viewD("inc/footer"); ?>
			</body>
			</html>
			