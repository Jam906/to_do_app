<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            
            <div class="clearfix"></div>
            <div class="row" style="min-height:577px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Login Credentials</h2>
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
                            
                            
                            <form action="" method="post" name="login-profile-form" id="login-profile-form" data-parsley-validate class="form-horizontal form-label-left">
                            
                <!------------------------------ALL HIDDEN FIELDS AT THE TOP HERE     -------------------------------->
							
							<input type="hidden" name="page" value="loginprofile" />
							<input type="hidden" name="act"  value="edit"    />
							<input type="hidden" name="mode" value="edit" 	/>
								
			    <!----------------------------- END ALL HIDDEN FIELDS AT THE TOP HERE -------------------------------->
                                
                            <!------------ END ALL HIDDEN FIELDS AT THE TOP HERE ------------>
                            
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" id="email" data-parsley-required class="form-control col-md-7 col-xs-12"  value="<?php echo $rs_loginprofile->fields['email'];?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="password" id="password" data-parsley-required class="form-control col-md-7 col-xs-12" 
                                        
                                        data-parsley-errors-container=".errorspannewpassinput"
                                        data-parsley-required-message="Please enter your new password."
                                        >
   										<span class="errorspannewpassinput"></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Re-type password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="repassword" id="repassword" data-parsley-required class="form-control col-md-7 col-xs-12" 
                                        data-parsley-errors-container=".errorspanconfirmnewpassinput"
                                        data-parsley-required-message="Please re-enter your new password."
                                        data-parsley-equalto="#password">
                                        <span class="errorspanconfirmnewpassinput"></span>
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
        $('#login-profile-form .btn').on('click', function() {
          $('#login-profile-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#login-profile-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
    </script>