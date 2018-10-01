$(document).ready(function() {
	//validate login
	validate_login = function(){
		var txt_username 	= 	$('#txt_username').val();
		var txt_password 	= 	$('#txt_password').val();
		var errflag			=	false;
		var errstr			=	"";
		
		if(trim(txt_username) == "") {
			errflag = 	true;
			errstr	=	messages['login_username'];
		}else if(trim(txt_password) == "") {
			errflag = 	true;
			errstr	=	messages['login_password'];
		}
		if(errflag){
			$(".alert-success").fadeOut(10);
			$(".alert-error").html(errstr);
			v3fading(".alert-error");
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate email id
	function val_email(email){
		var emailval =  /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var errstr   =	"";

		if(!(trim(email).match(emailval)))
			errstr		 =	messages['validemail'];

		return errstr;
	}

	//validate password
	function val_password(password, cnfmpassword){
		var for_password	=  /^[A-Za-z0-9!@#$%^&*()_.?!:;\-\[\]"',]{6,20}$/;
		var errflag         = 	false;
		var errstr          =	"";

		if(!(trim(password).match(for_password))){
			errflag	= 	true;
			errstr  =	messages['valid_password'];
		}
		else
		if(trim(cnfmpassword) == ""){
			errflag = 	true;
			errstr	=	messages['confirm_password'];
		}
		else
		if(trim(cnfmpassword)!= trim(password)) {
			errflag = 	true;
			errstr  =	messages['match_password'];
		}
		return errstr;
	}

	//validate add user
	validate_user = function(){
		var txt_firstname 	= 	$('#txt_firstname').val();
		var txt_lastname 	= 	$('#txt_lastname').val();
		var txt_email 		= 	$('#txt_email').val();
		var txt_password 	= 	$('#txt_password').val();
		var txt_confirm 	= 	$('#txt_confirm').val();
		
		var errflag			=	false;
		var errstr			=	"";
		
		if(trim(txt_firstname) == "") {
			errflag = 	true;
			errstr	=	messages['user_first_name'];
		}else if(trim(txt_lastname) == "") {
			errflag = 	true;
			errstr	=	messages['user_last_name'];
		}else if(trim(txt_email) == ""){
			errflag = 	true;
			errstr	=	messages['user_email'];
		}else
		if(trim(txt_email) != ""){
			errstr	=	val_email(txt_email);
			if(errstr !=""){
				errflag = 	true;
			}
		}
		if(!errflag){
			if(trim(txt_password) == ""){
				errflag =   true;
				errstr	=	messages['user_password'];
			}else
			if(trim(txt_password) != "") {
				errstr	=	val_password(txt_password, txt_confirm);
				if(errstr != ""){
					errflag =   true;
				}
			}
		}
		if(errflag){
			$(".alert-success").fadeOut(10);
			$(".alert-error").html(errstr);
			v3fading(".alert-error");
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate edit user
	validate_user_update = function(){
		var txt_firstname 	= 	$('#txt_firstname').val();
		var txt_lastname 	= 	$('#txt_lastname').val();
		var txt_email 		= 	$('#txt_email').val();
		var txt_password 	= 	$('#txt_password').val();
		var txt_confirm 	= 	$('#txt_confirm').val();
		
		var errflag			=	false;
		var errstr			=	"";
		
		if(trim(txt_firstname) == "") {
			errflag = 	true;
			errstr	=	messages['user_first_name'];
		}else if(trim(txt_lastname) == "") {
			errflag = 	true;
			errstr	=	messages['user_last_name'];
		}else if(trim(txt_email) == ""){
			errflag = 	true;
			errstr	=	messages['user_email'];
		}else
		if(trim(txt_email) != ""){
			errstr	=	val_email(txt_email);
			if(errstr !=""){
				errflag = 	true;
			}
		}
		if(!errflag && trim(txt_password) != ""){
			if(trim(txt_password) != "") {
				errstr	=	val_password(txt_password, txt_confirm);
				if(errstr != ""){
					errflag =   true;
				}
			}
		}
		if(errflag){
			$(".alert-success").fadeOut(10);
			$(".alert-error").html(errstr);
			v3fading(".alert-error");
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate state
	val_bt_state = function () {
		
		var txt_state_name 		= 	$('#txt_state_name').val();
		
		var errflag     = 	false;
		var errstr      =   '';
		if(trim(txt_state_name) == '') {
			errflag = 	true;
			errstr	=	messages['state_name'];
		}
		if(errflag){
			$(".alert-success").fadeOut(10);
			$(".alert-error").html(errstr);
			v3fading(".alert-error");
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate static page
	val_bt_staticpages = function () {
		var txt_page_title 		= 	$('#txt_page_title').val();
		var errflag     = 	false;
		var errstr      =   '';
		
		if(trim(txt_page_title) == '') {
			errflag = 	true;
			errstr	=	messages['static_page_title'];
		}
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate email templates
	val_bt_email_templates = function () {
		var txt_template_title 			= 	$('#txt_template_title').val();
		var txt_template_subject 		= 	$('#txt_template_subject').val();
		var errflag     = 	false;
		var errstr      =   '';
		
		if(trim(txt_template_title) == '') {
			errflag = 	true;
			errstr	=	messages['template_title'];
		}else if(trim(txt_template_subject) == '') {
			errflag = 	true;
			errstr	=	messages['template_subject'];
		}
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//forgot access form validations
	validate_forgot_access = function(){
		var txt_emailid 	= 	$('#txt_forget_form_emailid').val();
		var errflag			=	false;
		var errstr			=	"";
		
		if(trim(txt_emailid) == ""){
			errflag = 	true;
			errstr	=	messages['user_email'];
		}else if(trim(txt_emailid) != ""){
			errstr	=	val_email(txt_emailid);
			if(errstr !=""){
				errflag = 	true;
			}
		}
		if(errflag){
			$(".alert-success").fadeOut(10);
			$(".alert-error").html(errstr);
			v3fading(".alert-error");
			return false;
		}
		else{
			return true;
		}
	}

	//validate areas
	val_bt_area = function () {
		var txt_area_name 	= 	$('#txt_area_name').val();
		var errflag     = 	false;
		var errstr      =   '';
		
		if(trim(txt_area_name) == '') {
			errflag = 	true;
			errstr	=	messages['name'];
		}
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate merchant profile updations
	val_merchant_profile = function () {
		var txt_merchant_name 	= 	$('#txt_merchant_name').val();
		var txt_address 		= 	$('#txt_address').val();
		var dd_phone_no1 		= 	$('#txt_phone1').val();
		var txt_emailid 		= 	$('#txt_emailid').val();
		var txt_password 		= 	$('#txt_password').val();
		var txt_confirm 		= 	$('#txt_confirm').val();
		var txt_description		= 	$('#txt_description').val();
		
		var errflag				=	false;
		var errstr				=	"";
		var errcontainer		=	"";
		var for_password		=  /^[A-Za-z0-9!@#$%^&*()_.?!:;\-\[\]"',]{6,20}$/;
		var phoneval			=	/^[0-9 ]*$/;
		
		if(trim(txt_merchant_name) == "") {
			errflag = 	true;
			errstr	=	messages['name'];
		}else if(trim(txt_password) != ""){
			if(!(trim(txt_password).match(for_password))){
				errflag	= 	true;
				errstr  =	messages['valid_password'];
			}else if(trim(txt_confirm) == ""){
				errflag = 	true;
				errstr	=	messages['confirm_password'];
			}else if(trim(txt_confirm)!= trim(txt_password)) {
				errflag = 	true;
				errstr  =	messages['match_password'];
			}
		}
		if(!errflag){
			if(trim(txt_description) == "") {
				errflag = 	true;
				errstr	=	messages['description'];
			}else if(trim(txt_address) == "") {
				errflag = 	true;
				errstr	=	messages['address'];
			}else if(trim(dd_phone_no1) == "") {
				errflag = 	true;
				errstr	=	messages['phone'];
			}else if(!(trim(dd_phone_no1).match(phoneval))){
				errflag = 	true;
				errstr	=	messages['validphone'];
			}
		}
		if(errflag){
			backtotop();
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate drivers
	val_bt_driver = function () {
		var txt_driver_name 	= 	$('#txt_driver_name').val();
		var txt_licence_no 		= 	$('#txt_licence_no').val();
		var txt_driver_phone1 	= 	$('#txt_driver_phone1').val();
		var dd_driver_status 	= 	$('#dd_driver_status').val();
		
		var errflag     = 	false;
		var errstr      =   '';
		var phoneval	=	/^[0-9 ]*$/;

		if(trim(txt_driver_name) == '') {
			errflag = 	true;
			errstr	=	messages['name'];
		}else if(trim(txt_licence_no) == '') {
			errflag = 	true;
			errstr	=	messages['licence'];
		}else if(trim(txt_driver_phone1) == '') {
			errflag = 	true;
			errstr	=	messages['phone'];
		}else if(!(trim(txt_driver_phone1).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validphone'];
		}
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate faq type add from
	val_faq_type = function (faq_type_id) {
		var txt_faq_type 	= 	$('#txt_faq_type').val();
		var errflag     	= 	false;
		var errstr      	=   '';

		if(trim(txt_faq_type) == '') {
			errflag = 	true;
			errstr	=	messages['faq_type'];
		}
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			if(faq_type_id > 0){
				//update faq type
				$.post( BASEURL + "dashboard/faq/ajax_update_faq_type/",{txt_faq_type:txt_faq_type,faq_type_id:faq_type_id}, function(data)
				{
					if(data > 0){
						parent.$("#faq_type_"+faq_type_id).html('<i class="icon-info-sign"></i> '+txt_faq_type);
					}
					$('.alert-error').fadeOut(10);
					$('.alert-success').html("Record updated successfuly.");
					v3fading('.alert-success');
				});
			}else{
				//add faq type
				$.post( BASEURL + "dashboard/faq/ajax_add_faq_type/",{txt_faq_type:txt_faq_type}, function(data)
				{
					if(data > 0){
						var content = '<div class="widget" id="'+data+'"><div class="widget-title"><h4 id="faq_type_'+data+'"><i class="icon-info-sign"></i> '+txt_faq_type+'</h4><span class="tools"><a href="javascript:;" class="icon-chevron-up"></a></span><span class="tools"><a href="javascript:;" class="icon-remove"></a></span><span class="tools"><a href="'+BASEURL+'dashboard/faq/update_faq_type/'+data+'" title="Update FAQ Type" class="add_iframe icon-pencil"></a></span></div><div class="widget-body display_none faq_sub_content_'+data+'"><div class="fl width100 margin-bottom10"><a href="'+BASEURL+'dashboard/faq/add_faq/'+data+'" class="fr add_faq" v3attr="'+data+'"><button class="btn btn-success"><i class="icon-plus icon-white"></i> Add FAQ</button></a></div><div class="clearfix"></div><div class="accordion" id="accordion'+data+'"></div></div></div>';

						if(parseInt(faq_type_count)%2 == 0)
							parent.$("#faq_span_1").append(content);
						else
							parent.$("#faq_span_2").append(content);
							
						faq_type_count++;
						$('.alert-error').fadeOut(10);
						$('.alert-success').html("Record added successfuly.");
						v3fading('.alert-success');
					}
				});
			}
		}
	}
	
	//validate faq question and answers
	val_bt_faq = function () {
		var txt_question 	= 	$('#txt_question').val();
		var txt_answer 		= 	$('#txt_answer').val();
		var errflag     	= 	false;
		var errstr      	=   '';

		if(trim(txt_question) == '') {
			errflag = 	true;
			errstr	=	messages['faq_question'];
		}else if(trim(txt_answer) == '') {
			errflag = 	true;
			errstr	=	messages['faq_answer'];
		}
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate add / edit buses
	val_bt_buses = function() {
		var txt_bus_title 			= 	$('#txt_bus_title').val();
		var txt_rent_rate 			= 	$('#txt_rent_rate').val();
		var txt_seating_capacity 	= 	$('#txt_seating_capacity').val();

		var errflag     = 	false;
		var errstr      =   '';
		var phoneval	=	/^[0-9 ]*$/;

		if(trim(txt_bus_title) == '') {
			errflag = 	true;
			errstr	=	messages['busnum'];
		}else if(trim(txt_seating_capacity) == '') {
			errflag = 	true;
			errstr	=	messages['capacity'];
		}else if(!(trim(txt_seating_capacity).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validcapacity'];
		} else if($("#chk_is_onrent").attr("checked")){
			if(trim(txt_rent_rate) == '') {
				errflag = 	true;
				errstr	=	messages['rentrate'];
			}else if(!(trim(txt_rent_rate).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validrate'];
		}		
		}		
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate add / edit cars
	val_bt_cars = function () {
		var txt_car_title 		= 	$('#txt_car_title').val();
		var txt_brand_name 		= 	$('#txt_brand_name').val();
		var txt_seating_capacity= 	$('#txt_seating_capacity').val();

		var errflag     = 	false;
		var errstr      =   '';
		var phoneval	=	/^[0-9]*$/;
		
		if(trim(txt_car_title) == '') {
			errflag = 	true;
			errstr	=	messages['title'];
		}else if(trim(txt_brand_name) == '') {
			errflag = 	true;
			errstr	=	messages['brandname'];
		}else if(trim(txt_seating_capacity) == '') {
			errflag = 	true;
			errstr	=	messages['capacity'];
		}else if(!(trim(txt_seating_capacity).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validcapacity'];
		}
		
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate pick up locations
	val_pickups_drops = function () {
		var txt_pickup_name 	= 	$('#txt_pickup_name').val();
		var errflag     = 	false;
		var errstr      =   '';
		
		if(trim(txt_pickup_name) == '') {
			errflag = 	true;
			errstr	=	messages['name'];
		}
		
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate add route
	val_add_route = function () {
		var dd_source 		= 	$('#dd_source').val();
		var dd_destination 	= 	$('#dd_destination').val();
		var total_distance 	= 	$('#total_distance').val();
		var total_time 		= 	$('#total_time').val();
		
		var intval		=	/^[0-9]*$/;
		var errflag     = 	false;
		var errstr      =   '';
		
		if(trim(dd_source) == '') {
			errflag = 	true;
			errstr	=	messages['source'];
		}else if(trim(dd_destination) == '') {
			errflag = 	true;
			errstr	=	messages['destination'];
		}else if(trim(total_distance) == '') {
			errflag = 	true;
			errstr	=	messages['distance'];
		}else if(!(trim(total_distance).match(intval))){
			errflag = 	true;
			errstr	=	messages['valid_distance'];
		}else if(trim(total_time) == '') {
			errflag = 	true;
			errstr	=	messages['interval'];
		}else if(!(trim(total_time).match(intval))){
			errflag = 	true;
			errstr	=	messages['valid_interval'];
		}
		
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate add/edit trips
	val_trip = function () {
		var dd_vehicle 		= 	$('#dd_vehicle').val();
		var special_date 	= 	$('#special_date').val();
		
		var intval		=	/^[0-9]*$/;
		var errflag     = 	false;
		var errstr      =   '';
		
		if(trim(dd_vehicle) == '') {
			errflag = 	true;
			errstr	=	messages['vehicle'];
		}else{
			//check for special date or wk days
			var sel_criteria = $('.trip_criteria:radio:checked').val();
			if(sel_criteria == "days"){
				var checkboxes = $(".chk_trip_days[type='checkbox']");
				if(!checkboxes.is(":checked")){
					errflag = 	true;
					errstr	=	messages['min_days'];
				}
			}else{
				if(trim(special_date) == '') {
					errflag = 	true;
					errstr	=	messages['special_date'];
				}
			}
			//check for all cost
			if(!errflag){
				$(".txt_cost").each(function(){
					if($(this).val() == ""){
						errflag = 	true;
						errstr	=	messages['cost'];
					}
				});
			}
		}
		
		if(errflag){
			$('.alert-success').fadeOut(10);
			$('.alert-error').html(errstr);
			v3fading('.alert-error');
			return false;
		}
		else{
			return true;
		}
	}
});