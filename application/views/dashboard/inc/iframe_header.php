<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
   <title>Blockchainbulletin - Admin Dashboard Welcome</title>
   <!-- =============== VENDOR STYLES ===============-->
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/fontawesome/css/font-awesome.min.css">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/simple-line-icons/css/simple-line-icons.css">
   <!-- ANIMATE.CSS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/animate.css/animate.min.css">
   <!-- WHIRL (spinners)-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/whirl/dist/whirl.css">
   <!-- =============== PAGE VENDOR STYLES ===============-->
   <!-- WEATHER ICONS-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/weather-icons/css/weather-icons.min.css">
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/bootstrap.css" id="bscss">
   
   <!-- =============== APP STYLES ===============-->
   <?php if(DOMAINNAME =='pathey' || DOMAINNAME =='parth')	{	} else { ?>
	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,400italic" rel="stylesheet" type="text/css">
	<?php } ?>
	
	<!-- DATETIMEPICKER-->
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/datatables-colvis/css/dataTables.colVis.css">
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/datatables/media/css/dataTables.bootstrap.css">
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/vendor/dataTables.fontAwesome/index.css">
   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/colorbox.css" />

   <link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/app.css" id="maincss">
</head>

<body class="layout-fixed">
   <div class="">
      <!-- top navbar-->
 
<?php $this->load->viewD('/inc/constants'); ?>

