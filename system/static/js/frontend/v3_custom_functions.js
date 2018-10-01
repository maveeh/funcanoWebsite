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
		$(container).fadeIn().delay(1000).fadeOut(5000);
	}
	
	//show the loader image
	show_loader = function(container){
		$(container).html('<img src="'+STATICIMG+'loading.gif">');
	}
	
	restrict_duplicate_registration = function (email_id,table){
		if(email_id != ""){
			$.post( BASEURL + "registration/restrict_duplicate_registration",{email_id:email_id, table:table}, function(data)
			{
				if(data == 1){
					$("#txt_emailid_err").html("This email id is already registered").fadeIn(100);
					$("#txt_emailid").css("border","1px solid red");
					return false;
				}else{
					$("#txt_emailid_err").fadeOut(100);
					$("#txt_emailid").css("border","1px solid #ccc");
					return false;
				}
			});
		}
	}
	
	/* round step circles on registration page */
	//remove active class of round steps
	remove_roundstep_active = function(){
		$(".roundstep").each(function(){
			$(this).removeClass("active");
		});
	}
	
	//add active class of round step 1
	$("#txt_customer_name, .rd_customer, #txt_address, #dd_country_code1, #txt_phone_no1, #dd_country_code2, #txt_phone_no2,#txt_merchant_name, #txt_website").focus(function(){
		remove_roundstep_active();
		if(!$(".roundstep_1").hasClass("active"))
			$(".roundstep_1").addClass("active");
	});
	
	//add active class of round step 2
	$(".chk_services").focus(function(){
		remove_roundstep_active();
		if(!$(".roundstep_2").hasClass("active"))
			$(".roundstep_2").addClass("active");
	});

	//add active class of round step 3
	$("#txt_emailid, #txt_password, #txt_confirm").focus(function(){
		remove_roundstep_active();
		if(!$(".roundstep_3").hasClass("active"))
			$(".roundstep_3").addClass("active");
	});
	
	/* eof round circle */
});