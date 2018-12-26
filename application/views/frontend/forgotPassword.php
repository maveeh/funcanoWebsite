<?php $this->load->viewF("inc/header"); ?>

<!-- Content
================================================== -->

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Forgot Password</h2>

			
				<nav id="breadcrumbs">
					
				</nav>

			</div>
		</div>
	</div>
</div>


<div class="container">
	      
        <form method="post"   class="register">
      
             <?php echo $this->common_lib->showSessMsg(); ?>
            
       <div class="row">
     <div class="col-md-3"></div>
      <div class="col-md-5">
								<h5> Enter Email <i class="tip" data-tip-content="Your Registered Email-Id"><div class="tip-content">Your registered email address</div></i></h5>
								<input class="search-field" name="email" id="email" type="text" required>
							</div>
							 <div class="col-md-3">
      		  <input type="submit"  class="button border fw margin-top-40" name="forgotPassword" value="Submit" />  
      	</div>
           <div class="col-md-2"></div>
           </div>   
             <div class="row">
     <div class="col-md-3"></div>
      <div class="col-md-5"><span>Link to reset password will be sent to registered email address.</span></div>
          

            

            
     <!--  <div class="row">
      	  <div class="col-md-3">
      </div>
      	<div class="col-md-6">
      		  <input type="button" onclick="userForm();" class="button border fw margin-top-10" name="userRegister" value="Register" />  
      	</div>
      	  <div class="col-md-3">
      </div>
             

              

      </div> -->
      
              </form> 
</div>



<?php $this->load->viewF("inc/footer"); ?>