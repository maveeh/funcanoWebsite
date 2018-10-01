<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Spikedace Pvt Ltd
 * Created on 22 June 2016
 * rajtantraCpanel -  module
**/
class Profile extends CI_Controller {
	
	public $menu		= 0;
	public $subMenu		= 0;
	public $outputData 	= array();
	
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setSessionAdminVariables();
	}
	
	// Update dealer info
	public function edit($selPanel = '') {	
		$cond     = "adminId = ".$this->sessAuthId;
		$selPanel	=	"editPro"; 
		if(isset($_POST['btnEditProfile'])) {
			$selPanel	=	"editPro"; 
		echo 	$isEmailAlreadyExist = $this->Common_model->getSelectedField(PREFIX."admin", "emailId", "emailId = '".trim($_POST['txtEmail'])."' AND adminId <> ".$this->sessAuthId);
		
			if($isEmailAlreadyExist == "") {
				$updateData   =  array();
				$updateData['name']	 			=   ucfirst(trim($_POST['txtName']));
				//$updateData['mobile']			=   trim($_POST['txtContact']);
				$updateData['emailId']			=   trim($_POST['txtEmail']);
				//$updateData['address']			=   trim($_POST['txtAddress']);

				$updateStatus 		= 	$this->Common_model->update(PREFIX."admin", $updateData, $cond);
				
				if($updateStatus) {
					$this->common_lib->setSessMsg("Record successfully updated.", 1);
					redirect(DASHURL."/profile/edit");
				}
			} else {
				$this->common_lib->setSessMsg("Email Id already exist", 2);
			}
		}
		
		if(isset($_POST['txtNewPass']) && $_POST['txtNewPass'] != "") {
			$selPanel	=	"editPass";
			
			//Verify current password
			$condPass = "adminId = ".$this->sessAuthId." AND password = '". trim($_POST['txtCurrentPass'])."'";
			$adminId =	$this->Common_model->getSelectedField(PREFIX."admin", "adminId", $condPass);
			
			if($adminId) {
			
				//Update password
				$updateData   			=   array();
				$updateData['password']	=   trim($_POST['txtNewPass']);
				$updateStatus 			= 	$this->Common_model->update(PREFIX."admin", $updateData, $cond);
				
				if($updateStatus){
					
					$this->common_lib->setSessMsg("Password has been changed.", 1);
					redirect(DASHURL."/profile/edit");
				}
			} else {
				$this->common_lib->setSessMsg("Current password is incorrect. Try again.", 2);
			}	 
		}
	
		$data =	$this->Common_model->selRowData(PREFIX."admin", "", $cond);
	    $this->outputData['data']	=	$data;
	    $this->outputData['selPanel']	=	$selPanel;
		
		$this->load->viewD('profile_view', $this->outputData);	
	}

	
	
}