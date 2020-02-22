<?php

$district_id="";
$centre="";
$place="";
$gender="";

if (isset($_POST['add'])) {
    $district_id = $_POST['district_id'];    
    $centre = $_POST['centre'];
    $centre = str_replace("'","`",$centre);
    $place = $_POST['place'];
    $gender = $_POST['gender'];
    
    $error_return_value="district_id=".$district_id."&centre=".$centre."&place=".$place."&gender=".$gender;
    
    $query_check = "SELECT * FROM tbl_exam_centres WHERE centre_name = '$centre'";
    $results_check = mysqli_query($db,$query_check);

    if (mysqli_num_rows($results_check)==0) {
        $query_insert = "INSERT INTO tbl_exam_centres (`district_id`,`centre_name`,`place`,`gender`) VALUES('$district_id','$centre','$place','$gender')";
        mysqli_query($db, $query_insert);
    
        redirect("centre.add.php?district_id=".$district_id."&success=saved");
    }
    else {
        redirect('centre.add.php?error='.md5("already_exists_error").'&'.$error_return_value);
    }
}

?>