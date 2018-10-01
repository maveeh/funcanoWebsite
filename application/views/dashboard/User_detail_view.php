<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							User Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">
										<tr>
											<td class="detailshead">First Name:</td>
											<td class="detailsval"><?php if($data->firstName) echo $data->firstName;?></td>
										</tr>
										<tr>
											<td class="detailshead">Last Name:</td>
											<td class="detailsval"><?php if($data->lastName) echo $data->lastName;?></td>
										</tr>
										<tr>
											<td class="detailshead">Email:</td>
											<td class="detailsval"><?php if($data->emailId) echo $data->emailId;?></td>
										</tr>
										<tr>
											<td class="detailshead">Contact Number:</td>
											<td class="detailsval"><?php if($data->contactNumber) echo $data->contactNumber;?></td>
										</tr>
										<tr>
											<td class="detailshead">Alt Contact:</td>
											<td class="detailsval"><?php if($data->altContactNumber) echo $data->altContactNumber;?></td>
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
											<td class="detailshead">Status:</td>
											<td class="detailsval"><?php if($data->status==1){
												echo "Active" ;
											}else{
												echo "Inactive" ;
											} ?></td>
										</tr>
										<tr>
											<td class="detailshead">Address:</td>
											<td class="detailsval"><?php if($data->address) echo $data->address;?></td>
										</tr>
										<tr>
											<td class="detailshead">Gender:</td>
											<td class="detailsval"><?php if($data->gender) echo $data->gender;?></td>
										</tr>
										<tr>
											<td class="detailshead">Post Code:</td>
											<td class="detailsval"><?php if($data->zipcode) echo $data->zipcode;?></td>
										</tr>
							</table>
						</div>
					</div>
							<?php $this->load->viewD("inc/footer"); ?>
		</body>
			</html>
			