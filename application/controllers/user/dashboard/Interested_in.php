<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interested_in extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	public function index(){
		$interestedIn=$this->Common_model->joinTableData(" fc_interested","fc_flyers","*","fc_interested.flyerId=fc_flyers.flyerId","fc_interested.userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND fc_flyers.status=1" );
	
			$this->outputData['interestedIn']=$interestedIn ;
			$this->outputData['page']="interestIn" ;
			$this->load->viewF("user_interest_view",$this->outputData) ;

		
	}

}
	