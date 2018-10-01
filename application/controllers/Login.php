<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	//Registration & login using Google Connect
	public function googleReg(){

		$userData = $this->Common_model->selRowData(PREFIX."user","","emailId ='".$_POST['email2']."'");
		 $topRatedFuncies= $this->Common_model->selTableData("fc_flyers","GROUP_CONCAT(keywords) AS funcyName","createdOn BETWEEN '".date('Y-m-d',strtotime('-30 days'))."' AND '".date('Y-m-d')."'","viewCount DESC","5");
	

		if(isset($_POST["firstName"]) && isset($_POST["email2"]) && $userData == "") {
		
			$insertData				=	array();
			$insertData["socialConnectType"]	=	$_POST["socialConnectType"];
			$insertData["profileImage"]			=	$_POST["profileImage"];
			$insertData["socialLoginId"]		=	$_POST["socialLoginId"];
			$sysPassword						=   generateStrongPassword(6,false);
			$insertData["password"]				=	md5($sysPassword);
			$insertData["firstName"] =	ucfirst($_POST["firstName"]);
			$insertData["lastName"]	 =	ucfirst($_POST["lastName"]);
			$insertData["emailId"]	 =	trim(strtolower($_POST["email2"]));
			$insertData["status"]	 =	1; //Verify account
			
			$insertData["funcies"]	 =   $topRatedFuncies[0]->funcyName ;
			
			$insertedUserId			 =	$this->Common_model->insert(PREFIX."user",$insertData);
		
			if($insertedUserId){
								
				//Send welcome - social connect email
				$settings = array();
				$settings["template"] 				= 	"welcome_to_socialconnect.html";
				$settings["email"] 					= 	$insertData['emailId']; //"darvatkarg@gmail.com";
				$settings["subject"] 				=	"Funcano - Welcome";
				if($insertData['socialConnectType'] == 1) 
					$contentarr["[[[PROVIDER]]]"] 		= 	"GOOGLE";
				else
					$contentarr["[[[PROVIDER]]]"] 		= 	"FACEBOOK";
					
				$contentarr["[[[USERNAME]]]"] 		= 	$insertData['emailId']; 
				$contentarr["[[[PASSWORD]]]"] 		= 	$sysPassword; 
				
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);	
				
				$outputData['result']	=	"Success";
					
			}
		} else{
			//Email already exists
			$outputData['result']	= "Failed";		
		}
		$this->load->viewF('ajaxresult',$outputData);
	}
	
	//User Google Login
	public function googleSignIn() {
		
		$userData=$this->Common_model->selRowData(PREFIX."user","","emailId='".$_POST['email']."' AND status = 1");
		if ($userData) {
			$this->session->set_userdata(PREFIX.'sessUserId', $userData->userId);
			$this->session->set_userdata(PREFIX.'sessUserName', $userData->firstName);
			$this->session->set_userdata(PREFIX.'sessUserEmail', $userData->emailId);
			$outputData['result']	=	 "Success";
		}else {
			$outputData['result']	=	 "Failed";
		}
		$this->load->viewF('ajaxresult',$outputData);
	}
	
	//Registration using form data
	public function registration(){

			$userData = $this->Common_model->selRowData(PREFIX."user","","emailId ='".$_POST['email2']."'");
			 $topRatedFuncies= $this->Common_model->selTableData("fc_flyers","GROUP_CONCAT(keywords) AS funcyName","createdOn BETWEEN '".date('Y-m-d',strtotime('-30 days'))."' AND '".date('Y-m-d')."'","viewCount DESC","5");
		

			if(isset($_POST["firstName"]) && isset($_POST["email2"]) && $userData ==""){
			
				
		        $insertData				=	array();

				$insertData["firstName"]=	ucfirst($_POST["firstName"]);
				$insertData["lastName"]	=	ucfirst($_POST["lastName"]);
				$insertData["emailId"]	=	trim(strtolower($_POST["email2"]));
				$insertData["password"]	=	md5(trim($_POST["password1"]));
			    $insertData["funcies"]	=   $topRatedFuncies[0]->funcyName ;
				
				$insertedUserId					=	$this->Common_model->insert(PREFIX."user",$insertData);
			
			if($insertedUserId){
				
				//insert into hr_verification
				$insertVeri['userId']		=	$insertedUserId;
				$insertVeri['verifyType']	=	1;
				$insertVeri['code']			=	generateStrongPassword(16,false,'lud');						
				$insertStatus = $this->Common_model->insert("fc_verification", $insertVeri);
				if($insertStatus){
					//Send verification email
					$settings = array();
					$settings["template"] 				= 	"verify_account.html";
					$settings["email"] 					= 	$insertData['emailId']; //"darvatkarg@gmail.com";
					$settings["subject"] 				=	"Funcano - verify account";
					$contentarr['[[[VERIFYURL]]]']		=	BASEURL."/home/verify-account/".$insertVeri['code'];
					$settings["contentarr"] 			= 	$contentarr;
					$this->common_lib->sendMail($settings);	
					
					$outputData['result']	=	"Success";
				}
		
			}
		} else{
			$outputData['result']	=	"Failed";
			
		}
		$this->load->viewF('ajaxresult',$outputData);
	}


			
	//User Login
	public function user_login() {
		
		$userData=$this->Common_model->selRowData(PREFIX."user","","emailId='".$_POST['username']."' AND password='".md5(trim($_POST['password']))."' AND status = 1");
			if ($userData) {
				$this->session->set_userdata(PREFIX.'sessUserId', $userData->userId);
				$this->session->set_userdata(PREFIX.'sessUserName', $userData->firstName);
				$this->session->set_userdata(PREFIX.'sessUserEmail', $userData->emailId);
				$outputData['result']	=	 "Success";
			}else {
				$outputData['result']	=	 "Failed";
			}
			$this->load->viewF('ajaxresult',$outputData);
	}

	// User Logout
	public function logout(){
		if($this->session->userdata(PREFIX.'sessUserId') > 0) {
			$this->session->unset_userdata(PREFIX.'sessUserId');
			$this->session->unset_userdata(PREFIX.'sessName');
			$this->session->unset_userdata(PREFIX.'sessEmail');
		}
		redirect(BASEURL);
	}




	

	}
	