<?php $this->load->viewF("inc/header"); ?>
<div class="row">

      <!-- Profile -->
      <div class="col-lg-2">
	  <svg class="OrRegTrig01" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57 50" role="img" aria-label="Triangle"><defs><linearGradient id="6764f2a2-47d1-41af-a19c-5b510644a791" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#00dcaf"></stop><stop offset="100%" stop-color="#6d47d9"></stop></linearGradient></defs><path d="M56.7,47L30.2,1c-0.8-1.3-2.7-1.3-3.5,0L0.3,47c-0.8,1.3,0.2,3,1.7,3h53C56.5,50,57.5,48.3,56.7,47z M5.5,46l23-40l23,40 H5.5z" fill="url(#6764f2a2-47d1-41af-a19c-5b510644a791)"></path></svg>
	  </div>
      <div class="col-lg-8 col-md-12 svgZindex">
        <div class="dashboard-list-box margin-top-50 margin-bottom-100">
          <h4 class="gray">Organizer Registration</h4>
          <div class="dashboard-list-box-static">
            <?php echo $this->common_lib->showSessMsg(); ?>
            <form method="post" enctype="multipart/form-data">
           
            <div class="my-profile">
             <div class="col-md-6">
               <label>First Name</label>
              <input name="txt_firstName" value="" type="text" required>
             </div>
             <div class="col-md-6">
               <label>Last Name</label>
              <input name="txt_lastName" value="" type="text" required>
             </div>
             
              <div class="col-md-6">
              <label>Email</label>
              <input name="txt_email" value="" type="text" required>
              </div>
              <div class="col-md-6">
              <label>Phone</label>
              <input name="txt_phone" value="" type="text" required>
            </div>
             <div class="col-md-6">
              <label>Alternate Phone</label>
              <input name="txt_altPhone" value="" type="text">
            </div>
             <div class="col-md-6">
              <label>Password</label>
              <input name="txt_password" id="txt_password" value="" type="text" required>
             </div>
              <div class="col-md-6">
               <label>Confirm Password</label>
              <input name="txt_confirmPass" id="txt_confirmPass" value="" type="text" required>
              </div>
             <div class="col-md-6">
              <label>City</label>
              <input name="txt_city" value="" type="text" required>
              <!-- <select class="chosen-select-no-single" name="txt_city" >
                    <option label="blank">Select City</option>  
                    <option>New York</option>
                    <option>Los Angeles</option>
                    <option>Chicago</option>
                    <option>Houston</option>
                    <option>Phoenix</option>
                    <option>San Diego</option>
                    <option>Austin</option>
                  </select> -->
              </div>
              <div class="col-md-6">
               <label>Zip Code</label>
              <input name="txt_zip" value="" type="text" required>
             </div>
              <div class="col-md-6">
               <label>Address</label>
             <input name="txt_address" value="" type="text" required>
             </div>
                <div class="text-center">
            <button type="submit" name="btnOrgRegi" class="button margin-top-15">Register</button>
          </div>
		  
               </div>
             
          </form>
          </div>
		  
        </div>
		<div>
			<svg class="OrRegWave01" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 24" role="img" aria-label="Squiggle"><defs><linearGradient id="a8c56411-55a2-4244-965d-9ab7f8322f88" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#f93d66"></stop><stop offset="100%" stop-color="#6d47d9"></stop></linearGradient></defs><path d="M114 22c0 1.1-.9 2-2 2-3.2 0-5.8-1.3-8-3.8-1.6-1.7-2.6-3.4-4.7-7.3-3.8-6.8-5.7-9-9.2-9-3.5 0-5.5 2.1-9.2 9-2.1 3.9-3.2 5.5-4.8 7.3-2.2 2.5-4.8 3.8-8 3.8s-5.8-1.3-8-3.8c-1.6-1.7-2.6-3.4-4.8-7.3-3.8-6.8-5.7-9-9.2-9-3.5 0-5.5 2.1-9.2 9-2.1 3.9-3.2 5.5-4.8 7.3-2.2 2.5-4.8 3.8-8 3.8s-5.8-1.3-8-3.8c-1.6-1.7-2.6-3.4-4.7-7.3C7.5 6.1 5.5 4 2 4 .9 4 0 3.1 0 2s.9-2 2-2c3.2 0 5.8 1.3 8 3.8 1.6 1.7 2.6 3.4 4.7 7.3 3.8 6.9 5.7 9 9.2 9 3.5 0 5.5-2.1 9.2-9 2.2-3.9 3.2-5.5 4.8-7.3C40.2 1.3 42.8 0 46 0s5.8 1.3 8 3.8c1.6 1.7 2.6 3.4 4.8 7.3 3.8 6.9 5.7 9 9.2 9 3.5 0 5.5-2.1 9.2-9 2.2-3.9 3.2-5.5 4.8-7.3C84.2 1.3 86.8 0 90 0s5.8 1.3 8 3.8c1.6 1.7 2.6 3.4 4.8 7.3 3.8 6.9 5.7 9 9.2 9 1.1-.1 2 .8 2 1.9z" fill="url(#a8c56411-55a2-4244-965d-9ab7f8322f88)"></path></svg>
			<svg class="OrRegRing02" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85 85" role="img" aria-label="Circle"><defs><linearGradient id="045af5b9-56a4-4f42-b4bd-43873ca0e1b2" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#6d47d9"></stop><stop offset="100%" stop-color="#f93d66"></stop></linearGradient></defs><path d="M42.5 4C63.7 4 81 21.3 81 42.5S63.7 81 42.5 81 4 63.7 4 42.5 21.3 4 42.5 4m0-4C19 0 0 19 0 42.5S19 85 42.5 85 85 66 85 42.5 66 0 42.5 0z" fill="url(#045af5b9-56a4-4f42-b4bd-43873ca0e1b2)"></path></svg>
			
			<svg class="OrRegRinga01" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 51" role="img" aria-label="Spiral"><defs><linearGradient id="d8bb34be-35d3-4e89-aaa7-efc2b5f90033" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#f7bc28"></stop><stop offset="100%" stop-color="#f93d66"></stop></linearGradient></defs><path d="M46.2 34.2C42.5 44.3 33 50.6 23.1 50.6c-2.7 0-5.4-.5-8-1.4-5.6-2.1-10.3-6.4-12.8-11.9C-.1 31.9-.3 26 1.7 20.7c2-5.1 6-9.4 11-11.6 4.8-2.1 10-2.3 14.8-.5 4.6 1.8 8.4 5.5 10.3 10 1.9 4.3 1.9 9 .2 13.2-1.6 4.1-4.9 7.4-8.9 9.1-3.8 1.6-7.9 1.6-11.6 0-3.5-1.5-6.3-4.4-7.7-8-1.3-3.3-1.3-6.9.1-10 1.3-3 3.8-5.3 6.9-6.4 2.8-1 5.8-.9 8.4.3 2.5 1.2 4.4 3.4 5.2 6 .7 2.3.5 4.7-.6 6.7-.9 1.8-2.7 3.2-4.8 3.8-1.9.5-3.8.2-5.4-.8-1.5-1-2.4-2.7-2.5-4.4-.1-1.3.4-2.6 1.4-3.4 1-1 3-1.2 4.2-.4 1.1.7 1.5 1.9 1.1 3.1-.3 1-1.4 1.6-2.4 1.3.1.2.3.4.5.5.7.5 1.6.4 2.1.3 1-.2 1.8-.9 2.2-1.8.8-1.4.6-2.8.3-3.7-.5-1.5-1.6-2.9-3.1-3.6-1.6-.8-3.5-.8-5.3-.2-2 .7-3.7 2.3-4.6 4.3-.9 2.1-1 4.6-.1 6.9 1 2.6 3 4.7 5.5 5.7 2.7 1.1 5.7 1.1 8.5 0 3-1.3 5.5-3.8 6.7-6.9 1.3-3.2 1.2-6.8-.2-10.1-1.5-3.6-4.5-6.4-8.1-7.9-3.8-1.5-7.9-1.3-11.7.4-3.9 2-7.1 5.4-8.7 9.5-1.6 4.3-1.4 9.1.6 13.5 2.1 4.5 5.9 8.1 10.4 9.8 10.2 3.7 22.1-2.1 26-12.6 4-11.3-2.3-24.3-13.9-28.5-1-.4-1.6-1.5-1.2-2.6.4-1 1.5-1.6 2.6-1.2 13.6 5 21.1 20.4 16.3 33.7z" fill="url(#d8bb34be-35d3-4e89-aaa7-efc2b5f90033)"></path></svg>
		  </div>
      </div>
      <div class="col-lg-2">
	  
	  <svg class="OrRegSlant01" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 134.9 70.1" role="img" aria-label="Lines"><defs><linearGradient id="1256645b-1226-40fa-b9f9-89e06890fe34" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" stop-color="#f7bc28"></stop><stop offset="100%" stop-color="#f93d66"></stop></linearGradient></defs><path d="M2 70.1c-.5 0-1-.2-1.4-.6-.8-.8-.8-2 0-2.8L66.7.6c.8-.8 2-.8 2.8 0s.8 2 0 2.8L3.4 69.5c-.4.4-.9.6-1.4.6zM33.1 70.1c-.5 0-1-.2-1.4-.6-.8-.8-.8-2 0-2.8L97.7.6c.8-.8 2-.8 2.8 0s.8 2 0 2.8l-66 66.1c-.4.4-.9.6-1.4.6zM66.8 70.1c-.5 0-1-.2-1.4-.6-.8-.8-.8-2 0-2.8L131.5.6c.8-.8 2-.8 2.8 0s.8 2 0 2.8L68.2 69.5c-.4.4-.9.6-1.4.6z" fill="url(#1256645b-1226-40fa-b9f9-89e06890fe34)"></path></svg>	  
	  </div>
    </div>





<?php $this->load->viewF("inc/footer"); ?>

<script type="text/javascript">
function onSubmitConfirm(){
   var password11= document.getElementById('txt_password').value;
       var password22= document.getElementById('txt_confirmPass').value;
       if (password11!=password22) {
        alert( 'please Enter Correct Password'); 
       };

}
   </script>