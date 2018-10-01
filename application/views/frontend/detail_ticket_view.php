<?php //v3print($ticketData); exit ; ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.vasterad.com/themes/listeo_updated/dashboard-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 May 2018 13:01:25 GMT -->
<head>
	<meta charset="utf-8">
	<title>Ticket</title>
	<link rel="stylesheet" href="<?php echo FRONTCSS; ?>/css/invoice.css">
</head> 

<body>

<!-- Print Button -->
<a href="javascript:window.print()" class="print-button">Print this Ticket</a>

<!-- Invoice -->
<div id="invoice">

	<!-- Header -->
	<?php if(valResultSet($ticketData)){
		foreach ($ticketData as $ticketData) {
		?> 
	<div class="row">
		<div class="col-md-6">
			<div id="logo"><img src="images/logo.png" alt=""></div>
		</div>

		<div class="col-md-6">	

			<p id="details">
				<strong>Ticket Numbert:</strong> <?php echo $ticketData->ticketNumber ?> <br>
				<strong>Booking Date:</strong> <?php echo date("d-m-Y",strtotime($ticketData->ticketNumber)) ?> <br>
				Due 7 days from date of issue
			</p>
		</div>
	</div>


	<!-- Client & Supplier -->
	<div class="row">
		<div class="col-md-12">
			<h2>Ticket</h2>
		</div>

		<div class="col-md-6">	
			<strong class="margin-bottom-5">Flyer</strong>
			<p>
				<?php echo $ticketData->title ?> <br>
				<?php echo $ticketData->city ?> <br>
				<?php echo $ticketData->address ?> <br>
			</p>
		</div>

		<div class="col-md-6">	
			<strong class="margin-bottom-5">Customer</strong>
			<p>
				<?php echo $ticketData->fullName ?> <br>
				<?php echo $ticketData->emailId ?> <br>
				<!-- 36 Edgewater Street <br>
				Melbourne, 2540, Australia <br> -->
			</p>
		</div>
	</div>


	<!-- Invoice -->
	<div class="row">
		<div class="col-md-12">
			<table class="margin-top-20">
				<tr>
				
					<th>Title</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
				</tr>

				<tr>
		
					<td><?php echo $ticketData->address ?><?php echo $ticketData->title ?></td> 
			
					<td>1</td>
					<td><?php echo $ticketData->ticketPrice ?></td>
					<td><?php echo $ticketData->ticketPrice ?></td>
				</tr>
			</table>
		</div>
		
		<div class="col-md-4 col-md-offset-8">	
			<table id="totals">
				<tr>
					<th>Total</th> 
					<th><span><?php echo $ticketData->ticketPrice ?></span></th>
				</tr>
			</table>
		</div>

			<div class="row">
		<div class="col-md-12" style="border-top: 1px solid #ddd" >
			<!-- <ul id="footer">
				<li><span><?php echo BASEURL ?></span></li>
				
				
			</ul> -->
			<br><br>
		</div>
	</div>
	</div>


	<!-- Footer -->


	 <?php 
		}
	} ?>
		
</div>

<script data-cfasync="false" src="../../cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script></body>

<!-- Mirrored from www.vasterad.com/themes/listeo_updated/dashboard-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 May 2018 13:01:26 GMT -->
</html>

