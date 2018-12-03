<?php
include('file_include.php');

if(isset($_REQUEST['page'])){
	if(isset($_REQUEST['act'])){
			if(file_exists("query.inc/".$_REQUEST['page'].".".$_REQUEST['act'].".query.php")){
				include("query.inc/".$_REQUEST['page'].".".$_REQUEST['act'].".query.php");
			}
	}else{
			if(file_exists("query.inc/".$_REQUEST['page'].".query.php")){
				include("query.inc/".$_REQUEST['page'].".query.php");
			}
	}//END if(isset($_REQUEST['act']))					
}//END if(isset($_REQUEST['page']))
?>
<!DOCTYPE html>
<html lang="en">

   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo SURL;?>resources/images/favicon.ico" />
        <title><?php echo ADMIN_TITLE?></title>
		<?php include "script_include.php";?>
    
   </head>
  
	<body class="nav-md">
    <div class="container body">
        <div class="main_container">
        
		<!-- Page Left Sidebar -->
		<?php include ("include/sidebar.inc.php");?>
	
		
			<!-- Page Head -->
			<?php include ("include/header.inc.php");?>
			
			<!-- Page contents-->
			<?php 
					
					if(isset($_REQUEST['page'])){
							
							if(isset($_REQUEST['act'])){ 
							
									if(file_exists("page.inc/".$_REQUEST['page'].".".$_REQUEST['act'].".page.php"))
									{
										include("page.inc/".$_REQUEST['page'].".".$_REQUEST['act'].".page.php");
									}else{
										include("page.inc/error.page.php");
									}
									
							}else{ 
									if(file_exists("page.inc/".$_REQUEST['page'].".page.php")){
										include("page.inc/".$_REQUEST['page'].".page.php");
									}else{
										include("page.inc/error.page.php");
									}
							}
					}else{
					  		include("page.inc/home.page.php");
					}
			 ?>		
			<!-- Page footer-->
			<?php include ("include/footer.inc.php");?>			
			
		  </div>
    </div>
    
    
    <!-- Bootstrap -->
    <script src="<?php echo SURL?>resources/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   
  

   
    <script type="text/javascript" src="<?php echo SURL?>resources/js.calls/jquery.function.calls.js"></script>
   	 <script type="text/javascript" src="<?php echo SURL?>resources/js.calls/validation.js"></script>
    <!-- jquery.inputmask -->
    <script src="<?php echo SURL?>resources/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- /jquery.inputmask -->
    
    <!-- Checkbox, radio buttons design(border color,fill background when check) -->
    <!-- iCheck -->
    <script src="<?php echo SURL?>resources/vendors/iCheck/icheck.min.js"></script>
    <!-- /iCheck -->
    <!-- /Checkbox, radio... -->
    
    <!-- bootstrap-daterangepicker -->
    <!--<script src="<?php //echo SURL?>resources/vendors/moment/min/moment.min.js"></script>-->
    <script src="<?php echo SURL?>resources/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- /bootstrap-daterangepicker -->
    
    <!-- file upload fields js -->
    <!-- FastClick -->
    <script src="<?php echo SURL?>resources/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo SURL?>resources/vendors/nprogress/nprogress.js"></script>
    <!-- Dropzone.js -->
    <script src="<?php echo SURL?>resources/vendors/dropzone/dist/min/dropzone.min.js"></script>
    <!-- /file upload fields js --> 
      
    <!-- bootstrap text editor (like ckeditor) -->
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo SURL?>resources/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo SURL?>resources/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo SURL?>resources/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- /bootstrap-wysiwyg -->
    <!-- /bootstrap text editor (like ckeditor) -->
    
    <!-- ckeditor -->
    <!--<script type="text/javascript" src="<?php //echo SURL;?>/resources/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php //echo SURL;?>/resources/ckeditor/ckfinder/ckfinder.js"></script>-->
    <!-- /ckeditor -->
    
    <!-- jQuery Tags Input -->
    <script src="<?php echo SURL?>resources/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
   
    
    <!-- Datatables -->
    <script src="<?php echo SURL?>resources/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo SURL?>resources/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo SURL?>resources/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <!--<script src="<?php //echo SURL?>resources/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php //echo SURL?>resources/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php //echo SURL?>resources/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php //echo SURL?>resources/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php //echo SURL?>resources/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>-->
    <script src="<?php echo SURL?>resources/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo SURL?>resources/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo SURL?>resources/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo SURL?>resources/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script> 
    <!-- /Datatables -->
   
    <!-- form Validation -->
    <!-- Parsley -->
    <script src="<?php echo SURL?>resources/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- /Parsley -->
    <!-- /form Validation -->
    
    
     <!-- Left sidebar menu, left sidebar footer menu and other custom js functions -->
    <!-- Custom Theme Scripts -->
    <script src="<?php echo SURL?>resources/custom/js/custom.min.js"></script>
    <!-- /Custom Theme Scripts -->
    <!-- /Left sidebar menu, left... -->
    
    
    
</body>
  
</html>

