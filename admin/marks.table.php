<?php
include_once("db_config.php");

$user = "";
if(isset($_POST['user']) && !empty($_POST['user'])) {
    $user = " AND A.user_id='{$_POST['user']}'";
}

$unchecked1 = "";
$unchecked2 = "";
$unchecked3 = "";
if(isset($_POST['unchecked']) && !empty($_POST['unchecked'])) {
    $unchecked1 = " AND ((D.sub1_".$_POST['unchecked']."_checked='') OR (D.sub1_".$_POST['unchecked']."_checked='0'))";
    $unchecked2 = " AND ((D.sub2_".$_POST['unchecked']."_checked='') OR (D.sub2_".$_POST['unchecked']."_checked='0'))";
    $unchecked3 = " AND ((D.sub3_".$_POST['unchecked']."_checked='') OR (D.sub3_".$_POST['unchecked']."_checked='0'))";
}

$limit = 100;
$page = 1;

if(isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;

$subject_option = array(
    '01' => 'Physics',
    '02' => 'Chemistry',
    '09' => 'Biology',
    '10' => 'Maths',
    '20' => 'ICT'
);

$subject_num = "";
$subject_name = "";
if(isset($_POST['subject'])) {
    foreach($subject_option as $subj_num => $subj_name) {
        if($subj_num == $_POST['subject']) {
            $subject_num = $subj_num;
            $subject_name = $subj_name;
            break;
        }
    }
}


if(isset($_POST["query"])) {
    $search = mysqli_real_escape_string($db, $_POST["query"]);
    $sql_marks = "SELECT A.index_no, A.name, E.centre_name, C.stream, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.subject1_part1 
                WHEN (B.subject2_number = '$subject_num') THEN D.subject2_part1 
                WHEN (B.subject3_number = '$subject_num') THEN D.subject3_part1 END) AS part1_marks, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.subject1_part2 
                WHEN (B.subject2_number = '$subject_num') THEN D.subject2_part2 
                WHEN (B.subject3_number = '$subject_num') THEN D.subject3_part2 END) AS part2_marks, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p1_entered_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p1_entered_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p1_entered_by END) AS part1_entered_by, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p2_entered_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p2_entered_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p2_entered_by END) AS part2_entered_by, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p1_checked 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p1_checked 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p1_checked END) AS part1_checked, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p2_checked 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p2_checked 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p2_checked END) AS part2_checked, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p1_checked_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p1_checked_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p1_checked_by END) AS part1_checked_by, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p2_checked_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p2_checked_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p2_checked_by END) AS part2_checked_by 
                FROM tbl_students A, tbl_subjects B, tbl_streams C, tbl_marks D, tbl_exam_centres E WHERE A.index_no = D.index_no AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = E.centre_id AND ((B.subject1_number = '$subject_num' $unchecked1) OR (B.subject2_number = '$subject_num' $unchecked2) OR (B.subject3_number = '$subject_num' $unchecked3)) AND (A.index_no LIKE '%".$search."%' OR A.name LIKE '%".$search."%' OR E.centre_name LIKE '%".$search."%' OR C.stream LIKE '%".$search."%') ORDER BY A.index_no ASC LIMIT $start, $limit";
    $sql1 = "SELECT count(A.student_id) AS id FROM tbl_students A, tbl_subjects B, tbl_streams C, tbl_marks D, tbl_exam_centres E WHERE A.index_no = D.index_no AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = E.centre_id AND ((B.subject1_number = '$subject_num' $unchecked1) OR (B.subject2_number = '$subject_num' $unchecked2) OR (B.subject3_number = '$subject_num' $unchecked3)) AND (A.index_no LIKE '%".$search."%' OR A.name LIKE '%".$search."%' OR E.centre_name LIKE '%".$search."%' OR C.stream LIKE '%".$search."%') ORDER BY A.index_no ASC";
}else {
    $sql_marks = "SELECT A.index_no, A.name, E.centre_name, C.stream, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.subject1_part1 
                WHEN (B.subject2_number = '$subject_num') THEN D.subject2_part1 
                WHEN (B.subject3_number = '$subject_num') THEN D.subject3_part1 END) AS part1_marks, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.subject1_part2 
                WHEN (B.subject2_number = '$subject_num') THEN D.subject2_part2 
                WHEN (B.subject3_number = '$subject_num') THEN D.subject3_part2 END) AS part2_marks, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p1_entered_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p1_entered_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p1_entered_by END) AS part1_entered_by, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p2_entered_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p2_entered_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p2_entered_by END) AS part2_entered_by, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p1_checked 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p1_checked 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p1_checked END) AS part1_checked, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p2_checked 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p2_checked 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p2_checked END) AS part2_checked, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p1_checked_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p1_checked_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p1_checked_by END) AS part1_checked_by, 
                (CASE WHEN (B.subject1_number = '$subject_num') THEN D.sub1_p2_checked_by 
                WHEN (B.subject2_number = '$subject_num') THEN D.sub2_p2_checked_by 
                WHEN (B.subject3_number = '$subject_num') THEN D.sub3_p2_checked_by END) AS part2_checked_by 
                FROM tbl_students A, tbl_subjects B, tbl_streams C, tbl_marks D, tbl_exam_centres E WHERE A.index_no = D.index_no AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = E.centre_id AND ((B.subject1_number = '$subject_num' $unchecked1) OR (B.subject2_number = '$subject_num' $unchecked2) OR (B.subject3_number = '$subject_num' $unchecked3)) $ LIMIT $start, $limit ORDER BY A.index_no ASC";
    $sql1 = "SELECT count(A.student_id) AS id FROM tbl_students A, tbl_subjects B, tbl_streams C, tbl_marks D, tbl_exam_centres E WHERE A.index_no = D.index_no AND A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = E.centre_id AND ((B.subject1_number = '$subject_num' $unchecked1) OR (B.subject2_number = '$subject_num' $unchecked2) OR (B.subject3_number = '$subject_num' $unchecked3)) ORDER BY A.index_no ASC";
}

