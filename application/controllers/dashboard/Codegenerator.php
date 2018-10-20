<?php
class Codegenerator extends CI_Controller {

	function Codegenerator()
	{
		parent::__construct();
		$this->load->helper('file');
	}

	function index(){
		$addMsg = "";
		$editMsg = "";
		$listMsg = "";
		$detailMsg = "";
		$ctrlMsg = "";
		if(isset($_POST["txtheader"]) && is_array($_POST["txtheader"])){
			
			$cnt 	= count($_POST["txtheader"]);
			$header = $_POST["txtheader"];
			$input 	= $_POST["dd_inputType"];
			$menu = $_POST["txtMenu"] > 0 ? $_POST["txtMenu"] : 1;
			$subMenu = $_POST["txtSubMenu"] > 0 ? $_POST["txtSubMenu"] : 1;
			$iframe = "";
			$tableNameForCtrl = explode("_",$_POST["dd_table"])[1];
			if($_POST["isIFrame"] == 1) {
				$iframe = "addIframe";
			}
			//validation
			$validate = "
	function val_".$_POST["dd_table"]." () {";
		for($i = 0; $i < $cnt; $i++){
			if($header[$i] != ""){
				$validate .= "
		var ".$_POST["txtid"][$i]." 	= 	$('#".$_POST["txtid"][$i]."').val();";
			}
		}
$validate .= "
		var errflag     = 	false;
		var errstr      =   '';
		var phoneval	=	/^[0-9]*$/;";
		for($i = 0; $i < $cnt; $i++){
			if($header[$i] != ""){
				if($_POST["rd_compulsory_".$i] == 1){
					$validate .= "

					else if(trim(".$_POST['txtid'][$i].") == '') {
						errflag = 	true;
						errstr	=	messages['msg'];
					}";
				}if($_POST["dd_val"][$i] == "email"){
					$validate .= "else if(trim(".$_POST['txtid'][$i].") != ''){
						errstr	=	val_email(".$_POST['txtid'][$i].");
						if(errstr != ''){
							errflag = 	true;
						}
					}";
				}
				if($_POST["dd_val"][$i] == "password"){
					$validate .= "else if(trim(".$_POST['txtid'][$i].") != '') {
						errstr	=	val_password(".$_POST['txtid'][$i].", txt_cnfpass);
						if(errstr != ''){
							errflag =   true;
						}
					}";
				}
				if($_POST["dd_val"][$i] == "int"){
					$validate .= "else if(!(trim(".$_POST['txtid'][$i].").match(phoneval))){
						errflag = 	true;
						errstr	=	messages['msg'];
					}";
				}
				if($_POST["dd_val"][$i] == "amount"){
					$validate .= "else if(!(trim(".$_POST['txtid'][$i].").match(phoneval))){
						errflag = 	true;
						errstr	=	messages['msg'];
					}";
				}
			}
		}
		$isCompulsary  = "";			
		if($iframe == "" ) 
			$loadHeader = '<?php $this->load->viewD("inc/header"); ?>';
		else 
			$loadHeader = '<?php $this->load->viewD("inc/iframe_header"); ?>';
			//add file
			$add = $loadHeader.'

				<!-- Main section-->
				<section>
					<!-- Page content-->
					<div class="content-wrapper">
						<h3>Add '.
						ucfirst($_POST["txtfilename"]).'
						   <small>Fill all information to add '.
						ucfirst($_POST["txtfilename"]).'.</small>
						</h3>
					<!-- START row-->
					<div class="row">
						  <div class="col-lg-2"></div>
					   <div class="col-lg-8">
						  <form method="POST" id="frm_'.$_POST["dd_table"].'" name="frm_'.$_POST["dd_table"].'" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
							 <!-- START panel-->
							 <div class="panel panel-default">
								<div class="panel-heading">
								</div>
                        <div class="panel-body">
					';
				for($i = 0; $i < $cnt; $i++){
					if($header[$i] != ""){
						// addition page
						switch($input[$i]){
							case "checkbox":
								$add	.=	'
									<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								if($_POST["rd_compulsory_".$i] == 1)
										$add	.=	' * ';	
								$add .= '</label>
								<label class="checkbox-inline c-checkbox">
                                 <input id="inlineCheckbox10" type="checkbox" value="option1">
                                 <span class="fa fa-check"></span>Yes</label> 
								 </div>';
								break;
							case "editor":
									$add	.=	'
									<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
									
									if($_POST["rd_compulsory_".$i] == 1)
										$add	.=	' * ';
									$add	.=	'</label>
										
									<div data-role="editor-toolbar" data-target="#editor" class="btn-toolbar btn-editor">
										<div class="btn-group dropdown">
											<a data-toggle="dropdown" title="Font" class="btn btn-default">
												<em class="fa fa-font"></em><b class="caret"></b>
											</a>
											<ul class="dropdown-menu">
											   <li><a href="" data-edit="fontName Arial" style="font-family:"Arial"">Arial</a>
											   </li>
											   <li><a href="" data-edit="fontName Sans" style="font-family:"Sans"">Sans</a>
											   </li>
											   <li><a href="" data-edit="fontName Serif" style="font-family:"Serif"">Serif</a>
											   </li>
											</ul>
										</div>
										<div class="btn-group dropdown">
											<a data-toggle="dropdown" title="Font Size" class="btn btn-default">
											   <em class="fa fa-text-height"></em>&nbsp;<b class="caret"></b>
											</a>
											<ul class="dropdown-menu">
											   <li><a href="" data-edit="fontSize 5" style="font-size:24px">Huge</a>
											   </li>
											   <li><a href="" data-edit="fontSize 3" style="font-size:18px">Normal</a>
											   </li>
											   <li><a href="" data-edit="fontSize 1" style="font-size:14px">Small</a>
											   </li>
											</ul>
										</div>
										<div class="btn-group">
											<a data-edit="bold" data-toggle="tooltip" title="Bold (Ctrl/Cmd+B)" class="btn btn-default">
											   <em class="fa fa-bold"></em>
											</a>
											<a data-edit="italic" data-toggle="tooltip" title="Italic (Ctrl/Cmd+I)" class="btn btn-default">
											   <em class="fa fa-italic"></em>
											</a>
											<a data-edit="strikethrough" data-toggle="tooltip" title="Strikethrough" class="btn btn-default">
											   <em class="fa fa-strikethrough"></em>
											</a>
											<a data-edit="underline" data-toggle="tooltip" title="Underline (Ctrl/Cmd+U)" class="btn btn-default">
											   <em class="fa fa-underline"></em>
											</a>
										</div>
										<div class="btn-group">
											<a data-edit="insertunorderedlist" data-toggle="tooltip" title="Bullet list" class="btn btn-default">
											   <em class="fa fa-list-ul"></em>
											</a>
											<a data-edit="insertorderedlist" data-toggle="tooltip" title="Number list" class="btn btn-default">
											   <em class="fa fa-list-ol"></em>
											</a>
											<a data-edit="outdent" data-toggle="tooltip" title="Reduce indent (Shift+Tab)" class="btn btn-default">
											   <em class="fa fa-dedent"></em>
											</a>
											<a data-edit="indent" data-toggle="tooltip" title="Indent (Tab)" class="btn btn-default">
											   <em class="fa fa-indent"></em>
											</a>
										</div>
										<div class="btn-group">
											<a data-edit="justifyleft" data-toggle="tooltip" title="Align Left (Ctrl/Cmd+L)" class="btn btn-default">
											   <em class="fa fa-align-left"></em>
											</a>
											<a data-edit="justifycenter" data-toggle="tooltip" title="Center (Ctrl/Cmd+E)" class="btn btn-default">
											   <em class="fa fa-align-center"></em>
											</a>
											<a data-edit="justifyright" data-toggle="tooltip" title="Align Right (Ctrl/Cmd+R)" class="btn btn-default">
											   <em class="fa fa-align-right"></em>
											</a>
											<a data-edit="justifyfull" data-toggle="tooltip" title="Justify (Ctrl/Cmd+J)" class="btn btn-default">
											   <em class="fa fa-align-justify"></em>
											</a>
										</div>
										<div class="btn-group dropdown">
											<a data-toggle="dropdown" title="Hyperlink" class="btn btn-default">
											   <em class="fa fa-link"></em>
											</a>
											<div class="dropdown-menu">
											   <div class="input-group ml-xs mr-xs">
												  <input id="LinkInput" placeholder="URL" type="text" data-edit="createLink" class="form-control input-sm">
												  <div class="input-group-btn">
													 <button type="button" class="btn btn-sm btn-default">Add</button>
												  </div>
											   </div>
											</div>
											<a data-edit="unlink" data-toggle="tooltip" title="Remove Hyperlink" class="btn btn-default">
											   <em class="fa fa-cut"></em>
											</a>
										</div>
										<div class="btn-group">
											<a id="pictureBtn" data-toggle="tooltip" title="Insert picture (or just drag &amp; drop)" class="btn btn-default">
											   <em class="fa fa-picture-o"></em>
											</a>
											<input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px">
										</div>
										<div class="btn-group pull-right">
											<a data-edit="undo" data-toggle="tooltip" title="Undo (Ctrl/Cmd+Z)" class="btn btn-default">
											   <em class="fa fa-undo"></em>
											</a>
											<a data-edit="redo" data-toggle="tooltip" title="Redo (Ctrl/Cmd+Y)" class="btn btn-default">
											   <em class="fa fa-repeat"></em>
											</a>
										</div>
									</div>
                              <div style="overflow:scroll; height:250px;max-height:250px" class="form-control wysiwyg mt-lg">Type something ...</div>
									 </div>';
									break;
							case "password":
								$add	.=	'
								<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								
								if($_POST["rd_compulsory_".$i] == 1){
									$isCompulsary = "required";
									$add	.=	'*';
								}
								$add	.=	'</label>
									<input type="password" value="" class="form-control" id="'.$_POST["txtid"][$i].'" '.$isCompulsary .' name="'.$_POST["txtid"][$i].'"/>
								 </div>';
								$isCompulsary  = "";
								break;
							case "radio":
								$add	.=	'
								<div class="form-group">
									<label class="control-label">'.$header[$i].':';
								
								if($_POST["rd_compulsory_".$i] == 1){
									$add	.=	'*';
									$isCompulsary = "required";
								}
								$add	.=	'
									</label></br>
									<label class="radio-inline c-radio">
										<input id="inlineradio1" type="radio" name="'.$_POST["txtid"][$i].'" value="1" checked="checked">
										<span class="fa fa-circle"></span>Yes
									</label>
									<label class="radio-inline c-radio">
										<input id="inlineradio2" type="radio" name="'.$_POST["txtid"][$i].'" value="0" checked="">
										<span class="fa fa-circle"></span>No
									</label>
								</div>
								';
								$isCompulsary = "";
								break;
							case "select":
								$add 	.= 	'
								<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								if($_POST["rd_compulsory_".$i] == 1){
									$add	.=	'*';
									$isCompulsary = "required";
								}
								$add	.=	'</label>
									<select id="'.$_POST["txtid"][$i].'" name="'.$_POST["txtid"][$i].'" class="form-control" '.$isCompulsary.'>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>';
								$isCompulsary = "";
								break;
							case "text":
								$add	.=	'
								<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								
								if($_POST["rd_compulsory_".$i] == 1) {
									$add	.=	'*';
									$isCompulsary = "required";
								}
								$add	.=	'</label>
									<input type="text" value="" class="form-control" id="'.$_POST["txtid"][$i].'" name="'.$_POST["txtid"][$i].'" '.$isCompulsary.' />
								</div>';
								$isCompulsary ="";
								break;
							case "textarea":
								$add	.=	'
								<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								if($_POST["rd_compulsory_".$i] == 1){
									$add	.=	'*';
									$isCompulsary = "required";
								}
								$add	.=	'</label>
									<textarea cols="5" rows="3" name="'.$_POST["txtid"][$i].'" id="'.$_POST["txtid"][$i].'" class="form-control" '.$isCompulsary.' ></textarea>
								</div>';
								$isCompulsary ="";
								break;
							case "file":
								$add	.=	'
								<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								if($_POST["rd_compulsory_".$i] == 1) {
									$add	.=	'*';
									$isCompulsary = "required";
								}
								$add	.=	'</label>
									<input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle" id="'.$_POST["txtid"][$i].'" name="'.$_POST["txtid"][$i].'"  '.$isCompulsary.'>
								</div>';
								$isCompulsary ="";	
							break;
							case "datepicker":
								$add	.=	'
								<div class="form-group">
										  <label class="control-label">'.$header[$i].':';
								if($_POST["rd_compulsory_".$i] == 1)
									$add	.=	'*';
								$add	.=	'</label>
										<div id="datetimepicker1" class="input-group date">
											<input type="text" class="form-control"  name="'.$_POST["txtid"][$i].'">
											<span class="input-group-addon">
												<span class="fa fa-calendar"></span>
											</span>
										</div>
								</div>';
						}
					}
				}
		$add	.= '
				</div>
					<div class="panel-footer">
						<div class="clearfix">
							<div class="text-center">
								<span class="help-block m-b-none">* Indicates Required Fields</span>
								 <button type="submit" name="btnAdd" class="btn btn-primary">Add </button>
								
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
               <div class="col-lg-2"></div>
           
            </div>
            </div>
            <!-- END row-->
             
       
      </section>
	  <?php $this->load->viewD("inc/footer"); ?>
	  ';
		$filename = $_POST["txtfilename"]."_add_view.php";
		if(isset($_POST["txtfolder"]) && $_POST["txtfolder"] != "") {
			if(!is_dir(ABSVIEWFILE.$_POST["txtfolder"])){
				mkdir(ABSVIEWFILE.$_POST["txtfolder"], 0777);
			}
			if (!write_file(ABSVIEWFILE.$_POST["txtfolder"]."/admin/".$filename, $add)) {
				$addMsg = '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
			} else {
				$addMsg = '<div role="alert" class="alert alert-success">Add File  <strong>'.$filename.' </strong> written!</div>';
			}
		} else {
			if (! write_file(ABSVIEWFILE.$filename, $add)) {
				$addMsg =  '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
			} else {
				$addMsg =  '<div role="alert" class="alert alert-success">Add File  <strong>'.$filename.' </strong> written!</div>';
			}

		}
		
					
			//edit file
		$edit = $loadHeader.'
				<!-- Main section-->
			<section>
					<!-- Page content-->
				<div class="content-wrapper">
					<h3>Update '.
						ucfirst($_POST["txtfilename"]).'
					   <small>Fill all information to edit '.
						ucfirst($_POST["txtfilename"]).'.</small>
					</h3>
					<!-- START row-->
					<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<form method="POST" id="frm_'.$_POST["dd_table"].'" name="frm_'.$_POST["dd_table"].'" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
									 <!-- START panel-->
									<div class="panel panel-default">
										<div class="panel-heading">
										</div>
									<div class="panel-body">
									';
								for($i = 0; $i < $cnt; $i++){
									if($header[$i] != ""){
									// addition page
										switch($input[$i]){
											case "checkbox":
												$edit	.=	'
												<div class="form-group">
													  <label class="control-label">'.$header[$i].':';
												if($_POST["rd_compulsory_".$i] == 1)
													$edit	.=	' * ';	
												$edit .= '</label>
												<label class="checkbox-inline c-checkbox">
													<input id="inlineCheckbox10" type="checkbox" value="option1">
													<span class="fa fa-check"></span>Yes
												</label> 
												</div>';
												break;
											case "editor":
													$edit	.=	'
													<div class="form-group">
														  <label class="control-label">'.$header[$i].':';
													
													if($_POST["rd_compulsory_".$i] == 1)
														$edit	.=	' * ';
													$edit	.=	'</label>
														
												<div data-role="editor-toolbar" data-target="#editor" class="btn-toolbar btn-editor">
													 <div class="btn-group dropdown">
														<a data-toggle="dropdown" title="Font" class="btn btn-default">
														   <em class="fa fa-font"></em><b class="caret"></b>
														</a>
														<ul class="dropdown-menu">
														   <li><a href="" data-edit="fontName Arial" style="font-family:"Arial"">Arial</a>
														   </li>
														   <li><a href="" data-edit="fontName Sans" style="font-family:"Sans"">Sans</a>
														   </li>
														   <li><a href="" data-edit="fontName Serif" style="font-family:"Serif"">Serif</a>
														   </li>
														</ul>
													 </div>
													 <div class="btn-group dropdown">
														<a data-toggle="dropdown" title="Font Size" class="btn btn-default">
														   <em class="fa fa-text-height"></em>&nbsp;<b class="caret"></b>
														</a>
														<ul class="dropdown-menu">
														   <li><a href="" data-edit="fontSize 5" style="font-size:24px">Huge</a>
														   </li>
														   <li><a href="" data-edit="fontSize 3" style="font-size:18px">Normal</a>
														   </li>
														   <li><a href="" data-edit="fontSize 1" style="font-size:14px">Small</a>
														   </li>
														</ul>
													 </div>
													 <div class="btn-group">
														<a data-edit="bold" data-toggle="tooltip" title="Bold (Ctrl/Cmd+B)" class="btn btn-default">
														   <em class="fa fa-bold"></em>
														</a>
														<a data-edit="italic" data-toggle="tooltip" title="Italic (Ctrl/Cmd+I)" class="btn btn-default">
														   <em class="fa fa-italic"></em>
														</a>
														<a data-edit="strikethrough" data-toggle="tooltip" title="Strikethrough" class="btn btn-default">
														   <em class="fa fa-strikethrough"></em>
														</a>
														<a data-edit="underline" data-toggle="tooltip" title="Underline (Ctrl/Cmd+U)" class="btn btn-default">
														   <em class="fa fa-underline"></em>
														</a>
													 </div>
													 <div class="btn-group">
														<a data-edit="insertunorderedlist" data-toggle="tooltip" title="Bullet list" class="btn btn-default">
														   <em class="fa fa-list-ul"></em>
														</a>
														<a data-edit="insertorderedlist" data-toggle="tooltip" title="Number list" class="btn btn-default">
														   <em class="fa fa-list-ol"></em>
														</a>
														<a data-edit="outdent" data-toggle="tooltip" title="Reduce indent (Shift+Tab)" class="btn btn-default">
														   <em class="fa fa-dedent"></em>
														</a>
														<a data-edit="indent" data-toggle="tooltip" title="Indent (Tab)" class="btn btn-default">
														   <em class="fa fa-indent"></em>
														</a>
													 </div>
													 <div class="btn-group">
														<a data-edit="justifyleft" data-toggle="tooltip" title="Align Left (Ctrl/Cmd+L)" class="btn btn-default">
														   <em class="fa fa-align-left"></em>
														</a>
														<a data-edit="justifycenter" data-toggle="tooltip" title="Center (Ctrl/Cmd+E)" class="btn btn-default">
														   <em class="fa fa-align-center"></em>
														</a>
														<a data-edit="justifyright" data-toggle="tooltip" title="Align Right (Ctrl/Cmd+R)" class="btn btn-default">
														   <em class="fa fa-align-right"></em>
														</a>
														<a data-edit="justifyfull" data-toggle="tooltip" title="Justify (Ctrl/Cmd+J)" class="btn btn-default">
														   <em class="fa fa-align-justify"></em>
														</a>
													 </div>
													 <div class="btn-group dropdown">
														<a data-toggle="dropdown" title="Hyperlink" class="btn btn-default">
														   <em class="fa fa-link"></em>
														</a>
														<div class="dropdown-menu">
														   <div class="input-group ml-xs mr-xs">
															  <input id="LinkInput" placeholder="URL" type="text" data-edit="createLink" class="form-control input-sm">
															  <div class="input-group-btn">
																 <button type="button" class="btn btn-sm btn-default">Add</button>
															  </div>
														   </div>
														</div>
														<a data-edit="unlink" data-toggle="tooltip" title="Remove Hyperlink" class="btn btn-default">
														   <em class="fa fa-cut"></em>
														</a>
													 </div>
													 <div class="btn-group">
														<a id="pictureBtn" data-toggle="tooltip" title="Insert picture (or just drag &amp; drop)" class="btn btn-default">
														   <em class="fa fa-picture-o"></em>
														</a>
														<input type="file" data-edit="insertImage" style="position:absolute; opacity:0; width:41px; height:34px">
													 </div>
													 <div class="btn-group pull-right">
														<a data-edit="undo" data-toggle="tooltip" title="Undo (Ctrl/Cmd+Z)" class="btn btn-default">
														   <em class="fa fa-undo"></em>
														</a>
														<a data-edit="redo" data-toggle="tooltip" title="Redo (Ctrl/Cmd+Y)" class="btn btn-default">
														   <em class="fa fa-repeat"></em>
														</a>
													 </div>
												</div>
												<div style="overflow:scroll; height:250px;max-height:250px" class="form-control wysiwyg mt-lg"><?php echo $data->'.$_POST["txtfield"][$i].'; ?></div>
												</div>';
													break;
											case "password":
												$edit	.=	'
												<div class="form-group">
													<label class="control-label">'.$header[$i].':';
												
												if($_POST["rd_compulsory_".$i] == 1){
													$isCompulsary = "required";
													$edit	.=	'*';
												}
												$edit	.=	'</label>
													<input type="password" value="<?php echo $data->'.$_POST["txtfield"][$i].'; ?>" class="form-control" id="'.$_POST["txtid"][$i].'" '.$isCompulsary .' name="'.$_POST["txtid"][$i].'"/>
												</div>';
												$isCompulsary  = "";
												break;
											case "radio":
												$edit	.=	'
												<div class="form-group">
													<label class="control-label">'.$header[$i].':';
												
												if($_POST["rd_compulsory_".$i] == 1){
													$edit	.=	'*';
													$isCompulsary = "required";
												}
												$edit	.=	'
													</label></br>
													<label class="radio-inline c-radio">
														<input id="inlineradio1" type="radio" name="'.$_POST["txtid"][$i].'" value="1" <?php if($data->'.$_POST["txtfield"][$i].' == 1) echo "checked="checked""; ?>>
														<span class="fa fa-circle"></span>Yes
													</label>
													<label class="radio-inline c-radio">
														<input id="inlineradio2" type="radio" name="'.$_POST["txtid"][$i].'" value="0" <?php if($data->'.$_POST["txtfield"][$i].' == 0) echo "checked="checked""; ?>>
														<span class="fa fa-circle"></span>No
													</label>
												</div>
												';
												$isCompulsary = "";
												break;
											case "select":
												$edit 	.= 	'
												<div class="form-group">
														  <label class="control-label">'.$header[$i].':';
												if($_POST["rd_compulsory_".$i] == 1){
													$edit	.=	'*';
													$isCompulsary = "required";
												}
												$edit	.=	'</label>
													<select id="'.$_POST["txtid"][$i].'" name="'.$_POST["txtid"][$i].'" class="form-control" '.$isCompulsary.'>
														<option value="1" <?php if($data->'.$_POST["txtfield"][$i].' == 1) echo "selected"; ?> >Active</option>
														<option value="0" <?php if($data->'.$_POST["txtfield"][$i].' == 1) echo "selected"; ?> >Inactive</option>
													</select>
												</div>';
												$isCompulsary = "";
												break;
											case "text":
												$edit	.=	'
												<div class="form-group">
														  <label class="control-label">'.$header[$i].':';
												
												if($_POST["rd_compulsory_".$i] == 1) {
													$edit	.=	'*';
													$isCompulsary = "required";
												}
												$edit	.=	'</label>
													<input type="text" value="<?php echo $data->'.$_POST["txtfield"][$i].'; ?>" class="form-control" id="'.$_POST["txtid"][$i].'" name="'.$_POST["txtid"][$i].'" '.$isCompulsary.' />
												</div>';
												$isCompulsary ="";
												break;
											case "textarea":
												$edit	.=	'
												<div class="form-group">
														  <label class="control-label">'.$header[$i].':';
												if($_POST["rd_compulsory_".$i] == 1){
													$edit	.=	'*';
													$isCompulsary = "required";
												}
												$edit	.=	'</label>
													<textarea cols="5" rows="3" name="'.$_POST["txtid"][$i].'" id="'.$_POST["txtid"][$i].'" class="form-control" '.$isCompulsary.' ><?php echo $data->'.$_POST["txtfield"][$i].'; ?></textarea>
												</div>';
												$isCompulsary ="";
												break;
											case "file":
												$edit	.=	'
												<div class="form-group">
														  <label class="control-label">'.$header[$i].':';
												if($_POST["rd_compulsory_".$i] == 1) {
													$edit	.=	'*';
													$isCompulsary = "required";
												}
												$edit	.=	'</label>
													<input type="file" data-classbutton="btn btn-default" data-classinput="form-control inline" class="form-control filestyle" id="'.$_POST["txtid"][$i].'" name="'.$_POST["txtid"][$i].'"  '.$isCompulsary.'>
												</div>';
												$isCompulsary ="";	
											break;
											case "datepicker":
												$edit	.=	'
												<div class="form-group">
														  <label class="control-label">'.$header[$i].':';
												if($_POST["rd_compulsory_".$i] == 1)
													$edit	.=	'*';
												$edit	.=	'</label>
														<div id="datetimepicker1" class="input-group date">
															<input type="text" class="form-control" value="<?php echo $data->'.$_POST["txtfield"][$i].'; ?>" name="'.$_POST["txtid"][$i].'">
															<span class="input-group-addon">
																<span class="fa fa-calendar"></span>
															</span>
														</div>
												</div>';
										}
									}
								}
								$edit	.= '
									</div>
										<div class="panel-footer">
											<div class="clearfix">
												<div class="text-center">
													<span class="help-block m-b-none">* Indicates Required Fields</span>
													 <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
													
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						<div class="col-lg-2"></div>

					</div>
			</div>
			<!-- END row-->
			 

		</section>
		<?php $this->load->viewD("inc/footer"); ?>
	  ';
		$filename = $_POST["txtfilename"]."_update_view.php";
		if(isset($_POST["txtfolder"]) && $_POST["txtfolder"] != ""){
			if(!is_dir(ABSVIEWFILE.$_POST["txtfolder"])){
				mkdir(ABSVIEWFILE.$_POST["txtfolder"], 0777);
			}
			if ( ! write_file(ABSVIEWFILE.$_POST["txtfolder"]."/".$filename, $edit))
				 $editMsg = '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
			else
				 $editMsg = '<div role="alert" class="alert alert-success">Update File <strong>'.$filename.' </strong> written!</div>';
		} else {
			if ( ! write_file(ABSVIEWFILE.$filename, $edit))
				$editMsg = '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
			else
				$editMsg = '<div role="alert" class="alert alert-success">Update File  <strong>'.$filename.' </strong> written!</div>';
		}
			
			//details file
			$details = '<?php $this->load->viewD("inc/iframe_header"); ?>
					<div class="panel panel-info">
						<div class="panel panel-heading">
							'.ucfirst($_POST["txtfilename"]).' Details
						</div>
						<div class="panel-body">
							<table class="table table-responsive table-striped table-bordered table-hover">';
								for($i = 0; $i < $cnt; $i++){
									if($header[$i] != "") {
										$details	.=	'
										<tr>
											<td class="detailshead">'.$header[$i].':</td>
											<td class="detailsval"><?php if($data->'.$_POST["txtfield"][$i].') echo $data->'.$_POST["txtfield"][$i].';?></td>
										</tr>';
									}
								}
							$details	.= '
							</table>
						</div>
					</div>
				<?php $this->load->viewD("inc/footer"); ?>
			</body>
			</html>
			';
			$filename = $_POST["txtfilename"]."_detail_view.php";
			if(isset($_POST["txtfolder"]) && $_POST["txtfolder"] != ""){
				if(!is_dir(ABSVIEWFILE.$_POST["txtfolder"])){
					mkdir(ABSVIEWFILE.$_POST["txtfolder"], 0777);
				}
				if ( ! write_file(ABSVIEWFILE.$_POST["txtfolder"]."/".$filename, $details))
					 $detailMsg =  '<div role="alert" class="alert alert-success">Unable to write the file</div>';
				else
					$detailMsg =  '<div role="alert" class="alert alert-success">Details File <strong>'.$filename.' </strong> written!</div>';
			} else {
				if ( ! write_file(ABSVIEWFILE.$filename, $details))
					$detailMsg =  '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
				else
					$detailMsg =  '<div role="alert" class="alert alert-success">Details File <strong>'.$filename.' </strong> written!</div>';
			
			}
			
			
			
			//listing file
			$listing = '<?php $this->load->viewD("inc/header"); ?>
			<section>
         <!-- Page content-->
				<div class="content-wrapper">
					<h3>
						<div class="pull-right col-sm-offset-3">
							<a href="<?php echo DASHURL.\'/'.$_POST["txtfilename"].'/add/\';?>" class=" '.$iframe.' btn btn-sm btn-info">Add</a>
						</div>'.
						ucfirst($_POST["txtfilename"]).' Listing
					   <small>'.ucfirst($_POST["txtfilename"]).' Information</small>
					   
					</h3>
					<div class="row"> 
						<div class="col-md-12"> 
						</div>
					</div>
					<div class="container-fluid">
					   <!-- START DATATABLE 1 -->
							<div class="panel panel-default">
								
								<div class="panel-body" id="sortData" name="sortData" >
									<table id="datatable2" class="table table-striped table-bordered table-hover table-responsive">
									<thead>
									<tr>
						<th width="5%">No</th>';
		for($i = 0; $i < $cnt; $i++){
			if($header[$i] != ""){
				$listing .= 		'
							<th width="">'.$header[$i].'</th>';
			}
		}
				$listing .= '
						<th width="10%">Action</th>
						</tr>
						</thead>
							<tbody id ="userListing">
								<?php if(isset($data) && valResultSet($data)) { 
								$num = 1;
								foreach($data as $row){
						  ?>
							<tr class="gradeX">
								<td><?php echo $num; ?></td>';
								for($i = 0; $i < $cnt; $i++){
									if($header[$i] != ""){
										$listing	.=	'<td><?php echo $row->'.$_POST["txtfield"][$i].'; ?></td>';
									}
								}
					
					$listing	.= '
							<td align="center">
								<div class="btn-group">
									<button data-toggle="dropdown" class="btn btn-default">Action <b class="caret"></b>
									</button>
									<ul role="menu" class="dropdown-menu">	
									<li>
										<a href="<?php echo DASHURL.\'/'.$_POST["txtfilename"].'/details/\'.$row->'.$_POST["txtfield"][0].';?>" class="'.$iframe.'" title="View Details" class="viewIframe">View Details</a>
									</li>
									<li>
										<a href="<?php echo DASHURL.\'/'.$_POST["txtfilename"].'/update/\'.$row->'.$_POST["txtfield"][0].';?>" class="edit '.$iframe.'">Edit</a></li>
									<li>
										<a  href="<?php echo DASHURL.\'/'.$_POST["txtfilename"].'/delrecord/\'.$row->'.$_POST["txtfield"][0].'; ?>" onclick="return confirm(\'Do you really want to delete this record?\');">Delete</a>
									</li>
									</ul>
								</div>
								</td>
							</tr>
					<?php $num++;
						} 
					} ?>
						</tbody>
								<tfoot>
								<tr>
								<th></th>';
								
								for($i = 0; $i < $cnt; $i++){
									if($header[$i] != ""){
										$listing .= 		'
											<th>
												<input type="text" name="filter_'.$header[$i].'" placeholder="'.$header[$i].'" class="form-control input-sm datatable_input_col_search">
											</th>
										';
									}
								}
						$listing .= '<th></th>
								</tr>
								</tfoot>
									</table>
								</div>
							</div>
						
					</div>
					<!-- END DATATABLE 1 -->
				</div>
			</section> 
			<?php $this->load->viewD("inc/footer"); ?>
			<?php $this->load->viewD("inc/listing_footer"); ?>
