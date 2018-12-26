<?php $this->load->viewF("inc/header"); ?>

<style type="text/css">
#titlebar {
   
    margin-bottom: 0px;
}
input.search-field.height-Sidebar {
    height: 41px;
    border-radius: 10px;
}
button.button.height-Sidebar {
   
   
    background-color: #54ba1d;
}
.submitHide{
	visibility: hidden;
}
.main-search-input {
    box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.50) !important;
  
}

</style>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Titlebar
================================================== -->
<form method="post" id="listing-search">
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="main-search-input gray-style margin-top-0 margin-bottom-10">

				<div class="main-search-input-item">
					<input type="text" id="txt_lookingFor" name="txt_lookingFor" placeholder="What are you looking for?" value="<?php if (isset($_GET['lookingFor'])) {

	echo $_GET['lookingFor'];
} ?>"/>
				</div>

				

				<button type="submit" onclick="sendCatData();" name="btnFlyerSearchList" class="button">Search</button>
			</div>
				

			</div>
			<div class="col-md-2">
				<a href="<?php echo BASEURL."/listing"; ?>">
					<button type="button" class="button show-all fullwidth margin-top-5">All Flyers</button>
				</a>
			</div>
		</div>
	</div>
</div>

</form>



<!-- Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Search -->
		<div class="col-md-12">
			
		</div>
		<!-- Search Section / End -->


		<div class="col-md-12">

			<!-- Sorting - Filtering Section -->
			<div class="row margin-bottom-25">

				<div class="col-md-6">
					<!-- Layout Switcher -->
					<div class="layout-switcher">
						<h4>Search result: <?php if ($flyersData!="") {
							$count=$flyersData ;
						  $totalSearch= count($count) ;
						  if ($totalSearch>0) {
						  	echo  $totalSearch ;
						  } 

						}else{
						  	echo "No Result Found";
						  }  ?></h4>
					</div>
				</div>
				<?php  // if ($flyersData!="") {
					 ?>
				<div class="col-md-6">
					
					<div class="fullwidth-filters">
						<form method="post" id="myForm">						
							
	<div class="pull-right">
			
						<div class="panel-dropdown wide float-right">
							<a href="#">Funcies</a>
							
							<div class="panel-dropdown-content checkboxes">
									
								
								<div class="row">
									
									<?php
									/*$i=0; 
									$postedFuncies=$_POST['funcies'] ;*/
									$count=count($topFuncies) ;
								 for ($i=0; $i <$count ; $i++) {
											?> 
									<div class="col-md-6">
										<input id="<?php echo $topFuncies[$i] ; ?>" type="checkbox" name="funcies[]" value="<?php echo $topFuncies[$i] ; ?>" <?php 
									 if (isset($_POST['funcies'])) { 
									 $postedFuncies=	$_POST['funcies'] ;
									  if (in_array($topFuncies[$i], $postedFuncies)) {
									  echo "Checked";
									  }
											
										}  ?> >
										<label for="<?php echo $topFuncies[$i] ; ?>"><?php echo $topFuncies[$i] ?></label>
									</div>	
									<?php
									} 
									?>		
									
								</div>
								<div class="panel-buttons">
									<button type="reset" class="panel-cancel">Cancel</button>
									<button class="panel-apply" id="btnFilter" type="submit" name="btnFilter">Search</button>
								</div>

								</div>

						</div>

						
	</div>									
<div class="pull-right">
		<div class="sidebar ">

			<!-- Widget -->
			<button id="btnFilter" class="submitHide" type="submit" name="btnFilter"></button>
			<input type="hidden"  name="lookFor"  value="<?php if (isset($_GET['lookingFor'])) {echo $_GET['lookingFor'];} ?>"/>
			<input  name="location" type="hidden" value="<?php if (isset($_GET['location'])) {echo $_GET['location'];} ?>">
			<input  name="categories" type="hidden" value="<?php if (isset($_GET['categories'])) {echo $_GET['categories'];} ?>">
			<div class="widget">
			
				<!-- <div class="search-blog-input">
					<div class=""><input class="search-field height-Sidebar" name="funcies" type="text" placeholder="Enter Funcies" value="<?php if (isset($_POST['btnFilter'])) {
										echo  $_POST['funcies'];
									} ?>"></div>
				</div> -->
				
			</div>
			<!-- Widget / End -->


		</div>
	</div>



	                <div class="sort-by ">
							<div class="sort-by-select">
								<select  onchange="formSubmit();" data-placeholder="Default order" name="sort" class="chosen-select-no-single">
									<option  value="Newest Flyer" <?php if (isset($_POST['btnFilter']) && $_POST['sort']=="Newest Flyer") {
										echo "Selected";
									} ?>>Newest Flyer</option>
									<option  value="Oldest Flyer"<?php if (isset($_POST['btnFilter']) && $_POST['sort']=="Oldest Flyer") {
										echo "Selected";
									} ?>>Oldest Flyer</option>
									<option  value="Highest Rated" <?php if (isset($_POST['btnFilter']) && $_POST['sort']=="Highest Rated") {
										echo "Selected";
									} ?>>Highest Rated</option>
									<option  value="Most Viewed" <?php if (isset($_POST['btnFilter']) && $_POST['sort']=="Most Viewed") {
										echo "Selected";
									} ?>>Most Viewed</option>
								</select>
							</div>
						</div>
						
						


						<!-- Sort by / End -->
