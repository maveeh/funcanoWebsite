<!DOCTYPE html>
<head>
<title>Funcano</title>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127035799-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127035799-1');
</script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="google-signin-client_id" content="1074998700634-j0et73k89oir98ark6g73f6kg42up6sf.apps.googleusercontent.com">

<link rel="stylesheet" href="<?php echo FRONTCSS."/css/style.css"?>">
<link rel="stylesheet" href="<?php echo FRONTCSS."/css/colors/main.css"?>" id="colors">
<link rel="stylesheet" href="<?php echo FRONTCSS."/css/svg-style.css"?>" id="colors">

<?php if (isset($flyresdata->flyerId)) {
	 ?>
	

  <meta property="og:url"           content="<?php echo BASEURL."/listing/details/".$flyresdata->flyerId; ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php  echo $flyresdata->title ; ?>" />
  <meta property="og:description"   content="<?php echo $flyresdata->description; ?>" />
  <meta property="og:image"         content="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image ; ?>" />
   <meta name="twitter:card" content=".....">
	<meta name="twitter:site" content="....">
	<meta name="twitter:creator" content=".....">
	<meta name="twitter:url" content="<?php echo BASEURL."/listing/details/".$flyresdata->flyerId; ?>" />
	<meta name="twitter:title" content="<?php  echo $flyresdata->title ; ?>">
	<meta name="twitter:description" content="<?php echo $flyresdata->description; ?>">
	<meta name="twitter:image" content="<?php  echo UPLOADPATH."/flyers/".$flyresdata->image ; ?>">
	<meta name="twitter:image:alt" content="....">



  <?php } ?>
  <style type="text/css">
#FacebookRegBtn, #FacebookLoginBtn {
  display: inline-block;
  background: #3B6CD3;
  color: #fff;
  width: 190px;
  border-radius: 5px;
  margin-bottom: 15px;
  border: 1px solid #3B6CD3;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .06);
  white-space: nowrap;
}
#FacebookRegBtn:hover , #FacebookLoginBtn:hover {
  cursor: pointer;
}
#FacebookRegBtn a, #FacebookLoginBtn a {
  display: inline-block;
  vertical-align: middle;
  padding-left: 18px;
  padding-right: 18px;
  color: #fff;
  font-size: 14px;
}
#FacebookRegBtn i, #FacebookLoginBtn i {
  display: inline-block;
  vertical-align: middle;
  color: #fff;
  padding: 12px 15px 12px 0px;
}

#GoogleLoginBtn, #GoogleBtn {
  display: inline-block;
  background: #E1473B;
  color: #fff;
  width: 190px;
  border-radius: 5px;
  margin-bottom: 15px;
  border: 1px solid #E1473B;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .06);
  white-space: nowrap;
}
#GoogleLoginBtn:hover , #GoogleBtn:hover {
  cursor: pointer;
}
#GoogleLoginBtn span.label, #GoogleBtn span.label {
  font-weight: normal;
}
#GoogleLoginBtn i, #GoogleBtn i {
  display: inline-block;
  vertical-align: middle;
  color: #fff;
  padding: 12px 15px;
}
#GoogleLoginBtn span.buttonText, #GoogleBtn span.buttonText {
  display: inline-block;
  vertical-align: middle;
  color: #fff;
  font-size: 14px;
}
meter#password-strength-meter {
    visibility: hidden;
    display: inline;
}

header#header-container {
    background-color: #f3e90b;
}

a.button.border {
    color: #222;
    border-color: #222;
}
  </style>

<!--FACEBOOK CONNECT API -->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
	 "@type": "WebPage",
	 "name": ""
	 "publisher": {
	 "@type": "CollegeOrUniversity",
		"name": ""
	 },
}
</script>
<script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
<!--<script type="text/javascript">
  FB.init({
    appId  : true,
    status : false, // check login status
    cookie : false, // enable cookies to allow the server to access the session
    xfbml  : true  // parse XFBML
  });
