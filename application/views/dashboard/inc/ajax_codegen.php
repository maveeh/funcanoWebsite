<table id="tbl_fields" width="100%" border="1">
	<thead>
		<tr>
			<th width="5%" align="center">No</th>
			<th width="25%" align="center">Field Type</th>
			<th width="" align="center">Field</th>
			<th width="10%" align="center">Field Header</th>
			<th width="20%" align="center">Input Type</th>
			<th width="20%" align="center">Is Compulsory</th>
			<th width="10%" align="center">Validation</th>
			<th width="10%" align="center">Id</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$cnt = 1;
		foreach($allfields as $afield) { ?>
		<tr>
			<td align="center"><?php echo $cnt;?></td>
			<td align="center"><input type="text" readonly="true" value="<?php echo $afield->Type; ?>" id="txttype" name="txttype"/></td>
			<td align="center"><input type="text" readonly="true" value="<?php echo $afield->Field; ?>" id="txtfield_<?php echo $cnt;?>" name="txtfield[]"/></td>
			<td align="center"><input type="text" value="" id="txtheader" name="txtheader[]"/></td>
			<td align="center">
				<select id="<?php echo $cnt;?>" name="dd_inputType[]" onchange="javascript: getId(this.id, this.value);">
					<option value="checkbox">Checkbox</option>
					<option value="datepicker">Datepicker</option>
					<option value="fckeditor">fckeditor</option>
					<option value="file">File Uploader</option>
					<option value="password">Password</option>
					<option value="radio">Radio</option>
					<option value="select">Select</option>
					<option value="text">Text</option>
					<option value="textarea">Text Area</option>
				</select>
			</td>
			<td align="center"><input type="radio" name="rd_compulsory_<?php echo $cnt;?>" checked="checked" id="rd_compulsory_<?php echo $cnt;?>" value="1"/>Yes
			<input type="radio" name="rd_compulsory_<?php echo $cnt;?>" id="rd_compulsory_<?php echo $cnt;?>" value="0"/>No
			</td align="center">
			<td align="center">
				<select id="dd_val" name="dd_val[]">
				<option value="0">Select Validation Type</option>
					<option value="email">Email</option>
					<option value="password">Password</option>
					<option value="int">Integer</option>
					<option value="amount">Amount</option>
				</select>
			</td>
			<td align="center"><input type="text" value="chk_<?php echo $afield->Field; ?>" id="txtid_<?php echo $cnt;?>" name="txtid[]"/></td>
			</tr>
		<?php 
		$cnt++; } ?>
	</tbody>
</table>