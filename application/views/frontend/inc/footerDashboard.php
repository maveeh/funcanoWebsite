	<!-- Copyrights -->
			<div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"><div class="copyrights">©-<?php echo date("Y")." - ".PROJECTNAME; ?>. All Rights Reserved.</div></div>
                                <div class="col-md-4"></div>
				
			</div>

		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/jquery-2.2.0.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/mmenu.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/chosen.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/slick.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/rangeslider.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/magnific-popup.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/waypoints.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/counterup.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/jquery-ui.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/tooltips.min.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/custom.js"?>"></script>
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/lighweightPopup.min.js"?>"></script>


<script>
$(document).ready(function() {
        $("#askConfirm").click(function(){ ymz.jq_confirm({title:"Confirm", text:"Funcano account will be logout", no_btn:"Cancel", yes_btn:"Confirm", no_fn:function(){return false; }, yes_fn:function(){window.location = '<?php echo BASEURL."/login/logout" ?>'; }}); });
        
        $("#toast_success").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "success", sec: 3}); });
        $("#toast_error").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "error", sec: 3}); });
        $("#toast_notice").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "notice", sec: 3}); });
        $("#toast_warning").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "warning", sec: 3}); });
        
        $("#loading").click(function(){ ymz.jq_loading.show({text:"Loading", is_cover: 0}); });
        $("#loading_close").click(function(){ ymz.jq_loading.hide(); });
        
        $("#alert1").click(function(){ ymz.jq_alert({title:"Alert", text:"Upload Max 4 Photos", ok_btn:"Okey", close_fn:null}); });
        
        
        
});
</script>

<!-- Opening hours added via JS (this is only for demo purpose) -->
<script>
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script>

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="<?php echo FRONTJS."/scripts/dropzone.js"?>"></script>


</body>

<!-- Mirrored from www.vasterad.com/themes/listeo_updated/dashboard-add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 May 2018 13:01:23 GMT -->
</html>