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
            $subject_num = $_GET['subject'];
            $subject_name = $subj_name;
            break;
        }
    }
}

$part = "";
if(isset($_GET['part'])) {
    if($_GET['part']=='1'){
        $part = $_GET['part'];
        $part_num = 'I';
    }
    else if($_GET['part']=='2'){
        $part = $_GET['part'];
        $part_num = 'II';
    }
}

$index_no="";
$marks="";
$user_id="";
$checked="";

if (isset($_POST['enter'])) {
    $index_no = $_POST['index_no'];
    $marks = $_POST['marks'];
    $subject_num = $_POST['subject_num'];
    $part = $_POST['part'];
    $user_id = $_SESSION['user_id'];
    $checked = "0";

    $query_check = "SELECT A.*, B.subject1_number, B.subject2_number, B.subject3_number FROM tbl_students A, tbl_subjects B, tbl_streams C WHERE A.index_no = '$index_no' AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id";
    $results_check = mysqli_query($db,$query_check);

    if (mysqli_num_rows($results_check)==1) {

        $row_check = mysqli_fetch_assoc($results_check);

        if($row_check['checked']==1) {

            $subject1_number = $row_check['subject1_number'];
            $subject2_number = $row_check['subject2_number'];
            $subject3_number = $row_check['subject3_number'];

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
                $sub_entered_by = $sub_index2.'_entered_by';
                $sub_checked = $sub_index2.'_checked';

                $query1 = "SELECT * FROM tbl_marks WHERE index_no = '$index_no'";
                $result1 = mysqli_query($db,$query1);

                if (mysqli_num_rows($result1)==0) {
                    

                    $query_insert = "INSERT INTO tbl_marks (`index_no`, `$sub_index1`, `$sub_entered_by`, `$sub_checked`) VALUES ('$index_no', '$marks', '$user_id', '$checked')";
                    $result_insert = mysqli_query($db, $query_insert);
                    
                    if($result_insert) {
                        redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&success=entered');
                    }
                    else {
                        redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&error='.md5("failed"));
                    }
                
                }
                else if (mysqli_num_rows($result1)==1) {
                    
                    $row1 = mysqli_fetch_assoc($result1);

                    if($row1[$sub_index1] == '') {
                        
                        $query_update = "UPDATE tbl_marks SET `$sub_index1` = '$marks', `$sub_entered_by` = '$user_id', `$sub_checked` = '$checked' WHERE `index_no` = '$index_no'";
                        $result_update = mysqli_query($db, $query_update);
                    
                        if($result_update) {
                            redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&success=entered');
                        }
                        else {
                            redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&error='.md5("failed"));
                        }
                    } else {
                        redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&error='.md5("already_exists_error"));
                    }
                } 
            }else {
                redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&error='.md5("stream_error"));
            }
        } else {
            redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&error='.md5("not_checked_error"));
        }
    }
    else {
        redirect('marks.enter.php?subject='.$subject_num.'&part='.$part.'&error='.md5("not_found_error"));
    }
}

?>