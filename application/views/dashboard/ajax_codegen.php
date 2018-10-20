

<table id="tbl_fields" width="100%" border="1" class="table table-responsive table-bordered">
	<thead>
		<tr>
			<th align="center">No</th>
			<th align="center">Field Type</th>
			<th  align="center">Field</th>
			<th align="center">Field Header</th>
			<th  align="center">Input Type</th>
			<th align="center">Is Compulsory</th>
			<th  align="center">Validation</th>
			<th align="center">Id</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$cnt = 1;
		foreach($allfields as $afield) { ?>
		<tr>
			<td align="center">
				<?php echo $cnt;?>
			</td>
			<td align="center">
				<input type="text" readonly="true" value="<?php echo $afield->Type; ?>" id="txttype" name="txttype" class="form-control"/>
			</td>
			<td align="center">
				<input type="text" readonly="true" value="<?php echo $afield->Field; ?>" id="txtfield_<?php echo $cnt;?>" name="txtfield[]"  class="form-control"/>
			</td>
			<td align="center">
				<input type="text" value="" id="txtheader" name="txtheader[]"  class="form-control"/>
			</td>
			<td align="center">
				<select id="<?php echo $cnt;?>" name="dd_inputType[]" onchange="javascript: getId(this.id, this.value);"  class="form-control">
					<option value="checkbox">Checkbox</option>
					<option value="datepicker">Datepicker</option>
					<option value="editor">Wysiwyg editor</option>
					<option value="file">File Uploader</option>
					<option value="password">Password</option>
					<option value="radio">Radio</option>
					<option value="select">Select</option>
					<option value="text">Text</option>
					<option value="textarea">Text Area</option>
				</select>
			</td>
			<td align="center">
				<input type="radio" name="rd_compulsory_<?php echo $cnt;?>" checked="checked" id="rd_compulsory_<?php echo $cnt;?>" value="1" />Yes
				<input type="radio" name="rd_compulsory_<?php echo $cnt;?>" id="rd_compulsory_<?php echo $cnt;?>" value="0"/>No
			</td>
			<td align="center">
				<select id="dd_val" name="dd_val[]"  class="form-control">
					<option value="0">Select Validation Type</option>
					<option value="email">Email</option>
					<option value="password">Password</option>
					<option value="int">Integer</option>
					<option value="amount">Amount</option>
				</select>
			</td>
			<td align="center">
				<input type="text" value="chk_<?php echo $afield->Field; ?>" id="txtid_<?php echo $cnt;?>" name="txtid[]"  class="form-control" />
			</td>
		</tr>
		<?php 
		$cnt++; } ?>
	</tbody>
</table>