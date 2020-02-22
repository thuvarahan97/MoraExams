<?php
include_once("header.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

include_once("subjects.banner.php");
?>

<div class="site-section">
    <div class="container">

        <?php if($_SESSION['user_status']=='2'){ ?>
            <div class="justify-content-center align-items-center text-center">
                <a href="subject.add.php"><button type="button" class="btn btn-primary">Add New Subject Group</button></a>
            </div>
        <?php } ?>
        <br>
        <div class="table-responsive text-center">
            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Stream</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <?php if($_SESSION['user_status']=='2'){ ?> <th>ACTION</th> <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql_subject = "SELECT A.*, B.stream FROM tbl_subjects A, tbl_streams B WHERE A.stream_id = B.stream_id ORDER BY A.subject_group_id ASC";
                        $result_subject = mysqli_query($db, $sql_subject);
                        if(mysqli_num_rows($result_subject) > 0){
                            $i=0;
                            while($row_subject = mysqli_fetch_assoc($result_subject)){
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row_subject['stream'] ?></td>
                                <td><?php echo $row_subject['subject1_number']." - ".$row_subject['subject1_name']; ?></td>
                                <td><?php echo $row_subject['subject2_number']." - ".$row_subject['subject2_name']; ?></td>
                                <td><?php echo $row_subject['subject3_number']." - ".$row_subject['subject3_name']; ?></td>
                                <?php
                                if($_SESSION['user_status']=='2'){ ?>
                                <td>
                                    <button type="button" class="btn-edit" onclick="location.href='assets/subject_group.edit.php?subject_group_id=<?php echo $row_subject['subject_group_id']; ?>'"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn-delete" onclick="location.href='assets/subject_group.delete.php?subject_group_id=<?php echo $row_subject['subject_group_id']; ?>'"><i class="fa fa-trash"></i></button>
                                </td>
                                <?php } ?>
                            </tr>
                    <?php } } else { ?>
                        <tr><td class="text-center" colspan="6">No records found.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>