<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2> Ticket Expired</h2>
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

						   <div class="col-md-3">
							<!-- <div> --> 
								<!-- <a href="<?php echo BASEURL."/user/dashboard/listing/edit/".$ticketData->flyerId ; ?>" class="button gray"><i class="sl sl-icon-note"></i> Edit</a> -->

								

								<!-- <a href="<?php echo BASEURL."/user/dashboard/listing/cancelTicket/".$ticketData->bookingId ; ?>" onclick="javascript:return confirm('Are you sure you want to cancel ?');" class="button gray"><i class="sl sl-icon-close"></i> Cancel</a> -->
							</div>
							
						</li>
						<?php
							}
						} ?>

						<!-- <li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-02.jpg" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Sticky Band</h3>
										<span>Bishop Avenue, New York</span>
										<div class="star-rating" data-rating="5.0">
											<div class="rating-counter">(23 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>
						
						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-03.jpg" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Hotel Govendor</h3>
										<span>778 Country Street, New York</span>
										<div class="star-rating" data-rating="2.0">
											<div class="rating-counter">(17 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-04.jpg" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Burger House</h3>
										<span>2726 Shinn Street, New York</span>
										<div class="star-rating" data-rating="5.0">
											<div class="rating-counter">(31 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-05.jpg" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Airport</h3>
										<span>1512 Duncan Avenue, New York</span>
										<div class="star-rating" data-rating="3.5">
											<div class="rating-counter">(46 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li>

						<li>
							<div class="list-box-listing">
								<div class="list-box-listing-img"><a href="#"><img src="images/listing-item-06.jpg" alt=""></a></div>
								<div class="list-box-listing-content">
									<div class="inner">
										<h3>Think Coffee</h3>
										<span>215 Terry Lane, New York</span>
										<div class="star-rating" data-rating="5.0">
											<div class="rating-counter">(31 reviews)</div>
										</div>
									</div>
								</div>
							</div>
							<div class="buttons-to-right">
								<a href="#" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
								<a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
							</div>
						</li> -->

					</ul>
				</div>
			</div>

<?php $this->load->viewF("inc/footerDashboard"); ?>