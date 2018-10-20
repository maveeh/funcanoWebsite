<?php $this->load->viewD('inc/header'); ?>
<!-- FONT AWESOME-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/weather-icons/css/weather-icons.min.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/bootstrap.css" id="bscss">
   
   <!-- =============== APP STYLES ===============-->
   <?php if(DOMAINNAME =='pathey' || DOMAINNAME =='parth')	{	} else { ?>
	<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,400italic" rel="stylesheet" type="text/css">
	<?php } ?>
	
	<!-- DATETIMEPICKER-->
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/datatables-colvis/css/dataTables.colVis.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/datatables/media/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/dataTables.fontAwesome/index.css">
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/colorbox.css" />

   
   
   
<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/app.css" id="maincss">
<link href="<?php echo STATICCSS; ?>/custom/style.css" rel="stylesheet" />
<link href="<?php echo STATICCSS; ?>/custom/style_responsive.css" rel="stylesheet" />
<link href="<?php echo STATICCSS; ?>/custom/style_default.css" rel="stylesheet" id="style_color" />

  <!-- Main section-->
	<section>
        <!-- Page content-->
        <div class="content-wrapper">
            <h3>
				<div class="pull-right col-sm-offset-3">
					<a href="<?php echo DASHURL."/areas/add/state/";?>" class="btn btn-info btn-sm add_state" type="button">Add State</a>
				</div>
				State Listing
               <small>State Information</small>
            </h3>
			<div class="row"> 
				<div class="col-md-12"> 
				</div>
			</div>
            <div class="container-fluid">
               <!-- START DATATABLE 1 -->
				<div class="panel panel-default">
					<div class="panel-body" id="sortData" name="sortData" >
						<table class="table table_menus table-striped table-bordered" id="state_list">
							<thead>
								<tr>
								<th class="centerall" width="5%">No</th>
								<th class="centerall" width=""><?php echo ucfirst($tablename); ?> Name</th>
								<th class="centerall" width="15%">Status</th>
								<th class="centerall" width="15%">Action</th>
								
							</thead>
							<tbody>
								<?php $no=1;
								if(isset($alldata) && is_array($alldata)){
								foreach($alldata as $row){?>
									<tr class="odd gradeX">
										<td class="centerall <?php if($tablename == "state") echo "show_city"; ?>" id="state_<?php echo $row->id; ?>" v3attr="<?php echo $row->id; ?>"><?php echo $no; ?><img class="expand_table rotate_180" src="<?php echo STATICIMG."/upArrow.png"; ?>"></td>
										<td class=""><?php echo $row->name; ?></td>
										<td class="centerall"><?php if($row->status == 1) echo "Active"; else echo "Inactive"; ?></td>
										
											<td class="centerall">
												<a href="<?php echo BASEURL.'dashboard/areas/update/'.$tablename.'/'.$row->id;?>" class="edit add_state">
												<button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button>
												</a>
												<a href="javascript: delete_area(<?php echo $row->id; ?>,'<?php echo $tablename; ?>');" class="deleterec" >
												<button class="btn btn-danger"><i class="icon-trash icon-white"></i></button>
												</a>
											</td>
										
									</tr>
							<?php $no++; } } ?>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
		</div>
	</section>
		<?php $this->load->viewD('inc/footer'); ?>
		
		<?php $this->load->viewD('inc/listing_footer'); ?>


<script type="text/javascript">
var global_area_id = 0;
window.onload = (function(){
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
	$('#<?php echo $tablename; ?>_list').dataTable({
		"bJQueryUI": true,
			"bProcessing": true,
	        'paging':   true,  // Table pagination
	        'ordering': true,  // Column ordering 
	        'info':     true,  
	        oLanguage: {
	            sSearch:      'Search:',
	            sLengthMenu:  '_MENU_ records per page',
	            info:         'Showing page _PAGE_ of _PAGES_',
	            zeroRecords:  'Nothing found - sorry',
	            infoEmpty:    'No records available',
	            infoFiltered: '(filtered from _MAX_ total records)'
	        },
	});
	jQuery('#<?php echo $tablename; ?>_list_wrapper select').addClass("input-mini");

	<?php if($tablename == "state"){ ?>
		
		/* show or hide cities on click of state */
		$("body").stop( true, true ).on("click", ".show_city", function(){
			var state_id = $(this).attr("v3attr");
			global_area_id = state_id;
			$("*.expand_table").addClass("rotate_180");

			if($("#city_of_"+state_id).length > 0){
				/* remove current open city listing */
				$(".show_city_table").stop( true, true ).slideUp(4000, function(){$(this).parent().parent().remove();});
			}else{
				/* remove current open city listing and open clicked one */
				$("*.show_city_table").stop( true, true ).slideUp(4000, function(){$(this).parent().parent().remove();});
				$(this).find(".expand_table").removeClass("rotate_180");
				ajax_load_areas("city","state",state_id);
			}
			
		});
		
		var currentRequest = null;
		//load cities using ajax
		ajax_load_areas = function (tablename,parent_name,parent_id){
			if($("#"+tablename+"_of_"+parent_id).length > 0){
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
					}else{
						data = "<tr id='"+tablename+"_of_"+parent_id+"' class='all_"+tablename+"_list'><td colspan='4'  class='nested_"+tablename+"_bg'>"+ data +"</td><tr>";
						$( "#"+parent_name+"_"+parent_id ).waitForImages(function() {
							$(this).parent().after(data);
						});
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
			var city_id = $(this).attr("v3attr");
			$("*.expand_city_table").addClass("rotate_180");
			
			if($("#substation_of_"+city_id).length > 0){
				/* remove current open substation listing */
				$(".show_substation_table").stop( true, true ).slideUp(400, function(){$(this).parent().parent().remove();});
			}else{
				/* remove current open substation listing and open clicked one */
				$("*.show_substation_table").stop( true, true ).slideUp(400, function(){$(this).parent().parent().remove();});
				$(this).find(".expand_city_table").removeClass("rotate_180");
				global_area_id = city_id;
				ajax_load_areas("substation","city",city_id);
			}
		});
	<?php } ?>
});
</script>