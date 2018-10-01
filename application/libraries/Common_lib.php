<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Format class
 * Help convert between various formats such as XML, JSON, CSV, etc.
 *
 * @author    Phil Sturgeon, Chris Kacerguis, @softwarespot
 * @license   http://www.dbad-license.org/
 */
class Common_lib {	
	
	public $outputdata 	= array();
	public $counter		= 1;	

	public function sendNotification($notificationData = ""){
		$CI =&get_instance();
		$deviceData = $CI->Common_model->selTableData('bb_user_device_token','deviceToken','isNotificaton = 1');
		$device_token = array();
		if(valResultSet($deviceData)) {
			foreach($deviceData as $token){
				array_push($device_token, $token->deviceToken);
			}
		}
		$CI->Common_model->android($notificationData, $device_token);
	}


	//username generator
	public function _usernameGenerator($algo = 1) {
		$CI = &get_instance();
		$firstName 	= trim($_POST['txtFirstName']);
		$middleName = trim($_POST['txtMiddleName']);
		$lastName  	= trim($_POST['txtLastName']);
		
		$nameStr = "";
		if($algo == 1) {
			$nameStr = strtolower(substr($firstName, 0, 1).substr($middleName, 0, 1).$lastName);
		} else if($algo == 2) {
			$nameStr = strtolower($lastName.substr($firstName, 0, 1).substr($middleName, 0, 1));
		} else if($algo == 3) {
			$nameStr = strtolower($firstName.$lastName);
		} else if($algo == 4) {
			$nameStr = strtolower($lastName.$firstName);
		} else if($algo == 5) {
			$nameStr = strtolower($firstName.substr($middleName, 0, 1).substr($lastName, 0, 1));
		} else if($algo == 6) {
			$nameStr =  strtolower(substr($middleName, 0, 1).substr($firstName, 0, 1).$lastName);
		} 
		if($this->counter <= 6) {
			$this->counter++;
			$cond     = "username = '".$nameStr."'";
			$username =	$CI->Common_model->getSelectedField("nx_user", "username", $cond);
			if($username != "") {
				return $this->_usernameGenerator($this->counter);
			} else {
				return $nameStr;		
			}	
		}
	}

	public function _doUpload($uploadSettings) {
		$CI = &get_instance();	
		
		$CI->load->library('upload', $uploadSettings);
		$CI->upload->initialize($uploadSettings);
		if ( !$CI->upload->do_upload($uploadSettings['inputFieldName'])){
			$error = array('error' => $CI->upload->display_errors());
			return 0;	
		}
		else {
			$data = array('upload_data' => $CI->upload->data());	
			if(isset($uploadSettings['createThumb'])   && file_exists($uploadSettings['upload_path'] . $uploadSettings['file_name']) ) {
					$thumbPath = $uploadSettings['upload_path'] . "thumbs/". $uploadSettings['file_name'];
					$CI->load->library('image_lib');				
					$uploadSettings['thumbPath'] = $thumbPath;
					$config['image_library'] = 'gd2';
					$config['source_image'] = $uploadSettings['upload_path'] . $uploadSettings['file_name'] ;       
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['width'] = $uploadSettings['thumbWidth'];
					$config['height'] = $uploadSettings['thumbHeight'];
					$config['new_image'] = $thumbPath;               
					$CI->image_lib->initialize($config);
					if(!$CI->image_lib->resize())
					{ 
						echo $CI->image_lib->display_errors();
					}  
					$CI->image_lib->clear();
					// $this->_createThumbnail($uploadSettings);
				
			}
			return 1;
		}
	}
	
	//Create thumbnail
	private function _createThumbnail($fileSettings) {
		/* Create thumbnail image*/   
		 $config['image_library'] 	= 'gd2';
		$config['source_image']  	= $fileSettings['thumbPath'];
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['quality'] 	= 100;
		$config['width'] 	= $fileSettings['thumbWidth'];
		$config['height'] 	= $fileSettings['thumbHeight'];
		$CI->load->library('image_lib', $config);
		if(!$CI->image_lib->resize()) {
			return 0; 
		} else 
			return 1;
	}
	
