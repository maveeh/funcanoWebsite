<?php 

$app->get('/getFlyersCategories', function ($request, $response, $args) {
	
  // Load query common model
	$db = new Common_model;
		
	$flyer=$db->selTable("fc_flyer_category","","");
	if ($flyer) {
		$count=count($flyer);
		for ($i=0; $i <$count ; $i++) { 
			$flyer[$i]['categoriesImages']=UPLOADPATH.'/flyersCategories/'.$flyer[$i]['categoriesImages'];
		}
		
		 echo json_encode((object)array("status" => true,"message"=>"Categories of flyers","flyersData"=>$flyer));	
	}else{
	    echo json_encode((object)array("status" => false,"message"=>"Somethong went wrong"));	
	}

	
});

$app->get('/getFlyers', function ($request, $response, $args) {
	
  // Load query common model
	$db = new Common_model;
		
	$flyer=$db->selTable("fc_flyers","","");



	if ($flyer) {

	

		echo json_encode((object)array("status" => true,"message"=>"all flyers","flyersData"=>$flyer));
	}else{
	    echo json_encode((object)array("status" => false,"message"=>"Somethong went wrong"));	
	}

	
});

$app->post('/flyersByCategory', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();

	
		
    $result = $db->selTable("fc_flyers","*","categoryTitle='".$allPostVars['categoryTitle']."'");
		
		if ($result){
		echo json_encode((object)array("status" => true,"message"=>"flyers by category","flyersData"=>$result));
		} else {
		
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

		}
	 
});	

$app->post('/flyersMatch', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	
		
    $result = $db->selTable("fc_flyers","*","title LIKE '%".$allPostVars['title']."%'");
		
		if ($result){
		echo json_encode($result);
		} else {
		
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

		}
	 
});	


$app->post('/addFlyer', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVarrs = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	if (isset($allPostVarrs['userId'])){
		$insertArr['userId'] 			= $allPostVarrs['userId']; }
	if (isset($allPostVarrs['title'])){
		$insertArr['title'] 			= $allPostVarrs['title']; }
	if (isset($allPostVarrs['startTime'])){
		$insertArr['startTime'] 			= $allPostVarrs['startTime']; }
	if (isset($allPostVarrs['endTime'])){
		$insertArr['endTime'] 			= $allPostVarrs['endTime']; }
	if (isset($allPostVarrs['categoryTitle'])){
		$insertArr['categoryTitle'] 			= $allPostVarrs['categoryTitle']; }
	if (isset($allPostVarrs['city'])){	
		$insertArr['city'] 			= $allPostVarrs['city']; }	
	if (isset($allPostVarrs['state'])){
		$insertArr['state'] 			= $allPostVarrs['state']; }
	if (isset($allPostVarrs['keywords'])){	
		$insertArr['keywords'] 			= $allPostVarrs['keywords']; }	
	if (isset($allPostVarrs['phone'])){
		$insertArr['phone'] 			= $allPostVarrs['phone']; }
	if (isset($allPostVarrs['location'])){	
		$insertArr['location'] 			= $allPostVarrs['location']; }	
	if (isset($allPostVarrs['description'])){	
		$insertArr['description'] 			= $allPostVarrs['description']; }
	if (isset($allPostVarrs['type'])){	
		$insertArr['type'] 			= $allPostVarrs['type']; }
	if (isset($allPostVarrs['eRepeat'])){	
		$insertArr['eRepeat'] 			= $allPostVarrs['eRepeat']; }
	if (isset($allPostVarrs['repeat'])){	
		$insertArr['repeat'] 			= $allPostVarrs['repeat']; }
	if (isset($allPostVarrs['repeattype'])){	
		$insertArr['repeattype'] 			= $allPostVarrs['repeattype']; }
	if (isset($allPostVarrs['nday'])){	
		$insertArr['nday'] 			= $allPostVarrs['nday']; }
	if (isset($allPostVarrs['nweek'])){	
		$insertArr['nweek'] 			= $allPostVarrs['nweek']; }
	if (isset($allPostVarrs['eFree'])){	
		$insertArr['eFree'] 			= $allPostVarrs['eFree']; }
	if (isset($allPostVarrs['eMinPrice'])){	
		$insertArr['eMinPrice'] 			= $allPostVarrs['eMinPrice']; }
	if (isset($allPostVarrs['eMaxPrice'])){	
		$insertArr['eMaxPrice'] 			= $allPostVarrs['eMaxPrice']; }
    if (isset($allPostVarrs['eName'])){	
		$insertArr['eName'] 			= $allPostVarrs['eName']; }
	if (isset($allPostVarrs['zip'])){	
		$insertArr['zip'] 			= $allPostVarrs['zip']; }
	if (isset($allPostVarrs['latitude'])){	
		$insertArr['latitude'] 			= $allPostVarrs['latitude']; }
	if (isset($allPostVarrs['longitude'])){	
		$insertArr['longitude'] 			= $allPostVarrs['longitude']; }
	if (isset($allPostVarrs['flyerImageName'])){
		$insertArr['image'] 			= $allPostVarrs['flyerImageName'];
		$imgname= $allPostVarrs['flyerImageName'];
		 }

		
		$result = $db->insert("fc_flyers",$insertArr);
		if ($result){
		      //base 64 image stired into database ...
				$decodedImage= base64_decode($allPostVarrs['flyerImage']);
				$path=ABSUPLOADPATH."/flyers/".$imgname;
				
				file_put_contents($path,$decodedImage);

			//base 64 ends
				$FlyerData=$db->selTable("fc_flyers","*","flyerId=".$result);
			 if ($FlyerData) {
			 	$FlyerData[0]['image']=UPLOADPATH.'/flyers/'.$FlyerData[0]['image'];

			echo json_encode((object)array("status" => true,"message"=>"Inserted Successfully" ,"FlyerData" => $FlyerData));
			 }
		} else {
		
			echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));
		}
		
	 
});	