</form>

					</div>
				</div>
				<?php //} ?>

			</div>
			<!-- Sorting - Filtering Section / End -->
<div class="row">
			<?php if (valResultSet($flyersData)) {
				foreach ($flyersData as $flyersData) {
				?>
				<!-- Listing Item -->
				<!-- <?php if ($this->session->userdata(PREFIX.'sessUserId')>0) {
						echo BASEURL."/listing/details/".$flyersData->flyerId ;
					}else{ echo "#sign-in-dialog" ; } ?> -->

				<div class="col-lg-4 col-md-6">
					<?php if ($this->session->userdata(PREFIX.'sessUserId')>0 ) { ?>
					<a href="<?php echo BASEURL."/listing/details/".$flyersData->flyerId ?>"  class="listing-item-container compact">
						<?php }else{ ?>  <a href="#sign-in-dialog" onclick="signButtonDisplay() ;" class="sign-in popup-with-zoom-anim listing-item-container compact">  <?php  } ?>
						<div class="listing-item">

							<img src="<?php if($flyersData->image!="" && file_exists(ABSUPLOADPATH."/flyers/".$flyersData->image)){ echo UPLOADPATH."/flyers/".$flyersData->image; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt="Flyers Image">
							
							<!-- <img src="<?php echo UPLOADPATH."/flyers/".$flyersData->image ;?>" alt=""> -->

							 <div class="listing-item-details">
                  <ul>
                    <li><?php if ($flyersData->startTime!="0000-00-00") {
        echo date("d M", strtotime($flyersData->startTime)) ;
        }  ?> To <?php if ($flyersData->endTime!="0000-00-00") {
          echo date("d M", strtotime($flyersData->endTime)) ;
        }  ?> </li>
                  </ul>
                </div>

							<div class="listing-item-content">
								<!-- <div class="numerical-rating" data-rating="3.5"></div> -->
								<h3><?php echo $flyersData->title ?> </h3>
								<span><?php echo $flyersData->address ?></span>
								<?php if ($flyersData->ticketPrice !="" && $flyersData->tickerStatus !=1){  ?>
								 <div class="numerical-rating high pull-right" data-rating="£ <?php echo number_format((float)$flyersData->ticketPrice , 2, '.', ''); ?>"></div>
								 <?php }else{ ?> <div style="background-color:#19b453; color: #ffffff;
" class="numerical-rating high pull-right" data-rating="Free"></div><?php  }  ?>

								 <!--  <?php if($flyerData->ticketPrice== "") { ?> <?php echo ""?> <?php } else { ?> <?php echo ""?> <?php } ?>  -->
							</div>
							
						</div>
					</a>

				</div>
				<!-- Listing Item / End -->

				<?php
				}
			} ?>

			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<!-- <div class="pagination-container margin-top-20 margin-bottom-40">
						<nav class="pagination">
							<ul>
								<li><a href="#" class="current-page">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div> -->
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	</div>
</div>

<?php $this->load->viewF("inc/footer"); ?>

<script type="text/javascript">
function formSubmit() {
	//alert("test"); exit ;
     var selectButton = document.getElementById( 'btnFilter' );
            selectButton.click();
}
</script>
<script type="text/javascript">
function sendCatData(){
$('#listing-search').on('submit', function(e){
    e.preventDefault();
    var lookingFor   = $.trim($("#txt_lookingFor").val()) ;
    var location     = $.trim($("#txt_location").val()) ;
    var categories   = $.trim($("#dd_categoryId").val()) ;
   
 if (lookingFor === "" && location === "" && categories === "") {
   //alert('Please Select Atleast One');
        return false;

 }else{
  if (lookingFor==="" && location!="" && categories!="") {
    window.location = '<?php echo BASEURL?>/listing/?location='+location+'&categories='+categories;
  }else if (location==="" && lookingFor!="" && categories!="") {
     window.location = '<?php echo BASEURL?>/listing/?lookingFor='+lookingFor+'&categories='+categories;
  } else if(categories==="" && lookingFor!="" && location!=""){
    window.location = '<?php echo BASEURL?>/listing/?lookingFor='+lookingFor+'&location='+location;
  } else if(categories==="" && location==="" && lookingFor!=""){
   window.location = '<?php echo BASEURL?>/listing/?lookingFor='+lookingFor;
  } else if (categories==="" && lookingFor==="" && location!="") {
      window.location = '<?php echo BASEURL?>/listing/?location='+location;
  } else if (location==="" && lookingFor==="" && categories!="") {
       window.location = '<?php echo BASEURL?>/listing/?categories='+categories;
  } else{
     window.location = '<?php echo BASEURL?>/listing/?location='+location+'&lookingFor='+lookingFor+'&categories='+categories;
  }

   
  
}
 
  
 
});
}

</script>
