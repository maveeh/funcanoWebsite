<?php
class Flyer extends CI_Controller {
	public $menu 			= 5;
	public $subMenu		= 5;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessAdminRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing Flyer
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->joinTableData(PREFIX."flyers","fc_user","*","fc_flyers.userId=fc_user.userId","fc_flyers.status != 3","flyerId desc");

		
		$this->load->viewD("Flyer_listing_view",$this->outputdata);
	}

	//Add Flyer
	function add(){
		if(isset($_POST["btnAdd"])){
	
			$insertData				=	array();
				$insertData["title"]	=	$_POST["txt_title"];
				$insertData["description"]	=	$_POST["txt_description"];
			
				$insertData["date"]	=	$_POST["txt_date"];	
			$insrt					=	$this->Common_model->insert(PREFIX."flyers",$insertData);
			if($insrt){
				echo "<script> parent.jQuery.colorbox.close(); </script>";	
		
			}
		}
		$this->load->viewD("Flyer_add_view");
	}
	
	//update Flyer
	function update($id	=0){
		$cond = array("flyerId" => $id);
		if(isset($_POST["chk_organizerId"]) && ($_POST["chk_organizerId"] != "")){
			$updateData						=	array();
				$updateData["title"]	=	$_POST["txt_title"];
				$updateData["description"]	=	$_POST["txt_description"];
				$updateData["image"]	=	$_POST["file_image"];
				$updateData["date"]	=	$_POST["txt_date"];	
			$update		=	$this->Common_model->update(PREFIX."flyers",$updateData,$cond);

			if($update){
				echo "<script> parent.jQuery.colorbox.close(); </script>";
				// redirect(DASHURL."/Flyer");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."flyers","",$cond);
	
		$this->load->viewD("Flyer_update_view",$this->outputdata);
	}
	
	//delete records of Flyer
	function delrecord($id=0){
		$cond    = array("flyerId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."flyers",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/Flyer");
		}  
	}
	
	//details page of Flyer
	function details($id=0){
		$cond = array("flyerId" => $id);
		//$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."flyers","",$cond);
		$data		=	$this->Common_model->joinTableData(PREFIX."flyers","fc_user","*,fc_flyers.description as flyerdescription,fc_flyers.city as flyercity,fc_flyers.address as flyeraddress,fc_flyers.status AS flyerStatus","fc_flyers.userId=fc_user.userId","flyerId=".$id,"flyerId desc");
		
		$this->outputdata["data"]=$data[0] ;
		$this->load->viewD("Flyer_detail_view",$this->outputdata);
	}

	function block(){
		if (isset($_POST['btnSubmit'])) {
		$cond = array("flyerId" => $_POST['flyerId']);
			  $updateData["status"]	=	4;	
		    	$update		=	$this->Common_model->update(PREFIX."flyers",$updateData,$cond);

		    	$userData =$this->Common_model->joinTableData(PREFIX."flyers","fc_user","fc_user.emailId,fc_flyers.title","fc_flyers.userId=fc_user.userId","fc_flyers.flyerId=".$_POST['flyerId']);
				if($update){
				$settings = array();
				$settings["template"] 				= 	"block_from_funcano.html";
				$settings["email"] 					= 	$userData[0]->emailId; //"darvatkarg@gmail.com";
				$settings["subject"] 				=	"Funcano - Flyer Blocked";	
				$contentarr['[[[TITLE]]]']			=	$userData[0]->title;
				$contentarr['[[[NOTE]]]']			=	$_POST['textNote'];
				$contentarr['[[[FLYERURL]]]']			=	BASEURL."/user/dashboard/listing/edit/".$_POST['flyerId'];
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);
				
				redirect(DASHURL."/Flyer");
				}
			
		}
		   
	}

	function unblock($id=0){
		$cond = array("flyerId" => $id);
		 $updateData["status"]	=	1;	
			$update		=	$this->Common_model->update(PREFIX."flyers",$updateData,$cond);

			$userData =$this->Common_model->joinTableData(PREFIX."flyers","fc_user","fc_user.emailId,fc_flyers.title","fc_flyers.userId=fc_user.userId","fc_flyers.flyerId=".$id);
		if($update){
				/*$settings = array();
				$settings["template"] 				= 	"block_from_funcano.html";
				$settings["email"] 					= 	$userData[0]->emailId; //"darvatkarg@gmail.com";
				$settings["subject"] 				=	"Funcano - Flyer Blocked";	
				$contentarr['[[[TITLE]]]']			=	$userData[0]->title;
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);*/
				
			redirect(DASHURL."/Flyer");
		} 
	}
}