$app->post('/flyerUploadImage', function ($request, $response, $args) use ($app) {

	if(isset($_FILES['flyerImage'])) {
		
		$f_name=$_FILES['flyerImage']['name'];
        $f_tmp= $_FILES['flyerImage']['tmp_name'];
		$store=ABSUPLOADPATH."/flyers/".$f_name;
		
		$f_extension=explode('.',$f_name);
		$f_extension=strtolower(end($f_extension));
		  if($f_extension=='jpg'||$f_extension=='gif'||$f_extension=='png'||$f_extension=='jpeg')
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


$app->post('/updateFlyer', function ($request, $response, $args) {
	// Load query common model
		$db = new Common_model;
	//echo "123" ;exit();
	//POST or PUT

	$allPostVars = $request->getParsedBody();
	
	if (isset($allPostVars['flyerId'])) {
	
	if (isset($allPostVars['title'])){
		$updateArr['title'] 			= $allPostVars['title'];}
	if (isset($allPostVarrs['startTime'])){
		$updateArr['startTime'] 			= $allPostVarrs['startTime']; }
	if (isset($allPostVarrs['endTime'])){
		$updateArr['endTime'] 			= $allPostVarrs['endTime']; }
	if (isset($allPostVarrs['categoryTitle'])){
		$updateArr['categoryTitle'] 			= $allPostVarrs['categoryTitle']; }
	if (isset($allPostVarrs['city'])){	
		$updateArr['city'] 			= $allPostVarrs['city']; }	
	if (isset($allPostVarrs['state'])){
		$updateArr['state'] 			= $allPostVarrs['state']; }
    if (isset($allPostVarrs['keywords'])){	
		$updateArr['keywords'] 			= $allPostVarrs['keywords']; }	
	if (isset($allPostVarrs['phone'])){
		$updateArr['phone'] 			= $allPostVarrs['phone']; }
	if (isset($allPostVarrs['location'])){	
		$updateArr['location'] 			= $allPostVarrs['location']; }	
	if (isset($allPostVarrs['description'])){	
		$updateArr['description'] 			= $allPostVarrs['description']; }
	if (isset($allPostVarrs['type'])){	
		$updateArr['type'] 			= $allPostVarrs['type']; }
	if (isset($allPostVarrs['eRepeat'])){	
		$updateArr['eRepeat'] 			= $allPostVarrs['eRepeat']; }
	if (isset($allPostVarrs['repeat'])){	
		$updateArr['repeat'] 			= $allPostVarrs['repeat']; }
	if (isset($allPostVarrs['repeattype'])){	
		$updateArr['repeattype'] 			= $allPostVarrs['repeattype']; }
	if (isset($allPostVarrs['nday'])){	
		$updateArr['nday'] 			= $allPostVarrs['nday']; }
	if (isset($allPostVarrs['nweek'])){	
		$updateArr['nweek'] 			= $allPostVarrs['nweek']; }
	if (isset($allPostVarrs['eFree'])){	
		$updateArr['eFree'] 			= $allPostVarrs['eFree']; }
	if (isset($allPostVarrs['eMinPrice'])){	
		$updateArr['eMinPrice'] 			= $allPostVarrs['eMinPrice']; }
	if (isset($allPostVarrs['eMaxPrice'])){	
		$updateArr['eMaxPrice'] 			= $allPostVarrs['eMaxPrice']; }
    if (isset($allPostVarrs['eName'])){	
		$updateArr['eName'] 			= $allPostVarrs['eName']; }
	if (isset($allPostVarrs['zip'])){	
		$updateArr['zip'] 			= $allPostVarrs['zip']; }
	if (isset($allPostVarrs['latitude'])){	
		$updateArr['latitude'] 			= $allPostVarrs['latitude']; }
	if (isset($allPostVarrs['longitude'])){	
		$updateArr['longitude'] 			= $allPostVarrs['longitude']; }

		if (isset($allPostVarrs['flyerImageName'])){
		$updateArr['image'] 			= $allPostVarrs['flyerImageName'];
		$imgname= $allPostVarrs['flyerImageName'];
		 }


		$result=$db->update("fc_flyers",$updateArr,"flyerId=".$allPostVars['flyerId']);
		//print_r($result); exit ;
		if ($result) {
					//base 64 image stired into database ...
				$decodedImage= base64_decode($allPostVars['flyerImage']);
				$path=ABSUPLOADPATH."/flyers/".$imgname;
				//echo $path; exit;
				file_put_contents($path,$decodedImage);

			//base 64 ends
				$flyerData=$db->selTable("fc_flyers","*","flyerId=".$allPostVars['flyerId']);
			 if ($flyerData) {
			 	$flyerData[0]['image']=UPLOADPATH.'/flyers/'.$flyerData[0]['image'];

			echo json_encode((object)array("status" => true, "loginType"=>1 ,"message"=>"Successfully Updated" ,"flyerData" => $flyerData));
			 }
	} else { echo json_encode((object)array("status" => false,"message"=>"Something went wrong")); }

  }

});	
