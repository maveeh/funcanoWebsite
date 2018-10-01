<?php 
//v3print($data); exit ;
 $this->load->viewD("inc/header"); ?>
<style type="text/css">
section#corosolImg {
    width: 398px;
 
}
.content-wrapper {
  
    border-top: none;
 
}


</style>
			<section>
         <!-- Page content-->
				<div class="content-wrapper">
					<h3>
						<div class="pull-right col-sm-offset-3">
							<?php if ($data->flyerStatus !=4) {
								 ?>
							<!-- <a href="#myModal" class="btn btn-sm btn-info">Block</a> -->
							<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-info">Block</button>
							<?php }else { ?> 

							<a href="<?php echo DASHURL.'/flyer/unblock/'.$data->flyerId;?>" class="  btn btn-sm btn-info">Unblock</a>
							<?php } ?>
						</div>Flyer Details
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
									<table class="table table-responsive table-striped table-bordered table-hover">

										 <tr >
									
											  <section id="corosolImg">
         <!-- Page content-->
											         <div class="content-wrapper">
											          
											            <!-- START carousel-->
											            <div id="carousel-example-captions" data-ride="carousel" class="carousel slide">
											               <ol class="carousel-indicators">
											                  <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
											                  <li data-target="#carousel-example-captions" data-slide-to="1"></li>
											                  <li data-target="#carousel-example-captions" data-slide-to="2"></li>
											               </ol>
											               <div role="listbox" class="carousel-inner">
											                  <div class="item active">
											                     <img src="<?php if ($data->image !="") {
											                     	echo UPLOADPATH."/flyers/".$data->image ;
											                     }else { echo UPLOADPATH."/default-flyer.png" ;}  ?>" alt="First slide image">
											                    
											                  </div>
											                  <?php if ($data->image1 !="") {
											                  	 ?>
											                  <div class="item">
											                     <img src="<?php if ($data->image1 !="") {
											                     	echo UPLOADPATH."/flyers/".$data->image1 ;
											                     }else { echo UPLOADPATH."/default-flyer.png" ;}   ?>" alt="Second slide image">
											                    
											                  </div>
											                  <?php } 
											                  if ($data->image2 !="") {
											                   ?>
											                  <div class="item">
											                     <img src="<?php if ($data->image2 !="") {
											                      echo UPLOADPATH."/flyers/".$data->image2 ;
											                     }else { echo UPLOADPATH."/default-flyer.png" ;} ?>" alt="Third slide image">
											                   
											                  </div>
											                   <?php } 
											                  if ($data->image3 !="") {
											                   ?>
											                  <div class="item">
											                     <img src="<?php if ($data->image3 !="") {
											                     	 echo UPLOADPATH."/flyers/".$data->image3 ;
											                     }else { echo UPLOADPATH."/default-flyer.png" ;} ?>" alt="Third slide image">
											                   
											                  </div>
											                  <?php } ?>
											               </div>
											               <a href="#carousel-example-captions" role="button" data-slide="prev" class="left carousel-control">
											                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
											                  <span class="sr-only">Previous</span>
											               </a>
											               <a href="#carousel-example-captions" role="button" data-slide="next" class="right carousel-control">
											                  <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
											                  <span class="sr-only">Next</span>
											               </a>
											            </div>
											            <!-- END carousel-->
											         </div>
											      </section>
											 
										</tr>
										<tr>
											<td class="detailshead">Flyer Title:</td>
											<td class="detailsval"><?php if($data->title) echo $data->title;?></td>
										</tr>
										<tr>
											<td class="detailshead">Flyer By:</td>
											<td class="detailsval"><?php if($data->firstName) echo $data->firstName." ".$data->lastName;?></td>
										</tr>
										<tr>
											<td class="detailshead">Flyer Categories:</td>
											<td class="detailsval"><?php if($data->categoryTitle) echo $data->categoryTitle;?></td>
										</tr>
										<tr>
											<td class="detailshead">Flyer Funcies:</td>
											<td class="detailsval"><?php if($data->keywords) echo $data->keywords;?></td>
										</tr>
										<tr>
											<td class="detailshead">Country:</td>
											<td class="detailsval"><?php if($data->state) echo $data->state;?></td>
										</tr>
										<tr>
											<td class="detailshead">City:</td>
											<td class="detailsval"><?php if($data->flyercity) echo $data->flyercity;?></td>
										</tr>
										<tr>
											<td class="detailshead">Post Code:</td>
											<td class="detailsval"><?php if($data->zip) echo $data->zip;?></td>
										</tr>
										<tr>
											<td class="detailshead">Address:</td>
											<td class="detailsval"><?php if($data->flyeraddress) echo $data->flyeraddress;?></td>
										</tr>
										

										<tr>
											<td class="detailshead">Phone:</td>
											<td class="detailsval"><?php if($data->phone) echo $data->phone;?></td>
										</tr>

										<tr>
											<td class="detailshead">Website:</td>
											<td class="detailsval"><?php if($data->website) echo $data->website;?></td>
										</tr>
										<tr>
											<td class="detailshead">email:</td>
											<td class="detailsval"><?php if($data->email) echo $data->email;?></td>
										</tr>
										<tr>
											<td class="detailshead">Facebook Share:</td>
											<td class="detailsval"><?php  echo $data->facebookShare;?></td>
										</tr>
										<tr>
											<td class="detailshead">Twitter Share:</td>
											<td class="detailsval"><?php  echo $data->twitterShare;?></td>
										</tr>
										<tr>
											<td class="detailshead">Google Share:</td>
											<td class="detailsval"><?php  echo $data->googleShare;?></td>
										</tr>
										<tr>
											<td class="detailshead">End Date:</td>
											<td class="detailsval"><?php if($data->endTime) echo $data->endTime;?></td>
										</tr>

										<tr>
											<td class="detailshead">Start Date:</td>
											<td class="detailsval"><?php if($data->startTime) echo $data->startTime;?></td>
										</tr>
										<tr>
											<td class="detailshead">Description:</td>
											<td class="detailsval"><?php if($data->flyerdescription) echo $data->flyerdescription;?></td>
										</tr>
										<tr>
											<td class="detailshead">Created On:</td>
											<td class="detailsval"><?php if($data->createdOn) echo $data->createdOn;?></td>
										</tr>
										<?php if ($data->tickerStatus!=1) {
											 ?>
										<tr>
											<td class="detailshead">Ticket Title:</td>
											<td class="detailsval"><?php if($data->ticketTitle) echo $data->ticketTitle;?></td>
										</tr>
										<tr>
											<td class="detailshead">Ticket Description:</td>
											<td class="detailsval"><?php if($data->ticketDesc) echo $data->ticketDesc;?></td>
										</tr>
										<!-- <tr>
											<td class="detailshead">Ticket Price:</td>
											<td class="detailsval"><?php if($data->ticketPrice) echo $data->ticketPrice;?></td>
										</tr> -->
										<tr>
											<td class="detailshead">Ticket Quantity:</td>
											<td class="detailsval"><?php if($data->ticketQuantity) echo $data->ticketQuantity;?></td>
										</tr>
										<tr>
											<td class="detailshead">Ticket Price:</td>
											<td class="detailsval"><?php if($data->ticketPrice) echo $data->ticketPrice;?></td>
										</tr>
										<?php }else { ?>
										<tr>
											<td class="detailshead">Ticket Price:</td>
											<td class="detailsval">Free</td>
										</tr>
										<?php } ?>

										<tr>
											<td class="detailshead">Status:</td>
											<td class="detailsval"><?php if($data->flyerStatus==4) { echo "Blocked"; } else if($data->flyerStatus==2) {
												 echo "Expired";
											}else if($data->flyerStatus==3) {
												 echo "Deleted";
											}else{ echo "Active"; }?></td>
										</tr>
										
										<!-- <tr>
											<td class="detailshead">City:</td>
											<td class="detailsval"><?php if($data->city) echo $data->city;?></td>
										</tr> -->
							</table>
								</div>
							</div>
						
					</div>
					<!-- END DATATABLE 1 -->
				</div>
			</section> 
			<?php $this->load->viewD("inc/footer"); ?>
			<?php //$this->load->viewD("inc/listing_footer"); ?>
			<form method="post" action="<?php echo DASHURL."/flyer/block"; ?>">
		 <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <h4 id="myModalLabel" class="modal-title">Note</h4>
            </div>
            <div class="modal-body">
            	<textarea class="form-control" required placeholder="Note for flyer owner" name="textNote"></textarea>
            </div>
            <input type="hidden" name="flyerId" value="<?php echo $data->flyerId ?>">
            <div class="modal-footer">
               <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
               <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </div>
   </div>

   </form>
</body>
</html>