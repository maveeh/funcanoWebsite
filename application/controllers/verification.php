<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification extends CI_Controller {

function verify_account($code = "") {
		$confirmData	=	'';
		if($code != "") {
			$cond						=	"code = '".$code."' and status = 0";
			$confirmData 				=	$this->Common_model->selRowData("fc_verification", "" ,$cond);
			if(valResultSet($confirmData)) {
				if ($confirmData->verifyType == 1) {
						$memberData		=	$this->Common_model->selRowData("fc_user", "" ,"userId = ".$confirmData->userId);
				} else {
						$memberData		=	$this->Common_model->selRowData("hr_recruiter", "" ,"recruiterId = ".$confirmData->userId);
					}
				if(valResultSet($memberData) && $memberData->status == -1) {
					// insertion in Auth
					$insertData         = array();
					$insertData['name']	 	=   $memberData->firstName;
					$insertData['emailId'] 	=   $memberData->emailId;
					$password				=	generateStrongPassword(8, false, 'lud');	/*Done for now Need To Confirm*/
					$insertData['password']	=	md5($password);
					if($confirmData->verifyType == 1)
						$insertData['role']		=   'user';
					else
						$insertData['role']	=   'recruiter';
					$insertData['verifyType']	=   $confirmData->userId;
					$insertData['status']	=   1;
					$authInsert 		= 	$this->Common_model->insert("hr_auth", $insertData); 
					if($authInsert > 0) {
						$updatedata=array();
						$updatedata['status'] = 0;
						if ($confirmData->roleId == 1) {
							$updateData		=	$this->Common_model->update("fc_user", $updatedata ,"userId = ".$confirmData->userId);
							
							// Send approval/welcome mail to the company
							$settings = array();
							$settings["template"] 				=   "welcome_company_tpl.html";
							$settings["email"] 					=   $memberData->emailId;
							$settings["subject"] 				=   "Welcome to Funcano";
							$contentarr['[[[USERNAME]]]']		=	$memberData->emailId;
							$contentarr['[[[PASSWORD]]]']		=	$password;
							$contentarr['[[[DASHURL]]]']		=	DASHURL."/company/login";
							$settings["contentarr"] 			= 	$contentarr;
							$this->common_lib->sendMail($settings);	
						} else {
							$updateData		=	$this->Common_model->update("hr_recruiter", $updatedata ,"recruiterId = ".$confirmData->memberId);

							// Send approval/welcome mail to the recruiter
							$settings = array();
							$settings["template"] 				=   "welcome_recruiter_tpl.html";
							$settings["email"] 					=   $memberData->emailId; //"darvatkarg@gmail.com";
							$settings["subject"] 				=   "Welcome to GoProHR";
							$contentarr['[[[USERNAME]]]']		=	$memberData->emailId;
							$contentarr['[[[PASSWORD]]]']		=	$password;
							$contentarr['[[[DASHURL]]]']		=	DASHURL."/recruiter/login";
							$settings["contentarr"] 			= 	$contentarr;
							$this->common_lib->sendMail($settings);	
								
						}
					}
				}	else {
					redirect(BASEURL."/home/already-verified");
				
				}			
			}		

		}
		$this->outputData['confirmData']	=	$confirmData;
		$this->load->viewF('inc/header',$this->outputData);
		$this->load->viewF('successfull_verification_view');
		$this->load->viewF('inc/footer');
	}