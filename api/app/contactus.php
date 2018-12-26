<?php

$app->post('/contactUs', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	
	
					 if(isset($allPostVars['email'])){
                        $to = "maveeh@hotmail.co.uk "; // this is your Email address

                       /* $from = trim($allPostVars['email']);*/
                       
                       $from = "info@funcano.com";  // this is the sender's Email address
                       
                        $name = $allPostVars['name'];
                        $subject = "Funcano - Enquiry";
                        $subject2 = "Copy of your form submission";
                        $message2 = $name . " wrote the following:" . "\n\n" . $allPostVars['comments'];
                          $message = "\n\n Enquiry from: " . $name . 
                        "\n\n Email: " . $allPostVars['email'] . 
                         "\n\n Subject: " . $allPostVars['subject'] . 
                         "\n\n Message: " . $allPostVars['comments'];

                        $headers = "From:" . $from;
                        $headers2 = "From:" . $to;
                        mail($to,$subject,$message,$headers);
                        /*mail($from,$subject2,$message2,$headers2);*/ // sends a copy of the message to the sender
                        ;
                        // You can also use header('Location: thank_you.php'); to redirect to another page.
						// echo '<div class="notification success"><span>"Thank you "'. $name .'", We will contact you shortly."</span></div>';
                                       
                                       
					echo json_encode((object)array("status" => true,"message"=>"Thank you ". $name .", We will contact you shortly."));
			
		} 
	 else {
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

	} 
});	