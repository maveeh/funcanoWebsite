
<?php //v3print($maleViewCount); exit ; ?>
<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
<style type="text/css">
.list-box-listing-img {
   
    max-width: 350px !important;
   
}

.list-box-listing-content {
 
    padding-left: 65px;
}

a.canvasjs-chart-credit {
    display: none;
}
.dashboard-stat-content.female {
    left: 165px;
}
</style>
  <!-- Content
  ================================================== -->
  <div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
      <div class="row">
        <div class="col-md-12">
          <h2>User Response</h2>
          <!-- Breadcrumbs -->
          <nav id="breadcrumbs">
           <!--  <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Dashboard</a></li>
              <li>My Profile</li>
            </ul> -->
          </nav>
        </div>
      </div>
    </div>
   <div class="dashboard-list-box margin-top-0">
					
					<ul>
					
						<li>

							<div class="row">
							<div class="col-md-9">
							<div class="list-box-listing">
								<div class="list-box-listing-img"><img src="<?php if($flyersData->image!=""){ echo UPLOADPATH."/flyers/".$flyersData->image; }else{ echo UPLOADPATH."/default-flyer2.png" ; } ?>" alt="Flyers Image"></div>

								<!-- <div class="list-box-listing-img"><a href="#"><img src="<?php echo UPLOADPATH."/flyers/".$flyersData->image?>" alt=""></a></div> -->

								


								<div class="list-box-listing-content">
									<div class="inner">
										<h2><?php echo $flyersData->title ; ?></h2>
										<h3><?php echo $flyersData->address ; ?></h3>
										<!-- <div class="star-rating" data-rating="3.5">
											<div class="rating-counter">(12 reviews)</div>
										</div> -->
									</div>
								</div>
							</div>
						   </div>
							
						  </div>
						</li>
					

					

					</ul>
				</div>
    <br><br>
    <div class="row">
    	<div class="col-md-6">
    		<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4><?php 
					$mTotal=0;

					 if (valResultSet($maleViewCount)) {
						$totalMaleCount=$maleViewCount ;
						foreach ($totalMaleCount as $totalMaleCount) {
							$mTotal+=$totalMaleCount->sharePerDate ;
						}

					} echo $mTotal; ?></h4> <span>Male View</span></div>
					<div class="dashboard-stat-content female"><h4><?php 
					$fTotal=0;

					 if (valResultSet($femaleViewCount)) {
						$totalFemaleCount=$femaleViewCount ;
						foreach ($totalFemaleCount as $totalFemaleCount) {
							$fTotal+=$totalFemaleCount->sharePerDate ;
						}

					} echo $fTotal; ?></h4> <span>Female View</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Line-Chart"></i></div>
				</div>
    		<div id="lineChart" style="height: 300px; max-width: 500px; margin: 0px auto;"></div>
    	</div>
    	
   
   
    	<div class="col-md-6">
    		<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4><?php $totalShare=$flyersData->facebookShare+$flyersData->googleShare+$flyersData->twitterShare ;
					 echo $totalShare;  ?></h4> <span>Total Share</span></div>
					<div class="dashboard-stat-icon"><i class="im im-icon-Sharethis"></i></div>
				</div>
    		<div id="columnChart" style="height: 300px; max-width: 500px; margin: 0px auto;"></div>
    	</div>
    	
    </div>


  <?php $this->load->viewF("inc/footerDashboard"); ?>


<script>
window.onload = function () {
/*Line Chart*/
var chart = new CanvasJS.Chart("lineChart", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "View Count"
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Number of Views",
		crosshair: {
			enabled: true
		}
	},
	toolTip:{
		shared:true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "Male Count",
		
		xValueFormatString: "DD MMM, YYYY",
		color: "#F08080",
		dataPoints: [
		<?php if (isset($maleViewCount) && $maleViewCount!="") {
			foreach ($maleViewCount as $maleViewCount) { ?>
			
			{ x: new Date(<?php echo date("Y, m, d",strtotime('-1 months',strtotime($maleViewCount->date))) ; ?>), y: <?php echo $maleViewCount->sharePerDate ; ?> },
		<?php	}
		} ?>
			
		]
	},
	{
		type: "line",
		showInLegend: true,
		name: "Female Count",
		lineDashType: "dash",
		dataPoints: [
		<?php if (isset($femaleViewCount) && $femaleViewCount!="") {
			foreach ($femaleViewCount as $femaleViewCount) { ?>
			
			{ x: new Date(<?php echo date("Y, m, d",strtotime('-1 months',strtotime($femaleViewCount->date))) ; ?>), y: <?php echo $femaleViewCount->sharePerDate ; ?> },
		<?php	}
		} ?>

			
		
		]
	}]
});

/*Bar Chart*/
var chart2 = new CanvasJS.Chart("columnChart", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Social Shares"
	},
	axisY: {
		title: "Number Of Shares"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Social Share Count",
		dataPoints: [      
			{ y: <?php echo $flyersData->facebookShare ; ?>, label: "Facebook" },
			{ y: <?php echo $flyersData->twitterShare ; ?>,  label: "Twitter" },
			{ y: <?php echo $flyersData->googleShare	 ; ?>,  label: "Google Plus" }
		]
	}]
});
chart2.render();
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}


</script>

<script src="<?php echo FRONTJS."/scripts/canvasjs.min.js"; ?>"></script>


