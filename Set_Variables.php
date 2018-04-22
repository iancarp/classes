<?php
////////////////////////////////////////////////////////////////////////////////
// Title:     SET Variables                                     			  //
// Author:    Ian Carpenter                                                   //
// Filename:  SET_Variables.php                                              //
//                                                                            //
// History      Version     Comments                                          //
// ========================================================================== //
// 04/11/2006    0.01       First release is this script                  	  //
////////////////////////////////////////////////////////////////////////////////
//session_start();
//date_default_timezone_set('Europe/London');

if ($_POST){ // Sets session variable
	foreach ($_POST as $key => $value)   {
		$_SESSION[$key]=$value;
		$error=0;
	}
}

if ($_GET){ // Sets session variable
	foreach ($_GET as $key => $value)   {
		$_SESSION[$key]=$value;
		$error=0;
	}
}
/**/
if (!$_SESSION)   { // Set defaults session variables
	default_data();
}
foreach ($_SESSION as $key => $value)   { // create variables $start_month, $start_day etc...
	$$key = $value;
}
// If start end time is less than start time throw error!
if (mktime('0','0','0',$_SESSION['start_month'],$_SESSION['start_day'],$_SESSION['start_year'])<=
	mktime('0','0','0',$_SESSION['end_month'],$_SESSION['end_day'],$_SESSION['end_year'])){
	$message="Log data requested from $start_month/$start_day/$start_year
				to $end_month/$end_day/$end_year";
	}
else {
    default_data();
    $message="The end date cannot be less than the start date please try again...";
    $error=1;
	}

function default_data(){

	//$_SESSION['channel']='%';
	$_SESSION['start_day']=date('d');
	$_SESSION['start_month']=date('m');
	$_SESSION['start_year']=date('Y');
	$_SESSION['end_day']=date('d');
	$_SESSION['end_month']=date('m');
	$_SESSION['end_year']=date('Y');
}
?>
