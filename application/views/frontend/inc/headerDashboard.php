<!DOCTYPE html>

<!-- Mirrored from www.vasterad.com/themes/listeo_updated/dashboard-bookings.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 May 2018 13:01:22 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<title>Funcano</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php echo FRONTCSS."/css/style.css"?>">
<link rel="stylesheet" href="<?php echo FRONTCSS."/css/colors/main.css"?>" id="colors">
<link rel="stylesheet" href="<?php echo FRONTCSS."/css/lighweight-popup.css"?>">
<link rel="shortcut icon" href="<?php echo FRONTIMG."/images/favicon.ico"; ?>" />

</head>

<style type="text/css">


</style>

<body>

<!-- Wrapper -->
<div id="wrapper">
<?php
if($this->session->userdata(PREFIX.'sessUserId') > 0 ){ 
$userdata= $this->Common_model->selRowData("fc_user","","userId=".$this->session->userdata(PREFIX.'sessUserId')); } ?>
<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="<?php echo BASEURL ?>"><img src="<?php echo FRONTIMG."/images/logo.png"?>" alt="Funcano"></a>
				</div>

				<!-- Mobile Navigation -->
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

			<!-- Right Side Content / End -->
			<div class="right-side">
				<!-- Header Widget -->
				<div class="header-widget">
					
					<!-- User Menu -->
					<div class="user-menu">
						<div class="user-name"><span><img src="<?php if($userdata->profileImage!=""){ echo $userdata->profileImage; } else{
              echo UPLOADPATH."/dummy-profile.png" ;
            } ?>" alt=""></span> Hi, <?php echo $this->session->userdata(PREFIX.'sessUserName') ; ?></div>
						 <ul>
                <li><a href="<?php echo BASEURL."/user/dashboard/profile" ?>"><i class="sl sl-icon-user"></i> My Profile</a></li>
                <li><a href="<?php echo BASEURL."/user/dashboard/listing/active-flyers" ?>"><i class="sl sl-icon-layers"></i> My Flyer</a></li>
                <li><a href="<?php echo BASEURL."/user/dashboard/listing/active_ticket" ?>"><i class="fa fa-ticket"></i> Ticket Booking</a></li>
               <li><a href="<?php echo BASEURL."/user/dashboard/interested-in" ?>" ><i class="sl sl-icon-badge"></i> Interested In</a></li>
             <!--  <li><a href="<?php echo BASEURL."/user/dashboard/change-password" ?>"><i class="sl sl-icon-lock"></i> Change Password</a></li> -->
              <!-- <li><a href="<?php echo BASEURL."/login/logout" ?>" onclick="javascript:return confirm('Are You Sure ! You Want To Logout.');"><i class="sl sl-icon-power"></i> Logout</a></li>  -->
              <li><a href="#<?php //echo BASEURL."/login/logout" ?>" id="askConfirm"><i class="sl sl-icon-power"></i> Logout</a></li>
            </ul>
					</div>

					<a href="<?php echo BASEURL."/user/dashboard/listing/add"; ?>" class="button border with-icon">Add Flyer <i class="sl sl-icon-plus"></i></a>
				</div>
				<!-- Header Widget / End -->
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
