<?php 


$app->post('/ticketByStatus', function ($request, $response, $args) use ($app)
{
   $db = new Common_model;
   
    $allPostVars = $request->getParsedBody();

   
    $ticketData=$db->exeQuery("SELECT `fc_ticket_booking`.*,fc_flyers.title,fc_flyers.image,fc_flyers.address,fc_user.emailId,fc_user.firstName FROM `fc_ticket_booking` LEFT JOIN `fc_flyers` ON `fc_ticket_booking`.`flylerId`=`fc_flyers`.`flyerId` LEFT JOIN fc_user ON `fc_ticket_booking`.`userId`=`fc_user`.`userId` WHERE fc_ticket_booking.userId = ".$allPostVars['userId']." AND ticketDate < DATE_FORMAT(NOW(),'%Y-%m-%d') AND `bookingStatus` = ".$allPostVars['bookingStatus']);

    if ($ticketData)
    {

        echo json_encode((object)array(
            "status" => true,
            "funciesData" => $ticketData
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


$app->post('/bookTicket', function ($request, $response, $args) use ($app)
{
   $db = new Common_model;
    //echo "123" ;exit();
    //POST or PUT
    $allPostVars = $request->getParsedBody();


        
            $flyresdata=$db->exeQuery("SELECT *, `fc_flyers`.`address` as `flyerAddress` FROM `fc_flyers` LEFT JOIN `fc_user` ON `fc_flyers`.`userId`=`fc_user`.`userId` WHERE `fc_flyers`.`flyerId` = ". $allPostVars['flyerId']);
            $userData   =   $db->selTable("fc_user","firstName,lastName, emailId, contactNumber","userId='".$allPostVars['userId']."'");
           
           
                
                 $quantity=$allPostVars['quantity'] ;

                 for ($i=0; $i <$quantity ; $i++) { 
                    
                 $insPayment["userId"]      =  $allPostVars['userId']; 
                 $insPayment["flylerId"]    =   $allPostVars['flyerId'];
                 $insPayment["fullName"]    =   ucfirst($allPostVars['fullName']);
                 $insPayment["ticketDate"]  =   trim($allPostVars['ticketDate']);
                 $insPayment["emailId"]     =   trim(strtolower($allPostVars['email']));
                 $insPayment["phone"]       =   $allPostVars['phone'];
                 $insPayment["bookingTime"] =   date("Y-m-d");
                 $insPayment["price"]       =   $allPostVars['total'];
            
                 $insertTic= $db->insert("fc_ticket_booking",$insPayment);

                 if($insertTic) {

                     $updateBillNumber["ticketNumber"]  =   mt_rand(100000, 999999);;
                     $update=   $db->update("fc_ticket_booking",$updateBillNumber,"bookingId =".$insertTic);

                    $remainingQuantity= ($flyresdata[0]['ticketQuantity'])-$quantity ;
                    $updateQuantity["ticketQuantity"]   = $remainingQuantity ;
                    $updateFlyer=    $db->update("fc_flyers",$updateQuantity,"flyerId =".$allPostVars['flyerId']);

                    }

                 }

                 /*if($insertTic){
                                
                //Send ticket details in mail
                $settings = array();
                $settings["template"]               =   "ticket_booking.html";
                $settings["email"]                  =   $insPayment['emailId']; //
                $settings["subject"]                =   "Funcano - Ticket Booking"; 
                $contentarr['[[[TITLE]]]']          =   $flyresdata[0]->title;
                $contentarr['[[[TICKETNUMBER]]]']           =   $updateBillNumber["ticketNumber"];
                $contentarr['[[[DATE]]]']           =   trim($allPostVars['ticketDate']);
                $contentarr['[[[ADDRESS]]]']        =   $flyresdata[0]->flyerAddress;
                $settings["contentarr"]             =   $contentarr;
                $this->common_lib->sendMail($settings); 
                
               // $outputData['result']   =   "Success";
                    
            }*/  if ($insertTic)
                {

                    echo json_encode((object)array(
                        "status" => true,
                        "Message" => "Successfully Buy"
                    ));

                }
                else
                {

                    echo json_encode((object)array(
                        "status" => false,
                        "message" => "Result Not Found"
                    ));

                }

                // redirect(BASEURL."/ticket/payment-success");
    

});


