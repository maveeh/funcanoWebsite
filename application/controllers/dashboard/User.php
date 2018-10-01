<?php
class User extends CI_Controller {
	public $menu 			= 1;
	public $subMenu		= 1;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessAdminRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing User
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->selTableData(PREFIX."user","","","userId desc");
		// $this->load->viewD("inc/header",$this->outputdata);
		$this->load->viewD("User_listing_view",$this->outputdata);
	}

	//Add User
	function add(){
		if(isset($_POST["btnAdd"])){
			$insertData				=	array();
				$insertData["firstName"]	=	$_POST["txt_firstname"];
				$insertData["lastName"]	=	$_POST["txt_lastname"];
				$insertData["emailId"]	=	$_POST["txt_emailId"];
				$insertData["contactNumber"]	=	$_POST["txt_contactNumber"];
				$insertData["altContactNumber"]	=	$_POST["txt_altContactNumber"];
				//$insertData["password"]	=	$_POST["txt_password"];
				$insertData["city"]	=	$_POST["txt_city"];
				$insertData["status"]	=	$_POST["txt_status"];
				$insertData["address"]	=	$_POST["txtarea_address"];
				$insertData["zipcode"]	=	$_POST["txt_zipcode"];	
			$insrt					=	$this->Common_model->insert(PREFIX."user",$insertData);
			if($insrt){
				//echo "<script> parent.jQuery.colorbox.close(); </script>";	
				 redirect(DASHURL."/User");
			}
		}
		$this->load->viewD("User_add_view");
	}
	
	//update User
	function update($id	=0){
		$cond = array("userId" => $id);
		if(isset($_POST["btnUpdate"])){
			$updateData						=	array();
				$updateData["firstName"]	=	$_POST["txt_firstname"];
				$updateData["lastName"]	=	$_POST["txt_lastname"];
				$updateData["emailId"]	=	$_POST["txt_emailId"];
				$updateData["contactNumber"]	=	$_POST["txt_contactNumber"];
				$updateData["altContactNumber"]	=	$_POST["txt_altContactNumber"];
				//$updateData["password"]	=	$_POST["txt_password"];
				$updateData["city"]	=	$_POST["txt_city"];
				$updateData["status"]	=	$_POST["txt_status"];
				$updateData["address"]	=	$_POST["txtarea_address"];
				$updateData["zipcode"]	=	$_POST["txt_zipcode"];	
			$update		=	$this->Common_model->update(PREFIX."user",$updateData,$cond);

			if($update){
				//echo "<script> parent.jQuery.colorbox.close(); </script>";
				 redirect(DASHURL."/User");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."user","",$cond);
		// $this->load->viewD("inc/header",$this->outputdata);
		$this->load->viewD("User_update_view",$this->outputdata);
	}
	
	//delete records of User
	function delrecord($id=0){
		$cond    = array("userId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."user",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){

			
			$flyerData		=	$this->Common_model->selTableData(PREFIX."flyers","",$cond);
			foreach ($flyerData as $flyerData) {
				$cond=array();
				$cond['flyerId']=$flyerData->flyerId ;
				$updateData["status"]	=	3;
		 	$this->Common_model->update(PREFIX."flyers",$updateData,$cond);

			}

			//echo $this->db->last_query(); exit ;
			redirect(DASHURL."/User");
		}  
	}
	
	//details page of User
	function details($id=0){
		$cond = array("userId" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."user","",$cond);
		// $this->load->viewD("inc/header",$this->outputdata);
		$this->load->viewD("User_detail_view",$this->outputdata);
	}
}