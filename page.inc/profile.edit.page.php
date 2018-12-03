<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
         
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Profile</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                
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
                            
                            
                            <form action="" method="post" id="profile-edit-form" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            
                            <!------------- ALL HIDDEN FIELDS AT THE TOP HERE -------------->
                
                            <input type="hidden" name="page" value="profile" />
                            <input type="hidden" name="act"  value="edit"    />
                            <input type="hidden" name="mode" value="edit" 	/>
                                
                            <!------------ END ALL HIDDEN FIELDS AT THE TOP HERE ------------>
                            
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        First Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="first_name" id="first_name" data-parsley-required class="form-control col-md-7 col-xs-12"  value="<?php echo $rs_profile->fields['first_name']?>">
                                    </div>
                                 </div>
                                 
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="last_name" id="last_name" data-parsley-required class="form-control col-md-7 col-xs-12"  value="<?php echo $rs_profile->fields['last_name'];?>">
                                    </div>
                                 </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Phone
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="phone" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '+99-9999999'" name="phone" value="<?php echo $rs_profile->fields['phone_no'];?>"/>
                                
                                   </div>
                                </div>
                                
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">About Me</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="resizable_textarea form-control" name="about_me" id="about_me"><?php echo $rs_profile->fields['about_me'];?></textarea>
                                 </div>
                               </div>
                               
                              
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                       
                                        <button type="submit"  name="submit" value="Update" class="btn btn-success">Update</button>
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
        $('#profile-edit-form .btn').on('click', function() {
          $('#profile-edit-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#profile-edit-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
    </script>
  



