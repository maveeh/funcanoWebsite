<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookies extends CI_Controller {

public function index(){
		$page="Cookies" ;
		$this->outputData['page']=$page ;
		$this->load->viewF("cookies_view",$this->outputData) ;

		
	}

}