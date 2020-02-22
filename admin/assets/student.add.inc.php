<?php

$district_option = array(
    '1' => 'Ampara',
    '2' => 'Anuradhapura',
    '3' => 'Badulla',
    '4' => 'Batticaloa',
    '5' => 'Colombo',
    '6' => 'Galle',
    '7' => 'Gampaha',
    '8' => 'Hambantota',
    '9' => 'Jaffna',
    '10' => 'Kalutara',
    '11' => 'Kandy',
    '12' => 'Kegalle',
    '13' => 'Kilinochchi',
    '14' => 'Kurunegala',
    '15' => 'Mannar',
    '16' => 'Matale',
    '17' => 'Matara',
    '18' => 'Monaragala',
    '19' => 'Mullaitivu',
    '20' => 'Nuwara-Eliya',
    '21' => 'Polonnaruwa',
    '22' => 'Puttalam',
    '23' => 'Ratnapura',
    '24' => 'Trincomalee',
    '25' => 'Vavuniya'
);

$student_id="";
$index_no="";
$name="";
$subject_group_id="";
$syllabus="";
$medium="";
$district_id_ranking="";
$district_ranking="";
$district_id_sitting="";
$centre_id="";
$nic="";
$gender="";
$school="";
$address="";
$email="";
$telephone="";
$datetime="";
$user_id="";
$checked="";
$checked_by="";
$checked_datetime="";


if (isset($_POST['add'])) {

    $student_id = "STD".time();
    $index_no = $_POST['index_no'];
    $name = ucwords($_POST['name']);
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
    $nic = strtoupper($_POST['nic']);
    $gender = $_POST['gender'];
    $school = ucwords($_POST['school']);
    $school = str_replace("'","`",$school);
    $address = ucwords($_POST['address']);
    $address = str_replace("'","`",$address);
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $datetime = date('Y-m-d H:i:s');
    $user_id = $_SESSION['user_id'];
    $checked = "0";

    $query_check = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $results_check = mysqli_query($db,$query_check);

    if (mysqli_num_rows($results_check)==0) {
        $query_insert = "INSERT INTO tbl_students (`student_id`, `index_no`, `name`, `subject_group_id`, `syllabus`, `medium`, `district_id_ranking`, `district_ranking`, `district_id_sitting`, `centre_id`, `nic`, `gender`, `school`, `address`, `email`, `telephone`, `datetime`, `user_id`, `checked`, `checked_by`, `checked_datetime`) VALUES ('$student_id', '$index_no', '$name', '$subject_group_id', '$syllabus', '$medium', '$district_id_ranking', '$district_ranking', '$district_id_sitting', '$centre_id', '$nic', '$gender', '$school', '$address', '$email', '$telephone', '$datetime', '$user_id', '$checked', '$checked_by', '$checked_datetime')";
        $result_insert = mysqli_query($db, $query_insert);
        
        if($result_insert) {
            redirect("student.add.php?success=saved");
        } 
        else {
            redirect('student.add.php?error='.md5("failed"));
        }
    }
    else {
        redirect('student.add.php?error='.md5("already_exists_error"));
    }
}

?>