<?php
include_once("db_config.php");

$limit = 100;
$page = 1;

if(isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;

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
    $sql_marks = "SELECT A.*, B.subject1_name, B.subject2_name, B.subject3_name, C.stream FROM tbl_final_marks A, tbl_subjects B, tbl_streams C WHERE A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND (A.index_no LIKE '%".$search."%' OR A.name LIKE '%".$search."%' OR C.stream LIKE '%".$search."%') ORDER BY A.index_no ASC LIMIT $start, $limit";
    $sql1 = "SELECT count(A.index_no) AS id FROM tbl_final_marks A, tbl_subjects B, tbl_streams C WHERE A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id AND (A.index_no LIKE '%".$search."%' OR A.name LIKE '%".$search."%' OR C.stream LIKE '%".$search."%') ORDER BY A.index_no ASC";
}else {
    $sql_marks = "SELECT A.*, B.subject1_name, B.subject2_name, B.subject3_name, C.stream FROM tbl_final_marks A, tbl_subjects B, tbl_streams C WHERE A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id ORDER BY A.index_no ASC LIMIT $start, $limit";
    $sql1 = "SELECT count(A.index_no) AS id FROM tbl_final_marks A, tbl_subjects B, tbl_streams C WHERE A.subject_group_id = B.subject_group_id AND B.stream_id = C.stream_id ORDER BY A.index_no ASC";
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
                <th>District</th>
                <th>Stream</th>
                <th>Subjects</th>
                <th>Syllabus</th>
                <th>Medium</th>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
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
                <td><?php echo $row_marks['district_ranking']; ?></td>
                <td><?php echo $row_marks['stream']; ?></td>
                <td><?php echo $row_marks['subject1_name'].' | '.$row_marks['subject2_name'].' | '.$row_marks['subject3_name']; ?></td>
                <td><?php echo $row_marks['syllabus']; ?></td>
                <td><?php echo $row_marks['medium']; ?></td>
                <td><?php echo $row_marks['subject1']; ?></td>
                <td><?php echo $row_marks['subject2']; ?></td>
                <td><?php echo $row_marks['subject3']; ?></td>
    
            </tr>
            <?php } 
        } else { ?>
            <tr><td class="text-center" colspan="11">No records found.</td></tr>
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

