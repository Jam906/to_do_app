<?php


/*--------------------------------------------------------------------------*/
/*--         Change Status Of Tasks                		    	----*/
/*--------------------------------------------------------------------------*/
if(isset($_GET['mode']) && $_GET['mode'] == 'sts'){  
		// TAKE VALUES OF HIDDEN ELEMENTS OF THE FORM
		$page			= addslashes($_GET['page']);
		$mode			= addslashes($_GET['mode']);
		$sts			= addslashes($_GET['sts']);
		
		
        // TAKE VALUES OF ELEMENTS OF THE FORM THAT ARE NOT HIDDEN
		$id				= base64_decode($_REQUEST['id']);
		
		if($sts == 'complete'){
		
			$qry_update	=	"UPDATE ".$tblprefix."to_do_tasks SET 	
																status 	= 1 
														WHERE 	id		= ".$id;
																  
			$rs_update	=	$db->Execute( $qry_update );
		
		}
		if($sts == 'pending'){
		
			$qry_update	=	"UPDATE ".$tblprefix."to_do_tasks SET 
																status	= 0 
														WHERE	id 		= ".$id;
			$rs_update	=	$db->Execute( $qry_update );
		}
		if($rs_update){
				
				$msg=base64_encode("Task Status has been changed successfully.");
				header("Location: home.php?page=$page&act=list&okmsg=$msg&msgtyp=success");
				exit;
		}else{
				$msg=base64_encode("Error occured in data updation. ");
				header("Location: home.php?page=$page&act=list&errmsg=$msg&msgtyp=error");
				exit;
		}
} 


/*--------------------------------------------------------------------------*/
/*--          DELETE A SINGLE RECROD                    		    	----*/
/*--------------------------------------------------------------------------*/
if(isset($_GET['mode']) && $_GET['mode'] == 'del'){  
	
	// TAKE VALUES OF HIDDEN ELEMENTS OF THE FORM 
	$page			= addslashes($_GET['page']);
	$act			= addslashes($_GET['act']);
	$mode			= addslashes($_GET['mode']);
	$date			= date('Y-m-d');

    // TAKE VALUES OF ELEMENTS OF THE FORM THAT ARE NOT HIDDEN
	$dc_id				= base64_decode($_GET['id']);
	
	$rs = $db->Execute("DELETE FROM ".$tblprefix."to_do_tasks WHERE id =".$dc_id ); 		
	
		if($rs){
			
			$msg=base64_encode("Task has been deleted successfully.");
			header("Location: home.php?page=$page&act=$act&okmsg=$msg&msgtyp=success");
			exit;
		}else{
			$msg=base64_encode("Error occured in data deletion. ");
			header("Location: home.php?page=$page&act=$act&errmsg=$msg&msgtyp=error");
			exit;
		}
		
} 

$qry_select	= "SELECT * FROM ".$tblprefix."to_do_tasks where user_id='".$_SESSION["sess_user_info"]["id"]."' order by task_date ASC";
$rs			= $db->Execute($qry_select);
$total_agents	= $rs	-> RecordCount();

?>