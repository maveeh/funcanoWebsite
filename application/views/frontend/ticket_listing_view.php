<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2> Ticket Active</h2>
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
					}  ?></h4>
					<ul>
						<?php if (valResultSet($ticketData)) {
							foreach ($ticketData as $ticketData) {
								?>
						<li>

							<div class="row">
							<div class="col-md-9">
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="<?php echo UPLOADPATH."/flyers/".$ticketData->image?>" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3><a href="#"><?php echo $ticketData->title ; ?></a></h3>
										<span><?php echo $ticketData->address ; ?></span>
										<!-- <div class="star-rating" data-rating="3.5">
											<div class="rating-counter">(12 reviews)</div>
										</div> -->
									</div>
								</div>
							</div>
						   </div>
							<!-- <div class="buttons-to-right"> -->
					        <div class="col-md-3">
							<!-- <div> --> 
								<!-- <a href="<?php echo BASEURL."/user/dashboard/listing/edit/".$ticketData->flyerId ; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a> 

								<a href="<?php echo BASEURL."/user/dashboard/listing/viewTicket/".$ticketData->bookingId ; ?>" class="button gray">View Details</a>-->

								<a href="<?php echo BASEURL."/user/dashboard/listing/cancelTicket/".$ticketData->bookingId ; ?>" onclick="javascript:return confirm('Are you sure you want to cancel ?');" class="button gray"><i class="sl sl-icon-close"></i> Cancel</a>
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

<?php $this->load->viewF("inc/footerDashboard"); ?>

<!-- Scripts
================================================== -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="scripts/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="scripts/mmenu.min.js"></script>
<script type="text/javascript" src="scripts/chosen.min.js"></script>
<script type="text/javascript" src="scripts/slick.min.js"></script>
<script type="text/javascript" src="scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="scripts/waypoints.min.js"></script>
<script type="text/javascript" src="scripts/counterup.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/tooltips.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>