<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>

	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
							<h2> Interested In</h2>
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
				
				<?php if (valResultSet($interestedIn)) {
					 foreach ($interestedIn as $interestedIn) {
					 ?>
				<div class="col-lg-6 col-md-6">
					<a href="<?php echo BASEURL."/listing/details/".$interestedIn->flyerId ?>" class="listing-item-container compact">
						<div class="listing-item">
							<img src="<?php echo UPLOADPATH."/flyers/".$interestedIn->image ;?>" alt="">

							<div class="listing-badge now-open">Now Open</div>

							<div class="listing-item-content">
								<!-- <div class="numerical-rating high" data-rating="3.5"></div> -->
								<h3><?php echo $interestedIn->title ; ?> <i class="verified-icon"></i></h3>
								<span><?php echo $interestedIn->address ; ?></span>
							</div>
							<span class="like-icon"></span>
						</div>
					</a>
				</div>
				<?php } }else { ?>
				<div class="col-lg-12 col-md-12">
					<h4>No Records Found .</h4>
				</div>

				 <?php  } ?> 
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