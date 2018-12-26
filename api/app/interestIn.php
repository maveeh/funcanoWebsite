<?php 
$app->post('/myInterest', function ($request, $response, $args)
{ 	 //echo "test"; exit ;
    // Load query common model
    $db = new Common_model;

    $allPostVars = $request->getParsedBody();
    //echo $allPostVars['emailId'];
    
$reviewData=$db->exeQuery("SELECT * FROM `fc_interested` LEFT JOIN `fc_flyers` ON `fc_interested`.`flyerId`=`fc_flyers`.`flyerId` WHERE `fc_interested`.`userId` = '".$allPostVars['userId']."' AND `fc_flyers`.`status` = 1");
   // print_r($reviewData);exit;
    if ($reviewData)
    {
        echo json_encode((object)array(
            "status" => true,
            "message" => "Interest in list",
            "flyersData" => $reviewData
        ));
    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Something went wrong"
        ));

    }

});


$app->post('/addInterest', function ($request, $response, $args)
{
	// echo "test"; exit ;
    // Load query common model
    $db = new Common_model;
    $interest =array() ;
    $allPostVarss = $request->getParsedBody();

         $interest["userId"]	= $allPostVarss['userId'];
    	 $interest["flyerId"]	= $allPostVarss['flyerId'];
		 $insertData = $db->insert("fc_interested", $interest);

    if ($insertData)
    {
        echo json_encode((object)array(
            "status" => true,
            "message" => "Interest add Successfully",
           // "flyersData" => $reviewData
        ));
    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Something went wrong"
        ));

    }

});


