<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

public function index(){

		$page="Contact" ;
		$this->outputData['page']=$page ;
		$this->load->viewF("contact_view",$this->outputData) ;

		
	}

	





}