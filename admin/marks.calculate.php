<?php
include_once("header.php");

$stream_id = "";
if(isset($_GET['stream_id']) && !empty($_GET['stream_id'])) {
    $stream_id = $_GET['stream_id'];
}

$query = "SELECT A.*, B.name, B.district_id_ranking, B.district_ranking, B.subject_group_id, B.syllabus, B.medium FROM tbl_marks A, tbl_students B, tbl_subjects C WHERE A.index_no = B.index_no AND B.subject_group_id = C.subject_group_id AND C.stream_id = '$stream_id' ORDER BY A.index_no ASC";
$result = mysqli_query($db, $query);
$total = mysqli_num_rows($result);

$success = '';

if ($total > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        
        $index_no = $row['index_no'];
        $name = $row['name'];
        $district_id_ranking = $row['district_id_ranking'];
        $district_ranking = $row['district_ranking'];
        $subject_group_id = $row['subject_group_id'];
        $syllabus = $row['syllabus'];
        $medium = $row['medium'];
        
        if(is_null($row['subject1_part1'])) {
            $subject1_part1 = 0;
        }else{
            $subject1_part1 = $row['subject1_part1'];
        }

        if(is_null($row['subject1_part2'])) {
            $subject1_part2 = 0;
        }else{
            $subject1_part2 = $row['subject1_part2'];
        }

        if(is_null($row['subject2_part1'])) {
            $subject2_part1 = 0;
        }else{
            $subject2_part1 = $row['subject2_part1'];
        }

        if(is_null($row['subject2_part2'])) {
            $subject2_part2 = 0;
        }else{
            $subject2_part2 = $row['subject2_part2'];
        }

        if(is_null($row['subject3_part1'])) {
            $subject3_part1 = 0;
        }else{
            $subject3_part1 = $row['subject3_part1'];
        }

        if(is_null($row['subject3_part2'])) {
            $subject3_part2 = 0;
        }else{
            $subject3_part2 = $row['subject3_part2'];
        }

        $subject1_absence = 0;
        $subject2_absence = 0;
        $subject3_absence = 0;
        
        if(is_null($row['subject1_part1']) && is_null($row['subject1_part2'])) {
            $subject1_absence = 1;
        }

        if(is_null($row['subject2_part1']) && is_null($row['subject2_part2'])) {
            $subject2_absence = 1;
        }

        if(is_null($row['subject3_part1']) && is_null($row['subject3_part2'])) {
            $subject3_absence = 1;
        }

        $subject1 = number_format((float)(($subject1_part1 + $subject1_part2)/2.00), 2, '.', '');
        $subject2 = number_format((float)(($subject2_part1 + $subject2_part2)/2.00), 2, '.', '');
        $subject3 = number_format((float)(($subject3_part1 + $subject3_part2)/2.00), 2, '.', '');

        if($stream_id == '1') {
            $query_check = "SELECT * FROM tbl_marks_bio WHERE index_no = '$index_no'";
            $result_check = mysqli_query($db, $query_check);
            $total_check = mysqli_num_rows($result_check);

            if($total_check == 0) {

                $query_insert = "INSERT INTO tbl_marks_bio VALUES ('$index_no', '$name', '$district_id_ranking', '$district_ranking', '$stream_id', '$subject_group_id', '$syllabus', '$medium', '$subject1', '$subject2', '$subject3', '$subject1_absence', '$subject2_absence', '$subject3_absence')";
                $result_insert = mysqli_query($db, $query_insert);

                if($result_insert) {
                    $success = 'ok';
                } else {
                    redirect('marks.view_all.php?error='.md5("failed"));
                    break;
                }
            } else if($total_check == 1) {
                $query_update = "UPDATE tbl_marks_bio SET `name` = '$name', `district_id_ranking` = '$district_id_ranking', `district_ranking` = '$district_ranking', `stream_id` = '$stream_id', `subject_group_id` = '$subject_group_id', `syllabus` = '$syllabus', `medium` = '$medium', `subject1` = '$subject1', `subject2` = '$subject2', `subject3` = '$subject3', `subject1_absence` = '$subject1_absence', `subject2_absence` = '$subject2_absence', `subject3_absence` = '$subject3_absence' WHERE `index_no` = '$index_no'";
                $result_update = mysqli_query($db, $query_update);

                if($result_update) {
                    $success = 'ok';
                } else {
                    redirect('marks.view_all.php?error='.md5("failed"));
                    break;
                }
            }
        } else if($stream_id == '2') {
            $query_check = "SELECT * FROM tbl_marks_maths WHERE index_no = '$index_no'";
            $result_check = mysqli_query($db, $query_check);
            $total_check = mysqli_num_rows($result_check);

            if($total_check == 0) {

                $query_insert = "INSERT INTO tbl_marks_maths VALUES ('$index_no', '$name', '$district_id_ranking', '$district_ranking', '$stream_id', '$subject_group_id', '$syllabus', '$medium', '$subject1', '$subject2', '$subject3', '$subject1_absence', '$subject2_absence', '$subject3_absence')";
                $result_insert = mysqli_query($db, $query_insert);

                if($result_insert) {
                    $success = 'ok';
                } else {
                    redirect('marks.view_all.php?error='.md5("failed"));
                    break;
                }
            } else if($total_check == 1) {
                $query_update = "UPDATE tbl_marks_maths SET `name` = '$name', `district_id_ranking` = '$district_id_ranking', `district_ranking` = '$district_ranking', `stream_id` = '$stream_id', `subject_group_id` = '$subject_group_id', `syllabus` = '$syllabus', `medium` = '$medium', `subject1` = '$subject1', `subject2` = '$subject2', `subject3` = '$subject3', `subject1_absence` = '$subject1_absence', `subject2_absence` = '$subject2_absence', `subject3_absence` = '$subject3_absence' WHERE `index_no` = '$index_no'";
                $result_update = mysqli_query($db, $query_update);

                if($result_update) {
                    $success = 'ok';
                } else {
                    redirect('marks.view_all.php?error='.md5("failed"));
                    break;
                }
            }
        } else {
            redirect('marks.view_all.php?error='.md5("failed"));
            break;
        }
    }
} else {
    redirect('marks.view_all.php?error='.md5("not_found_error"));
}

if($success == 'ok') {
    redirect('marks.view_all.php?success=ok');
}

include_once("footer.php");
?>