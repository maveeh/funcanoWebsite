//sub function of smart sort to sort asc or desc
function SortResult(a, b){
  return ((a < b) ? -1 : ((a > b) ? 1 : 0));
}

function sortAscOrDesc(orderby){	
	//alert(orderby);
	var obj 	= new Array();
	var index 	= 0;
	var content = "";
	//get attr for sort by cost
	if(orderby == "cost_asc" || orderby == "cost_desc"){
		$(".mySelectBoxClass").not("#dd_sort_by_cost").val("");
		$('#dd_sort_by_interval').next().find(".customSelectInner").html("Arrival Time");
		$('#dd_sort_by_departure').next().find(".customSelectInner").html("Departure");
		$('#dd_sort_by_name').next().find(".customSelectInner").html("Travel Name");
		$(".result_trips").each(function(){
			obj[index] = "cost_"+$(this).attr("v3cost");
			index++;
		});
	}
	//get attr for sort by time interval
	if(orderby == "time_interval_asc" || orderby == "time_interval_desc"){
		$(".mySelectBoxClass").not("#dd_sort_by_interval").val("");
		$('#dd_sort_by_cost').next().find(".customSelectInner").html("Price");
		$('#dd_sort_by_departure').next().find(".customSelectInner").html("Departure");
		$('#dd_sort_by_name').next().find(".customSelectInner").html("Travel Name");
		$(".result_trips").each(function(){
			obj[index] = "arrival_"+$(this).attr("v3arrival");
			index++;
		});
	}
	//get attr for sort by departure time
	if(orderby == "departure_time_asc" || orderby == "departure_time_desc"){
		$(".mySelectBoxClass").not("#dd_sort_by_departure").val("");
		$('#dd_sort_by_cost').next().find(".customSelectInner").html("Price");
		$('#dd_sort_by_interval').next().find(".customSelectInner").html("Arrival Time");
		$('#dd_sort_by_name').next().find(".customSelectInner").html("Travel Name");
		$(".result_trips").each(function(){
			obj[index] = "departure_"+$(this).attr("v3departure");
			index++;
		});
	}
	//get attr for sort by travels
	if(orderby == "bus_title_asc" || orderby == "bus_title_desc"){
		$(".mySelectBoxClass").not("#dd_sort_by_name").val("");
		$('#dd_sort_by_cost').next().find(".customSelectInner").html("Price");
		$('#dd_sort_by_interval').next().find(".customSelectInner").html("Arrival Time");
		$('#dd_sort_by_departure').next().find(".customSelectInner").html("Departure");
		$(".result_trips").each(function(){
			obj[index] = "name_"+$(this).attr("v3busname");
			index++;
		});
	}

	obj.sort(SortResult);
	//sort result set
	if(orderby.indexOf("desc") >= 0){
		obj.reverse();
	}
	//collect sorted resultset
	for(index = 0; index< obj.length; index++){
		content += $("."+obj[index]).wrap('<div></div>').parent().html();
	}
	
	//show it
	$("#entries_listing").html(content);
}

/* filter result by cost */
function filter_search_result_bycost(){
	//get cost range
	if($(".to-cost span").html().length >= 4){
		var from_cost = parseInt($(".from-cost span").html(),10),
		str = $(".to-cost span").html();
		to_cost = parseInt(str.substring(str.length-3, str.length),10);
	}else{
		var from_cost = parseInt($(".from-cost span").html(),10),
		to_cost = parseInt($(".to-cost span").html(),10);
	}
	
	//filter and show result
	$(".result_trips").each(function(){
		if(parseInt($(this).attr("v3cost"),10) >= from_cost && parseInt($(this).attr("v3cost"),10) <= to_cost && $(this).is(":visible")){
			$(this).show();
		}else{
			$(this).hide();
		}
	});

	if($(".result_trips:visible").length == 0)
		$(".no_result").show();
	else
		$(".no_result").hide();
}

