<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {

	
	public function getPHPinfo() {
		echo phpinfo();
	}

	public function index(){
	
		$page="Flyers";
		  $flyer= $this->Common_model->selTableData("fc_flyer_category","categoryTitle","");

		  if ($this->session->userdata(PREFIX.'sessUserId')>0) {
		  	 $userData= $this->Common_model->selRowData("fc_user","funcies","userId=".$this->session->userdata(PREFIX.'sessUserId'));
		  	 $funcies=explode(",", $userData->funcies);
		  	 $this->outputData['funcies']=$funcies ;
		  
			 }
	

			if (isset($_GET['lookingFor'])) { 
				$cond="status=1 AND (categoryTitle LIKE '%".$_GET['lookingFor']."%' OR  address LIKE '%".$_GET['lookingFor']."%' OR title LIKE '%".$_GET['lookingFor']."%' OR keywords LIKE '%".$_GET['lookingFor']."%' OR city LIKE '%".$_GET['lookingFor']."%' OR state LIKE '%".$_GET['lookingFor']."%'  OR description LIKE '%".$_GET['lookingFor']."%' )" ;
			}else{
				$cond="status=1" ;
			}

			if (isset($_GET['categories'])) {
				$cond="status=1 AND (categoryTitle LIKE '%".$_GET['categories']."%')" ;
			}



			$flyersData=$this->Common_model->selTableData("fc_flyers","*,(SELECT SUM(rating) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS rating,,(SELECT count(reviewId) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS reviews",$cond,"flyerId DESC");

		
			$topRatedFuncies= $this->Common_model->selTableData("fc_flyers","GROUP_CONCAT(DISTINCT keywords) AS funcyName",$cond,"");
		

			if (isset($_POST['btnFilter'])) {
			
				$funcies="";
				if (isset($_POST['funcies'])) {
				$postedFuncies=$_POST['funcies'] ;
					   $funciesViews=0;
						foreach ($postedFuncies as $postedFuncies) {
							$funciesData=$this->Common_model->selRowData("fc_funcies","","funciesName='".$postedFuncies."'");
						 	$funciesViews=1+$funciesData->viewCount;
							$funciesDataArr['viewCount']=$funciesViews ;
							$update=$this->Common_model->update("fc_funcies",$funciesDataArr,"funciesName='".$postedFuncies."'");

						}
				$funcies=implode(",", $_POST['funcies']) ;	
				}
				
				$order="";
				if ($_POST['sort']=="Newest Flyer") {
					$order="flyerId DESC";
				}else if ($_POST['sort']=="Oldest Flyer") {
						$order="flyerId ASC";
				}else if ($_POST['sort']=="Highest Rated") {
						$order="rating DESC";
				}else if ($_POST['sort']=="Most Viewed") {
						$order="viewCount DESC";
				}else{
					$order="1";
				}
				if (isset($_GET['categories'])) {
				$cond2="status=1 AND keywords LIKE '%".$funcies."%' AND (categoryTitle LIKE '%".$_GET['categories']."%')" ;
				}else{
					$cond2="status=1 AND keywords LIKE '%".$funcies."%' AND (categoryTitle LIKE '%".$_POST['lookFor']."%' OR  address LIKE '%".$_POST['lookFor']."%' OR title LIKE '%".$_POST['lookFor']."%' OR keywords LIKE '%".$_POST['lookFor']."%' OR city LIKE '%".$_POST['lookFor']."%' OR state LIKE '%".$_POST['lookFor']."%'  OR description LIKE '%".$_POST['lookFor']."%' )" ;
				}

				$flyersData=$this->Common_model->selTableData("fc_flyers","*,(SELECT count(reviewId) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS reviews,(SELECT SUM(rating)/reviews FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS rating",$cond2,$order);

					$topRatedFuncies= $this->Common_model->selTableData("fc_flyers","GROUP_CONCAT(keywords) AS funcyName",$cond,"viewCount DESC","5");



				
			}
		$topFuncies= array_values(array_unique(explode(",",$topRatedFuncies[0]->funcyName))) ;
		
		$this->outputData['flyersData']=$flyersData ;
		$this->outputData['flyer']=$flyer ;
		$this->outputData['page']=$page ;
		$this->outputData['topFuncies']=$topFuncies ;
	
		
		$this->load->viewF("flyer_front_listing_grid_view",$this->outputData);

		
	}

	public function details($flyerId){

	
		if ($this->session->userdata(PREFIX.'sessUserId')<=0) {
				redirect(BASEURL);
		}

		$flyresdata=$this->Common_model->joinTableData("fc_flyers","fc_user","*,fc_flyers.address as flyerAddress,fc_flyers.description AS flyersDesc,(SELECT count(reviewId) FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS reviews,(SELECT SUM(rating)/reviews FROM fc_flyers_review WHERE flyerId=`fc_flyers`.`flyerId`) AS rating","fc_flyers.userId=fc_user.userId","flyerId=".$flyerId);

		if (!$flyresdata) {
				redirect(BASEURL);
		}
		$isInterested	=	$this->Common_model->getSelectedField("fc_interested","interestId","flyerId='".$flyerId."' AND userId=".$this->session->userdata(PREFIX.'sessUserId'));

		$totalInterested	=	$this->Common_model->selRowData("fc_interested","COUNT(interestId) as TotalInterest","flyerId='".$flyerId."'");
	// v3print($totalInterested); exit ;
		$funcies=explode(",",$flyresdata[0]->keywords);
		
		if (isset($funcies) && $funcies!="") {
			$funciesViews=0;
			foreach ($funcies as $funcies) {
				$funciesData=$this->Common_model->selRowData("fc_funcies","","funciesName='".$funcies."'");
			 	$funciesViews=1+$funciesData->viewCount;
				$funciesDataArr['viewCount']=$funciesViews ;
				$update=$this->Common_model->update("fc_funcies",$funciesDataArr,"funciesName='".$funcies."'");

			}
		}
		/*Funcies count increament End*/
		$reviewData=$this->Common_model->joinTableData("fc_flyers_review","fc_user","*,(fc_flyers_review.description) AS reviewDesc","fc_flyers_review.userId=fc_user.userId","flyerId=".$flyerId,"reviewId DESC");
			$views=0;
			if ($flyresdata) {

				/*All View Count In flyers Table*/
				$views=1+$flyresdata[0]->viewCount ;
				$flyersUpdateArr['viewCount']=$views ;
				$update=$this->Common_model->update("fc_flyers",$flyersUpdateArr,"flyerId=".$flyerId);


			}
			/*View Count By Gender*/
			$userData=$this->Common_model->selRowData("fc_user","gender","userId=".$this->session->userdata(PREFIX.'sessUserId'));
	//v3print($userData); exit ;
				$viewCountIns['flyerId']=$flyerId ;
				$viewCountIns['date']=date("Y-m-d") ;
				if ($userData->gender !="") {
				$viewCountIns['gender']=$userData->gender;
					
				}
			//v3print($viewCountIns); exit ;
				$insertCount=$this->Common_model->insert("fc_view_count",$viewCountIns);
				/*view count ends*/

		if (isset($_POST['btnReview'])) {
			//v3print($_POST);exit ;
			 if (isset($_POST['name'])) {
			 $insertFlyers["name"]	=$_POST['name']; }
			 if (isset($_POST['rating'])) {
			 $insertFlyers["rating"]	=$_POST['rating']; }
			 if (isset($_POST['description'])) {
			 $insertFlyers["description"]	=$_POST['description']; }
			 if (isset($_POST['flyerId'])) {
			 $insertFlyers["flyerId"]	=$_POST['flyerId']; }
			 if (isset($_POST['userId'])) {
			 $insertFlyers["userId"]	=$_POST['userId']; }

			 $insertFlyers["date"]	=date("Y-m-d");
		 

		
		 	
			 $update=$this->Common_model->insert("fc_flyers_review", $insertFlyers);
			 if ($update) {
				redirect(BASEURL."/listing/details/".$insertFlyers["flyerId"]);
			 }
				
		}
		if (isset($_POST['btnBuy'])) {
			$quantity=$_POST['txt_ticketQuantity'] ;
			redirect(BASEURL."/ticket/buy/".$flyerId."/".$quantity);
		//$total=$quantity*$flyresdata->ticketPrice ;
			//v3print($_POST); exit ;
		}

		//v3print($totalInterested->TotalInterest); exit ;
		$this->outputData['flyresdata']		=	$flyresdata[0] ;
		$this->outputData['reviewData']		=	$reviewData;
		$this->outputData['isInterested']	=	$isInterested;
		$this->outputData['totalInterested']=	$totalInterested;
		
		$this->load->viewF("listings_single_page_view",$this->outputData);
	}

    public function interested($userId,$flyersId){

    	 $interest["userId"]	=$userId;
    	 $interest["flyerId"]	=$flyersId;
		 $insert=$this->Common_model->insert("fc_interested",$interest);

		 if ($insert) {
		 		redirect(BASEURL."/listing/details/".$flyersId);
		 }

    }

    public function share_count(){
//echo "Success";
    	if (isset($_POST['socialType'])) {
    	
    
    	$flyresdata=$this->Common_model->joinTableData("fc_flyers","fc_user","*,fc_flyers.address as flyerAddress","fc_flyers.userId=fc_user.userId","flyerId=".$_POST['flyerId']);
    	$shareCount=0;
    	if ($_POST['socialType']=="fb") {
					$shareCount=1+$flyresdata[0]->facebookShare;
					$flyersUpdateArr['facebookShare']=$shareCount ;
		}else if($_POST['socialType']=="googlePlus"){
				$shareCount=1+$flyresdata[0]->googleShare;
					$flyersUpdateArr['googleShare']=$shareCount ;
		}else if($_POST['socialType']=="tweet"){
				$shareCount=1+$flyresdata[0]->twitterShare;
					$flyersUpdateArr['twitterShare']=$shareCount ;
		}
			$update=$this->Common_model->update("fc_flyers",$flyersUpdateArr,"flyerId=".$_POST['flyerId']);
			if ($update) {
				echo "Success";			}
				  
				}else{
				    	echo "Failed"	;
				 }

    	}

	}

