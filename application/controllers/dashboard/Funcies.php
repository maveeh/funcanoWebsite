<?php
class Funcies extends CI_Controller {
	public $menu 			= 4;
	public $subMenu		= 4;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessAdminRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing Funcies
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->selTableData(PREFIX."funcies","","","funciesId asc");
	
		$this->load->viewD("Funcies_listing_view",$this->outputdata);
	}

	//Add Funcies
	function add(){
		if(isset($_POST["btnFunciesAdd"])){
			$insertData				=	array();
				$insertData["funciesName"]	=	$_POST["txt_funciesName"];	
			$insrt					=	$this->Common_model->insert(PREFIX."funcies",$insertData);
			if($insrt){
				echo "<script> parent.jQuery.colorbox.close(); </script>";	
				// redirect(DASHURL."/Funcies");
			}
		}
		$this->load->viewD("Funcies_add_view");
	}
	
	//update Funcies
	function update($id	=0){
		$cond = array("funciesId" => $id);
		if(isset($_POST["btnFunciesUpdate"])){
			$updateData						=	array();
				$updateData["funciesName"]	=	$_POST["txt_funciesName"];	
			$update		=	$this->Common_model->update(PREFIX."funcies",$updateData,$cond);

			if($update){
				echo "<script> parent.jQuery.colorbox.close(); </script>";
				// redirect(DASHURL."/Funcies");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."funcies","",$cond);
		
		$this->load->viewD("Funcies_update_view",$this->outputdata);
	}
	
	//delete records of Funcies
	function delrecord($id=0){
		$cond    = array("funciesId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."funcies",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/Funcies");
		}  
	}
	
	//details page of Funcies
	function details($id=0){
		$cond = array("funciesId" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."funcies","",$cond);
	
		$this->load->viewD("Funcies_detail_view",$this->outputdata);
	}
}