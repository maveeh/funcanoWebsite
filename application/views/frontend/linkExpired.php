<?php $this->load->viewF("inc/header"); ?>

<!-- Content
================================================== -->

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Invalid URL</h2>

				<nav id="breadcrumbs">
					
				</nav>

			</div>
		</div>
	</div>
</div>


<div class="container">
	      
        <form method="post"   class="register">
      
             <?php //echo $this->common_lib->showSessMsg(); ?>
            
       

      


		<div class="row">
			<div class="col-md-2"></div>

			<div class="col-md-8">
				<div class="notification error closeable">
					<p><span>Oops! </span> this verification URL is incorrect OR might be expired. Lets try again!</p>
				</div>
			<div class="col-md-2"></div>
			</div>
		</div>

            

            
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