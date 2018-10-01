
<?php $this->load->viewF("inc/headerDashboard"); ?>
<?php $this->load->viewF("inc/sidebar"); ?>
  <!-- Content
  ================================================== -->
  <div class="dashboard-content">

    <!-- Titlebar -->
    <div id="titlebar">
      <div class="row">
        <form method="post">
        <div class="col-md-12">
          <div class="col-md-6">

           <h2>User Ticket Booking</h2>



         </div>
          <div class="col-md-4">
  <select data-placeholder="All Categories" name="dd_flyer" class="chosen-select" >
                <option value="allFlyer">All Flyers</option> 
                <?php if (valResultSet($allFleyrs)) {
               foreach ($allFleyrs as $allFleyrs) { ?>
                <option value="<?php echo $allFleyrs->flyerId ; ?>" <?php if (isset($_POST['btnSearch'])) {
                 if ($_POST['dd_flyer']==$allFleyrs->flyerId) {
                 echo "Selected";
                 }
                } ?>><?php echo $allFleyrs->title ; ?></option>
            <?php } } ?>
              </select>

              

         <!--   <div class="main-search-input">
          
           <div class="main-search-input-item">
              <select data-placeholder="All Categories" class="chosen-select" >
                <option>All Categories</option> 
                <option>Shops</option>
                <option>Hotels</option>
                <option>Restaurants</option>
                <option>Fitness</option>
                <option>Events</option>
              </select>
            </div>

            <button class="button">Search</button>

          </div> -->
        </div>
                  <div id="userTicketBook" class="col-md-1">

           <button type="submit" name="btnSearch" style="padding: 9px 19px;
" class="button">Search</button>
         </div>
         
          <!-- Breadcrumbs -->
        
           
           <!--  <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Dashboard</a></li>
              <li>My Profile</li>
            </ul> -->
         
        </div>
        </form>
      </div>
    </div>

    <div class="row">

    <div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box invoices with-icons margin-top-20">
				
				<!-- 	<ul>
						<?php if (valResultSet($flyersData)) {
							 foreach ($flyersData as $fData) {
							 ?>
						<li><i class="list-box-icon sl sl-icon-doc"></i>
							<strong><?php echo $fData->title ;?></strong>
							<ul>
								<li class="unpaid"><?php echo $fData->fullName ;?></li>
								<li>Order: <?php echo $fData->ticketNumber ;?></li>
								<li>Booking Date: <?php echo $fData->ticketDate ;?></li>
							
								<li>Ticket Count: <?php echo $fData->ticketQuantity ;?></li>
							</ul>
							<div class="buttons-to-right">
								<a href="#" class="button gray">View Invoice</a>
							</div>
						</li>

						<?php }  } ?>
						
						

					</ul> -->

          <table class="basic-table">

        <tbody><tr>
          <th>Flyer Name</th>
          <th>User Name</th>
          <th>Booking Date</th>
          <!-- <th>Action</th> -->
          <th>Ticket Number</th>
          <th>Status</th>
        </tr>

        <?php if (valResultSet($flyersData)) {
               foreach ($flyersData as $fData) {
               ?>

        <tr>
          <td data-label="Flyer Name"><?php echo $fData->title ;?></td>
          <td data-label="User Name"><?php echo $fData->fullName ;?></td>
          <td data-label="Booking Date"> <?php echo $fData->ticketDate ;?></td>
        <!--   <td data-label="Column 2"> 
                 <a href="#" class="button gray">View Info</a>
          </td> -->
          <td data-label="Ticket Number"><?php echo $fData->ticketNumber ;?></td>
          <td data-label="Status"><?php if ($fData->bookingStatus==1) {?><p class="paid">Active</p><?php 
          }elseif ($fData->bookingStatus==2) {
            ?><p class="unpaid">Cancelled</p><?php
          }else {
            ?><p class="unpaid">Expired</p><?php
          } ?></td>
        </tr>

            <?php }  } ?>
      
      </tbody></table>
				</div>
			</div>



  </div>

      <!-- Change Password -->
      

  <?php $this->load->viewF("inc/footerDashboard"); ?>

  <!--<script type="text/javascript">
    function postcodeValidate() {
        var postcode = document.getElementById("postcode").value;
       
        /*if (password != confirmPassword) {*/
        if (/^\d{6,10}$/.test(postcode)) {
           /* document.getElementById('mydiv').innerHTML = '<p style="color:#227d05;"></p>';*/
            return true;
        } else{ document.getElementById('mydiv').innerHTML = '<p style="color:#e80c0c;">Enter atleast six digit</p>'; }
        return false;
    }
</script>-->

  