</script>-->
<script>
  function facebookSingUp() {
	FB.api('/me', {fields: 'id,first_name,last_name,email,picture'}, function(response) {
		
		if( response.email != "") {
			$.post("<?php echo base_url();?>/login/googleReg",
			   { firstName:response.first_name, lastName:response.last_name, email2:response.email, socialLoginId:response.id, socialConnectType: '2', profileImage: 'https://graph.facebook.com/'+response.id+'/picture?type=large' }, 
			  function(data) {
			   if(data == "Success") {
				 $('#dvsignForm').hide();
				 $('#afterSocialRegister').show();
			   } else if(data == "Failed") {
				 $('#emailExist').show();
			   }
			  });
		}
		
	});
 }

  function facebookSingIn() {
	FB.api('/me', {fields: 'email'}, function(response) {
		
		if( response.email != "") {
			$.post("<?php echo base_url();?>/login/googleSignIn",
			   { email:response.email }, 
			  function(data) {
			   if(data == "Success") {
				 window.setTimeout(function(){location.reload()},500);
			   } else if(data == "Failed") {
				 $('#loginError').show();
				 //window.stop();
			   }
			  });
		}
		
	});
 }
window.fbAsyncInit = function() {
	//SDK loaded, initialize it
	FB.init({
		appId      : '238533706805443',
		xfbml      : true,
		version    : 'v2.8'
	});
 
	//check user session and refresh it
	/*FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			//user is authorized
			document.getElementById('loginBtn').style.display = 'none';
			getUserData();
		} else {
			//user is not authorized
		}
	});*/
};
 
//load the JavaScript SDK
(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.com/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

 window.onload=function(){
//add event listener to register button
document.getElementById('FacebookRegBtn').addEventListener('click', function() {
	//do the login
	FB.login(function(response) {
		if (response.authResponse) {
			//user just authorized your app
			//document.getElementById('loginBtn').style.display = 'none';
			facebookSingUp();
		}
	}, {scope: 'email,public_profile', return_scopes: true});
}, false);

//add event listener to login button
document.getElementById('FacebookLoginBtn').addEventListener('click', function() {
	//do the login
	FB.login(function(response) {
		if (response.authResponse) {
			//user just authorized your app
			//document.getElementById('loginBtn').style.display = 'none';
			facebookSingIn();
		}
	}, {scope: 'email,public_profile', return_scopes: true});
}, false);
}
</script>
<!--GOOGLE CONNECT API-->
<script src="https://apis.google.com/js/api:client.js"></script>
<script>
 var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      // Retrieve the singleton for the GoogleAuth library and set up the client.
      auth2 = gapi.auth2.init({
        client_id: '1074998700634-j0et73k89oir98ark6g73f6kg42up6sf.apps.googleusercontent.com',
        cookiepolicy: 'single_host_origin',
        // Request scopes in addition to 'profile' and 'email'
        //scope: 'additional_scope'
      });
      attachSignUp(document.getElementById('GoogleBtn'));
      attachSignIn(document.getElementById('GoogleLoginBtn'));
    });
  };
	//Google Connect Sing in
	function attachSignIn(element) {
    auth2.attachClickHandler(element, {},
		function(googleUser) {
			profile = googleUser.getBasicProfile();    
			var profile = googleUser.getBasicProfile();
			if( profile.getId() != "") {
				$.post("<?php echo base_url();?>/login/googleSignIn",
				   { email:profile.getEmail() }, 
				  function(data) {
				   if(data == "Success") {
					 window.setTimeout(function(){location.reload()},500);
				   } else if(data == "Failed") {
					 $('#loginError').show();
					// window.stop();
				   }
				  });
			}
		});
  }
  
  function attachSignUp(element) {
    //console.log(element.id);
    auth2.attachClickHandler(element, {},
        /*function(googleUser) {
          document.getElementById('name').innerText = "Signed in: " +
              googleUser.getBasicProfile().getName();
        }, function(error) {
          alert(JSON.stringify(error, undefined, 2));
        });*/
		function(googleUser) {
			var profile = googleUser.getBasicProfile();
			if( profile.getId() != "") {
				$.post("<?php echo base_url();?>/login/googleReg",
				   { firstName:profile.getGivenName(), lastName:profile.getFamilyName(), email2:profile.getEmail(), socialLoginId:profile.getId(), socialConnectType: '1', profileImage: profile.getImageUrl() }, 
				  function(data) {
				   if(data == "Success") {
					 $('#dvsignForm').hide();
					 $('#afterSocialRegister').show();
				   } else if(data == "Failed") {
					 $('#emailExist').show();
				   }
				  });
			}
		});
  }
</script>


</head>
<body>
<div id="wrapper">

