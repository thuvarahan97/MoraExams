<?php
include_once("header.php");

$index_no=$_GET['index_no'];
$subject_num = $_GET['subject'];
$part = $_GET['part'];
$subject_index = $_GET['subject_index'];
$sub_checked = $_GET['sub_checked'];
$sub_checked_by = $_GET['sub_checked_by'];

$user_id = $_SESSION['user_id'];
$checked = "1";

$query_check = "SELECT D.* FROM tbl_students A, tbl_marks D WHERE A.index_no = '$index_no' AND A.index_no = D.index_no";
$results_check = mysqli_query($db,$query_check);

if (mysqli_num_rows($results_check)==1) {

    $row_check = mysqli_fetch_assoc($results_check);

    if(($row_check[$sub_checked] == '') || ($row_check[$sub_checked] == '0')) {
            
        $query_update = "UPDATE tbl_marks SET `$sub_checked` = '$checked', `$sub_checked_by` = '$user_id' WHERE `index_no` = '$index_no'";
        $result_update = mysqli_query($db, $query_update);
    
        if($result_update) {
            redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&success=checked');
        }
        else {
            redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&error='.md5("check_failed"));
        }
    } else {
        redirect('marks.details.php?subject='.$subject_num.'&part='.$part.md5("already_checked_error"));
    }
}
else {
    redirect('marks.details.php?subject='.$subject_num.'&part='.$part.md5("not_found_error"));
}

include_once("footer.php");
?>