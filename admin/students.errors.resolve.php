<?php
include_once("header.php");

if($_SESSION['user_status'] == 2) {

    $index_no = $_GET['index_no'];
    $user_id = $_SESSION['user_id'];
    $datetime = date('Y-m-d H:i:s');

    $query_check = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $results_check = mysqli_query($db,$query_check);

    if (mysqli_num_rows($results_check)>0) {
        $query_resolved = "UPDATE tbl_students SET `user_id` = '$user_id', `datetime` = '$datetime' WHERE index_no = '$index_no'";
        $result_resolved = mysqli_query($db, $query_resolved);
        
        if($result_resolved) {
            redirect("students.errors.php?success=resolved");
        }
        else {
            redirect('studentserrors.php?error='.md5("resolve_failed"));
        }
    }
    else {
        redirect('students.errors.php?error='.md5("not_found_error"));
    }

} else {
    redirect("students.php");
}

include_once("footer.php");
?>