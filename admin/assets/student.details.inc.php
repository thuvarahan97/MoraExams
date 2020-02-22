<?php
$total = 0;
if (isset($_POST['view'])) {
    $index_no = $_POST['index_no'];

    $query = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $result = mysqli_query($db,$query);
    $total = mysqli_num_rows($result);
    if($total==0){
        redirect('student.details.php?error='.md5("not_found_error"));
    } else {
        redirect("student.details.php?index_no=$index_no");
    }
}

if (isset($_GET['index_no'])) {
    $index_no = $_GET['index_no'];

    $query = "SELECT * FROM tbl_students WHERE index_no = '$index_no'";
    $result = mysqli_query($db,$query);
    $total = mysqli_num_rows($result);
    if($total==0){
        redirect('student.details.php?error='.md5("not_found_error"));
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

?>