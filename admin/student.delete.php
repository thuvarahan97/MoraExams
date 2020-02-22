<?php
include_once("header.php");

$index_no = $_GET['index_no'];

$query_check = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
$results_check = mysqli_query($db,$query_check);

if (mysqli_num_rows($results_check)>0) {
    $query_delete = "DELETE FROM tbl_students WHERE index_no = '$index_no'";
    $result_delete = mysqli_query($db, $query_delete);
    
    if($result_delete) {
        redirect("students.php?success=deleted");
    }
    else {
        redirect('students.php?error='.md5("delete_failed"));
    }
}
else {
    redirect('students.php?error='.md5("not_found_error"));
}

include_once("footer.php");
?>