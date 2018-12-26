<?php

$app->get('/allQuestions', function ($request, $response, $args)
{   // Load query common model
    $db = new Common_model;

    $faq = $db->exeQuery("SELECT * FROM `fc_questions` LEFT JOIN `fc_user` ON `fc_questions`.`userId`=`fc_user`.`userId` WHERE `fc_questions`.`answer` != '' AND `fc_questions`.`userId` !=0 ORDER BY `fc_questions`.`questionId` DESC");

   // print_r($faq) ; exit ;
	if ($faq)
    {
    	echo json_encode((object)array(
            "status" => true,
            "message" => "FAQ ",
            "flyersData" => $faq
        ));
    } else
    {
    	echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});


$app->get('/adminsQuestions', function ($request, $response, $args)
{   // Load query common model
    $db = new Common_model;

    $adminFAQ = $db->exeQuery("SELECT * FROM `fc_questions` LEFT JOIN `fc_user` ON `fc_questions`.`userId`=`fc_user`.`userId` WHERE userId=0 AND answer !='' ORDER BY `fc_questions`.`questionId` DESC");
	if ($adminFAQ)
    {
    	echo json_encode((object)array(
            "status" => true,
            "message" => "admin FAQ ",
            "FAQData" => $adminFAQ
        ));
    } else
    {
    	echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});




$app->post('/userFaqQuestions', function ($request, $response, $args) use ($app)
{
 		    $db = new Common_model;
   
   		    $allPostVars = $request->getParsedBody();

   			$insertData["question"]	 = $allPostVars['question']  ;
			$insertData["userId"]	 = $allPostVars['userId'] ;
			$insertQuestion	 =	$db->insert("fc_questions",$insertData);

			    if ($insertQuestion)
			    {
					echo json_encode((object)array(
			            "status" => true,
			            "funciesData" => "Added Successfully"
			        ));

			    }else
			    {
				 echo json_encode((object)array(
			            "status" => false,
			            "message" => "Something is wrong"
			        ));

			    }
});