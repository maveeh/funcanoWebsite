<?php
class Banner extends CI_Controller {
	public $outputdata		= array();
	public $menu			= 6;
	public $subMenu			= 6;
	
	function __construct()
	{
		parent::__construct();
		//Check login authentication & set public veriables
		$this->session->set_userdata(PREFIX.'sessRole', "admin");
		$this->common_lib->setSessionVariables();
	}
	
	//loading Banner listing page
	function index(){
		if(isset($_POST['submit'])) {
			// $update_fl = 0;
			for($j=0;$j < count($_POST['arr']); $j++ ){
				$sequence                   = 	$j+1;
				$updateData                 =	array();
				$updateData['position ']	=	$sequence;
				$condition                  =	array("banner_id"=>$_POST['arr'][$j]);
				$update_fl                  =	$this->Common_model->update("bt_banner",$updateData,$condition);
			}

			switch ($_POST["sel_action"]) {
				case '1': // visible
				{
					for($i=0;$i<count($_POST['chkid']);$i++){
						$updateData            	=	array();
						$updateData['visibility']=  1;
						$condition              =   array('banner_id'=>$_POST['chkid'][$i]);
						$update_fl              = 	$this->Common_model->update(PREFIX."banner",$updateData,$condition);	
					}
					break;
				}
				case '2': // invisible
				{ 
					for($i=0;$i<count($_POST['chkid']);$i++){
						$updateData                 =	array();
						$updateData['visibility']   =   0;
						$condition                  =   array('banner_id'=>$_POST['chkid'][$i]);
						$update_fl                  =   $this->Common_model->update(PREFIX."banner",$updateData,$condition);	
					}
					break;
				}
				case '3': // delete
				{
					for($i=0;$i<count($_POST['chkid']);$i++){
						$condition    	= array("banner_id" => $_POST['chkid'][$i]);
						$originalname   = $this->Common_model->getSelectedField(PREFIX."banner","banner_filename",$condition,"","","");
						$this->Common_model->del("bb_banner",$condition);
						$banner_path	= ABSUPLOADPATH."/banner/";
						if (is_file($banner_path.$originalname)) {
							unlink($banner_path.$originalname); //delete ori. img
							unlink($banner_path."thumbs/".$originalname);
						 }
					}
					break;
				}
			}
			redirect(DASHURL."/banner");
		} // end if
		$this->outputdata["bannerlist"]		=	$this->Common_model->selTableData(PREFIX."banner","","","position");

		$this->load->viewD("banner/listing_banner",$this->outputdata);
	}
	
	//ajax after pop up close
	function ajaxlisting() {
		$this->outputdata["bannerlist"]		=	$this->Common_model->selTableData("bt_banner","","","position");
		$this->outputdata["result"]		= 	$this->load->viewB("banner/ajaxlisting_banner",$this->outputdata);
		$this->load->viewD("ajaxresult",$this->outputdata);
	}
	
	//add banner
	function add(){
		$this->load->viewD("banner/add_banner");
	}
	
	// upload frames from upload functionality
	function uploading() {
		$banner_path	=	ABSPATH."/banner/";
		if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"]  == "image/jpeg")|| ($_FILES["file"]["type"]  == "image/png"))){
			$originalname  = $_FILES["file"]["name"];
			if($_FILES["file"]["error"] > 0) {
				$this->outputdata['result'] = "Return Code: " . $_FILES["file"]["error"] . "<br/>";
			} else {
				if (file_exists($banner_path . $originalname)) {
					$this->outputdata['result'] = $originalname . " already exists. ";
				} else {
					$uploadSettings = array();						
					$uploadSettings['upload_path'] 		=	$banner_path;
					$uploadSettings['allowed_types'] 	=	'gif|jpg|png|PDF|pdf';
					$uploadSettings['file_name'] 		=	$originalname;
					$uploadSettings['inputFieldName'] 	= 	'file';
					$uploadSettings['createThumb']	 	=	true;
					$uploadSettings['thumbWidth']	 	=	270;
					$uploadSettings['thumbHeight']	 	=	180; 
					$fileUpload	=	$this->common_lib->_doUpload($uploadSettings);
					
					// inset frames
					$insertdata  	= array();
					$insertdata['banner_filename']   =	$originalname;
					$lastinsertid 	=	$this->Common_model->insert("bb_banner",$insertdata);
					$this->outputdata['result'] = $lastinsertid;
				}
			}
		} else {
			$this->outputdata['result'] = "Invalid file";
		}
		$this->load->viewD("ajaxresult",$this->outputdata);
	}
	
	//change status of banner
	function changestatus($id=0,$vis_flag=0){
		$updateData                 =	array();
		$updateData['visibility']   =	$vis_flag;
		$condition                  =	array("banner_id"=>$id);
		$update_fl                  =	$this->Common_model->update(PREFIX."banner",$updateData,$condition);
		$this->outputdata['result'] =   1;
		$this->load->viewD("ajaxresult",$this->outputdata);
	}
	
	//delete records
	function delrecord($id=0,$show = 0){
		$condition    	= 	array("banner_id" => $id);
		$originalname   = 	$this->Common_model->getSelectedField(PREFIX."banner","banner_filename",$condition,"","","");
		$this->Common_model->del(PREFIX."banner",$condition);
		
		$banner_path	= ABSPATH."/banner/";
		$success 		= is_file(ABSPATH."/banner/".$originalname);
		if (is_file($banner_path.$originalname)) {
			unlink($banner_path.$originalname); //delete ori. img 
			unlink($banner_path."/thumbs/".$originalname);
		}
		if($show == 1){
			$this->outputdata['result']   =    1;
			$this->load->viewD('ajaxresult',$this->outputdata);
		}else{
			$data['jsonresult'] = json_encode($success);
			$this->load->viewD("ajaxresult",$data);
		}
	}
}