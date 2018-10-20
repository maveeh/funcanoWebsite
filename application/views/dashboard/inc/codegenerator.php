<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>V3 Data Solution</title>
<script src="<?php echo STATICJS; ?>/custom/jquery-1.8.3.min.js"></script>
<style>
#tbl_fields {
margin-top: 20px;
border: none;
}
#tbl_fields td {
padding: 10px;
border: none;
}
#tbl_fields th {
padding: 10px;
border: none;
}
</style>
<script   type="text/javascript" >
	var BASEURL='<?php echo BASEURL; ?>';
	$(document).ready(function() {
		getFields = function (tablename){
			$.post( BASEURL + "dashboard/codegenerator/getfields/"+tablename,{}, function(data)
			{
				if(data){
					$("#tbl_fields").html(data);
					$("#btnsubmit").fadeIn(1);
				}
			});
		}
		
		getId = function(id, type){
			var field = $("#txtfield_"+id).val();
			switch(type){
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
</head>
<body>
	<div id="main-container" style="margin: 80px">
		<form id="frm_codegenerator" name="frm_codegenerator" method="post">
			<div id="showtables">
				<label style="width: 100px;display: inline-block;">Table: </label>
				<select id="dd_table" name="dd_table" style="width: 200px;" class="regiformselect" onchange="javascript: getFields(this.value);">
					<option value="0">Select Table</option>
					<?php if(isset($tables)) {
						foreach($tables as $tbl){ ?>
						<option value="<?php echo $tbl->Tables_in_db_busandtaxi; ?>"><?php echo $tbl->Tables_in_db_busandtaxi; ?></option>
					<?php } } ?>
				</select>
				</br>
				</br>
				<label style="width: 100px;display: inline-block;">Specify Folder: </label>
				<input type="text" style="width: 200px;"  value="" id="txtfolder" name="txtfolder"/>
				<label style="width: 100px; margin-left: 50px;display: inline-block;">File Suffix: </label>
				<input type="text" style="width: 200px;"  value="" id="txtfilename" name="txtfilename"/>
			</div>
			<div id="tbl_fields"></div>
			<input type="submit" id="btnsubmit" name="btnsubmit" style="margin-top: 20px; display: none" value="Submit"/>
		</form>
	</div>
</body>
</html>
