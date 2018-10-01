<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <title>Blockchainbulletin - Dashboard login</title>
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

<body>
   <div class="wrapper">
      <div class="block-center mt-xl wd-xl">
         <!-- START panel-->
         <div class="panel panel-dark panel-flat">
            <div class="panel-heading text-center">
               <a href="#">
                  <img src="<?php echo DASHSTATIC; ?>/img/logo.png" alt="Image" class="block-center img-rounded">
               </a>
            </div>
            <div class="panel-body">
               <p class="text-center pv">PASSWORD RESET</p>
				<div class="form-group">
					<?php echo $this->common_lib->showSessMsg(); ?>
				</div>
               <form method="post" data-parsley-validate="" novalidate="">
                  <p class="text-center">Fill with registered email-id to receive system generated new password.</p>
                  <div class="form-group has-feedback">
                     <label for="resetInputEmail1" class="text-muted">Email address</label>
                     <input name="txtEmailId" type="email" required data-parsley-type="email" placeholder="Enter email" autocomplete="off" class="form-control">
                     <span class="fa fa-envelope form-control-feedback text-muted"></span>
					 
                  </div>
				  
                  <button type="submit" class="btn btn-info btn-block" name="btnReset">Reset</button>
				  <div class="clearfix">
					 <div class="checkbox c-checkbox pull-left mt0">
                        <label>
                           </label>
                     </div>
                     <div class="pull-right"><a href="<?php echo DASHURL."/".$role; ?>" class="text-muted">Back to Login</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- END panel-->
         <div class="p-lg text-center">
            <span>&copy;</span>
            <span><?php echo date("Y"); ?></span>
            <span>-</span>
            <span>Blockchainbulletin</span>
            <br>
            <span>Blockchainbulletin</span>
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