<header id="header-container">


  <div id="header">
    <div class="container">
      

      <div class="left-side">
        
   
        <div id="logo">
          <a href="<?php echo BASEURL ?>"><img src="<?php echo FRONTIMG."/images/logo.png"; ?>" alt="Funcano"></a>
        </div>

 
        <div class="mmenu-trigger">
          <button class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>


        <!-- Main Navigation -->
        <nav id="navigation" class="style-1">
          <ul id="responsive">

            <li><a <?php if (isset($page)) {
           
             if ($page == 'Home') { ?> class="current" <?php } } ?> href="<?php echo BASEURL ?>">Home</a>
             
            </li>

            <li><a <?php if (isset($page)) {
              
           if ($page == 'Flyers') { ?> class="current" <?php }  }  ?> href="<?php echo BASEURL."/listing" ; ?>">Flyers</a>
             
            </li>
   <!--  <?php $fcList= $this->Common_model->selTableData("fc_flyer_category","categoryTitle",""); ?>

          <ul>
			    <?php foreach($fcList as $list) { ?>
					<li><a href="<?php echo BASEURL."/listing/?categories=".$list->categoryTitle; ?>"><?php echo $list->categoryTitle; ?></a></li>
                <?php } ?> 
		      </ul>  -->
            <li><a <?php if (isset($page)) {
              
           if ($page == 'About') { ?> class="current" <?php }  }  ?> href="<?php echo BASEURL."/about" ; ?>">About</a>
             
            </li>
            <li><a <?php if (isset($page)) {
            
           if ($page == 'Contact') { ?> class="current" <?php }  }  ?> href="<?php echo BASEURL."/contact" ; ?>">Contact</a>
             
            </li>
            
          </ul>
        </nav>
        <div class="clearfix"></div>
        <!-- Main Navigation / End -->
        
      </div>
      <!-- Left Side Content / End -->

