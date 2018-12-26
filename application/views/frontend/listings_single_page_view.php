<?php //v3print($flyresdata->userId); exit ; ?>
<?php $this->load->viewF("inc/header"); ?>


  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- <div class="listing-slider mfp-gallery-container margin-bottom-0">
	<?php if ($flyresdata->image != "") {
		 ?>
	<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image ; ?>" class="item mfp-gallery" title="Title 1"></a>
	<?php } ?>
	<?php if ($flyresdata->image1 != "") {
		 ?>
	<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image1 ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image1 ; ?>" class="item mfp-gallery" title="Title 3"></a>
	<?php } if ($flyresdata->image2 != "") {
		 ?>
	<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image2 ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image2 ; ?>" class="item mfp-gallery" title="Title 2"></a>
	<?php } if ($flyresdata->image3 != "") {
		 ?>
	<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image3 ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image3 ; ?>" class="item mfp-gallery" title="Title 4"></a>
	<?php } ?>
</div> -->

<!-- Gradient-->
<div class="single-listing-page-titlebar"></div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2><?php echo $flyresdata->title ; ?> <span class="listing-tag"><?php echo $flyresdata->categoryTitle ; ?></span></h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
						<?php echo $flyresdata->flyerAddress ; ?>
						</a>
					</span>
					<?php if ($flyresdata->rating >0) { ?>
					<div class="star-rating" data-rating="<?php if ($flyresdata->rating >0) {
					 echo	$flyresdata->rating ;
					}else{
						echo "0";
					}  ?>">
						<div class="rating-counter"><a href="#listing-reviews">(<?php echo $flyresdata->reviews ; ?> reviews)</a></div>
					</div>
					<?php } ?>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-description" class="active">Description</a></li>
					<li><a href="#listing-overview" >Overview</a></li>
					<!-- <li><a href="#listing-gallery">Gallery</a></li> -->
					<!-- <li><a href="#listing-pricing-list">Pricing</a></li>-->
					<?php if ($flyresdata->flyerAddress != "" OR $flyresdata->city != "" OR $flyresdata->state != "") { ?>
					<li><a href="#listing-location">Location</a></li> 
					<?php } ?>
					<li><a href="#listing-reviews">Comments</a></li>
					<?php 	if ($this->session->userdata(PREFIX.'sessUserId') != $flyresdata->userId) { ?>
					<li><a href="#add-review">Add Comments</a></li> <?php } ?>
				</ul>
			</div>
			
			<!-- Overview -->
			<?php if($flyresdata->flyersDesc != "") { ?>
			<div id="listing-description" class="listing-section">

				<p>
					<?php echo $flyresdata->flyersDesc ; ?>
				</p> 

			</div>
			<?php } ?>
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				 
				<!-- Amenities -->
				<h3 class="listing-desc-headline">Funcies</h3>
				<ul class="listing-features checkboxes"> <?php 
			 $funcies=explode(",", $flyresdata->keywords); 
			  foreach ($funcies as $funcies) {
			  	?>
					<li><?php echo $funcies ?></li>
					
					<?php
			  }
				

				 ?>
				</ul>
			</div>
			<?php if($flyresdata->image != "" OR $flyresdata->image1 != "" OR $flyresdata->image2 != "" OR $flyresdata->image3 != "") { ?>
			<!-- Slider -->
			<div id="listing-gallery" class="listing-section">
				<h3 class="listing-desc-headline margin-top-70">Gallery</h3>
				<div class="listing-slider-small mfp-gallery-container margin-bottom-0">
				<?php 
				
				if($flyresdata->image != "") { ?>
					<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image ; ?>" class="item mfp-gallery" ></a>
				<?php }  if($flyresdata->image1 != "") { ?>
					<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image1 ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image1 ; ?>" class="item mfp-gallery" ></a>
				<?php }  if($flyresdata->image2 != "") { ?>
					<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image2 ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image2 ; ?>" class="item mfp-gallery" ></a>
				<?php }  if($flyresdata->image3 != "") { ?>
					<a href="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image3 ; ?>" data-background-image="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image3 ; ?>" class="item mfp-gallery" ></a>
				<?php } /*else { ?>
				<a href="<?php   echo UPLOADPATH."/default-flyer.png" ; ?>" data-background-image="<?php   echo UPLOADPATH."/default-flyer.png" ; ?>" class="item mfp-gallery" ></a>
					
			 <?php	}*/  ?>
				</div>
			</div>
			<?php } 
			if ($flyresdata->flyerAddress != "" OR $flyresdata->city != "" OR $flyresdata->state != "") { 
			//print_r($flyresdata); exit;
			$flyerAddress = '';
			$flyerAddress = $flyresdata->flyerAddress;
			if ($flyresdata->city != "") 
				$flyerAddress = $flyerAddress." ".$flyresdata->city;
			if ($flyresdata->state != "") 
				$flyerAddress = $flyerAddress." ".$flyresdata->state;
				
			$flyerAddress = encodeURIComponent($flyerAddress);
		?>
			<!-- Location -->
				<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>
				<div id="singleListingMap-container">				
				<div class="mapouter"><div class="gmap_canvas"><iframe width="700" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $flyerAddress; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
			</div>
			
		<?php } ?>
				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Comments <span>(<?php echo $flyresdata->reviews; ?>)</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">

					<ul>
						<?php $displayAddComm=0 ;
						 if (valResultSet($reviewData)) {
							$checkReview=$reviewData ;
							foreach ($reviewData as $reviewData) {

								if ($reviewData->userId==$this->session->userdata(PREFIX.'sessUserId')) {
									$displayAddComm=1 ;
								}
								?>
						<li>
							<div class="avatar"><img src="<?php if($reviewData->profileImage!=""){ echo $reviewData->profileImage ; } else {  echo UPLOADPATH."/dummy-profile.png" ; } ?>" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by"><?php echo $reviewData->firstName." ".$reviewData->lastName ;?><span class="date"><?php echo date("d M Y",strtotime($reviewData->date)) ;?></span>
									<?php if ($reviewData->rating>0) { ?>
									
									<div class="star-rating" data-rating="<?php echo $reviewData->rating ?>"></div>
								<?php	} ?>
								</div>
								<p><?php echo $reviewData->reviewDesc ; ?></p>
								
								<!-- <div class="review-images mfp-gallery-container">
									<a href="<?php echo UPLOADPATH."/flyers/reviews/".$reviewData->images?>" class="mfp-gallery"><img src="<?php echo UPLOADPATH."/flyers/reviews/".$reviewData->images?>" alt=""></a>
								</div> -->
								<!-- <a href="#" class="rate-review"><i class="sl sl-icon-like"></i> Helpful Review <span>12</span></a> -->
							</div>
						</li>
						<?php
							}
						}else{ ?>
						 <h5><?php 	if ($this->session->userdata(PREFIX.'sessUserId') != $flyresdata->userId) {	echo "There is no comment. Be the first one"; }else {
						 echo "There is no any comment on your flyer";	
						 } ?></h5> <?php 
						} ?>

					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<!-- <div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div> -->
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>

   <?php  if ($displayAddComm==0) {

   	if ($this->session->userdata(PREFIX.'sessUserId') != $flyresdata->userId) {
   		
 ?>
			<!-- Add Review Box -->
			<form method="post" enctype="multipart/form-data">
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Comment</h3>
				
				<span class="leave-rating-title">Your rating for this Flyer</span>
				
				<!-- Rating / Upload Button -->
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>
						<div class="leave-rating margin-bottom-30">
							<input type="radio" name="rating"  id="rating-1" value="5"/>
							<label for="rating-1" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-2" value="4"/>
							<label for="rating-2" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-3" value="3"/>
							<label for="rating-3" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-4" value="2"/>
							<label for="rating-4" class="fa fa-star"></label>
							<input type="radio" name="rating" id="rating-5" value="1"/>
							<label for="rating-5" class="fa fa-star"></label>
						</div>
						<div class="clearfix"></div>
					</div>

					
				</div>
	
				<!-- Review Comment -->
			
					<fieldset>
						<input type="hidden" name="flyerId" value="<?php echo $flyresdata->flyerId ?>" />
						<input type="hidden" name="userId" value="<?php echo $this->session->userdata(PREFIX.'sessUserId'); ?>" />
						<div class="row">
							<!-- <div class="col-md-6">
								<label>Name:</label>
								<input type="text" name="name" required value=""/>
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" name="emailId" required value=""/>
							</div> -->
						</div>

						<div>
							<label>Comments:</label>
							<textarea cols="40" name="description" required rows="3"></textarea>
						</div>

					</fieldset>
					<?php if ($this->session->userdata(PREFIX.'sessUserId') > 0 ) { ?>
					<input type="hidden" name="name" value="<?php echo $this->session->userdata(PREFIX.'sessName') ; ?>" />
					<button type="submit" name="btnReview" class="button">Add Comment</button>
					<?php }else { ?>
					 <a href="#sign-in-dialog" onclick="signButtonDisplay() ;" class="sign-in popup-with-zoom-anim"><button class="button">Add Comment</button></a>
					<?php } ?>
					<div class="clearfix"></div>
		

			</div>
			</form>
	
			<?php } } ?>
			<!-- Add Review Box / End -->


		</div>
		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

			<?php 	if ($this->session->userdata(PREFIX.'sessUserId') != $flyresdata->userId) {

			 if ($this->session->userdata(PREFIX.'sessUserId')>0) { 
				if ($isInterested > 0) {
					
				?>	
			
			<button type="button" class="button book-now fullwidth margin-top-5"><i class="sl sl-icon-check"></i> Interested In</button>
		<?php } else{ ?> <!-- <div class="verified-badge">
				<i class="sl sl-icon-check"></i> Interested In
			</div> -->
			<a href="<?php echo BASEURL."/listing/interested/".$this->session->userdata(PREFIX.'sessUserId')."/".$flyresdata->flyerId; ?>">
			<!--  <div class="verified-badge" style="cursor:pointer;">
				 I Am Interested
			</div> -->
			<button type="button" class="button book-now fullwidth margin-top-5">I Am Interested</button>
			
			
			  <?php } if($totalInterested->TotalInterest> 0 ) { ?>
		<div class="text-center"><?php echo $totalInterested->TotalInterest;  ?> People Interested <!-- in this place --></div>
		<?php }	} } ?>
		<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Posted by</span> <a href="#"><?php echo $flyresdata->firstName ." ". $flyresdata->lastName;?></a></h4>
					<a href="#" class="hosted-by-avatar"><img src="<?php if($flyresdata->profileImage != ""){ echo $flyresdata	->profileImage; } else{
              echo UPLOADPATH."/dummy-profile.png" ; } ?>" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<?php if ($flyresdata->contactNumber!="") {
						 ?>
						 <li><i class="sl sl-icon-phone"></i> <?php echo $flyresdata->contactNumber ; ?></li> <?php } ?>
					<!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
					<?php if ($flyresdata->emailId!="") {
						 ?>
					<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="e1958e8ca18499808c918d84cf828e8c"><?php echo $flyresdata->emailId ; ?></span></a></li>
					<?php } ?>
				</ul>

				<ul class="listing-details-sidebar social-profiles">
					<?php if ($flyresdata->facebookLink!="") {
						 ?>
					<li><a href="<?php echo $flyresdata->facebookLink ; ?>" class="facebook-profile"><i class="fa fa-facebook-square"></i> <?php echo $flyresdata->facebookLink ; ?></a></li>
					<?php } ?>

					<?php if ($flyresdata->twitterLink!="") {
						 ?>
					<li><a href="<?php echo $flyresdata->twitterLink ; ?>" class="twitter-profile"><i class="fa fa-twitter"></i> <?php echo $flyresdata->twitterLink ; ?></a></li>
					<?php } ?>
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				</ul>

			
			</div>
			
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
				
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><!--  <div class="fb-share-button" 
							    data-href="<?php echo BASEURL."/listing/details/".$flyresdata->flyerId; ?>" 
							    data-layout="button">
							  </div> -->
							  <a class="fb-share" id="Popup1" href=" https://www.facebook.com/sharer/sharer.php?u=<?php echo BASEURL."/listing/details/".$flyresdata->flyerId; ?>" onclick="javascript:shareCount('fb')"  ><i class="fa fa-facebook"></i> Share</a>

							
					
																
						</li>

						<li><a class="twitter-share" id="Popup2" href="https://twitter.com/intent/tweet?url=<?php echo BASEURL."/listing/details/".$flyresdata->flyerId; ?>&text=<?php  echo $flyresdata->title ; ?>" onclick="javascript:shareCount('tweet')" ><i class="fa fa-twitter"></i> Tweet</a>
						</li>

						<li>	<a class="gplus-share" id="Popup3" href="https://plus.google.com/share?url=<?php echo BASEURL."/listing/details/".$flyresdata->flyerId; ?>" onclick="javascript:shareCount('googlePlus')" ><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
					<div class="clearfix"></div>
			</div>

	    <div class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-clock-o"></i>Date & Time</h3>
				<div ><?php if ($flyresdata->startTime!="0000-00-00") {
				echo date("d M Y", strtotime($flyresdata->startTime)) ;
				}  ?> To <?php if ($flyresdata->endTime!="0000-00-00") {
					echo date("d M Y", strtotime($flyresdata->endTime)) ;
				}  ?> </div>
				<div><?php if($flyresdata->eventStartTime > 0) {  echo $flyresdata->eventStartTime ; ?> To <?php echo $flyresdata->eventEndTime; } ?></div>
			
			
	    </div>
		
		
		<!-- Book Now -->
		<form method="post">			
		<!-- <div class="boxed-widget booking-widget margin-top-35"> -->
		    <div class="boxed-widget  opening-hours summary margin-top-0">
		    	<?php if ($this->session->userdata(PREFIX.'sessUserId') != $flyresdata->userId) {  if ($flyresdata->tickerStatus !=1) {  ?>

				<h3><i class="fa fa-calendar-check-o "></i> Buy a Ticket</h3>
				<ul>
			    <li>Price   £<?php echo number_format((float)$flyresdata->ticketPrice , 2, '.', '') ; ?></li>
			    </ul>
				<span><?php echo $flyresdata->ticketQuantity ; ?> Tickets Remaining</span>
				
				<?php if ($flyresdata->ticketQuantity>0) {
						 ?>
				<div class="row with-forms  margin-top-0">

					<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
					
 					<div class="col-lg-12 col-md-12 fm-input pricing-name">
						<input type="number" required min="1" max="<?php echo $flyresdata->ticketQuantity ; ?>" name="txt_ticketQuantity" placeholder="Quantity" />

						<!-- <div class="fm-input pricing-name"><input type="number" name="txt_ticketQuantity" min="0" placeholder="Quantity" /></div> -->
					</div>
				</div>
				
				<!-- progress button animation handled via custom.js -->
				<button type="submit" name="btnBuy" class="button book-now fullwidth margin-top-5">Buy Now</button>
				<?php }  }else{ ?> <button type="button" class="button book-now fullwidth margin-top-5">Free Event</button> <?php	}
			}

	  ?>
			</div>
			</form>
		
			<!-- Book Now / End -->
			<!-- Opening Hours -->
			<!-- <div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Now Open</div>
				<h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>
				<ul>
					<li>Monday <span>9 AM - 5 PM</span></li>
					<li>Tuesday <span>9 AM - 5 PM</span></li>
					<li>Wednesday <span>9 AM - 5 PM</span></li>
					<li>Thursday <span>9 AM - 5 PM</span></li>
					<li>Friday <span>9 AM - 5 PM</span></li>
					<li>Saturday <span>9 AM - 3 PM</span></li>
					<li>Sunday <span>Closed</span></li>
				</ul>
			</div>  -->
			<!-- Opening Hours / End -->


			
		</div>
		<!-- Sidebar / End -->

	</div>
