<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_response extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	public function chart($flyerId) {
	
	$flyersData=$this->Common_model->selTableData("fc_flyers","*","flyerId=".$flyerId);


	$this->outputData['page']="Active_flyers";
	$this->outputData['flyersData']=$flyersData[0];
	$this->load->viewF("user_response_view",$this->outputData) ;	
	
	}



	

	}
	