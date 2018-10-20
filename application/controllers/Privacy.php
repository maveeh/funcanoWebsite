<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller {

public function index(){
		$page="Privacy" ;
		$this->outputData['page']=$page ;
		$this->load->viewF("privacy_view",$this->outputData) ;

		
	}

}