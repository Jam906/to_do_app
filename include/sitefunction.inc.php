<?php
/********************************************************
* File Name: sitefunction.php	                        *
*												      	*
* File Description: Common PHP functions defined here   *
*												        * 
* Created Date: 11-Nov-2016     					    *
* 													    *
* File Created By: Tayyab Minhas                        *
* 												        *
* Modify Date: 11-Nov-2016                              *
*                       						        *
* Modified By: Tayyab Minhas 							*
*********************************************************/

// php function to get user's full location





function genTransactionNo() {
    
 global $db;
 
 $intlength = 15;
 $integers = '012345'.date("Ymdhis");
    $string = '';    

 for ($p = 0; $p < $intlength; $p++) {
        $string .= $integers[mt_rand(0, strlen($integers))];
    }
	
 
 $qry_transaction_no = "SELECT * FROM tbl_transaction WHERE transaction_id = '".$string."'";
 $rs_transaction_no = $db -> Execute($qry_transaction_no);
 $total_record  = $rs_transaction_no -> RecordCount();

    if($total_record > 0){
  genTransactionNo();
 }else{
  return $string;
 }
}

?>
