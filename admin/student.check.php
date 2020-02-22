<?php
include_once("header.php");

$index_no = $_GET['index_no'];
$checked_by = $_SESSION['user_id'];
$checked_datetime = date('Y-m-d H:i:s');

$query_check = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
$results_check = mysqli_query($db,$query_check);

if (mysqli_num_rows($results_check)>0) {
    $query_checked = "UPDATE tbl_students SET `checked` = '1', `checked_by` = '$checked_by', `checked_datetime` = '$checked_datetime' WHERE index_no = '$index_no'";
    $result_checked = mysqli_query($db, $query_checked);
    
    if($result_checked) {
        redirect("students.php?success=checked");
    }
    else {
        redirect('students.php?error='.md5("check_failed"));
    }
}
else {
    redirect('students.php?error='.md5("not_found_error"));
}

include_once("footer.php");
?>