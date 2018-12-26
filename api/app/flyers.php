<?php

$app->get('/getFlyersCategories', function ($request, $response, $args)
{

    // Load query common model
    $db = new Common_model;

    $flyer = $db->selTable("fc_flyer_category", "", "");
    if ($flyer)
    {
        $count = count($flyer);
        for ($i = 0;$i < $count;$i++)
        {
            $flyer[$i]['categoriesImages'] = UPLOADPATH . '/flyersCategories/' . $flyer[$i]['categoriesImages'];
        }

        echo json_encode((object)array(
            "status" => true,
            "message" => "Categories of flyers",
            "flyersData" => $flyer
        ));
    }
    else
    {
        echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});

$app->get('/getFlyers', function ($request, $response, $args)
{

    // Load query common model
    $db = new Common_model;

    $flyer = $db->selTable("fc_flyers", "", "status=1");

    //print_r($flyer);exit;
    if ($flyer)
    {

        //echo json_encode($flyer);
        echo json_encode((object)array(
            "status" => true,
            "message" => "all flyers",
            "flyersData" => $flyer
        ));
    }
    else
    {
        echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});

$app->get('/newestFlyers', function ($request, $response, $args)
{

    // Load query common model
    $db = new Common_model;

    $flyer = $db->selTable("fc_flyers", "", "status=1","flyerId asc");

    //print_r($flyer);exit;
    if ($flyer)
    {

        //echo json_encode($flyer);
        echo json_encode((object)array(
            "status" => true,
            "message" => "newest flyers",
            "flyersData" => $flyer
        ));
    }
    else
    {
        echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});

$app->get('/oldestFlyers', function ($request, $response, $args)
{

    // Load query common model
    $db = new Common_model;

    $flyer = $db->selTable("fc_flyers", "", "status=1","flyerId DESC");

    //print_r($flyer);exit;
    if ($flyer)
    {

        //echo json_encode($flyer);
        echo json_encode((object)array(
            "status" => true,
            "message" => "oldest flyers",
            "flyersData" => $flyer
        ));
    }
    else
    {
        echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});

$app->get('/mostViewedFlyers', function ($request, $response, $args)
{

    // Load query common model
    $db = new Common_model;

    $flyer = $db->selTable("fc_flyers", "", "status=1","viewCount DESC");

    //print_r($flyer);exit;
    if ($flyer)
    {

        //echo json_encode($flyer);
        echo json_encode((object)array(
            "status" => true,
            "message" => "most viewed flyers",
            "flyersData" => $flyer
        ));
    }
    else
    {
        echo json_encode((object)array(
            "status" => false,
            "message" => "Somethong went wrong"
        ));
    }

});


$app->post('/flyersByCategory', function ($request, $response, $args)
{
    // Load query common model
    $db = new Common_model;

    $allPostVars = $request->getParsedBody();
    //echo $allPostVars['emailId'];
    

    $result = $db->selTable("fc_flyers", "*", "status=1 AND categoryTitle like'%" . $allPostVars['categoryTitle'] . "%'");
    //print_r($result);exit;
    if ($result)
    {
        echo json_encode((object)array(
            "status" => true,
            "message" => "flyers by category",
            "flyersData" => $result
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

/*$app->post('/flyersMatch', function ($request, $response, $args) {
	// Load query common model
	$db = new Common_model;
	
	$allPostVars = $request->getParsedBody();
	//echo $allPostVars['emailId'];
	
	//   mysql> SELECT * FROM pet WHERE name LIKE 'b%';

		
    $result = $db->selTable("fc_flyers","*","title LIKE '%".$allPostVars['title']."%'");
		//print_r($result);exit;
		if ($result){
		echo json_encode($result);
		} else {
		
		echo json_encode((object)array("status" => false,"message"=>"Something went wrong"));

		}
	 
});	*/

$app->post('/addFlyer', function ($request, $response, $args)
{
    // Load query common model
    $db = new Common_model;

    $allPostVars = $request->getParsedBody();
    $insertArr["userId"] = $allPostVars["userId"];
    if (isset($allPostVars['title'])) $insertArr["title"] = ucfirst(strtolower($allPostVars['title']));
    if (isset($allPostVars['categoryTitle'])) $insertArr["categoryTitle"] = $allPostVars['categoryTitle'];
    $insertArr["createdOn"] = date("Y-m-d");
    if (isset($allPostVars['keywords'])) $insertArr["keywords"] = $allPostVars['keywords'];
    if (isset($allPostVars['city'])) $insertArr["city"] = $allPostVars['city'];
    if (isset($allPostVars['state'])) $insertArr["state"] = $allPostVars['state'];
    if (isset($allPostVars['zip'])) $insertArr["zip"] = $allPostVars['zip'];
    if (isset($allPostVars['phone'])) $insertArr["phone"] = $allPostVars['phone'];
    if (isset($allPostVars['address'])) $insertArr["address"] = ucfirst($allPostVars['address']);
    if (isset($allPostVars['website'])) $insertArr["website"] = $allPostVars['website'];
    if (isset($allPostVars['email'])) $insertArr["email"] = $allPostVars['email'];
    if (isset($allPostVars['facebookLink'])) $insertArr["facebookLink"] = $allPostVars['facebookLink'];
    if (isset($allPostVars['twitterLink'])) $insertArr["twitterLink"] = $allPostVars['twitterLink'];
    if (isset($allPostVars['googleLink'])) $insertArr["googleLink"] = $allPostVars['googleLink'];
    if (isset($allPostVars['description']))
    {
        $insertArr["description"] = ucfirst($allPostVars['description']);
    }
    if (isset($allPostVars['startDate'])) $insertArr["startTime"] = $allPostVars['startDate'];
    if (isset($allPostVars['endDate'])) $insertArr["endTime"] = $allPostVars['endDate'];
    if (isset($allPostVars['eventStartTime'])) $insertArr["eventStartTime"] = $allPostVars['eventStartTime'];
    if (isset($allPostVars['eventEndTime'])) $insertArr["eventEndTime"] = $allPostVars['eventEndTime'];
    if (isset($allPostVars['latitude'])) $insertArr["latitude"] = $allPostVars['latitude'];
    if (isset($allPostVars['longitude'])) $insertArr["longitude"] = $allPostVars['longitude'];
    $insertArr["status"] = 1;

    /*ticket creation*/
    if (isset($allPostVars['ticketCheck']) && $allPostVars['ticketCheck'] == "on")
    {

        $insertArr["tickerStatus"] = 2;
        if (isset($allPostVars['ticketTitle'])) $insertArr["ticketTitle"] = $allPostVars['ticketTitle'];
        if (isset($allPostVars['ticketDesc'])) $insertArr["ticketDesc"] = $allPostVars['ticketDesc'];
        if (isset($allPostVars['ticketPrice'])) $insertArr["ticketPrice"] = $allPostVars['ticketPrice'];
        if (isset($allPostVars['ticketQuantity'])) $insertArr["ticketQuantity"] = $allPostVars['ticketQuantity'];

    }
    else
    {

        $insertArr["tickerStatus"] = 1;
    }

    if (isset($allPostVarrs['flyerImageName']))
    {
        $insertArr['image'] = $allPostVarrs['flyerImageName'];
        $imgname = $allPostVarrs['flyerImageName'];
        $decodedImage = base64_decode($allPostVarrs['flyerImage']);
        $path = ABSUPLOADPATH . "/flyers/" . $imgname;
        file_put_contents($path, $decodedImage);
    }

    $result = $db->insert("fc_flyers", $insertArr);
    if ($result)
    {

        $FlyerData = $db->selTable("fc_flyers", "*", "flyerId=" . $result);
        if ($FlyerData)
        {
            $FlyerData[0]['image'] = UPLOADPATH . '/flyers/' . $FlyerData[0]['image'];

            echo json_encode((object)array(
                "status" => true,
                "message" => "Inserted Successfully",
                "FlyerData" => $FlyerData
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
    //$db->insertOrUpdate("tims_user", $insertArr);
    
});

/*$app->post('/flyerUploadImage', function ($request, $response, $args) use ($app)
{

    if (isset($_FILES['flyerImage']))
    {

        $f_name = $_FILES['flyerImage']['name'];
        $f_tmp = $_FILES['flyerImage']['tmp_name'];
        $store = ABSUPLOADPATH . "/flyers/" . $f_name;

        $f_extension = explode('.', $f_name);
        $f_extension = strtolower(end($f_extension));
        if ($f_extension == 'jpg' || $f_extension == 'gif' || $f_extension == 'png' || $f_extension == 'jpeg')
        {
            if (move_uploaded_file($f_tmp, $store))
            {

                // $query="insert into av_blog set photo='$name1'";
                echo json_encode((object)array(
                    "status" => true,
                    "message" => "uploaded succesfully"
                ));
            }
        }
        else
        {
            echo json_encode(array(
                "status" => true,
                "message" => "File format is wrong"
            ));
        }

    }
});*/

$app->post('/updateFlyer', function ($request, $response, $args)
{
    // Load query common model
    $db = new Common_model;
    //echo "123" ;exit();
    //POST or PUT
    $allPostVars = $request->getParsedBody();

    if (isset($allPostVars['flyerId']))
    {

        $updateArr["userId"] = $allPostVars['userId'];
        if (isset($allPostVars['title'])) $updateArr["title"] = ucfirst(strtolower($allPostVars['title']));
        if (isset($allPostVars['categoryTitle'])) $updateArr["categoryTitle"] = $allPostVars['categoryTitle'];
        if (isset($allPostVars['keywords'])) $updateArr["keywords"] = $allPostVars['keywords'];
        if (isset($allPostVars['city'])) $updateArr["city"] = $allPostVars['city'];
        if (isset($allPostVars['state'])) $updateArr["state"] = $allPostVars['state'];
        if (isset($allPostVars['zip'])) $updateArr["zip"] = $allPostVars['zip'];
        if (isset($allPostVars['phone'])) $updateArr["phone"] = $allPostVars['phone'];
        if (isset($allPostVars['address'])) $updateArr["address"] = ucfirst($allPostVars['address']);
        if (isset($allPostVars['website'])) $updateArr["website"] = $allPostVars['website'];
        if (isset($allPostVars['email'])) $updateArr["email"] = $allPostVars['email'];
        if (isset($allPostVars['facebookLink'])) $updateArr["facebookLink"] = $allPostVars['facebookLink'];
        if (isset($allPostVars['twitterLink'])) $updateArr["twitterLink"] = $allPostVars['twitterLink'];
        if (isset($allPostVars['googleLink'])) $updateArr["googleLink"] = $allPostVars['googleLink'];
        /* if (isset($allPostVars['amenities'])){
        $updateArr["amenities"]	=$allPostVars['amenities'];
        }*/
        if (isset($allPostVars['description']))
        {
            $updateArr["description"] = ucfirst($allPostVars['description']);
        }

        if ($allPostVars['startDate'] != "")
        {
            list($mon, $dat, $year) = explode("-", $allPostVars['startDate']);
            $updateArr["startTime"] = $year . "-" . $mon . "-" . $dat;
        }

        if ($allPostVars['endDate'] != "")
        {
            list($mon, $dat, $year) = explode("-", $allPostVars['endDate']);
            $updateArr["endTime"] = $year . "-" . $mon . "-" . $dat;
        }

        if (isset($allPostVars['eventStartTime'])) $flyersArr["eventStartTime"] = $allPostVars['eventStartTime'];
        if (isset($allPostVars['eventEndTime'])) $flyersArr["eventEndTime"] = $allPostVars['eventEndTime'];
        if (isset($allPostVars['latitude'])) $updateArr["latitude"] = $allPostVars['latitude'];
        if (isset($allPostVars['longitude'])) $updateArr["longitude"] = $allPostVars['longitude'];

        if (isset($allPostVars['ticketCheck']) && $allPostVars['ticketCheck'] == "on")
        {

            $updateArr["tickerStatus"] = 2;
            if (isset($allPostVars['ticketTitle'])) $updateArr["ticketTitle"] = $allPostVars['ticketTitle'];
            if (isset($allPostVars['ticketDesc'])) $updateArr["ticketDesc"] = $allPostVars['ticketDesc'];
            if (isset($allPostVars['ticketPrice'])) $updateArr["ticketPrice"] = $allPostVars['ticketPrice'];
            if (isset($allPostVars['ticketQuantity'])) $updateArr["ticketQuantity"] = $allPostVars['ticketQuantity'];

        }
        else
        {

            $updateArr["tickerStatus"] = 1;
        }

        if (isset($allPostVarrs['flyerImageName']))
        {
            $updateArr['image'] = $allPostVarrs['flyerImageName'];
            $imgname = $allPostVarrs['flyerImageName'];

            $decodedImage = base64_decode($allPostVars['flyerImage']);
            $path = ABSUPLOADPATH . "/flyers/" . $imgname;
            //echo $path; exit;
            file_put_contents($path, $decodedImage);

        }

        $result = $db->update("fc_flyers", $updateArr, "flyerId=" . $allPostVars['flyerId']);
        //print_r($result); exit ;
        if ($result)
        {
            //base 64 image stired into database ...
            //base 64 ends
            $flyerData = $db->selTable("fc_flyers", "*", "flyerId=" . $allPostVars['flyerId']);
            if ($flyerData)
            {
                $flyerData[0]['image'] = UPLOADPATH . '/flyers/' . $flyerData[0]['image'];

                echo json_encode((object)array(
                    "status" => true,
                    "loginType" => 1,
                    "message" => "Successfully Updated",
                    "flyerData" => $flyerData
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

    }

});

$app->post('/flyerSearch', function ($request, $response, $args) use ($app)
{
    $db = new Common_model;
    //echo "123" ;exit();
    //POST or PUT
    $allPostVars = $request->getParsedBody();

    if (isset($allPostVars['lookingFor']))
    {
        $cond = "status=1 AND (categoryTitle LIKE '%" . $allPostVars['lookingFor'] . "%' OR  address LIKE '%" . $allPostVars['lookingFor'] . "%' OR title LIKE '%" . $allPostVars['lookingFor'] . "%' OR keywords LIKE '%" . $allPostVars['lookingFor'] . "%' OR city LIKE '%" . $allPostVars['lookingFor'] . "%' OR state LIKE '%" . $allPostVars['lookingFor'] . "%'  OR description LIKE '%" . $allPostVars['lookingFor'] . "%' )";
    }
    else
    {
        $cond = "status=1";
    }
    $result = $db->selTable("fc_flyers", "*,(SELECT SUM(rating) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS rating,(SELECT count(reviewId) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS reviews", $cond, "flyerId DESC");

    if ($result)
    {

        echo json_encode((object)array(
            "status" => true,
            "funciesData" => $result
        ));

    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Result Not Found"
        ));

    }
});



$app->post('/flyerDetails', function ($request, $response, $args) use ($app)
{
    $db = new Common_model;
    //echo "123" ;exit();
    //POST or PUT
    $allPostVars = $request->getParsedBody();

    $flyresdata=$db->exeQuery("SELECT *, `fc_flyers`.`address` as `flyerAddress`, `fc_flyers`.`description` AS `flyersDesc`, (SELECT count(reviewId) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS reviews, (SELECT SUM(rating)/reviews FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS rating FROM `fc_flyers` LEFT JOIN `fc_user` ON `fc_flyers`.`userId`=`fc_user`.`userId` WHERE `flyerId` = ".$allPostVars['flyerId']);

    if ($flyresdata)
    {

        echo json_encode((object)array(
            "status" => true,
            "funciesData" => $flyresdata
        ));

    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Result Not Found"
        ));

    }
});



$app->post('/flyersByStatus', function ($request, $response, $args) use ($app)
{
   $db = new Common_model;
    //echo "123" ;exit();
    //POST or PUT
    $allPostVars = $request->getParsedBody();

    if ($allPostVars['status']==1)
    {
        $cond = "status=1 AND userId=".$allPostVars['userId'];
    }
    else if($allPostVars['status']==2)
    {
        $cond = "status=2 AND userId=".$allPostVars['userId'];
    } else if($allPostVars['status']==4)
    {
        $cond = "status=4 AND userId=".$allPostVars['userId'];
    }
    $result = $db->selTable("fc_flyers", "*,(SELECT SUM(rating) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS rating,(SELECT count(reviewId) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS reviews", $cond, "flyerId DESC");

    if ($result)
    {

        echo json_encode((object)array(
            "status" => true,
            "funciesData" => $result
        ));

    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Result Not Found"
        ));

    }
});



$app->post('/userBookedFlyer', function ($request, $response, $args) use ($app)
{
   $db = new Common_model;
   
    $allPostVars = $request->getParsedBody();

    $result = $db->exeQuery("SELECT * FROM `fc_ticket_booking` LEFT JOIN `fc_flyers` ON `fc_flyers`.`flyerId`=`fc_ticket_booking`.`flylerId` WHERE `fc_flyers`.`flyerId` = ".$allPostVars['flyerId']);

    if ($result)
    {

        echo json_encode((object)array(
            "status" => true,
            "funciesData" => $result
        ));

    }
    else
    {

        echo json_encode((object)array(
            "status" => false,
            "message" => "Result Not Found"
        ));

    }
});

