<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index(){


		$page="About" ;
			$this->outputData['page']=$page ;
			$this->load->viewF("about_view",$this->outputData) ;
			}

}