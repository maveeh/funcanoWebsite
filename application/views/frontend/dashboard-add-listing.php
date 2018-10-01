<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<!-- <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add Flyer</h2>
					<!-- Breadcrumbs -->
					<!--<nav id="breadcrumbs"> -->
						<!-- <ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Add Flyer</li>
						</ul> -->
					<!-- </nav>
				</div>
			</div>
		</div> -->

		<div  class="row">
			<div class="col-lg-12">
				<form method="post" enctype='multipart/form-data' onsubmit="return postcodeValidate();" name="login" value="Login">

					<!-- onsubmit="return postcodeValidate();" -->

				<div id="add-listing">

					
						

					<!-- Section -->
					<div class="add-listing-section">

					

						<!-- Headline -->
						 <div class="add-listing-headline">
						<!-- <div> -->
							<h3>Add Flyer<!-- Basic Informations --></h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Flyer Title <i class="tip" data-tip-content="Name of your Flyer"></i></h5>
								<input class="search-field" name="txt_title" id="txt_title" type="text" value="" required/>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Category</h5>
								<select  class="chosen-select-no-single" id="sel_categories" name="sel_categories" >
								<option value="">Select Categories</option>	
									<?php foreach ($flyersCategories as $flyersCategories) {
									 ?>
									 <option value="<?php echo $flyersCategories->categoryTitle; ?>"><?php echo $flyersCategories->categoryTitle; ?></option>
									 <?php } ?> 
								</select>
								<mark id="errorLbl3"></mark>
							</div>

							<!-- Type -->
							<div class="col-md-6">

			<h5>Funcies</h5>

			<select id="txt_keyword" data-placeholder="Select Multiple Funcies" name="txt_keyword[]" class="chosen-select"  multiple>
				<?php foreach ($funcies as $funcies) {
									 ?>
									 <option value="<?php echo $funcies->funciesName; ?>" ><?php echo $funcies->funciesName; ?></option>
									 <?php } ?> 
			</select>
						<mark id="errorLbl4"></mark>
		</div>

						</div>
						<!-- Row / End -->

						 <!-- <div class="add-listing-headline"> -->
						 <div>
							<h3><i class="sl sl-icon-picture"></i> Gallery</h3>
						</div>

						<!-- Dropzone -->
					<div class="row">
			           <div class="col-md-12">
			           	<div class="col-md-6">
						  <input type="file" name="flyersImage1" class="upload" />
						 </div> <div class="col-md-6">
						  <input type="file" name="flyersImage2" class="upload" />
						 </div> <div class="col-md-6">
						  <input type="file" name="flyersImage3" class="upload" />
						</div>  <div class="col-md-6">
						  <input type="file" name="flyersImage4" class="upload" />
						</div>
						</div>
					</div>

						<!-- <div class="add-listing-section margin-top-45"> -->

				
						<!-- <div class="add-listing-headline">  -->
						<div>
							<h3><i class="fa fa-calendar-check-o"></i> Date/Time</h3>
						</div>

						<div class="submit-section">

					
							<div class="row with-forms">

								<div class="col-md-6">
									<h5>Start Date</h5>
								<input type="text" name="startData" id="booking-date1" data-lang="en" data-format="Y-m-d" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from" required>

								</div>

								
                                <div class="col-md-6">
									<h5>Start Time</h5>
								<input type="text" name="startTime" id="booking-time1" value="9:00 am" required>

								</div>
						
								
								

							</div>
				

						</div>

					    <!-- </div> -->

					   <!--  <div>
							<h3><i class="fa fa-clock-o"></i> Time</h3>
						</div> -->

						<div class="submit-section">

					
							<div class="row with-forms">

								<div class="col-md-6">
									<h5>End Date</h5>
									<input type="text" name="endDate" id="booking-date2" data-lang="en" data-large-mode="true" data-large-default="true" data-format="Y-m-d" data-min-year="2017" data-max-year="2020" data-lock="from" required>
								</div>

								

								<!-- <div class="col-lg-6 col-md-12">
						          <input type="text" id="booking-time" value="9:00 am">
					            </div> -->

								

						
								<div class="col-md-6">
									<h5>End Time</h5>
								<input type="text" name="endTime" id="booking-time2" value="9:00 am" required>
								</div>
								

							</div>
				

						</div>

					   <!--  <div class="add-listing-section margin-top-45"> -->

						<!-- Headline -->
						<!-- <div class="add-listing-headline"> -->
						<div>
							<h3><i class="sl sl-icon-location"></i> Location</h3>
						</div>

						<div class="submit-section">

							<!-- Row -->
							<div class="row with-forms">

								<div class="col-md-6">
									<h5>Country</h5>
									<input type="text" name="txt_state" required>
								</div>

								<!-- City -->
								<div class="col-md-6">
									<h5>City</h5>
									<select class="chosen-select-no-single" name="sel_city" required>
										<option label="blank">Select City</option>	
										<option value="New York">New York</option>
										<option value="Los Angeles">Los Angeles</option>
										<option value="Chicago">Chicago</option>
										<option value="Houston">Houston</option>
										<option value="Phoenix">Phoenix</option>
										<option value="San Diego">San Diego</option>
										<option value="Austin">Austin</option>
									</select>
								</div>

								<!-- Address -->
								<div class="col-md-6">
									<h5>Address</h5>
									<input type="text" name="txt_address" placeholder="e.g. 964 School Street" required>
								</div>
                                 
                                <!-- Zip-Code -->
								<div class="col-md-6">
									<h5>Post-Code</h5>
									<input type="text" name="txt_zip"  id="postcode"  required>
                                    <!--  onkeyup="postcodeValidate()" -->
									 <span id="mydiv"></span>

									<!-- <mark id="postcodeMark" style="display: none;"> Enter postcode </mark> -->
								</div>
								<!-- latitude and longitude -->
								
							
								<input type="hidden" name="txt_lat"  placeholder="e.g. 28.7041" >
							    <input type="hidden" name="txt_long"  placeholder="e.g. 77.1025" >
						

								
								

								
								

							</div>
							<!-- Row / End -->

						</div>
					<!-- </div> -->

					<!-- Section -->
					<!-- <div class="add-listing-section margin-top-45"> -->
						
						<!-- Headline -->
						<!-- <div class="add-listing-headline"> -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-book-open"></i> Ticket</h3>
							<!-- Switcher -->
							 <label class="switch"><input type="checkbox" name="ticketCheck" checked><span class="slider round"></span></label>
						</div>

						<!-- Switcher ON-OFF Content -->
						<div class="switcher-content">

							<div class="row">
								<div class="col-md-12">
									<table id="pricing-list-container">
										<tr class="pricing-list-item pattern">
											<td>
												<!-- <div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div> -->
												<div class="fm-input pricing-name"><input type="text" name="txt_ticketTitle" placeholder="Ticket Title" /></div>
												<div class="fm-input pricing-ingredients">
													<input type="text" name="txt_ticketDesc" placeholder="Ticket Description" /></div>
												<div class="fm-input pricing-ingredients">
													<input type="text" name="txt_ticketPrice" placeholder="Price" /></div>
												<!-- <div class="fm-input pricing-price"><input type="text" name="txt_ticketPrize" placeholder="Price"  /></div> -->
												<div class="fm-input pricing-name"><input type="number" name="txt_ticketQuantity" placeholder="Quantity" /></div>
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
								<input name="txt_phone" type="text">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Website <span>(optional)</span></h5>
								<input  name="txt_website" type="text">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>E-mail <span>(optional)</span></h5>
								<input name="txt_email" type="text">
							</div>

						</div>

						<div class="form">
							<h5>Description</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true"></textarea>
						</div>
						<!-- Row / End -->


						<!-- Row -->
						<!-- <div class="row with-forms">

				
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input type="text" name="txt_facebook" placeholder="https://www.facebook.com/">
							</div>

					
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-twitter"></i> Twitter <span>(optional)</span></h5>
								<input type="text" name="txt_twitter" placeholder="https://www.twitter.com/">
							</div>

					
							<div class="col-md-4">
								<h5 class="gplus-input"><i class="fa fa-google-plus"></i> Google Plus <span>(optional)</span></h5>
								<input type="text" name="txt_google" placeholder="https://plus.google.com/">
							</div>

						</div> -->
						<!-- Row / End -->


						<!-- Checkboxes -->
						<!-- <h5 class="margin-top-30 margin-bottom-10">Amenities <span>(optional)</span></h5>
						<div class="checkboxes in-row margin-bottom-20">
					
							<input id="check-a" type="checkbox" name="amenities[]" value="Elevator in building">
							<label for="check-a">Elevator in building</label>

							<input id="check-b" type="checkbox" name="amenities[]" value="Friendly workspace">
							<label for="check-b">Friendly workspace</label>

							<input id="check-c" type="checkbox" name="amenities[]" value="Instant Book">
							<label for="check-c">Instant Book</label>

							<input id="check-d" type="checkbox" name="amenities[]" value="Wireless Internet">
							<label for="check-d">Wireless Internet</label>

							<input id="check-e" type="checkbox" name="amenities[]" value="Free parking on premises" >
							<label for="check-e">Free parking on premises</label>

							<input id="check-f" type="checkbox" name="amenities[]" value="Free parking on street" >
							<label for="check-f">Free parking on street</label>

							<input id="check-g" type="checkbox" name="amenities[]" value="Smoking allowed">
							<label for="check-g">Smoking allowed</label>	

							<input id="check-h" type="checkbox" name="amenities[]" value="Events">
							<label for="check-h">Events</label>
					
						</div> -->
						<!-- Checkboxes / End -->

					<!-- </div> -->
					<!-- Section / End -->

	 </div>
					
					
					


					

					



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

					<input class="button preview" onclick="postcodeValidate();" type="submit" name="btnAddFlyers" value="Add Flyer">
					</div>


				</div>
			</div>
		</form>

			<?php $this->load->viewF("inc/footerDashboard"); ?>
			<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
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

<script type="text/javascript">
  $('form').submit(function () {
    var funcy = $.trim($('#txt_keyword').val());
    var categories = $.trim($('#sel_categories').val());
      if (categories  === '') {
  //	alert("test");
    	document.getElementById('errorLbl3').innerHTML = 'Please Select categories';
    	$('html, body').animate({
        scrollTop: $("#txt_title").offset().top
    }, 2000);
        return false;
    }
  if (funcy  === '') {
  //	alert("test");
    	document.getElementById('errorLbl4').innerHTML = 'Please Select Funcies';
    	$('html, body').animate({
        scrollTop: $("#txt_title").offset().top
    }, 2000);
        return false;
    }
});

</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function onBodyLoad(){

var geocoder = new google.maps.Geocoder();
var address = "new york";
alert(address); exit ;
/*geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.latitude;
    var longitude = results[0].geometry.location.longitude;
    alert(latitude);
    } 
}); */
}
</script>

<script type="text/javascript">
    function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        /*if (password != confirmPassword) {*/
        if (/^\d{6,10}$/.test(postcode)) {
           /* document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';*/
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast six digit</p>'; }
        return false;
    }
</script>







			



