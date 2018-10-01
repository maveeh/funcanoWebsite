<?php $this->load->viewD("inc/header"); ?>
			<section>
         <!-- Page content-->
				<div class="content-wrapper">
					<h3>
						<div class="pull-right col-sm-offset-3">
							<!-- <a href="<?php echo DASHURL.'/user/add/';?>" class="  btn btn-sm btn-info">Add User</a> -->
						</div>Flyer List
					   <small>Flyer Information</small>
					   
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
							<th width="">Flyer Title</th>
							<th width="">Flyer By</th>
							<th width="">Funcies</th>
							<th width="">Flyer Categories</th>
							<!-- <th width="">Flyer Image</th> -->
							<th width="">Created On</th>
						<th width="10%">Action</th>
						</tr>
						</thead>
							<tbody id ="userListing">
								<?php if(isset($data) && valResultSet($data)) { 
								$num = 1;
								foreach($data as $row){
						  ?>
							<tr class="gradeX">
								<td><?php echo $num; ?></td><td><?php echo $row->title; ?></td><td><?php echo $row->firstName." ".$row->lastName; ?></td><td><?php echo $row->keywords; ?></td><td><?php echo $row->categoryTitle; ?></td>  <td><?php echo $row->createdOn; ?></td> 
							<td align="center">
								<div class="btn-group">
									<button data-toggle="dropdown" class="btn btn-default">Action <b class="caret"></b>
									</button>
									<ul role="menu" class="dropdown-menu">	
									<li>
										<a href="<?php echo DASHURL.'/Flyer/details/'.$row->flyerId;?>" class="" title="View Details" >View Details</a>
									</li>
									<!-- <li>
										<a href="<?php echo DASHURL.'/Flyer/update/'.$row->flyerId;?>" class="edit">Edit</a></li>
									-->

									<li> 										<a  href="<?php echo DASHURL.'/Flyer/delrecord/'.$row->flyerId; ?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
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
								<th><input type="text" name="filter_Flyer Title" placeholder="No." class="form-control input-sm datatable_input_col_search">
                                 </th>
											<th>
												<input type="text" name="filter_Flyer Title" placeholder="Flyer Title" class="form-control input-sm datatable_input_col_search">
											</th>
											<th>
												<input type="text" name="filter_Flyer Title" placeholder="Flyer By" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Flyer Description" placeholder="Funcies" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Flyer Image" placeholder="Flyer Categories" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Date" placeholder="Created On" class="form-control input-sm datatable_input_col_search">
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