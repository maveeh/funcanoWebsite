$(document).ready(function() {
	if(glob == 1){
		v3fading("#dvmsg");
	}
	//load iframe
	if($(".add_iframe").length >0)
	{
		$(".add_iframe").colorbox({iframe:true, width:"800" , height:"565" , maxHeight:"700",onClosed:function(){
					ajaxlisting("menu");
			 } 
		});
	}
});

window.onload = (function(){
 //document.getElementById("succ_msg").style.display = "none";        
	try{
		$("body").delegate("table", "mouseover click", function(){
			$(".add_iframe").colorbox({iframe:true, width:"800" , height:"565" , maxHeight:"700",
				onClosed:function(){
					 ajaxlisting("menu");
					}
			});
		});
	}catch(e){}
});