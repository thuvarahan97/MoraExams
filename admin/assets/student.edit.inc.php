<?php

if (!isset($_POST['update'])) {
    $index_no = $_GET['index_no'];

    $query = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $result = mysqli_query($db,$query);
    $total = mysqli_num_rows($result);
    if($total==0){
        redirect('students.php?error='.md5("not_found_error"));
    } else {
        $row = mysqli_fetch_assoc($result);

        $name = $row['name'];
        $subject_group_id = $row['subject_group_id'];
        $syllabus = $row['syllabus'];
        $medium = $row['medium'];
        $district_id_ranking = $row['district_id_ranking'];
        $district_ranking = $row['district_ranking'];
        $district_id_sitting = $row['district_id_sitting'];
        $centre_id = $row['centre_id'];
        $nic = $row['nic'];
        $gender = $row['gender'];
        $school = $row['school'];
        $address = $row['address'];
        $email = $row['email'];
        $telephone = $row['telephone'];
    }
} 
else if (isset($_POST['update'])) {
    $index_no = $_POST['index_no'];
    $index_no_new = $_POST['index_no_new'];

    if($total_students > 0) {
        while($row_students = mysqli_fetch_assoc($result_students)) {
            if(($index_no_new == $row_students['index_no']) && ($index_no_new != $index_no)) {
                redirect('student.edit.php?index_no='.$index_no.'&error='.md5("already_exists_error"));
                break;
            }
        }
    }
    
    $name = $_POST['name'];
    $subject_group_id = $_POST['subject_group_id'];
    $syllabus = $_POST['syllabus'];
    $medium = $_POST['medium'];
    $district_id_ranking = $_POST['district_id_ranking'];
    foreach($district_option as $dist_id => $dist_name) {
        if($dist_id == $district_id_ranking) {
            $district_ranking = $dist_name;
            break;
        }
    }
    $district_id_sitting = $_POST['district_id_sitting'];
    $centre_id = $_POST['centre_id'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $school = $_POST['school'];
    $school = str_replace("'","`",$school);
    $address = $_POST['address'];
    $address = str_replace("'","`",$address);
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $query_check = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $results_check = mysqli_query($db,$query_check);

    if (mysqli_num_rows($results_check)>0) {
        $query_update = "UPDATE tbl_students SET `index_no` = '$index_no_new', `name` = '$name', `subject_group_id` = '$subject_group_id', `syllabus` = '$syllabus', `medium` = '$medium', `district_id_ranking` = '$district_id_ranking', `district_ranking` = '$district_ranking', `district_id_sitting` = '$district_id_sitting', `centre_id` = '$centre_id', `nic` = '$nic', `gender` = '$gender', `school` = '$school', `address` = '$address', `email` = '$email', `telephone` = '$telephone' WHERE index_no = '$index_no'";
        $result_update = mysqli_query($db, $query_update);
        
        if($result_update) {
            redirect("students.php?success=updated");
        }
        else {
            redirect('students.php?error='.md5("update_failed"));
        }
    }
    else {
        redirect('students.php?error='.md5("not_found_error"));
    }
}

?>