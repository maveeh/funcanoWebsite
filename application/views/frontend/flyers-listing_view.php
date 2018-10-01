<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2> Flyers List</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<!-- <ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>Flyers List</li>
						</ul> -->
					</nav>
				</div>
			</div>
		</div>

		<div class="row">
			
			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4> <?php if ($status=="Active") {
						echo "Active List";
					}elseif ($status=="Expire") {
						echo "Expire list";
					}elseif ($status=="Blocked") {
						echo "Blocked list";
					} ?></h4>
					<ul>
						<?php if (valResultSet($flyersData)) {
							foreach ($flyersData as $flyersData) {
								?>
						<li>

							<div class="row">
							<div class="col-md-7">
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="<?php if($flyersData->image!=""){ echo UPLOADPATH."/flyers/".$flyersData->image; }else{ echo UPLOADPATH."/default-flyer2.png" ; } ?>" alt="Flyers Image"></a></div>

								<!-- <div class="list-box-listing-img"><a href="#"><img src="<?php echo UPLOADPATH."/flyers/".$flyersData->image?>" alt=""></a></div> -->

								


								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="#"><?php echo $flyersData->title ; ?></a></h3>
										<span><?php echo $flyersData->address ; ?></span>
										<!-- <div class="star-rating" data-rating="3.5">
											<div class="rating-counter">(12 reviews)</div>
										</div> -->
									</div>
								</div>
							</div>
						   </div>
							<!-- <div class="buttons-to-right"> -->
					        <div class="col-md-5">
							<!-- <div> --> 
							<?php if ($status !="Blocked") {
								?>
								<a href="<?php echo BASEURL."/user/dashboard/listing/user-response/".$flyersData->flyerId ; ?>" class="button gray"><i class="fa fa-bar-chart"></i> User Response</a>

								<?php } else { ?>
								<a href="#small-dialog" class="button gray popup-with-zoom-anim"><i class="sl sl-icon-action-undo"></i>Request To Unblock</a>
								<?php } ?>
								<a href="<?php echo BASEURL."/user/dashboard/listing/edit/".$flyersData->flyerId ; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="<?php echo BASEURL."/user/dashboard/listing/delFlyers/".$flyersData->flyerId ; ?>" onclick="javascript:return confirm('Are you sure you want to delete ?.');" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						  <!--  </div> -->
						  </div>
						</li>
						<?php
							}
						} ?>

					

					</ul>
				</div>
			</div>
			<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
						<form method="post">
						<div class="small-dialog-header">
							<h3>Request To unblock</h3>
						</div>
						<div class="message-reply margin-top-0">
							<textarea required name="comment" cols="40" rows="3"></textarea>
							<button type="submit" name="btnSentReq" class="button">Send</button>
						</div>
						</form>
					</div>

					<?php if (isset($_POST['btnSentReq'])) {
						$to = "aher.avinash01@gmail.com"; // this is your Email address

                                       /* $from = trim($_POST['email']);*/
                                       
                                       $from = "info@funcano.com";  // this is the sender's Email address
                                       
                                        $name = $this->session->userdata(PREFIX.'sessUserName');
                                        $subject = "Funcano - Unblock Flyer";
                                        $subject2 = "Copy of your form submission";
                                        $message2 = $name . " wrote the following:" . "\n\n" . $_POST['comment'];
                                          $message = "\n\n Unblock Request from: " . $name . 
                                        "\n\n Email: " . $this->session->userdata(PREFIX.'sessUserEmail') . 
                                         "\n\nMessage: " . $_POST['comment'];

                                        $headers = "From:" . $from;
                                        $headers2 = "From:" . $to;
                                        mail($to,$subject,$message,$headers);
                                        /*mail($from,$subject2,$message2,$headers2);*/ // sends a copy of the message to the sender
                                       // ;
                                        // You can also use header('Location: thank_you.php'); to redirect to another page.
										/* echo '<div class="notification success"><span>"Thank you "'. $name .'", We will contact you shortly."</span></div>';*/
					}  ?>



<?php $this->load->viewF("inc/footerDashboard"); ?>