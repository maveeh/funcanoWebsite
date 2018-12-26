<?php $this->load->viewF("inc/header"); ?>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="margin-bottom-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Contact Us</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<!-- <ul>
						<li><a href="<?php echo BASEURL; ?>">Home</a></li>
						<li>Contact Us</li>
					</ul> -->
				</nav>

			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Content
================================================== -->

<!-- Map Container -->
<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
		<div ><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3152.093475858566!2d144.95967351554714!3d-37.81127944167452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642cab0b6f5e7%3A0xa738f6dd68b5a1e8!2sLittle+Lonsdale+St%2C+Melbourne+VIC+3000%2C+Australia!5e0!3m2!1sen!2sin!4v1528463899605" width="100%" height="422" frameborder="0" style="border:0" allowfullscreen></iframe></div>
		<a href="#" id="streetView">Street View</a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="<?php echo FRONTIMG."/images/our-office.jpg" ?> ">
			<div class="office-address">
				<h3>Our Office</h3>
				<ul>
					<li>John Street 304</li>
					<li>New York</li>
					<li>Phone (123) 123-456 </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Find Us Here</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p>Collaboratively administrate channels whereas virtual. Objectively seize scalable metrics whereas proactive e-services.</p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Fax"></i> <strong>Fax:</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">www.example.com</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#"><span class="__cf_email__" data-cfemail="573831313e343217322f363a273b327934383a">[email&#160;protected]</span></a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">Contact Form</h4>

				<div id="contact-message"></div> 

				              <?php echo $this->common_lib->showSessMsg(); ?>

					<form method="post" action="">

					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" placeholder="Your Name" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Email Address" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" placeholder="Subject" required="required" />
					</div>

					<div>
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="Message" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" name="submit" class="submit button" id="submit" value="Submit" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->



		
<?php $this->load->viewF("inc/footer"); ?>