	/* Send email */
	public function sendMail($settings){
		$CI = &get_instance();
		$CI->load->library('email');
		$logoUrl				=	FRONTIMG."/images/logo.png"; 		
		$siteUrl				=	BASEURL;		
		$template 				= 	ABSSTATICPATH."/emailTemplates/".$settings["template"];
		$subject				= 	$settings["subject"];	
		$mail_content 			= 	file_get_contents($template);
		$mail_content			= 	str_replace("[[[LOGO]]]", $logoUrl, $mail_content);
		$mail_content			= 	str_replace("[[[SITEURL]]]", $siteUrl, $mail_content);
		if(array_key_exists('contentarr', $settings)){
			$contentarr			=		$settings["contentarr"];
			foreach($contentarr as $key=>$value){
				$mail_content		= 	str_replace($key, $value, $mail_content);
			}
		}
		$mail_content		= 	str_replace("[[[YEAR]]]",date('Y'), $mail_content);
		$config['protocol'] = 'sendmail';
		$config['mailtype'] = 'html';
		$CI->email->initialize($config);
		$CI->email->from(ADMINEMAIL,"Funcano");
		$CI->email->to($settings["email"]); 
		$CI->email->subject($subject);
		$CI->email->message($mail_content); 
		//echo $mail_content; exit;
		$CI->email->send();	
	}
	
	/* Set member session info in public veriable */
	public function setSessionVariables($role = "admin"){
		$CI = &get_instance();	
		// check sessIsNotTour = 1 then redirect to tour page 
		if($CI->session->userdata(PREFIX.'sessAuthId') > 0) {
			$CI->sessAuthId		=	$CI->session->userdata(PREFIX.'sessAuthId');
			$CI->sessName	 	=	$CI->session->userdata(PREFIX.'sessName');
			$CI->sessEmail		=	$CI->session->userdata(PREFIX."sessEmail");
			$CI->sessRole		=	$CI->session->userdata(PREFIX."sessRole");
			$CI->sessAddress	=	$CI->session->userdata(PREFIX."sessAddress");
			$CI->sessAdminLogo	=	$CI->session->userdata(PREFIX."sessAdminLogo");
		} else {
			// if($CI->session->userdata(PREFIX.'sessRole')) 
				// redirect(DASHURL."/".$CI->session->userdata(PREFIX.'sessRole'));
			// else
				redirect(BASEURL);
		}
	}

	/* Set member session info in public veriable */
	public function setSessionAdminVariables($role = "admin"){
		$CI = &get_instance();	
		// check sessIsNotTour = 1 then redirect to tour page 
		if($CI->session->userdata(PREFIX.'sessAdminId') > 0) {
			$CI->sessAuthId		=	$CI->session->userdata(PREFIX.'sessAdminId');
			$CI->sessName	 	=	$CI->session->userdata(PREFIX.'sessAdminName');
			$CI->sessEmail		=	$CI->session->userdata(PREFIX."sessAdminEmail");
			$CI->sessRole		=	$CI->session->userdata(PREFIX."sessAdminRole");
			$CI->sessAddress	=	$CI->session->userdata(PREFIX."sessAddress");
			$CI->sessAdminLogo	=	$CI->session->userdata(PREFIX."sessAdminLogo");
		} else {
			// if($CI->session->userdata(PREFIX.'sessRole')) 
				// redirect(DASHURL."/".$CI->session->userdata(PREFIX.'sessRole'));
			// else
				redirect(DASHURL);
		}
	}
	
	/* Set member session info in public veriable */
	public function setUserSessionVariables($role = "admin"){
		$CI = &get_instance();	
		// check sessIsNotTour = 1 then redirect to tour page 
		if($CI->session->userdata(PREFIX.'sessUserId') > 0) {
			$CI->sessAuthId		=	$CI->session->userdata(PREFIX.'sessUserId');
			$CI->sessName	 	=	$CI->session->userdata(PREFIX.'sessUserName');
			$CI->sessEmail		=	$CI->session->userdata(PREFIX."sessUserEmail");
			$CI->sessRole		=	$CI->session->userdata(PREFIX."sessUserRole");
			$CI->sessAddress	=	$CI->session->userdata(PREFIX."sessAddress");
			$CI->sessAdminLogo	=	$CI->session->userdata(PREFIX."sessAdminLogo");
		} else {
			// if($CI->session->userdata(PREFIX.'sessRole')) 
				// redirect(DASHURL."/".$CI->session->userdata(PREFIX.'sessRole'));
			// else
				redirect(BASEURL);
		}
	}
	
