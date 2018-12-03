<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    
    	<div class="clearfix"></div>
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                    <div class="x_title">
                    	<h2>Add To Do Task</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                            	<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <a href="<?php echo SURL;?>home.php?page=task&act=list" title="Manage To do Task" class="btn btn-info">Manage To Do Tasks</a>
                        </ul>
                        
                    	<div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                    	<br />
                    
						<?php if(isset($_REQUEST['okmsg']) || isset($_REQUEST['errmsg']) || isset($_SESSION['infomsg']["error"])) {
                        if(isset($_REQUEST['errmsg']))	$msg_class='alert alert-danger alert-dismissible fade in';
                        if(isset($_REQUEST['okmsg']))	$msg_class='alert alert-success alert-dismissible fade in';
                        ?>
                            <div class="<?php echo $msg_class;?>" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <?php echo '<ul>'.base64_decode($_REQUEST['okmsg']).base64_decode($_REQUEST['errmsg']).$_SESSION['infomsg']["error"].'</ul>'; ?>
                            </div>
                    	<?php unset($_SESSION['infomsg']["error"]); } ?>	
                    
                    
                    	<form action="" method="post" id="frmtodoadd" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    
                    	<!------------- ALL HIDDEN FIELDS AT THE TOP HERE -------------->
                    
                        <input type="hidden" name="page" value="task" />
                        <input type="hidden" name="act"  value="add"    />
                        <input type="hidden" name="mode" value="add" 	/>
                        
                        <!------------ END ALL HIDDEN FIELDS AT THE TOP HERE ------------>
                    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                           		 Title<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<input type="text" name="title" id="title" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['todotask_add_val']['title']; ?>" data-parsley-required required="required">
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            	Detail
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<?php  
									$ckeditor = new CKEditor();
									$ckeditor->basePath = '';
									$ckeditor->config['filebrowserBrowseUrl'] = '/ckfinder/ckfinder.html';
									$ckeditor->config['filebrowserImageBrowseUrl'] = '/adminCP/resources/ckeditor/ckfinder/ckfinder.html?type=Images';
									$ckeditor->config['filebrowserFlashBrowseUrl'] = '/adminCP/resources/ckeditor/ckfinder/ckfinder.html?type=Flash';
									$ckeditor->editor('detail',$_SESSION['todotask_add_val']['detail']);
                                ?>	
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                           		 Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	
                                <input type="text" id="task_date" name="task_date" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['todotask_add_val']['task_date']; ?>" data-parsley-required required="required">
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                           		 Time
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	
                                <input type="text" id="task_time" name="task_time" class="form-control col-md-7 col-xs-12" value="<?php echo $_SESSION['todotask_add_val']['task_time']; ?>">
                                
                            </div>
                        </div>
                        
                    	<div class="ln_solid"></div>
                        <div class="form-group">
                        	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                        		<button type="submit"  name="submit" value="Submit" class="btn btn-success">Submit</button>
                        	</div>
                        </div>
                    </form>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    
    
    </div>
</div>
    <!-- /page content -->
 
   <script>
   
     $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#frmtodoadd .btn').on('click', function() {
          $('#frmtodoadd').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#frmtodoadd').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
    </script>


