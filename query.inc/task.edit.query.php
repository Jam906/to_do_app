<?php

/*--------------------------------------------------------------------------*/
/*--             Update task AFTER FORM IS POSTED             			    ----*/
/*--------------------------------------------------------------------------*/
if(isset($_POST['submit']) && $_POST['mode'] == 'edit'){ 
	
	$check			= true;
				
	// TAKE VALUES OF HIDDEN ELEMENTS OF THE FORM
	$page			= addslashes($_POST['page']);
	$act			= addslashes($_POST['act']);
	$mode			= addslashes($_POST['mode']);
	$id				= addslashes($_POST['id']);
		
	$encoded_id		= base64_encode($id);

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
		
		
		$qry_insert = "UPDATE ".$tblprefix."to_do_tasks SET
													 title				    = '".$title."',
													 detail		            = '".$detail."',
													 task_date			    = '".$task_date."',
													 task_time			    = '".$task_time."'
													 
													 WHERE 	id 		= $id";
		$rs 		= $db->Execute($qry_insert);
			
		if($rs){
			unset($_SESSION['infomsg']["error"]);		
			$msg=base64_encode("Record Updated successfully.");
			header("Location: home.php?page=$page&act=$act&id=$encoded_id&okmsg=$msg");
			exit;	
		}else{
			$msg=base64_encode("Error occured in data insertion. Try again.");
			header("Location: home.php?page=$page&act=$act&id=$encoded_id&errmsg=$msg");
			exit;
		}//if($rs)
	
	}
	
	else{
	    header("Location: home.php?page=$page&act=$act&id=$encoded_id&errmsg=$msg");
		exit;	
	}
		
}

$qry_task 	    = "SELECT * FROM ".$tblprefix."to_do_tasks WHERE id = ".base64_decode($_REQUEST['id'])." and user_id = ".$_SESSION["sess_user_info"]["id"]."";
$res_task	    = $db	-> GetRow($qry_task);
?>
