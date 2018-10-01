<?php $this->load->viewD("inc/header"); ?>
			<section>
         <!-- Page content-->
				<div class="content-wrapper">
					<h3>
						<div class="pull-right col-sm-offset-3">
							<a href="<?php echo DASHURL.'/faq/add/';?>" class=" btn btn-sm btn-info">Add FAQ</a>
						</div>Faq List
					   <small>Faq Information</small>
					   
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
							<th width="">Title</th>
							<th width="">Description</th>
						<th width="10%">Action</th>
						</tr>
						</thead>
							<tbody id ="userListing">
								<?php if(isset($data) && valResultSet($data)) { 
								$num = 1;
								foreach($data as $row){
						  ?>
							<tr class="gradeX">
								<td><?php echo $num; ?></td><td><?php echo $row->title; ?></td><td><?php echo $row->description; ?></td>
							<td align="center">
								<div class="btn-group">
									<button data-toggle="dropdown" class="btn btn-default">Action <b class="caret"></b>
									</button>
									<ul role="menu" class="dropdown-menu">	
									<li>
										<a href="<?php echo DASHURL.'/faq/details/'.$row->faqId;?>" class="addIframe" title="View Details" class="viewIframe">View Details</a>
									</li>
									<li>
										<a href="<?php echo DASHURL.'/faq/update/'.$row->faqId;?>" class="edit">Edit</a></li>
									<li>
										<a  href="<?php echo DASHURL.'/faq/delrecord/'.$row->faqId; ?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
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
												<input type="text" name="filter_Title" placeholder="Title" class="form-control input-sm datatable_input_col_search">
											</th>
										
											<th>
												<input type="text" name="filter_Description" placeholder="Description" class="form-control input-sm datatable_input_col_search">
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