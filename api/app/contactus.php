<?php

$app->post('/contactUs', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	
	
		
		$insertArr['emailId'] 			= $allPostVars['emailId'];
		$insertArr['message'] 			= $allPostVars['message'];
		$insertArr['subject'] 			= $allPostVars['subject'];	
		$insertArr['contactNo'] 	    = $allPostVars['contactNo'];	
		$insertArr['name'] 			    = $allPostVars['name'];	
		
		
		$result = $db->insert("fc_contact_us",$insertArr);
	
		if ($result){
			echo json_encode((object)array("status" => true,"message"=>"successfully inserted"));
			
		} 
	 else {
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

	} 
});	