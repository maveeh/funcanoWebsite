<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		
		$this->common_lib->setUserSessionVariables();
	}
   //User Login
	public function add() {

		// We define our address
					
	
		$flyersCategories=$this->Common_model->selTableData("fc_flyer_category","*","");
		$funcies=$this->Common_model->selTableData("fc_funcies","*","");
		if (isset($_POST['btnAddFlyers'])) {

		
	
		 $flyersArr["userId"]	=$this->session->userdata(PREFIX.'sessUserId');
		  if (isset($_POST['txt_title'])) 	
		 $flyersArr["title"]	=ucfirst(strtolower($_POST['txt_title']));
		  if (isset($_POST['sel_categories'])) 	
		 $flyersArr["categoryTitle"]	=$_POST['sel_categories'];
		 $flyersArr["createdOn"]	=date("Y-m-d");
		  if (isset($_POST['txt_keyword'])) 		
		 $flyersArr["keywords"]	=implode(",",$_POST['txt_keyword']);	
		  if (isset($_POST['sel_city'])) 
		 $flyersArr["city"]	=$_POST['sel_city'];
		 if (isset($_POST['txt_state'])) 	
		 $flyersArr["state"]	=$_POST['txt_state'];	
		 if (isset($_POST['txt_zip'])) 	
		 $flyersArr["zip"]	=$_POST['txt_zip'];	
		 if (isset($_POST['txt_phone'])) 
		 $flyersArr["phone"]	=$_POST['txt_zip'];	
		 if (isset($_POST['txt_address'])) 	
		 $flyersArr["address"]	=ucfirst($_POST['txt_address']);	
		 if (isset($_POST['txt_website'])) 	
		 $flyersArr["website"]	=$_POST['txt_website'];	
		 if (isset($_POST['txt_email'])) 	
		 $flyersArr["email"]	=$_POST['txt_email'];	
		 if (isset($_POST['txt_facebook'])) 	
		 $flyersArr["facebookLink"]	=$_POST['txt_facebook'];
		  if (isset($_POST['txt_twitter'])) 	
		 $flyersArr["twitterLink"]	=$_POST['txt_twitter'];
		  if (isset($_POST['txt_google'])) 	
		 $flyersArr["googleLink"]	=$_POST['txt_google'];		
		  if (isset($_POST['description'])){
	 	 $flyersArr["description"]	=ucfirst($_POST['description']);
		 }
	  	 if (isset($_POST['startData'])) 	
		 $flyersArr["startTime"]	=$_POST['startData'];
		  if (isset($_POST['endDate'])) 	
		 $flyersArr["endTime"]	=$_POST['endDate'];
		if (isset($_POST['startTime'])) 	
		 $flyersArr["eventStartTime"]	=$_POST['startTime'];
		if (isset($_POST['endTime'])) 	
		 $flyersArr["eventEndTime"]	=$_POST['endTime'];
		 if (isset($_POST['txt_lat'])) 	
		 $flyersArr["latitude"]	=$_POST['txt_lat'];
		 if (isset($_POST['txt_long'])) 	
		 $flyersArr["longitude"]	=$_POST['txt_long'];
		 $flyersArr["status"]	=1;
		
		  /*ticket creation*/	
		 if (isset($_POST['ticketCheck']) && $_POST['ticketCheck']=="on") {

		 $flyersArr["tickerStatus"]	=2;
		  if (isset($_POST['txt_ticketTitle'])) 
		 $flyersArr["ticketTitle"]	=$_POST['txt_ticketTitle'];
		 if (isset($_POST['txt_ticketDesc'])) 	
		 $flyersArr["ticketDesc"]	=$_POST['txt_ticketDesc'];
		 if (isset($_POST['txt_ticketPrice'])) 	
		 $flyersArr["ticketPrice"]	=$_POST['txt_ticketPrice'];
		 if (isset($_POST['txt_ticketQuantity'])) 	
		 $flyersArr["ticketQuantity"]	=$_POST['txt_ticketQuantity'];		  

		 	}else{

		 	 $flyersArr["tickerStatus"]	=1;	
		 	}
		 


		 if(is_uploaded_file($_FILES['flyersImage1']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage1']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage1']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage1']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage1']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage1';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersArr['image']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		  if(is_uploaded_file($_FILES['flyersImage2']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage2']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage2']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage2']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage2']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage2';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersArr['image1']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		   if(is_uploaded_file($_FILES['flyersImage3']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage3']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage3']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage3']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage3']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage3';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersArr['image2']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		    if(is_uploaded_file($_FILES['flyersImage4']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage4']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage4']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage4']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage4']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage4';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersArr['image3']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}


		 	
	     $insert=$this->Common_model->insert("fc_flyers",$flyersArr,"");
	     if ($insert) {
	     	redirect(BASEURL."/user/dashboard/listing/active-flyers");
	     }
				
		}
		$this->outputData['flyersCategories']=$flyersCategories ;
		$this->outputData['funcies']=$funcies ;
		$this->outputData['page']= "addFlyers";
		
	$this->load->viewF("dashboard-add-listing",$this->outputData) ;
		
	}

	public function active_flyers(){

		$flyersData=$this->Common_model->selTableData("fc_flyers","*","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND status=1","flyerId DESC");

		$this->outputData['flyersData']=$flyersData ;
		$this->outputData['status']="Active";
		$this->outputData['page']="Active_flyers";
		$this->load->viewF("flyers-listing_view",$this->outputData) ;
	}

	public function expire_flyers(){

		$flyersData=$this->Common_model->selTableData("fc_flyers","*","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND status=2","flyerId DESC");
		$this->outputData['flyersData']=$flyersData ;
		$this->outputData['status']="Expire";
		$this->outputData['page']="Expire_flyers";
		$this->load->viewF("flyers-listing_view",$this->outputData) ;
	}

	public function blocked_flyers(){

		$flyersData=$this->Common_model->selTableData("fc_flyers","*","userId='".$this->session->userdata(PREFIX.'sessUserId')."' AND status=4","flyerId DESC");
		$this->outputData['flyersData']=$flyersData ;
		$this->outputData['status']="Blocked";
		$this->outputData['page']="Blocked_flyers";
		$this->load->viewF("flyers-listing_view",$this->outputData) ;
	}
	
	public function active_ticket(){

        $ticketData=$this->Common_model->exeQuery("SELECT `fc_ticket_booking`.*,fc_flyers.title,fc_flyers.image,fc_flyers.address,fc_user.emailId,fc_user.firstName FROM `fc_ticket_booking` LEFT JOIN `fc_flyers` ON `fc_ticket_booking`.`flylerId`=`fc_flyers`.`flyerId` LEFT JOIN fc_user ON `fc_ticket_booking`.`userId`=`fc_user`.`userId` WHERE fc_ticket_booking.userId = ".$this->session->userdata(PREFIX.'sessUserId')." AND ticketDate >= DATE_FORMAT(NOW(),'%Y-%m-%d') AND `bookingStatus` = 1");
        
		$this->outputData['ticketData']=$ticketData ;
		$this->outputData['status']="Active";
		$this->outputData['page']="Active";
		$this->load->viewF("ticket_listing_view",$this->outputData) ;
	}
	
	public function expire_ticket(){

        $ticketData=$this->Common_model->exeQuery("SELECT `fc_ticket_booking`.*,fc_flyers.title,fc_flyers.image,fc_flyers.address,fc_user.emailId,fc_user.firstName FROM `fc_ticket_booking` LEFT JOIN `fc_flyers` ON `fc_ticket_booking`.`flylerId`=`fc_flyers`.`flyerId` LEFT JOIN fc_user ON `fc_ticket_booking`.`userId`=`fc_user`.`userId` WHERE fc_ticket_booking.userId = ".$this->session->userdata(PREFIX.'sessUserId')." AND ticketDate < DATE_FORMAT(NOW(),'%Y-%m-%d') AND `bookingStatus` = 1");

		//echo $this->db->last_query(); exit;

		$this->outputData['ticketData']=$ticketData ;
		$this->outputData['status']="Expire";
		$this->outputData['page']="Expire";
		$this->load->viewF("ticket_expire_view",$this->outputData) ;
	}

	public function canceled_ticket(){

        $ticketData=$this->Common_model->exeQuery("SELECT `fc_ticket_booking`.*,fc_flyers.title,fc_flyers.image,fc_flyers.address,fc_user.emailId,fc_user.firstName FROM `fc_ticket_booking` LEFT JOIN `fc_flyers` ON `fc_ticket_booking`.`flylerId`=`fc_flyers`.`flyerId` LEFT JOIN fc_user ON `fc_ticket_booking`.`userId`=`fc_user`.`userId` WHERE fc_ticket_booking.userId = ".$this->session->userdata(PREFIX.'sessUserId')." AND  `bookingStatus` = 2");
       
		$this->outputData['ticketData']=$ticketData ;
		$this->outputData['status']="Cancel";
		$this->outputData['page']="Cancel";
		$this->load->viewF("ticket_cancel_view",$this->outputData) ;
	}

	public function edit($flyerId){
		$funcies=$this->Common_model->selTableData("fc_funcies","*","");
			$flyersCategories=$this->Common_model->selTableData("fc_flyer_category","*","");
		$flyersData=$this->Common_model->selTableData("fc_flyers","*","flyerId=".$flyerId);
			
			if (isset($_POST['btnUpdateFlyers'])) {

		 $flyersUpdateArr["userId"]	=$this->session->userdata(PREFIX.'sessUserId');
		  if (isset($_POST['txt_title'])) 	
		 $flyersUpdateArr["title"]	=ucfirst(strtolower($_POST['txt_title']));
		  if (isset($_POST['sel_categories'])) 	
		 $flyersUpdateArr["categoryTitle"]	=$_POST['sel_categories'];
		  if (isset($_POST['txt_keyword'])) 		
		 $flyersUpdateArr["keywords"]	=implode(",",$_POST['txt_keyword']);	
		  if (isset($_POST['sel_city'])) 
		 $flyersUpdateArr["city"]	=$_POST['sel_city'];
		 if (isset($_POST['txt_state'])) 	
		 $flyersUpdateArr["state"]	=$_POST['txt_state'];	
		 if (isset($_POST['txt_zip'])) 	
		 $flyersUpdateArr["zip"]	=$_POST['txt_zip'];	
		 if (isset($_POST['txt_phone'])) 	
		 $flyersUpdateArr["phone"]	=$_POST['txt_phone'];
		 if (isset($_POST['txt_address'])) 	
		 $flyersUpdateArr["address"]	=ucfirst($_POST['txt_address']);		
		 if (isset($_POST['txt_website'])) 	
		 $flyersUpdateArr["website"]	=$_POST['txt_website'];	
		 if (isset($_POST['txt_email'])) 	
		 $flyersUpdateArr["email"]	=$_POST['txt_email'];	
		 if (isset($_POST['txt_facebook'])) 	
		 $flyersUpdateArr["facebookLink"]	=$_POST['txt_facebook'];
		  if (isset($_POST['txt_twitter'])) 	
		 $flyersUpdateArr["twitterLink"]	=$_POST['txt_twitter'];
		  if (isset($_POST['txt_google'])) 	
		 $flyersUpdateArr["googleLink"]	=$_POST['txt_google'];	
		 if (isset($_POST['amenities'])){
		 	 $flyersUpdateArr["amenities"]	=implode(",",$_POST['amenities']);
		 } 
		 if (isset($_POST['description'])){
		 	 $flyersUpdateArr["description"]	=ucfirst($_POST['description']);
		 } 

		if($_POST['startData'] !="") {
			list($mon, $dat, $year) = explode("-", $_POST['startData']); 
			$flyersUpdateArr["startTime"] = $year."-".$mon."-".$dat;
		}
	 
      
         if($_POST['endDate'] !="") {
			list($mon, $dat, $year) = explode("-", $_POST['endDate']); 
			$flyersUpdateArr["endTime"] = $year."-".$mon."-".$dat;
		}
			
		if (isset($_POST['startTime'])) 	
		 $flyersArr["eventStartTime"]	=$_POST['startTime'];
		if (isset($_POST['endTime'])) 	
		 $flyersArr["eventEndTime"]	=$_POST['endTime'];
		  if (isset($_POST['txt_lat'])) 	
		 $flyersUpdateArr["latitude"]	=$_POST['txt_lat'];
		 if (isset($_POST['txt_long'])) 	
		 $flyersUpdateArr["longitude"]	=$_POST['txt_long'];

		 if (isset($_POST['ticketCheck']) && $_POST['ticketCheck']=="on") {

		 $flyersUpdateArr["tickerStatus"]	=2;
		  if (isset($_POST['txt_ticketTitle'])) 
		 $flyersUpdateArr["ticketTitle"]	=$_POST['txt_ticketTitle'];
		 if (isset($_POST['txt_ticketDesc'])) 	
		 $flyersUpdateArr["ticketDesc"]	=$_POST['txt_ticketDesc'];
		 if (isset($_POST['txt_ticketPrice'])) 	
		 $flyersUpdateArr["ticketPrice"]	=$_POST['txt_ticketPrice'];
		 if (isset($_POST['txt_ticketQuantity'])) 	
		 $flyersUpdateArr["ticketQuantity"]	=$_POST['txt_ticketQuantity'];		  

		 	}else{

		 	 $flyersUpdateArr["tickerStatus"]	=1;	
		 	}
	

		

		 if(is_uploaded_file($_FILES['flyersImage1']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage1']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage1']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage1']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage1']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage1';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersUpdateArr['image']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		  if(is_uploaded_file($_FILES['flyersImage2']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage2']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage2']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage2']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage2']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage2';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersUpdateArr['image1']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		   if(is_uploaded_file($_FILES['flyersImage3']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage3']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage3']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage3']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage3']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage3';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersUpdateArr['image2']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		    if(is_uploaded_file($_FILES['flyersImage4']['tmp_name']) != "") {
					$uploadSettings = array();
					$imgName  = generateStrongPassword(8, false, 'lud');
					$fileNameMemberImage	=	$_FILES['flyersImage4']['name'];
					$fileTypeMemberImage	=	$_FILES['flyersImage4']['type'];
					$extensionArr 				= 	(explode(".", strtolower($_FILES['flyersImage4']['name'])));
					$extension = end($extensionArr);
					$nameOfImageToSave = $imgName.".".$extension;
					$uploadSettings['upload_path'] 		=	ABSPATH."/flyers/"; 
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf|jpeg';
					$uploadSettings['file_name'] 		=	$nameOfImageToSave;//$_FILES['flyersImage4']['name'];
					$uploadSettings['inputFieldName'] 	= 	'flyersImage4';
					
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					$flyersUpdateArr['image3']		 =   $nameOfImageToSave;//$_FILES['btnMemberImage']['name'];

				}
		 	
	     $insert=$this->Common_model->update("fc_flyers",$flyersUpdateArr,"flyerId=".$flyerId);
	     if ($insert) {
	     	redirect(BASEURL."/user/dashboard/listing/active-flyers");
	     }
				
		}
		$this->outputData['flyersData']=$flyersData[0] ;
			$this->outputData['flyersCategories']=$flyersCategories ;
			$this->outputData['funcies']=$funcies ;
				$this->outputData['page']="editFlyers";
		$this->load->viewF("dashboard-edit-listing",$this->outputData);
	}

	public function delFlyers($flyerId){

	
		$updateArr=array();
		$updateArr['status']=3;
		$delFlayesData  = $this->Common_model->update("fc_flyers",$updateArr,"flyerId=".$flyerId);
	
		if($delFlayesData) {
			redirect(BASEURL."/user/dashboard/listing/active-flyers");
		}  
	
	}

	public function cancelTicket($bookingId){

		$updateTicket["bookingStatus"]	= 2;	
	
		$canTicketData  = $this->Common_model->update("fc_ticket_booking",$updateTicket,"bookingId=".$bookingId);
	
		if($canTicketData) {
			$flyresdata=$this->Common_model->joinTableData("fc_ticket_booking","fc_flyers","*,fc_flyers.title","fc_ticket_booking.flylerId=fc_flyers.flyerId","fc_ticket_booking.bookingId=".$bookingId);
		    
		    if($flyresdata) {
				//Send ticket details in mail
				$settings = array();
				$settings["template"] 				= 	"cancel_ticket.html";
				$settings["email"] 					= 	$flyresdata[0]->emailId; //"darvatkarg@gmail.com";
				$settings["subject"] 				=	"Funcano - Ticket Cancellation";	
				$contentarr['[[[TITLE]]]']			=	$flyresdata[0]->title;
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);
			}

		}
		redirect(BASEURL."/user/dashboard/listing/active-ticket");
		
	
	}

    
    public function viewTicket($bookingId = 0){

		
	
		$viewTicketData  = $this->Common_model->selTableData("fc_ticket_booking","*","bookingId=".$bookingId);

		
		
        $this->outputdata["viewTicketData"]		= 	$viewTicketData;
	
		$this->load->viewF("ticket_detail_view",$this->outputdata);
	
	}

	public function user_response($flyerId) {
	
	$flyersData=$this->Common_model->selTableData("fc_flyers","*","flyerId=".$flyerId);
	$maleViewCount=$this->Common_model->selTableData("fc_view_count","*,COUNT(shareId) AS sharePerDate","flyerId=".$flyerId." AND gender='male'","","","","date");
	$femaleViewCount=$this->Common_model->selTableData("fc_view_count","*,COUNT(shareId) AS sharePerDate","flyerId=".$flyerId." AND gender='female'","","","","date");

	$this->outputData['page']="Active_flyers";
	$this->outputData['flyersData']=$flyersData[0];
	$this->outputData['maleViewCount']=$maleViewCount;
	$this->outputData['femaleViewCount']=$femaleViewCount;
	$this->load->viewF("user_response_view",$this->outputData) ;	
	
	}

	


	

	}
	