<?php
include_once("db_config.php");

$user = "";
if(isset($_POST['user']) && !empty($_POST['user'])) {
    $user = " AND A.user_id='{$_POST['user']}'";
}

$checked = "";
if(isset($_POST['checked']) && ($_POST['checked']=='0')) {
    $checked = " AND A.checked='{$_POST['checked']}'";
}

$limit = 100;
$page = 1;

if(isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;

if(isset($_POST["query"])) {
    $search = mysqli_real_escape_string($db, $_POST["query"]);
    $sql_students = "SELECT A.*, B.stream, C.subject1_name, C.subject2_name, C.subject3_name, D.centre_name, E.district, F.username FROM tbl_students A, tbl_streams B, tbl_subjects C, tbl_exam_centres D, tbl_exam_districts E, tbl_users F WHERE A.subject_group_id = C.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = D.centre_id AND A.district_id_sitting = E.district_id AND A.user_id = F.user_id AND (A.index_no LIKE '%".$search."%' OR A.name LIKE '%".$search."%' OR B.stream LIKE '%".$search."%' OR C.subject1_name LIKE '%".$search."%' OR C.subject2_name LIKE '%".$search."%' OR C.subject3_name LIKE '%".$search."%' OR A.syllabus LIKE '%".$search."%' OR A.medium LIKE '%".$search."%' OR A.district_ranking LIKE '%".$search."%' OR E.district LIKE '%".$search."%' OR D.centre_name LIKE '%".$search."%' OR A.nic LIKE '%".$search."%' OR A.gender LIKE '%".$search."%' OR A.school LIKE '%".$search."%' OR A.address LIKE '%".$search."%' OR A.email LIKE '%".$search."%' OR A.telephone LIKE '%".$search."%' OR F.username LIKE '%".$search."%') $user $checked LIMIT $start, $limit";
    $sql1 = "SELECT count(A.student_id) AS id FROM tbl_students A, tbl_streams B, tbl_subjects C, tbl_exam_centres D, tbl_exam_districts E, tbl_users F WHERE A.subject_group_id = C.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = D.centre_id AND A.district_id_sitting = E.district_id AND A.user_id = F.user_id AND (A.index_no LIKE '%".$search."%' OR A.name LIKE '%".$search."%' OR B.stream LIKE '%".$search."%' OR C.subject1_name LIKE '%".$search."%' OR C.subject2_name LIKE '%".$search."%' OR C.subject3_name LIKE '%".$search."%' OR A.syllabus LIKE '%".$search."%' OR A.medium LIKE '%".$search."%' OR A.district_ranking LIKE '%".$search."%' OR E.district LIKE '%".$search."%' OR D.centre_name LIKE '%".$search."%' OR A.nic LIKE '%".$search."%' OR A.gender LIKE '%".$search."%' OR A.school LIKE '%".$search."%' OR A.address LIKE '%".$search."%' OR A.email LIKE '%".$search."%' OR A.telephone LIKE '%".$search."%' OR F.username LIKE '%".$search."%') $user $checked";
}else {
    $sql_students = "SELECT A.*, B.stream, C.subject1_name, C.subject2_name, C.subject3_name, D.centre_name, E.district, F.username FROM tbl_students A, tbl_streams B, tbl_subjects C, tbl_exam_centres D, tbl_exam_districts E, tbl_users F WHERE A.subject_group_id = C.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = D.centre_id AND A.district_id_sitting = E.district_id AND A.user_id = F.user_id $user $checked LIMIT $start, $limit";
    $sql1 = "SELECT count(A.student_id) AS id FROM tbl_students A, tbl_streams B, tbl_subjects C, tbl_exam_centres D, tbl_exam_districts E, tbl_users F WHERE A.subject_group_id = C.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = D.centre_id AND A.district_id_sitting = E.district_id AND A.user_id = F.user_id $user $checked";
}

$result_students = mysqli_query($db, $sql_students);
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
                <th>Stream</th>
                <th>Subjects</th>
                <th>Syllabus</th>
                <th>Medium</th>
                <th>District (Ranking)</th>
                <th>District (Sitting)</th>
                <th>Centre</th>
                <th>N.I.C No.</th>
                <th>Gender</th>
                <th>School</th>
                <th>Address</th>
                <th>E-mail Address</th>
                <th>Telephone No.</th>
                <th>Added By</th>
                <th>Checked</th>
                <th>Checked By</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
        
<?php 
    if(mysqli_num_rows($result_students) > 0){
        $i = ($page - 1) * $limit;
        while($row_students = mysqli_fetch_assoc($result_students)){
            $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row_students['index_no'] ?></td>
            <td><?php echo $row_students['name'] ?></td>
            <td><?php echo $row_students['stream'] ?></td>
            <td><?php echo $row_students['subject1_name']." , ".$row_students['subject2_name']." , ".$row_students['subject3_name']; ?></td>
            <td><?php echo $row_students['syllabus'] ?></td>
            <td><?php echo $row_students['medium'] ?></td>
            <td><?php echo $row_students['district_ranking'] ?></td>
            <td><?php echo $row_students['district'] ?></td>
            <td><?php echo $row_students['centre_name'] ?></td>
            <td><?php echo $row_students['nic'] ?></td>
            <td><?php echo $row_students['gender'] ?></td>
            <td><?php echo $row_students['school'] ?></td>
            <td><?php echo $row_students['address'] ?></td>
            <td><?php echo $row_students['email'] ?></td>
            <td><?php echo $row_students['telephone'] ?></td>
            <td><?php echo $row_students['username'] ?></td>
            <td>
                <?php
                if($row_students['checked'] == "0"){ ?>
                    <button class="btn btn-danger btn-padding-sm" onclick="location.href='student.check.php?index_no=<?php echo $row_students['index_no']; ?>'">Check</button>
                <?php } else { ?>
                    <span style="font-size: 1.7rem; font-weight: bold; color: green">&#10003;</span>
                <?php } ?>
            </td>
            <td>
                <?php
                if($row_students['checked_by'] != ""){
                    $sql_checked_user = "SELECT * FROM tbl_users WHERE `user_id` = '{$row_students['checked_by']}'";
                    $result_checked_user = mysqli_query($db, $sql_checked_user);
                    if(mysqli_num_rows($result_checked_user) == 1){
                        $row_checked_user = mysqli_fetch_assoc($result_checked_user);
                        echo $row_checked_user['username'];
                    }
                } ?>
            </td>
            <td>
                <button type="button" class="btn-edit" onclick="location.href='student.edit.php?index_no=<?php echo $row_students['index_no']; ?>'"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn-delete" onclick="location.href='student.delete.php?index_no=<?php echo $row_students['index_no']; ?>'"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php } } else { ?>
            <tr><td class="text-center" colspan="20">No records found.</td></tr>
        <?php } ?>
    
        </tbody>
    </table>
</div>

<br/>

<div style="float: left;">
    <span>Showing <?php if(mysqli_num_rows($result_students) == 0){echo '0';} else {echo ((($page - 1) * $limit) + 1);} ?> to <?php echo (($page - 1) * $limit) + mysqli_num_rows($result_students) ?> of <?php echo $total_records ?> entries</span>
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

