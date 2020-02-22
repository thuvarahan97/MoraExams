<?php
include_once("header.php");
if(!isset($_SESSION["user_id"])){
    redirect("index.php");
}

if($_SESSION['user_status'] != 2) {
    redirect("students.php");
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
                <a href="students.php"><button type="button" class="btn btn-reddish-pink">View All Entries</button></a>
            </div>
        <?php } ?>
        
        <br>
        
        <?php if($error_msg!="") { ?>
            <div class="form-group">
                <?php
                if($error_msg==md5("not_found_error"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Not found!</label>
                <?php
                }
                else if($error_msg==md5("resolve_failed"))
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: red;">Failed to resolve!</label>
                <?php
                }
                ?>
            </div>
        <?php
        } 
        
        else if($success_msg!="") { ?>
            <div class="form-group">
                <?php
                if($success_msg=="resolved")
                { ?>
                    <label class="control-label" style="width:100%; margin: 0 auto; text-align: center; position: relative; float: none; color: green;">Successfully Resolved!</label>
                <?php
                }
                ?>
            </div>
        <?php 
        }
        ?>

        <div id = "student_database_errors">
            <?php
            $sql_students = "SELECT * FROM tbl_students WHERE `user_id` = ''";
            $result_students = mysqli_query($db, $sql_students);
            ?>

            <div class="table-responsive text-center">
                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Index No.</th>
                            <th>Name</th>
                            <th>Added Date & Time</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody>
                    
            <?php 
                if(mysqli_num_rows($result_students) > 0){
                    $i = 0;
                    while($row_students = mysqli_fetch_assoc($result_students)){
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_students['index_no']; ?></td>
                        <td><?php echo $row_students['name']; ?></td>
                        <td><?php echo date("d-m-Y h:i A", strtotime($row_students['datetime'])); ?></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-padding-sm" onclick="location.href='students.errors.resolve.php?index_no=<?=$row_students['index_no'];?>'">RESOLVE</button>
                        </td>
                    </tr>
                    <?php } } else { ?>
                        <tr><td class="text-center" colspan="5">No errors found.</td></tr>
                    <?php } ?>
                
                    </tbody>
                </table>
            </div>
        </div>
                
    </div>
</div>

<?php
include_once("footer.php");
?>