$result_marks = mysqli_query($db, $sql_marks);
$result1 = mysqli_query($db, $sql1);
$studCount = $result1->fetch_all(MYSQLI_ASSOC);
$total_records = $studCount[0]['id'];
$total_pages = ceil($total_records / $limit);
$previous = $page - 1;
$next = $page + 1;
$last = $total_pages;
$pagefirstshow = 1;
$pagelastshow = $total_pages;
if($total_pages == 0) {
    $page = 1;
    $total_pages = 1;
    $previous = 1;
    $next = 1;
    $last = 1;
    $pagefirstshow = 1;
    $pagelastshow = 1;
}
if(isset($_POST['pagefirstshow']) && isset($_POST['pagefirstshow'])) {
    if($total_pages > 5){
        $pagefirstshow = $_POST['pagefirstshow'];
        $pagelastshow = $_POST['pagelastshow'];
    }
}

?>

<div class="table-responsive text-center">
    <table class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>#</th>
                <th>Index No.</th>
                <th>Name</th>
                <th>Centre</th>
                <th>Stream</th>
                <th><?php echo $subject_name;?> I Marks</th>
                <th><?php echo $subject_name;?> II Marks</th>
                <th><?php echo $subject_name;?> I Entered By</th>
                <th><?php echo $subject_name;?> I Checked</th>
                <th><?php echo $subject_name;?> I Checked By</th>
                <th><?php echo $subject_name;?> I ACTION</th>
                <th><?php echo $subject_name;?> II Entered By</th>
                <th><?php echo $subject_name;?> II Checked</th>
                <th><?php echo $subject_name;?> II Checked By</th>
                <th><?php echo $subject_name;?> II ACTION</th>
            </tr>
        </thead>

        <tbody>
        
