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
		    	
			     $quantity=$_POST['txt_quantity'] ;

			     for ($i=0; $i <$quantity ; $i++) { 
			     	
				 $insPayment["userId"]		=	$this->session->userdata(PREFIX.'sessUserId'); 
				 $insPayment["flylerId"]	=	$flyerId;
				 $insPayment["fullName"]	=	ucfirst($_POST['txt_fullName']);
				 $insPayment["ticketDate"]	= 	trim($_POST['txt_ticketDate']);
				 $insPayment["emailId"]		=	trim(strtolower($_POST['txt_email']));
				 $insPayment["phone"]		=	$_POST['txt_phone'];
				 $insPayment["bookingTime"]	=	date("Y-m-d");
				 $insPayment["price"]		=	$_POST['txt_total'];
			
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
				$contentarr['[[[TICKETNUMBER]]]']			=	$updateBillNumber["ticketNumber"];
				$contentarr['[[[DATE]]]']			=	trim($_POST['txt_ticketDate']);
				$contentarr['[[[ADDRESS]]]']		=	$flyresdata[0]->flyerAddress;
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);	
				
				$outputData['result']	=	"Success";
					
			}else{
			       $outputData['result']	=	"Failed";
			
		    }

			     redirect(BASEURL."/ticket/payment-success");
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
	