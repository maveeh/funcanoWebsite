<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <title>Funcano - Dashboard login</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/bootstrap.css" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/app.css" id="maincss">
</head>
<style>
body, html {
background-color: #fff;


background-image: linear-gradient(to left bottom, #d10000, #d40036, #c50062, #9c008e, #4600b3);
}
.panel-dark > .panel-heading {
   
    background-color: #3a3434;
   
}
</style>

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-flat">
            <div class="bg-gray-dark text-center">
               <a href="#">
                  <img src="<?php echo FRONTIMG."/images/logo.png"?>" width="155px" alt="Image" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">SIGN IN TO CONTINUE.</p>
				<div class="form-group">
					<?php echo $this->common_lib->showSessMsg(); ?>
				</div>
               <form role="form" data-parsley-validate="" method="post" novalidate="" class="mb-lg">
                  <div class="form-group has-feedback">
                     <input name="txtEmailId" id="txtEmailId" value="<?php echo (isset($_COOKIE['cookieNetrax'.$role])) ? $_COOKIE['cookieNetrax'.$role] : ""; ?>" type="email" placeholder="Enter email" autocomplete="off" required class="form-control">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
                  </div>
                  <div class="form-group has-feedback">
                     <input name="txtPassword" id="txtPassword" type="password" placeholder="Password" required class="form-control">
                     <span class="fa fa-lock form-control-feedback text-muted"></span>
                  </div>
                  <div class="clearfix">
                     <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           <input type="checkbox" value="" name="chkRemember">
                           <span class="fa fa-check"></span>Remember Me</label>
                     </div>
                     <!-- <div class="pull-right"><a href="<?php echo DASHURL."/".$role."/forgot"; ?>" class="text-muted">Forgot your password?</a>
                     </div> -->
                  </div>
                  <button type="submit" class="btn btn-block btn-primary mt-lg text-center text-white">Login</button>
               </form>
            </div>
         </div>
         <!-- END panel-->
         <div class="p-lg text-center text-white">
            <span>©</span>
            <span>2018</span>
            <span>-</span>
            <span>Funcano System</span>
                     </div>
      </div>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- MODERNIZR-->
   <script src="<?php echo DASHSTATIC; ?>/vendor/modernizr/modernizr.custom.js"></script>
   <!-- JQUERY-->
   <script src="<?php echo DASHSTATIC; ?>/vendor/jquery/dist/jquery.js"></script>
   <!-- BOOTSTRAP-->
   <script src="<?php echo DASHSTATIC; ?>/vendor/bootstrap/dist/js/bootstrap.js"></script>
   <!-- STORAGE API-->
   <script src="<?php echo DASHSTATIC; ?>/vendor/jQuery-Storage-API/jquery.storageapi.js"></script>
   <!-- PARSLEY-->
   <script src="<?php echo DASHSTATIC; ?>/vendor/parsleyjs/dist/parsley.min.js"></script>
   <!-- =============== APP SCRIPTS ===============-->
   <script src="<?php echo DASHSTATIC; ?>/js/app.js"></script>
</body>

</html>