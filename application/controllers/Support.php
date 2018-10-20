<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

public function index(){
		$page="Support" ;

		
		$this->outputData['page']=$page ;
		$this->load->viewF("support_view",$this->outputData) ;

		
	}

}