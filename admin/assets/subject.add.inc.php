<?php

$subject_option = array(
    '01' => 'Physics',
    '02' => 'Chemistry',
    '09' => 'Biology',
    '10' => 'Combined Mathematics',
    '20' => 'Information and Communication Technology'
);

$subject_group_id="";
$stream_id="";
$subject1_number="";
$subject1_name="";
$subject2_number="";
$subject2_name="";
$subject3_number="";
$subject3_name="";

if (isset($_POST['add'])) {
    $subject_group_id = "SUBJ".time();
    $stream_id = $_POST['stream_id'];
    
    $subject1_number = $_POST['subject1_number'];
    foreach($subject_option as $subj_num => $subj_name) {
        if($subj_num == $subject1_number) {
            $subject1_name = $subj_name;
            break;
        }
    }
    
    $subject2_number = $_POST['subject2_number'];
    foreach($subject_option as $subj_num => $subj_name) {
        if($subj_num == $subject2_number) {
            $subject2_name = $subj_name;
            break;
        }
    }
    
    $subject3_number = $_POST['subject3_number'];
    foreach($subject_option as $subj_num => $subj_name) {
        if($subj_num == $subject3_number) {
            $subject3_name = $subj_name;
            break;
        }
    }
    
    //$error_return_value="subject_id=".$subject_id."&stream_id=".$stream_id."&subject_number=".$subject_number."&subject_name=".$subject_name."&paper_preparation=".$paper_preparation;
    
    if(($subject1_number!=$subject2_number) && ($subject1_number!=$subject3_number) && ($subject2_number!=$subject3_number)) {
        $query_check = "SELECT * FROM tbl_subjects WHERE stream_id = '$stream_id' AND subject1_number = '$subject1_number' AND subject2_number = '$subject2_number' AND subject3_number = '$subject3_number'";
        $results_check = mysqli_query($db,$query_check);

        if (mysqli_num_rows($results_check)==0) {
            $query_insert = "INSERT INTO tbl_subjects VALUES('$subject_group_id','$stream_id','$subject1_number','$subject1_name','$subject2_number','$subject2_name','$subject3_number','$subject3_name')";
            mysqli_query($db, $query_insert);
        
            redirect("subject.add.php?success=saved");
        }
        else {
            redirect('subject.add.php?error='.md5("already_exists_error"));
        }
    } else {
        redirect('subject.add.php?error='.md5("subjects_error"));
    }
}

?>