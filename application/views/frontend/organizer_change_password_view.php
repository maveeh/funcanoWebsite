<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Account Setting</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Profile</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Profile -->
			<div class="col-lg-1 col-md-12"></div>
			<div class="col-lg-10 col-md-12">

				<form method="post">
				<div class="dashboard-list-box margin-top-0">
					
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">
						<?php echo $this->common_lib->showSessMsg(); ?>
						<!-- Avatar -->
						<!-- <div class="edit-profile-photo">
							<img src="<?php echo FRONTIMG."/images/user-avatar.jpg"?>" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" class="upload" />
								</div>
							</div>
						</div> -->
	
						<!-- Details -->
						<div class="my-profile">
							
					
				

						<!-- Change Password -->
						<div class="my-profile">
							<label class="margin-top-0">Current Password</label>
							<input type="password" name="txt_currentPass" required>

							<label>New Password</label>
							<input type="password" name="txt_newPass" required>

							<label>Confirm New Password</label>
							<input type="password" name="txt_confirmPass" required>

                        <div class="text-center">

							<button  type="submit" name="btnChangePassOrg" class="button margin-top-15">Change Password</button>
						</div>
						</div>

					</div>
				</div>
			</div>


						
				</form>
			</div>
			<div class="col-lg-1 col-md-12"></div>

			<!-- Change Password -->
			

	<?php $this->load->viewF("inc/footerDashboard"); ?>