<?php $this->load->viewD('inc/header'); ?>

<!-- Main section-->
<section>
 <!-- Page content-->
 <div class="content-wrapper">
	<div class="container-md">
	   <div class="row">
		  <div class="col-md-3">
			 <div class="panel b">
				<div class="panel-heading bg-gray-lighter text-bold">Profile Settings</div>
				<div class="list-group">
					<a href="#tabSetting1" data-toggle="tab" class="list-group-item">Edit Profile <!--<?php echo $selPanel; ?>--></a>
					<a href="#tabSetting2" data-toggle="tab" class="list-group-item">Change Password</a>
				</div>
			 </div>
		  </div>
		  <div class="col-md-9">
			 <div class="tab-content p0 b0">
				<div id="tabSetting1" class="tab-pane <?php echo ($selPanel == "editPro") ? "active" : ""; ?>">
				 <form method="post" name="frmProfile" action="#" >  <div class="panel b panel-info">

				 	<!-- data-parsley-validate="" novalidate="" -->
						
					  <div class="panel-heading text-bold">Edit Profile</div>
					  <div class="panel-body">
						 
						 <div class="form-group">						 	
							<?php echo ($selPanel == "editPro") ? $this->common_lib->showSessMsg() : "";
								/* if($profileMsg != "" && $alertType==1)
									echo '<div role="alert" class="alert alert-success ">'.$profileMsg.'</div>';
								 */
								// echo $profileMsg;
							?>
						   
						 </div>

						<div class="form-group">
							   <label>Name *</label>
							   <input type="text" name="txtName" value="<?php echo $data->name ; ?>" required class="form-control">
							</div>
							<div class="form-group">
							   <label>Email *</label>
							   <input type="text" name="txtEmail" value="<?php echo $data->emailId ; ?>" required class="form-control">
							</div>
							<!-- <div class="form-group">
							   <label>Contact Number</label>
							   <input type="text" name="txtContact" value="<?php echo $data->mobile ; ?>" required class="form-control">
							</div> -->
							<!-- <div class="form-group">
							   <label>Address *</label>
							   <textarea rows="3" name="txtAddress" required class="form-control"><?php echo $data->address ; ?></textarea>
							</div> -->
							
					  </div>
						<div class="panel-footer text-center">
							<button type="submit" name="btnEditProfile" class="btn btn-info">Update Profile</button>
							<p>
							   <small class="text-muted">* Fields are mendatory</small>
							</p>
						</div>
				   </div>
				   </form>
				</div>
				<div id="tabSetting2" class="tab-pane <?php echo ($selPanel == "editPass") ? "active" : ""; ?>">
					
						 <form method="post" name="frmChangePassword"  onsubmit="return passwordValidate()" action="#" >
				   <div class="panel b panel-info">
  
                        <!-- data-parsley-validate="" novalidate="" -->
					  <div class="panel-heading text-bold">Change Password</div>
					  <div class="panel-body">
						<div class="form-group">
							<?php echo ($selPanel == "editPass") ? $this->common_lib->showSessMsg() : ""; 
								/* if($passMsg != "" && $alertType == 1) {
									echo '<div role="alert" class="alert alert-success ">'.$passMsg.'</div>';
								} else if($passMsg != "" && $alertType == 2) {
										echo '<div role="alert" class="alert alert-warning ">'.$passMsg.'</div>';
								} */
							?>
						</div>
					  
							<div class="form-group">
							   <label>Current password</label>
							   <input type="password" name="txtCurrentPass" required class="form-control">
							</div>
							<div class="form-group">
							   <label>New password</label>
							   <input  type="password" name="txtNewPass"  id="txtNewPass" required class="form-control">
							</div>
							<div class="form-group">
							   <label>Confirm new password</label>
							   <input type="password" name="txtConfirmPass"  id="txtConfirmPass" required class="form-control" onkeyup="passwordValidate()">
							   <span id='mydiv'></span>

							</div>
							
						</div>
						<div class="panel-footer text-center">
							<button type="submit" onsubmit="passwordValidate()" name="btnChangePass" class="btn btn-info">Change Password</button>
							<p>
							   <small class="text-muted">* All fields are mendatory</small>
							</p>
						</div>
				   </div> 
				   </form>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
</section>
<?php $this->load->viewD('inc/footer'); ?>

<script type="text/javascript">
    function passwordValidate() {
        var password = document.getElementById("txtNewPass").value;
        var confirmPassword = document.getElementById("txtConfirmPass").value;
        if (password != confirmPassword) {
            document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Password do not match</p>';
            return false;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;">Password Matched</p>'; }
        return true;
    }
</script>

</body>

</html>