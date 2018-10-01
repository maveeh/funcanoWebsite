<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							Organizer Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">
										<tr>
											<td class="detailshead">First Name:</td>
											<td class="detailsval"><?php if($data->orgFirstName) echo $data->orgFirstName;?></td>
										</tr>
										<tr>
											<td class="detailshead">Last Name:</td>
											<td class="detailsval"><?php if($data->orgLastName) echo $data->orgLastName;?></td>
										</tr>
										<tr>
											<td class="detailshead"> Email:</td>
											<td class="detailsval"><?php if($data->orgEmail) echo $data->orgEmail;?></td>
										</tr>
										<tr>
											<td class="detailshead">Contact:</td>
											<td class="detailsval"><?php if($data->orgContact) echo $data->orgContact;?></td>
										</tr>
										<tr>
											<td class="detailshead"> Alt Contact:</td>
											<td class="detailsval"><?php if($data->orgAltContact) echo $data->orgAltContact;?></td>
										</tr>
										<!-- <tr>
											<td class="detailshead">Password:</td>
											<td class="detailsval"><?php if($data->password) echo $data->password;?></td>
										</tr> -->
										<tr>
											<td class="detailshead">City:</td>
											<td class="detailsval"><?php if($data->city) echo $data->city;?></td>
										</tr>
										<tr>
											<td class="detailshead"> Address:</td>
											<td class="detailsval"><?php if($data->orgAddress) echo $data->orgAddress;?></td>
										</tr>
										<tr>
											<td class="detailshead"> Zipcode:</td>
											<td class="detailsval"><?php if($data->orgZip) echo $data->orgZip;?></td>
										</tr>
										<tr>
											<td class="detailshead">Status:</td>
											<td class="detailsval"><?php if($data->status==0){ echo " Inactive" ;}else{ echo "Active"; }
												;?></td>
										</tr>
							</table>
						</div>
					</div>


							<?php $this->load->viewD("inc/footer"); ?>

						</body>
			</html>
			