<?php if(! ($this->session->userdata(PREFIX.'sessUserId') > 0 )){ ?>
      <!-- Right Side Content / End -->
      <div class="right-side">
        <div class="header-widget">
          <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Sign In</a>
          <!-- <a href="<?php echo BASEURL."/listing/listing-add" ?>" class="button border with-icon">Add Listing <i class="sl sl-icon-plus"></i></a> -->
        </div>
      </div>
      <!-- Right Side Content / End -->

      <!-- Sign In Popup -->
      <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

        <div id="beforRegister" class="small-dialog-header">
          <h3>Sign In</h3>
        </div>
         <div id="registerButton" style="display:none ;" class="small-dialog-header">
          <h3>Register</h3>
        </div>
		
        <!--Tabs -->
        <div id="sign-in-form"  class="sign-in-form style-1">
			
          <ul id="ulMenu" class="tabs-nav">
            <li class=""><a href="#tab1" onclick="DisplaySignIn() ;" >Sign In</a></li>
            <li><a href="#tab2" onclick="DisplayRegister() ;" >Register</a></li>
          </ul>

          <div class="tabs-container alt">
			
            <!-- Login -->
            <div class="tab-content" id="tab1" style="display: none;">
			<div class="row">
			 <div class="col-md-6">
					<!--<div class="g-signin2" data-onsuccess="onSignIn" onclick="letsRegisterMe()" data-width="150" data-height="30" data-longtitle="true"></div>-->
					<!-- In the callback, you would hide the gSignInWrapper element on a
					  successful sign in -->
					  <div id="gSignInWrapper">
						<div id="GoogleLoginBtn" class="customGPlusSignIn">
							<i class="fa fa-google" aria-hidden="true"></i>
							<span class="buttonText">Google Sign In</span>
						</div>
					  </div>
					  <script>startApp();</script>
			 </div>
			 <div class="col-md-6">
				<div id="FacebookLoginBtn"><a style="width:150px"><i class="fa fa-facebook"></i> Facebook Sign In</a></div>
			 </div>
			 </div>
              <form method="post" id="userLogin" class="login">
                <h4><mark id="loginError" style="display: none;" >Login details are incorrect</mark></h4>
                <p class="form-row form-row-wide">
                  <label for="username">Email:
                    <i class="im im-icon-Male"></i>
                    <input type="text" class="input-text" name="username" id="username" value="" />
                  </label>
                    <mark id="userMark" style="display: none;" >Enter Valid Email</mark>
                </p>

                <p class="form-row form-row-wide">
                  <label for="password">Password:
                    <i class="im im-icon-Lock-2"></i>
                    <input class="input-text" type="password" name="password" id="password"/>
                  </label>
                  <!-- <span class="lost_password">
                    <a href="#" >Lost Your Password?</a>
                  </span> -->
                   <mark id="passMark" style="display: none;" >Enter Password</mark>
                </p>
              

                <div class="form-row">
                  <!-- <input type="button" class="button border margin-top-5" onclick="userLogin();" name="login" value="Login" /> -->

                  <button  type="button" onclick="userLogin();" name="login"  class="button border margin-top-15" value="Login" />Login</button>


                 <!--  <button type="submit" name="btnUpdateUser" onclick="postcodeValidate();" class="button margin-top-15">Update</button> -->
          
                    
                  <div class="checkboxes margin-top-10">
                    <input id="remember-me" type="checkbox" name="check">
                    <label for="remember-me">Remember Me</label>
                  </div>
                </div>
                <svg class="OrRegStar01" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 50" role="img" aria-label="Triangle"><defs><linearGradient id="e40c0ad1-dfb5-4a57-9775-f2ecf8697aa4" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#6d47d9"></stop><stop offset="100%" stop-color="#00dcaf"></stop></linearGradient></defs><path d="M50.3,17.6l-15.5-2.3l-7-14.2c-0.7-1.5-2.9-1.5-3.6,0l-7,14.2L1.7,17.6c-1.6,0.2-2.3,2.2-1.1,3.4l11.3,11L9.2,47.7	c-0.3,1.6,1.4,2.9,2.9,2.1L26,42.4l13.9,7.4c1.5,0.8,3.2-0.5,2.9-2.1L40.2,32l11.2-11C52.6,19.8,51.9,17.8,50.3,17.6z M36.6,29.9	c-0.5,0.5-0.7,1.1-0.6,1.8l2.1,12.6l-11.2-6c-0.6-0.3-1.3-0.3-1.9,0l-11.2,6L16,31.7c0.1-0.6-0.1-1.3-0.6-1.8l-9.1-9l12.6-1.8	c0.7-0.1,1.2-0.5,1.5-1.1L26,6.5L31.6,18c0.3,0.6,0.9,1,1.5,1.1L45.7,21L36.6,29.9z" fill="url(#e40c0ad1-dfb5-4a57-9775-f2ecf8697aa4)"></path></svg>
              </form>
            </div>

            <!-- Register -->
            <div class="tab-content" id="tab2" style="display: none;">
				<div id="afterSocialRegister" style="display: none;" class="notification success ">
					<p><h4>Congratulations!</h4><span>You are successfully Registered. Welcome mail has been sent to your email-id.</span></p>
				</div>
				<div id="dvsignForm">
              <form method="post" id="userRegistration"  onsubmit="return checkForm(this);" class="register">
			  <svg class="OrRegWave02" tabindex="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114 24" role="img" aria-label="Squiggle"><defs><linearGradient id="41b8dd5d-be97-4cda-9418-dc18846731f7" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" stop-color="#6d47d9"></stop><stop offset="100%" stop-color="#f93d66"></stop></linearGradient></defs><path d="M114 22c0 1.1-.9 2-2 2-3.2 0-5.8-1.3-8-3.8-1.6-1.7-2.6-3.4-4.7-7.3-3.8-6.8-5.7-9-9.2-9-3.5 0-5.5 2.1-9.2 9-2.1 3.9-3.2 5.5-4.8 7.3-2.2 2.5-4.8 3.8-8 3.8s-5.8-1.3-8-3.8c-1.6-1.7-2.6-3.4-4.8-7.3-3.8-6.8-5.7-9-9.2-9-3.5 0-5.5 2.1-9.2 9-2.1 3.9-3.2 5.5-4.8 7.3-2.2 2.5-4.8 3.8-8 3.8s-5.8-1.3-8-3.8c-1.6-1.7-2.6-3.4-4.7-7.3C7.5 6.1 5.5 4 2 4 .9 4 0 3.1 0 2s.9-2 2-2c3.2 0 5.8 1.3 8 3.8 1.6 1.7 2.6 3.4 4.7 7.3 3.8 6.9 5.7 9 9.2 9 3.5 0 5.5-2.1 9.2-9 2.2-3.9 3.2-5.5 4.8-7.3C40.2 1.3 42.8 0 46 0s5.8 1.3 8 3.8c1.6 1.7 2.6 3.4 4.8 7.3 3.8 6.9 5.7 9 9.2 9 3.5 0 5.5-2.1 9.2-9 2.2-3.9 3.2-5.5 4.8-7.3C84.2 1.3 86.8 0 90 0s5.8 1.3 8 3.8c1.6 1.7 2.6 3.4 4.8 7.3 3.8 6.9 5.7 9 9.2 9 1.1-.1 2 .8 2 1.9z" fill="url(#41b8dd5d-be97-4cda-9418-dc18846731f7)"></path></svg>
              <h4><mark id="emailExist" style="display: none;" >Email Already Exist</mark></h4>
             <div class="row">
			 <div class="col-md-6">
					<!--<div class="g-signin2" data-onsuccess="onSignIn" onclick="letsRegisterMe()" data-width="150" data-height="30" data-longtitle="true"></div>-->
					<!-- In the callback, you would hide the gSignInWrapper element on a
					  successful sign in -->
					  <div id="gSignUpWrapper">
						<div id="GoogleBtn" class="customGPlusSignIn">
							<i class="fa fa-google" aria-hidden="true"></i>
							<span class="buttonText">Google Sign Up</span>
						</div>
					  </div>
					  <script>startApp();</script>
			 </div>
			 <div class="col-md-6">
				<!--
				<div class="fb-login-button" data-width="10" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
								<fb:login-button scope="public_profile,email" id="FacebookRegBtn" onlogin="checkLoginState();">Facebook SignUp</fb:login-button>
				<fb:login-button size="large" onlogin="Log.info('onlogin callback')">Facebook SingUp</fb:login-button>-->
				<div id="FacebookRegBtn"><a class="fb-connect" style="width:150px"><i class="fa fa-facebook"></i> Facebook Sign Up</a></div>
			 </div>
			 </div> 
			 <div class="row">
			 <div class="col-md-6">
               <p class="form-row form-row-wide">
                <label for="firstName">First Name:
                  <i class="im im-icon-Male"></i>
                  <input type="text" class="input-text" name="firstName" id="firstName" value="" required/>
                 
                </label>
                 <mark id="uNameFirstMark" style="display: none;" >Enter First Name</mark>
              </p>
             </div>
             <div class="col-md-6">
             <p class="form-row form-row-wide">
                <label for="lastName">Last Name:
                  <i class="im im-icon-Male"></i>
                  <input type="text" class="input-text" name="lastName" id="lastName" value="" required/>
                 
                </label>
                 <mark id="uNameLastMark" style="display: none;" >Enter Last Name</mark>
              </p></div>
           </div>   
             
               
                
              <p class="form-row form-row-wide">
                <label for="email2">Email:
                  <i class="im im-icon-Mail"></i>
                  <input type="text" class="input-text" name="email2" id="email2" value="" required/>
                  
                </label>
                 <mark id="emailMark" style="display: none;" >Enter Valid Email</mark>
              </p>
              <?php $funcies= $this->Common_model->selTableData("fc_funcies","","");
               ?>
              <!-- <p class="form-row form-row-wide">
                <label for="email2">Funcies (Interest):
                  <i class="im im-icon-Mail"></i>
                 <select data-placeholder="Select Multiple Funcies" name="txt_keyword[]" class="chosen-select" multiple>
        <?php foreach ($funcies as $funcies) {
                   ?>
                   <option value="<?php echo $funcies->funciesName; ?>" ><?php echo $funcies->funciesName; ?></option>
                   <?php } ?> 
      </select>
                  
                </label>
                 <mark id="emailMark" style="display: none;" >Enter Valid Email</mark>
              </p> -->

              <p class="form-row form-row-wide">
                <label for="password1">Password:
                  <i class="im im-icon-Lock-2"></i>
                  <input class="input-text" type="password1" name="password1" id="password1"   require  />

                </label>
                <!-- <meter max="4" id="password-strength-meter"></meter>
                  <mark id="password-strength-text"></mark> -->
                 <mark id="passwordMark" style="display: none;"> Enter password </mark>
              </p>

              <p class="form-row form-row-wide">
                <label for="password2">Confirm Password:
                  <i class="im im-icon-Lock-2"></i>
                  <input class="input-text"  type="password" name="password2" id="password2"  required/>
                </label>
                <span class="text-danger" id="errorLbl3"></span>
                  <mark id="passwordMark2" style="display: none;" >Confirm password</mark>
                  <mark id="correctPassword" style="display: none;" >Password does not match</mark>

              </p>
			<div class="form-row">
               <input type="button" onclick="userForm();" class="button border fw margin-top-10" name="userRegister" value="Register" />  

               <!-- <button type="submit" onclick="userForm();" class="button border fw margin-top-10" name="userRegister" value="Register" />Register</button> -->

              <!-- <button type="submit" onclick="userLogin();" name="login"  class="button border margin-top-15" value="Login" />Login</button> -->

			</div>
			
              </form>
            </div>
			<div id="afterRegister" style="display: none;" class="notification success">
				<p><h4>Successful!</h4><span>Verification mail has been sent to your email-id.</span></p>
				<a class="close"></a>
			</div>
			
          </div>
        </div>
      </div>
	  
	</div>
	
	  <!-- Sign In Popup / End -->
<?php } ?>
<?php if($this->session->userdata(PREFIX.'sessUserId') > 0 ){ 
$userdata= $this->Common_model->selRowData("fc_user","","userId=".$this->session->userdata(PREFIX.'sessUserId')); ?>
 <!-- After Login /start -->
      <div class="right-side">
        <!-- Header Widget -->
        <div class="header-widget">
          
          <!-- User Menu -->
          <div class="user-menu">
            <div class="user-name"><span><img src="<?php if($userdata->profileImage != ""){ echo $userdata->profileImage; } else{
              echo UPLOADPATH."/dummy-profile.png" ;
            } ?>" alt=""></span> Hi, <?php echo $this->session->userdata(PREFIX.'sessUserName') ; ?></div>
              <ul>
              <li><a href="<?php echo BASEURL."/user/dashboard/profile" ?>"><i class="sl sl-icon-user"></i> My Profile</a></li>
               <li><a href="<?php echo BASEURL."/user/dashboard/listing/active-flyers" ?>"><i class="sl sl-icon-layers"></i> My Flyer</a></li>
               <li><a href="<?php echo BASEURL."/user/dashboard/listing/active_ticket" ?>"><i class="fa fa-ticket"></i> Ticket Booking</a></li>
               <li><a href="<?php echo BASEURL."/user/dashboard/interested-in" ?>" ><i class="sl sl-icon-badge"></i> Interested In</a></li>
             <!--  <li><a href="<?php echo BASEURL."/user/dashboard/change-password" ?>"><i class="sl sl-icon-lock"></i> Change Password</a></li> -->
              <li><a href="<?php echo BASEURL."/login/logout" ?>" onclick="javascript:return confirm('Are You Sure ! You Want To Logout.');"><i class="sl sl-icon-power"></i> Logout</a></li>
              
              </ul>
          </div>

          <a href="<?php echo BASEURL."/user/dashboard/listing/add"; ?>" class="button border with-icon">Add Flyer <i class="sl sl-icon-plus"></i></a>
        </div>
        <!-- Header Widget / End -->
      </div>
      <!-- After LOgin/End -->
      <?php } ?>
	
    </div>
	
  </div>
  <!-- Header / End -->
