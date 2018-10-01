<?php
class Areas extends CI_Controller {
	public $outputdata		= array();
	public $breadcrum		= array();
	public $breadcrum_list	= "";
	public $menu			= 3;
	public $subMenu			= 3;
	public $user_role		= 0;
	
	function Areas()
	{
		parent::__construct();
		$this->user_role = $this->session->userdata(PREFIX."sess_user_role");
	}
	
	public function index(){
		
		$this->load->viewD("demo/demo_view",$this->outputdata);
	}
	
	//loading areas listing page
	function listing($tablename=""){
		/* get all data of selected table */
		$fieldarr	=	$tablename."_id as id, ".$tablename."_name as name, ".$tablename."_status as status";
		$this->outputdata["alldata"]	= 	$this->Common_model->selTableData(PREFIX."".$tablename,$fieldarr,"",$tablename."_name asc");
		$this->outputdata["tablename"]	= 	$tablename;
		$this->load->viewD("areas/listing",$this->outputdata);
	
	}

	//ajax after pop up close
	function ajaxlisting($tablename="",$parentid=0){
		$fieldarr	=	$tablename."_id as id, ".$tablename."_name as name, ".$tablename."_status as status";
		$condition						= 	"";
		if($parentid > 0){
			if($tablename == "city")
				$condition					= 	"state_id = ".$parentid;
			elseif($tablename == "substation")
				$condition					= 	"city_id = ".$parentid;
		}
		$this->outputdata["alldata"]	= 	$this->Common_model->selTableData("bb_".$tablename,$fieldarr,$condition,$tablename."_name asc");

		$this->outputdata["tablename"]		= 	$tablename;
		$this->outputdata["parentid"]		= 	$parentid;
		$this->outputdata["iframe_class"]	= 	"add_".$tablename;
		$this->outputdata["result"]			= 	$this->load->viewD("areas/ajaxlisting",$this->outputdata,TRUE);
		$this->load->view("ajaxresult",$this->outputdata);
	}

	//add areas
	function add($tablename="", $parentid = 0){
		if(isset($_POST["txt_area_name"]) && ($_POST["txt_area_name"] != "")){
			$insertData							=	array();
			$insertData[$tablename."_name"]		=	$_POST["txt_area_name"];
			$insertData[$tablename."_status"]	=	$_POST["dd_area_status"];
			if($tablename == "city"){
				$insertData["state_id"]			=	$_POST["txt_parentid"];
			}elseif($tablename == "substation"){
				$insertData["city_id"]			=	$_POST["txt_parentid"];
			}
			$insrt								=	$this->Common_model->insert("bb_".$tablename,$insertData);
			if($insrt){
				// $this->session->set_userdata(bb_SESS_ADMIN."succ_msg", "Record added successfully.");
				redirect(BASEURL."/dashboard/areas/add/".$tablename);
			}
		}
		$this->outputdata["tablename"]			= 	$tablename;
		$this->outputdata["parentid"]			= 	$parentid;
		//get data to select parent area
		if($tablename == "substation"){
			$this->outputdata["all_cities"]		=	$this->Common_model->selTableData("bb_city","","","city_name asc");
		}else if($tablename == "city"){
			$this->outputdata["all_states"]		=	$this->Common_model->selTableData("bb_state","","state_status = 1","state_name asc");
		}
		$this->load->viewD("inc/iframe_header",$this->outputdata);
		$this->load->viewD("areas/add");
		$this->load->viewD("inc/footer");
	}
	
	//update State
	function update($tablename="",$id	=0){
		$cond = array($tablename."_id" => $id);
		if(isset($_POST["txt_area_name"]) && ($_POST["txt_area_name"] != "")){
			$updateData							=	array();
			$updateData[$tablename."_name"]		=	$_POST["txt_area_name"];
			$updateData[$tablename."_status"]	=	$_POST["dd_area_status"];	
			$insrt								=	$this->Common_model->update("bb_".$tablename,$updateData,$cond);

			if($insrt){
				$this->session->set_userdata(BT_SESS_ADMIN."succ_msg", "Record updated successfully.");
				redirect(BASEURL."/dashboard/areas/update/".$tablename."/".$id);
			}
		}
		$this->outputdata["tablename"]	= 	$tablename;
		$fieldarr						=	$tablename."_id as id, ".$tablename."_name as name, ".$tablename."_status as status";
		$this->outputdata["alldata"]	=	$this->Common_model->selTableData("bb_".$tablename,$fieldarr,$cond);
		$this->load->viewB("includes/popup_header",$this->outputdata);
		$this->load->viewB("areas/update");
		$this->load->viewB("includes/popup_footer");
	}
	
	//delete records
	function delrecord($tablename = "", $id=0){
		if($tablename == "brands") 
			$cond    = array("brand_id" => $id);
		else 	
			$cond    = array($tablename."_id" => $id);
		
		$del_fl  = $this->Common_model->del("bb_".$tablename,$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			$this->outputdata["result"]   =    1;
		}  
		$this->load->view("ajaxresult",$this->outputdata);
	}
}