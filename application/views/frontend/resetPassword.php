<?php $this->load->viewF("inc/header"); ?>

<!-- Content
================================================== -->

<!-- Titlebar
================================================== -->
<div id="titlebar">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h2>Reset Password</h2>

        <nav id="breadcrumbs">
          
        </nav>

      </div>
    </div>
  </div>
</div>


<div class="container">
        
        <!-- <form method="post"  onsubmit="javascript:userForm();" class="register"> -->

        <form method="post"  onsubmit="return userForm();" class="register"> 
      
             <?php echo $this->common_lib->showSessMsg(); ?>
            
       <div class="row">
     <div class="col-md-3"></div>

      <div class="col-md-5">
      <h5> Enter Password </h5>
      <input class="search-field" name="txt_password" id="txt_password" type="password" required/>
      <mark id="newPassMessage" style="display: none;" ></mark>
      <mark id="passwordMark" style="display: none;"></mark>
    </div>
      <div class="col-md-4"></div>

      </div>

       <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-5">
                <h5> Confirm Password </h5>
                <input class="search-field" name="txt_confirmPass" id="txt_confirmPass" type="password" required/>
                <mark id="conPassMessage" style="display: none;" ></mark>
        </div>

        <div class="col-md-4"></div>

      </div> 

      <div class="row">
       <div class="col-md-5"></div>
        <div class="col-md-3">
            <input type="submit" onclick="userForm();" class="button border fw margin-top-25" name="btnSubmit" value="Submit" />  
        </div>
          <div class="col-md-4"></div>
      </div>   
             <div class="row">
     <div class="col-md-3"></div>
     
      
              </form> 
</div>

<?php $this->load->viewF("inc/footer"); ?>

<script type="text/javascript">
 /*function userForm(){ 
  
  $('#passwordMark').hide();
  $('#correctPassword').hide();

  var passformat = /^.*(?=.{6,15})(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%&*?]).*$/;
  
  var password = document.getElementById("txt_password").value;
  var confirmPass = document.getElementById("txt_confirmPass").value;
     
    $('#passwordMark').hide();
  if(password==""){ $('#passwordMark').show();}
  else if(passformat.test(password) == false){ 
  $('#passwordMark').text("6-15 letters with 1 number, 1 uppercase, 1 special character from !@#$%&*?").show();
  }
  else if(confirmPass==""){ $('#passwordMark2').show();}
  else if(confirmPass!=password){ $('#correctPassword').show();
  } else{
    return true; 
  }
}
*/
</script>

<script type="text/javascript">
  function userForm(){ 

  var passformat  = /^.*(?=.{6,15})(?=.*\d)(?=.*[A-Z])(?=.*[@#$%&]).*$/;
  
  var password   = document.getElementById('txt_password').value;
  var confirmPass   = document.getElementById('txt_confirmPass').value;

  $('#newPassMessage').hide();
  $('#conPassMessage').hide();
  $('#passwordMark').hide();
   
  if(password==""){ $('#passwordMark').text("Enter Password").show();}
  /*else if(password != "" && passformat.test(password) == false){*/ 
  else if(passformat.test(password) == false){
    $('#newPassMessage').text("6-15 letters with 1 number, 1 uppercase, 1 special character from @#$%&").show();
    return false;
  }
  else if (password != "" && confirmPass != "" && password != confirmPass) {
  $('#conPassMessage').text("Password do not match").show();
    return false;
  } 
  
  return true;
        
        /*alert( 'please Enter Correct Password');*/ 
    }
</script>
 

   

