<?php 
//v3print($flyerData); exit ;
 $this->load->viewF("inc/header"); ?>



<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Banner
================================================== -->
<div class="main-search-container" data-background-image="<?php echo FRONTIMG."/images/main-search-background-01.jpg"?>">
  <div class="main-search-inner">

    <div class="container">
       <form id="search-form" name="search-form" class="default-form" action="" method="post">  
        <div class="row">
        <div class="col-md-12">
          <h2>Find What is Near by You!</h2>
          <h4>Expolore top-rated events & flyers</h4>

          <div class="main-search-input">

            <div class="main-search-input-item">
              <input type="text" name="txt_lookingFor" id="txt_lookingFor" placeholder="What are you looking for?"/>
            </div>

           <!--  <div class="main-search-input-item location">
              <div id="autocomplete-container">
                <input id="txt_location" type="text" name="txt_location" placeholder="Location">
              </div>
              <a href="#"><i class="fa fa-map-marker"></i></a>
            </div> -->

           <!--  <div class="main-search-input-item">
              
 <?php //v3print($flyer);exit ; ?>
              <select id="dd_categoryId" name="dd_categoryId" class="chosen-select">
                    <option value="">Select Categories</option>
                                        <?php foreach($flyer as $flyer) { ?>
                                      <option value="<?php echo $flyer->categoryTitle; ?>"><?php echo $flyer->categoryTitle; ?></option>
                                  <?php } ?>                  </select>
            </div> -->
           
            <button type="submit" class="button" onclick="sendData();" name="flyerSearch">Search</button>

          </div>
        </div>
      </div>
      </form>

    </div>

  </div>
</div>
<section class="fullwidth padding-top-75" data-background-color="#f8f8f8">

  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h3 class="headline centered margin-bottom-45">
          Most Visited Places
          <span>Events & Places you like to plan</span>
        </h3>
      </div>

      <div class="col-md-12">
     

        

          <!-- Listing Item -->
          <?php if (valResultSet($flyerData)) {
            foreach ($flyerData as $flyerData) {
             ?>

         <div class="col-md-4">
          <div class="carousel-item">
            <?php if ($this->session->userdata(PREFIX.'sessUserId')>0) { ?>
          <a href="<?php echo BASEURL."/listing/details/".$flyerData->flyerId; ?>"  class="listing-item-container compact">
            <?php }else{ ?>  <a href="#sign-in-dialog" onclick="signButtonDisplay() ;" class="sign-in popup-with-zoom-anim listing-item-container compact">  <?php  } ?>
            
              <div class="listing-item">

                <img src="<?php if($flyerData->image!=""){ echo UPLOADPATH."/flyers/".$flyerData->image; }else{ echo UPLOADPATH."/default-flyer.png" ; } ?>" alt="Flyers Image">

             <!--  <img src="<?php  echo UPLOADPATH."/flyers/".$flyerData->image ;?>" alt="Flyers Image"> -->

                <div class="listing-item-details">
                  <ul>
                    <li><?php if ($flyerData->startTime!="0000-00-00") {
        echo date("d M", strtotime($flyerData->startTime)) ;
        }  ?> To <?php if ($flyerData->endTime!="0000-00-00") {
          echo date("d M", strtotime($flyerData->endTime)) ;
        }  ?> </li>
                  </ul>
                </div>
                <div class="listing-item-content">
             <!--      <div class="numerical-rating" data-rating="5.0"></div> -->
                  <h3><?php echo $flyerData->title ; ?></h3>
                  <span><?php echo $flyerData->address ; ?></span>
                  <?php if ($flyerData->ticketPrice !="" && $flyerData->tickerStatus !=1){  ?>
                  <div class="numerical-rating high pull-right" data-rating="£ <?php echo  number_format((float)$flyerData->ticketPrice, 2, '.', ''); ?>"></div>
                  <?php }else{ ?>  <div style="background-color:#19b453; color: #ffffff;
" class="numerical-rating high pull-right" data-rating="Free"></div><?php  }  ?>

                    <!--  <?php if($flyerData->ticketPrice== "") { ?> <?php echo ""?> <?php } else { ?> <?php echo $flyerData->ticketPrice ; ?> <?php } ?> -->
                     <!-- <div class="numerical-rating high pull-right" data-rating="£ <?php echo $flyerData->ticketPrice ; ?>"></div> -->
                </div>
       
              </div>
            </a>
          </div>
        </div>

             <?php
            }
           
          } ?>
          <!-- Listing Item / End -->   

        
        
        </div>
        <div class="col-md-12"> 
          <a href="<?php echo BASEURL."/listing" ; ?>" style="float: right;" class="button booking-confirmation-btn margin-top-40 margin-bottom-65">More</a></div>
        


    </div>
  </div>

</section>
<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				Search By Category
			</h3>
		</div>

	</div>
</div>


<!-- Category Boxes -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="categories-boxes-container margin-top-5 margin-bottom-30">
				
				<!-- Box -->
				<a href="<?php echo BASEURL."/listing/?categories=Music & Nightlife" ?>" class="category-small-box">
					<i class="im im-icon-Electric-Guitar"></i>
					<h4>Music & Nightlife</h4>
				</a>

				<!-- Box -->
				<a href="<?php echo BASEURL."/listing/?categories=Family & Kids" ?>" class="category-small-box">
					<i class="im im-icon-Family-Sign"></i>
					<h4>Family & Kids</h4>
				</a>

				<!-- Box -->
				<a href="<?php echo BASEURL."/listing/?categories=Food & Drink" ?>" class="category-small-box">
					<i class="im im-icon-Hamburger"></i>
					<h4>Food & Drink</h4>
				</a>

				<!-- Box -->
				<a href="<?php echo BASEURL."/listing/?categories=Arts & Theatre" ?>" class="category-small-box">
					<i class="im im-icon-Film-Board"></i>
					<h4>Arts & Theatre</h4>
				</a>

				<!-- Box -->
				<a href="<?php echo BASEURL."/listing/?categories=Culture" ?>" class="category-small-box">
					<i class="im im-icon-Face-Style6"></i>
					<h4>Culture</h4>
				</a>

				<!-- Box -->
				<a href="<?php echo BASEURL."/listing/?categories=Shopping & Deals" ?>" class="category-small-box">
					<i class="im im-icon-Shopping-Bag"></i>
					<h4>Shopping & Deals</h4>
				</a>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->

<!-- Flip banner -->
<a href="#" class="flip-banner parallax margin-top-65" data-background="<?php echo FRONTIMG."/images/slider-bg-02.jpg"?>" data-color="#fff100" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
	<div class="flip-banner-content">
		<h2 class="flip-visible">Expolore top-rated Flyers nearby</h2>
		<h2 class="flip-hidden">Browse latest events</h2>
	</div>
</a>
<!-- Flip banner / End -->

<?php $this->load->viewF("inc/footer"); ?>

<script type="text/javascript">
function sendData(){
$('#search-form').on('submit', function(e){
    e.preventDefault();
    var lookingFor =$.trim($("#txt_lookingFor").val()) ;
    var location   =$.trim($("#txt_location").val()) ;
    var categories   =$.trim($("#dd_categoryId").val()) ;
   
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