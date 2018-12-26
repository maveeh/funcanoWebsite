 <!-- Footer
================================================== -->
<div id="footer" class="sticky-footer">
  <!-- Main -->
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <img class="footer-logo" src="<?php echo FRONTIMG."/images/logo.png"?>" alt="">
        <br><br>
        <p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
      </div>

      <div class="col-md-5 col-sm-6 ">
        <h4>Site Map</h4>
        <ul class="footer-links">
            <li><a href="<?php echo BASEURL ?>">Home</a></li>
            <li><a href="<?php echo BASEURL."/about" ?>">About</a></li>
            <li><a href="<?php echo BASEURL."/contact" ?>">Contact</a></li> 
            <li><a href="<?php echo BASEURL."/privacy"; ?>">Privacy & Policy</a></li>
           <!--  <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Cookie Policy</a></li> -->
            <li><a href="<?php echo BASEURL."/faq"; ?>">FAQ</a></li>
            <li><a href="<?php echo BASEURL."/support"; ?>">Support</a></li>
        </ul>

        <ul class="footer-links">
          <?php if(! ($this->session->userdata(PREFIX.'sessUserId') > 0 )){ ?>
          <li><a href="#sign-in-dialog" onclick="signButtonDisplay() ;" class="sign-in popup-with-zoom-anim">User Registration</a></li>
          <li><a href="#sign-in-dialog" onclick="signButtonDisplay() ;" class="sign-in popup-with-zoom-anim">User Login</a></li>
         <?php }else {
          ?>
           <li><a href="<?php echo BASEURL."/user/dashboard/profile" ?>"> My Profile</a></li>
              <li><a href="<?php echo BASEURL."/user/dashboard/change-password" ?>"> Change Password</a></li>
              <li><a href="<?php echo BASEURL."/login/logout" ?>" onclick="javascript:return confirm('Are You Sure ! You Want To Logout.');"> Logout</a></li>
          <?php 
         } ?>

          <li><a href="<?php echo BASEURL."/cookies"; ?>">Cookies & Policy</a></li>

          <li><a href="<?php echo BASEURL."/terms"; ?>">Terms & Conditions</a></li>

        
        </ul>
        <div class="clearfix"></div>
      </div>    

      <div class="col-md-3  col-sm-12">
        <h4>Contact Us</h4>
        <div class="text-widget">
          <span>12345 Little Lonsdale St, Melbourne</span> <br>
          Phone: <span>(123) 123-456 </span><br>
          E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="3c535a5a555f597c59445d514c5059125f5351">admin@funcano.local</span></a> </span><br>
        </div>

        <ul class="social-icons margin-top-20">
          <li><a class="facebook" href="https://www.facebook.com/Funcano-331523750736304/" target="_blank"><i class="icon-facebook"></i></a></li>
          <li><a class="twitter" href="https://twitter.com/FuncanoLive" target="_blank"><i class="icon-twitter"></i></a></li>
          <li><a class="gplus" href="https://plus.google.com/114056123652259636618" target="_blank"><i class="icon-gplus"></i></a></li>
         <!--  <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li> -->
        </ul>

      </div>

    </div>
    
   
 <!-- Copyright -->
    <div class="row">
      <div class="col-md-12">
        <div class="copyrights">©-<?php echo date("Y")." - ".PROJECTNAME; ?>. All Rights Reserved.
</div>
      </div>
    </div>

  </div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->
<!-- Scripts
================================================== -->

<!--<script data-cfasync="false" src="../../cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script>-->
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


<!-- Google Autocomplete -->
<script>


  function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
    });

  if ($('.main-search-input-item')[0]) {
      setTimeout(function(){ 
          $(".pac-container").prependTo("#autocomplete-container");
      }, 300);
  }
}
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&amp;libraries=places&amp;callback=initAutocomplete"></script>
-->


<!-- User Registration Using Ajax/ end -->

