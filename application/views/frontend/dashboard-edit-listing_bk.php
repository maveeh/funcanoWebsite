<?php  $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<!-- <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Update Flyer</h2>
					<!-- Breadcrumbs -->
					<!--<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Update Flyer</li>
						</ul>
					</nav>
				</div>
			</div>
		</div> -->

		<div class="row">
			<div class="col-lg-12">
				<form method="post" id="myForm" enctype='multipart/form-data' onsubmit="return postcodeValidate();" >

				<div id="add-listing">

					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3> Update Flyers</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Flyer Title <i class="tip" data-tip-content="Name of your Flyer"></i></h5>
								<input class="search-field" name="txt_title" type="text" value="<?php echo $flyersData->title ; ?>" required/>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select class="chosen-select-no-single" name="sel_categories" required>	
									<?php foreach ($flyersCategories as $flyersCategories) {
									 ?>
									 <option value="<?php echo $flyersCategories->categoryTitle; ?>" <?php if ($flyersCategories->categoryTitle==$flyersData->categoryTitle) {
									 	echo "Selected";
									 } ?> ><?php echo $flyersCategories->categoryTitle; ?></option>
									 <?php } ?> 
								</select>
							</div>

							<!-- Type -->
							<div class="col-md-6">
									<?php $funciesKey=explode(",", $flyersData->keywords) ; ?>
									<h5>Funcies</h5>

							<select data-placeholder="Select Multiple Funcies" name="txt_keyword[]" class="chosen-select" multiple>
					<?php foreach ($funcies as $funcies) {
										 ?>
										 <option value="<?php echo $funcies->funciesName; ?>" <?php if(in_array($funcies->funciesName,$funciesKey)) {
										 	echo "Selected";
										 } ?>>
										 <?php echo $funcies->funciesName; ?></option>
										 <?php } ?> 
							</select>

								</div>

						</div>
						<!-- Row / End -->

						<!-- Section -->
					<!-- <div class="add-listing-section margin-top-45"> -->

						<!-- Headline -->
						<!-- <div class="add-listing-headline"> -->
						<div>
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
						</div>

	                <div class="submit-section">
						<!-- Dropzone -->
					<div class="row">
			           <div class="col-md-12">
			           	<div class="col-md-4">

			            <input type="file" name="flyersImage1" class="upload" /> 
 
						 <!--  <input type="file" value="" class="upload" id="image1" name="image"  multiple /> -->
						 
						 </div>
					<div class="col-md-2">
						 	<div class="review-images mfp-gallery-container">
									<a href="<?php if($flyersData->image!=""){ echo UPLOADPATH."/flyers/".$flyersData->image; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" class="mfp-gallery"><img src="<?php if($flyersData->image!=""){ echo UPLOADPATH."/flyers/".$flyersData->image; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt=""></a>
								</div>
						 </div>
				              

						  <div class="col-md-4">
						  <input type="file" name="flyersImage2" class="upload"/>
						 </div>
						<div class="col-md-2">
						 	<div class="review-images mfp-gallery-container">
									<a href="<?php if($flyersData->image1!=""){ echo UPLOADPATH."/flyers/".$flyersData->image1; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" class="mfp-gallery"><img src="<?php if($flyersData->image1!=""){ echo UPLOADPATH."/flyers/".$flyersData->image1; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt=""></a>
							</div>
						 </div>
						 <div class="col-md-4">
						  <input type="file" name="flyersImage3" class="upload" />
						</div> 
						<div class="col-md-2">
						 	<div class="review-images mfp-gallery-container">
									<a href="<?php if($flyersData->image2!=""){ echo UPLOADPATH."/flyers/".$flyersData->image2; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" class="mfp-gallery"><img src="<?php if($flyersData->image2!=""){ echo UPLOADPATH."/flyers/".$flyersData->image2; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt=""></a>
							</div>
						 </div> 
						<div class="col-md-4">
						  <input type="file" name="flyersImage4" class="upload" />
						</div>
						<div class="col-md-2">
						 	<div class="review-images mfp-gallery-container">
									<a href="<?php if($flyersData->image3!=""){ echo UPLOADPATH."/flyers/".$flyersData->image3; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" class="mfp-gallery"><img src="<?php if($flyersData->image3!=""){ echo UPLOADPATH."/flyers/".$flyersData->image3; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt=""></a>
							</div>
						 </div>
						</div>
					</div>
				</div>
					<!-- </div> -->
					<!-- Section / End -->

					<!-- <div class="add-listing-section margin-top-45"> -->

						<!-- <div class="add-listing-headline"> -->
						<div>
							<h3><i class="fa fa-calendar-check-o"></i> Date/Time</h3>
						</div>

						<div class="submit-section">

					
							<div class="row with-forms">

								<div class="col-md-6">
									<h5>Start Date</h5>
								 <input type="text" name="startData" id="booking-date1" data-default-date="<?php echo date('m-d-Y',strtotime($flyersData->startTime)); ?>" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-format="m-d-Y" data-translate-mode="true" data-max-year="2020"> 
									<!--<input value="<?php echo $flyersData->startTime ; ?>"  type="text" name="startData" id="booking-date1" data-format="Y-m-d">
