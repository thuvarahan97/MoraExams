<?php
ob_start();
session_start();
include_once("db_config.php");
date_default_timezone_set("Asia/Colombo");

function getUserIpAddress(){
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		//ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		//ip pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

if(isset($_SESSION['user_id']))
{
	$logout_time = date('Y-m-d H:i:s');
	$ip_address = getUserIpAddress();

	$sql = "SELECT * FROM tbl_login_history WHERE `user_id` = '{$_SESSION['user_id']}' AND ip_address = '$ip_address' ORDER BY id DESC LIMIT 1";
	$result = mysqli_query($db, $sql);
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
	}

	$sql_logout = "UPDATE tbl_login_history SET logout_time = '$logout_time' WHERE id = '{$row['id']}' AND `user_id` = '{$_SESSION['user_id']}' AND ip_address = '$ip_address'";
	mysqli_query($db,$sql_logout);
				
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	unset($_SESSION['user_status']);
    header("Location:index.php");
}
else
{
	header("Location:index.php");
}

ob_end_flush();
?>