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
						<!-- <ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Dashboard</a></li>
							<li>My Profile</li>
						</ul> -->
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Profile -->
			<div class="col-lg-1 col-md-12"></div>
			<div class="col-lg-10 col-md-12">

				<form method="post" onsubmit="return confirmPass();" id="changePassword" >
				<div class="dashboard-list-box margin-top-0">
					
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">
						<?php echo ($selPanel == "editPass") ? $this->common_lib->showSessMsg() : ""; 
								/* if($passMsg != "" && $alertType == 1) {
									echo '<div role="alert" class="alert alert-success ">'.$passMsg.'</div>';
								} else if($passMsg != "" && $alertType == 2) {
										echo '<div role="alert" class="alert alert-warning ">'.$passMsg.'</div>';
								} */
							?>
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
							<input id="txt_currentPass" name="txt_currentPass" type="password" required>

							<label>New Password</label>
							<input name="txt_newPass" id="txt_newPass" type="password" required >
							<mark id="newPassMessage" style="display: none;" ></mark>
							
							<label>Confirm New Password</label>
							<input type="password"  id="txt_confirmPass" name="txt_confirmPass" required>
							<mark id="conPassMessage" style="display: none;" ></mark>
							
                        <div class="text-center">

							<button type="submit" onclick="confirmPass();" name="btnChangePassword" class="button margin-top-15">Change Password</button>
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

	<script type="text/javascript">
   function confirmPass(){ 
	var passformat 	= /^.*(?=.{6,15})(?=.*\d)(?=.*[A-Z])(?=.*[@#$%&]).*$/;
	var currentPass	= document.getElementById('txt_currentPass').value;
	var password1		= document.getElementById('txt_newPass').value;
	var password2		= document.getElementById('txt_confirmPass').value;

	$('#newPassMessage').hide();
	$('#conPassMessage').hide();
	 
	if(password1 != "" && passformat.test(password1) == false){ 
		$('#newPassMessage').text("6-15 letters with 1 number, 1 uppercase, 1 special character from @#$%&").show();
		return false;
	}
	else if (password1 != "" && password2 != "" && password1 != password2) {
	$('#conPassMessage').text("Password do not match").show();
		return false;
	} 
	
	return true;
       	
       	/*alert( 'please Enter Correct Password');*/ 
    }
   </script>