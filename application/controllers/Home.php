<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Created by Spikedace Pvt Ltd
	 * Created on 5 April 2016
	 * Auth module
	*/
	
	public function getPHPinfo() {
		echo phpinfo();
	}
	
	/* Account verification */
	function verify_account($code = "") {
		$verifyStatus	=	1;
		
		if($code != "") {
			$cond						=	"code = '".$code."'";
			$confirmData 				=	$this->Common_model->selRowData("fc_verification", "" ,$cond);
			
			if($confirmData) {
				
				$userData		=	$this->Common_model->selRowData("fc_user", "" ,"userId = ".$confirmData->userId);
				
				if($userData && $userData->status == 0) {
					$updatedata=array();
					$updatedata['status'] = 1;
					$updateStatus		=	$this->Common_model->update("fc_user", $updatedata ,"userId = ".$confirmData->userId);
					if($updateStatus) {
						// Send welcome mail from Funcano
						$settings = array();
						$settings["template"] 				=   "welcome_to_funcano.html";
						$settings["email"] 					=   $userData->emailId;
						$settings["subject"] 				=   "Funcano - Welcome";						
						$settings["contentarr"] 			= 	$settings;
						$this->common_lib->sendMail($settings);	
					}
					
					$updatedata=array();
					$updatedata['status'] = 1;
					$updateStatus		=	$this->Common_model->update("fc_verification", $updatedata ,"verifyId = ".$confirmData->verifyId);
					
					$verifyStatus = 3;
				} else {
					$verifyStatus = 2;				
				}
			} 		
		
		} 
		$this->outputData['verifyStatus']	=	$verifyStatus;
		$this->load->viewF('account_verification_view',$this->outputData);
	}

	//if aleready verification is done with that email id
	public function already_verified(){
		$this->load->viewF('inc/header');
		$this->load->viewF('already_verified_with_email_view');
		$this->load->viewF('inc/footer');
	
	}
	//proof of code
	public function poc02() {
		$lines = file(ABSSTATICPATH."/arrays/entities.txt");
		$entities = array();
		foreach($lines as $line)
		{
			$entities[] = $line;
		}
		return $entities; 
	}
	//proof of code
	public function poc01() {
		//set userCode
		$latestUserCode  =  $this->Common_model->selTableData(PREFIX."user", 'userCode', '', "userId DESC",0,1,'',1);
		$latestUserCode  = $latestUserCode->userCode;
	
		$date 	=  substr($latestUserCode,0,8);
		$no 	=  substr($latestUserCode,8);
		$todate   =  date("dmY");
		if($date == $todate) {
			$newUserCode = $todate.($no + 1);
		} else {
			$newUserCode = $todate."1";
		}
		echo $newUserCode;
	}
	
	//Home page
	public function index() {
		
		$page='Home' ;
	    $flyer= $this->Common_model->selTableData("fc_flyer_category","categoryTitle","");
	    $flyerData= $this->Common_model->selTableData("fc_flyers","*","status=1","flyerId DESC","0","9");
	 
		$this->outputData['flyerData']=$flyerData;
	    $this->outputData['flyer']=$flyer;
	    $this->outputData['page']=$page;
		$this->load->viewF('home_view',$this->outputData);

	}
	
	//Contact page
	public function contact() {
		$this->load->viewF('inc/header');
		$this->load->viewF('contact_view');
		$this->load->viewF('inc/footer');
	}	
}
