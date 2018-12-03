<?php

/*--------------------------------------------------------------------------*/
/*--             Add Tasks AFTER FORM IS POSTED             			    ----*/
/*--------------------------------------------------------------------------*/
if(isset($_POST['submit']) && $_POST['mode'] == 'add'){ 
	
	$check			= true;
	// TAKE VALUES OF HIDDEN ELEMENTS OF THE FORM
	$page			= addslashes($_POST['page']);
	$act			= addslashes($_POST['act']);
	$mode			= addslashes($_POST['mode']);

    // TAKE VALUES OF ELEMENTS OF THE FORM THAT ARE NOT HIDDEN
	$title   		= addslashes($_POST['title']);
	$detail   		= addslashes($_POST['detail']);
	$task_date   	= addslashes($_POST['task_date']);
	$task_time      = addslashes($_POST['task_time']);
	
	if($_POST['title'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Enter the Title.</li>';
				$check  = false;
	}
	if($_POST['task_date'] == ''){
				$_SESSION['infomsg']["error"]	.= '<li>- Please Select the Date.</li>';
				$check  = false;
	}
    
	if($check == true){
		
		$qry_insert = "INSERT INTO ".$tblprefix."to_do_tasks SET
													 user_id				= '".$_SESSION["sess_user_info"]["id"]."',
													 title				    = '".$title."',
													 detail		            = '".$detail."',
													 task_date			    = '".$task_date."',
													 task_time			    = '".$task_time."',
													 status			        = 0";
													 
		$rs 		= $db->Execute($qry_insert);
			
		if($rs){
			unset($_SESSION['todotask_add_val']);
			unset($_SESSION['infomsg']["error"]);		
			$msg=base64_encode("Record added successfully.");
			header("Location: home.php?page=$page&act=$act&okmsg=$msg");
			exit;	
		}else{
			
			$_SESSION['todotask_add_val']['title']					        = $_POST["title"];
			$_SESSION['todotask_add_val']['detail']					        = $_POST["detail"];
			$_SESSION['todotask_add_val']['task_date']			            = $_POST["task_date"];
			$_SESSION['todotask_add_val']['task_time']				        = $_POST["task_time"];
			
			$msg=base64_encode("Error occured in data insertion. Try again.");
			header("Location: home.php?page=$page&act=$act&errmsg=$msg");
			exit;
		}//if($rs)
	
	}
	
	else{
	     
		$_SESSION['todotask_add_val']['title']					        = $_POST["title"];
		$_SESSION['todotask_add_val']['detail']					        = $_POST["detail"];
		$_SESSION['todotask_add_val']['task_date']			            = $_POST["task_date"];
		$_SESSION['todotask_add_val']['task_time']				        = $_POST["task_time"];
	
		header("Location: home.php?page=$page&act=$act&errmsg=$msg");
		exit;	
	}
		
}
?>