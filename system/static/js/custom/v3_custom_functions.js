//scroll page to top
function backtotop(){
	$(document).ready(function() {
		$("html, body").animate({
			scrollTop: "0px"
			},
			{
			duration: 600,
			easing: "swing"
		});
		return true;
	});
}

//trim string
function trim(a) {
   return a = a.replace(/^\s*|\s*$/,"");
}

$(document).ready(function() {
	//Generic function for fadeIn/fadeout content
	v3fading = function (container){
		$(container).fadeIn().delay(1000).fadeOut(2000);
	}
	
	//show the loader image
	show_loader = function(container){
		$(container).html('<img src="'+STATICIMG+'loading.gif">');
	}

	//loading listing using ajax
	ajaxlisting = function(controller){
		show_loader("#entries_listing");
		$.post( BASEURL + "dashboard/" + controller + "/ajaxlisting",{}, function(data)
		{
			if(data){
				parent.document.getElementById("entries_listing").innerHTML=data;
				$('#sample_1').dataTable({
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page",
						"oPaginate": {
							"sPrevious": "Prev",
							"sNext": "Next"
						}
					},
					"aoColumnDefs": [{
						'bSortable': false,
						'aTargets': [0]
					}]
				});
				jQuery('#sample_1_wrapper select').addClass("input-mini");
			}
		});
	}
	
	//loading listing using ajax
	ajaxlisting_pickups = function(category,parent_id){
		show_loader("#pickup_listing");
		$.post( BASEURL + "dashboard/pickup/ajaxlisting/"+category+"/"+parent_id,{}, function(data)
		{
			if(data){
				$("#pickup_listing").html(data);
				$('#sample_1').dataTable({
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page",
						"oPaginate": {
							"sPrevious": "Prev",
							"sNext": "Next"
						}
					},
					"aoColumnDefs": [{
						'bSortable': false,
						'aTargets': [0]
					}]
				});
				jQuery('#sample_1_wrapper select').addClass("input-mini");
			}
		});
	}
	
	//delete records
	delete_pickups = function(delete_id,category,parent_id){
		if(confirm('You are trying to delete a record, are you sure?')){
			show_loader("#entries_listing");
			$.post( BASEURL + "dashboard/areas/delrecord/pickups_drops/"+delete_id,{}, function(data)
			{
				if(data){
					$(".alert-success").html("Record deleted successfully.");
					v3fading(".alert-success");
					ajaxlisting_pickups(category,parent_id);
				}
			});
		}
	}
	
	//loading listing using ajax
	ajaxlisting_areas = function(tablename){
		show_loader("#entries_listing");
		$.post( BASEURL + "dashboard/areas/ajaxlisting/"+tablename,{}, function(data)
		{
			if(data){
				parent.document.getElementById("entries_listing").innerHTML=data;
				$('#'+tablename+'_list').dataTable({
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page",
						"oPaginate": {
							"sPrevious": "Prev",
							"sNext": "Next"
						}
					},
					"aoColumnDefs": [{
						'bSortable': false,
						'aTargets': [0]
					}]
				});
				jQuery('#'+tablename+'_list_wrapper select').addClass("input-mini");
			}
		});
	}

	
	//delete records
	delete_record = function(delete_id,tablename){
		if(confirm('You are trying to delete a record, are you sure?')){
			show_loader("#entries_listing");
			$.post( BASEURL + "dashboard/areas/delrecord/"+tablename+"/"+delete_id,{}, function(data)
			{
				if(data){
					$(".alert-success").html("Record deleted successfully.");
					v3fading(".alert-success");
					alert(tablename);
					if(tablename == "brand" || tablename == "route") 
						location.reload();
					else
						ajaxlisting(tablename);
				}
			});
		}
	}
	
	//delete areas
	delete_area = function(delete_id,tablename){
		if(confirm('You are trying to delete a record, are you sure?')){
			$.post( BASEURL + "dashboard/areas/delrecord/"+tablename+"/"+delete_id,{}, function(data)
			{
				if(data){
					$(".alert-success").html("Record deleted successfully.");
					v3fading(".alert-success");
					if(tablename == "city")
						ajax_load_areas("city","state",global_area_id);
					else if(tablename == "substation")
						ajax_load_areas("substation","city",global_area_id);
					else
						ajaxlisting_areas("state");
				}
			});
		}
	}
	
	//reload iframe with selected menu
	$(".iframe_loader").click(function(){
		var url = $(this).attr("v3attr");
		$("#content_iframe").attr('src',url); 
		return false;
	});
	
	//loading listing using ajax
	ajaxlisting_photo = function(bus_id){
		show_loader("#entries_listing");
		$.post( BASEURL + "dashboard/bus/ajaxlisting_photo/"+bus_id,{}, function(data)
		{
			if(data){
				parent.document.getElementById("entries_listing").innerHTML=data;
				$('#sample_1').dataTable({
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page",
						"oPaginate": {
							"sPrevious": "Prev",
							"sNext": "Next"
						}
					},
					"aoColumnDefs": [{
						'bSortable': false,
						'aTargets': [0]
					}]
				});
				jQuery('#sample_1_wrapper select').addClass("input-mini");
			}
		});
	}
	
	//loading listing using ajax
	ajaxlisting_carphoto = function(car_id){
		show_loader("#entries_listing");
		$.post( BASEURL + "dashboard/car/ajaxlisting_photo/"+car_id,{}, function(data)
		{
			if(data){
				parent.document.getElementById("entries_listing").innerHTML=data;
				$('#sample_1').dataTable({
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page",
						"oPaginate": {
							"sPrevious": "Prev",
							"sNext": "Next"
						}
					},
					"aoColumnDefs": [{
						'bSortable': false,
						'aTargets': [0]
					}]
				});
				jQuery('#sample_1_wrapper select').addClass("input-mini");
			}
		});
	}
	
	//checked all banners
	CheckAll = function (){
		if ($("#select_all").attr("checked"))
			$("*.chk_banner").attr('checked', true);			
		else
			$("*.chk_banner").attr('checked', false);
	}
	
	//load substations to select box
	load_substions = function(){
		var content 		= '<option value="">Select Sub-Station</option>';
		var substation_name = "";
		var opt_sub_city	= "";
		var type			= "";
		var all_substations = getsubstations.substations;
		for(var i = 0; i < all_substations.length; i++){
			substation_name = all_substations[i]["city_name"];
			
			if(all_substations[i]["type"] == "S"){
				opt_sub_city="opt_sub_city";
				type = "substation";
			}else{
				opt_sub_city="";
				type = "city";
			}

			content += '<option value="'+substation_name+'" class="'+opt_sub_city+'" v3type="'+type+'">'+substation_name+'</option>';
		}
		$(".substations").waitForImages(function() {
			if($(this).val() == "" || $(this).val() == null){
				$(this).html(content);
			}
		});
	}
	
	//this just load an extra div to add sub station and is drop points
	$(".btn-addsubstation").on("click",function(){
		loaded_substations++;
		$("#total_substations").val(loaded_substations);
		$.post( BASEURL + "dashboard/routes/load_substation_view/",{ss_count:loaded_substations}, function(data)
		{
			if(data){
				$(".dv_destination").before(data);
				load_substions();
			}
		});
	});
	
	/*
		get all pickup / dropup points
		
		PARAMS
		parent_name		-	selected city/substation
		parent_table	-	table name for which pick/drop points to be select
		point_elem_id	-	checkbox id
	*/
	get_pick_drop_point = function(parent_name,parent_table,point_elem_id,sub_station_no){

		show_loader("#dd_"+point_elem_id);
		if(parent_name == ""){
			if(point_elem_id == "pickpoints")
				$("#dd_"+point_elem_id).html("Please select source City");
			else if(point_elem_id == "dropPoints")
				$("#dd_"+point_elem_id).html("Please select destination City");
			else{
				$("#dd_"+point_elem_id).html("Please select Sub-Station");
			}
		}else{
			if(typeof(sub_station_no) != "undefined")
				parent_table = $("#dd_substation_"+sub_station_no).find('option:selected').attr("v3type");
			
			//get pickup / dropup points
			$.post( BASEURL + "dashboard/routes/get_pick_drop_point/",{parent_name:parent_name,parent_table:parent_table,point_elem_id:point_elem_id}, function(data)
			{
				if(data != ""){
					if(typeof(sub_station_no) != "undefined")
						$("#dd_sub_pickpoints_"+sub_station_no).html(data);
					else
						$("#dd_"+point_elem_id).html(data);
					if (test = $("input[type=checkbox]:not(.toggle), input[type=radio]:not(.toggle)")) {
						test.uniform();
					}
				}else{
					if(typeof(sub_station_no) != "undefined")
						$("#dd_sub_pickpoints_"+sub_station_no).html("Please add pickup / dropup points");
					else
						$("#dd_"+point_elem_id).html("Please add pickup / dropup points");
				}
			});
		}
	}
	
	// remove sub station
	$('.widget .tools .icon-remove').live("click",function () {
		$(this).closest(".dv_routes").remove();
	});
	
	//on add trip page change trip criteria
	$(".trip_criteria").on("click",function(){
		$("*.add_criteria").hide();
		$("."+$(this).val()).show();
	});
});