-->
								</div>

						          

                                  <!-- $date = "08/01/2013";
                                  $your_date = date("m-d-y", strtotime($date)); -->
								
								 <div class="col-md-6">
									<h5>Start Time</h5>
								<!-- <input type="text" name="startTime" id="booking-time1" value="<?php echo $flyersData->eventStartTime ; ?>"> -->
								<input value="<?php echo $flyersData->eventStartTime ; ?>" type="text" id="booking-time1" name="startTime" >

								</div>

						
								
								

							</div>
				

						</div>

						<div class="submit-section">

					
							<div class="row with-forms">

								<div class="col-md-6">
									<h5>End Date</h5>
									 <input type="text" name="endDate" id="booking-date2" data-default-date="<?php echo date('m-d-Y',strtotime($flyersData->endTime)); ?>" data-lang="en" data-format="m-d-Y" data-large-mode="true" data-large-default="true" data-min-year="2017" data-translate-mode="true" data-max-year="2020"> 

									
									  

									<!--<input value="<?php echo $flyersData->endTime ; ?>"  type="text" name="endDate" id="booking-date2" data-format="Y-m-d">
-->
								</div>

								

								<!-- <div class="col-lg-6 col-md-12">
						          <input type="text" id="booking-time" value="9:00 am">
					            </div> -->

								

						
								<div class="col-md-6">
									<h5>End Time</h5>
									<input value="<?php echo $flyersData->eventEndTime ; ?>" id="booking-time2" type="text" name="endTime">
									 <span id="dateSame"></span>
								</div>
								

							</div>
				

						</div>
					<!-- </div> -->

					<!-- Section -->
				<!-- 	<div class="add-listing-section margin-top-45"> -->

						<!-- Headline -->
						<!-- <div class="add-listing-headline"> -->
						<div>
							<h3><i class="sl sl-icon-location"></i> Location</h3>
						</div>

						<div class="submit-section">

							<!-- Row -->
							<div class="row with-forms">

								<!-- City -->
								<div class="col-md-6">
									<h5>Country</h5>
									<input value="<?php echo $flyersData->state ; ?>" type="text" onmousedown="dateValidation()" onmouseup="dateValidation()" onclick="dateValidation();" name="txt_state" >
								</div>
								<div class="col-md-6">
									<h5>City</h5><input value="<?php echo $flyersData->city ; ?>" type="text" name="sel_city" >
								</div>

								<!-- Address -->
								<div class="col-md-6">
									<h5>Address</h5>
									<input type="text" value="<?php echo $flyersData->address ; ?>" name="txt_address"  >
								</div>

								<!-- City -->
								

								<!-- Zip-Code -->
								<div class="col-md-6">
									<h5>Post-Code</h5>
									<input value="<?php echo $flyersData->zip ; ?>" type="text" name="txt_zip"  id="postcode"  required>
									 <span id="mydiv"></span>
								</div>
								<!-- latitude and longitude -->
								<!-- 	<div class="col-md-6">
									<h5>Latitude</h5>
									<input type="text" value="<?php echo $flyersData->latitude ; ?>" name="txt_lat"  placeholder="e.g. 28.7041" >
								</div>
                               
								<div class="col-md-6">
									<h5>Longitude</h5>
									<input type="text" value="<?php echo $flyersData->longitude ; ?>" name="txt_long"  placeholder="e.g. 77.1025" >
								</div> -->

							</div>
							<!-- Row / End -->

						</div>
					<!-- </div> -->
					<!-- Section / End -->


						<!-- Section -->
					<!-- <div class="add-listing-section margin-top-45"> -->
						
						<!-- Headline -->
						<div class="add-listing-headline"> 
					    
							<h3><i class="sl sl-icon-book-open"></i> Ticket</h3>
							<!-- Switcher -->
							<label class="switch"><input type="checkbox" name="ticketCheck" <?php  if($flyersData->tickerStatus !=1){ echo "Checked" ; } ?>><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<!-- <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div> -->
												<div class="fm-input pricing-name"><input type="text" name="txt_ticketTitle" value="<?php echo $flyersData->ticketTitle ; ?>" placeholder="Ticket Title" /></div>
												<div class="fm-input pricing-ingredients"><input type="text" value="<?php echo $flyersData->ticketDesc ; ?>" name="txt_ticketDesc" placeholder="Ticket Description" /></div>
												<div class="fm-input pricing-ingredients"><input type="text" value="<?php echo number_format((float)$flyersData->ticketPrice , 2, '.', '') ; ?>" name="txt_ticketPrice" placeholder="Price" /></div>
												<!-- <div class="fm-input pricing-price"><input type="text" name="txt_ticketPrize" placeholder="Price"  /></div> -->
												<div class="fm-input pricing-name">
													<input type="number"  value="<?php echo $flyersData->ticketQuantity ; ?>" name="txt_ticketQuantity" min="0" placeholder="Quantity" /></div>
												<!-- <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div> -->
											</td>
										</tr>
									</table>
									<!-- <a href="#" class="button add-pricing-list-item">Add Item</a> -->
									<!-- <a href="#" class="button add-pricing-submenu">Add Category</a>
 -->								</div>
							</div>

						</div>
						<!-- Switcher ON-OFF Content / End -->

					<!-- </div> -->
					<!-- Section / End -->

					<!-- Section -->
					<!-- <div class="add-listing-section margin-top-45"> -->

						<!-- Headline -->
						<!-- <div class="add-listing-headline"> -->
						<div>
							<h3><i class="sl sl-icon-docs"></i> More Details</h3>
						</div>

						<!-- Description -->
						

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Phone <span>(optional)</span></h5>
								<input value="<?php echo $flyersData->phone ; ?>" name="txt_phone" type="text">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input value="<?php echo $flyersData->website ; ?>"  name="txt_website" type="text">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input value="<?php echo $flyersData->email ; ?>" name="txt_email" type="text">
							</div>

						</div>

						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true"><?php echo $flyersData->description ; ?></textarea>
						</div>
						<!-- Row / End -->


						<!-- Row -->
						<!-- <div class="row with-forms">

						
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" value="<?php echo $flyersData->facebookLink ; ?>" name="txt_facebook" placeholder="https://www.facebook.com/">
							</div>

						
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" value="<?php echo $flyersData->twitterLink ; ?>" name="txt_twitter" placeholder="https://www.twitter.com/">
							</div>

						
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-google-plus"></i> Google Plus <span>(optional)</span></h5>
								<input type="text" value="<?php echo $flyersData->googleLink ; ?>" name="txt_google" placeholder="https://plus.google.com/">
							</div>

						</div> -->
						<!-- Row / End -->
							

					<!-- </div> -->


	</div>
					<!-- Section / End -->


					
					


					

					
					<!-- Section / End -->



					<!-- Section -->
					<!-- <div class="add-listing-section margin-top-45">
						
				
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
						
							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
						</div>

						
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
												<div class="fm-input pricing-name"><input type="text" placeholder="Title" /></div>
												<div class="fm-input pricing-ingredients"><input type="text" placeholder="Description" /></div>
												<div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="USD" /></div>
												<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
											</td>
										</tr>
									</table>
									<a href="#" class="button add-pricing-list-item">Add Item</a>
									<a href="#" class="button add-pricing-submenu">Add Category</a>
								</div>
							</div>

						</div>
				

					</div> -->
					<!-- Section / End -->
                        <div class="text-center">

					<input class="button preview" type="submit" name="btnUpdateFlyers" onclick="postcodeValidate();" value="Update Flyer">
									</div>


				</div>
			</div>
		</form>

