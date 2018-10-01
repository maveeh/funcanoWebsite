<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Profile</h2>
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
				<form method="post" enctype="multipart/form-data">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Profile Details</h4>
					<div class="dashboard-list-box-static">
						
						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="<?php if ($OrgData->profileImage!="") {
                echo UPLOADPATH."/organizerProfile/".$OrgData->profileImage ;
              }else{
                 echo UPLOADPATH."/dummy-profile.png";
              } ?>" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" class="upload" name="profileImage" />
								</div>
							</div>
						</div>
	
						<!-- Details -->
						<div class="my-profile">

							 <div class="col-md-6">
               <label>First Name</label>
              <input name="txt_firstName" value="<?php echo $OrgData->orgFirstName ; ?>" type="text" required>
             </div>
             <div class="col-md-6">
               <label>Last Name</label>
              <input name="txt_lastName" value="<?php echo $OrgData->orgLastName ; ?>" type="text" required>
             </div>
             
             
             
              <div class="col-md-6">
              <label>Email</label>
              <input name="txt_email" value="<?php echo $OrgData->orgEmail ; ?>" type="text" required>
              </div>
              <div class="col-md-6">
              <label>Phone</label>
              <input name="txt_phone" value="<?php echo $OrgData->orgContact ; ?>" type="text" required>
            </div>
             <div class="col-md-6">
              <label>Alternate Phone</label>
              <input name="txt_altPhone" value="<?php echo $OrgData->orgAltContact ; ?>" type="text">
            </div>
             
              
             <div class="col-md-6">
              <label>City</label>
              <input name="txt_city" value="<?php echo $OrgData->city ; ?>" type="text" required>
              </div>
              <div class="col-md-6">
               <label>Zip</label>
              <input name="txt_zip" value="<?php echo $OrgData->orgZip ; ?>" type="text" required>
             </div>
              <div class="col-md-6">
               <label>Address</label>
             <input name="txt_address" value="<?php echo $OrgData->orgAddress; ?>" type="text" required>
             </div>
                <div class="text-center">
            <button type="submit" name="btnUpdateOrg" class="button margin-top-15">Update</button>
          </div>
						</div>
	
					

					</div>
				</div>
				</form>
			</div>
			<div class="col-lg-1 col-md-12"></div>

			<!-- Change Password -->
			

	<?php $this->load->viewF("inc/footerDashboard"); ?>