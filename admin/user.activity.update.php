<?php
session_start();
include("db_config.php");
date_default_timezone_set("Asia/Colombo");

if(isset($_POST["action"]) && isset($_SESSION['user_id'])) {
    if($_POST["action"] == "update_user_activity") {
        $last_activity = date('Y-m-d H:i:s');
        $sql_activity = "UPDATE tbl_users SET `last_activity` = '$last_activity' WHERE `user_id` = '{$_SESSION["user_id"]}'";
        $result_activity = mysqli_query($db, $sql_activity);
    }
}
?>