<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjobs extends CI_Controller {

public function checkFlyerStatus(){


		/*$flyersData  =  $this->Common_model->selTableData(PREFIX."flyers","*","status=1");


		if ($flyersData) {
			
			foreach ($flyersData as $fData) {
				if ($fData->endTime<date('Y-m-d')) {
				
				 $updateTicket["status"]	= 2;	
				 $canTicketData  = $this->Common_model->update("fc_flyers",$updateTicket,"flyerId=".$fData->flyerId);
			
				}
			}


		}*/

		$settings = array();
				$settings["template"] 				= 	"welcome_to_socialconnect.html";
				$settings["email"] 					= 	"aher.avinash01@gmail.com"; 
				$settings["subject"] 				=	"Funcano - Welcome";
				$contentarr["[[[USERNAME]]]"] 		= 	"userName"; 
				$contentarr["[[[PASSWORD]]]"] 		= 	"Password"; 
				
				$settings["contentarr"] 			= 	$contentarr;
				$this->common_lib->sendMail($settings);	
				
				$outputData['result']	=	"Success";
    }

}
