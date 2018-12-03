<?php

/*--------------------------------------------------------------------------*/
/*--             Edit Profile AFTER FORM IS POSTED            			----*/
/*--------------------------------------------------------------------------*/
if(isset($_POST['submit']) && $_POST['mode'] == 'edit'){ 

		// TAKE VALUES OF HIDDEN ELEMENTS OF THE FORM
		
		$check			= true;
		
		$page			= addslashes($_POST['page']);
		$act			= addslashes($_POST['act']);
		$mode			= addslashes($_POST['mode']);
		$id				= addslashes($_POST['id']);
		$encoded_id		= base64_encode($id);

        // TAKE VALUES OF ELEMENTS OF THE FORM THAT ARE NOT HIDDEN
		$first_name 			= addslashes($_POST['first_name']);
		$last_name 				= addslashes($_POST['last_name']);
		$phone_no          		= addslashes($_POST['phone']);
		$about_me				= addslashes($_POST['about_me']);
		
		if($_POST['first_name'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Enter the First Name.</li>';
				$check  = false;
		}
		if($_POST['last_name'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Enter the Last Name.</li>';
				$check  = false;
		}
		
		
		if($check == true){
			
		$sql = "UPDATE ".$tblprefix."users SET
											first_name 			= '".$first_name."',
											last_name 			= '".$last_name."',
											phone_no 		    = '".$phone_no."',
											about_me 		    = '".$about_me."'							
											WHERE 	id 		    = ".$_SESSION["sess_user_info"]["id"]."";
											
												
									
		$rs = $db->Execute($sql);		
		
		  if($rs){
			  unset($_SESSION['infomsg']["error"]);
			  $msg=base64_encode("Recorde Updated successfully.");
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


$qry_profile 	= "SELECT * FROM ".$tblprefix."users where id='".$_SESSION["sess_user_info"]["id"]."'";
$rs_profile		= $db->Execute($qry_profile);

?>