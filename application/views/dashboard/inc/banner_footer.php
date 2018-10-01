	<footer>
		<span>&copy; <?php echo date("Y")." - ".PROJECTNAME; ?></span>
	</footer>
</div>
	<script src="<?php echo DASHSTATIC; ?>/vendor/modernizr/modernizr.custom.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/matchMedia/matchMedia.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/jquery/dist/jquery.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/js/jquery-ui.min.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap/dist/js/bootstrap.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/jquery.easing/js/jquery.easing.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/animo.js/animo.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/screenfull/dist/screenfull.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-filestyle/src/bootstrap-filestyle.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/chosen_v1.2.0/chosen.jquery.min.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap-wysiwyg/bootstrap-wysiwyg.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/moment/min/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="<?php echo DASHSTATIC; ?>/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?php echo STATICJS; ?>/custom/jquery.prettyPhoto.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/js/app.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/js/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
	window.onload = (function(){
		 try{
			$("body").delegate(".container-fluid", "mouseover click", function(){
				$("#sortable" ).sortable();
				$(".add_iframe").colorbox({iframe:true, width:"600px" , height:"555px", maxHeight:"700",
					onClosed:function(){location.reload(true);}
				}); 
				//load image gallery
				$("#entries_listing:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false, social_tools: false});
				
			});
		}catch(e){}

		//checked all banners
		$("#select_all").change(function () {
			$("input:checkbox").prop('checked', $(this).prop("checked"));
		});
	});
	//delete banner
	function delete_banner (bannerid){
		if(confirm("Are You Sure You Want to Delete the Banner?")){
			// show_loader("#div_"+bannerid);
			$.post( DASHURL + '/banner/delrecord/'+bannerid+'/1',{}, function(data){	
				if(data){
					location.reload(true);
				}
			});
		} 	
	}
	//make banner visible/non-visible
	function banner_changestatus (bannerid){
		var statusflag = document.getElementById("hiddenstatus_"+bannerid).value;
		if(statusflag ==0){ $msg="Are You Sure You Want to Make it Invisible?"; }
		else if(statusflag ==1){ $msg="Are You Sure You Want to Make it Visible?"; }
		if(confirm($msg)){ 
			$.post( DASHURL + '/banner/changestatus/'+bannerid+'/'+statusflag,{}, function(data){	
			if(data){
				if(statusflag==0) {
					$(".banner_status_"+bannerid).attr({"title":"Show Banner"}).removeClass("btn-success").addClass("btn-warning").html('<em class="fa fa-eye-slash icon-white"></em>');
					document.getElementById("hiddenstatus_"+bannerid).value=1;
					$("#img_banner_"+bannerid).addClass("opacityness");
				}
				else if(statusflag==1){
					$(".banner_status_"+bannerid).attr({"title":"Hide Banner"}).removeClass("btn-warning").addClass("btn-success").html('<em class="fa fa-eye icon-white"></em>');
					$("#div_"+bannerid).removeClass();
					$("#div_"+bannerid).addClass("grid_box ui-state-default ");
					document.getElementById("hiddenstatus_"+bannerid).value=0;
					$("#img_banner_"+bannerid).removeClass("opacityness");
				}
			}
			});
		}
	}
 </script>
	