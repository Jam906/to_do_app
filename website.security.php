<?php
if(!isset($_SESSION['sess_user_info'])){
	$msg=base64_encode("Unauthorize Access! Please Login.");
	header("Location: index.php?msg=$msg&msgtyp=error");
	exit;
}
?>