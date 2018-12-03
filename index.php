<?php
include('include/siteconfig.inc.php');
include('include/sitefunction.inc.php');
error_reporting(0); 

if(isset($_SESSION['sess_user_info'])){
	header('Location: home.php?page=home');
	exit;

}

/*--- Sign In----*/
if(isset($_POST["submit"]) && $_POST["submit"]=='Sign In'){
	
		$sql = "SELECT * FROM ".$tblprefix."users WHERE email='".mysql_escape_string($_POST['email'])."' and password = '".mysql_escape_string(md5($_POST['password']))."'";
		$rs = $db->Execute($sql);
		$isrs = $rs->RecordCount();
		
		if($isrs >0){
			$_SESSION["sess_user_info"]["id"]	            = $rs->fields['id'];
			$_SESSION["sess_user_info"]["first_name"]	    = $rs->fields['first_name'];
		    $_SESSION["sess_user_info"]["last_name"]	    = $rs->fields['last_name'];
			$_SESSION["sess_user_info"]["email"]	        = $rs->fields['email'];
			
			header('Location: home.php?page=home');
			exit;
						
		}else{
			$msg=base64_encode("Invalid email or password");
			header("Location: index.php?msg=$msg&msgtyp=alert-danger");
			exit;
		}
}

/*--- Sign Up----*/
if(isset($_POST["submit"]) && $_POST["submit"]=='Sign Up'){
		
			$first_name	    = addslashes(trim($_POST["first_name"]));
			$last_name	 	= addslashes(trim($_POST["last_name"]));
			
			$email          = addslashes(trim($_POST["email"]));
			$password       = addslashes(trim($_POST["password"]));
			
			$qry_user 	= "SELECT email FROM ".$tblprefix."users WHERE email = '".$email."'";
			$res_user	= $db	-> GetRow($qry_user);	
			
				  if($res_user['email']==''){
					  
				     $qyr_insert	= "INSERT INTO ".$tblprefix."users SET 
																	first_name 	    = '".$first_name."',
																	last_name		= '".$last_name."',
																	email		    = '".$email."',
																	password	    = '".md5($password)."'
																	";
									
					  $rs_insert	= $db -> Execute($qyr_insert);
					  $user_id	    = $db->Insert_ID();
					  
					  $_SESSION["sess_user_info"]["id"]	            = $user_id;
					  $_SESSION["sess_user_info"]["first_name"]	    = $first_name;
					  $_SESSION["sess_user_info"]["last_name"]	    = $last_name;
					  $_SESSION["sess_user_info"]["email"]	        = $email;
					  
					  header('Location: home.php?page=home');
					  exit;
				 }
				 
				 else{
					 $msg=base64_encode("This user is already exit.");
					 header("Location: index.php?msg=$msg&msgtyp=alert-danger");
					 exit;
				 }
				
				
			
	}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To Do Application </title>

    <!-- Bootstrap -->
    <link href="<?php echo SURL;?>resources/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo SURL;?>resources/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo SURL;?>resources/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo SURL;?>resources/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo SURL;?>resources/custom/css/custom.min.css" rel="stylesheet">

     <!-- jQuery -->
    <script src="<?php echo SURL?>resources/vendors/jquery/dist/jquery.min.js"></script>

    <!-- form Validation -->
    <!-- Parsley -->
     <script src="<?php echo SURL?>resources/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- /Parsley -->
    <!-- /form Validation -->
    
      </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
      
      <!--- Login Form -->
      
        <div class="animate form login_form">
          <section class="login_content" id="login-content">
            <form action="index.php" method="post" name="loginform" id="loginform" data-parsley-validate>
			
              <h1>Login Form</h1>
              
              <?php if(isset($_REQUEST['msg'])) {?>
					<div class="<?php echo "alert ".$_REQUEST['msgtyp']." " ?>alert-dismissible fade in">
						
							<?php echo base64_decode($_REQUEST['msg']); ?>
						
					</div>
			  <?php } ?>
              
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" data-parsley-required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" data-parsley-required />
                
              </div>
              <div>
                <input class="btn btn-default" type="submit" value="Sign In" name="submit" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>To Do Application</h1>
                  <p>© Copyright 2018</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        
        <!--- Registration Form -->
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="" id="log-in" method="post" data-parsley-validate>
              <h1>Create Account</h1>
              
              
              <?php if(isset($_REQUEST['msg'])) {?>
					<div class="<?php echo "alert ".$_REQUEST['msgtyp']." " ?>alert-dismissible fade in">
						
							<?php echo base64_decode($_REQUEST['msg']); ?>
						
					</div>
			  <?php } ?>
              
              <div>
                <input type="text" class="form-control" placeholder="First Name" id="first_name"  name="first_name"  data-parsley-required />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" data-parsley-required />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email" data-parsley-required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" data-parsley-required />
              </div>
              <div>
                
                <input class="btn btn-default" type="submit" value="Sign Up" name="submit" />
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>To Do Application</h1>
                  <p>© Copyright 2018</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

