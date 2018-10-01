<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Spikedace Pvt Ltd
 * Created on 28 Oct 2017
 * bamu -  module
**/
class Welcome extends CI_Controller {
	
	public $menu		= 0;
	public $subMenu		= 0;
	public $outputdata 	= array();
	
	public function __construct(){
		parent::__construct();
		//Check login authentication & set public veriables
		$this->session->set_userdata(PREFIX.'sessAdminRole', "admin");
		$this->common_lib->setSessionAdminVariables();
	}
	

	public function index(){	
		$this->load->viewD('welcome_view',$this->outputdata);
	}
	
}