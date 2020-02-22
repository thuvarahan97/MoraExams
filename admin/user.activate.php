<?php
include_once("header.php");

$user_id = $_GET['user_id'];

$query_check = "SELECT * FROM tbl_users WHERE `user_id` = '$user_id'";
$results_check = mysqli_query($db,$query_check);

if (mysqli_num_rows($results_check)>0) {
    $query_update = "UPDATE tbl_users SET `status` = '1' WHERE `user_id` = '$user_id'";
    $result_update = mysqli_query($db, $query_update);
    
    if($result_update) {
        redirect("users.php?success=activated");
    }
    else {
        redirect('users.php?error='.md5("activate_failed"));
    }
}
else {
    redirect('users.php?error='.md5("not_found_error"));
}

include_once("footer.php");
?>