<!-- User login Using Ajax/ start -->
<script type="text/javascript">
 function userLogin(){

      var email = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      if (email=="") { $('#userMark').show();}
      else if(password==""){ $('#passMark').show();}

      else{
            var loginData=$("#userLogin").serialize();

     
         // $('#loading_pic').show();
         //alert(loginData) ; exit ;
          $.post("<?php echo base_url();?>/login/user-login",
          loginData, 
          function(data) 
          {
         // $('#loading_pic').hide();
           if(data == "Success")
           {
              
            //alert("failure") ;
           window.setTimeout(function(){window.location.href = '<?php echo base_url();?>';},100);
             
           
           } else{

            $('#loginError').show();
             // window.stop(); exit ;
            
           }
          });
        } 

 }
 

   </script>
   <script type="text/javascript">
         function funComparePassword(){
            var txt1 = document.getElementById("password1").value;
            var txt2 = document.getElementById("password2").value;
            if(txt1 == txt2) {
              $("#errorLbl3").html("");
              return true;  
            } else {
              $("#errorLbl3").html("Password and confirm password should be same");
              return false;      
            }
          }
   </script>
   
   <script type="text/javascript">
   function DisplayRegister(){
    $('#registerButton').show();
     $('#beforRegister').hide();

   }
    function DisplaySignIn(){
    $('#registerButton').hide();
     $('#beforRegister').show();

   }
   </script>
  <!-- <script type="text/javascript">
 function signButtonDisplay(){

   $('#tab1').show();
             $('#beforRegister').show();
             $('#afterRegister').hide();
             $('#ulMenu').show();
             $('#sign-in-form').show();

 }

   </script>-->
   
<!-- User login Using Ajax/ end -->
<!--<script type="text/javascript">
jQuery(document).ready(function(){
  var strength = {
        0: "Worst ☹",
        1: "Bad ☹",
        2: "Weak ☹",
        3: "Good ☺",
        4: "Strong ☻"
}

var password = document.getElementById('password1');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

password.addEventListener('input', function()
{
    var val = password.value;
    var result = zxcvbn(val);
    
    // Update the password strength meter
    meter.value = result.score;
   
    // Update the text indicator
    if(val !== "") {
        text.innerHTML = "Strength: " + "<strong>" + strength[result.score] + "</strong>";
       if (result.score>=3) {
          document.getElementById("password-strength-text").setAttribute("style", "color:green"); 
       }else if(result.score<=3){
          document.getElementById("password-strength-text").setAttribute("style", "color:red"); 
       };
     

    }
    else {
        text.innerHTML = "";
    }
});

});
</script>-->




<script type="text/javascript">
 chkpwd = function(validate) {
    var str = document.getElementById('password1').newPassword.value;
    if(str.length < 8)
    {
          document.getElementById('').innerHTML="Password length must be 8 char";  
    }

}
    var minNumberofChars = 6;
    var maxNumberofChars = 6;
    var regularExpression = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&? "]).*$/;

   
    if(newPassword.length < minNumberofChars || newPassword.length > maxNumberofChars){
        return false;
    }
    if(!regularExpression.test(newPassword)) {
        alert("password should contain atleast one number and one special character");
        return false;
    }
}
</script>


<!--<script type="text/javascript">

  function checkForm(form)
  {
    

    if(form.password1.value != "" && form.password1.value == form.password2.value) {
      if(form.password1.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password1.focus();
        return false;
      }
      
      re = /[0-9]/;
      if(!re.test(form.password1.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.password1.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.password1.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.password1.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.password1.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.password1.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.password1.focus();
      return false;
    }

    alert("You entered a valid password: " + form.password1.value);
    return true;
  }

</script>

<script>
$(document).ready(function(){
    $("#firstName").keyup(function(){
        $("#uNameFirstMark").css("display", "none");
    });
    
    $("#email2").keyup(function(){
        $("#emailMark").css("display", "none");
    });
});
</script>-->

<script>
$(document).ready(function() {
	$("#askConfirm").click(function(){ ymz.jq_confirm({title:"Confirm", text:"Funcano account will be logout", no_btn:"Cancel", yes_btn:"Confirm", no_fn:function(){return false; }, yes_fn:function(){window.location = '<?php echo BASEURL."/login/logout" ?>'; }}); });
	
	//$("#AddFlyerImageAlert").click(function(){ ymz.jq_alert({title:"Alert", text:"You have already uploaded 4 photos.", ok_btn:"Okey", close_fn:null}); });
	
	$("#toast_success").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "success", sec: 3}); });
	$("#toast_error").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "error", sec: 3}); });
	$("#toast_notice").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "notice", sec: 3}); });
	$("#toast_warning").click(function(){ ymz.jq_toast({text:"This is ymzbox toast text", type: "warning", sec: 3}); });
	
	$("#loading").click(function(){ ymz.jq_loading.show({text:"Loading", is_cover: 0}); });
	$("#loading_close").click(function(){ ymz.jq_loading.hide(); });
	
	$("#alert1").click(function(){ ymz.jq_alert({title:"Alert", text:"Alert Message", ok_btn:"Okey", close_fn:null}); });
	
	
	
});
</script>
</body>
</html>