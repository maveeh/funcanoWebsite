<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nine Solutions Pvt. Ltd.</title>
 <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/fontawesome/css/font-awesome.min.css">
<!-- SIMPLE LINE ICONS-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/simple-line-icons/css/simple-line-icons.css">
<link href="<?php echo STATICCSS;?>/basic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo STATICCSS;?>/main.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo STATICCSS;?>/v3custom.css" rel="stylesheet" type="text/css"/>
<!-- =============== BOOTSTRAP STYLES ===============-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/bootstrap.css" id="bscss">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/app.css" id="maincss">
<script type="text/javascript" src="<?php echo STATICJS; ?>/custom/jquery1.7.1.min.js"></script>
<style>
#tbl_fields {
margin-top: 20px;
}
#tbl_fields td {
padding: 10px;
}
</style> 
</head>
<body>

	
	<div id="main-container" style="margin: 80px">
		<form id="frm_codegenerator" name="frm_codegenerator" method="post">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							Code Generator for <?php echo $projectTitle; ?>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12"> 
									<?php if($addMsg != "" ) echo $addMsg; ?>
									<?php if($editMsg != "" ) echo $editMsg; ?>
									<?php if($listMsg != "" ) echo $listMsg; ?>
									<?php if($detailMsg != "" ) echo $detailMsg; ?>
									<?php if($ctrlMsg != "" ) echo $ctrlMsg; ?>
								</div>
							</div>
							<div id="showtables">
								<div class="form-group">
									<div class="row" >
										
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>Table: </label>
											<select id="dd_table" name="dd_table" class="regiformselect form-control" onchange="javascript: getFields(this.value);" >
												<option value="0">Select Table</option>
												<?php if(isset($tables)) {
													foreach($tables as $tbl){ 
													$tblName ="Tables_in_".DATABASENAME;
													?>
													<option value="<?php echo $tbl->$tblName; ?>"><?php echo $tbl->$tblName; ?></option>
												<?php } } ?>
											</select>
										</div>
										<div class="col-md-4">
											<label>Specify Folder: </label>
											<input type="text" value="" id="txtfolder" name="txtfolder" class=" form-control"/>
										</div>
										<div class="col-md-4">
											<label>Is Popup required for add/update: </label>
												</br>
											<label class="radio-inline c-radio">
												<input id="inlineradio1" type="radio" name="isIFrame" value="1" checked>
												<span class="fa fa-circle"></span>Yes
											</label>
											<label class="radio-inline c-radio">
												<input id="inlineradio2" type="radio" name="isIFrame" value="0">
												<span class="fa fa-circle"></span>No
											</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label>File Suffix: </label>
											<input type="text" value="" id="txtfilename" name="txtfilename" required  class=" form-control"/>
										</div>
										
										<div class="col-md-4">
											<label>Menu</label>
											<input type="text" value="" id="txtMenu" name="txtMenu" class=" form-control"/>
										</div>
										<div class="col-md-4">
											<label>Sub Menu</label>
											<input type="text" value="" id="txtSubMenu" name="txtSubMenu" class=" form-control"/>
										</div>
									</div>
								</div>
							</div>
							<div id="tbl_fields"></div>
						</div>
						<div class="panel-footer text-center">
							<input type="submit" id="btnsubmit" name="btnsubmit" style="margin-top: 20px; display: none" value="Submit"/>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	
	
	
	
<script   type="text/javascript" >
	var BASEURL='<?php echo BASEURL; ?>';
	$(document).ready(function() {
		getFields = function (tablename){
			$.post( BASEURL + "/dashboard/codegenerator/getfields/"+tablename,{}, function(data)
			{
				if(data){
					$("#tbl_fields").html(data);
					$("#btnsubmit").fadeIn(1);
				}
			});
		}
		
		getId = function(id, type) {
			var field = $("#txtfield_"+id).val();
			switch(type) {
				case "text":		$("#txtid_"+id).val("txt_"+field);
				break;
				case "password":	$("#txtid_"+id).val("pass_"+field);
				break;
				case "select":		$("#txtid_"+id).val("dd_"+field);
				break;
				case "radio":		$("#txtid_"+id).val("rd_"+field);
				break;
				case "checkbox":	$("#txtid_"+id).val("chk_"+field);
				break;
				case "textarea":	$("#txtid_"+id).val("txtarea_"+field);
				break;
				case "file":		$("#txtid_"+id).val("file_"+field);
				break;
				case "datepicker":	$("#txtid_"+id).val("txt_"+field);
			}
		}
	});
</script> 
</body>
</html>
