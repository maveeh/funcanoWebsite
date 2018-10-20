<?php $this->load->viewD('inc/header'); ?>
<?php // $this->load->viewD('inc/sidebar'); ?>
<?php $today = date("Y-m-d H:i:s"); ?>
<style>
 td.show_city {
    background: url('<?php echo DASHSTATIC; ?>/img/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.show_city {
    background: url('<?php echo DASHSTATIC; ?>/img/details_close.png') no-repeat center center;
}
 td.show_substation {
    background: url('<?php echo DASHSTATIC; ?>/img/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.show_substation {
    background: url('<?php echo DASHSTATIC; ?>/img/details_close.png') no-repeat center center;
}
</style>
<!-- =============== PAGE VENDOR STYLES =============== -->
<!-- DATATABLES-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/datatables-colvis/css/dataTables.colVis.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/datatables/media/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/dataTables.fontAwesome/index.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/colorbox.css" />
<!-- SELECT2-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/select2/dist/css/select2.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/select2-bootstrap-theme/dist/select2-bootstrap.css">
<!-- ANIMATE.CSS-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/animate.css/animate.min.css">
<!-- WHIRL (spinners)-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/whirl/dist/whirl.css">
<!-- Main section-->

<section>
<!-- Page content-->
	<div class="content-wrapper">
		<h3>
			<div class="pull-right col-sm-offset-3">
				<a href="<?php echo DASHURL."/admin/pettycash/add";?>" class="btn btn-primary btn-sm" type="button">Add Cash</a>
			</div>
			Petty Cash Listing
		   <small>Petty Cash Information</small>
		</h3>
		<div class="container-fluid">
		   <!-- START DATATABLE 1 -->

			<div class="">
				<div class="panel panel-default">
					<div class="panel-body" id="sortData" name="sortData" >
						<table id="datatable_state" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Status</th>
									<th>Action</th>	
								</tr>
							</thead>
							<tbody id ="userListing">
								<?php if(isset($alldata) && count($alldata)) { 
								$i = 1;
								foreach($alldata as $row) {	
								?>
								<tr class="gradeX">
									<td class="<?php if($tablename == "state") echo "show_city"; ?>" name="<?php echo $row->id; ?>" ><?php echo $i; ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->status; ?></td>
									
									<td>
									<div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-default">Action <b class="caret"></b>
										</button>
										<ul role="menu" class="dropdown-menu animated fadeIn">
										   <li><a href="#">Edit</a>
										   </li>
											<li><a href="#" class="cashView" >Cash Details</a>
											</li>
										</ul>
									 </div>
									</td> 						
								</tr>
						 <?php $i++; } }  ?>
							</tbody>
							<tfoot>
								 <tr>
									<th>
								   <input type="text" name="filter_Id" placeholder="Id" class="form-control input-sm datatable_input_col_search">
								</th>
								<th>   
									<input type="text" name="filter_amount" placeholder="amount" class="form-control input-sm datatable_input_col_search">
								</th>
								<th>   
									<input type="text" name="filter_receivedBy" placeholder="receivedBy" class="form-control input-sm datatable_input_col_search">
								</th>
								<th>                        
								</th>
								 </tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
 
</section>
<footer>
	<span>&copy; <?php echo date("Y")." - ".PROJECTNAME; ?></span>
</footer>
</div>
<script src="<?php echo DASHSTATIC; ?>/vendor/modernizr/modernizr.custom.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/matchMedia/matchMedia.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/jquery/dist/jquery.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>

<script src="<?php echo DASHSTATIC; ?>/vendor/jquery.easing/js/jquery.easing.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/animo.js/animo.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/screenfull/dist/screenfull.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/jquery-localize-i18n/dist/jquery.localize.js"></script>
<script src="<?php echo DASHSTATIC; ?>/js/demo/demo-rtl.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-filestyle/src/bootstrap-filestyle.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/chosen_v1.2.0/chosen.jquery.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-wysiwyg/bootstrap-wysiwyg.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-wysiwyg/external/jquery.hotkeys.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/moment/min/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo DASHSTATIC; ?>/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/js/demo/demo-forms.js"></script>
<script src="<?php echo DASHSTATIC; ?>/js/app.js"></script>	
<script src="<?php echo DASHSTATIC; ?>/js/colorbox/jquery.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/datatables/media/js/dataTables.bootstrap.js"></script>
<!--<script src="<?php echo DASHSTATIC; ?>/js/demo/demo-datatable.js"></script>
-->
<script src="<?php echo DASHSTATIC; ?>/js/colorbox/jquery.colorbox.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/select2/dist/js/select2.js"></script>
<script src="<?php echo DASHSTATIC; ?>/js/waitforimages.js"></script>

<script type="text/javascript">
var global_area_id = 0;
$(document).ready(function() {
	
try{
	$("body").delegate(".container-fluid", "mouseover click", function(){
		 $(".add_state").colorbox({iframe:true, width:"800px" , height:"555px", maxHeight:"700",
			onClosed:function(){
				 ajaxlisting_areas("<?php echo $tablename; ?>");
				}
		});
		$(".add_city").colorbox({iframe:true, width:"800px" , height:"555px", maxHeight:"700",
			onClosed:function(){
				ajax_load_areas("city","state",global_area_id);
			}
		});
		$(".add_substation").colorbox({iframe:true, width:"800px" , height:"555px", maxHeight:"700",
			onClosed:function(){
				 ajax_load_areas("substation","city",global_area_id);
				}
		});
		$(".add_pickups").colorbox({iframe:true, width:"1000" , height:"800", maxHeight:"800",
			onClosed:function(){}
		}); 
	});
} catch(e){}
 var table = $('#datatable_<?php echo $tablename; ?>').DataTable({
	"bJQueryUI": true,
	"bProcessing": true,
	'paging':   true,  // Table pagination
	'ordering': true,  // Column ordering 
	'info':     true,  
	//"scrollX": true, 
	oLanguage: {
		sSearch:      'Search:',
		sLengthMenu:  '_MENU_ records per page',
		info:         'Showing page _PAGE_ of _PAGES_',
		zeroRecords:  'Nothing found - sorry',
		infoEmpty:    'No records available',
		infoFiltered: '(filtered from _MAX_ total records)'
	}
});
  
var inputSearchClass = 'datatable_input_col_search';
var columnInputs = $('tfoot .'+inputSearchClass);
columnInputs
	.keyup(function () {
		table.fnFilter(this.value, columnInputs.index(this));
});
		

jQuery('#<?php echo $tablename; ?>_list_wrapper select').addClass("input-mini");

<?php if($tablename == "state") { ?>
	/* show or hide cities on click of state */
	$('#datatable_<?php echo $tablename; ?>').on('click','td.show_city',function(){
		var _this = $(this);
		var state_id = $(this).attr("name");
		global_area_id = state_id;
		var tr = $(this).closest('tr');
		var row = table.row(tr);
		if (row.child.isShown()) {
			row.child.hide();
			tr.removeClass('shown');
		} else {
			if(tr.hasClass('shown')) {
				if(!$('#city_of_'+state_id).hasClass('hide')) {
					$('#city_of_'+state_id).addClass('hide');
					tr.removeClass('shown');
				} else {
					$('#city_of_'+state_id).removeClass('hide');
				}
				
			} else {
				tr.addClass('shown');
				$('#city_of_'+state_id).removeClass('hide');
				ajax_load_areas("city","state",state_id,_this);
			}
		} 
	}); 
		var currentRequest = null;
		//load cities using ajax
		ajax_load_areas = function (tablename,parent_name,parent_id,_this) {
			if($("#"+tablename+"_of_"+parent_id).length > 0) {
				show_loader($("#"+tablename+"_of_"+parent_id+" .nested_"+tablename+"_bg"));
			}
			currentRequest = jQuery.ajax({
				type: 'POST',
				url: BASEURL + "/dashboard/areas/ajaxlisting/"+tablename+"/"+parent_id,
				beforeSend : function()    {           
					if(currentRequest != null) {
						currentRequest.abort();
					}
				},
				success: function(data) {
					// alert(data);
					/* listing to table */
					if($("#"+tablename+"_of_"+parent_id).length > 0){
						$("#"+tablename+"_of_"+parent_id+" .nested_"+tablename+"_bg").html(data);
					} else {
						data = "<tr id='"+tablename+"_of_"+parent_id+"' class='all_"+tablename+"_list'><td colspan='4'  class='nested_"+tablename+"_bg'>"+ data +"</td></tr>";
						/*$( "#"+parent_name+"_"+parent_id ).waitForImages(function() {
						*/	
						$(_this).parent().after(data);
						//});
					}
						
					/* apply datatables */
					$('#'+tablename+'_of_parent_'+parent_id).dataTable({
						"bJQueryUI": true,
							"bProcessing": true,
							'paging':   true,  // Table pagination
							'ordering': true,  // Column ordering 
							'info':     true,  
							"oLanguage": {
								"sSearch":      'Search:',
								"sLengthMenu":  '_MENU_ records per page',
								"info":         'Showing page _PAGE_ of _PAGES_',
								"zeroRecords":  'Nothing found - sorry',
								"infoEmpty":    'No records available',
								"infoFiltered": '(filtered from _MAX_ total records)'
							},
					});
					/* slide down the list */
					$(".show_"+tablename+"_table").stop( true, true ).slideDown(4000);
					$('#'+tablename+'_of_parent_'+parent_id+'_wrapper select').addClass("input-mini");
					
					/* change add city/substation buttons */
					$("*.addnew_"+tablename).remove();
					var ucfirst_table = tablename.charAt(0).toUpperCase() + tablename.slice(1);
			
					$('<a href="'+BASEURL+'/dashboard/areas/add/'+tablename+'/'+parent_id+'" class="margin-left10 add_'+tablename+' addnew_'+tablename+'"><button class="btn btn-warning"><i class="icon-plus icon-white"></i> Add '+ucfirst_table+'</button></a>').appendTo('.nested_'+tablename+'_bg .dataTables_filter');
				}
			});
		}

		//show or hide substation on click of city
		$("body").stop( true, true ).on("click", ".show_substation", function(){
			var _this = $(this);
			// var state_id = $(this).attr("name");
			var city_id = $(this).attr("name");
			// show_loader($("#"+tablename+"_of_"+parent_id+" .nested_"+tablename+"_bg"));
			
			var tr = $(this).closest('tr');
			var row = table.row(tr);
			if (row.child.isShown()) {
				alert('if');
				row.child.hide();
				tr.removeClass('shown');
			} else {
				if(tr.hasClass('shown')) {
					if(!$('#sub_area_of_'+city_id).hasClass('hide')) {
						$('#sub_area_of_'+city_id).addClass('hide');
						tr.removeClass('shown');
					} else {
						$('#sub_area_of_'+city_id).removeClass('hide');
					}
				} else {
					tr.addClass('shown');
					$('#sub_area_of_'+city_id).removeClass('hide');
					ajax_load_areas("sub_area","city",city_id,_this);
				}
			} 
		});
<?php } ?>
});
</script>
</body>

</html>