<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

public function index(){
		$page="FAQ" ;


		if (isset($_POST['btnQuestion'])) {
			if ($this->session->userdata(PREFIX.'sessUserId')>0) {
					$insertData["question"]	 = $_POST['txtQuestion']  ;
			$insertData["userId"]	 = $_POST['userId'] ;
			
			$insertQuestion	 =	$this->Common_model->insert(PREFIX."questions",$insertData);

				$this->common_lib->setSessMsg("Thanks! Our support team will answer you shortly. ", 5);
			}else{

				$this->common_lib->setSessMsg("Please Login", 4);
			}

		}
		 $allQuestions= $this->Common_model->joinTableData(PREFIX."questions","fc_user","*","fc_questions.userId=fc_user.userId","fc_questions.answer !='' AND fc_questions.userId !=0","fc_questions.questionId DESC");
	
		 $adminQuestions=$this->Common_model->selTableData(PREFIX."questions","*","userId=0 AND answer !=''","questionId DESC");

		$this->outputData['page']=$page ;
		$this->outputData['allQuestions']=$allQuestions ;
		$this->outputData['adminQuestions']=$adminQuestions ;
		$this->load->viewF("help_view",$this->outputData) ;

		
	}

}