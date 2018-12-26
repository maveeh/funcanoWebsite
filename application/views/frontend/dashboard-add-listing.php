<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
<!--
<style>
  .dz-max-files-reached {background-color: orange};
</style>-->
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<div  class="row">
			
			<div class="col-md-12">
			
					<!-- Section -->
					<div id="add-listing">
			<div class="add-listing-section">
						
						<div>
							<h5><i class="sl sl-icon-picture"></i> Upload Photos <span class="h6 warning">Max 4 photos. 1Mb file size.</span></h5> 
						</div>
						  <!-- Dropzone 
						  <form action="<?php echo BASEURL.'/user/dashboard/listing/dropzone_upload'; ?>" class="Dropzone" style="width:200px;" id="fileupload">-->
						   <div class="submit-section">
							<form action="<?php echo BASEURL.'/user/dashboard/listing/dropzone_upload'; ?>" id="myAwesomeDropzone" class="dropzone" ></form>
						</div>
						
			
				<form method="post" enctype='multipart/form-data' id="myForm" onsubmit="return dateValidation();" name="login" value="Login">

					<!-- onsubmit="return postcodeValidate();" -->

				

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-6">
								<h5>Title <i class="tip" data-tip-content="Name of your Flyer"></i></h5>
								<input class="search-field" name="txt_title" id="txt_title" type="text" value="" required/>
							</div>
							<div class="col-md-6">
								<h5>Category</h5>
								<select  class="chosen-select-no-single" id="sel_categories" name="sel_categories" >
								<option value="">Select Category</option>	
									<?php foreach ($flyersCategories as $flyersCategories) {
									 ?>
									 <option value="<?php echo $flyersCategories->categoryTitle; ?>"><?php echo $flyersCategories->categoryTitle; ?></option>
									 <?php } ?> 
								</select>
								<mark id="errorLbl3"></mark>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
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
<!-- Address -->
								<div class="col-md-6">
									<h5>Address</h5>
									<input type="text" name="txt_address" placeholder="e.g. 964 School Street" required>
								</div>
						</div>
						<!-- Row / End 
						
						<div>
							<h4><i class="fa fa-calendar-check-o"></i> Date/Time</h4>
						</div>
-->
						<div class="submit-section">

					
							<div class="row with-forms">

								<div class="col-md-3">
									<h5>Start Date</h5>
								<input type="text" name="startData" id="booking-date1" data-lang="en" data-format="Y-m-d" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from" required>

								</div>

								
                                <div class="col-md-2">
									<h5>Start Time</h5>
								<input type="text" name="startTime" id="booking-time1" value="9:00 am" required>

								</div>
						<div class="col-md-1"></div>
								<div class="row with-forms">

								<div class="col-md-3">
									<h5>End Date</h5>
									<input type="text" name="endDate" id="booking-date2" data-lang="en" data-large-mode="true"  data-large-default="true" data-format="Y-m-d" data-min-year="2017" data-max-year="2020" data-lock="from" required>
								</div>

								
								<div class="col-md-2">
									<h5>End Time</h5>
								<input type="text" name="endTime"  id="booking-time2" value="10:00 am" required>

								 <span id="dateSame"></span>
								</div>
								

							</div>
								

							</div>
				

						</div>

					   
<!-- <div>
							<h4><i class="sl sl-icon-docs"></i> More Details</h4>
						</div>

						Description -->
						

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
							<textarea class="WYSIWYG" name="description" cols="40" rows="1" id="description" spellcheck="true"></textarea>
						</div>
						<!-- Row / End -->
						

					   
						
					
						
						<!-- Headline -->
						<!-- <div class="add-listing-headline"> -->
						<div class="add-listing-headline">
							<h4><i class="sl sl-icon-book-open"></i> Ticket</h4>
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
												<div class="fm-input pricing-name"><input type="number" name="txt_ticketQuantity" min="0" placeholder="Quantity" /></div>
												<!-- <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div> -->
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						
						


	 


					<div class="text-center">

					<input class="button preview" onclick="dateValidation();" type="submit" name="btnAddFlyers" value="Add Flyer">
					</div>
			</form>

				</div>
			</div>
		</div>

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
	$.each($clocks, function(clock){
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
    /*function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        /*if (password != confirmPassword) {*/
        /*if (/^\d{5,10}$/.test(postcode)) {
            document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast five digit</p>'; }
        return false;
    }*/
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


	
	Dropzone.options.myAwesomeDropzone = {
		maxFilesize:1,
	  maxFiles: 4,
	  acceptedFiles: ".jpeg,.jpg,.png",
	  accept: function(file, done) {
		console.log("uploaded");
		done();
	  },
	  init: function() {
		this.on("maxfilesexceeded", function(file){
			//AddFlyerImageAlert("Upload max 4 photos!");
			ymz.jq_alert({title:"Alert", text:"You have already uploaded 4 photos.", ok_btn:"Okey", close_fn:null});
			this.removeFile(file);
		});
	  }
	};

</script>