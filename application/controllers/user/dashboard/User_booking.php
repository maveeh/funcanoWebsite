<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_booking extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	public function index() {
	
	

	$allFleyrs=$this->Common_model->selTableData("fc_flyers","*","userId=".$this->session->userdata(PREFIX.'sessUserId'));
	$con=array();
if (isset($_POST['btnSearch'])) {


	if ($_POST['dd_flyer']=="allFlyer") {
		$con['fc_flyers.userId']=$this->session->userdata(PREFIX.'sessUserId');	

		}else{

		$con['fc_flyers.flyerId']=$_POST['dd_flyer'];	
			
		}
		}else{
			$con['fc_flyers.userId']=$this->session->userdata(PREFIX.'sessUserId');	
		 }

	$flyersData=$this->Common_model->joinTableData("fc_ticket_booking","fc_flyers","*","fc_flyers.flyerId=fc_ticket_booking.flylerId",$con);
 
	$this->outputData['page']="User_booking";
	$this->outputData['flyersData']=$flyersData;
	$this->outputData['allFleyrs']=$allFleyrs;
	$this->load->viewF("user_booking_view",$this->outputData) ;	
	
	}



	

	}
	