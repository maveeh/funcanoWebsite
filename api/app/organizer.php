<?php

$app->post('/orgRegistration', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	if (isset($allPostVars['orgEmail'])){
		
		$insertArr['orgFirstName'] 			= $allPostVars['orgFirstName'];
		$insertArr['orgLastName'] 			= $allPostVars['orgLastName'];
		$insertArr['orgEmail'] 			= $allPostVars['orgEmail'];	
		$insertArr['gender'] 			= $allPostVars['gender'];	
		$insertArr['password'] 			= $allPostVars['password'];	
		if (isset($allPostVars['profileImageName'])) {
			$imgname=$allPostVars['profileImageName'];
			$insertArr['profileImage'] 			=$imgname;
		}
		
		$result = $db->selTable("fc_organizer","organizerId","orgEmail='".$allPostVars['orgEmail']."'");
		//print_r($result);exit;
		if ($result){
			echo json_encode((object)array("status" => false,"message"=>"Email-Id already exist"));
		} else {
		
			$insUser=$db->insert("fc_organizer", $insertArr);	
			if($insUser!="") {
						//base 64 image stired into database ...
						$decodedImage= base64_decode($allPostVars['profileImage']);
						$path=ABSUPLOADPATH."/organizerProfile/".$imgname;
						file_put_contents($path,$decodedImage);
						$userData=$db->selTable("fc_organizer","*","organizerId=".$insUser);
								 if ($userData) {
								 	$userData[0]['profileImage']=UPLOADPATH.'/organizerProfile/'.$userData[0]['profileImage'];

								echo json_encode((object)array("status" => true, "loginType"=>2 ,"message"=>"Organizer login successfully" ,"userData" => $userData));
								 }
					}
		}
		//$db->insertOrUpdate("tims_user", $insertArr);	
	} else {
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

	} 
});	




$app->post('/orgProfileEdit', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT

	$allPostVars = $request->getParsedBody();
	
	if (isset($allPostVars['organizerId'])) {
	
		if (isset($allPostVars['orgFirstName'])){
			$updateArr['orgFirstName'] 			= $allPostVars['orgFirstName'];}
		if (isset($allPostVars['orgLastName'])){
			$updateArr['orgLastName'] 			= $allPostVars['orgLastName'];}

		if (isset($allPostVars['orgEmail'])){
			$updateArr['orgEmail'] 			= $allPostVars['orgEmail'];}
		if (isset($allPostVars['gender'])){
			$updateArr['gender'] 			= $allPostVars['gender'];}
		if (isset($allPostVars['aboutMe'])){
			$updateArr['aboutMe'] 			= $allPostVars['aboutMe'];}
		if (isset($allPostVars['profileImage'])){
			$updateArr['profileImage'] 			= $allPostVars['profileImage'];}
		if (isset($allPostVars['searchDistance'])){
			$updateArr['searchDistance'] 			= $allPostVars['searchDistance'];}
			

		$result=$db->update("fc_organizer",$updateArr,"organizerId=".$allPostVars['organizerId']);
		//print_r($result); exit ;
		if ($result) {

			echo json_encode((object)array("status" => true,"message"=>"Updated successfullly"));
			
		}
	} else echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

});	


$app->post('/orgForgotPassword', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT
	$allPostVars = $request->getParsedBody();

if (isset($allPostVars['orgEmail'])) {
		$result=$db->selTable("fc_organizer","orgEmail","orgEmail='".$allPostVars['orgEmail']."'");
		
		if ($result){
			$randomPassword = $db->randomPassword();
			$updateArr=array() ;
			$updateArr['password'] 		= $randomPassword;
			$db->update("fc_organizer",$updateArr,"orgEmail='".$allPostVars['orgEmail']."'");

			/*Send SMS OR Email */	

			echo json_encode((object)array("status" => true,"message"=>"Email sent on your registered email"));	
		}else{
			echo json_encode((object)array("status" => false,"message"=>"Invalid Email"));
		}
		}else{
				echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));
			}

});	


$app->post('/orgUploadimage', function ($request, $response, $args) use ($app) {

	if(isset($_FILES['profileImage'])) {
		
		$f_name=$_FILES['profileImage']['name'];
        $f_tmp= $_FILES['profileImage']['tmp_name'];
		$store=ABSUPLOADPATH."/organizerProfile/".$f_name;
		
		$f_extension=explode('.',$f_name);
		$f_extension=strtolower(end($f_extension));
		  if($f_extension=='jpg'||$f_extension=='gif'||$f_extension=='png')
		  {
			 if(move_uploaded_file($f_tmp,$store )){
			
		   // $query="insert into av_blog set photo='$name1'";

			echo json_encode((object)array("status" => true,"message"=>"uploaded succesfully"));
		} 
		  }
		  else
		  {
			echo json_encode(array("status" => true,"message"=>"File format is wrong"));
		  }
		
		
		
    }  
}); 
