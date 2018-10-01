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