//filter resultset
function filter_search_result(){
	//to collect selected objects
	var obj_travel 	= ".0";
	var obj_bustype	= ".0";
	var obj_boarding= ".0";
	var obj_droping	= ".0";
	//eof objects
	
	var str			= "";
	var index		= 0;
	var checked_val	= "";
	var checked_len = $('.chk_filter:checkbox:checked').length;
	$("*.result_trips").hide();
	
	if(checked_len == 0){
		//show full result
		$("*.result_trips").show();
	}else{
		//get checked travels bus ids
		if($('.chk_travels:checkbox:checked').length > 0){
			$(".chk_travels").each(function(){
				if($(this).is(':checked'))
					obj_travel += ", .bus_id_"+$(this).val();
			});
		}
		//get checked bustype bus ids
		if($('.chk_type:checkbox:checked').length > 0){
			$(".chk_type").each(function(){
				if($(this).is(':checked')){
					checked_val = $(this).val();
					$(".result_trips").each(function(){ 
						str = $(this).attr("v3bustype");
						if (str.indexOf(checked_val) >= 0){
							obj_bustype += ", .bus_id_"+$(this).attr("id");
						}
					});
				}
			});
		}
		//get checked boarding bus ids
		if($('.chk_boarding:checkbox:checked').length > 0){
			$(".chk_boarding").each(function(){ 
				if($(this).is(':checked')){
					checked_val = $(this).val();
					$(".result_trips").each(function(){ 
						str = $(this).attr("v3boarding");
						if (str.indexOf(checked_val) >= 0){
							obj_boarding += ", .bus_id_"+$(this).attr("id");
						}
					});
				}
			});
		}
		//get checked droping bus ids
		if($('.chk_droping:checkbox:checked').length > 0){
			$(".chk_droping").each(function(){ 
				if($(this).is(':checked')){
					checked_val = $(this).val();
					$(".result_trips").each(function(){ 
						str = $(this).attr("v3droping");
						if (str.indexOf(checked_val) >= 0){
							obj_droping += ", .bus_id_"+$(this).attr("id");
						}
					});
				}
			});
		}
		/* chain fuctionality to collect final object to show */
		var obj = "";
		/*alert(obj_travel);
		alert(obj_bustype);
		alert(obj_boarding);
		alert(obj_droping);*/
		if($('.chk_travels:checkbox:checked').length > 0)
			obj = (obj_travel.length  > 2)?$(obj_travel):"";
		if($('.chk_type:checkbox:checked').length > 0){
			if(obj_bustype.length  > 2)
				obj = (obj.length  > 2)?obj.filter(obj_bustype):$(obj_bustype);
		}if($('.chk_boarding:checkbox:checked').length > 0){
			if(obj_boarding.length  > 2)
				obj = (obj.length  > 2)?obj.filter(obj_boarding):$(obj_boarding);
		}if($('.chk_droping:checkbox:checked').length > 0){
			if(obj_droping.length  > 2)
				obj = (obj.length  > 2)?obj.filter(obj_droping):$(obj_droping);
		}
		

		if(obj == "")
			$(".no_result").removeClass("display_none");
		else{
			$(".no_result").addClass("display_none");
			obj.show()
		}
	}
	filter_search_result_bycost();
}
$(document).ready(function(){
	/* show hide pick up and drop up locations*/
	$(".hover_pickup").mouseover(function() {
		$("#"+$(this).attr("v3attr")).fadeIn(300);
	});
	$(".hover_pickup").mouseout(function() {
		$("#"+$(this).attr("v3attr")).fadeOut(100);
	});
	$(".hover_droping").mouseover(function() {
		$("#"+$(this).attr("v3attr")).fadeIn(300);
	});
	$(".hover_droping").mouseout(function() {
		$("#"+$(this).attr("v3attr")).fadeOut(100);
	});
	
	/* search form show hide slipper option*/
	$("#rd_taxi").on("click",function(){
		$(".hide_for_taxi").hide();
	});
	
	$("#rd_bus").on("click",function(){
		$(".hide_for_taxi").show();
	});
	 
	/* reset search option and resultset */
	$('.reset_all').click(function () {			
		$(":checkbox").attr("checked", false);
		sortAscOrDesc('cost_asc');
		$("*.result_trips").show();
		$(".no_result").addClass("display_none");
		$("*.mySelectBoxClass").val("");
		$('#dd_sort_by_cost').next().find(".customSelectInner").html("Price");
		$('#dd_sort_by_departure').next().find(".customSelectInner").html("Departure");
		$('#dd_sort_by_name').next().find(".customSelectInner").html("Travel Name");
		$('#dd_sort_by_interval').next().find(".customSelectInner").html("Arrival Time");
	});
	
	//after click on checkboxes to filter result
	$(".chk_filter").on("click",function(){
		filter_search_result();
	});
	
	//show search form
	$("#btn_modify_search, .btn-modify-search").on("click",function(){
		$(".separator2").removeClass("display_none");
		$("#modify_search").slideDown(700);
		$("#btn_modify_search").hide();
	});

	//hide search form
	$(".hide_search").on("click",function(){
		$(".separator2").addClass("display_none");
		$("#modify_search").slideUp(700);
		$("#btn_modify_search").show();
	});
	
});