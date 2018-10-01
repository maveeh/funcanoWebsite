<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	public function index(){

		    $selPanel	=	"editPass";

		if (isset($_POST['btnChangePassword'])) {

			
			$currentPassword = $this->Common_model->selRowData("fc_user","emailId, password","password='".md5(trim($_POST['txt_currentPass']))."' AND userId=".$this->session->userdata(PREFIX.'sessUserId')) ;
			if (isset($currentPassword) && $currentPassword!="") {
				$updateUser["password"]	= md5(trim($_POST['txt_newPass']));	
		 		$update=$this->Common_model->update("fc_user",$updateUser,"userId=".$this->session->userdata(PREFIX.'sessUserId'));
		 		if ($update) {

		 			$this->common_lib->setSessMsg("Password has been changed", 5);
					// Send password changed notification mail
					$settings = array();
					$settings["template"] 				=   "password_changed.html";
					$settings["email"] 					=   $currentPassword->emailId;
					$settings["[[[USERNAME]]]"] 		=   $currentPassword->emailId;
					$settings["[[[PASSWORD]]]"] 		=   trim($_POST['txt_newPass']);
					$settings["subject"] 				=   "Funcano - Changed Password";						
					$settings["contentarr"] 			= 	$settings;
					$this->common_lib->sendMail($settings);	
					
		 			redirect(BASEURL."/user/dashboard/change-password");
		 		}
			}else{
				$this->common_lib->setSessMsg("Your Current Password is incorrect", 4);
			}
		}
		$this->outPutData['page'] ="changePassword" ;
		$this->outPutData['selPanel']	=	$selPanel;
		$this->load->viewF("user_change_password_view",$this->outPutData) ;

		
	}



	

	}
	