<?php $this->load->viewF("inc/footerDashboard"); ?>
			

<link href="<?php echo FRONTJS."/css/plugins/datedropper.css"?>" rel="stylesheet" type="text/css">
<script src="<?php echo FRONTJS."/scripts/datedropper.js"?>"></script>
<script>$('#booking-date1').dateDropper();</script> 
<script>$('#booking-date2').dateDropper();</script> 

<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
<script src="<?php echo FRONTJS."/scripts/timedropper.js"?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo FRONTJS."/css/plugins/timedropper.css"?>"> 
<script>
this.$('#booking-time1').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f9ea19",
	borderColor: "#f9ea19",
	minutesInterval: '1'
});

this.$('#booking-time2').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f9ea19",
	borderColor: "#f9ea19",
	minutesInterval: '1'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script> 


  <!--  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade" style="overflow-y:scroll;">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header" id="imgCaption">
            
            </div>
            <div class="modal-body">
            <img id="fieldImage" src="" height="500px" width="555px"/>
         </div>
            <div class="modal-footer ">
            <div class="text-center">
               <button type="button" data-dismiss="modal" class="btn btn-sm btn-info">Ok</button>
            </div>
            </div>
         </div>
      </div>
   </div> -->

 <script type="text/javascript">
   function assignSrc(src,title){
      $("#fieldImage").attr('src', src);
      $('#imgCaption').html(title);
   }
   
  </script>

   <script type="text/javascript">
    function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        /*if (password != confirmPassword) {*/
        if (/^\d{5,10}$/.test(postcode)) {
           /* document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';*/
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast five digit</p>'; }
        return false;
    }
</script>
			

<script type="text/javascript">

function dateValidation(){

	//alert("test"); exit ;
		var startDate = document.getElementById("booking-date1").value;
		var endDate = document.getElementById("booking-date2").value;
		var startTime = document.getElementById("booking-time1").value;
		var endTime = document.getElementById("booking-time2").value;
   //alert(startTime); exit ;
		if (startDate==endDate && startTime==endTime) {
		
			document.getElementById('dateSame').innerHTML = '<p style="color:#e80c0c;">Add Correct Date And Time</p>';
			 return false;
		} else{
			document.getElementById('dateSame').innerHTML = ' ';
			return true;
		};
}

</script>


