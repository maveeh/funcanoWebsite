<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Bootstrap Admin App + jQuery">
	<meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
	<title><?php echo PROJECTNAME; ?> - Admin Dashboard</title>
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
	<link rel="stylesheet" href="<?php echo STATICCSS; ?>/prettyPhoto.css" />
	<link rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/app.css" id="maincss">
	<link id="autoloaded-stylesheet" rel="stylesheet" href="<?php echo DASHSTATIC; ?>/css/theme-h.css">
</head>
<style type="text/css">
.topnavbar .navbar-header .brand-logo > img, .topnavbar .navbar-header .brand-logo-collapsed > img {
    margin: 0 auto;
    border-radius: 6px;
    width: 160px;
}

.topnavbar .navbar-header .brand-logo {
    display: block;
    padding: 4px 10px;
}
</style>

<body class="layout-fixed">
	<div class="wrapper">
      <!-- top navbar-->
		<header class="topnavbar-wrapper">
			 <!-- START Top Navbar-->
			<nav role="navigation" class="navbar topnavbar">
				<!-- START navbar header-->
				<div class="navbar-header">
				   <a href="<?php echo DASHURL."/welcome"; ?>" class="navbar-brand">
					  <div class="brand-logo">
						 <img src="<?php echo FRONTIMG."/images/logo.png"?>">
					  </div>
				   </a>
				</div>
				<!-- END navbar header-->
				<!-- START Nav wrapper-->
				<div class="nav-wrapper">
				   <!-- START Left navbar-->
				   <ul class="nav navbar-nav">
					  <li>
						 <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
							<em class="fa fa-navicon"></em>
						 </a>
					  </li>
				   </ul>
				   <!-- END Left navbar-->
				   <!-- START Right Navbar-->
				   <ul class="nav navbar-nav navbar-right">
					 
					  <!-- Fullscreen (only desktops)-->
					  <li class="visible-lg">
						 <a href="#" data-toggle-fullscreen="">
							<em class="fa fa-expand"></em>
						 </a>
					  </li>
					   <!-- START Alert menu-->
						<li class="dropdown dropdown-list">
							<a href="#" data-toggle="dropdown">
							<em class="fa fa-user"></em>
							</a>
							<!-- START Dropdown menu-->
							<ul class="dropdown-menu animated flipInX">
								<li>
									<!-- START list group-->
									<div class="list-group">
									  <!-- list item-->
									  <a href="<?php echo DASHURL."/profile/edit"; ?>" class="list-group-item">
										 <div class="media-box">
											<div class="pull-left">
											   <em class="icon-people fa-2x text-info"></em>
											</div>
											<div class="media-box-body clearfix">
											   <p class="m0">Profile Settings</p>
											   <p class="m0 text-muted">
												  <small>Admin info & Change password</small>
											   </p>
											</div>
										 </div>
									  </a>
									 
									  <!-- list item-->
									  <a href="<?php echo DASHURL; ?>/auth/logout" class="list-group-item" onclick="return confirm('Are You Sure ! You Want to Logout?');">
										 <div class="media-box">
											<div class="pull-left">
											   <em class="icon-logout fa-2x text-danger"></em>
											</div>
											<div class="media-box-body clearfix">
											   <p class="m0"> Logout</p>
											   <p class="m0 text-muted">
												  <small>Account will be sign off</small>
											   </p>
											</div>
										 </div>
									  </a>
									  
									</div>
							   <!-- END list group-->
								</li>
							</ul>
						<!-- END Dropdown menu-->
						</li>
					<!-- END Alert menu-->
					</ul>
					<!-- END Right Navbar-->
				</div>
				<!-- END Nav wrapper-->
			</nav>
			 <!-- END Top Navbar-->
		</header>
<?php $this->load->viewD('/inc/constants'); ?>
<?php  $this->load->viewD('inc/sidebar'); ?>
