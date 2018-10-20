<?php $this->load->viewD("inc/header"); ?>
<section>
	<div class="content-wrapper">
		<h3>
			<div class="pull-right col-sm-offset-3">
				<a href="<?php echo DASHURL.'/banner/add';?>" class="add_iframe addnew"><button class="btn btn-info">Add Banner</button></a>
			</div>
			Banner Listing
		   <small>Banner Operations</small>
		</h3>
		<div class="container-fluid">
			<?php $this->load->viewD("banner/ajaxlisting_banner",$this->outputdata); ?>
		</div>
	</div>
</section>
<?php $this->load->viewD("inc/banner_footer"); ?>
