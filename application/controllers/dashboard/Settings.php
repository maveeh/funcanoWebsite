<?php
class Settings extends CI_Controller {
	public $menu 			= 1;
	public $subMenu		= 1;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessRole", "admin");
		$this->common_lib->setSessionVariables();
	}

	//listing settings
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->selTableData(PREFIX."suggestion","","","suggestionId asc");
		
		$this->load->viewD("settings_listing_view",$this->outputdata);
	}

	//Add settings
	function add(){
		if(isset($_POST["txt_suggestionType"]) && ($_POST["txt_suggestionType"] != "")){
			$insertData				=	array();
				$insertData["suggestionType"]	=	$_POST["txt_suggestionType"];
				$insertData["suggestionLink"]	=	$_POST["txtarea_suggestionLink"];	
			$insrt					=	$this->Common_model->insert(PREFIX."suggestion",$insertData);
			if($insrt){
				echo "<script> parent.jQuery.colorbox.close(); </script>";	
				// redirect(DASHURL."/settings");
			}
		}
		$this->load->viewD("settings_add_view");
	}
	
	//update settings
	function update($id	=0){
		$cond = array("suggestionId" => $id);
		if(isset($_POST["txt_suggestionType"]) && ($_POST["txt_suggestionType"] != "")){
			$updateData						=	array();
				$updateData["suggestionType"]	=	$_POST["txt_suggestionType"];
				$updateData["suggestionLink"]	=	$_POST["txtarea_suggestionLink"];	
			$update		=	$this->Common_model->update(PREFIX."suggestion",$updateData,$cond);

			if($update){
				echo "<script> parent.jQuery.colorbox.close(); </script>";
				// redirect(DASHURL."/settings");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."suggestion","",$cond);
		
		$this->load->viewD("settings_update_view",$this->outputdata);
	}
	
	//delete records of settings
	function delrecord($id=0){
		$cond    = array("suggestionId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."suggestion",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/settings");
		}  
	}
	
	//details page of settings
	function details($id=0){
		$cond = array("suggestionId" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."suggestion","",$cond);
		
		$this->load->viewD("settings_detail_view",$this->outputdata);
	}
}