<?php
include_once("header.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

$error_msg = "";
if(isset($_GET['error'])){
    $error_msg = $_GET['error'];
}

$success_msg = "";
if(isset($_GET['success'])){
    $success_msg = $_GET['success'];
}

include_once("students.banner.php");
?>

<div class="site-section">
    <div class="container">

        <?php if($_SESSION['user_status']>0){ ?>
            <div class="justify-content-center align-items-center text-center">
                <a href="student.add.php"><button type="button" class="btn btn-primary">Add New Student</button></a>
            </div>
        <?php } ?>
        
        <br>
        
        <input type="search" class="form-control search student-search" id="search" placeholder="Search"/>

        <?php if($error_msg!="") { ?>
            <div class="form-group">
                <?php
                if($error_msg==md5("not_found_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not found!</label>
                <?php
                }
                else if($error_msg==md5("delete_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Unable to delete!</label>
                <?php
                }
                else if($error_msg==md5("update_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to update!</label>
                <?php
                }
                ?>
            </div>
        <?php
        } 
        
        else if($success_msg!="") { ?>
            <div class="form-group">
                <?php
                if($success_msg=="deleted")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Deleted!</label>
                <?php
                }
                else if($success_msg=="updated")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Updated!</label>
                <?php
                } 
                ?>
            </div>
        <?php 
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
                <tbody id = "student_database">
                    <?php
                    $sql_students = "SELECT A.*, B.stream, C.subject1_name, C.subject2_name, C.subject3_name, D.centre_name, E.district, F.username FROM tbl_students A, tbl_streams B, tbl_subjects C, tbl_exam_centres D, tbl_exam_districts E, tbl_users F WHERE A.subject_group_id = C.subject_group_id AND B.stream_id = C.stream_id AND A.centre_id = D.centre_id AND A.district_id_sitting = E.district_id AND A.user_id = F.user_id";
                    $result_students = mysqli_query($db, $sql_students);
                    if(mysqli_num_rows($result_students) > 0){
                        $i=0;
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
                                    <button class="btn btn-danger btn-padding-sm" onclick="location.href='student.edit.php?index_no=<?php echo $row_students['index_no']; ?>'">Check</button>
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
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#search').keyup(function(){
            var search = $(this).val();
            $("table tr").each(function(index) {
                if(index!=0) {
                    $row = $(this);
                    var arr = [];
                    var available = "0";
                    for (var i = 1; i <= 16; i++) {
                        var val = $row.find('td:eq('+i+')').text().toLowerCase();
                        if(val.indexOf(search) > -1) {
                            available = "1";
                            break;
                        }
                    }
                    if (available == "1") {
                        $row.show();
                    } else {
                        $row.hide();
                    }
                }
            });
        });
    });
</script>

<?php
include_once("footer.php");
?>