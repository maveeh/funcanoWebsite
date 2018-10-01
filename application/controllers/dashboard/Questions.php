<?php
class Questions extends CI_Controller {
	public $menu 			= 6;
	public $subMenu		= 6;
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing Questions
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->joinTableData(PREFIX."questions","fc_user","*","fc_questions.userId=fc_user.userId","","fc_questions.questionId DESC");
		

		
		$this->load->viewD("Questions_listing_view",$this->outputdata);
	}

	//Add Questions
	function add(){

		$userData=$this->Common_model->selTableData("fc_user","","");
		if(isset($_POST["txt_question"]) && ($_POST["txt_question"] != "")){
			$insertData				=	array();
				$insertData["userId"]	=	0;
				$insertData["question"]	=	$_POST["txt_question"];
				$insertData["answer"]	=	$_POST["txtarea_answer"];	
			$insrt					=	$this->Common_model->insert(PREFIX."questions",$insertData);
			if($insrt){
					
				 redirect(DASHURL."/questions");
			}
		}
		$this->outputdata['userData']=$userData ;
		$this->load->viewD("Questions_add_view",$this->outputdata);
	}
	
	//update Questions
	function update($id	=0){
		$cond = array("questionId" => $id);
		$userData=$this->Common_model->selTableData("fc_user","","");
		if(isset($_POST["dd_userId"]) && ($_POST["dd_userId"] != "")){
			$updateData						=	array();
				$updateData["userId"]	=	$_POST["dd_userId"];
				$updateData["question"]	=	$_POST["txt_question"];
				$updateData["answer"]	=	$_POST["txtarea_answer"];	
			$update		=	$this->Common_model->update(PREFIX."questions",$updateData,$cond);

			if($update){
				
				 redirect(DASHURL."/questions");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."questions","",$cond);
		$this->outputdata['userData']=$userData ;
		
		$this->load->viewD("Questions_update_view",$this->outputdata);
	}
	
	//delete records of Questions
	function delrecord($id=0){
		$cond    = array("questionId" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."questions",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/questions");
		}  
	}
	
	//details page of Questions
	function details($id=0){
		$cond = array("questionId" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."questions","",$cond);
		
		$this->load->viewD("Questions_detail_view",$this->outputdata);
	}
}