</body>
</html>';
			$filename = $_POST["txtfilename"]."_listing_view.php";
			if(isset($_POST["txtfolder"]) && $_POST["txtfolder"] != ""){
				if(!is_dir(ABSVIEWFILE.$_POST["txtfolder"])){
					mkdir(ABSVIEWFILE.$_POST["txtfolder"], 0777);
				}
				
				if ( ! write_file(ABSVIEWFILE.$_POST["txtfolder"]."/".$filename, $listing))
					$listMsg =  '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
				else
					$listMsg =  '<div role="alert" class="alert alert-success">Listing File <strong>'.$filename.' </strong> written!</div>';
				
			}else{
				if ( ! write_file(ABSVIEWFILE.$filename, $listing))
					$listMsg = '<div role="alert" class="alert alert-success">Unable to write the file</div>';
				else
					$listMsg =  '<div role="alert" class="alert alert-success">Listing File <strong>'.$filename.' </strong> written!</div>';
				
			}
			
			
			//Controller file
			if(isset($_POST["txtfolder"]) && $_POST["txtfolder"] != ""){
				$viewfolder = $_POST["txtfolder"]."/admin/";
			}else{
				$viewfolder = "";
			}

			$controller = '<?php
class '.ucfirst($_POST["txtfilename"]).' extends CI_Controller {
	public $menu 			= '.$menu.';
	public $subMenu		= '.$subMenu.';
	public $outputdata		= array();
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata(PREFIX."sessRole", "admin");
		$this->common_lib->setSessionAdminVariables();
	}

	//listing '.$_POST["txtfilename"].'
	function index(){
		$this->outputdata["data"]		=	$this->Common_model->selTableData(PREFIX."'.$tableNameForCtrl.'","","","'.$_POST["txtfield"][0].' asc");
		// $this->load->viewD("inc/header",$this->outputdata);
		$this->load->viewD("'.$viewfolder.''.$_POST["txtfilename"].'_listing_view",$this->outputdata);
	}

	//Add '.$_POST["txtfilename"].'
	function add(){
		if(isset($_POST["'.$_POST["txtid"][1].'"]) && ($_POST["'.$_POST["txtid"][1].'"] != "")){
			$insertData				=	array();';
		for($i = 0; $i < $cnt; $i++){
			if($header[$i] != ""){
		$controller .= '
				$insertData["'.$_POST["txtfield"][$i].'"]	=	$_POST["'.$_POST["txtid"][$i].'"];';
			}
		}
		
		$controller .= '	
			$insrt					=	$this->Common_model->insert(PREFIX."'.$tableNameForCtrl.'",$insertData);
			if($insrt){
				echo "<script> parent.jQuery.colorbox.close(); </script>";	
				// redirect(DASHURL."/'.$_POST["txtfilename"].'");
			}
		}
		$this->load->viewD("'.$viewfolder.''.$_POST["txtfilename"].'_add_view");
	}
	
	//update '.$_POST["txtfilename"].'
	function update($id	=0){
		$cond = array("'.$_POST["txtfield"][0].'" => $id);
		if(isset($_POST["'.$_POST["txtid"][1].'"]) && ($_POST["'.$_POST["txtid"][1].'"] != "")){
			$updateData						=	array();';
		for($i = 0; $i < $cnt; $i++){
		if($header[$i] != ""){
		$controller .= '
				$updateData["'.$_POST["txtfield"][$i].'"]	=	$_POST["'.$_POST["txtid"][$i].'"];';
			}
		}
		$controller .= '	
			$update		=	$this->Common_model->update(PREFIX."'.$tableNameForCtrl.'",$updateData,$cond);

			if($update){
				echo "<script> parent.jQuery.colorbox.close(); </script>";
				// redirect(DASHURL."/'.$_POST["txtfilename"].'");
			}
		}
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."'.$tableNameForCtrl.'","",$cond);
		// $this->load->viewD("inc/header",$this->outputdata);
		$this->load->viewD("'.$viewfolder.''.$_POST["txtfilename"].'_update_view",$this->outputdata);
	}
	
	//delete records of '.$_POST["txtfilename"].'
	function delrecord($id=0){
		$cond    = array("'.$_POST["txtfield"][0].'" => $id);
		$del_fl  = $this->Common_model->del(PREFIX."'.$tableNameForCtrl.'",$cond);
		$this->outputdata["result"]	=	"";
		if($del_fl){
			redirect(DASHURL."/'.$viewfolder.''.$_POST["txtfilename"].'");
		}  
	}
	
	//details page of '.$_POST["txtfilename"].'
	function details($id=0){
		$cond = array("'.$_POST["txtfield"][0].'" => $id);
		$this->outputdata["data"]		=	$this->Common_model->selRowData(PREFIX."'.$tableNameForCtrl.'","",$cond);
		// $this->load->viewD("inc/header",$this->outputdata);
		$this->load->viewD("'.$viewfolder.''.$_POST["txtfilename"].'_detail_view",$this->outputdata);
	}
}';
		
			$filename = ucfirst($_POST["txtfilename"]).".php";
			if(!is_dir(ABSCONTROLLER."dashboard")) {
				mkdir(ABSCONTROLLER."dashboard", 0777);
			}
			
			if (!write_file(ABSCONTROLLER."dashboard/".$filename, $controller))
				$ctrlMsg =  '<div role="alert" class="alert alert-warning">Unable to write the file</div>';
			else
				$ctrlMsg = '<div role="alert" class="alert alert-success">Controller File <strong>'.$filename.' </strong> written!</div>';
		
		}
		$this->outputdata["tables"] = $this->Common_model->getTables(DATABASENAME);
		$this->outputdata["projectTitle"] = PROJECTNAME;

		$this->outputdata["addMsg"] = $addMsg;
		$this->outputdata["editMsg"] = $editMsg;
		$this->outputdata["listMsg"] = $listMsg;
		$this->outputdata["detailMsg"] = $detailMsg;
		$this->outputdata["ctrlMsg"] = $ctrlMsg;
		
		
		$this->load->viewD('codegenerator',$this->outputdata);
	}
	
	function getfields($tablename =  ""){
		$this->outputdata["allfields"] 	= $this->Common_model->getTableFields($tablename);
		$this->outputdata["result"]		= $this->load->viewD('ajax_codegen',$this->outputdata, TRUE);
		$this->load->viewD('ajaxresult',$this->outputdata);
	}

}