<!-- User Registration Using Ajax/ start -->
<script type="text/javascript">


 function userForm(){ 
	
	$('#emailMark').hide();
	$('#uNameFirstMark').hide();
	$('#passwordMark').hide();
	$('#correctPassword').hide();
	$('#emailExist').hide();
	
  var mailformat = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  var passformat = /^.*(?=.{6,15})(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%&*?]).*$/;
  //var passformat = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&*?]).*$/;
  var email = document.getElementById("email2").value;
  var firstName = document.getElementById("firstName").value;
  var password = document.getElementById("password1").value;
  var password2 = document.getElementById("password2").value;
  $('#emailMark').hide();
  if (firstName=="") { $('#uNameFirstMark').show();}
  else if(email==""){ $('#emailMark').show();}
  else if (mailformat.test(email) == false){ $('#emailMark').show();}
  else if(password==""){ $('#passwordMark').show();}
  else if(passformat.test(password) == false){ 
	$('#passwordMark').text("6-15 letters with 1 number, 1 uppercase, 1 special character from !@#$%&*?").show();
	}
  else if(password2==""){ $('#passwordMark2').show();}
  else if(password2!=password){ $('#correctPassword').show();}
 
  else{
    var userData = $("#userRegistration").serialize();
          $.post("<?php echo base_url();?>/login/registration",
          userData, 
          function(data) {
			   if(data == "Success")
			   {
				 $('#dvsignForm').hide();
				 $('#afterRegister').show();
			   } else if(data == "Failed"){
				 $('#emailExist').show();
			   }

			  }); 
          }
	}
 

   </script>

</header>