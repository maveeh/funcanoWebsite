<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjobs extends CI_Controller {

	public function checkFlyerStatus(){


			$flyersData  =  $this->Common_model->selTableData(PREFIX."flyers","*","status=1");


			if ($flyersData) {
				
				foreach ($flyersData as $fData) {
					if ($fData->createdOn<date('Y-m-d', strtotime('-30 days'))) {
					
					 $updateTicket["status"]	= 2;	
					 $canTicketData  = $this->Common_model->update("fc_flyers",$updateTicket,"flyerId=".$fData->flyerId);
				
					}
				}

			}
		}

}
