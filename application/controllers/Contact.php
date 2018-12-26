<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

public function index(){

		$page="Contact" ;
		$this->outputData['page']=$page ;

		if (isset($_POST['submit'])) {
				
				$this->common_lib->setSessMsg("Thank you ".  $_POST['name'] .", We will contact you shortly.", 5);
					// Send password changed notification mail
					$settings = array();
					$settings["template"] 				=   "contact_us.html";
					$settings["email"] 					=   "maveeh@hotmail.co.uk";
					$settings["[[[USERNAME]]]"] 		=   $_POST['name'];
					$settings["[[[EMAIL]]]"] 		=   $_POST['email'];
					$settings["[[[Subject]]]"] 		=   $_POST['subject'];
					$settings["[[[COMMENTS]]]"] 		=   $_POST['comments'];
					$settings["subject"] 				=   "Funcano - Enquiry";						
					$settings["contentarr"] 			= 	$settings;
					$this->common_lib->sendMail($settings);	



		}
		$this->load->viewF("contact_view",$this->outputData) ;

		
	}

	





}

 