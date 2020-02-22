<?php

$subject_option = array(
    '01' => 'Physics',
    '02' => 'Chemistry',
    '09' => 'Biology',
    '10' => 'Combined Mathematics',
    '20' => 'Information and Communication Technology'
);

$subject_num = "";
$subject_name = "";
if(isset($_GET['subject'])) {
    foreach($subject_option as $subj_num => $subj_name) {
        if($subj_num == $_GET['subject']) {
            $subject_num = $subj_num;
            $subject_name = $subj_name;
            break;
        }
    }
}


$part = "";
$part_num ="";
if(isset($_GET['part'])) {
    if($_GET['part']=='1'){
        $part = '1';
        $part_num = 'I';
    }
    else if($_GET['part']=='2'){
        $part = '2';
        $part_num = 'II';
    }
}


$index_no = "";

$total = 0;
if (isset($_POST['view'])) {
    $index_no = $_POST['index_no'];
    
    if(isset($_POST['subject'])) {
        foreach($subject_option as $subj_num => $subj_name) {
            if($subj_num == $_POST['subject']) {
                $subject_num = $subj_num;
                $subject_name = $subj_name;
                break;
            }
        }
    }

    if(isset($_POST['part'])) {
        if($_POST['part']=='1'){
            $part = $_POST['part'];
            $part_num = 'I';
        }
        else if($_POST['part']=='2'){
            $part = $_POST['part'];
            $part_num = 'II';
        }
    }

    $query = "SELECT A.name, D.*, B.subject1_number, B.subject2_number, B.subject3_number, C.stream FROM tbl_students A, tbl_subjects B, tbl_streams C, tbl_marks D WHERE A.index_no = D.index_no AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND (B.subject1_number = '$subject_num' OR B.subject2_number = '$subject_num' OR B.subject3_number = '$subject_num') AND A.index_no = '$index_no'";
    $results = mysqli_query($db,$query);
    $total = mysqli_num_rows($results);

    if ($total==1) {

        $row = mysqli_fetch_assoc($results);

        $subject1_number = $row['subject1_number'];
        $subject2_number = $row['subject2_number'];
        $subject3_number = $row['subject3_number'];

        if ($subject_num == $subject1_number) {
            $sub = '1';
        } else if ($subject_num == $subject2_number) {
            $sub = '2';
        } else if ($subject_num == $subject3_number) {
            $sub = '3';
        } else {
            $sub = '';
        }
        
        if($sub != '') {

            $sub_index1 = 'subject'.$sub.'_part'.$part;
            $sub_index2 = 'sub'.$sub.'_p'.$part;
            $sub_checked_by = $sub_index2.'_checked_by';
            $sub_checked = $sub_index2.'_checked';

            if(empty($row[$sub_index1])) {
                redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&error='.md5("not_entered_error"));
            } else {
                redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&index_no='.$index_no.'&subject_index='.$sub_index1.'&sub_checked='.$sub_checked.'&sub_checked_by='.$sub_checked_by);
            }
        } else {
            redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&error='.md5("stream_error"));
        }
    }
    else {
        redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&error='.md5("not_found_error"));
    }
}


if (isset($_GET['index_no'])) {
    $index_no = $_GET['index_no'];
    $subject_index = $_GET['subject_index'];
    $sub_checked = $_GET['sub_checked'];
    $sub_checked_by = $_GET['sub_checked_by'];

    $query = "SELECT A.name, D.*, B.subject1_number, B.subject2_number, B.subject3_number, C.stream FROM tbl_students A, tbl_subjects B, tbl_streams C, tbl_marks D WHERE A.index_no = D.index_no AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND (B.subject1_number = '$subject_num' OR B.subject2_number = '$subject_num' OR B.subject3_number = '$subject_num') AND A.index_no = '$index_no'";
    $results = mysqli_query($db,$query);
    $total = mysqli_num_rows($results);

    if ($total==1) {

        $row = mysqli_fetch_assoc($results);

        if(empty($row[$subject_index])) {
            redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&error='.md5("not_entered_error"));
        }
    }
    else {
        redirect('marks.details.php?subject='.$subject_num.'&part='.$part.'&error='.md5("not_found_error"));
    }
}


?>