	/* Set Admin session info in public veriable */
	public function setAdminSessionVariables(){
		$CI = &get_instance();	
		if(($CI->session->userdata("sess_last_activity") + EXPIRYTIME) < $CI->session->now) {
			$CI->session->unset_userdata();
			$CI->session->set_userdata('sessLogoutFlag', 2);
			redirect(DASHURL."/auth", 'refresh');
		} else {	
			$CI->session->set_userdata("sess_last_activity", $CI->session->userdata("last_activity"));
		}			
		if($CI->session->userdata("sessUserId") > 0) {
			$CI->sessUserId		=	$CI->session->userdata("sessUserId");
			$CI->sessFullName	=	$CI->session->userdata("sessFullName");
			$CI->sessRole		=	$CI->session->userdata("sessRole");
		} else {
			redirect(DASHURL."/auth", 'refresh');
		}
	}
	
	/* set all types of flash messages 
	|	 sesstype = 0 //flashdata
	|  sesstype = 1 //userdata
	*/
	public function setSessMsg($message="", $msgtype=1, $sesstype=0){
		$CI = &get_instance();		
		$alertArray	=	array();
		if($msgtype == 1){ //Success message
			$alertArray["alertType"] = "success"; 
			$alertArray["alertMessage"] = $message; 
			$alertArray["alertMessageHtml"] = '<div role="alert" class="alert alert-success alert-dismissible fade in">
			<button type="button" data-dismiss="alert" aria-label="Close" class="close">
			  <span class="icon-close" aria-hidden="true"></span>
			</button>'.$message.'</div>';
		} elseif($msgtype == 2){ //Error message
			$alertArray["alertType"] = "danger"; 
			$alertArray["alertMessage"] = $message; 
			$alertArray["alertMessageHtml"] = '<div role="alert" class="alert alert-warning alert-dismissible fade in">
			<button type="button" data-dismiss="alert" aria-label="Close" class="close">
			  <span class="icon-close" aria-hidden="true"></span>
			</button>'.$message.'</div>';
		} elseif($msgtype == 3){ //Warning message
			$alertArray["alertType"] = "warning"; 
			$alertArray["alertMessage"] = $message; 
			$alertArray["alertMessageHtml"] = '<div role="alert" class="alert alert-warning alert-dismissible fade in">
			<button type="button" data-dismiss="alert" aria-label="Close" class="close">
				<span class="icon-close" aria-hidden="true"></span>
			</button>'.$message.'</div>';
		}  elseif($msgtype == 4){ //Warning message
			$alertArray["alertType"] = "error"; 
			$alertArray["alertMessage"] = $message; 
			$alertArray["alertMessageHtml"] = '<div class="notification error closeable">
				<p> '.$message.'.</p>
				<a class="close"></a>
			</div>';
		} elseif($msgtype == 5){ //Warning message
			$alertArray["alertType"] = "success"; 
			$alertArray["alertMessage"] = $message; 
			$alertArray["alertMessageHtml"] = '<div class="notification success closeable">
				<p> '.$message.'.</p>
				<a class="close"></a>
			</div>';
		}       
		if($sesstype==1)		
			$CI->session->set_userdata('sessMessage', $alertArray);
		else 
			$CI->session->set_flashdata('sessMessage', $alertArray);
	}	
	
	/* Show session message */
	public function showSessMsg($plainText = false){
		$CI = &get_instance();		
		$alertArray = array();
		$msg	=	"";
		if($plainText){
		  if($CI->session->userdata('sessMessage') != ""){			
					$msg	=	$CI->session->userdata('sessMessage');
					$CI->session->set_userdata('sessMessage', "");			
				} else if($CI->session->flashdata('sessMessage') != ""){			
					$msg	=	$CI->session->flashdata('sessMessage');
				}
		}else{
			if($CI->session->userdata('sessMessage') != ""){			
				$alertArray	=	$CI->session->userdata('sessMessage');
				$msg	=	$alertArray["alertMessageHtml"];
				$CI->session->set_userdata('sessMessage', "");			
			} else if($CI->session->flashdata('sessMessage') != ""){			
				$alertArray	=	$CI->session->flashdata('sessMessage');
				$msg	=	$alertArray["alertMessageHtml"];
			}
		}
		return $msg;
	}
	
