<?php $this->load->viewF("inc/header"); ?>
<?php //v3print($flyresdata); exit ; ?>
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Buy Ticket</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
					<!-- 	<li><a href="#">Home</a></li>
						<li>Booking</li> -->
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<form method="post">
<!-- Container -->
<div class="container">
	<div class="row">
 
		<!-- Content
		================================================== -->
		<div class="col-lg-8 col-md-8 padding-right-30">
	
			<h3 class="margin-top-0 margin-bottom-30">Ticket  Details</h3>
		
			<div class="row">

				<div class="col-md-6">
					<label>Full Name</label>
					<input type="text" name="txt_fullName" value="<?php echo $userData->firstName." ".$userData->lastName ; ?>" required value="">
				</div>

				
				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" name="txt_email" value="<?php echo $userData->emailId ; ?>" required value="">
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<label>Ticket Date</label>
                      <input type="text" name="txt_ticketDate" id="booking-date1" data-lang="en" data-format="Y-m-d" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from" required>
				</div>

				

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>Phone</label>
						<input type="text" name="txt_phone" value="<?php echo $userData->contactNumber ; ?>" required value="">
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div>
				<input type="hidden" name="txt_total" value="<?php echo $total; ?>">
				<input type="hidden" name="txt_quantity" value="<?php echo $quantity; ?>">

			</div>


			<h3 class="margin-top-55 margin-bottom-30">Payment Method</h3>

			<!-- Payment Methods Accordion -->
			<div class="payment">

				<!-- <div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input  id="paypal" name="cardType" type="radio" value="paypal">
						<label for="paypal">PayPal</label>
						<img class="payment-logo paypal" src="../../../i.imgur.com/ApBxkXU.png" alt="">
					</div>

					<div class="payment-tab-content">
						<p>You will be redirected to PayPal to complete payment.</p>
					</div>
				</div> -->


				<div class="payment-tab payment-tab-active">
					<div class="payment-tab-trigger">
						<input checked type="radio" name="cardType" id="creditCart" value="creditCard">
						<label for="creditCart">Credit / Debit Card</label>
						<img class="payment-logo" src="../../../i.imgur.com/IHEKLgm.png" alt="">
					</div>

					<div class="payment-tab-content">
						<div class="row">

							<div class="col-md-6">
								<div class="card-label">
									<label for="nameOnCard">Name on Card</label>
									<input id="nameOnCard" name="nameOnCard"  placeholder="Name On Card" value="" required type="text">
								</div>
							</div>

							<div class="col-md-6">
								<div class="card-label">
									<label for="cardNumber">Card Number</label>
									<input id="cardNumber" name="cardNumber" placeholder="Enter Card Number" value="" required type="text">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="expiryData">Expiry Month</label>
									<input id="expiryData" name="expiryDate"  placeholder="Expire Month" value="" required type="text">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="expiryYear">Expiry Year</label>
									<input id="expiryYear" name="expiryYear" placeholder="Expire Year" value="" required type="text">
								</div>
							</div>

							<div class="col-md-4">
								<div class="card-label">
									<label for="cvv">CVV</label>
									<input id="cvv" name="cvv" placeholder="" value="" required type="text">
								</div>
							</div>

						</div>
					</div>
				</div>
				<?php if (isset($error)) {
				?>
			<mark><?php echo $error; ?></mark>
				

				
		<?php 	} ?>
			</div>
			<!-- Payment Methods Accordion / End -->

			<button name="btnConfirmTicket" class="submit button margin-left-40 margin-top-40">Confirm and Pay</button>
		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-0 margin-bottom-60">

			<!-- Booking Summary -->
			<div class="listing-item-container compact order-summary-widget">
				<div class="listing-item">
					<img src="<?php if($flyresdata->image!="" && file_exists(ABSUPLOADPATH."/flyers/".$flyresdata->image)){ echo UPLOADPATH."/flyers/".$flyresdata->image; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt="">

					<div class="listing-item-content">
					<!-- 	<div class="numerical-rating" data-rating="5.0"></div> -->
						<h3><?php echo $flyresdata->title; ?></h3>
						<span><?php echo $flyresdata->address; ?></span>
					</div>
				</div>
			</div>
			<div class="boxed-widget opening-hours summary margin-top-0">
				<h3><i class="fa fa-calendar-check-o"></i> Ticket Summary</h3>
				<ul>
					<li>Date <span><?php echo date("d/m/Y"); ?></span></li>
					<li>Price <span>£ <?php echo  number_format((float)$flyresdata->ticketPrice, 2, '.', ''); ?> </span></li>
					<li>Quantity <span><?php echo $quantity ; ?> </span></li>
					<li class="total-costs">Total Cost <span>£ <?php echo number_format((float)$total, 2, '.', ''); ?></span></li>
				</ul>

			</div>
			<!-- Booking Summary / End -->

		</div>

	</div>
</div>
</form>
<!-- Container / End -->


<?php $this->load->viewF("inc/footer"); ?>

<link href="<?php echo FRONTJS."/css/plugins/datedropper.css"?>" rel="stylesheet" type="text/css">
<script src="<?php echo FRONTJS."/scripts/datedropper.js"?>"></script>
<script>$('#booking-date1').dateDropper();</script> 
<!--<script>$('#booking-date2').dateDropper();</script> -->