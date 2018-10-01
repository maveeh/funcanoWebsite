<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Nine Solutions Pvt Ltd
 * Created on 27 Dec 2017
 * Dashboard Auth module
**/
class Auth extends CI_Controller {
	public $userId 			= "";
	public $firstName 		= "";
	public $emailId 		= "";
	public $userType 		= "";
	public $outputdata  	= array();
	
	public function __construct(){
		parent::__construct();
		// Your own constructor code
		$this->load->library('email');
	}
	
	// Admin login view
	function admin() {
		//if logged in send on user page
		if($this->session->userdata(PREFIX.'sessAdminId')) {
			redirect(DASHURL."/user");
		}
		
 		$this->session->set_userdata(PREFIX.'sessAdminRole');
		if(isset($_POST['txtEmailId']) && $_POST['txtEmailId']!='') {
			$emailId	=	trim($_POST['txtEmailId']);
			$pass		=	trim($_POST['txtPassword']);
			$cond		=	array('emailId' => $emailId, 'password' => $pass);
			$result		=	$this->Common_model->selTableData(PREFIX.'admin', '' ,$cond, "","","","",1);
			if($result) {
				$this->session->set_userdata(PREFIX.'sessAdminId', $result->adminId);
				$this->session->set_userdata(PREFIX.'sessAdminName', $result->name);
				$this->session->set_userdata(PREFIX.'sessAdminEmailId', $result->emailId);
				$this->session->set_userdata(PREFIX.'sessAdminRole', 'admin');
				redirect(DASHURL."/user");	
			} else {
				$this->session->unset_userdata(PREFIX.'sessAdminId');
				$this->session->unset_userdata(PREFIX.'sessAdminName');
				$this->session->unset_userdata(PREFIX.'sessAdminEmailId');
				$this->common_lib->setSessMsg("Incorrect login details.", 2);
				redirect(DASHURL);
			}
		}
		$this->outputdata["role"]	=	"admin";
		$this->load->viewD('login_view',$this->outputdata);
	}
	
	
	// Dashboard logout
	function logout(){
		if($this->session->userdata(PREFIX.'sessAdminId') > 0) {
			$role = $this->session->userdata(PREFIX.'sessAdminRole');
			$this->session->unset_userdata(PREFIX.'sessAdminId');
			$this->session->unset_userdata(PREFIX.'sessAdminName');
			$this->session->unset_userdata(PREFIX.'sessAdminEmailId');
		}
		redirect(DASHURL);
	}
	
	// Check login is successful
	function checkLogin($role ="admin"){
		if(isset($_POST['txtEmailId']) && $_POST['txtEmailId']!=''){
			$resultarr['flag']	=	-1;
			$emailId	=	trim($_POST['txtEmailId']);
			$pass		=	trim($_POST['txtPassword']);
			$cond		=	array('email' => $emailId, 'password' => $pass);
			$result		=	$this->Common_model->selTableData(PREFIX.$role, '' ,$cond, "","","","",1);
			
			if($result){
				$row->authId 	= 1;
				$row->name 		= $result->name;
				$row->emailId 	= $result->email;

				$resultarr['flag']	=	2; //User is approved
				$this->session->set_userdata(PREFIX.'sessAdminId', $result->adminId);
				$this->session->set_userdata(PREFIX.'sessAdminName', $result->name);
				$this->session->set_userdata(PREFIX.'sessAdminEmailId', $result->emailId);
				$this->session->set_userdata(PREFIX.'sessAdminRole', $role);
			}
			else {
				$this->session->unset_userdata(PREFIX.'sessAdminId');
				$this->session->unset_userdata(PREFIX.'sessAdminName');
				$this->session->unset_userdata(PREFIX.'sessAdminEmailId');
				$resultarr['flag']	=	-1;	//Email is not registered with us
			}
		}
		return $resultarr;
	}
	
	// Registration success message
	public function success(){	
		$this->load->viewD('inc/header',$this->outputdata);
		$this->load->viewD('regSuccess_view');
		$this->load->viewD('inc/footer');
	}

	// set new password
	function forgot($role="admin") {
		if(isset($_POST['btnReset'])){
			$newPassword 			= 	StringGenerator(6);
			$emailId					=	trim($_POST['txtEmailId']);
			if($role == "admin")
				$authId =   $this->Common_model->getSelectedField(PREFIX.$role,"adminId", "emailId = '".$emailId."' and status = 1" );
				
			if($authId > 0){
				if($role == "admin") {
					$cond		=	"adminId = ".$authId;
					$updateData['password']	=  $newPassword;
					$this->Common_model->update(PREFIX."admin", $updateData, $cond);
				} 
				//Send user email
				$settings = array();
				$settings["template"] 		=  "password_reset_tpl.html";
				$settings["email"] 			=  $emailId; 
				$settings["subject"] 		=  PROJECTNAME." - new password is set";
				$contentarr['[[[USERNAME]]]']		=	$emailId;
				$contentarr['[[[PASSWORD]]]']		=	$newPassword;
				$contentarr['[[[DASHURL]]]']		=	DASHURL."/".$role."/forgot";
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);	
				$this->common_lib->setSessMsg("Please check inbox for new password.", 1);
				redirect(DASHURL."/".$role."/forgot");
			} else {
				$this->common_lib->setSessMsg("Email-id is not registered with us.", 2);
				redirect(DASHURL."/".$role."/forgot");
			}
		}
		$this->outputdata["role"]	=	$role;
		$this->load->viewD('forgot_view', $this->outputdata);
	}
	
	// Reset password
	function setPassword($code="") {
		$cond = "code = '".$code."'";
		if(isset($_POST['txtpassword']) && $_POST['txtpassword']!='' ){
			$updateData['status']	=   1;
			$updt                 	=   $this->Common_model->update(PREFIX."forgot",$updateData,$cond);
			$updtdata['password'] 	=	sha1($_POST['txtpassword']);
			$updt    				=   $this->Common_model->update(PREFIX."member",$updtdata,"memberid = ".$memberid);
			if($updt){
				$this->session->set_userdata(PREFIX.'new_pass_set', "New password is set successfully.");
				redirect(BASEURL);
			}
		} else {
			$status = $this->Common_model->getSelectedField(PREFIX."forgotpassword","status",$cond);
			if($status == 1){
				$this->session->set_userdata(PREFIX.'dup_code', "You have already used this link to reset password.");
				redirect(BASEURL);
			}else
			if($status == ''){
				redirect(BASEURL);
			}
		}
		$this->load->viewD('includes/header_home',$this->outputdata);
		$this->load->viewD('auth/setpassword');
		$this->load->viewD('includes/footer_home');
	}
}