	#--------------verify account mail --------------#
	public function verify_account($template_id=0, $to= "",$verification_link = ""){
		$CI = &get_instance();
		$CI->load->library('email');
		
		$condition 		= 	array("template_id" => $template_id);
		$template_data	=	$CI->Common_model->selTableData(TBLPREFIX."email_templates","",$condition);
		$subject		= 	"";
		if(is_array($template_data)){
			foreach($template_data as $td){};
			$template   = 	ABSSTATICPATH."template/verify_account.txt";
			$subject	= 	$td->template_subject;	
			$msg    	= 	file_get_contents($template);
			$msg		= 	str_replace("[[[subject]]]", $td->template_subject, $msg);
			$msg		= 	str_replace("[[[description]]]", $td->template_description, $msg);
			$msg		= 	str_replace("[[[curr_year]]]",date('Y'), $msg);
			if($verification_link != "")
				$msg		= 	str_replace("[[[confirmurl]]]",$verification_link, $msg);
		}
		$config['protocol'] = 'sendmail';
		$config['mailtype'] = 'html';
		$CI->email->initialize($config);
		$CI->email->from("support@bt.com");
		$CI->email->to($to); 
		$CI->email->subject($subject);
		$CI->email->message($msg); 
		$CI->email->send();	
	}
	
	#-------------- account verfied successfuly mail --------------#
	public function verified_account($template_id=0, $tablename= "",$userdata){
		$CI = &get_instance();
		$CI->load->library('email');
		
		$condition 		= 	array("template_id" => $template_id);
		$template_data	=	$CI->Common_model->selTableData(TBLPREFIX."email_templates","",$condition);
		$subject		= 	"";
		if(is_array($template_data)){
			foreach($template_data as $td){};
			$template   = 	ABSSTATICPATH."template/verified_account.txt";
			$subject	= 	$td->template_subject;	
			$msg    	= 	file_get_contents($template);
			$msg		= 	str_replace("[[[subject]]]", $td->template_subject, $msg);
			$msg		= 	str_replace("[[[description]]]", $td->template_description, $msg);
			$msg		= 	str_replace("[[[curr_year]]]",date('Y'), $msg);
			$msg		= 	str_replace("[[[username]]]",$userdata[0]->email, $msg);
			$msg		= 	str_replace("[[[password]]]",$userdata[0]->text_password, $msg);
			if($tablename == "merchant"){
				$login_link = '<p style="font-size: 11px;">You can login to your accont after Bus and Taxi team activate your account</p><p style="font-size: 11px; color: #333333; font-weight: bold;">Login Page:</p><div style="width: 143px; height: 38px; border-radius: 6px; background-color:#000;"><a href="'.BASEURL.'dashboard/merchant" style="display: block; width:143px; height:38px; text-align:center; font-size: 18px; font-weight: bold; color: #fff; text-decoration: none; line-height:38px;">Click Here</a></div>';
				$msg		= 	str_replace("[[[login_link]]]",$login_link, $msg);
				
			}else
				$msg		= 	str_replace("[[[login_link]]]","", $msg);
		}
		$config['protocol'] = 'sendmail';
		$config['mailtype'] = 'html';
		$CI->email->initialize($config);
		$CI->email->from("support@bt.com");
		$CI->email->to($userdata[0]->email);
		$CI->email->subject($subject);
		$CI->email->message($msg); 
		$CI->email->send();	
	}
	
	#--------------Restrict duplicate registration--------------#
	public function restrict_duplicate_registration($tablename = "", $email_id = ""){
		$CI 		= 	&get_instance();
		$conditon	=	array('emailid' => $email_id);
		$result		=	$CI->Common_model->selTableData(TBLPREFIX.$tablename, '' ,$conditon);
		if(is_array($result)){
			return true;
		}else{
			return false;
		}
	}
}