<?php 
    if(mysqli_num_rows($result_marks) > 0){
        $i = ($page - 1) * $limit;
        while($row_marks = mysqli_fetch_assoc($result_marks)){
            $i++;

            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row_marks['index_no']; ?></td>
                <td><?php echo $row_marks['name']; ?></td>
                <td><?php echo $row_marks['centre_name']; ?></td>
                <td><?php echo $row_marks['stream']; ?></td>
                <td><?php echo $row_marks['part1_marks']; ?></td>
                <td><?php echo $row_marks['part2_marks']; ?></td>
                <td>
                    <?php
                    if($row_marks['part1_entered_by'] != ""){
                        $sql_entered_user = "SELECT * FROM tbl_users WHERE `user_id` = '{$row_marks['part1_entered_by']}'";
                        $result_entered_user = mysqli_query($db, $sql_entered_user);
                        if(mysqli_num_rows($result_entered_user) == 1){
                            $row_entered_user = mysqli_fetch_assoc($result_entered_user);
                            echo $row_entered_user['username'];
                        }
                    } ?>
                </td>
                <td>
                    <?php
                    if(($row_marks['part1_checked'] == "0") || ($row_marks['part1_checked'] == "")){ 
                        if($row_marks['part1_marks'] != "") { ?>
                        <button class="btn btn-danger btn-padding-sm" onclick="location.href='marks.check.php?subject=<?=$subj_num;?>&part=1&index_no=<?=$row_marks['index_no'];?>'">Check</button>
                    <?php } } else { ?>
                        <span style="font-size: 1.7rem; font-weight: bold; color: green">&#10003;</span>
                    <?php } ?>
                </td>
                <td>
                    <?php
                    if($row_marks['part1_checked_by'] != ""){
                        $sql_checked_user = "SELECT * FROM tbl_users WHERE `user_id` = '{$row_marks['part1_checked_by']}'";
                        $result_checked_user = mysqli_query($db, $sql_checked_user);
                        if(mysqli_num_rows($result_checked_user) == 1){
                            $row_checked_user = mysqli_fetch_assoc($result_checked_user);
                            echo $row_checked_user['username'];
                        }
                    } ?>
                </td>
                <td>
                    <?php if($row_marks['part1_marks'] != "") { ?>
                    <button type="button" class="btn-edit" onclick="location.href='marks.edit.php?subject=<?=$subj_num;?>&part=1&index_no=<?=$row_marks['index_no'];?>'"><i class="fa fa-edit"></i></button>
                    <?php } ?>
                </td>
                <td>
                    <?php
                    if($row_marks['part2_entered_by'] != ""){
                        $sql_entered_user = "SELECT * FROM tbl_users WHERE `user_id` = '{$row_marks['part1_entered_by']}'";
                        $result_entered_user = mysqli_query($db, $sql_entered_user);
                        if(mysqli_num_rows($result_entered_user) == 1){
                            $row_entered_user = mysqli_fetch_assoc($result_entered_user);
                            echo $row_entered_user['username'];
                        }
                    } ?>
                </td>
                <td>
                    <?php
                    if(($row_marks['part2_checked'] == "0") || ($row_marks['part2_checked'] == "")){ 
                        if($row_marks['part2_marks'] != "") { ?>
                        <button class="btn btn-danger btn-padding-sm" onclick="location.href='marks.check.php?subject=<?=$subj_num;?>&part=2&index_no=<?=$row_marks['index_no'];?>'">Check</button>
                    <?php } } else { ?>
                        <span style="font-size: 1.7rem; font-weight: bold; color: green">&#10003;</span>
                    <?php } ?>
                </td>
                <td>
                    <?php
                    if($row_marks['part2_checked_by'] != ""){
                        $sql_checked_user = "SELECT * FROM tbl_users WHERE `user_id` = '{$row_marks['part2_checked_by']}'";
                        $result_checked_user = mysqli_query($db, $sql_checked_user);
                        if(mysqli_num_rows($result_checked_user) == 1){
                            $row_checked_user = mysqli_fetch_assoc($result_checked_user);
                            echo $row_checked_user['username'];
                        }
                    } ?>
                </td>
                <td>
                    <?php if($row_marks['part2_marks'] != "") { ?>
                    <button type="button" class="btn-edit" onclick="location.href='marks.edit.php?subject=<?=$subj_num;?>&part=2&index_no=<?=$row_marks['index_no'];?>'"><i class="fa fa-edit"></i></button>
                    <?php } ?>
                </td>
            </tr>
            <?php } 
        } else { ?>
            <tr><td class="text-center" colspan="14">No records found.</td></tr>
        <?php } ?>
    
        </tbody>
    </table>
</div>

<br/>

<div style="float: left;">
    <span>Showing <?php if(mysqli_num_rows($result_marks) == 0){echo '0';} else {echo ((($page - 1) * $limit) + 1);} ?> to <?php echo (($page - 1) * $limit) + mysqli_num_rows($result_marks) ?> of <?php echo $total_records ?> entries</span>
</div>

<div style="float: right;">
    <nav style="user-select: none;">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if($page == 1) {echo 'disabled';} ?>">
                <span class="page-link" pid="1">&laquo;</span>
            </li>
            <li class="page-item <?php if($page == 1) {echo 'disabled';} ?>">
                <span class="page-link" pid="<?=$previous;?>">Previous</span>
            </li>
            <?php for($p = $pagefirstshow; $p<=$pagelastshow; $p++) { ?>
                <li class="page-item <?php if($page == $p) {echo 'active';} ?>">
                    <span class="page-link" pid="<?=$p;?>"><?=$p;?></span>
                </li>
            <?php } ?>
            <li class="page-item <?php if($page == $total_pages) {echo 'disabled';} ?>">
                <span class="page-link" pid="<?=$next;?>">Next</span>
            </li>
            <li class="page-item <?php if($page == $total_pages) {echo 'disabled';} ?>">
                <span class="page-link" pid="<?=$last;?>">&raquo;</span>
            </li>
        </ul>
    </nav>
</div>

