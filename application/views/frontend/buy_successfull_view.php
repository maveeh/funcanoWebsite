<?php $this->load->viewF("inc/header"); ?>

<!-- Content
================================================== -->

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Successful</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<!-- <ul>
						<li><a href="#">Home</a></li>
						<li>Booking Processed</li>
					</ul> -->
				</nav>

			</div>
		</div>
	</div>
</div>

<!-- Container -->
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="booking-confirmation-page">
				<i class="fa fa-check-circle"></i>
				<h2 class="margin-top-30">Thanks for Booking!</h2>
				<p>Ticket details has been sent your registered email address.<!--  at <a href="" class="__cf_email__">[email&#160;protected] --></a></p>
				<!-- <a href="<?php echo BASEURL."/ticket/detail-ticket/".$bookedFlyreData->userId."/".$bookedFlyreData->flylerId; ?>" class="button margin-top-30">View Invoice</a> -->
			</div>

		</div>
	</div>
</div>
<!-- Container / End -->


<?php $this->load->viewF("inc/footer"); ?>