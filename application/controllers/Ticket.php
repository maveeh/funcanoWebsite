<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	public function buy($flyerId, $quantity){
		
		    $flyresdata=$this->Common_model->joinTableData("fc_flyers","fc_user","*,fc_flyers.address as flyerAddress","fc_flyers.userId=fc_user.userId","fc_flyers.flyerId=".$flyerId);
		
			$userData	=	$this->Common_model->selRowData(PREFIX."user","firstName,lastName, emailId, contactNumber","userId='".$this->session->userdata(PREFIX.'sessUserId')."'");
		   
		    if (isset($_POST['btnConfirmTicket'])) {

		    // v3print($_POST); exit ;
		    	 /*Payment Gate way start*/
			 	// require 'braintree/lib/Braintree.php';
			 	 $this->load->library('Braintree_lib');
				$params = array(
				  'environment' => 'sandbox',
				  "merchantid" => "k3nxr9bksm4b7y2d",
				  "publickey"  => "7htkgxnz4wbjn694",
				  "privatekey" => "b2390e2eeb9a4c1aa0609097884093f1",
				);

		    	Braintree_Configuration::environment('sandbox');
				Braintree_Configuration::merchantId($params["merchantid"]);
				Braintree_Configuration::publicKey($params["publickey"]);
				Braintree_Configuration::privateKey($params["privatekey"]);

				//v3print($_POST); exit ;
			 $result = Braintree_Customer::create(array(
				    'firstName' =>  $_POST["nameOnCard"],
				   // 'lastName'  => $customer_lastname,
				    'phone'     => $_POST["txt_phone"],
				    'email'     =>  $_POST["txt_email"],
				    'creditCard' => array(
				      'number'          => $_POST["cardNumber"],
				      'cardholderName'  => $_POST["nameOnCard"],
				      'expirationMonth' => $_POST["expiryDate"],
				      'expirationYear'  => $_POST["expiryYear"],
				      'cvv'             =>$_POST["cvv"]
				      /*'billingAddress' => array(
				        'postalCode'        => $postcode,
				        'streetAddress'     => $address1,
				        'extendedAddress'   => $address2,
				        'locality'          => $city,
				        'region'            => $state,
				        'countryCodeAlpha2' => $country
		      )*/
		    )
		  ));

		  if ($result->success) {
		    // Save this Braintree_cust_id in DB and use for future transactions too
		    $braintree_cust_id = $result->customer->id; 
		    $sale = array(
			        'customerId' => $braintree_cust_id,
			        'amount'   =>  $_POST['txt_total'],
			        'orderId'  => generateStrongPassword(8),
			        'options' => array('submitForSettlement'   => true)
			      );
			            
			  $result = Braintree_Transaction::sale($sale);


		  } else {

		  	
		  	$total=$flyresdata[0]->ticketPrice*$quantity ;
		    $this->outPutData['flyresdata']	=	$flyresdata[0] ;
		    $this->outPutData['userData']	=	$userData ;
		    $this->outPutData['quantity']	=	$quantity;
		    $this->outPutData['total']		=	$total;
		  	$this->outPutData['error']=$result->message ;
		  	$this->load->viewF("buy_ticket_view",$this->outPutData);
		  //  redirect(BASEURL."/ticket/payment-success/".);
		    
		  }
			

			  if ($result->success)
			  {	
			  	/*if (isset($_POST['braintree_cust_id']))
				{
				  $sale = array(
				        'customerId' => $braintree_cust_id,
				        'amount'   => $_POST['txt_total'],
				        'orderId'  => generateStrongPassword(8),
				        'options' => array('submitForSettlement'   => true)
				      );
				}*/

				$inPayment["userId"]		=	$this->session->userdata(PREFIX.'sessUserId');
				$inPayment["transactionId"]	=$sale['customerId'];
				$inPayment["amount"]		=	$sale['amount'];
				$inPayment["dateTime"]		=	date("Y-m-d H:s:i");
				$inPayment["orderId"]		=	$sale['orderId'];

				$insTrans=$this->Common_model->insert("fc_transaction",$inPayment);

				  $quantity=$_POST['txt_quantity'] ;
			     $finalAmount=$_POST['txt_total'] ;
			     for ($i=0; $i <$quantity ; $i++) { 
			     	
				 $insPayment["userId"]		=	$this->session->userdata(PREFIX.'sessUserId'); 
				 $insPayment["flylerId"]	=	$flyerId;
				 $insPayment["fullName"]	=	ucfirst($_POST['txt_fullName']);
				 $insPayment["ticketDate"]	= 	trim($_POST['txt_ticketDate']);
				 $insPayment["emailId"]		=	trim(strtolower($_POST['txt_email']));
				 $insPayment["phone"]		=	$_POST['txt_phone'];
				 $insPayment["bookingTime"]	=	date("Y-m-d");
				 $insPayment["price"]		=	$_POST['txt_total'];
				 
				 $insPayment["transactionId"]		=	$insTrans;
				 //$finalAmount+=$insPayment["price"] ;
			 	 $insertTic=$this->Common_model->insert("fc_ticket_booking",$insPayment);



			 	 if($insertTic) {

			 	 	 $updateBillNumber["ticketNumber"]	=	mt_rand(100000, 999999);;
			 	 	 $update=	$this->Common_model->update("fc_ticket_booking",$updateBillNumber,"bookingId =".$insertTic);

			 	 	$remainingQuantity= ($flyresdata[0]->ticketQuantity)-$quantity ;
			 	 	$updateQuantity["ticketQuantity"]	= $remainingQuantity ;
			 	 	$updateFlyer=	$this->Common_model->update("fc_flyers",$updateQuantity,"flyerId =".$flyerId);

			 	 	}

			     }

			     if($insertTic){
				//Send ticket details in mail
				$settings = array();
				$settings["template"] 				= 	"ticket_booking.html";
				$settings["email"] 					= 	$insPayment['emailId']; //
				$settings["subject"] 				=	"Funcano - Ticket Booking";	
				$contentarr['[[[TITLE]]]']			=	$flyresdata[0]->title;
				$contentarr['[[[TICKETNUMBER]]]']	=	$updateBillNumber["ticketNumber"];
				$contentarr['[[[DATE]]]']			=	trim($insPayment["bookingTime"]);
				$contentarr['[[[ADDRESS]]]']		=	$flyresdata[0]->flyerAddress;
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);	
				
				$outputData['result']	=	"Success";
					
			}else{
			       $outputData['result']	=	"Failed";
			
		    }

			     redirect(BASEURL."/ticket/payment-success");


			  }
			 /* else
			  {
			    echo "Error : ".$result->_attributes['message'];

			  }*/
			}

		    $total=$flyresdata[0]->ticketPrice*$quantity ;
		    $this->outPutData['flyresdata']	=	$flyresdata[0] ;
		    $this->outPutData['userData']	=	$userData ;
		    $this->outPutData['quantity']	=	$quantity;
		    $this->outPutData['total']		=	$total;
			
			$this->load->viewF("buy_ticket_view",$this->outPutData);
		

		
	}


		public function payment_success(){
		
		$this->load->viewF("buy_successfull_view");
		}


		public function detail_ticket($userId,$flyerId){

			$ticketData=$this->Common_model->joinTableData("fc_ticket_booking","fc_flyers","*","fc_ticket_booking.flylerId=fc_flyers.flyerId","fc_ticket_booking.userId=".$userId." AND fc_ticket_booking.flylerId=".$flyerId );
		$this->outputData['ticketData']=$ticketData;
		
		$this->load->viewF("detail_ticket_view",$this->outputData);
		}
}
	