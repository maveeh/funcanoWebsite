<?php // v3print($allQuestions); exit; ?>
<?php $this->load->viewF("inc/header"); ?>
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>FAQ</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<!-- <ul>
						<li><a href="#">Home</a></li>
						<li>About Us</li>
					</ul> -->
				</nav>

			</div>
		</div>
	</div>
</div>

<div class="container">


<div class="row">




<div class="col-md-6">
			

			<!-- Toggles Container -->
			<div class="style-2">
				<?php  if (valResultSet($adminQuestions)) {
					foreach ($adminQuestions as $adminQuestions) {
						?>
				
				<!-- Toggle 1 -->
				<div class="toggle-wrap">
					<span class="trigger"><a href="#"><i class="fa fa-question-circle"></i> <?php echo $adminQuestions->question ; ?>
						
						<i class="sl sl-icon-plus"></i> </a></span>
					<div class="toggle-container">
						<p><?php if ($adminQuestions->answer!="") {
						 echo $adminQuestions->answer ; } ?></p>
					</div>
				</div>

				<?php	}
				} ?>

				

			</div>
			<!-- Toggles Container / End -->
		</div>



<div class="col-md-6">
<h3 class="margin-top-0 margin-bottom-30">Ask Question ?</h3>
	<?php echo $this->common_lib->showSessMsg(); ?>
			<div class="row">
				<form method="post">
				<div class="col-md-10">
					
					<input type="text" name="txtQuestion" required placeholder="Type Your Question ">
					<input type="hidden" name="userId" value="<?php echo $this->session->userdata(PREFIX.'sessUserId') ; ?>">
				</div>
				<div class="col-md-2">
					<button type="submit" style="padding: 10px 18px;" name="btnQuestion" class="button">Submit</button>
				</div>

				</form>

			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- <ul class="color">
						
						<li><h3></h3>
							  <h4><?php echo $allQuestions->answer ; ?></h4>
				        </li>
				     
					</ul> -->
					
					<!-- <h3><span class="trigger"><i class="fa fa-question-circle"></i>  
					</span>
					</h3>
					<h4><span class="trigger"> 
					</span></h4> -->

					<div class="style-2">
					<?php  if (valResultSet($allQuestions)) {
							 foreach ($allQuestions as $allQuestions) {
							 ?>

					   <div class="toggle-wrap">
					<span class="trigger"><a href="#"><i class="fa fa-question-circle"></i> 
						<?php echo $allQuestions->question ; ?>
						<h6 style="padding-left: 27px;"><?php echo $allQuestions->firstName." ".$allQuestions->lastName ; ?></h6>
						
						<i class="sl sl-icon-plus"></i> </a></span>

					<div class="toggle-container">
						<p><?php if ($allQuestions->answer!="") {
						 echo $allQuestions->answer ; } ?></p>
					</div>
				</div>

				   <?php } } ?>
				</div>
			</div>

			</div>
		
		</div>

</div>
 
 </div>

 </div> 



<?php $this->load->viewF("inc/footer"); ?>


					
					
		