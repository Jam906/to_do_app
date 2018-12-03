<?php
session_start();

#######################
#
# Data Base Connection
#
#######################

//-----------------------------------------------------------------------//
//                  SERVER SEREVR SETTINGS                      		//
//-----------------------------------------------------------------------//              

/*define('DBHOST', 'localhost'); //Database Host Address
define('DBUSER', 'cps_dev_user'); //Database User Name 
define('DBPASS', 'l})L2x[*%u;W'); //Database Password     
define('DBNAME', 'db_to_do_app');*/

define('DBHOST', 'localhost'); //Database Host Address
define('DBUSER', 'root'); //Database User Name 
define('DBPASS', ''); //Database Password    
define('DBNAME', 'db_to_do_app');

/*-----------------------------------------------------------------------------------------------------------*/
//             					DATA BASE CONNECTIOM USING SERNVER SETTINGS					                 */
/*-----------------------------------------------------------------------------------------------------------*/
include('adodb5/adodb.inc.php');
$db = ADONewConnection('mysqli');
$db->Connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("Database not found! please install your application properly");


//-----------------------------------------------------------------------//
//                			  GENERAL SETTINGS       	                 //
//-----------------------------------------------------------------------// 

define('TITLE', ':: To Do Application ::');
define('ADMIN_TITLE',":: To Do Application Admin Control Panel ::");

$tblprefix= 'tbl_';
define('SECURITY_CHECK',"1");

define('SURL', 'http://'.$_SERVER['HTTP_HOST'].'/to_do_app/');
define('MYSURL', 'http://'.$_SERVER['HTTP_HOST'].'/to_do_app/');

$maxImageSize	= 6;
$maxvideoSize	= 100;

/*--------------------------------------------------------------------------*/
/*--       DIMENSSIONS AND DIRECTORY PATH OF USERS	    ----*/
/*--------------------------------------------------------------------------*/

$widthUsersImage	= 800;
$heightUsersImage	= 500;

$widthUserslTImage	= 240;
$heightUserlTImage	= 325;

/*$widthUsersMTImage	= 285;
$heightUserMTImage	= 195;*/
$widthUsersMTImage	= 260;
$heightUserMTImage	= 260;

$widthUsersSTImage	= 130;
$heightUserSTImage	= 132;


define('DirUsers', 'images_users/');
define('DirUsersSThmb', 'images_users/Sthumb/');
define('DirUsersMThmb', 'images_users/Mthumb/');
define('DirUsersLThmb', 'images_users/Lthumb/');

define('FDirUsers', 'images_users/');
define('FDirUsersSThmb', 'images_users/Sthumb/');
define('FDirUsersMThmb', 'images_users/Mthumb/');
define('FDirUsersLThmb', 'images_users/Lthumb/');





?>