<?php
$app->post('/addComments', function ($request, $response, $args)
{
    // Load query common model
    $db = new Common_model;

    $allPostVars = $request->getParsedBody();
    //echo $allPostVars['emailId'];
    
 if (isset($allPostVars['rating'])) {
          // print_r($allPostVars['rating']) ; exit ;
             if (isset($allPostVars['rating'])) {
             $insertFlyers["rating"]    =$allPostVars['rating']; }
             if (isset($allPostVars['description'])) {
             $insertFlyers["description"]   =$allPostVars['description']; }
             if (isset($allPostVars['flyerId'])) {
             $insertFlyers["flyerId"]   =$allPostVars['flyerId']; }
             if (isset($allPostVars['userId'])) {
             $insertFlyers["userId"]    =$allPostVars['userId']; }

             $insertFlyers["date"]  =date("Y-m-d");
            // print_r($insertFlyers) ; exit ;
             $insert=$db->insert("fc_flyers_review", $insertFlyers);
             if ($insert) {
                 echo json_encode((object)array(
                    "status" => true,
                    "message" => "Added Successfully",
            
                )); 
             }
      
    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Something went wrong"
        ));

    }



});



$app->post('/commentsListOfFlyer', function ($request, $response, $args)
{
    // Load query common model
    $db = new Common_model;

    $allPostVars = $request->getParsedBody();
    //echo $allPostVars['emailId'];
    
$reviewData=$db->exeQuery("SELECT *, (fc_flyers_review.description) AS reviewDesc FROM `fc_flyers_review` LEFT JOIN `fc_user` ON `fc_flyers_review`.`userId`=`fc_user`.`userId` WHERE fc_flyers_review.`flyerId` = '".$allPostVars['flyerId']."' ORDER BY `reviewId` DESC");
   // print_r($reviewData);exit;
    if ($reviewData)
    {
        echo json_encode((object)array(
            "status" => true,
            "message" => "Comments of flyer",
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