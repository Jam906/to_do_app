<?php

/*--------------------------------------------------------------------------*/
/*--              Edit Login Profile AFTER FORM IS POSTED            	----*/
/*--------------------------------------------------------------------------*/
if(isset($_POST['submit']) && $_POST['mode'] == 'edit'){ 

		// TAKE VALUES OF HIDDEN ELEMENTS OF THE FORM
		
		$check			= true;
		
		$page			= addslashes($_POST['page']);
		$act			= addslashes($_POST['act']);
		$mode			= addslashes($_POST['mode']);
		$id				= addslashes($_POST['id']);
		
		$encoded_id		= base64_encode($id);
		$encoded_lid	= base64_encode($lid);

        // TAKE VALUES OF ELEMENTS OF THE FORM THAT ARE NOT HIDDEN
		$email 	    = addslashes($_POST['email']);
		$password 	= addslashes(md5($_POST['password']));
		
		if($_POST['email'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Enter the Email.</li>';
				$check  = false;
		}
		if($_POST['password'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Enter your new Password.</li>';
				$check  = false;
		}
		
		if($_POST['repassword'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Re-Enter your new Password.</li>';
				$check  = false;
		}
		
		if($_POST['password'] != '' && $_POST['repassword'] != ''){
			
			if($_POST['repassword'] != $_POST['password']){
				$_SESSION['infomsg']["error"]	.= '<li>- Please enter same password in Re-type password field.</li>';
				$check  = false;
			}
		}
		
		if($check == true){
		
		$sql = "UPDATE ".$tblprefix."users SET
											email = '".$email."',
											password = '".$password."'
						
											WHERE id = '".$_SESSION["sess_user_info"]["id"]."'";
		$rs = $db->Execute($sql);
		
		
		  if($rs){
			  unset($_SESSION['infomsg']["error"]);
			  $msg=base64_encode("Record Updated successfully.");
			  header("Location: home.php?page=$page&act=$act&okmsg=$msg");
			  exit;
		  }else{
			 	
			  $msg=base64_encode("Error occured in data insertion. Try again.");
			  header("Location: home.php?page=$page&act=$act&errmsg=$msg");
			  exit;
		  }//if($rs)
		
		}else{
			header("Location: home.php?page=$page&act=$act&errmsg=$msg");
			exit;	
		}
		
}

$qry_loginprofile 	= "SELECT * FROM ".$tblprefix."users WHERE id ='".$_SESSION["sess_user_info"]["id"]."'";
$rs_loginprofile	= $db->Execute($qry_loginprofile);

?>