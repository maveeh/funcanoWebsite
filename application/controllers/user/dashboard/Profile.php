<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	
	public function index(){

		$userData=$this->Common_model->selTableData("fc_user","*","userId=".$this->session->userdata(PREFIX.'sessUserId')) ;
		$funciesData=$this->Common_model->selTableData("fc_funcies","*","") ;

		if (isset($_POST['btnUpdateUser'])) {
	
		  if (isset($_POST['txt_firstName'])) 
		 $updateUser["firstName"]	=ucfirst($_POST['txt_firstName']);
		 if (isset($_POST['txt_lastName'])) 
		 $updateUser["lastName"]	=ucfirst($_POST['txt_lastName']);
		if (isset($_POST['txt_keyword']) && $_POST['txt_keyword']!="") {
			 $updateUser["funcies"]	=implode(",",$_POST['txt_keyword']);
			}else {
				 $updateUser["funcies"]	="";
			}
		
		  if (isset($_POST['txt_phone'])) 	
		 $updateUser["contactNumber"]	=$_POST['txt_phone'];
		 if (isset($_POST['txt_altPhone'])) 	
		 $updateUser["altContactNumber"]	=$_POST['txt_altPhone'];
		 if (isset($_POST['txt_city'])) 	
		 $updateUser["city"]	=$_POST['txt_city'];
		 if (isset($_POST['txt_address'])) 	
		 $updateUser["address"]	=$_POST['txt_address'];
		if (isset($_POST['txt_zip'])) 	
		 $updateUser["zipcode"]	=$_POST['txt_zip'];
		if (isset($_POST['gender'])) 	
		 $updateUser["gender"]	=$_POST['gender'];
		if (isset($_POST['description'])) 	
		 $updateUser["description"]	=$_POST['description'];
		 if (isset($_POST['txt_funcies'])) 	
		 $updateUser["funcies"]	=implode(",",$_POST['txt_funcies']);
		  if (isset($_POST['txt_email'])) 	
		 $updateUser["emailId"]	=trim(strtolower($_POST['txt_email']));
		  if (isset($_POST['txt_twitter'])) 		
		 $updateUser["twitterLink"]	=$_POST['txt_twitter'];	
		  if (isset($_POST['txt_facebook'])) 
		 $updateUser["facebookLink"]	=$_POST['txt_facebook'];
		 if (isset($_POST['txt_google'])) 	
		 $updateUser["googleLink"]	=$_POST['txt_google'];	

		 if(is_uploaded_file($_FILES['profileImage']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['profileImage']['name'];
					$fileTypeMemberImage	=	$_FILES['profileImage']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['profileImage']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/userProfile/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['profileImage']['name'];
					$uploadSettings['inputFieldName'] 	= 	'profileImage';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$updateUser['profileImage']		 =   UPLOADPATH."/userProfile/".$nameOfImageToSave;//$_FILES['btnMemberImage']['name'];
					
				}
		 	
	     $update=$this->Common_model->update("fc_user",$updateUser,"userId=".$this->session->userdata(PREFIX.'sessUserId'));
	     if ($update) {
	     	redirect(BASEURL."/user/dashboard/profile");
	     }
				
		}

		$this->outputData['userData']= $userData[0];
		$this->outputData['funciesData']= $funciesData;
		$this->outputData['page']= "Profile";
		$this->load->viewF("user_profile_view",$this->outputData) ;

		
	}

	}
	