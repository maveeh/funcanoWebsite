<?php $this->load->viewF("inc/header"); ?>
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Support</h2>

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
		<div class="col-md-2"></div>
		<div class="col-md-8">

				<section id="contact">
			

				<div id="contact-message"></div> 
					 <?php 
                                    if(isset($_POST['supportSubmit'])){
                                        $to = "vishaljangamv@gmail.com"; // this is your Email address

                                       /* $from = trim($_POST['email']);*/
                                       
                                       $from = "info@funcano.com";  // this is the sender's Email address
                                       
                                        $name = $_POST['name'];
                                        $subject = "Funcano - Support";
                                      //  $subject2 = "Copy of your form submission";
                                       // $message2 = $name . " wrote the following:" . "\n\n" . $_POST['comments'];
                                          $message = "\n\n Support Request from: " . $name . 
                                        "\n\n Email: " . $_POST['email'] . 
                                         "\n\n Subject: " . $_POST['subject'];

                                        $headers = "From:" . $from;
                                        $headers2 = "From:" . $to;
                                        mail($to,$subject,$message,$headers);
                                        /*mail($from,$subject2,$message2,$headers2);*/ // sends a copy of the message to the sender
                                        ;
                                        // You can also use header('Location: thank_you.php'); to redirect to another page.
										 echo '<div class="notification success"><span>"Thank you "'. $name .'", We will contact you shortly."</span></div>';
                                        }
                                    ?>

				                

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
					
						<textarea name="subject" type="text" id="subject" placeholder="Subject" required="required"></textarea>
					</div>

					

					<input type="submit" name="supportSubmit" class="submit button" id="submit" value="Submit" />

					</form>
			</section>




		</div>
		<div class="col-md-2"></div>

	</div>
</div>





<?php $this->load->viewF("inc/footer"); ?>