<?php

$app->post('/registration', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	if (isset($allPostVars['emailId'])){
		
		$insertArr['firstName'] 			= $allPostVars['firstName'];
		$insertArr['lastName'] 			= $allPostVars['lastName'];
		$insertArr['emailId'] 			= $allPostVars['emailId'];			
		$insertArr['password'] 			= md5(trim($allPostVars['password']));
		if (isset($allPostVars['funcies'])) {
				$insertArr['funcies'] 			= $allPostVars['funcies'];
			}	
		
		if (isset($allPostVars['profileImageName'])) {
			$imgname=$allPostVars['profileImageName'];
			$insertArr['profileImage'] 			=$imgname;
		}
					
		$result = $db->selTable("fc_user","userId","emailId='".$allPostVars['emailId']."'");
		//print_r($result);exit;
		if ($result){


			echo json_encode((object)array("status" => false,"message"=>"Email-Id already exist"));
		} else {
		
			$insUser=$db->insert("fc_user",$insertArr);	
			if($insUser!="") {


				//base 64 image stired into database ...
				$decodedImage= base64_decode($allPostVars['profileImage']);
				$path=ABSUPLOADPATH."/userProfile/".$imgname;
				//echo $path; exit;
				file_put_contents($path,$decodedImage);

			//base 64 ends
				$userData=$db->selTable("fc_user","*","userId=".$insUser);
			 if ($userData) {
			 	$userData[0]['profileImage']=UPLOADPATH.'/userProfile/'.$userData[0]['profileImage'];

			echo json_encode((object)array("status" => true, "loginType"=>1 ,"message"=>"Successfully registered" ,"userData" => $userData));
			 }
			}

		}
		//$db->insertOrUpdate("tims_user", $insertArr);	
	} else {
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

	} 
});	

$app->post('/signIn', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT
	$allPostVars = $request->getParsedBody();
	/*$emailId=mysql_real_escape_string($allPostVars['emailId']);
		echo $emailId; exit ;*/
	if(isset($allPostVars['emailId']) && isset($allPostVars['password'])) {


		$result = $db->selTable("fc_user","*","emailId='".$allPostVars['emailId']."' AND password='".md5(trim($allPostVars['password']))."'");

		if ($result){
			$result[0]['profileImage']=UPLOADPATH.'/userProfile/'.$result[0]['profileImage'];

			echo json_encode((object)array("status" => true, "loginType"=>1 ,"message"=>"User login successfully" ,"userData" => $result));

        }else{ 

        	/*$orgResult = $db->selTable("fc_organizer","*","orgEmail='".$allPostVars['emailId']."' AND password='".$allPostVars['password']."'");
        	
			if ($orgResult) {
					$orgResult[0]['profileImage']=UPLOADPATH.'/organizerProfile/'.$orgResult[0]['profileImage'];
				echo json_encode((object)array("status" => true,"loginType"=>2 ,"message"=>"Organizer login successfully" ,"OrgData" => $orgResult));
			}else {
			}*/
			echo json_encode((object)array("status" => false,"message"=>"Invalid login details"));
			
		}
	} else echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

});	

