
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
           <!--  <ul>
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

        <form method="post" enctype="multipart/form-data" onsubmit="return postcodeValidate();">


        <div class="dashboard-list-box margin-top-0">
          <h4 class="gray">Profile Details</h4>
          <div class="dashboard-list-box-static">
            
            <!-- Avatar -->
            <div class="edit-profile-photo">
              <img id="myImage" src="<?php if ($userData->profileImage != "") {
        
          echo $userData->profileImage ;
        
              } else {
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
              <input name="txt_firstName" value="<?php echo $userData->firstName; ?>" type="text" required>
             </div>
             <div class="col-md-6">
               <label>Last Name</label>
              <input name="txt_lastName" value="<?php echo $userData->lastName; ?>" type="text" required>
             </div>
             <div class="col-md-12">

               <label>Gender</label>

            <select data-placeholder="Select Gender" name="gender" required class="chosen-select" style="display: none;">
              <option label="blank"></option> 
              <option value="male" <?php if ($userData->gender=="male") {
              echo "Selected";
              } ?> >Male</option>
              <option value="female" <?php if ($userData->gender=="female") {
              echo "Selected";
              } ?> >Female</option>
            
            </select>
             </div>
             


             <div class="col-md-12">

      <label>Funcies</label>

      <select id="txt_keyword" data-placeholder="Select Multiple Funcies" name="txt_keyword[]" class="chosen-select"  multiple>
        <?php $funcies=explode(",", $userData->funcies) ;
         foreach ($funciesData as $funciesData) {
                   ?>
                   <option value="<?php echo $funciesData->funciesName; ?>" <?php if (in_array($funciesData->funciesName, $funcies)) {
                    echo "Selected";
                   } ?> ><?php echo $funciesData->funciesName; ?></option>
                   <?php } ?> 
      </select>
    
    </div>
             
             
              <div class="col-md-6">
              <label>Email</label>
              <input name="txt_email" value="<?php echo $userData->emailId; ?>" type="text" required>
              </div>
              <div class="col-md-6">
              <label>Phone</label>
              <input name="txt_phone" value="<?php echo $userData->contactNumber; ?>" type="text" required>
            </div>
             <div class="col-md-6">
              <label>Alternate Phone</label>
              <input name="txt_altPhone" value="<?php echo $userData->altContactNumber; ?>" type="text">
            </div>
             
              
             <div class="col-md-6">
              <label>City</label>
              <input name="txt_city" value="<?php echo $userData->city; ?>" type="text" required>
              </div>
              <div class="col-md-6">
               <label>Postcode</label>
              <input name="txt_zip" value="<?php echo $userData->zipcode; ?>" type="text" id="postcode" required> 
              <span id="mydiv"></span>  
               <!-- <mark id="mydiv"></mark> -->

             </div>
              <div class="col-md-6">
               <label>Address</label>
             <input name="txt_address" value="<?php echo $userData->address; ?>" type="text" required>
             </div>

             <div class="col-md-12">
               <label>About me</label>
             <textarea  name="description" cols="20" rows="2" id="description" spellcheck="true"><?php echo $userData->description ; ?></textarea>

             <!-- <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true"><?php echo $flyersData->description ; ?></textarea> -->

             </div>

                <div class="text-center">
            <button type="submit" name="btnUpdateUser" onclick="postcodeValidate();" class="button margin-top-15">Update</button>  
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

    function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        /*if (password != confirmPassword) {*/
        if (/^\d{5,10}$/.test(postcode)) {
           /* document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';*/
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast five digit</p>'; }
        return false;
    }

    /*function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        
        if (/^\d{5,10}$/.test(postcode)) {
            document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast five digit</p>'; }
        return false;
    }*/

</script>

<script type="text/javascript">

$(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImage').attr('src', e.target.result);
};


</script>
  






