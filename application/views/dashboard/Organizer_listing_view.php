<?php $this->load->viewD("inc/header"); ?>
			<section>
         <!-- Page content-->
				<div class="content-wrapper">
					<h3>
						<div class="pull-right col-sm-offset-3">
							<a href="<?php echo DASHURL.'/organizer/add/';?>" class="  btn btn-sm btn-info">Add Organizer</a>
						</div>Organizer List
					   <small>Organizer Information</small>
					   
					</h3>
					<div class="row"> 
						<div class="col-md-12"> 
						</div>
					</div>
					<div class="container-fluid">
					   <!-- START DATATABLE 1 -->
							<div class="panel panel-default">
								
								<div class="panel-body" id="sortData" name="sortData" >
									<table id="datatable2" class="table table-striped table-bordered table-hover table-responsive">
									<thead>
									<tr>
						<th width="5%">No</th>
							<th width="">First Name</th>
							<th width="">Last Name</th>
							<th width=""> Email</th>
							<th width=""> Contact</th>
							<th width=""> Alt Contact</th>
							
							<th width="">City</th>
							<th width=""> Address</th>
							<th width=""> Zipcode</th>
							
						<th width="10%">Action</th>
						</tr>
						</thead>
							<tbody id ="userListing">
								<?php if(isset($data) && valResultSet($data)) { 
								$num = 1;
								foreach($data as $row){
						  ?>
							<tr class="gradeX">
								<td><?php echo $num; ?></td><td><?php echo $row->orgFirstName; ?></td><td><?php echo $row->orgLastName; ?></td><td><?php echo $row->orgEmail; ?></td><td><?php echo $row->orgContact; ?></td><td><?php echo $row->orgAltContact; ?></td><td><?php echo $row->city; ?></td><td><?php echo $row->orgAddress; ?></td><td><?php echo $row->orgZip; ?></td>
							<td align="center">
								<div class="btn-group">
									<button data-toggle="dropdown" class="btn btn-default">Action <b class="caret"></b>
									</button>
									<ul role="menu" class="dropdown-menu">	
									<li>
										<a href="<?php echo DASHURL.'/organizer/details/'.$row->organizerId;?>" class="addIframe" title="View Details" class="viewIframe">View Details</a>


									</li>
									<li>
										<a href="<?php echo DASHURL.'/organizer/update/'.$row->organizerId;?>" class="edit">Edit</a></li>
									<li>
										<a  href="<?php echo DASHURL.'/organizer/delrecord/'.$row->organizerId; ?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
									</li>
									</ul>
								</div>
								</td>
							</tr>
					<?php $num++;
						} 
					} ?>
						</tbody>
								<tfoot>
								<tr>
								<th><input type="text" name="filter_No." placeholder="No" class="form-control input-sm datatable_input_col_search"></th></th>
											<th>
												<input type="text" name="filter_Organizer Name" placeholder=" First Name" class="form-control input-sm datatable_input_col_search">
											</th>
											<th>
												<input type="text" name="filter_Organizer Name" placeholder="Last Name" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Organizer Email" placeholder=" Email" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Organizer Contact" placeholder=" Contact" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Organizer Alt Contact" placeholder=" Alt Contact" class="form-control input-sm datatable_input_col_search">
											</th>
										
											
										
											<th>
												<input type="text" name="filter_City" placeholder="City" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Organizer Address" placeholder=" Address" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Organizer Zipcode" placeholder=" Zipcode" class="form-control input-sm datatable_input_col_search">
											</th>
										
											
										<th></th>
								</tr>
								</tfoot>
									</table>
								</div>
							</div>
						
					</div>
					<!-- END DATATABLE 1 -->
				</div>
			</section> 
			<?php $this->load->viewD("inc/footer"); ?>
			<?php $this->load->viewD("inc/listing_footer"); ?>
</body>
</html>