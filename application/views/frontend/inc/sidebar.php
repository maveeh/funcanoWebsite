<?php $flyersActiveData=$this->Common_model->selTableData("fc_flyers","COUNT(flyerId) as flyersCount","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND status=1");
	$flyersExpireData=$this->Common_model->selTableData("fc_flyers","COUNT(flyerId) as flyersCount","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND status=2");

	$flyersBlockedData=$this->Common_model->selTableData("fc_flyers","COUNT(flyerId) as flyersCount","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND status=4");
 ?>

 <?php $ticketActiveData=$this->Common_model->selTableData("fc_ticket_booking","COUNT(bookingId) as ticketCount","userId='".$this->session->userdata(PREFIX.'sessUserId')."'  AND ticketDate >= DATE_FORMAT(NOW(),'%Y-%m-%d') AND bookingStatus=1");
	$ticketExpireData=$this->Common_model->selTableData("fc_ticket_booking","COUNT(bookingId) as ticketCount","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND ticketDate < DATE_FORMAT(NOW(),'%Y-%m-%d') AND bookingStatus=1");
	$ticketCancelData=$this->Common_model->selTableData("fc_ticket_booking","COUNT(bookingId) as ticketCount","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND bookingStatus=2");
 ?>

 <!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>
	
	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

				

			<ul data-submenu-title="List">
				<li class="<?php if ($page=="Active_flyers" || $page=="Expire_flyers" || $page=="Blocked_flyers") {
							echo "active";
						} ?>" ><a><i class="sl sl-icon-layers"></i> My Flyers</a>

						<!--  -->
					<ul>
						<li class="<?php if ($page=="Active_flyers") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/listing/active-flyers" ?>">Active <?php if($flyersActiveData && $flyersActiveData[0]->flyersCount > 0) { ?><span class="nav-tag green"><?php echo $flyersActiveData[0]->flyersCount ; ?></span><?php } ?></a></li>
					<!-- 	<li><a href="#">Pending <span class="nav-tag yellow">0</span></a></li>-->
						<li class="<?php if ($page=="Expire_flyers") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/listing/expire-flyers" ?>">Expired <?php if($flyersExpireData && $flyersExpireData[0]->flyersCount > 0) { ?><span class="nav-tag red"><?php echo $flyersExpireData[0]->flyersCount ; ?></span><?php } ?></a></li> 

							<li class="<?php if ($page=="Blocked_flyers") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/listing/blocked-flyers" ?>">Blocked <?php if($flyersBlockedData && $flyersBlockedData[0]->flyersCount > 0) { ?><span class="nav-tag red"><?php echo $flyersBlockedData[0]->flyersCount ; ?></span><?php } ?></a></li> 
					</ul>	
				</li>
				
			</ul>

			<ul>
				<li class="<?php if ($page=="User_booking") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/user-booking" ?>"><i class="fa fa-ticket"></i> User Ticket Booking</a></li>
			</ul>	
			<ul>
				<li class="<?php if ($page=="interestIn") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/interested_in" ?>"><i class="sl sl-icon-user"></i> Interested In</a></li>
			</ul>	


			<ul>
				<li class="<?php if ($page=="Active" || $page=="Expire" || $page=="Cancel") {
							echo "active";
						} ?>" ><a><i class="fa fa-ticket"></i> Ticket Booking</a>
					<ul>
						<li class="<?php if ($page=="Active") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/listing/active-ticket" ?>">Active <?php if($ticketActiveData && $ticketActiveData[0]->ticketCount > 0) { ?><span class="nav-tag green"><?php echo $ticketActiveData[0]->ticketCount ; ?></span><?php } ?></a></li>
					<!-- 	<li><a href="#">Pending <span class="nav-tag yellow">0</span></a></li>-->
						<li class="<?php if ($page=="Expire") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/listing/expire-ticket" ?>">Expired <?php if($ticketExpireData && $ticketExpireData[0]->ticketCount > 0) { ?><span class="nav-tag red"><?php echo $ticketExpireData[0]->ticketCount ; ?></span><?php } ?></a></li> 
						<li class="<?php if ($page=="Cancel") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/listing/canceled-ticket" ?>">Cancelled <?php if($ticketCancelData && $ticketCancelData[0]->ticketCount > 0) { ?><span class="nav-tag red"><?php echo $ticketCancelData[0]->ticketCount ; ?></span><?php } ?></a></li>
					</ul>	
				</li>
				
			</ul>	

			<ul data-submenu-title="Account">
				<li class="<?php if ($page=="Profile") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/profile" ?>"><i class="sl sl-icon-user"></i> My Profile</a></li>
				<li class="<?php if ($page=="changePassword") {
							echo "active";
						} ?>"><a href="<?php echo BASEURL."/user/dashboard/change-password" ?>"><i class="sl sl-icon-lock"></i> Change Password</a></li>
				<li class=""><a href="<?php echo BASEURL."/login/logout" ?>" onclick="javascript:return confirm('Are You Sure ! You Want To Logout.');" ><i class="sl sl-icon-power"></i> Logout</a></li>
			</ul>

		</div>
	</div>
	<!-- Navigation / End -->