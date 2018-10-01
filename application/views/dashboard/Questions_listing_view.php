<?php $this->load->viewD("inc/header"); ?>
			<section>
         <!-- Page content-->
				<div class="content-wrapper">
					<h3>
						<div class="pull-right col-sm-offset-3">
							<a href="<?php echo DASHURL.'/Questions/add/';?>" class="  btn btn-sm btn-info">Add</a>
						</div>FAQ List
					   <small>FAQ Information</small>
					   
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
							<th width="">Question By</th>
							<th width="">Questions</th>
							<th width="">Answers</th>
						<th width="10%">Action</th>
						</tr>
						</thead>
							<tbody id ="userListing">
								<?php if(isset($data) && valResultSet($data)) { 
								$num = 1;
								foreach($data as $row){
						  ?>
							<tr class="gradeX">
								<td><?php echo $num; ?></td><td><?php if ($row->userId!=0) {
									 echo $row->firstName." ".$row->lastName; }else{
									 	echo "Admin";
									 } ?></td><td><?php echo $row->question; ?></td><td><?php echo $row->answer; ?></td>
							<td align="center">
								<div class="btn-group">
									<button data-toggle="dropdown" class="btn btn-default">Action <b class="caret"></b>
									</button>
									<ul role="menu" class="dropdown-menu">	
									<!-- <li>
										<a href="<?php echo DASHURL.'/Questions/details/'.$row->questionId;?>" class="" title="View Details" class="viewIframe">View Details</a>
									</li> -->
									<li>
										<a href="<?php echo DASHURL.'/Questions/update/'.$row->questionId;?>" class="edit ">Edit</a></li>
									<li>
										<a  href="<?php echo DASHURL.'/Questions/delrecord/'.$row->questionId; ?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
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
								           <th>
								           		<input type="text" name="filter_User Name" placeholder="No." class="form-control input-sm datatable_input_col_search">
								           </th>
											<th>
												<input type="text" name="filter_User Name" placeholder="Question By" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Questions" placeholder="Questions" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Answers" placeholder="Answers" class="form-control input-sm datatable_input_col_search">
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