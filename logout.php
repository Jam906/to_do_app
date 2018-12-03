<?php
include('file_include.php');
if(isset($_SESSION['sess_user_info'])){
	unset($_SESSION['sess_user_info']);
	$msg=base64_encode("You have successfully logged out.");
	header("Location:".SURL."index.php?msg=$msg&msgtyp=alert-success");
	exit;
}
?>