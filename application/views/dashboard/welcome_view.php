<?php $this->load->viewD('inc/header'); ?>
 <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               
               Dashboard
               <small ></small>
            </div>
            <!-- START widgets box-->
            <div class="row">
               <div class="col-lg-3 col-sm-3">
                  <!-- START widget-->
                  <div class="panel widget bg-primary">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-primary-dark pv-lg">
                           <em class="icon-cloud-upload fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">1700</div>
                           <div class="text-uppercase">Uploads</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-3">
                  <!-- START widget-->
                  <div class="panel widget bg-purple">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-purple-dark pv-lg">
                           <em class="icon-globe fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">700
                              <small>GB</small>
                           </div>
                           <div class="text-uppercase">Quota</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-green">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green-dark pv-lg">
                           <em class="icon-bubbles fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0">500</div>
                           <div class="text-uppercase">Reviews</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-12">
                  <!-- START date widget-->
                  <div class="panel widget">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-green pv-lg">
                           <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
                           <div data-now="" data-format="MMMM" class="text-sm"></div>
                           <br>
                           <div data-now="" data-format="D" class="h2 mt0"></div>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div data-now="" data-format="dddd" class="text-uppercase"></div>
                           <br>
                           <div data-now="" data-format="h:mm" class="h2 mt0"></div>
                           <div data-now="" data-format="a" class="text-muted text-sm"></div>
                        </div>
                     </div>
                  </div>
                  <!-- END date widget    -->
               </div>
            </div>
            <!-- END widgets box-->
            <div class="row">
               <!-- START dashboard main content-->
               <div class="col-lg-9">
                  <!-- START chart-->
					<div class="unwrap">
               <!-- START chart-->
						<div id="panelChart9" class="panel panel-default">
							<div class="panel-heading">
								<!-- START button group-->
								<div class="pull-right btn-group">
									<button type="button" data-toggle="dropdown" class="dropdown-toggle btn btn-default btn-sm">All time</button>
									<ul role="menu" class="dropdown-menu fadeInLeft animated">
									   <li><a href="#">Daily</a>
									   </li>
									   <li><a href="#">Monthly</a>
									   </li>
									   <li class="divider"></li>
									   <li><a href="#">All time</a>
									   </li>
									</ul>
								</div>
								<!-- END button group-->
								<div class="panel-title">Overall progress</div>
							</div>
							<div collapse="panelChart9" class="panel-wrapper">
								<div class="panel-body">
									<div class="chart-splinev2 flot-chart"></div>
								</div>
								<div class="panel-body">
									<div class="row">
									   <div class="col-sm-3 col-xs-6 text-center">
										  <p>Projects</p>
										  <div class="h1">25</div>
									   </div>
									   <div class="col-sm-3 col-xs-6 text-center">
										  <p>Teammates</p>
										  <div class="h1">85</div>
									   </div>
									   <div class="col-sm-3 col-xs-6 text-center">
										  <p>Hours</p>
										  <div class="h1">380</div>
									   </div>
									   <div class="col-sm-3 col-xs-6 text-center">
										  <p>Budget</p>
										  <div class="h1">$ 10,000.00</div>
									   </div>
									</div>
								</div>
							</div>
						</div>
						<!-- END chart-->
					</div>
					<!-- START radial charts-->
                  </div>
				  <div class="col-lg-3">
                  <!-- START messages and activity-->

						<div class="panel panel-default">
						 <div class="panel-heading">
							<div class="panel-title">Latest activities</div>
						 </div>
						 <!-- START list group-->
						 <div class="list-group">
							<!-- START list group item-->
							<div class="list-group-item">
							   <div class="media-box">
								  <div class="pull-left">
									 <span class="fa-stack">
										<em class="fa fa-circle fa-stack-2x text-purple"></em>
										<em class="fa fa-cloud-upload fa-stack-1x fa-inverse text-white"></em>
									 </span>
								  </div>
								  <div class="media-box-body clearfix">
									 <small class="text-muted pull-right ml">15m</small>
									 <div class="media-box-heading"><a href="#" class="text-purple m0">NEW FILE</a>
									 </div>
									 <p class="m0">
										<small><a href="#">Bootstrap.xls</a>
										</small>
									 </p>
								  </div>
							   </div>
							</div>
							<!-- END list group item-->
							<!-- START list group item-->
							<div class="list-group-item">
							   <div class="media-box">
								  <div class="pull-left">
									 <span class="fa-stack">
										<em class="fa fa-circle fa-stack-2x text-info"></em>
										<em class="fa fa-file-text-o fa-stack-1x fa-inverse text-white"></em>
									 </span>
								  </div>
								  <div class="media-box-body clearfix">
									 <small class="text-muted pull-right ml">2h</small>
									 <div class="media-box-heading"><a href="#" class="text-info m0">NEW DOCUMENT</a>
									 </div>
									 <p class="m0">
										<small><a href="#">Bootstrap.doc</a>
										</small>
									 </p>
								  </div>
							   </div>
							</div>
							<!-- END list group item-->
							<!-- START list group item-->
							<div class="list-group-item">
							   <div class="media-box">
								  <div class="pull-left">
									 <span class="fa-stack">
										<em class="fa fa-circle fa-stack-2x text-danger"></em>
										<em class="fa fa-exclamation fa-stack-1x fa-inverse text-white"></em>
									 </span>
								  </div>
								  <div class="media-box-body clearfix">
									 <small class="text-muted pull-right ml">5h</small>
									 <div class="media-box-heading"><a href="#" class="text-danger m0">BROADCAST</a>
									 </div>
									 <p class="m0"><a href="#">Read</a>
									 </p>
								  </div>
							   </div>
							</div>
							<!-- END list group item-->
							<!-- START list group item-->
							<div class="list-group-item">
							   <div class="media-box">
								  <div class="pull-left">
									 <span class="fa-stack">
										<em class="fa fa-circle fa-stack-2x text-success"></em>
										<em class="fa fa-clock-o fa-stack-1x fa-inverse text-white"></em>
									 </span>
								  </div>
								  <div class="media-box-body clearfix">
									 <small class="text-muted pull-right ml">15h</small>
									 <div class="media-box-heading"><a href="#" class="text-success m0">NEW MEETING</a>
									 </div>
									 <p class="m0">
										<small>On
										   <em>10/12/2015 09:00 am</em>
										</small>
									 </p>
								  </div>
							   </div>
							</div>
							<!-- END list group item-->
						 </div>
						 <!-- END list group-->
						 <!-- START panel footer-->
						 <div class="panel-footer clearfix">
							<a href="#" class="pull-left">
							   <small>Load more</small>
							</a>
						 </div>
						 <!-- END panel-footer-->
					  </div>
                  <!-- END messages and activity-->
               </div>
               <!-- END dashboard main content-->
            </div>
         </div>
		</div>
	 </section>
      
<?php $this->load->viewD('inc/footer'); ?>

</body>
</html>
	<script src="<?php echo DASHSTATIC; ?>/vendor/sparkline/index.js"></script>
	<!-- FLOT CHART-->
	<script src="<?php echo DASHSTATIC; ?>/vendor/Flot/jquery.flot.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/Flot/jquery.flot.resize.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/Flot/jquery.flot.pie.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/Flot/jquery.flot.time.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/Flot/jquery.flot.categories.js"></script>
	<script src="<?php echo DASHSTATIC; ?>/vendor/flot-spline/js/jquery.flot.spline.min.js"></script>
	<!-- MOMENT JS-->
	<script src="<?php echo DASHSTATIC; ?>/vendor/moment/min/moment-with-locales.min.js"></script>
	<!-- DEMO-->
	<script src="<?php echo DASHSTATIC; ?>/js/demo/demo-flot.js"></script>