<script src="<?php echo DASHSTATIC; ?>/js/colorbox/jquery.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/datatables-colvis/js/dataTables.colVis.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/datatables/media/js/dataTables.bootstrap.js"></script>
<!--<script src="<?php echo DASHSTATIC; ?>/js/demo/demo-datatable.js"></script>
-->
<script src="<?php echo DASHSTATIC; ?>/js/colorbox/jquery.colorbox.js"></script>
<script src="<?php echo DASHSTATIC; ?>/vendor/select2/dist/js/select2.js"></script>
<script>
$(document).ready(function() {
	var dtInstance2 = $("#datatable2").dataTable({
		"bJQueryUI": true,
		"bProcessing": true,
		"paging":   true,  // Table pagination
		"ordering": true,  // Column ordering 
		"info":     true,  
		"bRetrieve": true,
		oLanguage: {
			sSearch:      "Search:",
			sLengthMenu:  "_MENU_ records per page",
			info:         "Showing page _PAGE_ of _PAGES_",
			zeroRecords:  "Nothing found - sorry",
			infoEmpty:    "No records available",
			infoFiltered: "(filtered from _MAX_ total records)"
		},
		"fnDrawCallback": function( oSettings ) {
			$(".addIframe").colorbox({width:"700px", height:"600px", iframe:true});	
			$(".viewIframe").colorbox({width:"700px", height:"600px", iframe:true});	
		}
	});
	var inputSearchClass = "datatable_input_col_search";
	var columnInputs = $("tfoot ."+inputSearchClass);

	// On input keyup trigger filtering
	columnInputs
	  .keyup(function () {
		  dtInstance2.fnFilter(this.value, columnInputs.index(this));
	  });
});

</script>