$(document).ready(function() {
	//hide errors and error containers
	hide_errors = function(){
		$(".form-control").each(function(){
			$(this).css("border","1px solid #ccc");
		});
		$(".alert-error").each(function(){
			$(this).fadeOut(100);
		});
	}
	
	//show validation and authentication errors
	show_errors = function(errcontainer,errstr){
		hide_errors();
		
		$("#"+errcontainer+"_err").html(errstr).css({"margin" : "5px 0", "display" : "inline-block"}).fadeIn(100);
		$("#"+errcontainer).css({"border":"1px solid red"});
		/*$('html, body').animate({
			scrollTop: $("#"+errcontainer).offset().top-120
		}, 500);*/
	}
	
	//validate login
	val_signin = function(){
		var txt_username 	= 	$('#txt_username').val();
		var txt_login_password 	= 	$('#txt_login_password').val();
		var errflag			=	false;
		var errstr			=	"";
		var errcontainer	=	"";
		
		if(trim(txt_username) == "") {
			errflag = 	true;
			errstr	=	messages['login_username'];
			errcontainer = "txt_username";
		}else if(trim(txt_login_password) == "") {
			errflag = 	true;
			errstr	=	messages['login_password'];
			errcontainer = "txt_login_password";
		}
		if(errflag){
			show_errors(errcontainer,errstr);
			return false;
		}
		else{
			$.post( BASEURL+"home/signin",{txt_username:txt_username,txt_login_password:txt_login_password}, function(data)
			{
				if(data == 1){
					//redirect
					hide_errors();
					window.location.reload();
					return false;
				}else if(data == 2){
					show_errors("txt_username",messages['not_verfied']);
					return false;
				}else{
					show_errors("txt_username",messages['inactive']);
					return false;
				}
			});
		}
	}
	
	//validate forgot access
	val_forgot_password = function(){
		var txt_emailid 	= 	$('#txt_emailid').val();
		var errflag			=	false;
		var errstr			=	"";
		var errcontainer	=	"";
		
		if(trim(txt_emailid) == "") {
			errflag = 	true;
			errstr	=	messages['login_username'];
			errcontainer = "txt_emailid";
		}
		if(errflag){
			show_errors(errcontainer,errstr);
			return false;
		}
		else{
			$.post( BASEURL+"home/forgot_password",{txt_emailid:txt_emailid}, function(data)
			{
				if(data == 1){
					//redirect
					hide_errors();
					//"Access details sent on your email id."	
					$(".lost_password_msg").html("Please check your mailbox.").css("color","color:#468847");
					return false;
				}else if(data == 2){
					show_errors("txt_emailid",messages['not_registered']);
					return false;
				}
			});
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
	val_merchant_registration = function(){
		var txt_merchant_name 	= 	$('#txt_merchant_name').val();
		var txt_address 		= 	$('#txt_address').val();
		var txt_phone_no1 		= 	$('#txt_phone_no1').val();
		var txt_emailid 		= 	$('#txt_emailid').val();
		var txt_password 		= 	$('#txt_password').val();
		var txt_confirm 		= 	$('#txt_confirm').val();
		
		var errflag				=	false;
		var errstr				=	"";
		var errcontainer		=	"";
		var for_password		=  /^[A-Za-z0-9!@#$%^&*()_.?!:;\-\[\]"',]{6,20}$/;
		var phoneval			=	/^[0-9]*$/;
		
		if(trim(txt_merchant_name) == "") {
			errflag = 	true;
			errstr	=	messages['name'];
			errcontainer = "txt_merchant_name";
		}else if(trim(txt_address) == "") {
			errflag = 	true;
			errstr	=	messages['address'];
			errcontainer = "txt_address";
		}else if(trim(txt_phone_no1) == "") {
			errflag = 	true;
			errstr	=	messages['phone'];
			errcontainer = "txt_phone_no1";
		}else if(!(trim(txt_phone_no1).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validphone'];
			errcontainer = "txt_phone_no1";
		}else if(trim(txt_emailid) == ""){
			errflag = 	true;
			errstr	=	messages['emailid'];
			errcontainer = "txt_emailid";
		}else
		if(trim(txt_emailid) != ""){
			errstr	=	val_email(txt_emailid);
			if(errstr !=""){
				errflag = 	true;
				errcontainer = "txt_emailid";
			}
		}
		if(!errflag){
			if(trim(txt_password) == ""){
				errflag =   true;
				errstr	=	messages['password'];
				errcontainer = "txt_password";
			}else if(!(trim(txt_password).match(for_password))){
				errflag	= 	true;
				errstr  =	messages['valid_password'];
				errcontainer = "txt_password";
			}
			else if(trim(txt_confirm) == ""){
				errflag = 	true;
				errstr	=	messages['confirm_password'];
				errcontainer = "txt_confirm";
			}
			else if(trim(txt_confirm)!= trim(txt_password)) {
				errflag = 	true;
				errstr  =	messages['match_password'];
				errcontainer = "txt_confirm";
			}
		}
		if(errflag){
			show_errors(errcontainer,errstr);
			return false;
		}
		else{
			return true;
		}
	}

	//validate add customer
	val_customer_registration = function(){
		var txt_customer_name 	= 	$('#txt_customer_name').val();
		var txt_address 		= 	$('#txt_address').val();
		var txt_phone_no1 		= 	$('#txt_phone_no1').val();
		var txt_emailid 		= 	$('#txt_emailid').val();
		var txt_password 		= 	$('#txt_password').val();
		var txt_confirm 		= 	$('#txt_confirm').val();
		
		var errflag				=	false;
		var errstr				=	"";
		var errcontainer		=	"";
		var for_password		=  /^[A-Za-z0-9!@#$%^&*()_.?!:;\-\[\]"',]{6,20}$/;
		var phoneval			=	/^[0-9]*$/;
		
		if(trim(txt_customer_name) == "") {
			errflag = 	true;
			errstr	=	messages['name'];
			errcontainer = "txt_customer_name";
		}else if(trim(txt_address) == "") {
			errflag = 	true;
			errstr	=	messages['address'];
			errcontainer = "txt_address";
		}else if(trim(txt_phone_no1) == "") {
			errflag = 	true;
			errstr	=	messages['phone'];
			errcontainer = "txt_phone_no1";
		}else if(!(trim(txt_phone_no1).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validphone'];
			errcontainer = "txt_phone_no1";
		}else if(trim(txt_emailid) == ""){
			errflag = 	true;
			errstr	=	messages['emailid'];
			errcontainer = "txt_emailid";
		}else
		if(trim(txt_emailid) != ""){
			errstr	=	val_email(txt_emailid);
			if(errstr !=""){
				errflag = 	true;
				errcontainer = "txt_emailid";
			}
		}
		if(!errflag){
			if(trim(txt_password) == ""){
				errflag =   true;
				errstr	=	messages['password'];
				errcontainer = "txt_password";
			}else if(!(trim(txt_password).match(for_password))){
				errflag	= 	true;
				errstr  =	messages['valid_password'];
				errcontainer = "txt_password";
			}
			else if(trim(txt_confirm) == ""){
				errflag = 	true;
				errstr	=	messages['confirm_password'];
				errcontainer = "txt_confirm";
			}
			else if(trim(txt_confirm)!= trim(txt_password)) {
				errflag = 	true;
				errstr  =	messages['match_password'];
				errcontainer = "txt_confirm";
			}
		}
		if(errflag){
			show_errors(errcontainer,errstr);
			return false;
		}
		else{
			return true;
		}
	}
	
	
	//validate add customer
	val_reset_password = function(){
		var txt_password 		= 	$('#txt_password').val();
		var txt_confirm 		= 	$('#txt_confirm').val();
		
		var errflag				=	false;
		var errstr				=	"";
		var errcontainer		=	"";
		var for_password		=  /^[A-Za-z0-9!@#$%^&*()_.?!:;\-\[\]"',]{6,20}$/;

		if(trim(txt_password) == ""){
			errflag =   true;
			errstr	=	messages['password'];
			errcontainer = "txt_password";
		}else if(!(trim(txt_password).match(for_password))){
			errflag	= 	true;
			errstr  =	messages['valid_password'];
			errcontainer = "txt_password";
		}else if(trim(txt_confirm) == ""){
			errflag = 	true;
			errstr	=	messages['confirm_password'];
			errcontainer = "txt_confirm";
		}else if(trim(txt_confirm)!= trim(txt_password)) {
			errflag = 	true;
			errstr  =	messages['match_password'];
			errcontainer = "txt_confirm";
		}
		if(errflag){
			hide_errors();
		
			$("#"+errcontainer+"_err").html(errstr).css({"margin" : "5px 0", "display" : "inline-block"}).fadeIn(100);
			$("#"+errcontainer).css({"border":"1px solid red"});
			return false;
		}
		else{
			return true;
		}
	}
	
	//validate home page booking search page
	$("#btn-booking-submit").on("click",function(){
		var source_city 		= 	$('#source_city').val();
		var destination_city 	= 	$('#destination_city').val();
		var journey_date 		= 	$('#datepicker5').val();
		
		var errflag				=	false;
		var errstr				=	"";
		var errcontainer		=	"";
		
		if(source_city == "") {
			errflag = 	true;
			errstr	=	messages['source_city'];
			errcontainer = "source_city";
		}else if(destination_city == "") {
			errflag = 	true;
			errstr	=	messages['destination_city'];
			errcontainer = "destination_city";
		}else if(journey_date == "") {
			errflag = 	true;
			errstr	=	messages['journey_date'];
			errcontainer = "journey_date";
		}

		if(errflag){
			hide_errors();
			$("#"+errcontainer+"_err").html(errstr).css({"margin" : "5px 0", "display" : "inline-block"}).fadeIn(100);
			$("#"+errcontainer).css({"border":"1px solid red"});
		}
		else{
			hide_errors();
			var checked_val = "";
			var c 			=	0; 
			$(".chk_bustype").each(function(){ 		
			if($(this).is(':checked')){			
				if(c==0){
					checked_val += $(this).val();
				} else {
					checked_val += ","+$(this).val();
				}
				c++;
			}
			});
			
			var vtype = ($('#rd_bus').is(':checked'))?1:2;
			
			var param = "booking/search?vtype="+vtype+"&scity="+source_city+"&dcity="+destination_city+"&date="+journey_date+"&return="+$('#datepicker4').val()+"&type="+checked_val;

			window.location = BASEURL+param;
			//$("#search-booking").submit();
		}
	});
	
	//validate home page On rent search tab
	$("#btn-onrent-submit").on("click",function(){
		var vtype = ($('#rd_onrent_bus').is(':checked'))? "bus":"car";
		if(vtype=="bus"){
			var bus_range 	= 	$('#Slider_bus').val();
			var sit_arr		=	bus_range.split(';');
			var min_sit		=	sit_arr[0];
			var max_sit		=	sit_arr[1];
		} else {
			var car_range 	= 	$('#Slider_car').val();
			var sit_arr		=	car_range.split(';');
			var min_sit		=	sit_arr[0];
			var max_sit		=	sit_arr[1];
		}
		var checked_val = 	"";
		var c 			=	0; 
		$(".chk_vehicle_type").each(function(){ 
			if($(this).is(':checked')){
				if(c==0){
					checked_val += $(this).val();
				} else {
					checked_val += ","+$(this).val();
				}
				c++;
			}
		});
		var amenities 	= 	"";
		var c 				=	0; 
		$(".chk_amenities").each(function(){ 
			if($(this).is(':checked')){
				if(c==0){
					amenities += $(this).val();
				} else {
					amenities += ","+$(this).val();
				}
				c++;
			}
		});
		
		var param = "onrent/search?vtype="+vtype+"&nsit="+min_sit+"&xsit="+max_sit+"&amen="+amenities+"&type="+checked_val;
		window.location = BASEURL+param;
	});
	
	//validate passenger info form b4 booking
	validate_passenger = function(){
		var txt_passenger1 			= 	$('#txt_passenger1').val();
		var txt_passenger1_age 		= 	$('#txt_passenger1_age').val();
		var txt_passenger_email 	= 	$('#txt_passenger_email').val();
		var txt_passenger_mobile 	= 	$('#txt_passenger_mobile').val();
		
		var errflag				=	false;
		var errstr				=	"";
		var errcontainer		=	"";
		var phoneval			=	/^[0-9]*$/;
		
		if(trim(txt_passenger1) == "") {
			errflag = 	true;
			errstr	=	messages['name'];
			errcontainer = "txt_passenger1";
		}else if(trim(txt_passenger1_age) == "") {
			errflag = 	true;
			errstr	=	messages['age'];
			errcontainer = "txt_passenger1_age";
		}else if(!(trim(txt_passenger1_age).match(phoneval))){
			errflag = 	true;
			errstr	=	messages['validage'];
			errcontainer = "txt_passenger1_age";
		}else if(trim(txt_passenger_email) == ""){
			errflag = 	true;
			errstr	=	messages['emailid'];
			errcontainer = "txt_passenger_email";
		}else if(trim(txt_passenger_email) != ""){
			errstr	=	val_email(txt_passenger_email);
			if(errstr !=""){
				errflag = 	true;
				errcontainer = "txt_passenger_email";
			}
		}
		if(!errflag){
			if(trim(txt_passenger_mobile) == "") {
				errflag = 	true;
				errstr	=	messages['mobile'];
				errcontainer = "txt_passenger_mobile";
			}else if(!(trim(txt_passenger_mobile).match(phoneval))){
				errflag = 	true;
				errstr	=	messages['validmobile'];
				errcontainer = "txt_passenger_mobile";
			}
		}
		if(errflag){
			show_errors(errcontainer,errstr);
			return false;
		}
		else{
			return true;
		}
	}
});