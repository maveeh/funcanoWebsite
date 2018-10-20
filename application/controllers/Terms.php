<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

public function index(){
		$page="Terms" ;
		$this->outputData['page']=$page ;
		$this->load->viewF("terms_condition_view",$this->outputData) ;

		
	}

}