$app->post('/profileEdit', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT

	$allPostVars = $request->getParsedBody();
	
	if (isset($allPostVars['userId'])) {
	
			if (isset($_POST['firstName'])) 
			$updateUser["firstName"]	=ucfirst($_POST['firstName']);
			if (isset($_POST['lastName'])) 
			$updateUser["lastName"]	=ucfirst($_POST['lastName']);
			if (isset($_POST['funcies']) && $_POST['funcies']!="") {
			 $updateUser["funcies"]	=$_POST['funcies'];
			}else {
				 $updateUser["funcies"]	="";
			}

			if (isset($_POST['contactNumber'])) 	
			$updateUser["contactNumber"]	=$_POST['contactNumber'];
			if (isset($_POST['altContactNumber'])) 	
			$updateUser["altContactNumber"]	=$_POST['altContactNumber'];
			if (isset($_POST['city'])) 	
			$updateUser["city"]	=$_POST['city'];
			if (isset($_POST['address'])) 	
			$updateUser["address"]	=$_POST['address'];
			if (isset($_POST['zipcode'])) 	
			$updateUser["zipcode"]	=$_POST['zipcode'];
			if (isset($_POST['gender'])) 	
			$updateUser["gender"]	=$_POST['gender'];
			if (isset($_POST['description'])) 	
			$updateUser["description"]	=$_POST['description'];
		
			if (isset($_POST['twitterLink'])) 		
			$updateUser["twitterLink"]	=$_POST['twitterLink'];	
			if (isset($_POST['facebookLink'])) 
			$updateUser["facebookLink"]	=$_POST['facebookLink'];
			if (isset($_POST['googleLink'])) 	
			$updateUser["googleLink"]	=$_POST['googleLink'];

			if (isset($allPostVars['profileImageName'])) {
				$imgname=$allPostVars['profileImageName'];
				$updateArr['profileImage'] 			=$imgname;
			}

		$result=$db->update("fc_user",$updateArr,"userId=".$allPostVars['userId']);
		//print_r($result); exit ;
		if ($result) {
					//base 64 image stired into database ...
				$decodedImage= base64_decode($allPostVars['profileImage']);
				$path=ABSUPLOADPATH."/userProfile/".$imgname;
				//echo $path; exit;
				file_put_contents($path,$decodedImage);

			//base 64 ends
				$userData=$db->selTable("fc_user","*","userId=".$allPostVars['userId']);
			 if ($userData) {
			 	$userData[0]['profileImage']=UPLOADPATH.'/userProfile/'.$userData[0]['profileImage'];

			echo json_encode((object)array("status" => true, "loginType"=>1 ,"message"=>"Successfully Updated" ,"userData" => $userData));
			 }
	} else { echo json_encode((object)array("status" => false,"message"=>"Something went wrong")); }
}

});	


$app->post('/updatePassword', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT


	$allPostVars = $request->getParsedBody();

	
	if (isset($allPostVars['userId']) && isset($allPostVars['password']) && isset($allPostVars['curPassword'])) {
		
    	$result = $db->selTable("fc_user","userId","password='".md5($allPostVars['curPassword'])."'");
		//print_r($result);
		if ($result){
			
			$updateArr['password'] 		= md5($allPostVars['password']);

			$result=$db->update("fc_user",$updateArr,"userId=".$allPostVars['userId']);
			if ($result) {
					
					echo json_encode((object)array("status" => true,"message"=>"Updated successfullly"));
				}
				
		} else {
		
			echo json_encode((object)array("status" => false,"messaget"=>"Current password is incorrect"));
		}
    } else echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));
 

});	

$app->post('/forgotPassword', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT
	$allPostVars = $request->getParsedBody();

if (isset($allPostVars['emailId'])) {
		$result=$db->selTable("fc_user","emailId","emailId='".$allPostVars['emailId']."'");
		
		if ($result){
			$randomPassword = $db->randomPassword();
			$updateArr=array() ;
			$updateArr['password'] 		= md5($randomPassword);
			$db->update("fc_user",$updateArr,"emailId='".$allPostVars['emailId']."'");

			/*Send SMS OR Email */	

			echo json_encode((object)array("status" => true,"message"=>"Email sent on your registered email"));	
		}else{
			echo json_encode((object)array("status" => false,"message"=>"Invalid Email"));
		}
		}else{
				echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));
			}

});	



$app->post('/userProfile', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT
	$allPostVars = $request->getParsedBody();

if (isset($allPostVars['userId'])) {
		$result=$db->selTable("fc_user","*","userId='".$allPostVars['userId']."'");
		
		if ($result){
			echo json_encode((object)array("status" => true ,"userData" => $result));
		}else{
			echo json_encode((object)array("status" => false,"message"=>"User Not Exist"));
		}
		}else{
				echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));
			}

});	



$app->post('/userUploadimage', function ($request, $response, $args) use ($app) {

	if(isset($_FILES['profileImage'])) {
		
		$f_name=$_FILES['profileImage']['name'];
        $f_tmp= $_FILES['profileImage']['tmp_name'];
		$store=ABSUPLOADPATH."/userProfile/".$f_name;
		
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





