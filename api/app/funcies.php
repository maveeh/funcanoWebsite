<?php 


$app->get('/getFuncies', function ($request, $response, $args) {
	
  // Load query common model
	$db = new Common_model;
		
	$funcies=$db->selTable("fc_funcies","","");
	if ($funcies) {
		 echo json_encode((object)array("status" => true,"message"=>"Categories of funcies","flyersData"=>$funcies));	
	}else{
	    echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));	
	}

	
});


$app->post('/userFuncies', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	
	//   mysql> SELECT * FROM pet WHERE name LIKE 'b%';
   if (isset($allPostVars['userId'])) {
   
   $result = $db->selTable("fc_user","funcies","userId=".$allPostVars['userId']);

   $funcies=explode(",", $result[0]['funcies']) ;
   $mainArr=array() ;
		foreach ($funcies as $funcies) {
	 $funciesData = $db->selTable("fc_funcies","funciesId,funciesName","funciesName='".$funcies."'");
	 	if ($funciesData!="") {
	 			$mainArr[]=$funciesData[0] ;
	 	}else{}
	

		}
	// print_r($mainArr) ; 	exit ;
		if ($mainArr){
	
		echo json_encode((object)array("status" => true,"funciesData" => $mainArr));

		} else {
		
		echo json_encode((object)array("status" => false,"message"=>"Result Not Found"));

		}
	 

   }
		
    
});	



$app->post('/addUserFuncies', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	
	//   mysql> SELECT * FROM pet WHERE name LIKE 'b%';
   if (isset($allPostVars['userId']) ) {
   
   $result = $db->selTable("fc_user","funcies","userId=".$allPostVars['userId']);

   $funcies=explode(",", $result[0]['funcies']) ;
  // $mainArr=array() ;
   if ($allPostVars['funciesName']!="") {
   //	print_r($funcies) ; exit ;
   	if ($funcies[0]!="") {
   		array_push($funcies,$allPostVars['funciesName']) ;
    	$funciesString=implode(",",$funcies);
   	}else{
   		$funciesString=$allPostVars['funciesName'];
   	}
    	
     	$updateFun['funcies']= $funciesString;
   		$updateFuncies=$db->update("fc_user",$updateFun,"userId=".$allPostVars['userId']);	
   		if ($updateFuncies) {
   			 echo json_encode((object)array("status" => true,"message"=>"Funcies Added Successfully"));
   		}else{
   			 echo json_encode((object)array("status" => false,"message"=>"Something Is Wrong"));
   		}
  

     }
   }
		
});	




$app->post('/removeUserFuncies', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	
	//   mysql> SELECT * FROM pet WHERE name LIKE 'b%';
   if (isset($allPostVars['userId']) ) {
   
	   $result = $db->selTable("fc_user","funcies","userId=".$allPostVars['userId']);

	   $funcies=explode(",", $result[0]['funcies']) ;
	  // $mainArr=array() ;
	  	 if ($allPostVars['funciesName']!="" && $funcies[0]!="") {

				if (($key = array_search($allPostVars['funciesName'], $funcies)) !== false) {
					    unset($funcies[$key]);
						$funciesString=implode(",",$funcies);
						$removeFun['funcies']= $funciesString;
				   		$updateFuncies=$db->update("fc_user",$removeFun,"userId=".$allPostVars['userId']);	
				   		if ($updateFuncies) {
				   			 echo json_encode((object)array("status" => true,"message"=>"Funcies Removed Successfully"));
				   		}else{
				   			 echo json_encode((object)array("status" => false,"message"=>"Something Is Wrong"));
				   		}
	   			}
	     }
   }
		
});	


