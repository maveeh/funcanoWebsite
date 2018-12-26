<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	//verify user account
	//parth/funcano/login/reset-password/lkjsafdlkk34kdfklsk

	
	function reset_password($code=""){
		$cond = "verifyType = 2 AND status = 0 AND code = '".$code."'";
		$result		=	$this->Common_model->selRowData(PREFIX."verification", '' ,$cond);
		
		if($result){
			if(isset($_POST["btnSubmit"])){

			   $userData=$this->Common_model->selRowData(PREFIX."user","*","userId = ".$result->userId);
			
		        $updateData	=	array();

  				$updateData['password'] = md5(trim($_POST["txt_password"]));  
	
				 $update=$this->Common_model->update("fc_user",$updateData,"userId=".$result->userId);
				
				if($update) {
					$updateData				=	array();
					$updateData['status']	=	1;
					$cond					= 	"verifyId = ".$result->verifyId;
					$update_fl				=	$this->Common_model->update(PREFIX."verification",$updateData,$cond);
					//echo $this->db->last_query();

				}
				$this->common_lib->setSessMsg("New password has been set successfully", 5);
			}
			$this->load->viewF('resetPassword');
		} else {
			$this->load->viewF('linkExpired');
		}	
	}	

	
	function link_expired(){

		$this->load->viewF('linkExpired');
		
	}
	
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
			   // $insertData["funcies"]	=   $topRatedFuncies[0]->funcyName ;
				/*if ($_POST["txt_keyword"]!="") {
					$insertData["funcies"]	=	implode(",",$_POST["txt_keyword"]);
				}else{
					
					 $insertData["funcies"]	=$topRatedFuncies[0]->funcyName ;
				}*/
				
				/*$insertData["contactNumber"]	=	$_POST["txt_contactNumber"];
				$insertData["altContactNumber"]	=	$_POST["txt_altContactNumber"];
				//$insertData["password"]	=	$_POST["txt_password"];
				$insertData["city"]	=	$_POST["txt_city"];
				$insertData["status"]	=	$_POST["txt_status"];
				$insertData["address"]	=	$_POST["txtarea_address"];
				$insertData["zipcode"]	=	$_POST["txt_zipcode"];	*/
				$insertedUserId					=	$this->Common_model->insert(PREFIX."user",$insertData);
			
			if($insertedUserId){
				/*//send email URL to registered 
				$settings = array();
				$settings["template"] 				=  "welcome_to_funcano.html";
				$settings["email"] 					=  trim($insertData['emailId']); 
				$settings["subject"] 				=  "Warm welcome from the Funcano";
				$contentarr['[[[NAME]]]']			=	trim($insertData["firstName"]);
				$contentarr['[[[USERNAME]]]']		=	$insertData["emailId"];
				$contentarr['[[[PASSWORD]]]']		=	$insertData["password"];
				//$contentarr['[[[DASHURL]]]']		=	BASEURL.'/login';
				$settings["contentarr"] 	= 	$contentarr;
				$this->common_lib->sendMail($settings);*/
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

  
  public function forgot_password(){
		
  		if (isset($_POST['forgotPassword'])) {
  		
  				$userData=$this->Common_model->selRowData(PREFIX."user","*","emailId='".$_POST['email']."'  AND status = 1");

  				$userArr=array();
  				if ($userData) {
					$insertData	=	array();
  					$insertData["verifyType"]	 =	2; //Reset password
  					$insertData["code"]	 		 =	generateStrongPassword(16,false,'lud'); 			
					$insertData["userId"]	 	 =  $userData->userId;
					
					$this->Common_model->insert(PREFIX."verification",$insertData);

					$this->common_lib->setSessMsg("Email has been sent", 5);
					// Send password changed notification mail
					$settings = array();
					$settings["template"] 				=   "forgot_password.html";
					$settings["email"] 					=   $userData->emailId;
					$settings["[[[CODE]]]"] 			=   BASEURL."/login/reset_password/".$insertData["code"];					
					$settings["subject"] 				=   "Funcano - Forgot Password";						
					$settings["contentarr"] 			= 	$settings;
					$this->common_lib->sendMail($settings);	
  					
  					
  				}else{


					$this->common_lib->setSessMsg("Enter correct email-id", 4);

  				}



  		}

  		$this->load->viewF("forgotPassword");

	}




	

	}
	