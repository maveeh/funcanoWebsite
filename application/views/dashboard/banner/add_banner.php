<?php $this->load->viewD('inc/iframe_header'); ?>
<script src="<?php echo DASHSTATIC; ?>/vendor/modernizr/modernizr.custom.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/matchMedia/matchMedia.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/jquery/dist/jquery.js"></script>
<link href="<?php echo STATICCSS; ?>/custom/dropzone.css" rel="stylesheet"/>
<script src="<?php echo STATICJS; ?>/custom/dropzone.js"></script>

	<!-- BEGIN CONTAINER -->
   <div class="row-fluid pop-up-form">
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class="panel panel-info">
                     <div class="panel-heading">
                        Add Banner
                     </div>
                     <div class="panel-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo DASHURL."/banner/uploading"; ?>" class="dropzone" id="my-awesome-dropzone">
                          </form>
                        <!-- END FORM-->           
                     </div>
                  </div>
                  <!-- END SAMPLE FORM widget-->
               </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->