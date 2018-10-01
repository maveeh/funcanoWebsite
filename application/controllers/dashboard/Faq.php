<?php
class Faq extends CI_Controller {
	public $menu 			= 3;
	public $subMenu		= 3;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessAdminRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing Faq
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->selTableData(PREFIX."faq","","","faqId desc");
		
		$this->load->viewD("Faq_listing_view",$this->outputdata);
	}

	//Add Faq
	function add(){
		if(isset($_POST["txt_title"]) && ($_POST["txt_title"] != "")){
			$insertData				=	array();
				$insertData["title"]	=	$_POST["txt_title"];
				$insertData["description"]	=	$_POST["txtarea_description"];	
			$insrt					=	$this->Common_model->insert(PREFIX."faq",$insertData);
			if($insrt){
				
				 redirect(DASHURL."/Faq");
			}
		}
		$this->load->viewD("Faq_add_view");
	}
	
	//update Faq
	function update($id	=0){
		$cond = array("faqId" => $id);
		if(isset($_POST["txt_title"]) && ($_POST["txt_title"] != "")){
			$updateData						=	array();
				$updateData["title"]	=	$_POST["txt_title"];
				$updateData["description"]	=	$_POST["txtarea_description"];	
			$update		=	$this->Common_model->update(PREFIX."faq",$updateData,$cond);

			if($update){
				
				 redirect(DASHURL."/Faq");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."faq","",$cond);
	
		$this->load->viewD("Faq_update_view",$this->outputdata);
	}
	
	//delete records of Faq
	function delrecord($id=0){
		$cond    = array("faqId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."faq",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/Faq");
		}  
	}
	
	//details page of Faq
	function details($id=0){
		$cond = array("faqId" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."faq","",$cond);
	
		$this->load->viewD("Faq_detail_view",$this->outputdata);
	}
}