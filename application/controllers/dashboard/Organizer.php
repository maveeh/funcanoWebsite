<?php
class Organizer extends CI_Controller {
	public $menu 			= 2;
	public $subMenu		= 2;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessAdminRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing Organizer
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->selTableData(PREFIX."organizer","","","organizerId desc");
	
		$this->load->viewD("Organizer_listing_view",$this->outputdata);
	}

	//Add Organizer
	function add(){
		if(isset($_POST["btnAdd"])){
			$insertData				=	array();
				$insertData["orgFirstName"]	=	$_POST["txt_orgFirstName"];
				$insertData["orgLastName"]	=	$_POST["txt_orgLastName"];
				$insertData["orgEmail"]	=	$_POST["txt_orgEmail"];
				$insertData["orgContact"]	=	$_POST["txt_orgContact"];
				$insertData["orgAltContact"]	=	$_POST["txt_orgAltContact"];
				//$insertData["password"]	=	$_POST["txt_password"];
				$insertData["city"]	=	$_POST["txt_city"];
				$insertData["orgAddress"]	=	$_POST["txtarea_orgAddress"];
				$insertData["orgZip"]	=	$_POST["txt_orgZip"];
				$insertData["status"]	=	$_POST["txt_status"];	
			$insrt					=	$this->Common_model->insert(PREFIX."organizer",$insertData);
			if($insrt){
					
				 redirect(DASHURL."/Organizer");
			}
		}
		$this->load->viewD("Organizer_add_view");
	}
	
	//update Organizer
	function update($id	=0){
		$cond = array("organizerId" => $id);
		if(isset($_POST["btnUpdate"])){
			$updateData						=	array();
				$updateData["orgFirstName"]	=	$_POST["txt_orgFirstName"];
				$updateData["orgLastName"]	=	$_POST["txt_orgLastName"];
				$updateData["orgEmail"]	=	$_POST["txt_orgEmail"];
				$updateData["orgContact"]	=	$_POST["txt_orgContact"];
				$updateData["orgAltContact"]	=	$_POST["txt_orgAltContact"];
				//$updateData["password"]	=	$_POST["txt_password"];
				$updateData["city"]	=	$_POST["txt_city"];
				$updateData["orgAddress"]	=	$_POST["txtarea_orgAddress"];
				$updateData["orgZip"]	=	$_POST["txt_orgZip"];
				$updateData["status"]	=	$_POST["txt_status"];	
			$update		=	$this->Common_model->update(PREFIX."organizer",$updateData,$cond);

			if($update){
		
				 redirect(DASHURL."/Organizer");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."organizer","",$cond);
		
		$this->load->viewD("Organizer_update_view",$this->outputdata);
	}
	
	//delete records of Organizer
	function delrecord($id=0){
		$cond    = array("organizerId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."organizer",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/Organizer");
		}  
	}
	
	//details page of Organizer
	function details($id=0){
		$cond = array("organizerId" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."organizer","",$cond);
	
		$this->load->viewD("Organizer_detail_view",$this->outputdata);
	}
}