</div>

<?php $this->load->viewF("inc/footer"); ?>
<!-- Maps 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyB4FCSvBBvRDKTiIBrtyBQ93sI0lWoOBvw"></script>-->
<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> -->
<script type="text/javascript" src="<?php echo FRONTJS ; ?>/scripts/infobox.min.js"></script>
<script type="text/javascript" src="<?php echo FRONTJS ; ?>/scripts/markerclusterer.js"></script>
<script type="text/javascript" src="<?php echo FRONTJS ; ?>/scripts/maps.js"></script>

<script type="text/javascript">
				$(document).ready(function() {
				    $('#Popup1').click(function() {
				        var newwindow = window.open($(this).prop('href'), '', 'height=500,width=500');
				        if (window.focus) {
				            newwindow.focus();
				        }
				        return false;
				    });

				   
				});

				$(document).ready(function() {
				    $('#Popup2').click(function() {
				        var newwindow = window.open($(this).prop('href'), '', 'height=500,width=500');
				        if (window.focus) {
				            newwindow.focus();
				        }
				        return false;
				    });

				   
				});
				$(document).ready(function() {
				    $('#Popup3').click(function() {
				        var newwindow = window.open($(this).prop('href'), '', 'height=500,width=500');
				        if (window.focus) {
				            newwindow.focus();
				        }
				        return false;
				    });

				   
				});

	</script>

	<script type="text/javascript">


			$('.btnShare').click(function(){
			elem = $(this);
			//alert(elem.data('image')); exit;
			postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

			return false;
			});
			</script>


	<div id="fb-root"></div>


<script type="text/javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


<script type="text/javascript">
 function shareCount(share){
  //alert(share); exit ;

  var flyer= "<?php echo $flyresdata->flyerId; ?>";
    // var flyer= <?php echo $flyresdata->flyerId; ?>
	 // userData = {socialType:share};
	    var userData = {};
		userData['socialType'] = share;
		userData['flyerId'] = flyer;
	// alert(JSON.stringify(userData)); exit ;
          $.post("<?php echo base_url();?>/listing/share-count",
          userData, 
          function(data) {
			   if(data == "Success")
			   {
			//	alert("success"); exit;
			   } else if(data == "Failed"){
			//	alert("failed"); exit ;
			   }

			  }); 

          }


</script>


